FROM richarvey/nginx-php-fpm:latest

WORKDIR /var/www/html

COPY . .

ENV WEBROOT /var/www/html/public
ENV COMPOSER_ALLOW_SUPERUSER 1

# The fix: Adding the memory limit bypass directly to the install script
RUN COMPOSER_MEMORY_LIMIT=-1 composer install --no-interaction --optimize-autoloader --no-dev

EXPOSE 80