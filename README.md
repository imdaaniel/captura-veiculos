<p align="center"><a href="https://www.questmultimarcas.com.br" target="_blank"><img src="https://static.autoconf.com.br/site-questmultimarcas/wp-content/uploads/2020/01/logo-quest.png" width="400"></a></p>

## Captura de veículos 🚘

Esse projeto consiste em um sistema onde é possível capturar dados de veículos do site Quest Multimarcas (sem API) baseado no termo pesquisado.

## Requisitos
- [PHP 7.4](https://www.php.net/)
- [Composer](https://getcomposer.org)
- [MySQL](https://www.mysql.com/) ou [XAMPP](https://www.apachefriends.org)

## Instalação
Primeiro, clone o projeto
```sh
git clone https://github.com/imdaaniel/captura-veiculos.git
```
Depois, instale as dependências necessárias
```sh
composer install
```

No arquivo .env, o banco padrão do projeto se chama "laravel". Caso queira utilizar esse, apenas execute o comando abaixo em seu gerenciador de banco de dados
```sql
CREATE DATABASE laravel;
```
ou, se preferir, substitua "laravel" para o nome desejado, mas não esqueça de alterar o arquivo .env

Agora, para que as tabelas sejam criadas, execute o comando
```sh
php artisan migrate
```

Para criar o usuário padrão (admin, admin), execute o comando
```sh
php artisan db:seed --class=UsuarioSeeder
```
ou, se preferir, crie manualmente um usuário no banco de dados.

E, por fim, para rodar o projeto, execute
```sh
php artisan serve
```

Após isso, é só ir no navegador e digitar `http://localhost:8000` :smile:

## Demonstração do sistema
<p align="center"><img src="https://user-images.githubusercontent.com/40575988/105001206-2b740d80-5a0e-11eb-8d27-474ef4761303.gif" width="500px"></p>

## Telas
_Login_
<p align="center"><img src="https://user-images.githubusercontent.com/40575988/105001225-329b1b80-5a0e-11eb-8fc9-e8f45f903809.png" width="500px"></p>

Nessa tela ocorre a autenticação. Caso insira dados inválidos, uma mensagem de erro aparecerá na tela indicando que as credenciais não conferem ;)

_Lista de artigos (veículos)_
<p align="center"><img src="https://user-images.githubusercontent.com/40575988/105001203-2a42e080-5a0e-11eb-863d-983e0790dc7e.png" width="500px"></p>

Aqui temos a listagem dos artigos cadastrados, podendo realizar uma busca.
No menu superior, temos as opções de navegação, podendo ir para a tela de captura ou deslogar.

_Tela de captura_
<p align="center"><img src="https://user-images.githubusercontent.com/40575988/105001205-2b740d80-5a0e-11eb-93e6-55966763e589.png" width="500px"></p>

É aqui que a mágica acontece. É só digitar o termo desejado (por exemplo "audi") e clicar no botão, que o sistema irá automaticamente importar do Quest Multimarcas os respectivos veículos, validando se já não foram inseridos.

> Feedbacks são sempre bem vindos
> by Daniel Tavares
