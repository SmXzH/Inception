FROM debian:buster

ARG DB_NAME
ARG DB_USER
ARG DB_PASS
ARG DB_ROOT_PASS

RUN apt-get update && apt-get -y upgrade && apt-get install -y mariadb-server && apt-get install -y mariadb-client

COPY --chown=root:root ./conf/50-server.cnf /etc/mysql/mariadb.conf.d/50-server.cnf

RUN service mysql start \
    && mysql -u root -e "CREATE DATABASE IF NOT EXISTS $DB_NAME;" \
    && mysql -u root -e "CREATE USER IF NOT EXISTS '$DB_USER'@'%' IDENTIFIED BY '$DB_PASS' ;" \
    && mysql -u root -e "GRANT ALL PRIVILEGES ON $DB_NAME.* TO '$DB_USER'@'%' ;" \
    && mysql -u root -e "ALTER USER 'root'@'localhost' IDENTIFIED BY '$DB_ROOT_PASS' ;" \
    && mysql -u root -p${DB_PASS} -e "FLUSH PRIVILEGES"

EXPOSE 3306

CMD ["mysqld"]

