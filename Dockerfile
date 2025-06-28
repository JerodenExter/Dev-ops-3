FROM php:8.2-apache

# Install dependencies
RUN apt-get update && apt-get install -y \
    git unzip zip curl libzip-dev libonig-dev libxml2-dev libpq-dev \
    libpng-dev libjpeg-dev libfreetype6-dev libgd-dev \
    libpng-dev libjpeg-dev libfreetype6-dev libgd-dev \
    npm nodejs gnupg \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_pgsql pdo_mysql mbstring zip xml

# Enable Apache mod_rewrite
RUN a2enmod rewrite

# Replace default site config
COPY apache/000-default.conf /etc/apache2/sites-available/000-default.conf

# Set working directory
WORKDIR /var/www/html

# Copy source code
COPY . /var/www/html

# Set permissions
RUN chown -R www-data:www-data /var/www/html

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy .env and generate app key early
RUN cp .env.example .env && php artisan key:generate

# Install PHP deps
RUN composer install --no-dev --optimize-autoloader --verbose

# Install Node deps and build assets
RUN npm install && npm run build

# Set permissions
RUN chown -R www-data:www-data storage bootstrap/cache

EXPOSE 80

# Run migrations and start Apache
CMD php artisan migrate:fresh --force && apache2-foreground
