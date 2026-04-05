FROM php:8.2-apache

# Copy project files to Apache root
COPY . /var/www/html/

# Enable Apache mod_rewrite (optional)
RUN a2enmod rewrite
