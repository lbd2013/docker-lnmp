FROM daocloud.io/library/nginx:1.13.0-alpine

### set timezome
ENV TZ=Asia/Shanghai
RUN apk update \
    && apk add tzdata \
    && cp /usr/share/zoneinfo/Asia/Shanghai /etc/localtime \
    && echo $TZ > /etc/timezone \

