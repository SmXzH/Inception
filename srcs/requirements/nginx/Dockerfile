FROM debian:bullseye

RUN apt-get update && apt-get install -y openssl && apt-get install -y nginx

RUN mkdir /etc/nginx/certificates

RUN openssl req -x509 -newkey rsa:2048 -nodes -keyout /etc/nginx/certificates/key.key -out /etc/nginx/certificates/cert.crt -subj "/CN=szhakypo.42.fr" -days 365

COPY --chown=www-data:www-data ./conf/nginx.conf /etc/nginx/sites-available/nginx.conf

RUN chmod 755 /var/www/html && ln -s /etc/nginx/sites-available/*.conf /etc/nginx/sites-enabled/

EXPOSE 443

CMD ["nginx", "-g", "daemon off;"]
# CMD ["tail", "-f"]

