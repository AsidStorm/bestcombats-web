<?php

	session_start();
	if ($_SESSION['uid'] == null) header("Location: index.php");
	include "connect.php";
	$db = mysqli_fetch_array(db_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));;
	




//-------------------------- Пора в бой? --------------------------------
	if ($db['battle'] != 0) { header('location: fbattle.php'); die(); }
	if ($db['room'] != 315 and $db['room'] !=3152 ) { header("Location: main.php");  die(); }


if($db['room'] = 315 and $db['room'] != 3152){
db_query("UPDATE `users`,`online` SET `users`.`room` = '3152',`online`.`room` = '3152' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");


}
?>
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
<body bgcolor=#eeeeee>
<link rel=stylesheet href="i/main.css" type="text/css">
<FORM action="city.php?kaz=1" method=POST><INPUT TYPE="submit" value="Казино" style="float: right" ></FORM>
<table border="0" align="center" width="100%">
    <tr>
        

        <th align="center" valign="middle">

            <p><b><h3>Угадай число</h3></b></p>
        </th>
    </tr>
</table>
<p><b>Правила:</b> Загадано число в промежутке от 0 до 100. Вам необходимо угадать следующее число будет <u>больше</u> или <u>меньше</u> загаданого. <br />В случае выигрыша сумма ставки увеличивается в <b><font color="red">2</font></b><font color="red"> </font>раза.</p>
<p> </p>

<form name='?set=buy>' method='post'>
<table width="319" align='center' border='0' cellspacing='0' cellpadding='4'>
<tr height='22' class=td><td align=center  colspan="2" nowrap style='border:1px solid black; border-bottom:0px;' width="309">
<b><font color="660000">Загаданное число:</font></b><font color="white"> 
</font><b><font size="3" color="black"><? srand((double)microtime()*1000000); $chislo3 = rand(5, 95); print "$chislo3"; ?></font></b></td>
<tr align=center class=td><td height='22' width="165" nowrap style='border-top:1px solid black; border-right:1px solid black; border-left:1px solid black;'><b><font color="maroon">Тип валюты</font></b></td>
<td height='22' width="135" nowrap style='border-top:1px solid black; border-right:1px solid black;'>
<select name='valuta' style='background-color: #FFFFF1;  font-size:12px;'>
<option style='COLOR: red' value='money'>Кр.</option>
<option style='COLOR: green' value='ekr'>Екр.</option></select></td> 
<tr align=center class=td><td height='22' width="165" nowrap style='border-top:1px solid black; border-right:1px solid black; border-left:1px solid black;'><b><font color="maroon">Размер Вашей ставки</font></b></td>
<td height='22' width="135" nowrap style='border-top:1px solid black; border-right:1px solid black;'>
<select name='stavka' style='background-color: #FFFFF1;  font-size:12px;'>
<option value='5'>   5</option>
<option value='10'selected>   10</option>
<option value='20'>   20</option>
<option value='30'>   30</option>
<option value='50'>   50</option>
<option value='100'>   100</option>
<option value='200'>   200</option>
<option value='500'>   500</option>
</select></td>
<input type="hidden" name="chislo" value="<? print $chislo3; ?>">
<tr class=td align=center><td height='22' colspan='2' style='border:1px solid black;' width="309">
<b><input type="radio" name="state" value="1" checked> <font color="red">Больше</font>            <input type="radio" name="state" value="2"> <font color="blue">Меньше</font></b></td>
<tr align=center class=td><td height='22' colspan='2' style='border-bottom:1px solid black; border-right:1px solid black; border-left:1px solid black;' width="309">
<input type=hidden value=3 name=send>
<input type=submit class="submit" value="Играть" style="border:1px solid #000000; font-family: Verdana, Arial; font-size: 8pt;"></td></table><p> </p>
<p><b>Описание:</b> Вы делаете ставку, выбирая сумму, затем указываете каким будет следующее число, согласно Вашему мнению. <br />Ниже будет показана информация по игре.<br></form>
<table><br>




<? if ($_POST['send']=="3") {
$stavka=$_POST['stavka'];
$valuta=$_POST['valuta'];
$chislo=$_POST['chislo'];
$state=$_POST['state'];

$result1=db_query("select * from game_bank where name='lloto'");
$row1=mysqli_fetch_array($result1);
//echo $row1[proc];
$priz=0;$date=date("d.m.y"); $time=date("H:i:s");

if ($valuta=="ekr") {
$result=db_query("select * from users where login='".$db['login']."'");
$row=mysqli_fetch_array($result); if ($row['ekr'] < "$stavka")
{echo "<font color=red>Для этой ставки Вам не хватает средств на счету! Вы можете пополнить его у Дилера игры.</font></table>"; exit;}

//началорезультат игры



//вычитает ставку из кассы игрока
db_query("update users set ekr=ekr-'$stavka' where login='".$db['login']."'");
$wmekrm=$stavka/(100-$row1[proc]);
db_query("update game_bank  set wmekrmin=wmekrmin+'$wmekrm' where name='lloto'");
db_query("update game_bank  set wmekr=wmekr+'$stavka'-'$wmekrm' where name='lloto'");
// Проверяем сумму банка после игры с риском
$risk=$row1[wmekr]-($stavka*2);
if ($risk >=$row1[wmekrmin] ) {$ches=" честно";
srand((double)microtime()*1000000);
$chislo2  = rand(1, 500);
if ($chislo<$chislo2&$state==1){$priz=$stavka*2;db_query("update game_bank  set wmekr=wmekr-'$priz' where name='lloto'");db_query("update users set ekr=ekr+'$priz' where login='".$db['login']."'"); }else{if ($chislo>$chislo2&$state==2){$priz=$stavka*2;}db_query("update game_bank  set wmekr=wmekr-'$priz' where name='lloto'");db_query("update users set ekr=ekr+'$priz' where login='".$db['login']."'"); }
}else{
    $ches="не честно";
    //не честно
srand((double)microtime()*1000000);
$chislo1  = rand(1, $chislo-1);
$chislo2  = rand($chislo+1,500);
if ($state==1){$chislo2=$chislo1;}else{if ($state==2){$chislo2=$chislo2;}}

};
}



//игра на рубли


if ($valuta=="money") {
$result=db_query("select * from users where login='".$db['login']."'");
$row=mysqli_fetch_array($result); if ($row['money'] < "$stavka")
{echo "<font color=red>Для этой ставки Вам не хватает средств на счету! </font></table>"; exit;}



//начало результат игры

db_query("update users set money=money-'$stavka' where login='".$db['login']."'");
$wmkrm=$stavka/(100-$row1[proc]);
db_query("update game_bank  set wmkrmin=wmkrmin+'$wmkrm' where name='lloto'");
db_query("update game_bank  set wmkr=wmkr+'$stavka'-'$wmkrm' where name='lloto'");
// Проверяем сумму банка после игры с риском
$risk=$row1[wmkr]-($stavka*2);
if ($risk >=$row1[wmkrmin] ){$ches="честно";
srand((double)microtime()*1000000);
$chislo2  = rand(1, 500);
if ($chislo<$chislo2&$state==1){$priz=$stavka*2;db_query("update game_bank  set wmkr=wmkr-'$priz' where name='lloto'");db_query("update users set money=money+'$priz' where login='".$db['login']."'"); }else{if ($chislo>$chislo2&$state==2){$priz=$stavka*2;}db_query("update game_bank  set wmkr=wmkr-'$priz' where name='lloto'");db_query("update users set money=money+'$priz' where login='".$db['login']."'");}
}else{
    //не честно
    $ches="не честно";
srand((double)microtime()*1000000);
$chislo1  = rand(1, $chislo-1);
$chislo2  = rand($chislo+1,500);
if ($state==1){$chislo2=$chislo1;}else{if ($state==2){$chislo2=$chislo2;}}

};}



if ($valuta==money){$valutas="кр.";}else{$valutas="екр.";}
//выигрыш
echo "<div align=center>
  <center>
  <table border=0 bgcolor=99CCFF cellpadding=0 cellspacing=0 style=border-collapse: collapse bordercolor=#111111 width=49% id=AutoNumber1 height=134>
    <tr>
      <td width=50% height=25 colspan=2>
      <p align=center><font color=66000><b>Результат игры</b></font></td>
    </tr>
   <tr>
    <td width=50% height=25>
   <p align=center><font size=2>Дата розыгрыша:</font></td>
    <td width=50% height=25><p align=center><font size=2>$date-$time</font></td>
  </tr>
    <tr>
      <td width=25% height=25>
      <p align=center><font size=2>Сумма ставки:</font></td>
      <td width=25% height=25><center><font size=2><b>$stavka $valutas</b></font></td>
    </tr> <td width=25% height=24  >
    <p align=center><font size=2>Начальное число:</font></td>
      <td width=25% height=24><center><font size=2><b>$chislo</b></font></td>
    </tr>
    <td width=25% height=24>
    <p align=center><font size=2>Загаданное число:</font></span></td>
      <td width=25% height=24><center><font size=2><b>$chislo2</b></font></td>
    </tr>


    ";
if ($state==1){$vibor="Больше";}else{if ($state==2){$vibor="Меньше";}}

if ($priz==0){$rezgame="Проигрыш";}else{$rezgame="Выигрыш <b>$priz $valutas</b>";}
echo "<td width=25% height=24 bgcolor=#FFE280 >
    <p align=center><font size=2>Ваш выбор:</font></td>
      <td width=25% height=24  bgcolor=#FFE280 ><center><font size=2>$vibor</font></td>
    </tr>
    <td width=25% height=24  bgcolor=#FFE280 >
    <p align=center><font size=2>Результат игры:</font></td>
      <td width=25% height=24  bgcolor=#FFE280 ><center><font size=2>$rezgame</font></td>
    </tr>

    ";
//echo "$risk $ches $row1[wmzmin]";
if ($win_state == "not") {echo "Информации о Вашей ставке нет!";}} ?>    </td></tr> </table>

У вас на счету:<br><b> <?
$dba = mysqli_fetch_array(db_query("SELECT money,ekr FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));;


 echo $dba['money']; ?></b> кр.<br>
<b><? echo $dba['ekr']; ?></b> екр.