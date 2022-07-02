<?php
session_start();
include_once '../Model/Usuario.php';
$u = new Usuario();
?>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <title>Projeto Login</title>
        <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">
    </head>
    <body  style="background-color: #1C1C1C">
       <!-- <?php
        //include "navmenu.php";
        ?>
        -->
        <div class="container"> <br><br><br><br><br><br><br><br><br><br><br><br>
            <div class="row center-block">
                <div class="card card-login mx-auto text-center bg-dark">
                    <div class="card-header mx-auto bg-dark">
                        <span class="logo_title mt-5" style="color: #009926"><strong> Login TP </strong></span>
                    </div>

                    <?php
                    if (isset($_SESSION['nao_autenticado'])):
                        echo "<META HTTP-EQUIV='REFRESH' CONTENT=\"1;
                               URL='index.php'\">";
                        ?>
                        <div class="notification is-danger">
                            <p style="color: #FF0000" >ERRO: Usuario ou Senha inválidos.</p> 
                        </div>
                        <?php
                    endif;
                    unset($_SESSION['nao_autenticado']);
                    ?>
                        
                    <div class="card-body">
                        <form action="login2.php" method="post">
                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-user"></i></span>
                                </div>
                                <input type="text" name="login" class="form-control" placeholder="UserLogin">
                            </div>

                            <div class="input-group form-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fas fa-key"></i></span>
                                </div>
                                <input type="password" name="senha" class="form-control" placeholder="Password">
                            </div>

                            <div class="form-group">
                                <input type="submit" name="btn" value="Login" class="btn btn-success btn-default">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    </body>

</html>