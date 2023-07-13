FROM debian:buster

ENV DB_NAME=wordpress \
    DB_USER=szhakypo \
    DB_PASS=hello123 \
    DB_ROOT_PASS=hello123

# Install MariaDB and other dependencies
RUN apt-get update && apt-get -y upgrade && apt-get install -y mariadb-server && apt-get install -y mariadb-client

# Configure MariaDB
# RUN chown -R root:root /var/lib/mysql/mysql

# COPY --chown=root:root ./requirements/mariadb/conf/50-server.cnf ./etc/mysql/mariadb.conf.d/
COPY --chown=root:root ./conf/50-server.cnf /etc/mysql/mariadb.conf.d/

RUN service mysql start \
    && sleep 5 \
    && mysql -u root -e "CREATE DATABASE IF NOT EXISTS $DB_NAME;" \
    && mysql -u root -e "CREATE USER IF NOT EXISTS '$DB_USER'@'%' IDENTIFIED BY '$DB_PASS' ;" \
    && mysql -u root -e "GRANT ALL PRIVILEGES ON $DB_NAME.* TO '$DB_USER'@'%' ;" \
    && mysql -u root -e "ALTER USER 'root'@'localhost' IDENTIFIED BY '$DB_ROOT_PASS' ;" \
    && mysql -u root -p${DB_PASS} -e "FLUSH PRIVILEGES"

# Expose the MariaDB port
EXPOSE 3306

CMD ["mysqld"]

