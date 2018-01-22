# TheShop
MVP de E-comerce composto pelos seguintes módulos:
  - Categorias de produtos
  - Produtos
  - Carrinho de compras
  - Cadastro de Clientes
  - Cadastro de Endereço
  - Pedidos   

## Pré-requisitos

- apache 2.4.x
- mysql community server 5.7.x
- php7.0.x
- php7.0-mbstring
- php7.0-zip
- p7.0-xml
- php7.0-curl
- php7.0-mysql
- composer
- git


## Instalação

git clone https://github.com/leandroqa/theshop

cd theshop

composer update

composer install

cp .env.example .env

**Setar as credenciais do banco de dados em .env**

php artisan key:generate

**Criar o banco de dados inicial rodando o comando:**

php artisan migrate

php artisan db:seed

## Executar o sistema

**Rodar o sistema:**

php artisan serve

**Acessar o endereço via browser:**

http://localhost:8000


## Banco de dados

Estrutura do banco de dados gerada com o comando **php artisan migrate**:

<p align="center">
<img src="https://github.com/leandroqa/theshop/blob/master/docs/EstruturaBancoDados.png" alt="Banco de dados">
</p>
