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
        <title>Kronos │ Cliente - Perfil</title>
    </head>
    <br>
    <center><h2 id="tipo_Perfil">Portal Cliente</h2></center><br>
	<center><h3 id="nombre_Usuario">Bienvenido <?php echo $_SESSION["Nombre"];?></h3></center><br>
    <a href="./?pag=cliente"><button id="action_button">Volver</button></a>
    <body>
        <div id="div_container">
            <div id="div_crearUsuario">
                <form id="form_crearUsuario" method="POST">
                    <label>Id:</label>
                    <input type="text" name="id_usuario" value="<?php print $dataModel["id_usuario"];?>" readonly><br><br>
                    <label>Nombre:</label>
                    <input type="text" name="nombre" value="<?php print $dataModel["nombre"];?>" readonly><br><br>
                    <label>Primer Apellido:</label>
                    <input type="text" name="apellido1" value="<?php print $dataModel["apellido1"];?>" readonly><br><br>
                    <label>Segundo Apellido:</label>
                    <input type="text" name="apellido2" value="<?php print $dataModel["apellido2"];?>" readonly><br><br>
                    <label>Edad:</label>
                    <input type="text" name="edad" value="<?php print $dataModel["edad"];?>" readonly><br><br>
                    <label>Telefono:</label>
                    <input type="text" name="telefono" value="<?php print $dataModel["telefono"];?>" readonly><br><br>
                    <label>Correo:</label>
                    <input type="email" name="email" value="<?php print $dataModel["email"];?>" readonly><br><br>
                    <label>Usuario:</label>
                    <input type="text" name="usuario" value="<?php print $dataModel["usuario"];?>" readonly><br><br>
                    <label>Contraseña:</label>
                    <input type="text" name="contrasena" value="<?php print $dataModel["contrasena"];?>" readonly><br><br>
                    <label>Palabra Clave:</label>
                    <input type="text" name="palabraClave" value="<?php print $dataModel["palabraClave"];?>" readonly><br><br>
                    <label>Fecha de Nacimiento:</label>
                    <input type="text" name="fechaNacimiento" value="<?php print $dataModel["fechaNacimiento"];?>" readonly><br><br>
                    <label>Fecha de Ingreso:</label>
                    <input type="text" name="fechaIngreso" value="<?php print $dataModel["fechaIngreso"];?>" readonly><br><br>
                    <label>Perfil:</label>
                    <input type="text" name="perfil" value="<?php print $dataModel["perfil"];?>" readonly><br><br>
                    <label>Sede:</label>
                    <input type="text" name="sede" value="<?php print $dataModel["sede"];?>" readonly><br><br>
                    <label>Activo:</label>
                    <input type="text" name="activo" value="<?php print $dataModel["activo"];?>" readonly><br><br>
                </form>
            </div>
        </div>
    </body>
</html>