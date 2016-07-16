<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ds\clientes\tipos;

use \ds\clientes\utils\endereco_cobranca_cliente;
use \ds\clientes\utils\importancia;
abstract class pessoa implements endereco_cobranca_cliente,importancia{
    const PESSOA_FISICA = 1;
    const PESSOA_JURIDICA = 2;
    protected $nome;
    protected  $endereco;
    protected  $telefone;
    protected  $id;
    protected  $importancia;
    protected  $cob_rua;
    protected  $cob_numero;
    protected  $cob_cidade;
    protected  $cob_cep;    
    
    public function getEndereco() {
        return $this->endereco;
    }

    public function getEnderecoCobranca() {
        $endCobranca = array();
        $endCobranca[0] = $this->cob_rua;
        $endCobranca[1] = $this->cob_numero;
        $endCobranca[2] = $this->cob_cidade;
        $endCobranca[3] =$this->cob_cep;
        return $endCobranca;
    }

    public function getId() {
        return $this->id;
    }

    public function getImportancia() {
        return $this->importancia;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getTelefone() {
        return $this->telefone;
    }      

    public function setEndereco($endereco) {
        $this->endereco = $endereco;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setImportancia($importancia) {
        $this->importancia = $importancia;
    }

    public function setNome($nome) {
        $this->nome = $nome;
    }

    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }

    public function setEnderecoCobranca($rua, $numero, $cidade, $cep) {
        $this->cob_rua = $rua;
        $this->cob_numero = $numero;
        $this->cob_cidade = $cidade;
        $this->cob_cep = $cep;
        
    }
}
