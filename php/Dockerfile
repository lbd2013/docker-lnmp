FROM daocloud.io/library/php:7.3-fpm-alpine

COPY config/php.ini /usr/local/etc/php


ENV PHPREDIS_VERSION 5.0.2
ENV SWOOLE_VERSION 4.4.2

RUN cd ~ \
    && adduser -s /bin/bash git -D -H \
    && wget https://github.com/phpredis/phpredis/archive/$PHPREDIS_VERSION.tar.gz \
    && tar -zxvf $PHPREDIS_VERSION.tar.gz \
    && mkdir -p /usr/src/php/ext \
    && mv phpredis-$PHPREDIS_VERSION /usr/src/php/ext/redis \
    && docker-php-ext-install redis \

    && apk add libstdc++ libpng-dev zip libzip-dev \
    && cd ~ \
    && wget https://github.com/swoole/swoole-src/archive/v$SWOOLE_VERSION.tar.gz \
    && tar -zxvf v$SWOOLE_VERSION.tar.gz \
    && mkdir -p /usr/src/php/ext \
    && mv swoole-src-$SWOOLE_VERSION /usr/src/php/ext/swoole \
    && docker-php-ext-configure zip --with-libzip \
    && docker-php-ext-install swoole \
    && docker-php-ext-install pdo_mysql mysqli pcntl gd \
    && docker-php-ext-install zip \
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer