<?php 

namespace Database;

abstract class Db {

    /**
     * Conexao com banco
     * @var [pdo]
     */
    protected $conn;
    
    /**
     * 
     * metodo para conectar com banco
     * 
     * @param string $servidor
     * @param string $banco
     * @param string $usuario
     * @param string $senha
     * 
     * @return [type]
     */
    abstract public function connect(string $servidor,string $banco,string $porta,string $usuario,string $senha);
}