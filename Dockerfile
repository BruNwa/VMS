FROM php:8.2-fpm


RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    openssl \
    libicu-dev \
    libzip-dev \
    libjpeg-dev \
    libfreetype6-dev \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
    intl \
    zip \
    gd


RUN apt-get clean && rm -rf /var/lib/apt/lists/*


RUN docker-php-ext-install \
    bcmath \
    mbstring \
    pdo \
    pdo_mysql \
    xml


COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


WORKDIR /var/www/html


RUN echo "open_basedir = none" > /usr/local/etc/php/conf.d/open_basedir.ini


COPY appSetup.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh 
RUN chmod +x /var/www/html/*


EXPOSE 9000

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]