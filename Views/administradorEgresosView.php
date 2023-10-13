<?php
    if($_SESSION["Seguridad"] != "5857"){
        echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=inicio\'" />';
        exit();
    }
	$_SESSION["Seguridad"]="admin_user";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kronos │ Administrador - Egresos</title>
    </head>
    <body>
        <br>
        <center><h2 id="tipo_Perfil">Portal Administrador</h2></center><br>
	    <center><h3 id="nombre_Usuario">Bienvenido <?php echo $_SESSION["Nombre"];?></h3></center><br>
        <a href="./?pag=administrador/transacciones"><button id="action_button">Volver</button></a>
        <center><h1>Egresos</h1></center>
        <div id="div_container">
            <div id="table-container">
                <table id="user-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Comprobante</th>
                            <th>Usuario</th>
                            <th>Concepto</th>
                            <th>Metodo de Pago</th>
                            <th>Monto</th>
                            <th>Fecha de Transaccion</th>
                            <th>Ultimo Cambio</th>
                            <th>Modificar</th>
                            <th>Borrar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i=0; $i < count($dataModel); $i++) { 
                            print "<tr>";
                            print "<td>".$dataModel[$i]["Id_Transaccion"]."</td>";
                            print "<td class='text-left'>".$dataModel[$i]["Factura_Comprobante"]."</td>";
                            print "<td class='text-left'>".$dataModel[$i]["Usuario_Proveedor"]."</td>";
                            print "<td class='text-left'>".$dataModel[$i]["Concepto"]."</td>";
                            print "<td class='text-left'>".$dataModel[$i]["Metodo_Pago"]."</td>";
                            print "<td class='text-left'>".'₡ '.$dataModel[$i]["Monto"]."</td>";
                            print "<td class='text-left'>".$dataModel[$i]["Fecha_Transaccion"]."</td>";
                            print "<td class='text-left'>".$dataModel[$i]["Ultimo_Cambio"]."</td>";
                            print "<td><a href='./?pag=administrador/modificarEgreso/".$dataModel[$i]["Id_Transaccion"]."'><button style=\"background-color: yellow; font-weight: bold;\">Modificar</button></a></td>";
                            print "<td><a href='./?pag=administrador/borrarEgreso/".$dataModel[$i]["Id_Transaccion"]."'><button style=\"background-color: red; font-weight: bold;\">Borrar</button></a></td>";
                            print "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <center><a href="./?pag=administrador/crearEgreso"><button style="background-color: green; border: 2px solid green;" id="action_button">Nuevo Egreso</button></a></center>
        <br><br>
    </body>
</html>