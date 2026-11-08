FROM php:8.2-apache

# Metadata
LABEL maintainer="GarudaCBT Community"
LABEL description="Garuda CBT (Gabungan Aplikasi Rapor, Ujian dan E-Learning) Container"

# Install ekstensi sistem yang dibutuhkan CodeIgniter 3, PhpSpreadsheet, PhpWord, dan DomPDF
RUN apt-get update && apt-get install -y --no-install-recommends \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libzip-dev \
    libxml2-dev \
    libonig-dev \
    zip \
    unzip \
    curl \
    mariadb-client \
    && rm -rf /var/lib/apt/lists/*

# Konfigurasi & instalasi ekstensi PHP
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        mysqli \
        pdo_mysql \
        gd \
        zip \
        opcache \
        fileinfo \
        calendar \
        bcmath \
        intl

# Aktifkan modul Apache rewrite dan headers
RUN a2enmod rewrite headers

# Salin konfigurasi VirtualHost Apache
COPY docker/apache/000-default.conf /etc/apache2/sites-available/000-default.conf

# Salin konfigurasi PHP khusus
COPY docker/php/php.ini $PHP_INI_DIR/conf.d/custom.ini

# Set direktori kerja
WORKDIR /var/www/html

# Salin source code aplikasi
COPY . /var/www/html/

# Salin dan berikan izin eksekusi skrip entrypoint
COPY docker/entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

# Pastikan folder penyimpanan dan cache memiliki hak akses ke www-data
RUN mkdir -p /var/www/html/uploads \
             /var/www/html/backups \
             /var/www/html/application/cache \
             /var/www/html/application/logs \
    && chown -R www-data:www-data /var/www/html/uploads \
                                  /var/www/html/backups \
                                  /var/www/html/application/cache \
                                  /var/www/html/application/logs \
                                  /var/www/html/application/config/database.php \
    && chmod -R 775 /var/www/html/uploads \
                    /var/www/html/backups \
                    /var/www/html/application/cache \
                    /var/www/html/application/logs

EXPOSE 80

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
CMD ["apache2-foreground"]
