<?php
require_once("bd2.Class.php");
class Proyectos {

	//Atributos
	######################################################
	#Atributo obligatorio para manejar la base de datos
	var $sql;
	######################################################
	#metodo constructor
	public function Proyectos(){
		$this->sql = new bd();
		$this->sql->conectar();
	}

	public function registrarDatosUsuario($uid,$nombre,$email,$gender,$link, $ip){

		$nombre 	= utf8_decode($nombre);
		
		$tabla= PREFIJO_TBL."usuario";
		$campos = " uid , nombre, email, genero, url_perfil, ip ";
		$valores = " '$uid', '$nombre', '$email','$gender','$link', '$ip'";
		if ($this->sql->sql_insert($tabla, $campos, $valores)){
			$result=1;
		} else {
			$result=0;
		}
		return $result;
	}

	public function getUsuario( $uid ){
		$sql = 'SELECT uid, nombre, email FROM '.PREFIJO_TBL.'usuario WHERE uid='.trim($uid);
		$result = $this->sql->get($sql);

		if($result):
			return $result;
		else:
			return false;
		endif;
	}

	public function getUsuario2( $uid ){
		$sql = 'SELECT rut,telefono FROM '.PREFIJO_TBL.'usuario WHERE uid='.trim($uid);
		$result = $this->sql->get($sql);

		if( $result[0]['rut'] != "" && $result[0]['telefono'] != "0" ):
			return true;
		else:
			return false;
		endif;
	}

	public function getImagen( $uid ){
		$sql = 'SELECT url_foto,descripcion_auto FROM '.PREFIJO_TBL.'usuario WHERE uid='.trim($uid);
		$result = $this->sql->get($sql);

		if($result):
			return $result;
		else:
			return false;
		endif;
	}

	public function getUsuarios(){
		$sql = 'SELECT * FROM '.PREFIJO_TBL.'usuario';
		$result = $this->sql->get($sql);
		if( $result ):
			return $result;
		else:
			return false;
		endif;
	}

	public function verificaUsuario($uid ){
		$sql = 'SELECT COUNT(*) AS total FROM '.PREFIJO_TBL.'usuario WHERE uid ='.trim($uid);
		$resultTotal = $this->sql->get($sql);
		if( $resultTotal[0]['total'] > 0 ):
			return true;
		else:
			return false;
		endif;
	}

	public function verificaUsuario2($uid ){
		$sql = 'SELECT COUNT(*) AS total FROM '.PREFIJO_TBL.'usuario WHERE uid ='.trim($uid)." AND status=0";
		$resultTotal = $this->sql->get($sql);
		if( $resultTotal[0]['total'] > 0 ):
			return true;
		else:
			return false;
		endif;
	}

	public function actualizarUsuario($uid){

		$tabla= PREFIJO_TBL."usuario";
		$campos=" ultima_actualizacion = NOW() ";
		$donde = " uid=$uid";

		if ($this->sql->sql_update($tabla , $campos, $donde)){
			$result=1;
		} else {
			$result=0;
		}
		return $result;
	}
	
	public function actualizarDatosUsuario($uid,$nombre,$apellido,$rut,$email,$ip){

		$nombre = utf8_decode($nombre);
		$apellido = utf8_decode($apellido);
		$cine = utf8_decode($cine);

		$tabla= PREFIJO_TBL."usuario";
		$campos=" nombre='$nombre', apellido='$apellido', rut='$rut', email='$email', ultima_actualizacion = NOW(), ip='$ip' ";
		$donde = " uid=$uid";

		if ($this->sql->sql_update($tabla , $campos, $donde)){
			$result=1;
		} else {
			$result=0;
		}
		return $result;
	}

	public function findexts ($filename){
		$filename = strtolower($filename) ; 
		$exts = split("[/\\.]", $filename) ; 
		$n = count($exts)-1; 
		$exts = $exts[$n]; 
		return $exts; 
	 }

	public function ieversion() {
		$match=preg_match('/MSIE ([0-9]\.[0-9])/',$_SERVER['HTTP_USER_AGENT'],$reg);
		if($match==0)
			return -1;
		else
			return floatval($reg[1]);
	}

	public function fechaEsp2Eng($fecha){
		list( $dia, $mes, $ano ) = split( '[/.-]', trim($fecha) );
		return "$ano-$mes-$dia";
	}
}
?>