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
    <title>Kronos │ Asistente - Reporte Financiero</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.0/xlsx.full.min.js"></script>
</head>

<body>
    <br>
    <center><h2 id="tipo_Perfil">Portal Asistente</h2></center><br>
    <center><h3 id="nombre_Usuario">Bienvenido <?php echo $_SESSION["Nombre"]; ?></h3></center><br>
    <a href="./?pag=asistente/reportes"><button id="action_button">Volver</button></a>
    <div id="div_container">
    <div id="div_email">
        <form id="form_email">
                <div id="filter-container">
                    <label for="metodo-pago-filter">Filtrar por Método de Pago:</label>
                    <select id="metodo-pago-filter">
                        <option value="all">Todos</option>
                        <option value="tarjeta">Tarjeta</option>
                        <option value="transferencia">Transferencia</option>
                        <option value="sinpe-movil">Sinpe Móvil</option>
                        <option value="efectivo">Efectivo</option>
                    </select>
                    <label for="tipo-transaccion-filter">Filtrar por Tipo de Transacción:</label>
                    <select id="tipo-transaccion-filter">
                        <option value="all">Todos</option>
                        <option value="ingreso">Ingreso</option>
                        <option value="egreso">Egreso</option>
                    </select>
                    <label for="fecha-transaccion-filter">Filtrar por Fecha de Transacción:</label>
                    <input type="date" id="fecha-transaccion-filter">
                    <label for="id-cliente-filter">Filtrar por ID Cliente:</label>
                    <input type="text" id="id-cliente-filter">
                    <label for="id-proveedor-filter">Filtrar por ID Proveedor:</label>
                    <input type="text" id="id-proveedor-filter">
                    <label for="ultimo-cambio-filter">Filtrar por Último Cambio:</label>
                    <input type="text" id="ultimo-cambio-filter">
                </div>
            </form>
        </div>
    </div>
    <center><button id="action_button" style="background-color: green; border: 2px solid green;"
            onclick="applyFilters()">Aplicar Filtros</button></center><br>

    <center><button id="action_button" onclick="clearFilters()">Limpiar Filtros</button></center><br><br>
    <center><h1>Reporte Financiero</h1></center>
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
                        <th>Tipo de Transaccion</th>
                        <th>Monto</th>
                        <th>Fecha de Transaccion</th>
                        <th>Id Cliente</th>
                        <th>Id Proveedor</th>
                        <th>Ultimo Cambio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $totalMonto = 0; // Inicializa el monto total

                    for ($i = 0; $i < count($dataModel); $i++) {
                        print "<tr>";
                        print "<td>" . $dataModel[$i]["Id_Transaccion"] . "</td>";
                        print "<td class='text-left'>" . $dataModel[$i]["Factura_Comprobante"] . "</td>";
                        print "<td class='text-left'>" . $dataModel[$i]["Usuario_Proveedor"] . "</td>";
                        print "<td class='text-left'>" . $dataModel[$i]["Concepto"] . "</td>";
                        print "<td class='text-left'>" . $dataModel[$i]["Metodo_Pago"] . "</td>";
                        print "<td class='text-left'>" . $dataModel[$i]["Tipo_Transaccion"] . "</td>";
                        print "<td class='text-left'>" . '₡ ' . $dataModel[$i]["Monto"] . "</td>";
                        print "<td class='text-left'>" . $dataModel[$i]["Fecha_Transaccion"] . "</td>";
                        print "<td class='text-left'>" . $dataModel[$i]["Id_Usuario"] . "</td>";
                        print "<td class='text-left'>" . $dataModel[$i]["Id_Proveedor"] . "</td>";
                        print "<td class='text-left'>" . $dataModel[$i]["Ultimo_Cambio"] . "</td>";
                        print "</tr>";
                        $totalMonto += $dataModel[$i]["Monto"];
                    }
                    ?>
                    <tr id="total-row">
                        <td colspan="5"></td>
                        <td class="text-left">Total Monto</td>
                        <td id="total-amount" class="text-left" colspan="1"><?php echo '₡ ' . number_format($totalMonto, 2); ?></td>
                        <td colspan="4"></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <center><button id="action_button" style="background-color: green; border: 2px solid green;"
            onclick="generateExcel()">Descargar Excel</button></center><br><br>
    <br><br>
    <script>
        function applyFilters() {
            const metodoPagoFilter = document.getElementById('metodo-pago-filter').value.toLowerCase();
            const tipoTransaccionFilter = document.getElementById('tipo-transaccion-filter').value.toLowerCase();
            const fechaTransaccionFilter = document.getElementById('fecha-transaccion-filter').value;
            const idClienteFilter = document.getElementById('id-cliente-filter').value;
            const idProveedorFilter = document.getElementById('id-proveedor-filter').value;
            const ultimoCambioFilter = document.getElementById('ultimo-cambio-filter').value;

            let totalMonto = 0;

            const tableRows = document.querySelectorAll('#user-table tbody tr:not(#total-row)');

            tableRows.forEach(row => {
                const metodoPagoCell = row.querySelector('td:nth-child(5)');
                const tipoTransaccionCell = row.querySelector('td:nth-child(6)');
                const fechaTransaccionCell = row.querySelector('td:nth-child(8)');
                const idClienteCell = row.querySelector('td:nth-child(9)');
                const idProveedorCell = row.querySelector('td:nth-child(10)');
                const ultimoCambioCell = row.querySelector('td:nth-child(11)');

                const metodoPagoValue = metodoPagoCell.textContent.trim().toLowerCase();
                const tipoTransaccionValue = tipoTransaccionCell.textContent.trim().toLowerCase();
                const fechaTransaccionValue = fechaTransaccionCell.textContent.trim();
                const idClienteValue = idClienteCell.textContent.trim();
                const idProveedorValue = idProveedorCell.textContent.trim();
                const ultimoCambioValue = ultimoCambioCell.textContent.trim();

                const showRow =
                    (metodoPagoValue === metodoPagoFilter || metodoPagoFilter === 'all') &&
                    (tipoTransaccionValue === tipoTransaccionFilter || tipoTransaccionFilter === 'all') &&
                    (fechaTransaccionFilter === '' || fechaTransaccionValue === fechaTransaccionFilter) &&
                    (idClienteValue.includes(idClienteFilter)) &&
                    (idProveedorValue.includes(idProveedorFilter)) &&
                    (ultimoCambioFilter === '' || ultimoCambioValue === ultimoCambioFilter);

                row.style.display = showRow ? '' : 'none';

                if (showRow) {
                    const montoCell = row.querySelector('td:nth-child(7)');
                    const montoValue = parseFloat(montoCell.textContent.replace('₡', '').trim());
                    totalMonto += montoValue;
                }
            });
            document.getElementById('total-amount').textContent = '₡ ' + totalMonto.toFixed(2);
        }

        function clearFilters() {
            document.getElementById('metodo-pago-filter').value = 'all';
            document.getElementById('tipo-transaccion-filter').value = 'all';
            document.getElementById('fecha-transaccion-filter').value = '';
            document.getElementById('id-cliente-filter').value = '';
            document.getElementById('id-proveedor-filter').value = '';
            document.getElementById('ultimo-cambio-filter').value = '';
            applyFilters();
        }

        function generateExcel() {
            const workbook = XLSX.utils.book_new();
            const worksheet = XLSX.utils.table_to_sheet(document.getElementById('user-table'));
            XLSX.utils.book_append_sheet(workbook, worksheet, 'ReporteFinanciero');
            const xlsxBuffer = XLSX.write(workbook, { bookType: 'xlsx', type: 'array' });
            const blob = new Blob([xlsxBuffer], { type: 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet' });
            const a = document.createElement('a');
            a.href = URL.createObjectURL(blob);
            a.download = 'ReporteFinanciero.xlsx';
            document.body.appendChild(a);
            a.click();
            document.body.removeChild(a);
        }

        window.onload = function () {
            applyFilters();
        };
    </script>
</body>

</html>