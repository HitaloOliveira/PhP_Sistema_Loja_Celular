<?php
session_start();
if(!$_SESSION['login']){
    header('Location: index.php');
    exit();
}
include_once '../Controller/FuncoesControllerUsuario.php';
$fcu = new FuncoesControllerUsuario();
$linhas = $fcu->pesquisaUsuario();
?>
<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Lista Usuario</title>
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
                                $msg = $fcu->editarUsuario($_POST['login'], $_POST['senha'], $_POST['perfil'], $_POST['descUsuario']);
                                //Alterando dados no BD
                                echo $msg;
                                echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"1;
                                        URL='ListaUsuario.php'\">";
                            }
                            //codigo para efetivar a exclusão dos dados do cliente
                            if (isset($_POST['confirmarExclusao'])) {
                                $codigo = $_POST['login'];
                                //excluindo no BD
                                $msg = $fcu->excluiUsuario($_POST['login']);
                                echo $msg;
                                echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"1;
                                        URL='ListaUsuario.php'\">";
                            }
                            ?>
                            <div class="panel panel-info">
                                <div class="panel-heading">
                                    <h3 class="text-primary">Lista de Usuarios</h3>
                                </div>
                                <div class="panel-body">
                                    <table class="table table-striped table-condensed table-hover">                
                                        <thead>
                                            <tr>	
                                                <th>Login</th>
                                                <th>Perfil</th>
                                                <th>Descrição</th>       
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
                                                        <td><?php echo $linha['login']; ?></td>
                                                        <td><?php if($linha['perfil']==='1')
                                                                    echo "Usuário Comum";
                                                                else 
                                                                    echo "Administrador"; ?></td>
                                                        <td><?php echo $linha['descUsuario']; ?></td>
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
                                                                        <label for="nome">Senha:</label>
                                                                        <input type="text" class="form-control" name="senha" value="<?php echo $linha['senha']; ?>" required="required"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="nome">Perfil:</label>
                                                                        <input type="text" class="form-control" name="perfil" value="<?php echo $linha['perfil']; ?>" required="required"/>
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <label for="nome">Descrição:</label>
                                                                        <input type="text" class="form-control" name="descUsuario" value="<?php echo $linha['descUsuario']; ?>" required="required"/>
                                                                    </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <input type="hidden" name="login" value="<?php echo $linha['login']; ?>">
                                                                <input type="submit" name="confirmarAlteracao" class="btn btn-default" value=" Enviar ">
                                                                <input type="submit" class="btn btn-danger" value="Cancelar">
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div> 
                                                <!-- // janela modal -->
                                                <!-- janela modal Excluir Usuario -->
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
                                                                <p>Deseja excluir os dados de <?php echo $linha['login']; ?></p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <form method="post">
                                                                    <input type="hidden" name="login" value="<?php echo $linha['login']; ?>">
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
                                    <form method="get" action="pdfUse.php">
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