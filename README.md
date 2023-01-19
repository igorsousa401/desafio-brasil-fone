# Requisitos para executar o projeto:

- PostgreSQL.
- PHP 8.

# Como instalar o projeto?
1. Clone o repositório com o comando "git clone" ou então baixe o zip.
2. Execute dentro da pasta do projeto o comando "cp .env.example .env".
3. Execute o comando "php artisan key:generate".
4. Modifique os dados do Banco de dados no arquivo .env: "DB_CONNECTION=pgsql", "DB_HOST=127.0.0.1", "DB_PORT=5432", "DB_DATABASE=(Nome do banco de dados)", "DB_USERNAME=(Usuário do banco de dados)", "DB_PASSWORD=(Senha do banco de dados)";
5. Certifique-se de criar o Banco de dados com o Nome informado no "DB_DATABASE";
6. Execute "npm install";
7. Se você não tiver usando o apache use o comando "php artisan serve" para usar a aplicação e logo apos "npm run dev";


##Prontinho, Só testar o projeto agora. : )
