FROM daocloud.io/library/nginx:1.13.0-alpine

### set timezome
ENV TZ=Asia/Shanghai
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone \
    && mkdir -p /var/log/nginx \
    && chmod -R 777 /var/log/nginx

