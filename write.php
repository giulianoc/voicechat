<?php

$room = $_GET['name'];
$msg = $_POST['msg'];

if (($room!="") && ($msg!="")){

if (file_get_contents("rooms/".$room)!="") file_put_contents("rooms/".$room, $msg);

}

?> 
