#!/bin/bash
# Credential Rotation Script for OrionCC Website
# Run this in cPanel Terminal after changing database password

set -e  # Exit on error

echo "=========================================="
echo "OrionCC Credential Rotation Script"
echo "=========================================="
echo ""
echo "⚠️  WARNING: This script will:"
echo "   1. Generate new APP_KEY"
echo "   2. Clear all caches"
echo "   3. Log out all users"
echo ""
read -p "Have you already changed the database password in cPanel? (yes/no): " DB_CHANGED

if [ "$DB_CHANGED" != "yes" ]; then
    echo ""
    echo "❌ Please change database password first:"
    echo "   1. Login to cPanel"
    echo "   2. Go to MySQL Databases"
    echo "   3. Find user and click 'Change Password'"
    echo "   4. Generate strong password and save it"
    echo "   5. Come back and run this script again"
    echo ""
    exit 1
fi

echo ""
read -p "Enter your NEW database password: " -s NEW_DB_PASS
echo ""
read -p "Confirm NEW database password: " -s NEW_DB_PASS_CONFIRM
echo ""

if [ "$NEW_DB_PASS" != "$NEW_DB_PASS_CONFIRM" ]; then
    echo "❌ Passwords don't match. Please try again."
    exit 1
fi

if [ -z "$NEW_DB_PASS" ]; then
    echo "❌ Password cannot be empty."
    exit 1
fi

# Navigate to project directory
cd ~/public_html || { echo "❌ Directory ~/public_html not found"; exit 1; }

echo ""
echo "1️⃣  Backing up current .env file..."
cp .env .env.backup-$(date +%Y%m%d-%H%M%S)
echo "✅ Backup created"

echo ""
echo "2️⃣  Generating new APP_KEY..."
php artisan key:generate --force
echo "✅ New APP_KEY generated"

echo ""
echo "3️⃣  Updating database password in .env..."
# Use sed to replace DB_PASSWORD
sed -i "s/^DB_PASSWORD=.*/DB_PASSWORD=$NEW_DB_PASS/" .env
echo "✅ Database password updated"

echo ""
echo "4️⃣  Fixing APP_URL (removing www)..."
sed -i 's|^APP_URL=.*|APP_URL=https://orioncc.com|' .env
echo "✅ APP_URL updated"

echo ""
echo "5️⃣  Setting LOG_LEVEL to error for production..."
sed -i 's/^LOG_LEVEL=.*/LOG_LEVEL=error/' .env
echo "✅ LOG_LEVEL updated"

echo ""
echo "6️⃣  Testing database connection..."
php artisan db:show || {
    echo "❌ Database connection failed!"
    echo "   Please check your database password and settings"
    echo "   Restoring backup..."
    cp .env.backup-$(date +%Y%m%d)* .env 2>/dev/null || true
    exit 1
}
echo "✅ Database connection successful"

echo ""
echo "7️⃣  Clearing all caches..."
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan optimize:clear
echo "✅ Caches cleared"

echo ""
echo "8️⃣  Rebuilding optimized config..."
php artisan config:cache
echo "✅ Config cached"

echo ""
echo "9️⃣  Invalidating all user sessions (logs out everyone)..."
php artisan session:flush || {
    echo "⚠️  Could not flush sessions via artisan, trying direct database..."
    mysql -u orionccc_ahmdsyd -p"$NEW_DB_PASS" orionccc_orionccNewDB -e "TRUNCATE sessions;" && echo "✅ Sessions cleared via database"
}
echo "✅ All sessions invalidated"

echo ""
echo "🔟  Setting proper file permissions..."
chmod 644 .env
chmod -R 775 storage bootstrap/cache 2>/dev/null || true
echo "✅ Permissions set"

echo ""
echo "=========================================="
echo "✅ CREDENTIAL ROTATION COMPLETED!"
echo "=========================================="
echo ""
echo "📋 NEXT STEPS:"
echo ""
echo "1. Test your website:"
echo "   Visit: https://orioncc.com"
echo "   Login with your admin account"
echo ""
echo "2. Configure email settings (IMPORTANT):"
echo "   Edit: nano ~/public_html/.env"
echo "   Update MAIL_* settings with real SMTP credentials"
echo "   See URGENT-ROTATE-CREDENTIALS.md for details"
echo ""
echo "3. Change other passwords:"
echo "   - cPanel main password"
echo "   - All FTP account passwords"
echo "   - SSH keys (if applicable)"
echo ""
echo "4. Monitor your site for 24-48 hours:"
echo "   tail -f ~/public_html/storage/logs/laravel.log"
echo "   Check ~/access-logs/ for suspicious activity"
echo ""
echo "5. Check database for suspicious users:"
echo "   mysql -u orionccc_ahmdsyd -p orionccc_orionccNewDB"
echo "   SELECT * FROM users WHERE role='admin';"
echo ""
echo "📁 Backup location:"
find ~/public_html -name ".env.backup-*" -mtime -1 | tail -1
echo ""
echo "⚠️  REMEMBER:"
echo "   - NEVER share .env file contents again"
echo "   - NEVER commit .env to git"
echo "   - Keep credentials in secure password manager"
echo ""
echo "=========================================="
