#FROM debian:latest

## Установка MariaDB
#RUN apt-get update && apt-get install -y mariadb-server

## Копирование конфигурационного файла
#COPY ./conf/my.cnf /etc/mysql/my.cnf

## Запуск службы MariaDB
#CMD /etc/init.d/mysql start && bash

FROM debian:buster

USER root

# Install MariaDB and other dependencies
RUN apt-get update && apt-get -y upgrade && apt-get install -y mariadb-server && apt-get install -y mariadb-client

# Configure MariaDB
RUN chmod 755 /var/lib/mysql/mysql

COPY ./conf/my.cnf /etc/mysql/my.cnf

## Create a new MySQL user and database
RUN service mysql start

RUN mysql -e "CREATE DATABASE mydatabase;"
RUN mysql -e "GRANT ALL PRIVILEGES ON mydatabase.* TO 'myuser'@'%' IDENTIFIED BY 'mypassword';" \
RUN mysql -e "FLUSH PRIVILEGES;"

# Expose the MariaDB port
EXPOSE 3306

# Start MariaDB on container startup
CMD ["tail", "-f"]