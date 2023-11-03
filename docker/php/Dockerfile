# Set image start from
FROM php:8.2-fpm-alpine

# Set app workdir
WORKDIR /app

# Install composer
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

# Set app files owner
RUN chown -R www-data:www-data /app
