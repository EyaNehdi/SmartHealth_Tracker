FROM php:8.2-fpm

WORKDIR /var/www/html

# Install system dependencies & PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg62-turbo-dev libwebp-dev libfreetype6-dev \
    libonig-dev libzip-dev libxml2-dev zip unzip git curl npm \
 && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
 && docker-php-ext-install pdo pdo_mysql mbstring exif xml zip gd bcmath \
 && apt-get clean && rm -rf /var/lib/apt/lists/*

# Copy only composer files first (speeds up rebuilds)
COPY composer.json composer.lock ./

# Install Composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
 && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
 && composer install --no-dev --optimize-autoloader

# Now copy the rest of the project
COPY . .

# Ensure bootstrap/cache & storage exist and have correct permissions
RUN mkdir -p bootstrap/cache storage \
 && chown -R www-data:www-data storage bootstrap/cache \
 && chmod -R 775 storage bootstrap/cache

# Expose PHP-FPM port
EXPOSE 9000

CMD ["php-fpm"]
