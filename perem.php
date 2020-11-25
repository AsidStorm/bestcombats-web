<?php
session_start();
include "connect.php";
$user = mysql_fetch_array(mysql_query("SELECT * from user where id='".$_SESSION['uid']."'"));
?>
