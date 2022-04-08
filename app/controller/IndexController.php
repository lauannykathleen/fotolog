<?php

namespace App\Controller;

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
        
        $nome = 'Jorge';
        require '/var/www/app/view/usuario/index.php';
    }

    private function salvar(){}
}