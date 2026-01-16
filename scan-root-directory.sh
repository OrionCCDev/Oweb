#!/bin/bash
#
# Root Directory Security Scan Script
# Scans ~/home directory for security threats
#
# Usage: bash scan-root-directory.sh
#

echo "======================================================================"
echo "ROOT DIRECTORY SECURITY SCAN"
echo "======================================================================"
echo "Started: $(date)"
echo ""

# Colors for output
RED='\033[0;31m'
YELLOW='\033[1;33m'
GREEN='\033[0;32m'
NC='\033[0m' # No Color

# Create report file
REPORT_FILE=~/root-security-scan-$(date +%Y%m%d-%H%M%S).txt
echo "Report will be saved to: $REPORT_FILE"
echo ""

# Function to log to both screen and file
log() {
    echo "$1" | tee -a "$REPORT_FILE"
}

log "======================================================================"
log "1. CRITICAL: Checking File Permissions (0777 vulnerabilities)"
log "======================================================================"

echo -e "${YELLOW}Scanning for world-writable files (0777)...${NC}"
WRITABLE=$(find ~ -maxdepth 2 -perm 0777 2>/dev/null)

if [ -n "$WRITABLE" ]; then
    echo -e "${RED}CRITICAL: Found world-writable files/directories:${NC}"
    log "$WRITABLE"
    log ""
    log "IMMEDIATE ACTION REQUIRED:"
    log "chmod 755 ~/access-logs"
    log "chmod 755 ~/www"
else
    echo -e "${GREEN}OK: No world-writable files found at root level${NC}"
    log "OK: No 0777 permissions found"
fi
log ""

log "======================================================================"
log "2. Checking Suspicious Files"
log "======================================================================"

# Check .htaccess.no_htaccess.phpupgrader
if [ -f ~/.htaccess.no_htaccess.phpupgrader ]; then
    echo -e "${RED}SUSPICIOUS: Found .htaccess.no_htaccess.phpupgrader${NC}"
    log "File: ~/.htaccess.no_htaccess.phpupgrader"
    log "Size: $(stat -f%z ~/.htaccess.no_htaccess.phpupgrader 2>/dev/null || stat -c%s ~/.htaccess.no_htaccess.phpupgrader)"
    log "Permissions: $(stat -f%Lp ~/.htaccess.no_htaccess.phpupgrader 2>/dev/null || stat -c%a ~/.htaccess.no_htaccess.phpupgrader)"
    log "Content:"
    cat ~/.htaccess.no_htaccess.phpupgrader | tee -a "$REPORT_FILE"
    log ""
else
    log "OK: .htaccess.no_htaccess.phpupgrader not found"
fi

# Check scanreport files
if [ -f ~/scanreport.txt ]; then
    echo -e "${YELLOW}Found scanreport.txt - Reading first 50 lines...${NC}"
    log "=== scanreport.txt (first 50 lines) ==="
    head -50 ~/scanreport.txt | tee -a "$REPORT_FILE"
    log ""

    # Search for malware indicators
    echo "Searching for malware indicators in scanreport..."
    MALWARE_FOUND=$(grep -i "malware\|infected\|backdoor\|suspicious\|threat\|virus" ~/scanreport.txt 2>/dev/null)
    if [ -n "$MALWARE_FOUND" ]; then
        echo -e "${RED}WARNING: Malware indicators found in scan report:${NC}"
        log "MALWARE INDICATORS:"
        log "$MALWARE_FOUND"
    fi
    log ""
fi

if [ -f ~/scanreport.txt.1735028274 ]; then
    echo -e "${YELLOW}Found scanreport.txt.1735028274${NC}"
    log "=== scanreport.txt.1735028274 (first 100 lines) ==="
    head -100 ~/scanreport.txt.1735028274 | tee -a "$REPORT_FILE"
    log ""
fi

log "======================================================================"
log "3. Checking Recently Modified Files"
log "======================================================================"

echo "Files modified in last 24 hours (excluding cache/logs)..."
RECENT=$(find ~/public_html -type f -mtime 0 2>/dev/null | grep -v ".cache\|.log\|/storage/logs\|/storage/framework" | head -20)
if [ -n "$RECENT" ]; then
    log "$RECENT"
else
    log "No recently modified files in public_html"
fi
log ""

log "======================================================================"
log "4. Scanning for Malware Signatures in public_html"
log "======================================================================"

cd ~/public_html

# Check for eval(
echo -e "${YELLOW}Searching for eval() functions...${NC}"
EVAL_FOUND=$(grep -r "eval(" . --include="*.php" --exclude-dir=vendor 2>/dev/null | head -10)
if [ -n "$EVAL_FOUND" ]; then
    echo -e "${RED}WARNING: Found eval() usage (may be malware):${NC}"
    log "EVAL() FUNCTIONS FOUND:"
    log "$EVAL_FOUND"
    log ""
else
    log "OK: No suspicious eval() found"
fi

# Check for base64_decode
echo -e "${YELLOW}Searching for base64_decode...${NC}"
BASE64_FOUND=$(grep -r "base64_decode" . --include="*.php" --exclude-dir=vendor 2>/dev/null | head -10)
if [ -n "$BASE64_FOUND" ]; then
    echo -e "${YELLOW}WARNING: Found base64_decode (check if legitimate):${NC}"
    log "BASE64_DECODE FOUND:"
    log "$BASE64_FOUND"
    log ""
fi

# Check for gzinflate
echo -e "${YELLOW}Searching for gzinflate...${NC}"
GZIP_FOUND=$(grep -r "gzinflate" . --include="*.php" --exclude-dir=vendor 2>/dev/null | head -10)
if [ -n "$GZIP_FOUND" ]; then
    echo -e "${RED}WARNING: Found gzinflate (common in malware):${NC}"
    log "GZINFLATE FOUND:"
    log "$GZIP_FOUND"
    log ""
fi

# Check for shell execution
echo -e "${YELLOW}Searching for shell execution functions...${NC}"
SHELL_FOUND=$(grep -rE "shell_exec|system\(|exec\(|passthru" . --include="*.php" --exclude-dir=vendor 2>/dev/null | head -10)
if [ -n "$SHELL_FOUND" ]; then
    echo -e "${RED}WARNING: Found shell execution functions:${NC}"
    log "SHELL EXECUTION FOUND:"
    log "$SHELL_FOUND"
    log ""
fi

log "======================================================================"
log "5. Searching for Known Backdoor Files"
log "======================================================================"

echo "Searching for common backdoor filenames..."
BACKDOORS=$(find ~/public_html -type f \( -name "c99.php" -o -name "r57.php" -o -name "shell.php" -o -name "backdoor.php" -o -name "wso.php" -o -name "WSO.php" -o -name "adminer.php" \) 2>/dev/null)
if [ -n "$BACKDOORS" ]; then
    echo -e "${RED}CRITICAL: Found potential backdoor files:${NC}"
    log "BACKDOOR FILES FOUND:"
    log "$BACKDOORS"
    log ""
else
    log "OK: No known backdoor files found"
fi

# Check for hidden PHP files
echo "Searching for hidden PHP files..."
HIDDEN_PHP=$(find ~/public_html -name ".*.php" -type f 2>/dev/null)
if [ -n "$HIDDEN_PHP" ]; then
    echo -e "${RED}WARNING: Found hidden PHP files:${NC}"
    log "HIDDEN PHP FILES:"
    log "$HIDDEN_PHP"
    log ""
fi

# Check for PHP files in uploads/images directories
echo "Searching for PHP files in upload directories..."
UPLOAD_PHP=$(find ~/public_html -type f \( -path "*/uploads/*.php" -o -path "*/images/*.php" -o -path "*/temp/*.php" -o -path "*/cache/*.php" \) 2>/dev/null)
if [ -n "$UPLOAD_PHP" ]; then
    echo -e "${RED}WARNING: Found PHP files in upload directories (should not exist):${NC}"
    log "PHP IN UPLOADS:"
    log "$UPLOAD_PHP"
    log ""
fi

log "======================================================================"
log "6. Checking for amp.php (from malicious .htaccess)"
log "======================================================================"

echo "Searching for amp.php file..."
AMP_PHP=$(find ~/public_html -name "amp.php" -type f 2>/dev/null)
if [ -n "$AMP_PHP" ]; then
    echo -e "${RED}CRITICAL: Found amp.php file (malware from .htaccess):${NC}"
    log "AMP.PHP FOUND:"
    log "$AMP_PHP"
    log ""
    log "FILE CONTENT:"
    cat "$AMP_PHP" | tee -a "$REPORT_FILE"
    log ""
    log "ACTION REQUIRED: Review content and delete with: rm $AMP_PHP"
else
    echo -e "${GREEN}OK: No amp.php found${NC}"
    log "OK: No amp.php file found"
fi

# Check for references to amp.php
echo "Searching for references to amp.php..."
AMP_REF=$(grep -r "amp\.php" ~/public_html --include="*.htaccess" 2>/dev/null)
if [ -n "$AMP_REF" ]; then
    echo -e "${RED}CRITICAL: Found references to amp.php in .htaccess files:${NC}"
    log "AMP.PHP REFERENCES:"
    log "$AMP_REF"
    log ""
    log "ACTION REQUIRED: Remove malicious .htaccess code"
fi

log "======================================================================"
log "7. Checking Login Activity"
log "======================================================================"

if [ -f ~/.lastlogin ]; then
    log "Last Login Information:"
    cat ~/.lastlogin | tee -a "$REPORT_FILE"
    log ""
fi

# Recent logins
log "Recent Logins (last 10):"
last -n 10 | tee -a "$REPORT_FILE"
log ""

# Failed logins
log "Recent Failed Logins (last 10):"
lastb -n 10 2>/dev/null | tee -a "$REPORT_FILE" || log "lastb command not available"
log ""

log "======================================================================"
log "8. Checking public_ftp Directory"
log "======================================================================"

if [ -d ~/public_ftp ]; then
    echo -e "${YELLOW}Checking public_ftp directory...${NC}"
    log "public_ftp contents:"
    ls -la ~/public_ftp | tee -a "$REPORT_FILE"
    log ""

    FTP_FILES=$(find ~/public_ftp -type f 2>/dev/null | wc -l)
    if [ "$FTP_FILES" -gt 0 ]; then
        echo -e "${YELLOW}WARNING: Found $FTP_FILES files in public_ftp${NC}"
        log "Files in public_ftp:"
        find ~/public_ftp -type f | tee -a "$REPORT_FILE"
    fi
else
    log "OK: No public_ftp directory"
fi
log ""

log "======================================================================"
log "9. Summary and Recommendations"
log "======================================================================"

echo ""
echo -e "${GREEN}Scan Complete!${NC}"
echo ""
log "SUMMARY:"
log "--------"

# Count issues
ISSUE_COUNT=0

if [ -n "$WRITABLE" ]; then
    log "❌ CRITICAL: World-writable files found (0777 permissions)"
    ((ISSUE_COUNT++))
fi

if [ -f ~/.htaccess.no_htaccess.phpupgrader ]; then
    log "⚠️  WARNING: Suspicious .htaccess.no_htaccess.phpupgrader file"
    ((ISSUE_COUNT++))
fi

if [ -n "$AMP_PHP" ]; then
    log "❌ CRITICAL: amp.php malware file found"
    ((ISSUE_COUNT++))
fi

if [ -n "$BACKDOORS" ]; then
    log "❌ CRITICAL: Backdoor files found"
    ((ISSUE_COUNT++))
fi

if [ -n "$UPLOAD_PHP" ]; then
    log "❌ WARNING: PHP files in upload directories"
    ((ISSUE_COUNT++))
fi

if [ "$ISSUE_COUNT" -eq 0 ]; then
    echo -e "${GREEN}✅ No critical issues found!${NC}"
    log "✅ No critical issues found"
else
    echo -e "${RED}Found $ISSUE_COUNT security issues${NC}"
    log "Total issues found: $ISSUE_COUNT"
fi

log ""
log "NEXT STEPS:"
log "1. Review the full report: $REPORT_FILE"
log "2. Fix 0777 permissions: chmod 755 ~/access-logs && chmod 755 ~/www"
log "3. Review scanreport.txt contents for malware"
log "4. Remove any backdoor files found"
log "5. Deploy secure .htaccess from repository"
log "6. Rotate .env credentials (bash rotate-credentials.sh)"
log ""
log "For detailed instructions, see: ROOT-DIRECTORY-SECURITY-ANALYSIS.md"
log ""
log "======================================================================"
log "Scan completed: $(date)"
log "======================================================================"

echo ""
echo "Full report saved to: $REPORT_FILE"
echo ""
echo -e "${YELLOW}Please review the report and take action on any issues found.${NC}"
echo ""
