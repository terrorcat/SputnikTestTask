FROM php:8.1-cli

# Установка зависимостей
RUN apt-get update && apt-get install -y \
    libpq-dev zip unzip curl git \
    && docker-php-ext-install pdo pdo_pgsql

# Установка Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Установка Laravel зависимостей
WORKDIR /var/www
COPY . .
RUN composer install

# Открываем порт и стартуем сервер
EXPOSE 8123
CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8123"]
