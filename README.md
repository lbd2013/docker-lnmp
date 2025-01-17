# <center>使用Docker-compose 部署 LNMP+Redis+Memcache+Mongo+Rabbitmq+Beanstalk+Zabbix+Elk 环境 </center>
### 机器配置
ecs.g5.large   2 vCPU 8 GiB （I/O优化）  

### 安装Docker
[说明文档](https://docs.docker.com/engine/install/centos/)

### 安装Docker-compose
[说明文档](https://docs.docker.com/compose/install/)

### Docker 换国内源（按需）
[说明文档](https://www.daocloud.io/mirror)
```
查看配置：/etc/docker/daemon.json

curl -sSL https://get.daocloud.io/daotools/set_mirror.sh | sh -s http://f1361db2.m.daocloud.io


sudo systemctl restart docker 

```

### 安装 git
```
centos: 
sudo yum install https://packages.endpointdev.com/rhel/7/os/x86_64/endpoint-repo.x86_64.rpm     (# centos 用yum直接安装的 git 是 1.8 版本，使用起来问题比较多，加这句话可以安装 2.x 版本)
yum install -y git  

ubuntu:
apt install -y git-all
```

### 启动
```
注意：
ubuntu 默认启动了apache2 服务，占用了 80 端口，需要把 apache2 停了
查看端口占用命令： lsof -i :80
停止 apache2 命令： sudo /etc/init.d/apache2 stop
```
```
git clone https://github.com/lbd2013/docker-lnmp.git
cd docker-lnmp
sh init.sh
```
