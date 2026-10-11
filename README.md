# Gerenciador Logístico

Sistema web simples para gerenciar fretes, feito em PHP para a disciplina Fundamentos de Programação para Internet (UNIPAR EAD).

## Funcionalidades

- Cadastro e edição de produtos, endereços e transportadores
- Geração de frete: um transportador, uma origem, um destino e vários produtos (o botão "+ Adicionar produto" cria os campos com JavaScript)
- Download do relatório (CSV) dos fretes de um dia

## Tecnologias

PHP 8.2, MariaDB (XAMPP), Bootstrap 5 e JavaScript.

## Como executar

1. Inicie o Apache e o MySQL no XAMPP.
2. Importe o arquivo `database/schema.sql` no phpMyAdmin.
3. Copie esta pasta para `htdocs` e abra `http://localhost/logistics-manager/public/`.

## Estrutura

- `public/`: páginas do sistema
- `config/`: conexão com o banco de dados
- `templates/`: topo das páginas (Bootstrap e menu)
- `database/`: script de criação das tabelas
