<?php
include '/config.php';
global $delimiterStart, $delimiterEnd;

function renderPage($route){
	$base=file_get_contents("views/base.tpl");
	$content = file_get_contents("views/$route.tpl");
	$page=str_replace($delimiterStart."content".$delimiterEnd, $content, $base);
	
	if($page contains 	

	echo $page;
}

function loadPartial(
