#!/bin/bash

cd /var/www/html/wordpress

wp core download --force --allow-root

if ! wp core is-installed --allow-root --path=/var/www/html/wordpress; then
wp core install --url=$WP_URL --title=Inception --admin_user=$WP_ADMIN_USER --admin_password=$WP_ADMIN_PASS --admin_email=$WP_ADMIN_EMAIL --allow-root
wp user create $WP_USER $WP_EMAIL --role=subscriber --user_pass=$WP_PASS --allow-root
fi

/usr/sbin/php-fpm7.4 -F