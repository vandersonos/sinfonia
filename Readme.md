## Baixe o repositório
> git pull https://github.com/vandersonos/sinfonia.git

## Troca a senha do banco e o nome do usuario
> mv sinfonia/.env sinfonia/.env.example

## Levanta os containeres
> cd sinfonia && composer install
> ./vendor/bin/sail up

## Em outra aba do terminal após levantar os containers 
> docker exec -it sinfonia-laravel.test-1 bash

