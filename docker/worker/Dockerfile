FROM composer as vendor

WORKDIR /tmp/

COPY composer.json composer.json
COPY composer.lock composer.lock

RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

FROM php:8.1-cli

ARG CONFIG_DIR=/docker/worker

LABEL maintainer="Andrew Robonen"

ENV TZ=UTC

RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

COPY . /var/www/html
COPY --from=vendor /tmp/vendor/ /var/www/html/vendor/

COPY $CONFIG_DIR/php.ini /usr/local/etc/php/
COPY $CONFIG_DIR/opcache.ini /usr/local/etc/php/conf.d/opcache.ini

RUN apt-get update \
    && apt-get install -y ffmpeg libpq-dev \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pgsql pdo_pgsql opcache \
    && pecl install redis \
    && docker-php-ext-enable redis

WORKDIR /var/www/html

CMD ["php", "artisan", "queue:work"]
