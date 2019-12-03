FROM google/cadvisor:latest
### set timezome
ENV TZ=Asia/Shanghai
RUN apk update \
    && apk add tzdata \
    && cp /usr/share/zoneinfo/Asia/Shanghai /etc/localtime \
    && echo $TZ > /etc/timezone

