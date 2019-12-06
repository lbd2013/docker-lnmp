#!/bin/sh

set -e

# Add logstash as command if needed
if [ "${1:0:1}" = '-' ]; then
	set -- logstash "$@"
fi

# Run as user "logstash" if the command is "logstash"
if [ "$1" = 'logstash' ]; then
	chown -R logstash:logstash /usr/share/logstash

	set -- su-exec logstash tini -- "$@"
fi

curl -XPOST -D- 'http://kibana:5601/api/saved_objects/index-pattern' \
    -H 'Content-Type: application/json' \
    -H 'kbn-version: 7.4.2' \
    -u elastic:changeme \
    -d '{"attributes":{"title":"llll-access-*","timeFieldName":"@timestamp"}}'

exec "$@"
