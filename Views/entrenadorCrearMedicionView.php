<?php
    if($_SESSION["Seguridad"] != "entrenador"){
        echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=inicio\'" />';
        exit();
    }
	$_SESSION["Seguridad"]="5857";

    $fechaActual = date('d-m-Y');

    function generarCodigoAlfanumerico($longitud) {
        $bytes = random_bytes(($longitud + 1) / 2);
        return substr(bin2hex($bytes), 0, $longitud);
    }
    $idMedicion = generarCodigoAlfanumerico(20);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Kronos │ Entrenador - Asignar Mediciones</title>
    </head>
    <br>
    <center><h2 id="tipo_Perfil">Portal Entrenador</h2></center><br>
	<center><h3 id="nombre_Usuario">Bienvenido <?php echo $_SESSION["Nombre"];?></h3></center><br>
    <a href="./?pag=entrenador"><button id="action_button">Volver</button></a>
    <body>
        <div id="div_container">
            <div id="div_email">
                <form id="form_email" action='./?pag=entrenador/crearMedicion' method="POST">

                    <label>Fecha:</label>
                    <input name="fecha" value="<?php print $fechaActual;?>" readonly><br>

                    <label>Medicion:</label>
                    <input name="medicion" value="<?php print $idMedicion;?>" readonly><br>

                    <label>Usuario</label>
                    <select type="text" name="idUsuario">
                        <option value="" selected>Seleccione un Usuario</option>
                        <?php for ($i=0; $i < count($dataModel); $i++) { echo '<option value="' . $dataModel[$i]['Id_Usuario'] . '">' . $dataModel[$i]['Nombre'] .' '. $dataModel[$i]['Apellido1'] .' ' . $dataModel[$i]['Apellido2'] .'</option>'; } ?>
                    </select><br><br>

                    <label>Estatura (cm):</label>
                    <input type="text" name="estatura"><br>

                    <label>Peso (kg):</label>
                    <input type="text" name="peso"><br>

                    <label>Masa de Musculo Esquelético (kg):</label>
                    <input type="text" name="mme"><br>

                    <label>Masa Grasa Corporal (kg):</label>
                    <input type="text" name="mgc"><br>

                    <label>Indice de Masa Corporal (kg/m2):</label>
                    <input type="text" name="imc"><br>

                    <label>Porcentaje de Grasa Corporal (%):</label>
                    <input type="text" name="pgc"><br>

                    <label>Masa Magra Segmental - Brazo Derecho (kg):</label>
                    <input type="text" name="mms_bd"><br>
                    
                    <label>Masa Magra Segmental - Brazo Izquierdo (kg):</label>
                    <input type="text" name="mms_bi"><br>

                    <label>Masa Magra Segmental - Pierna Derecha (kg):</label>
                    <input type="text" name="mms_pd"><br>

                    <label>Masa Magra Segmental - Pierna Izquierda (kg):</label>
                    <input type="text" name="mms_pi"><br>

                    <label>Masa Magra Segmental - Torso (kg):</label>
                    <input type="text" name="mms_tor"><br>

                    <label>Grasa Segmental - Brazo Derecho (kg):</label>
                    <input type="text" name="gs_bd"><br>
                    
                    <label>Grasa Segmental - Brazo Izquierdo (kg):</label>
                    <input type="text" name="gs_bi"><br>

                    <label>Grasa Segmental - Pierna Derecha (kg):</label>
                    <input type="text" name="gs_pd"><br>

                    <label>Grasa Segmental - Pierna Izquierda (kg):</label>
                    <input type="text" name="gs_pi"><br>

                    <label>Grasa Segmental - Torso (kg):</label>
                    <input type="text" name="gs_tor"><br>

                    <div id="button_container_crearUsuario">
                        <center><button id="button_crearUsuario" type="submit">Agregar Mediciones</button></center>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>