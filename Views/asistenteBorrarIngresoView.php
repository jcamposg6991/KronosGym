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
        <title>Kronos │ Asistente - Borrar Ingreso</title>
        <script>
        function confirmarBorrado() {
            var confirmacion = confirm("¿Realmente desea borrar el ingreso?");
            if (confirmacion) {
                document.getElementById('form_crearUsuario').submit();
            }
        }
        </script>
    </head>
    <br>
    <center><h2 id="tipo_Perfil">Portal Asistente</h2></center><br>
	<center><h3 id="nombre_Usuario">Bienvenido <?php echo $_SESSION["Nombre"];?></h3></center><br>
    <a href="./?pag=asistente/ingresos"><button id="action_button">Volver</button></a>
    <body>
        <div id="div_container">
            <div id="div_crearUsuario">
                <form id="form_crearUsuario" action='./?pag=asistente/borrarIngreso' method="POST">
                    <label>Id:</label>
                    <input type="text" name="idTransaccion" value="<?php print $dataModel[0]["Id_Transaccion"];?>" readonly><br><br>
                    <label>Comprobante:</label>
                    <input type="text" name="factura" value="<?php print $dataModel[0]["Factura_Comprobante"];?>" readonly><br><br>
                    <label>Usuario</label>
                    <input type="text" name="idUsuario" value="<?php print $dataModel[0]["Usuario_Proveedor"];?>" readonly><br><br>
                    <label>Concepto:</label>
                    <input type="text" name="concepto" value="<?php print $dataModel[0]["Concepto"];?>" readonly><br><br>
                    <label>Metodo de Pago:</label>
                    <input type="text" name="metodoPago" value="<?php print $dataModel[0]["Metodo_Pago"];?>" readonly><br><br>
                    <label>Monto:</label>
                    <input type="number" step="0.01"  name="monto" value="<?php print $dataModel[0]["Monto"];?>" readonly><br><br>
                    <label>Fecha:</label>
                    <input type="date" name="fecha" value="<?php print $dataModel[0]["Fecha_Transaccion"];?>" readonly><br><br>
                    <div id="button_container_crearUsuario">
                        <center><button id="button_crearUsuario" type="button" onclick="confirmarBorrado()">Borrar Ingreso</button></center>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>