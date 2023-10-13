<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kronos │ Validacion</title>
    </head>
    <br>
    <a href="./?pag=login"><button id="action_button">Volver</button></a>
    <body>
        <div id="div_container">
            <div id="div_email">
                <form id="form_email" action='./?pag=cliente/validarCambiarContrasena' method="POST">
                    <label>Email:</label>
                    <input type="text" name="validarEmail"><br><br>
                    <label>Palabra Clave:</label>
                    <input type="text" name="validarPalabraClave"><br><br>
                    <div id="button_container_crearUsuario">
                        <center><button id="button_crearUsuario"type="submit">Validar</button></center>
                    </div>
                    <br><br><br>
                </form>
            </div>
        </div>
    </body>
</html>