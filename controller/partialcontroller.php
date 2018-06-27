<?php

function loadPartial($partial){
	$path="views/partials/$partial.tpl";
        $element=readfile($path);

        return $element; 
}
function koadPartial($something){
        return;
}
