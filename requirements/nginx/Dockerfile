FROM debian:buster

# Создание каталога для SSL-сертификатов

# Установка OpenSSL
RUN apt-get update && apt-get install -y openssl && apt-get install -y nginx

# Создание приватного ключа и самозаверяющего сертификата
RUN mkdir /etc/nginx/certificates
RUN openssl req -x509 -newkey rsa:2048 -nodes -keyout /etc/nginx/certificates/key.key -out /etc/nginx/certificates/cert.crt -subj "/CN=localhost" -days 365

# Копирование конфигурационного файла Nginx с SSL
COPY --chown=www-data:www-data ./requirements/nginx/conf/nginx.conf /etc/nginx/sites-available/nginx.conf
# COPY --chown=www-data:www-data ./conf/nginx.conf /etc/nginx/sites-available/nginx.conf

RUN chmod 755 /var/www/html && ln -s /etc/nginx/sites-available/*.conf /etc/nginx/sites-enabled/

COPY --chown=root:root ./requirements/nginx/tools/index.php var/www/html/
# Открывает порт для HTTPS
EXPOSE 443

# Запуск Nginx
CMD ["nginx", "-g", "daemon off;"]
# CMD ["tail", "-f"]

