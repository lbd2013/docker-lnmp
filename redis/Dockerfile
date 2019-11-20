FROM daocloud.io/library/redis:latest
#COPY redis.conf /usr/local/etc/redis/redis.conf
USER root
CMD [ "sh", "-c", "touch /usr/local/redis/redis.log && chmod 777 /usr/local/redis/redis.log && chmod 777 /usr/local/redis/data" ]
CMD [ "redis-server", "/usr/local/etc/redis.conf" ]