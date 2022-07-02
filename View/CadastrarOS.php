<?php
ob_start();

session_start();
if(!$_SESSION['login']){
    header('Location: index.php');
    exit();
}
include_once '../Controller/FuncoesControllerOS.php';
include_once '../Controller/FuncoesControllerSO.php';
include_once '../Controller/FuncoesControllerCliente.php';
include_once '../Controller/FuncoesControllerUsuario.php';
include_once '../Controller/FuncoesControllerServico.php';
$fcu = new FuncoesControllerUsuario();
$fcs = new FuncoesControllerServico();
$fco = new FuncoesControllerOS();
$fcso = new FuncoesControllerSO();
$fcc = new FuncoesControllerCliente();
$linhasUsuarios = $fcu->pesquisaUsuario();
$linhasClientes = $fcc->pesquisaCliente();
$linhasServicos = $fcs->pesquisaServico();
$id = $fco->proximoCodOS();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro OS</title>
        <link rel="stylesheet" href="../css/bootstrap-grid.css">
        <link rel="stylesheet" href="../css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="../css/bootstrap-reboot.css">
        <link rel="stylesheet" href="../css/bootstrap-reboot.min.css">
        <link rel="stylesheet" href="../css/bootstrap-theme.css">
        <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/estilo.css">
        <link  rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../bootstrap-select-1.13.9/dist/css/bootstrap-select.min.css" />
        <link rel="stylesheet" href="../bootstrapSelectpicker/dist/css/bootstrap-select.min.css" />

    </head>
    <body class="jumbotron jumbotron-fluid" >
        <?php
        include "navmenu.php";
        ?>
        <br><br>
        <div class="container">
            <h3 class="text-center" style="font-weight: bold" >Ordem de Serviço</h3>
            <br><br>
            <?php
            if (isset($_POST['confirmarEnvio'])) {
                $msg = $fco->inserirOS($_POST['codOS'], $_POST['dataOS'], $_POST['horaOS'], $_POST ['horaEntrega'], $_POST['dtEntrega'], $_POST['formaPagamento'], $_POST['fk_Cliente'], $_POST['fk_Usuario']);
                
                if ($_POST['codServico']) {
                    foreach ($_POST['codServico'] as $servico) {
                        $msg = $fcso->inserirSO($servico, $_POST['codOS']);
                    }
                }
                //  $msg = $fcso->inserirSO($Serv_codServico, $OS_codOS)
                echo $msg;

                echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"1;
                               URL='CadastrarOS.php'\">";
            }
            ?>
            <form method="post">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                    <div class="col-md-6">
                        <div class="hidden" >
                            <label style="color: #f9f9f9" for="nome">Código: </label>
                            <label for="nome"><?php echo $id; ?></label>
                            <input type="hidden" class="form-control" name="codOS" value="<?php echo $id; ?>"/>
                        </div>
                        <!-- deixa lado a lado (não muito utilizado) -->
                        <div class="form-group">
                            <label for="nome"> Data </label>
                            <input type="date" class="form-control" name="dataOS" required="required"/>
                        </div>
                        <div class="form-group">
                            <label for="nome">Hora</label>
                            <input type="time" class="form-control" name="horaOS" required="required"/>
                        </div>
                        <div class="form-group">
                            <label for="nome">Data Entrega</label>
                            <input type="date" class="form-control" name="dtEntrega" required="required"/>
                        </div>
                        <div class="form-group">
                            <label for="nome">Hora da Entrega</label>
                            <input type="time" class="form-control" name="horaEntrega" required="required"/>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="nome" >Forma de Pagamento</label>
                            <select class="form-control" name="formaPagamento">
                                <option>  -Selecione- </option>
                                <option value="0">Cartão de Crédito</option>
                                <option value="1">Dinheiro</option>
                                <option value="2">Cartão de Débito</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nome">Cliente:</label>
                            <select class="selectpicker form-control" data-live-search="login" name="fk_Cliente">    
                                <?php
                                foreach ($linhasClientes as $linhaCliente) {
                                    ?>
                                    <option value="<?php echo $linhaCliente['codCliente']; ?>">
                                        <?php echo $linhaCliente['nomeCliente']; ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="nome">Serviço:</label>
                            <select class="selectpicker form-control" multiple="multiple" data-live-search="servico" name="codServico[]">    
                                <?php
                                foreach ($linhasServicos as $linhaServico) {
                                    ?>
                                    <option value="<?php echo $linhaServico['codServico']; ?>">
                                        <?php echo $linhaServico['descricaoServico']; ?>
                                    </option>
                                    <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <input type="hidden" name="fk_Usuario" value="<?php echo $_SESSION['login']; ?>">           
                        </div>
                        <div class="align-content-center" align="center"><br><br>
                            <input type="submit" value="Enviar"  class="btn btn-success btn-default" name="confirmarEnvio" />  
                            <input type="reset" class="btn btn-danger btn-default" value="Limpar" />
                        </div>
                    </div>
                </div>
                </div>
            </form>
        </div>                                         

        <!-- adiciona JQuery -->
        <script src="../js/jquery.min.js"></script>
        <!-- adiciona o JS Bootstrap -->
        <script src="../js/bootstrap.min.js"></script>
        <script src="../js/main.js"></script>
        <script src="../js/valor.js"></script>
        <script src="../bootstrap-select-1.13.9/js/bootstrap-select.js"></script>
        <script src="../js/bootstrap-select.mim.js"></script>
    </body>
</html>
<?php ob_end_flush(); ?>


