FROM php:7.2-apache

RUN apt-get update \
    && apt-get -y install pkg-config libssl-dev \
    && docker-php-ext-install pdo pdo_mysql sockets

ENV APACHE_DOCUMENT_ROOT /var/www/html

COPY apache.conf.d/webserver.conf /etc/apache2/sites-available/000-default.conf

RUN a2enmod rewrite

WORKDIR /var/www/html
