<?php
// магия "шаг назад"
if (rand(1,100)!=1) {
	
	if ($_SESSION['uid'] == null) header("Location: index.php");
	$paket = mysqli_fetch_array(db_query("SELECT `owner`,`id`,`name` FROM `inventory` WHERE `id` = ".$_GET['use']." LIMIT 1;"));
	if ($paket[0] == $user['id']) {
		$inside = db_query("SELECT * FROM `paket` WHERE `id` = ".$paket[1].";");
		while ($row = mysqli_fetch_array($inside)) {
			$ins = eval($row['eval']);
			db_query($ins);
			db_query("DELETE FROM `paket` WHERE `pid` = ".$row['pid'].";");
		}
		echo "<font color=red><b>Вы вскрыли \"".$paket[2]."\".<b></font> ";	
		destructitem($_GET['use']);
	} else {
		echo "<font color=red><b>Это не ваше...<b></font>";
	}
}
?>