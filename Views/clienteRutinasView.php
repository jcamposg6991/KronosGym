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
        <title>Kronos │ Cliente - Rutinas</title>
    </head>
    <br>
    <center><h2 id="tipo_Perfil">Portal Cliente</h2></center><br>
	<center><h3 id="nombre_Usuario">Bienvenido <?php echo $_SESSION["Nombre"];?></h3></center><br>
    <a href="./?pag=cliente"><button id="action_button">Volver</button></a>
    <body>
    <center><h1>Rutinas</h1></center>
        <div id="div_container">
            <div id="table-container">
                <table id="user-table">
                    <thead>
                        <tr>
                            <th>Id_Rutina</th>
                            <th>Fecha</th>
                            <th>Acción</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i=0; $i < count($dataModel); $i++) { 
                            print "<tr>";
                            print "<td class='text-left'>".$dataModel[$i]["Id_Rutina"]."</td>";
                            print "<td class='text-left'>".$dataModel[$i]["Fecha_Rutina"]."</td>";
                            print "<td><a href='./?pag=cliente/verRutina/".$dataModel[$i]["Id_Rutina"]."'><button>Ver</button></a></td>";
                            print "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </body>
</html>