#!/bin/bash
# CPanel Security Commands - Run these in your cPanel Terminal
# DO NOT run this script directly - copy and paste commands one by one

echo "=========================================="
echo "WEBSITE SECURITY AUDIT COMMANDS"
echo "=========================================="
echo ""
echo "Run these commands ONE BY ONE in cPanel Terminal"
echo "Review the output of each command before proceeding"
echo ""

# ==========================================
# STEP 1: FIND MALICIOUS FILES
# ==========================================

echo "STEP 1: FIND ALL .htaccess FILES"
echo "Command: find ~/public_html -name '.htaccess' -type f"
echo ""

echo "STEP 2: SEARCH FOR amp.php REFERENCES"
echo "Command: grep -r 'amp.php' ~/public_html --exclude-dir=vendor --exclude-dir=node_modules"
echo ""

echo "STEP 3: FIND amp.php FILE"
echo "Command: find ~/public_html -name 'amp.php' -type f"
echo ""

echo "STEP 4: FIND RECENTLY MODIFIED PHP FILES (last 7 days)"
echo "Command: find ~/public_html -name '*.php' -type f -mtime -7 | xargs ls -ltr"
echo ""

echo "STEP 5: SEARCH FOR COMMON MALWARE PATTERNS"
echo "Command: grep -r 'eval(base64_decode' ~/public_html --include='*.php' --exclude-dir=vendor | head -20"
echo "Command: grep -r 'eval(gzinflate' ~/public_html --include='*.php' --exclude-dir=vendor | head -20"
echo "Command: grep -r 'shell_exec' ~/public_html --include='*.php' --exclude-dir=vendor | head -20"
echo "Command: grep -r 'system(' ~/public_html --include='*.php' --exclude-dir=vendor | head -20"
echo ""

# ==========================================
# STEP 2: CHECK SUSPICIOUS FILES
# ==========================================

echo "STEP 6: CHECK IF amp.php EXISTS (run only if found in step 3)"
echo "Command: cat ~/public_html/amp.php"
echo ""

echo "STEP 7: CHECK MALICIOUS .htaccess CONTENT"
echo "Command: cat ~/public_html/.htaccess | grep -A 5 'amp.php'"
echo ""

# ==========================================
# STEP 3: BACKUP BEFORE CLEANING
# ==========================================

echo "STEP 8: CREATE BACKUP"
echo "Command: cd ~ && tar -czf backup-before-cleaning-$(date +%Y%m%d-%H%M).tar.gz public_html/"
echo "Command: ls -lh backup-before-cleaning-*.tar.gz"
echo ""

# ==========================================
# STEP 4: REMOVE MALICIOUS FILES
# ==========================================

echo "STEP 9: REMOVE amp.php (ONLY if confirmed malicious)"
echo "Command: rm -f ~/public_html/amp.php"
echo "VERIFY: find ~/public_html -name 'amp.php'"
echo ""

echo "STEP 10: REMOVE OTHER SUSPICIOUS FILES (replace filename.php with actual file)"
echo "Command: rm -f ~/public_html/suspicious-file.php"
echo ""

# ==========================================
# STEP 5: FIX FILE PERMISSIONS
# ==========================================

echo "STEP 11: SET SECURE FILE PERMISSIONS"
echo "Command: cd ~/public_html && find . -type d -exec chmod 755 {} \;"
echo "Command: cd ~/public_html && find . -type f -exec chmod 644 {} \;"
echo ""

echo "STEP 12: SET LARAVEL STORAGE PERMISSIONS"
echo "Command: cd ~/public_html && chmod -R 775 storage bootstrap/cache 2>/dev/null || true"
echo ""

echo "STEP 13: CHECK FOR WORLD-WRITABLE FILES (security risk)"
echo "Command: find ~/public_html -type f -perm 0777"
echo "Command: find ~/public_html -type d -perm 0777"
echo ""

# ==========================================
# STEP 6: DEPLOY SECURE .htaccess
# ==========================================

echo "STEP 14: BACKUP CURRENT .htaccess FILES"
echo "Command: cp ~/public_html/.htaccess ~/public_html/.htaccess.backup-$(date +%Y%m%d)"
echo "Command: cp ~/public_html/public/.htaccess ~/public_html/public/.htaccess.backup-$(date +%Y%m%d)"
echo ""

echo "STEP 15: UPLOAD SECURE .htaccess FILES FROM YOUR REPOSITORY"
echo "Use cPanel File Manager or FTP to upload:"
echo "  - .htaccess to ~/public_html/"
echo "  - public/.htaccess to ~/public_html/public/"
echo ""

# ==========================================
# STEP 7: SECURITY AUDIT
# ==========================================

echo "STEP 16: CHECK CRON JOBS FOR SUSPICIOUS ENTRIES"
echo "Command: crontab -l"
echo ""

echo "STEP 17: LIST ALL FILES IN UPLOADS DIRECTORY"
echo "Command: ls -la ~/public_html/public/uploads/ 2>/dev/null || ls -la ~/public_html/uploads/"
echo ""

echo "STEP 18: CHECK RECENT ACCESS LOGS FOR SUSPICIOUS ACTIVITY"
echo "Command: tail -100 ~/access-logs/*.log | grep -i 'amp.php'"
echo "Command: tail -100 ~/access-logs/*.log | grep -i 'POST.*\.php'"
echo ""

echo "STEP 19: CHECK FOR HIDDEN FILES"
echo "Command: find ~/public_html -name '.*' -type f | grep -v '.htaccess' | grep -v '.env'"
echo ""

# ==========================================
# STEP 8: ONGOING MONITORING
# ==========================================

echo "STEP 20: SET UP FILE INTEGRITY MONITORING (save current state)"
echo "Command: find ~/public_html -type f -name '*.php' ! -path '*/vendor/*' ! -path '*/node_modules/*' -exec md5sum {} \; > ~/php-files-checksum.txt"
echo ""

echo "STEP 21: LATER CHECK FOR CHANGES (compare checksums)"
echo "Command: find ~/public_html -type f -name '*.php' ! -path '*/vendor/*' ! -path '*/node_modules/*' -exec md5sum {} \; > ~/php-files-new.txt"
echo "Command: diff ~/php-files-checksum.txt ~/php-files-new.txt"
echo ""

# ==========================================
# SUMMARY
# ==========================================

echo ""
echo "=========================================="
echo "SUMMARY OF ACTIONS"
echo "=========================================="
echo "1. Find and review all .htaccess files"
echo "2. Search for amp.php and malicious code"
echo "3. Create backup before making changes"
echo "4. Remove malicious files"
echo "5. Fix file permissions"
echo "6. Deploy secure .htaccess configuration"
echo "7. Audit cron jobs and logs"
echo "8. Set up file monitoring"
echo ""
echo "IMPORTANT:"
echo "- Review each file before deleting"
echo "- Keep backups of everything"
echo "- Change all passwords after cleanup"
echo "- Enable ModSecurity in cPanel"
echo "- Consider professional malware scan"
echo ""

# ==========================================
# QUICK REFERENCE: COMMON CHECKS
# ==========================================

echo "=========================================="
echo "QUICK DAILY SECURITY CHECKS"
echo "=========================================="
echo ""
echo "1. Check for files modified today:"
echo "   find ~/public_html -type f -mtime -1 -name '*.php' ! -path '*/vendor/*'"
echo ""
echo "2. Verify .htaccess hasn't changed:"
echo "   ls -l ~/public_html/.htaccess ~/public_html/public/.htaccess"
echo ""
echo "3. Check error logs:"
echo "   tail -50 ~/public_html/storage/logs/laravel.log"
echo ""
echo "4. Review access logs for suspicious IPs:"
echo "   tail -100 ~/access-logs/*.log | awk '{print $1}' | sort | uniq -c | sort -rn | head"
echo ""

echo "=========================================="
echo "CPANEL SECURITY SETTINGS"
echo "=========================================="
echo ""
echo "Manual steps in cPanel interface:"
echo ""
echo "1. ENABLE MODSECURITY"
echo "   - Go to: Security > ModSecurity"
echo "   - Enable for your domain"
echo ""
echo "2. ENABLE IP BLOCKER"
echo "   - Go to: Security > IP Blocker"
echo "   - Add suspicious IPs found in logs"
echo ""
echo "3. CHANGE PASSWORDS"
echo "   - cPanel main password"
echo "   - MySQL database passwords"
echo "   - FTP account passwords"
echo ""
echo "4. REVIEW FTP ACCOUNTS"
echo "   - Go to: Files > FTP Accounts"
echo "   - Delete unknown accounts"
echo ""
echo "5. ENABLE TWO-FACTOR AUTHENTICATION"
echo "   - Go to: Security > Two-Factor Authentication"
echo "   - Set up 2FA for cPanel login"
echo ""
echo "6. SSL/TLS"
echo "   - Go to: Security > SSL/TLS Status"
echo "   - Ensure SSL is active and valid"
echo ""
echo "7. HOTLINK PROTECTION"
echo "   - Go to: Security > Hotlink Protection"
echo "   - Enable to prevent bandwidth theft"
echo ""

echo "=========================================="
echo "EMERGENCY CONTACTS"
echo "=========================================="
echo ""
echo "If you need professional help:"
echo "- Your hosting provider support"
echo "- Sucuri Security: https://sucuri.net"
echo "- Wordfence (WordPress): https://wordfence.com"
echo ""

echo "=========================================="
echo "END OF SECURITY COMMANDS"
echo "=========================================="
