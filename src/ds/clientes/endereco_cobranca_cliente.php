<?php
namespace ds\clientes;
interface endereco_cobranca_cliente {
    function setEnderecoCobranca($rua,$numero,$cidade,$cep);
    function getEnderecoCobranca();
}
