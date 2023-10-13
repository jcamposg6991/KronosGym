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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
        <title>Kronos │ Cliente - Mediciones</title>
    </head>
    <br>
    <a href="./?pag=cliente"><button id="action_button">Volver</button></a>
    <br><br>
    <body>
        <div id="pdf-content" style="background-color: black;">
        <h1 id='datosCliente' style="text-indent: 20px;" style="text-indent: 20px;">Nombre: <?php print $_SESSION["Nombre"].' '.$_SESSION["Apellido1"].' '.$_SESSION["Apellido2"]; ?></h1>
        <h1 id='datosCliente' style="text-indent: 20px;">Edad: <?php print $_SESSION["Edad"]; ?></h1>
        <h1 id='datosCliente' style="text-indent: 20px;">Estatura: <?php print $dataModel[0]["Estatura_cm"]; ?></h1>
        <h1 id='datosCliente' style="text-indent: 20px;">Fecha de nacimiento: <?php print $_SESSION["Fecha_Nacimiento"]; ?></h1>
        <h1 id='datosCliente' style="text-indent: 20px;">Fecha de ingreso: <?php print $_SESSION["Fecha_Ingreso"]; ?></h1><br>
            <center><h1>Mediciones</h1></center>
            <div id="div_container">
                <div id="table-container">
                    <table id="user-table">
                        <thead>
                            <tr>
                                <th>Peso</th>
                                <th>MGC</th>
                                <th>IMC</th>
                                <th>MM-BD</th>
                                <th>MM-BI</th>
                                <th>MM-PD</th>
                                <th>MM-PI</th>
                                <th>MM-T</th>
                                <th>G-BD</th>
                                <th>G-BI</th>
                                <th>G-PD</th>
                                <th>G-PI</th>
                                <th>G-T</th>
                                <th>Fecha</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            for ($i=0; $i < count($dataModel); $i++) { 
                                print "<tr>";
                                print "<td class='text-left'>".$dataModel[$i]["Peso_kg"]." kg</td>";
                                print "<td class='text-left'>".$dataModel[$i]["MGC_kg"]." kg</td>";
                                print "<td class='text-left'>".$dataModel[$i]["IMC_kg_m2"]." kg/m2</td>";
                                print "<td class='text-left'>".$dataModel[$i]["MMS_BD_kg"]." kg</td>";
                                print "<td class='text-left'>".$dataModel[$i]["MMS_BI_kg"]." kg</td>";
                                print "<td class='text-left'>".$dataModel[$i]["MMS_PD_kg"]." kg</td>";
                                print "<td class='text-left'>".$dataModel[$i]["MMS_PI_kg"]." kg</td>";
                                print "<td class='text-left'>".$dataModel[$i]["MMS_TOR_kg"]." kg</td>";
                                print "<td class='text-left'>".$dataModel[$i]["GS_BD_kg"]." kg</td>";
                                print "<td class='text-left'>".$dataModel[$i]["GS_BI_kg"]." kg</td>";
                                print "<td class='text-left'>".$dataModel[$i]["GS_PD_kg"]." kg</td>";
                                print "<td class='text-left'>".$dataModel[$i]["GS_PI_kg"]." kg</td>";
                                print "<td class='text-left'>".$dataModel[$i]["GS_TOR_kg"]." kg</td>";
                                print "<td class='text-left'>".$dataModel[$i]["Fecha"]."</td>";
                                print "</tr>";
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div id="button_container_crearUsuario">
            <center>
                <button id="button_crearUsuario" onclick="generatePDF()">Descargar PDF</button>
            </center>
        </div>
    <script>
        function generatePDF() {
            // Crear un nuevo objeto HTML2PDF
            const element = document.getElementById('pdf-content');
            const opt = {
                margin:       10,
                filename:     'Mediciones.pdf',
                image:        { type: 'jpeg', quality: 0.98 },
                html2canvas:  { scale: 2 },
                jsPDF:        { unit: 'mm', format: 'letter', orientation: 'landscape' }
            };

            // Generar el PDF con el contenido HTML del elemento con ID 'pdf-content'
            html2pdf().set(opt).from(element).save();
        }
    </script>
    </body>
</html>