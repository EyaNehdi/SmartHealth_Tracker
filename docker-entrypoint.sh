#!/bin/sh
set -e

# Install dependencies if missing
if [ ! -d "vendor" ]; then
    composer install --no-dev --optimize-autoloader
fi

# Set permissions
mkdir -p bootstrap/cache storage
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

# Run artisan commands safely
php artisan package:discover --ansi || true
php artisan optimize:clear || true

exec "$@"
