<?php
session_start();
if(!$_SESSION['login']){
    header('Location: index.php');
    exit();
}
include_once '../Controller/FuncoesControllerServico.php';
$fcs = new FuncoesControllerServico();
$id = $fcs->proximoCodServico();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro Cliente</title>
        <link rel="stylesheet" href="../css/bootstrap-grid.css">
        <link rel="stylesheet" href="../css/bootstrap-grid.min.css">
        <link rel="stylesheet" href="../css/bootstrap-reboot.css">
        <link rel="stylesheet" href="../css/bootstrap-reboot.min.css">
        <link rel="stylesheet" href="../css/bootstrap-theme.css">
        <link rel="stylesheet" href="../css/bootstrap-theme.min.css">
        <link rel="stylesheet" href="../css/bootstrap.css">
        <link rel="stylesheet" href="../css/bootstrap.min.css">
        <link rel="stylesheet" href="../css/estilo.css">

    </head>
    <body class="jumbotron jumbotron-fluid" > 
        <?php
       include "navmenu.php";
        ?>
        
            
                <br><br>
        <div class="container">
            <h3 class="text-center" style="font-weight: bold" >Cadastro Serviço</h3>
            <br><br>

                <?php
                if (isset($_POST['confirmarEnvio'])) {
                    include_once '../Controller/FuncoesControllerServico.php';
                    $fcs = new FuncoesControllerServico();
                    $msg = $fcs->inserirServico($_POST['codServico'], $_POST['statusServico'], $_POST['descricaoServico'], $_POST['vlrServico']);
                    echo $msg;
                    echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"1;
                               URL='CadastroServico.php'\">";
                }
                ?>
                
                        <form method="post">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        <div class="hidden" >
                            <label for="nome" align="center">Código: </label>
                            <label type="hidden" for="nome"><?php echo $id ?></label>
                            <input type="hidden" class="form-control" name="codServico" value="<?php echo $id ?>"/>
                        </div> 
                     
                    <div class="form-group">
                        <label for="nome">Status do Serviço</label>&nbsp;&nbsp;
                        <input type="radio"  placeholder="Descrição" value="1" name="statusServico" checked="checked"> Ativo &nbsp;&nbsp;           
                        <input type="radio"  placeholder="Descrição" value="2" name="statusServico"> Inativo           
                    </div>
                    <div class="form-group">
                        <label for="nome" align="center">Descrição</label>&nbsp;&nbsp;&nbsp;
                        <textarea <input type="text" class="form-control" placeholder="Descrição" name="descricaoServico" required="required"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="nome">Valor</label>
                        <input type="text" class="form-control" placeholder="R$" name="vlrServico"  onKeyPress="return(moeda(this, ',', '.', event))" required="required"/>
                    </div>
                        <div class="align-content-center" align="center"><br>
                            <input type="submit" value="Enviar"  class="btn btn-success btn-default" name="confirmarEnvio" />  
                            <input type="reset" class="btn btn-danger btn-default" value="Limpar" />
                        </div>
                    </div>
                    </div>
                    </div>
                            </form>
                    </div>
                    
               
           
          
    <!-- adiciona JQuery -->
    <script src="../js/jquery-3.1.1.min.js"></script>
    <!-- adiciona o JS Bootstrap -->
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/main.js"></script>
    <script src="../js/telefone.js"></script>
    <script src="../js/cpf.js"></script>
    <script src="../js/valor.js"></script>
</body>
</html>
