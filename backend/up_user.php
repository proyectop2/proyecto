<?php
session_start();
if(isset($_SESSION['tipo'])){
    if($_SESSION['tipo']==3){
    $user=$_GET['doc'];
    include("libreria.php");
    $cnx=conectar();
    if($user>0){
        $csta="Select * from usuarios Where usuarios.codigo=".$user;
        $res=mysqli_query($cnx,$csta);
        if(mysqli_num_rows($res)==1){
            $a=mysqli_fetch_array($res);
            $nom=$a['nombre'];
            $ape=$a['apellido'];
            $tel=$a['telefono'];
            $mail=$a['correo'];
            $fecha=$a['fecha_nac'];
            $tipo=$a['tipo'];
            $clave=$a['clave'];
            $iden=$a['id_usuario'];
        }
    }
    else{
        $nom="";
        $ape="";
        $tel="";
        $mail="";
        $fecha="";
        $tipo=0;
        $clave="";
        $iden="";
    }
    ?>
    <html>
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="../estilo/formularios.css">
    <link rel="stylesheet" href="<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700;800&display=swap" rel="stylesheet"
</head>

<body >
<br><center><h1>ACTUALIZAR</h1>
  <div class="registro">
 <form  action="" method="POST">

  <label for="id">IDENTIFICACION</label><br>
  <input type="number" name="id" value="<?php echo $iden; ?>"><br><br>

  <label for="nombre">NOMBRE</label><br>
  <input type="text" name="nombre" value="<?php echo $nom; ?>"><br><br>

  <label for="fecha">FECHA DE NACIMIENTO</label><br>
  <input type="date" name="fecha" value="<?php echo $fecha; ?>"><br><br>

  <label for="telefono">TELEFONO</label><br>
  <input type="number" name="telefono" value="<?php echo $tel; ?>"><br><br>

  <label for="correo">CORREO ELECTRONICO</label><br>
  <input type="mail" name="correo" value="<?php echo $mail; ?>"><br><br>

  <label for="tipo">TIPO</label><br>
  <select name="tipo" value="<?php echo $tipo;?>">
    <option value="0" <?php if($tipo==0){echo "Selected";}?>>Usuario</option>
    <option value="1" <?php if($tipo==1){echo "Selected";}?>>Profesor</option>
    <option value="2" <?php if($tipo==2){echo "Selected";}?>>Coordinador</option>
    <option value="3" <?php if($tipo==3){echo "Selected";}?>>Administrador</option>
  </select><br><br>

  <label for="clave">CLAVE</label><br>
  <input type="text" name="clave" value="<?php echo $clave; ?>" placeholder="MAXIMO OCHO DIGITOS"><br><br><br>


  <input type="submit" name="boton" value="ENVIAR"><br><br>
  <a href="mostrarusuarios.php">VOLVER..</a>
</form>
</div>
  </center>
</body>
</html>

<?php
    if(isset($_POST['boton'])){
        $identificacion=$_POST['id'];
        $nombre=$_POST['nombre'];
        $fecha=$_POST['fecha'];
        $telefono=$_POST['telefono'];
        $correo=$_POST['correo'];
        $clave=$_POST['clave'];
        $tipo=$_POST['tipo'];
     
   
    if($user==0){ //si es nuevo
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
          header("location:mostrarusuarios.php");
         }
           
   
        
     }
   }
   else{
    //Realizar el update
    $consulta="UPDATE usuarios SET id_usuario='$identificacion',nombre='$nombre',fecha_nac='$fecha',
    correo='$correo',telefono='$telefono',tipo='$tipo' WHERE codigo=".$user;
    $query= mysqli_query($cnx,$consulta);
    echo $consulta;
    if($query){
     //echo "<script type='text/javascript'>alert('tu clave no coincide');</script>";
     header("location:mostrarusuarios.php");
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