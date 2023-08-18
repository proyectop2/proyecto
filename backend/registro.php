<html>
<head>
  <link rel="stylesheet" type="text/css" href="../estilo/formularios.css">
	<title>registro</title>
</head>

<body >
<br><center><h1>REGISTRO</h1>
  <div class="registro">
 <form  action="" method="POST">

  <label for="id">IDENTIFICACION</label><br>
  <input type="number" name="id" value=""><br><br>

  <label for="nombre">NOMBRE</label><br>
  <input type="text" name="nombre" value=""><br><br>

  <label for="fecha">FECHA DE NACIMIENTO</label><br>
  <input type="date" name="fecha" value=""><br><br>

  <label for="telefono">TELEFONO</label><br>
  <input type="number" name="telefono" value=""><br><br>

  <label for="correo">CORREO ELECTRONICO</label><br>
  <input type="mail" name="correo" value=""><br><br>

  <label for="clave">CLAVE</label><br>
  <input type="password" name="clave" value="" placeholder="MAXIMO OCHO DIGITOS"><br><br><br>

  <label for="confirmarclave">CONFIRMAR CLAVE</label><br>
  <input type="password" name="confirmarclave" value="" placeholder="VUELVE A INGRESAR TU CLAVE"><br><br><br>

  <input type="submit" name="boton" value="REGISTRAR"><br><br>
  <a href="../index.php">VOLVER..</a>
</form>
</div>
  </center>
</body>
</html>

<?php
 if(isset($_POST['id'])){
 	$identificacion=$_POST['id'];
 	$nombre=$_POST['nombre'];
 	$fecha=$_POST['fecha'];
 	$telefono=$_POST['telefono'];
 	$correo=$_POST['correo'];
 	$clave=$_POST['clave'];
  $cofclave=$_POST['confirmarclave'];

 if($clave==$cofclave){ 
   include ("libreria.php"); 
   $cnx=conectar();
  $consulta="select * from usuarios where id_usuario='".$identificacion."' OR correo='".$correo."'"; 
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

 
 //header("location:../index.php");	  


?>
