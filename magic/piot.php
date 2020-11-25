<?php
// magic идентификацыя
	//if (rand(1,2)==1) {
	
$coma[] = "Недопитая бутылка подобна высшему образованию – когда-нибудь потом, обязательно пригодится.  ";
$coma[] = "В пути их уболтало друг от друга.  ";
$coma[] = "Если пьянку нельзя предотвратить, её надо возглавить!  ";
$coma[] = "В приметы не верю – но эти совпадения уже достали. ";
$coma[] = "Все мы там будем ";
$coma[] = "Трезвый пьяному не товарищ, а средство передвижения.  ";
$coma[] = "С тем, кому нечего скрывать, пить не интересно.  ";

		if ($_SESSION['uid'] == null) header("Location: index.php");

		$tar = mysql_fetch_array(mysql_query("SELECT `id`,`bar`,`room` FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;")); 
		mysql_query("select * from `online`  WHERE `id` = '{$tar['id']}';");

		$target=$_POST['target'];
		if ($tar['id']) {
			if ($tar['bar'] == 1) {
				echo "<font color=red><b>Персонаж \"$target\" уже в Баре </b></font>";
			}
			else {
				$ok=0;
				if (($user['align'] > '2' && $user['align'] < '3')  || $user['align'] == '777') {
					$ok=1;
				}
				elseif (($user['align'] > '1.8' && $user['align'] < '2') && ($tar['align'] > '1' && $tar['align'] < '2') && ($user['align'] > $tar['align'])) {
					$ok=1;
				}
				elseif (($user['align'] > '1.8' && $user['align'] < '2') && !($tar['align'] > '2' && $tar['align'] < '3') && !($tar['align'] > '1' && $tar['align'] < '2')) {
					$ok=1;
				}
				elseif (($user['align'] == '1.7' && $tar['level'] == '0') && !($tar['align'] > '2' && $tar['align'] < '3')) {
					$ok=1;
				}
				if ($user['align'] > '3' && $user['align'] < '4') {
					$ok=1;
				}
				if ($ok == 1) {
					if (mysql_query("UPDATE `users` SET `bar`='1',`room`='667' WHERE `id` = {$tar['id']} LIMIT 1;")) {
						mysql_query("UPDATE `online` SET  `room`='667' WHERE `id` = {$tar['id']} LIMIT 1;");

						$ldtarget=$target;
						$ldblock=1;
						if ($user['sex'] == 1) {$action="пошел";}
						else {$action="пошла";}
						if ($user['align'] > '2' && $user['align'] < '3')  {
							$angel="Ангел";
						}
						elseif ($user['align'] > '1' && $user['align'] < '2') {
							$angel="Паладин";
						}
						$mess="$angel &quot;{$user['login']}&quot; $action пить с &quot;$target&quot;.";
						$messch="$angel &quot;{$user['login']}&quot; $action пить с &quot;$target&quot;..";
						
						addch("<img src=i/magic/piot.gif> $messch");
						addchp($coma[rand(0,count($coma)-1)],"Комментатор");
						echo "<font color=red><b>Персонаж \"$target\" согласился пойти с Вами.</b></font>";			
					} 
					else {
						echo "<font color=red><b>Произошла ошибка!<b></font>";
					}
				}
				else {
					echo "<font color=red><b>Он не хочет!<b></font>";
				}
			}
		}
		else {
			echo "<font color=red><b>Персонаж \"$target\" не существует!<b></font>";
		}
?>
