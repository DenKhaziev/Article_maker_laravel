FROM php:8.2-fpm

# Install system dependencies
RUN apt-get update -y \
    && apt-get install -y \
        apt-utils \
        libpq-dev \
        libpng-dev \
        libzip-dev \
        zip \
        unzip \
        mariadb-client \
        git \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/* /tmp/* /var/tmp/*

# Install PHP extensions
RUN docker-php-ext-install \
    bcmath \
    gd \
    zip \
    pdo \
    pdo_mysql

# Install and enable Xdebug
#RUN pecl install xdebug-3.2.0 \
#    && docker-php-ext-enable xdebug

# Copy custom PHP configuration
#COPY ./_docker/app/php.ini /usr/local/etc/php/conf.d/php.ini
COPY ./_docker/app/conf.d/* $PHP_INI_DIR/conf.d

# Install Composer
ENV COMPOSER_ALLOW_SUPERUSER=1
RUN curl -sS https://getcomposer.org/installer | php -- \
    --filename=composer \
    --install-dir=/usr/local/bin \
    && chmod +x /usr/local/bin/composer

# Set working directory
WORKDIR /var/www

# Configure PHP-FPM
RUN ln -sf /dev/stdout /var/log/php-fpm.access.log \
    && ln -sf /dev/stderr /var/log/php-fpm.error.log

CMD ["php-fpm", "-F"]
