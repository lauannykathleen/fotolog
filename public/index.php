<?php

require_once '../config/config.php';
require_once '../config/rota.php';
require_once '../vendor/autoload.php';

if (!strpos($_SERVER['REQUEST_URI'], 'public')) {

    //iniciar a rota
    $objRota = new Rota($arrRota);

    //pega rota na url e executa action
    $objRota->executar();
}

