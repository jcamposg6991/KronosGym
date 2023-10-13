<?php
if ($_SESSION["Seguridad"] != "5857") {
    echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=inicio\'" />';
    exit();
}
$_SESSION["Seguridad"] = "user";
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
    <title>Kronos │ Cliente - Ver Rutina</title>
</head>
<br>
<a href="./?pag=cliente/cargarRutinas"><button id="action_button">Volver</button></a>
<br><br>
<body>
    <div id="pdf-content" style="background-color: black;">
        <h1 id='datosCliente' style="text-indent: 20px;" style="text-indent: 20px;">Nombre: <?php print $_SESSION["Nombre"].' '.$_SESSION["Apellido1"].' '.$_SESSION["Apellido2"]; ?></h1>
        <h1 id='datosCliente' style="text-indent: 20px;">Fecha de ingreso: <?php print $_SESSION["Fecha_Ingreso"]; ?></h1><br>
            <center><h1>Rutina</h1></center>
        <div id="div_container">
            <div id="table-container">
                <table id="user-table">
                    <thead>
                        <tr>
                            <th>Ejercicio</th>
                            <th>Descripcion</th>
                            <th>Categoria</th>
                            <th>Series</th>
                            <th>Repeticiones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        for ($i = 0; $i < count($dataModel); $i++) {
                            print "<tr>";
                            print "<td class='text-left'>" . $dataModel[$i]["Nombre_Ejercicio_Rutina"] . "</td>";
                            print "<td class='text-left'>" . $dataModel[$i]["Descripcion_Ejercicio_Rutina"] . "</td>";
                            print "<td class='text-left'>" . $dataModel[$i]["Categoria"] . "</td>";
                            print "<td class='text-left'>" . $dataModel[$i]["Series"] . "</td>";
                            print "<td class='text-left'>" . $dataModel[$i]["Repeticiones"] . "</td>";
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
        // Obtener la fecha de rutina
        const fechaRutina = "<?php echo $dataModel[0]['Fecha_Rutina']; ?>";

        // Crear un nuevo objeto HTML2PDF
        const element = document.getElementById('pdf-content');
        const opt = {
            margin:       10,
            filename:     'Rutina_' + fechaRutina + '.pdf',
            image:        { type: 'jpeg', quality: 0.98 },
            html2canvas:  { scale: 1 }, // Ajusta el valor de scale para permitir múltiples páginas
            jsPDF:        { unit: 'mm', format: 'letter', orientation: 'portrait' }
        };

        // Generar el PDF con el contenido HTML del elemento con ID 'pdf-content'
        html2pdf().set(opt).from(element).save();
    }
</script>
</body>

</html>
