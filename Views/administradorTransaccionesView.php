<?php
    if($_SESSION["Seguridad"] != "admin_user"){
        echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=inicio\'" />';
        exit();
    }
	$_SESSION["Seguridad"]="5857";
?>

<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Kronos │ Administrador - Transacciones</title>
	</head>
	<body>
	<br>
	<center><h2 id="tipo_Perfil">Portal Administrador</h2></center><br>
	<center><h3 id="nombre_Usuario">Bienvenido <?php echo $_SESSION["Nombre"];?></h3></center><br>
    <a href="./?pag=administrador"><button id="action_button">Volver</button></a>
		<div id="button_container_perfiles">
			<center><a href="./?pag=administrador/ingresos"><button>INGRESOS</button></a><br><br></center>
			<center><a href="./?pag=administrador/egresos"><button>EGRESOS</button></a><br><br></center>
		</div>	
	<br><br>
	</body>
</html>