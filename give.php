<?php
	session_start();
	if ($_SESSION['uid'] == null) header("Location: index.php");
	include "connect.php";
	$user = mysqli_fetch_array(db_query("SELECT * FROM `users` WHERE `id` = '".db_escape_string($_SESSION['uid'])."' LIMIT 1;"));
	include "functions.php";
	if ($user['battle'] != 0) { header('location: fbattle.php'); die(); }
?><HTML><HEAD>
<link rel=stylesheet type="text/css" href="<?=IMG_PATH?>/css/main.css">
<META Http-Equiv=Cache-Control Content=no-cache>
<meta http-equiv=PRAGMA content=NO-CACHE>
<META Http-Equiv=Expires Content=0>
<SCRIPT src='<?=IMG_PATH?>/js/commoninf.js'></SCRIPT>
<SCRIPT>
var Hint3Name = '';
// Заголовок, название скрипта, имя поля с логином
function findlogin(title, script, name){
	document.all("hint3").innerHTML = '<table width=100% cellspacing=1 cellpadding=0 bgcolor=CCC3AA><tr><td align=center><B>'+title+'</td><td width=20 align=right valign=top style="cursor: hand" onclick="closehint3();"><BIG><B>x</td></tr><tr><td colspan=2>'+
	'<form action="'+script+'" method=POST><table width=100% cellspacing=0 cellpadding=2 bgcolor=FFF6DD><tr><INPUT TYPE=hidden name=sd4 value="<? echo @$user['id']; ?>"><td colspan=2>'+
	'Укажите логин персонажа:<small><BR>(можно щелкнуть по логину в чате)</TD></TR><TR><TD width=50% align=right><INPUT TYPE=text NAME="'+name+'"></TD><TD width=50%><INPUT TYPE="submit" value=" »» "></TD></TR></TABLE></FORM></td></tr></table>';
	document.all("hint3").style.visibility = "visible";
	document.all("hint3").style.left = 100;
	document.all("hint3").style.top = 100;
	document.all(name).focus();
	Hint3Name = name;
}



function returned2(s){
	if (top.oldlocation != '') { top.frames['main'].location=top.oldlocation+'?'+s+'tmp='+Math.random(); top.oldlocation=''; }
	else { top.frames['main'].location='main.php?edit='+Math.random() }
}
<?
$step=1;
if ($step==1) $idkomu=0;
?>
function closehint3(){
	document.all("hint3").style.visibility="hidden";
    Hint3Name='';
}


var transfersale = true;
<?


if (@!$_REQUEST['razdel']) { $_REQUEST['razdel']=1; }
if (@$_REQUEST['FindLogin']) {
	$res=mysqli_fetch_array(db_query("SELECT `id`, `level`, `room`, `align`, (select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online` FROM `users` WHERE `login` ='".db_escape_string($_REQUEST['FindLogin'])."';"));
	$step=3;
}
if (@$_REQUEST['to_id']) {
	$res=mysqli_fetch_array(db_query("SELECT `id`, `level`, `room`, `align`, (select `id` from `online` WHERE `online`.`date` >= ".(time()-60)." AND `online`.`id` = users.`id`) as `online` FROM `users` WHERE `id` ='".db_escape_string($_REQUEST['to_id'])."';"));
	$step=3;
}
if (@$step==3){
	$step=0;
	$id_person_x=$res['id'];
	if (@!$id_person_x) $mess='Персонаж не найден';
	elseif ($id_person_x==$user['id']) $mess='Незачем передавать самому себе';
	elseif ($res['align']==4) $mess='Со склонностью хаос передачи предметов запрещены';
	elseif ($user['align']==4) $mess='Со склонностью хаос передачи предметов запрещены';
	elseif ($res['online']<1) $mess='Персонаж не онлайн';
	elseif ($res['room']!=$user['room']) $mess='Вы должны находиться в одной комнате с тем кому хотите передать вещи';
	elseif ($res['level']<5) $mess='К персонажам до 7-го уровня передачи предметов запрещены';
	elseif ($user['level']<7) $mess='Персонажам до 7-го уровня передачи предметов запрещены';
	else{
		$idkomu=$id_person_x;
		$komu=mysqli_fetch_array(db_query("SELECT * FROM `users` WHERE `id` ='".db_escape_string($idkomu)."';"));
		$mess=$_REQUEST['FindLogin'];
		$step=3;
	}
}else $mess='К персонажам до 7-го уровня передачи предметов запрещены';

if ($step==3) {
	if ($_REQUEST['setkredit']>0 && $_REQUEST['to_id'] && $_REQUEST['sd4']==$user['id'] ) {
		$_REQUEST['setkredit'] = round($_REQUEST['setkredit'],2);
		if ($user['money']<$_REQUEST['setkredit']) $mess="Недостаточно денег";
		else {
			if ((db_query("UPDATE `users` set `money`=`money`-'".db_escape_string(strval($_REQUEST[setkredit]))."' where id='".db_escape_string($user['id'])."'")) && (db_query("UPDATE `users` set `money`=`money`+'".db_escape_string(strval($_REQUEST[setkredit]))."' where id='".db_escape_string($idkomu)."'"))) {
				$mess='Удачно переданы '.strval($_REQUEST[setkredit]).' кр к персонажу '.$komu['login'];
				addchp ('<font color=red>Внимание!</font> Персонаж "'.$user['login'].'" передал вам <B>'.strval($_REQUEST[setkredit]).' кр</B>.   ','{[]}'.$komu['login'].'{[]}');
					db_query("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','".db_escape_string($_SESSION['uid'])."','Переведены кредиты ".db_escape_string(strval($_REQUEST[setkredit]))." от ".db_escape_string($user['login'])." к ".db_escape_string($komu['login'])."','1','".time()."');");
					db_query("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','".db_escape_string($idkomu)."','Переведены кредиты ".db_escape_string(strval($_REQUEST[setkredit]))." от ".db_escape_string($user['login'])." к ".db_escape_string($komu['login'])."','1','".time()."');");
				$user['money']-=$_REQUEST[setkredit];
			}
			else {
				$mess='Произошла ошибка!';
			}
		}
	}
	if ($_REQUEST['setekredit']>0 && $_REQUEST['to_id'] && $_REQUEST['sd4']==$user['id'] ) {
		$_REQUEST['setekredit'] = round($_REQUEST['setekredit'],2);
		if ($user['ekr']<$_REQUEST['setekredit']) $mess="Недостаточно денег";
		else {
			if ((db_query("UPDATE `users` set `ekr`=`ekr`-'".db_escape_string(strval($_REQUEST[setekredit]))."' where id='".db_escape_string($user['id'])."'")) && (db_query("UPDATE `users` set `ekr`=`ekr`+'".db_escape_string(strval($_REQUEST[setekredit]))."' where id='".db_escape_string($idkomu)."'"))) {
				$mess='Удачно переданы '.strval($_REQUEST[setekredit]).' екр к персонажу '.$komu['login'];
				addchp ('<font color=red>Внимание!</font> Персонаж "'.$user['login'].'" передал вам <B>'.strval($_REQUEST[setekredit]).' екр</B>.   ','{[]}'.$komu['login'].'{[]}');
					db_query("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','".db_escape_string($_SESSION['uid'])."','Переведены ЕвроКредиты ".db_escape_string(strval($_REQUEST[setekredit]))." от ".db_escape_string($user['login'])." к ".db_escape_string($komu['login'])."','1','".time()."');");
					db_query("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','".db_escape_string($idkomu)."','Переведены ЕвроКредиты ".db_escape_string(strval($_REQUEST[setekredit]))." от ".db_escape_string($user['login'])." к ".db_escape_string($komu['login'])."','1','".time()."');");
				$user['money']-=$_REQUEST[setekredit];
			}
			else {
				$mess='Произошла ошибка!';
			}
		}
	}
	if ($_REQUEST['setobject'] && $_REQUEST['to_id'] && !$_REQUEST['gift'] && $_REQUEST['sd4']==$user['id'] && $_GET['s4i']==$user['sid']) {
	    $result = db_query("SELECT * FROM `inventory` WHERE `owner` = '".db_escape_string($idkomu)."' AND `prototype` = '11529';");
	    echo db_error();
		$num_rows = mysqli_num_rows($result);
		$res = mysqli_fetch_array(db_query("SELECT * FROM `inventory` WHERE `owner` = '".db_escape_string($_SESSION['uid'])."' AND `id` = '".db_escape_string($_REQUEST['setobject'])."' AND dressed=0 AND `setsale` = 0 AND `present` = '' AND `destinyinv` = '' AND `honor` = 0 AND `artefact` = 0;"));
		if (!$res['id']) $mess="Предмет не найден в рюкзаке";
		elseif ($res['dressed']!=0) $mess="Сначала необходимо снять предмет с себя.";
		elseif ($res['prototype']==11529 and $num_rows>0) $mess="Слишком много таких предметов.";
		elseif ($user['money']<1) $mess='Недостаточно денег на оплату передачи';
		else {
			$value=$res;
			if (@$value['present']) $mess='Нельзя передавать подарки';
			elseif (@$value['destinyinv']) $mess='Вещь связана с вами общей судьбой';
			else{
				$mto = mysqli_fetch_array(db_query("SELECT sum(`massa`) FROM `inventory` WHERE `owner` = '".db_escape_string($idkomu)."' AND `dressed` = 0 AND `honor` = 0 AND `artefact` = 0 AND `setsale` = 0; "));

				$u = $user;
				$user['id'] = $idkomu;
				$allmass=get_meshok_to($idkomu);
				$user = $u;

				$newmass=$mto[0]+$res['massa'];
				if ($newmass<=$allmass) {
					if ((db_query("update `users` set `money`=`money`-1 where `id`='".db_escape_string($user['id'])."'")) && (db_query("update `inventory` set `owner` = '".db_escape_string($komu['id'])."' where `id`='".db_escape_string($res['id'])."' and `owner`= '".db_escape_string($user['id'])."';"))) {
						if (($user['room'] < 501) || ($user['room'] > 560)) {
							db_query("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','".db_escape_string($_SESSION['uid'])."','Передан предмет ".db_escape_string($res['name'])." id:(cap".db_escape_string($res['id']).") [".db_escape_string($res['duration'])."/".db_escape_string($res['maxdur'])."] от ".db_escape_string($user['login'])." к ".db_escape_string($komu['login']).", налог 1 кр.','1','".time()."');");
							db_query("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','".db_escape_string($idkomu)."','Передан предмет ".db_escape_string($res['name'])." id:(cap".db_escape_string($res['id']).") [".db_escape_string($res['duration'])."/".db_escape_string($res['maxdur'])."] от ".db_escape_string($user['login'])." к ".db_escape_string($komu['login']).", налог 1 кр.','1','".time()."');");
						}
						$mess='Удачно передано "'.$value['name'].'" к персонажу '.$komu['login'];
						addchp ('<font color=red>Внимание!</font> Персонаж "'.$user['login'].'" передал вам "'.$value['name'].'".   ','{[]}'.$komu['login'].'{[]}');
						$user['money']-=1;
					}
					else {
						$mess='Произошла ошибка!';
					}
				}
				else {
					$mess='У персонажа "'.$komu['login'].'" переполнен рюкзак!';
				}
			}
		}
	}
	if ($_REQUEST['setobject'] && $_REQUEST['to_id'] && $_REQUEST['gift'] && $_REQUEST['sd4']==$user['id'] && $_GET['s4i']==$user['sid']) {
		$result = db_query("SELECT * FROM `inventory` WHERE `owner` = '".db_escape_string($idkomu)."' AND `prototype` = '11529';");
		$num_rows = mysqli_num_rows($result);
		$res = mysqli_fetch_array(db_query("SELECT * FROM `inventory` WHERE `owner` = '".db_escape_string($_SESSION['uid'])."' AND `id` = '".db_escape_string($_REQUEST['setobject'])."' AND dressed=0 AND `setsale` = 0 AND `present` = '' AND `destinyinv` = '' AND `honor` = 0 AND `artefact` = 0;"));
		if (!$res['id']) $mess="Предмет не найден в рюкзаке";
		elseif ($res['dressed']!=0) $mess="Сначала необходимо снять предмет с себя.";
		elseif ($res['prototype']==11529 and $num_rows>0) $mess="Слишком много таких предметов.";

		else {
			$value=$res;
			if (@$value['present']) $mess='Нельзя передавать подарки';
			elseif (@$value['destinyinv']) $mess='Вещь связана с вами общей судьбой';
			else{
				$mto = mysqli_fetch_array(db_query("SELECT sum(`massa`) FROM `inventory` WHERE `owner` = '".db_escape_string($idkomu)."' AND `dressed` = 0 AND `setsale` = 0; "));

				$u = $user;
				$user['id'] = $idkomu;
				$allmass=get_meshok_to($idkomu);
				$user = $u;

				$newmass=$mto[0]+$res['massa'];
				if ($newmass<=$allmass) {
					if (db_query("update `inventory` set `present` = '".db_escape_string($user['login'])."' ,`owner` = '".db_escape_string($komu['id'])."' where `id`='".db_escape_string($res['id'])."' and `owner`= '".db_escape_string($user['id'])."';")) {
						addchp ('<font color=red>Внимание!</font> Персонаж "'.$user['login'].'" подарил вам "'.$value['name'].'"</B>.   ','{[]}'.$komu['login'].'{[]}');
						if (($user['room'] < 501) || ($user['room'] > 560)) {
							db_query("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','".db_escape_string($_SESSION['uid'])."','Подарен предмет ".db_escape_string($res['name'])." id:(cap".db_escape_string($res['id']).") [".db_escape_string($res['duration'])."/".db_escape_string($res['maxdur'])."] от ".db_escape_string($user['login'])." к ".db_escape_string($komu['login'])."','1','".time()."');");
							db_query("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','".db_escape_string($idkomu)."','Подарен предмет ".db_escape_string($res['name'])." id:(cap".db_escape_string($res['id']).") [".db_escape_string($res['duration'])."/".db_escape_string($res['maxdur'])."] от ".db_escape_string($user['login'])." к ".db_escape_string($komu['login'])."','1','".time()."');");
						}
						$mess='Удачно подарен предмет "'.$value['name'].'"  персонажу '.$komu['login'];
					}
					else {
						$mess='Произошла ошибка!';
					}
				}
				else {
					$mess='У персонажа "'.$komu['login'].'" переполнен рюкзак!';
				}
			}
		}
	}

	if ($_REQUEST['cost'] > 0 && $_REQUEST['to_id']) {
		$res = mysqli_fetch_array(db_query("SELECT * FROM `inventory` WHERE `owner` = '".db_escape_string($_SESSION['uid'])."' AND `dressed`=0 AND `artefact` =0  AND `id` = '".db_escape_string($_REQUEST['id_th'])."' LIMIT 1;"));
		if (!$res['id']) $mess="Предмет не найден в рюкзаке";
		elseif ($res['dressed']!=0) $mess="Сначала необходимо снять предмет.";
		else {
			$value=$res;
			if (@$value['present']) $mess='Нельзя передавать подарки';
			elseif (@$value['destinyinv']) $mess='Вещь связана с вами общей судьбой';
			else{
				#KOMOK_LOG
				$row = $res;
					function calb ($b) {
						global $re;
							$re .= $b;
					}
					$row['count'] = 1;
					$re .= "<table width=100%><TR ><TD align=center ><IMG SRC=\"i/sh/{$row['img']}\" BORDER=0><BR></TD>";
					$re .= "<TD valign=top>";
					
					
					ob_start();
					showitem ($row);
					$re .= ob_get_clean();
					$re .= "</TD></TR></table>";
					$re = str_replace("\n","",$re);
					$mess = 'Предложение персонажу '.$komu['login'].' сделано.';
					db_query("update `inventory` set `tradesale` = '".db_escape_string($_REQUEST['cost'])."' where `id`='".db_escape_string($res['id'])."' and `owner`= '".db_escape_string($res['owner'])."';");
					db_query("INSERT INTO `trade`(`to_id` ,`login`  ,`txt` ,`kr` ,`id` ,`baer` ) VALUES ('".db_escape_string($_SESSION['uid'])."','".db_escape_string($user['login'])."','".db_escape_string($re)."',".db_escape_string($_REQUEST['cost']).",'".db_escape_string($_REQUEST['id_th'])."',".db_escape_string($_REQUEST['to_id']).");");

			}
		}

	}

	if ($_REQUEST['transfersale'] && $_REQUEST['to_id']) {
		$res = mysqli_fetch_array(db_query("SELECT * FROM `inventory` WHERE `dressed`=0 AND `owner` = '".db_escape_string($_REQUEST['to_id'])."' AND `id` = '".db_escape_string($_REQUEST['transfersale'])."' LIMIT 1;"));
		if($user['money'] < $res['tradesale']) {
		    $mess ='<font color=red><b>Не хватает денег для проведения операции</b></font>';
		} 
		else
		{
		    db_query("update `inventory` set `owner` = '".db_escape_string($user['id'])."' where `id`='".db_escape_string($res['id'])."' and `owner`= '".db_escape_string($res['owner'])."';");
		    db_query("update `users` set `money`=`money`-'".db_escape_string($res['tradesale'])."' where `id`='".db_escape_string($user['id'])."'");
		    db_query("update `users` set `money`=`money`+'".db_escape_string($res['tradesale'])."' where `id`='".db_escape_string($_REQUEST['to_id'])."'");
		    if (($user['room'] < 501) || ($user['room'] > 560)) {
		    	db_query("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','".db_escape_string($_SESSION['uid'])."','Покупка за ".db_escape_string($res['tradesale'])."кр (".db_escape_string($res['name']).") у ".$komu['login']."',1,'".time()."');");
		    	db_query("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','".db_escape_string($idkomu)."','Продажа за ".db_escape_string($res['tradesale'])."кр (".db_escape_string($res['name']).") к ".$user['login']."',1,'".time()."');");
		    }
		    $mess='Удачно куплено "'.$res['name'].'" персонажу '.$komu['login'];
		    $mess2='Удачно куплено "'.$res['name'].'" персонажeм '.$user['login'];
		    addchp ('<font color=red>Внимание!</font> '.$mess2,'{[]}'.$komu['login'].'{[]}');
		    $user['money']-=$res['tradesale'];
		}
	}

}
?>

function findmoney(title, script, name, obj){
	document.all("hint3").innerHTML = '<table width=100% cellspacing=1 cellpadding=0 bgcolor=CCC3AA><tr><td align=center><B>'+title+'</td><td width=20 align=right valign=top style="cursor: hand" onclick="closehint3();"><BIG><B>x</td></tr><tr><td colspan=2>'+
	'<form action="'+script+'" method=get><table width=100% cellspacing=0 cellpadding=2 bgcolor=FFF6DD><tr><INPUT TYPE=hidden name=id_th value="'+obj+'"><INPUT TYPE=hidden name=to_id value="<? echo @$komu['id']; ?>"><td colspan=2>'+
	'Укажите cумму:<small></TD></TR><TR><TD width=50% align=right><INPUT TYPE=text NAME="'+name+'"></TD><TD width=50%><INPUT TYPE="submit" value=" »» "></TD></TR></TABLE></FORM></td></tr></table>';
	document.all("hint3").style.visibility = "visible";
	document.all("hint3").style.left = 100;
	document.all("hint3").style.top = 100;
	document.all(name).focus();
	Hint3Name = name;
}

var tologin = '<? echo @($step==3?$komu['login']:''); ?>';
function Sale(to_id, name, n, txt, transfer_kredit){
	var s = prompt("Продать \""+txt+"\" к \""+tologin+"\". Укажите цену:", '');
	if (s != null && s!= '') { // продаем
	    if (confirm("Продать \""+txt+"\" к \""+tologin+"\" за "+parseFloat(s)+" кр. Вы заплатите "+transfer_kredit+"кр. за передачу! Ваш партнер по сделке должен открыть у себя окно обмена. Продолжить?")) {
		   location="/main.php?to_id="+to_id+"&setobject="+name+"&n="+n+"&s4i=<?=$user['sid']?>&sale="+s+"&sd4=<? echo @$user['id']; ?>&0.760742158507544";
		}
	}
}
function transfer(to_id, login, txt, kredit, id, destiny){
	document.getElementById("hint3").innerHTML = '<table width=500 cellspacing=1 cellpadding=0 bgcolor=CCC3AA><tr><td align=center><B>Продажа предмета</td></tr><tr><td>'+
	'<form action="give.php" method=get><table width=100% cellspacing=0 cellpadding=5 bgcolor=FFF6DD><tr><td><INPUT TYPE=hidden name=sd4 value="<? echo @$user['id']; ?>"><INPUT TYPE=hidden name=FindLogin value=0><INPUT TYPE=hidden name=to_id value="'+to_id+'"><INPUT TYPE=hidden name=transfersale value="'+id+'">'+
	'<b>'+login+'</b> <a href="inf.php?'+to_id+'" target=_blank><IMG SRC=i/inf.gif WIDTH=12 HEIGHT=11></a> предлагает Вам купить предмет:<BR>'+
	txt+'<BR>за <font color=red><b>'+kredit+' кр.</b></font><BR>Проводим сделку?</TD></TR><TR><TD align=center><INPUT TYPE=submit '+(destiny?" onclick='return confirm(\"Этот предмет может использовать только "+destiny+" Вы уверены, что хотите его купить?\")'":"")+' value="  ДА  "> &nbsp;&nbsp; <INPUT TYPE=button value=" НЕТ " onclick="closehint3()"></TD></TR></TABLE></FORM></td></tr></table>';
	document.getElementById("hint3").style.visibility = "visible";
	document.getElementById("hint3").style.left = 100;
	document.getElementById("hint3").style.top = 60;
}
function reloadit(){
   if (tologin != '') { location="give.php?FindLogin=0&to_id=<? echo $idkomu; ?>&sd4=<? echo $user['id']; ?>&0.760742158507544" }
}

</SCRIPT>
</HEAD>
<body bgcolor=e2e0e0><div id=hint3 class=ahint></div><div id=hint4 class=ahint></div>
<H3>Передача предметов/кредитов другому игроку</H3>
<TABLE width=100% cellspacing=0 cellpadding=0>
<TR><TD>
<? if ($step==3) {
echo 'К кому передавать: <font color=red><SCRIPT>drwfl("'.@$komu['login'].'",'.@$komu['id'].',"'.@$komu['level'].'","'.@$komu['align'].'","'.@$komu['klan'].'")</SCRIPT></font>';
?> <INPUT TYPE=button value="Сменить" onClick="findlogin('Передача предметов','give.php','FindLogin')"><BR><?
}else{
	$roww = mysqli_fetch_array(db_query("SELECT * FROM `trade` WHERE `baer` = '".db_escape_string($user['id'])."' LIMIT 1;"));
	db_query("DELETE FROM `trade` WHERE `baer` = '".db_escape_string($user['id'])."' LIMIT 1;");
	$rwx = mysqli_fetch_array(db_query("SELECT `id` FROM `inventory` WHERE `owner` = '".db_escape_string($roww['to_id'])."' AND `tradesale` > 0 AND `id` = '".db_escape_string($roww['id'])."' LIMIT 1;"));
	if (!$roww['id'] OR !$rwx['id']) {
?> <SCRIPT>findlogin('Передача предметов','give.php','FindLogin');</SCRIPT><? }
else
 {
	?> <SCRIPT>transfer(<?=$roww['to_id']?>, '<?=$roww['login']?>', '<?=str_replace("\r\n","",$roww['txt'])?>', <?=$roww['kr']?>, <?=$roww['id']?>, '');</SCRIPT><?
 
 }
}
?>

</td><TD align=right>
	<INPUT TYPE=button value="Подсказка" style="background-color:#A9AFC0" onClick="window.open('help/transfer.html', 'help', 'height=300,width=500,location=no,menubar=no,status=no,toolbar=no,scrollbars=yes')">
	<INPUT TYPE=button value="Вернуться" onClick="location.href='main.php'">
</td></tr><tr><td colspan=2 align=right><? if ($step!=4) {?> <FONT COLOR=red><B><? echo $mess; ?></B></FONT> <? } ?></td></tr></table>

<TABLE width=100% cellspacing=0 cellpadding=0>
<FORM ACTION="give.php" METHOD=POST>
<TR>
	<TD valign=top align=left width=40%>
<?
	if ($step==3) { ?>
	<INPUT TYPE=hidden name=to_id value="<? echo $idkomu; ?>">
	<INPUT TYPE=hidden name=sd4 value="<? echo $user['id']; ?>">
	<BR>У вас на счету: <FONT COLOR=339900><B><? echo $user['money']; ?></B></FONT> кр.<BR>
	<small><BR>Передать кредиты, минимально 0.01кр.<BR></small>
	Укажите передаваемую сумму кр: <INPUT TYPE=text NAME=setkredit maxlength=8 size=6>&nbsp;<INPUT TYPE=submit VALUE="Передать">
<!--	<BR>-------------------------------------------------
	<BR>У вас на счету: <FONT COLOR=339900><B><? echo $user['ekr']; ?></B></FONT> екр.<BR>
	<small><BR>Передать ЕвроКредиты, минимально 1 екр.<BR></small>
	Укажите передаваемую сумму екр: <INPUT TYPE=text NAME=setekredit maxlength=8 size=6>&nbsp;<INPUT TYPE=submit VALUE="Передать">
-->
	<?
	}
?>
	</TD>
</FORM>

<FORM ACTION="give.php" METHOD=POST>
<INPUT TYPE=hidden name=sd4 value="<? echo @$user['id']; ?>">
<TD valign=top align=right>

<?
if ($step==3) {


	if (@$_GET['razdel'] == '0') { $_SESSION['razdel'] = 0; }
	if (@$_GET['razdel'] == 1) { $_SESSION['razdel'] = 1; }
	if (@$_GET['razdel'] == 2) { $_SESSION['razdel'] = 2; }
	if (@$_GET['razdel'] == 3) { $_SESSION['razdel'] = 3; }

?>
<TABLE border=0 width=100% cellspacing="0" cellpadding="0" bgcolor="#A5A5A5">
<TR><TD>
	<TABLE border=0 width=100% cellspacing="0" cellpadding="3" bgcolor=#d4d2d2><TR>
	<TD  align=center bgcolor="<?=($_SESSION['razdel']==null)?"#A5A5A5":"#C7C7C7"?>"><A HREF="?to_id=<? echo $idkomu; ?>&edit=1&razdel=0&sd4=<? echo $user['id']; ?>">Обмундирование</A></TD>
	<TD  align=center bgcolor="<?=($_SESSION['razdel']==1)?"#A5A5A5":"#C7C7C7"?>"><A HREF="?to_id=<? echo $idkomu; ?>&edit=1&razdel=1&sd4=<? echo $user['id']; ?>">Заклятия</A></TD>
	<TD  align=center bgcolor="<?=($_SESSION['razdel']==3)?"#A5A5A5":"#C7C7C7"?>"><A HREF="?to_id=<? echo $idkomu; ?>&edit=1&razdel=3&sd4=<? echo $user['id']; ?>">Еда</A></TD>
	<TD  align=center bgcolor="<?=($_SESSION['razdel']==2)?"#A5A5A5":"#C7C7C7"?>"><A HREF="?to_id=<? echo $idkomu; ?>&edit=1&razdel=2&sd4=<? echo $user['id']; ?>">Прочее</A></TD>
	</TR></TABLE>
</TD></TR>
<TR>
	<TD align=center><B>Рюкзак (масса: <?php

	$d = mysqli_fetch_array(db_query("SELECT sum(`massa`) FROM `inventory` WHERE `owner` = '".db_escape_string($_SESSION['uid'])."' AND `dressed` = 0 AND `artefact` ='' AND `honor` ='' AND `setsale` = 0; "));

	echo $d[0];
	?>/<?=get_meshok()?>)</B></TD>
</TR>
<TR><TD align=center><!--Рюкзак-->
<TABLE BORDER=0 WIDTH=100% CELLSPACING="1" CELLPADDING="2" BGCOLOR="#A5A5A5">
<?php
	if ($_SESSION['razdel']==null) {
		$data = db_query("SELECT * FROM `inventory` WHERE `owner` = '".db_escape_string($_SESSION['uid'])."' AND `dressed` = 0 AND `type` < 25 AND `setsale` = 0 AND `present` = '' AND `destinyinv` = '' AND `artefact` =0 ORDER by `update` DESC; ");
	}
	if ($_SESSION['razdel']==1) {
		$data = db_query("SELECT * FROM `inventory` WHERE `owner` = '".db_escape_string($_SESSION['uid'])."' AND `dressed` = 0 AND `type` = 25 AND `setsale` = 0 AND `present` = '' AND `destinyinv` = ''  ORDER by `update` DESC; ");
	}
	if ($_SESSION['razdel']==2) {
		$data = db_query("SELECT * FROM `inventory` WHERE `owner` = '".db_escape_string($_SESSION['uid'])."' AND `dressed` = 0 AND `type` > 50 AND `setsale` = 0 AND `present` = '' AND `destinyinv` = ''  ORDER by `update` DESC; ");
	}
	if ($_SESSION['razdel']==3) {
		$data = db_query("SELECT * FROM `inventory` WHERE `owner` = '".db_escape_string($_SESSION['uid'])."' AND `dressed` = 0 AND `type` = 50 AND `setsale` = 0 AND `present` = ''   AND `destinyinv` = ''  ORDER by `update` DESC; ");
	}
	while($row = mysqli_fetch_array($data)) {
		$row['count'] = 1;
		if (@$i==0) { $i = 1; $color = '#C7C7C7';} else { $i = 0; $color = '#D5D5D5'; }
		echo "<TR bgcolor={$color}><TD align=center ><IMG SRC=\"i/sh/{$row['img']}\" BORDER=0>";
		?>
		<BR>
			<? echo "<A HREF=\"give.php?to_id=".$idkomu."&id_th=".$row['id']."&setobject=".$row['id']."&s4i=".$user['sid']."&sd4=".$user['id']."&tmp=".rand(0,50000000)."\"".'onclick="return confirm(\'Передать предмет '.$row['name'].'?\')">передать&nbsp;за&nbsp;1&nbsp;кр.</A>';
			echo "<br><A HREF=\"give.php?to_id=".$idkomu."&id_th=".$row['id']."&setobject=".$row['id']."&gift=1&s4i=".$user['sid']."&sd4=".$user['id']."&tmp=".rand(0,50000000)."\"".'onclick="return confirm(\'Подарить предмет '.$row['name'].'?\')">подарить</A>';
			 echo "<br><A HREF=#".' onClick="findmoney(\'Продажа предмета\',\'give.php\',\'cost\','.$row['id'].')">продать</A>';
			 ?>

		</TD>
		<?php
		echo "<TD valign=top>";
		showitem ($row);
		echo "</TD></TR>";
	}
	if (mysqli_num_rows($data) == 0) {
		echo "<tr><td align=center bgcolor=#C7C7C7>Пусто</td></tr>";
	}
?>



</TABLE>
</TD></TR>
</TABLE><?php
 }
?>


</TD></TR>
</FORM>
</TABLE>

</BODY>
</HTML>
