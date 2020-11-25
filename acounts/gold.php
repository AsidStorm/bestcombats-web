<?
session_start();
if ($_SESSION['uid'] == null) header("Location: index.php");
include "../connect.php";
include "../functions.php";
$user = mysqli_fetch_array(mq("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
$al = mysqli_fetch_array(mq("SELECT * FROM `aligns` WHERE `vip` = '1' LIMIT 1;"));
if ($user['vip']!= 3) die;
if ($user['battle'] != 0) { header('location: /fbattle.php');die();}
if (in_array($user["id"],$testusers)) define("ALLFREE",1);
else define("ALLFREE",0);
function expa ($str) {
$array = explode(";",$str);
for ($i = 0; $i<=count($array)-2;$i=$i+2) {
$rarray[$array[$i]] = $array[$i+1];
}
return $rarray;
}
?>
<HTML>
<HEAD>
<link rel=stylesheet type="text/css" href="<?=IMG_PATH?>/css/main.css">
<meta content="text/html; charset=windows-1251" http-equiv=Content-type>
<META Http-Equiv=Cache-Control Content="no-cache, max-age=0, must-revalidate, no-store">
<meta http-equiv=PRAGMA content=NO-CACHE>
<META Http-Equiv=Expires Content=0>
<SCRIPT>
var Hint3Name = '';
function runmagic1(title, magic, name){
document.all("hint3").innerHTML = '<table width=100% cellspacing=1 cellpadding=0 bgcolor=B1A993><tr><td align=center><B>'+title+'</td><td width=20 align=right valign=top style="cursor: hand" onclick="closehint3();"><BIG><BIG><B><IMG src="/i/clear.gif" width=13 height=13>&nbsp;</td></tr><tr><td colspan=2>'+
'<form action="vip.php" method=POST><table width=100% cellspacing=0 cellpadding=2 bgcolor=DDD5BF><tr><td colspan=2><INPUT TYPE=hidden name=sd4 value="<? echo @$user['id']; ?>"> <INPUT TYPE=hidden NAME="use" value="'+magic+'">'+
'Укажите логин персонажа:<small><BR>(можно щелкнуть по логину в чате)</TD></TR><TR><TD align=left><INPUT TYPE=text NAME="'+name+'">'+
'</TD><TD width=120><INPUT TYPE="image" src="<?=IMG_PATH?>/func/b__ok.gif"></TD></TR></TABLE></FORM></td></tr></table>';
document.all("hint3").style.visibility = "visible";
document.all("hint3").style.left = 500;
document.all("hint3").style.top = 100;
document.all(name).focus();
Hint3Name = name;
}
function closehint3(){
document.all("hint3").style.visibility="hidden";
Hint3Name='';
}
</SCRIPT>
<body leftmargin=5 topmargin=5 marginwidth=0 marginheight=0 bgcolor=#e2e0e0 >
<table align=right><tr><td><INPUT TYPE="button" class=btn onclick="location.href='vip.php';" value="Обновить" title="Обновить"> 
<INPUT TYPE="button" class=btn onclick="location.href='../main.php';" value="Вернуться" title="Вернуться"></table>
<h3>Platinum Account</h3>
</HEAD>
<?
####Смена Логина####
echo "<form method=post><fieldset><legend>Смена имени</legend>
<table>
<tr><td>Новый логин</td><td><input type='text' name='new-login'> </td></tr>
<tr><td><input type=submit value='Изменить'></td></tr></table></fieldset></form>";			
if (isset($_POST['new-login'])) {
$target_user_tel=mysqli_fetch_array(db_query("SELECT `id`,`login` FROM `users` WHERE `login` = '".db_escape_string($_POST['new-login'])."';"));
If (!empty($target_user_tel['id'])){
echo"<font color=red>Логин &quot;".$_POST['new-login']."&quot; Занят!</font><br>";
}elseif (!ereg("^[a-zA-Zа-яА-Я0-9][a-zA-Zа-яА-Я0-9_ -]+[a-zA-Zа-яА-Я0-9]$",$_POST['new-login'])){
echo"<font color=red>В логине присутствуют запрещенные символы</font><br>";
}elseif (strlen($_POST['new-login'])<4 || strlen($_POST['new-login'])>20){
echo"<font color=red>Логин может содержать от 4 до 20 символов.</font><br>";
}elseif (ereg("[a-zA-Z]",$_POST['login']) && ereg("[а-яА-Я]",$_POST['login'])){
echo"<font color=red>Логин не может содержать одновременно буквы русского и латинского алфавитов!</font><br>";
}else{
db_query("UPDATE `users` SET `login` = '".db_escape_string($_POST['new-login'])."',`loginhistory`=concat(`loginhistory`,';".$user['login']."||".date('d-m-Y')."') WHERE `id` = '".$user['id']."';");
echo"<font color=red>Вы изменили логин!</font><br>";
}
}
##### Добавление образа #####	
echo "<form  method='post' ENCTYPE='multipart/form-data'><fieldset><legend>Добавление образа персонажу</legend>
<table><tr><td>Картинка: </td><td><input type='file' name='shadow_file'><BR> </td></tr>
<tr><td><input type=submit value='Загрузить'></td></tr>
</table></fieldset></form>";					
				
if (isset($_FILES['shadow_file'])) {
$image_info = GetImageSize($_FILES['shadow_file']['tmp_name']);
$path = '/var/www/bestcombats/data/www/img.bestcombats.net/shadow/"'.$user['sex'].'"/upload/"'.$user['id'].'".gif';
if ($image_info[0]==120 and $image_info[1]==220){
if (file_exists($path)) unlink($path);
move_uploaded_file($_FILES['shadow_file']['tmp_name'], '/var/www/bestcombats/data/www/img.bestcombats.net/shadow/'.$user['sex'].'/upload/'.$user['id'].".gif");
db_query("UPDATE `users` SET `shadow`='upload/".$user['id'].".gif' WHERE `id` = '".$user['id']."';");
echo"<font color=red>Вы установили образ!</font>";
die("<script>top.window.location='/battle.php';</script>");
}else{
echo"<font color=red>Файл не соотвествует размеру 120 на 220 пикселей</font>";
}
}
##### Сброс статов #####			
echo "<form method=post><fieldset><legend>Сброс Параметров</legend>
<input type=submit name='sbros' value='Сбросить'>";
echo "</fieldset></form>";
			
if (isset($_POST['sbros'])) {
include "../config/expstats.php";
if (!file_exists(MEMCACHE_PATH.'/par'.$_SESSION['uid']) || ALLFREE) {
$levelstats=statsat($user['nextup']);
undressall($user['id']);
mq("UPDATE `users` SET `stats` = '".($levelstats['stats']-9)."'+'".$user[extrastats].".', `sila`= '3',`lovk`= '3',`inta`= '3',`mudra`= '0',`intel`= '0',`spirit`= '".$levelstats["spirit"]."', sexy= '0',`vinos`= '".$levelstats["vinos"]."',`maxhp`= '".$levelstats["vinos"]."'*6,`maxmana`= '0',`mana`= '0' WHERE `id`='$user[id]' LIMIT 1;");
mq("UPDATE `userdata` SET `stats` = '".($levelstats['stats']-9)."'+'".$user[extrastats]."', `sila`= '3',`lovk`= '3',`inta`= '3',`mudra`= '0',`intel`= '0',`spirit`= '".$levelstats["spirit"]."', `sexy` = '0',`vinos`= '".$levelstats["vinos"]."' WHERE `id`='$user[id]' LIMIT 1");
echo db_error();
fixstats($user["id"]);
mq("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','{$_SESSION['uid']}','\"".$user['login']."\" бесплатно сбросил параметры в Комнате Знахаря. ',1,'".time()."');");
echo "<font color=red>Все прошло удачно. Вы можете перераспределить параметры.</font>";
if (!ALLFREE) {
$flum=fopen(MEMCACHE_PATH.'/par'.$_SESSION['uid'],'w');
fwrite($flum,date('Y-m-d H:i:s'));
fclose($flum);
}
} else {
if ($user['money']<50) echo "<font color=red><b>Недостаточно кредитов для совершения операции!</b></font>";
else {
$levelstats=statsat($user['nextup']);
if (!ALLFREE) {
mq("update users set money=money-50 where id='$user[id]'");
$user["money"]-=50;
}
undressall($user['id']);
mq("UPDATE `users` SET `stats` = ".($levelstats['stats']-9)."+$user[extrastats], `sila`=3,`lovk`=3,`inta`=3,`mudra`=0,`intel`=0,`spirit`= ".$levelstats["spirit"].", sexy=0,`vinos`= ".$levelstats["vinos"].",`maxhp`= ".$levelstats["vinos"]."*6,`maxmana`= 0,`mana`= 0 WHERE `id`='$user[id]' LIMIT 1");
mq("UPDATE `userdata` SET `stats` = ".($levelstats['stats']-9)."+$user[extrastats], `sila`=3,`lovk`=3,`inta`=3,`mudra`=0,`intel`=0,`spirit`= ".$levelstats["spirit"].", sexy=0,`vinos`= ".$levelstats["vinos"]." WHERE `id`='$user[id]' LIMIT 1");
fixstats($user["id"]);
mq("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','{$_SESSION['uid']}','\"".$user['login']."\" сбросил параметры, заплатив 50 кр. в Комнате Знахаря ($user[money]/$user[ekr]). ',1,'".time()."');");
echo "<font color=red>Все прошло удачно. Вы можете перераспределить параметры.</font>";
}
}
resetmax($user["id"]);
}
##### Сброс умений #####			
echo "<form method=post><fieldset><legend>Сброс умений</legend>
<input type=submit name='sbrosum' value='Сбросить'>";
echo "</fieldset></form>";
			
if (isset($_POST['sbrosum'])) {
if (($user['b_noj']+$user['b_mec']+$user['b_topor']+$user['b_dubina']+$user['b_posoh']+$user['b_mfire']+$user['b_mwater']+$user['b_mair']+$user['b_mearth']+$user['b_mlight']+$user['b_mgray']+$user['b_mdark'])==0) echo "<font color=red><b>У Вас нет нераспределённых умений!</b></font>";
}
elseif (!file_exists(MEMCACHE_PATH.'/uml'.$_SESSION['uid']) || ALLFREE) {
$levelstats=statsat($user["nextup"]);    
if (mq("UPDATE `users` SET `master`=$levelstats[master]+$user[extramaster],noj=0,mec=0,topor=0,dubina=0,posoh=0, luk=0, mfire=0, mwater=0, mair=0, mearth=0, mlight=0, mgray=0, mdark=0 WHERE `id`='$user[id]'")) {
mq("UPDATE `userdata` SET `master`=$levelstats[master]+$user[extramaster],noj=0,mec=0,topor=0,dubina=0,posoh=0, luk=0, mfire=0, mwater=0, mair=0, mearth=0, mlight=0, mgray=0, mdark=0 WHERE `id`='$user[id]'");
fixstats($user["id"]);
mq("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','{$_SESSION['uid']}','\"".$user['login']."\" бесплатно перераспределил умения в Комнате Знахаря. ',1,'".time()."');");
echo "<font color=red>Все прошло удачно. Вы можете перераспределить умения.</font>";
if (!ALLFREE) {
$flum=fopen(MEMCACHE_PATH.'/uml'.$_SESSION['uid'],'w');
fwrite($flum,date('Y-m-d H:i:s'));
fclose($flum);
}
}
else echo "<font color=red>Произошла ошибка!</font>";
} else {
if ($user['money']<32) echo "<font color=red><b>Недостаточно кредитов для совершения операции!</b></font>";
else {
$levelstats=statsat($user["nextup"]);                        
if (mq("UPDATE `users` SET ".(ALLFREE?"":"money=money-32,")." `master`=$levelstats[master]+$user[extramaster],noj=0,mec=0,topor=0,dubina=0,posoh=0, luk=0, mfire=0, mwater=0, mair=0, mearth=0, mlight=0, mgray=0, mdark=0 WHERE `id`='$user[id]'")) {
mq("UPDATE `userdata` SET `master`=$levelstats[master]+$user[extramaster],noj=0,mec=0,topor=0,dubina=0,posoh=0, luk=0, mfire=0, mwater=0, mair=0, mearth=0, mlight=0, mgray=0, mdark=0 WHERE `id`='$user[id]'");
fixstats($user["id"]);
if (!ALLFREE) $user["money"]-=32;
db_query("INSERT INTO `delo`(`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','{$_SESSION['uid']}','\"".$user['login']."\" перераспределил умения, заплатив 32 кр. в Комнате Знахаря ($user[money]/$user[ekr]). ',1,'".time()."');");
echo "<font color=red>Все прошло удачно. Вы можете перераспределить умения.</font>";
} else echo "<font color=red>Произошла ошибка!</font>";
}
}
###################################################
echo "<div align=center id=hint3></div>";
$moj = expa($al['accses']);
if(!$_POST['use']){$_POST['use']=$_GET['use'];}
if(in_array($_POST['use'],array_keys($moj))) {
echo htmlspecialchars($_GET['use']);
switch($_POST['use']) {
case "devastate":
include("../magic/vip/devastate.php");
break;
case "defence":
include("../magic/vip/defence.php");
break;
case "power_hp6":
include("../magic/vip/power_hp6.php");
break;
case "blago":
include("../magic/vip/blago_admin.php");
break;
case "battack":
include("../magic/vip/battack.php");
break;
case "hidden":
include("../magic/vip/hidden.php");
break;
}
}
echo "<table>";
echo "<tr><td align=center><br>";
foreach($moj as $k => $v) {
switch($k) {
case "defence": $script_name="runmagic1"; $magic_name="Защита от Оружия"; break;
case "power_hp6": $script_name="runmagic1"; $magic_name="Жажда Жизни+6"; break;
case "devastate": $script_name="runmagic1"; $magic_name="Сокрушение"; break;
case "blago": $script_name="runmagic1"; $magic_name="Благословление Ангела"; break;
case "battack": $script_name="runmagic1"; $magic_name="Кровавое нападение"; break;
case "hidden": $script_name="runmagic1"; $magic_name="Невидимость"; break;
}
if ($script_name) {print "<a onclick=\"javascript:$script_name('$magic_name','$k','target','target1') \" href='#'><img src='http://bestcombats.net/i/magic/".$k.".gif' title='".$magic_name."'></a> ";}
}
		echo "</td></tr></table>";
?>
</html>