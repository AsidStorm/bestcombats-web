<?php
    session_start();
//    if ($_SESSION['uid'] == null) header("Location: index.php");
    include "connect.php";
    $user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
    include "functions.php";
    header("Cache-Control: no-cache");
?>
<HTML><HEAD>
<link rel=stylesheet type="text/css" href="i/main.css">
<meta content="text/html; charset=windows-1251" http-equiv=Content-type>
<META Http-Equiv=Cache-Control Content="no-cache, max-age=0, must-revalidate, no-store">
<meta http-equiv=PRAGMA content=NO-CACHE>
<META Http-Equiv=Expires Content=0>
<style>
.td {font-size:11px}
.row {cursor:pointer;}
</style>
<script type="text/javascript">
  function show(ele) {
      var srcElement = document.getElementById(ele);
      if(srcElement != null) {
          if(srcElement.style.display == "block") {
            srcElement.style.display= 'none';
          }
          else {
            srcElement.style.display='block';
          }
      }
  }
</script>
<body leftmargin=0 topmargin=0 marginwidth=0 marginheight=0 bgcolor=e2e0e0>
    <div id=hint4 class=ahint></div>
    <TABLE cellspacing=0 cellpadding=2 width=100%>
<TD style="width: 40%; vertical-align: top; "><TABLE cellspacing=0 cellpadding=2 style="width: 100%; ">
<TD align=center><h4>Алхимики</h4></TD>
</TR>
<TR>
</head>
<TD bgcolor=efeded nowrap>
<?
                    $data=mysql_query("SELECT `id`, `login`, `status`, `level`, `room`, `align`, (select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online` FROM `users` WHERE `deal` IN ('1','2','3','4','5') order by online DESC, login asc ;");
                    while ($row = mysql_fetch_array($data)) {
                        if ($row['online']>0) {
                            echo '<A HREF="javascript:top.AddToPrivate(\'',nick7($row['id']),'\', top.CtrlPress)" target=refreshed><img src="i/lock.gif" width=20 height=15></A>';
                            nick2($row['id']);
                            if ($row['id'] == $user['deal']) {
                                echo ' - '.$row['status'].'';
                            }
                                $rrm = $rooms[$row['room']];
                            echo ' - <i>',$rrm,'</i><BR>';
                        }
                        if ($row['online']<1) {
                            echo '<font color=gray><img src="i/offline.gif" width=20 height=15 alt="Нет в клубе">';
                            nick2($row['id']);
                            if ($row['id'] == $user['deal']) {
                                echo ' - ',$row['status'],'';
                            }
                            echo ' - нет в клубе</font><BR>';
                        }
                    }
?>
<TR><TD style="text-align: left; "><Font color="#2b7bc5"><b>Продажа ЕвроКредитов и прочих платных услуг.</b></font><BR>

<b>Информация:</b><br><br>
<img src="i/info.png" width=45 height=45 style="float: left; clear: none;" /><b><font color="#f33104">ВНИМАНИЕ!!! Переводы алхимику действительны ТОЛЬКО на указанные кошельки в информации <img src="i/inf1.gif"> у каждого Алхимика.</font></b><br>
<small>(Вы можете отправить личное сообщение, даже если Вы и Алхимик находитесь в разных городах)</small><p>

------------------------------------------------------------<br>

<style>
<!-- CSS -->
#convertor { padding: 0px; margin: 0px; width:150px; background: #e2e0e0; height:170px; }
#convertor p, #convertor td { font: normal 11px Helvetica, Georgia, Arial; padding: 2px; margin: 0px; }
#convertor input { border: 1px solid #E9851D; background: #FFFFFF; font: normal 11px Arial, Helvetica, sans-serif; color: #5D781D; width: 65px; }
</style>
<div id="convertor"><p><a href="http://finance.blr.cc/converter/" target="_blank">Калькулятор валют ЦБ</a><br /><span id="dateru"></span></p><span id="bodyru"></span></div>
<script type="text/javascript" src="http://finance.blr.cc/xml/currency_ru.js"></script>

<img src="i/moneta.png" width=45 height=45 style="float: left; clear: none;" />
7.5 € = 100 екр.<br>
10 $ = 100 екр.<br>
300 руб. = 100 екр.<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;80 UAH = 100 екр.<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;85000 BLR = 100 екр.<br>
&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;1000кр. = 1екр.

<br>
------------------------------------------------------------<br><br>
<b>Бонусная система:</b><p>
<img src="i/bonus.png" width=102 height=74 style="float: left; clear: none;" />
При покупке:<br> 
более 300 екр. Вы получаете дополнительно - 5%<br> 
более 1000екр. Вы получаете дополнительно - 10%<br> 
более 3000екр. Вы получаете дополнительно - 15%<br>
более 5000екр. Вы получаете дополнительно - 20%<br>
------------------------------------------------------------<br><br>
<b>Platinum аккаунт:</b><p>
<img src="i/vip3.gif" width=60 height=30 style="float: left; clear: none;" /><br> 
Стоимость:<br> 
На неделю - 15$ (150 екр)<br> 
На месяц - 35$ (350 екр)<br> 
Бессрочно - 100$ (1000 екр)<br> 
------------------------------------------------------------<br><br>
<b>Gold аккаунт:</b><p>
<img src="i/vip2.gif" width=60 height=30 style="float: left; clear: none;" /><br> 
Стоимость:<br> 
На неделю - 10$ (100 екр)<br> 
На месяц - 25$ (250 екр)<br> 
Бессрочно - 80$ (800 екр)<br> 
------------------------------------------------------------<br><br>
<b>Silver аккаунт:</b><p>
<img src="i/vip1.gif" width=60 height=30 style="float: left; clear: none;" /><br> 
Стоимость:<br> 
На неделю - 5$ (50 екр)<br> 
На месяц - 15$ (150 екр)<br> 
Бессрочно - 60$ (600 екр)<br> 
------------------------------------------------------------<br><br>
<b>Смена регистрационных данных:</b><p>
Стоимость: 100 рублей<br> 
------------------------------------------------------------<br><br>
<b>Индивидуальный образ:</b><p>
Стоимость: 300 рублей<br> 
------------------------------------------------------------<br><br>
<b>Склонность<img src="i/align_0.99.gif" width=13 height=15 style="float: left; clear: none;" /> <img src="i/align_0.98.gif" width=13 height=15 style="float: left; clear: none;" /> <img src="i/align_7.gif" width=13 height=15 style="float: left; clear: none;" />:</b><p>
Стоимость: 100 рублей<br> 
<b>Сменить склонность:</b><p>
Стоимость: 100 рублей<br> 
<b>Сменить склонность клану:</b><p>
Стоимость: 300 рублей<br> 
------------------------------------------------------------<br><br>


<TD style="width: 5%; vertical-align: top; ">&nbsp;</TD>
<TD style="width: 25%; vertical-align: top; text-align: right; "><INPUT type='button' value='Обновить' style='width: 75px' onclick='location="/dealer.php"'>
&nbsp;<INPUT TYPE=button value="Вернутся" style='width: 75px' onclick="location.href='main.php'"></TD>
</TR>
</TABLE>
<br><div align=left>
    <?php include("mail_ru.php"); ?>
<div>
</body>
</html>