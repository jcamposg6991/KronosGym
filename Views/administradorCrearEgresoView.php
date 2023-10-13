<?php
    if($_SESSION["Seguridad"] != "admin_user"){
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
        <title>Kronos │ Administrador - Crear Egreso</title>
    </head>
    <br>
    <center><h2 id="tipo_Perfil">Portal Administrador</h2></center><br>
	<center><h3 id="nombre_Usuario">Bienvenido <?php echo $_SESSION["Nombre"];?></h3></center><br>
    <a href="./?pag=administrador/egresos"><button id="action_button">Volver</button></a>
    <body>
        <div id="div_container">
            <div id="div_crearUsuario">
                <form id="form_crearUsuario" action='./?pag=administrador/crearEgreso' method="POST">
                    <label>Comprobante:</label>
                    <input type="text" name="factura" required><br><br>
                    <label>Proveedor</label>
                    <select type="text" name="idProveedor">
                        <option value="" disabled selected>Seleccione un Proveedor</option>
                        <?php for ($i=0; $i < count($dataModel); $i++) { echo '<option value="' . $dataModel[$i]['Id_Proveedor'] . '">' . $dataModel[$i]['Nombre_Proveedor'] .'</option>'; } ?>
                    </select><br><br>
                    <label>Concepto:</label>
                    <input type="text" name="concepto" required><br><br>
                    <label>Metodo de Pago:</label>
                    <select type="text" name="metodoPago" required>
                        <option value="" disabled selected>Seleccione un Metodo de Pago</option>
                        <option value="Tarjeta">Tarjeta</option>
                        <option value="Transferencia">Transferencia</option>
                        <option value="SinpeMovil">SinpeMovil</option>
                        <option value="Efectivo">Efectivo</option>
                    </select><br><br>
                    <label>Monto:</label>
                    <input type="number" step="0.01"  name="monto" required><br><br>
                    <label>Fecha:</label>
                    <input type="date" name="fecha" required><br><br>
                    <div id="button_container_crearUsuario">
                        <center><button id="button_crearUsuario"type="submit">Crear Egreso</button></center>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>