<?php

session_start();
if ($_SESSION['uid'] == null){
    header("Location: index.php");
    die();
}

include "connect.php";
$user = mysqli_fetch_array(db_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
include "functions.php";

if ($user['room'] != 667) {
    header("Location: main.php");
    die();
}

if ($user['battle'] != 0) {
    header('location: fbattle.php');
    die();
}

if( $_GET['exit667'] == 1 ) {
    mq("UPDATE `users`,`online` SET `users`.`room` = '2',`online`.`room` = '2' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
    header("location: main.php");
    die();
}

print "Привет, ты в локации 667, как ты сюда попал?&nbsp;&bull;&nbsp;";
print "<a href='?exit667=1'>Выход</a>";