FROM php:7.3-apache
RUN echo 'ServerName localhost' >> /etc/apache2/apache2.conf
RUN pecl install mongodb-1.6.0 && docker-php-ext-enable mongodb && pecl install redis-5.1.0 && docker-php-ext-enable redis
RUN a2enmod rewrite
COPY src/ /var/www/html/
ENV APACHE_DOCUMENT_ROOT /var/www/html/public
RUN sed -ri -e 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf
RUN sed -ri -e 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf