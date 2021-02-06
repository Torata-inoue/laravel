FROM php:7.4-fpm-buster
SHELL ["/bin/bash", "-oeux", "pipefail", "-c"]

ENV COMPOSER_ALLOW_SUPERUSER=1 \
  COMPOSER_HOME=/composer

COPY --from=composer:1.10 /usr/bin/composer /usr/bin/composer

RUN apt-get update && \
  apt-get --allow-releaseinfo-change update && \
  apt-get install -y wget git \
    libicu-dev \
    libonig-dev \
    libzip-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    unzip locales && \
  apt-get clean && \
  rm -rf /var/lib/apt/lists/* && \
  docker-php-ext-install intl pdo_mysql zip bcmath && \
  docker-php-ext-configure gd --with-freetype --with-jpeg && \
  docker-php-ext-install intl gd zip bcmath

COPY ./php.ini /usr/local/etc/php/php.ini

WORKDIR /home
