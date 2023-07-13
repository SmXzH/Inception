# FROM debian:buster

# USER root

# RUN apt-get update && apt-get install -y \
#     php-fpm \
#     php-mysql \
#     wget \
#     curl \
#     ca-certificates \
#     mariadb-client
# # Загрузите и установите WordPress

# RUN curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar && \
# 	chmod +x wp-cli.phar && \
# 	mv wp-cli.phar /usr/local/bin/wp \
#     && update-ca-certificates \
#     && mkdir -p /var/run/php
# RUN mkdir -p /usr/local/var/run/

# COPY --chown=root:root /requirements/wordpress/conf/php-fpm.conf etc/

# COPY --chown=root:root ./requirements/wordpress/tools/wp-config.php tmp/

# WORKDIR /var/www/html/wordpress

# COPY /tmp/wp-config.php .

# # Update wp-config.php with environment variables
# RUN sed -i "s/define( 'DB_NAME', 'wordpress' );/define( 'DB_NAME', '$DB_NAME' );/g" wp-config.php \
#     && sed -i "s/define( 'DB_PASSWORD', 'hello123' );/define( 'DB_PASSWORD', '$DB_PASS' );/g" wp-config.php \
#     && sed -i "s/define( 'DB_USER', 'kabusitt' );/define( 'DB_USER', '$DB_USER' );/g" wp-config.php

# RUN wp core download --force --allow-root

# # Install WordPress if not already installed
# RUN if ! wp core is-installed --allow-root --path=/var/www/html/wordpress; then \
#     wp core install --url=$WP_URL --title=$WP_TITLE --admin_user=$WP_ADMIN_USER --admin_password=$WP_ADMIN_PASS --admin_email=$WP_ADMIN_EMAIL --allow-root && \
#     wp user create $WP_USER $WP_EMAIL --role=author --user_pass=$WP_PASS --allow-root \
#     fi

# # Укажите порт, на котором будет доступен WordPress
# EXPOSE 9000

# # ENTRYPOINT ["usr/sbin/php-fpm7.3", "-F", "-R", "--fpm-config", "/etc/php-fpm.conf"]
# ENTRYPOINT ["/usr/sbin/php-fpm7.3", "-F", "-R", "--fpm-config", "/etc/php-fpm.conf"]


FROM debian:buster

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

WORKDIR /var/www/html/wordpress/

# RUN wp core download --force --allow-root \
#     && wp core install --url=localhost --title=test --admin_user=szhakypo --admin_password=test123 --admin_email=szhakypo@student.42abudhabi.ae --allow-root


COPY ./tools/init.sh .

RUN chmod +x init.sh
# Укажите порт, на котором будет доступен WordPress
EXPOSE 9000

CMD ["./init.sh"]
