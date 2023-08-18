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
    <form  action="" method="POST">
    
    <label for="nombre">NOMBRE ACUDIENTE</label><br>
      <input type="text" name="nombreA" value=""><br><br>
      
      <label for="id">CEDULA</label><br>
      <input type="number" name="cedula" value=""><br><br>

      <label for="telefono">TELEFONO DE ACUDIENTE</label><br>
      <input type="number" name="telefono" value=""><br><br>

      <label for="nombre">NOMBRE ESTUDIANTE</label><br>
      <select name="estudiantes">
                <?php
                  while($a=mysqli_fetch_array($res)){
                        echo "<option Value='".$a['codigo']."'>".$a['nombre']."</option>";
                      }
                ?>
        </select>
      <label for="id">IDENTIFICACION</label><br>
      <input type="number" name="id" value=""><br><br>
      
      <label for="fecha">FECHA DE INASISTENCIA</label><br>
      <input type="date" name="fecha" value=""><br><br>

      <label for="causa">CAUSA</label><br>
      <textarea name="causa" id="" cols="50" rows="3"></textarea>

      <input type="submit" name="boton1" value="ENVIAR EXCUSA"><br><br>
      <a href="admin.php">VOLVER..</a>
    </form>
    </div>
      </center>
    </body>
    </html>

    <?php
    if(isset($_POST['id'])){
      $nombre_acudiente=$_POST['nombreA'];
      $cedula=$_POST['cedula'];
      $telefono_a=$_POST['telefono'];
      $nombre_estudiante=$_POST['nombreES'];
      $identificacion=$_POST['id'];
      $fecha_inasistencia=$_POST['fecha'];
        $causa=$_POST['causa'];

    if($clave==$cofclave){ 
      include ("libreria.php"); 
      $cnx=conectar();
      $consulta="select * from excusa where ='".$identificacion."' OR correo='".$correo."'"; 
    //Echo $consulta; 
      $user=mysqli_query($cnx,$consulta);
      $fila=mysqli_num_rows($user);
      if($fila>0){
        echo "<script type='text/javascript'>alert('El usuario ya esta registrado!');</script>";
      header("refresh:0 URL=../index.php");
      }
      else{
        $insert="insert into usuarios (id_usuario,nombre,fecha_nac,telefono,correo,clave) values('".$identificacion."','".$nombre."','".$fecha."','".$telefono."','".$correo."','".$clave."')";
          Echo $insert;
          
          $registro=mysqli_query($cnx,$insert);
          if($registro){
          echo "<script type='text/javascript'>alert('Registro exitoso!');</script>";
          header("location:../index.php");
          }
            

        
      }
    }
    else{
      echo "<script type='text/javascript'>alert('tu clave no coincide');</script>";
      header("location:../registro.php");
    }



    }

  }

}

?>
