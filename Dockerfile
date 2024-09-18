# Use PHP with Apache as the base image
FROM php:8.3-apache AS web

# Install Additional System Dependencies
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    curl \
    libonig-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Enable Apache mod_rewrite for URL rewriting
RUN a2enmod rewrite

# Install PHP extensions (including gd with jpeg and freetype support)
RUN docker-php-ext-configure gd --with-jpeg --with-freetype && \
    docker-php-ext-install pdo_mysql zip gd mbstring

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set Laravel public folder as DocumentRoot
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public

# Update Apache configuration to point to Laravel's public directory
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf

# Copy existing application directory contents to /var/www/html
COPY . /var/www/html

# Set the working directory
WORKDIR /var/www/html

# Install project dependencies
RUN composer install --no-dev --optimize-autoloader

# Generate Laravel application key
RUN php artisan key:generate

# Set proper permissions for Laravel
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

# Expose port 80
EXPOSE 80

# Run Apache in the foreground
CMD ["apache2-foreground"]
