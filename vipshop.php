<?php
	session_start();
	if ($_SESSION['uid'] == null) header("Location: index.php");
	include "connect.php";
	$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".mysql_real_escape_string($_SESSION['uid'])."' LIMIT 1;"));
	include "functions.php";
	$d = mysql_fetch_array(mysql_query("SELECT sum(`massa`) FROM `inventory` WHERE `owner` = '".mysql_real_escape_string($_SESSION['uid'])."' AND `dressed` = 0 AND `setsale` = 0 ; "));
	if ($user['room'] != 1097) { header("Location: main.php");  die(); }
	if ($user['battle'] != 0) { header('location: fbattle.php'); die(); }

	if ($_GET['sed']) {

		$dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `dressed`= 0 AND `id` = '".mysql_real_escape_string($_GET['sed'])."' AND `owner` = '".mysql_real_escape_string($_SESSION['uid'])."'  AND `podzem`=0 LIMIT 1;"));
		if($dress["podzem"] == 0){
		$price=$dress['ecost']/1;
		destructitem($dress['id']);
		$allcost=round($price-$dress['duration']*($dress['ecost']/($dress['maxdur']*10)),2);
		mysql_query("UPDATE `users` set `ekr` = `ekr`+ '".(round($price-$dress['duration']*($dress['ecost']/($dress['maxdur']*10)),2))."' WHERE id = '".mysql_real_escape_string($_SESSION['uid'])."' ");
		//$allcost=$dress['ecost']1;
		//mysql_query("UPDATE `users` set `ekr` = `ekr`+ '".$dress['ecost']."' WHERE id = {$_SESSION['uid']}");
		mysql_query("INSERT INTO `delo` (`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','".mysql_real_escape_string($_SESSION['uid'])."','".mysql_real_escape_string($user['login'])." ������ � ������� �����: ".mysql_real_escape_string($dress['name'])." id:(cap".mysql_real_escape_string($dress['id']).") [".mysql_real_escape_string($dress['duration'])."".mysql_real_escape_string($dress['maxdur'])."] �� ".mysql_real_escape_string($allcost)." ���. ',1,'".time()."');");
		echo "<font color=red><b>�� ������� \"{$dress['name']}\" �� ".$allcost." ���.</b></font>";
		}
	}


	if (($_GET['set'] OR $_POST['set'])) {
		if ($_GET['set']) { $set = $_GET['set']; }
		if ($_POST['set']) { $set = $_POST['set']; }
		if (!$_POST['count']) { $_POST['count'] =1; }
		$dress = mysql_fetch_array(mysql_query("SELECT * FROM `vipshop` WHERE `id` = '".mysql_real_escape_string($set)."' LIMIT 1;"));
		if (($dress['massa']*$_POST['count']+$d[0]) > (get_meshok())) {
			echo "<font color=red><b>������������ ����� � �������.</b></font>";
		}
		elseif(($user['ekr']>= ($dress['ecost']*$_POST['count'])) && ($dress['count'] >= $_POST['count'])) {

			for($k=1;$k<=$_POST['count'];$k++) {
				if(mysql_query("INSERT INTO `inventory`
				(`prototype`,`owner`,`name`,`type`,`massa`,`ecost`,`img`,`maxdur`,`isrep`,
					`gsila`,`glovk`,`ginta`,`gintel`,`ghp`,`gmana`,`gnoj`,`gtopor`,`gdubina`,`gmech`,`gposoh`,`gfire`,`gwater`,`gair`,`gearth`,`glight`,`ggray`,`gdark`,`needident`,`nsila`,`nlovk`,`ninta`,`nintel`,`nmudra`,`nvinos`,`nnoj`,`ntopor`,`ndubina`,`nmech`,`nposoh`,`nfire`,`nwater`,`nair`,`nearth`,`nlight`,`ngray`,`ndark`,`mfudar`,`mfantiudar`,`bron5`,`zol_zeton`,`godenm`,`timem`,`plus_hp`,`k_kach`,`r_kach`,`d_kach`,`z_kach`,
					`mfkrit`,`mfakrit`,`mfuvorot`,`mfauvorot`,`bron1`,`bron2`,`bron3`,`bron4`,`maxu`,`minu`,`magic`,`nlevel`,`nalign`,`dategoden`,`goden`,`otdel`,`gmp`,`gmeshok`,`artefact`,`destinyinv`,`gift`,`mfkritpow`,`mfantikritpow`,`mfparir`,`mfshieldblock`,`mfcontr`,`mfrub`,`mfkol`,`mfdrob`,`mfrej`,`mfdhit`,`mfdmag`,`mfhitp`,`mfmagp`,`opisan`,`second`,`dvur`
				)
				VALUES
					
				('".mysql_real_escape_string($dress['id'])."','".mysql_real_escape_string($_SESSION['uid'])."','".mysql_real_escape_string($dress['name'])."','".mysql_real_escape_string($dress['type'])."',".mysql_real_escape_string($dress['massa']).",".mysql_real_escape_string($dress['ecost']).",'".mysql_real_escape_string($dress['img'])."',".mysql_real_escape_string($dress['maxdur']).",".mysql_real_escape_string($dress['isrep']).",'".mysql_real_escape_string($dress['gsila'])."','".mysql_real_escape_string($dress['glovk'])."','".mysql_real_escape_string($dress['ginta'])."','".mysql_real_escape_string($dress['gintel'])."','".mysql_real_escape_string($dress['ghp'])."','".mysql_real_escape_string($dress['gmana'])."','".mysql_real_escape_string($dress['gnoj'])."','".mysql_real_escape_string($dress['gtopor'])."','".mysql_real_escape_string($dress['gdubina'])."','".mysql_real_escape_string($dress['gmech'])."','".mysql_real_escape_string($dress['gposoh'])."','".mysql_real_escape_string($dress['gfire'])."','".mysql_real_escape_string($dress['gwater'])."',
				'".mysql_real_escape_string($dress['gair'])."','".mysql_real_escape_string($dress['gearth'])."','".mysql_real_escape_string($dress['glight'])."','".mysql_real_escape_string($dress['ggray'])."','".mysql_real_escape_string($dress['gdark'])."','".mysql_real_escape_string($dress['needident'])."','".mysql_real_escape_string($dress['nsila'])."','".mysql_real_escape_string($dress['nlovk'])."','".mysql_real_escape_string($dress['ninta'])."','".mysql_real_escape_string($dress['nintel'])."','".mysql_real_escape_string($dress['nmudra'])."','".mysql_real_escape_string($dress['nvinos'])."','".mysql_real_escape_string($dress['nnoj'])."','".mysql_real_escape_string($dress['ntopor'])."','".mysql_real_escape_string($dress['ndubina'])."','".mysql_real_escape_string($dress['nmech'])."','".mysql_real_escape_string($dress['nposoh'])."','".mysql_real_escape_string($dress['nfire'])."','".mysql_real_escape_string($dress['nwater'])."','".mysql_real_escape_string($dress['nair'])."','".mysql_real_escape_string($dress['nearth'])."','".mysql_real_escape_string($dress['nlight'])."','".mysql_real_escape_string($dress['ngray'])."','".mysql_real_escape_string($dress['ndark'])."','".mysql_real_escape_string($dress['mfudar'])."','".mysql_real_escape_string($dress['mfantiudar'])."','".mysql_real_escape_string($dress['bron5'])."','".mysql_real_escape_string($dress['zol_zeton'])."','".mysql_real_escape_string($dress['godenm'])."','".mysql_real_escape_string($dress['timem'])."','".mysql_real_escape_string($dress['plus_hp'])."','".mysql_real_escape_string($dress['k_kach'])."','".mysql_real_escape_string($dress['r_kach'])."','".mysql_real_escape_string($dress['d_kach'])."','".mysql_real_escape_string($dress['z_kach'])."',
				'".mysql_real_escape_string($dress['mfkrit'])."','".mysql_real_escape_string($dress['mfakrit'])."','".mysql_real_escape_string($dress['mfuvorot'])."','".mysql_real_escape_string($dress['mfauvorot'])."','".mysql_real_escape_string($dress['bron1'])."','".mysql_real_escape_string($dress['bron2'])."','".mysql_real_escape_string($dress['bron3'])."','".mysql_real_escape_string($dress['bron4'])."','".mysql_real_escape_string($dress['maxu'])."','".mysql_real_escape_string($dress['minu'])."','".mysql_real_escape_string($dress['magic'])."','".mysql_real_escape_string($dress['nlevel'])."','".mysql_real_escape_string($dress['nalign'])."','".(($dress['goden'])?($dress['goden']*24*60*60+time()):"")."','".mysql_real_escape_string($dress['goden'])."','".mysql_real_escape_string($dress['razdel'])."','".mysql_real_escape_string($dress['gmp'])."','".mysql_real_escape_string($dress['gmeshok'])."','".mysql_real_escape_string($dress['artefact'])."','".mysql_real_escape_string($dress['destiny'])."','".mysql_real_escape_string($dress['gift'])."','".mysql_real_escape_string($dress['mfkritpow'])."','".mysql_real_escape_string($dress['mfantikritpow'])."',
				'".mysql_real_escape_string($dress['mfparir'])."','".mysql_real_escape_string($dress['mfshieldblockj'])."','".mysql_real_escape_string($dress['mfcontr'])."','".mysql_real_escape_string($dress['mfrub'])."','".mysql_real_escape_string($dress['mfkol'])."','".mysql_real_escape_string($dress['mfdrob'])."','".mysql_real_escape_string($dress['mfrej'])."','".mysql_real_escape_string($dress['mfdhit'])."','".mysql_real_escape_string($dress['mfdmag'])."','".mysql_real_escape_string($dress['mfhitp'])."','".mysql_real_escape_string($dress['mfmagp'])."','".mysql_real_escape_string($dress['opisan'])."','".mysql_real_escape_string($dress['second'])."','".mysql_real_escape_string($dress['dvur'])."') ;"))
				{
					$good = 1;
				}
				else {
					$good = 0;
				}
			}
			if ($good) {
				mysql_query("UPDATE `vipshop` SET `count`=`count`-'".mysql_real_escape_string($_POST['count'])."' WHERE `id` = '".mysql_real_escape_string($set)."' LIMIT 1;");
				echo "<font color=red><b>�� ������ {$_POST['count']} ��. \"{$dress['name']}\".</b></font>";
				mysql_query("UPDATE `users` set `ekr` = `ekr`- '".mysql_real_escape_string($_POST['count']*$dress['ecost'])."' WHERE id = '".mysql_real_escape_string($_SESSION['uid'])."' ;");
				$user['ekr'] -= $_POST['count']*$dress['ecost'];
				$limit=$_POST['count'];
				$invdb = mysql_query("SELECT `id` FROM `inventory` WHERE `name` = '".mysql_real_escape_string($dress['name'])."' ORDER by `id` DESC LIMIT ".mysql_real_escape_string($limit)." ;" );
				//$invdb = mysql_query("SELECT id FROM `inventory` WHERE `name` = '".{$dress['name']}."' ORDER by `id` DESC LIMIT $limit ;" );
				if ($limit == 1) {
					$dressinv = mysql_fetch_array($invdb);
					$dressid = "cap".$dressinv['id'];
					$dresscount=" ";
				}
				else {
					$dressid="";
					while ($dressinv = mysql_fetch_array($invdb))  {
						$dressid .= "cap".$dressinv['id'].",";
					}
					$dresscount="(x".$_POST['count'].") ";
				}
				$allcost=$_POST['count']*$dress['ecost'];
				mysql_query("INSERT INTO `delo` (`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','".mysql_real_escape_string($_SESSION['uid'])."','".mysql_real_escape_string($user['login'])." ����� �����: ".mysql_real_escape_string($dress['name'])." ".mysql_real_escape_string($dresscount)."id:(".mysql_real_escape_string($dressid).") [0/".mysql_real_escape_string($dress['maxdur'])."] �� ".mysql_real_escape_string($allcost)." ���. ',1,'".time()."');");
			}
		}
		else {
			echo "<font color=red><b>������������ ����� ��� ��� ����� � �������.</b></font>";
		}
	}

?>
<HTML><HEAD>
<link rel=stylesheet type="text/css" href="http://img.also.bestcombats.net/i/main.css">
<meta content="text/html; charset=windows-1251" http-equiv=Content-type>
<META Http-Equiv=Cache-Control Content=no-cache>
<meta http-equiv=PRAGMA content=NO-CACHE>
<META Http-Equiv=Expires Content=0>
<body leftmargin=5 topmargin=5 marginwidth=5 marginheight=5 bgcolor=#e2e0e0 style="background-image: url(http://img.combats.com/i/misc/showitems/p_portal21.jpg);background-repeat:no-repeat;background-position:top right">
<SCRIPT LANGUAGE="JavaScript"> 
function AddCount(name, txt)
{
	document.all("hint3").innerHTML = '<table border=0 width=100% cellspacing=1 cellpadding=0 bgcolor="#CCC3AA"><tr><td align=center><B>������ ����. ����</td><td width=20 align=right valign=top style="cursor: hand" onclick="closehint3();"><BIG><B>x</TD></tr><tr><td colspan=2>'+
	'<table border=0 width=100% cellspacing=0 cellpadding=0 bgcolor="#FFF6DD"><tr><INPUT TYPE="hidden" name="set" value="'+name+'"><td colspan=2 align=center><B><I>'+txt+'</td></tr><tr><td width=80% align=right>'+
	'���������� (��.) <INPUT TYPE="text" NAME="count" size=4></td><td width=20%>&nbsp;<INPUT TYPE="submit" value=" �� ">'+
	'</TD></TR></TABLE></td></tr></table>';
	document.all("hint3").style.visibility = "visible";
	document.all("hint3").style.left = event.x+document.body.scrollLeft-20;
	document.all("hint3").style.top = event.y+document.body.scrollTop+5;
	document.all("count").focus();
}
// ��������� ����
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
<INPUT TYPE="button" value="���������" style="background-color:#A9AFC0" onClick="window.open('help/shop.html', 'help', 'height=300,width=500,location=no,menubar=no,status=no,toolbar=no,scrollbars=yes')">
<INPUT TYPE="submit" value="���������" name="cp"></td></tr>
</FORM>
</table>
<TABLE border=0 width=100% cellspacing="0" cellpadding="4">
<TR>
    <FORM METHOD=POST ACTION="vipshop.php">
	<INPUT TYPE="hidden" name="sid" value="">
	<INPUT TYPE="hidden" name="id" value="1">
	<TD valign=top align=left>
<!--�������-->
<TABLE border=0 width=100% cellspacing="0" cellpadding="0" bgcolor="#b08b5f">
<TR>
	<TD align=center><B>����� "<?php
	if ($_POST['sale']) {
		echo "������";
	} else
switch ($_GET['otdel']) {
	case null:
		echo "������: �������,����";
		$_GET['otdel'] = 1;
	break;
	case 1:
		echo "������: �������,����";
	break;

	case 11:
		echo "������";
	break;

	case 12:
		echo "������,������";
	break;

	case 13:
		echo "����";
	break;
	
	case 52:
		echo "���������� ������";
	break;

	case 2:
		echo "������: ������";
	break;

	case 21:
		echo "��������";
	break;
	
	case 100:
		echo "�����";
	break;

        case 53:
		echo "������";
	break;	
        
        case 22:
		echo "������ �����";
	break;

	case 23:
		echo "������� �����";
	break;

	case 24:
		echo "�����";
	break;

	case 25:
		echo "������";
	break;

	case 26:
		echo "�����";
	break;

	case 27:
		echo "������";
	break;

	case 3:
		echo "����";
	break;

	case 4:
		echo "��������� ������: ������";
	break;

	case 41:
		echo "��������";
	break;

	case 42:
		echo "������";
	break;

	break;

	case 5:
		echo "����������: �����������";
	break;

	case 51:
		echo "����������: ������ � ��������";
	break;

	case 54:
		echo "����������";
	break;
	
	case 55:
		echo "�������";
	break;
	
	case 56:
		echo "��������������";
	break;
	
	case 57:
		echo "�����������";
	break;

	case 189:
		echo "��������";
	break;

	case 6:
		echo "��������";
	break;
		echo "��������: ��������";
	break;
	case 71:
		echo "��������: �������";
	break;
       case 300:
		echo "������";
	break;
}


	?>"</B>

	</TD>
</TR>
<TR><TD><!--������-->
<TABLE BORDER=0 WIDTH=100% CELLSPACING="1" CELLPADDING="2" BGCOLOR="#b08b5f">
<?
if($_REQUEST['present']) {

	if($_POST['to_login'] && $_POST['flower']) {
		$to = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `login` = '".mysql_real_escape_string($_POST['to_login'])."' LIMIT 1;"));
		if ($_POST['to_login'] == $user['login']) {
			echo "<b><font color=red>����� ����� ������ ���-�� ������ ���� ;)</font></b>";
		
                   }     
                         elseif ($to['room'] > 500 && $to['room'] < 561) {
			echo "<b><font color=red>�������� � ������ ������ ��������� � ������� � ����� ������. ���������� �����.</font></b>";
		}
		else {

			if($_POST['from']==1) { $from = '������'; }
			elseif($_POST['from']==2 && $user['klan']) { $from = ' ����� '.$user['klan']; }
			else {$from = $user['login'];}
			if ($to) if(mysql_query("UPDATE `inventory` SET `owner` = '".mysql_real_escape_string($to['id'])."', `present` = '".mysql_real_escape_string($from)."', `letter` = '".mysql_real_escape_string($_POST['podarok2'])."' WHERE  `present` = '' AND `id` = '".mysql_real_escape_string($_POST['flower'])."' AND `owner` = '".mysql_real_escape_string($_SESSION['uid'])."' AND `dressed` = 0  AND `setsale`=0")) {
				$res = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `id` = '".mysql_real_escape_string($_POST['flower'])."' LIMIT 1; "));
				$buket_name=$res['name'];
				mysql_query("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','".mysql_real_escape_string($_SESSION['uid'])."','������� ������� ".mysql_real_escape_string($res['name'])." id:(cap".mysql_real_escape_string($res['id']).") [".$res['duration']."".mysql_real_escape_string($res['maxdur'])."] �� ".mysql_real_escape_string($from)." � ".mysql_real_escape_string($to['login'])."','1','".time()."');");
				mysql_query("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','".mysql_real_escape_string($to['id'])."','������� ������� ".mysql_real_escape_string($res['name'])." id:(cap".mysql_real_escape_string($res['id']).") [".mysql_real_escape_string($res['duration'])."".mysql_real_escape_string($res['maxdur'])."] �� ".mysql_real_escape_string($from)." � ".mysql_real_escape_string($to['login'])."','1','".time()."');");
				if(($_POST['from']==1) || ($_POST['from']==2)) {
					$action="�������";
					mysql_query("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','".mysql_real_escape_string($to['id'])."','������� ������� ".mysql_real_escape_string($res['name'])." id:(cap".mysql_real_escape_string($res['id']).") [".mysql_real_escape_string($res['duration'])."".mysql_real_escape_string($res['maxdur'])."] �� ".mysql_real_escape_string($user['login'])." � ".mysql_real_escape_string($to['login'])."','5','".time()."');");
				}
				else {
					if ($user['sex'] == 0) {$action="��������";}
					else {$action="�������";}
				}
				$us = mysql_fetch_array(mysql_query("select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = '".mysql_real_escape_string($to['id'])."' LIMIT 1;"));
				if($us[0]){
					addchp ('<font color=red>��������!</font> <span oncontextmenu=OpenMenu()>'.$from.'</span> '.$action.' ��� <B>'.$buket_name.'</B>.   ','{[]}'.$_POST['to_login'].'{[]}');
				} else {
					// ���� � ���
					mysql_query("INSERT INTO `telegraph` (`owner`,`date`,`text`) values ('".mysql_real_escape_string($to['id'])."','','".'<font color=red>��������!</font> <span oncontextmenu=OpenMenu()>'.mysql_real_escape_string($from).'</span> '.mysql_real_escape_string($action).' ��� <B>'.mysql_real_escape_string($buket_name).'</B>.   '."');");
				}
				echo "<b><font color=red>������� ������ ��������� � \"",$_POST['to_login'],"\"</font></b>";
			}
			echo mysql_error();
		}
	}

		?>

<!-- �������� ������� -->
<form method="post">
<TABLE cellspacing=0 cellpadding=0 width=100% bgcolor=#e0e0e2><TD>
<INPUT TYPE=hidden name=present value=1>
�� ������ ������� ������� �������� ��������. ��� ������� ����� ������������ � ���������� � ���������.
<OL>
<LI>������� ����� ���������, �������� ������ ������� �������<BR>
Login <INPUT TYPE=text NAME=to_login value="">
<LI>���� �������. ����� ������������ � ���������� � ��������� (�� ����� 60 ��������)<BR>
<INPUT TYPE=text NAME=podarok2 value="" maxlength=60 size=50>
<LI>�������� ����� ���������������� ������� (� ���������� � ��������� �� ������������)<BR>
<TEXTAREA NAME=txt ROWS=6 COLS=80></TEXTAREA>
<LI>��������, �� ����� ����� �������:<BR>
<INPUT TYPE=radio NAME=from value=0 checked> <? nick2($user['id']);?><BR>
<INPUT TYPE=radio NAME=from value=1 > ��������<BR>
<INPUT TYPE=radio NAME=from value=2 > �� ����� �����<BR>
<LI>������� ������ <B>��������</B> ��� ���������, ������� ������ ����������� � �������:<BR>
</OL>
<input type="hidden" name="flower" id="flower" value="">
<TABLE BORDER=0 WIDTH=100% CELLSPACING="1" CELLPADDING="2" BGCOLOR="#A5A5A5">
<?

//print_r($_POST);

	$data = mysql_query("SELECT * FROM `inventory` WHERE `owner` = '".mysql_real_escape_string($_SESSION['uid'])."' AND `dressed` = 0 AND `gift`=1 AND `setsale`=0 AND `present` = '' ORDER by `id` DESC; ");
	while($row = mysql_fetch_array($data)) {
		if(!in_array($row['id'],array_keys($_SESSION['flowers']))) {
			$row['count'] = 1;
			if ($i==0) { $i = 1; $color = '#C7C7C7';} else { $i = 0; $color = '#D5D5D5'; }
			echo "<TR bgcolor={$color}><TD align=center style='width:150px'><IMG SRC=\"http://img.also.bestcombats.net/i/sh/{$row['img']}\" BORDER=0>";
			?>
			<BR><input type="submit" onclick="document.all['flower'].value='<?=$row['id']?>';" value="��������">
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
	$data = mysql_query("SELECT * FROM `inventory` WHERE `owner` = '".mysql_real_escape_string($_SESSION['uid'])."' AND `dressed` = 0  AND `setsale`=0  AND `podzem`=0 AND `gift`=0 AND `honor`=0 AND `cost`=0 ORDER by `update` DESC; ");
	while($row = mysql_fetch_array($data)) {
		$row['count'] = 1;
		if ($i==0) { $i = 1; $color = '#C7C7C7';} else { $i = 0; $color = '#D5D5D5'; }
		echo "<TR bgcolor={$color}><TD align=center style='width:150px'><IMG SRC=\"http://img.also.bestcombats.net/i/sh/{$row['img']}\" BORDER=0>";

		$price=$row['ecost']/1;

		?>
		<BR><A HREF="vipshop.php?sed=<?=$row['id']?>&sid=&sale=1">������� �� <?=round($price-$row['duration']*($row['ecost']/($row['maxdur']*10)),2)?></A>
		
		</TD>
		<?php
		echo "<TD valign=top>";
		showitem ($row);
		echo "</TD></TR>";
	}
} else
{
	$data = mysql_query("SELECT * FROM `vipshop` WHERE `count` > 0 AND `razdel` = '".mysql_real_escape_string($_GET['otdel'])."' ORDER by `ecost` ASC, `nlevel` ASC");
		while($row = mysql_fetch_array($data)) {
		if ($i==0) { $i = 1; $color = '#dabc98';} else { $i = 0; $color = '#D5D5D5'; }
		echo "<TR bgcolor={$color}><TD align=center style='width:150px'><IMG SRC=\"http://img.also.bestcombats.net/i/sh/{$row['img']}\" BORDER=0>";
		?>
                <BR><A HREF="vipshop.php?otdel=<?=$_GET['otdel']?>&set=<?=$row['id']?>&sid=">������</A> 		
                <IMG SRC="i/up.gif" WIDTH=11 HEIGHT=11 BORDER=0 ALT="������ ��������� ����" style="cursor:hand" onClick="AddCount('<?=$row['id']?>', '<?=$row['name']?>')"></TD>
		<?php
		echo "<TD valign=top>";
		showitem ($row);
		echo "</TD></TR>";
	}
}
	$user8 = mysql_fetch_array(mysql_query("SELECT ekr FROM `users` WHERE `id` = '".mysql_real_escape_string($_SESSION['uid'])."' LIMIT 1;"));
      
?>
</TABLE>
</TD></TR>
</TABLE>

	</TD>
	<TD valign=top width=280>

	<CENTER><B>����� ���� ����� �����: <?php


	echo $d[0];
	?>/<?=get_meshok()?><BR><u>
	� ��� � �������: <FONT COLOR="#FF0000"><?=$user8['ekr']?></FONT> ���.</u></B></CENTER>
	<div style="MARGIN-LEFT:15px; MARGIN-TOP: 10px;">
      <INPUT TYPE="submit" value="������� ����" name="sale"><BR>


<div style="background-color:#d2d0d0;padding:1"><center><font color="#oooo"><B>������ ��������</B></center></div>
<A HREF="vipshop.php?otdel=1&sid=&0.162486541405194">������: �������,����</A><BR>
<A HREF="vipshop.php?otdel=11&sid=&0.337606814894404">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������</A><BR>
<A HREF="vipshop.php?otdel=12&sid=&0.286790872806733">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������,������</A><BR>
<A HREF="vipshop.php?otdel=13&sid=&0.0943516060419363">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����</A><BR>
<A HREF="vipshop.php?otdel=52&sid=&0.0943516060419363">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���������� ������</A><BR>
<A HREF="vipshop.php?otdel=2&sid=&0.76205958316951">������: ������</A><BR>
<A HREF="vipshop.php?otdel=21&sid=&0.648260824682342">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��������</A><BR>
<A HREF="vipshop.php?otdel=100&sid=&0.648260824682342">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�����</A><BR>
<A HREF="vipshop.php?otdel=53&sid=&0.648260824682342">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������</A><BR>
<A HREF="vipshop.php?otdel=22&sid=&0.520447517792988">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������ �����</A><BR>
<A HREF="vipshop.php?otdel=23&sid=&0.99133839275569">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������� �����</A><BR>
<A HREF="vipshop.php?otdel=24&sid=&0.567932791291376">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�����</A><BR>
<A HREF="vipshop.php?otdel=25&sid=&0.567932791296566">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������</A><BR>
<A HREF="vipshop.php?otdel=26&sid=&0.567932791291655">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�����</A><BR>
<A HREF="vipshop.php?otdel=27&sid=&0.567932791291687">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������</A><BR>
<A HREF="vipshop.php?otdel=3&sid=&0.725667864710179">����</A><BR>
<A HREF="vipshop.php?otdel=4&sid=&0.321709306035984">��������� ������: ������</A><BR>
<A HREF="vipshop.php?otdel=41&sid=&0.902093651333512">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��������</A><BR>
<A HREF="vipshop.php?otdel=42&sid=&0.510210803380268">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������</A><BR>
<A HREF="vipshop.php?otdel=5&sid=&0.648834385828923">����������: �����������</A><BR>
<A HREF="vipshop.php?otdel=51&sid=&0.722009624500359">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������ � ��������</A><BR>
<A HREF="vipshop.php?otdel=54&sid=&0.722009624500359">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����������</A><BR>
<A HREF="vipshop.php?otdel=55&sid=&0.722009624500359">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�������</A><BR>
<A HREF="vipshop.php?otdel=56&sid=&0.722009624500359">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��������������</A><BR>
<A HREF="vipshop.php?otdel=57&sid=&0.722009624500359">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�����������</A><BR>
<A HREF="vipshop.php?otdel=189&sid=&0.722009624500359">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��������</A><BR>
<A HREF="vipshop.php?otdel=6&sid=&0.925798340638547">��������</A><BR>
<A HREF="vipshop.php?otdel=7&sid=&0.925798340638547">��������: ��������</A><BR>
<A HREF="vipshop.php?otdel=300&sid=&0.722009624500359">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������</A><BR>
<A HREF="vipshop.php?otdel=71&sid=&0.925798340638547">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�������</A><BR>
<A HREF="vipshop.php?present=1">������� �������</A><BR>
	</div>

<div id="hint3" class="ahint"></div>
    </TD>
    </FORM>
</TR>
</TABLE>
</BODY>
</HTML>