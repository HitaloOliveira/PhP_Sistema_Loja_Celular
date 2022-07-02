<?php

include_once '../Controller/FuncoesControllerOS.php';
include_once '../Controller/fdatas.php';
$fcc = new FuncoesControllerOS();
$linhas = $fcc->pesquisaOSGeral();
$fdatas = new fdatas();
?>
<!doctype html>
<html>
    <head><title>Relatório por período</title>
        <meta charset="UTF-8">
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
    <body>
  <div>
      <br> <br> <br> <br>
      <?php
       include "navmenu.php";
        ?>
      <?php
      if (isset($_POST['pesquisar'])) {
          if($_POST['dtInicio']!='00/00/0000' && $_POST['dtFim']!='00/00/0000' ){
            $linhas = $fcc->pesquisaOSPorPeriodo($_POST['dtInicio'], $_POST['dtFim']);
          }
      }
      ?>
      <div class="form-group">
          <form method="post">
              <label for="nome">Data Inicial:</label>
              <input type="date" name="dtInicio" min="2020-03-10" max="2020-06-17" >
              <label for="nome">Data Final:</label>
              <input type="date" name="dtFim" min="2020-03-10" max="2020-12-31" >
              <input type="submit" name="pesquisar" value="Pesquisar">
          </form>
      </div>
 
  </div>
             <table class="table table-striped table-condensed table-hover">                
            <thead>
                <tr>	
                    <th>Descrição</th>
                    <th>Data</th>
                    <th>Hora</th>          
                    <th>Data Entrega</th>
                     <th>Hora Entrega</th>

                </tr>
            </thead>    
            <?php
              if($linhas){
                  foreach ($linhas as $linha){
                      ?>
            <tr>
                <td><?php echo $linha['descricaoServico']; ?></td>
                <td><?php echo $fdatas->vemdata($linha['dataOS']) ; ?></td>
                <td><?php echo $linha['horaOS']; ?></td> 
                <td><?php echo $fdatas->vemdata($linha['dtEntrega']); ?></td>
                <td><?php echo $linha['horaEntrega']; ?></td>
                
            </tr>
            
            <?php
                  }
              }
            ?>
            
            
            <form method="get" action="pdfRel.php">
             <button type="submit">Imprimir</button>
            </form>    
  
  
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
