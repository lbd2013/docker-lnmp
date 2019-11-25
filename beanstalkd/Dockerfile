FROM alpine:3.10
RUN set -xe \
    && cd ~ \
    && wget https://github.com/beanstalkd/beanstalkd/archive/v1.11.tar.gz -O beanstalkd.tar.gz \
    && mkdir ./beanstalkd && tar -xzvf beanstalkd.tar.gz -C ./beanstalkd --strip-components 1 \
    && mv beanstalkd /usr/src/
    && make
    && ./beanstalkd