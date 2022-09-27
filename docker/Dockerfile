FROM php:7.4-apache

# Config Apache and php
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

RUN apt-get update && \
    apt-get install -y \
    zip
    
RUN docker-php-ext-install mysqli pdo pdo_mysql

# Config Xdebug for testing
RUN pecl install xdebug && docker-php-ext-enable xdebug
COPY ./xdebug.ini "${PHP_INI_DIR}/conf.d"

# Use composer docker file
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer