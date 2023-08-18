<?php
	session_start();
	if(isset($_SESSION['user'])){ //verifica si hay session iniciada
		if($_SESSION['tipo']==3){
			$user=$_SESSION['nombre'];
     		include('libreria.php');
			?>
<html>
<head>      
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>index</title>
    <link rel="stylesheet" href="../estilo/admin.css">
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
            <h1>EXCUSE ME</h1>
            <h2>Bienvenid@ <?php echo $user; ?> <h2>
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
  //ob_end_flush();
  header('refresh: 1 URL=../index.php');
		}
	}
	else{
		echo "<script type='text/javascript'>
  alert('Debe de iniciar session primero!');
</script>";
//ob_end_flush();
header('refresh: 1 URL=../index.php');
	}
?>