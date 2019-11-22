FROM daocloud.io/library/php:7.3-fpm-alpine

COPY config/php.ini /usr/local/etc/php

#RUN apk add autoconf gcc \
#    && wget https://github.com/phpredis/phpredis/archive/3.1.3.tar.gz \
#    && tar -zxvf 3.1.3.tar.gz \
#    && cd phpredis-3.1.3 \
#    && /usr/local/bin/phpize \
#    && ./configure --with-php-config=/usr/local/bin/php-config \
#    && make \
#    && make install \

ENV MEMCACHED_DEPS zlib-dev libmemcached-dev cyrus-sasl-dev
ENV PHPREDIS_VERSION 5.0.2
ENV SWOOLE_VERSION 4.4.2
ENV TZ=Asia/Shanghai
RUN cd ~ \
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
    #zip bcmath 扩展
    && docker-php-ext-install zip \
    && docker-php-ext-install bcmath \
    #php composer
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer \
    #只需要普通安装的php扩展：pdo、mysqli、pcntl、gd
    && docker-php-ext-install pdo_mysql mysqli pcntl gd
RUN cd ~ \
    #php redis扩展
    && wget https://github.com/phpredis/phpredis/archive/$PHPREDIS_VERSION.tar.gz \
    && tar -zxvf $PHPREDIS_VERSION.tar.gz \
    && mkdir -p /usr/src/php/ext \
    && mv phpredis-$PHPREDIS_VERSION /usr/src/php/ext/redis \
    && docker-php-ext-install redis
RUN cd ~ \
    #php swoole扩展
    && wget https://github.com/swoole/swoole-src/archive/v$SWOOLE_VERSION.tar.gz \
    && tar -zxvf v$SWOOLE_VERSION.tar.gz \
    && mv swoole-src-$SWOOLE_VERSION /usr/src/php/ext/swoole \
    && docker-php-ext-configure zip --with-libzip \
    && docker-php-ext-install swoole
