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
<TR><TD><H3>Банк</TD>
<link href="http://img.bestcombats.net/js/design6.css" rel="stylesheet" type="text/css">
<td align=right width=60><INPUT TYPE=button value="Вернуться" onClick="returned2('strah=3&');"></td>
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
        echo "<b>По квитанции вы получили $ec екр.</b><br>";
        mq("INSERT INTO `delo` (`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','{$_SESSION['uid']}','\"".$user['login']."\" сдал квитанцию (id:$_GET[givecheque]) за $ec екр ($user[money]/$user[ekr]). ',2,'".time()."');");
      }
    }
    //заходим на счет
    if($_POST['enter'] && $_POST['pass']) {

                    $data = mq("SELECT * FROM `bank` WHERE (`owner` = '".$user['id']."' or `owner2` = '".$user['id']."') AND `id`= '".$_POST['id']."' AND `pass` = '".md5($_POST['pass'])."';");
                    echo mysql_error();
                    $data = mysql_fetch_array($data);
                    if($data) {
                        $_SESSION['bankid'] = $_POST['id'];
                    }
                    else
                    {
                        err('Ошибка входа.');
                    }


    }
    if(!$_SESSION['bankid'] )
{
//открытие счета
    if($_POST['reg'] && $_POST['rpass'] && $_POST['rpass2']) {
        if ($_POST['rpass'] == $_POST['rpass2']) {
            if ($user['money'] >= 3) {
                if(mq("INSERT INTO `bank` (`pass`,`owner`) values ('".md5($_POST['rpass2'])."','".$user['id']."');")) {
                    $sh_num=mysql_insert_id();
                    err('Ваш номер счета: '.mysql_insert_id().', запишите.');
                    mq("UPDATE users SET money = money-3 WHERE id = ".$user['id']." LIMIT 1;");
                    mq("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','{$_SESSION['uid']}','\"".$user['login']."\" открыл счет №".$sh_num." в банке. ',1,'".time()."');");
                    mq("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','{$_SESSION['uid']}','\"".$user['login']."\" заплатил за открытие счета в банке 3 кр. ',1,'".time()."');");
                }
                else {
                    err('Техническая ошибка');
                }
            } else {
                err('Недостаточно денег');
            }
        } else {
            err('Не совпадают пароли');
        }
    }
//высылаем пароль на мыло
    if ($_POST['resendmail']){

    $bank2 = mysql_fetch_array(mq("SELECT mail FROM `bank` WHERE `owner` = ".$user['id'].";"));

        if ($bank2['mail']==0) {
        err('У вас запрещена высылка пароля на email');
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
                    <title>Востановление пароля</title>
                </head>
                <body>
                    Добрый день '.$user['realname'].'.<br>
                    Вами было запрошено востановление пароля для счета '.$_POST['id'].' c IP адреса - '.$ipclient.', если это были не Вы, просто удалите это письмо.<br>
                    <br>
                    ------------------------------------------------------------------<br>
                    Ваш № счета  | '.$_POST['id'].'<br>
                    Новый пароль | '.$newpass.'<br>
                    ------------------------------------------------------------------<br>
                    <br>
                    <br>
                    <h3>Для подтверждения нового пароля пройдите по ссылке ниже.</h3><br>
                    <a href="http://bestcombats.net/confpassbank.php?newpass='.$newpass.'&login='.$_POST['id'].'&flag=1&timev='.$lasttime.'">Востановление пароля</a>
                    <br>
                    <font color="blue">Если вы не восстановите пароль до <b>'.date("d-M-Y", $lasttime) .' 00:00</b>, ссылка будет неактивной.</font>
                    <br>
                    Отвечать на данное письмо не нужно.
                </body>
            </html>';

        mail($user['email'],"Востановление банковского счета на BestcombatS.net, для пользователя - ".$user['login'],$aa,$headers);
        err('Выслан номер счета и пароль на email, указанный в анкете.');
    }else{
        err('Сегодня пароль уже высылался. Проверьте почту');
    }
}
}
        if ($_POST['open']){
        ?>
<FORM action="bank.php" method=POST name="F3">
<H4>Открытие счета</H4>
Номер счета и пароль строго привязаны только к вашему персонажу. Только персонаж <b><?=$user['login']?></b> может использовать этот счет, никто другой, даже зная ваш номер и пароль, не получит доступа к нему!<BR><BR>
<table><tr><TD valign=top>
<table>
<tr><TD><nobr>Придумайте пароль к счету</nobr><br><INPUT TYPE=password name=rpass>&nbsp;<img border=0 SRC="/i/misc/klav_transparent.gif"  style='cursor: hand' onClick="KeypadShow(1, 'F3', 'rpass', 'keypad3');"></TD></tr>
<tr><TD><nobr>Введите пароль повторно</nobr><br><INPUT TYPE=password name=rpass2>&nbsp;<img border=0 SRC="/i/misc/klav_transparent.gif"  style='cursor: hand' onClick="KeypadShow(1, 'F3', 'rpass2', 'keypad3');"></TD></tr>
<tr><TD><nobr>Вы заплатите: <B>3.00 кр.</B></td></tr>
</table>
<INPUT TYPE=submit value="Открыть счет" name=reg>
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
Мы предоставляем следующие услуги:
<OL>
<LI>Открытие счета
<LI>Возможность положить/снять кредиты/еврокредиты со счета
<LI>Перевести кредиты/еврокредиты с одного счета на другой
<LI>Обменный пункт. Обмен еврокредитов на кредиты
<LI>Выплату екр по квитанциям об оплате
</OL>
<?
  $r=mq("select id, name from inventory where type=199 and owner='$user[id]'");
  while ($rec=mysql_fetch_assoc($r)) {
    $rec["name"]=str_replace("Квитанция", "квитанцию", $rec["name"]);
    echo "<a href=\"/bank.php?givecheque=$rec[id]\">Сдать $rec[name]</a><br>";
  }
?>
<FORM action="bank.php" method=POST>
Хотите открыть свой счет? Услуга платная: <B>3.00 кр.</B> <INPUT TYPE=submit value="Открыть счет" name=open>
</FORM>
<TABLE><TR><FORM action="bank.php" name="F2" method=POST><TD>
<FIELDSET><LEGEND><B>Управление счетом</B> </LEGEND>
<?
if ($bank['owner']==$user["id"] || $bank['owner2']==$user["id"])
{echo "<br>Вас проверили и допустили к счету<br>";}
else
{$_SESSION['bankid'] = null;}
?>
<TABLE>
<TR><TD valign=top>
<TABLE>
<TR><TD>Номер счета</td> <TD colspan=2>
        <? inschet($user['id']); ?>
</td></tr>
<TR><TD>Пароль</td><td> <INPUT style='width:90;' type=password value="" name=pass></td><TD style='padding: 0, 0, 3, 5'><img border=0 SRC="/i/misc/klav_transparent.gif" style='cursor: hand' onClick="KeypadShow(1, 'F2', 'pass', 'keypad2');"></TD></tr>
<TR><TD colspan=3 align=center><INPUT TYPE=submit value="Войти" name=enter></td></tr>
</TABLE>
</TD>
<TD><div id="keypad2" align=center style="display: none;"></div></TD></TR>
</TABLE>
</FIELDSET>
</TD></TR></TABLE>
Забыли номер счета и/или пароль? Можно их выслать на email, указанный в анкете <INPUT TYPE=submit value="Выслать" name=resendmail>
<br><br>
</FORM>
            <?}}else{
    $bank = mysql_fetch_array(mq("SELECT * FROM `bank` WHERE `id` = ".$_SESSION['bankid'].";"));
//кладем кредиты на счет
    if($_POST['in'] && $_POST['ik']) {
        mq("lock tables users write, bank write, delo write, bankhistory write, userdata write");
        $_POST['ik'] = round($_POST['ik'],2);
        $user['money']=mqfa1("select money from users where id='$user[id]'");
        if (is_numeric($_POST['ik']) && ($_POST['ik']>0) && ($_POST['ik'] <= $user['money'])) {
            $user['money'] -= $_POST['ik'];
            if (mq("UPDATE `users` SET `money` = `money` - '".$_POST['ik']."' WHERE `id`= ".$user['id']." LIMIT 1;")) {
                $mywarn="Деньги удачно положены на счет";
                mq("UPDATE `bank` SET `cr` = `cr` + '".$_POST['ik']."' WHERE `id`= ".$_SESSION['bankid']." LIMIT 1;");
                mq("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','{$_SESSION['uid']}','Персонаж \"".$user['login']."\" положил на свой счет №".$_SESSION['bankid']." ".$_POST['ik']." кр. ',1,'".time()."');");
                $putkr = $_POST['ik']+$bank['cr'];
                mq("INSERT INTO `bankhistory`(`id` , `text` , `bankid`) VALUES ('','Вы положили на счет <b>{$_POST['ik']} кр.</b>, комиссия <b>0 кр.</b> <i>(Итого: {$putkr} кр., {$bank['ekr']} екр.)</i>','{$_SESSION['bankid']}');");

            }
            else {
                $mywarn="Произошла ошибка!";
            }
        } else {
          $mywarn="У вас недостаточно денег для выполнения операции";
        }
        $_POST['in']=0;
        mq("unlock tables");
    }
//Кладем еврокрелиты на счет
    if($_POST['ekrin'] && $_POST['ekrik']) {
        mq("lock tables users write, bank write, delo write, bankhistory write, userdata write");
        $_POST['ekrik'] = round($_POST['ekrik'],2);
        $user['ekr']=mqfa1("select ekr from users where id='$user[id]'");
        if (is_numeric($_POST['ekrik']) && ($_POST['ekrik']>0) && ($_POST['ekrik'] <= $user['ekr'])) {
          $user['ekr'] -= $_POST['ekrik'];
          if (mq("UPDATE `users` SET `ekr` = `ekr` - '".$_POST['ekrik']."' WHERE `id`= ".$user['id']." LIMIT 1;")) {
            $mywarn="Еврокредиты удачно положены на счет";
            mq("UPDATE `bank` SET `ekr` = `ekr` + '".$_POST['ekrik']."' WHERE `id`= ".$_SESSION['bankid']." LIMIT 1;");
            mq("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','{$_SESSION['uid']}','Персонаж \"".$user['login']."\" положил на свой счет №".$_SESSION['bankid']." ".$_POST['ekrik']." екр. $user[money]/$user[ekr]',1,'".time()."');");
            $putekr = $_POST['ekrik']+$bank['ekr'];
            mq("INSERT INTO `bankhistory`(`id` , `text` , `bankid`) VALUES ('','Вы положили на счет <b>{$_POST['ekrik']} екр.</b>, комиссия <b>0 кр.</b> <i>(Итого: {$bank['cr']} кр., {$putekr} екр.)</i>','{$_SESSION['bankid']}');");
          } else {
            $mywarn="Произошла ошибка!";
          }
        } else {
          $mywarn="У вас недостаточно Еврокредитов для выполнения операции";
        }
        $_POST['ekrin']=0;
        mq("unlock tables");
        $bank = mysql_fetch_array(mq("SELECT * FROM `bank` WHERE `id` = ".$_SESSION['bankid'].";"));
    }
//Снимаем еврокредиты со счета
    if($_POST['ekrout'] && $_POST['ekrok']) {
        mq("lock tables users write, bank write, delo write, bankhistory write, userdata write");
        $bank = mysql_fetch_array(mq("SELECT * FROM `bank` WHERE `id` = ".$_SESSION['bankid'].";"));
        $_POST['ekrok'] = round($_POST['ekrok'],2);
        if (is_numeric($_POST['ekrok']) && ($_POST['ekrok']>0) && ($_POST['ekrok'] <= $bank['ekr'])) {
            $user['ekr'] += $_POST['ekrok'];
            if (mq("UPDATE `users` SET `ekr` = `ekr` + '".$_POST['ekrok']."' WHERE `id`= ".$user['id']." LIMIT 1;")) {
                $mywarn="Еврокредиты удачно сняты со счета";
                mq("UPDATE `bank` SET `ekr` = `ekr` - '".$_POST['ekrok']."' WHERE `id`= ".$_SESSION['bankid']." LIMIT 1;");
                $bank = mysql_fetch_array(mq("SELECT * FROM `bank` WHERE `id` = ".$_SESSION['bankid'].";"));
                mq("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','{$_SESSION['uid']}','Персонаж \"".$user['login']."\" снял со своего счета №".$_SESSION['bankid']." ".$_POST['ekrok']." екр. $user[money]/$user[ekr]',1,'".time()."');");
                mq("INSERT INTO `bankhistory`(`id` , `text` , `bankid`) VALUES ('','Вы сняли со счета <b>{$_POST['ekrok']} екр.</b>, комиссия <b>0 кр.</b> <i>(Итого: {$bank['cr']} кр., {$bank['ekr']} екр.)</i>','{$_SESSION['bankid']}');");

            }
            else {
            $mywarn="Произошла ошибка!";
          }
        } else {
          $mywarn="У вас недостаточно Еврокредитов на счету для выполнения операции";
        }
        $_POST['ekrout']=0;
        mq("unlock tables");
        $bank = mysql_fetch_array(mq("SELECT * FROM `bank` WHERE `id` = ".$_SESSION['bankid'].";"));
    }
//Снимаем кредиты со счета
    if($_POST['out'] && $_POST['ok']) {
        mq("lock tables users write, bank write, delo write, bankhistory write, userdata write"); 
        $bank = mysql_fetch_array(mq("SELECT * FROM `bank` WHERE `id` = ".$_SESSION['bankid'].";"));
        $_POST['ok'] = round($_POST['ok'],2);
        if (is_numeric($_POST['ok']) && ($_POST['ok']>0) && ($_POST['ok'] <= $bank['cr'])) {
            $user['money'] += $_POST['ok'];
            if (mq("UPDATE `users` SET `money` = `money` + '".$_POST['ok']."' WHERE `id`= ".$user['id']." LIMIT 1;")) {
                $mywarn="Деньги удачно сняты со счета";
                mq("UPDATE `bank` SET `cr` = `cr` - '".$_POST['ok']."' WHERE `id`= ".$_SESSION['bankid']." LIMIT 1;");
                $bank = mysql_fetch_array(mq("SELECT * FROM `bank` WHERE `id` = ".$_SESSION['bankid'].";"));
                mq("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','{$_SESSION['uid']}','Персонаж \"".$user['login']."\" снял со своего счета №".$_SESSION['bankid']." ".$_POST['ok']." кр.',1,'".time()."');");
                mq("INSERT INTO `bankhistory`(`id` , `text` , `bankid`) VALUES ('','Вы сняли со счета <b>{$_POST['ok']} кр.</b>, комиссия <b>0 кр.</b> <i>(Итого: {$bank['cr']} кр., {$bank['ekr']} екр.)</i>','{$_SESSION['bankid']}');");

            }
            else {
                $mywarn="Произошла ошибка!";
            }
        } else {
          $mywarn="У вас недостаточно денег на счету для выполнения операции";
        }
        mq("unlock tables");
        $_POST['out']=0;
    }
//обмен еврокредитов
    if($_POST['change'] && $_POST['ok1']) {
        mq("lock tables users write, bank write, delo write, bankhistory write, userdata write"); 
        $bank = mysql_fetch_array(mq("SELECT * FROM `bank` WHERE `id` = ".$_SESSION['bankid'].";"));
        $_POST['ok1'] = round($_POST['ok1'],2);
        if (is_numeric($_POST['ok1']) && ($_POST['ok1']>0) && ($_POST['ok1'] <= $bank['ekr'])) {
            $bank['cr'] += $_POST['ok1'] * 80;
            $bank['ekr'] -= $_POST['ok1'];
            $add_money=$_POST['ok1'] * 80;
            if (mq("UPDATE `bank` SET `cr` = `cr` + '$add_money' WHERE `id`= ".$bank['id']." LIMIT 1;")) {
                $mywarn="Обмен произведен успешно";
                mq("UPDATE `bank` SET `ekr` = `ekr` - '".$_POST['ok1']."' WHERE `id`= ".$_SESSION['bankid']." LIMIT 1;");
                $bank = mysql_fetch_array(mq("SELECT * FROM `bank` WHERE `id` = ".$_SESSION['bankid'].";"));
                mq("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','{$_SESSION['uid']}','Персонаж \"".$user['login']."\" обменял ".$_POST['ok1']." екр. на ".$add_money." кр. на счету №".$_SESSION['bankid']." в банке. ',1,'".time()."');");
            }
            else {
                $mywarn="Произошла ошибка!";
            }
        } else {
          $mywarn="У вас недостаточно денег на валютном счету для выполнения операции";
        }
        $_POST['change']=0;
        mq("unlock tables");
    }
    //обмен еврокредитов
    if($_POST['change'] && $_POST['ok1']) {
        mq("lock tables users write, bank write, delo write, bankhistory write, userdata write"); 
        $bank = mysql_fetch_array(mq("SELECT * FROM `bank` WHERE `id` = ".$_SESSION['bankid'].";"));
        $_POST['ok1'] = round($_POST['ok1'],2);
        if (is_numeric($_POST['ok1']) && ($_POST['ok1']>0) && ($_POST['ok1'] <= $bank['ekr'])) {
            $bank['cr'] += $_POST['ok1'] * 80;
            $bank['ekr'] -= $_POST['ok1'];
            $add_money=$_POST['ok1'] * 80;
            if (mq("UPDATE `bank` SET `cr` = `cr` + '$add_money' WHERE `id`= ".$bank['id']." LIMIT 1;")) {
                $mywarn="Обмен произведен успешно";
                mq("UPDATE `bank` SET `ekr` = `ekr` - '".$_POST['ok1']."' WHERE `id`= ".$_SESSION['bankid']." LIMIT 1;");
                $bank = mysql_fetch_array(mq("SELECT * FROM `bank` WHERE `id` = ".$_SESSION['bankid'].";"));
                mq("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','{$_SESSION['uid']}','Персонаж \"".$user['login']."\" обменял ".$_POST['ok1']." екр. на ".$add_money." кр. на счету №".$_SESSION['bankid']." в банке. ',1,'".time()."');");
            }
            else {
                $mywarn="Произошла ошибка!";
            }
        } else {
          $mywarn="У вас недостаточно денег на валютном счету для выполнения операции";
        }
        $_POST['change']=0;
        mq("unlock tables");
    }
    //обмен кредитов
    if($_POST['change'] && $_POST['krekr']) {
        mq("lock tables users write, bank write, delo write, bankhistory write, userdata write"); 
        $bank = mysql_fetch_array(mq("SELECT * FROM `bank` WHERE `id` = ".$_SESSION['bankid'].";"));
        $_POST['krekr'] = round($_POST['krekr'],2);
        if (is_numeric($_POST['krekr']) && ($_POST['krekr']>0) && ($_POST['krekr'] <= $bank['cr'])) {
            $bank['ekr'] += $_POST['krekr'] / 1000;
            $bank['cr'] -= $_POST['krekr'];
            $add_money=$_POST['krekr'] / 1000;
            if (mq("UPDATE `bank` SET `ekr` = `ekr` + '$add_money' WHERE `id`= ".$bank['id']." LIMIT 1;")) {
                $mywarn="Обмен произведен успешно";
                mq("UPDATE `bank` SET `cr` = `cr` - '".$_POST['krekr']."' WHERE `id`= ".$_SESSION['bankid']." LIMIT 1;");
                $bank = mysql_fetch_array(mq("SELECT * FROM `bank` WHERE `id` = ".$_SESSION['bankid'].";"));
                mq("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','{$_SESSION['uid']}','Персонаж \"".$user['login']."\" обменял ".$_POST['krekr']." кр. на ".$add_money." екр. на счету №".$_SESSION['bankid']." в банке. ',1,'".time()."');");
            }
            else {
                $mywarn="Произошла ошибка!";
            }
        } else {
          $mywarn="У вас недостаточно денег на валютном счету для выполнения операции";
        }
        $_POST['change']=0;
        mq("unlock tables");
    }
//смена пароля
    if($_POST['change_psw'] && $_POST['new_psw'] && $_POST['new_psw2']) {
        if ($_POST['new_psw'] == $_POST['new_psw2']) {
                if (mq("UPDATE `bank` SET `pass` = '".md5($_POST['new_psw2'])."' WHERE `id` = ".$_SESSION['bankid'].";")) {
                    err('Пароль успешно изменен.');
                }
                else {
                    err('Техническая ошибка');
                }
        } else {
            err('Не совпадают пароли');
        }
    }
//разрешаем высылать пароль

    if($_POST['start_send_email']) {
                if (mq("UPDATE `bank` SET `mail` = 1 WHERE `id` = ".$_SESSION['bankid'].";")) {
                    err('Вы разрешили высылку номера счета и пароля на email.');
                }
    }
//запрещаем высылать пароль
    if($_POST['stop_send_email']) {
                if (mq("UPDATE `bank` SET `mail` = 0 WHERE `id` = ".$_SESSION['bankid'].";")) {
                    err('Вы запретили высылку номера счета и пароля на email.');
                }
    }
//делаем заметки
        if($_POST['save_notepad'])
        {
        $_POST['notepad']=htmlspecialchars($_POST['notepad']);
        if(preg_match("/__/",$_POST['notepad']) || preg_match("/--/",$_POST['notepad']))
        {
        echo"В тексте не должно присутствовать подряд более 1 символа '_' или '-'.";
        }else{
        mq("update `bank` set `note` = '".$_POST['notepad']."' WHERE `id` = '".$_SESSION['bankid']."';");
        err('Сохранено.');
        }
        }
    $bank = mysql_fetch_array(mq("SELECT * FROM `bank` WHERE `id` = ".$_SESSION['bankid'].";"));
//переводим кредиды на другой счет
    if($_POST['wu'] && $_POST['sum'] && $_POST['number'] && $user["level"]>=4) {
      mq("lock tables users write, bank write, delo write, bankhistory write, userdata write"); 
      $bank = mysql_fetch_array(mq("SELECT * FROM `bank` WHERE `id` = ".$_SESSION['bankid'].";"));
      $_POST["number"]=(int)$_POST["number"];
        $al=mqfa("select align, level, users.id from bank left join users on users.id=bank.owner where bank.id='$_POST[number]'");
        if ($user['align'] == 4 || $al["align"]==4) {
          $mywarn="Хаосникам переводы запрещены!";
        } elseif ($al['level']<4 || $user["level"]<4) {
          $mywarn="Передачи возможны с 4-го уровня!";
        } elseif (!cangive($_POST['sum'])) {
          $mywarn="Сумма передачи превышает допустимый лимит.";
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
                          mq("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','{$_SESSION['uid']}','Персонаж \"".$user['login']."\" перевел со своего банковского счета №".$_SESSION['bankid']." на счет №".$_POST['number']." к персонажу ".$to['login']." ".$_POST['sum']." кр. Дополнительно снято ".$nalog." кр. за услуги банка ',1,'".time()."');");
                          mq("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','{$bank2['owner']}','Персонаж \"".$user['login']."\" перевел со своего банковского счета №".$_SESSION['bankid']." на счет №".$_POST['number']." к персонажу ".$to['login']." ".$_POST['sum']." кр. Дополнительно снято ".$nalog." кр. за услуги банка ',1,'".time()."');");

                          $otkogo = mysql_fetch_array(mq("SELECT `login` FROM `users` WHERE `id` = '{$bank['owner']}';"));
                          $komy = mysql_fetch_array(mq("SELECT `login` FROM `users` WHERE `id` = '{$bank2['owner']}';"));
                          $bablo = $_POST['sum']+$bank2['cr'];
                          mq("INSERT INTO `bankhistory`(`id` , `text` , `bankid`) VALUES ('','Вы перевели <b>{$_POST['sum']} кр.</b> на счет {$_POST['number']} персонажа \"{$komy['login']}\", комиссия <b>$nalog кр.</b> <i>(Итого: {$bank['cr']} кр., {$bank['ekr']} екр.)</i>','{$_SESSION['bankid']}');");
                          mq("INSERT INTO `bankhistory`(`id` , `text` , `bankid`) VALUES ('','Вам переведено <b>{$_POST['sum']} кр.</b> со счета {$_SESSION['bankid']} персонажа \"{$otkogo['login']}\" <i>(Итого: {$bablo} кр., {$bank2['ekr']} екр.)</i>','{$_POST['number']}');");

                          $sum=$_POST['sum'];
                          $schet=$_POST['number'];
                          $mywarn="$sum кр. успешно переведены на счет № $schet";
                        }
                        else {
                            $mywarn="Произошла ошибка!";
                        }
                    }
                    else {
                        $mywarn="У вас недостаточно денег на счету для выполнения операции";
                    }
                }
                else {
                    $mywarn="У вас недостаточно денег на счету для выполнения операции";
                }
            }
            else {
                $mywarn="Данные о счете получателя не найдены.";
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
    $rec["name"]=str_replace("Квитанция", "квитанцию", $rec["name"]);
    echo "<a href=\"/bank.php?givecheque=$rec[id]\">Сдать $rec[name]</a><br>";
  }
?>
<FORM action="bank.php" method=POST name=F1>
<INPUT TYPE=hidden name=sid value="230451324010">
<TABLE width=100%>
<TR>
<TD valign=top width=30%><H4>Управление счетом</H4> &nbsp;
<b>Счёт №:</b> <?=$_SESSION['bankid']?> <a href="?exit=1">[x]</a><br>
</TD>
<TD valign=top align=center width=40%>
<TABLE><TR><TD>
<FIELDSET><LEGEND><B>У вас на счету</B> </LEGEND>
<TABLE>
<TR><TD>Кредитов:</TD><TD><B><?=$bank['cr']?></B></TD></TR>
<TR><TD>Еврокредитов:</TD><TD><B><?=$bank['ekr']?></B></TD></TR>
<TR><TD colspan=2><HR></TD></TR>
<TR><TD>При себе наличных:</TD><TD><B><?=$user['money']?> кр.</B><BR><B><?=$user['ekr']?> екр.</B></TD></TR>
</TABLE>
</FIELDSET>
</TD></TR></TABLE>
</TD>
<TD valign=top align=right width=30%><FONT COLOR=red>Внимание!</FONT> Некоторые услуги банка платные, о размере взымаемой комиссии написано в соответствующем разделе.</TD>
</TR>
</TABLE>
<TABLE cellspacing=5><TR>
<TD valign=top width=50%><FIELDSET><LEGEND><B>Пополнить счет</B> </LEGEND>
Сумма <INPUT TYPE=text NAME=ik size=6 maxlength=11> кр. <INPUT TYPE=submit name=in value="Положить кредиты на счет" onclick="if (isNaN(parseFloat(document.F1.ik.value))) {alert('Укажите сумму'); return false;} else {return confirm('Вы хотите положить на свой счет '+parseFloat(document.F1.ik.value)+' кр. ?')}"><BR>
Сумма <INPUT TYPE=text NAME=ekrik size=6 maxlength=11> екр. <INPUT TYPE=submit name=ekrin value="Положить еврокредиты на счет" onclick="if (isNaN(parseFloat(document.F1.ekrik.value))) {alert('Укажите сумму'); return false;} else {return confirm('Вы хотите положить на свой счет '+parseFloat(document.F1.ekrik.value)+' екр. ?')}"><BR>
</FIELDSET></TD>
<TD valign=top width=50%><FIELDSET><LEGEND><B>Снять со счета</B> </LEGEND>
Сумма <INPUT TYPE=text NAME=ok size=6 maxlength=11> кр. <INPUT TYPE=submit name=out value="Снять кредиты со счета" onclick="if (isNaN(parseFloat(document.F1.ok.value))) {alert('Укажите сумму'); return false;} else {return confirm('Вы хотите снять со своего счета '+parseFloat(document.F1.ok.value)+' кр. ?')}"><BR>
Сумма <INPUT TYPE=text NAME=ekrok size=6 maxlength=11> екр. <INPUT TYPE=submit name=ekrout value="Снять еврокредиты со счета" onclick="if (isNaN(parseFloat(document.F1.ekrok.value))) {alert('Укажите сумму'); return false;} else {return confirm('Вы хотите снять со своего счета '+parseFloat(document.F1.ekrok.value)+' екр. ?')}"><BR>

</FIELDSET></TD>
</TR><TR>
<TD valign=top><FIELDSET><LEGEND><B>Перевести кредиты на другой счет</B> </LEGEND>
<?
if ($user["level"]<4) echo "<b>Доступно с 4-го уровня.</b>";
else { ?>Сумма <INPUT TYPE=text NAME=sum size=6 maxlength=11> кр.<BR>
Номер счета куда перевести кредиты <INPUT TYPE=text NAME=number size=12 maxlength=15><BR>
<INPUT TYPE=submit name=wu value="Перевести кредиты на другой счет" onclick="if (isNaN(parseFloat(document.F1.sum.value)) || isNaN(parseInt(document.F1.number.value)) ) {alert('Укажите сумму и номер счета'); return false;} else {return confirm('Вы хотите перевести со своего счета '+parseFloat(document.F1.sum.value)+' кр. на счет номер '+parseInt(document.F1.number.value)+' ?')}"><BR>
Комиссия составляет <B>3.00 %</B> от суммы, но не менее <B>1.00 кр</B>.<? } ?>
</FIELDSET></TD>
<TD valign=top>
<FIELDSET><LEGEND><B>Обменный пункт</B> </LEGEND>
Обменять кредиты на еврокредиты.<BR>
Курс <B>1000 кр.</B> = <B>1.00 екр.</B><BR>
<font color=red><b>Примечание:</b> Для обмена "Кредиты" должны быть на валютном счету в банке.</font><br>
Сумма <INPUT TYPE=text NAME=krekr size=6 maxlength=80> кр.
<INPUT TYPE=submit name=change value="Обменять" onclick="if (isNaN(parseFloat(document.F1.krekr.value))) {alert('Укажите обмениваемую сумму'); return false;} else {return confirm('Вы хотите обменять '+parseFloat(document.F1.krekr.value)+' кр. на екр ?')}">
</FIELDSET>
<FIELDSET><LEGEND><B>Обменный пункт</B> </LEGEND>
Обменять еврокредиты на кредиты.<BR>
Курс <B>1 екр.</B> = <B>80.00 кр.</B><BR>
<font color=red><b>Примечание:</b> Для обмена "Еврокредиты" должны быть на валютном счету в банке.</font><br>
Сумма <INPUT TYPE=text NAME=ok1 size=6 maxlength=80> екр.
<INPUT TYPE=submit name=change value="Обменять" onclick="if (isNaN(parseFloat(document.F1.ok1.value))) {alert('Укажите обмениваемую сумму'); return false;} else {return confirm('Вы хотите обменять '+parseFloat(document.F1.ok1.value)+' екр. на кредиты ?')}">
</FIELDSET>
</TD>

</TR><TR>
<TD valign=top></TD>
<TD></TD>
</TR><TR>
<TD valign=top><FIELDSET><LEGEND><B>Настройки</B> </LEGEND>
<?if($bank['mail']==0) {?>
Вы запретили высылку номера счета и пароля на email. Можете включить эту функцию.
<INPUT TYPE=submit name=start_send_email value="Разрешить высылку пароля на email">
            <?}else{?>
У вас разрешена высылка номера счета и пароля на email. Если вы не уверены в своем email, или убеждены, что не забудете свой номер счета и пароль к нему, то можете запретить высылку пароля на email. Это убережет вас от кражи кредитов с вашего счета в случае взлома вашего email. Но если вы сами забудете свой номер счета и/или пароль, вам уже никто не поможет!<BR>
<INPUT TYPE=submit name=stop_send_email value="Запретить высылку пароля на email">
            <?}?>
<HR><B>Сменить пароль</B><BR>

<table>
<tr><TD>Новый пароль</TD><TD><INPUT TYPE=password name=new_psw></TD><TD><img border=0 SRC="/i/misc/klav_transparent.gif"  style='cursor: hand' onClick="KeypadShow(1, 'F1', 'new_psw', 'keypad1');"></TD></tr>
<tr><TD>Введите новый пароль повторно</TD><TD><INPUT TYPE=password name=new_psw2></TD><TD><img border=0 SRC="/i/misc/klav_transparent.gif" style='cursor: hand' onClick="KeypadShow(1, 'F1', 'new_psw2', 'keypad1');"></TD></tr>
</table>
<INPUT TYPE=submit name=change_psw value="Сменить пароль"><BR>
<div id="keypad1" align=center style="display: none;"></div>
</FIELDSET></TD>
<TD valign=top><FIELDSET><LEGEND><B>Последние операции</B> </LEGEND>

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
<TD colspan="2" valign=top><FIELDSET><LEGEND><B>Записная книжка</B> </LEGEND>
Здесь вы можете записывать любую информацию для себя. Номера счетов друзей, кто кому чего должен и прочее. Записная книжка общая для всех счетов.<BR>
<TEXTAREA NAME=notepad ROWS=10 COLS=67 style="width:100%"><?=$bank['note']?></TEXTAREA><BR>
<INPUT TYPE=submit name=save_notepad value="Сохранить изменения">
</FIELDSET>
</TD>
</TR>
</TABLE>
            <?}?>
</FORM>
</BODY>
</HTML>