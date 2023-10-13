<?php
    if(!isset($_SESSION["Seguridad"]) or $_SESSION["Seguridad"] != "5857"){
        echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=inicio\'" />';
        exit();
    }

	if($_SESSION["Activo"] != "Si"){
		echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=inicio\'" />';
        exit();
	}

	$_SESSION["Seguridad"]="user";
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Kronos │ Cliente</title>
	</head>
	<body>
	<br>
		<center><h2 id="tipo_Perfil">Portal Cliente</h2></center><br>
		<center><h3 id="nombre_Usuario">Bienvenido <?php echo $_SESSION["Nombre"];?></h3></center><br>
	<!---------------------------------------------------------------- MENU ---------------------------------------------------------------->
		<div id="button_container_perfiles">
			<center><a href="./?pag=cliente/cargarCliente"><button>PERFIL</button><br><br></center>
			<center><a href="./?pag=cliente/reportarPago"><button>REPORTAR PAGO</button></a><br><br></center>
			<center><a href="./?pag=cliente/cargarRutinas"><button>RUTINAS</button><br><br></center>
			<center><a href="./?pag=cliente/cargarMediciones"><button>MEDICIONES</button><br><br></center>
			<center><a href="./?pag=cliente/cargarPagos"><button>MIS PAGOS</button><br><br></center>
			<center><a href="./?pag=cliente/cambiarContrasena"><button>CAMBIAR CONTRASEÑA</button><br><br></center>
			<center><a href="./?pag=cliente/cambiarPalabraClave"><button>CAMBIAR PALABRA CLAVE</button><br><br></center>
			<center><a href="logout.php"><button>SALIR</button></a><br><br></center>
		</div>	
	<!---------------------------------------------------------------- MENU END ---------------------------------------------------------------->

	<br><br>
	</body>
</html>