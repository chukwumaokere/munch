<?php
include 'maincontroller.php';
include __DIR__ . '/../config.php';
require "vendor/autoload.php";
use PHPHtmlParser\Dom;
use PHPHtmlParser\Collection;
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
	
	//Get actions
	
	$dom = new Dom();

	$dom->loadFromFile("views/$route.bite");
	$cont = $dom->find('form')[0];
	if($cont){
		$cont2 = $cont->getAttribute('action');
		if($cont2){
			$page=str_replace("$cont2", "actions/$cont2", $page);
			$cont->delete();
			unset($cont);
		}
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
