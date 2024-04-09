FROM php:8.1-fpm

RUN apt-get update && apt-get install -y \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        libpq-dev \
        zlib1g-dev \
        libxml2-dev \
        libzip-dev \
        libonig-dev \
        zip \
        curl \
        unzip \
        git \
        vim \
        sudo \
    && docker-php-ext-configure gd \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mysqli \
    && docker-php-ext-install zip \
    && docker-php-ext-install pdo \
    && docker-php-ext-install pdo_pgsql \
    && docker-php-ext-install pgsql \
    && docker-php-ext-configure gd --with-jpeg=/usr/include/ --with-freetype=/usr/include/ \
    && docker-php-ext-install -j$(nproc) gd \
    && docker-php-ext-install xml

RUN docker-php-ext-install dom
RUN docker-php-ext-install exif
RUN apt-get update && apt-get install -y curl
RUN curl -sL https://deb.nodesource.com/setup_16.x | bash -
RUN apt-get update && apt-get install -y nodejs

# Set working directory
WORKDIR /var/www


# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Add user for laravel application
RUN groupadd -g 1000 www
RUN useradd -u 1000 -ms /bin/bash -g www www

# adding node and npm and use nv

# Copy existing application directory contents
#COPY . .
COPY --chown=www:www . /var/www

# Install Package
RUN composer update --ignore-platform-req=ext-exif
RUN php artisan key:generate
#RUN composer-dump-autoload
#RUN chown -Rf www:www /var/www
# Change current user to www
USER www
#RUN  chmod 777 public
#RUN  chmod 777 storage
#RUN  chmod 777 bootstrap/cache
#RUN  chown -R www:www public
#RUN  chown -R www:www storage
#RUN  chown -R www:www bootstrap/cache

#RUN chmod 755 public
#RUN chmod 777 storage
#RUN chmod 755 bootstrap/cache
#RUN chown -R www:www public
#RUN chown -R www:www storage
#RUN chown -R www:www /var/www
#RUN chmod -R 777 /var/www/storage
#RUN chmod -R 777 /var/www/storage/logs
#RUN chmod -R 777 /var/www/storage/logs/laravel.log
#RUN chmod -R 777 bootstrap/cache

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
