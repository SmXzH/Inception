FROM debian:buster

USER root

RUN apt-get update && apt-get install -y \
    php-fpm \
    php-mysql \
    wget \
    curl \
    ca-certificates
# Загрузите и установите WordPress

RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && \
	chmod +x wp-cli.phar && \
	mv wp-cli.phar /usr/local/bin/wp \
    && update-ca-certificates \
    && mkdir -p /var/run/php
RUN mkdir -p /usr/local/var/run/

COPY --chown=root:root /requirements/wordpress/conf/php-fpm.conf etc/


# Укажите порт, на котором будет доступен WordPress
EXPOSE 9000

ENTRYPOINT ["usr/sbin/php-fpm7.3", "-F", "-R", "--fpm-config", "/etc/php-fpm.conf"]