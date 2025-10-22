FROM php:8.2-cli

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    unzip \
    libzip-dev \
    curl \
    && docker-php-ext-install pdo pdo_mysql zip

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Copy Laravel project
COPY . .

# Install Laravel dependencies
RUN composer install --no-interaction --prefer-dist

# Expose the port for PHP built-in server
EXPOSE 8080

# Start Laravel using PHP built-in server
CMD php artisan serve --host=0.0.0.0 --port=8080
