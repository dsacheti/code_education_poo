<?php
namespace ds\clientes\dao;

use ds\clientes\tipos\Cliente;
use PDO;
        
class fixture{
    private $bd;
    private $cliente;
    
    public function __construct() {
        try{
           $this->bd = new PDO("mysql:host=localhost;dbname=bd_cli","root","",  [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]); 
        } catch (PDOException $ex) {
            die("Erro na conexao: ".$ex->getMessage()."\n".$ex->getTraceAsString());
        }
        $sql = "CREATE DATABASE IF NOT EXISTS bd_cli;
        use bd_cli;
        CREATE TABLE `bd_cli`.`clientes` ( `id` INT NOT NULL AUTO_INCREMENT , `nome` VARCHAR(70) NOT NULL , `doc` VARCHAR(20), `endereco` VARCHAR(150) NOT NULL , `telefone` VARCHAR(20) NOT NULL , `tipo` VARCHAR(2), `importancia` TINYINT(1) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
        CREATE TABLE `bd_cli`.`endereco_cobranca` ( `id` INT NOT NULL AUTO_INCREMENT , `codigo_pessoa` INT(11) NOT NULL , `log` VARCHAR(100) NOT NULL , `num` VARCHAR(7) NOT NULL , `cidade` VARCHAR(70) NOT NULL , `cep` VARCHAR(10) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
        ";        
        $stmt = $this->bd->prepare($sql);
        $stmt->execute();
    }  
    //insere um objeto do tipo cliente no atributo cliente dessa classe
    public function persist(Cliente $cliente){
        $this->cliente = $cliente;
    }
    //insere um cliente no banco de dados
    public function flush(){
        $sql = "INSERT INTO clientes(nome, doc, endereco, telefone, tipo, importancia) VALUES(:nome,:doc,:endereco,:telefone, :tipo, :importancia)";
        $stmt = $this->bd->prepare($sql);
        $stmt->execute(array(':nome'=>$this->cliente->getNome(),':doc'=>$this->cliente->getDoc(),':endereco'=>$this->cliente->getEndereco(),':telefone'=>$this->cliente->getTelefone(),':tipo'=>$this->cliente->getTipo(),':importancia'=>$this->cliente->getImportancia()));
        
    }
    
}

