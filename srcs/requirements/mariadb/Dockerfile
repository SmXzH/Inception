# Use Debian Bullseye as the base image
FROM debian:bullseye

ARG DB_NAME
ARG DB_USER
ARG DB_PASS
ARG DB_ROOT_PASS

# Install MariaDB server and client
RUN apt-get update && apt-get -y upgrade && apt-get install -y mariadb-server mariadb-client apt-utils

# Copy custom MariaDB server configuration
COPY --chown=root:root ./conf/50-server.cnf /etc/mysql/mariadb.conf.d/50-server.cnf

#RUN mysql -u root -p"$DB_ROOT_PASS" < /docker-entrypoint-initdb.d/init.sql

# Start MariaDB service
RUN service mariadb start \
	&& mysql -u root -e "ALTER USER 'root'@'localhost' IDENTIFIED BY '$DB_ROOT_PASS';" \
	&& mysql -u root -p"$DB_ROOT_PASS" -e "FLUSH PRIVILEGES;" \
	&& mysql -u root -p"$DB_ROOT_PASS" -e "CREATE DATABASE IF NOT EXISTS $DB_NAME;" \
	&& mysql -u root -p"$DB_ROOT_PASS" -e "CREATE USER IF NOT EXISTS 'root'@'%' IDENTIFIED BY '$DB_ROOT_PASS';" \
	&& mysql -u root -p"$DB_ROOT_PASS" -e "GRANT ALL PRIVILEGES ON *.* TO 'root'@'%';"\
	&& mysql -u root -p"$DB_ROOT_PASS" -e "CREATE USER IF NOT EXISTS '$DB_USER'@'%' IDENTIFIED BY '$DB_PASS';" \
	&& mysql -u root -p"$DB_ROOT_PASS" -e "GRANT ALL PRIVILEGES ON $DB_NAME.* TO '$DB_USER'@'%';" \
	&& mysql -u root -p"$DB_ROOT_PASS" -e "FLUSH PRIVILEGES;"



# Expose the MySQL port
EXPOSE 3306

# Start MariaDB when the container runs
ENTRYPOINT ["/usr/bin/mysqld_safe"]