FROM debian:bullseye

# ARG DB_NAME
# ARG DB_USER
# ARG DB_PASS
# ARG DB_ROOT_PASS

RUN apt-get update && apt-get -y upgrade && apt-get install -y mariadb-server && apt-get install -y mariadb-client

COPY --chown=root:root ./conf/50-server.cnf /etc/mysql/mariadb.conf.d/50-server.cnf

RUN service mariadb start && \
    mysql -u root -e "ALTER USER 'root'@'localhost' IDENTIFIED BY '$DB_ROOT_PASS';" && \
    mysql -u root -e "FLUSH PRIVILEGES;" && \
    mysql -u root -p"$DB_ROOT_PASS" -e "CREATE DATABASE IF NOT EXISTS '$DB_NAME'; \
                                        CREATE USER IF NOT EXISTS 'root'@'%' IDENTIFIED BY '$DB_ROOT_PASS'; \
                                        GRANT ALL PRIVILEGES ON *.* TO 'root'@'%'; \
                                        CREATE USER IF NOT EXISTS '$DB_USER'@'%' IDENTIFIED BY '$DB_PASS'; \
                                        GRANT ALL PRIVILEGES ON '$DB_NAME'.* TO '$DB_USER'@'%'; \
                                        FLUSH PRIVILEGES;"
EXPOSE 3306

CMD ["tail", "-f"]

