<?php
ini_set("display_errors", false);
session_start();
define(PAGE_URL, 'http://www.facebook.com/IdealChile');
define(APP_ID, '1018330218234785');
define(APP_SECRET, 'c5cebef813c1e99e2df41cec3ef280b4');
define(GRHAP_FB, 'https://graph.facebook.com');
define(GRHAP_FB_VIDEO, 'https://graph-video.facebook.com');
define(REST_FB, 'https://api.facebook.com/method');
define(DS, '/');
define(SITE_URL, 'http://localhost:8080/progress/idealparaelverano');
define(SITE_URL_NO_SSL, 'http://localhost:8080/progress/idealparaelverano');
define(SITE_URL_APP, 'localhost:8080/progress/idealparaelverano/');
define(PREFIJO_TBL, "facebook_conect_");

	$conf = array(
		host => 'localhost',
		database => 'ideal',
		user => 'root',
		passwd =>'root'
	);
?>
