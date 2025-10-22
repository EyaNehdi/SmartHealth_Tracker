#!/bin/sh
set -e

# Ensure directories exist and are writable
mkdir -p bootstrap/cache storage
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

# Run artisan commands safely (ignore DB errors)
php artisan package:discover --ansi || true
php artisan optimize:clear || true

exec "$@"
