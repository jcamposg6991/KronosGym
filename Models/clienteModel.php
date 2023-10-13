<?php

Class clienteModel{

    private $db;

    function __construct(){

		$this->db = new Conexion();

	}

    public function getCliente($id){
		$data = $this->db->querySelect("SELECT * FROM Usuarios WHERE Id_Usuario='$id'");
		return $data;
	}

	public function getRutinas($id){
		$data = $this->db->querySelect("SELECT DISTINCT Id_Rutina, Fecha_Rutina FROM Rutinas WHERE Id_Usuario='$id'");
		return $data;
	}

	public function verRutina($idCliente,$idRutina){
		$data = $this->db->querySelect("SELECT Id_Rutina,Nombre_Ejercicio_Rutina,Descripcion_Ejercicio_Rutina,Categoria,Series,Repeticiones,Fecha_Rutina FROM Rutinas WHERE Id_Usuario='$idCliente' AND Id_Rutina ='$idRutina'");
		return $data;
	}

	public function getMediciones($id){
		$data = $this->db->querySelect("SELECT Id_Medicion,Estatura_cm,Peso_kg,MME_kg,MGC_kg,IMC_kg_m2,PGC_Por,MMS_BD_kg,MMS_BI_kg,MMS_PD_kg,MMS_PI_kg,MMS_TOR_kg,GS_BD_kg,GS_BI_kg,GS_PD_kg,GS_PI_kg,GS_TOR_kg,Fecha FROM Mediciones WHERE Id_Usuario='$id'");
		return $data;
	}

	public function cambiarContrasena($id,$nuevaContrasena){

        $sql = "UPDATE Usuarios SET Contrasena=md5('$nuevaContrasena') WHERE Id_Usuario='$id'";
            if ($this->db->queryNoSelect($sql)) {
                echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=cliente\'" />';
                exit();
            } else {
                exit("Error al modificar la contrasena");
            }
        }

	public function cambiarPalabraClave($id,$nuevaPalabraClave){

		$sql = "UPDATE Usuarios SET Palabra_Clave='$nuevaPalabraClave' WHERE Id_Usuario='$id'";
		if ($this->db->queryNoSelect($sql)) {
			echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=cliente\'" />';
			exit();
		} else {
			exit("Error al modificar la palabra clave");
		}
		}

		
	public function validarCambiarContrasena($validarEmail,$validarPalabraClave){

		var_dump($validarEmail);
		var_dump($validarPalabraClave);

		$data = $this->db->querySelect("SELECT* FROM Usuarios WHERE Correo='$validarEmail' AND Palabra_Clave='$validarPalabraClave'");
		
		var_dump($sql);
        if ($data[0]["Id_Usuario"] == 0) {
            echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=login\'" />';
            exit();
        }

		if ($data>0) {
			$_SESSION["Palabra_Clave"]=$data[0]["Palabra_Clave"];
			$_SESSION["Id_Usuario"]=$data[0]["Id_Usuario"];
			$_SESSION["Seguridad"]="5857";
			echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=cliente/validacionCambiarContrasena\'" />';
		}

	}

	public function validacionCambiarContrasena($id,$nuevaContrasena){
		$sql = "UPDATE Usuarios SET Contrasena=md5('$nuevaContrasena') WHERE Id_Usuario='$id'";
		if ($this->db->queryNoSelect($sql)) {
			echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=login\'" />';
			exit();
		} else {
			exit("Error al modificar la contrasena");
		}
	}

	public function getTransacciones($id){
		$data=$this->db->querySelect("SELECT * FROM Transacciones WHERE Id_Usuario='$id'");
		var_dump($sql);
		return $data;
	}
}

?>