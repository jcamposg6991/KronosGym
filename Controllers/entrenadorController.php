<?php

Class entrenadorController extends Controller{

	private $model;

	function __construct()
	{
		$this->model = $this->model("entrenadorModel");
	}

    public function index(){
		$this->loadView('entrenadorView');
	}

	public function crearRutina(){
		$data = $this->model->getClientes();
		$data2 = $this->model->getEjercicios();
		$this->loadView("entrenadorCrearRutinaView",$data,$data2);
	}


	public function guardarRutina(){
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			//echo 'guardarRutina() fue llamada';
			// Obtener los datos enviados por AJAX
			$datosJSON = isset($_POST['datos']) ? $_POST['datos'] : '';
	
			// Decodificar los datos JSON
			$rutinas = json_decode($datosJSON, true);
	
			// Verificar si se recibieron los parámetros esperados y si el array no está vacío
			if (!is_array($rutinas) || count($rutinas) === 0) {
				echo 'Error: Parámetros inválidos o array vacío.';
				exit();
			}
	
			// Llamar a la función del modelo para guardar las rutinas
			$resultado = $this->model->guardarRutina($rutinas);
	
			if ($resultado) {
				echo 'Ingreso exitoso';
			} else {
				echo 'Error al insertar la rutina';
			}
		}
	}



	public function crearEjercicio(){
		if ($_SERVER['REQUEST_METHOD']=="POST") {
			$nombreEjercicio = isset($_POST["nombreEjercicio"])?$_POST["nombreEjercicio"]:"";
			$descripcionEjercicio = isset($_POST["descripcionEjercicio"])?$_POST["descripcionEjercicio"]:"";
			$zonaEjercicio = isset($_POST["zonaEjercicio"])?$_POST["zonaEjercicio"]:"";
			$musculoEjercicio = isset($_POST["musculoEjercicio"])?$_POST["musculoEjercicio"]:"";
			$this->model->crearEjercicio($nombreEjercicio,$descripcionEjercicio,$zonaEjercicio,$musculoEjercicio);
		}else {
			$data = $this->model->getZona();
			$data2 = $this->model->getMusculo();
			$this->loadview("entrenadorCrearEjercicioView",$data,$data2);
		}
	}

	public function crearMedicion(){
		if ($_SERVER['REQUEST_METHOD']=="POST") {
			$medicion = isset($_POST["medicion"])?$_POST["medicion"]:"";
			$estatura = isset($_POST["estatura"])?$_POST["estatura"]:"";
			$peso = isset($_POST["peso"])?$_POST["peso"]:"";
			$mme = isset($_POST["mme"])?$_POST["mme"]:"";
			$mgc = isset($_POST["mgc"])?$_POST["mgc"]:"";
			$imc = isset($_POST["imc"])?$_POST["imc"]:"";
			$pgc = isset($_POST["pgc"])?$_POST["pgc"]:"";
			$mms_bd = isset($_POST["mms_bd"])?$_POST["mms_bd"]:"";
			$mms_bi = isset($_POST["mms_bi"])?$_POST["mms_bi"]:"";
			$mms_pd = isset($_POST["mms_pd"])?$_POST["mms_pd"]:"";
			$mms_pi = isset($_POST["mms_pi"])?$_POST["mms_pi"]:"";
			$mms_tor = isset($_POST["mms_tor"])?$_POST["mms_tor"]:"";
			$gs_bd = isset($_POST["gs_bd"])?$_POST["gs_bd"]:"";
			$gs_bi = isset($_POST["gs_bi"])?$_POST["gs_bi"]:"";
			$gs_pd = isset($_POST["gs_pd"])?$_POST["gs_pd"]:"";
			$gs_pi = isset($_POST["gs_pi"])?$_POST["gs_pi"]:"";
			$gs_tor = isset($_POST["gs_tor"])?$_POST["gs_tor"]:"";
			$fecha = isset($_POST["fecha"])?$_POST["fecha"]:"";
			$idUsuario = isset($_POST["idUsuario"])?$_POST["idUsuario"]:"";
			var_dump($_POST);
			$mms_bi = isset($_POST["mms_bi"])?$_POST["mms_bi"]:"";
			$this->model->crearMedicion($medicion,$estatura,$peso,$mme,$mgc,$imc,$pgc,$mms_bd,$mms_bi,$mms_pd,$mms_pi,$mms_tor,$gs_bd,$gs_bi,$gs_pd,$gs_pi,$gs_tor,$fecha,$idUsuario);
		}else{
			$data = $this->model->getClientes();
			$this->loadview("entrenadorCrearMedicionView",$data);
		}
	}
}
?>