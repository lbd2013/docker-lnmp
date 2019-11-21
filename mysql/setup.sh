#!/bin/bash
set -e

##mysql状态，用于调试
#echo `service mysql status`
#
#echo '1.start mysql'
#service mysql start
#sleep 3
#echo `service mysql status`

echo '2.修改类型'
mysql < /mysql/init.sql

#sleep 3
#echo `service mysql status`

tail -f /dev/null