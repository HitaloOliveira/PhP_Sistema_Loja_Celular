<?php
session_start();
if(!$_SESSION['login']){
    header('Location: index.php');
    exit();
}
include_once '../Controller/FuncoesControllerCliente.php';
$fcc = new FuncoesControllerCliente();
$linhas = $fcc->pesquisaCliente();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lista Clientes</title>
        <link href="../css/bootstrap.min.css" rel="stylesheet">
        <link href="../css/bootstrap.css" rel="stylesheet">
        <link href="../css/estilo.css" rel="stylesheet">
        <link rel="stylesheet" href="../css/redmond/jquery-ui-1.10.1.custom.css" />
        <link href="../css/bootstrap-grid.css" rel="stylesheet">
    </head>
    <body  >
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
                                $msg = $fcc->editarCliente($_POST['codCliente'], $_POST['nomeCliente'], $_POST['cpfcnpj'], $_POST['telefone'], $_POST['celular'], $_POST['email']);
                                //Alterando dados no BD
                                echo $msg;
                                echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"1;
                                        URL='ListaCliente.php'\">";
                            }
                            //codigo para efetivar a exclusão dos dados do cliente
                            if (isset($_POST['confirmarExclusao'])) {
                                $codigo = $_POST['codCliente'];
                                //excluindo no BD
                                $msg = $fcc->excluiCliente($_POST['codCliente']);
                                echo $msg;
                                echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"1;
                                        URL='ListaCliente.php'\">";
                            }
                            ?>
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="text-primary">Lista de Clientes</h3>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped table-condensed table-hover">                
                                        <thead>
                                            <tr>	
                                                <th>Código</th>
                                                <th>Nome do Cliente</th>
                                                <th>CPF</th>
                                                <th>Telefone</th>
                                                <th>Celular</th>
                                                <th>Email</th>
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
                                                        <td><?php echo $linha['codCliente']; ?></td>
                                                        <td><?php echo $linha['nomeCliente']; ?></td>
                                                        <td><?php echo $linha['cpfcnpj']; ?></td>
                                                        <td><?php echo $linha['telefone']; ?></td>
                                                        <td><?php echo $linha['celular']; ?></td>
                                                        <td><?php echo $linha['email']; ?></td>

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
                                                                        <label for="nome">Nome Cliente:</label>
                                                                        <input type="text" class="form-control" name="nomeCliente" value="<?php echo $linha['nomeCliente']; ?>" required="required"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="nome">CPF:</label>
                                                                        <input type="text" class="form-control" name="cpfcnpj" value="<?php echo $linha['cpfcnpj']; ?>" required="required"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="nome">Telefone:</label>
                                                                        <input type="text" class="form-control" name="telefone" value="<?php echo $linha['telefone']; ?>" required="required"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="nome">Celular:</label>
                                                                        <input type="text" class="form-control" name="celular" value="<?php echo $linha['celular']; ?>" required="required"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="nome">Email:</label>
                                                                        <input type="text" class="form-control" name="email" value="<?php echo $linha['email']; ?>" required="required"/>
                                                                    </div>

                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="hidden" name="codCliente" value="<?php echo $linha['codCliente']; ?>">
                                                                <input type="submit" name="confirmarAlteracao" class="btn btn-default" value=" Enviar ">
                                                                <input type="submit" class="btn btn-danger" value="Cancelar">
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <!-- // janela modal -->
                                                
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
                                                                <p>Deseja excluir os dados de <?php echo $linha['nomeCliente']; ?></p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form method="post">
                                                                    <input type="hidden" name="codCliente" value="<?php echo $linha['codCliente']; ?>">
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
                                    <form method="get" action="pdfCli.php">
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
        <script src="../js/telefone.js"></script>
        <script src="../js/cpf.js"></script>
    </body>
</html>