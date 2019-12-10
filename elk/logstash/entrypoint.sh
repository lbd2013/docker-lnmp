#!/bin/sh

#创建kibana索引
indexArr=("nginx-access-*" "nginx-error-*" "php-access-*" "php-error-*" "php-slow-*" "mysql-general-*")
for indexName in ${indexArr[@]}
do
  while true
  do
    tmpCode=$(curl -POST 'http://kibana:5601/api/saved_objects/index-pattern' \
      -H 'Content-Type: application/json' \
      -H 'kbn-version: 7.4.2' \
      -u elastic:changeme \
      -d '{"attributes":{"title":"'$indexName'","timeFieldName":"@timestamp"}}' \
      -o /dev/null \
      -s \
      -w '%{http_code}')
    echo "http_code $tmpCode"

    if [[ $tmpCode -eq 200 ]];then
      echo "$indexName success"
      break
    else
      sleep 2
      echo "$indexName retrying..."
    fi
  done
done

set -e

#启动logstash
exec "logstash"
