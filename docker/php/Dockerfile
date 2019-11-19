FROM php:7.2-fpm-alpine

RUN apk update && \
    apk add --no-cache \
        zlib-dev \
        libzip-dev \
        git \
        zip \
        libpng-dev \
        libjpeg-turbo-dev \
        freetype-dev

RUN docker-php-ext-install \
    exif \
    mysqli
RUN docker-php-ext-configure gd --with-freetype-dir=/usr/include/ --with-jpeg-dir=/usr/include/ \
    && docker-php-ext-install gd
RUN docker-php-ext-configure zip --with-libzip \
    && docker-php-ext-install zip

ENV COMPOSER_ALLOW_SUPERUSER 1
RUN curl --silent --show-error https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
RUN composer --ansi --version --no-interaction

CMD php-fpm \
    && composer install \
    && vendor/bin/wp package install aaemnnosttv/wp-cli-dotenv-command --allow-root \
    && vendor/bin/wp dotenv salts regenerate --allow-root
