<?php
namespace ds\clientes\dao;

use ds\clientes\tipos\Cliente;
use PDO;
class clientesDAO {
    private $clientes=array();
    public $num;
    private $ordem;
    private $bd;
    
    private $cob_logradouro;
    private $cob_numero;
    private $cob_cidade;
    private $cob_cep;
    
    public function __construct() {
        try{
           $this->bd = new PDO("mysql:host=localhost;dbname=bd_cli","dsacheti","99894904",  [PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES 'utf8'"]); 
        } catch (PDOException $ex) {
            die("Erro na conexao: ".$ex->getMessage()."\n".$ex->getTraceAsString());
        }
    }
    public function query(){
        $sql = "SELECT * FROM clientes";
        foreach($this->bd->query($sql) as $linha){
            $cli = new Cliente($linha['id'],$linha['nome'], $linha['doc'],$linha['endereco'],$linha['telefone'],$linha['tipo'],$linha['importancia']);
            //Pesquisa se o cliente tem um endereço de cobrança
            $this->queryEnderecoCobranca($linha['id']);
            //Se o cliente tiver um enderço de cobrança no banco de dados, adiciona ao seu objeto
            if(!empty($this->cob_logradouro)){
                $cli->setEnderecoCobranca($this->cob_logradouro, $this->cob_numero, $this->cob_cidade, $this->cob_cep);
            }
            //limpa os atributos do endereço de cobrança para que eles não sejam atribuídos aos próximos clientes
            $this->cob_logradouro='';
            $this->cob_numero = '';
            $this->cob_cidade = '';
            $this->cob_cep = '';
            //adiciona o cliente criado a partir dos dados do banco ao array de clientes
            array_push($this->clientes, $cli);
        } 
        //conta o número de clientes encontrados
        $this->num = count($this->clientes);
        //ordem  = 0 - ordem crescente por id
        $this->ordem = 0;
    }
    //funçao usada para buscar o endereço de cobrança de um cliente
    private function queryEnderecoCobranca($codigo_pessoa){
        $sql = "SELECT * FROM endereco_cobranca WHERE codigo_pessoa =".$codigo_pessoa;
        foreach($this->bd->query($sql) as $linha){
            $this->cob_logradouro=$linha['log'];
            $this->cob_numero = $linha['num'];
            $this->cob_cidade = $linha['cidade'];
            $this->cob_cep = $linha['cep'];
        }  
        
    }
    //selecionar um cliente no banco de dados pelo id
    public function queryRow($id){
        $sql = "SELECT * FROM clientes WHERE id =?;";
        $consulta = $this->bd->prepare($sql);
        $consulta->bindParam(1,$id, PDO::PARAM_INT);
        $consulta->execute();
        $linha = $consulta->fetch();
        if($linha !==false){
            $cli = new Cliente($linha['id'],$linha['nome'], $linha['doc'],$linha['endereco'],$linha['telefone'],$linha['tipo'],$linha['importancia']);
            return $cli;
        }
    }
    //buscar cliente no array do objeto pelo id
    public function getClienteById($id){
        for ($i =0; $i<$this->num;$i++){
            $umCli = $this->clientes[$i];
            if($umCli->getId() == $id){
               $obj = $this->clientes[$i];
            }
        }            
        return $obj;
    }
    //buscar cliente no array do objeto pela posição no array
    public function getClienteByPos($i){        
        $obj = $this->clientes[$i];                  
        return $obj;
    }
   
        //inverte a ordem do array dos clientes
        public function ordenaInverso(){
            $arr = array_reverse($this->clientes);
            $this->clientes = $arr;
            if($this->ordem == 0){
                $this->ordem = 1;
            }else{
                $this->ordem = 0;
            } 
        }
            //pega a ordem atual do array com base no id do banco de dados
        function getOrdem(){
            return $this->ordem;
        }
        //retorna o array dos clientes
        public function getClientes(){
            return $this->clientes;
        }
}
