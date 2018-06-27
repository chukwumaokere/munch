<?php

//Path to your index.php 
$root_web_dir="/var/www/html/munch/";
//Notation you want to use to introduce templates/functions
$delimiterStart='{{';
$delimiterEnd='}}';

//Database Information
$servername = 'localhost';
$dbusername   = '';
$dbpassword   = '';
$dbname     = '';
$link = mysqli_connect($servername, $dbusername, $dbpassword, $dbname);
$db = new mysqli($servername, $dbusername, $dbpassword, $dbname);

