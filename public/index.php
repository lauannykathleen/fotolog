<?php

require_once '../config/config.php';
require_once '../vendor/autoload.php';

use App\Controller\IndexController;


$objController = new IndexController($_GET['a']);
$objController->iniciar();

?>