#!/bin/bash

wp core download --force --allow-root

if ! wp core is-installed --allow-root --path=/var/www/html/wordpress; then
wp core install --url=localhost --title=test --admin_user=szhakypo --admin_password=test123 --admin_email=szhakypo@student.42abudhabi.ae --allow-root
wp user create szhakypouser szhakypo@student.42abudhabi.ae --role=author --user_pass=test123 --allow-root
fi

/usr/sbin/php-fpm7.3 -F -R