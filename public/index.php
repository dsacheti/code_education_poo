<?php
define('CLASS_DIR','../src/');
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
spl_autoload_register();    
$dados = new ds\clientes\dao\fixture();
//$dados->getClientes();//cria o array de clientes no objeto

$dados->setClientes();
$dados->inserirPessoas();
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
	<style>
		.item{
			padding-top:6px;
			padding-bottom:6px;
			border:1px solid #bdb;
			border-radius:4px;
		}
	</style>
    </head>
    <body>

<?php
//$id = filter_input(INPUT_GET, 'id');
//if($id  !=NULL){
//    
//    //---------DETALHES DO CLIENTE-------------
//        require_once 'detalhes.php';
//    //---------FIM DOS DETALHES DO CLIENTE------------
//}else{//lista de clientes    
//    $ordem = filter_input(INPUT_GET,'ord');
//    if($ordem !=NULL){
//        if($ordem != $dados->getOrdem()){
//            $dados->ordenaInverso();
//        }
//    }
    ?>
    <div class="container">
            <header>
                <h1 class="text-center">Listagem de Clientes</h1>
            </header>
           
        </div>
        <div class="container principal">
            <div class="col-xs-6 col-xs-offset-3">
            <?php
//            $linha = 1;
//                for($i=0; $i<$dados->num; $i++){
//                    $cli = $dados->getCliente($i);
//                    echo '<div class="col-xs-12 col-sm-6 text-center">'.
//                        '<div class="col-sm-1"></div>
//                        <div class="col-sm-10 item">
//                            <a href=index.php?id='.$cli->getId().'>'.$cli->getId().': '.$cli->getNome().'</a>
//                        </div>
//                        <div class="col-sm-1"></div>'.
//                    '</div>';
//                    
//                    if($linha%2 == 0){
//                        echo '</div><div class="col-xs-6 col-xs-offset-3">';
//                    }
//                    $linha++;
//                }
//                
            ?>
                
            </div><!--row-->
        </div><!--container-->
		<div style="min-height:20px;"></div>
		<div class="col-xs-6 col-xs-offset-3 top">	
    <div class="col-xs-12 text-center"><a class="btn btn-success" href="index.php?ord=0">Ordem Crescente</a><a class="btn btn-success" href="index.php?ord=1">Ordem Decrescente</a></div>
  </div>
    <?php
//}//fim da apresentação da lista da clientes
?>
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</body>
</html>