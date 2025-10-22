#!/bin/bash
set -e

echo "Waiting for MySQL to be ready..."
until php -r "new PDO('mysql:host=${DB_HOST};port=${DB_PORT}', '${DB_USERNAME}', '${DB_PASSWORD}');" >/dev/null 2>&1; do
  sleep 2
done
echo "MySQL is ready!"

# Ensure Laravel directories exist and permissions are correct
mkdir -p bootstrap/cache storage
chown -R www-data:www-data storage bootstrap/cache
chmod -R 775 storage bootstrap/cache

# Add Git safe directory to avoid ownership warnings
git config --global --add safe.directory /var/www/html

# Install composer dependencies if vendor is missing
if [ ! -d "vendor" ]; then
    echo "Running composer install..."
    COMPOSER_ALLOW_SUPERUSER=1 composer install --no-dev --optimize-autoloader
fi

# Run migrations safely
php artisan migrate || echo "Migration failed or already run"

# If using database cache driver, create cache table if missing
php artisan cache:table || true

# Clear caches safely
php artisan config:clear || true
php artisan cache:clear || true
php artisan route:clear || true
php artisan view:clear || true

# Optimize without failing on route cache errors
php artisan optimize || true

# Start PHP-FPM
exec "$@"
