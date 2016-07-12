<?php
namespace ds\clientes;
class cliente implements importancia,  endereco_cobranca_cliente{
    private $nome;
    private $doc;
    private $endereco;
    private $telefone;
    private $id;
    private $tipo;
    private $importancia;
    private $cob_rua;
    private $cob_numero;
    private $cob_cidade;
    private $cob_cep;
    /**
     * 
     * @param type $id
     * @param type $nome
     * @param type <b>$doc</b> - cpf para pessoa física e cnpj para pessoa jurídica - pode ser feita validação posterior
     * @param type $endereco
     * @param type $telefone
     * @param type $tipo - "pf"(pessoa fisica) ou "pj"(pessoa jurídica)
     * @param type $importancia - nivel de importancia de 1 a 5
     */
    public function __construct($id,$nome, $doc, $endereco,$telefone,$tipo,$importancia) {
        $this->nome = $nome;
        $this->doc = $doc;
        $this->endereco = $endereco;
        $this->telefone = $telefone;
        $this->id = $id;
        $this->tipo = $tipo;
        $this->importancia = $importancia;
    }  	
    function getNome() {
        return $this->nome;
    }

    function getDoc() {
        return $this->doc;
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
    
    function getTipo(){
        return $this->tipo;
    }

    public function getImportancia() {
        return $this->importancia;
    }
    
    public function setImportancia($nivel) {
        $this->importancia = $nivel;
    }

    public function getEnderecoCobranca() {
        $endCobranca = array();
        $endCobranca[0] = $this->cob_rua;
        $endCobranca[1] = $this->cob_numero;
        $endCobranca[2] = $this->cob_cidade;
        $endCobranca[3] =$this->cob_cep;
        return $endCobranca;
    }

    public function setEnderecoCobranca($rua, $numero, $cidade, $cep) {
        $this->cob_rua = $rua;
        $this->cob_numero = $numero;
        $this->cob_cidade = $cidade;
        $this->cob_cep = $cep;
    }

}
?>