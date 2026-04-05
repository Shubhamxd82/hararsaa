FROM php:8.2-apache

COPY . /var/www/html/

# Fix permissions
RUN chown -R www-data:www-data /var/www/html

# Set index.php as default safely
RUN printf "<Directory /var/www/html>\nDirectoryIndex index.php index.html\nAllowOverride All\nRequire all granted\n</Directory>" > /etc/apache2/conf-available/custom.conf \
    && a2enconf custom

# Enable rewrite
RUN a2enmod rewrite

# Optional: remove warning
RUN echo "ServerName localhost" >> /etc/apache2/apache2.conf
