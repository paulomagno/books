# CRUD Utilizando CodeIgniter 3 e docker

Esta é uma aplicação para fins de aprendizado, no qual foi desenvolvido um pequeno CRUD para gerenciar livros.
Também foi disponibilizada integração com uma API de clima de determinada região, podendo ser parametrizada no sistema.

## Pré-Requisitos

- Docker
- Docker-compose
- Composer

## Tecnologias utilizadas no container

- Linguagem de Programação PHP
- Apache
- Banco de dados Maria DB

## Como Instalar a aplicação

Clone este repositório para um diretório em sua máquina, após isso navegue até a pasta raiz do diretório e execute o seguinte comando:

```bash
docker-compose up -d
```
Após a instalação, execute as migrations via navegador:

```bash
http://localhost:7700/index.php/migrations
```

## Container 

- **CodeIgniter** está sendo executado em  `http://localhost:7700`
- **MySQL** está disponível no endereço localhost, porta `3310`


## Dados de Acesso do banco de dados 

- **Usuário** MYSQL_USER
- **Senha** MYSQL_PASSWORD
- **Banco de Dados** MY_DATABASE

## Dados de Login e Senha 

- **Usuário** admin
- **Senha** admin

Vídeo a seguir demonstrando a aplicação rodando em ambiente local:

```bash
https://vimeo.com/891698425/25c31676a2?share=copy
```

