#!/bin/bash
set -e

echo "Waiting for MySQL to be ready..."

# Wait until MySQL responds
until mysql -h "${DB_HOST:-mysql-db}" -u"${DB_USERNAME:-root}" -p"${DB_PASSWORD:-root}" -e "SELECT 1;" &>/dev/null; do
  echo "Waiting for MySQL..."
  sleep 3
done

echo "✅ MySQL is up! Running Laravel commands..."

# Run migrations and optimization
php artisan migrate --force || true
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan optimize

# Start PHP-FPM
exec php-fpm
