<?php

Class entrenadorModel{

    private $db;

    function __construct(){

		$this->db = new Conexion();

	}

  public function getEjercicios(){
		$data=$this->db->querySelect("SELECT Ejercicios.*, Zonas_Cuerpo.Nombre_Zona FROM Ejercicios INNER JOIN Zonas_Cuerpo ON Ejercicios.Id_Zona = Zonas_Cuerpo.Id_Zona");
    return $data;
	}

  public function getClientes(){
		$data=$this->db->querySelect("SELECT * FROM Usuarios WHERE Id_Perfil='4'");
		return $data;
	}

  public function getZona(){
		$data=$this->db->querySelect("SELECT * FROM Zonas_Cuerpo");
		return $data;
	}

    public function getMusculo(){
		$data=$this->db->querySelect("SELECT * FROM Musculos");
		return $data;
	}

  public function crearEjercicio($nombreEjercicio,$descripcionEjercicio,$zonaEjercicio,$musculoEjercicio){
    $sql = "INSERT INTO Ejercicios(Nombre_Ejercicio,Descripcion,Id_Zona,Id_Musculo) VALUES ('$nombreEjercicio','$descripcionEjercicio','$zonaEjercicio','$musculoEjercicio')";
      if ($this->db->queryNoSelect($sql)) {
          echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=entrenador\'" />';
      exit();
      } else {
      exit("Error al insertar el ejercicio");
      }
  }

    public function guardarRutina($rutinas) {
      //var_dump($rutinas); // Verificar los datos recibidos en el modelo
  
      $exito = true; // Variable para rastrear si todas las consultas son exitosas
  
      // Iterar sobre los parámetros (que son un array de arrays) para insertar cada rutina en la base de datos
      foreach ($rutinas as $rutinaData) {
          // Verificar si los datos de la rutina son válidos
  
          // Asignar cada valor del array a variables
          $rutina = $rutinaData[0];
          $ejercicio = $rutinaData[1];
          $descripcion = $rutinaData[2];
          $categoria = $rutinaData[3];
          $serie = $rutinaData[4];
          $repeticiones = $rutinaData[5];
          $fecha = $rutinaData[6];
          $id_cliente = $rutinaData[7];
          $id_ejercicio = $rutinaData[8];

          // Convertir la fecha al formato 'YYYY-MM-DD' antes de insertarla en la consulta SQL
        $fecha_formateada = date('Y-m-d', strtotime($fecha));
  
          // Preparar la consulta SQL con los valores obtenidos
          $sql = "INSERT INTO Rutinas (Id_Rutina, Nombre_Ejercicio_Rutina, Descripcion_Ejercicio_Rutina, Categoria, Series, Repeticiones, Fecha_Rutina, Id_Usuario, Id_Ejercicio) VALUES ('$rutina', '$ejercicio', '$descripcion', '$categoria', '$serie', '$repeticiones', '$fecha_formateada', '$id_cliente', '$id_ejercicio')";
  
          // Imprimir la consulta SQL para verificar si está formada correctamente
          //var_dump($sql);
  
          // Ejecutar la consulta y verificar si fue exitosa
          if (!$this->db->queryNoSelect($sql)) {
              $exito = false; // Marcar que hubo un error
          }
      }
  
      return $exito;
  }

  public function crearMedicion($medicion, $estatura, $peso, $mme, $mgc, $imc, $pgc, $mms_bd, $mms_bi, $mms_pd, $mms_pi, $mms_tor, $gs_bd, $gs_bi, $gs_pd, $gs_pi, $gs_tor, $fecha, $idUsuario){
      
    $fecha_formateada = date('Y-m-d', strtotime($fecha));
    
    $sql = "INSERT INTO Mediciones(Id_Medicion,Estatura_cm,Peso_kg,MME_kg,MGC_kg,IMC_kg_m2,PGC_Por,MMS_BD_kg,MMS_BI_kg,MMS_PD_kg,MMS_PI_kg,MMS_TOR_kg,GS_BD_kg,GS_BI_kg,GS_PD_kg,GS_PI_kg,GS_TOR_kg,Fecha,Id_Usuario) VALUES ('$medicion','$estatura','$peso','$mme','$mgc','$imc','$pgc','$mms_bd','$mms_bi','$mms_pd','$mms_pi','$mms_tor','$gs_bd','$gs_bi','$gs_pd','$gs_pi','$gs_tor','$fecha_formateada','$idUsuario')";
      
    // Imprimir la consulta SQL para verificar si está formada correctamente
    var_dump($sql);
    
    if ($this->db->queryNoSelect($sql)) {
        echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=entrenador\'" />';
        exit();
    } else {
        echo "ERROR EN EL SQL"; // Agregar el punto y coma al final de la línea
        exit("Error al insertar el usuario");
    }
  }
  
}

?>