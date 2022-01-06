FROM daocloud.io/library/php:5.6-fpm-alpine
RUN echo -e 'https://mirrors.aliyun.com/alpine/v3.8/main/\nhttps://mirrors.aliyun.com/alpine/v3.8/community/' > /etc/apk/repositories
COPY config/php.ini /usr/local/etc/php

ENV MEMCACHED_DEPS zlib-dev libmemcached-dev cyrus-sasl-dev
ENV BUILD_DEPS zlib-dev libmemcached-dev cyrus-sasl-dev
ENV PHPREDIS_VERSION 3.1.3
ENV MEMCACHED_VERSION 2.2.0
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
    && wget https://github.com/phpredis/phpredis/archive/$PHPREDIS_VERSION.tar.gz -O php-phpredis.tar.gz \
    && mkdir ./php-phpredis && tar -xzvf php-phpredis.tar.gz -C ./php-phpredis --strip-components 1 \
    && mkdir -p /usr/src/php/ext \
    && mv php-phpredis /usr/src/php/ext/redis \
    && docker-php-ext-install redis \
    && rm -rf ./php-phpredis \
    && rm -rf /usr/src/php/ext/redis
RUN apk add --no-cache --update libmemcached-libs zlib
RUN set -xe \
    && apk add --no-cache --update --virtual .phpize-deps $PHPIZE_DEPS \
    && apk add --no-cache --update --virtual .memcached-deps $MEMCACHED_DEPS \
    && pecl install memcached-$MEMCACHED_VERSION \
    && echo "extension=memcached.so" > /usr/local/etc/php/conf.d/docker-php-ext-memcached.ini \
    && rm -rf /usr/share/php \
    && rm -rf /tmp/* \
    && apk del .memcached-deps .phpize-deps
RUN set -xe \
    && cd ~ \
    #php mongo扩展
    && apk add --virtual build-dependencies build-base openssl-dev autoconf \
    && pecl install mongo \
    && docker-php-ext-enable mongo
