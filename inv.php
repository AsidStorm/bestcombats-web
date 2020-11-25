<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">

<html>
<head>
	<title>Untitled</title>
</head>

<body>

<?php
include'connect.php';
$musor = mysql_query('SELECT `owner` FROM `inventory` WHERE `id`>0');
while ($page=mysql_fetch_array($musor)){
var_dump($page);
}
?>

</body>
</html>
