FROM php:fpm-alpine

RUN apk --update --no-cache add git

RUN set -ex \
  && apk --no-cache add \
    postgresql-dev

RUN docker-php-ext-install sockets

RUN apk add strace

WORKDIR /var/www

EXPOSE 9000
