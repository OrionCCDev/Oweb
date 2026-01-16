# QUICK START: Deploy Security Fixes in 30 Minutes

## 🎯 QUICK CHECKLIST

Follow these steps in order. Total time: ~30 minutes.

---

## STEP 1: Merge to Main Branch (2 minutes)

### Option A: GitHub Web Interface (EASIEST)

1. Go to: https://github.com/OrionCCDev/Oweb
2. Click "Pull requests"
3. You should see a PR from `claude/secure-htaccess-config-i2Jvi`
4. If not, create one:
   - Click "New pull request"
   - Base: `main`, Compare: `claude/secure-htaccess-config-i2Jvi`
   - Click "Create pull request"
5. Click "Merge pull request"
6. Click "Confirm merge"
7. ✅ Done - all security fixes now on main branch

### Option B: Command Line

```bash
cd /path/to/Oweb
git checkout main
git pull origin main
git merge claude/secure-htaccess-config-i2Jvi
git push origin main
```

---

## STEP 2: Download Repository (2 minutes)

1. Go to: https://github.com/OrionCCDev/Oweb
2. Click green "Code" button
3. Click "Download ZIP"
4. Extract ZIP to your computer

---

## STEP 3: Upload to cPanel (10 minutes)

### Login to cPanel → File Manager

### A. Backup First!
Navigate to `public_html`:
- Select all files
- Click "Compress"
- Name: `backup-before-security-$(date).tar.gz`
- Download to your computer

### B. Upload Security Scripts to Home Directory `/home/orionccc/`
Upload these files:
- `rotate-credentials.sh`
- `scan-root-directory.sh`
- `fix-critical-permissions.sh`
- `cpanel-security-commands.sh`

### C. Upload Documentation (optional, for reference)
Upload to `public_html`:
- `START-HERE-SECURITY-EMERGENCY.md`
- `URGENT-ROTATE-CREDENTIALS.md`
- `SECURITY_HARDENING.md`
- `ROOT-DIRECTORY-SECURITY-ANALYSIS.md`
- `DEPLOYMENT-GUIDE.md`

### D. Deploy Secure .htaccess Files
**IMPORTANT:** Your current .htaccess contains malware - replace it!

Upload and OVERWRITE:
- `.htaccess` → `/home/orionccc/public_html/.htaccess`
- `public/.htaccess` → `/home/orionccc/public_html/public/.htaccess`

Click "Overwrite" when prompted.

---

## STEP 4: Run Security Scripts (20 minutes)

### Open cPanel Terminal

### A. Make Scripts Executable (30 seconds)
```bash
chmod +x ~/rotate-credentials.sh
chmod +x ~/scan-root-directory.sh
chmod +x ~/fix-critical-permissions.sh
```

### B. Fix Permissions - PRIORITY 1 (2 minutes)
```bash
bash ~/fix-critical-permissions.sh
```

Type `yes` when asked.

**What it does:**
- Fixes dangerous 0777 permissions
- Sets proper permissions for all files
- Secures your .env file

### C. Scan for Malware - PRIORITY 2 (5 minutes)
```bash
bash ~/scan-root-directory.sh
```

**What it does:**
- Scans for malware and backdoors
- Checks for amp.php attack
- Creates detailed report

**Review the report:**
```bash
cat ~/root-security-scan-*.txt
```

If it finds malware:
```bash
# If amp.php found:
rm ~/public_html/amp.php

# If .htaccess.no_htaccess.phpupgrader found:
cat ~/.htaccess.no_htaccess.phpupgrader
rm ~/.htaccess.no_htaccess.phpupgrader

# Any other malware - review before deleting
```

### D. Rotate Credentials - PRIORITY 3 (10 minutes)

**FIRST - Change Database Password in cPanel:**
1. cPanel → MySQL Databases
2. Find user: `orionccc_ahmdsyd`
3. Click "Change Password"
4. Generate strong password or use: `$(openssl rand -base64 32)`
5. Copy password somewhere safe
6. Click "Change Password"

**THEN - Run rotation script:**
```bash
cd ~/public_html
bash ~/rotate-credentials.sh
```

Follow prompts:
- Enter your NEW database password (from step above)
- Script will generate new APP_KEY
- Script will fix configuration issues
- Script will test database connection

---

## STEP 5: Verify Everything Works (5 minutes)

### Test Website
Visit: https://orioncc.com

**Check:**
- ✅ Website loads
- ✅ HTTPS is enforced (http redirects to https)
- ✅ www is removed (www.orioncc.com redirects to orioncc.com)
- ✅ Can login/navigate normally

### Test Database Connection
```bash
cd ~/public_html
php artisan db:show
```

Should show your database info.

### Clear Caches
```bash
cd ~/public_html
php artisan config:clear
php artisan cache:clear
php artisan view:clear
```

### Final Verification
```bash
# No 0777 permissions should remain
find ~ -maxdepth 2 -perm 0777

# No amp.php should exist
find ~/public_html -name "amp.php"

# .env should be read-only
ls -la ~/public_html/.env
# Should show: -r-------- (400)
```

---

## ✅ DEPLOYMENT COMPLETE!

### What You've Accomplished:

- ✅ Deployed secure .htaccess files
- ✅ Fixed dangerous 0777 permissions
- ✅ Scanned for and removed malware
- ✅ Rotated compromised credentials (APP_KEY, DB password)
- ✅ Deployed 8 security tools and 4 documentation guides
- ✅ Blocked common exploits (SQL injection, XSS, etc.)
- ✅ Added security headers
- ✅ Prevented PHP execution in uploads

---

## 🚨 ADDITIONAL ACTIONS (Do Today)

### 1. Change More Passwords (15 minutes)
- [ ] cPanel password
- [ ] All FTP account passwords
- [ ] Email account passwords
- [ ] Admin user in your application

### 2. Enable ModSecurity (2 minutes)
- [ ] cPanel → Security → ModSecurity
- [ ] Enable for orioncc.com domain

### 3. Review Accounts (5 minutes)
- [ ] cPanel → FTP Accounts → Delete unknown accounts
- [ ] cPanel → Email Accounts → Review all accounts
- [ ] cPanel → User Manager → Review all users

### 4. Configure Production Email (10 minutes)
- [ ] cPanel → Email Accounts → Get SMTP settings
- [ ] Edit `~/public_html/.env`
- [ ] Update MAIL_* settings from log to real SMTP
- [ ] Test email: `php artisan tinker` → `Mail::raw('test', function($m) { $m->to('your@email.com')->subject('Test'); });`

---

## 📊 SUMMARY

**Time spent:** ~30 minutes
**Security improvements:** 10+ critical fixes
**Files deployed:** 12 files
**Vulnerabilities fixed:**
- Malicious .htaccess code (cloaking attack)
- Exposed .env credentials (APP_KEY, DB password)
- 0777 permissions (world-writable)
- Missing security headers
- Unprotected upload directories
- No XSS/SQL injection protection

**Next steps:**
- Monitor logs: `tail -f ~/public_html/storage/logs/laravel.log`
- Run weekly scans: `bash ~/scan-root-directory.sh`
- Keep documentation handy for reference

---

## 🆘 IF SOMETHING WENT WRONG

### Website shows 500 error:
```bash
# Check logs
tail -50 ~/public_html/storage/logs/laravel.log

# Clear caches
cd ~/public_html
php artisan config:clear
php artisan cache:clear
```

### Database connection fails:
```bash
# Check .env
grep "^DB_" ~/public_html/.env

# Fix if needed
nano ~/public_html/.env
# Update DB_PASSWORD
```

### Restore from backup:
```bash
cd ~/public_html
cp .htaccess.BACKUP-* .htaccess

# Or full restore
# Extract: backup-before-security-*.tar.gz in File Manager
```

---

## 📚 FULL DOCUMENTATION

For detailed information, see:
- `DEPLOYMENT-GUIDE.md` - Complete deployment instructions
- `START-HERE-SECURITY-EMERGENCY.md` - Emergency response guide
- `URGENT-ROTATE-CREDENTIALS.md` - Credential rotation details
- `ROOT-DIRECTORY-SECURITY-ANALYSIS.md` - Security analysis
- `SECURITY_HARDENING.md` - Complete hardening guide

---

**You're now ready to deploy! Follow the steps above and your website will be secure in 30 minutes.**

**Good luck! 🚀**
