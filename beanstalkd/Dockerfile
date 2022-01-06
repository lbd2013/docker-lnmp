FROM alpine
RUN echo -e 'https://mirrors.aliyun.com/alpine/v3.8/main/\nhttps://mirrors.aliyun.com/alpine/v3.8/community/' > /etc/apk/repositories
RUN apk add --no-cache beanstalkd
CMD [ "sh", "-c", "/usr/bin/beanstalkd -l beanstalkd -p 11300 -b /tmp/beanstalkd_binlog" ]
