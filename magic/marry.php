<?php
// magic идентификацыя
	//if (rand(1,2)==1) {
	

		if ($_SESSION['uid'] == null) header("Location: index.php");

		$m = mysqli_fetch_array(db_query("SELECT `id`,`align`,`married`,`sex`,`login` FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
		$w = mysqli_fetch_array(db_query("SELECT `id`,`align`,`married`,`sex`,`login` FROM `users` WHERE `login` = '{$_POST['target1']}' LIMIT 1;"));
		$muzh=$_POST['target'];
		$zhena=$_POST['target1'];
		if ($m['id'] and $w['id']) {
			if ($m['married']) {
				echo "<font color=red><b>Персонаж ".$_POST['target']." уже состоит в браке!<b></font>";
			}
			elseif ($w['married']) {
				echo "<font color=red><b>Персонаж ".$_POST['target1']." уже состоит в браке!<b></font>";
			}
			elseif ($m['sex'] != 1) {
				echo "<font color=red><b>Неправильный пол жениха!<b></font>";
			}
			elseif ($w['sex'] != 0) {
				echo "<font color=red><b>Неправильный пол невесты!<b></font>";
			}
			else {
				if (($user['align'] > '2' && $user['align'] < '3') || ($user['align'] > '1.6' && $user['align'] < '2')  || $user['align'] == '3.99') {
					if (db_query("UPDATE `users` SET `married`='{$_POST['target1']}' WHERE `id` = '{$m['id']}' LIMIT 1;") && db_query("UPDATE `users` SET `married`='{$_POST['target']}' WHERE `id` = '{$w['id']}' LIMIT 1;")) {
						$mess="Регистрация брака между &quot;$muzh&quot; и &quot;$zhena&quot;, регистратор &quot;{$user['login']}&quot;.";
						db_query("INSERT INTO `lichka`(`id`,`pers`,`text`,`date`) VALUES ('','".$m['id']."','$mess','".time()."');");
						db_query("INSERT INTO `lichka`(`id`,`pers`,`text`,`date`) VALUES ('','".$w['id']."','$mess','".time()."');");
						db_query("INSERT INTO `paldelo`(`id`,`author`,`text`,`date`) VALUES ('','".$_SESSION['uid']."','$mess','".time()."');");
						echo "<font color=red><b>Успешно зарегистрирован брак между \"$muzh\" и \"$zhena\"!</b></font>";	
					}
					else {
						echo "<font color=red><b>Произошла ошибка!<b></font>";
					}
				}
				else {
					echo "<font color=red><b>Вы не можете зарегистрировать брак!<b></font>";	
				}
			}
		}
		else {
			echo "<font color=red><b>Персонаж \"$muzh\" или \"$zhena\" не существует!<b></font>";
		}
?>
