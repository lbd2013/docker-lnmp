ARG ELK_VERSION
ARG LS_JAVA_OPTS
# https://github.com/elastic/logstash-docker
FROM docker.elastic.co/logstash/logstash:${ELK_VERSION}

# Add your logstash plugins setup here
# Example: RUN logstash-plugin install logstash-filter-json
RUN logstash-plugin install logstash-filter-multiline

USER root
chmod 777 /usr/share/logstash/entrypoint.sh
USER logstash