#!/bin/bash

# Run migrations (optional)
php artisan migrate --force

# Start PHP-FPM
php-fpm
