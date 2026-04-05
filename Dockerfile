FROM php:8.2-apache

COPY . /var/www/html/

# Fix permissions
RUN chown -R www-data:www-data /var/www/html

# Force Apache to use index.php
RUN echo "<Directory /var/www/html>
    DirectoryIndex index.php index.html
    AllowOverride All
    Require all granted
</Directory>" > /etc/apache2/conf-available/custom.conf \
    && a2enconf custom

# Enable rewrite
RUN a2enmod rewrite

# Fix warning (optional but good)
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
