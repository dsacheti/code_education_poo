<?php
namespace ds\clientes\tipos;

use \ds\clientes\tipos\pessoa;

class clientePJ extends pessoa {
    private $cnpj;
    private $tipo = "pj";
    
    public function __construct($id,$nome, $cnpj, $endereco,$telefone,$importancia) {
        $this->id = $id;
        $this->nome = $nome;
        $this->cnpj = $cnpj;
        $this->endereco = $endereco;
        $this->telefone = $telefone;
        $this->id = $id;
        $this->importancia = $importancia;
    }
    
    public function getTipo(){
        return $this->tipo;
    }
    public function getCnpj(){
        return $this->cnpj;
    }
	
    public function setCnpj($doc){
        $this->cnpj = $doc;
    }
}