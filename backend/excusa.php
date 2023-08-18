<?php
	session_start();
	if(isset($_SESSION['user'])){ //verifica si hay session iniciada
		if($_SESSION['tipo']==3){

			?>
			<html>
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
            <h1>EXCUSAS</h1>
            <h2>
              <form Action="excusas.php" Method="POST">
        <label>Selecione el grupo</label>
        <select name="grupo">
            
            <?php
                include('libreria.php');
                $conec=conectar();
                $consul="Select * from Grupo";
                $res=mysqli_query($conec,$consul);
                $fil=mysqli_num_rows($res);
                if ($fil>0){
                    while($a=mysqli_fetch_array($res)){
                        echo "<option Value='".$a['codigo']."'>".$a['descripcion']."</option>";
                    }
                }
            ?>
            </select>
            <input type="submit" Value="Consultar">
            </form>
            
       </h2>
        </section>
        <div class="ola" style="height: 150px; overflow: hidden;" ><svg viewBox="0 0 500 150" preserveAspectRatio="none" 
        style="height: 100%; width: 100%;">
        <path d="M0.00,49.98 C149.99,150.00 349.20,-49.98 500.00,49.98 L500.00,150.00 L0.00,150.00 Z"
         style="stroke: none; fill: #ffffff;"></path></svg></div>
    </header>
    
   
</body>
      </html>

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