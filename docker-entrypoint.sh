#!/bin/sh
set -e

echo "Waiting for MySQL..."
until mysql -h "$DB_HOST" -u "$DB_USERNAME" -p"$DB_PASSWORD" -e "SELECT 1" &> /dev/null
do
  echo "MySQL not ready, sleeping..."
  sleep 3
done
echo "MySQL is ready!"

# Fix permissions
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Run migrations and cache commands
php artisan migrate 
php artisan db:seed
php artisan cache:clear
php artisan config:clear
php artisan route:clear
php artisan view:clear

# Start PHP-FPM
exec php-fpm
