<?php
include __DIR__ . '/../config.php';
global $db;

function loadPartial($partial){
	$path="views/partials/$partial.bite";
        $element=readfile($path);

        return $element; 
}
function koadPartial($something){
        return;
}
