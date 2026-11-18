FROM php:8.5-apache

RUN apt-get update \
 && apt-get install -y --no-install-recommends libicu-dev libzip-dev unzip \
 && docker-php-ext-install intl mysqli pdo_mysql zip \
 && a2enmod rewrite \
 && rm -rf /var/lib/apt/lists/*

# CI4는 public/ 이 웹 루트
ENV APACHE_DOCUMENT_ROOT=/var/www/html/public
RUN sed -ri 's!/var/www/html!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/sites-available/*.conf \
 && sed -ri 's!/var/www/!${APACHE_DOCUMENT_ROOT}!g' /etc/apache2/apache2.conf /etc/apache2/conf-available/*.conf \
 && sed -ri 's!AllowOverride None!AllowOverride All!g' /etc/apache2/apache2.conf

# 바인드 마운트한 소스의 소유자(호스트 devloper)와 www-data UID를 맞춰 writable/ 권한 문제 방지
ARG UID=1001
ARG GID=1001
RUN groupmod -o -g ${GID} www-data && usermod -o -u ${UID} -g ${GID} www-data

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer
WORKDIR /var/www/html
