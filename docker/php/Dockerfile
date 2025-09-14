FROM php:8.1-fpm

RUN apt update && apt install -y \
  default-mysql-client \
  libzip-dev \
  unzip \
  zlib1g-dev \
  libonig-dev \
  libxml2-dev \
  libpng-dev \
  libjpeg-dev \
  libfreetype6-dev \
  pkg-config \
  default-libmysqlclient-dev \
  && docker-php-ext-configure zip \
  && docker-php-ext-install pdo_mysql zip

RUN curl -sS https://getcomposer.org/installer | php &&\
  mv composer.phar /usr/local/bin/composer &&\
  composer self-update

WORKDIR /var/www