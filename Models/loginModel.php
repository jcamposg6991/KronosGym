<?php

class loginModel{

    private $db;

    function __construct(){

        $this->db = new Conexion();

    }
    
    public function validarLogin($usuario, $contrasena) {

        $data = $this->db->querySelect("SELECT * FROM Usuarios WHERE Usuario = '$usuario' and Contrasena = '$contrasena'");

        if ($data === false) {
            echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=login\'" />';
            exit();
        }

        if ($data>0) {
            
            $_SESSION["Nombre"]=$data[0]["Nombre"];
            $_SESSION["Apellido1"]=$data[0]["Apellido1"];
            $_SESSION["Apellido2"]=$data[0]["Apellido2"];
            $_SESSION["Edad"]=$data[0]["Edad"];
            $_SESSION["Activo"]=$data[0]["Activo"];
            $_SESSION["Email"]=$data[0]["Correo"];
            $_SESSION["Telefono"]=$data[0]["Telefono"];
            $_SESSION["Seguridad"]="5857";
            $_SESSION["User"]=$usuario;
            $_SESSION["Fecha_Nacimiento"]=$data[0]["Fecha_Nacimiento"];
            $_SESSION["Fecha_Ingreso"]=$data[0]["Fecha_Ingreso"];
            $_SESSION["Perfil"]=$data[0]["Id_Perfil"];
            $_SESSION["Id_Usuario"]=$data[0]["Id_Usuario"];

            if ($data[0]["Id_Perfil"] == 1) {
                echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=administrador\'" />';
            } else if ($data[0]["Id_Perfil"] == 2) {
                echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=asistente\'" />';
            } else if ($data[0]["Id_Perfil"] == 3) {
                echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=entrenador\'" />';
            } else if ($data[0]["Id_Perfil"] == 4) {
                echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=cliente\'" />';
            } else {
                // Redirigir a una página por defecto en caso de no coincidir el perfil
                echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=login\'" />';
            }
        }
    }
}

?>