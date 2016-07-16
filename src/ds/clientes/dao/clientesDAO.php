<?php

namespace ds\clientes\dao;

use \ds\clientes\tipos\clientePF as pf;
use \ds\clientes\tipos\clientePJ as pj;

class clientesDAO {
    public $clientes;
    public $num;
    private $ordem;
    
    public function getClientes(){
        $cli1 = new pf(1,"Romualdo", "987.432.342-56", "Rua A, 04 - Passo Fundo-RS", "543313-0198",3);
        $cli2 = new pj(2,"Rodrigo","34.567.234/0001-98","Rua 34,98 - Tapejara-RS","543344-0101",4);
        $cli2->setEnderecoCobranca("Rua dos Marmelos", "1000", "Sananduva", "74600-000");
        $cli3 = new pf(3,"Daiane", "003.645.234-55", "Rua das Abelhas,568 - Rio de Janeiro-RJ","192233-6655",2);
        $cli4 = new pf(4,"Josenildo", "876.444.445-99", "Rua Sem fim,456 - Tabatinga-ES", "448899-2739",1);
        $cli5 = new pj(5,"Marcelo","55.285.534/0001-87","Rua Amancio Cardoso,9476 - Tapejara-RS","543344-9988",5);
        $cli6 = new pj(6,"Gabriel","47.638.762/0001-33","Rua Moron,346 - Passo Fundo-RS","543316-0029",2);
        $cli6->setEnderecoCobranca("Avenida Brasil", "3", "Porto Alegre", "78600-100");
        $cli7 = new pf(7,"Ivo", "564.333.000-34", "Rua dos Andradas,9384 - Porto Alegre-RS", "513596-8372",5);
        $cli8 = new pf(8,"Igor", "774.434.098-31", "Av. Cristóvão Colombo,1000 - Florianópolis-SC", "496655-9944",3);
        $cli9 = new pf(9,"Itamar", "059.424.754-98", "Rua dos Papagaios,666 - Viomar-PR", "339898-4424",3);
        $cli9->setEnderecoCobranca("Rua Assis Brasil", "7777", "Curitiba", "74612-006");
        $cli10 = new pf(10,"Marco Antonio", "937.395.264-88", "Rua Eliseu Rech - Sananduva-RS", "543328-1595",2);

        $this->clientes = array($cli1,$cli2,$cli3,$cli4,$cli5,$cli6,$cli7,$cli8,$cli9,$cli10);
        $this->num = count($this->clientes);
        $this->ordem = 0;
    }
    
    public function getCliente($i){
            $obj = $this->clientes[$i];
            return $obj;
        }
        
        public function ordenaInverso(){
            $arr = array_reverse($this->clientes);
            $this->clientes = $arr;
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
