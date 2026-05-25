FROM richarvey/nginx-php-fpm:3.1.6

WORKDIR /var/www/html
ENV WEBROOT /var/www/html/public

COPY . .

# Install Node 20 + npm
RUN apk add --no-cache nodejs-current npm

# PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Frontend build
RUN npm install
RUN npm run build

# Laravel setup
RUN cp .env.example .env

# Permissions
RUN chmod -R 775 storage bootstrap/cache database

# Laravel automatic setup
RUN touch database/database.sqlite

RUN php artisan key:generate
RUN php artisan migrate --force

# Clear and rebuild caches
RUN php artisan optimize:clear
RUN php artisan route:clear
RUN php artisan config:clear
RUN php artisan view:clear

EXPOSE 8080