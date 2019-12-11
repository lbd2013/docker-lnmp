ARG ELK_VERSION
ARG LS_JAVA_OPTS
# https://github.com/elastic/logstash-docker
FROM docker.elastic.co/logstash/logstash:${ELK_VERSION}

# Add your logstash plugins setup here
# Example: RUN logstash-plugin install logstash-filter-json
RUN logstash-plugin install logstash-filter-multiline

USER root
COPY init/entrypoint.sh /usr/share/logstash/entrypoint.sh
COPY init/getNum.py /usr/share/logstash/getNum.py
RUN chmod +x /usr/share/logstash/entrypoint.sh
ENTRYPOINT ["/usr/share/logstash/entrypoint.sh"]
CMD ["-e", ""]