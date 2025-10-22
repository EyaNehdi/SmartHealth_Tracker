FROM php:8.2-fpm

# Set working directory
WORKDIR /var/www/html

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg62-turbo-dev libwebp-dev libfreetype6-dev \
    libonig-dev libzip-dev libxml2-dev zip unzip git curl npm \
 && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
 && docker-php-ext-install pdo pdo_mysql mbstring exif xml zip gd bcmath \
 && apt-get clean && rm -rf /var/lib/apt/lists/*

# Copy entire Laravel project first
COPY . .

# Install Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
 && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
 && composer install --no-dev --optimize-autoloader

# Set permissions for Laravel storage and cache folders
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \
 && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port for PHP-FPM
EXPOSE 9000

CMD ["php-fpm"]

