<?php
namespace ds\clientes\dao;

use \ds\conexao\conexao;
use ds\clientes\tipos\clientePF as pf;
use ds\clientes\tipos\clientePJ as pj;
        
class fixture{
    private $bd;
    private $clientes;
    private $ordem;
    private $num;
    
    public function __construct() {
        $sql = "CREATE DATABASE IF NOT EXISTS bd_cli;
        use bd_cli;
        CREATE TABLE `bd_cli`.`pessoas` ( `id` INT NOT NULL , `nome` VARCHAR(70) NOT NULL , `endereco` VARCHAR(150) NOT NULL , `telefone` VARCHAR(20) NOT NULL , `importancia` TINYINT(1) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
        CREATE TABLE `bd_cli`.`pessoa_fisica` ( `id` INT NOT NULL AUTO_INCREMENT , `codigo_pessoa` INT(11) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
        CREATE TABLE `bd_cli`.`pessoa_juridica` ( `id` INT NOT NULL AUTO_INCREMENT , `codigo_pessoa` INT(11) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
        CREATE TABLE `bd_cli`.`endereco_cobranca` ( `id` INT(11) NOT NULL AUTO_INCREMENT , `codigo_pessoa` INT(11) NOT NULL , `log` VARCHAR(100) NOT NULL , `num` VARCHAR(7) NOT NULL , `cidade` VARCHAR(70) NOT NULL , `cep` VARCHAR(10) NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
        DELETE FROM `pessoas`;
        DELETE FROM `pessoa_juridica`;
        DELETE FROM `pessoa_fisica`;
        DELETE FROM `endereco_cobranca`;
        ";
        $con = new conexao();
        $this->bd = $con->getConection();
        $stmt = $this->bd->prepare($sql);
        $stmt->execute();
    }
    
    public function setClientes(){
        $cli1 = new pf(1,"Romualdo", "678.456.398-23","Rua A, 04 - Passo Fundo-RS", "543313-0198",3);        
        $cli2 = new pj(2,"Rodrigo","00.073.961/0001-15","Rua 34,98 - Tapejara-RS","543344-0101",4);
        $cli2->setEnderecoCobranca("Rua dos Marmelos", "1000", "Sananduva", "74600-000");
        $cli3 = new pf(3,"Daiane", "638.459.308-13", "Rua das Abelhas,568 - Rio de Janeiro-RJ","192233-6655",2);
        $cli4 = new pf(4,"Josenildo", "001.252.398-90", "Rua Sem fim,456 - Tabatinga-ES", "448899-2739",1);
        $cli5 = new pj(5,"Marcelo","11.073.463/0001-18","Rua Amancio Cardoso,9476 - Tapejara-RS","543344-9988",5);
        $cli6 = new pj(6,"Gabriel","04.578.261/0001-55","Rua Moron,346 - Passo Fundo-RS","543316-0029",2);
        $cli6->setEnderecoCobranca("Avenida Brasil", "3", "Porto Alegre", "78600-100");
        $cli7 = new pf(7,"Ivo", "100.456.666-23", "Rua dos Andradas,9384 - Porto Alegre-RS", "513596-8372",5);
        $cli8 = new pf(8,"Igor", "611.444.398-31", "Av. Cristóvão Colombo,1000 - Florianópolis-SC", "496655-9944",3);
        $cli9 = new pf(9,"Itamar", "111.882.398-68", "Rua dos Papagaios,666 - Viomar-PR", "339898-4424",3);
        $cli9->setEnderecoCobranca("Rua Assis Brasil", "7777", "Curitiba", "74612-006");
        $cli10 = new pf(10,"Marco Antonio", "875.626.559-44", "Rua Eliseu Rech - Sananduva-RS", "543328-1595",2);

        $this->clientes = array($cli1,$cli2,$cli3,$cli4,$cli5,$cli6,$cli7,$cli8,$cli9,$cli10);
        $this->num = count($this->clientes);
        $this->ordem = 0;
    }
    
    public function inserirPessoas(){
        $sqlPessoas = "INSERT INTO pessoas (id,nome,endereco,fone,importancia) VALUES(:id,:nome,:endereco,:fone,:importancia)";
        $stmtPessoas = $this->bd->prepare($sqlPessoas);  
        echo '<table>';
        foreach($this->clientes as $cliente){
            try{
              $stmtPessoas->execute(array(':id'=>$cliente->getId(),':nome'=>$cliente->getNome(),':endereco'=>$cliente->getEndereco(),':fone'=>$cliente->getTelefone(),':importancia'=>$cliente->getImportancia()));
               echo '<tr><td>'.$cliente->getNome().'</td><td>'.$cliente->getEndereco().'</td><td>'.$cliente->getTelefone().'</td><td>'.$cliente->getImportancia().'</td></tr>';
            }  catch (Exception $ex){
                echo "Erro ao inserir pessoa:".$ex->getMessage();
            }
           if($cliente instanceof pf){
               $this->inserirPF($cliente);
           }else if($cliente instanceof pj){
               $this->inserirPJ($cliente);
           }
           $arrayCobranca = $cliente->getEnderecoCobranca();
           if(!empty($arrayCobranca[0])){
                $this->inserirEnderecoCobranca($arrayCobranca, $cliente->getId());
            }
        }
        echo '</table>';
    }
    public function inserirPJ(pj $pj){
        $sqlPJ ="INSERT INTO pessoa_juridica(codigo_pessoa) VALUES(:codigo_pessoa)"; 
        $stmtPJ =$this->bd->prepare($sqlPJ);
        $stmtPJ->execute(array(':codigo_pessoa'=>$pj->getId()));
    }
    
    public function inserirPF(pf $pf){
        $sqlPF = "INSERT INTO pessoa_fisica (codigo_pessoa) VALUES(:codigo_pessoa)";
        $stmtPF = $this->bd->prepare($sqlPF);
        $stmtPF->execute(array(':codigo_pessoa'=>$pf->getId()));
    }
    
    public function inserirEnderecoCobranca(array $cobranca,$id){
        $sqlCobranca = "INSERTO INTO endereco_cobranca(codigo_pessoa,log,num,cidade,cep) VALUES(:codigo_pessoa,:log,:num,:cidade,:cep)";
        $stmtCobranca = $this->bd->prepare($sqlCobranca);
        $stmtCobranca->execute(array(':codigo_pessoa'=>$id,':log'=>$cobranca[0],':num'=>$cobranca[1],':cidade'=>$cobranca[2],':cep'=>$cobranca[3]));
    }
}

