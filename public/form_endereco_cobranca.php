<?php
define('CLASS_DIR','../src/');
set_include_path(get_include_path().PATH_SEPARATOR.CLASS_DIR);
spl_autoload_register(); 
if(!empty(filter_input(INPUT_POST,'log'))){
    $codigo_pessoa = filter_input(INPUT_POST, 'id-f',FILTER_VALIDATE_INT);
    $logradouro = filter_input(INPUT_POST,'log',FILTER_SANITIZE_STRING);
    $numero = filter_input(INPUT_POST, 'num',FILTER_SANITIZE_STRING);
    $cidade = filter_input(INPUT_POST, 'cidade',FILTER_SANITIZE_STRING);
    $cep = filter_input(INPUT_POST, 'cep',FILTER_SANITIZE_STRING);
    $nome = filter_input(INPUT_POST, 'nome');
    //echo $codigo_pessoa.' -- '.$logradouro.' -- '.$numero.' -- '.$cidade.' -- '.$cep;
    $dados = new ds\clientes\dao\fixtureEC();
    $dados->persist($codigo_pessoa, $logradouro, $numero, $cidade, $cep);
    $dados->flush();
}

else if(!empty(filter_input(INPUT_GET, 'id'))){
  $id  = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
  $nome = filter_input(INPUT_GET, 'nome', FILTER_SANITIZE_STRING);
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
        <header>
            <h2 class="text-center">Cadastro do Endereço de Cobrança para <?php echo $nome;?></h2>
        </header>
        <div class="container">
            <div class="row">
                <div class="col-xs-6 col-xs-offset-3">
                    <form method="post" action="#" class="form-inline" role="form">
                        <div class="form-group">
                            <label class="control-label" for="log">Logradouro</label>
                            <input class="form-control" type="text" name="log">&nbsp;
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="num">Número</label>
                            <input class="form-control" type="text" name="num">&nbsp;
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="cidade">Cidade</label>
                            <input class="form-control" type="text" name="cidade">&nbsp;
                        </div>
                        <div class="form-group">
                            <label class="control-label" for="cep">CEP</label>
                            <input class="form-control" type="text" name="cep">&nbsp;
                        </div>
                        <input type="hidden" name="id-f" value="<?php echo $id ?>">
                        <input type="hidden" name="nome" value="<?php echo $nome ?>">
                        <div class="col-xs-12">
                            <button type="submit" class="btn btn-primary">Salvar</button>
                            <button type="reset" class="btn btn-default">Limpar</button>
                        </div>
                    </form>
                </div>
                <div class="col-xs-12 text-center"><a class="btn btn-info" href="index.php">Voltar para lista de clientes</a></div>
            </div>
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
    </body>
</html>
