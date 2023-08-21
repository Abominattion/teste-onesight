# Use a imagem oficial do PHP-FPM 8.1
FROM php:8.1-fpm

# Defina o diretório de trabalho dentro do contêiner
WORKDIR /app

# Atualize os pacotes do sistema
RUN apt-get update

# Instale as dependências necessárias
RUN apt-get -y install git zip libpq-dev

# Instale o Composer
RUN curl -sL https://getcomposer.org/installer | php -- --install-dir /usr/bin --filename composer

RUN pecl install xdebug

# Comando padrão para iniciar o PHP-FPM
CMD ["php-fpm"]
