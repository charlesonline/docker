# Use a imagem oficial do PHP 7.4 com Apache
FROM php:7.4-apache

# Instale as dependências necessárias para o Composer
RUN apt-get update && apt-get install -y \
    unzip \
    git

# Instale o Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Defina o diretório de trabalho
WORKDIR /var/www/html

# Copie todo o conteúdo do diretório atual para o diretório de trabalho no contêiner
COPY . .

# Habilite o módulo de reescrita do Apache (opcional, se necessário)
RUN a2enmod rewrite

# Execute o composer install e permita que ele seja executado como root
RUN COMPOSER_ALLOW_SUPERUSER=1 composer install

# Comando padrão para iniciar o Apache
CMD ["apache2-foreground"]
