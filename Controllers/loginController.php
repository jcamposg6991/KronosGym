<?php

Class loginController extends Controller{

    private $model;

    function __construct(){
        $this->model = $this->model("loginModel");
    }

    public function index(){
        $this->loadView("loginView");  
    }

    public function validarLogin(){
        if ($_SERVER['REQUEST_METHOD']=="POST") {
			$usuario= isset($_POST["Usuario"])?$_POST["Usuario"]:"";
			$contrasena = isset($_POST["Contrasena"]) ? md5($_POST["Contrasena"]) : "";

            error_log("Valor de contrasena: " . $contrasena); // Esto mostrará el valor de contrasena en el registro de errores
			
           $this->model->validarLogin($usuario, $contrasena);

        }else{
			$this->loadView("inicioView");
		}
        
    }
}
?>