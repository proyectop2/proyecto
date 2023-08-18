<?php
session_start();
if(isset($_SESSION['tipo'])){
    if($_SESSION['tipo']==3){
    $user=$_GET['doc'];
    include("libreria.php");
    $cnx=conectar();
    $del="delete from estudiantes where codigo=".$user;
    $rdel=mysqli_query($cnx,$del);
    if($rdel){
        echo "<script type='text/javascript'>
  alert('usuario eliminado correctamente');
</script>";
    }
    }
}
?>