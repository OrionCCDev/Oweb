# 🚨 URGENT: ROTATE ALL CREDENTIALS IMMEDIATELY

## CRITICAL SECURITY BREACH

You have exposed the following credentials publicly:

❌ **APP_KEY**: `base64:1ojQUZcT7pBs0xTTeOzTJcwoCM3fYwctVuWbq/hw2Ig=`
❌ **DB_PASSWORD**: `P^5-tzmE5zl[`
❌ **DB_USERNAME**: `orionccc_ahmdsyd`
❌ **DB_DATABASE**: `orionccc_orionccNewDB`

**ANYONE WHO SAW THESE CAN:**
- Decrypt your database sessions
- Access your entire database
- Impersonate any user on your site
- Steal customer data
- Modify or delete all data

---

## IMMEDIATE ACTIONS (DO THIS NOW)

### 1. CHANGE DATABASE PASSWORD (cPanel)

1. Login to cPanel
2. Go to **MySQL Databases**
3. Find user: `orionccc_ahmdsyd`
4. Click "Change Password"
5. Generate a strong password (use cPanel generator)
6. **SAVE THE NEW PASSWORD** securely

### 2. UPDATE .env FILE WITH NEW CREDENTIALS

Run these commands in cPanel Terminal:

```bash
# Navigate to your project
cd ~/public_html

# Generate new APP_KEY
php artisan key:generate --force

# Edit .env file with new database password
nano .env
```

In the nano editor:
1. Find the line: `DB_PASSWORD=P^5-tzmE5zl[`
2. Replace with your NEW password from cPanel
3. Find the line: `APP_URL=https://www.orioncc.com`
4. Change to: `APP_URL=https://orioncc.com` (remove www)
5. Press `Ctrl+X`, then `Y`, then `Enter` to save

### 3. CLEAR APPLICATION CACHE

```bash
cd ~/public_html

# Clear all caches
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear

# Rebuild cache with new config
php artisan config:cache
```

### 4. INVALIDATE ALL USER SESSIONS

```bash
cd ~/public_html

# This will log out all users (including attackers)
php artisan session:flush

# Or directly in database
mysql -u orionccc_ahmdsyd -p orionccc_orionccNewDB -e "TRUNCATE sessions;"
```

---

## .ENV FILE SECURITY ISSUES FOUND

### ❌ CRITICAL ISSUES

1. **APP_KEY exposed** → Allows decryption of encrypted data
2. **DB_PASSWORD exposed** → Full database access
3. **APP_URL has www** → Should be `https://orioncc.com` (no www)

### ⚠️ WARNING ISSUES

4. **MAIL_MAILER=log** → Email notifications not being sent
   - You won't receive security alerts
   - Password resets won't work
   - Contact forms won't work

5. **PROJECT_ADMIN_EMAILS=ahmed@orion.com** → Invalid domain
   - Should use a real email domain

### ✅ GOOD SETTINGS

- `APP_DEBUG=false` ✅ (correct for production)
- `APP_ENV=production` ✅ (correct)
- `LOG_LEVEL=debug` ⚠️ (consider 'error' in production)

---

## COMPLETE SECURE .ENV CONFIGURATION

After rotating credentials, your .env should look like this:

```bash
APP_NAME=OrionContracting
APP_ENV=production
APP_KEY=base64:XXXXX_NEW_KEY_WILL_BE_GENERATED_XXXXX
APP_DEBUG=false
APP_TIMEZONE=Asia/Dubai
APP_URL=https://orioncc.com

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=error

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=orionccc_orionccNewDB
DB_USERNAME=orionccc_ahmdsyd
DB_PASSWORD=YOUR_NEW_STRONG_PASSWORD_HERE

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database
CACHE_PREFIX=

MEMCACHED_HOST=127.0.0.1

REDIS_CLIENT=phpredis
REDIS_HOST=127.0.0.1
REDIS_PASSWORD=null
REDIS_PORT=6379

# CONFIGURE REAL MAIL SETTINGS FOR PRODUCTION
MAIL_MAILER=smtp
MAIL_HOST=mail.orioncc.com
MAIL_PORT=465
MAIL_USERNAME=noreply@orioncc.com
MAIL_PASSWORD=your_email_password
MAIL_ENCRYPTION=ssl
MAIL_FROM_ADDRESS=noreply@orioncc.com
MAIL_FROM_NAME="${APP_NAME}"

AWS_ACCESS_KEY_ID=
AWS_SECRET_ACCESS_KEY=
AWS_DEFAULT_REGION=us-east-1
AWS_BUCKET=
AWS_USE_PATH_STYLE_ENDPOINT=false

PROJECT_ADMIN_EMAILS=admin@orioncc.com

VITE_APP_NAME="${APP_NAME}"
```

---

## CONFIGURE EMAIL (IMPORTANT)

Your site currently has `MAIL_MAILER=log` which means:
- ❌ Emails are NOT being sent
- ❌ You won't receive security alerts
- ❌ Password resets won't work

### Setup Email in cPanel:

1. **Create Email Account:**
   - cPanel → Email Accounts
   - Create: `noreply@orioncc.com`
   - Set strong password

2. **Get SMTP Settings:**
   - Usually: `mail.orioncc.com`
   - Port: 465 (SSL) or 587 (TLS)
   - Encryption: SSL

3. **Update .env:**
   ```bash
   MAIL_MAILER=smtp
   MAIL_HOST=mail.orioncc.com
   MAIL_PORT=465
   MAIL_USERNAME=noreply@orioncc.com
   MAIL_PASSWORD=your_email_password
   MAIL_ENCRYPTION=ssl
   MAIL_FROM_ADDRESS=noreply@orioncc.com
   ```

4. **Test Email:**
   ```bash
   cd ~/public_html
   php artisan tinker

   # In tinker:
   Mail::raw('Test email from OrionCC', function($msg) {
       $msg->to('your-personal-email@gmail.com')->subject('Test');
   });

   # Exit tinker
   exit
   ```

---

## CREDENTIAL ROTATION CHECKLIST

- [ ] Changed database password in cPanel
- [ ] Generated new APP_KEY with `php artisan key:generate`
- [ ] Updated .env file with new credentials
- [ ] Fixed APP_URL (removed www)
- [ ] Configured real email settings
- [ ] Cleared all caches (`config:clear`, `cache:clear`)
- [ ] Invalidated all sessions (`session:flush`)
- [ ] Tested that website still works
- [ ] Tested email functionality
- [ ] Verified .env file permissions are 644
- [ ] Confirmed .env is in .gitignore (NEVER commit .env)
- [ ] Changed cPanel password
- [ ] Changed all FTP passwords
- [ ] Reviewed database for suspicious activity

---

## VERIFY .ENV FILE PERMISSIONS

```bash
cd ~/public_html

# Check current permissions
ls -la .env

# Should show: -rw-r--r-- (644)
# If not, fix it:
chmod 644 .env

# Verify .env is in .gitignore
cat .gitignore | grep .env

# Should show: .env
```

---

## CHECK FOR DATABASE COMPROMISE

Since your database credentials were exposed, check for:

```bash
# Connect to database
mysql -u orionccc_ahmdsyd -p orionccc_orionccNewDB

# Check for suspicious admin users
SELECT * FROM users WHERE role='admin' OR is_admin=1;

# Check recent user registrations
SELECT * FROM users ORDER BY created_at DESC LIMIT 10;

# Check for suspicious sessions
SELECT * FROM sessions ORDER BY last_activity DESC LIMIT 20;

# Exit
exit;
```

Look for:
- Unknown admin accounts
- Suspicious user registrations
- Unusual session activity

---

## NEVER SHARE THESE AGAIN

**NEVER post publicly:**
- ❌ .env file contents
- ❌ APP_KEY
- ❌ Database passwords
- ❌ API keys
- ❌ Email passwords
- ❌ Any credentials

**Safe to share:**
- ✅ .env.example (template without real values)
- ✅ Configuration structure
- ✅ Non-sensitive settings

---

## AFTER ROTATION

Once you've completed all steps above:

1. **Monitor for 24-48 hours:**
   - Check error logs: `tail -f ~/public_html/storage/logs/laravel.log`
   - Monitor database for suspicious queries
   - Watch for unauthorized access attempts

2. **Setup Automated Monitoring:**
   ```bash
   # Create daily security check cron
   crontab -e

   # Add this line (runs daily at 2 AM):
   0 2 * * * cd ~/public_html && php artisan security:check >> ~/security-checks.log 2>&1
   ```

3. **Review Access Logs:**
   ```bash
   # Check who accessed your site recently
   tail -100 ~/access-logs/*.log | grep -i "POST.*admin"
   tail -100 ~/access-logs/*.log | grep -i "POST.*login"
   ```

---

## QUESTIONS?

If you need help:
1. Your hosting provider support (they can help with cPanel)
2. Laravel documentation: https://laravel.com/docs/configuration
3. Never share real credentials when asking for help

---

## TIMELINE

**IMMEDIATE (Next 15 minutes):**
- [ ] Change database password
- [ ] Generate new APP_KEY
- [ ] Update .env file
- [ ] Clear caches
- [ ] Flush sessions

**TODAY:**
- [ ] Configure email settings
- [ ] Check database for compromise
- [ ] Change all other passwords
- [ ] Monitor logs

**THIS WEEK:**
- [ ] Setup email monitoring
- [ ] Review all user accounts
- [ ] Implement automated security checks
- [ ] Review access patterns

---

**START NOW - Every minute counts when credentials are exposed!**
