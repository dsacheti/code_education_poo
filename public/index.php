<?php    
    
    define('CLASS_DIR','../src/');
	set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
	spl_autoload_register();    
    $dados = new ds\clientes\dadosClientes();
    
   if(isset($_GET['ord'])&& $_GET['ord'] !=null){
       $g_ord = $_GET['ord'];
       if($g_ord==1 && $g_ord != $dados->getOrdem()){
           $dados->ordenaInverso();
       }else if($g_ord ==0 && $g_ord !=$dados->getOrdem()){
           $dados->ordenaInverso();
       }
   }             
?>
<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Listagem de clientes</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
        
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>        
        <div class="container">
            <header>
                <h1 class="text-center">Listagem de Clientes</h1>
            </header>
            <div class="row top">
                <div class="col-xs-12 text-right"><a class="btn btn-success" href="index.php?ord=0">Ordem Crescente</a></div>
                <div class="col-xs-12 text-right"><a class="btn btn-success" href="index.php?ord=1">Ordem Decrescente</a></div>
                
            </div>
        </div>
        <div class="container principal">
            <div class="row">
            <?php
            $linha = 1;
                for($i=0; $i<$dados->num; $i++){
                    $cli = $dados->pegaCliente($i);
                    echo '<div class="col-xs-12 col-sm-6 text-center">'.
                        '<div class="col-sm-1"></div>
                        <div class="col-sm-10 item">
                            <a href=detalhes.php?id='.$cli->getId().'>'.$cli->getId().': '.$cli->getNome().'</a>
                        </div>
                        <div class="col-sm-1"></div>'.
                    '</div>';
                    
                    if($linha%2 == 0){
                        echo '</div><div class="row">';
                    }
                    $linha++;
                }
                
            ?>
                
            </div><!--row-->
        </div><!--container-->
        
        <div class="modal" id="modalP" tabindex="-5" role="dialog">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times</span></button>
                                <h4 class="modal-title">Detalhes</h4>
                            </div>
                            <div class="modal-body">
                                <p><strong>Nome:</strong></p>
                                <p><strong>CPF:</strong></p>
                                <p><strong>Endereço:</strong></p>
                                <p><strong>Telefone:</strong></p>
                            </div><!--modal-body-->
                        </div><!--modal-content-->
                    </div><!--modal-dialog-->                    
                </div><!--modal-->
        
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </body>
</html>

