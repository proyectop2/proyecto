<?php
function conectar(){
$servidor="localhost";
$user="root";
$clave="";
$db="faltas"; //Nombre de la base de datos
$con=mysqli_connect($servidor,$user,$clave,$db)or die("Error al conectar".mysqli_error());
return $con;
}

function barra_admin($usuar){
    ?>
    <table width=100% class="TabEncas">
    <tr>
        <td width="5%">
        <td width="80%"><center><h1>EXCUSE ME <h1>
        <h3>Usuario:<?php echo $usuar; ?> <h3></center></td>
        <td width="5%"><img src="../imagen/escudo.jpg" width="80 px"></td>
    </tr>
    </table>

    <NAV class="navbar ">
        <div>
            <ul class="nav">
                <li><a href="../index.php">Inicio</a></li>
                <li><a href="#contenidos">Contenidos</a>
                <ul>
                    <li><a href="mostrarusuarios.php"> usuarios</a></li>
                    <li><a href="mostrarestudiantes.php"> estudiantes</a></li>
                    <li><a href="excusa.php">excusas</a></li>
                    <li><a href="faltas.php">faltas</a></li>
                </ul>

                </li>
                <li><a href="salir.php">Salir</a> </li>
            </ul>
            
        </div><br>
    </NAV><br>

    <?php
}

?>

