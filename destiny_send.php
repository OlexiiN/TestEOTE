<?php
session_start();

require_once('server.php');

$light=$_POST['light'];
$dark = $_POST['dark'];

$query ="UPDATE destiny
         SET light=$light, dark=$dark";
         
if ($db -> query ($query) ) {
    echo $light;
} else {
    $db -> close();
    die ("Error ". $db -> errno );
}