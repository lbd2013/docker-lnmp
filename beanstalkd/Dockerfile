FROM alpine

RUN apk add --no-cache beanstalkd

CMD [ "sh", "-c", "/usr/bin/beanstalkd -l beanstalkd -p 11300 -b /tmp/beanstalkd_binlog.log" ]