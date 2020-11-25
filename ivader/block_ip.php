<?php
error_reporting(E_ALL);
ini_set('display_errors', true);
ini_set('error_reporting',  E_ALL);

echo "<form method=post><fieldset><legend>Блокировка IP</legend>
	<table><tr><td>IP</td><td><input type='text' name='block_ip'></td></tr>
	<tr><td><input type=submit value='Заблокировать'></td></tr>
	</table>";
echo "</fieldset></form>";

if (isset($_POST['block_ip'])) {
	$fh = fopen("../.htaccess", "a+");
	fwrite($fh, "Deny from ".trim($_POST['block_ip'])."\r\n");
	fclose($fh);
	echo trim($_POST['block_ip'])." заблокирован!";
}


?>