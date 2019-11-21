FROM daocloud.io/library/mysql:latest
USER root

# 复制数据库初始化脚本create_table.sql到/docker-entrypoint-initdb.d文件夹下
# mysql官方镜像中提供了容器启动时自动执行/docker-entrypoint-initdb.d文件夹下的脚本的功能(包括shell脚本和sql脚本)
COPY init.sql /docker-entrypoint-initdb.d