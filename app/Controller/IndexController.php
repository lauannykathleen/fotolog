<?php

namespace App\Controller;

use App\Model\Usuario;

class IndexController {

    protected $acao;

    function __construct($acao) {
        $this->acao = $acao;
    }

    public function iniciar() {

        switch ($this->acao) {
            case 1:
                echo "i equals 0";
            break;
            default:
                $this->listar();
        }
    }

    private function listar() {
        
        //iniciando model usuario como exemplo
        $objUsuario = new Usuario();

        $arrListagem = $objUsuario->listagem();

        require '/var/www/app/View/usuario/index.php';
    }

    private function salvar(){}
}