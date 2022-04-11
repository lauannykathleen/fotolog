<?php

namespace App\Controller;

use App\Model\Usuario;

class IndexController
{

    public function index()
    {
        //iniciando model usuario como exemplo
        $objUsuario = new Usuario();

        $arrListagem = $objUsuario->listagem();

        require '/var/www/app/View/usuario/index.php';
    }

    public function salvar()
    {
    }
}
