<?php
    if($_SESSION["Seguridad"] != "entrenador"){
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
        <title>Kronos │ Entrenador - Crear Ejercicio</title>
    </head>
    <br>
    <center><h2 id="tipo_Perfil">Portal Entrenador</h2></center><br>
	<center><h3 id="nombre_Usuario">Bienvenido <?php echo $_SESSION["Nombre"];?></h3></center><br>
    <a href="./?pag=entrenador"><button id="action_button">Volver</button></a>
    <body>
        <div id="div_container">
            <div id="div_email">
                <form id="form_email" action='./?pag=entrenador/crearEjercicio' method="POST">
                    <label>Nombre del Ejercicio:</label>
                    <input type="text" name="nombreEjercicio"><br><br>
                    <label>Descripción:</label>
                    <textarea name="descripcionEjercicio" cols="1" rows="10" maxlength="1000"></textarea><br><br>
                    <label>Zona del cuerpo a ejercitar:</label>
                    <option value="" selected>Seleccione una Zona</option>
                    <select type="text" name="zonaEjercicio">
                    <?php for ($i=0; $i < count($dataModel); $i++) { echo '<option value="' . $dataModel[$i]['Id_Zona'] . '">' . $dataModel[$i]['Nombre_Zona'] . '</option>'; } ?>
                    </select><br><br>
                    <label>Musculo a ejercitar:</label>
                    <option value="" selected>Seleccione un Musculo</option>
                    <select type="text" name="musculoEjercicio">
                        <?php for ($i=0; $i < count($dataModel2); $i++) { echo '<option value="' . $dataModel2[$i]['Id_Musculo'] . '">' . $dataModel2[$i]['Nombre_Musculo'] . '</option>'; } ?>
                    </select><br><br>
                    <div id="button_container_crearUsuario">
                        <center><button id="button_crearUsuario"type="submit">Crear Ejercicio</button></center>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>