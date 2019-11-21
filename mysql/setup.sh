#!/bin/bash
set -e
mysql -uroot -p$MYSQL_ROOT_PASSWORD <<EOF
source $WORK_PATH/$FILE_0;
EOF