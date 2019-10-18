<?php
require_once "global.php";


$conexion =oci_connect(DB_USERNAME,DB_PASSWORD,DB_HOST,DB_ENCODE);
if(!$conexion){
	echo 'ERROR AL CONECTAR A LA BASE DE DATOS DE ORACLE';
}
else{
	$sql=oci_parse($conexion,'ALTER SESSION SET CURRENT_SCHEMA=GADSPP');
	$resp=oci_parse($sql);
}

if (!function_exists('ejecutarConsulta'))
{
	function ejecutarConsulta($sql)
	{
		global $conexion;
		$query = oci_parse($conexion,$sql);
		$resp=oci_parse($query);
		return $resp;
	}
}
?>
