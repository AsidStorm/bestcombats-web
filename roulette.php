<?php

	session_start();
	if ($_SESSION['uid'] == null) header("Location: index.php");
	include "connect.php";
	$db = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));;
	




//-------------------------- Пора в бой? --------------------------------
	if ($db['battle'] != 0) { header('location: fbattle.php'); die(); }
	if ($db['room'] !=3151 and $db['room'] !=315) { header("Location: main.php");  die(); }
elseif($db['room'] == 315 and $db['room'] !=3151){
mysql_query("UPDATE `users`,`online` SET `users`.`room` = '687',`online`.`room` = '3151' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$_SESSION['uid']}' ;");
}




$roundtime=90;

$minbet=1;

$maxbet=50;














$uname = $db["login"];



echo'<LINK href="i/main.css" type=text/css rel=stylesheet>';
if ($db["level"] < 5) {

echo'<HTML><HEAD>
<LINK href="i/main.css" type=text/css rel=stylesheet>
<meta content="text/html; charset=windows-1251" http-equiv=Content-type>
<META Http-Equiv=Cache-Control Content="no-cache, max-age=0, must-revalidate, no-store">
<meta http-equiv=PRAGMA content=NO-CACHE>
<META Http-Equiv=Expires Content=0>
</HEAD>
<body leftmargin=5 topmargin=5 marginwidth=5 marginheight=5> 
<CENTER>Увы, но рулетка доступна персонажам с 5-го уровня</CENTER><BR>
<DIV ALIGN=RIGHT>

<tr>
<td ><img src="i/move/links.gif" width="9" height="7" /></td>
<td  nowrap><a href="city.php?kaz=1" onClick="return check_access();" class="menutop" title="Время перехода: 10 сек.  ">Казино</a></td>
</tr>


</DIV></body></HTML>';

	exit;
}	


function writestring($string){

$krupye = "Крупье";
$room=687;


			$fp = fopen ("tmpdisk/chat.txt","a"); //открытие
			flock ($fp,LOCK_EX); //БЛОКИРОВКА ФАЙЛА
			fputs($fp ,":[".time()."]:[{$krupye}]:[".($string)."]:[".$room."]\r\n"); //работа с файлом
			fflush ($fp); //ОЧИЩЕНИЕ ФАЙЛОВОГО БУФЕРА И ЗАПИСЬ В ФАЙЛ
			flock ($fp,LOCK_UN); //СНЯТИЕ БЛОКИРОВКИ
			fclose ($fp); //закрытие


}

// fill in roul_names

$roul_names[0]="ZERO";

for ($i=0; $i<3; $i++)

{

  for ($j=0; $j<12; $j++)

    $roul_names[$j*3+$i+1]=($j*3+$i+1);

  $roul_names[37+$i]=($i+1)." ряд";

  $roul_names[40+$i]=($i+1)." дюжину";

}

$roul_names[43]="от 1 до 18";

$roul_names[44]="четное";

$roul_names[45]="красное";

$roul_names[46]="черное";

$roul_names[47]="нечетное";

$roul_names[48]="от 19 до 36";

for ($j=0; $j<12; $j++)

{

  $roul_names[49+$j]=($j*3+1) . "-" . ($j*3+3);

  $roul_names[61+$j]=($j*3+2) . "," . ($j*3+3);

  $roul_names[73+$j]=($j*3+1) . "," . ($j*3+2);

}

for ($j=0; $j<11; $j++)

{

  for ($i=0; $i<3; $i++)

    $roul_names[85+(2-$i)*11+$j]=($j*3-$i+3) . "," . ($j*3-$i+6);

  $roul_names[118+$j]=($j*3+1) . "-" . ($j*3+6);

  $roul_names[129+$j]=($j*3+1) . "," . ($j*3+2) . "," . ($j*3+4) . "," . ($j*3+5);

  $roul_names[140+$j]=($j*3+2) . "," . ($j*3+3) . "," . ($j*3+5) . "," . ($j*3+6);

}



// fill in roul_wins

$roul_wins[0][0]=36;

$red=array(1,3,5,7,9,12,14,16,18,19,21,23,25,27,30,32,34,36);

for ($i=1; $i<=36; $i++)

{

  $roul_wins[$i][$i]=36;

}

for ($i=0; $i<3; $i++)

{

  for ($j=0; $j<12; $j++)

  {

    $roul_wins[$i+1+$j*3][37+$i]=3;

    $roul_wins[$i+1+$j*3][40+floor(($i+$j*3)/12)]=3;

    $roul_wins[$i+1+$j*3][43+floor(($i+$j*3)/18)*5]=2;

    $roul_wins[$i+1+$j*3][47-(($i+$j*3)%2)*3]=2;

    $roul_wins[$i+1+$j*3][49+floor(($i+$j*3)/3)]=12;

    $roul_wins[$i+1+$j*3][45+(in_array($i+1+$j*3,$red)?0:1)]=2;

  }

}

for ($j=0; $j<12; $j++)

{

  $roul_wins[$j*3+2][61+$j]=18;

  $roul_wins[$j*3+3][61+$j]=18;

  $roul_wins[$j*3+1][73+$j]=18;

  $roul_wins[$j*3+2][73+$j]=18;

}

for ($j=0; $j<11; $j++)

{

  for ($i=0; $i<3; $i++)

  {

    $roul_wins[$j*3-$i+3][85+(2-$i)*11+$j]=18;

    $roul_wins[$j*3-$i+6][85+(2-$i)*11+$j]=18;

  }

  for ($i=1; $i<=6; $i++) $roul_wins[$j*3+$i][118+$j]=6;

  $roul_wins[$j*3+1][129+$j]=9;

  $roul_wins[$j*3+2][129+$j]=9;

  $roul_wins[$j*3+4][129+$j]=9;

  $roul_wins[$j*3+5][129+$j]=9;

  $roul_wins[$j*3+2][140+$j]=9;

  $roul_wins[$j*3+3][140+$j]=9;

  $roul_wins[$j*3+5][140+$j]=9;

  $roul_wins[$j*3+6][140+$j]=9;


$casino_win = mysql_query("SELECT * FROM `roulette` WHERE `username` = '$uname'");
$casino_win = mysql_fetch_array($casino_win);
if ($casino_win[price] > '500') {
		?>
		<body leftmargin=5 topmargin=5 marginwidth=5 marginheight=5> 
		<CENTER>Увы, администрация казино отказывается Вас обслуживать</CENTER><BR>
		<DIV ALIGN=RIGHT>

<tr>
<td ><img src="i/move/links.gif" width="9" height="7" /></td>
<td  nowrap><a href="city.php?kaz=1" onClick="return check_access();" class="menutop" title="Время перехода: 10 сек.  ">Казино</a></td>
</tr>

		</DIV>
		</body>
		<?
		exit;
	}



}

echo'<SCRIPT src=js/roulette.js></SCRIPT>';



// first we should perform all bets

$lefttime=$roundtime;

$wasbets=0;

mysql_query("LOCK TABLES roul_time write, roul_bets write, roul_wins write");

$time=mysql_query("select * from `roul_time`");

if ($time) $time=mysql_fetch_array($time);

if ($time) $time=$time[0];

if (!$time) { $time=time(); }

if ($time<=time()) // should roul

{

// choose number

  $num=mt_rand(0,36);
// process all bets

  $bets=mysql_query("select * from `roul_bets`");

  if (mysql_num_rows($bets)) // was bets

  {

    $wasbets=1;

// out in chat that we get...

    if (!$num) $strnum="Zero";

    else if (in_array($num, $red)) $strnum="$num, красное";

    else $strnum="$num, черное";

    writestring("Ставки сделаны... Запускаем... Выпало <b>$strnum</b>.");

  }

  while ($cbet = mysql_fetch_array($bets))

  {

    if ($roul_wins[$num][$cbet['betto']])

    {

      $wins[$cbet['username']]+=$cbet['bet']*$roul_wins[$num][$cbet['betto']];
      $tm=time()-3600*24*7;
      mysql_query("delete from `roul_wins` where `wintime`<'$tm'");   
      mysql_query("insert into `roul_wins` (`username`, `bet`, `betto`, `win`, `wintime`) values ('". $cbet['username'] . "', " . $cbet['bet']. ", " . $cbet['betto']. ", " . $cbet['bet']*$roul_wins[$num][$cbet['betto']]. ", ". time() .")");   

    }

  }  

  mysql_query("delete from `roul_bets`");   

  mysql_query("delete from `roul_time`");   

  mysql_query("insert into `roul_time` (shouldstart) values ('". (time()+$roundtime) ."')");   

}

$time=mysql_query("select * from `roul_time`");

if ($time) $time=mysql_fetch_array($time);

if ($time) $time=$time[0];

if (!$time) { $time=time(); }

$lefttime=$time-time()+2;

mysql_query("UNLOCK TABLES");

// update money

$winners='';

if (isset($wins))

{

  foreach ($wins as $user => $winmoney)

  {

    if ($winners) $winners.=', ';

    $winners.=$user;

    mysql_query("UPDATE `users` SET `money` = money+'$winmoney' WHERE  `login` = '".$user."' ;");


 

 



    $casinostat=mysql_query("select count(*) from `roulette` where `username`='$user'");
    if ($casinostat) $casinostat=mysql_fetch_array($casinostat);
    if ($casinostat) $casinostat=$casinostat[0];
    if (!$casinostat)
    {
      mysql_query("insert into `roulette` (`username`, `price`) values ('$user', '0')");   
    }

    mysql_query("UPDATE `roulette` SET `price` = price+'$winmoney' WHERE  `username` = '".$user."' ;");

   
  }

}

// out in chat of winners

if ($wasbets)

{

  if ($winners)

  {

     writestring("Удача улыбнулась <b>$winners</b>.");

  } else

  {

     writestring("Никто не выиграл.");

  }

}

// refresh money

$money=mysql_query("select `money` from `users` where `login`='$uname'");

$money=mysql_fetch_array($money);

$money=$money['money'];

// process user bet

$outstr='';

if ($bet && $roul_names[$betto]) {
  if (is_numeric($bet)) {
    if ($bet<$minbet) $outstr='Ставка слишком маленькая'; else
    if ($bet>$maxbet) $outstr='Ставка слишком большая'; else
    if ($bet>$money) $outstr='У вас стольки нет'; else  {

      mysql_query("UPDATE `users` SET `money` = money-'$bet' WHERE  `login` = '".$uname."' ;");





      $casinostat=mysql_query("select count(*) from `roulette` where `username`='$uname'");
      if ($casinostat) $casinostat=mysql_fetch_array($casinostat);
      if ($casinostat) $casinostat=$casinostat[0];
      if (!$casinostat) {
        mysql_query("insert into `roulette` (`username`, `price`) values ('$uname', '0')");   
      }

      mysql_query("UPDATE `roulette` SET `price`=price-'$bet' WHERE  `username` = '".$uname."' ;");

 
      mysql_query("insert into `roul_bets` (`username`, `bet`, `betto`) values ('$uname', '$bet', '$betto')");
      $outstr='Ставка принята';
      writestring("Игрок <b>$uname</b> ставит на ". $roul_names[$betto]);
      $money-=$bet;
    }
  } else {
    $outstr='Попытка обмана игры занесена в логи, ждите наказания.';
    writestring("Игрок <b>$uname</b> пытается обмануть казино и скоро будет наказан.");
  }
}
?>



</HEAD>



<DIV ALIGN=RIGHT>


<tr>
<td ><img src="i/move/links.gif" width="9" height="7" /></td>
<td  nowrap><a href="city.php?kaz=1" onClick="return check_access();" class="menutop" title="Время перехода: 10 сек.  ">Казино</a></td>
</tr>




<BR>

<?
//<a disabled><B><FONT COLOR=RED>Правила</FONT></B></a>
?>

</DIV>

<center>

<table>

<tr><td>

<center>

<?

if($outstr){
echo "<font color=red><b>$outstr</b></font><br>";
}

?>


У вас осталось <?= $money ?> кр.

<br>
<script>
function timerfunc()
{
	lefttime--;
	if (lefttime<=0) window.location="roulette.php";
	leftsec=lefttime%60;
	leftmin=Math.floor(lefttime/60);
	if (leftsec<10) leftsec="0"+leftsec;
	timercl.innerText=leftmin+":"+leftsec;
	setTimeout("timerfunc()",1000);
}
//window.onload = timerfunc;
lefttime=<?= $lefttime ?>;
temptype=3;
</script>
<body bgcolor=#f0f0f0 topmargin=2 onload="timerfunc()">
До запуска рулетки осталось <b id=timercl>0:00</b>

</center>

</td></tr>

<tr><td>

<IMG SRC="i/roulette/roulette.gif" BORDER=0 USEMAP="#RouletteMap">

<MAP NAME="RouletteMap">

<script>buildtable();</script>

</MAP>

<IMG SRC="i/roulette/roul.gif" BORDER=0>

</td></tr>

<tr><td>

<center>

<form id=betform>

<div id=betto style="display: none">

Вы ставите на <b id=betname></b>&nbsp;&nbsp;&nbsp;<input type=text name=bet class=button id=bet value=1 size=10 /> кр. <INPUT TYPE=button class=button value="Поставить" onclick="betclick();" />
<br> <small> Для того чтобы сделать ставку введите сумму ставки и нажмите кнопку "Поставить" </small>
</div>

</form>

<?

  $cwins=mysql_query("select * from `roul_wins` where `username`='$uname' order by wintime desc limit 5");

  if (mysql_num_rows($cwins)) 

  {

?>

    Последние ваши выигрыши

    <table>

    <thead><th>Ставка</th><th>Выиграно</th></thead>

<?

    while ($cwin = mysql_fetch_array($cwins))

    {

       echo "<tr><td>". $cwin['bet'] . " кр. на ". $roul_names[$cwin['betto']] . "</td><td align=center>" . $cwin['win'] . "</td></tr>";

    }  

?>

    </table>

<?

  }mysql_close();

?>



</center>

</td></tr>

</table>

</center>

</body>

