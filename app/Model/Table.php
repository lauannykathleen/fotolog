<?php

namespace App\Model;

use Database\Connection;
use Database\Driver\Pgsql;

class Table
{

    #objeto de conexao com banco
    private $conn;

    public function __construct()
    {
        $conn = new Connection(HOST, BANCO, PORTA, USER, PASSWORD);
        $this->setConexao($conn->connect(new Pgsql()));
    }

    public function getConexao()
    {
        return $this->conn;
    }

    public function setConexao($conn)
    {
        return $this->conn = $conn;
    }
}
