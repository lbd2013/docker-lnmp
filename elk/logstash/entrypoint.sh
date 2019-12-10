#!/bin/sh

##根据索引规则名查找索引规则
#curl -XGET "http://kibana:5601/api/saved_objects/_find?type=index-pattern&search_fields=title&search='filebeat-*'" -H 'kbn-xsrf: true' -u elastic:changeme
#
##根据索引规则id删除索引规则
#curl -XDELETE "http://kibana:5601/api/saved_objects/index-pattern/6344e940-1b22-11ea-9e9b-9db51ea8b737" -H 'kbn-xsrf: true' -u elastic:changeme

##创建kibana索引
export PYTHONIOENCODING=utf8
indexArr=("filebeat-*")
for indexName in ${indexArr[@]}
do
  while true
  do
    echo "create $indexName start..."
    echo "check $indexName exist..."
    existIndexNum=$(curl -XGET "http://kibana:5601/api/saved_objects/_find?type=index-pattern&search_fields=title&search='$indexName'" -H 'kbn-xsrf: true' -u elastic:changeme -s | \
    python -c "import sys, json; print json.load(sys.stdin)['total']")
    if [[ existIndexNum -eq 0 ]];then
      tmpCode=$(curl -POST 'http://kibana:5601/api/saved_objects/index-pattern?overwrite=true' \
        -H 'Content-Type: application/json' \
        -H 'kbn-version: 7.4.2' \
        -u elastic:changeme \
        -d '{"attributes":{"title":"'$indexName'","timeFieldName":"@timestamp"}}' \
        -o /dev/null \
        -s \
        -w '%{http_code}')
      echo "result http_code is $tmpCode"

      if [[ $tmpCode -eq 200 ]];then
        echo "create $indexName success"
        break
      else
        sleep 2
        echo "create fail, retrying..."
      fi
    else
      echo "$indexName exist, need to delete... "
      deleteIndexArr=$(curl -XGET "http://kibana:5601/api/saved_objects/_find?type=index-pattern&search_fields=title&search='$indexName'" -H 'kbn-xsrf: true' -u elastic:changeme -s | \
      python -c "import json, sys; [sys.stdout.write(x['id'] + ' ') for x in (json.load(sys.stdin)['saved_objects'])]");
      for delIndexId in $deleteIndexArr
      do
        deleteUrl="http://kibana:5601/api/saved_objects/index-pattern/$delIndexId"
        curl -XDELETE "$deleteUrl" -H 'kbn-xsrf: true' -u elastic:changeme -o /dev/null -s
      done
      echo "delete $indexName success"
    fi
  done
done

set -e

#启动logstash
exec "logstash"
