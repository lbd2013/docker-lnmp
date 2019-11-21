#!/bin/bash
set -e

#mysql状态，用于调试
echo `service mysql status`

echo '1.start mysql'
mysql -uroot -p$MYSQL_ROOT_PASSWORD <<EOF
source $WORK_PATH/$FILE_0;
EOF