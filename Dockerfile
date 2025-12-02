FROM php:7.2-apache

RUN echo "deb http://archive.debian.org/debian buster main" > /etc/apt/sources.list && \
    echo "deb http://archive.debian.org/debian-security buster/updates main" >> /etc/apt/sources.list && \
    echo "Acquire::Check-Valid-Until \"false\";" > /etc/apt/apt.conf.d/99no-check-valid-until

RUN apt-get update && apt-get install -y \
    libicu-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    mariadb-client \
    libpng-dev \
    libmcrypt-dev \
    && pecl install mcrypt-1.0.1 \
    && docker-php-ext-enable mcrypt \
    && docker-php-ext-install \
    intl \
    pdo_mysql \
    zip \
    gd

RUN a2enmod rewrite

WORKDIR /var/www/html

RUN chown -R www-data:www-data /var/www/html
