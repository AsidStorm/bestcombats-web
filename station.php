<?php
 	session_start();
	if ($_SESSION['uid'] == null) header("Location: index.php");
         include 'connect.php';
        $user=mysqli_fetch_array(db_query("SELECT * from users where id='".$_SESSION['uid']."'"));
        include 'functions.php';
	if ($user['room'] != 2005){ header("Location: main.php"); die(); }
        if ($user['battle'] != 0) { header('location: fbattle.php'); die(); }
            if (@$_GET["voz"]) {
            $routes = array("virtcity" => "20", "suburb"=> "20", "dungeon"=> "20", "suncity"=> "20");
            db_query("UPDATE `users`,`online` SET `users`.`room` = '".$routes[$user['incity']]."',`online`.`room` = '".$routes[$user['incity']]."' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
            header('location: city.php');
  }
  if($user['invis']==1){
  $kto = '<i>Невидимка</i>';
  }else{
  $kto = $user['login'];
  }
        if($_GET['get']){
            switch($_GET['get']){
                case 'abandonedplain':
                    db_query("UPDATE `users` SET `money`=`money`-0, `incity`='dungeon' where `id`='".$_SESSION['uid']."'");
                    db_query("UPDATE `online` SET `city`='dungeon' where `id`='".$_SESSION['uid']."'");
                    $messab="<b>".$kto."</b> отправился в <img src=<?=IMG_PATH?>/city/micro/dungeon.gif> Abandoned Plain через <b>Портал</b>";
					addch('<img src=i/magic/teleport.gif width="25"> '.$messab.'');
                    die("<script>top.window.location='/battle.php';</script>");
                    break;
                    case 'capital':
                    db_query("UPDATE `users` SET `money`=`money`-0, `incity`='virtcity' where `id`='".$_SESSION['uid']."'");
                    db_query("UPDATE `online` SET `city`='virtcity' where `id`='".$_SESSION['uid']."'");
                    $messcp="<b>".$kto."</b> отправился в <img src=<?=IMG_PATH?>/city/micro/virtcity.gif> Devils City через <b>Портал</b>";
					addch('<img src=i/magic/teleport.gif width="25"> '.$messcp.'');
                    die("<script>top.window.location='/battle.php';</script>");
                    break;
                    case 'angel':
                    db_query("UPDATE `users` SET `money`=`money`-0, `incity`='suburb' where `id`='".$_SESSION['uid']."'");
                    db_query("UPDATE `online` SET `city`='suburb' where `id`='".$_SESSION['uid']."'");
                    $messan="<b>".$kto."</b> отправился в <img src=<?=IMG_PATH?>/city/micro/suburb.gif> Angels City через <b>Портал</b>";
					addch('<img src=i/magic/teleport.gif width="25"> '.$messan.'');
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
<link rel=stylesheet type="text/css" href="<?=IMG_PATH?>/css/main.css">
<meta content="text/html; charset=windows-1251" http-equiv=Content-type>
<META Http-Equiv=Cache-Control Content=no-cache>
<meta http-equiv=PRAGMA content=NO-CACHE>
<META Http-Equiv=Expires Content=0>
<script src="<?=IMG_PATH?>/js/lib/jquery.js" type="text/javascript"></script>
</HEAD>
<body leftmargin=5 topmargin=5 marginwidth=5 marginheight=5 bgcolor=#e2e0e0 style="background-image: url(<?=IMG_PATH?>/portal/p_portal21.jpg);background-repeat:no-repeat;background-position:top right">

<div id=hint4 class=ahint></div>


<TABLE width=100%>
<TR><TD valign=top width=100%><center><H4>Городской портал.</H4></center>




<TD nowrap valign=top>
<BR><DIV align=right><INPUT style="font-size:12px;" type='button' onClick="location='station.php'" value=Обновить>
<INPUT style="font-size:12px;" type='button' onClick="location='station.php?voz=1'" value=Вернуться></DIV></TD>
</TR>
<?if ($user['incity']=='virtcity'){?>
<tr>
<td align="left">
<b>Abandoned Plain</b> Цена перемещения: 0 кр.
 <small>(без задержки) </small>  <INPUT style="font-size:12px;" type='button' onclick=" window.location='station.php?get=abandonedplain'"  value="Войти в портал"></td>
</tr>
<tr>
<td align="left">
<b>Angels City</b> Цена перемещения: 0 кр. 
 <small>(без задержки) </small>   <INPUT style="font-size:12px;" type='button' onclick=" window.location='station.php?get=angel'"  value="Войти в портал"></td>
</tr>
<td align="left">
<b>Sun City</b> Цена перемещения: 0 кр. 
 <small>(без задержки) </small>   <INPUT style="font-size:12px;" type='button' onclick=" window.location='station.php?get=sun'"  value="Войти в портал"></td>
</tr>
 <?}?>
 <?if ($user['incity']=='dungeon'){?>
<tr>
<td align="left"><b>Devils City (Возврат)</b> Цена перемещения: 0 кр. 
 <small>(без задержки) </small>   <INPUT style="font-size:12px;" type='button' onclick=" window.location='station.php?get=capital'"  value="Войти в портал"></td>
</tr>
<?}?>
</TR>
<?if ($user['incity']=='suburb'){?>
<tr>
<td align="left"><b>Devils City (Возврат)</b> Цена перемещения: 0 кр. 
 <small>(без задержки) </small>   <INPUT style="font-size:12px;" type='button' onclick=" window.location='station.php?get=capital'"  value="Войти в портал"></td>
</tr>
<?}?>
 <?if ($user['incity']=='suncity'){?>
<tr>
<td align="left"><b>Devils City (Возврат)</b> Цена перемещения: 0 кр. 
 <small>(без задержки) </small>   <INPUT style="font-size:12px;" type='button' onclick=" window.location='station.php?get=capital'"  value="Войти в портал"></td>
</tr>
<?}?>
</TR>
</TR>
</table>
    </td>
</tr>
</TABLE>
</BODY>
</HTML>