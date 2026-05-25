FROM richarvey/nginx-php-fpm:3.1.6

WORKDIR /var/www/html

COPY . .

# Install NodeJS 20 + npm
RUN apk add --no-cache nodejs-current npm

# Install PHP dependencies
RUN composer install --no-dev --optimize-autoloader

# Build frontend
RUN npm install
RUN npm run build

# Laravel setup
RUN cp .env.example .env
RUN php artisan key:generate

RUN chmod -R 775 storage bootstrap/cache

EXPOSE 8080