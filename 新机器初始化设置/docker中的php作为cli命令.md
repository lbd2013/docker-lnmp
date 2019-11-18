### <font face="黑体">使用docker的php容器作为php命令</font>

正常在linux下使用php命令只需要执行 php test.php,
使用docker构建lnmp之后，php环境在docker当中。
这对于日常开发来说并不方便，


## 方法
Alias
为命令起一个别名，如：
```
alias docker_php='docker exec php php' 
```