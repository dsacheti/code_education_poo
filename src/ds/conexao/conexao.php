<?php
namespace ds\conexao;

use PDO;

class conexao {
    private $host = "localhost";
    private $banco = "bd_cli";
    private $dono = "root";
    private $chave = "";         
    private $conex;
    
    public function __construct(){
        try{
           $this->conex = new PDO("mysql:host={$this->host};dbname={$this->banco}","{$this->dono}","{$this->chave}",  [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]); 
        } catch (PDOException $ex) {
            die("Erro na conexao: ".$ex->getMessage()."\n".$ex->getTraceAsString());
        }
    }
        
    public function getConection(){
        return $this->conex;
    }           
}
?>