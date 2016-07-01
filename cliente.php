<?php
class cliente {
    private $nome;
    private $cpf;
    private $endereco;
    private $telefone;
    private $id;
    
    public function __construct($id,$nome, $cpf, $endereco,$telefone) {
        $this->nome = $nome;
        $this->cpf = $cpf;
        $this->endereco = $endereco;
        $this->telefone = $telefone;
        $this->id = $id;
    }  	
    function getNome() {
        return $this->nome;
    }

    function getCpf() {
        return $this->cpf;
    }

    function getEndereco() {
        return $this->endereco;
    }

    function getTelefone() {
        return $this->telefone;
    }

    function getId(){
        return $this->id;
    }

}

?>