<?php
    $id = $id-1;
    $atual = 0;
?>
<div class="container">            
            <div class="row">
                <div class="col-xs-12"><h1 class="text-center top">Detalhes do Cliente</h1></div>
                <div class="col-md-3 text-center">
                    <?php
                    
                    if($id>=1){
                        ?>                    
                            <a class="btn btn-danger" href="index.php?id=<?php echo $id;?>"><span class="glyphicon glyphicon-chevron-left"></span></a>
                    <?php }
                        else{
                            $atual =$id+1;
                           ?>
                            <a href="index.php?id=<?php echo $atual;?>" class="btn btn-default"><span class="glyphicon glyphicon-chevron-left"></span></a>
                            <?php
                        }
                    ?>
                </div>
                <div class="col-xs-12 col-md-6">
                    <?php
                    
                        $item = $dados->getCliente($id);
                    ?>
                    <table class="table table-responsive table-striped">
                        <tr><th>Nome</th><td><?php echo $item->getNome();?></td></tr>
                        <tr><th>
                             <?php if($item->getTipo() == 1){   
                                echo 'CPF';
                                $doc = $item->getCpf();
                             }else{
                                echo 'CNPJ';
                                $doc = $item->getCnpj();
                             }
                            ?>
                            </th><td><?php echo $doc;?></td></tr>
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
                    if(($id+2)<= $dados->num){
                ?>
                    <a class="btn btn-danger" href="index.php?id=<?php echo ($id+2);?>"><span class="glyphicon glyphicon-chevron-right"></span></a></div>
                    <?php }else{                            
                           ?>
                            <a href="index.php?id=<?php echo $dados->num;?>" class="btn btn-default"><span class="glyphicon glyphicon-chevron-right"></span></a>
                            <?php
                        }?>
            </div>
            <div class="col-xs-12 text-center"><a class="btn btn-info" href="index.php">Voltar para lista</a></div>
        </div>