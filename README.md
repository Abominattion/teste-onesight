## Sobre o projeto

Este projeto visa demonstrar uma aplicação Symfony utilizando Docker para ambiente de desenvolvimento. O projeto inclui configurações para ambiente, dependências, banco de dados e outros componentes.

### Instruções de Uso

1. **Criar o container**:
    Execute o seguinte comando para iniciar o ambiente Docker:
    ```shell
    docker-compose up -d  
    ```
    Isso criará e iniciará os contêineres necessários para a aplicação.

2. **Instalar as dependências**:
    Execute o comando a seguir para instalar as dependências do projeto:
    ```shell
    composer install
    ```
    Isso garantirá que todas as bibliotecas e pacotes necessários sejam instalados.

3. **Configurar o banco de dados**:
    Crie o banco de dados, execute as migrações e popule o banco com dados de exemplo. Use o seguinte comando:
    ```shell
    php bin/console doctrine:database:create 
    bin/console doctrine:migrations:migrate 
    php bin/console doctrine:fixtures:load  
    ```
    Isso criará o banco de dados, aplicará as migrações e preencherá o banco com dados iniciais.
