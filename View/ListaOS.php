<?php
session_start();
if(!$_SESSION['login']){
    header('Location: index.php');
    exit();
}
include_once '../Controller/FuncoesControllerOS.php';
include_once '../Controller/FuncoesControllerServico.php';
include_once '../Controller/fdatas.php';
$fco = new FuncoesControllerOS();
$fcs = new FuncoesControllerServico();
$linhas = $fco->pesquisaOS();
$linhasServicos = $fcs->pesquisaServicoAtivo();
$fdatas = new fdatas();
//$linhasServicos = $fcs->pesquisaServico();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lista OS</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../css/estilo.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/redmond/jquery-ui-1.10.1.custom.css" />
        <link href="../css/bootstrap-grid.css" rel="stylesheet">
    </head>
    <body>
         <?php
        include "navmenu.php";
        ?>
        
        <br><br><br><br>
            <div class="container">
                <div class="row">               
                    <div class="container">
                        <div class="row">
                            <div class="col-sm-12">
                                <?php
                                //codigo para efetivar a exclusão dos dados do cliente
                                if (isset($_POST['confirmarExclusao'])) {
                                    //excluindo no BD
                                    $msg = $fco->excluiOS($_POST['codOS'], $_POST['descEstorno'] , $_POST['vlrTotalServico'], $_POST['formaPagamento'] , $_POST['fk_Cliente']);
                                    echo $msg;

                                    echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"1;
                                        URL='ListaOS.php'\">";
                                }
                                ?>
                                <div class="panel panel-info">
                                    <div class="panel-heading" >
                                        <h3 class="text-primary">Lista de OS</h3>
                                    </div>
                                        <div class="panel-body">
                                            <table class="table table-striped table-condensed table-hover">                
                                                <thead>
                                                    <tr>	
                                                        <th>Código</th>
                                                        <th>Data</th>
                                                        <th>Hora</th>
                                                        <th>Hora Entrega</th>
                                                        <th>Data Entrega</th>
                                                        <th>Valor Total</th>
                                                        <th>Forma Pagamento</th>
                                                        <th>Serviço</th>
                                                        <th>Estorno</th>
                                                        <th>Motivo Estorno</th>
                                                        
                                                        <?php
                                                 if (isset($_SESSION['perfil'])) {
                                               if ($_SESSION['perfil'] === '2') {
                                                     ?>
                                                         <th>Excluir</th>
                                             <?php
                                                   }
                                                 }
                                                ?>
                                                        <!--<th>Código do Estorno</th>
                                                        <th>Descrição do Estorno</th> -->
                                                    </tr>
                                                </thead>                          
                                                <tbody>
                                                    <?php
                                                    if ($linhas) {
                                                        $a = 0;
                                                        foreach ($linhas as $linha) {
                                                            $a++;
                                                            ?>
                                                            <tr>
                                                                <td><?php echo $linha['codOS']; ?></td>
                                                                <td><?php echo $fdatas->vemdata($linha['dataOS']); ?></td>
                                                                <td><?php echo $linha['horaOS']; ?></td>
                                                                <td><?php echo $linha['horaEntrega']; ?></td>
                                                                <td><?php echo $fdatas->vemdata($linha['dtEntrega']) ; ?></td>
                                                                <td><?php echo $linha['vlrTotalServico']; ?></td>
                                                                <td><?php if($linha['formaPagamento']==='0') 
                                                                            echo "Cartão de Crédito";
                                                                          elseif($linha['formaPagamento']==='1') 
                                                                            echo "Dinheiro";
                                                                          else 
                                                                            echo "Cartão de Débito";?></td>
                                                                
                                                                <td>
                                                             <?php
                                                                foreach ($linhasServicos as $linhaServico) {
                                                                    if ($linhaServico['OS_codOS'] == $linha['codOS'] )  {
                                                                        
                                                              ?>
                                                                        <?php echo $linhaServico['descricaoServico']; ?> - 
                                                               <?php
                                                                    }
                                                                 }
                                                               ?>           
                                                               </td>
                                                               <td><?php echo $linha['codEstornoServico']; ?></td>
                                                               <td><?php echo $linha['descEstorno']; ?></td>
                                                               
                                                                  <?php
                                                           if (isset($_SESSION['perfil'])) {
                                                                if ($_SESSION['perfil'] === '2') {
                                                                    if(($linha['codEstornoServico']===null || $linha['codEstornoServico']==='0') && $linha['vlrTotalServico'] > 0){
                                                                 ?>
                                                             <td><button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal_exc<?php echo $a; ?>"><img src="../img/deleta.ico" width="16"></button></td>
                                                             <?php
                                                                    }else{
                                                                         echo "<td></td>";
                                                                    }
                                                                   
                                                                        
                                                                    }
                                                             }
                                                            ?>
                                                                    </tr>

                                                                    <!-- // janela modal -->
                                                                    <!-- janela modal Excluir Esporte -->
                                                                <div class="modal fade" id="modal_exc<?php echo $a; ?>" role="dialog" tabindex="-1" aria-hidden="true">
                                                                    <div class="modal-dialog">
                                                                        <div class="modal-content">
                                                                            <div class="modal-header">
                                                                                <button type="button" class="close" data-dismiss="modal">
                                                                                    <span aria-hidden="true">&times;</span>
                                                                                    <span class="sr-only">Fechar a tela modal</span>
                                                                                </button>
                                                                                <h4 class="modal-title">Dados para Exclusão</h4>
                                                                            </div>
                                                                            <form method="post">
                                                                            <div class="modal-body">
                                                                                <div class="form-group">
                                                                                    <label for="nome"> Motivo Do Estorno </label>
                                                                                    <input type="text" class="form-control" name="descEstorno" required="required"/>
                                                                                </div>
                                                                                <p>Deseja excluir os dados cituados no Código <?php echo $linha['codOS']; ?></p>
                                                                            </div>

                                                                            <div class="modal-footer">
                                                                                
                                                                                    <input type="hidden" name="codOS" value="<?php echo $linha['codOS']; ?>">
                                                                                    <input type="hidden" name="vlrTotalServico" value="<?php echo $linha['vlrTotalServico']; ?>">
                                                                                    <input type="hidden" name="formaPagamento" value="<?php echo $linha['formaPagamento']; ?>">
                                                                                    <input type="hidden" name="fk_Cliente" value="<?php echo $linha['fk_Cliente']; ?>">
                                                                                    <input type="submit" name="confirmarExclusao" class="btn btn-default" value="Excluir">
                                                                                    <input type="submit" class="btn btn-danger" value="Cancelar">
                                                                             
                                                                            </div>
                                                                                </form>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <!-- // janela modal -->
                                                          <?php
                                                          }
                                                          }
                                                          ?>   
                                                </tbody>
                                            </table>
                                            <form method="get" action="pdfOs.php">
                                         <button class="btn btn-danger hidden-print" type="submit">Imprimir</button>
                                    </form>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        
            <script src="../js/jquery-3.1.1.min.js"></script>
            <script src="../js/bootstrap.min.js"></script>
            <script src="../js/main.js"></script>
    </body>
</html>