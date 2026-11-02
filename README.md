# Gerenciador Logístico

Sistema web simples para gerenciar fretes, feito em PHP para a disciplina Fundamentos de Programação para Internet (UNIPAR EAD).

## Funcionalidades

- Cadastro e edição de produtos, endereços e transportadores
- Endereço preenchido pelo CEP, usando a API [ViaCEP](https://viacep.com.br/)
- Cadastro de vários produtos de uma vez (o botão "+ Adicionar produto" cria mais campos com JavaScript)
- Geração de frete: um transportador, uma origem, um destino e vários produtos (o botão "+ Adicionar produto" cria os campos com JavaScript)
- Download do relatório (CSV) dos fretes de um dia

## Tecnologias

PHP 8.2, MariaDB (XAMPP), Bootstrap 5 e JavaScript.

## Banco de dados

O XAMPP vem com o MariaDB, que é compatível com o MySQL. Por isso a conexão em `config/database.php` usa o driver `mysql` do PDO: o PHP não tem um driver próprio para o MariaDB, e o MariaDB funciona com o driver do MySQL. O mesmo código funciona nos dois bancos.

## Como executar (passo a passo)

### 1. Instale os programas

- [Git](https://git-scm.com/downloads)
- [XAMPP](https://www.apachefriends.org/) com PHP 8.2 ou mais novo (já vem com Apache, MariaDB e phpMyAdmin)

### 2. Clone o projeto dentro do `htdocs`

Abra o terminal e entre na pasta `htdocs` do XAMPP:

```bash
# Windows
cd C:\xampp\htdocs

# Linux
cd /opt/lampp/htdocs
```

Clone o repositório. O nome da pasta precisa ser `logistics-manager`:

```bash
git clone https://github.com/brucePedroGomes/logistics-manager.git
```

### 3. Inicie o XAMPP

1. Abra o XAMPP Control Panel (no Linux: `sudo /opt/lampp/manager-linux-x64.run`).
2. Clique em **Start** no **Apache**.
3. Clique em **Start** no **MySQL**.

### 4. Crie o banco de dados

1. Abra `http://localhost/phpmyadmin/`.
2. Clique na aba **Importar**.
3. Escolha o arquivo `htdocs/logistics-manager/database/schema.sql`.
4. Clique em **Importar** no fim da página.

O script cria o banco `logistics_manager` e todas as tabelas.

> Se o banco `logistics_manager` já existir, o import dá erro. Apague o banco antigo no phpMyAdmin e importe de novo.

### 5. Confira a conexão

O arquivo `config/database.php` usa o padrão do XAMPP:

- host: `localhost`
- usuário: `root`
- senha: vazia

Se o seu MySQL tem outra senha, altere esse arquivo.

### 6. Abra o sistema

Acesse `http://localhost/logistics-manager/public/` no navegador.

### Ordem sugerida para testar

1. Cadastre os produtos.
2. Cadastre os endereços (digite o CEP para preencher sozinho).
3. Cadastre os transportadores.
4. Gere um frete.
5. Baixe o relatório do dia.

## Estrutura

- `public/`: lógica das páginas (PHP)
- `templates/`: HTML das telas
- `config/`: conexão com o banco de dados
- `database/`: script de criação das tabelas
