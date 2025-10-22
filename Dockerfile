FROM php:8.2-fpm AS composer-builder

# NOMS DE PAQUETS DEBIAN CORRECTS
RUN apt-get update && apt-get install -y \
    git zip unzip \
    libpng-dev \
    libjpeg62-turbo-dev \
    libwebp-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
 && docker-php-ext-configure gd \
        --with-freetype \
        --with-jpeg \
        --with-webp \
 && docker-php-ext-install -j$(nproc) \
        pdo pdo_mysql mbstring exif xml zip gd bcmath \
 && rm -rf /var/lib/apt/lists/*

# Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
WORKDIR /app

COPY composer.json composer.lock ./
RUN composer install \
    --no-dev --no-interaction --prefer-dist --optimize-autoloader --no-scripts

COPY . /app
RUN rm -rf public/storage

# =========================
FROM node:18 AS node-builder
WORKDIR /app
COPY package*.json ./
RUN npm ci --legacy-peer-deps --progress=false
COPY resources/ resources/
COPY public/ public/
COPY vite.config.js ./
RUN npm run build

# =========================
FROM php:8.2-fpm

# MÊMES PAQUETS que composer-builder
RUN apt-get update && apt-get install -y --no-install-recommends \
    libpng-dev \
    libjpeg62-turbo-dev \
    libwebp-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
 && docker-php-ext-configure gd \
        --with-freetype \
        --with-jpeg \
        --with-webp \
 && docker-php-ext-install -j$(nproc) \
        pdo pdo_mysql mbstring exif xml zip gd bcmath \
 && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www/html

COPY --from=composer-builder /app /var/www/html
COPY --from=node-builder /app/public/build /var/www/html/public/build

# Permissions
# Permissions
RUN mkdir -p storage/app/public bootstrap/cache \
 && chown -R www-data:www-data /var/www/html \
 && chmod -R 755 /var/www/html \
 && chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache


EXPOSE 9000
CMD ["php-fpm"]
