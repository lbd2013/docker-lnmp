#FROM daocloud.io/library/php:7.3-fpm-alpine
FROM daocloud.io/library/php:7.3-fpm
COPY config/php.ini /usr/local/etc/php

ENV TZ=Asia/Shanghai
RUN set -xe \
    && cd ~ \
    #时区设置
    && cp /usr/share/zoneinfo/Asia/Shanghai /etc/localtime \
    && echo $TZ > /etc/timezone \
    #基础库 git zip等
    && apt-get update \ 
    && apt-get install -y zip unzip libzip-dev \
    #php composer
    && curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/bin/ --filename=composer \
    #只需要普通安装的php扩展：pdo、mysqli、pcntl、gd、zip、bcmath
    && docker-php-ext-install pdo_mysql mysqli pcntl zip bcmath sockets 
# Setup GD extension
RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
    && docker-php-ext-configure gd  --with-freetype-dir=/usr/include --with-jpeg-dir=/usr/include --with-png-dir=/usr/include \
    && docker-php-ext-install -j$(nproc) gd
RUN set -xe \
    && cd ~ \
    #php redis扩展
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
    && apt-get install -y libmemcached-dev \
    && pecl install memcached-3.1.4 \
    && docker-php-ext-enable memcached
RUN set -xe \
    && cd ~ \
    #php mongo扩展
    && pecl install mongodb \
    && docker-php-ext-enable mongodb
