#!/bin/bash
set -e

echo "Waiting for MySQL to be ready..."
until php -r "new PDO('mysql:host=${DB_HOST};port=${DB_PORT}', '${DB_USERNAME}', '${DB_PASSWORD}');" >/dev/null 2>&1; do
  sleep 2
done
echo "MySQL is ready!"

# Ensure necessary directories exist and have correct permissions
mkdir -p bootstrap/cache storage
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

# Install composer dependencies if vendor folder is missing
if [ ! -d "vendor" ]; then
    echo "Running composer install..."
    COMPOSER_ALLOW_SUPERUSER=1 composer install --no-dev --optimize-autoloader
fi

# Run artisan commands safely
echo "Running migrations..."
php artisan migrate || echo "Migration failed or already run"

echo "Clearing caches..."
# Skip errors for missing tables or duplicate route names
php artisan config:clear || true
php artisan cache:clear || true
php artisan route:clear || true
php artisan view:clear || true

echo "Optimizing..."
php artisan optimize || true

# Start PHP-FPM (or whatever command is passed as CMD)
exec "$@"
