FROM daocloud.io/library/php:7.3-fpm-alpine
COPY config/php.ini /usr/local/etc/php

ENV BUILD_DEPS zlib-dev libmemcached-dev cyrus-sasl-dev
ENV PHPREDIS_VERSION 5.3.4
ENV SWOOLE_VERSION master
ENV MEMCACHED_VERSION master
ENV TZ=Asia/Shanghai
RUN set -xe \
    && cd ~ \
    && apk update \
    && apk add tzdata \
    #时区设置
    && cp /usr/share/zoneinfo/Asia/Shanghai /etc/localtime \
    && echo $TZ > /etc/timezone \
    #基础库 git zip等
    && adduser -s /bin/bash git -D -H \
    && apk add libstdc++ libpng-dev zip libzip-dev \
    #cert设置
    && apk add ca-certificates \
    && update-ca-certificates \
    #php composer
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer \
    #只需要普通安装的php扩展：pdo、mysqli、pcntl、gd、zip、bcmath
    && docker-php-ext-install pdo_mysql mysqli pcntl gd zip bcmath sockets
RUN set -xe \
    && cd ~ \
    #php redis扩展
    && apk add --no-cache pcre-dev $PHPIZE_DEPS \
    && pecl install redis \
    && docker-php-ext-enable redis
RUN set -xe \
    && cd ~ \
    #php swoole扩展
    && pecl install swoole \
    && docker-php-ext-enable swoole
RUN set -xe \
    && cd ~ \
    #php memcache扩展
    && apk add --update --no-cache libmemcached-dev \
    && pecl install memcached-3.1.4 \
    && docker-php-ext-enable memcached
RUN set -xe \
    && cd ~ \
    #php mongo扩展
    && apk add --virtual build-dependencies build-base openssl-dev autoconf \
    && pecl install mongodb \
    && docker-php-ext-enable mongodb
