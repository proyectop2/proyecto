<?php     
session_start();
if(isset($_SESSION['user'])){ //verifica si hay session iniciada
    if($_SESSION['tipo']==3){
        $user=$_SESSION['nombre'];

    include("libreria.php");
     $consult="SELECT estudiantes.codigo,estudiantes.id_estudiante,estudiantes.nombre,estudiantes.telefono,estudiantes.grupo,grupo.descripcion as grado FROM `estudiantes`  JOIN grupo on estudiantes.grupo=grupo.codigo";
     $c=mysqli_query($con,$consult);
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
           <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>index</title>
            <link rel="stylesheet" href="../estilo/mostrar.css">
            <link rel="stylesheet" href="<link rel="preconnect" href="https://fonts.googleapis.com">
            <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
            <link href="https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;700;800&display=swap" rel="stylesheet">
</head>
<body>
<header>
            <nav>
          <a href="../index.php">Inicio</a>
          <a href="mostrarusuarios.php"> Usuarios</a>
          <a href="mostrarestudiantes.php"> Estudiantes</a>
          <a href="excusa.php">Excusas</a>
          <a href="faltas.php">Faltas</a>
        </nav>
        <section class="textos-header">
            <h1>MOSTRAR ESTUDIANTES</h1>
            <h2><form action="" method="POST">
                    <input type="search" name="busca">
                    <input type="submit" name="boton" value="buscar">
                </form>
                <br><br>
                    

                <?php
                $filtro="";
                    if(isset($_POST['boton'])){
                        $busqueda=$_POST['busca'];
                        //$buscar="select * from usuarios where nombre like '%".$busqueda."%'"; 
                        $filtro="select * from usuarios where nombre like '%".$busqueda."%'"; 
                    
                    }
                    //$consult=$consult.$filtro;
                    $resultado=mysqli_query($con,$consult);
                    ?></h2>
        </section>
        <div class="ola" style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" 
        style="height: 100%; width: 100%;">
        <path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
         style="stroke: none; fill: #ffffff;"></path></svg></div>
    </header>


       <div class="mostrar_estu">
       <table>
       <thead>
           <tr>
               <th>identificacion</th>
               <th>nombres</th>
               <th>Grado</th>
               <th>Telefono</th>
               <th></th>
               <th></th>
               <th></th>
               
           </tr> 
        </thead>  
      
            
           <tbody>
           <?php
           while($vec=mysqli_fetch_array($resultado)){ ?>
            
            <tr>
                <td width=20%><?php echo $vec['id_estudiante']; ?></td>
                <td width=20%><?php echo $vec['nombre']; ?></td>
                <td width=20%><?php echo $vec['grupo'] ?></td>
                <td width=20%><?php echo $vec['telefono'] ?></td>
                <td>
                    <a href="delestudiante.php?doc=<?php echo $vec['codigo']; ?>" onclick="return confirm('Desea elimiar el estudiante:<?php echo $vec['nombre']; ?>') ">eliminar</a><br>
                    <a href="up_estudiante.php?doc=<?php echo $vec['codigo']; ?>">actualizar</a>
                </td>
            </tr>  
    
            <?php } ?>
            </tbody>
            

            
        </table>  
        <br><br>
        </div>
        

</body> 
</html>       
<?php
           }
        }
?>        