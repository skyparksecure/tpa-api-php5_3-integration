FROM orsolin/docker-php-5.3-apache

WORKDIR /usr/src/myapp

ARG TEST_FILE=index.php
ENV TEST_FILE_PHP ${TEST_FILE}

COPY Webservices Webservices/
COPY *.php ./

CMD php $TEST_FILE_PHP