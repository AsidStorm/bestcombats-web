<?php
 	session_start();
	if ($_SESSION['uid'] == null) header("Location: index.php");
         include 'connect.php';
        $user=mysql_fetch_array(mysql_query("SELECT * from users where id='".$_SESSION['uid']."'"));     	
        include 'functions.php';
	if ($user['room'] != 53){ header("Location: main.php"); die(); }
        if ($user['battle'] != 0) { header('location: fbattle.php'); die(); }
  if (@$_GET["cap"]) {
            mysql_query("UPDATE `users`,`online` SET `users`.`room` = '20',`online`.`room` = '20' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
            header('location: city.php');

  }
   if (@$_GET["weed"]) {
            mysql_query("UPDATE `users`,`online` SET `users`.`room` = '20',`online`.`room` = '20' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
            header('location: city.php');

  }
        if($_GET['get']){
            switch($_GET['get']){
                case 'dungeon':
                    $err='';
                    mysql_query("UPDATE `users` SET `money`=`money`-0, `incity`='dungeon' where `id`='".$_SESSION['uid']."'");
                    mysql_query("UPDATE `online` SET `city`='dungeon' where `id`='".$_SESSION['uid']."'");
                    die("<script>top.window.location='/battle.php';</script>");
                    break;
                    case 'virtcity':
                    $err='';
                    mysql_query("UPDATE `users` SET `money`=`money`-0, `incity`='virtcity' where `id`='".$_SESSION['uid']."'");
                    mysql_query("UPDATE `online` SET `city`='virtcity' where `id`='".$_SESSION['uid']."'");
                    die("<script>top.window.location='/battle.php';</script>");
                    break;


                 }
        }
       





       
	?>


	<HTML><HEAD>
<script LANGUAGE='JavaScript'>
document.ondragstart = test;
//запрет на перетаскивание
document.onselectstart = test;
//запрет на выделение элементов страницы
document.oncontextmenu = test;
//запрет на выведение контекстного меню
function test() {
 return false
}
</SCRIPT>
<link rel=stylesheet type="text/css" href="http://img.combats.com/i/main.css">
<meta content="text/html; charset=windows-1251" http-equiv=Content-type>
<META Http-Equiv=Cache-Control Content=no-cache>
<meta http-equiv=PRAGMA content=NO-CACHE>
<META Http-Equiv=Expires Content=0>
<script src="js/lib/jquery.js" type="text/javascript"></script>
</HEAD>
<body leftmargin=5 topmargin=5 marginwidth=5 marginheight=5 bgcolor=#e2e0e0 style="background-image: url(http://img.combats.ru/i/misc/showitems/p_portal21.jpg);background-repeat:no-repeat;background-position:top right">

<div id=hint4 class=ahint></div>


<TABLE width=100%>
<TR><TD valign=top width=100%><left><H4> Портал </H4></left>




<TD nowrap valign=top>
<BR><DIV align=right><INPUT style="font-size:12px;" type='button' onClick="location='portal.php'" value=Обновить>
<?if ($user['incity']=='virtcity'){?>
<INPUT style="font-size:12px;" type='button' onClick="location='portal.php?cap=1'" value=Вернуться></DIV></TD>
<?}?>
<?if ($user['incity']=='dungeon'){?>
<INPUT style="font-size:12px;" type='button' onClick="location='portal.php?weed=1'" value=Вернуться></DIV></TD>
<?}?>
</TR>


      

<?if ($user['incity']=='virtcity'){?>
  <td align="left"><b>Abandoned Plain</b>  <INPUT style="font-size:12px;" type='button' onclick=" window.location='portal.php?get=dungeon'"  value="Войти в портал"></td>
 <?}?>
 <?if ($user['incity']=='dungeon'){?>
<tr>
<td align="left"><b>Capital City (Возврат)</b>   <INPUT style="font-size:12px;" type='button' onclick=" window.location='portal.php?get=virtcity'"  value="Войти в портал"></td>
</tr>
<?}?>

        </table>
    </td>
</tr>
</TABLE>
</BODY>
</HTML>