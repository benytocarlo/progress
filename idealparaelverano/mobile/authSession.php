<?php 
session_start();
require_once 'config.php';
require_once 'class/Proyecto.class.php';
if($_GET):
	$_SESSION['datosFB'] = $_GET;
	extract($_GET);
	$ip = $_SERVER['REMOTE_ADDR'];
	$fbDb = new Proyectos();
		$urlFbFeed = GRHAP_FB.DS.'me'.DS.'?access_token='.$token;
		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $urlFbFeed);
		curl_setopt($ch, CURLOPT_POST, 0);
		curl_setopt($ch, CURLOPT_HEADER, 0);
		curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
		curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
		curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-US; rv:1.8.1.3) Gecko/20070309 Firefox/2.0.0.3");
		$jsonFbAlbum = curl_exec($ch);
		$objJsonDedocde = json_decode($jsonFbAlbum,true);
		@extract( $objJsonDedocde );
		$_SESSION['email'] = $email;
	if( $fbDb->verificaUsuario($uid) ):
    	$fbDb->actualizarUsuario($uid);
	else:
		$fbDb->registrarDatosUsuario($uid,$name,$email,$gender,$link, $ip);
	endif;
else:
	#print false;
endif;
?>