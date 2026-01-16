# Website Security Hardening Guide

## 🚨 CRITICAL: Malicious Code Detected

The .htaccess code you found contains a **cloaking attack** used by hackers to:
- Inject SEO spam into Google's index
- Redirect Google users to malicious sites
- Hide malicious behavior from website owners
- Create hidden backdoors

---

## IMMEDIATE ACTIONS REQUIRED

### 1. Find and Remove Malicious Files (Run in cPanel Terminal)

```bash
# Navigate to your public_html directory
cd ~/public_html

# Find ALL .htaccess files on your server
find . -name ".htaccess" -type f

# Search for malicious amp.php references
grep -r "amp.php" .

# Search for suspicious files
find . -name "amp.php" -type f
find . -name "*.php" -mtime -7  # Files modified in last 7 days

# Check for eval, base64_decode (common in malware)
grep -r "eval(base64_decode" . --include="*.php"
grep -r "eval(gzinflate" . --include="*.php"
grep -r "preg_replace.*\/e" . --include="*.php"
```

### 2. Backup Current Files Before Cleaning

```bash
# Create backup
cd ~
tar -czf backup-before-cleaning-$(date +%Y%m%d).tar.gz public_html/

# Verify backup
ls -lh backup-before-cleaning-*.tar.gz
```

### 3. Remove Malicious Code

```bash
cd ~/public_html

# If you find amp.php, check its contents first:
cat amp.php  # Review the content

# Delete malicious files (replace with actual filenames you find)
rm -f amp.php

# Restore clean .htaccess from your repository
# (After you've identified which .htaccess files are compromised)
```

### 4. Find How Hackers Got In

```bash
# Check file permissions (should be 644 for files, 755 for dirs)
find ~/public_html -type f -perm 0777
find ~/public_html -type d -perm 0777

# Find recently modified files
find ~/public_html -type f -mtime -30 | xargs ls -ltr

# Check for suspicious users/uploads
ls -la ~/public_html/uploads/
ls -la ~/public_html/images/
```

---

## SECURE .HTACCESS CONFIGURATION

### For Root .htaccess (~/public_html/.htaccess)

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On

    # Force HTTPS
    RewriteCond %{HTTPS} !=on
    RewriteCond %{REQUEST_URI} !^/[0-9]+\..+\.cpaneldcv$
    RewriteCond %{REQUEST_URI} !^/\.well-known/pki-validation/[A-F0-9]{32}\.txt(?:\ Comodo\ DCV)?$
    RewriteRule ^ https://%{HTTP_HOST}%{REQUEST_URI} [L,R=301]

    # Remove www
    RewriteCond %{HTTP_HOST} ^www\.orioncc\.com$ [NC]
    RewriteRule ^(.*)$ https://orioncc.com/$1 [R=301,L]

    # Forward requests to /public directory
    RewriteRule ^$ public/ [L]
    RewriteCond %{REQUEST_URI} !^/public/
    RewriteRule ^(.*)$ public/$1 [L]
</IfModule>

# Security Headers
<IfModule mod_headers.c>
    # Prevent clickjacking
    Header always set X-Frame-Options "SAMEORIGIN"

    # XSS Protection
    Header always set X-XSS-Protection "1; mode=block"

    # Prevent MIME sniffing
    Header always set X-Content-Type-Options "nosniff"

    # Referrer Policy
    Header always set Referrer-Policy "strict-origin-when-cross-origin"
</IfModule>

# Disable directory listing
Options -Indexes

# Block access to sensitive files
<FilesMatch "^(\..+|composer\.(json|lock)|package\.json|phpunit\.xml|artisan|\.env.*|webpack\.mix\.js|vite\.config\.js|README\.md)$">
    Require all denied
</FilesMatch>

# Block PHP execution in uploads directory
<Directory "*/uploads/">
    <FilesMatch "\.php$">
        Require all denied
    </FilesMatch>
</Directory>
```

### For Public Directory .htaccess (~/public_html/public/.htaccess)

```apache
<IfModule mod_rewrite.c>
    Options -Indexes
    RewriteEngine On

    # Handle Authorization Header
    RewriteCond %{HTTP:Authorization} .
    RewriteRule .* - [E=HTTP_AUTHORIZATION:%{HTTP:Authorization}]

    # Redirect Trailing Slashes
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_URI} (.+)/$
    RewriteRule ^ %1 [L,R=301]

    # Send Requests To Front Controller
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>

# Security Headers
<IfModule mod_headers.c>
    Header always set X-Frame-Options "SAMEORIGIN"
    Header always set X-XSS-Protection "1; mode=block"
    Header always set X-Content-Type-Options "nosniff"
</IfModule>

# Block access to sensitive files
<FilesMatch "^(composer\.(json|lock)|package\.json|phpunit\.xml|artisan|\.env.*|webpack\.mix\.js|vite\.config\.js)$">
    Require all denied
</FilesMatch>

# Disable PHP execution in specific directories
<Directory "*/storage/">
    <FilesMatch "\.php$">
        Require all denied
    </FilesMatch>
</Directory>
```

---

## SECURITY HARDENING CHECKLIST

### A. File Permissions (cPanel Terminal)

```bash
# Set correct permissions
cd ~/public_html

# Directories: 755
find . -type d -exec chmod 755 {} \;

# Files: 644
find . -type f -exec chmod 644 {} \;

# Laravel storage and cache need write access
chmod -R 775 storage bootstrap/cache
```

### B. Database Security

```bash
# Change database password in cPanel > MySQL Databases
# Update .env file with new password
nano ~/public_html/.env
```

### C. Update All Software

```bash
cd ~/public_html

# Update Composer dependencies
composer update --no-dev

# Check for Laravel security updates
php artisan --version
```

### D. Enable ModSecurity in cPanel

1. Login to cPanel
2. Go to "Security" → "ModSecurity"
3. Enable for your domain
4. Use "OWASP Core Rule Set"

### E. Install Security Plugins

```bash
cd ~/public_html

# Install Laravel security package
composer require spatie/laravel-csp

# Install firewall
composer require antonioribeiro/firewall
```

### F. Check for Backdoors

```bash
# Search for common backdoor patterns
cd ~/public_html

grep -r "eval(" . --include="*.php" | grep -v vendor
grep -r "base64_decode" . --include="*.php" | grep -v vendor
grep -r "gzinflate" . --include="*.php" | grep -v vendor
grep -r "shell_exec" . --include="*.php" | grep -v vendor
grep -r "system(" . --include="*.php" | grep -v vendor
```

### G. Review Cron Jobs

```bash
# List all cron jobs
crontab -l

# Remove suspicious entries
crontab -e
```

### H. Check User Accounts

In cPanel:
1. Go to "FTP Accounts"
2. Remove any unknown FTP users
3. Change your cPanel password
4. Enable Two-Factor Authentication

---

## ONGOING MONITORING

### Daily Security Scan

```bash
# Check for new suspicious files
find ~/public_html -type f -mtime -1 -name "*.php"

# Check .htaccess hasn't been modified
ls -l ~/public_html/.htaccess
ls -l ~/public_html/public/.htaccess
```

### Weekly Review

```bash
# Review access logs
tail -100 ~/access-logs/orioncc.com

# Check error logs
tail -100 ~/public_html/storage/logs/laravel.log
```

---

## IF YOU'RE STILL COMPROMISED

If hackers keep getting back in:

1. **Change ALL passwords**: cPanel, FTP, Database, Admin accounts
2. **Check plugins/themes**: Remove any you don't recognize
3. **Scan local computer**: Your own computer might be compromised
4. **Review SSH keys**: Check ~/.ssh/authorized_keys
5. **Contact your host**: Ask them to scan server for rootkits
6. **Consider reinstall**: Fresh install if severely compromised

---

## WHAT TO DISABLE FROM MALICIOUS CODE

**DELETE/DISABLE these parts:**

❌ All RedirectMatch rules to old URLs (unless you actually need them)
❌ The entire Google bot cloaking section (this is the attack)
❌ Any reference to amp.php file
❌ Check if those old URLs (2002, 2003, etc.) are legitimate

**KEEP these parts (but with improvements):**

✅ HTTPS enforcement (but better implementation above)
✅ www removal (already in secure config)
✅ cPanel validation exceptions (already in secure config)
✅ Laravel routing (already in your current files)

---

## QUESTIONS TO INVESTIGATE

1. **Do you actually need those redirects?** (2002, 2003, etc. URLs)
2. **When did the hack happen?** Check file modification dates
3. **Do you have backups?** Before the compromise
4. **What CMS/framework?** (I see Laravel - good choice)
5. **Who has access?** Review all FTP/SSH accounts

---

## EMERGENCY CONTACT

If you need immediate help:
- Your hosting provider's security team
- Sucuri (professional malware removal): https://sucuri.net
- Wordfence (if using WordPress)

---

## NEXT STEPS

1. Run the terminal commands above to find malicious files
2. Remove any amp.php or suspicious files you find
3. Replace server .htaccess with the secure versions
4. Change all passwords
5. Enable ModSecurity
6. Set up monitoring

**DO NOT** put the malicious .htaccess code back on your server!
