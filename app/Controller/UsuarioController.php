<?php

namespace App\Controller;

use App\Model\Usuario;

class UsuarioController
{

    public function login()
    {
        //iniciando model usuario como exemplo
        $objUsuario = new Usuario();

        if (count($_POST)) {

            var_dump($_POST);
            exit;
        }


        require '/var/www/app/View/usuario/login.php';
    }
}
