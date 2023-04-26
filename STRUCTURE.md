# Entendendo decisões arquiteturais e a estrutura do projeto

### Como rodar na minha máquina?

- Clone o projeto `git clone https://github.com/oliveira-cmd/project_recupera_compra.git`
- Crie o arquivo .env na raiz do projeto
- Copie todos os dados do arquivo .env.exemple e cole no arquivo .env criado anteriormente
- Atente-se em alterar o valor da variavel DB_PASSWORD presente no arquivo .env para a senha do banco de dados da sua maquina
- Crie um banco de dados com o mesmo nome da variavel DB_DATABASE do arquivo .env
- Rode `composer install`
- Rode `php artisan migrate`
- Rode `php artisan db:seed`
- Rode `php artisan serve`
- Pronto 🎉

### Estrutura do projeto

- `./routes/web`: É o arquivo onde todas as rotas web são validadas.
- `./app/Http/Controller/*`: É a rota onde ficam armazenadas todas as controllers do projeto..
- `./app/Http/Models/*`: É a rota onde ficam armazenadas todas as models do projeto.
- `./database/migrations/*`: É a rota onde ficam os arquivos que criam as tabelas no banco de dados setados no arquivo .env quando o comando `php artisan migrate` é executado na raiz do projeto.
- `./database/seeders/*`: É a rota onde é criado os seeders, função do laravel que faz a inserção de dados automaticamente nas tabelas determinadas quando o comando `php artisan db:seed` é executado na raiz do projeto.

### Como me localizar no projeto?
- Para localizar qual controller é executada em qual página, verifique a rota da pagina que esta e vá no arquivo `./routes/web`, todos os comandos  deste arquivo seguem o seguinte padrão:
    ```php
        Route::get('/listProfiles', [ProfileController::class, 'index']);
    ```

    `::get`: Declara que a função vai ser executada quando for utilizado o método get.
    `'/listProfiles'`: A rota presente no navegador que deve ser usada para localizar a controller.
    `ProfileController`: O nome da classe da Controller a ser executada.
    `index`: A função presente na classe ProfileController a ser executada.
