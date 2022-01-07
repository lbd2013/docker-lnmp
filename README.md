# <center>使用Docker-compose 部署 LNMP+Redis+Memcache+Mongo+Rabbitmq+Beanstalk+Zabbix+Elk 环境 </center>

### 安装Docker
[说明文档](https://docs.docker.com/engine/install/centos/)

### 安装Docker-compose
[说明文档](https://docs.docker.com/compose/install/)

### Docker 换国内源
[说明文档](https://www.daocloud.io/mirror)
```
查看配置：/etc/docker/daemon.json

curl -sSL https://get.daocloud.io/daotools/set_mirror.sh | sh -s http://f1361db2.m.daocloud.io


systemctl daemon-reload
systemctl restart docker 

```

### 启动
```
yum install -y git  (centos)  或    apt install -y git-all (ubuntu)
```
```
ubuntu 默认启动了apache2 服务，占用了 80 端口，需要把 apache2 停了
查看端口占用命令： lsof -i :80
停止 apache2 命令： sudo /etc/init.d/apache2 stop
```
```
git clone https://github.com/lbd2013/docker-lnmp.git
cd docker-lnmp
sh init.sh
```
