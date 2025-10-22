FROM php:8.2-apache

# Set working directory
WORKDIR /var/www/html

# Copy app source
COPY . .

# Install PHP extensions
RUN docker-php-ext-install pdo pdo_mysql

# Install Node.js and npm
RUN apt-get update && apt-get install -y nodejs npm

# Install and build assets
RUN npm install && npm run build

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Fix permissions
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Configure Apache
RUN echo '<VirtualHost *:80>\n\
    DocumentRoot /var/www/html/public\n\
    <Directory /var/www/html/public>\n\
        AllowOverride All\n\
        Require all granted\n\
    </Directory>\n\
</VirtualHost>' > /etc/apache2/sites-available/000-default.conf

EXPOSE 80
