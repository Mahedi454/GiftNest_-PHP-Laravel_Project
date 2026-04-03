FROM composer:2 AS vendor

WORKDIR /app

COPY composer.json composer.lock ./

RUN composer install \
    --no-dev \
    --optimize-autoloader \
    --no-interaction \
    --no-progress


FROM php:8.3-cli-alpine

WORKDIR /var/www/html

RUN apk add --no-cache \
        libpq \
        postgresql-dev \
        oniguruma-dev \
    && docker-php-ext-install pdo pdo_pgsql \
    && apk del postgresql-dev oniguruma-dev

COPY --from=vendor /app/vendor ./vendor
COPY . .

RUN chmod +x /var/www/html/docker-entrypoint.sh \
    && mkdir -p storage/framework/cache storage/framework/sessions storage/framework/views storage/logs bootstrap/cache \
    && chmod -R 775 storage bootstrap/cache

EXPOSE 10000

ENTRYPOINT ["/var/www/html/docker-entrypoint.sh"]
CMD ["sh", "-c", "php -S 0.0.0.0:${PORT:-10000} -t public"]
