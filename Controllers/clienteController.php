<?php

Class clienteController extends Controller{

	private $model;

	function __construct()
	{
		$this->model = $this->model("clienteModel");
	}

    public function index(){
		$this->loadView('clienteView');
	}


	public function cargarCliente($id=""){
		
			$id = $_SESSION["Id_Usuario"];
	  
			$data = $this->model->getCliente($id);
			$datos = [
			  "id_usuario" => $id,
			  "nombre" => $data[0]["Nombre"],
			  "apellido1" => $data[0]["Apellido1"],
			  "apellido2" => $data[0]["Apellido2"],
			  "edad" => $data[0]["Edad"],
			  "telefono" => $data[0]["Telefono"],
			  "email" => $data[0]["Correo"],
			  "usuario" => $data[0]["Usuario"],
			  "contrasena" => $data[0]["Contrasena"],
			  "palabraClave" => $data[0]["Palabra_Clave"],
			  "fechaNacimiento" => $data[0]["Fecha_Nacimiento"],
			  "fechaIngreso" => $data[0]["Fecha_Ingreso"],
			  "perfil" => $data[0]["Id_Perfil"],
			  "sede" => $data[0]["Id_Sede"],
			  "activo" => $data[0]["Activo"],	
			];
			$this->loadView("clientePerfilView",$datos);
	}

	public function reportarPago(){
		$this->loadView("clienteReportarPagoView",$datos);
	}

	public function cargarRutinas(){
		$id = $_SESSION["Id_Usuario"];

		$data = $this->model->getRutinas($id);
		$this->loadView("clienteRutinasView",$data);
	}

	public function verRutina($idRutina){
		$idCliente = $_SESSION["Id_Usuario"];
		$data = $this->model->verRutina($idCliente,$idRutina);
		$this->loadView("clienteVerRutinaView",$data);
	}

	public function cargarMediciones(){
		$id = $_SESSION["Id_Usuario"];

		$data = $this->model->getMediciones($id);
		$this->loadView("clienteMedicionesView",$data);
	}

	public function cambiarContrasena(){
		$id = $_SESSION["Id_Usuario"];

		if ($_SERVER['REQUEST_METHOD']=="POST") {
			$nuevaContrasena = isset($_POST["nuevaContrasena"])?$_POST["nuevaContrasena"]:"";
			$this->model->cambiarContrasena($id,$nuevaContrasena);
		}else{
			$this->loadView("clienteCambiarContrasenaView");
		}
	}

	public function cambiarPalabraClave(){

		$id = $_SESSION["Id_Usuario"];

		if ($_SERVER['REQUEST_METHOD']=="POST") {
			$nuevaPalabraClave = isset($_POST["nuevaPalabraClave"])?$_POST["nuevaPalabraClave"]:"";
			$this->model->cambiarPalabraClave($id,$nuevaPalabraClave);
		}else{
			$this->loadView("clienteCambiarPalabraClaveView");
		}
	}

	public function validarCambiarContrasena(){
		var_dump($_POST);
		if ($_SERVER['REQUEST_METHOD']=="POST") {
			$validarEmail = isset($_POST["validarEmail"])?$_POST["validarEmail"]:"";
			$validarPalabraClave = isset($_POST["validarPalabraClave"])?$_POST["validarPalabraClave"]:"";
			$this->model->validarCambiarContrasena($validarEmail,$validarPalabraClave);
		}else{
			$this->loadView("clienteValidarRecuperarContrasenaView");
		}
	}

	public function validacionCambiarContrasena(){
		var_dump($_POST);
		var_dump($_SESSION["Id_Usuario"]);
		var_dump($_SESSION["Palabra_Clave"]);
		$id = $_SESSION["Id_Usuario"];

		if ($_SERVER['REQUEST_METHOD']=="POST") {
			$nuevaContrasena = isset($_POST["nuevaContrasena"])?$_POST["nuevaContrasena"]:"";
			$this->model->validacionCambiarContrasena($id,$nuevaContrasena);
		}else{
			$this->loadView("clienteValidacionCambiarContrasenaView");
		}

	}

	public function cargarPagos(){
		$id = $_SESSION["Id_Usuario"];
		$data = $this->model->getTransacciones($id);
		$this->loadView('clienteMisPagosView',$data);
	}
	
}
?>