<?php
    session_start();
	require_once 'config.php';
	require_once 'class/Proyecto.class.php';
	$fbDb = new Proyectos();

	$aux = $_POST['aux'];
	$uid = $_SESSION['id'];
	
switch ($aux) {
	case 1:
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
		$nombre 	= utf8_decode($nombre);
		$direccion 	= utf8_decode($direccion);
		$fecha_nac 	= $dia_nac."/".$mes_nac."/".$ano_nac;
		$uid        = $_SESSION['id'];

		$tabla  = PREFIJO_TBL."usuario";
		$campos	= " nombre='$nombre',rut='$rut',email='$email',telefono='$telefono',direccion='$direccion'";
		$donde  = " uid=$uid";

	    $fbDb->sql->sql_update($tabla,$campos,$donde);
		break;
	
	case 2:
		$tabla  = PREFIJO_TBL."usuario";
		$campos	= " respuesta='0'";
		$donde  = " uid=$uid";

	    $fbDb->sql->sql_update($tabla,$campos,$donde);
		break;
}
	
?>