<?php
    if(!isset($_SESSION["Seguridad"]) or $_SESSION["Seguridad"] != "5857"){
        echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=inicio\'" />';
        exit();
    }
	$_SESSION["Seguridad"]="entrenador";
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Kronos │ Entrenador</title>
	</head>
	<body>
	<br>
		<center><h2 id="tipo_Perfil">Portal Entrenador</h2></center><br>
		<center><h3 id="nombre_Usuario">Bienvenido <?php echo $_SESSION["Nombre"];?></h3></center><br>
	<!---------------------------------------------------------------- MENU ---------------------------------------------------------------->
		<div id="button_container_perfiles">
			<center><a href="./?pag=entrenador/crearEjercicio"><button>CREAR EJERCICIO</button><br><br></center>
			<center><a href="./?pag=entrenador/crearRutina"><button>ASIGNAR RUTINA</button></a><br><br></center>
			<center><a href="./?pag=entrenador/crearMedicion"><button>ASIGNAR MEDICIONES</button><br><br></center>
			<center><a href="logout.php"><button>SALIR</button></a><br><br></center>
		</div>	
	<!---------------------------------------------------------------- MENU END ---------------------------------------------------------------->

	<br><br>
	</body>
</html>