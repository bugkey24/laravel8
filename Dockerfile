# Kembali ke PHP 8.0 Apache yang stabil untuk Laravel 8
FROM php:8.0-apache

# 1. Optimalisasi Build: Gunakan installer instan agar tidak kompilasi manual
COPY --from=mlocati/php-extension-installer /usr/bin/install-php-extensions /usr/local/bin/
RUN install-php-extensions pdo_mysql mbstring exif pcntl bcmath gd zip intl

# 2. Aktifkan mod_rewrite Apache
RUN a2enmod rewrite

# 3. Set Document Root ke /public
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

WORKDIR /var/www/html
COPY . .

# 4. Install Composer & Dependencies secara otomatis
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
RUN composer install --no-dev --optimize-autoloader --ignore-platform-reqs

# 5. Set Permissions
RUN chown -R www-data:www-data storage bootstrap/cache database

EXPOSE 80