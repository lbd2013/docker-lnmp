FROM alpine:3.10
USER root
RUN set -xe \
    && cd ~ \
    && apk add --no-cache --virtual .build-deps \
       gcc \
       libc-dev \
       libevent-dev \
       linux-headers \
       make \
       tar \
       wget \
    && wget https://github.com/beanstalkd/beanstalkd/archive/v1.11.tar.gz -O beanstalkd.tar.gz \
    && mkdir ./beanstalkd && tar -xzvf beanstalkd.tar.gz -C ./beanstalkd --strip-components 1 \
    && cd ./beanstalkd \
    && make \
    && ls
WORKDIR "/root/beanstalkd"
EXPOSE 11300
CMD [ "sh", "-c", "cd ~  && ./beanstalkd -l 10.0.1.5 -p 11300" ]