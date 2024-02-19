FROM richarvey/nginx-php-fpm:3.1.4

COPY . .

# Image config
ENV SKIP_COMPOSER 1
ENV WEBROOT /var/www/html/public
ENV PHP_ERRORS_STDERR 1
ENV RUN_SCRIPTS 1
ENV REAL_IP_HEADER 1

# Laravel config
ENV APP_ENV production
ENV APP_DEBUG false
ENV APP_KEY base64:nj3r3z+7xa7BeQ+WUA8OdUTK0H4U4clRoQUIIBgrr6Y=
ENV LOG_CHANNEL stderr
ENV DB_CONNECTION pgsql
ENV DB_HOST dpg-cn9enh2cn0vc738rqkp0-a.singapore-postgres.render.com
ENV DB_PORT 5432
ENV DB_DATABASE school4
ENV DB_USERNAME root
ENV DB_PASSWORD BcAjS4pCXaYIFSgeVoBZnHA4xGckegz4
ENV MYSQL_ATTR_SSL_CA cacert-2023-12-12.pem

# Allow composer to run as root
ENV COMPOSER_ALLOW_SUPERUSER 1

CMD ["/start.sh"]