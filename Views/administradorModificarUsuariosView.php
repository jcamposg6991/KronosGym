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
        <title>Kronos │ Administrador - Modificar usuario</title>
    </head>
    <br>
    <center><h2 id="tipo_Perfil">Portal Administrador</h2></center><br>
	<center><h3 id="nombre_Usuario">Bienvenido <?php echo $_SESSION["Nombre"];?></h3></center><br>
    <a href="./?pag=administrador/usuarios"><button id="action_button">Volver</button></a>
    <body>
        <div id="div_container">
            <div id="div_crearUsuario">
                <form id="form_crearUsuario" action='./?pag=administrador/modificarUsuario' method="POST">
                    <label>Id:</label>
                    <input type="text" name="id_usuario" value="<?php print $dataModel["id_usuario"];?>" readonly><br><br>
                    <label>Nombre:</label>
                    <input type="text" name="nombre" value="<?php print $dataModel["nombre"];?>"><br><br>
                    <label>Primer Apellido:</label>
                    <input type="text" name="apellido1" value="<?php print $dataModel["apellido1"];?>"><br><br>
                    <label>Segundo Apellido:</label>
                    <input type="text" name="apellido2" value="<?php print $dataModel["apellido2"];?>"><br><br>
                    <label>Edad:</label>
                    <input type="number" name="edad" value="<?php print $dataModel["edad"];?>"><br><br>
                    <label>Telefono:</label>
                    <input type="number" name="telefono" value="<?php print $dataModel["telefono"];?>"><br><br>
                    <label>Correo:</label>
                    <input type="email" name="email" value="<?php print $dataModel["email"];?>"><br><br>
                    <label>Usuario:</label>
                    <input type="text" name="usuario" value="<?php print $dataModel["usuario"];?>"><br><br>
                    <label>Contraseña:</label>
                    <input type="text" name="contrasena" value="<?php print $dataModel["contrasena"];?>"><br><br>
                    <label>Palabra Clave:</label>
                    <input type="text" name="palabraClave" value="<?php print $dataModel["palabraClave"];?>"><br><br>
                    <label>Fecha de Nacimiento:</label>
                    <input type="date" name="fechaNacimiento" value="<?php print $dataModel["fechaNacimiento"];?>"><br><br>
                    <label>Fecha de Ingreso:</label>
                    <input type="date" name="fechaIngreso" value="<?php print $dataModel["fechaIngreso"];?>"><br><br>
                    <label>Perfil:</label>
                    <input type="text" name="perfil" value="<?php print $dataModel["perfil"];?>" readonly><br><br>
                    <label>Sede:</label>
                    <input type="text" name="sede" value="<?php print $dataModel["sede"];?>" readonly><br><br>
                    <label>Activo:</label>
                    <input type="text" name="activo" value="<?php print $dataModel["activo"];?>"><br><br>
                    <div id="button_container_crearUsuario">
                        <center><button id="button_crearUsuario"type="submit">Modificar Usuario</button></center>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>