#!/bin/bash
set -e #stop execution if any command fails

mkdir -p /var/www/html/uploads

# .env setup
echo "APP_NAME=Laravel
APP_ENV=local
APP_KEY=base64:7mDt3MaHugoiQ68Z3H/hcO69Fr+7aTrhufYpx8vDFAQ=
APP_DEBUG=true
APP_TIMEZONE=UTC
APP_URL=http://localhost

APP_LOCALE=en
APP_FALLBACK_LOCALE=en
APP_FAKER_LOCALE=en_US

APP_MAINTENANCE_DRIVER=file
# APP_MAINTENANCE_STORE=database

BCRYPT_ROUNDS=12

LOG_CHANNEL=stack
LOG_STACK=single
LOG_DEPRECATIONS_CHANNEL=null
LOG_LEVEL=debug

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=laravel_db
DB_USERNAME=root
DB_PASSWORD=root_Password

SESSION_DRIVER=database
SESSION_LIFETIME=120
SESSION_ENCRYPT=false
SESSION_PATH=/
SESSION_DOMAIN=null

BROADCAST_CONNECTION=log
FILESYSTEM_DISK=local
QUEUE_CONNECTION=database

CACHE_STORE=database
CACHE_PREFIX=

MEMCACHED_HOST=127.0.0.1

#REDIS_CLIENT=phpredis
#REDIS_HOST=127.0.0.1
#REDIS_PASSWORD=null
#REDIS_PORT=6379

# MAIL_MAILER=log
# MAIL_HOST=127.0.0.1
#MAIL_PORT=2525
#MAIL_USERNAME=null
#MAIL_PASSWORD=null
#MAIL_ENCRYPTION=null
#MAIL_FROM_ADDRESS="hello@example.com"
#MAIL_FROM_NAME=Laravel

#AWS_ACCESS_KEY_ID=
#AWS_SECRET_ACCESS_KEY=
#AWS_DEFAULT_REGION=us-east-1
#AWS_BUCKET=
#AWS_USE_PATH_STYLE_ENDPOINT=false

VITE_APP_NAME=Laravel
" > .env

#wating for the Database
echo "Waiting for database connection"
max_retries=30
counter=0
while ! php -r "try {new PDO('mysql:host=${DB_HOST:-mysql};port=${DB_PORT:-3306}', '${DB_USERNAME:-laravel_user}', '${DB_PASSWORD:-Password}');echo 'Connected successfully';} catch(PDOException \$e) {echo \$e->getMessage();exit(1);}" > /dev/null 2>&1; do
    sleep 1
    counter=$((counter+1))
    if [ $counter -ge $max_retries ]; then
        echo "failed to connect to database after $max_retries atp"
        exit 1
    fi
    echo "retrying database connection ($counter/$max_retries)"
done

#composer installation
composer install 


#generate application key if not set
if ! grep -q "^APP_KEY=" .env || grep -q "^APP_KEY=$" .env; then
    echo "generating application key"
    php artisan key:generate 
fi

#create sessions table and run migrations
echo "setting up database tables"
php artisan session:table 
php artisan migrate 

#create AddOn model 
php artisan make:model AddOn


#clear caches
php artisan config:clear
php artisan cache:clear

#setting permissions
echo "Ssetting permissions"
chmod 777 storage
chmod 777 storage/* 
chmod 777 bootstrap/* 
chmod 777 resources/* 
chmod 777 uploads

echo "the application setup complete"


exec php-fpm