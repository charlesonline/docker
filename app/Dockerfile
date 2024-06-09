# Use a imagem oficial do PHP 7.4 com Apache
FROM php:7.4-apache

# Instale as dependências necessárias para o Composer e as extensões PHP
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    libzip-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libonig-dev \
    libxml2-dev \
    libssl-dev \
    pkg-config \
    libcurl4-openssl-dev \
    libedit-dev \
    libsqlite3-dev \
    libicu-dev \
    zlib1g-dev \
    libonig-dev \
    libtidy-dev \
    libxslt1-dev \
    libldb-dev \
    libldap2-dev \
    libpcre3-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libfreetype6-dev \
    libxslt1-dev \
    libtidy-dev \
    libxslt1.1 \
    libreadline-dev \
    libbz2-dev \
    libgmp-dev \
    libpspell-dev \
    librecode-dev \
    libtidy-dev \
    libxslt1-dev

# Instale o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Instale extensões PHP disponíveis
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) pdo_mysql mysqli mbstring exif pcntl bcmath gd zip opcache intl xsl ldap soap

# Defina o diretório de trabalho
WORKDIR /var/www/html

# Copie todo o conteúdo do diretório atual para o diretório de trabalho no contêiner
COPY . .

# Habilite o módulo de reescrita do Apache (opcional, se necessário)
RUN a2enmod rewrite

# Execute o composer install
RUN COMPOSER_ALLOW_SUPERUSER=1 composer install || true

# Comando padrão para iniciar o Apache
CMD ["apache2-foreground"]
