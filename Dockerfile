FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    git zip unzip curl libpng-dev libjpeg62-turbo-dev libwebp-dev libfreetype6-dev \
    libonig-dev libxml2-dev libzip-dev \
 && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
 && docker-php-ext-install -j$(nproc) pdo pdo_mysql mbstring exif xml zip gd bcmath \
 && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy Laravel files
COPY . /var/www/html

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader --no-interaction

# Permissions
RUN mkdir -p storage/bootstrap/cache \
 && chown -R www-data:www-data /var/www/html \
 && chmod -R 755 /var/www/html \
 && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

EXPOSE 9000
CMD ["php-fpm"]
