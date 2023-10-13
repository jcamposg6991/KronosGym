<?php

Class administradorController extends Controller{

	private $model;

	function __construct()
	{
		$this->model = $this->model("administradorModel");
	}
    public function index(){
		$this->loadView('administradorView');
	}

	public function reportes(){
		$this->loadView('administradorReportesView');
	}

	public function reporteUsuarios(){
		$data = $this->model->getUsuarios();
		$this->loadView('administradorReporteUsuariosView',$data);
	}

	public function usuarios(){
		$data = $this->model->getUsuarios();
		$this->loadView('administradorUsuariosView',$data);
	}

	public function crearUsuario(){
		$ultimo = $_SESSION["User"];

		if ($_SERVER['REQUEST_METHOD']=="POST") {
			$nombre = isset($_POST["nombre"])?$_POST["nombre"]:"";
			$apellido1 = isset($_POST["apellido1"])?$_POST["apellido1"]:"";
			$apellido2 = isset($_POST["apellido2"])?$_POST["apellido2"]:"";
			$edad = isset($_POST["edad"])?$_POST["edad"]:"";
			$telefono = isset($_POST["telefono"])?$_POST["telefono"]:"";
			$email = isset($_POST["email"])?$_POST["email"]:"";
			$usuario = isset($_POST["usuario"])?$_POST["usuario"]:"";
			$contrasena = isset($_POST["contrasena"])?$_POST["contrasena"]:"";
			$palabraClave = isset($_POST["palabraClave"])?$_POST["palabraClave"]:"";
			$fechaNacimiento = isset($_POST["fechaNacimiento"])?$_POST["fechaNacimiento"]:"";
			$fechaIngreso = isset($_POST["fechaIngreso"])?$_POST["fechaIngreso"]:"";
			$perfil= isset($_POST["perfil"])?$_POST["perfil"]:"";
			$sede= isset($_POST["sede"])?$_POST["sede"]:"";
			$activo= isset($_POST["activo"])?$_POST["activo"]:"";
			$this->model->crearUsuario($nombre,$apellido1,$apellido2,$edad,$telefono,$email,$usuario,$contrasena,$palabraClave,$fechaNacimiento,$fechaIngreso,$perfil,$sede,$activo,$ultimo);
		}else {
		$data = $this->model->getSedes();
		$data2 = $this->model->getPerfiles();
		$this->loadview("administradorCrearUsuarioView",$data,$data2);
	  }
	}

	public function modificarUsuario($id=""){
		$ultimo = $_SESSION["User"];

		if ($_SERVER['REQUEST_METHOD']=="POST") {
			$id = isset($_POST["id_usuario"])?$_POST["id_usuario"]:"";
			$nombre = isset($_POST["nombre"])?$_POST["nombre"]:"";
			$apellido1 = isset($_POST["apellido1"])?$_POST["apellido1"]:"";
			$apellido2 = isset($_POST["apellido2"])?$_POST["apellido2"]:"";
			$edad = isset($_POST["edad"])?$_POST["edad"]:"";
			$telefono = isset($_POST["telefono"])?$_POST["telefono"]:"";
			$email = isset($_POST["email"])?$_POST["email"]:"";
			$usuario = isset($_POST["usuario"])?$_POST["usuario"]:"";
			$contrasena = isset($_POST["contrasena"])?$_POST["contrasena"]:"";
			$palabraClave = isset($_POST["palabraClave"])?$_POST["palabraClave"]:"";
			$fechaNacimiento = isset($_POST["fechaNacimiento"])?$_POST["fechaNacimiento"]:"";
			$fechaIngreso = isset($_POST["fechaIngreso"])?$_POST["fechaIngreso"]:"";
			$perfil= isset($_POST["perfil"])?$_POST["perfil"]:"";
			$sede= isset($_POST["sede"])?$_POST["sede"]:"";
			$activo= isset($_POST["activo"])?$_POST["activo"]:"";
			$this->model->modificarUsuario($id,$nombre,$apellido1,$apellido2,$edad,$telefono,$email,$usuario,$contrasena,$palabraClave,$fechaNacimiento,$fechaIngreso,$perfil,$sede,$activo,$ultimo);
		} else {
		  $data = $this->model->getUsuario($id);
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

		  $this->loadView("administradorModificarUsuariosView",$datos);
		}
	}

	public function borrarUsuario($id=""){
	if ($_SERVER['REQUEST_METHOD']=="POST") {
		$id = isset($_POST["id_usuario"])?$_POST["id_usuario"]:"";
	
		$this->model->borrarUsuario($id);
	
		} else {
		$data = $this->model->getUsuario($id);
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
		$this->loadView("administradorBorrarUsuarioView",$datos);
		}
	}

	public function proveedores(){
		$data = $this->model->getProveedores();
		$this->loadView('administradorProveedoresView',$data);
	}

	public function crearProveedor(){
		$ultimo = $_SESSION["User"];

		if ($_SERVER['REQUEST_METHOD']=="POST") {
			$nombre = isset($_POST["nombre"])?$_POST["nombre"]:"";
			$cedula = isset($_POST["cedula"])?$_POST["cedula"]:"";
			$telefono = isset($_POST["telefono"])?$_POST["telefono"]:"";
			$email = isset($_POST["email"])?$_POST["email"]:"";
			$direccion = isset($_POST["direccion"])?$_POST["direccion"]:"";
			$this->model->crearProveedor($nombre,$cedula,$telefono,$email,$direccion,$ultimo);
		}else {
		$this->loadview("administradorCrearProveedorView");
	  }
	}

	public function modificarProveedor($id=""){
		$ultimo = $_SESSION["User"];

		if ($_SERVER['REQUEST_METHOD']=="POST") {
			$id = isset($_POST["id_proveedor"])?$_POST["id_proveedor"]:"";
			$nombre = isset($_POST["nombre"])?$_POST["nombre"]:"";
			$cedula = isset($_POST["cedula"])?$_POST["cedula"]:"";
			$telefono = isset($_POST["telefono"])?$_POST["telefono"]:"";
			$email = isset($_POST["email"])?$_POST["email"]:"";
			$direccion = isset($_POST["direccion"])?$_POST["direccion"]:"";
			$this->model->modificarProveedor($id,$nombre,$cedula,$telefono,$email,$direccion,$ultimo);
		} else {
		  $data = $this->model->getProveedor($id);
		  $datos = [
			"id_proveedor" => $id,
			"nombre" => $data[0]["Nombre_Proveedor"],
			"cedula" => $data[0]["Cedula"],
			"telefono" => $data[0]["Telefono"],
			"email" => $data[0]["Correo"],
			"direccion" => $data[0]["Direccion"],
		  ];

		  $this->loadView("administradorModificarProveedorView",$datos);
		}
	}

	public function borrarProveedor($id=""){
	if ($_SERVER['REQUEST_METHOD']=="POST") {
		$id = isset($_POST["id_proveedor"])?$_POST["id_proveedor"]:"";
	
		$this->model->borrarProveedor($id);
	
		} else {
		$data = $this->model->getProveedor($id);
		$datos = [
			"id_proveedor" => $id,
			"nombre" => $data[0]["Nombre_Proveedor"],
			"cedula" => $data[0]["Cedula"],
			"telefono" => $data[0]["Telefono"],
			"email" => $data[0]["Correo"],
			"direccion" => $data[0]["Direccion"],
		];
		$this->loadView("administradorBorrarProveedorView",$datos);
		}
	}

	public function transacciones(){
		$this->loadView('administradorTransaccionesView',$data);
	}

	public function ingresos(){
		$data = $this->model->getIngresos();
		$this->loadView('administradorIngresosView',$data);
	}

	public function crearIngreso(){
		$ultimo = $_SESSION["User"];
	
		if ($_SERVER['REQUEST_METHOD']=="POST") {

			$id = isset($_POST["idUsuario"])?$_POST["idUsuario"]:"";
			$data = $this->model->getUsuario($id);


			$factura = isset($_POST["factura"])?$_POST["factura"]:"";
			$usuario = $data[0]['Nombre'] .' '. $data[0]['Apellido1'] .' '. $data[0]['Apellido2'];
			$concepto = isset($_POST["concepto"])?$_POST["concepto"]:"";
			$metodoPago = isset($_POST["metodoPago"])?$_POST["metodoPago"]:"";
			$tipoTransaccion = "Ingreso";
			$monto = isset($_POST["monto"])?$_POST["monto"]:"";
			$fecha = isset($_POST["fecha"])?$_POST["fecha"]:"";

			$this->model->crearIngreso($factura,$usuario,$concepto,$metodoPago,$tipoTransaccion,$monto,$fecha,$ultimo,$id);
		}else {
		$data = $this->model->getClientes();
		$this->loadview("administradorCrearIngresoView",$data);
	  }
	}

	public function modificarIngreso($id=""){
		$ultimo = $_SESSION["User"];

		if ($_SERVER['REQUEST_METHOD']=="POST") {
			$idTransaccion = isset($_POST["idTransaccion"])?$_POST["idTransaccion"]:"";
			$factura = isset($_POST["factura"])?$_POST["factura"]:"";
			$concepto = isset($_POST["concepto"])?$_POST["concepto"]:"";
			$metodoPago = isset($_POST["metodoPago"])?$_POST["metodoPago"]:"";
			$monto = isset($_POST["monto"])?$_POST["monto"]:"";
			$fecha = isset($_POST["fecha"])?$_POST["fecha"]:"";

			$this->model->modificarIngreso($factura,$concepto,$metodoPago,$monto,$fecha,$ultimo,$idTransaccion);
		} else {
		  $data = $this->model->getIngreso($id);
		  $this->loadView("administradorModificarIngresoView",$data);
		}
	}

	public function borrarIngreso($id=""){

		if ($_SERVER['REQUEST_METHOD']=="POST") {

			$idTransaccion = isset($_POST["idTransaccion"])?$_POST["idTransaccion"]:"";

			$this->model->borrarIngreso($idTransaccion);
		} else {
		  $data = $this->model->getIngreso($id);
		  $this->loadView("administradorBorrarIngresoView",$data);
		}
	}

	public function egresos(){
		$data = $this->model->getEgresos();
		$this->loadView('administradorEgresosView',$data);
	}

	public function crearEgreso(){
		$ultimo = $_SESSION["User"];
	
		if ($_SERVER['REQUEST_METHOD']=="POST") {

			$id = isset($_POST["idProveedor"])?$_POST["idProveedor"]:"";
			$data = $this->model->getProveedor($id);


			$factura = isset($_POST["factura"])?$_POST["factura"]:"";
			$usuario = $data[0]['Nombre_Proveedor'];
			$concepto = isset($_POST["concepto"])?$_POST["concepto"]:"";
			$metodoPago = isset($_POST["metodoPago"])?$_POST["metodoPago"]:"";
			$tipoTransaccion = "Egreso";
			$monto = isset($_POST["monto"])?$_POST["monto"]:"";
			$fecha = isset($_POST["fecha"])?$_POST["fecha"]:"";

			$montoNegativo ='-'.$monto;

			$this->model->crearEgreso($factura,$usuario,$concepto,$metodoPago,$tipoTransaccion,$montoNegativo,$fecha,$ultimo,$id);
		}else {
		$data = $this->model->getProveedores();
		$this->loadview("administradorCrearEgresoView",$data);
	  }
	}

	public function modificarEgreso($id=""){
		$ultimo = $_SESSION["User"];

		if ($_SERVER['REQUEST_METHOD']=="POST") {
			$idTransaccion = isset($_POST["idTransaccion"])?$_POST["idTransaccion"]:"";
			$factura = isset($_POST["factura"])?$_POST["factura"]:"";
			$concepto = isset($_POST["concepto"])?$_POST["concepto"]:"";
			$metodoPago = isset($_POST["metodoPago"])?$_POST["metodoPago"]:"";
			$monto = isset($_POST["monto"])?$_POST["monto"]:"";
			$fecha = isset($_POST["fecha"])?$_POST["fecha"]:"";

			$montoNegativo ='-'.$monto;

			$this->model->modificarEgreso($factura,$concepto,$metodoPago,$montoNegativo,$fecha,$ultimo,$idTransaccion);
		} else {
		  $data = $this->model->getEgreso($id);
		  $this->loadView("administradorModificarEgresoView",$data);
		}
	}

	public function borrarEgreso($id=""){

		if ($_SERVER['REQUEST_METHOD']=="POST") {

			$idTransaccion = isset($_POST["idTransaccion"])?$_POST["idTransaccion"]:"";

			$this->model->borrarEgreso($idTransaccion);
		} else {
		  $data = $this->model->getEgreso($id);
		  $this->loadView("administradorBorrarEgresoView",$data);
		}
	}

	public function reporteFinanciero(){
		$data = $this->model->getTransacciones();
		$this->loadView('administradorReporteFinancieroView',$data);
	}

}
?>