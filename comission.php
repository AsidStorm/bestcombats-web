<?php
    session_start();
    if (@$_SESSION['uid'] == null) {
      header("Location: index.php");
      die;
    }
    include "connect.php";
    $user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
    if (!$user['login']) header("Location: index.php");
    if ($user['level']<1) { header("Location: main.php");  die(); }
    if ($user['room'] != 25) { header("Location: main.php");  die(); }
    include "functions.php";
    $d = mysql_fetch_array(mysql_query("SELECT sum(`massa`) FROM `inventory` WHERE `owner` = '{$_SESSION['uid']}' AND `dressed` = 0 AND `setsale` = 0 and clan=''; "));
    if ($user['battle'] != 0) { header('location: fbattle.php'); die(); }

    $cond="AND present='' AND `destinyinv`<2 AND artefact=0 AND honor=0 AND podzem<>1 and podzem<>2 and podzem<>3 and type<>189 and type<>54 and type<>60 and setsale=0 and dressed=0 and name NOT LIKE '%���������� �����%' and (clan='' or isnull(clan))";


    if ($_GET['sale'] && $_GET['kredit'] && $_GET['n']) {
        $_GET['kredit'] = round($_GET['kredit'],2);
        if ((is_numeric($_GET['kredit']) && $_GET['kredit']>=1) && (is_numeric($_GET['n']) &&  $_GET['n']>0)) {
            $dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE  `dressed`=0 AND podzem<>1 and podzem<>2 AND `id` = '{$_GET['n']}' AND `owner` = '{$_SESSION['uid']}' $cond LIMIT 1;"));
            if (!mqfa1('SELECT COUNT(*) FROM clanstorage WHERE id_it = ' . $dress['id'])) {
                $prc=itemprice($dress);
                if ($_GET['kredit']<$prc["minprice"]*1.1) {
                  echo "<font color=red><b>����������� ���� ������� ".($prc["minprice"]*1.1)." ��</b></font>";
                } elseif ($_GET['kredit']>$prc["maxprice"]*50) {
                  echo "<font color=red><b>������������ ���� ������� ".($prc["maxprice"]*50)." ��</b></font>";              
                } elseif($dress['id']) {
                    mysql_query("UPDATE `inventory` SET `setsale` = '".$_GET['kredit']."' WHERE `id` = '{$_GET['n']}' AND `owner` = '{$_SESSION['uid']}' LIMIT 1;");
                    mysql_query("INSERT INTO `delo` (`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','{$_SESSION['uid']}','\"".$user['login']."\" ���� �������: \"".$dress['name']."\" ".($dress["koll"]?"($dress[koll] ��.)":"")." id:(cap".$dress['id'].") [".$dress['duration']."/".$dress['maxdur']."] � ����������� �� ".$_GET['kredit']." ��. ',1,'".time()."');");
                    echo "<font color=red><b>�� ����� � ������� \"{$dress['name']}\" �� {$_GET['kredit']} ��.</b></font>";
                }
            } else {
                echo "<font color=red><b>��� ���� ����������� �����. �� �� ������ �� �������.</b></font>";
            }
        } elseif (@$_GET['kredit']<1) {
          echo "<font color=red><b>����������� ���� ������� 1 ��</b></font>";
        } else {
            echo "<font color=red><b>�� ���� ��� ������</b></font>";
        }
    }

    if ($_GET['back']) {
        if ($user['money'] >= 1) {
            if (is_numeric($_GET['back']) && $_GET['back']>0) {
                $dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `dressed`=0 AND  `id` = '{$_GET['back']}' AND `owner` = '{$_SESSION['uid']}' AND `setsale` > '0' LIMIT 1;"));
                if($dress['id']) {
                    mysql_query("UPDATE `users` set `money` = `money`-'1' WHERE id = {$_SESSION['uid']}");
                    mysql_query("UPDATE `inventory` SET `setsale` = '0' WHERE `id` = '{$_GET['back']}' AND `owner` = '{$_SESSION['uid']}' LIMIT 1;");
                    mysql_query("INSERT INTO `delo` (`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','{$_SESSION['uid']}','\"".$user['login']."\" ������ �������: \"".$dress['name']."\" ".($dress["koll"]?"($dress[koll] ��.)":"")." id:(cap".$dress['id'].") [".$dress['duration']."/".$dress['maxdur']."] �� ����������� ',1 �� ($user[money]/$user[ekr]),'".time()."');");
                    mysql_query("INSERT INTO `delo` (`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','{$_SESSION['uid']}','\"".$user['login']."\" �������� 1 �� �� �������� ��������: \"".$dress['name']."\" ".($dress["koll"]?"($dress[koll] ��.)":"")." id:(cap".$dress['id'].") [".$dress['duration']."/".$dress['maxdur']."] � ����������� ',1,'".time()."');");
                    $user['money']=$user['money']-1;

                    echo "<font color=red><b>�� ������� �� �������� \"".$dress['name']."\" �� 1 ��.</b></font>";
                }
                else {
                    echo "<font color=red><b>��������� ������. ���� �� ������� � ��������!</b></font>";
                }
            }
            else {
                echo "<font color=red><b>�� ���� ��� ������</b></font>";
            }
        }
        else {
            echo "<font color=red><b>� ��� ������������ ����� �� ������ ��������.</b></font>";
        }
    }


    if (($_GET['set'] OR $_POST['set'])) {
        if ($_GET['set']) { $set = $_GET['set']; }
        if ($_POST['set']) { $set = $_POST['set']; }
        if (!$_POST['count'] || !is_numeric($_POST['count']) || $_POST['count']<=0) { $_POST['count'] =1; }
        if (is_numeric($set) && $set>0) {
            $dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `dressed`=0 AND `id` = '{$set}' AND `setsale` > '0' LIMIT 1;"));
            checkuserbyid($dress['owner']);
            $userfrom = mysql_fetch_array(mysql_query("SELECT `login`,`id` FROM `users` WHERE  `id` = '".$dress['owner']."' LIMIT 1;"));
            if (($userfrom['id'] || !$dress['owner']) && $dress['id']) {
                if (($dress['massa']+$d[0]) > (get_meshok())) {
                    echo "<font color=red><b>������������ ����� � �������.</b></font>";
                }
                elseif ($user['money'] >= $dress['setsale']) {
                    if(mysql_query("UPDATE `inventory` SET `owner` = '{$user['id']}', `setsale` = 0 WHERE `id` = '{$set}' AND `setsale` > '0' LIMIT 1;"))
                    {
                        $good = 1;
                    }
                    else {
                        $good = 0;
                    }

                    if ($good) {
                        //mysql_query("UPDATE `shop` SET `count`=`count`-{$_POST['count']} WHERE `id` = '{$set}' LIMIT 1;");
                        echo "<font color=red><b>�� ������ \"".$dress['name']."\".</b></font>";                        
                        $komiss=round($dress['setsale']*0.10,2);
                        if ($komiss<1) $komiss=1;
                        $moneyto=round($dress['setsale']-$komiss,2);
                        mysql_query("UPDATE `users` set `money` = `money`- '".$dress['setsale']."' WHERE id = {$_SESSION['uid']}");
                        mysql_query("UPDATE `users` set `money` = `money`+ '".$moneyto."' WHERE id = {$userfrom['id']}");
                        mysql_query("INSERT INTO `delo` (`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','{$_SESSION['uid']}','\"".$user['login']."\" ����� �����: \"".$dress['name']."\" ".($dress["koll"]?"($dress[koll] ��.)":"")." id:(cap".$dress['id'].") [".$dress['duration']."/".$dress['maxdur']."] �� \"".$userfrom['login']."\" �� ".$dress['setsale']." ��. � ����������� �� ($user[money]/$user[ekr])',5,'".time()."');");
                        mysql_query("INSERT INTO `delo` (`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','{$userfrom['id']}','\"".$user['login']."\" ����� �����: \"".$dress['name']."\" ".($dress["koll"]?"($dress[koll] ��.)":"")." id:(cap".$dress['id'].") [".$dress['duration']."/".$dress['maxdur']."] �� \"".$userfrom['login']."\" �� ".$dress['setsale']." ��. � ����������� ',5,'".time()."');");
                        mysql_query("INSERT INTO `delo` (`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','{$_SESSION['uid']}','\"".$user['login']."\" ����� �����: \"".$dress['name']."\" ".($dress["koll"]?"($dress[koll] ��.)":"")." id:(cap".$dress['id'].") [".$dress['duration']."/".$dress['maxdur']."] �� ".$dress['setsale']." ��. � ����������� ',1,'".time()."');");
                        mysql_query("INSERT INTO `delo` (`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','{$userfrom['id']}','\"".$userfrom['login']."\" ������� ".$moneyto." ��. �� ������� ������: \"".$dress['name']."\" ".($dress["koll"]?"($dress[koll] ��.)":"")." id:(cap".$dress['id'].") [".$dress['duration']."/".$dress['maxdur']."] ����� ����������� ',1,'".time()."');");
                        $user['money']=$user['money']-$dress['setsale'];
                        if ($dress['owner']) {
                          $us = mysql_fetch_array(mysql_query("select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = '{$userfrom['id']}' LIMIT 1;"));
                          if($us[0]){
                              addchp ('<font color=red>��������!</font> ������� ������ ������� "'.$dress['name'].'" �� '.$dress['setsale'].' ��.  �������� ��������� '.$komiss.' ��. ��� ����������� �� ������������� �������� '.$moneyto.' ��. ','{[]}'.$userfrom['login'].'{[]}');
                          } else {
                              // ���� � ���
                              mysql_query("INSERT INTO `telegraph` (`owner`,`date`,`text`) values ('".$userfrom['id']."','','".'<font color=red>��������!</font> ������� ������ ������� "'.$dress['name'].'" �� '.$dress['setsale'].' ��.  �������� ��������� '.$komiss.' ��. ��� ����������� �� ������������� �������� '.$moneyto.' ��. '."');");
                          }
                        }
                    }
                }
                else {
                    echo "<font color=red><b>������������ ����� ��� ��� ����� � �������.</b></font>";
                }
            }
            else {
                echo "<font color=red><b>���� �� ������� � ��������</b></font>";
            }
        }
        else {
                echo "<font color=red><b>�� ���� ��� ������</b></font>";
        }
    }

    if ($_GET['unsale'] && $_GET['kredit'] && $_GET['id']) {
        if ((is_numeric($_GET['kredit']) && $_GET['kredit']>0) && (is_numeric($_GET['id']) &&  $_GET['id']>0)) {
            $dress = mysql_fetch_array(mysql_query("SELECT * FROM `inventory` WHERE `dressed`=0 AND `id` = '{$_GET['id']}' AND `owner` = '{$_SESSION['uid']}' AND `setsale` > 0 LIMIT 1;"));
            $prc=itemprice($dress);
            if ($_GET['kredit']<$prc["minprice"]*1.1) {
              echo "<font color=red><b>����������� ���� ������� ".($prc["minprice"]*1.1)." ��</b></font>";
            } elseif ($_GET['kredit']>$prc["maxprice"]*50) {
              echo "<font color=red><b>������������ ���� ������� ".($prc["maxprice"]*50)." ��</b></font>";              
            } elseif($dress['id']) {
                if($user['money'] >= 0.1) {
                    mysql_query("UPDATE `inventory` SET `setsale` = '".$_GET['kredit']."' WHERE `id` = '{$_GET['id']}' AND `owner` = '{$_SESSION['uid']}' LIMIT 1;");

                    mysql_query("UPDATE `users` set `money` = `money`- '0.1' WHERE id = {$_SESSION['uid']}");
                    mysql_query("INSERT INTO `delo` (`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','{$_SESSION['uid']}','\"".$user['login']."\" �������� 0.1 �� �� ����� ���� �� ������� \"".$dress['name']."\" ".($dress["koll"]?"($dress[koll] ��.)":"")." id:(cap".$dress['id'].") [".$dress['duration']."/".$dress['maxdur']."] � ����������� �� ($user[money]/$user[ekr]) ',1,'".time()."');");
                    $user['money']=$user['money']-0.1;
                    echo "<font color=red><b>�� �������� ���� \"{$dress['name']}\" �� {$_GET['kredit']} ��.</b></font>";
                }
                else {
                    echo "<font color=red><b>� ��� ������������ ����� �� ���������� ��������.</b></font>";
                }
            }
            else {
                echo "<font color=red><b>������� �� ������.</b></font>";
            }
        }
        else {
                echo "<font color=red><b>�� ���� ��� ������</b></font>";
        }
    }

?>
<HTML><HEAD>
<link rel=stylesheet type="text/css" href="i/main.css">
<meta content="text/html; charset=windows-1251" http-equiv=Content-type>
<META Http-Equiv=Cache-Control Content=no-cache>
<meta http-equiv=PRAGMA content=NO-CACHE>
<META Http-Equiv=Expires Content=0>
<SCRIPT LANGUAGE="JavaScript">
<!--
function sale(name, txt, n, kr)
{
    var s = prompt("����� � ������� \""+txt+"\". ������� ����:", kr);
    if ((s != null)&&(s != '')) {
        location.href="comission.php?sale="+name+"&kredit="+s+"&n="+n;
    }
}
function chsale(name, txt, id, category, kr)
{
    var s = prompt("������� ���� ��� �������� \""+txt+"\". ������� ����� ����:", kr);
    if ((s != null)&&(s != '')) {
        location.href="comission.php?unsale="+name+"&id="+id+"&sc="+category+"&kredit="+s;
    }
}
//-->
</SCRIPT>
</HEAD>
<body leftmargin=5 topmargin=5 marginwidth=5 marginheight=5 bgcolor=#e0e0e0>

<TABLE width=100% cellspacing="0" cellpadding="4">
<TR>
    <TD valign=top align=left>

<!--������������ �������-->

<TABLE width=100% cellspacing="0" cellpadding="0" bgcolor="#A5A5A5">
<TR>
    <TD align=center><B>����� "<?php
    if ($_REQUEST['sale']) {
        echo "����� ����";
    } elseif ($_REQUEST['unsale']) {
        echo "������� ����";
    } else
switch ($_GET['otdel']) {
    case null:
        if (!$_REQUEST['max']) {
        echo "������: �������,����"; }
        else echo $_REQUEST['max'];
        $_GET['otdel'] = 1;
    break;
    case 1:
        echo "������: �������,����";
    break;
    case 11:
        echo "������: ������";
    break;
    case 12:
        echo "������: ������,������";
    break;
    case 13:
        echo "������: ����";
    break;
    case 14:
        echo "������: ���� � ��������";
    break;
        case 30:
        echo "������: ���������� ������";
    break;
    case 2:
        echo "������: ������";
    break;
    case 21:
        echo "������: ��������";
    break;
    case 8:
        echo "������: �������, ��������";
    break;
    case 9:
        echo "������: �����";
    break;
    case 22:
        echo "������: ������ �����";
    break;
    case 23:
        echo "������: ������� �����";
    break;
    case 24:
        echo "������: �����";
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
        echo "��������� ������: ��������";
    break;
    case 42:
        echo "��������� ������: ������";
    break;
    case 5:
        echo "����������: �����������";
    break;
    case 51:
        echo "����������: ������ � ��������";
    break;
    case 52:
        echo "����������: ���������";
    break;
    case 6:
        echo "��������";
    break;
    case 188:
        echo "��������";
    break;
    case 7:
        echo "��������: ��������";
    break;
    case 71:
        echo "��������: �������";
    break;
    case 190:
        echo "�������";
    break;

}


    ?>"</B>

    </TD>
</TR>
<TR><TD><!--������-->
<TABLE BORDER=0 WIDTH=100% CELLSPACING="1" CELLPADDING="2" BGCOLOR="#A5A5A5">
<?
if ($_REQUEST['max']) {
    $data = mysql_query("SELECT * FROM `inventory` WHERE  `dressed`=0 AND `name` LIKE '%".mysql_escape_string($_REQUEST['max'])."%' AND `setsale` > 0 ORDER by `setsale` ASC");
    if ($user['id'] == 7) {
        echo urldecode($_REQUEST['max']);
        //die("SELECT * FROM `inventory` WHERE  `dressed`=0 AND `name` LIKE '%".mysql_escape_string($_REQUEST['max'])."%' AND `setsale` > 0 ORDER by `setsale` ASC");
        //print_r(mysql_fetch_assoc($data));
    }
    while($row = mysql_fetch_array($data)) {
        $row['count'] = 1;
        $row['cost'] = $row['setsale'];
        if ($i==0) { $i = 1; $color = '#C7C7C7';} else { $i = 0; $color = '#D5D5D5'; }
        echo "<TR bgcolor={$color}><TD align=center style='width:150px'><IMG SRC=\"i/sh/{$row['img']}\" BORDER=0>";
        ?>
        <BR><A HREF="comission.php?otdel=<?=$_GET['otdel']?>&set=<?=$row['id']?>&sid=">������</A></TD>
        <?php
        echo "<TD valign=top>";
        $row["ecost"]=0;
        showitem ($row);
        echo "</TD></TR>";
    }
}
elseif ($_REQUEST['sale']) {
    echo "<TR bgcolor=#C7C7C7><TD align=center colspan=2>�������� �� ������ �������� ���������� 10% �� ����, �� ������� �� ����������� �������, �� �� ������ 1 ��.</TD></TR>";
    
    $data = mysql_query("SELECT * FROM `inventory` WHERE `owner` = '{$_SESSION['uid']}' $cond ORDER by `update` DESC; ");
    while($row = mysql_fetch_array($data)) {
        $row['count'] = 1;
        if ($i==0) { $i = 1; $color = '#C7C7C7';} else { $i = 0; $color = '#D5D5D5'; }
        echo "<TR bgcolor={$color}><TD align=center style='width:150px'><IMG SRC=\"i/sh/{$row['img']}\" BORDER=0>";
        ?>
        <BR><A onclick="sale('1', '<?=$row['name']?>', '<?=$row['id']?>', '<?=$row['cost']?>');" HREF="#">c���� � �������</A>
        </TD>
        <?php
        echo "<TD valign=top>";
        showitem ($row);
        echo "</TD></TR>";
    }
} elseif ($_REQUEST['unsale']) {
    $data = mysql_query("SELECT * FROM `inventory` WHERE `setsale` > 0 AND `owner` = '{$_SESSION['uid']}' AND `dressed` = 0 ORDER by `update` DESC; ");
    while($row = mysql_fetch_array($data)) {
        $row['count'] = 1;
        if ($i==0) { $i = 1; $color = '#C7C7C7';} else { $i = 0; $color = '#D5D5D5'; }
        echo "<TR bgcolor={$color}><TD align=center style='width:150px'><IMG SRC=\"i/sh/{$row['img']}\" BORDER=0>";
        ?>
        <BR><A HREF="?back=<?=$row['id']?>&sid=&unsale=1">������� �� 1 ��.</A>
        <BR><A onclick="chsale('1', '<?=$row['name']?>', <?=$row['id']?>, '1', '<?=$row['setsale']?>')" HREF="#">������� ����<BR>�� 0.1 ��.</A>
        </TD>
        <?php
        echo "<TD valign=top>";
        showitem ($row);
        echo "</TD></TR>";
    }
} else
{
    $data = mysql_query("SELECT DISTINCT `img`, `name`, `nalign`,`massa` FROM `inventory` WHERE  `dressed`=0 AND `setsale` > 0 AND `present` = '' ".($_GET["otdel"]==190?" and type=190 ":"AND `otdel` = '".$_GET['otdel']."'")." GROUP BY `img` ORDER by `cost` ASC");
    //echo mysql_error();
    while($row = mysql_fetch_array($data)) {
        $item_name1=str_replace("+1","",$row[1]);
        $item_name1=str_replace("+2","",$item_name1);
        $item_name1=str_replace("+3","",$item_name1);
        $item_name1=str_replace("+4","",$item_name1);
        $item_name1=str_replace("+5","",$item_name1);
        $item_name1=str_replace("+6","",$item_name1);
        $item_name1=str_replace("+7","",$item_name1);
        $item_name1=str_replace("+8","",$item_name1);
        $item_name1=str_replace("+9","",$item_name1);
        $item_name1=str_replace("+10","",$item_name1);
        $item_name=str_replace(" (��)","",$item_name1);
        $item = mysql_fetch_array(mysql_query("SELECT count(`id`), min(duration), min(maxdur), max(duration), max(maxdur), min(setsale), max(setsale) FROM `inventory` WHERE  `dressed`=0 AND `setsale` > 0 AND `present` = '' AND name LIKE '".$item_name."%';"));
        //$row['count']=1;
        if ($i==0) { $i = 1; $color = '#C7C7C7';} else { $i = 0; $color = '#D5D5D5'; }
        ?>
        <TR bgcolor=<?=$color?>>
        <TD align=center><IMG SRC="i/sh/<?=$row['img']?>" ALT="" ><BR><A HREF="comission.php?&max=<?=$item_name?>">���������</A></TD>
        <TD valign=top><A HREF="#"><?=$item_name?></a>
        <IMG SRC="i/align_<?=$row[2]?>.gif" WIDTH="12" HEIGHT="15" ALT="">  (�����: <?=$row['massa']?>) <BR>
        <b>����: <?=round($item[5],2)?> - <?=round($item[6],2)?> ��.</b> <small>(����������: <?=$item[0]?>)</small><BR>

        �������������: <?=$item[1]?>-<?=$item[2]?>/<?=$item[3]?>-<?=$item[4]?></FONT><BR>

        </TD>
        </TR>
        <?
    }
}




?>
</TABLE>
</TD></TR>
</TABLE>

    </TD>
    <TD valign=top width=280>
    <TABLE border=0 width=100% cellspacing="0" cellpadding="0">
    <td align=right>
    <FORM action="comission.php" method=GET>
        <INPUT TYPE="button" value="���������" style="background-color:#A9AFC0" onclick="window.open('help/shop.html', 'help', 'height=300,width=500,location=no,menubar=no,status=no,toolbar=no,scrollbars=yes')">
        <INPUT TYPE="button" onclick="location.href='city.php?cp=3';" value="���������" name="cp">

    </table>
    <CENTER><B>����� ���� ����� �����: <?php


    echo $d[0];
    ?>/<?=get_meshok()?><BR>
    � ��� � �������: <FONT COLOR="#339900"><?=$user['money']?></FONT> ��.</B></CENTER>
    <div style="MARGIN-LEFT:15px; MARGIN-TOP: 10px;">

    <INPUT TYPE="submit" value="����� ���� � �������" name="sale"><BR>
    <INPUT TYPE="submit" value="������� ���� �� ��������" name="unsale"><BR>
<div style="background-color:#d2d0d0;padding:1"><center><font color="#oooo"><B>������ ��������</B></center></div>
<A HREF="?otdel=1&sid=&0.162486541405194">������: �������,����</A><BR>
<A HREF="?otdel=11&sid=&0.337606814894404">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������</A><BR>
<A HREF="?otdel=12&sid=&0.286790872806733">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������,������</A><BR>
<A HREF="?otdel=13&sid=&0.0943516060419363">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;����</A><BR>
<A HREF="?otdel=30&sid=&0.0943516060419363">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;���������� ������</A><BR>
<A HREF="?otdel=2&sid=&0.76205958316951">������: ������</A><BR>
<A HREF="?otdel=21&sid=&0.648260824682342">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��������</A><BR>

<A HREF="?otdel=8&sid=&0.520447517792988">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�������, ��������</A><BR>
<A HREF="?otdel=9&sid=&0.520447517792988">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�����</A><BR>


<A HREF="?otdel=22&sid=&0.520447517792988">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������ �����</A><BR>
<A HREF="?otdel=23&sid=&0.99133839275569">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������� �����</A><BR>
<A HREF="?otdel=24&sid=&0.567932791291376">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�����</A><BR>
<A HREF="?otdel=25&sid=&0.567932791296566">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������</A><BR>
<A HREF="?otdel=26&sid=&0.567932791291655">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�����</A><BR>
<A HREF="?otdel=27&sid=&0.567932791291687">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������</A><BR>
<A HREF="?otdel=3&sid=&0.725667864710179">����</A><BR>
<A HREF="?otdel=4&sid=&0.321709306035984">��������� ������: ������</A><BR>
<A HREF="?otdel=41&sid=&0.902093651333512">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��������</A><BR>
<A HREF="?otdel=42&sid=&0.510210803380268">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������</A><BR>
<A HREF="?otdel=5&sid=&0.648834385828923">����������: �����������</A><BR>
<A HREF="?otdel=51&sid=&0.722009624500359">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;������ � ��������</A><BR>
<A HREF="?otdel=6&sid=&0.925798340638547">��������</A><BR>
<A HREF="?otdel=188&sid=&0.925798340638547">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;��������</A><BR>
<A HREF="?otdel=7&sid=&0.925798340638547">��������: ��������</A><BR>
<A HREF="?otdel=71&sid=&0.925798340638547">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;�������</A><BR>
<A HREF="?otdel=190&sid=&0.925798340638547">�������</A><BR>
    </div>
<div id="hint3" class="ahint"></div>
    </TD>
    </FORM>
</TR>
</TABLE>

<br><div align=right>

    <?php include("mail_ru.php"); ?>

<div>

</BODY>
</HTML>
