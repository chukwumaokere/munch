<?php

//Load Composer's autoloader
//require 'vendor/autoload.php';
//use Mailgun\Mailgun;
//include '../config.php';
include '../../db.php';
//include 'mg.php';
//include 'smtp.php';
global $db;

$email_address=$_REQUEST['email-address'];
$htmlContent = file_get_contents("assets/emailtemplate.html");
if($email_address){
        $useradded = addUser($email_address);
        if($useradded == 1){
           //     $result = $mgClient->sendMessage($domain,
                    array('from'    => 'Socialites Information <info@socialites.app>',
                            'to'      => "$email_address",
                            'subject' => 'Welcome to Socialites Updates!',
                            'html' => $htmlContent,
                        )
                );
                header('Location: ./thanks.php');
        }else{
                $tmp = print_r($useradded, TRUE);
                echo "$tmp";
        }
}else{
        echo "nope";
}

function addUser($email_address){
        global $db;
        $email_address=$email_address;
        $now=date('Y-m-d H:i:s');

        $q="INSERT INTO email_update_list (email, date) VALUES ('$email_address', '$now')";
        if($db->real_query($q)){
                $success=1;
                return $success;
        }else{
                $success=0;
                $error = $db->errno;
                return array($str, false, $error);
        }
}
