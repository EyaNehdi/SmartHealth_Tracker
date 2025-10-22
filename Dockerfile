FROM php:8.2-apache

WORKDIR /var/www/html

COPY . .

# PHP extensions
RUN docker-php-ext-install pdo pdo_mysql mbstring exif xml zip gd bcmath

# Node.js + npm
RUN apt-get update && apt-get install -y nodejs npm

# Build assets
RUN npm install && npm run build

# Apache
RUN a2enmod rewrite

# Set DocumentRoot
RUN sed -i 's!/var/www/html!/var/www/html/public!g' /etc/apache2/sites-available/000-default.conf

# Permissions
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html
