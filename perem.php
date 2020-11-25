<?php
session_start();
include "connect.php";
$user = mysqli_fetch_array(db_query("SELECT * from user where id='".$_SESSION['uid']."'"));
?>
