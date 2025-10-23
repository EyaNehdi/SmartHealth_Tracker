#!/bin/bash
set -e

echo "Waiting for MySQL (${DB_HOST}:${DB_PORT}) to be ready..."
until mysqladmin ping -h"${DB_HOST}" -P"${DB_PORT}" -u"${DB_USERNAME}" -p"${DB_PASSWORD}" --silent; do
  sleep 3
done
echo "MySQL is ready!"

mkdir -p bootstrap/cache storage
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

git config --global --add safe.directory /var/www/html

if [ ! -d "vendor" ]; then
    echo "Running composer install..."
    COMPOSER_ALLOW_SUPERUSER=1 composer install --no-dev --optimize-autoloader
fi

php artisan migrate || true
php artisan cache:table || true
php artisan config:clear || true
php artisan cache:clear || true
php artisan route:clear || true
php artisan view:clear || true
php artisan optimize || true

exec "$@"
