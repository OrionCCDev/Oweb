# Root Directory Security Analysis

Based on the cPanel File Manager screenshots from `/home1/orionccc/`, I've identified critical security vulnerabilities and suspicious files.

---

## 🚨 CRITICAL SECURITY THREATS

### 1. DANGEROUS FILE PERMISSIONS (IMMEDIATE FIX REQUIRED)

**CRITICAL: 0777 Permissions Detected**

```
access-logs/     0777  ← SEVERE SECURITY RISK
www/             0777  ← SEVERE SECURITY RISK
```

**Why 0777 is dangerous:**
- Anyone on the server can read, write, and execute
- Hackers can modify files
- Malware can inject code
- Complete loss of access control

**IMMEDIATE FIX (cPanel Terminal):**

```bash
# Fix access-logs permissions
chmod 750 ~/access-logs
find ~/access-logs -type f -exec chmod 640 {} \;

# Fix www directory (should be symlink to public_html)
ls -la ~/www
# If it's a directory, remove it (it should be a symlink)
# If it's a symlink, fix permissions:
chmod 755 ~/www
```

---

### 2. SUSPICIOUS FILES REQUIRING INVESTIGATION

#### A. .htaccess.no_htaccess.phpupgrader

```
File: .htaccess.no_htaccess.phpupgrader
Modified: Aug 8, 2018
Permissions: 0200 (write-only)
Size: 1 byte
```

**Suspicion Level:** 🔴 **HIGH**

**Why suspicious:**
- Unusual filename pattern
- Related to PHP upgrader (could be backdoor)
- Write-only permissions (0200) is abnormal
- Very small file size (1 byte)

**CHECK IT NOW:**

```bash
# View file content
cat ~/.htaccess.no_htaccess.phpupgrader

# Check if it's being used
lsof ~/.htaccess.no_htaccess.phpupgrader

# Check what created it
ls -la ~/.htaccess.no_htaccess.phpupgrader

# Safe to delete if it's just a flag file
# But CHECK FIRST before deleting
```

#### B. scanreport.txt Files

```
scanreport.txt                854 bytes    Dec 24, 2024
scanreport.txt.1735028274     968 KB       Dec 24, 2024
```

**Suspicion Level:** 🟡 **MEDIUM**

**Possible scenarios:**
1. Legitimate security scan from cPanel/Imunify
2. Malware scan report
3. Attacker's reconnaissance report

**CHECK CONTENTS:**

```bash
# Read the reports
cat ~/scanreport.txt
head -50 ~/scanreport.txt.1735028274

# Check who created them
ls -la ~/scanreport.txt*

# Search for what created them
grep -r "scanreport" ~/public_html --include="*.php" --exclude-dir=vendor
```

#### C. .lastlogin

```
Modified: Today, 8:45 AM
Permissions: 0600
```

**Suspicion Level:** 🟢 **LOW** (but monitor)

**Why to monitor:**
- Recently accessed (today)
- Could indicate recent login activity
- Check if login time matches your activity

**CHECK:**

```bash
# View login information
cat ~/.lastlogin

# Check recent logins
last -n 20

# Check failed login attempts
lastb -n 20
```

---

## 📋 UNNECESSARY/OLD FILES TO REVIEW

### Files from 2017-2018 (Likely Safe to Remove)

```bash
# Check and remove old spam filter flags (from 2017)
rm ~/.spamassassinenable
rm ~/.spamboxenable

# Old PHP upgrader file (verify first)
# cat ~/.htaccess.no_htaccess.phpupgrader
# rm ~/.htaccess.no_htaccess.phpupgrader
```

---

## 🔍 FULL SECURITY SCAN COMMANDS

Run these commands in cPanel Terminal to investigate:

### Step 1: Check File Permissions

```bash
# Find all 0777 (world-writable) files/folders
find ~ -perm 0777 -ls

# Find all files with unusual permissions
find ~ -perm 0666 -o -perm 0777 -ls

# Find SUID files (can be dangerous)
find ~ -perm /4000 -ls
```

### Step 2: Check Recently Modified Files

```bash
# Files modified in last 7 days
find ~/public_html -type f -mtime -7 -ls | head -50

# Files modified today
find ~ -type f -mtime 0 -ls | grep -v ".cache\|.local\|.cpanel"

# Files modified in last 24 hours in public_html
find ~/public_html -type f -mmin -1440 -ls
```

### Step 3: Search for Malware Signatures

```bash
cd ~/public_html

# Find eval( functions
grep -r "eval(" . --include="*.php" --exclude-dir=vendor | head -20

# Find base64_decode (often used in malware)
grep -r "base64_decode" . --include="*.php" --exclude-dir=vendor | head -20

# Find gzinflate (compression used in malware)
grep -r "gzinflate" . --include="*.php" --exclude-dir=vendor | head -20

# Find shell execution functions
grep -r "shell_exec\|exec(\|system(\|passthru" . --include="*.php" --exclude-dir=vendor | head -20

# Find hidden PHP files (starting with .)
find . -name ".*.php" -type f
```

### Step 4: Check for Backdoor Files

```bash
# Common backdoor filenames
find ~/public_html -name "c99.php" -o -name "r57.php" -o -name "shell.php" -o -name "backdoor.php" -o -name "wso.php"

# PHP files in uploads directories
find ~/public_html -path "*/uploads/*.php" -o -path "*/images/*.php" -o -path "*/temp/*.php"

# Suspiciously named files
find ~/public_html -name "*.php.*" -o -name "*~" -o -name "*.bak.php"
```

### Step 5: Review scanreport.txt Contents

```bash
# Check what the scan found
echo "=== Main Scan Report ==="
cat ~/scanreport.txt

echo ""
echo "=== Detailed Scan Report (first 100 lines) ==="
head -100 ~/scanreport.txt.1735028274

# Search for malware indicators in report
grep -i "malware\|infected\|backdoor\|suspicious\|threat" ~/scanreport.txt*
```

---

## ⚠️ FOLDERS TO SECURE

### public_ftp Directory

```
Last Modified: Dec 28, 2025
Type: publicftp
Permissions: 0755
```

**Security Concern:**
- FTP is less secure than SFTP/SSH
- If not needed, disable it
- Check what's inside

**COMMANDS:**

```bash
# Check contents
ls -la ~/public_ftp/

# Check if FTP is actually being used
cat ~/.ftpquota

# If not needed, disable in cPanel > FTP Accounts
```

---

## 🔒 RECOMMENDED SECURITY ACTIONS

### IMMEDIATE (Do Now):

1. **Fix 0777 permissions:**
   ```bash
   chmod 750 ~/access-logs
   chmod 755 ~/www
   find ~ -perm 0777 -exec chmod 755 {} \;
   ```

2. **Read scanreport.txt:**
   ```bash
   cat ~/scanreport.txt
   head -100 ~/scanreport.txt.1735028274
   ```

3. **Check suspicious file:**
   ```bash
   cat ~/.htaccess.no_htaccess.phpupgrader
   file ~/.htaccess.no_htaccess.phpupgrader
   ```

4. **Review recent logins:**
   ```bash
   cat ~/.lastlogin
   last -n 20
   ```

### TODAY:

5. **Run full malware scan** (use commands from Step 3 above)

6. **Review access logs:**
   ```bash
   # Check for suspicious access patterns
   tail -100 ~/access-logs/orioncc.com
   grep -i "POST" ~/access-logs/orioncc.com | tail -50
   ```

7. **Clean up old files:**
   ```bash
   # After verifying they're safe to delete
   rm ~/.spamassassinenable
   rm ~/.spamboxenable
   ```

### THIS WEEK:

8. **Disable FTP if not needed** (use SFTP instead)
   - cPanel > FTP Accounts > Remove unnecessary accounts

9. **Set up file integrity monitoring:**
   ```bash
   # Create checksums of critical files
   find ~/public_html -name "*.php" -type f -exec md5sum {} \; > ~/file-checksums.txt
   ```

10. **Review all cPanel users:**
    - cPanel > User Manager
    - Remove unknown users

---

## 📊 DIRECTORY STRUCTURE ANALYSIS

### ✅ NORMAL/EXPECTED:

```
.cache/          ← Cache directory (normal)
.config/         ← Configuration files (normal)
.cpanel/         ← cPanel settings (normal)
.ssh/            ← SSH keys (normal, keep secure)
bin/             ← User binaries (normal)
etc/             ← Configuration files (normal)
logs/            ← Log files (normal)
mail/            ← Email storage (normal)
public_html/     ← Website root (normal)
ssl/             ← SSL certificates (normal)
tmp/             ← Temporary files (normal)
```

### ⚠️ REVIEW REQUIRED:

```
.htpasswds/      ← Check for unauthorized password files
.security/       ← Check what's inside
access-logs/     ← FIX PERMISSIONS (0777 is dangerous)
public_ftp/      ← Consider disabling FTP
www/             ← FIX PERMISSIONS (should be symlink, not 0777)
```

### 🔴 SUSPICIOUS/INVESTIGATE:

```
.htaccess.no_htaccess.phpupgrader  ← Investigate immediately
scanreport.txt files               ← Read contents
.lastlogin (modified today)        ← Verify it's your login
```

---

## 🛡️ PREVENTION MEASURES

### 1. Set Correct Default Permissions

```bash
# Set default umask for new files
echo "umask 022" >> ~/.bashrc
source ~/.bashrc

# Fix current permissions
find ~/public_html -type d -exec chmod 755 {} \;
find ~/public_html -type f -exec chmod 644 {} \;
```

### 2. Monitor File Changes

```bash
# Create daily monitoring script
cat > ~/check-changes.sh <<'SCRIPT'
#!/bin/bash
# Check for files modified in last 24 hours
echo "=== Files Modified in Last 24 Hours ==="
find ~/public_html -type f -mtime 0 -ls | grep -v ".cache\|.log"

echo ""
echo "=== New .htaccess Files ==="
find ~ -name ".htaccess" -mtime -7 -ls

echo ""
echo "=== World-Writable Files ==="
find ~ -perm 0777 -ls
SCRIPT

chmod +x ~/check-changes.sh

# Run it daily
# Add to cron: 0 9 * * * ~/check-changes.sh > ~/daily-security-check.log
```

### 3. Lock Down Critical Directories

```bash
# Prevent PHP execution in uploads
# (Already in your new .htaccess - deploy it!)

# Make .env read-only after editing
chmod 400 ~/public_html/.env

# Protect configuration files
chmod 644 ~/public_html/config/*.php
```

---

## 📝 ACTION CHECKLIST

Use this checklist to track your security review:

- [ ] Fix access-logs permissions (0777 → 0750)
- [ ] Fix www permissions (0777 → 0755)
- [ ] Read scanreport.txt contents
- [ ] Investigate .htaccess.no_htaccess.phpupgrader file
- [ ] Review .lastlogin for unauthorized access
- [ ] Run malware scan (grep commands above)
- [ ] Check for backdoor files
- [ ] Review public_ftp usage
- [ ] Remove old spam filter files (.spamassassinenable, .spamboxenable)
- [ ] Set up file integrity monitoring
- [ ] Review all FTP accounts
- [ ] Deploy secure .htaccess from repository
- [ ] Set correct default permissions (umask)

---

## 🆘 IF YOU FIND MALWARE

If the scans above find malware:

1. **Don't delete immediately** - document what you find
2. **Create backup** before removing
3. **Check database** for injected code
4. **Review access logs** to find entry point
5. **Change ALL passwords** after cleanup
6. **Consider professional help** (Sucuri, Imunify360)

---

## NEXT STEPS

1. **Run the immediate commands** (fix 0777 permissions)
2. **Read scanreport.txt** to see what was found
3. **Investigate suspicious files**
4. **Report findings** and we'll create removal plan

After you run these commands, share the results and I'll help you interpret them and create a cleanup plan.
