<?php
    session_start();
    if ($_SESSION['uid'] == null) header("Location: index.php");
    include "connect.php";
    $user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
    include "functions.php";
    header("Cache-Control: no-cache");
?>
<HTML><HEAD>
<link rel=stylesheet type="text/css" href="http://img.bestcombats.net/css/main.css">
<meta content="text/html; charset=windows-1251" http-equiv=Content-type>
<META Http-Equiv=Cache-Control Content="no-cache, max-age=0, must-revalidate, no-store">
<meta http-equiv=PRAGMA content=NO-CACHE>
<META Http-Equiv=Expires Content=0>
<style>
    .row {
        cursor:pointer;
    }
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
<TD align=center><h4>Реферальная Система</h4></TD>
</TR>
<TR>
</head>
<TD bgcolor=efeded nowrap>
<?

$data = mysql_query("SELECT `id`, `login`, `status`, `level`, `room`, `align`, (select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online` FROM users WHERE refer='$user[id]' ORDER BY level DESC");
$i=0;
while($row = mysql_fetch_array($data)){
$i++;
if($i==1){echo"<center>Список игроков которых Вы привели:</center><br>";}




                        if ($row['online']>0) {
                            echo '<A HREF="javascript:top.AddToPrivate(\'',nick7($row['id']),'\', top.CtrlPress)" target=refreshed><img src="http://img.bestcombats.net/chat/lock.gif" width=20 height=15></A>';
                            nick2($row['id']);
                            if ($row['id'] == $user['deal']) {
                                echo ' - '.$row['status'].'';
                            }
                                $rrm = $rooms[$row['room']];
                            echo ' - <i>',$rrm,'</i><BR>';
                        }
                        if ($row['online']<1) {
                            echo '<font color=gray><img src="http://img.bestcombats.net/chat/offline.gif" width=20 height=15 alt="Нет в клубе">';
                            nick2($row['id']);
                            if ($row['id'] == $user['deal']) {
                                echo ' - ',$row['status'],'';
                            }
                            echo ' - нет в клубе</font><BR>';
                        }





}


?>
<TR><TD style="text-align: left; ">
С помощью реферальной системы Вы можете приводить в игру своих друзей используя ссылку ниже, и получать за этоЕврокредиты.<br>
За каждого зарегистрировашегося персонажа Вы получаете Еврокредиты когда он дойдет до:<br><br>
8-го уровня Вы получаете <font color="#9d9f06">10</font> екр.<br>
9-го уровня Вы получаете еще <font color="#9d9f06">15</font> екр.<br>
10-го уровня Вы получаете еще <font color="#9d9f06">20</font> екр.<br>
11-го уровня Вы получаете еще <font color="#9d9f06">25</font> екр.<br>
12-го уровня Вы получаете еще <font color="#9d9f06">50</font> екр.<br>

<IMG src="http://img.bestcombats.net/ref/ref.gif" width="160" height="150"><br>

Ваша ссылка на регистрацию новых игроков: <b>http://bestcombats.net/r<?echo $user["id"]?></b><br>
<Br></div></TD>
</TR>
</TABLE></TD>
<TD style="width: 5%; vertical-align: top; ">&nbsp;</TD>
<TD style="width: 25%; vertical-align: top; text-align: right; "><INPUT type='button' value='Обновить' style='width: 75px' onclick='location="/ref.php"'>
&nbsp;<INPUT TYPE=button value="Вернуться" style='width: 75px' onClick="location.href='main.php'"></TD>
</TR>
</TABLE>
</body>
</html>