<?php
	define('CLASS_DIR','../src/');
	set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
	spl_autoload_register();
    //require_once '../src/ds/clientes/dadosClientes.php';
    $cliente = new ds\clientes\dadosClientes();
	
    if(isset($_GET['id'])){
        $id = $_GET['id']-1;//array comça em zero mas aqui é o id do cliente que começa em 1
        $atual = 0;
    }
?>
<!doctype html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <title>Listagem de clientes</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="css/estilo.css">
        <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <body style="padding-top: 60px;">        
        <div class="container">            
            <div class="row">
                <div class="col-xs-12"><h1 class="text-center top">Detalhes do Cliente</h1></div>
                <div class="col-md-3 text-center">
                    <?php
                    
                    if($id>=1){
                        ?>                    
                            <a class="btn btn-danger" href="detalhes.php?id=<?php echo $id;?>"><span class="glyphicon glyphicon-chevron-left"></span></a>
                    <?php }
                        else{
                            $atual =$id+1;
                           ?>
                            <a href="detalhes.php?id=<?php echo $atual;?>" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left"></span></a>
                            <?php
                        }
                    ?>
                </div>
                <div class="col-xs-12 col-md-6">
                    <?php
                    
                        $item = $cliente->pegaCliente($id);
                    ?>
                    <table class="table table-responsive table-striped">
                        <tr><th>Nome</th><td><?php echo $item->getNome();?></td></tr>
                        <tr><th>
                             <?php if($item->getTipo() == 'pf'){   
                                echo 'CPF';
                             }else{
                                    echo 'CNPJ';
                                }
                            ?>
                            </th><td><?php echo $item->getDoc();?></td></tr>
                        <tr><th>Endereço</th><td><?php echo $item->getEndereco();?></td></tr>
                        <tr><th>Telefone</th><td><?php echo $item->getTelefone();?></td></tr>
                        <tr><th>Importancia</th><td>
                            <?php
                                $importancia = $item->getImportancia();
                                for($j=0; $j<$importancia; $j++){
                                    echo '<span class="glyphicon glyphicon-star"></span>';
                                }
                                
                            ?>
                            </td></tr>
                            <?php
                                $endCobranca = $item->getEnderecoCobranca();
                                if($endCobranca[0] !=""){
                                    echo '<tr><th>Endereço Cobrança:</th><td>'.
                                    "{$endCobranca[0]}, {$endCobranca[1]}<br>Cidade: {$endCobranca[2]} - CEP: $endCobranca[3]".
                                            '</td></tr>';
                                }
                            ?>
                    </table>                    
                </div>
                <div class="col-md-3 text-center">
                <?php
                    if(($id+2)<= $cliente->num){
                ?>
                    <a class="btn btn-danger" href="detalhes.php?id=<?php echo ($id+2);?>"><span class="glyphicon glyphicon-chevron-right"></span></a></div>
                    <?php }else{                            
                           ?>
                            <a href="detalhes.php?id=<?php echo $cliente->num;?>" class="btn btn-default"><span class="glyphicon glyphicon-chevron-right"></span></a>
                            <?php
                        }?>
            </div>
            <div class="col-xs-12 text-center"><a class="btn btn-info" href="index.php">Voltar para lista</a></div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </body>
</html>
