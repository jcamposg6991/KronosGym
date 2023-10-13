<?php
    if(!isset($_SESSION["Seguridad"]) or $_SESSION["Seguridad"] != "5857"){
        echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=inicio\'" />';
        exit();
    }
	$_SESSION["Seguridad"]="admin_user";
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Kronos │ Administrador</title>
	</head>
	<body>
	<br>
		<center><h2 id="tipo_Perfil">Portal Administrador</h2></center><br>
		<center><h3 id="nombre_Usuario">Bienvenido <?php echo $_SESSION["Nombre"];?></h3></center><br>
	<!---------------------------------------------------------------- MENU ---------------------------------------------------------------->
		<div id="button_container_perfiles">
			<center><a href="./?pag=administrador/usuarios"><button>USUARIOS</button></a><br><br></center>
			<center><a href="./?pag=administrador/proveedores"><button>PROVEEDORES</button><br><br></center>
			<center><a href="./?pag=administrador/transacciones"><button>TRANSACCIONES</button><br><br></center>
			<center><a href="./?pag=administrador/reportes"><button>REPORTES</button><br><br></center>
			<center><a href="logout.php"><button>SALIR</button></a><br><br></center>
		</div>	
	<!---------------------------------------------------------------- MENU END ---------------------------------------------------------------->

	<br><br>
	</body>
</html>