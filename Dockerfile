FROM php:7.2-apache

RUN printf "deb http://archive.debian.org/debian/ jessie main\ndeb-src http://archive.debian.org/debian/ jessie main\ndeb http://security.debian.org jessie/updates main\ndeb-src http://security.debian.org jessie/updates main" > /etc/apt/sources.list

RUN apt-get update \
    && apt-get -y install pkg-config libssl-dev \
    && docker-php-ext-install pdo pdo_mysql sockets

ENV APACHE_DOCUMENT_ROOT /var/www/html

RUN a2enmod rewrite

WORKDIR /var/www/html
