FROM php:8.2-fpm


RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    zip \
    unzip


RUN apt-get clean && rm -rf /var/lib/apt/lists/*


RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd zip xml


COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


WORKDIR /var/www/html


RUN chown -R www-data:www-data /var/www/html


RUN echo "open_basedir = none" > /usr/local/etc/php/conf.d/open_basedir.ini