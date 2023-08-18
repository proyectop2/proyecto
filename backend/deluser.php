<?php
session_start();
if(isset($_SESSION['tipo'])){
    if($_SESSION['tipo']==3){
    $user=$_GET['doc'];
    include("libreria.php");
    $cnx=conectar();
    $del="delete from usuarios where codigo=".$user;
    $rdel=mysqli_query($cnx,$del);
    if($rdel){
        echo "usuario eliminado correctamente.... :(";
    }
    }
}
?>