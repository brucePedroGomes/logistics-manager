# Gerenciador Logístico

Sistema web simples para gerenciar fretes, feito em PHP para a disciplina Fundamentos de Programação para Internet (UNIPAR EAD).

## Funcionalidades

- Cadastro e edição de produtos, endereços e transportadores
- Geração de frete: um transportador, uma origem, um destino e vários produtos (o botão "+ Adicionar produto" cria os campos com JavaScript)
- Download do relatório (CSV) dos fretes de um dia

## Tecnologias

PHP 8.2, MariaDB (XAMPP), Bootstrap 5 e JavaScript.

## Banco de dados

O XAMPP vem com o MariaDB, que é compatível com o MySQL. Por isso a conexão em `config/database.php` usa o driver `mysql` do PDO: o PHP não tem um driver próprio para o MariaDB, e o MariaDB funciona com o driver do MySQL. O mesmo código funciona nos dois bancos.

## Como executar

1. Inicie o Apache e o MySQL no XAMPP.
2. Importe o arquivo `database/schema.sql` no phpMyAdmin.
3. Copie esta pasta para `htdocs` e abra `http://localhost/logistics-manager/public/`.

## Estrutura

- `public/`: lógica das páginas (PHP)
- `templates/`: HTML das telas
- `config/`: conexão com o banco de dados
- `database/`: script de criação das tabelas
