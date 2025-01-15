FROM php:8.4-fpm-alpine

RUN apk add --no-cache \
    libintl \
    icu-dev \
    libxml2-dev \
    postgresql-dev \
    imagemagick-dev \
    libpng-dev \
    libjpeg-turbo-dev \
    freetype-dev \
    linux-headers \
    oniguruma-dev \
    libxslt-dev \
    curl-dev && \
    apk add --no-cache --virtual .build-deps $PHPIZE_DEPS

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install \
        intl \
        bcmath \
        opcache \
        pdo_pgsql \
        gd \
        xsl \
        pcntl \
        soap \
        xml \
        dom \
        simplexml

RUN pecl install xdebug \
    && docker-php-ext-enable xdebug

RUN apk del .build-deps

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

WORKDIR /var/www

CMD ["php-fpm"]