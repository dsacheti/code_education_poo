<?php

/*
 * Esta classe é usada para lidar com o endereço de cobrança do cliente
 */
namespace ds\clientes\dao;
use PDO;
class fixtureEC {
    private $codigo_pessoa;
    private $logradouro;
    private $numero;
    private $cidade;
    private $cep;
    private $bd;
    public function __construct() {
        try{
           $this->bd = new PDO("mysql:host=localhost;dbname=bd_cli","root","",  [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]); 
        } catch (PDOException $ex) {
            die("Erro na conexao: ".$ex->getMessage()."\n".$ex->getTraceAsString());
        }
        $sql = "CREATE DATABASE IF NOT EXISTS bd_cli;
        use bd_cli;
        CREATE TABLE `bd_cli`.`endereco_cobranca` ( `id` INT NOT NULL AUTO_INCREMENT , `codigo_pessoa` INT(11) NOT NULL , `log` VARCHAR(100) NOT NULL , `num` VARCHAR(7) NOT NULL , `cidade` VARCHAR(70) NOT NULL , `cep` VARCHAR(10) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
        ";        
        $stmt = $this->bd->prepare($sql);
        $stmt->execute();
    }
    //inserir os valores nos atributos da classe
    public function persist($codigo_pessoa,$logradouro,$numero,$cidade,$cep){
        $this->codigo_pessoa = $codigo_pessoa;
        $this->logradouro = $logradouro;
        $this->numero = $numero;
        $this->cidade = $cidade;
        $this->cep = $cep;
    }
    //inserir dados no banco de dados
    public function flush(){
        $sql = "INSERT INTO endereco_cobranca (codigo_pessoa, log, num, cidade, cep) VALUES(:codigo_pessoa, :log, :num, :cidade, :cep)";
        $stmt = $this->bd->prepare($sql);
        $stmt->execute(array(':codigo_pessoa'=>$this->codigo_pessoa, ':log'=>$this->logradouro, ':num'=>$this->numero, ':cidade'=>$this->cidade, ':cep'=>$this->cep));
    }
}
