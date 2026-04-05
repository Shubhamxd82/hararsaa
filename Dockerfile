FROM php:8.2-apache

COPY . /var/www/html/

# Set index.php as default
RUN echo "DirectoryIndex index.php index.html" > /etc/apache2/conf-available/custom-index.conf \
    && a2enconf custom-index

RUN a2enmod rewrite
