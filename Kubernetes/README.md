用阿里云3台机器测试通过，参照这个网站可以实现：https://k8s-install.opsnull.com/

github地址：https://github.com/opsnull/follow-me-install-kubernetes-cluster

注意四点：

1、阿里云是vpc网络，公网ip绑在外层网关，机器无法监听自己的公网ip，通过ifconfig可以看到公网ip并不在

2、bindid，使用内网ip或0.0.0.0

3、授权证书的ip地址，由于需要在公网访问，需要改成使用公网ip

4、浏览器证书位置，ca.pem(CA证书)放在受信任的根证书颁发机构，admin.pfx则选择·根据证书类型，自动选择证书存储·