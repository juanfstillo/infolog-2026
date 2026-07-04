# Deploying to Hetzner

This app has no real dependency on a database — content lives in `config/site.php`,
sessions use the `file` driver, cache is `file`, queue is `sync`. You do not need to
stand up MySQL in production unless you want one for future use.

## 1. Prerequisites on the Hetzner server

Check what's already there, since you mentioned a Laravel project already runs on
this box — you may already have all of this:

```bash
php -v          # need PHP 8.1+
composer -V     # Composer 2.x
node -v         # Node 18+ (only needed to build CSS/JS once per deploy)
nginx -v        # or apache2 -v
```

If PHP is missing extensions, Laravel needs: `bcmath ctype curl dom fileinfo json
mbstring openssl pcre pdo tokenizer xml`.

## 2. Get the code onto the server

From your Hetzner box, pick one:

**Option A — you push this to a git remote (GitHub/GitLab/self-hosted) and clone it:**
```bash
git clone <your-repo-url> /var/www/infolog-argentina
cd /var/www/infolog-argentina
```

**Option B — no git remote yet, copy straight from this machine via rsync/scp**
(run this from your Windows machine, in Git Bash, replacing user@host):
```bash
rsync -avz --exclude='.git' --exclude='node_modules' --exclude='vendor' \
  --exclude='storage/logs' --exclude='.env' \
  "/c/wamp64/www/infolog-argentina/" user@your-hetzner-ip:/var/www/infolog-argentina/
```

## 3. Server-side setup (run once, and again after every deploy)

```bash
cd /var/www/infolog-argentina

composer install --no-dev --optimize-autoloader

# first deploy only:
cp .env.example .env
php artisan key:generate

npm ci
npm run build

php artisan config:cache
php artisan route:cache
php artisan view:cache
```

Edit `.env` on the server for production:
```
APP_NAME=Infolog
APP_ENV=production
APP_DEBUG=false
APP_URL=https://infologargentina.com

# leave DB_* as-is/unset — nothing in this app queries the database
SESSION_DRIVER=file
CACHE_DRIVER=file
QUEUE_CONNECTION=sync
```

Permissions (adjust `www-data` to whatever user your web server runs as):
```bash
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache
```

## 4. Web server config

Laravel's webroot is `public/`, not the project root — this is the one thing that
differs from the old flat-PHP site. Point the server root at `public/`.

**nginx** (`/etc/nginx/sites-available/infologargentina.com`):
```nginx
server {
    listen 80;
    server_name infologargentina.com www.infologargentina.com;
    root /var/www/infolog-argentina/public;

    index index.php;

    location / {
        try_files $uri $uri/ /index.php?$query_string;
    }

    location ~ \.php$ {
        fastcgi_pass unix:/run/php/php8.1-fpm.sock;   # match your PHP version
        fastcgi_param SCRIPT_FILENAME $realpath_root$fastcgi_script_name;
        include fastcgi_params;
    }

    location ~ /\.(?!well-known).* {
        deny all;
    }
}
```
```bash
ln -s /etc/nginx/sites-available/infologargentina.com /etc/nginx/sites-enabled/
nginx -t && systemctl reload nginx
```

**Apache** (if that's what's already running instead): point the VirtualHost
`DocumentRoot` at `/var/www/infolog-argentina/public`, enable `mod_rewrite`, and
make sure `AllowOverride All` is set for that directory (Laravel ships a
`public/.htaccess` that handles the routing).

## 5. HTTPS

```bash
apt install certbot python3-certbot-nginx   # or certbot-apache
certbot --nginx -d infologargentina.com -d www.infologargentina.com
```

## 6. DNS cutover

The domain currently points at DonWeb. Don't repoint DNS until you've verified the
Hetzner deploy works — either:
- browse it via the server's IP with a `Host` header / local `/etc/hosts` override, or
- put it on a subdomain first (e.g. `nuevo.infologargentina.com`) to review live before
  swapping the A record for the apex domain.

I don't have access to your DNS provider or the Hetzner server itself, so steps 2–6
are yours to run — happy to debug specific errors if you paste them back.

## Redeploying after future changes

```bash
cd /var/www/infolog-argentina
git pull            # or re-run the rsync from step 2
composer install --no-dev --optimize-autoloader
npm ci && npm run build
php artisan config:cache && php artisan route:cache && php artisan view:cache
```
