FROM daocloud.io/library/mysql:latest

#设置免密登录
ENV MYSQL_ALLOW_EMPTY_PASSWORD yes

#将文件拷贝到容器中
CMD [ "sh", "-c", "mkdir /usr/mysql && chmod 777 /usr/mysql" ]
COPY setup.sh /usr/mysql/setup.sh
COPY init.sql /usr/mysql/init.sql
CMD [ "sh", "-c", "/usr/mysql/setup.sh" ]