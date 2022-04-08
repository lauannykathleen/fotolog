<?php 

namespace App\Model;

use PDO;

class Table {

    #objeto de conexao com banco
    private $con;

    public function __construct() {

        if(!is_object($this->getConexao())) {
            
            $this->setConexao( 
                new PDO("pgsql:host=" . HOST . ";port=;dbname= " . BANCO . " ;user= ". USER ." ;password= " . PASSWORD) 
            );
        }
    }

    public function getConexao() {
        return $this->con;
    }

    public function setConexao($con) {
        return $this->con;
    }

}


?>