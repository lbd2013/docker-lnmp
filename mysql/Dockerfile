FROM daocloud.io/library/mysql:latest

USER root

#设置免密登录
ENV MYSQL_ALLOW_EMPTY_PASSWORD yes

#将文件拷贝到容器中
CMD [ "sh", "-c", "touch /usr/mysql" ]
COPY setup.sh /usr/mysql/setup.sh
COPY init.sql /usr/mysql/init.sql
CMD [ "sh", "-c", "chmod -R 777 /usr/mysql && /usr/mysql/setup.sh" ]