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
        <title>Kronos │ Cliente - Reportar Pago</title>
    </head>
    <br>
    <center><h2 id="tipo_Perfil">Portal Cliente</h2></center><br>
	<center><h3 id="nombre_Usuario">Bienvenido <?php echo $_SESSION["Nombre"];?></h3></center><br>
    <a href="./?pag=cliente"><button id="action_button">Volver</button></a>
    <body>
        <div id="div_container">
            <div id="div_crearUsuario">
                <form id="form_crearUsuario" method="POST" action="https://formspree.io/f/meqbjybn" method="POST" enctype="multipart/form-data">
                    <label>Nombre:</label>
                    <input type="text" name="nombre" value="<?php print $_SESSION["Nombre"] . " " . $_SESSION["Apellido1"] . " " . $_SESSION["Apellido2"]; ?>" readonly><br><br>
                    <label>Email:</label>
                    <input type="email" name="email" value="<?php  print $_SESSION["Email"];?>" readonly><br><br>
                    <label>Telefono:</label>
                    <input type="text" name="telefono" value="<?php print $_SESSION["Telefono"];?>" readonly><br><br>
                    <label>Id Usuario:</label>
                    <input type="text" name="usuario" value="<?php print $_SESSION["Id_Usuario"];?>" readonly><br><br>
                    <label>Pago de:</label>
                    <input type="text" name="pago" placeholder="Indique de que es su pago - Ej: Mensualidad Enero"><br><br>
                    <label>Adjunte el pago:</label>
                    <input type="file" name="upload"><br><br>
                    <div id="button_container_crearUsuario">
                        <center><button id="button_crearUsuario"type="submit">Reportar Pago</button></center>
                    </div>
                    <br><br><br>
                </form>
            </div>
        </div>
    </body>
</html>