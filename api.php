<?php
include 'api_base.php';
include 'controllers/render.php';

/*echo "<br><br> requested path=$path <br><br> method = $method<br><br>";*/
$request = new Request();

$path = strtolower($request->url_elements[0]);
$method = $request->verb;

if ($method='GET' && $path ){
	
	$route = $path;
/*
	echo "$path";
	echo "<pre>";
	$smth = print_r($request, true);
	echo $smth;
	echo "</pre>";
	$_SESSION['error_message'] = $smth;
*/
	if (!$request->url_elements[2] && $request->url_elements[2] == ''){
                $endingslash = true;
		if($endingslash == true){
			
		}
                renderPage($route);
        }
	//renderPage($route);
}else{
	var_dump($request);
	echo "heh";
}

function sendToRender(){
	renderPage($route);
}
