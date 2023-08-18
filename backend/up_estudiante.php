<?php
session_start();
if(isset($_SESSION['tipo'])){
    if($_SESSION['tipo']==3){
    $user=$_GET['doc'];
    include("libreria.php");
    $cnx=conectar();
    if($user>0){
        $csta="Select * from estudiantes Where estudiantes.codigo=".$user;
        $res=mysqli_query($cnx,$csta);
        if(mysqli_num_rows($res)==1){
            $a=mysqli_fetch_array($res);
            $identificacion=$a['id_estudiante'];
            $nom=$a['nombre'];
            $grupo=$a['grupo'];
            $tel=$a['telefono'];
            
        }
    }
    else{
        $identificacion="";
        $nom="";
        $grupo="";
        $tel="";
        
    }
    ?>
    <html>
<head>
  <link rel="stylesheet" type="text/css" href="../estilo/formularios.css">
	<title>actualizar estudiante</title>
</head>

<body >
<br><center><h1>REGISTRO</h1>
  <div class="registro">
 <form  action="" method="POST">

  <label for="id">IDENTIFICACION</label><br>
  <input type="number" name="id_estudiante" value="<?php echo $identificacion; ?>"><br><br>

  <label for="nombre">NOMBRE</label><br>
  <input type="text" name="nombre" value="<?php echo $nom; ?>"><br><br>

  <label for="fecha">GRADO</label><br>
  <select name="grupo">
  <?php 
  $grado="select * from grupo";
  $reg=mysqli_query($cnx,$grado);
  while($g=mysqli_fetch_array($reg)){
    echo "<option Value='".$g['codigo']."'>".$g['descripcion']."</option>";
  }
  ?>
  </select>
  <!--<input type="text" name="grado" value="<?php echo $grado; ?>"><br><br> -->

  <label for="telefono">TELEFONO</label><br>
  <input type="number" name="telefono" value="<?php echo $tel; ?>"><br><br>



  <input type="submit" name="boton" value="ENVIAR"><br><br>
  <a href="mostrarestudiantes.php">VOLVER..</a>
</form>
</div>
  </center>
</body>
</html>

<?php
    if(isset($_POST['boton'])){
        $identificacion=$_POST['id_estudiante'];
        $nom=$_POST['nombre'];
        $grupo=$_POST['grupo'];
        $tel=$_POST['telefono'];
        
     
   
    if($user==0){ //si es nuevo
     $consulta="select * from estudiantes where id_estudiante='".$identificacion."'"; 
   //Echo $consulta; 
     $user=mysqli_query($cnx,$consulta);
     $fila=mysqli_num_rows($user);
     if($fila>0){
       echo "<script type='text/javascript'>alert('El estudiante ya esta registrado!');</script>";
      header("refresh:0 URL=../index.php");
     }
     else{
       $insert="insert into estudiantes (id_estudiante,nombre,grupo,telefono) values('".$identificacion."','".$nom."','".$grupo."','".$tel."')";
         Echo $insert;
         
         $registro=mysqli_query($cnx,$insert);
         if($registro){
          echo "<script type='text/javascript'>alert('Registro exitoso!');</script>";
          header("location:mostrarestudiantes.php");
         }
           
   
        
     }
   }
   else{
    //Realizar el update
    $consulta="UPDATE estudiantes SET id_estudiante='$identificacion',nombre='$nom',grupo='$grupo',
    telefono='$tel' WHERE codigo=".$user;
    $query= mysqli_query($cnx,$consulta);
    if($query){
     //echo "<script type='text/javascript'>alert('tu clave no coincide');</script>";
     header("location:mostrarestudiantes.php");
    }
   }
   
   }




    }
    else{

    }

}
else{

}
?>