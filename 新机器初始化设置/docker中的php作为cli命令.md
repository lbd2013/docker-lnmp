### <font face="黑体">1 使用docker的php容器作为php命令</font>

正常在linux下使用php命令只需要执行 php test.php,
使用docker构建lnmp之后，php环境在docker当中。
这对于日常开发来说并不方便，


## 方法
Alias
为命令起一个别名，如：
```
alias php='docker exec php php' 
```

### <font face="黑体">2 安装composer</font>
```
php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
php -r "if (hash_file('sha384', 'composer-setup.php') === 'a5c698ffe4b8e849a443b120cd5ba38043260d5c4023dbf93e1558871f1f07f58274fc6f4c93bcfd858c6bd0775cd8d1') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
php composer-setup.php
php -r "unlink('composer-setup.php');"
```
以上命令安装完之后，`composer.phar` 文件，位于php容器中的 `/var/www/html`中，
进入php容器 
```
docker exec -it php sh
```

将`composer.phar`移到`/usr/bin/`目录
```
mv composer.phar /usr/bin/composer
```

退出容器</br>

将composer映射到本机作为命令
```
alias composer='docker exec php composer' 
```