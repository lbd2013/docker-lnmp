#!/bin/sh

set -e

#创建kibana索引
indexArr=("nginx-access-*" "nginx-error-*" "php-access-*" "php-error-*" "php-slow-*" "mysql-general-*")
for indexName in ${indexArr[@]}
do
  until $(curl -POST 'http://kibana:5601/api/saved_objects/index-pattern' \
    -H 'Content-Type: application/json' \
    -H 'kbn-version: 7.4.2' \
    -u elastic:changeme \
    -d '{"attributes":{"title":"'$indexName'-*","timeFieldName":"@timestamp"}}' \
    -o /dev/null \
    -s \
    -w '%{http_code}') != "200"
  do
      sleep 2
      echo Retrying...
  done

done

#启动logstash
exec "logstash"
