# Use the official PHP-FPM base image
FROM php:8.1-fpm

# Set the working directory to /var/www
WORKDIR /var/www

# Install system dependencies
RUN apt-get update \
    && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Copy the Laravel project files to the container
COPY . /var/www

# Set appropriate permissions for Laravel
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Install Laravel dependencies
RUN composer install --no-interaction --no-dev --optimize-autoloader

# Expose port 9000 for PHP-FPM
EXPOSE 9000

# Start PHP-FPM server
CMD ["php-fpm"]

# Optionally, if your Laravel app uses a queue worker, you can add the following line:
# CMD ["php", "artisan", "queue:work"]

