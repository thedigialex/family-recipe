# Use the latest stable version of PHP 8.2 FPM
FROM php:8.3-fpm

# Set working directory
WORKDIR /var/www/html

# Update system packages to the latest versions
RUN apt-get update && apt-get upgrade -y

# Install system dependencies
RUN apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip \
    mariadb-client

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Install Composer (latest version)
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Copy the application code into the container
COPY . .

# Install PHP dependencies with Composer
RUN composer install --optimize-autoloader --no-dev

# Copy the existing environment file if exists, otherwise create a new one
COPY .env.example .env

# Generate application key
RUN php artisan key:generate

# Expose port 9000 and start PHP-FPM server
EXPOSE 9000

# Set permissions for Laravel storage and bootstrap cache
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Make entrypoint script executable
RUN chmod +x ./docker-entrypoint.sh

# Run the entrypoint file
ENTRYPOINT ["./docker-entrypoint.sh"]
