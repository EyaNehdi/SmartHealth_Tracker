#!/bin/bash
set -e

echo "⏳ Waiting for MySQL to be ready..."

# Wait until MySQL responds to connections
until mysql -h"${DB_HOST:-mysql-db}" -u"${DB_USERNAME:-root}" -p"${DB_PASSWORD:-root}" -e "SELECT 1;" &>/dev/null; do
  echo "Waiting for MySQL..."
  sleep 3
done

echo "✅ MySQL is up! Running Laravel commands..."

# Move to Laravel app directory (important in multi-stage builds)
cd /var/www/html || exit 1

# Ensure storage permissions
chmod -R 777 storage bootstrap/cache

# Run migrations & optimization
php artisan migrate --force || {
  echo "⚠️ Migration failed — skipping to continue container startup"
}

php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan optimize

echo "🚀 Starting PHP-FPM..."
exec php-fpm
