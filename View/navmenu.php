<?php

?>
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container-fluid">
        <div class="navbar-header" align="center">
            <!-- data-toggle="collapse" data-target="#elementoCollapse" permitem criar um botão que esconde e disponibiliza o conteúdo do formulário da div que tem o id="elementoCollapse" --> 
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#elementoCollapse">
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
        </div>
        <div class="collapse navbar-collapse" id="elementoCollapse">
            <ul class="nav navbar-nav">
                <li><a href="painel.php">Home</a></li>
                
                <li><a href="CadastrarOS.php">Ordem de Serviço</a></li>
                <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Serviço <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="CadastroServico.php">Cadastro do Serviço</a></li>
                            <li><a href="ListaServico.php" >Lista de Serviços</a></li>
                             <li><a href="ListaOS.php">Lista de OS</a></li>
                            
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Cliente <span class="caret"></span></a>
                        <ul class="dropdown-menu" role="menu">
                            <li><a href="CadastroCliente.php">Cadastro do Cliente</a></li>
                            <li><a href="ListaCliente.php" >Lista de Clientes</a></li>
                            
                        </ul>
                    </li>
               
                            <?php
                    if (isset($_SESSION['perfil'])) {
                        if ($_SESSION['perfil'] === '2') {
                            ?>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown">Usuário <span class="caret"></span></a>
                                <ul class="dropdown-menu" role="menu">              
                                    <li><a href="CadastrarUsuario.php">Cadastro do Usuario</a></li>
                                    <li><a href="ListaUsuario.php">Lista de Usuario</a></li>
                               </ul>
                            </li>
                            <?php
                        }
                    }
                     
                    ?>
                                    
                <li><a href="agenda.php">Agenda</a></li>
                <li><a href="relatorio.php">Relatórios</a></li>
                <li><a href="logout.php">Sair</a></li>
            </ul>
        </div>
    </div>
</nav>
