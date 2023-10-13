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
        <title>Kronos │ Asistente - Crear usuario</title>
    </head>
    <br>
    <center><h2 id="tipo_Perfil">Portal Asistente</h2></center><br>
	<center><h3 id="nombre_Usuario">Bienvenido <?php echo $_SESSION["Nombre"];?></h3></center><br>
    <a href="./?pag=asistente/usuarios"><button id="action_button">Volver</button></a>
    <body>
        <div id="div_container">
            <div id="div_crearUsuario">
                <form id="form_crearUsuario" action='./?pag=asistente/crearUsuario' method="POST">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" required><br><br>
                    <label>Primer Apellido:</label>
                    <input type="text" name="apellido1" required><br><br>
                    <label>Segundo Apellido:</label>
                    <input type="text" name="apellido2" required><br><br>
                    <label>Edad:</label>
                    <input type="number" name="edad" required><br><br>
                    <label>Telefono:</label>
                    <input type="number" name="telefono" required><br><br>
                    <label>Correo:</label>
                    <input type="email" name="email" required><br><br>
                    <label>Usuario:</label>
                    <input type="text" name="usuario" required><br><br>
                    <label>Contraseña:</label>
                    <input type="text" name="contrasena" value="1234" readonly><br><br>
                    <label>Palabra Clave:</label>
                    <input type="text" name="palabraClave" value="kronos" readonly><br><br>
                    <label>Fecha de Nacimiento:</label>
                    <input type="date" name="fechaNacimiento" required><br><br>
                    <label>Fecha de Ingreso:</label>
                    <input type="date" name="fechaIngreso" required><br><br>
                    <label>Perfil:</label>
                    <select type="text" name="perfil" required>
                    <option value="" disabled selected>Seleccione un Perfil</option>
                    <?php for ($i=0; $i < count($dataModel2); $i++) { echo '<option value="' . $dataModel2[$i]['Id_Perfil'] . '">' . $dataModel2[$i]['Tipo_Perfil'] . '</option>'; } ?>
                    </select><br><br>
                    <label>Sede:</label>
                    <select type="text" name="sede" required>
                    <option value="" disabled selected>Seleccione una Sede</option>
                    <?php for ($i=0; $i < count($dataModel); $i++) { echo '<option value="' . $dataModel[$i]['Id_Sede'] . '">' . $dataModel[$i]['Nombre_Sede'] . '</option>'; } ?>
                    </select><br><br>
                    <label>Activo:</label>
                    <select name="activo" required>
                    <option value="" disabled selected>Seleccione un Status</option>
                    <option value="Si">Si</option>
                    <option value="No">No</option>
                    </select><br><br>
                    <div id="button_container_crearUsuario">
                        <center><button id="button_crearUsuario"type="submit">Crear Usuario</button></center>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>