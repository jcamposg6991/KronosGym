<?php
    if($_SESSION["Seguridad"] != "5857"){
        echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=inicio\'" />';
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kronos │ Recuperar Contraseña</title>
    </head>
    <br>
    <body>
        <div id="div_container">
            <div id="div_email">
                <form id="form_email" action='./?pag=cliente/validacionCambiarContrasena' method="POST">
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