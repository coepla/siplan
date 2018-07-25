<?php

class conexion{
    
        protected $hostname_siplan_data_conn = "localhost";
        protected $username_siplan_data_conn = "siplan2019_USR";
        protected $password_siplan_data_conn = '99yH8}@(pw$E2je)';

	protected $error_conexion = "Error en la conexión al Servidor, favor de informar al webmaster";
	protected $conexion;
	function conectar(){
	  $this->conexion = mysql_pconnect($this->hostname_siplan_data_conn,$this->username_siplan_data_conn,$this->password_siplan_data_conn) or die($this->error_conexion);
          return $this->conexion;
	}
}

$conn = new conexion;
$siplan_data_conn = $conn->conectar();
mysql_select_db("siplan2019",$siplan_data_conn);
mysql_query("SET NAMES 'utf8'",$siplan_data_conn);
?>
