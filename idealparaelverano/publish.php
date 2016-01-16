<?php include ("header.php"); ?>
<?php
if (!copy("instagram/output_".$_SESSION['pic_name'], "uploads/".$_SESSION['id'].".jpg")) {
	echo "Error al copiar $archivo...\n";
}

	$table	= PREFIJO_TBL."usuario";
	$camps	= "status='1'";
	$donde	= "uid='".$_SESSION['id']."'";
	
	$sql 	= "UPDATE ".$table." SET ".$camps." WHERE ".$donde."";
	$result = mysql_query($sql) or die(mysql_error());
?>
<?php
	/*$pathFull = realpath("uploads/".$_SESSION['id'].".jpg");
	echo "<br>";
	$arrFbPhoto = array(
		"access_token" => $_SESSION['datosFB']['token'],
		"message" => '',
		"source" => '@' . $pathFull
	);

	$urlFbProfileUser = GRHAP_FB.DS.'me'.DS.'photos';
	$curlProfile = curl_init();

	curl_setopt($curlProfile, CURLOPT_URL, $urlFbProfileUser);
	curl_setopt($curlProfile, CURLOPT_HEADER, false);
	curl_setopt($curlProfile, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curlProfile, CURLOPT_SSL_VERIFYPEER, false);
	curl_setopt($curlProfile, CURLOPT_SSL_VERIFYHOST, 0);
	curl_setopt($curlProfile, CURLOPT_POST, true);
	curl_setopt($curlProfile, CURLOPT_POSTFIELDS, $arrFbPhoto);
	curl_setopt($curlProfile, CURLOPT_FOLLOWLOCATION, 1);
	
	$_photo = curl_exec($curlProfile);
	$jsonPhoto = json_decode($_photo,true);
	 $picture = $jsonPhoto['id'];

	unlink('instagram/'.$_SESSION['pic_name']);
	unlink('instagram/output_'.$_SESSION['pic_name']);*/
?>
<script type="text/javascript">
function mostrarInvitaciones(){
FB.ui({ method: 'apprequests', 
	  message: 'Invita a tus amigos',
	  filters: ['app_non_users'],
	  data: 'Texto 2',
	  title: 'Invitación',
	  max_recipients: '15'
	  }, requestCallback);
}

function requestCallback(response) {
	/*alert(response.to);
	location.href = 'photo-marco.php?userid='+response.to;*/
}  
</script>
	<div id="main-content" >
		<div class="holder-button3">
			<a class="buttons other-pic" style="display:none" href="subir_foto.php">Elegir otra foto</a>
		</div>
		<div class="photo4">
			<img src="uploads/<?php echo $_SESSION['id']?>.jpg"  alt="Photo" />
		</div>
		<div class="holder-button5">
			<a class="buttons comparte" href="javascript:void(0);" onclick="mostrarInvitaciones();">Comparte</a>
		</div>
	</div><!-- #main-content -->
<?php include ("footer.php"); ?>