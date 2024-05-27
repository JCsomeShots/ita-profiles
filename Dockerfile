FROM php:8.1.27-apache
WORKDIR /var/www/html

RUN a2enmod rewrite

RUN apt-get update && apt-get install -y \
    wait-for-it \
    libicu-dev \
    libmariadb-dev \
    unzip zip \
    zlib1g-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    git \
    libzip-dev \
    && pecl install xdebug \
    && docker-php-ext-install gettext intl pdo_mysql zip bcmath gd \
    && docker-php-ext-enable xdebug

RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

EXPOSE 8000

COPY . /var/www/html/
RUN COMPOSER_ALLOW_SUPERUSER=1 composer install --working-dir=/var/www/html
RUN cp .env.docker .env
RUN php artisan key:generate
ADD https://raw.githubusercontent.com/vishnubob/wait-for-it/master/wait-for-it.sh /usr/local/bin/wait-for-it.sh
RUN chmod +x /usr/local/bin/wait-for-it.sh

# Copiar el script de inicialización
COPY init.sh /usr/local/bin/init.sh
RUN chmod +x /usr/local/bin/init.sh

CMD ["/usr/local/bin/init.sh"]
