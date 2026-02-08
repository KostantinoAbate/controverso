FROM php:8.3-fpm

# Working directory
WORKDIR /var/www

# Install system dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    unixodbc-dev \
    libzip-dev \
    zip \
    libldap2-dev \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    npm \
    unixodbc \
    libmagickwand-dev \
    default-mysql-client \
    mariadb-client \
 && rm -rf /var/lib/apt/lists/*

# PHP extensions (GD, MySQL, ZIP, EXIF, PCNTL, LDAP, BCMATH)
RUN set -eux; \
    docker-php-ext-configure gd --with-freetype --with-jpeg; \
    docker-php-ext-install -j"$(nproc)" \
        gd \
        pdo_mysql \
        zip \
        exif \
        pcntl \
        ldap \
        bcmath

# PECL extensions: imagick + redis
RUN set -eux; \
    pecl install imagick redis; \
    docker-php-ext-enable imagick redis

# Composer (da immagine ufficiale)
COPY --from=composer:2 /usr/bin/composer /usr/local/bin/composer

# Utente non-root per Laravel
RUN groupadd -g 1000 www \
 && useradd -u 1000 -ms /bin/bash -g www www \
 && echo "alias ll='ls -la'" >> /home/www/.bashrc

# Workaround per errore OPENSSL Sql Server 0x2746
RUN sed -i -E 's/(CipherString\s*=\s*DEFAULT@SECLEVEL=)2/\11/' /etc/ssl/openssl.cnf

# (Opzionale) Se vuoi avere il codice copiato nell'immagine base,
# e poi sovrascriverlo in dev con il volume ./src:/var/www:
# COPY . /var/www
# RUN chown -R www:www /var/www

# Passa all'utente www
USER www

EXPOSE 9000
CMD ["php-fpm"]
