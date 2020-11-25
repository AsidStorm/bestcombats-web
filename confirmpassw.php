<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <LINK href="http://img.bestcombats.net/css/main.css" type=text/css rel=stylesheet>
        <META http-equiv=Content-type content="text/html; charset=windows-1251">
    </head>
    <title>Востановление пароля на BestcombatS.net</title>
    <body bottomMargin=0 vLink=#333333 aLink=#000000 link=#000000 bgColor=#666666 leftMargin=0 topMargin=0 rightMargin=0 marginheight="0" marignwidth="0">
        <div style='background-color:#636462; width:13%; float:left;'>&nbsp;</div>
        <div style='float:left; text-align:justify; width:933px; FONT-SIZE: 10pt; FONT-FAMILY: Verdana, Arial, Helvetica, Tahoma, sans-serif; background-color:#F2E5B1; widh:100%;'>

        <table style='font-size:12px; border:0px; margin:0px; padding:0px;' cellpadding=0 cellspacing=0 border=0>
            <tr>
                <td width=124px;><img src='http://img.bestcombats.net/rememberpassword/pict_1.jpg' width=126 height=243 /><td width=100% valign=top>
                    <br>
<?php
			$browsers = get_browser();
			@$_GET['login']=iconv('utf-8', 'cp1251', $_GET['login']);
			
			$realtime=mktime(date("H"), date("i"), date("s"), date("m")  , date("d"), date("Y"));
			if (@$_GET['newpass']!='') {
				include ("connect.php");
				$sql=mysql_query("select * from confirmpasswd where login='".mysql_real_escape_string($_GET['login'])."' and passwd='".mysql_real_escape_string($_GET['newpass'])."' and date='".mysql_real_escape_string($_GET['timev'])."' and active=1") or die("Ошибка обработки запроса.");
				if (mysql_num_rows($sql)==0 or mysql_num_rows($sql)=='') die("<br/><br/><br/><center>Ссылка устарела!</center>");
				$sql=mysql_fetch_array($sql,MYSQL_ASSOC) or die("Ошибка обработки запроса!!");
				mysql_query("update users set pass='".md5($_GET['newpass'])."' where login='".mysql_real_escape_string($sql['login'])."'") or die("Ошибка обработки запроса!");
				echo "<center>Пароль изменен. Не забывайте пароль.<br>Для входа в игру перейдите по сылке <a href='/'>BestcombatS</a></center>";
				mysql_query("update confirmpasswd set active=0 where login='".mysql_real_escape_string($_GET['login'])."' and passwd='".mysql_real_escape_string($_GET['newpass'])."' and date='".mysql_real_escape_string($_GET['timev'])."' and active=1");
			}else{
				echo "Ссылка устарела!";
			}
		?>
        </td>
        <td width=107 align=right>
            <img src='http://img.bestcombats.net/rememberpassword/paper1.gif' width=39 height=292 />
        </table>
        <div style='float:left; margin-left:-87px;'></div>
        </div>
        <div style='clear:both'></div><br>
        </table>
    </body>
</html>