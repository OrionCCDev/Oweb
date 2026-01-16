#!/bin/bash
#
# Fix Critical Permission Issues
# Fixes 0777 and other dangerous permissions
#
# Usage: bash fix-critical-permissions.sh
#

echo "======================================================================"
echo "CRITICAL PERMISSION FIX SCRIPT"
echo "======================================================================"
echo ""

# Colors
RED='\033[0;31m'
YELLOW='\033[1;33m'
GREEN='\033[0;32m'
NC='\033[0m'

# Safety check - ask for confirmation
echo -e "${YELLOW}This script will fix dangerous file permissions.${NC}"
echo ""
echo "Changes to be made:"
echo "  - Fix access-logs: 0777 → 0750"
echo "  - Fix www: 0777 → 0755"
echo "  - Find and fix all 0777 permissions in home directory"
echo "  - Set proper permissions for public_html files"
echo ""
read -p "Do you want to continue? (yes/no): " CONFIRM

if [ "$CONFIRM" != "yes" ]; then
    echo "Aborted."
    exit 1
fi

echo ""
echo -e "${GREEN}Starting permission fixes...${NC}"
echo ""

# Create backup log
BACKUP_LOG=~/permission-fixes-$(date +%Y%m%d-%H%M%S).log
echo "Logging changes to: $BACKUP_LOG"
echo ""

log() {
    echo "$1" | tee -a "$BACKUP_LOG"
}

log "======================================================================"
log "PERMISSION FIX - $(date)"
log "======================================================================"
log ""

# Fix access-logs
if [ -d ~/access-logs ]; then
    echo -e "${YELLOW}Fixing ~/access-logs permissions...${NC}"
    CURRENT=$(stat -c%a ~/access-logs 2>/dev/null || stat -f%Lp ~/access-logs)
    log "access-logs: $CURRENT → 0750"
    chmod 750 ~/access-logs

    # Fix files inside
    find ~/access-logs -type f -exec chmod 640 {} \;
    log "Fixed files inside access-logs to 0640"
    echo -e "${GREEN}✓ Fixed access-logs${NC}"
else
    log "access-logs directory not found"
fi
echo ""

# Fix www directory/symlink
if [ -e ~/www ]; then
    echo -e "${YELLOW}Fixing ~/www permissions...${NC}"

    # Check if it's a symlink or directory
    if [ -L ~/www ]; then
        log "www is a symlink (correct)"
        # Symlinks don't really have permissions, but we can check target
        TARGET=$(readlink -f ~/www)
        log "Symlink points to: $TARGET"
        echo -e "${GREEN}✓ www is a symlink (OK)${NC}"
    elif [ -d ~/www ]; then
        CURRENT=$(stat -c%a ~/www 2>/dev/null || stat -f%Lp ~/www)
        log "www is a directory: $CURRENT → 0755"
        chmod 755 ~/www
        echo -e "${GREEN}✓ Fixed www directory${NC}"
    fi
else
    log "www not found"
fi
echo ""

# Find and fix all 0777 permissions
echo -e "${YELLOW}Scanning for all world-writable files (0777)...${NC}"
WRITABLE=$(find ~ -maxdepth 3 -perm 0777 2>/dev/null)

if [ -n "$WRITABLE" ]; then
    echo -e "${RED}Found world-writable files:${NC}"
    echo "$WRITABLE"
    log ""
    log "World-writable files found:"
    log "$WRITABLE"
    log ""

    read -p "Fix all 0777 permissions? (yes/no): " FIX_ALL
    if [ "$FIX_ALL" = "yes" ]; then
        echo "Fixing..."
        echo "$WRITABLE" | while read file; do
            if [ -d "$file" ]; then
                chmod 755 "$file"
                log "Fixed directory: $file (0777 → 0755)"
            else
                chmod 644 "$file"
                log "Fixed file: $file (0777 → 0644)"
            fi
        done
        echo -e "${GREEN}✓ Fixed all 0777 permissions${NC}"
    fi
else
    log "No world-writable files found at root level"
    echo -e "${GREEN}✓ No 0777 permissions found${NC}"
fi
echo ""

# Fix public_html permissions
echo -e "${YELLOW}Setting proper permissions for public_html...${NC}"

if [ -d ~/public_html ]; then
    log "Fixing public_html permissions..."

    # Directories: 755
    echo "  Setting directories to 755..."
    find ~/public_html -type d -exec chmod 755 {} \;

    # Files: 644
    echo "  Setting files to 644..."
    find ~/public_html -type f -exec chmod 644 {} \;

    # Storage needs write access
    if [ -d ~/public_html/storage ]; then
        echo "  Setting storage to 775..."
        chmod -R 775 ~/public_html/storage
    fi

    if [ -d ~/public_html/bootstrap/cache ]; then
        echo "  Setting bootstrap/cache to 775..."
        chmod -R 775 ~/public_html/bootstrap/cache
    fi

    # Lock down .env
    if [ -f ~/public_html/.env ]; then
        echo "  Securing .env file (400 - read-only)..."
        chmod 400 ~/public_html/.env
        log "Secured .env: 0400 (read-only)"
    fi

    log "public_html permissions set (dirs: 755, files: 644)"
    echo -e "${GREEN}✓ Fixed public_html permissions${NC}"
else
    log "public_html directory not found"
fi
echo ""

# Check for SUID files (security risk)
echo -e "${YELLOW}Checking for SUID files (potential security risk)...${NC}"
SUID=$(find ~/public_html -perm /4000 2>/dev/null)
if [ -n "$SUID" ]; then
    echo -e "${RED}WARNING: Found SUID files (these can be dangerous):${NC}"
    echo "$SUID"
    log ""
    log "SUID files found:"
    log "$SUID"
    log ""
    echo -e "${YELLOW}Review these files manually - SUID on web files is unusual${NC}"
fi
echo ""

# Set secure umask for future files
echo -e "${YELLOW}Setting secure umask for new files...${NC}"
if ! grep -q "umask 022" ~/.bashrc 2>/dev/null; then
    echo "umask 022" >> ~/.bashrc
    log "Added 'umask 022' to ~/.bashrc"
    echo -e "${GREEN}✓ Set default umask to 022${NC}"
else
    log "umask 022 already in ~/.bashrc"
    echo -e "${GREEN}✓ umask already configured${NC}"
fi
echo ""

log "======================================================================"
log "VERIFICATION - Current Status"
log "======================================================================"
log ""

# Verify access-logs
if [ -d ~/access-logs ]; then
    PERM=$(stat -c%a ~/access-logs 2>/dev/null || stat -f%Lp ~/access-logs)
    log "access-logs: $PERM"
fi

# Verify www
if [ -e ~/www ]; then
    if [ -L ~/www ]; then
        log "www: symlink (OK)"
    else
        PERM=$(stat -c%a ~/www 2>/dev/null || stat -f%Lp ~/www)
        log "www: $PERM"
    fi
fi

# Check for remaining 0777
REMAINING=$(find ~ -maxdepth 3 -perm 0777 2>/dev/null | wc -l)
log "Remaining 0777 files: $REMAINING"

if [ "$REMAINING" -eq 0 ]; then
    echo -e "${GREEN}✅ All critical permissions fixed!${NC}"
else
    echo -e "${YELLOW}⚠️  $REMAINING files still have 0777 permissions${NC}"
    echo "Run: find ~ -perm 0777 -ls"
fi

log ""
log "======================================================================"
log "COMPLETED - $(date)"
log "======================================================================"
log ""
log "Summary of changes:"
log "  - Fixed access-logs permissions"
log "  - Fixed www permissions"
log "  - Set public_html to standard permissions (755/644)"
log "  - Secured .env file (400)"
log "  - Set umask to 022 for future files"
log ""
log "NEXT STEPS:"
log "1. Review this log: $BACKUP_LOG"
log "2. Run security scan: bash scan-root-directory.sh"
log "3. Deploy secure .htaccess from repository"
log "4. Rotate .env credentials: bash rotate-credentials.sh"
log ""

echo ""
echo "Changes logged to: $BACKUP_LOG"
echo ""
echo -e "${GREEN}Permission fixes complete!${NC}"
echo ""
echo "Next: Run the security scan to check for malware"
echo "  bash scan-root-directory.sh"
echo ""
