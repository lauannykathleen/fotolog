<?php 

namespace App\Model;


class Table {

    //objeto de conexao com banco
    protected $conn;

    public function __construct() {

        if(!is_object($this->conn)) {
            
            $this->conn = new PDO("pgsql:host=" . HOST . ";port=;dbname= " . BANCO . " ;user= ". USER ." ;password= " . PASSWORD);
        }
    }

}


?>