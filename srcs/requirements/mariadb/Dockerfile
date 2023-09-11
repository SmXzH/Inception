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
COPY --chown=root:root ./tools/init.sql /docker-entrypoint-initdb.d/init.sql

# Expose the MySQL port
EXPOSE 3306

# Start MariaDB when the container runs
CMD ["mysqld_safe"]

