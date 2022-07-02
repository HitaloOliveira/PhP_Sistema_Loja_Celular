<?php
session_start();
if(!$_SESSION['login']){
    header('Location: index.php');
    exit();
}
include_once '../Controller/FuncoesControllerServico.php';
$fcs = new FuncoesControllerServico();
$linhas = $fcs->pesquisaServico();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lista Serviço</title>
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
                            //codigo para efetivar a Alteração dos dados do cliente
                            if (isset($_POST['confirmarAlteracao'])) {
                                $msg = $fcs->editarServico($_POST['codServico'], $_POST['statusServico'], $_POST['descricaoServico'], $_POST['vlrServico']);
                                //Alterando dados no BD
                                echo $msg;
                                echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"1;
                                        URL='ListaServico.php'\">";
                            }
                            //codigo para efetivar a exclusão dos dados do cliente
                            if (isset($_POST['confirmarExclusao'])) {
                                $codigo = $_POST['codServico'];
                                //excluindo no BD
                                $msg = $fcs->excluiServico($_POST['codServico']);
                                echo $msg;
                                echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"1;
                                        URL='ListaServico.php'\">";
                            }
                            ?>
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="text-primary">Lista de Serviços</h3>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped table-condensed table-hover">                
                                        <thead>
                                            <tr>	
                                                <th>Código</th>
                                                <th>Status de Serviço</th>
                                                <th>Descrição</th>
                                                <th>Valor</th>       
                                                <th>Editar</th>       
                                                <th>Excluir</th>       
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
                                                        <td><?php echo $linha['codServico']; ?></td>
                                                        
                                                        <td><?php if($linha['statusServico']==='1')
                                                                    echo "Ativo";
                                                                else 
                                                                    echo "Inativo"; ?></td>
                                                        
                                                       
                                                        <td><?php echo $linha['descricaoServico']; ?></td>
                                                        <td><?php echo $linha['vlrServico']; ?></td>

                                                        <td><button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal_ed<?php echo $a; ?>"><img src="../img/edita.ico" width="16"></button></td>
                                                        <td><button type="button" class="btn btn-default" data-toggle="modal" data-target="#modal_exc<?php echo $a; ?>"><img src="../img/deleta.ico" width="16"></button></td>
                                                    </tr>
                                                    <!-- janela modal Editar Esporte -->
                                                <div class="modal fade" id="modal_ed<?php echo $a; ?>" role="dialog" tabindex="-1" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <button type="button" class="close" data-dismiss="modal">
                                                                    <span aria-hidden="true">&times;</span>
                                                                    <span class="sr-only">Fechar a tela modal</span>
                                                                </button>
                                                                <h4 class="modal-title">Dados para Edição</h4>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form method="post">
                                                                    <div class="form-group">
                                                                        <label for="nome">Status de Serviço:</label>
                                                                        <input type="text" class="form-control" name="statusServico" value="<?php echo $linha['statusServico']; ?>" required="required"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="nome">Descrição:</label>
                                                                        <input type="text" class="form-control" name="descricaoServico" value="<?php echo $linha['descricaoServico']; ?>" required="required"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="nome">Valor:</label>
                                                                        <input type="text" class="form-control" name="vlrServico" value="<?php echo $linha['vlrServico']; ?>" required="required"/>
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="hidden" name="codServico" value="<?php echo $linha['codServico']; ?>">
                                                                <input type="submit" name="confirmarAlteracao" class="btn btn-default" value=" Enviar ">
                                                                <input type="submit" class="btn btn-danger" value="Cancelar">
                                                                
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
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
                                                            <div class="modal-body">
                                                                <p>Deseja excluir os dados de <?php echo $linha['descricaoServico']; ?></p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form method="post">
                                                                    <input type="hidden" name="codServico" value="<?php echo $linha['codServico']; ?>">
                                                                    <input type="submit" name="confirmarExclusao" class="btn btn-default" value="Excluir">
                                                                    <input type="submit" class="btn btn-danger" value="Cancelar">
                                                                </form>
                                                            </div>
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
                                    <form method="get" action="pdfSer.php">
                                         <button class="btn btn-danger hidden-print" class="btn btn-default" type="submit">Imprimir</button>
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