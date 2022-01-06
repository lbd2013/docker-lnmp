FROM google/cadvisor:latest
RUN echo -e 'https://mirrors.aliyun.com/alpine/v3.8/main/\nhttps://mirrors.aliyun.com/alpine/v3.8/community/' > /etc/apk/repositories
### set timezome
ENV TZ=Asia/Shanghai
RUN apk update \
    && apk add tzdata \
    && cp /usr/share/zoneinfo/Asia/Shanghai /etc/localtime \
    && echo $TZ > /etc/timezone

