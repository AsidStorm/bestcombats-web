<?php
	session_start();
	if ($_SESSION['uid'] == null) header("Location: index.php");
	include "connect.php";
	$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".mysql_real_escape_string($_SESSION['uid'])."' LIMIT 1;"));
	include "functions.php";
	if ($user['battle'] != 0) { header('location: fbattle.php'); die(); }
?><HTML><HEAD>
<link rel=stylesheet type="text/css" href="http://img.bestcombats.net/css/main.css">
<meta content="text/html; charset=windows-1251" http-equiv=Content-type>
<META Http-Equiv=Cache-Control Content=no-cache>
<meta http-equiv=PRAGMA content=NO-CACHE>
<META Http-Equiv=Expires Content=0>
<SCRIPT src='http://img.bestcombats.net/js/commoninf.js'></SCRIPT>
<SCRIPT>
var Hint3Name = '';
// ���������, �������� �������, ��� ���� � �������
function findlogin(title, script, name){
	document.all("hint3").innerHTML = '<table width=100% cellspacing=1 cellpadding=0 bgcolor=CCC3AA><tr><td align=center><B>'+title+'</td><td width=20 align=right valign=top style="cursor: hand" onclick="closehint3();"><BIG><B>x</td></tr><tr><td colspan=2>'+
	'<form action="'+script+'" method=POST><table width=100% cellspacing=0 cellpadding=2 bgcolor=FFF6DD><tr><INPUT TYPE=hidden name=sd4 value="<? echo @$user['id']; ?>"><td colspan=2>'+
	'������� ����� ���������:<small><BR>(����� �������� �� ������ � ����)</TD></TR><TR><TD width=50% align=right><INPUT TYPE=text NAME="'+name+'"></TD><TD width=50%><INPUT TYPE="submit" value=" �� "></TD></TR></TABLE></FORM></td></tr></table>';
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
	$res=mysql_fetch_array(mysql_query("SELECT `id`, `level`, `room`, `align`, (select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online` FROM `users` WHERE `login` ='".mysql_real_escape_string($_REQUEST['FindLogin'])."';"));
	$step=3;
}
if (@$_REQUEST['to_id']) {
	$res=mysql_fetch_array(mysql_query("SELECT `id`, `level`, `room`, `align`, (select `id` from `online` WHERE `online`.`date` >= ".(time()-60)." AND `online`.`id` = users.`id`) as `online` FROM `users` WHERE `id` ='".mysql_real_escape_string($_REQUEST['to_id'])."';"));
	$step=3;
}
if (@$step==3){
	$step=0;
	$id_person_x=$res['id'];
	if (@!$id_person_x) $mess='�������� �� ������';
	elseif ($id_person_x==$user['id']) $mess='������� ���������� ������ ����';
	elseif ($res['align']==4) $mess='�� ����������� ���� �������� ��������� ���������';
	elseif ($user['align']==4) $mess='�� ����������� ���� �������� ��������� ���������';
	elseif ($res['online']<1) $mess='�������� �� ������';
	elseif ($res['room']!=$user['room']) $mess='�� ������ ���������� � ����� ������� � ��� ���� ������ �������� ����';
	elseif ($res['level']<5) $mess='� ���������� �� 7-�� ������ �������� ��������� ���������';
	elseif ($user['level']<7) $mess='���������� �� 7-�� ������ �������� ��������� ���������';
	else{
		$idkomu=$id_person_x;
		$komu=mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` ='".mysql_real_escape_string($idkomu)."';"));
		$mess=$_REQUEST['FindLogin'];
		$step=3;
	}
}else $mess='� ���������� �� 7-�� ������ �������� ��������� ���������';

if ($step==3) {
	if ($_REQUEST['setkredit']>0 && $_REQUEST['to_id'] && $_REQUEST['sd4']==$user['id'] ) {
		$_REQUEST['setkredit'] = round($_REQUEST['setkredit'],2);
		if ($user['money']<$_REQUEST['setkredit']) $mess="������������ �����";
		else {
			if ((mysql_query("UPDATE `users` set `money`=`money`-'".mysql_real_escape_string(strval($_REQUEST[setkredit]))."' where id='".mysql_real_escape_string($user['id'])."'")) && (mysql_query("UPDATE `users` set `money`=`money`+'".mysql_real_escape_string(strval($_REQUEST[setkredit]))."' where id='".mysql_real_escape_string($idkomu)."'"))) {
				$mess='������ �������� '.strval($_REQUEST[setkredit]).' �� � ��������� '.$komu['login'];
				addchp ('<font color=red>��������!</font> �������� "'.$user['login'].'" ������� ��� <B>'.strval($_REQUEST[setkredit]).' ��</B>.   ','{[]}'.$komu['login'].'{[]}');
					mysql_query("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','".mysql_real_escape_string($_SESSION['uid'])."','���������� ������� ".mysql_real_escape_string(strval($_REQUEST[setkredit]))." �� ".mysql_real_escape_string($user['login'])." � ".mysql_real_escape_string($komu['login'])."','1','".time()."');");
					mysql_query("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','".mysql_real_escape_string($idkomu)."','���������� ������� ".mysql_real_escape_string(strval($_REQUEST[setkredit]))." �� ".mysql_real_escape_string($user['login'])." � ".mysql_real_escape_string($komu['login'])."','1','".time()."');");
				$user['money']-=$_REQUEST[setkredit];
			}
			else {
				$mess='��������� ������!';
			}
		}
	}
	if ($_REQUEST['setekredit']>0 && $_REQUEST['to_id'] && $_REQUEST['sd4']==$user['id'] ) {
		$_REQUEST['setekredit'] = round($_REQUEST['setekredit'],2);
		if ($user['ekr']<$_REQUEST['setekredit']) $mess="������������ �����";
		else {
			if ((mysql_query("UPDATE `users` set `ekr`=`ekr`-'".mysql_real_escape_string(strval($_REQUEST[setekredit]))."' where id='".mysql_real_escape_string($user['id'])."'")) && (mysql_query("UPDATE `users` set `ekr`=`ekr`+'".mysql_real_escape_string(strval($_REQUEST[setekredit]))."' where id='".mysql_real_escape_string($idkomu)."'"))) {
				$mess='������ �������� '.strval($_REQUEST[setekredit]).' ��� � ��������� '.$komu['login'];
				addchp ('<font color=red>��������!</font> �������� "'.$user['login'].'" ������� ��� <B>'.strval($_REQUEST[setekredit]).' ���</B>.   ','{[]}'.$komu['login'].'{[]}');
					mysql_query("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','".mysql_real_escape_string($_SESSION['uid'])."','���������� ����������� ".mysql_real_escape_string(strval($_REQUEST[setekredit]))." �� ".mysql_real_escape_string($user['login'])." � ".mysql_real_escape_string($komu['login'])."','1','".time()."');");
					mysql_query("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','".mysql_real_escape_string($idkomu)."','���������� ����������� ".mysql_real_escape_string(strval($_REQUEST[setekredit]))." �� ".mysql_real_escape_string($user['login'])." � ".mysql_real_escape_string($komu['login'])."','1','".time()."');");
				$user['money']-=$_REQUEST[setekredit];
			}
			else {
				$mess='��������� ������!';
			}
		}
	}
	if ($_REQUEST['setobject'] && $_REQUEST['to_id'] && !$_REQUEST['gift'] && $_REQUEST['sd4']==$user['id'] && $_GET['s4i']==$user['sid']) {
	    $result = mysql_query("SELECT * FROM `inventory` WHERE `owner` = '".mysql_real_escape_string($idkomu)."' AND `prototype` = '11529';");
	    echo mysql_error();
		$num_rows = mysql_num_rows($result);
		$res = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `owner` = '".mysql_real_escape_string($_SESSION['uid'])."' AND `id` = '".mysql_real_escape_string($_REQUEST['setobject'])."' AND dressed=0 AND `setsale` = 0 AND `present` = '' AND `destinyinv` = '' AND `honor` = 0 AND `artefact` = 0;"));
		if (!$res['id']) $mess="������� �� ������ � �������";
		elseif ($res['dressed']!=0) $mess="������� ���������� ����� ������� � ����.";
		elseif ($res['prototype']==11529 and $num_rows>0) $mess="������� ����� ����� ���������.";
		elseif ($user['money']<1) $mess='������������ ����� �� ������ ��������';
		else {
			$value=$res;
			if (@$value['present']) $mess='������ ���������� �������';
			elseif (@$value['destinyinv']) $mess='���� ������� � ���� ����� �������';
			else{
				$mto = mysql_fetch_array(mysql_query("SELECT sum(`massa`) FROM `inventory` WHERE `owner` = '".mysql_real_escape_string($idkomu)."' AND `dressed` = 0 AND `honor` = 0 AND `artefact` = 0 AND `setsale` = 0; "));

				$u = $user;
				$user['id'] = $idkomu;
				$allmass=get_meshok_to($idkomu);
				$user = $u;

				$newmass=$mto[0]+$res['massa'];
				if ($newmass<=$allmass) {
					if ((mysql_query("update `users` set `money`=`money`-1 where `id`='".mysql_real_escape_string($user['id'])."'")) && (mysql_query("update `inventory` set `owner` = '".mysql_real_escape_string($komu['id'])."' where `id`='".mysql_real_escape_string($res['id'])."' and `owner`= '".mysql_real_escape_string($user['id'])."';"))) {
						if (($user['room'] < 501) || ($user['room'] > 560)) {
							mysql_query("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','".mysql_real_escape_string($_SESSION['uid'])."','������� ������� ".mysql_real_escape_string($res['name'])." id:(cap".mysql_real_escape_string($res['id']).") [".mysql_real_escape_string($res['duration'])."/".mysql_real_escape_string($res['maxdur'])."] �� ".mysql_real_escape_string($user['login'])." � ".mysql_real_escape_string($komu['login']).", ����� 1 ��.','1','".time()."');");
							mysql_query("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','".mysql_real_escape_string($idkomu)."','������� ������� ".mysql_real_escape_string($res['name'])." id:(cap".mysql_real_escape_string($res['id']).") [".mysql_real_escape_string($res['duration'])."/".mysql_real_escape_string($res['maxdur'])."] �� ".mysql_real_escape_string($user['login'])." � ".mysql_real_escape_string($komu['login']).", ����� 1 ��.','1','".time()."');");
						}
						$mess='������ �������� "'.$value['name'].'" � ��������� '.$komu['login'];
						addchp ('<font color=red>��������!</font> �������� "'.$user['login'].'" ������� ��� "'.$value['name'].'".   ','{[]}'.$komu['login'].'{[]}');
						$user['money']-=1;
					}
					else {
						$mess='��������� ������!';
					}
				}
				else {
					$mess='� ��������� "'.$komu['login'].'" ���������� ������!';
				}
			}
		}
	}
	if ($_REQUEST['setobject'] && $_REQUEST['to_id'] && $_REQUEST['gift'] && $_REQUEST['sd4']==$user['id'] && $_GET['s4i']==$user['sid']) {
		$result = mysql_query("SELECT * FROM `inventory` WHERE `owner` = '".mysql_real_escape_string($idkomu)."' AND `prototype` = '11529';");
		$num_rows = mysql_num_rows($result);
		$res = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `owner` = '".mysql_real_escape_string($_SESSION['uid'])."' AND `id` = '".mysql_real_escape_string($_REQUEST['setobject'])."' AND dressed=0 AND `setsale` = 0 AND `present` = '' AND `destinyinv` = '' AND `honor` = 0 AND `artefact` = 0;"));
		if (!$res['id']) $mess="������� �� ������ � �������";
		elseif ($res['dressed']!=0) $mess="������� ���������� ����� ������� � ����.";
		elseif ($res['prototype']==11529 and $num_rows>0) $mess="������� ����� ����� ���������.";

		else {
			$value=$res;
			if (@$value['present']) $mess='������ ���������� �������';
			elseif (@$value['destinyinv']) $mess='���� ������� � ���� ����� �������';
			else{
				$mto = mysql_fetch_array(mysql_query("SELECT sum(`massa`) FROM `inventory` WHERE `owner` = '".mysql_real_escape_string($idkomu)."' AND `dressed` = 0 AND `setsale` = 0; "));

				$u = $user;
				$user['id'] = $idkomu;
				$allmass=get_meshok_to($idkomu);
				$user = $u;

				$newmass=$mto[0]+$res['massa'];
				if ($newmass<=$allmass) {
					if (mysql_query("update `inventory` set `present` = '".mysql_real_escape_string($user['login'])."' ,`owner` = '".mysql_real_escape_string($komu['id'])."' where `id`='".mysql_real_escape_string($res['id'])."' and `owner`= '".mysql_real_escape_string($user['id'])."';")) {
						addchp ('<font color=red>��������!</font> �������� "'.$user['login'].'" ������� ��� "'.$value['name'].'"</B>.   ','{[]}'.$komu['login'].'{[]}');
						if (($user['room'] < 501) || ($user['room'] > 560)) {
							mysql_query("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','".mysql_real_escape_string($_SESSION['uid'])."','������� ������� ".mysql_real_escape_string($res['name'])." id:(cap".mysql_real_escape_string($res['id']).") [".mysql_real_escape_string($res['duration'])."/".mysql_real_escape_string($res['maxdur'])."] �� ".mysql_real_escape_string($user['login'])." � ".mysql_real_escape_string($komu['login'])."','1','".time()."');");
							mysql_query("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','".mysql_real_escape_string($idkomu)."','������� ������� ".mysql_real_escape_string($res['name'])." id:(cap".mysql_real_escape_string($res['id']).") [".mysql_real_escape_string($res['duration'])."/".mysql_real_escape_string($res['maxdur'])."] �� ".mysql_real_escape_string($user['login'])." � ".mysql_real_escape_string($komu['login'])."','1','".time()."');");
						}
						$mess='������ ������� ������� "'.$value['name'].'"  ��������� '.$komu['login'];
					}
					else {
						$mess='��������� ������!';
					}
				}
				else {
					$mess='� ��������� "'.$komu['login'].'" ���������� ������!';
				}
			}
		}
	}

	if ($_REQUEST['cost'] > 0 && $_REQUEST['to_id']) {
		$res = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `owner` = '".mysql_real_escape_string($_SESSION['uid'])."' AND `dressed`=0 AND `artefact` =0  AND `id` = '".mysql_real_escape_string($_REQUEST['id_th'])."' LIMIT 1;"));
		if (!$res['id']) $mess="������� �� ������ � �������";
		elseif ($res['dressed']!=0) $mess="������� ���������� ����� �������.";
		else {
			$value=$res;
			if (@$value['present']) $mess='������ ���������� �������';
			elseif (@$value['destinyinv']) $mess='���� ������� � ���� ����� �������';
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
					$mess = '����������� ��������� '.$komu['login'].' �������.';
					mysql_query("update `inventory` set `tradesale` = '".mysql_real_escape_string($_REQUEST['cost'])."' where `id`='".mysql_real_escape_string($res['id'])."' and `owner`= '".mysql_real_escape_string($res['owner'])."';");
					mysql_query("INSERT INTO `trade`(`to_id` ,`login`  ,`txt` ,`kr` ,`id` ,`baer` ) VALUES ('".mysql_real_escape_string($_SESSION['uid'])."','".mysql_real_escape_string($user['login'])."','".mysql_real_escape_string($re)."',".mysql_real_escape_string($_REQUEST['cost']).",'".mysql_real_escape_string($_REQUEST['id_th'])."',".mysql_real_escape_string($_REQUEST['to_id']).");");

			}
		}

	}

	if ($_REQUEST['transfersale'] && $_REQUEST['to_id']) {
		$res = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `dressed`=0 AND `owner` = '".mysql_real_escape_string($_REQUEST['to_id'])."' AND `id` = '".mysql_real_escape_string($_REQUEST['transfersale'])."' LIMIT 1;"));
		if($user['money'] < $res['tradesale']) {
		    $mess ='<font color=red><b>�� ������� ����� ��� ���������� ��������</b></font>';
		} 
		else
		{
		    mysql_query("update `inventory` set `owner` = '".mysql_real_escape_string($user['id'])."' where `id`='".mysql_real_escape_string($res['id'])."' and `owner`= '".mysql_real_escape_string($res['owner'])."';");
		    mysql_query("update `users` set `money`=`money`-'".mysql_real_escape_string($res['tradesale'])."' where `id`='".mysql_real_escape_string($user['id'])."'");
		    mysql_query("update `users` set `money`=`money`+'".mysql_real_escape_string($res['tradesale'])."' where `id`='".mysql_real_escape_string($_REQUEST['to_id'])."'");
		    if (($user['room'] < 501) || ($user['room'] > 560)) {
		    	mysql_query("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','".mysql_real_escape_string($_SESSION['uid'])."','������� �� ".mysql_real_escape_string($res['tradesale'])."�� (".mysql_real_escape_string($res['name']).") � ".$komu['login']."',1,'".time()."');");
		    	mysql_query("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','".mysql_real_escape_string($idkomu)."','������� �� ".mysql_real_escape_string($res['tradesale'])."�� (".mysql_real_escape_string($res['name']).") � ".$user['login']."',1,'".time()."');");
		    }
		    $mess='������ ������� "'.$res['name'].'" ��������� '.$komu['login'];
		    $mess2='������ ������� "'.$res['name'].'" ��������e� '.$user['login'];
		    addchp ('<font color=red>��������!</font> '.$mess2,'{[]}'.$komu['login'].'{[]}');
		    $user['money']-=$res['tradesale'];
		}
	}

}
?>

function findmoney(title, script, name, obj){
	document.all("hint3").innerHTML = '<table width=100% cellspacing=1 cellpadding=0 bgcolor=CCC3AA><tr><td align=center><B>'+title+'</td><td width=20 align=right valign=top style="cursor: hand" onclick="closehint3();"><BIG><B>x</td></tr><tr><td colspan=2>'+
	'<form action="'+script+'" method=get><table width=100% cellspacing=0 cellpadding=2 bgcolor=FFF6DD><tr><INPUT TYPE=hidden name=id_th value="'+obj+'"><INPUT TYPE=hidden name=to_id value="<? echo @$komu['id']; ?>"><td colspan=2>'+
	'������� c����:<small></TD></TR><TR><TD width=50% align=right><INPUT TYPE=text NAME="'+name+'"></TD><TD width=50%><INPUT TYPE="submit" value=" �� "></TD></TR></TABLE></FORM></td></tr></table>';
	document.all("hint3").style.visibility = "visible";
	document.all("hint3").style.left = 100;
	document.all("hint3").style.top = 100;
	document.all(name).focus();
	Hint3Name = name;
}

var tologin = '<? echo @($step==3?$komu['login']:''); ?>';
function Sale(to_id, name, n, txt, transfer_kredit){
	var s = prompt("������� \""+txt+"\" � \""+tologin+"\". ������� ����:", '');
	if (s != null && s!= '') { // �������
	    if (confirm("������� \""+txt+"\" � \""+tologin+"\" �� "+parseFloat(s)+" ��. �� ��������� "+transfer_kredit+"��. �� ��������! ��� ������� �� ������ ������ ������� � ���� ���� ������. ����������?")) {
		   location="/main.php?to_id="+to_id+"&setobject="+name+"&n="+n+"&s4i=<?=$user['sid']?>&sale="+s+"&sd4=<? echo @$user['id']; ?>&0.760742158507544";
		}
	}
}
function transfer(to_id, login, txt, kredit, id, destiny){
	document.getElementById("hint3").innerHTML = '<table width=500 cellspacing=1 cellpadding=0 bgcolor=CCC3AA><tr><td align=center><B>������� ��������</td></tr><tr><td>'+
	'<form action="give.php" method=get><table width=100% cellspacing=0 cellpadding=5 bgcolor=FFF6DD><tr><td><INPUT TYPE=hidden name=sd4 value="<? echo @$user['id']; ?>"><INPUT TYPE=hidden name=FindLogin value=0><INPUT TYPE=hidden name=to_id value="'+to_id+'"><INPUT TYPE=hidden name=transfersale value="'+id+'">'+
	'<b>'+login+'</b> <a href="inf.php?'+to_id+'" target=_blank><IMG SRC=i/inf.gif WIDTH=12 HEIGHT=11></a> ���������� ��� ������ �������:<BR>'+
	txt+'<BR>�� <font color=red><b>'+kredit+' ��.</b></font><BR>�������� ������?</TD></TR><TR><TD align=center><INPUT TYPE=submit '+(destiny?" onclick='return confirm(\"���� ������� ����� ������������ ������ "+destiny+" �� �������, ��� ������ ��� ������?\")'":"")+' value="  ��  "> &nbsp;&nbsp; <INPUT TYPE=button value=" ��� " onclick="closehint3()"></TD></TR></TABLE></FORM></td></tr></table>';
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
<H3>�������� ���������/�������� ������� ������</H3>
<TABLE width=100% cellspacing=0 cellpadding=0>
<TR><TD>
<? if ($step==3) {
echo '� ���� ����������: <font color=red><SCRIPT>drwfl("'.@$komu['login'].'",'.@$komu['id'].',"'.@$komu['level'].'","'.@$komu['align'].'","'.@$komu['klan'].'")</SCRIPT></font>';
?> <INPUT TYPE=button value="�������" onClick="findlogin('�������� ���������','give.php','FindLogin')"><BR><?
}else{
	$roww = mysql_fetch_array(mysql_query("SELECT * FROM `trade` WHERE `baer` = '".mysql_real_escape_string($user['id'])."' LIMIT 1;"));
	mysql_query("DELETE FROM `trade` WHERE `baer` = '".mysql_real_escape_string($user['id'])."' LIMIT 1;");
	$rwx = mysql_fetch_array(mysql_query("SELECT `id` FROM `inventory` WHERE `owner` = '".mysql_real_escape_string($roww['to_id'])."' AND `tradesale` > 0 AND `id` = '".mysql_real_escape_string($roww['id'])."' LIMIT 1;"));
	if (!$roww['id'] OR !$rwx['id']) {
?> <SCRIPT>findlogin('�������� ���������','give.php','FindLogin');</SCRIPT><? }
else
 {
	?> <SCRIPT>transfer(<?=$roww['to_id']?>, '<?=$roww['login']?>', '<?=str_replace("\r\n","",$roww['txt'])?>', <?=$roww['kr']?>, <?=$roww['id']?>, '');</SCRIPT><?
 
 }
}
?>

</td><TD align=right>
	<INPUT TYPE=button value="���������" style="background-color:#A9AFC0" onClick="window.open('help/transfer.html', 'help', 'height=300,width=500,location=no,menubar=no,status=no,toolbar=no,scrollbars=yes')">
	<INPUT TYPE=button value="���������" onClick="location.href='main.php'">
</td></tr><tr><td colspan=2 align=right><? if ($step!=4) {?> <FONT COLOR=red><B><? echo $mess; ?></B></FONT> <? } ?></td></tr></table>

<TABLE width=100% cellspacing=0 cellpadding=0>
<FORM ACTION="give.php" METHOD=POST>
<TR>
	<TD valign=top align=left width=40%>
<?
	if ($step==3) { ?>
	<INPUT TYPE=hidden name=to_id value="<? echo $idkomu; ?>">
	<INPUT TYPE=hidden name=sd4 value="<? echo $user['id']; ?>">
	<BR>� ��� �� �����: <FONT COLOR=339900><B><? echo $user['money']; ?></B></FONT> ��.<BR>
	<small><BR>�������� �������, ���������� 0.01��.<BR></small>
	������� ������������ ����� ��: <INPUT TYPE=text NAME=setkredit maxlength=8 size=6>&nbsp;<INPUT TYPE=submit VALUE="��������">
<!--	<BR>-------------------------------------------------
	<BR>� ��� �� �����: <FONT COLOR=339900><B><? echo $user['ekr']; ?></B></FONT> ���.<BR>
	<small><BR>�������� �����������, ���������� 1 ���.<BR></small>
	������� ������������ ����� ���: <INPUT TYPE=text NAME=setekredit maxlength=8 size=6>&nbsp;<INPUT TYPE=submit VALUE="��������">
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
	<TD  align=center bgcolor="<?=($_SESSION['razdel']==null)?"#A5A5A5":"#C7C7C7"?>"><A HREF="?to_id=<? echo $idkomu; ?>&edit=1&razdel=0&sd4=<? echo $user['id']; ?>">��������������</A></TD>
	<TD  align=center bgcolor="<?=($_SESSION['razdel']==1)?"#A5A5A5":"#C7C7C7"?>"><A HREF="?to_id=<? echo $idkomu; ?>&edit=1&razdel=1&sd4=<? echo $user['id']; ?>">��������</A></TD>
	<TD  align=center bgcolor="<?=($_SESSION['razdel']==3)?"#A5A5A5":"#C7C7C7"?>"><A HREF="?to_id=<? echo $idkomu; ?>&edit=1&razdel=3&sd4=<? echo $user['id']; ?>">���</A></TD>
	<TD  align=center bgcolor="<?=($_SESSION['razdel']==2)?"#A5A5A5":"#C7C7C7"?>"><A HREF="?to_id=<? echo $idkomu; ?>&edit=1&razdel=2&sd4=<? echo $user['id']; ?>">������</A></TD>
	</TR></TABLE>
</TD></TR>
<TR>
	<TD align=center><B>������ (�����: <?php

	$d = mysql_fetch_array(mysql_query("SELECT sum(`massa`) FROM `inventory` WHERE `owner` = '".mysql_real_escape_string($_SESSION['uid'])."' AND `dressed` = 0 AND `artefact` ='' AND `honor` ='' AND `setsale` = 0; "));

	echo $d[0];
	?>/<?=get_meshok()?>)</B></TD>
</TR>
<TR><TD align=center><!--������-->
<TABLE BORDER=0 WIDTH=100% CELLSPACING="1" CELLPADDING="2" BGCOLOR="#A5A5A5">
<?php
	if ($_SESSION['razdel']==null) {
		$data = mysql_query("SELECT * FROM `inventory` WHERE `owner` = '".mysql_real_escape_string($_SESSION['uid'])."' AND `dressed` = 0 AND `type` < 25 AND `setsale` = 0 AND `present` = '' AND `destinyinv` = '' AND `artefact` =0 ORDER by `update` DESC; ");
	}
	if ($_SESSION['razdel']==1) {
		$data = mysql_query("SELECT * FROM `inventory` WHERE `owner` = '".mysql_real_escape_string($_SESSION['uid'])."' AND `dressed` = 0 AND `type` = 25 AND `setsale` = 0 AND `present` = '' AND `destinyinv` = ''  ORDER by `update` DESC; ");
	}
	if ($_SESSION['razdel']==2) {
		$data = mysql_query("SELECT * FROM `inventory` WHERE `owner` = '".mysql_real_escape_string($_SESSION['uid'])."' AND `dressed` = 0 AND `type` > 50 AND `setsale` = 0 AND `present` = '' AND `destinyinv` = ''  ORDER by `update` DESC; ");
	}
	if ($_SESSION['razdel']==3) {
		$data = mysql_query("SELECT * FROM `inventory` WHERE `owner` = '".mysql_real_escape_string($_SESSION['uid'])."' AND `dressed` = 0 AND `type` = 50 AND `setsale` = 0 AND `present` = ''   AND `destinyinv` = ''  ORDER by `update` DESC; ");
	}
	while($row = mysql_fetch_array($data)) {
		$row['count'] = 1;
		if (@$i==0) { $i = 1; $color = '#C7C7C7';} else { $i = 0; $color = '#D5D5D5'; }
		echo "<TR bgcolor={$color}><TD align=center ><IMG SRC=\"i/sh/{$row['img']}\" BORDER=0>";
		?>
		<BR>
			<? echo "<A HREF=\"give.php?to_id=".$idkomu."&id_th=".$row['id']."&setobject=".$row['id']."&s4i=".$user['sid']."&sd4=".$user['id']."&tmp=".rand(0,50000000)."\"".'onclick="return confirm(\'�������� ������� '.$row['name'].'?\')">��������&nbsp;��&nbsp;1&nbsp;��.</A>';
			echo "<br><A HREF=\"give.php?to_id=".$idkomu."&id_th=".$row['id']."&setobject=".$row['id']."&gift=1&s4i=".$user['sid']."&sd4=".$user['id']."&tmp=".rand(0,50000000)."\"".'onclick="return confirm(\'�������� ������� '.$row['name'].'?\')">��������</A>';
			 echo "<br><A HREF=#".' onClick="findmoney(\'������� ��������\',\'give.php\',\'cost\','.$row['id'].')">�������</A>';
			 ?>

		</TD>
		<?php
		echo "<TD valign=top>";
		showitem ($row);
		echo "</TD></TR>";
	}
	if (mysql_num_rows($data) == 0) {
		echo "<tr><td align=center bgcolor=#C7C7C7>�����</td></tr>";
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
