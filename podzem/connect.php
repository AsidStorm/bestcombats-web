<?php
$mysql =mysql_connect("localhost","superbd1000","1mii4to9");
 mysql_select_db ("superbd1000", $mysql);
     mysql_query("SET NAMES CP1251");

if (!$google) {
	foreach ($_POST as $k=>$v) {
		$_POST[$k] = htmlspecialchars(mysql_real_escape_string($v));
	}
	foreach ($_GET as $k=>$v) {
		$_GET[$k] = htmlspecialchars(mysql_real_escape_string($v));
	}
	foreach ($_REQUEST as $k=>$v) {
		$_REQUEST[$k] = htmlspecialchars(mysql_real_escape_string($v));
	}
}
?>