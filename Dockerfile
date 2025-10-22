FROM php:8.2-fpm

WORKDIR /var/www/html

# Install system dependencies & PHP extensions
RUN apt-get update && apt-get install -y \
    libpng-dev libjpeg62-turbo-dev libwebp-dev libfreetype6-dev \
    libonig-dev \
    zip unzip git curl npm \
 && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
 && docker-php-ext-install pdo pdo_mysql mbstring exif xml zip gd bcmath \
 && apt-get clean && rm -rf /var/lib/apt/lists/*


# Copy composer files and install dependencies
COPY composer.json composer.lock ./
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
 && php composer-setup.php --install-dir=/usr/local/bin --filename=composer \
 && composer install --no-dev --optimize-autoloader

# Copy rest of the app
COPY . .

# Set permissions
RUN chown -R www-data:www-data storage bootstrap/cache \
 && chmod -R 775 storage bootstrap/cache

# Install node dependencies and build assets
RUN npm install && npm run build

# Expose port (optional, depends on your reverse proxy)
EXPOSE 9000

CMD ["php-fpm"]
