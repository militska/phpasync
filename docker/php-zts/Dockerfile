FROM php:7.2.26-zts

RUN apt-get update && \
    apt-get upgrade -y && \
    apt-get install -y git

RUN git clone https://github.com/krakjoe/pthreads -b master /tmp/pthreads
RUN docker-php-ext-configure /tmp/pthreads --enable-pthreads
RUN docker-php-ext-install /tmp/pthreads

WORKDIR /var/www

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer require amphp/amp
RUN composer require amphp/parallel
