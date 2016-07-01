<?php
    require_once ('cliente.php');
    
    class dadosClientes{
       public $vetor_clientes;
       public $verif = "merda";
       public $num;
       private $ordem;
       
       function __construct() {
           $cli1 = new cliente(1,"Romualdo", "987.432.342-56", "Rua A, 04 - Passo Fundo-RS", "543313-0198");
            $cli2 = new cliente(2,"Rodrigo","234.567.234-98","Rua 34,98 - Tapejara-RS","543344-0101");
            $cli3 = new cliente(3,"Daiane", "003.645.234.-55", "Rua das Abelhas,568 - Rio de Janeiro-RJ","192233-6655" );
            $cli4 = new cliente(4,"Josenildo", "876.444.445-99", "Rua Sem fim,456 - Tabatinga-ES", "448899-2739");
            $cli5 = new cliente(5,"Marcelo","555.285.534-87","Rua Amancio Cardoso,9476 - Tapejara-RS","543344-9988");
            $cli6 = new cliente(6,"Gabriel","847.638.762-33","Rua Moron,346 - Passo Fundo-RS","543316-0029");
            $cli7 = new cliente(7,"Ivo", "564.333.000-34", "Rua dos Andradas,9384 - Porto Alegre-RS", "513596-8372");
            $cli8 = new cliente(8,"Igor", "774.434.098-31", "Av. Cristóvão Colombo,1000 - Florianópolis-SC", "496655-9944");
            $cli9 = new cliente(9,"Itamar", "059.424.754-98", "Rua dos Papagaios,666 - Viomar-PR", "339898-4424");
            $cli10 = new cliente(10,"Marco Antonio", "937.395.264-88", "Rua Eliseu Rech - Sananduva-RS", "543328-1595");
           
           $this->vetor_clientes = array($cli1,$cli2,$cli3,$cli4,$cli5,$cli6,$cli7,$cli8,$cli9,$cli10);
           $this->num = count($this->vetor_clientes);
           $this->ordem = 0;
       }       

       
       public function mostraClientes(){
            foreach($this->vetor_clientes as $obj){
                echo "Nome: {$obj->getNome()}<br/>
                  Telefone: {$obj->getCpf()}<br/>
                  Email: {$obj->getEndereco()}<br/>
                  -----------------<br/>";
            }
        }
        
        public function pegaCliente($i){
            $obj = $this->vetor_clientes[$i];
            return $obj;
        }
        
        public function ordenaInverso(){
            $arr = array_reverse($this->vetor_clientes);
            $this->vetor_clientes = $arr;
            if($this->ordem == 0){
                $this->ordem = 1;
            }else{
                $this->ordem = 0;
            }
        }
        function getOrdem(){
            return $this->ordem;
        }
    }

?>
