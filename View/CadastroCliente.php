<?php
session_start();
if(!$_SESSION['login']){
    header('Location: index.php');
    exit();
}
include_once '../Controller/FuncoesControllerCliente.php';
$fcc = new FuncoesControllerCliente();
$id = $fcc->proximoCodCliente();
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
            <h3 class="text-center" style="font-weight: bold" >Cadastro Cliente</h3>
            <br><br>

                <?php
                if (isset($_POST['confirmarEnvio'])) {
                    include_once '../Controller/FuncoesControllerCliente.php';

                    $fcc = new FuncoesControllerCliente();

                    $msg = $fcc->inserirCliente($_POST['codCliente'], $_POST['nomeCliente'], $_POST['cpfcnpj'], $_POST['telefone'], $_POST ['celular'], $_POST['email']);
                    echo $msg;
                    echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"1;
                               URL='CadastroCliente.php'\">";
                }
                ?>
                
                       <form method="post">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                    
                        <div class="hidden" >
                                    <label for="nome">Código: </label>
                                    <label for="nome"><?php echo $id; ?></label>
                                    <input type="hidden" class="form-control" name="codCliente" value="<?php echo $id; ?>"/>
                                </div>
                    <div class="form-group">   
                        <label for="nome" >Nome Completo</label>                                      
                        <input type="text" class="form-control" name="nomeCliente" placeholder="Nome Completo">
                    </div>
                    <div class="form-group">  
                        <label for="nome" >CPF</label>                   
                        <input type="text" class="form-control" name="cpfcnpj" onkeypress='mascaraMutuario(this, cpfCnpj)' onblur='clearTimeout()' maxlength="14" placeholder="CPF">
                    </div>
                    <div class="form-group">
                        <label for="nome" >Telefone</label>
                        <input type="text" class="form-control " name="telefone" id="telefone" onkeypress="return mascaraTelefone(this, event)" placeholder="Telefone">
                    </div>
                    <div class="form-group">
                        <label for="nome" >Celular</label>
                        <input type="text" class="form-control" name="celular" id="celular" onkeypress="return mascaraTelefone(this, event)" placeholder="Celular">
                    </div>
                    <div class="form-group">
                        <label for="nome" >Email</label>
                        <input type="email" class="form-control" name="email" placeholder="Email">
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

