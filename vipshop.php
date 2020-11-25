<?php
	session_start();
	if ($_SESSION['uid'] == null) header("Location: index.php");
	include "connect.php";
	$user = mysqli_fetch_array(db_query("SELECT * FROM `users` WHERE `id` = '".db_escape_string($_SESSION['uid'])."' LIMIT 1;"));
	include "functions.php";
	$d = mysqli_fetch_array(db_query("SELECT sum(`massa`) FROM `inventory` WHERE `owner` = '".db_escape_string($_SESSION['uid'])."' AND `dressed` = 0 AND `setsale` = 0 ; "));
	if ($user['room'] != 1097) { header("Location: main.php");  die(); }
	if ($user['battle'] != 0) { header('location: fbattle.php'); die(); }

	if ($_GET['sed']) {

		$dress = mysqli_fetch_array(db_query("SELECT * FROM `inventory` WHERE `dressed`= 0 AND `id` = '".db_escape_string($_GET['sed'])."' AND `owner` = '".db_escape_string($_SESSION['uid'])."'  AND `podzem`=0 LIMIT 1;"));
		if($dress["podzem"] == 0){
		$price=$dress['ecost']/1;
		destructitem($dress['id']);
		$allcost=round($price-$dress['duration']*($dress['ecost']/($dress['maxdur']*10)),2);
		db_query("UPDATE `users` set `ekr` = `ekr`+ '".(round($price-$dress['duration']*($dress['ecost']/($dress['maxdur']*10)),2))."' WHERE id = '".db_escape_string($_SESSION['uid'])."' ");
		//$allcost=$dress['ecost']1;
		//db_query("UPDATE `users` set `ekr` = `ekr`+ '".$dress['ecost']."' WHERE id = {$_SESSION['uid']}");
		db_query("INSERT INTO `delo` (`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','".db_escape_string($_SESSION['uid'])."','".db_escape_string($user['login'])." продал в магазин товар: ".db_escape_string($dress['name'])." id:(cap".db_escape_string($dress['id']).") [".db_escape_string($dress['duration'])."".db_escape_string($dress['maxdur'])."] за ".db_escape_string($allcost)." екр. ',1,'".time()."');");
		echo "<font color=red><b>Вы продали \"{$dress['name']}\" за ".$allcost." екр.</b></font>";
		}
	}


	if (($_GET['set'] OR $_POST['set'])) {
		if ($_GET['set']) { $set = $_GET['set']; }
		if ($_POST['set']) { $set = $_POST['set']; }
		if (!$_POST['count']) { $_POST['count'] =1; }
		$dress = mysqli_fetch_array(db_query("SELECT * FROM `vipshop` WHERE `id` = '".db_escape_string($set)."' LIMIT 1;"));
		if (($dress['massa']*$_POST['count']+$d[0]) > (get_meshok())) {
			echo "<font color=red><b>Недостаточно места в рюкзаке.</b></font>";
		}
		elseif(($user['ekr']>= ($dress['ecost']*$_POST['count'])) && ($dress['count'] >= $_POST['count'])) {

			for($k=1;$k<=$_POST['count'];$k++) {
				if(db_query("INSERT INTO `inventory`
				(`prototype`,`owner`,`name`,`type`,`massa`,`ecost`,`img`,`maxdur`,`isrep`,
					`gsila`,`glovk`,`ginta`,`gintel`,`ghp`,`gmana`,`gnoj`,`gtopor`,`gdubina`,`gmech`,`gposoh`,`gfire`,`gwater`,`gair`,`gearth`,`glight`,`ggray`,`gdark`,`needident`,`nsila`,`nlovk`,`ninta`,`nintel`,`nmudra`,`nvinos`,`nnoj`,`ntopor`,`ndubina`,`nmech`,`nposoh`,`nfire`,`nwater`,`nair`,`nearth`,`nlight`,`ngray`,`ndark`,`mfudar`,`mfantiudar`,`bron5`,`zol_zeton`,`godenm`,`timem`,`plus_hp`,`k_kach`,`r_kach`,`d_kach`,`z_kach`,
					`mfkrit`,`mfakrit`,`mfuvorot`,`mfauvorot`,`bron1`,`bron2`,`bron3`,`bron4`,`maxu`,`minu`,`magic`,`nlevel`,`nalign`,`dategoden`,`goden`,`otdel`,`gmp`,`gmeshok`,`artefact`,`destinyinv`,`gift`,`mfkritpow`,`mfantikritpow`,`mfparir`,`mfshieldblock`,`mfcontr`,`mfrub`,`mfkol`,`mfdrob`,`mfrej`,`mfdhit`,`mfdmag`,`mfhitp`,`mfmagp`,`opisan`,`second`,`dvur`
				)
				VALUES
					
				('".db_escape_string($dress['id'])."','".db_escape_string($_SESSION['uid'])."','".db_escape_string($dress['name'])."','".db_escape_string($dress['type'])."',".db_escape_string($dress['massa']).",".db_escape_string($dress['ecost']).",'".db_escape_string($dress['img'])."',".db_escape_string($dress['maxdur']).",".db_escape_string($dress['isrep']).",'".db_escape_string($dress['gsila'])."','".db_escape_string($dress['glovk'])."','".db_escape_string($dress['ginta'])."','".db_escape_string($dress['gintel'])."','".db_escape_string($dress['ghp'])."','".db_escape_string($dress['gmana'])."','".db_escape_string($dress['gnoj'])."','".db_escape_string($dress['gtopor'])."','".db_escape_string($dress['gdubina'])."','".db_escape_string($dress['gmech'])."','".db_escape_string($dress['gposoh'])."','".db_escape_string($dress['gfire'])."','".db_escape_string($dress['gwater'])."',
				'".db_escape_string($dress['gair'])."','".db_escape_string($dress['gearth'])."','".db_escape_string($dress['glight'])."','".db_escape_string($dress['ggray'])."','".db_escape_string($dress['gdark'])."','".db_escape_string($dress['needident'])."','".db_escape_string($dress['nsila'])."','".db_escape_string($dress['nlovk'])."','".db_escape_string($dress['ninta'])."','".db_escape_string($dress['nintel'])."','".db_escape_string($dress['nmudra'])."','".db_escape_string($dress['nvinos'])."','".db_escape_string($dress['nnoj'])."','".db_escape_string($dress['ntopor'])."','".db_escape_string($dress['ndubina'])."','".db_escape_string($dress['nmech'])."','".db_escape_string($dress['nposoh'])."','".db_escape_string($dress['nfire'])."','".db_escape_string($dress['nwater'])."','".db_escape_string($dress['nair'])."','".db_escape_string($dress['nearth'])."','".db_escape_string($dress['nlight'])."','".db_escape_string($dress['ngray'])."','".db_escape_string($dress['ndark'])."','".db_escape_string($dress['mfudar'])."','".db_escape_string($dress['mfantiudar'])."','".db_escape_string($dress['bron5'])."','".db_escape_string($dress['zol_zeton'])."','".db_escape_string($dress['godenm'])."','".db_escape_string($dress['timem'])."','".db_escape_string($dress['plus_hp'])."','".db_escape_string($dress['k_kach'])."','".db_escape_string($dress['r_kach'])."','".db_escape_string($dress['d_kach'])."','".db_escape_string($dress['z_kach'])."',
				'".db_escape_string($dress['mfkrit'])."','".db_escape_string($dress['mfakrit'])."','".db_escape_string($dress['mfuvorot'])."','".db_escape_string($dress['mfauvorot'])."','".db_escape_string($dress['bron1'])."','".db_escape_string($dress['bron2'])."','".db_escape_string($dress['bron3'])."','".db_escape_string($dress['bron4'])."','".db_escape_string($dress['maxu'])."','".db_escape_string($dress['minu'])."','".db_escape_string($dress['magic'])."','".db_escape_string($dress['nlevel'])."','".db_escape_string($dress['nalign'])."','".(($dress['goden'])?($dress['goden']*24*60*60+time()):"")."','".db_escape_string($dress['goden'])."','".db_escape_string($dress['razdel'])."','".db_escape_string($dress['gmp'])."','".db_escape_string($dress['gmeshok'])."','".db_escape_string($dress['artefact'])."','".db_escape_string($dress['destiny'])."','".db_escape_string($dress['gift'])."','".db_escape_string($dress['mfkritpow'])."','".db_escape_string($dress['mfantikritpow'])."',
				'".db_escape_string($dress['mfparir'])."','".db_escape_string($dress['mfshieldblockj'])."','".db_escape_string($dress['mfcontr'])."','".db_escape_string($dress['mfrub'])."','".db_escape_string($dress['mfkol'])."','".db_escape_string($dress['mfdrob'])."','".db_escape_string($dress['mfrej'])."','".db_escape_string($dress['mfdhit'])."','".db_escape_string($dress['mfdmag'])."','".db_escape_string($dress['mfhitp'])."','".db_escape_string($dress['mfmagp'])."','".db_escape_string($dress['opisan'])."','".db_escape_string($dress['second'])."','".db_escape_string($dress['dvur'])."') ;"))
				{
					$good = 1;
				}
				else {
					$good = 0;
				}
			}
			if ($good) {
				db_query("UPDATE `vipshop` SET `count`=`count`-'".db_escape_string($_POST['count'])."' WHERE `id` = '".db_escape_string($set)."' LIMIT 1;");
				echo "<font color=red><b>Вы купили {$_POST['count']} шт. \"{$dress['name']}\".</b></font>";
				db_query("UPDATE `users` set `ekr` = `ekr`- '".db_escape_string($_POST['count']*$dress['ecost'])."' WHERE id = '".db_escape_string($_SESSION['uid'])."' ;");
				$user['ekr'] -= $_POST['count']*$dress['ecost'];
				$limit=$_POST['count'];
				$invdb = db_query("SELECT `id` FROM `inventory` WHERE `name` = '".db_escape_string($dress['name'])."' ORDER by `id` DESC LIMIT ".db_escape_string($limit)." ;" );
				//$invdb = db_query("SELECT id FROM `inventory` WHERE `name` = '".{$dress['name']}."' ORDER by `id` DESC LIMIT $limit ;" );
				if ($limit == 1) {
					$dressinv = mysqli_fetch_array($invdb);
					$dressid = "cap".$dressinv['id'];
					$dresscount=" ";
				}
				else {
					$dressid="";
					while ($dressinv = mysqli_fetch_array($invdb))  {
						$dressid .= "cap".$dressinv['id'].",";
					}
					$dresscount="(x".$_POST['count'].") ";
				}
				$allcost=$_POST['count']*$dress['ecost'];
				db_query("INSERT INTO `delo` (`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','".db_escape_string($_SESSION['uid'])."','".db_escape_string($user['login'])." купил товар: ".db_escape_string($dress['name'])." ".db_escape_string($dresscount)."id:(".db_escape_string($dressid).") [0/".db_escape_string($dress['maxdur'])."] за ".db_escape_string($allcost)." екр. ',1,'".time()."');");
			}
		}
		else {
			echo "<font color=red><b>Недостаточно денег или нет вещей в наличии.</b></font>";
		}
	}

?>
<HTML><HEAD>
<link rel=stylesheet type="text/css" href="http://img.also.bestcombats.net/i/main.css">
<META Http-Equiv=Cache-Control Content=no-cache>
<meta http-equiv=PRAGMA content=NO-CACHE>
<META Http-Equiv=Expires Content=0>
<body leftmargin=5 topmargin=5 marginwidth=5 marginheight=5 bgcolor=#e2e0e0 style="background-image: url(http://img.combats.com/i/misc/showitems/p_portal21.jpg);background-repeat:no-repeat;background-position:top right">
<SCRIPT LANGUAGE="JavaScript"> 
function AddCount(name, txt)
{
	document.all("hint3").innerHTML = '<table border=0 width=100% cellspacing=1 cellpadding=0 bgcolor="#CCC3AA"><tr><td align=center><B>Купить неск. штук</td><td width=20 align=right valign=top style="cursor: hand" onclick="closehint3();"><BIG><B>x</TD></tr><tr><td colspan=2>'+
	'<table border=0 width=100% cellspacing=0 cellpadding=0 bgcolor="#FFF6DD"><tr><INPUT TYPE="hidden" name="set" value="'+name+'"><td colspan=2 align=center><B><I>'+txt+'</td></tr><tr><td width=80% align=right>'+
	'Количество (шт.) <INPUT TYPE="text" NAME="count" size=4></td><td width=20%>&nbsp;<INPUT TYPE="submit" value=" »» ">'+
	'</TD></TR></TABLE></td></tr></table>';
	document.all("hint3").style.visibility = "visible";
	document.all("hint3").style.left = event.x+document.body.scrollLeft-20;
	document.all("hint3").style.top = event.y+document.body.scrollTop+5;
	document.all("count").focus();
}
// Закрывает окно
function closehint3()
{
	document.all("hint3").style.visibility="hidden";
}
</SCRIPT>
</HEAD>
<body leftmargin=5 topmargin=5 marginwidth=5 marginheight=5 bgcolor=#e0e0e0>

<TABLE border=0 width=100% cellspacing="0" cellpadding="0">
<FORM action="city.php" method=GET>
 <tr><div align=center><h3></h3></div><td align=right>
<INPUT TYPE="button" value="Подсказка" style="background-color:#A9AFC0" onClick="window.open('help/shop.html', 'help', 'height=300,width=500,location=no,menubar=no,status=no,toolbar=no,scrollbars=yes')">
<INPUT TYPE="submit" value="Вернуться" name="cp"></td></tr>
</FORM>
</table>
<TABLE border=0 width=100% cellspacing="0" cellpadding="4">
<TR>
    <FORM METHOD=POST ACTION="vipshop.php">
	<INPUT TYPE="hidden" name="sid" value="">
	<INPUT TYPE="hidden" name="id" value="1">
	<TD valign=top align=left>
<!--Магазин-->
<TABLE border=0 width=100% cellspacing="0" cellpadding="0" bgcolor="#b08b5f">
<TR>
	<TD align=center><B>Отдел "<?php
	if ($_POST['sale']) {
		echo "Скупка";
	} else
switch ($_GET['otdel']) {
	case null:
		echo "Оружие: кастеты,ножи";
		$_GET['otdel'] = 1;
	break;
	case 1:
		echo "Оружие: кастеты,ножи";
	break;

	case 11:
		echo "топоры";
	break;

	case 12:
		echo "дубины,булавы";
	break;

	case 13:
		echo "мечи";
	break;
	
	case 52:
		echo "магические посохи";
	break;

	case 2:
		echo "Одежда: сапоги";
	break;

	case 21:
		echo "перчатки";
	break;
	
	case 100:
		echo "Плащи";
	break;

        case 53:
		echo "рубахи";
	break;	
        
        case 22:
		echo "легкая броня";
	break;

	case 23:
		echo "тяжелая броня";
	break;

	case 24:
		echo "шлемы";
	break;

	case 25:
		echo "наручи";
	break;

	case 26:
		echo "пояса";
	break;

	case 27:
		echo "поножи";
	break;

	case 3:
		echo "Щиты";
	break;

	case 4:
		echo "Ювелирные товары: серьги";
	break;

	case 41:
		echo "ожерелья";
	break;

	case 42:
		echo "кольца";
	break;

	break;

	case 5:
		echo "Заклинания: нейтральные";
	break;

	case 51:
		echo "Заклинания: боевые и защитные";
	break;

	case 54:
		echo "исцеляющие";
	break;
	
	case 55:
		echo "манящие";
	break;
	
	case 56:
		echo "стратегические";
	break;
	
	case 57:
		echo "тактические";
	break;

	case 189:
		echo "Эликсиры";
	break;

	case 6:
		echo "Амуниция";
	break;
		echo "Сувениры: открытки";
	break;
	case 71:
		echo "Сувениры: подарки";
	break;
       case 300:
		echo "Букеты";
	break;
}


	?>"</B>

	</TD>
</TR>
<TR><TD><!--Рюкзак-->
<TABLE BORDER=0 WIDTH=100% CELLSPACING="1" CELLPADDING="2" BGCOLOR="#b08b5f">
<?
if($_REQUEST['present']) {

	if($_POST['to_login'] && $_POST['flower']) {
		$to = mysqli_fetch_array(db_query("SELECT * FROM `users` WHERE `login` = '".db_escape_string($_POST['to_login'])."' LIMIT 1;"));
		if ($_POST['to_login'] == $user['login']) {
			echo "<b><font color=red>Очень щедро дарить что-то самому себе ;)</font></b>";
		
                   }     
                         elseif ($to['room'] > 500 && $to['room'] < 561) {
			echo "<b><font color=red>Персонаж в данный момент участвует в турнире в Башне Смерти. Попробуйте позже.</font></b>";
		}
		else {

			if($_POST['from']==1) { $from = 'Аноним'; }
			elseif($_POST['from']==2 && $user['klan']) { $from = ' клана '.$user['klan']; }
			else {$from = $user['login'];}
			if ($to) if(db_query("UPDATE `inventory` SET `owner` = '".db_escape_string($to['id'])."', `present` = '".db_escape_string($from)."', `letter` = '".db_escape_string($_POST['podarok2'])."' WHERE  `present` = '' AND `id` = '".db_escape_string($_POST['flower'])."' AND `owner` = '".db_escape_string($_SESSION['uid'])."' AND `dressed` = 0  AND `setsale`=0")) {
				$res = mysqli_fetch_array(db_query("SELECT * FROM `inventory` WHERE `id` = '".db_escape_string($_POST['flower'])."' LIMIT 1; "));
				$buket_name=$res['name'];
				db_query("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','".db_escape_string($_SESSION['uid'])."','Подарен предмет ".db_escape_string($res['name'])." id:(cap".db_escape_string($res['id']).") [".$res['duration']."".db_escape_string($res['maxdur'])."] от ".db_escape_string($from)." к ".db_escape_string($to['login'])."','1','".time()."');");
				db_query("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','".db_escape_string($to['id'])."','Подарен предмет ".db_escape_string($res['name'])." id:(cap".db_escape_string($res['id']).") [".db_escape_string($res['duration'])."".db_escape_string($res['maxdur'])."] от ".db_escape_string($from)." к ".db_escape_string($to['login'])."','1','".time()."');");
				if(($_POST['from']==1) || ($_POST['from']==2)) {
					$action="подарил";
					db_query("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','".db_escape_string($to['id'])."','Подарен предмет ".db_escape_string($res['name'])." id:(cap".db_escape_string($res['id']).") [".db_escape_string($res['duration'])."".db_escape_string($res['maxdur'])."] от ".db_escape_string($user['login'])." к ".db_escape_string($to['login'])."','5','".time()."');");
				}
				else {
					if ($user['sex'] == 0) {$action="подарила";}
					else {$action="подарил";}
				}
				$us = mysqli_fetch_array(db_query("select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = '".db_escape_string($to['id'])."' LIMIT 1;"));
				if($us[0]){
					addchp ('<font color=red>Внимание!</font> <span oncontextmenu=OpenMenu()>'.$from.'</span> '.$action.' вам <B>'.$buket_name.'</B>.   ','{[]}'.$_POST['to_login'].'{[]}');
				} else {
					// если в офе
					db_query("INSERT INTO `telegraph` (`owner`,`date`,`text`) values ('".db_escape_string($to['id'])."','','".'<font color=red>Внимание!</font> <span oncontextmenu=OpenMenu()>'.db_escape_string($from).'</span> '.db_escape_string($action).' вам <B>'.db_escape_string($buket_name).'</B>.   '."');");
				}
				echo "<b><font color=red>Подарок удачно доставлен к \"",$_POST['to_login'],"\"</font></b>";
			}
			echo db_error();
		}
	}

		?>

<!-- Подарить подарок -->
<form method="post">
<TABLE cellspacing=0 cellpadding=0 width=100% bgcolor=#e0e0e2><TD>
<INPUT TYPE=hidden name=present value=1>
Вы можете сделать подарок дорогому человеку. Ваш подарок будет отображаться в информации о персонаже.
<OL>
<LI>Укажите логин персонажа, которому хотите сделать подарок<BR>
Login <INPUT TYPE=text NAME=to_login value="">
<LI>Цель подарка. Будет отображаться в информации о персонаже (не более 60 символов)<BR>
<INPUT TYPE=text NAME=podarok2 value="" maxlength=60 size=50>
<LI>Напишите текст сопроводительной записки (в информации о персонаже не отображается)<BR>
<TEXTAREA NAME=txt ROWS=6 COLS=80></TEXTAREA>
<LI>Выберите, от чьего имени подарок:<BR>
<INPUT TYPE=radio NAME=from value=0 checked> <? nick2($user['id']);?><BR>
<INPUT TYPE=radio NAME=from value=1 > анонимно<BR>
<INPUT TYPE=radio NAME=from value=2 > от имени клана<BR>
<LI>Нажмите кнопку <B>Подарить</B> под предметом, который хотите преподнести в подарок:<BR>
</OL>
<input type="hidden" name="flower" id="flower" value="">
<TABLE BORDER=0 WIDTH=100% CELLSPACING="1" CELLPADDING="2" BGCOLOR="#A5A5A5">
<?

//print_r($_POST);

	$data = db_query("SELECT * FROM `inventory` WHERE `owner` = '".db_escape_string($_SESSION['uid'])."' AND `dressed` = 0 AND `gift`=1 AND `setsale`=0 AND `present` = '' ORDER by `id` DESC; ");
	while($row = mysqli_fetch_array($data)) {
		if(!in_array($row['id'],array_keys($_SESSION['flowers']))) {
			$row['count'] = 1;
			if ($i==0) { $i = 1; $color = '#C7C7C7';} else { $i = 0; $color = '#D5D5D5'; }
			echo "<TR bgcolor={$color}><TD align=center style='width:150px'><IMG SRC=\"http://img.also.bestcombats.net/i/sh/{$row['img']}\" BORDER=0>";
			?>
			<BR><input type="submit" onclick="document.all['flower'].value='<?=$row['id']?>';" value="Подарить">
			</TD>
			<?php
			echo "<TD valign=top>";
			showitem ($row);
			echo "</TD></TR>";
		}
	}
?>
</table>
</form>
<?
	}
	else
if ($_REQUEST['sale']) {
	$data = db_query("SELECT * FROM `inventory` WHERE `owner` = '".db_escape_string($_SESSION['uid'])."' AND `dressed` = 0  AND `setsale`=0  AND `podzem`=0 AND `gift`=0 AND `honor`=0 AND `cost`=0 ORDER by `update` DESC; ");
	while($row = mysqli_fetch_array($data)) {
		$row['count'] = 1;
		if ($i==0) { $i = 1; $color = '#C7C7C7';} else { $i = 0; $color = '#D5D5D5'; }
		echo "<TR bgcolor={$color}><TD align=center style='width:150px'><IMG SRC=\"http://img.also.bestcombats.net/i/sh/{$row['img']}\" BORDER=0>";

		$price=$row['ecost']/1;

		?>
		<BR><A HREF="vipshop.php?sed=<?=$row['id']?>&sid=&sale=1">продать за <?=round($price-$row['duration']*($row['ecost']/($row['maxdur']*10)),2)?></A>
		
		</TD>
		<?php
		echo "<TD valign=top>";
		showitem ($row);
		echo "</TD></TR>";
	}
} else
{
	$data = db_query("SELECT * FROM `vipshop` WHERE `count` > 0 AND `razdel` = '".db_escape_string($_GET['otdel'])."' ORDER by `ecost` ASC, `nlevel` ASC");
		while($row = mysqli_fetch_array($data)) {
		if ($i==0) { $i = 1; $color = '#dabc98';} else { $i = 0; $color = '#D5D5D5'; }
		echo "<TR bgcolor={$color}><TD align=center style='width:150px'><IMG SRC=\"http://img.also.bestcombats.net/i/sh/{$row['img']}\" BORDER=0>";
		?>
                <BR><A HREF="vipshop.php?otdel=<?=$_GET['otdel']?>&set=<?=$row['id']?>&sid=">купить</A> 		
                <IMG SRC="i/up.gif" WIDTH=11 HEIGHT=11 BORDER=0 ALT="Купить несколько штук" style="cursor:hand" onClick="AddCount('<?=$row['id']?>', '<?=$row['name']?>')"></TD>
		<?php
		echo "<TD valign=top>";
		showitem ($row);
		echo "</TD></TR>";
	}
}
	$user8 = mysqli_fetch_array(db_query("SELECT ekr FROM `users` WHERE `id` = '".db_escape_string($_SESSION['uid'])."' LIMIT 1;"));
      
?>
</TABLE>
</TD></TR>
</TABLE>

	</TD>
	<TD valign=top width=280>

	<CENTER><B>Масса всех ваших вещей: <?php


	echo $d[0];
	?>/<?=get_meshok()?><BR><u>
	У вас в наличии: <FONT COLOR="#FF0000"><?=$user8['ekr']?></FONT> екр.</u></B></CENTER>
	<div style="MARGIN-LEFT:15px; MARGIN-TOP: 10px;">
      <INPUT TYPE="submit" value="Продать Арты" name="sale"><BR>


<div style="background-color:#d2d0d0;padding:1"><center><font color="#oooo"><B>Отделы магазина</B></center></div>
<A HREF="vipshop.php?otdel=1&sid=&0.162486541405194">Оружие: кастеты,ножи</A><BR>
<A HREF="vipshop.php?otdel=11&sid=&0.337606814894404">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;топоры</A><BR>
<A HREF="vipshop.php?otdel=12&sid=&0.286790872806733">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;дубины,булавы</A><BR>
<A HREF="vipshop.php?otdel=13&sid=&0.0943516060419363">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;мечи</A><BR>
<A HREF="vipshop.php?otdel=52&sid=&0.0943516060419363">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;магические посохи</A><BR>
<A HREF="vipshop.php?otdel=2&sid=&0.76205958316951">Одежда: сапоги</A><BR>
<A HREF="vipshop.php?otdel=21&sid=&0.648260824682342">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;перчатки</A><BR>
<A HREF="vipshop.php?otdel=100&sid=&0.648260824682342">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;плащи</A><BR>
<A HREF="vipshop.php?otdel=53&sid=&0.648260824682342">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;рубахи</A><BR>
<A HREF="vipshop.php?otdel=22&sid=&0.520447517792988">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;легкая броня</A><BR>
<A HREF="vipshop.php?otdel=23&sid=&0.99133839275569">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;тяжелая броня</A><BR>
<A HREF="vipshop.php?otdel=24&sid=&0.567932791291376">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;шлемы</A><BR>
<A HREF="vipshop.php?otdel=25&sid=&0.567932791296566">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;наручи</A><BR>
<A HREF="vipshop.php?otdel=26&sid=&0.567932791291655">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;пояса</A><BR>
<A HREF="vipshop.php?otdel=27&sid=&0.567932791291687">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;поножи</A><BR>
<A HREF="vipshop.php?otdel=3&sid=&0.725667864710179">Щиты</A><BR>
<A HREF="vipshop.php?otdel=4&sid=&0.321709306035984">Ювелирные товары: серьги</A><BR>
<A HREF="vipshop.php?otdel=41&sid=&0.902093651333512">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ожерелья</A><BR>
<A HREF="vipshop.php?otdel=42&sid=&0.510210803380268">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;кольца</A><BR>
<A HREF="vipshop.php?otdel=5&sid=&0.648834385828923">Заклинания: нейтральные</A><BR>
<A HREF="vipshop.php?otdel=51&sid=&0.722009624500359">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;боевые и защитные</A><BR>
<A HREF="vipshop.php?otdel=54&sid=&0.722009624500359">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;исцеляющие</A><BR>
<A HREF="vipshop.php?otdel=55&sid=&0.722009624500359">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;манящие</A><BR>
<A HREF="vipshop.php?otdel=56&sid=&0.722009624500359">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;стратегические</A><BR>
<A HREF="vipshop.php?otdel=57&sid=&0.722009624500359">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;тактические</A><BR>
<A HREF="vipshop.php?otdel=189&sid=&0.722009624500359">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Эликсиры</A><BR>
<A HREF="vipshop.php?otdel=6&sid=&0.925798340638547">Амуниция</A><BR>
<A HREF="vipshop.php?otdel=7&sid=&0.925798340638547">Сувениры: открытки</A><BR>
<A HREF="vipshop.php?otdel=300&sid=&0.722009624500359">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Букеты</A><BR>
<A HREF="vipshop.php?otdel=71&sid=&0.925798340638547">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;подарки</A><BR>
<A HREF="vipshop.php?present=1">Сделать подарки</A><BR>
	</div>

<div id="hint3" class="ahint"></div>
    </TD>
    </FORM>
</TR>
</TABLE>
</BODY>
</HTML>