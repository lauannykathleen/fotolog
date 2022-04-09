<?php

namespace Database\Driver;

use Database\Db;
use Exception;
use PDO;

class Pgsql extends Db
{

    protected $conn;

    public function connect($servidor, $banco,$porta, $usuario, $senha)
    {
        try {

            if (!is_object($this->conn)) {
                $this->conn = new PDO("pgsql:host=" . $servidor . ";port=" . $porta. ";dbname= " . $banco . " ;user= " . $usuario . " ;password= " . $senha);
            }

            return $this->conn;
            
        } catch (Exception $e) {
            echo 'Exceção capturada: ',  $e->getMessage(), "\n";

            var_dump( "pgsql:host=" . $servidor . ";port=5432;dbname= " . $banco . " ;user= " . $usuario . " ;password= " . $senha); exit;
            
        }
    }

    public function getConnect()
    {
        return $this->conn;
    }
}
