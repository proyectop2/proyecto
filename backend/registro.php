<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="../estilo/inicio_sesion.css">
  <link rel="stylesheet" href="../css/bootstrap.css">
</head>
<body>
<section class="h-100 gradient-form" style="background-color: #eee;">
  <div class="container py-5 h-100">
    <div class="row d-flex justify-content-center align-items-center h-100">
      <div class="col-xl-10">
        <div class="card rounded-3 text-black">
          <div class="row g-0">
            <div class="col-lg-6">
              <div class="card-body p-md-5 mx-md-4">

                <form  action="validar.php" method="POST" >
                  <p><h5>Registrate</h5></p>

                
                  <div class="form-outline mb-4">
                    <input type="number" name="id" class="form-control" />
                    <label class="form-label" for="id" name="id" >Identificacion</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="text" name="nombre" class="form-control" />
                    <label class="form-label" for="nombre" name="nombre" >Nombre</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="date" name="fecha" class="form-control" />
                    <label class="form-label" for="fecha" name="fecha" >Fecha</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="text" name="telefono" class="form-control" />
                    <label class="form-label" for="telefono" name="telefono" >Telefono</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="mail" name="correo" class="form-control" />
                    <label class="form-label" for="correo" name="correo" >Correo</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" name="clave" class="form-control" />
                    <label class="form-label" for="clave" name="clave" >Clave</label>
                  </div>

                  <div class="form-outline mb-4">
                    <input type="password" name="confirmarclave" class="form-control" />
                    <label class="form-label" for="confirmarclave" name="confirmarclave" >Confirmar Clave</label>
                  </div>

                  <div class="text-center pt-1 mb-5 pb-1">
                    <input class="btn btn-primary btn-block fa-lg gradient-custom-2 mb-3" type="submit" name="boton" value="INICIAR"></input>
                    
                  </div>

                  <div class="d-flex align-items-center justify-content-center pb-4">
                    <a href="../index.php">Volver</button></a>
                  </div>

                </form>

              </div>
            </div>
            <div class="col-lg-6 d-flex align-items-center gradient-custom-2">
              <div class="text-white px-3 py-4 p-md-5 mx-md-4">
              <div class="text-center">
                  <img src="../imagen/lotus"
                    style="width: 185px;" alt="logo">
                  <h4 class="mt-1 mb-5 pb-1">Nosotros somos EXCUSE ME</h4>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
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
