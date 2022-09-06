FROM composer:2.4.1 as composer

##############################

FROM php:8.1.10-fpm-alpine3.16 as base

COPY --from=composer /usr/bin/composer /usr/bin/composer

RUN apk add --no-cache \
    icu-dev=~71 \
    pcre-dev=~8 \
    libzip-dev=1.8.0-r1 \
    php81-tokenizer=~8.1 \
    php81-iconv=~8.1 \
    php81-ctype=~8.1 \
    php81-session=~8.1 \
    php81-xml=~8.1

RUN docker-php-ext-install -j"$(nproc)" fileinfo intl pdo_mysql zip

ENV DOCKERIZE_VERSION v0.6.1
RUN wget -O dockerize.tar.gz "https://github.com/jwilder/dockerize/releases/download/${DOCKERIZE_VERSION}/dockerize-alpine-linux-amd64-${DOCKERIZE_VERSION}.tar.gz" && \
    tar -C /usr/local/bin -xzvf dockerize.tar.gz && \
    rm dockerize.tar.gz

WORKDIR /usr/src/app
 
COPY --chown=1000:1000 apps/backend /usr/src/app

RUN PATH=$PATH:/usr/src/app/vendor/bin:bin

RUN composer install --no-scripts --prefer-dist --no-interaction
