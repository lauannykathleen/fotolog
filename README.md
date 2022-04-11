# fotolog
projeto inicial para estudo :)



## Projeto run

Primeira vez, fazer um build

```
docker-compose up --build
```

Outras vezes

```
docker-compose up
```

Serviço disponivel no portal http://localhost:8000

Banco de dados postgresql http://localhost:9000

```
fotolog
root
root
```

Adiciona as rotas no arquivo rota dentro da pasta config exemplo index nome da rota e o valor e namespace com nome do controler @ nome da action(function)
```
$arrRota = [
    'inicial' => 'App\Controller\IndexController@index',
    'login' => 'App\Controller\UsuarioController@login',
    'logout' => 'App\Controller\UsuarioController@logout',
    'postagem' => 'App\Controller\PostagemController@index',
];


```