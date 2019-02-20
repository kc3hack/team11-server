FROM php:7.2-apache

# Enable mod_rewirte
RUN  a2enmod rewrite

# Copy apache settings
COPY docker/apache2/sites-available /etc/apache2/sites-available

# Install packages
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

# Move working directory
WORKDIR /var/www/html

# Copy application
COPY public /var/www/html

# Change permission
RUN chown -R www-data:www-data *

# Change settings for production
RUN cp .env.production .env

# Install libraries
RUN composer install
