FROM php:8.0-fpm

RUN apt-get update && apt-get upgrade -y \
	libonig-dev \
	libmcrypt-dev \
	zlib1g-dev \
	libpng-dev \
	libxml2-dev

RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    && docker-php-ext-install zip

RUN apt install nano
RUN apt install wget -y

## REDIS
RUN pecl install redis
RUN echo "extension=redis.so" > /usr/local/etc/php/conf.d/redis.ini
RUN echo "date.timezone=America/Sao_Paulo" > /usr/local/etc/php/conf.d/timezone_sao_paulo.ini
RUN echo "memory_limit = 1024M" > /usr/local/etc/php/conf.d/memory_limit.ini
#RUN wget https://github.com/phpredis/phpredis/archive/refs/heads/develop.zip
#RUN unzip develop.zip
#CMD cd phpredis-develop && phpize && make && make install
#CMD ["cp modules/redis.so {php-config–extension-dir}"]
#RUN echo "extension=redis.so"  > /usr/local/etc/php/conf.d/redis.ini

RUN groupadd dev -g 999
RUN useradd dev -g dev -d /home/dev -m
USER dev

EXPOSE 9000
CMD ["php-fpm"]
