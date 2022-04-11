<?php

/**
 * Adiciona as rotas exemplo index nome da rota e o valor e namespace com nome do controler @ nome da action(function)
 */
$arrRota = [
    'inicial' => 'App\Controller\IndexController@index',
    'login' => 'App\Controller\UsuarioController@login',
    'logout' => 'App\Controller\UsuarioController@logout',
    'postagem' => 'App\Controller\PostagemController@index',
];



class Rota
{

    //nome da tora padrao
    const ROTA_PADRAO = 'inicial';

    protected $arrRota;

    function __construct(array $arrRota)
    {
        $this->arrRota = $arrRota;
    }

    /**
     * Metodo que retorna o controler e action
     * @param string $rota
     * 
     * @return string | bool
     */
    private function _getRota(string $rota)
    {
        return key_exists($rota, $this->arrRota) ? $this->arrRota[$rota] : trigger_error("Rota não existe adiciona a rota no arquivo config/rota.php", E_USER_ERROR);
    }

    public function executar()
    {
        $requestUri = $_SERVER['REQUEST_URI'];

        $rotaNome = self::ROTA_PADRAO;

        if (strlen($requestUri) > 1) {
            $rotaNome = substr($requestUri, 1, strpos($requestUri, '?') ? strpos($requestUri, '?') - 1 : (strlen($requestUri) - 1));
        }

        $rota = $this->_getRota($rotaNome);

        $arrRota = explode('@', $rota);

        $objRs = new $arrRota[0];
        call_user_func(array($objRs, $arrRota[1]));
    }
}
