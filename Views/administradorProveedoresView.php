<?php
    if($_SESSION["Seguridad"] != "admin_user"){
        echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=inicio\'" />';
        exit();
    }
	$_SESSION["Seguridad"]="5857";
?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Kronos │ Administrador - Proveedores</title>
    </head>
    <body>
        <br>
        <center><h2 id="tipo_Perfil">Portal Administrador</h2></center><br>
	    <center><h3 id="nombre_Usuario">Bienvenido <?php echo $_SESSION["Nombre"];?></h3></center><br>
        <a href="./?pag=administrador"><button id="action_button">Volver</button></a>
        <center><h1>Proveedores</h1></center>
        <div id="div_container">
            <div id="table-container">
                <table id="user-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Cédula</th>
                            <th>Telefono</th>
                            <th>Correo</th>
                            <th>Dirección</th>
                            <th>Ultimo Cambio</th>
                            <th>Modificar</th>
                            <th>Borrar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i=0; $i < count($dataModel); $i++) { 
                            print "<tr>";
                            print "<td>".$dataModel[$i]["Id_Proveedor"]."</td>";
                            print "<td class='text-left'>".$dataModel[$i]["Nombre_Proveedor"]."</td>";
                            print "<td class='text-left'>".$dataModel[$i]["Cedula"]."</td>";
                            print "<td class='text-left'>".$dataModel[$i]["Telefono"]."</td>";
                            print "<td class='text-left'>".$dataModel[$i]["Correo"]."</td>";
                            print "<td class='text-left'>".$dataModel[$i]["Direccion"]."</td>";
                            print "<td class='text-left'>".$dataModel[$i]["Ultimo_Cambio"]."</td>";
                            print "<td><a href='./?pag=administrador/modificarProveedor/".$dataModel[$i]["Id_Proveedor"]."'><button style=\"background-color: yellow; font-weight: bold;\">Modificar</button></a></td>";
                            print "<td><a href='./?pag=administrador/borrarProveedor/".$dataModel[$i]["Id_Proveedor"]."'><button style=\"background-color: red; font-weight: bold;\">Borrar</button></a></td>";
                            print "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <center><a href="./?pag=administrador/crearProveedor"><button style="background-color: green; border: 2px solid green;" id="action_button">Nuevo Proveedor</button></a></center>
        <br><br>
    </body>
</html>