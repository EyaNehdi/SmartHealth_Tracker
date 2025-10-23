#!/bin/bash
set -e

# Wait for MySQL
until mysqladmin ping -h "mysql-db" -u "root" -p"$MYSQL_ROOT_PASSWORD" --silent; do
  echo "Waiting for MySQL..."
  sleep 3
done

# Run migrations
php artisan migrate --force
php artisan config:clear
php artisan cache:clear
php artisan route:clear
php artisan view:clear
php artisan optimize

# Start PHP-FPM
exec php-fpm
