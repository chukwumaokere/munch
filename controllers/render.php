<?php
include 'maincontroller.php';
include __DIR__ . '/../config.php';
global $delimiterStart, $delimiterEnd, $db;

function renderPage($route){
	global $delimiterStart, $delimiterEnd;

	$base=file_get_contents("views/base.bite");
	$content = file_get_contents("views/$route.bite");
	if ($content == false){
		$content = file_get_contents("views/404.bite");
	}

	$delimitedString=$delimiterStart."content".$delimiterEnd;
	
	//Creates the early version of the page
	$page=str_replace($delimitedString, $content, $base);

	//Regex to find your tags
	$pregString = "/$delimiterStart\S+\s+\S+$delimiterEnd/";

	preg_match_all($pregString, $page, $matches);
	
	//Clear out  tags from html
	foreach($matches[0] as $match){
		$page=str_replace("$match", '', $page);
	}

	//Prints the page
	echo $page;
	
	//Runs the function specified in the tag
	foreach($matches[0] as $match){
                $match = str_replace($delimiterStart, '', $match);
                $stripped = str_replace($delimiterEnd, '', $match);
                $smth = explode(' ',$stripped);
                $func = $smth[0];
                $param = $smth[1];

                $append = $func($param);
        }

}
