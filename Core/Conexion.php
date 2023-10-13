<?php
/**
 * Abre la base de datos de tipo MySQL
 */
class Conexion{
  private $host = "xxx.xxx.xxx.xxx";
  private $usuario = "xxxxxxx";
  private $clave = "xxxxxxxx";
  private $db = "xxxxxxx";
  private $conn;
  
  function __construct()
  {
    $this->conn = mysqli_connect($this->host,$this->usuario,$this->clave,$this->db);
    if (mysqli_connect_errno()) {
      printf("Error en la conexión con la base de datos: %s",
        mysqli_connect_errno()); 
      exit();
    } else {
      //print "Conexión exitosa";
    }

    if (!mysqli_set_charset($this->conn,"utf8")) {
      printf("Error en la conversión de caracteres: %s",
        mysqli_error($this->conn)); 
      exit();
    } else {
      //print "El conjunto de caracteres es: ".mysqli_character_set_name($conn);
    }
  }

  public function querySelect($sql){
    $data = array();
    $r = $this->conn->query($sql);
    while($row= mysqli_fetch_assoc($r))
      array_push($data,$row);
    return $data;
  }

  public function queryNoSelect($sql){
    //Insert, Update y Delete 
    return $this->conn->query($sql);
  }
}
?>