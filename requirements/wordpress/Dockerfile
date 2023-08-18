FROM debian:buster

ARG DB_NAME
ARG DB_USER
ARG DB_PASSDB_ROOT_PASS
ARG WP_ADMIN_EMAIL
ARG WP_ADMIN_USER
ARG WP_ADMIN_PASS
ARG WP_URL
ARG WP_USER
ARG WP_EMAIL
ARG WP_PASS

USER root

RUN apt-get update && apt-get install -y \
    php7.3-fpm \
    php7.3-mysql \
    wget \
    curl \
    ca-certificates \
    mariadb-client

# Загрузите и установите WordPress
RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && \
    chmod +x wp-cli.phar && \
    mv wp-cli.phar /usr/local/bin/wp \
    && update-ca-certificates

RUN mkdir -p /var/run/php \
    && mkdir -p /usr/local/var/run/

COPY ./conf/php-fpm.conf /etc/php/7.3/fpm/php-fpm.conf

COPY ./tools/wp-config.php /var/www/html/wordpress/wp-config.php

COPY ./tools/init.sh .
RUN chmod +x init.sh

EXPOSE 9000

CMD ["./init.sh"]
