<?php

include 'controllers/render.php';

$route = $_REQUEST['route'];

if(!$route){
	$route = 'home';
}
renderPage($route);

?>
