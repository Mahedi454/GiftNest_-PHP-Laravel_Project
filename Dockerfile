FROM php:8.2-apache

WORKDIR /var/www/html

RUN apt-get update \
    && apt-get install -y --no-install-recommends \
        git \
        unzip \
        libzip-dev \
        default-mysql-client \
    && docker-php-ext-install \
        pdo \
        pdo_mysql \
        zip \
    && a2enmod rewrite \
    && rm -rf /var/lib/apt/lists/*

COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

COPY . .

RUN composer install \
    --no-dev \
    --prefer-dist \
    --no-interaction \
    --no-progress \
    --optimize-autoloader

RUN mkdir -p storage/framework/cache storage/framework/sessions storage/framework/views storage/logs \
    && chown -R www-data:www-data /var/www/html \
    && chmod -R 775 storage bootstrap/cache \
    && cp .env.example .env \
    && printf '%s\n' \
       '<VirtualHost *:80>' \
       '    ServerName localhost' \
       '    DocumentRoot /var/www/html/public' \
       '' \
       '    <Directory /var/www/html/public>' \
       '        AllowOverride All' \
       '        Require all granted' \
       '        Options Indexes FollowSymLinks' \
       '    </Directory>' \
       '' \
       '    ErrorLog ${APACHE_LOG_DIR}/error.log' \
       '    CustomLog ${APACHE_LOG_DIR}/access.log combined' \
       '</VirtualHost>' \
       > /etc/apache2/sites-available/000-default.conf \
    && printf '%s\n' 'ServerName localhost' > /etc/apache2/conf-available/servername.conf \
    && a2enconf servername

ENV APP_ENV=production \
    APP_DEBUG=false \
    APP_URL=https://giftnest.onrender.com \
    LOG_CHANNEL=stderr \
    SESSION_DRIVER=file \
    CACHE_STORE=database \
    QUEUE_CONNECTION=database

COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

EXPOSE 80

ENTRYPOINT ["docker-entrypoint.sh"]
CMD ["apache2-foreground"]
