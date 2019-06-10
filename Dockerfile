FROM php:7.0-apache

MAINTAINER mncpadilha

RUN php -r "copy('http://getcomposer.org/installer', 'composer-setup.php');"
RUN php composer-setup.php
RUN php -r "unlink('composer-setup.php');"
RUN mv composer.phar /usr/local/bin/composer

RUN docker-php-ext-install pdo pdo_mysql

EXPOSE 8080

COPY ./config/ /var/www/html/config/
COPY ./data/ /var/www/html/data/
COPY ./module/ /var/www/html/module/
COPY ./public/ /var/www/html/public/
COPY ./ /var/www/html/

WORKDIR /var/www/html/public

CMD ["php", "-S", "0.0.0.0:8080"]

