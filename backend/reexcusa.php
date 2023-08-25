<?php
if(isset($_POST['boton1'])){
    include('libreria.php');
    $conec=conectar();
      echo "OK";
      $nombre_acudiente=$_POST['nombre_acudiente'];
      $cedula=$_POST['cedula'];
      $telefono_a=$_POST['telefonoa'];
      $nombre_estudiante=$_POST['nombre_estudiante'];
      $fecha_inasistencia=$_POST['fecha'];
      $causa=$_POST['causa'];
      $insert="INSERT INTO excusa (nombre_acudiente,cedula,telefono_a,estudiante,fecha_inasistencia,causa) VALUES('".$nombre_acudiente."','".$cedula."','".$telefono_a."','".$nombre_estudiante."','".$fecha_inasistencia."','".$causa."')";
      Echo $insert;
      $registro=mysqli_query($conec,$insert);
      if($registro){
          echo "<script type='text/javascript'>alert('Registro exitoso!');</script>";
          header("location:../index.php");
      }
      else{
      echo "<script type='text/javascript'>alert('tu clave no coincide');</script>";
       header("location:../registro.php");
    }


    }else{
      echo "No datos";
    }
    ?>
