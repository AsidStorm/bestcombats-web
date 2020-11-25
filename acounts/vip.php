<?php
session_start();
include'../connect.php';
$user = mysql_fetch_array(mq("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
if (@$_SESSION['uid'] == null) header("Location: /index.php");
if ($user['room']>100 and $user['room']<106) header("Location: /main.php");
if ($user['vip'] == '1') {
    include 'bronze.php';  
}
if ($user['vip'] == '2') {
    include 'silver.php'; 
}
if ($user['vip'] == '3') {
    include 'gold.php';   
} 
?>