<?php

Class administradorModel{

    private $db;

    function __construct(){

		$this->db = new Conexion();

	}

	public function getUsuarios(){
		$data=$this->db->querySelect("SELECT Usuarios.*, Perfiles.Tipo_Perfil, Sedes.Nombre_Sede FROM Usuarios INNER JOIN Perfiles ON Usuarios.Id_Perfil = Perfiles.Id_Perfil INNER JOIN Sedes ON Usuarios.Id_Sede = Sedes.Id_Sede");
		return $data;
	}

	public function getClientes(){
		$data=$this->db->querySelect("SELECT * FROM Usuarios WHERE Id_Perfil='4'");
		return $data;
	}

	public function getUsuario($id){
		$data = $this->db->querySelect("SELECT * FROM Usuarios WHERE Id_Usuario='$id'");
		return $data;
	}

	public function getSedes(){
		$data=$this->db->querySelect("SELECT * FROM Sedes");
		return $data;
	}

    public function getPerfiles(){
		$data=$this->db->querySelect("SELECT * FROM Perfiles");
		return $data;
	}

	public function crearUsuario($nombre,$apellido1,$apellido2,$edad,$telefono,$email,$usuario,$contrasena,$palabraClave,$fechaNacimiento,$fechaIngreso,$perfil,$sede,$activo,$ultimo){

		$sql = "INSERT INTO Usuarios(Nombre,Apellido1,Apellido2,Edad,Telefono,Correo,Usuario,Contrasena,Palabra_Clave,Fecha_Nacimiento,Fecha_Ingreso,Id_Perfil,Id_Sede,Activo,Ultimo_Cambio) VALUES ('$nombre','$apellido1','$apellido2','$edad','$telefono','$email','$usuario',md5('$contrasena'),'$palabraClave','$fechaNacimiento','$fechaIngreso','$perfil','$sede','$activo','$ultimo')";
		if ($this->db->queryNoSelect($sql)) {
			echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=administrador/usuarios\'" />';
		exit();
		} else {
		exit("Error al insertar el usuario");
		}
    }

	public function modificarUsuario($id,$nombre,$apellido1,$apellido2,$edad,$telefono,$email,$usuario,$contrasena,$palabraClave,$fechaNacimiento,$fechaIngreso,$perfil,$sede,$activo,$ultimo){

        $sql = "UPDATE Usuarios SET Nombre='$nombre', Apellido1='$apellido1', Apellido2='$apellido2', Edad=$edad, Telefono='$telefono', Correo='$email', Usuario='$usuario', Contrasena=md5('$contrasena'), Palabra_Clave='$palabraClave', Fecha_Nacimiento='$fechaNacimiento', Fecha_Ingreso='$fechaIngreso', Id_Perfil='$perfil', Id_Sede='$sede', Activo='$activo', Ultimo_Cambio='$ultimo' WHERE Id_Usuario='$id'";
		if ($this->db->queryNoSelect($sql)) {
			echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=administrador/usuarios\'" />';
			exit();
		} else {
			exit("Error al modificar el usuario");
		}
	}

	public function borrarUsuario($id){
    
        $sql = "DELETE FROM Usuarios WHERE Id_Usuario='$id'";
        if ($this->db->queryNoSelect($sql)) {
            echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=administrador/usuarios\'" />';
            exit();
        } else {
            exit("Error al borrar el usuario");
        }
    }

	public function getProveedores(){
		$data=$this->db->querySelect("SELECT * FROM Proveedores");
        var_dump($sql);
		return $data;
	}

	public function crearProveedor($nombre,$cedula,$telefono,$email,$direccion,$ultimo){

        $sql = "INSERT INTO Proveedores(Nombre_Proveedor,Cedula,Telefono,Correo,Direccion,Ultimo_Cambio) VALUES ('$nombre','$cedula','$telefono','$email','$direccion','$ultimo')";
            if ($this->db->queryNoSelect($sql)) {
                echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=administrador/proveedores\'" />';
            exit();
            } else {
            exit("Error al insertar el proveedor");
            }
        }

	public function modificarProveedor($id,$nombre,$cedula,$telefono,$email,$direccion,$ultimo){

		$sql = "UPDATE Proveedores SET Nombre_Proveedor='$nombre', Cedula='$cedula', Telefono='$telefono', Correo='$email', Direccion='$direccion', Ultimo_Cambio='$ultimo' WHERE Id_Proveedor='$id'";
			if ($this->db->queryNoSelect($sql)) {
				echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=administrador/proveedores\'" />';
				exit();
			} else {
				exit("Error al modificar el proveedor");
			}
		}

	public function getProveedor($id){
		$data = $this->db->querySelect("SELECT * FROM Proveedores WHERE Id_Proveedor='$id'");
		return $data;
	}

	public function borrarProveedor($id){

        $sql = "DELETE FROM Proveedores WHERE Id_Proveedor='$id'";
        if ($this->db->queryNoSelect($sql)) {
            echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=administrador/proveedores\'" />';
            exit();
        } else {
            exit("Error al borrar el proveedor");
        }
    }

	public function getTransacciones(){
		$data=$this->db->querySelect("SELECT * FROM Transacciones");
        var_dump($sql);
		return $data;
	}

	public function getIngresos(){
		$data=$this->db->querySelect("SELECT * FROM Transacciones WHERE Tipo_Transaccion='Ingreso'");
        var_dump($sql);
		return $data;
	}

	public function crearIngreso($factura,$usuario,$concepto,$metodoPago,$tipoTransaccion,$monto,$fecha,$ultimo,$id){

        $sql = "INSERT INTO Transacciones(Factura_Comprobante,Usuario_Proveedor,Concepto,Metodo_Pago,Tipo_Transaccion,Monto,Fecha_Transaccion,Ultimo_Cambio,Id_Usuario) VALUES ('$factura','$usuario','$concepto','$metodoPago','$tipoTransaccion','$monto','$fecha','$ultimo','$id')";
		if ($this->db->queryNoSelect($sql)) {
			echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=administrador/ingresos\'" />';
			exit();
		} else {
			exit("Error al insertar ingreso");
		}
	}

	public function getIngreso($id){
		$data = $this->db->querySelect("SELECT * FROM Transacciones WHERE Tipo_Transaccion='Ingreso' AND Id_Transaccion='$id'");
		return $data;
	}

	public function modificarIngreso($factura,$concepto,$metodoPago,$monto,$fecha,$ultimo,$idTransaccion){

        $sql = "UPDATE Transacciones SET Factura_Comprobante='$factura', Concepto='$concepto', Metodo_Pago='$metodoPago', Monto='$monto', Fecha_Transaccion='$fecha', Ultimo_Cambio='$ultimo' WHERE Id_Transaccion='$idTransaccion'";
		if ($this->db->queryNoSelect($sql)) {
			echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=administrador/ingresos\'" />';
			exit();
		} else {
			exit("Error al modificar ingreso");
		}
	}

	public function borrarIngreso($id){

        $sql = "DELETE FROM Transacciones WHERE Id_Transaccion='$id'";
        if ($this->db->queryNoSelect($sql)) {
            echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=administrador/ingresos\'" />';
            exit();
        } else {
            exit("Error al borrar el ingreso");
        }
    }

	public function getEgresos(){
		$data=$this->db->querySelect("SELECT * FROM Transacciones WHERE Tipo_Transaccion='Egreso'");
        var_dump($sql);
		return $data;
	}

	public function crearEgreso($factura,$usuario,$concepto,$metodoPago,$tipoTransaccion,$monto,$fecha,$ultimo,$id){

        $sql = "INSERT INTO Transacciones(Factura_Comprobante,Usuario_Proveedor,Concepto,Metodo_Pago,Tipo_Transaccion,Monto,Fecha_Transaccion,Ultimo_Cambio,Id_Proveedor) VALUES ('$factura','$usuario','$concepto','$metodoPago','$tipoTransaccion','$monto','$fecha','$ultimo','$id')";
		var_dump($sql);
		if ($this->db->queryNoSelect($sql)) {
			echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=administrador/egresos\'" />';
			exit();
		} else {
			exit("Error al insertar egreso");
		}
	}

	public function modificarEgreso($factura,$concepto,$metodoPago,$monto,$fecha,$ultimo,$idTransaccion){

        $sql = "UPDATE Transacciones SET Factura_Comprobante='$factura', Concepto='$concepto', Metodo_Pago='$metodoPago', Monto='$monto', Fecha_Transaccion='$fecha', Ultimo_Cambio='$ultimo' WHERE Id_Transaccion='$idTransaccion'";
		if ($this->db->queryNoSelect($sql)) {
			echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=administrador/Egresos\'" />';
			exit();
		} else {
			exit("Error al modificar Egreso");
		}
	}

	public function getEgreso($id){
		$data = $this->db->querySelect("SELECT * FROM Transacciones WHERE Tipo_Transaccion='Egreso' AND Id_Transaccion='$id'");
		return $data;
	}

	public function borrarEgreso($id){

        $sql = "DELETE FROM Transacciones WHERE Id_Transaccion='$id'";
        if ($this->db->queryNoSelect($sql)) {
            echo '<meta http-equiv="refresh" content="0; URL=\'https://kronosgym.jcdesarrollo.com/?pag=administrador/egresos\'" />';
            exit();
        } else {
            exit("Error al borrar el egreso");
        }
    }



}

?>