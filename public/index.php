<?php
define('CLASS_DIR','../src/');
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
spl_autoload_register(); 
use ds\clientes\tipos\Cliente as cli;
if(!empty(filter_input(INPUT_POST,'nome'))){    
    $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);//remover html etc
    $documento = filter_input(INPUT_POST, 'doc', FILTER_SANITIZE_STRING);
    $endereco = filter_input(INPUT_POST, 'endereco', FILTER_SANITIZE_STRING);
    $telefone = filter_input(INPUT_POST, 'telefone', FILTER_SANITIZE_STRING);
    $tipo = filter_input(INPUT_POST, 'tipo');
    $importancia = filter_input(INPUT_POST, 'importancia', FILTER_VALIDATE_INT);    
    $cliente = new cli(1,$nome,$documento,$endereco,$telefone,$tipo,$importancia);
    $dados = new ds\clientes\dao\fixture();
    $dados->persist($cliente);
    $dados->flush();
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
	<style>
		.item{
			padding-top:6px;
			padding-bottom:6px;
			border:1px solid #bdb;
			border-radius:4px;
		}
                .btn+ .tooltip > .tooltip-inner{
                    background-color: #ff2203;
                }
                .btn + .tooltip.bottom > .tooltip-arrow {
                    border-bottom: 5px solid #ff2203;
                }
	</style>
    </head>
    <body>

<?php
$id = filter_input(INPUT_GET, 'id');
$dados = new ds\clientes\dao\clientesDAO();
$dados->query();
if($id  ==NULL){     
    $ordem = filter_input(INPUT_GET,'ord');
    if($ordem !=NULL){
        if($ordem != $dados->getOrdem()){
            $dados->ordenaInverso();
        }
    }
    ?>
    <div class="container">          
        </div>
        <div class="container principal">
            <div class="row">
                <div class="col-xs-12 col-sm-3"></div>
                <div class="col-xs-12 col-sm-6">
                    <h3 class="text-center">Cadastro de Clientes</h3>
                    <form class="form-inline" action="#" role="form" method="post">
                    <div class="form-group">
                        <label class="control-label" for="nome">Nome:</label>
                        <input type="text" class="form-control" name="nome">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="doc">Documento:</label>
                        <input type="text" class="form-control" name="doc">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="endereco">Endereço:</label>
                        <input type="text" class="form-control" name="endereco">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="telefone">Telefone:</label>
                        <input type="text" class="form-control" name="telefone">
                    </div>
                    <div class="form-group">
                        <strong>Tipo de cliente</strong>&nbsp;
                        <label class="radio-inline">
                            <input type="radio" name="tipo" value="pf">Pessoa Física
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="tipo" value="pj">Pessoa Jurídica
                        </label>&nbsp;&nbsp;&nbsp;
                    </div>
                        <div class="form-group">
                            <label class="control-label" for="importancia">Importância</label>
                            <select class="form-control" name="importancia">
                            	<option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                                <option value="5">5</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary">Salvar</button>
                        <button class="btn btn-default" type="reset">Limpar</button>
                </form>
                </div>
                <div class="col-xs-12">
                    <h3 class="text-center">Lista de Clientes</h3>
                </div>
                <div class="col-xs-12 col-sm-3"></div>
            </div><!--fim do formulario-->
            
            <div class="col-xs-6 col-xs-offset-3">
            <?php
            
            
           $linha = 1;
                for($i=0; $i<$dados->num; $i++){
                    $cli = $dados->getClienteByPos($i);
                    echo '<div class="col-xs-12 col-sm-6 text-center">'.
                        '<div class="col-sm-1"></div>
                        <div class="col-sm-10 item">
                            <a href=index.php?id='.$cli->getId().'>'.$cli->getId().': '.$cli->getNome().'</a>                            
                        </div>
                        <div class="col-sm-1"></div>'.
                    '</div>';
                    
                    if($linha%2 == 0){
                        echo '</div><div class="col-xs-6 col-xs-offset-3">';
                    }
                    $linha++;
                }
//                
            ?>
                
            </div><!--row-->
        </div><!--container-->
		<div style="min-height:20px;"></div>
		<div class="col-xs-6 col-xs-offset-3 top">	
    <div class="col-xs-12 text-center"><a class="btn btn-success" href="index.php?ord=0">Ordem Crescente</a><a class="btn btn-success" href="index.php?ord=1">Ordem Decrescente</a></div>
  </div>
    <?php
    
}else{
//---------DETALHES DO CLIENTE-------------
        require_once 'detalhes.php';
    //---------FIM DOS DETALHES DO CLIENTE------------
} 
?>
 
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    <script>
	$(document).ready(function() {
            $('[data-toggle="tooltip"]').tooltip();
        });
	</script>
</body>
</html>