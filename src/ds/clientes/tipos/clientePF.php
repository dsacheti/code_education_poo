<?php
namespace ds\clientes\tipos;

use \ds\clientes\tipos\pessoa;

class clientePF extends pessoa {
    private $cpf;
    private $tipo = self::PESSOA_FISICA;
    
    public function __construct($id,$nome, $cpf, $endereco,$telefone,$importancia) {
        $this->id = $id;
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->endereco = $endereco;
        $this->telefone = $telefone;
        $this->id = $id;
        $this->importancia = $importancia;
    }
    
    public function getTipo(){
        return $this->tipo;
    }
    public function getCpf(){
        return $this->cpf;
    }
	
	public function setCpf($doc){
		$this->cpf = $doc;
	}
}
