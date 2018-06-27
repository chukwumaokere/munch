<?php

$k="[[http://whoreallyknows.com/mcree.png]]";

$delimiterStart='[[';
$delimiterEnd=']]';

$str="[[loadPartial footer]] [[koadpartial heads]]";

$s="{{loadPartial footer}} {{koadpartial heads}}";

//preg_match('/\[\[(http)\S+(g)\\]\]/' , $k, $matches );

//preg_match_all('/\[\[\S+\s+\S+\\]\]/', $str, $matches);
preg_match_all('/{{\S+\s+\S+}}/', $s, $matches);

foreach($matches[0] as $match){
	var_dump($match);
}

var_dump($matches);
