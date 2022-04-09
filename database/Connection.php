<?php

namespace Database;

use Database\Db;

class Connection
{
    protected $servidor;
    protected $banco;
    protected $porta;
    protected $usuario;
    protected $senha;

    public function __construct($servidor, $banco, $porta, $usuario, $senha)
    {
        $this->servidor = $servidor;
        $this->banco = $banco;
        $this->porta = $porta;
        $this->usuario = $usuario;
        $this->senha = $senha;
    }

    public function connect(Db $db)
    {
        return $db->connect($this->servidor, $this->banco, $this->porta, $this->usuario, $this->senha);
    }
}
