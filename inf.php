<?php
ob_start();
session_start();
    include "connect.php";
    include "functions.php";
    include "functions/info.php";
    $own=$user;
    function user_browser($agent) {
	preg_match("/(MSIE|Opera|Firefox|Chrome|Version|Opera Mini|Netscape|Konqueror|SeaMonkey|Camino|Minefield|Iceweasel|K-Meleon|Maxthon)(?:\/| )([0-9.]+)/", $agent, $browser_info);
	list(,$browser,$version) = $browser_info;
	if (preg_match("/Opera ([0-9.]+)/i", $agent, $opera)) return 'Opera '.$opera[1];
	if ($browser == 'MSIE') {
		preg_match("/(Maxthon|Avant Browser|MyIE2)/i", $agent, $ie);
		if ($ie) return $ie[1].' based on IE '.$version;
		return 'IE '.$version;
	}
    if ($browser == 'Firefox') {
		preg_match("/(Flock|Navigator|Epiphany)\/([0-9.]+)/", $agent, $ff);
		if ($ff) return $ff[1].' '.$ff[2];
	}
	if ($browser == 'Opera' && $version == '9.80') return 'Opera '.substr($agent,-5);
	if ($browser == 'Version') return 'Safari '.$version;
	if (!$browser && strpos($agent, 'Gecko')) return 'Browser based on Gecko';
	return $browser.' '.$version;
}
function geo_info($ip)
{
$xml = '<ipquery><fields><city/></fields><ip-list>'
. '<ip>'.$ip.'</ip></ip-list></ipquery>';
$ch = curl_init('http://194.85.91.253:8090/geo/geo.html');
curl_setopt($ch, CURLOPT_HEADER, false);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, $xml);
$result = curl_exec($ch);
if(curl_errno($ch) != 0)
die('curl_errno('.curl_errno($ch).'), curl_error('.curl_error($ch).')');
curl_close($ch);
if (strpos($result, '<message>Not found</message>') !== false)
return false;
preg_match('/<city>(.*)<\/city>/', $result, $city);
return $city[1];
}
    function getuser($us) {
      global $user, $user8;
      $user8 = mysqli_fetch_array(mq("SELECT `id` FROM `users` WHERE id='$us' LIMIT 1"));
      nick99 ($user8['id']);
      $user = mysqli_fetch_array(db_query("SELECT * FROM `users` WHERE id='$us' LIMIT 1;"));
    }
    if ($_GET['login']) {
      $us=mqfa1("select id from users where login='$_GET[login]'");
      if (!$us) {
        $user=mqfa("select * from allusers where login='$_GET[login]'");
        $us=@$user["id"];
        if ($us) {
          $infrec=mqfa("select * from infcache where id='$us'");
          if (!$infrec["persout"]) {
            restoreuser($us);
            getuser($us);
            list($po, $noinfo)=infpersout($user);
            $lastvisit=0;
          } else {
            $po=$infrec["persout"];
            $noinfo=$infrec["noinfo"];
            $lastvisit=$infrec["date"];
          }
        }
      } else {
        getuser($us);
        list($po, $noinfo)=infpersout($user);
        $lastvisit=0;
      }
    } else {
      if ($_SERVER['QUERY_STRING']>_BOTSEPARATOR_) {
        $usr=mqfa("select name, prototype from bots where id='".$_SERVER['QUERY_STRING']."'");
        if ($usr["name"]=="Отморозок") $us=3946;
        else $us=$usr["prototype"];
      } else $us=(int)$_SERVER['QUERY_STRING'];
      $us=mqfa1("select id from users where id='$us'");
      if (!$us) {
        $us=$_SERVER['QUERY_STRING'];
        $user=mqfa("select * from allusers where id='$us'");
        $us=@$user["id"];
        if ($us) {
          $infrec=mqfa("select * from infcache where id='$us'");
          if (!$infrec["persout"]) {
            restoreuser($us);
            getuser($us);
            list($po, $noinfo)=infpersout($user);
            $lastvisit=0;
          } else {
            $po=$infrec["persout"];
            $noinfo=$infrec["noinfo"];
            $lastvisit=$infrec["date"];
          }
        }
      } else {
        getuser($us);
        list($po, $noinfo)=infpersout($user);
        $lastvisit=0;
      }
    }
    if ($user["invis"]) {
      $user["hp"]=$user["maxhp"];
      $user["mana"]=$user["maxmana"];
    }
    if($user['redirect']) {
      header("Location: ".$user['redirect']."");
      die();
    }

    $_SERVER['QUERY_STRING'] = $user[0];
    if(!$us) {
        ?>

<html><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="icon" href="http://img.bestcombats.net/favicon.ico" type="image/x-icon">
<meta http-equiv="Content-Language" content="ru">
<link rel="icon" href="http://img.bestcombats.net/favicon.ico" type="image/x-icon">
<TITLE>Произошла ошибка</TITLE></HEAD><BODY text="#FFFFFF"><p><font color=black>
Произошла ошибка: <pre>Персонаж <?=($_GET['login']?"\"".$_GET['login']."\"":"")?> не найден...</pre>
<b><p><a href = "javascript:window.history.go(-1);">Назад</b></a>
<HR>
<p align="right">(c) <a href="/">BestCombats.net</a></p>

</body></html>
        <?
        die();
    }
if($_GET['short']) { 
header("Content-type= text/plain");
echo "login=".$user['login']."\n";
echo "level=".$user['level']."\n";
echo "align=".$user['align']."\n";
echo "klan=".$user['klan']."\n";
echo "sex=".$user['sex']."\n";
echo "str=".$user['sila']."\n";
echo "agil=".$user['lovk']."\n";
echo "int=".$user['inta']."\n";
echo "dex=".$user['vinos']."\n";
echo "intel=".$user['intel']."\n";
echo "wisd=".$user['mudra']."\n";
echo "spir=".$user['duh']."\n";
echo "godn=".$user['bojes']."\n";
echo "status=".$user['status']."\n";
echo "borncity=".$user['borncity']."\n";
echo "block=".$user['block']."\n";
echo "palmessage=".$user['palcom']."\n";
echo "online=".(int)(time()-$user['chattime'] < 60*5)."\n";
echo "hp=".$user['hp']."\n";
echo "maxhp=".$user['maxhp']."\n";
echo "mana=".$user['mana']."\n";
echo "maxmana=".$user['maxmana']."\n";
echo "room=".$user['room']."\n";
echo "dress=";$dresses = mq("SELECT * FROM `inventory` WHERE `owner` = '".$user['0']."' AND `dressed` = 1 AND `type` <> 12;");
while($dr = mysqli_fetch_array($dresses)) {
echo $dr['name']." ".(int)$dr['duration']."/".(int)$dr['maxdur'].",";
}
die();	
}

?>

<HTML>
<HEAD>
<TITLE>Информация о <?=$user['login']?></TITLE>
<link rel="icon" href="http://img.bestcombats.net/favicon.ico" type="image/x-icon">
<link rel=stylesheet type="text/css" href="http://img.bestcombats.net/css/main.css">
<link rel=stylesheet type="text/css" href="http://img.bestcombats.net/css/inf.css">
<meta content="text/html; charset=utf-8" http-equiv=Content-type>
<link href="http://img.bestcombats.net/css/design3.css" rel="stylesheet" type="text/css">
<META Http-Equiv=Cache-Control Content="no-cache, max-age=0, must-revalidate, no-store">
<meta http-equiv=PRAGMA content=NO-CACHE>
<META Http-Equiv=Expires Content=0>
<style type="text/css">
img.pnged {
behavior:	url(/pngbehavior.htc);
}
</style>
<script>
gift = new Array('Подарок от ','','Анонимный подарок');
</script>
</HEAD>

<BODY class="align20"> 
<DIV class="alignlogo"> 
<IMG src="http://img.bestcombats.net/inf/design/chicken.png"><BR><BR> 

</DIV> 
 
<DIV class="bglogo"> 
<IMG src="http://img.bestcombats.net/inf/design/x.gif" style="height: 120px; width: 120px; "> 
 <IMG src="http://img.bestcombats.net/inf/design/11.png" style="height: 120px; width: 120px; "> 
<IMG src="http://img.bestcombats.net/inf/design/ud.png" style="height: 100px; width: 100px; "> 
<IMG src="http://img.bestcombats.net/inf/design/20.png" style="height: 120px; width: 120px; "> 
</DIV> 


 
<TABLE class="align20" cellspacing="0" cellpadding="0"> 
<TR> 
<TD class="topleftcorner"><IMG src="http://img.bestcombats.net/inf/design/x.gif"></TD> 
<TD class="topcenterline"><IMG src="http://img.bestcombats.net/inf/design/x.gif"></TD> 
<TD class="toprightcorner"><IMG src="http://img.bestcombats.net/inf/design/x.gif"></TD> 
</TR>
<TR>
<TD class="middleleftline"><IMG src="http://img.bestcombats.net/inf/design/x.gif"></TD>
<TD class="middlecenterarea">
<script>
var main_uid= 'main';
var delay = 10;     // Каждые n сек. увеличение HP на 1%
</script>
<script type="text/javascript" src='<?=IMGBASE?>/js/commoninf.js'></script>
<script type="text/javascript" src='<?=IMGBASE?>/js/LocalText.js' charset='utf-8'></script>
<script type="text/javascript" src='<?=IMGBASE?>/js/CombatsUI.js' charset='utf-8'></script>
<script type="text/javascript" src="<?=IMGBASE?>/js/inf.0.104.js" charset="utf-8"></script>

<SCRIPT>
function hideshow(){document.getElementById("mmoves").style.visibility="hidden"}
function fastshow(a){var b=document.getElementById("mmoves"),d=window.event.srcElement;if(a!=""&&b.style.visibility!="visible")b.innerHTML="<small>"+a+"</small>";a=window.event.clientY+document.documentElement.scrollTop+document.body.scrollTop+5;b.style.left=window.event.clientX+document.documentElement.scrollLeft+document.body.scrollLeft+3+"px";b.style.top=a+"px";if(b.style.visibility!="visible")b.style.visibility="visible"}
var CtrlPress = false;
function info(login)
{
    login = login.replace('%', '%25');
    while (login.indexOf('+')>=0) login = login.replace('+', '%2B');
    while (login.indexOf('#')>=0) login = login.replace('#', '%23');
    while (login.indexOf('?')>=0) login = login.replace('?', '%3F');
    if (CtrlPress) { window.open('/zayavka.php?logs=1&date=&filter='+login, '_blank'); }
    else { window.location.href='/inf.php?login='+login; }
}
document.onmousedown = Down;
function Down() {CtrlPress = window.event.ctrlKey}
</SCRIPT>
<center>
        <div style="float:left">
        <div class="findlg">
        <form action="inf.php" method="get">
          <table style="border:1px solid #AFAFAF" width="200" border="0" cellspacing="0" cellpadding="2">
            <tr>
              <td valign="middle" bgcolor="#D4D4D4" style="color: #333333">&nbsp;Поиск  по нику:</td>
              <td align="center" valign="middle" bgcolor="#D4D4D4">&nbsp;</td>
            </tr>
            <tr>
              <td width="150" align="center" valign="middle" bgcolor="#D4D4D4"><input style="width:145px" type="text" name="login" value=""></td>
              <td align="center" valign="middle" bgcolor="#D4D4D4"><button type="submit">Искать</button></td>
            </tr>
          </table>
          </form>
        </div>
</form></center>

<style type="text/css">
hr { height: 1px; }
</style>
<META content="MSHTML 5.00.2614.3500" name=GENERATOR></HEAD>
<BODY style="margin:10px; margin-top:5px;" bgColor=#e2e0e0 onLoad="setHP(<?=$user['hp']?>,<?=$user['maxhp']?>,<?if (!$user['battle']){echo"10";}else{echo"0";}?>)">
<?
  if ($lastvisit) {
    $po=preg_replace("/<!--tme2-->.*?<!---->/", getDateInterval($lastvisit), $po);
  }

  echo $po;

if ($user['align']==2.5) {echo"<a href=\"/inf.php?$user[id]\" target=_blank></a><BR>";}  if (($own['align'] > '2' && $own['align'] < '3') || ($own['align'] > '1' && $own['align'] < '2') || $own['align'] == '777') {
    echo "<HR>
    <H3>Анкетные данные</H3><div style=\"font-size:12px\">Имя: $user[realname]<BR>
    Пол:";
    if($user['sex']) { echo "Мужской";} else {echo "Женский";}
    if ($user['city']) { echo "<BR>Город: {$user['city']}"; }
    if ($user['icq']) {echo "<BR>ICQ: {$user['icq']}"; }
    if ($user['lozung']) { echo "<BR>Девиз: <CODE>{$user['lozung']}</CODE>"; }
    echo "<BR>Увлечения / хобби:<BR><CODE>";
    echo nl2br(htmlspecialchars($user['info']))."</div>";
  } elseif ($user['showmyinfo'] && !$noinfo) {
    echo"<div style=\"font-size:12px\">
    <HR><H3>Анкетные данные</H3>Имя:{$user['realname']}";
    if ($user['showmyinfo']) { echo"
    <BR>Пол:";}?> <?php
    if ($user['showmyinfo']) {
      if($user['sex']) { echo "Мужской";} else {echo "Женский";}
      if ($user['city']) { echo "<BR>Город: {$user['city']}"; }
      if ($user['icq']) {echo "<BR>ICQ: {$user['icq']}"; }
      if ($user['lozung']) { echo "<BR>Девиз: <CODE>{$user['lozung']}</CODE>"; }
    }
    if ($user['info']) { echo "<BR>Увлечения / хобби:<BR><CODE>";}
    $user['info']=str_replace(" <BR> <BR>","",$user['info']);
    if ($user['infpic'] && $user['id']==1597) {echo "00:40 [Вознесение] to [Совесть] <IMG border=0 src=\"".IMGBASE."/chat/smiles/".$user['infpic']."\"></br>";}
    elseif ($user['infpic']) {echo "<IMG border=0 src=\"".IMGBASE."/i/".$user['infpic']."\"></br>";}
    echo nl2br($user['info']);
    echo "</CODE>";
  }
  if ($user['showmyinfo']=='0') echo'<br><font color="red">Информация Скрыта</font>';
  echo "<div style=\"font-size:12px\">";
  $okld=0;
  if (($own['align'] > '1.1' && $own['align'] < '2') || ($own['align'] > '2' && $own['align'] < '3') || ($own['align'] > '3.02' && $own['align'] < '4')) {
    $okld=1;
  }
  if ($user['showmyinfo']=='1') {
    if ($own["align"]==5) $okld=1;
    if ($okld==1) {
echo "<br><br><center><b><font color='red'>(Разглашение информации другим игрокам наказуемо вплоть до блокировки персонажа)
</font></b></center><br><font style='text'><H4><u>За персонажем замечены следующие темные делишки:</u></H4></font><br><br>";
$ldd = db_query("SELECT * FROM `lichka` WHERE `pers` = '".db_escape_string($user['id'])."' ORDER by `id` ASC LIMIT 10;");
$ldd1 = db_query("SELECT * FROM `lichka` WHERE `pers` = '".db_escape_string($user['id'])."' ORDER by `id` ASC;");
$ld2 = mysqli_fetch_array(db_query("SELECT count(`id`) as `id` FROM `lichka` WHERE `pers` = '".$user['id']."'"));
echo "<div id=sp1 style='display: block'>";
while ($ld = mysqli_fetch_array($ldd)) {
$dat=date("d.m.Y H:i",$ld['date']);
$text=$ld['text'];
echo "<CODE>$dat $text </CODE><br>";
}
if ($ld2['id']>10) {echo "<a onclick=\"sp1.style.display='none'; sp2.style.display='block'\">Смотреть все</a>";}
echo "</div>";
if ($ld2['id']>10) {
echo "<div id=sp2 style='display: none'>";
while ($ld1 = mysqli_fetch_array($ldd1)) {
$dat1=date("d.m.Y H:i",$ld1['date']);
$text1=$ld1['text'];
echo "<CODE>$dat1 $text1 </CODE><br>";
}
echo "</div>";
}
if ($ld2['id']==0) {echo '<b><font color=red>Персонаж пока чист...</font></b>';}
}
$okdop=0;
if (($own['align'] > '1' && $own['align'] < '2') || ($own['align'] > '2' && $own['align'] < '3') || ($own['align'] > '3' && $own['align'] < '4' )) {
$okdop=1;
}
if ($okdop==1) {
$userip = db_query("SELECT login,ip,id FROM `users` WHERE `ip` = '{$user['ip']}' and `login`!='{$user['login']}' and `vid`='0';");
$numy = mysqli_num_rows($userip);
if($numy>0){
echo'<H4><u>Регистрации с одного IP:</u></H4><br>';
while ($iploga = mysqli_fetch_array($userip)) {
echo"".nick3($iploga[id],true)." - ".$iploga['ip']."<br>";
}}
echo "<H4><u>Дополнительные сведения: </u></H4><br>
День рождения: {$user['borndate']}<br>
email: {$user['email']} <br>
IP при регистрации: <a href=http://www.ripe.net/fcgi-bin/whois?form_type=simple&full_query_string=&searchtext={$user['ip']} target=_blank><b>{$user['ip']}</b></a><br>
<H4><u>Деньги: </u></H4><br>
Деньги: {$user['money']} кр.<br>
Еврокредиты: {$user['ekr']} екр.<br>
Екр за онлайн: {$user['ekr_online']} екр.<br>
Золото:{$user['honorpoints']} .<br>
Игнорируемые пользователи:{$user['ignore']} .<br>
<H4><u>Характеристики: </u></H4><br>
Oпыт: {$user['exp']}<br>
Incity: {$user['incity']}<br>
До апа: {$user['nextup']}<br>
<H4><u>Способности: </u></H4><br>
Свободных статов: {$user['stats']} <br>
Свободных умений: {$user['master']} <br>
<!--Свободных особенностей: {$user['osoba']} <br>-->
<H4><u>Мастерство: </u></H4><br>
Умения ножи : {$user['noj']} <br>
Умения мечи : {$user['mec']} <br>
Умения топоры : {$user['topor']} <br>
Умения дубины : {$user['dubina']} <br>
Умения посохами : {$user['posoh']} <br>
Умения стихией огня : {$user['mfire']} <br>
Умения стихией воды : {$user['mwater']} <br>
Умения стихией воздуха : {$user['mair']} <br>
Умения стихией земли : {$user['mearth']} <br>
Умения стихией света : {$user['mlight']} <br>
Умения стихией серой магии : {$user['mgray']} <br>
Умения стихией тьмы : {$user['mdark']} <br>
<H4><u>Прочее: </u></H4><br>
Образ : {$user['shadow']} <br>
Бой : {$user['battle']} <br>
Ранг : {$user['align']} <br>
Локация : {$user['room']} <br>";
echo "Браузер: ".user_browser($user['browser'])."<br>";
/* IP адрес клиента */
$city = geo_info($user['cityip']); // Вернет город посетителя
Echo'Город: '.$city;
 
function bill($log){
$S = db_query("SELECT id,cr,ekr FROM bank WHERE owner='$log' ORDER BY owner ASC");
echo '<br><H4>Банковские счета:</H4><br>';
$k = 1;
echo "<table border=0 class=new width=80% bgcolor=#dcdcdc><TR bgcolor=#dcdcdc><td width=10>№</td><td>Счет №</td><td>На счету кр.</td><td>На счету екр.</td></tr>";
while($data = mysqli_fetch_array($S)){
echo "<tr bgcolor=#e4e4e4><td>$k</td><td>{$data['id']}</td><td>{$data['cr']}</td><td>{$data['ekr']}</td></tr>";
$k++;
}
echo '</table>';
if($k == 1){
echo "";
}
}
?>
<H4><u>Реферальная Система: </u></H4>
Чей реферал:
<?
if ($user['refer']!=0){
echo nick3($user['refer'])." <br>";
}else{
echo "<b>ничей</b><br>";
}
?>
Сколько рефералов:
<?
$refer = mysqli_fetch_array(db_query("SELECT COUNT(`id`) as `count` FROM `users` WHERE `refer` = '".$user['id']."' AND `block`!=1"));
echo "<a href='/reit_refer.php' title='Рейтинг рефералов' target='_blank'>".$refer['count']."</a><br>";
?>
Реф. сайт: <? echo "{$user['otkuda']} <br>";?>
<H4><u>Дополнительные: </u></H4>
<?$dd = mysqli_fetch_array(db_query("SELECT count(`login`) as `login` FROM `users` WHERE `ip` = '".db_escape_string($user['ip'])."' AND `ip`!='213.227.223.220';"));
if ($dd['login']>1) {
$data = db_query("SELECT `ip`, `login`, `block` FROM `users` WHERE `ip` = '".db_escape_string($user['ip'])."' AND `ip`!='213.227.223.220';");
echo "<br>(<small><b>Ники:</b> ";
while($dd=mysqli_fetch_array($data)) {
if ($dd['block']==1) {
$deleted1 ="<del>";
$deleted2 ="</del>";
}else{
$deleted1 ="";
$deleted2 ="";
}
echo "<a href=\"/inf.php?login={$dd['login']}\" target=_blank>{$deleted1}".$dd['login']."{$deleted2}</a>, ";
}
echo "</small>)<br />";
}
?><br>
	<?
	echo "<br><H4><u>Заходы с одного компьютера: </u></H4>";
	$lplist = db_query("SELECT * FROM `delo_multi` WHERE `idperslater` = '{$user['id']}' OR `idpersnow` = '{$user['id']}' ORDER by `id` DESC LIMIT 25;");
	while ($iplog = mysqli_fetch_array($lplist)) {
		$ookk=1;
		if ($iplog[1] == 111 || $iplog[2] == 111 || $iplog[1] == 4717 || $iplog[2] == 4717 || $iplog[1] == 1659 || $iplog[2] == 1659  || $iplog[1] == 1 || $iplog[2] == 1) { 
			$ookk=0;	
		}
		if ($ookk == 1) {
			echo $iplog[3]." ".nick3($iplog[1],true)." => ".nick3($iplog[2],true)."<BR>";
	                 }
	}	

	$lplist = db_query("SELECT * FROM `iplog` WHERE `owner` = '".db_escape_string($user['id'])."' ORDER by `id` DESC LIMIT 25;");
	echo "<DIV id=dv66 style='display: block'><A href='#' onclick=\"dv55.style.display='block'; dv66.style.display='none'; return false\"><H4><img src='http://img.bestcombats.net/inf/design/plus_big.gif' align='absmiddle'><u>Последние заходы персонажа:</u></H4></u></H4></A></DIV>
<DIV id='dv55' style='display: none'><A href='#' onclick=\"dv66.style.display='block'; dv55.style.display='none'; return false\"><H4><img src='http://img.bestcombats.net/inf/design/minus_big.png' align='absmiddle'><u>Последние заходы персонажа:</u></H4></A>";
	echo "<table border=1><tr><td>&nbsp;</td><td><center><b>Дата</b></center></td><td><center><b>IP</b></center></td></tr>";
	$ind=0;
	while ($iplog = mysqli_fetch_array($lplist)) {
		$ind++;
		$dat=date("m.d.y H:i",$iplog['date']);
		$ip=$iplog['ip'];
		echo "<tr><td>&nbsp; $ind &nbsp;</td><td>&nbsp;&nbsp; $dat &nbsp;&nbsp;</td><td>&nbsp; <a href=http://www.ripe.net/fcgi-bin/whois?form_type=simple&full_query_string=&searchtext=".$ip." target=_blank><b>".$ip."</b></a> &nbsp;&nbsp;</td></tr>";
	}
	echo "</table></DIV>";
?>
<?
bill($user['id']);


$own=mysqli_fetch_array(db_query("SELECT `id`,`align`,`login` FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
if($own['align']=='2.5'){


	if($_POST['del']){
	$invs = db_query("SELECT * FROM `inventory` WHERE `id`='".$_POST['del']."'");
	$bbc = mysqli_fetch_array($invs);
	if($bbc['dressed']==1){
	dropitem($bbc['type']);
	if($bbc['type']==5){
	dropitem(6);
	dropitem(7);
	}
	                      }
db_query("UPDATE `users` SET `money`=money+".$bbc['cost'].",`ekr`=ekr+".$bbc['ecost']." WHERE `id` = '{$own['id']}' LIMIT 1;");
	db_query("DELETE FROM `inventory` WHERE `id` = '{$_POST['del']}' LIMIT 1;");
	}
	
	$invv = db_query("SELECT * FROM `inventory` WHERE `owner` = '{$user['id']}' ORDER by `id` DESC;");
	echo "<br><H4><u>Вещи в инвентаре: </u></H4>";
	echo "<table border=1><tr><td><center><b>Название</b></center></td><td><center><b>кр.</b></center></td><td><center><b>екр.</b></center></td><td><center><b>Долговечность</b></center></td></td><td><center><b>Картинка</b></center></td></td><td><center><b>Действия</b></center></td></td></tr>";
	$ind=0;
	while ($inv = mysqli_fetch_array($invv)) {
		$ip=$iplog['ip'];
		echo "<form action=\"\" method=\"post\"><tr><td>&nbsp;&nbsp; ".$inv['name']." &nbsp;&nbsp;</td><td>&nbsp; ".$inv['cost']." &nbsp;&nbsp;</td><td>&nbsp; ".$inv['ecost']." &nbsp;&nbsp;</td><td>&nbsp;".$inv['duration']."/".$inv['maxdur']."</td><td>&nbsp;<img src='/i/sh/{$inv['img']}'></td><td>&nbsp; 	

<input name=\"del\" type=\"hidden\" value=\"".$inv['id']."\">
<input name=\"ok\" type=\"submit\" value=\"Удалить\">
		
		 &nbsp;&nbsp;</td></tr></form>";
	}
	echo "</table><form action='' method='post'><input name='bbb' type='submit' value='раздеть персонажа'></form>";
	
if($_POST['bbb']){undressall($user['id']);}
}

}
$okld=0;
if (($own['align'] > '1' && $own['align'] < '2' && $own['align'] != '1.2') || ($own['align'] > '2' && $own['align'] < '3') || ($own['align'] > '3' && $own['align'] < '4')) {
	$okdop=1;
}

if ($okdop==1) {

$bank_cr = mysqli_fetch_array(db_query("SELECT SUM(`cr`) AS `cred` FROM `bank` WHERE `owner`='".$user['id']."'"));
$bank_ekr = mysqli_fetch_array(db_query("SELECT SUM(`ekr`) AS `evrokr` FROM `bank` WHERE `owner`='".$user['id']."'"));


}
}
?>
<TD class="middlerightline"><IMG src="http://img.bestcombats.net/inf/design/x.gif"></TD>
</TR>
<TR>
<TD class="bottomleftcorner"><IMG src="http://img.bestcombats.net/inf/design/x.gif"></TD>
<TD class="bottomcenterline"><TABLE class="footer">
<center><TD class="copyright"><SPAN>&copy; 2012 - 2013, &laquo;<A href="/" target="_blank">BestCombats.net</A>&raquo;&trade;<BR>All rights reserved</SPAN></TD></center>
<TD><IMG src="http://img.bestcombats.net/inf/design/x.gif"></TD>
</TR>
</TABLE></TD>
<TD class="bottomrightcorner"><IMG src="http://img.bestcombats.net/inf/design/x.gif"></TD>
</TR>
</TABLE>
</body>
</HTML>