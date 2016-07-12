<?php
   namespace ds\clientes;

use ds\clientes\cliente as clien;   
    class dadosClientes{
       public $vetor_clientes;
       public $verif = "merda";
       public $num;
       private $ordem;
       
       function __construct() {
           $cli1 = new clien(1,"Romualdo", "987.432.342-56", "Rua A, 04 - Passo Fundo-RS", "543313-0198","pf",3);
            $cli2 = new clien(2,"Rodrigo","34.567.234/0001-98","Rua 34,98 - Tapejara-RS","543344-0101","pj",4);
            $cli2->setEnderecoCobranca("Rua dos Marmelos", "1000", "Sananduva", "74600-000");
            $cli3 = new clien(3,"Daiane", "003.645.234.-55", "Rua das Abelhas,568 - Rio de Janeiro-RJ","192233-6655","pf",2);
            $cli4 = new clien(4,"Josenildo", "876.444.445-99", "Rua Sem fim,456 - Tabatinga-ES", "448899-2739","pf",1);
            $cli5 = new clien(5,"Marcelo","55.285.534/0001-87","Rua Amancio Cardoso,9476 - Tapejara-RS","543344-9988","pj",5);
            $cli6 = new clien(6,"Gabriel","47.638.762/0001-33","Rua Moron,346 - Passo Fundo-RS","543316-0029","pj",2);
            $cli6->setEnderecoCobranca("Avenida Brasil", "3", "Porto Alegre", "78600-100");
            $cli7 = new clien(7,"Ivo", "564.333.000-34", "Rua dos Andradas,9384 - Porto Alegre-RS", "513596-8372","pf",5);
            $cli8 = new clien(8,"Igor", "774.434.098-31", "Av. Cristóvão Colombo,1000 - Florianópolis-SC", "496655-9944","pj",3);
            $cli9 = new clien(9,"Itamar", "059.424.754-98", "Rua dos Papagaios,666 - Viomar-PR", "339898-4424","pf",3);
            $cli9->setEnderecoCobranca("Rua Assis Brasil", "7777", "Curitiba", "74612-006");
            $cli10 = new clien(10,"Marco Antonio", "937.395.264-88", "Rua Eliseu Rech - Sananduva-RS", "543328-1595","pf",2);
           
           $this->vetor_clientes = array($cli1,$cli2,$cli3,$cli4,$cli5,$cli6,$cli7,$cli8,$cli9,$cli10);
           $this->num = count($this->vetor_clientes);
           $this->ordem = 0;
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
