<?php
ob_start("ob_gzhandler",9);
session_start();
if (@$_SESSION['uid'] == null) header("Location: index.php");
include "connect.php";
include "functions.php";

if ($user['incity'] == 'suburb') {
    include 'city-suburb.php';  
}elseif ($user['incity'] == 'dungeon') {
    include 'city-dungeon.php'; 
}elseif ($user['incity'] == 'emerald') {
    include 'city-emerald.php';   
}elseif ($user['incity'] == 'suncity') {
    include 'city-sun.php';   
} else {
    include 'city-virtcity.php'; 
}

?>