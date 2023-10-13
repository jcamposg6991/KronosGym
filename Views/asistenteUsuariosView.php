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
        <title>Kronos │ Asistente - Usuarios</title>
    </head>
    <body>
        <br>
        <center><h2 id="tipo_Perfil">Portal Asistente</h2></center><br>
	    <center><h3 id="nombre_Usuario">Bienvenido <?php echo $_SESSION["Nombre"];?></h3></center><br>
        <a href="./?pag=asistente"><button id="action_button">Volver</button></a>
        <center><h1>Usuarios</h1></center>
        <div id="div_container">
            <div id="table-container">
                <table id="user-table">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Apellido 1</th>
                            <th>Apellido 2</th>
                            <th>Edad</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Usuario</th>
                            <th>Contraseña</th>
                            <th>Palabra Clave</th>
                            <th>Fecha de Nacimiento</th>
                            <th>Fecha de Ingreso</th>
                            <th>ID Perfil</th>
                            <th>ID Sede</th>
                            <th>Activo</th>
                            <th>Ultimo Cambio</th>
                            <th>Modificar</th>
                            <!--<th>Borrar</th>-->
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i=0; $i < count($dataModel); $i++) { 
                            print "<tr>";
                            print "<td>".$dataModel[$i]["Id_Usuario"]."</td>";
                            print "<td class='text-left'>".$dataModel[$i]["Nombre"]."</td>";
                            print "<td class='text-left'>".$dataModel[$i]["Apellido1"]."</td>";
                            print "<td class='text-left'>".$dataModel[$i]["Apellido2"]."</td>";
                            print "<td class='text-left'>".$dataModel[$i]["Edad"]."</td>";
                            print "<td class='text-left'>".$dataModel[$i]["Telefono"]."</td>";
                            print "<td class='text-left'>".$dataModel[$i]["Correo"]."</td>";
                            print "<td class='text-left'>".$dataModel[$i]["Usuario"]."</td>";
                            print "<td class='text-left'>".$dataModel[$i]["Contrasena"]."</td>";
                            print "<td class='text-left'>".$dataModel[$i]["Palabra_Clave"]."</td>";
                            print "<td class='text-left'>".$dataModel[$i]["Fecha_Nacimiento"]."</td>";
                            print "<td class='text-left'>".$dataModel[$i]["Fecha_Ingreso"]."</td>";
                            print "<td class='text-left'>".$dataModel[$i]["Id_Perfil"]."</td>";
                            print "<td class='text-left'>".$dataModel[$i]["Id_Sede"]."</td>";
                            print "<td class='text-left'>".$dataModel[$i]["Activo"]."</td>";
                            print "<td class='text-left'>".$dataModel[$i]["Ultimo_Cambio"]."</td>";
                            print "<td><a href='./?pag=asistente/modificarUsuario/".$dataModel[$i]["Id_Usuario"]."'><button style=\"background-color: yellow; font-weight: bold;\">Modificar</button></a></td>";
                            /*print "<td><a href='./?pag=asistente/borrarUsuario/".$dataModel[$i]["Id_Usuario"]."'><button style=\"background-color: red; font-weight: bold;\">Borrar</button></a></td>";*/
                            print "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
        <center><a href="./?pag=asistente/crearUsuario"><button style="background-color: green; border: 2px solid green;" id="action_button">Nuevo Usuario</button></a></center>
        <br><br>
    </body>
</html>