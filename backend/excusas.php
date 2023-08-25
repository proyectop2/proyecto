<?php
  if(isset($_POST['grupo'])){
    $grupo=$_POST['grupo'];
    include('libreria.php');
    $conec=conectar();
    $consul="Select * from estudiantes where grupo=".$grupo ." order by nombre ASC";
    $res=mysqli_query($conec,$consul);
    $fil=mysqli_num_rows($res);
    if($fil>0){
      ?>
      <html>
    <head>
    <link rel="stylesheet" type="text/css" href="../estilo/formularios.css">
    <title>registro</title>
    </head>

    <body >
    <br><center><h1>EXCUSAS</h1>
      <div class="excusa">
    <form  action="rexcusa.php" method="POST">
    
    

      <label for="nombre">NOMBRE ESTUDIANTE</label><br>
      <select name="nombre_estudiante">
                <?php
                  while($a=mysqli_fetch_array($res)){
                        echo "<option Value='".$a['codigo']."'>".$a['nombre']."</option>";
                      }
                ?>
        </select>
      
      <label for="fecha">FECHA DE INASISTENCIA</label><br>
      <input type="date" name="fecha" value=""><br><br>

      <label for="causa">CAUSA</label><br>
      <textarea name="causa" id="causa" cols="50" rows="3"></textarea><br><br>

      <label for="nombre">NOMBRE ACUDIENTE</label><br>
      <input type="text" name="nombre_acudiente" value=""><br><br>
      
      <label for="id">CEDULA  ACUDIENTE</label><br>
      <input type="number" name="cedula" value=""><br><br>

      <label for="telefono">TELEFONO DE ACUDIENTE</label><br>
      <input type="number" name="telefonoa" value=""><br><br>
      <input type="hidden" name="grupo" Value="0">

      <input type="submit" name="boton1" value="ENVIAR EXCUSA"><br><br>
      <a href="admin.php">VOLVER..</a>
    </form>
    </div>
      </center>
    </body>
    </html>

    <?php
    

  }

}

?>
