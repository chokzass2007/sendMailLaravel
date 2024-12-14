FROM php:8.3-cli

# ติดตั้ง dependencies
RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip

# ติดตั้ง Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# ตั้งค่าโฟลเดอร์ทำงาน
WORKDIR /var/www/html

# ติดตั้ง Laravel dependencies
RUN docker-php-ext-install pdo pdo_mysql

CMD php artisan serve --host=0.0.0.0 --port=8000
