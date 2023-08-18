<?php
  session_start();
  if(isset($_SESSION['user'])){ //verifica si hay session iniciada
    if($_SESSION['tipo']==1){

?>
<html>
<head>      
  <title></title>
  <link rel="stylesheet" type="text/css" href="../estilo/estilo.css">
</head>
<body style="background-color:#D5D9EC">
<table width=100% class="TabEncas">
  <tr>
    <td width="5%">
    <td width="80%"><center><h1>EXCUSE ME<h1></center></td>
    <td width="5%"><img src="../imagen/escudo.jpg" width="80 px"></td>
  </tr>
  </table>

  <NAV class="navbar ">
    <div>
          <ul class="nav">
            <li><a href="../index.php">Inicio</a></li>
            <li><a href="#contenidos">Contenidos</a>
              <ul>
                <li><a href="mostrarusuarios.php"> usuarios</a></li>
                <li><a href="excusas.php">excusas</a></li>
                <li><a href="faltas.php">faltas</a></li>
              </ul>

            </li>
            <li><a href="#registrar"></a>
              <ul>
                <li><a href=""></a></li>
                <li><a href=""></a></li>
              </ul>

            </li>
          </ul>
        
    </div><br>
   </NAV><br><br>
</body>
      </html>

      <?php
    }
    else{
      echo "<script type='text/javascript'>
  alert('El usuario no tiene permiso para esta pagina');
</script>";
    }
  }
  else{
    echo "<script type='text/javascript'>
  alert('Debe de iniciar session primero!');
</script>";
  }
?>