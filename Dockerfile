# Utiliza la imagen de PHP 8
FROM php:8-fpm

# Instala dependencias
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip unzip

# Habilita las extensiones necesarias de PHP
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

RUN apt-get update && apt-get install -y libpq-dev \
    && docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pdo pdo_pgsql


# Instala Composer globalmente
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Establece el directorio de trabajo
WORKDIR /var/www/html

# Copia los archivos de tu proyecto al contenedor
COPY . .

# Instala las dependencias de Composer
RUN composer install

# Ejecuta otros comandos de Laravel
RUN php artisan config:cache
RUN php artisan route:cache
RUN php artisan migrate --force

# Expone el puerto 9000
EXPOSE 9000

CMD ["php-fpm"]
