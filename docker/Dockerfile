FROM php:7.4-apache

# Config Apache
COPY 000-default.conf /etc/apache2/sites-available/000-default.conf
RUN a2enmod rewrite

RUN apt-get update && \
    apt-get install -y \ 
    zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer