FROM php:8.2-fpm

LABEL maintainer="Xanu"

WORKDIR /var/www/html

ENV TZ=UTC
RUN ln -snf /usr/share/zoneinfo/$TZ /etc/localtime && echo $TZ > /etc/timezone

RUN apt-get update && apt-get install -y \
        libonig-dev \
        libzip-dev \
        libfreetype6-dev \
        libjpeg62-turbo-dev \
        libpng-dev \
        zip

RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd pdo_mysql mbstring zip exif pcntl \
    && curl -sL https://deb.nodesource.com/setup_18.x | bash - \
    && apt-get install -y nodejs \
    && npm install -g npm

RUN php -r "readfile('http://getcomposer.org/installer');" | php -- --install-dir=/usr/bin/ --filename=composer

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN groupadd -g 1000 phpuser
RUN useradd -u 1000 -ms /bin/bash -g phpuser phpuser

COPY ./ /var/www/html

COPY --chown=phpuser:phpuser . /var/www/html

USER phpuser

# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
