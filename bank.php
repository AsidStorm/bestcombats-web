<?
ob_start("ob_gzhandler");
    session_start();
    if ($_SESSION['uid'] == null) header("Location: index.php");
    include "connect.php";
    $user = mysql_fetch_array(mq("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
    include "functions.php";
    if ($user['room'] != 29) header("Location: main.php");
    if ($user['battle'] != 0) { header('location: fbattle.php'); die(); }

            function inschet($userid){
                $banks = mq("SELECT * FROM `bank` WHERE (`owner` = ".$userid." or `owner2` = ".$userid.");");
                echo "<select style='width:90px' name=id>";
                while ($rah = mysql_fetch_array($banks)) {
                    echo "<option>",$rah['id'],"</option>";
                }
                echo "</select>";
            }

?>
<HTML><HEAD>
    <script>
        function returned2(s){
            top.frames['main'].location='city.php?'+s+'tmp='+Math.random()
        }
    </script>
<link rel=stylesheet type="text/css" href="http://img.bestcombats.net/css/main.css">
<meta content="text/html; charset=windows-1251" http-equiv=Content-type>
<SCRIPT src='http://img.bestcombats.net/js/commoninf.js'></SCRIPT>
<SCRIPT LANGUAGE="JavaScript1.2" SRC="http://img.bestcombats.net/js/keypad.js"></SCRIPT>
<style type="text/css">
<!--
.btkey {
    display: block; text-align: center;
    PADDING-RIGHT: 1px; PADDING-LEFT: 1px;
    FONT-SIZE: 6.5pt; FONT-FAMILY: verdana,sans-serif,arial;
    width: 18;
    CURSOR: hand;
    border: 1px solid #D6D3CE;
    COLOR: #000000; BACKGROUND-COLOR: #ffffff;
}
-->
</style>
</HEAD>
<body bgcolor=e2e0e0 style="margin-left:10px">
<TABLE width=100%>
<TR><TD><H3>����</TD>
<link href="http://img.bestcombats.net/js/design6.css" rel="stylesheet" type="text/css">
<td align=right width=60><INPUT TYPE=button value="���������" onClick="returned2('strah=3&');"></td>
</tr>
</table>
<?
    if($_GET['exit']) $_SESSION['bankid'] = null;
    if (@$_GET["givecheque"]) {
      $ec=mqfa1("select ecost from inventory where type=199 and owner='$user[id]' and id='$_GET[givecheque]'");
      if ($ec) {
        mq("update users set ekr=ekr+$ec where id='$user[id]'");
        mq("update userdata set balance=$ec*11+balance where id='$user[id]'");
        mq("delete from inventory where id='$_GET[givecheque]'");
        echo "<b>�� ��������� �� �������� $ec ���.</b><br>";
        mq("INSERT INTO `delo` (`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','{$_SESSION['uid']}','\"".$user['login']."\" ���� ��������� (id:$_GET[givecheque]) �� $ec ��� ($user[money]/$user[ekr]). ',2,'".time()."');");
      }
    }
    //������� �� ����
    if($_POST['enter'] && $_POST['pass']) {

                    $data = mq("SELECT * FROM `bank` WHERE (`owner` = '".$user['id']."' or `owner2` = '".$user['id']."') AND `id`= '".$_POST['id']."' AND `pass` = '".md5($_POST['pass'])."';");
                    echo mysql_error();
                    $data = mysql_fetch_array($data);
                    if($data) {
                        $_SESSION['bankid'] = $_POST['id'];
                    }
                    else
                    {
                        err('������ �����.');
                    }


    }
    if(!$_SESSION['bankid'] )
{
//�������� �����
    if($_POST['reg'] && $_POST['rpass'] && $_POST['rpass2']) {
        if ($_POST['rpass'] == $_POST['rpass2']) {
            if ($user['money'] >= 3) {
                if(mq("INSERT INTO `bank` (`pass`,`owner`) values ('".md5($_POST['rpass2'])."','".$user['id']."');")) {
                    $sh_num=mysql_insert_id();
                    err('��� ����� �����: '.mysql_insert_id().', ��������.');
                    mq("UPDATE users SET money = money-3 WHERE id = ".$user['id']." LIMIT 1;");
                    mq("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','{$_SESSION['uid']}','\"".$user['login']."\" ������ ���� �".$sh_num." � �����. ',1,'".time()."');");
                    mq("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','{$_SESSION['uid']}','\"".$user['login']."\" �������� �� �������� ����� � ����� 3 ��. ',1,'".time()."');");
                }
                else {
                    err('����������� ������');
                }
            } else {
                err('������������ �����');
            }
        } else {
            err('�� ��������� ������');
        }
    }
//�������� ������ �� ����
    if ($_POST['resendmail']){

    $bank2 = mysql_fetch_array(mq("SELECT mail FROM `bank` WHERE `owner` = ".$user['id'].";"));

        if ($bank2['mail']==0) {
        err('� ��� ��������� ������� ������ �� email');
        }else{
    $newpass=md5(md5(math.rand(-2000000,2000000).$user['login']));
    $newpass=substr($newpass,0,10);
    $lasttime=mktime(0, 0, 0, date("m")  , date("d")+1, date("Y"));
    $ipclient=getenv("REMOTE_ADDR");

    if (mq("insert into confirmpasswd(login,passwd,date,ip,active) values('bbb".$_POST['id']."bbb','".$newpass."','".$lasttime."','".$ipclient."',1)")){
        $headers  = "Mime-Version: 1.1 \r\n";
        $headers .= "Date: ".date("r")." \r\n";
        $headers .= "Content-type: text/html; charset=windows-1251 \r\n";
        $headers .= "From: Support Bestcombats <support@bestcombats.net>\r\n";

        $headers = trim($headers);
        $headers = stripslashes($headers);

        $aa='<html>
                <head>
                    <title>������������� ������</title>
                </head>
                <body>
                    ������ ���� '.$user['realname'].'.<br>
                    ���� ���� ��������� ������������� ������ ��� ����� '.$_POST['id'].' c IP ������ - '.$ipclient.', ���� ��� ���� �� ��, ������ ������� ��� ������.<br>
                    <br>
                    ------------------------------------------------------------------<br>
                    ��� � �����  | '.$_POST['id'].'<br>
                    ����� ������ | '.$newpass.'<br>
                    ------------------------------------------------------------------<br>
                    <br>
                    <br>
                    <h3>��� ������������� ������ ������ �������� �� ������ ����.</h3><br>
                    <a href="http://bestcombats.net/confpassbank.php?newpass='.$newpass.'&login='.$_POST['id'].'&flag=1&timev='.$lasttime.'">������������� ������</a>
                    <br>
                    <font color="blue">���� �� �� ������������ ������ �� <b>'.date("d-M-Y", $lasttime) .' 00:00</b>, ������ ����� ����������.</font>
                    <br>
                    �������� �� ������ ������ �� �����.
                </body>
            </html>';

        mail($user['email'],"������������� ����������� ����� �� BestcombatS.net, ��� ������������ - ".$user['login'],$aa,$headers);
        err('������ ����� ����� � ������ �� email, ��������� � ������.');
    }else{
        err('������� ������ ��� ���������. ��������� �����');
    }
}
}
        if ($_POST['open']){
        ?>
<FORM action="bank.php" method=POST name="F3">
<H4>�������� �����</H4>
����� ����� � ������ ������ ��������� ������ � ������ ���������. ������ �������� <b><?=$user['login']?></b> ����� ������������ ���� ����, ����� ������, ���� ���� ��� ����� � ������, �� ������� ������� � ����!<BR><BR>
<table><tr><TD valign=top>
<table>
<tr><TD><nobr>���������� ������ � �����</nobr><br><INPUT TYPE=password name=rpass>&nbsp;<img border=0 SRC="/i/misc/klav_transparent.gif"  style='cursor: hand' onClick="KeypadShow(1, 'F3', 'rpass', 'keypad3');"></TD></tr>
<tr><TD><nobr>������� ������ ��������</nobr><br><INPUT TYPE=password name=rpass2>&nbsp;<img border=0 SRC="/i/misc/klav_transparent.gif"  style='cursor: hand' onClick="KeypadShow(1, 'F3', 'rpass2', 'keypad3');"></TD></tr>
<tr><TD><nobr>�� ���������: <B>3.00 ��.</B></td></tr>
</table>
<INPUT TYPE=submit value="������� ����" name=reg>
</TD>
<TD><div id="keypad3" align=center style="display: none;"></div>
</TD>
</tr></table>
</FORM>
            <?}else{?>
</HTML>
</TD>
</TR>
</TABLE>
<BR>
�� ������������� ��������� ������:
<OL>
<LI>�������� �����
<LI>����������� ��������/����� �������/����������� �� �����
<LI>��������� �������/����������� � ������ ����� �� ������
<LI>�������� �����. ����� ������������ �� �������
<LI>������� ��� �� ���������� �� ������
</OL>
<?
  $r=mq("select id, name from inventory where type=199 and owner='$user[id]'");
  while ($rec=mysql_fetch_assoc($r)) {
    $rec["name"]=str_replace("���������", "���������", $rec["name"]);
    echo "<a href=\"/bank.php?givecheque=$rec[id]\">����� $rec[name]</a><br>";
  }
?>
<FORM action="bank.php" method=POST>
������ ������� ���� ����? ������ �������: <B>3.00 ��.</B> <INPUT TYPE=submit value="������� ����" name=open>
</FORM>
<TABLE><TR><FORM action="bank.php" name="F2" method=POST><TD>
<FIELDSET><LEGEND><B>���������� ������</B> </LEGEND>
<?
if ($bank['owner']==$user["id"] || $bank['owner2']==$user["id"])
{echo "<br>��� ��������� � ��������� � �����<br>";}
else
{$_SESSION['bankid'] = null;}
?>
<TABLE>
<TR><TD valign=top>
<TABLE>
<TR><TD>����� �����</td> <TD colspan=2>
        <? inschet($user['id']); ?>
</td></tr>
<TR><TD>������</td><td> <INPUT style='width:90;' type=password value="" name=pass></td><TD style='padding: 0, 0, 3, 5'><img border=0 SRC="/i/misc/klav_transparent.gif" style='cursor: hand' onClick="KeypadShow(1, 'F2', 'pass', 'keypad2');"></TD></tr>
<TR><TD colspan=3 align=center><INPUT TYPE=submit value="�����" name=enter></td></tr>
</TABLE>
</TD>
<TD><div id="keypad2" align=center style="display: none;"></div></TD></TR>
</TABLE>
</FIELDSET>
</TD></TR></TABLE>
������ ����� ����� �/��� ������? ����� �� ������� �� email, ��������� � ������ <INPUT TYPE=submit value="�������" name=resendmail>
<br><br>
</FORM>
            <?}}else{
    $bank = mysql_fetch_array(mq("SELECT * FROM `bank` WHERE `id` = ".$_SESSION['bankid'].";"));
//������ ������� �� ����
    if($_POST['in'] && $_POST['ik']) {
        mq("lock tables users write, bank write, delo write, bankhistory write, userdata write");
        $_POST['ik'] = round($_POST['ik'],2);
        $user['money']=mqfa1("select money from users where id='$user[id]'");
        if (is_numeric($_POST['ik']) && ($_POST['ik']>0) && ($_POST['ik'] <= $user['money'])) {
            $user['money'] -= $_POST['ik'];
            if (mq("UPDATE `users` SET `money` = `money` - '".$_POST['ik']."' WHERE `id`= ".$user['id']." LIMIT 1;")) {
                $mywarn="������ ������ �������� �� ����";
                mq("UPDATE `bank` SET `cr` = `cr` + '".$_POST['ik']."' WHERE `id`= ".$_SESSION['bankid']." LIMIT 1;");
                mq("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','{$_SESSION['uid']}','�������� \"".$user['login']."\" ������� �� ���� ���� �".$_SESSION['bankid']." ".$_POST['ik']." ��. ',1,'".time()."');");
                $putkr = $_POST['ik']+$bank['cr'];
                mq("INSERT INTO `bankhistory`(`id` , `text` , `bankid`) VALUES ('','�� �������� �� ���� <b>{$_POST['ik']} ��.</b>, �������� <b>0 ��.</b> <i>(�����: {$putkr} ��., {$bank['ekr']} ���.)</i>','{$_SESSION['bankid']}');");

            }
            else {
                $mywarn="��������� ������!";
            }
        } else {
          $mywarn="� ��� ������������ ����� ��� ���������� ��������";
        }
        $_POST['in']=0;
        mq("unlock tables");
    }
//������ ����������� �� ����
    if($_POST['ekrin'] && $_POST['ekrik']) {
        mq("lock tables users write, bank write, delo write, bankhistory write, userdata write");
        $_POST['ekrik'] = round($_POST['ekrik'],2);
        $user['ekr']=mqfa1("select ekr from users where id='$user[id]'");
        if (is_numeric($_POST['ekrik']) && ($_POST['ekrik']>0) && ($_POST['ekrik'] <= $user['ekr'])) {
          $user['ekr'] -= $_POST['ekrik'];
          if (mq("UPDATE `users` SET `ekr` = `ekr` - '".$_POST['ekrik']."' WHERE `id`= ".$user['id']." LIMIT 1;")) {
            $mywarn="����������� ������ �������� �� ����";
            mq("UPDATE `bank` SET `ekr` = `ekr` + '".$_POST['ekrik']."' WHERE `id`= ".$_SESSION['bankid']." LIMIT 1;");
            mq("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','{$_SESSION['uid']}','�������� \"".$user['login']."\" ������� �� ���� ���� �".$_SESSION['bankid']." ".$_POST['ekrik']." ���. $user[money]/$user[ekr]',1,'".time()."');");
            $putekr = $_POST['ekrik']+$bank['ekr'];
            mq("INSERT INTO `bankhistory`(`id` , `text` , `bankid`) VALUES ('','�� �������� �� ���� <b>{$_POST['ekrik']} ���.</b>, �������� <b>0 ��.</b> <i>(�����: {$bank['cr']} ��., {$putekr} ���.)</i>','{$_SESSION['bankid']}');");
          } else {
            $mywarn="��������� ������!";
          }
        } else {
          $mywarn="� ��� ������������ ������������ ��� ���������� ��������";
        }
        $_POST['ekrin']=0;
        mq("unlock tables");
        $bank = mysql_fetch_array(mq("SELECT * FROM `bank` WHERE `id` = ".$_SESSION['bankid'].";"));
    }
//������� ����������� �� �����
    if($_POST['ekrout'] && $_POST['ekrok']) {
        mq("lock tables users write, bank write, delo write, bankhistory write, userdata write");
        $bank = mysql_fetch_array(mq("SELECT * FROM `bank` WHERE `id` = ".$_SESSION['bankid'].";"));
        $_POST['ekrok'] = round($_POST['ekrok'],2);
        if (is_numeric($_POST['ekrok']) && ($_POST['ekrok']>0) && ($_POST['ekrok'] <= $bank['ekr'])) {
            $user['ekr'] += $_POST['ekrok'];
            if (mq("UPDATE `users` SET `ekr` = `ekr` + '".$_POST['ekrok']."' WHERE `id`= ".$user['id']." LIMIT 1;")) {
                $mywarn="����������� ������ ����� �� �����";
                mq("UPDATE `bank` SET `ekr` = `ekr` - '".$_POST['ekrok']."' WHERE `id`= ".$_SESSION['bankid']." LIMIT 1;");
                $bank = mysql_fetch_array(mq("SELECT * FROM `bank` WHERE `id` = ".$_SESSION['bankid'].";"));
                mq("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','{$_SESSION['uid']}','�������� \"".$user['login']."\" ���� �� ������ ����� �".$_SESSION['bankid']." ".$_POST['ekrok']." ���. $user[money]/$user[ekr]',1,'".time()."');");
                mq("INSERT INTO `bankhistory`(`id` , `text` , `bankid`) VALUES ('','�� ����� �� ����� <b>{$_POST['ekrok']} ���.</b>, �������� <b>0 ��.</b> <i>(�����: {$bank['cr']} ��., {$bank['ekr']} ���.)</i>','{$_SESSION['bankid']}');");

            }
            else {
            $mywarn="��������� ������!";
          }
        } else {
          $mywarn="� ��� ������������ ������������ �� ����� ��� ���������� ��������";
        }
        $_POST['ekrout']=0;
        mq("unlock tables");
        $bank = mysql_fetch_array(mq("SELECT * FROM `bank` WHERE `id` = ".$_SESSION['bankid'].";"));
    }
//������� ������� �� �����
    if($_POST['out'] && $_POST['ok']) {
        mq("lock tables users write, bank write, delo write, bankhistory write, userdata write"); 
        $bank = mysql_fetch_array(mq("SELECT * FROM `bank` WHERE `id` = ".$_SESSION['bankid'].";"));
        $_POST['ok'] = round($_POST['ok'],2);
        if (is_numeric($_POST['ok']) && ($_POST['ok']>0) && ($_POST['ok'] <= $bank['cr'])) {
            $user['money'] += $_POST['ok'];
            if (mq("UPDATE `users` SET `money` = `money` + '".$_POST['ok']."' WHERE `id`= ".$user['id']." LIMIT 1;")) {
                $mywarn="������ ������ ����� �� �����";
                mq("UPDATE `bank` SET `cr` = `cr` - '".$_POST['ok']."' WHERE `id`= ".$_SESSION['bankid']." LIMIT 1;");
                $bank = mysql_fetch_array(mq("SELECT * FROM `bank` WHERE `id` = ".$_SESSION['bankid'].";"));
                mq("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','{$_SESSION['uid']}','�������� \"".$user['login']."\" ���� �� ������ ����� �".$_SESSION['bankid']." ".$_POST['ok']." ��.',1,'".time()."');");
                mq("INSERT INTO `bankhistory`(`id` , `text` , `bankid`) VALUES ('','�� ����� �� ����� <b>{$_POST['ok']} ��.</b>, �������� <b>0 ��.</b> <i>(�����: {$bank['cr']} ��., {$bank['ekr']} ���.)</i>','{$_SESSION['bankid']}');");

            }
            else {
                $mywarn="��������� ������!";
            }
        } else {
          $mywarn="� ��� ������������ ����� �� ����� ��� ���������� ��������";
        }
        mq("unlock tables");
        $_POST['out']=0;
    }
//����� ������������
    if($_POST['change'] && $_POST['ok1']) {
        mq("lock tables users write, bank write, delo write, bankhistory write, userdata write"); 
        $bank = mysql_fetch_array(mq("SELECT * FROM `bank` WHERE `id` = ".$_SESSION['bankid'].";"));
        $_POST['ok1'] = round($_POST['ok1'],2);
        if (is_numeric($_POST['ok1']) && ($_POST['ok1']>0) && ($_POST['ok1'] <= $bank['ekr'])) {
            $bank['cr'] += $_POST['ok1'] * 80;
            $bank['ekr'] -= $_POST['ok1'];
            $add_money=$_POST['ok1'] * 80;
            if (mq("UPDATE `bank` SET `cr` = `cr` + '$add_money' WHERE `id`= ".$bank['id']." LIMIT 1;")) {
                $mywarn="����� ���������� �������";
                mq("UPDATE `bank` SET `ekr` = `ekr` - '".$_POST['ok1']."' WHERE `id`= ".$_SESSION['bankid']." LIMIT 1;");
                $bank = mysql_fetch_array(mq("SELECT * FROM `bank` WHERE `id` = ".$_SESSION['bankid'].";"));
                mq("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','{$_SESSION['uid']}','�������� \"".$user['login']."\" ������� ".$_POST['ok1']." ���. �� ".$add_money." ��. �� ����� �".$_SESSION['bankid']." � �����. ',1,'".time()."');");
            }
            else {
                $mywarn="��������� ������!";
            }
        } else {
          $mywarn="� ��� ������������ ����� �� �������� ����� ��� ���������� ��������";
        }
        $_POST['change']=0;
        mq("unlock tables");
    }
    //����� ������������
    if($_POST['change'] && $_POST['ok1']) {
        mq("lock tables users write, bank write, delo write, bankhistory write, userdata write"); 
        $bank = mysql_fetch_array(mq("SELECT * FROM `bank` WHERE `id` = ".$_SESSION['bankid'].";"));
        $_POST['ok1'] = round($_POST['ok1'],2);
        if (is_numeric($_POST['ok1']) && ($_POST['ok1']>0) && ($_POST['ok1'] <= $bank['ekr'])) {
            $bank['cr'] += $_POST['ok1'] * 80;
            $bank['ekr'] -= $_POST['ok1'];
            $add_money=$_POST['ok1'] * 80;
            if (mq("UPDATE `bank` SET `cr` = `cr` + '$add_money' WHERE `id`= ".$bank['id']." LIMIT 1;")) {
                $mywarn="����� ���������� �������";
                mq("UPDATE `bank` SET `ekr` = `ekr` - '".$_POST['ok1']."' WHERE `id`= ".$_SESSION['bankid']." LIMIT 1;");
                $bank = mysql_fetch_array(mq("SELECT * FROM `bank` WHERE `id` = ".$_SESSION['bankid'].";"));
                mq("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','{$_SESSION['uid']}','�������� \"".$user['login']."\" ������� ".$_POST['ok1']." ���. �� ".$add_money." ��. �� ����� �".$_SESSION['bankid']." � �����. ',1,'".time()."');");
            }
            else {
                $mywarn="��������� ������!";
            }
        } else {
          $mywarn="� ��� ������������ ����� �� �������� ����� ��� ���������� ��������";
        }
        $_POST['change']=0;
        mq("unlock tables");
    }
    //����� ��������
    if($_POST['change'] && $_POST['krekr']) {
        mq("lock tables users write, bank write, delo write, bankhistory write, userdata write"); 
        $bank = mysql_fetch_array(mq("SELECT * FROM `bank` WHERE `id` = ".$_SESSION['bankid'].";"));
        $_POST['krekr'] = round($_POST['krekr'],2);
        if (is_numeric($_POST['krekr']) && ($_POST['krekr']>0) && ($_POST['krekr'] <= $bank['cr'])) {
            $bank['ekr'] += $_POST['krekr'] / 1000;
            $bank['cr'] -= $_POST['krekr'];
            $add_money=$_POST['krekr'] / 1000;
            if (mq("UPDATE `bank` SET `ekr` = `ekr` + '$add_money' WHERE `id`= ".$bank['id']." LIMIT 1;")) {
                $mywarn="����� ���������� �������";
                mq("UPDATE `bank` SET `cr` = `cr` - '".$_POST['krekr']."' WHERE `id`= ".$_SESSION['bankid']." LIMIT 1;");
                $bank = mysql_fetch_array(mq("SELECT * FROM `bank` WHERE `id` = ".$_SESSION['bankid'].";"));
                mq("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','{$_SESSION['uid']}','�������� \"".$user['login']."\" ������� ".$_POST['krekr']." ��. �� ".$add_money." ���. �� ����� �".$_SESSION['bankid']." � �����. ',1,'".time()."');");
            }
            else {
                $mywarn="��������� ������!";
            }
        } else {
          $mywarn="� ��� ������������ ����� �� �������� ����� ��� ���������� ��������";
        }
        $_POST['change']=0;
        mq("unlock tables");
    }
//����� ������
    if($_POST['change_psw'] && $_POST['new_psw'] && $_POST['new_psw2']) {
        if ($_POST['new_psw'] == $_POST['new_psw2']) {
                if (mq("UPDATE `bank` SET `pass` = '".md5($_POST['new_psw2'])."' WHERE `id` = ".$_SESSION['bankid'].";")) {
                    err('������ ������� �������.');
                }
                else {
                    err('����������� ������');
                }
        } else {
            err('�� ��������� ������');
        }
    }
//��������� �������� ������

    if($_POST['start_send_email']) {
                if (mq("UPDATE `bank` SET `mail` = 1 WHERE `id` = ".$_SESSION['bankid'].";")) {
                    err('�� ��������� ������� ������ ����� � ������ �� email.');
                }
    }
//��������� �������� ������
    if($_POST['stop_send_email']) {
                if (mq("UPDATE `bank` SET `mail` = 0 WHERE `id` = ".$_SESSION['bankid'].";")) {
                    err('�� ��������� ������� ������ ����� � ������ �� email.');
                }
    }
//������ �������
        if($_POST['save_notepad'])
        {
        $_POST['notepad']=htmlspecialchars($_POST['notepad']);
        if(preg_match("/__/",$_POST['notepad']) || preg_match("/--/",$_POST['notepad']))
        {
        echo"� ������ �� ������ �������������� ������ ����� 1 ������� '_' ��� '-'.";
        }else{
        mq("update `bank` set `note` = '".$_POST['notepad']."' WHERE `id` = '".$_SESSION['bankid']."';");
        err('���������.');
        }
        }
    $bank = mysql_fetch_array(mq("SELECT * FROM `bank` WHERE `id` = ".$_SESSION['bankid'].";"));
//��������� ������� �� ������ ����
    if($_POST['wu'] && $_POST['sum'] && $_POST['number'] && $user["level"]>=4) {
      mq("lock tables users write, bank write, delo write, bankhistory write, userdata write"); 
      $bank = mysql_fetch_array(mq("SELECT * FROM `bank` WHERE `id` = ".$_SESSION['bankid'].";"));
      $_POST["number"]=(int)$_POST["number"];
        $al=mqfa("select align, level, users.id from bank left join users on users.id=bank.owner where bank.id='$_POST[number]'");
        if ($user['align'] == 4 || $al["align"]==4) {
          $mywarn="��������� �������� ���������!";
        } elseif ($al['level']<4 || $user["level"]<4) {
          $mywarn="�������� �������� � 4-�� ������!";
        } elseif (!cangive($_POST['sum'])) {
          $mywarn="����� �������� ��������� ���������� �����.";
        } else {
            $bank2 = mysql_fetch_array(mq("SELECT * FROM `bank` WHERE `id` = ".$_POST['number'].";"));
            $to = mysql_fetch_array(mq("SELECT login FROM `users` WHERE `id` = ".$bank2['owner'].";"));
            if($bank2[0]){
                $_POST['sum'] = round($_POST['sum'],2);
                if (is_numeric($_POST['sum']) && ($_POST['sum']>0)) {
                    $nalog=round($_POST['sum']*0.03);
                    if ($nalog < 1) {$nalog=1; }
                    $new_sum=$_POST['sum']+$nalog;
                    if ($new_sum <= $bank['cr']) {
                        if (mq("UPDATE `bank` SET `cr` = `cr` - '".$new_sum."' WHERE `id`= ".$_SESSION['bankid']." LIMIT 1;")) {
                          updbalance($user["id"], $al["id"], $_POST['sum']);
                          mq("UPDATE `bank` SET `cr` = `cr` + '".$_POST['sum']."' WHERE `id`= ".$_POST['number']." LIMIT 1;");
                          $bank = mysql_fetch_array(mq("SELECT * FROM `bank` WHERE `id` = ".$_SESSION['bankid'].";"));
                          mq("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','{$_SESSION['uid']}','�������� \"".$user['login']."\" ������� �� ������ ����������� ����� �".$_SESSION['bankid']." �� ���� �".$_POST['number']." � ��������� ".$to['login']." ".$_POST['sum']." ��. ������������� ����� ".$nalog." ��. �� ������ ����� ',1,'".time()."');");
                          mq("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','{$bank2['owner']}','�������� \"".$user['login']."\" ������� �� ������ ����������� ����� �".$_SESSION['bankid']." �� ���� �".$_POST['number']." � ��������� ".$to['login']." ".$_POST['sum']." ��. ������������� ����� ".$nalog." ��. �� ������ ����� ',1,'".time()."');");

                          $otkogo = mysql_fetch_array(mq("SELECT `login` FROM `users` WHERE `id` = '{$bank['owner']}';"));
                          $komy = mysql_fetch_array(mq("SELECT `login` FROM `users` WHERE `id` = '{$bank2['owner']}';"));
                          $bablo = $_POST['sum']+$bank2['cr'];
                          mq("INSERT INTO `bankhistory`(`id` , `text` , `bankid`) VALUES ('','�� �������� <b>{$_POST['sum']} ��.</b> �� ���� {$_POST['number']} ��������� \"{$komy['login']}\", �������� <b>$nalog ��.</b> <i>(�����: {$bank['cr']} ��., {$bank['ekr']} ���.)</i>','{$_SESSION['bankid']}');");
                          mq("INSERT INTO `bankhistory`(`id` , `text` , `bankid`) VALUES ('','��� ���������� <b>{$_POST['sum']} ��.</b> �� ����� {$_SESSION['bankid']} ��������� \"{$otkogo['login']}\" <i>(�����: {$bablo} ��., {$bank2['ekr']} ���.)</i>','{$_POST['number']}');");

                          $sum=$_POST['sum'];
                          $schet=$_POST['number'];
                          $mywarn="$sum ��. ������� ���������� �� ���� � $schet";
                        }
                        else {
                            $mywarn="��������� ������!";
                        }
                    }
                    else {
                        $mywarn="� ��� ������������ ����� �� ����� ��� ���������� ��������";
                    }
                }
                else {
                    $mywarn="� ��� ������������ ����� �� ����� ��� ���������� ��������";
                }
            }
            else {
                $mywarn="������ � ����� ���������� �� �������.";
            }
        }
        $_POST['wu']=0;
        mq("unlock tables");
    }
    print "<center><font color=red><b>&nbsp;$mywarn</b></font></center>";
?>
<?
  $r=mq("select id, name from inventory where type=199 and owner='$user[id]'");
  while ($rec=mysql_fetch_assoc($r)) {
    $rec["name"]=str_replace("���������", "���������", $rec["name"]);
    echo "<a href=\"/bank.php?givecheque=$rec[id]\">����� $rec[name]</a><br>";
  }
?>
<FORM action="bank.php" method=POST name=F1>
<INPUT TYPE=hidden name=sid value="230451324010">
<TABLE width=100%>
<TR>
<TD valign=top width=30%><H4>���������� ������</H4> &nbsp;
<b>���� �:</b> <?=$_SESSION['bankid']?> <a href="?exit=1">[x]</a><br>
</TD>
<TD valign=top align=center width=40%>
<TABLE><TR><TD>
<FIELDSET><LEGEND><B>� ��� �� �����</B> </LEGEND>
<TABLE>
<TR><TD>��������:</TD><TD><B><?=$bank['cr']?></B></TD></TR>
<TR><TD>������������:</TD><TD><B><?=$bank['ekr']?></B></TD></TR>
<TR><TD colspan=2><HR></TD></TR>
<TR><TD>��� ���� ��������:</TD><TD><B><?=$user['money']?> ��.</B><BR><B><?=$user['ekr']?> ���.</B></TD></TR>
</TABLE>
</FIELDSET>
</TD></TR></TABLE>
</TD>
<TD valign=top align=right width=30%><FONT COLOR=red>��������!</FONT> ��������� ������ ����� �������, � ������� ��������� �������� �������� � ��������������� �������.</TD>
</TR>
</TABLE>
<TABLE cellspacing=5><TR>
<TD valign=top width=50%><FIELDSET><LEGEND><B>��������� ����</B> </LEGEND>
����� <INPUT TYPE=text NAME=ik size=6 maxlength=11> ��. <INPUT TYPE=submit name=in value="�������� ������� �� ����" onclick="if (isNaN(parseFloat(document.F1.ik.value))) {alert('������� �����'); return false;} else {return confirm('�� ������ �������� �� ���� ���� '+parseFloat(document.F1.ik.value)+' ��. ?')}"><BR>
����� <INPUT TYPE=text NAME=ekrik size=6 maxlength=11> ���. <INPUT TYPE=submit name=ekrin value="�������� ����������� �� ����" onclick="if (isNaN(parseFloat(document.F1.ekrik.value))) {alert('������� �����'); return false;} else {return confirm('�� ������ �������� �� ���� ���� '+parseFloat(document.F1.ekrik.value)+' ���. ?')}"><BR>
</FIELDSET></TD>
<TD valign=top width=50%><FIELDSET><LEGEND><B>����� �� �����</B> </LEGEND>
����� <INPUT TYPE=text NAME=ok size=6 maxlength=11> ��. <INPUT TYPE=submit name=out value="����� ������� �� �����" onclick="if (isNaN(parseFloat(document.F1.ok.value))) {alert('������� �����'); return false;} else {return confirm('�� ������ ����� �� ������ ����� '+parseFloat(document.F1.ok.value)+' ��. ?')}"><BR>
����� <INPUT TYPE=text NAME=ekrok size=6 maxlength=11> ���. <INPUT TYPE=submit name=ekrout value="����� ����������� �� �����" onclick="if (isNaN(parseFloat(document.F1.ekrok.value))) {alert('������� �����'); return false;} else {return confirm('�� ������ ����� �� ������ ����� '+parseFloat(document.F1.ekrok.value)+' ���. ?')}"><BR>

</FIELDSET></TD>
</TR><TR>
<TD valign=top><FIELDSET><LEGEND><B>��������� ������� �� ������ ����</B> </LEGEND>
<?
if ($user["level"]<4) echo "<b>�������� � 4-�� ������.</b>";
else { ?>����� <INPUT TYPE=text NAME=sum size=6 maxlength=11> ��.<BR>
����� ����� ���� ��������� ������� <INPUT TYPE=text NAME=number size=12 maxlength=15><BR>
<INPUT TYPE=submit name=wu value="��������� ������� �� ������ ����" onclick="if (isNaN(parseFloat(document.F1.sum.value)) || isNaN(parseInt(document.F1.number.value)) ) {alert('������� ����� � ����� �����'); return false;} else {return confirm('�� ������ ��������� �� ������ ����� '+parseFloat(document.F1.sum.value)+' ��. �� ���� ����� '+parseInt(document.F1.number.value)+' ?')}"><BR>
�������� ���������� <B>3.00 %</B> �� �����, �� �� ����� <B>1.00 ��</B>.<? } ?>
</FIELDSET></TD>
<TD valign=top>
<FIELDSET><LEGEND><B>�������� �����</B> </LEGEND>
�������� ������� �� �����������.<BR>
���� <B>1000 ��.</B> = <B>1.00 ���.</B><BR>
<font color=red><b>����������:</b> ��� ������ "�������" ������ ���� �� �������� ����� � �����.</font><br>
����� <INPUT TYPE=text NAME=krekr size=6 maxlength=80> ��.
<INPUT TYPE=submit name=change value="��������" onclick="if (isNaN(parseFloat(document.F1.krekr.value))) {alert('������� ������������ �����'); return false;} else {return confirm('�� ������ �������� '+parseFloat(document.F1.krekr.value)+' ��. �� ��� ?')}">
</FIELDSET>
<FIELDSET><LEGEND><B>�������� �����</B> </LEGEND>
�������� ����������� �� �������.<BR>
���� <B>1 ���.</B> = <B>80.00 ��.</B><BR>
<font color=red><b>����������:</b> ��� ������ "�����������" ������ ���� �� �������� ����� � �����.</font><br>
����� <INPUT TYPE=text NAME=ok1 size=6 maxlength=80> ���.
<INPUT TYPE=submit name=change value="��������" onclick="if (isNaN(parseFloat(document.F1.ok1.value))) {alert('������� ������������ �����'); return false;} else {return confirm('�� ������ �������� '+parseFloat(document.F1.ok1.value)+' ���. �� ������� ?')}">
</FIELDSET>
</TD>

</TR><TR>
<TD valign=top></TD>
<TD></TD>
</TR><TR>
<TD valign=top><FIELDSET><LEGEND><B>���������</B> </LEGEND>
<?if($bank['mail']==0) {?>
�� ��������� ������� ������ ����� � ������ �� email. ������ �������� ��� �������.
<INPUT TYPE=submit name=start_send_email value="��������� ������� ������ �� email">
            <?}else{?>
� ��� ��������� ������� ������ ����� � ������ �� email. ���� �� �� ������� � ����� email, ��� ��������, ��� �� �������� ���� ����� ����� � ������ � ����, �� ������ ��������� ������� ������ �� email. ��� �������� ��� �� ����� �������� � ������ ����� � ������ ������ ������ email. �� ���� �� ���� �������� ���� ����� ����� �/��� ������, ��� ��� ����� �� �������!<BR>
<INPUT TYPE=submit name=stop_send_email value="��������� ������� ������ �� email">
            <?}?>
<HR><B>������� ������</B><BR>

<table>
<tr><TD>����� ������</TD><TD><INPUT TYPE=password name=new_psw></TD><TD><img border=0 SRC="/i/misc/klav_transparent.gif"  style='cursor: hand' onClick="KeypadShow(1, 'F1', 'new_psw', 'keypad1');"></TD></tr>
<tr><TD>������� ����� ������ ��������</TD><TD><INPUT TYPE=password name=new_psw2></TD><TD><img border=0 SRC="/i/misc/klav_transparent.gif" style='cursor: hand' onClick="KeypadShow(1, 'F1', 'new_psw2', 'keypad1');"></TD></tr>
</table>
<INPUT TYPE=submit name=change_psw value="������� ������"><BR>
<div id="keypad1" align=center style="display: none;"></div>
</FIELDSET></TD>
<TD valign=top><FIELDSET><LEGEND><B>��������� ��������</B> </LEGEND>

<TABLE cellpadding="2" cellspacing="0" border="0">
<?
$history = mq("SELECT `date`,`text` FROM `bankhistory` WHERE `bankid` = '{$_SESSION['bankid']}' ORDER BY date DESC LIMIT 10;");
while ($hist = mysql_fetch_array($history)) {
echo "<TR><TD><font class=date>$hist[date]</font> $hist[text]</TD></TR>";
}
?>
</TABLE>
</FIELDSET>
</TD>
</TR>
<TR>
<TD colspan="2" valign=top><FIELDSET><LEGEND><B>�������� ������</B> </LEGEND>
����� �� ������ ���������� ����� ���������� ��� ����. ������ ������ ������, ��� ���� ���� ������ � ������. �������� ������ ����� ��� ���� ������.<BR>
<TEXTAREA NAME=notepad ROWS=10 COLS=67 style="width:100%"><?=$bank['note']?></TEXTAREA><BR>
<INPUT TYPE=submit name=save_notepad value="��������� ���������">
</FIELDSET>
</TD>
</TR>
</TABLE>
            <?}?>
</FORM>
</BODY>
</HTML>