#!/bin/sh
set -e

echo "Starting infolog container..."

if [ ! -f "/var/www/html/.env" ]; then
    echo "Creating .env from environment variables..."
    env | grep -E '^(APP_|SESSION_|CACHE_|QUEUE_|LOG_|MAIL_|FILESYSTEM_|BROADCAST_)' | sort | while IFS='=' read -r key value; do
        case "$value" in
            *\ *|*\!*|*\#*|*\$*|*\&*|*\(*|*\)*)
                echo "${key}=\"${value}\""
                ;;
            *)
                echo "${key}=${value}"
                ;;
        esac
    done > /var/www/html/.env
fi

if [ -z "$APP_KEY" ] && ! grep -q "^APP_KEY=base64:" /var/www/html/.env 2>/dev/null; then
    echo "Generating APP_KEY..."
    php artisan key:generate --force
fi

echo "Caching configuration..."
php artisan config:cache
php artisan route:cache
php artisan view:cache

if [ ! -L "public/storage" ]; then
    echo "Creating storage symlink..."
    php artisan storage:link
fi

chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

echo "Container ready."

exec "$@"
