<?php
namespace ds\clientes\utils;
interface endereco_cobranca_cliente {
    function setEnderecoCobranca($rua,$numero,$cidade,$cep);
    function getEnderecoCobranca();
}
?>