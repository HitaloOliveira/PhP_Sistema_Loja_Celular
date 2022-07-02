<?php
session_start();
if(!$_SESSION['login']){
    header('Location: index.php');
    exit();
}
?>
<!doctype html>
<html lang="pt-br">
  <head>
    <title>Painel</title> 
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="../sidebar-01/css/https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700,800,900" rel="stylesheet">	
    <link rel="stylesheet" href="../sidebar-01/css/https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../sidebar-01/css/style.css">
  </head>
  <body style="background-color: #DCDCDC">
      <div class="navbar-fixed-top mmstop-bar">
                <div class="mmstop-bar-logo">
		<div class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
			<div class="p-4 pt-5">
		  	<a href="#" class="img logo rounded-circle mb-5" style="background-image:url(../img/user.png);"></a>
	        <ul class="list-unstyled components mb-5">
                    <li>
                        <a href="painel.php">Home</a>
                        </li>
	          <li class="active"> 
	            <a href="#homeSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Cadastros</a>
	            <ul class="collapse list-unstyled" id="homeSubmenu">
                <li>
                    <a href="CadastroCliente.php">Cadastrar Cliente</a>
                </li>
                <li>
                    <a href="CadastroServico.php">Cadastrar Serviço</a>
                </li>
                <li>
                    <?php
                    
                    if(isset($_SESSION['perfil'])){
                        if($_SESSION['perfil']==='2'){
                            ?>
                <a href="CadastrarUsuario.php">Cadastrar Usuário</a>
                            <?php
                        }
                    }
                ?>
                    
                </li>
	            </ul>
              <a href="#pageSubmenu" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle">Listas</a>
              <ul class="collapse list-unstyled" id="pageSubmenu">
                <li>
                    <a href="ListaCliente.php">Lista de Clientes</a>
                </li>
                <li>
                    <a href="ListaServico.php">Lista de Serviços</a>
                </li>
                <li>
                    <a href="ListaOS.php">Lista de Os</a>
                </li>
                <li>
                    <?php
                    
                    if(isset($_SESSION['perfil'])){
                        if($_SESSION['perfil']==='2'){
                            ?>
               <a href="ListaUsuario.php">Lista de Usuário</a>
                
                            <?php
                        }
                    }
                ?>
                    
                    
                </li>
              </ul>
              <li>
                    <a href="CadastrarOS.php">Ordem de Serviço</a>

                </li>
	          </li>
	          <li>
                      <a href="agenda.php">Agenda</a>
	          </li>
	          <li>
                      <a href="relatorio.php">Relatórios</a>
	          </li>
                  <br><br><br><br><br><br><br>
                        <li>
                      <a href="logout.php">Sair</a>
                        </li>
	        </ul>
                       

	      </div>
    	</nav>

        <!-- Page Content  -->
      <div id="content" class="p-4 p-md-5">
          
          <nav class="navbar navbar-expand-lg navbar-light bg-light">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav ml-auto">
                <li class="nav-item active">
                    <a class="nav-link" href="painel.php">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="agenda.php">Agenda</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="relatorio.php">Relatórios</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="logout.php">Sair</a>
                </li>
              </ul>
            </div>
          </div>
        </nav>
          
         <h2> <?php echo "Bem vindo ". $_SESSION['login'];?> </h2>
             
        <p>Tech Phone Assitência Técnica de celulares.</p>
      </div>
		</div>
		</div>
		</div>

      <script src="../sidebar-01/js/jquery.min.js"></script>
    <script src="../sidebar-01/js/popper.js"></script>
    <script src="../sidebar-01/js/bootstrap.min.js"></script>
    <script src="../sidebar-01/js/main.js"></script>
  </body>
</html>

