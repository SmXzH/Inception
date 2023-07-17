#!/bin/bash

cd /var/www/html/wordpress


sed -i "s/define( 'DB_NAME', 'wordpress' );/define( 'DB_NAME', '$DB_NAME' );/g" wp-config.php
sed -i "s/define( 'DB_PASSWORD', 'hello123' );/define( 'DB_PASSWORD', '$DB_PASS' );/g" wp-config.php
sed -i "s/define( 'DB_USER', 'kabusitt' );/define( 'DB_USER', '$DB_USER' );/g" wp-config.php

wp core download --force --allow-root

if ! wp core is-installed --allow-root --path=/var/www/html/wordpress; then
wp core install --url=$WP_URL --title=test --admin_user=$WP_ADMIN_USER --admin_password=$WP_ADMIN_PASS --admin_email=$WP_ADMIN_EMAIL --allow-root
wp user create $WP_USER $WP_EMAIL --role=subscriber --user_pass=$WP_PASS --allow-root
fi

/usr/sbin/php-fpm7.3 -F -R