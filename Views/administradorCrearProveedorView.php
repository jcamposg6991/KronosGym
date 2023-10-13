<?php
    if($_SESSION["Seguridad"] != "5857"){
        echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=inicio\'" />';
        exit();
    }
	$_SESSION["Seguridad"]="admin_user";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kronos │ Administrador - Crear Proveedor</title>
    </head>
    <br>
    <center><h2 id="tipo_Perfil">Portal Administrador</h2></center><br>
	<center><h3 id="nombre_Usuario">Bienvenido <?php echo $_SESSION["Nombre"];?></h3></center><br>
    <a href="./?pag=administrador/proveedores"><button id="action_button">Volver</button></a>
    <body>
        <div id="div_container">
            <div id="div_crearUsuario">
                <form id="form_crearUsuario" action='./?pag=administrador/crearProveedor' method="POST">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" required><br><br>
                    <label>Cédula:</label>
                    <input type="number" name="cedula" required><br><br>
                    <label>Telefono:</label>
                    <input type="number" name="telefono" required><br><br>
                    <label>Correo:</label>
                    <input type="email" name="email" required><br><br>
                    <label>Dirección:</label>
                    <input type="text" name="direccion" required><br><br>
                    <div id="button_container_crearUsuario">
                        <center><button id="button_crearUsuario"type="submit">Crear Proveedor</button></center>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>