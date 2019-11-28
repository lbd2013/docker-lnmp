FROM daocloud.io/library/php:7.3-fpm-alpine
COPY config/php.ini /usr/local/etc/php

ENV BUILD_DEPS zlib-dev libmemcached-dev cyrus-sasl-dev
ENV PHPREDIS_VERSION master
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
    && docker-php-ext-install pdo_mysql mysqli pcntl gd zip bcmath ext-sockets
#RUN set -xe \
#    && cd ~ \
#    #php redis扩展
#    && wget https://github.com/phpredis/phpredis/archive/$PHPREDIS_VERSION.tar.gz -O php-phpredis.tar.gz \
#    && mkdir ./php-phpredis && tar -xzvf php-phpredis.tar.gz -C ./php-phpredis --strip-components 1 \
#    && mkdir -p /usr/src/php/ext \
#    && mv php-phpredis /usr/src/php/ext/redis \
#    && docker-php-ext-install redis \
#    && rm -rf ./php-phpredis \
#    && rm -rf /usr/src/php/ext/redis
#RUN set -xe \
#    && cd ~ \
#    #php swoole扩展
#    && wget https://github.com/swoole/swoole-src/archive/$SWOOLE_VERSION.tar.gz -O php-swoole.tar.gz \
#    && mkdir ./php-swoole && tar -xzvf php-swoole.tar.gz -C ./php-swoole --strip-components 1 \
#    && mv php-swoole /usr/src/php/ext/swoole \
#    && docker-php-ext-configure zip --with-libzip \
#    && docker-php-ext-install swoole \
#    && rm -rf ./php-swoole \
#    && rm -rf /usr/src/php/ext/swoole
#RUN set -xe \
#    && cd ~ \
#    #php memcache扩展
#    && apk add --no-cache --update libmemcached-libs zlib \
#    && apk add --no-cache --update --virtual .build-deps $BUILD_DEPS \
#    && wget https://github.com/php-memcached-dev/php-memcached/archive/$MEMCACHED_VERSION.tar.gz -O php-memcached.tar.gz \
#    && mkdir ./php-memcached && tar -xzvf php-memcached.tar.gz -C ./php-memcached --strip-components 1 \
#    && mv php-memcached /usr/src/php/ext/memcached \
#    && docker-php-ext-install /usr/src/php/ext/memcached \
#    && rm -rf ./php-memcached \
#    && rm -rf /usr/src/php/ext/memcached \
#    && apk del .build-deps
#RUN set -xe \
#    && cd ~ \
#    #php mongo扩展
#    && apk add --virtual build-dependencies build-base openssl-dev autoconf \
#    && pecl install mongodb \
#    && docker-php-ext-enable mongodb