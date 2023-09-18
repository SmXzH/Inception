FROM debian:bullseye

ARG CERT_PATH
ARG KEY_PATH

RUN apt-get update && apt-get install -y openssl && apt-get install -y nginx && apt-get install apt-utils

RUN mkdir /etc/nginx/certificates

RUN openssl req -x509 -newkey rsa:2048 -nodes -keyout ${KEY_PATH} -out ${CERT_PATH} -subj "/CN=szhakypo.42.fr" -days 365

COPY --chown=www-data:www-data ./conf/nginx.conf /etc/nginx/sites-available/nginx.conf

RUN chmod 755 /var/www/html && ln -s /etc/nginx/sites-available/*.conf /etc/nginx/sites-enabled/

EXPOSE 443

CMD ["nginx", "-g", "daemon off;"]

