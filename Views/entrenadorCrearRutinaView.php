<?php
    if($_SESSION["Seguridad"] != "entrenador"){
        echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=inicio\'" />';
        exit();
    }
	$_SESSION["Seguridad"]="5857";

    $fechaActual = date('d-m-Y');

    function generarCodigoAlfanumerico($longitud) {
        $bytes = random_bytes(($longitud + 1) / 2);
        return substr(bin2hex($bytes), 0, $longitud);
    }
    $ejercicio = $dataModel2[0]['Nombre_Ejercicio'];
    $idRutina = generarCodigoAlfanumerico(20);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <title>Kronos │ Entrenador - Asignar Rutina</title>
    </head>
    <br>
    <center><h2 id="tipo_Perfil">Portal Entrenador</h2></center><br>
	<center><h3 id="nombre_Usuario">Bienvenido <?php echo $_SESSION["Nombre"];?></h3></center><br>
    <a href="./?pag=entrenador"><button id="action_button">Volver</button></a>
    <body>
        <div id="div_email">
            <form id="form_email">
                <label>Fecha:</label><label id="labelFecha" name="fecha"><?php echo $fechaActual;?></label>
                <label>Rutina:</label><label id="labelRutina" name="rutina"><?php echo $idRutina;?></label><br><br>

                <label>Usuario</label>
                <select type="text" name="idUsuario">
                    <option value="" selected>Seleccione un Usuario</option>
                    <?php for ($i=0; $i < count($dataModel); $i++) { echo '<option value="' . $dataModel[$i]['Id_Usuario'] . '">' . $dataModel[$i]['Nombre'] .' '. $dataModel[$i]['Apellido1'] .' ' . $dataModel[$i]['Apellido2'] .'</option>'; } ?>
                </select><br><br>

                <label>Ejercicio:</label>
                <select type="text" name="ejercicio" id="ejercicioSelect">
                    <option value="" selected>Seleccione un Ejercicio</option>
                    <?php for ($i = 0; $i < count($dataModel2); $i++) {
                        echo '<option value="' . $dataModel2[$i]['Id_Ejercicio'] . '">' . $dataModel2[$i]['Nombre_Ejercicio'] . '</option>';
                    } ?>
                </select><br><br>

                <label>Descripción:</label>
                <textarea id="descripcionEjercicio" name="descripcionEjercicio" cols="1" rows="10" maxlength="1000" readonly></textarea><br><br>

                <label>Categoria:</label>
                <input id="categoriaEjercicio" type="text" name="categoriaEjercicio" readonly><br><br>

                <label>Cantidad de series:</label>
                <input type="text" name="series"><br><br>
                
                <label>Cantidad de repeticiones:</label>
                <input type="text" name="repeticiones"><br>
                <div id="button_container_crearUsuario">
                    <center><button id="button_crearUsuario"type="submit">Agregar Ejercicio</button></center>
                </div>
            </form>
        </div>
        <br><br><br>
        <div id="table-container">
            <table id="user-table">
                <thead>
                    <tr>
                        <th>Id_Rutina</th>
                        <th>Ejercicio</th>
                        <th>Descripción</th>
                        <th>Categoria</th> <!--Zona del cuerpo a trabajar-->
                        <th>Series</th>
                        <th>Repeticiones</th>
                        <th>Fecha</th>
                        <th>Id_Usuario</th>
                        <th>Id_Ejercicio</th>
                        <th>Action</th> <!--opcion de desagregar para cada linea-->
                    </tr>
                </thead>
                <tbody id="user-table-body">
                </tbody>
            </table>
        </div>
        <div id="button_container_crearUsuario">
            <center><button id="button_crearRutina">Crear Rutina</button></center>
        </div>
        <div id="div_container"></div> <!-- Aquí se mostrará el mensaje -->
        <script>
            $(document).ready(function() {
                // Variable para almacenar la cantidad de filas en la tabla
                let rowCount = 0;

                // Función para agregar una nueva fila a la tabla con los datos del formulario
                function agregarFilaTabla() {
                    var valorLabelRutina = document.getElementById('labelRutina').textContent;
                    const descripcion = $('textarea[name="descripcionEjercicio"]').val();
                    const categoria = $('input[name="categoriaEjercicio"]').val();
                    const series = $('input[name="series"]').val();
                    const repeticiones = $('input[name="repeticiones"]').val();
                    var valorLabelFecha = document.getElementById('labelFecha').textContent;
                    const idUsuario = $('select[name="idUsuario"]').val();
                    const idEjercicio = $('select[name="ejercicio"]').val();

                    // Buscar el ejercicio seleccionado en la lista de ejercicios (dataModel2)
                    const ejercicioEncontrado = <?php echo json_encode($dataModel2); ?>.find(ejercicio => ejercicio.Id_Ejercicio === idEjercicio);

                    // Obtener el nombre del ejercicio
                    const nombreEjercicio = ejercicioEncontrado ? ejercicioEncontrado.Nombre_Ejercicio : '';


                    // Crear la nueva fila
                    const newRow = `
                        <tr>
                            <td>${valorLabelRutina}</td>
                            <td>${nombreEjercicio}</td>
                            <td>${descripcion}</td>
                            <td>${categoria}</td>
                            <td>${series}</td>
                            <td>${repeticiones}</td>
                            <td>${valorLabelFecha}</td>
                            <td>${idUsuario}</td>
                            <td>${idEjercicio}</td>
                            <td><button class="eliminar-btn">Eliminar</button></td>
                        </tr>
                    `;

                    // Agregar la fila al tbody de la tabla
                    $('#user-table-body').append(newRow);

                    // Incrementar el contador de filas
                    rowCount++;

                    // Limpiar los campos del formulario
                    $('textarea[name="descripcionEjercicio"]').val('');
                    $('input[name="categoriaEjercicio"]').val('');
                    $('input[name="series"]').val('');
                    $('input[name="repeticiones"]').val('');
                    $('select[name="ejercicio"]').prop('selectedIndex', 0);
                }

                // Función para eliminar una fila de la tabla
                function eliminarFila(button) {
                    $(button).closest('tr').remove();
                    rowCount--;
                }

                // Manejar el evento clic del botón "Agregar Ejercicio"
                $('#button_crearUsuario').click(function(e) {
                    e.preventDefault();
                    agregarFilaTabla();
                });

                // Manejar el evento submit del formulario
                $('#form_email').submit(function(e) {
                    e.preventDefault();
                    agregarFilaTabla();
                });

                // Manejar el evento clic del botón "Eliminar" para cada fila
                $(document).on('click', '.eliminar-btn', function() {
                    eliminarFila(this);
                });
            });
        </script>

        <script>
            // Obtener referencia al select y al textarea
            const selectElement = document.getElementById('ejercicioSelect');
            const textareaElement = document.getElementById('descripcionEjercicio');
            const inputElement = document.getElementById('categoriaEjercicio');

            // Agregar evento de cambio al select
            selectElement.addEventListener('change', function () {
                // Obtener el valor seleccionado (Id_Ejercicio) del select
                const ejercicioSeleccionado = selectElement.value;

                // Buscar el ejercicio seleccionado en la lista de ejercicios (dataModel2)
                const ejercicioEncontrado = <?php echo json_encode($dataModel2); ?>.find(ejercicio => ejercicio.Id_Ejercicio === ejercicioSeleccionado);

                // Actualizar el contenido del textarea con la descripción del ejercicio encontrado
                if (ejercicioEncontrado) {
                    textareaElement.value = ejercicioEncontrado.Descripcion;
                } else {
                    textareaElement.value = '';
                }

                // Actualizar el contenido del input con la categoria del ejercicio encontrado
                if (ejercicioEncontrado) {
                    inputElement.value = ejercicioEncontrado.Nombre_Zona; // Asumiendo que "Nombre_Zona" es una propiedad de "dataModel2"
                } else {
                    inputElement.value = '';
                }
            });
        </script>

<script>
    // Función para capturar datos de la tabla y almacenarlos en un array
    function capturarDatosTabla() {
        var tableRutina = document.getElementById('user-table');
        var filas = tableRutina.getElementsByTagName('tr');
        var datosArray = [];

        for (var i = 1; i < filas.length; i++) {
            var celdas = filas[i].getElementsByTagName('td');
            var filaDatos = [];

            for (var j = 0; j < celdas.length; j++) {
                filaDatos.push(celdas[j].innerText);
            }

            datosArray.push(filaDatos);
        }

        return datosArray;
    }

    function redirectToEntrenadorPage() {
        window.location.href = "./?pag=entrenador";
    }

    function onClickCapturarDatos() {
        console.log('onClickCapturarDatos() fue llamada');
        var tablaDatos = capturarDatosTabla();

        if (tablaDatos.length > 0) {
            // Convertir los datos a formato JSON
            var datosJSON = JSON.stringify(tablaDatos);

            // Realizar una petición AJAX al controlador
            $.ajax({
                type: "POST",
                url: "./?pag=entrenador/guardarRutina",
                data: { datos: datosJSON },
                success: function (response) {
                    // /respuesta del servidor,
                    console.log(response);
                    //var mensajeDiv = document.getElementById('div_container');
                    //mensajeDiv.textContent = 'Los datos se cargaron correctamente en el servidor.';
                    //mensajeDiv.style.color = 'green';

                    // Redireccionar a la página del entrenador
                    redirectToEntrenadorPage();
                },
                error: function (error) {
                    // Manejar errores si la petición no fue exitosa
                    console.log(error);
                    var mensajeDiv = document.getElementById('div_container');
                    mensajeDiv.textContent = 'Error al enviar los datos al servidor.';
                    mensajeDiv.style.color = 'red';
                },
            });
        } else {
            // Mostrar un mensaje de error si no se pudieron capturar los datos
            var mensajeDiv = document.getElementById('div_container');
            mensajeDiv.textContent = 'Error al capturar los datos de la tabla.';
            mensajeDiv.style.color = 'red';
        }
    }

    // Agregar el evento clic al botón para llamar a la función
    var btnCapturarDatos = document.getElementById('button_crearRutina');
    btnCapturarDatos.addEventListener('click', onClickCapturarDatos);
</script>

    </body>
</html>