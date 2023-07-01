FROM debian:latest

ARG DB_NAME \
    DB_USER \
    DB_PASS \
    DB_ROOT_PASS

RUN apt-get update && apt-get install -y mariadb-client && apt-get install -y mariadb

RUN mkdir /var/run/mysqld; \
    chmod 777 /var/run/mysqld; \
    { echo '[mysqld]'; \
      echo 'skip-host-cache'; \
      echo 'skip-name-resolve'; \
      echo 'bind-address=0.0.0.0'; \
    } | tee  /etc/my.cnf.d/docker.cnf; \
    sed -i "s|skip-networking|skip-networking=0|g" \
      /etc/my.cnf.d/mariadb-server.cnf

RUN mysql_install_db --user=mysql --datadir=/var/lib/mysql

EXPOSE 3306

USER mysql
COPY tools/db.sh .
ENTRYPOINT  ["sh", "db.sh"]
CMD ["/usr/bin/mysqld", "--skip-log-error"]