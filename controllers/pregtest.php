<?php
require "../vendor/autoload.php";
use PHPHtmlParser\Dom;
use PHPHtmlParser\Collection;
/*
$k="[[http://whoreallyknows.com/mcree.png]]";

$delimiterStart='[[';
$delimiterEnd=']]';

$str="[[loadPartial footer]] [[koadpartial heads]]";

$s="{{loadPartial footer}} {{koadpartial heads}}";

//preg_match('/\[\[(http)\S+(g)\\]\]/' , $k, $matches );

//preg_match_all('/\[\[\S+\s+\S+\\]\]/', $str, $matches);
preg_match_all('/{{\S+\s+\S+}}/', $s, $matches);
*/

//New test for actions
$str = '<form action="register.php" id="signup">';
$str2 = '<form action = "register.php" id="signup">';
$str3 = '<form action= "register.php" id="signup">';
$str4 = '<form action ="register.php" id="signup">';
$str5 = "<form action='register.php' id='signup'>";

$str6 =  "<form action='register.php' id='signup'> ... </form> <br> <form action = \"register.php\" id=\"signup\"> ... </form>";

$pregString = "/(action)(\s*|\S*).*(php)/";

preg_match_all($pregString, $str6, $matches);

        //Clear out  tags from html
        foreach($matches[0] as $match){
               // $page=str_replace("$match", '', $page);
        }

foreach($matches as $match){
	//var_dump($match);
}

//var_dump($matches);


$dom = new Dom();

$dom->loadStr("<html><form action='register.php' id='signup'> ... </form> <br> <form action = \"forgotpass.php\" id=\"signup\"> ... </form></html>", []);
$dom->loadFromFile('../views/home.bite');
$cont = $dom->find('form')[0];

//var_dump($cont->collection[0]['tag']['attr']['action']['value']);
$cont2 = $cont->getAttribute('action');

var_dump($cont2);
$cont->delete();
unset($cont);

