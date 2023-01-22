FROM php:7.4-zts-alpine
WORKDIR /app
RUN docker-php-ext-install mysqli pdo pdo_mysql
CMD php artisan serve --host=0.0.0.0
