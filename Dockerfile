FROM php:8.2-cli

# Install dependencies
RUN apt-get update && apt-get install -y \
    git unzip libzip-dev curl \
    && docker-php-ext-install pdo pdo_mysql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

WORKDIR /var/www/html

# Copy Laravel app
COPY . .

# Install dependencies
RUN composer install --no-interaction --prefer-dist

# Expose port for PHP built-in server
EXPOSE 8080

# Start Laravel using PHP built-in server
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8080"]
