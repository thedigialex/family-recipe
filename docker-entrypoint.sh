#!/bin/bash

# Replace environment variables in the .env file
sed -i "s|APP_URL=.*|APP_URL=${APP_URL}|" /var/www/html/.env
sed -i "s|DB_CONNECTION=.*|DB_CONNECTION=${DB_CONNECTION}|" /var/www/html/.env
sed -i "s|DB_HOST=.*|DB_HOST=${DB_HOST}|" /var/www/html/.env
sed -i "s|DB_PORT=.*|DB_PORT=${DB_PORT}|" /var/www/html/.env
sed -i "s|DB_DATABASE=.*|DB_DATABASE=${DB_DATABASE}|" /var/www/html/.env
sed -i "s|DB_USERNAME=.*|DB_USERNAME=${DB_USERNAME}|" /var/www/html/.env
sed -i "s|DB_PASSWORD=.*|DB_PASSWORD=${DB_PASSWORD}|" /var/www/html/.env

# Run migrations (optional)
php artisan migrate --force

# Start PHP-FPM
php-fpm
