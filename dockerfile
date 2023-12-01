FROM php:8.2-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libzip-dev \
    curl \
    zip \
    unzip

# Get latest Composer
COPY --from=composer:2.5.8 /usr/bin/composer /usr/bin/composer

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install zip

# Install XDebug
RUN pecl install xdebug-3.2.1 && docker-php-ext-enable xdebug

USER 1001:1001

WORKDIR /var/www
CMD ["php-fpm"]
