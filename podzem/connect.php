<?php
if (!$google) {
	foreach ($_POST as $k=>$v) {
		$_POST[$k] = htmlspecialchars(db_escape_string($v));
	}
	foreach ($_GET as $k=>$v) {
		$_GET[$k] = htmlspecialchars(db_escape_string($v));
	}
	foreach ($_REQUEST as $k=>$v) {
		$_REQUEST[$k] = htmlspecialchars(db_escape_string($v));
	}
}
?>