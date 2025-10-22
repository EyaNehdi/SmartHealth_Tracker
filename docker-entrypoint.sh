#!/bin/bash
set -e

echo "Waiting for MySQL..."
until php -r "new PDO('mysql:host=${DB_HOST};port=${DB_PORT}', '${DB_USERNAME}', '${DB_PASSWORD}');" >/dev/null 2>&1; do
  sleep 2
done
echo "MySQL is ready!"

# Permissions
mkdir -p bootstrap/cache storage
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

# Composer install if needed
if [ ! -d "vendor" ]; then
  echo "Running composer install..."
  COMPOSER_ALLOW_SUPERUSER=1 composer install --no-dev --optimize-autoloader
fi

# Run artisan commands safely
php artisan migrate || echo "Migration failed or already run"
php artisan config:clear || true
php artisan cache:clear || true
php artisan route:clear || true
php artisan view:clear || true
php artisan optimize || true

# Start PHP-FPM
exec "$@"
