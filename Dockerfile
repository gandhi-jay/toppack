FROM php:7

# Adding zip and unzip
RUN apt-get update && apt-get install -y ca-certificates curl git zlib1g-dev zip unzip

# Installing Xdebug and Configuration.
RUN yes | pecl install xdebug \
    && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_enable=on" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_autostart=off" >> /usr/local/etc/php/conf.d/xdebug.ini \
    && echo "xdebug.remote_connect_back=on" >> /usr/local/etc/php/conf.d/xdebug.ini

# Redis Extension
RUN pecl install redis && docker-php-ext-enable redis

# Zip Extension
RUN docker-php-ext-install zip && docker-php-ext-enable zip

# MBString
RUN docker-php-ext-install mbstring && docker-php-ext-enable mbstring

# PDO MySQL
RUN docker-php-ext-install pdo_mysql && docker-php-ext-enable pdo_mysql

# Create a DIR
RUN mkdir -p /var/www/bin

# Setting up Working Directory.
WORKDIR /var/www

# Installing Composer.
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');"
RUN php -r "if (hash_file('sha384', 'composer-setup.php') === '93b54496392c062774670ac18b134c3b3a95e5a5e5c8f1a9f115f203b75bf9a129d5daa8ba6a13e2cc8a1da0806388a8') { echo 'Installer verified'; } else { echo 'Installer corrupt'; unlink('composer-setup.php'); } echo PHP_EOL;"
RUN php composer-setup.php --install-dir=bin --filename=composer
RUN php -r "unlink('composer-setup.php');"

# Making Composer available inside docker-container.
RUN cp bin/composer /usr/local/bin/composer

COPY . /var/www/

RUN COMPOSER_ALLOW_SUPERUSER=1 php bin/composer install