FROM composer:2 as vendor

WORKDIR /app
COPY . .
RUN composer install --no-dev --optimize-autoloader


FROM php:8.4-cli

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
    git unzip libpq-dev \
    && docker-php-ext-install pdo pdo_pgsql

COPY --from=vendor /app /var/www

EXPOSE 10000

CMD php artisan serve --host=0.0.0.0 --port=10000
