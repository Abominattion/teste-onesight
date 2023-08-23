## Sobre o projeto

Rode os seguintes comandos


Criar o container
```shell
docker-compose up -d  
```

Instalar as depedências
```shell
composer install
```

Criar o banco de dados
```shell
php bin/console doctrine:database:create
```

Rodas as migrations
```shell
bin/console doctrine:migrations:migrate  
php bin/console doctrine:fixtures:load  
```

Popular o banco com as fixtures
```shell
php bin/console doctrine:fixtures:load  
```