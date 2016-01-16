<?php
session_start();
require_once 'config.php';
require_once 'class/Proyecto.class.php';
$fbDb = new Proyectos();

	$variables = $_POST['variables'];

	$array = explode('&',$variables);

	for ($i=0;$i <= count($array);$i++){
		$var = explode('=',$array[$i]); 
		$value = urldecode($var[1]);
		$value = str_replace("\"",'',$value);
		$value = str_replace("'",'',$value);
		
			if (!empty($var[0])) {
			$asignacion = "\$".$var[0]."='".$value."';";
			@eval($asignacion);
			}
	}

	//////// Actualiza Datos ///////////
	$nombre		= utf8_decode($nombre);
	$direccion		= utf8_decode($direccion);
	$nombre_mama		= utf8_decode($nombre_mama);
	$id			= $_SESSION['id'];
	$ip = $_SERVER['REMOTE_ADDR'];

	$sql = 'SELECT boleta FROM '.PREFIJO_TBL.'usuario WHERE uid='.trim($id);
	$result = $fbDb->sql->get($sql);

	$tabla  = PREFIJO_TBL."usuario";
	$campos	= " boleta='$boleta',tienda='$tienda',nombre='$nombre',rut='$rut',email='$email',telefono='$telefono',direccion='$direccion',region='$region',nombre_mama='$nombre_mama',edad_mama='$edad_mama',meses_mama='$meses_embarazo'";
	$donde  = " uid='$id'";
    if ( $result[0]["boleta"] != $boleta) {
      $fbDb->sql->sql_update($tabla,$campos,$donde);
      echo "exito";
    }else{
      echo "error";
    }
?>