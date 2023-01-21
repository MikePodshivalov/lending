FROM php:8.2-fpm

USER root

# Install system dependencies
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libpq-dev \
    libzip-dev \
    libtidy-dev \
    libcurl4-openssl-dev \
    libonig-dev \
    libmagickwand-dev \
    libxml2-dev \
    zip \
    unzip

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN mkdir -p /usr/src/php/ext/imagick && \
    curl -fsSL https://github.com/Imagick/imagick/archive/refs/tags/3.7.0.tar.gz | tar xvz -C "/usr/src/php/ext/imagick" --strip 1

# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg
RUN docker-php-ext-install \
    curl \
    pdo \
    pdo_mysql \
    pdo_pgsql\
    pgsql \
    mbstring \
    zip \
    mysqli \
    xml \
    imagick \
    tidy \
    exif \
    intl \
    pcntl \
    bcmath \
    sockets \
    gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN pecl install -o -f redis \
&&  rm -rf /tmp/pear \
&&  docker-php-ext-enable redis

EXPOSE 9000
CMD ["php-fpm"]

ARG XDEBUG=false

ARG UNAME=www-data
ARG UGROUP=www-data
ARG UID=1000
ARG GID=1000
RUN usermod  --uid $UID $UNAME
RUN groupmod --gid $GID $UGROUP

RUN if "$XDEBUG" == "true" ; then yes | pecl channel-update pecl.php.net && pecl install xdebug-3.2.0 \
      && echo "zend_extension=$(find /usr/local/lib/php/extensions/ -name xdebug.so)" > /usr/local/etc/php/conf.d/xdebug.ini \
      && echo "xdebug.mode=debug" >> /usr/local/etc/php/conf.d/xdebug.ini \
      && echo "xdebug.start_with_request=yes" >> /usr/local/etc/php/conf.d/xdebug.ini  \
      && echo "xdebug.client_host=host.docker.internal" >> /usr/local/etc/php/conf.d/xdebug.ini  \
      && echo "xdebug.client_port=9003" >> /usr/local/etc/php/conf.d/xdebug.ini  \
      && echo "xdebug.idekey=PHPSTORM" >> /usr/local/etc/php/conf.d/xdebug.ini  \
    ; else yes | echo XDebug is not need to install ; fi

RUN apt-get update;

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

COPY ./src /var/www
COPY ./src/.env.example /var/www/.env

# Set working directory
WORKDIR /var/www
RUN chown -R "$UNAME:$UGROUP" /var/www

USER $UNAME

RUN composer install
