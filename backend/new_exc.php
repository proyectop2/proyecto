<?php
	session_start();
	if(isset($_SESSION['user'])){ //verifica si hay session iniciada
		if($_SESSION['tipo']==3){
            include('libreria.php');
            $cnx=conectar();
            $grado="select * from grupo";
            $reg=mysqli_query($cnx,$grado);
            ?>
            <html>
                <h2>Selciones el grupo</h2><br><br>
                <form Action="" method="POST">
                <select name='Grupo'>

            <?php 
            while($g=mysqli_fetch_array($reg)){
            echo "<option Value='".$g['codigo']."'>".$g['descripcion']."</option>";
            }
            ?>
            </select><br>
             <input type="submit" Value="Consultar">   
            </form >

            <?php
            
 
        }
		else{
			echo "<script type='text/javascript'>
  alert('El usuario no tiene permiso para esta pagina');
</script>";
		}
	}
	else{
		echo "<script type='text/javascript'>
  alert('Debe de iniciar session primero!');
</script>";
	}
?>