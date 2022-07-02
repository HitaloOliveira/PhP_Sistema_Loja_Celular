<?php

session_start();
if(!$_SESSION['login']){
    header('Location: index.php');
    exit();
}
include_once  '../Model/Conecta.php';
$sql = "SELECT * FROM os INNER JOIN servico_os ON codOS = OS_codOS INNER JOIN servico ON codServico = Serv_codServico";
$query = mysqli_query($db, $sql) or die(mysqli_error($db));
$linha = mysqli_fetch_array($query, MYSQLI_ASSOC);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset='utf-8' />
<link href='../fullcalendar/packages/core/main.css' rel='stylesheet' />
<link href='../fullcalendar/packages/daygrid/main.css' rel='stylesheet' />
<link href='../fullcalendar/packages/timegrid/main.css' rel='stylesheet' />
<link href='../fullcalendar/packages/list/main.css' rel='stylesheet' />
<script src='../fullcalendar/packages/core/main.js'></script>
<script src='../fullcalendar/packages/interaction/main.js'></script>
<script src='../fullcalendar/packages/daygrid/main.js'></script>
<script src='../fullcalendar/packages/timegrid/main.js'></script>
<script src='../fullcalendar/packages/list/main.js'></script>
<script src='../fullcalendar/packages/core/locales-all.js'></script>
<link href="../css/bootstrap.min.css" rel="stylesheet">
<link href="../css/bootstrap.css" rel="stylesheet">
<link href="../css/estilo.css" rel="stylesheet">
<link rel="stylesheet" href="../css/redmond/jquery-ui-1.10.1.custom.css" />
<link href="../css/bootstrap-grid.css" rel="stylesheet">
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');
    var today = new Date();
    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid', 'timeGrid', 'list' ],
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
      },
      
      eventClick: function (){
                        window.location.href="ListaOS.php";                                           
                    }, 
                                    
                     selectable: true,
                        select: function (info) {                        
                        //alert('Início do evento: ' + info.start.toLocaleString())
                        var dia = '' + info.start.getDate();                        
                        var mes = '' + (info.start.getMonth() + 1);
                        var ano = info.start.getFullYear(); 
                        
                        if (mes.length <2)
                            mes = '0' + mes;
                        
                        if (dia.length <2)
                            dia = '0' + dia;
                        
                        document.location.href = 'CadastrarOS.php?inicio='+ ano + '-' + mes + '-' + dia + 'T00:00';
    },
      
      locale: "pt-br",
      defaultDate: today,
      navLinks: true, // can click day/week names to navigate views
      businessHours: true, // display business hours
      editable: true,
      events: [
          <?php
            do{  
          ?>
                {
                title: '<?php echo $linha['descricaoServico'];?>',
                start: '<?php echo $linha['dataOS'];?>',
               // color:  '<?php //echo $linha['cor'];?>',
                end: '<?php echo $linha['dtEntrega'];?>'
                },
          <?php
            }while($linha = mysqli_fetch_array($query, MYSQLI_ASSOC));
            
          ?>
                          
      ]
      
    });

    calendar.render();
  });

</script>
<style>

  body {
    margin: 40px 10px;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 900px;
    margin: 0 auto;
  }

</style>
</head>
<body>
    <?php
       include "navmenu.php";
        ?>
       
<br><br>
    <div class="container"    >
        <div id='calendar'></div>
    </div>
  
<script src="../js/jquery-3.1.1.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<script src="../js/main.js"></script>
</body>
</html>
