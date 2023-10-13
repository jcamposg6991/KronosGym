<?php
    if($_SESSION["Seguridad"] != "user"){
        echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=inicio\'" />';
        exit();
    }
	$_SESSION["Seguridad"]="5857";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kronos │ Cliente - Cambiar Contraseña</title>
    </head>
    <br>
    <center><h2 id="tipo_Perfil">Portal Cliente</h2></center><br>
	<center><h3 id="nombre_Usuario">Bienvenido <?php echo $_SESSION["Nombre"];?></h3></center><br>
    <a href="./?pag=cliente"><button id="action_button">Volver</button></a>
    <body>
        <div id="div_container">
            <div id="div_email">
                <form id="form_email" action='./?pag=cliente/cambiarContrasena' method="POST">
                    <label>Nueva Contraseña:</label>
                    <input type="text" name="nuevaContrasena"><br><br>
                    <div id="button_container_crearUsuario">
                        <center><button id="button_crearUsuario"type="submit">Cambiar Contraseña</button></center>
                    </div>
                    <br><br><br>
                </form>
            </div>
        </div>
    </body>
</html>