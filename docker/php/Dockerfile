FROM php:7.2-apache

RUN  a2enmod rewrite

RUN apt-get update \
  && apt-get install -y \
  libfreetype6-dev \
  libjpeg62-turbo-dev \
  libpng-dev \
  libmcrypt-dev \
  libicu-dev \
  libxml2-dev \
  git \
  vim \
  zip \
  unzip \
  openssl \
  && docker-php-ext-install \
  pdo_mysql \
  mbstring \ 
  tokenizer \
  xml \
  ctype \
  json \
  bcmath \
  && apt-get clean

# Install composer
RUN curl -sS https://getcomposer.org/installer \
  | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www/html
