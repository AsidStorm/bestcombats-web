<?php
include "../connect.php";
$data = db_query("SELECT * FROM `shop`");
db_query("Update `inventory`set `honor_cost` = `'".$data["honor_cost"]."'` WHERE `name`=='".$data['name']."'");
?>