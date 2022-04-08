<?php

require '../config/config.php';
include '../app/controller/IndexController.php';

use App\Controller\IndexController;


$objController = new IndexController($_GET['a']);
$objController->iniciar();

?>