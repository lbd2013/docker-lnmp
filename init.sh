set -xe
chmod -R 777 ./log
chmod -R 777 ./redis/data
chmod -R 777 ./mongod/data
chmod -R 777 ./elk/elasticsearch/data
chmod -R 777 ./elk/logstash/pipeline
chmod -R 777 ./zabbix/web/data
chmod -R 777 ./zabbix/server/data
chmod -R 777 ./grafana/data
#docker-compose up -d
docker-compose -f docker-compose.yml -f elk/docker-compose.yml up -d
