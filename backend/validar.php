<?php
//para validar  la pagina
 
if(isset($_POST['correo'])){
    $correo=$_POST['correo'];
    $clave=$_POST['clave'];
    $consulta="select * from usuarios where correo='".$correo."'";
    include('libreria.php');
    $cnx=conectar();
    //echo $consulta;
    $user=mysqli_query($cnx,$consulta);
    $fila=mysqli_num_rows($user);
    if($fila==0){
        echo "<script type='text/javascript'>alert('EL USUARIO NO EXISTE!!');
</script>";
        header("location:../index.php");
       }
       else{
       	   $a=mysqli_fetch_array($user);
       	   if($a['clave']==$clave){
       		 session_start();
             $_SESSION['tipo']=$a['tipo'];
             $_SESSION['user']=$a['id_usuario'];
             $_SESSION['nombre']=$a['nombre'];
             switch ($a['tipo']) {
                   case 0:
                       echo "Bienvenido usuario";
                       header("location:usuario.php");

                    break;
                    case 1:
                       echo "Bienvenido profesor";
                       header("location:profesor.php");
                    break;
                    case 2:
                       echo "Bienvenido coordinador";
                       header("location:coordi.php");
                    break;
                    case 3:
                       echo "Bienvenido administrador";
                       header("location:admin.php");
                    break;
                   
                   default:
                       // code...
                       break;
               } 
            }
            else{   
            echo "<script type='text/javascript'>alert('Clave incorrecta!');</script>";
       		}
      
       }
}
?>

