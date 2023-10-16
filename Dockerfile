# Using PHP 8
FROM php:8-fpm

# install dependecies
## RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip unzip
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip unzip nginx

# enable extensions for php
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql


# Install composer globally
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# set working directory
WORKDIR /var/www/html

# Set environment variables
ENV DATABASE_URL=postgres://igfevents:QG7APKFuzzGeltQIgUS6AwG39YP0OazF@dpg-ckm84i0710pc7380vbqg-a.oregon-postgres.render.com/igfevents
ENV APP_KEY=base64:3lUj/ZNpIIox/dKQO5cslz/GLOZR3sUtDnK5DdJQhyU=
ENV DB_CONNECTION=pgsql

# Copy files
COPY . .

# Install composer dependencies
RUN composer install

# Run commands
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan migrate --force

COPY nginx.conf /etc/nginx/sites-available/default

# Exponse port
EXPOSE 80

CMD ["nginx"]
