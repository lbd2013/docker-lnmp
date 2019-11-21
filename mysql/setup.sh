#!/bin/bash
set -e

#mysql状态，用于调试
echo `service mysql status`

echo '1.start mysql'
mysql -uroot -p$MYSQL_ROOT_PASSWORD

sleep 3
echo `service mysql status`

echo '2.修改类型'
mysql < $WORK_PATH/$FILE_0;

sleep 3
echo `service mysql status`

tail -f /dev/null