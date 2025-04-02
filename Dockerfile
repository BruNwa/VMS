FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    openssl

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
# Note: Ctype, Fileinfo, JSON, and OpenSSL are included in the base PHP image
RUN docker-php-ext-install \
    bcmath \
    mbstring \
    pdo \
    pdo_mysql \
    tokenizer \
    xml

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www/html

# Disable open_basedir
RUN echo "open_basedir = none" > /usr/local/etc/php/conf.d/open_basedir.ini

# Create an entrypoint script to handle Laravel setup
RUN echo '#!/bin/bash \n\
if [ ! -f .env ]; then \n\
  echo "Creating .env file..." \n\
  cp -n .env.example .env 2>/dev/null || echo "APP_NAME=Laravel \n\
APP_ENV=production \n\
APP_DEBUG=false \n\
APP_URL=http://localhost \n\
DB_CONNECTION=mysql \n\
DB_HOST=mysql \n\
DB_PORT=3306 \n\
DB_DATABASE=laravel_db \n\
DB_USERNAME=laravel_user \n\
DB_PASSWORD=Pa\$\$word \n\
CIPHER=AES-256-CBC" > .env \n\
fi \n\
\n\
if ! grep -q "^APP_KEY=" .env || grep -q "^APP_KEY=$" .env; then \n\
  echo "Generating application key..." \n\
  php artisan key:generate --force \n\
fi \n\
\n\
# Clear caches \n\
php artisan config:clear \n\
php artisan cache:clear \n\
\n\
# Set proper permissions \n\
chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache \n\
chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache \n\
\n\
# Start PHP-FPM \n\
exec php-fpm \n\
' > /usr/local/bin/docker-entrypoint.sh

RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# Expose port 9000 (default for PHP-FPM)
EXPOSE 9000

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]