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
        <title>Kronos │ Asistente - Borrar Proveedor</title>
        <script>
        function confirmarBorrado() {
            var confirmacion = confirm("¿Realmente desea borrar el proveedor?");
            if (confirmacion) {
                document.getElementById('form_crearUsuario').submit();
            }
        }
        </script>
    </head>
    <br>
    <center><h2 id="tipo_Perfil">Portal Asistente</h2></center><br>
	<center><h3 id="nombre_Usuario">Bienvenido <?php echo $_SESSION["Nombre"];?></h3></center><br>
    <a href="./?pag=asistente/proveedores"><button id="action_button">Volver</button></a>
    <body>
        <div id="div_container">
            <div id="div_crearUsuario">
                <form id="form_crearUsuario" action='./?pag=asistente/borrarProveedor' method="POST">
                    <label>Id:</label>
                    <input type="text" name="id_proveedor" value="<?php print $dataModel["id_proveedor"];?>" readonly><br><br>
                    <label>Nombre:</label>
                    <input type="text" name="nombre" value="<?php print $dataModel["nombre"];?>" readonly><br><br>
                    <label>Cédula:</label>
                    <input type="number" name="cedula" value="<?php print $dataModel["cedula"];?>" readonly><br><br>
                    <label>Teléfono:</label>
                    <input type="number" name="telefono" value="<?php print $dataModel["telefono"];?>" readonly><br><br>
                    <label>Correo:</label>
                    <input type="email" name="email" value="<?php print $dataModel["email"];?>" readonly><br><br>
                    <label>Dirección:</label>
                    <input type="text" name="direccion" value="<?php print $dataModel["direccion"];?>" readonly><br>
                    <div id="button_container_crearUsuario">
                        <center><button id="button_crearUsuario" type="button" onclick="confirmarBorrado()">Borrar Proveedor</button></center>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>