<?php
if ($_SESSION["Seguridad"] != "5857") {
    echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=inicio\'" />';
    exit();
}
$_SESSION["Seguridad"] = "admin_user";
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
    <title>Kronos │ Administrador - Reporte Usuarios</title>
</head>
<body>
<br>
<center><h2 id="tipo_Perfil">Portal Administrador</h2></center><br>
<center><h3 id="nombre_Usuario">Bienvenido <?php echo $_SESSION["Nombre"]; ?></h3></center><br>
<a href="./?pag=administrador/reportes"><button id="action_button">Volver</button></a>
<div id="div_container">
    <div id="div_email">
        <form id="form_email">
            <div id="filter-container">
                <label for="activo-filter">Filtrar por Activo:</label>
                <select id="activo-filter">
                    <option value="all">Todos</option>
                    <option value="si">Sí</option>
                    <option value="no">No</option>
                </select>
                <label for="usuario-filter">Filtrar por Usuario:</label>
                <input type="text" id="usuario-filter">
                <label for="fecha-nacimiento-filter">Filtrar por Fecha de Nacimiento:</label>
                <input type="date" id="fecha-nacimiento-filter">
                <label for="fecha-ingreso-filter">Filtrar por Fecha de Ingreso:</label>
                <input type="date" id="fecha-ingreso-filter">
                <label for="ultimo-cambio-filter">Filtrar por Último Cambio:</label>
                <input type="text" id="ultimo-cambio-filter">
                <label for="id-perfil-filter">Filtrar por Tipo de Perfil:</label>
                <select id="id-perfil-filter">
                    <option value="all">Todos</option>
                    <option value="Administrador">Administrador</option>
                    <option value="Asistente">Asistente</option>
                    <option value="Entrenador">Entrenador</option>
                    <option value="Cliente">Cliente</option>
                </select>
            </div>
        </form>
    </div>
</div>
<center><button id="action_button" style="background-color: green; border: 2px solid green;" onclick="applyFilters()">Aplicar Filtros</button></center><br>

<center><button id="action_button" onclick="clearFilters()">Limpiar Filtros</button></center><br><br>
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
                <th>Perfil</th>
                <th>Sede</th>
                <th>Activo</th>
                <th>Ultimo Cambio</th>
            </tr>
            </thead>
            <tbody>
            <?php
            for ($i = 0; $i < count($dataModel); $i++) {
                print "<tr>";
                print "<td>" . $dataModel[$i]["Id_Usuario"] . "</td>";
                print "<td class='text-left'>" . $dataModel[$i]["Nombre"] . "</td>";
                print "<td class='text-left'>" . $dataModel[$i]["Apellido1"] . "</td>";
                print "<td class='text-left'>" . $dataModel[$i]["Apellido2"] . "</td>";
                print "<td class='text-left'>" . $dataModel[$i]["Edad"] . "</td>";
                print "<td class='text-left'>" . $dataModel[$i]["Telefono"] . "</td>";
                print "<td class='text-left'>" . $dataModel[$i]["Correo"] . "</td>";
                print "<td class='text-left'>" . $dataModel[$i]["Usuario"] . "</td>";
                print "<td class='text-left'>" . $dataModel[$i]["Contrasena"] . "</td>";
                print "<td class='text-left'>" . $dataModel[$i]["Palabra_Clave"] . "</td>";
                print "<td class='text-left'>" . $dataModel[$i]["Fecha_Nacimiento"] . "</td>";
                print "<td class='text-left'>" . $dataModel[$i]["Fecha_Ingreso"] . "</td>";
                print "<td class='text-left'>" . $dataModel[$i]["Tipo_Perfil"] . "</td>";
                print "<td class='text-left'>" . $dataModel[$i]["Nombre_Sede"] . "</td>";
                print "<td class='text-left'>" . $dataModel[$i]["Activo"] . "</td>";
                print "<td class='text-left'>" . $dataModel[$i]["Ultimo_Cambio"] . "</td>";
                print "</tr>";
            }
            ?>
            </tbody>
        </table>
    </div>
</div>
<center><button id="action_button" style="background-color: green; border: 2px solid green;" onclick="generateExcel()">Descarga Excel</button></center>
<br><br>
<script>
    function generateExcel() {
        // Crear un nuevo libro de trabajo (Workbook) y una hoja de cálculo (Worksheet)
        const workbook = XLSX.utils.book_new();
        const worksheet = XLSX.utils.table_to_sheet(document.getElementById('user-table'));

        // Agregar la hoja de cálculo al libro de trabajo
        XLSX.utils.book_append_sheet(workbook, worksheet, 'Usuarios');

        // Generar el archivo xlsx
        const xlsxBuffer = XLSX.write(workbook, { bookType: 'xlsx', type: 'array' });

        // Convertir el buffer a un objeto Blob
        const blob = new Blob([xlsxBuffer], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });

        // Crear un enlace para descargar el archivo
        const a = document.createElement('a');
        a.href = URL.createObjectURL(blob);
        a.download = 'Usuarios.xlsx';

        // Agregar el enlace al documento y simular un clic en el enlace para iniciar la descarga
        document.body.appendChild(a);
        a.click();

        // Remover el enlace del documento
        document.body.removeChild(a);
    }

    function applyFilters() {
        const activoFilter = document.getElementById('activo-filter').value;
        const usuarioFilter = document.getElementById('usuario-filter').value.toLowerCase();
        const fechaNacimientoFilter = document.getElementById('fecha-nacimiento-filter').value;
        const fechaIngresoFilter = document.getElementById('fecha-ingreso-filter').value;
        const ultimoCambioFilter = document.getElementById('ultimo-cambio-filter').value;
        const idPerfilFilter = document.getElementById('id-perfil-filter').value;

        const tableRows = document.querySelectorAll('#user-table tbody tr');

        tableRows.forEach(row => {
            const activoCell = row.querySelector('td:nth-child(15)');
            const usuarioCell = row.querySelector('td:nth-child(8)');
            const fechaNacimientoCell = row.querySelector('td:nth-child(11)');
            const fechaIngresoCell = row.querySelector('td:nth-child(12)');
            const ultimoCambioCell = row.querySelector('td:nth-child(16)');
            const idPerfilCell = row.querySelector('td:nth-child(13)');

            const activoValue = activoCell.textContent.trim().toLowerCase();
            const usuarioValue = usuarioCell.textContent.trim().toLowerCase();
            const fechaNacimientoValue = fechaNacimientoCell.textContent.trim();
            const fechaIngresoValue = fechaIngresoCell.textContent.trim();
            const ultimoCambioValue = ultimoCambioCell.textContent.trim();
            const idPerfilValue = idPerfilCell.textContent.trim();

            const showRow =
                (activoFilter === 'all' || activoValue === activoFilter) &&
                (usuarioValue.includes(usuarioFilter)) &&
                (fechaNacimientoFilter === '' || fechaNacimientoValue === fechaNacimientoFilter) &&
                (fechaIngresoFilter === '' || fechaIngresoValue === fechaIngresoFilter) &&
                (ultimoCambioFilter === '' || ultimoCambioValue === ultimoCambioFilter) &&
                (idPerfilFilter === 'all' || idPerfilValue === idPerfilFilter);

            row.style.display = showRow ? '' : 'none';
        });
    }

    function clearFilters() {
        document.getElementById('activo-filter').value = 'all';
        document.getElementById('usuario-filter').value = '';
        document.getElementById('fecha-nacimiento-filter').value = '';
        document.getElementById('fecha-ingreso-filter').value = '';
        document.getElementById('ultimo-cambio-filter').value = '';
        document.getElementById('id-perfil-filter').value = 'all';
        applyFilters();
    }

    window.onload = function () {
        applyFilters();
    };
</script>
</body>
</html>
