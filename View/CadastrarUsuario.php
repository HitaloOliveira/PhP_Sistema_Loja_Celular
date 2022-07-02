<?php
session_start();
if(!$_SESSION['login']){
    header('Location: index.php');
    exit();
}
include_once '../Controller/FuncoesControllerUsuario.php';
$fcu = new FuncoesControllerUsuario();
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Cadastro Usuario</title>
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
            <h3 class="text-center" style="font-weight: bold" >Cadastro Usuário</h3>
            <br><br>
                        <?php
                        if (isset($_POST['confirmarEnvio'])) {
                            include_once '../Controller/FuncoesControllerUsuario.php';
                            $fcu = new FuncoesControllerUsuario();
                            $msg = $fcu->inserirUsuario($_POST['login'], $_POST['senha'], $_POST['perfil'], $_POST['descUsuario']);
                            echo $msg;
                            echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"1;
                               URL='CadastrarUsuario.php'\">";
                        }
                        ?>
            <form method="post">
                <div class="row">
                    <div class="col-md-4 col-md-offset-4">
                        
                                    <div class="form-group">
                                        <label for="nome" >Login</label>
                                        <input type="text" class="form-control" placeholder="Login" name="login" required="required">
                                    </div> 
                                    <div class="form-group">
                                        <label  for="nome">Senha</label>
                                        <input type="password" class="form-control" id="pass" name="senha" minlength="6" placeholder="Senha" required="required">
                                    </div>
                                    <div class="form-group">
                                        <label for="nome" >Perfil</label>
                                        <select class="form-control" name="perfil" required="required">
                                            <option>  -Selecione- </option>
                                            <option value="1">Usuário Comum</option>
                                            <option value="2">Administrador</option>
                                        </select>
                                    </div>
                                    <div class="align-content-center">
                                        <label for="nome" align="center">Descrição</label>
                                        <textarea <input type="text" class="form-control" placeholder="Descrição" name="descUsuario" required="required"></textarea>
                                        </div>
                                        
                            <div class="align-content-center" align="center"><br>
                            <input type="submit" value="Enviar"  class="btn btn-success btn-default" name="confirmarEnvio" />  
                            <input type="reset" class="btn btn-danger btn-default" value="Limpar" />
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
    
    </body>
</html>