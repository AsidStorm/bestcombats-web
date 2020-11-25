<?php
include "../connect.php";
$data = mysql_query("SELECT * FROM `shop`");
mysql_query("Update `inventory`set `honor_cost` = `'".$data["honor_cost"]."'` WHERE `name`=='".$data['name']."'");
?>