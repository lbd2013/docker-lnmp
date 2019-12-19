用阿里云3台机器测试通过，参照这个网站可以实现：https://k8s-install.opsnull.com/

github地址：https://github.com/opsnull/follow-me-install-kubernetes-cluster

注意三点：

1、阿里云是vpc网络，公网ip绑在外层网关，机器无法监听自己的公网ip，通过ifconfig可以看到公网ip并不在

2、bindid，使用内网ip或0.0.0.0

3、授权证书的ip地址，由于需要在公网访问，需要改成使用公网ip