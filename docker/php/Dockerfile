FROM php:7.2-fpm-alpine

RUN apk update && \
    apk add --no-cache \
        zlib-dev \
        git \
        zip \
        libpng-dev \
        libjpeg-turbo-dev \
        freetype-dev

RUN docker-php-ext-install \
    zip \
    exif \
    mysqli
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd

ENV COMPOSER_ALLOW_SUPERUSER 1
RUN curl --silent --show-error https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer --ansi --version --no-interaction
