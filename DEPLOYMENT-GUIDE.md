# DEPLOYMENT GUIDE - Security Fixes to Production

## 🎯 GOAL
Deploy all security fixes from this repository to your cPanel server.

---

## 📋 WHAT WILL BE DEPLOYED

### Security Files (NEW):
- `START-HERE-SECURITY-EMERGENCY.md` - Master emergency response guide
- `URGENT-ROTATE-CREDENTIALS.md` - Credential rotation instructions
- `SECURITY_HARDENING.md` - Complete security hardening guide
- `ROOT-DIRECTORY-SECURITY-ANALYSIS.md` - Root directory security analysis
- `rotate-credentials.sh` - Automated credential rotation script
- `scan-root-directory.sh` - Malware scanner
- `fix-critical-permissions.sh` - Permission fixer
- `cpanel-security-commands.sh` - Command reference

### Secure Configuration Files (UPDATED):
- `.htaccess` (root) - Force HTTPS, remove www, security headers
- `public/.htaccess` - Laravel routing + enhanced security
- `.env.example` - Production-ready template

### What's NOT Included (Intentionally):
- `.env` - Your actual credentials (must be manually created/updated)
- Vendor files - Will be installed via composer on server

---

## 🚀 DEPLOYMENT METHODS

Choose ONE of these methods:

---

## METHOD 1: GitHub to cPanel Direct Upload (RECOMMENDED - Easiest)

### Step 1: Merge Security Branch on GitHub

1. **Go to GitHub:**
   - Visit: https://github.com/OrionCCDev/Oweb
   - Click "Pull requests" tab

2. **Create Pull Request:**
   - Click "New pull request"
   - Base: `main`
   - Compare: `claude/secure-htaccess-config-i2Jvi`
   - Click "Create pull request"
   - Title: "SECURITY: Deploy critical security fixes"
   - Click "Create pull request"

3. **Merge the PR:**
   - Review the changes (all security files)
   - Click "Merge pull request"
   - Click "Confirm merge"

4. **Done!** Security fixes are now on main branch

### Step 2: Download from GitHub

1. **Go to repository:**
   - Visit: https://github.com/OrionCCDev/Oweb

2. **Download ZIP:**
   - Click green "Code" button
   - Click "Download ZIP"
   - Save to your computer
   - Extract the ZIP file

### Step 3: Upload to cPanel

1. **Login to cPanel**

2. **Open File Manager:**
   - cPanel → Files → File Manager
   - Navigate to `public_html`

3. **Backup Current Files:**
   - Select all files in public_html
   - Click "Compress"
   - Create: `backup-before-security-fix-$(date).tar.gz`
   - Download backup to your computer

4. **Upload Security Scripts:**
   Upload these files to `/home/orionccc/` (your home directory, NOT public_html):
   - `rotate-credentials.sh`
   - `scan-root-directory.sh`
   - `fix-critical-permissions.sh`
   - `cpanel-security-commands.sh`

5. **Upload Documentation:**
   Upload to `/home/orionccc/public_html/` (or wherever you want to keep docs):
   - `START-HERE-SECURITY-EMERGENCY.md`
   - `URGENT-ROTATE-CREDENTIALS.md`
   - `SECURITY_HARDENING.md`
   - `ROOT-DIRECTORY-SECURITY-ANALYSIS.md`

6. **Deploy Secure .htaccess Files:**
   - **IMPORTANT:** Read the malicious .htaccess FIRST before replacing
   - Upload `.htaccess` to `/home/orionccc/public_html/`
   - Upload `public/.htaccess` to `/home/orionccc/public_html/public/`
   - Click "Overwrite" when asked

7. **Update .env.example (for reference):**
   - Upload `.env.example` to `/home/orionccc/public_html/`

### Step 4: Set Script Permissions

In cPanel Terminal:

```bash
# Make scripts executable
chmod +x ~/rotate-credentials.sh
chmod +x ~/scan-root-directory.sh
chmod +x ~/fix-critical-permissions.sh
chmod +x ~/cpanel-security-commands.sh
```

---

## METHOD 2: Git Clone/Pull on Server (Advanced)

If your cPanel has Git installed:

### Step 1: SSH into your server or use cPanel Terminal

### Step 2: Clone or Pull Repository

**If repository doesn't exist on server:**
```bash
cd ~
git clone https://github.com/OrionCCDev/Oweb.git oweb-security
cd oweb-security
git checkout main
```

**If repository already exists:**
```bash
cd ~/oweb  # Or wherever your repo is
git fetch origin
git checkout main
git pull origin main
```

### Step 3: Copy Files to Production

```bash
# Copy scripts to home directory
cp rotate-credentials.sh ~/
cp scan-root-directory.sh ~/
cp fix-critical-permissions.sh ~/
cp cpanel-security-commands.sh ~/

# Make executable
chmod +x ~/*.sh

# Copy secure .htaccess files (AFTER backing up current ones)
cp .htaccess ~/public_html/.htaccess.new
cp public/.htaccess ~/public_html/public/.htaccess.new

# Copy documentation
cp *.md ~/public_html/docs/  # Or wherever you want them
```

### Step 4: Deploy .htaccess (carefully)

```bash
cd ~/public_html

# Backup current .htaccess
cp .htaccess .htaccess.BACKUP-$(date +%Y%m%d)

# Review new .htaccess
cat .htaccess.new

# If looks good, deploy it
mv .htaccess.new .htaccess

# Same for public directory
cd ~/public_html/public
cp .htaccess .htaccess.BACKUP-$(date +%Y%m%d)
mv .htaccess.new .htaccess
```

---

## METHOD 3: Manual File Upload via FTP (If Git/File Manager Don't Work)

### Use FileZilla or any FTP client:

1. Connect to your server
2. Upload files as described in Method 1, Step 3
3. Set permissions via FTP client

---

## ⚡ AFTER DEPLOYMENT: IMMEDIATE ACTIONS

Once files are uploaded, run these in **cPanel Terminal** in this exact order:

### 1. Fix Critical Permissions (5 minutes)
```bash
cd ~
bash fix-critical-permissions.sh
```

This fixes:
- 0777 permissions on access-logs and www
- Sets proper permissions for public_html
- Secures .env file

### 2. Run Security Scan (10 minutes)
```bash
bash scan-root-directory.sh
```

This scans for:
- Malware signatures
- Backdoor files
- amp.php from .htaccess attack
- Suspicious files

### 3. Rotate .env Credentials (10 minutes)
```bash
cd ~/public_html
bash rotate-credentials.sh
```

**BUT FIRST:**
- Go to cPanel → MySQL Databases
- Change password for user: `orionccc_ahmdsyd`
- Remember the new password
- Use it when the script asks

### 4. Remove Malicious Files

After scan completes, if it finds:

**amp.php:**
```bash
rm ~/public_html/amp.php
```

**.htaccess.no_htaccess.phpupgrader:**
```bash
# View it first
cat ~/.htaccess.no_htaccess.phpupgrader
# If suspicious, delete
rm ~/.htaccess.no_htaccess.phpupgrader
```

**Other malware:**
- Review scan report
- Delete files identified as malicious

### 5. Test Website

```bash
# Check if website loads
curl -I https://orioncc.com

# Check database connection
cd ~/public_html
php artisan db:show
```

Visit your website:
- https://orioncc.com
- Verify it loads properly
- Check HTTPS is working
- Test login functionality

---

## 📊 VERIFICATION CHECKLIST

After deployment, verify everything is working:

- [ ] Website loads at https://orioncc.com
- [ ] HTTPS is enforced (http:// redirects to https://)
- [ ] www is removed (www.orioncc.com redirects to orioncc.com)
- [ ] No 0777 permissions remain (`find ~ -perm 0777`)
- [ ] .env file has new APP_KEY
- [ ] Database connection works
- [ ] No amp.php file exists
- [ ] No malware found in scan
- [ ] Security scripts are executable
- [ ] All passwords have been changed

---

## 🔧 TROUBLESHOOTING

### Website Shows 500 Error

```bash
# Check Laravel logs
tail -50 ~/public_html/storage/logs/laravel.log

# Check Apache error logs
tail -50 ~/public_html/error_log

# Common fixes:
cd ~/public_html
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

### Database Connection Fails

```bash
# Verify credentials in .env
cd ~/public_html
grep "^DB_" .env

# Test connection
php artisan db:show

# If fails, edit .env:
nano .env
# Update DB_PASSWORD with your new password
```

### Scripts Won't Run

```bash
# Make executable
chmod +x ~/rotate-credentials.sh
chmod +x ~/scan-root-directory.sh
chmod +x ~/fix-critical-permissions.sh

# Run with bash explicitly
bash ~/rotate-credentials.sh
```

### .htaccess Causes Errors

```bash
# Restore backup
cd ~/public_html
cp .htaccess.BACKUP-* .htaccess

# Check Apache error log
tail -50 error_log
```

---

## 🚨 IF SOMETHING BREAKS

### Emergency Rollback:

1. **Restore .htaccess from backup:**
   ```bash
   cd ~/public_html
   cp .htaccess.BACKUP-* .htaccess
   cp public/.htaccess.BACKUP-* public/.htaccess
   ```

2. **Restore full backup (if needed):**
   ```bash
   cd ~/public_html
   # Extract your backup
   tar -xzf backup-before-security-fix-*.tar.gz
   ```

3. **Contact your hosting provider** if site is completely down

---

## 📝 POST-DEPLOYMENT TASKS

### Today:

1. **Change ALL passwords:**
   - cPanel password
   - Database password (already done in step 3)
   - FTP accounts
   - Email accounts
   - Admin user in application

2. **Enable ModSecurity:**
   - cPanel → Security → ModSecurity
   - Enable for your domain

3. **Review FTP Accounts:**
   - cPanel → FTP Accounts
   - Delete any unknown accounts

4. **Configure Production Email:**
   - Get SMTP settings from cPanel → Email Accounts
   - Update .env with real SMTP settings (not log)

### This Week:

5. **Fix GitHub Dependabot Vulnerabilities:**
   ```bash
   cd ~/public_html
   composer update --no-dev
   ```

6. **Set up File Integrity Monitoring:**
   ```bash
   # Create checksums
   find ~/public_html -name "*.php" -exec md5sum {} \; > ~/file-checksums.txt
   ```

7. **Schedule Regular Scans:**
   - Add to cron: `0 9 * * * ~/scan-root-directory.sh > ~/daily-scan.log`

---

## 📚 REFERENCE FILES

After deployment, read these in order:

1. **START-HERE-SECURITY-EMERGENCY.md** - Overall emergency response plan
2. **URGENT-ROTATE-CREDENTIALS.md** - Detailed credential rotation steps
3. **ROOT-DIRECTORY-SECURITY-ANALYSIS.md** - Root directory threats
4. **SECURITY_HARDENING.md** - Complete hardening procedures

---

## ✅ DEPLOYMENT COMPLETE!

Once you've completed all steps:

1. All security files deployed ✅
2. Scripts executable ✅
3. Permissions fixed ✅
4. Malware scanned ✅
5. Credentials rotated ✅
6. Website verified working ✅

**Your website should now be significantly more secure!**

---

## 🆘 NEED HELP?

If you encounter issues during deployment:

1. **Check the logs:**
   - `~/public_html/storage/logs/laravel.log`
   - `~/public_html/error_log`
   - Scan reports: `~/root-security-scan-*.txt`

2. **Common issues are covered in Troubleshooting section above**

3. **Contact your hosting provider** for server-level issues

4. **Professional security help:**
   - Sucuri: https://sucuri.net
   - Imunify360 (if available in cPanel)

---

## 📊 SUMMARY

**Branch to deploy:** `main` (after merging `claude/secure-htaccess-config-i2Jvi`)

**Files to upload:** 8 security scripts + 4 documentation files + 2 .htaccess files

**Time required:** 30-45 minutes total

**Critical order:**
1. Backup everything
2. Upload files
3. Fix permissions
4. Scan for malware
5. Rotate credentials
6. Test website

**You've got this! Follow the steps carefully and your site will be secure.**
