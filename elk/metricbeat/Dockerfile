ARG ELK_VERSION

FROM docker.elastic.co/beats/metricbeat:${ELK_VERSION}
RUN setup -E setup.kibana.host=${KIBANA_HOST} \
    -E output.elasticsearch.hosts=["${ELASTICSEARCH_HOST}"]