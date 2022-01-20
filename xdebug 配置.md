### 1. 通过 xdebug 检测工具器找到合适版本的 xdebug
将 phpinfo() 的全部信息 拷贝到 https://xdebug.org/wizard
根据网页提示，编译安装 xdebug 工具，需要注意的是，编译安装的时候是在容器内而不是在宿主机

### 2. php.ini 文件中，添加一下参数(只适用于xdebug 3)：
```
[Xdebug]
zend_extension = xdebug.so
xdebug.mode=debug
xdebug.start_with_request=yes
xdebug.client_host=host.docker.internal
;xdebug.client_host=47.243.177.34
xdebug.log=/tmp/xdebug.log
xdebug.discover_client_host = 1
;# 9003 is now the default (set this for old PhpStorm settings).
xdebug.client_port=9007
```

注意：这里要重启 php、nginx 两个容器

### 3. phpstorm 配置
![avatar](php/phpsotrm_server%E9%85%8D%E7%BD%AE1.jpg)
![avatar](php/phpsotrm_server%E9%85%8D%E7%BD%AE2.jpg)

### 4.跳过公司网络
1) 修改 php.ini 配置
```
注释：
xdebug.client_host=host.docker.internal

解注释：
xdebug.client_host=47.243.177.34
```

2) vnc 启动脚本主动链接 192.168.88.145:9000、47.243.177.34:9207

4) 47.243.177.34 开启脚本监听 9207 端口以及 9007端口
