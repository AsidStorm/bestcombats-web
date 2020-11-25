<?php
session_start();
include "connect.php";
include "functions.php";
$user = mysql_fetch_array(mq("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
if(!$_POST['ref']){
$ref = $_GET['ref'];}else{$ref = $_POST['ref'];}
if (!ereg("^[0-9]+$",$ref)){$ref=0;}
if(!empty($ref)){$s_ref = mysql_fetch_array(mq("SELECT id FROM `users` WHERE `id`='$ref';"));
if(!$s_ref){$ref=0;}
}

$_POST['hobby']=str_replace("\\r","",$_POST['hobby']);


if ($_GET['edit']) {
  getfeatures($user);
  if ($_SESSION['uid'] == null) header("Location: index.php");
  $maxlen=$user["sociable"]*200+1000;
} else $maxlen=1000;

if (strlen($_POST["hobby"])>$maxlen) $_POST["hobby"]=substr($_POST["hobby"], 0, $maxlen);

if ($_POST['end'] != null) header("Location: main.php");

if ($_POST['add'] && $_GET['edit']) {
    if ($_POST['name']==null) {
                    $err .= "Введите имя! ";
                    $stop =1;
    }
    elseif ( ! ($_POST['ChatColor'] == "Black" || $_POST['ChatColor'] == "Blue" || $_POST['ChatColor'] == "#8700e4" ||  $_POST['ChatColor'] == "Fuchsia" || $_POST['ChatColor'] == "Gray" || $_POST['ChatColor'] == "Green" || $_POST['ChatColor'] == "Maroon" || $_POST['ChatColor'] == "Navy" || $_POST['ChatColor'] == "Olive" || $_POST['ChatColor'] == "Purple" || $_POST['ChatColor'] == "Teal" ||  $_POST['ChatColor'] == "Orange" ||  $_POST['ChatColor'] == "Chocolate" || $_POST['ChatColor'] == "DarkKhaki")) {
                    $err .= "Возможно использовать только цвета указанные в меню анкеты ! ";
                    $_POST['ChatColor'] = "Black";
    }
      if($stop!=1) {
      $_POST['hobby']=str_replace("&lt;BR&gt;","<BR>",$_POST['hobby']);
      if (haslinks("$_POST[city2] $_POST[icq] $_POST[name] $_POST[hobby] $_POST[about]")) {
       $f=fopen("logs/autosleep.txt","ab");
       fwrite($f, "$user[login]: $_POST[city2] $_POST[icq] $_POST[hobby] $_POST[about]\r\n");
       fclose($f);

       mq("INSERT INTO `effects` (`owner`,`name`,`time`,`type`) values ('$user[id]','Заклятие молчания',".(time()+3600).",2);");
       reportadms("<br><b>$user[login]</b>: спам в инфе", "Комментатор");
       addch("<img src=http://img.bestcombats.net/pbuttons/sleep.gif> Комментатор наложил заклятие молчания на &quot;$user[login]&quot;, сроком 60 мин. Причина: РВС.");
     }
     mq("UPDATE `users` SET  `city` = '".mysql_real_escape_string($_POST['city2'])."', `icq` = '".mysql_real_escape_string($_POST['icq'])."',
                 `http` = '".mysql_real_escape_string($_POST['homepage'])."', `info` = '".$_POST['hobby']."', `lozung` = '".mysql_real_escape_string($_POST['about'])."',
                 `color` = '".mysql_real_escape_string($_POST['ChatColor'])."', `realname` = '".mysql_real_escape_string($_POST['name'])."' WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;");
     $user = mysql_fetch_array(mq("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
    }
}
if ($_POST['add'] && !$_GET['edit']) {

                $stop =0;
                $login=$_POST['login'];
                $res = mysql_fetch_array(mq("SELECT `id` FROM `users` WHERE `login` = '".$login."' union SELECT `id` FROM `allusers` WHERE `login` = '".$login."'"));
                $birth_day=(int)$_POST['birth_day'];
                $birth_month=(int)$_POST['birth_month'];
                $birth_year=(int)$_POST['birth_year'];

		if ($_COOKIE["mailru"] != null) {
		    $stop =1;
		   $err .= "Вы превысили число регистраций за сутки!";
                }elseif ($_POST['login']==null) {
                    $err .= "Введите имя персонажа! ";
                    $stop =1;
                }
                elseif ($res['id']!= null || hasbad($login) || strpos($login, "легия")!==false || strpos(strtolower($login), "ellegia")!==false) {
                    $err .= "К сожалению персонаж с ником <B>$login</B> уже зарегистрирован.";
                    $stop =1;
                }
                elseif (strtoupper($_POST['login'])==strtoupper("невидимка") ||  strtoupper($_POST['login'])==strtoupper("мусорщик") || strtoupper($_POST['login'])==strtoupper("мироздатель") || strtoupper($_POST['login'])==strtoupper("архивариус") || strtoupper($_POST['login'])==strtoupper("Благодать") || strtoupper($_POST['login'])==strtoupper("Merlin") || strtoupper($_POST['login'])==strtoupper("Коментатор")) {
                    $err .= "Регистрация персонажа с ником <B>$login</B> запрещена! ";
                    $stop =1;
                }
                elseif (strlen($_POST['login'])<4 || strlen($_POST['login'])>20 || !ereg("^[a-zA-Zа-яА-Я0-9][a-zA-Zа-яА-Я0-9_ -]+[a-zA-Zа-яА-Я0-9]$",$_POST['login']) || preg_match("/__/",$_POST['login']) || preg_match("/--/",$_POST['login']) || preg_match("/  /",$_POST['login']) || preg_match("/(.)\\1\\1\\1/",$_POST['login']))
                    {
                    $err .= "Логин может содержать от 4 до 20 символов, и состоять только из букв русского или английского алфавита, цифр, символов '_',  '-' и пробела. <br>Логин не может начинаться или заканчиваться символами '_', '-' или пробелом<br>Также в логине не должно присутствовать подряд более 1 символа '_' или '-' и более 1 пробела, а также более 3-х других одинаковых символов.";
                    $stop =1;
                }
                elseif (ereg("[a-zA-Z]",$_POST['login']) && ereg("[а-яА-Я]",$_POST['login'])) {
                    $err .= "Логин не может содержать одновременно буквы русского и латинского алфавитов!";
                    $stop =1;
                }
                elseif (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)+$",$_POST['email'])) {
                    $err .= "Неверный формат почты! ";
                    $stop =1;
                }
### Проверяем пароль
    if ($_POST['pass'] != $_POST['pass2']) {
        $error .= '<li>Введенные пароли не совпадают</li>';
        $fail = 1;
    } elseif (strlen($_POST['pass']) < 6) {
        $error .= '<li>Пароль не может быть короче 6 символов</li>';
        $fail = 1;
    } elseif (strlen($_POST['pass']) > 21) {
        $error .= '<li>Пароль не может быть длиннее 21 символа</li>';
        $fail = 1;
    }

###
                if ($_POST['name']==null || strlen($_POST['name']) > 30) {
                    $err .= "Не указано ваше реальное имя, или оно больше 30 символов! ";
                    $stop =1;
                }
                elseif ($_POST['birth_day']<1 || $_POST['birth_day']>31) {
                    $err .= "Укажите дату рождения! ";
                    $stop =1;
                }
                elseif ($_POST['birth_month']<1 || $_POST['birth_month']>12) {
                    $err .= "Укажите месяц рождения! ";
                    $stop =1;
                }
                elseif ($_POST['birth_year']<1940 || $_POST['birth_year']>2000) {
                    $err .= "Укажите год рождения! ";
                    $stop =1;
                }
                elseif ($_POST['sex'] != "0" && $_POST['sex'] != "1") {
                    $err .= "Укажите ваш пол! ";
                    $stop =1;
                }
                elseif ( ! ($_POST['ChatColor'] == "Black" || $_POST['ChatColor'] == "Blue" || $_POST['ChatColor'] == "#8700e4" || $_POST['ChatColor'] == "Fuchsia" || $_POST['ChatColor'] == "Gray" || $_POST['ChatColor'] == "Green" || $_POST['ChatColor'] == "Maroon" || $_POST['ChatColor'] == "Navy" || $_POST['ChatColor'] == "Olive" || $_POST['ChatColor'] == "Purple" || $_POST['ChatColor'] == "Teal" ||  $_POST['ChatColor'] == "Orange" ||  $_POST['ChatColor'] == "Chocolate" || $_POST['ChatColor'] == "DarkKhaki")) {
                    $err .= "Возможно использовать только цвета указанные в меню анкеты ! ";
                    $stop =1;
                }
                elseif ($_POST['Law']==null) {
                    $err .= "Вы не указали ваше согласие с законами BK-2! ";
                    $stop =1;
                }
                elseif (isset($_POST['securityCode']) && isset($_SESSION['securityCode'])) {
                if (strtolower($_POST['securityCode']) == $_SESSION['securityCode']) {
				unset($_SESSION['securityCode']);
				}
				else{
					$stop =1;
					$err .= "Неверный защитный код ! ";
				unset($_SESSION['securityCode']);
					}
				}
				elseif (!isset($_POST['securityCode']) || !isset($_SESSION['securityCode'])) {
					$stop =1;
					$err .= "Вы не ввели защитный код ! ";
				}
                if($stop!=1) {
                    $_POST['hobby']=str_replace("&lt;BR&gt;","<BR>",$_POST['hobby']);
                    if ($birth_month < 10)  {$birth_month = "0".$birth_month;}
                    $birthday=$birth_day."-".$birth_month."-".$birth_year;
           
                    if(mq("INSERT INTO `users` (`borncity`,`login`,`pass`,`email`,`realname`,`borndate`,`sex`,`city`,`icq`,`http`,`info`,`lozung`,`color`,`ip`,`showmyinfo`,`refer`,`vip`)VALUES('Devils City','".mysql_real_escape_string($_POST['login'])."','".md5($_POST['psw'])."','".mysql_real_escape_string($_POST['email'])."','".mysql_real_escape_string($_POST['name'])."','$birthday','".mysql_real_escape_string($_POST['sex'])."','".mysql_real_escape_string($_POST['city2'])."','".mysql_real_escape_string($_POST['icq'])."','".mysql_real_escape_string($_POST['homepage'])."','".mysql_real_escape_string($_POST['hobby'])."','".mysql_real_escape_string($_POST['about'])."','".mysql_real_escape_string($_POST['ChatColor'])."','".$_SERVER['REMOTE_ADDR']."','1','$ref','1');")) {
                      $i = mysql_insert_id();
                      mq("insert into userdata (id) values($i)");
                      if ($_SESSION["spammer"]) {
                        reportadms("Зарегистрирован новый возможно спамер: <b>$_POST[login]</b>");
                      }
                        $f=fopen("chardata/$i.dat", "wb+");
                        fclose($f);

                        resetmax($i);

                        if (haslinks("$_POST[city2] $_POST[icq] $_POST[name] $_POST[hobby] $_POST[about]")) {
                          $f=fopen("logs/autosleep.txt","ab");
                          fwrite($f, "$_POST[login]: $_POST[city2] $_POST[icq] $_POST[hobby] $_POST[about]\r\n");
                          fclose($f);

                          mq("INSERT INTO `effects` (`owner`,`name`,`time`,`type`) values ('$i','Заклятие молчания',".(time()+3600).",2);");
                          reportadms("<br><b>$_POST[login]</b>: спам в инфе</font>", "Комментатор");
                        }
//Ставим лимит на регистрацию
setcookie("mailru", "enter", time()+86400);
//добавляем вещи в инвентарь
mq("INSERT INTO `inventory` (`owner`,`ghp`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`present`)
VALUES('".$i."','3','Рубашка','6','0.5','1','roba1.gif','30','Мироздатель') ;");
mq("INSERT INTO `inventory` (`owner`,`bron3`,`bron4`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`present`)
VALUES('".$i."','1','1','Штаны Падальщика','24','0.5','1','leg1.gif','30','Мироздатель') ;");
mq("INSERT INTO `inventory` (`owner`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`present`,`magic`,`otdel`,`isrep`)
VALUES('".$i."','Зелье Жизни','188','1','0','pot_cureHP100_20.gif','20','Мироздатель','189','6','0') ;");
///Надеваем приемы
mq("INSERT INTO puton(id_person,id_thing,slot) VALUES ('".$i."','158','201');");
mq("INSERT INTO puton(id_person,id_thing,slot) VALUES ('".$i."','159','202');");
mq("INSERT INTO puton(id_person,id_thing,slot) VALUES ('".$i."','164','203');");
//Форумка при регистрации
mq("INSERT INTO `effects` (`owner`,`name`,`time`,`type`) values ('$i','Заклятие форумного молчания',".(time()+86400).",3);");
//Заносим эффект сильвер аккаунта
mq("INSERT INTO `effects` (`owner`,`name`,`time`,`type`) values ('$i','Silver Account',".(time()+259200).",70);");
//
mq("INSERT INTO `online` (`id` ,`date` ,`room`)VALUES ('".$i."', '".time()."', '1');");
if(!empty($ref)){
        $us = mysql_fetch_array(mq("select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = '{$ref}' LIMIT 1;"));
                if($us[0]){
        addchp ('<font color=red>Внимание!</font> <font color=\"Black\">Персонаж <B>'.$_POST['login'].'</B> зарегистрировался по Вашей ссылке. Вам будет перечислена премия за каждый набранный им уровень кроме первого.</font>   ','{[]}'.nick7 ($ref).'{[]}');
            } else {
        mq("INSERT INTO `telegraph` (`owner`,`date`,`text`) values ('".$ref."','','".'<font color=red>Внимание!</font> <font color=\"Black\">Персонаж <B>'.$_POST['login'].'</B> зарегистрировался по Вашей ссылке. Вам будет перечислена премия за каждый набранный им уровень кроме первого.</font> '."');");
            }
            echo mysql_error();





                        }
                        session_start();
                        setcookie("battle", $i);
                        $_SESSION['uid'] = $i;
                        //заносим данные текушего времени для получения екр за онлайн
                        $_SESSION['ekr_online'] = time();
                        mq("UPDATE `users` SET `sid` = '".session_id()."', `browser` = '".$_SERVER['HTTP_USER_AGENT']."' WHERE `id` = {$i};");
                        $_SESSION['sid'] = session_id();
                        //Системка Паладинам:))
                        addchp ('private [pal] private [tar] Внимание! Замечен новый новобранец <a href=javascript:top.AddTo("'.$_POST["login"].'")><span oncontextmenu="OpenMenu()">'.$_POST["login"].'</span></a>!',"Комментатор", 1);
                        //Системка в общий чат
                        addchp ('Внимание! Замечен новый новобранец <a href=javascript:top.AddTo("'.$_POST["login"].'")><span oncontextmenu="OpenMenu()">'.$_POST["login"].'</span></a>! Администрация проекта и старшие уровни желают великих побед и приятного общения!',"Комментатор", 1);
                        //Приват новичку
                        addchp ('private ['.$_POST["login"].'] Поздравляем вас с успешной регистрацией на сайте BetscombatS в качестве бонуса мы подарили вам Silver Account на три дня. Приятной игры и великих побед. Спасибо что вы с нами !!',"Комментатор", 1);
                        header("Location: battle.php");
                        die();
                    }
                }

}
                ?>
<HTML><HEAD><TITLE>BestcombatS</TITLE>
<META content="text/html; charset=windows-1251" http-equiv=Content-type>
<link rel=stylesheet type="text/css" href="http://img.bestcombats.net/reg/css/reg.css">
<link rel=stylesheet type="text/css" href="http://img.bestcombats.net/css/main.css">
<link rel="icon" href="http://img.bestcombats.net/favicon.ico" type="image/x-icon">
<script type="text/javascript" src="http://img.bestcombats.net/reg/js/jquery-1.5.1.min.js"></script>
<meta http-equiv=PRAGMA content=NO-CACHE>
<META Http-Equiv=Expires Content=0>
<script>
    if (document.all && document.all.item && !window.opera && !document.layers) {
    } else {
    }
</script>
<script type="text/javascript">

var login,
	email,
	password,
	password2,
	loginStat,
	emailStat,
	passwordStat,
	password2Stat;

$(function() {
	//Логин
	$("#login").change(function(){
		login = $("#login").val();
		var expLogin = /^[a-zA-Z0-9_]+$/g;
		var resLogin = login.search(expLogin);
		if(resLogin == -1){
			$("#login").next().hide().text("Неверный логин").css("color","red").fadeIn(400);
			$("#login").removeClass().addClass("inputRed");
			loginStat = 0;
			buttonOnAndOff();
		}else{
			$.ajax({
			url: "testingLoginEmail.php",
			type: "GET",
			data: "login=" + login,
			cache: false,
			success: function(response){
				if(response == "no"){
					$("#login").next().hide().text("Логин занят").css("color","red").fadeIn(400);
					$("#login").removeClass().addClass("inputRed");					
				}else{					
					$("#login").removeClass().addClass("inputGreen");
					$("#login").next().text("");
				}			
				
			}
		});
			loginStat = 1;
			buttonOnAndOff();
		}
		
	});
	$("#login").keyup(function(){
		$("#login").removeClass();
		$("#login").next().text("");
	});
	
	// Email
	$("#email").change(function(){
		email = $("#email").val();
		var expEmail = /[-0-9a-z_]+@[-0-9a-z_]+\.[a-z]{2,6}/i;
		var resEmail = email.search(expEmail);
		if(resEmail == -1){
			$("#email").next().hide().text("Неверный формат Email").css("color","red").fadeIn(400);
			$("#email").removeClass().addClass("inputRed");
			emailStat = 0;
			buttonOnAndOff();
		}else{
			
			$.ajax({
			url: "testingLoginEmail.php",
			type: "GET",
			data: "email=" + email,
			cache: false,			
			success: function(response){
				if(response == "no"){
					$("#email").next().hide().text("Email Занят").css("color","red").fadeIn(400);
					$("#email").removeClass().addClass("inputRed");					
				}else{					
					$("#email").removeClass().addClass("inputGreen");
					$("#email").next().text("");
				}					
			}
		});
			emailStat = 1;
			buttonOnAndOff();
		}
		
	});	
	$("#email").keyup(function(){
		$("#email").removeClass();
		$("#email").next().text("");
	});	
	
	
	//Пароль
	$("#password").change(function(){
		password = $("#password").val();
		if(password.length < 6){
			$("#password").next().hide().text("Слишком короткий пароль").css("color","red").fadeIn(400);
			$("#password").removeClass().addClass("inputRed");
			passwordStat = 0;
			buttonOnAndOff();
		}else{
			$("#password").removeClass().addClass("inputGreen");
			$("#password").next().text("");
			passwordStat = 1;
			buttonOnAndOff();
		}		
	});
	$("#password").keyup(function(){
		$("#password").removeClass();
		$("#password").next().text("");
	});
	
	//Проверка пароля
	$("#password2").change(function(){
		if(password2 != password){
			$("#password2").next().hide().text("Пароли не совпадают").css("color","red").fadeIn(400);
			$("#password2").removeClass().addClass("inputRed");
			password2Stat = 0;
			buttonOnAndOff();
		}else{
			$("#password2").removeClass().addClass("inputGreen");
			$("#password2").next().text("");
		}		
	});
	$("#password2").keyup(function(){
		password2 = $("#password2").val();
		if(password2 == password){
			password2Stat = 1;
			buttonOnAndOff();
		}else{
			password2Stat = 0;
			buttonOnAndOff();
		}
	});
	
	function buttonOnAndOff(){
		if(emailStat == 1 && passwordStat == 1 && password2Stat == 1 && loginStat == 1){
			$("#submit").removeAttr("disabled");
		}else{
			$("#submit").attr("disabled","disabled");
		}
	
	}
	
});
</script>
</HEAD>
<BODY aLink=#000000 bgColor=#000000 leftMargin=0 link=#000000 topMargin=0
vLink=#333333 marginheight="0" marginwidth="0" 0>
      <TABLE background="http://img.bestcombats.net/reg/regbg.jpg" width=990 align="center" cellPadding=0 cellSpacing=0><TBODY>
        <TR>
          <TD style="padding:200px 270px 0px 180px" height="1050" vAlign=top>
          <div qstyle="position:relative">

            <BR><!-- Begin of text -->
            <TABLE border=0 cellPadding=2 cellSpacing=0 name="F1">
              <FORM action="register.php?u=<?=$_GET['u']?><?=($_GET['edit'])?"&edit=1":""?>" method=post>
              <TBODY>
              <TR>
                <TD colSpan=2><FONT color=red><B><?=$err?><!--error--></FONT></B></TD></TR>
              <TR>
                <TD vAlign=top><FONT color=red>*</FONT></TD>
                <TD>Имя вашего персонажа (login): <INPUT maxLength=60
                  name=login maxLength=20 id=login size=20 <?=($_GET['edit'])?" disabled ":""?> value="<?=($_GET['edit'])?"{$user['login']}":"{$_POST['login']}"?>"><span></span><BR><SMALL><FONT color=<?
                  if ($badlogin) echo "#ff0000 style=\"font-weight:bold\""; else echo "#364875";
                  ?>>
                  Логин может содержать от 4 до 20 символов, и состоять только из букв русского ИЛИ английского алфавита, цифр, символов '_',  '-' и пробела. <br>Логин не может начинаться или заканчиваться символами '_', '-' или пробелом<br>Также в логине не должно присутствовать подряд более 1 символа '_' или '-' и более 1 пробела, а также более 3-х других одинаковых символов
</FONT></SMALL></TD></TR><!--/email-->
              <TR>
                <TD vAlign=top><FONT color=red>*</FONT></TD>
                <TD>Ваш e-mail: <INPUT maxLength=50 size=50 id=email name=email value="<?=($_GET['edit'])?"{$user['email']}":"{$_POST['email']}"?>" <?=($_GET['edit'])?" disabled ":""?>>
                  <span></span><BR><SMALL><FONT color=#364875>Используется <U>только</U> для
                  напоминания пароля, нигде не отображается и не используется
                  для рассылки "уведомлений/обновлений/..." и прочего
                  спама.</FONT></SMALL></TD></TR><!--email/--><!--/psw-->
              <TR>
                <TD vAlign=top><FONT color=red>*</FONT></TD>
                <TD>Пароль: <INPUT maxLength=21 name=psw size=15 id=pass type=password
                <?=($_GET['edit'])?" disabled ":""?> value="<?=($_GET['edit'])?"******":""?>"> &nbsp; <FONT color=red>*</FONT> Пароль
                  повторно: <INPUT maxLength=21 name=psw2 size=15
                  type=password <?=($_GET['edit'])?" disabled ":""?> value="<?=($_GET['edit'])?"******":""?>"><BR>
                </TD></TR><!--psw/-->
              <TR>
                <TD vAlign=top><FONT color=red>*</FONT></TD>
                <TD>Ваше реальное имя: <INPUT maxLength=90 name=name
                size=45 value="<?=($_GET['edit'])?"{$user['realname']}":"{$_POST['name']}"?>"></TD></TR>

                 <?if (!$_GET['edit']) { ?>
              <TR>
                <TD vAlign=top><FONT color=red>*</FONT></TD>
 <TD>День рождения:
                <SELECT NAME="birth_day" CLASS="field" STYLE="width=40;">
                <OPTION VALUE="0"> </OPTION>
                <? for($i=1;$i<=31;$i++){
                        if($i<10){$i="0".$i;}
                        echo "<OPTION ".(@$_POST["birth_day"]==$i?"selected":"")." VALUE=\"$i\">$i</OPTION>";
                    }
                ?>
                 </SELECT>
                 <SELECT NAME="birth_month" CLASS="field" STYLE="width=95;">
                    <OPTION VALUE="0"> </OPTION>
                    <OPTION VALUE="1" <? if (@$_POST["birth_month"]==1) echo "selected"; ?>>январь</OPTION>
                    <OPTION VALUE="2" <? if (@$_POST["birth_month"]==2) echo "selected"; ?>>февраль</OPTION>
                    <OPTION VALUE="3" <? if (@$_POST["birth_month"]==3) echo "selected"; ?>>март</OPTION>
                    <OPTION VALUE="4" <? if (@$_POST["birth_month"]==4) echo "selected"; ?>>апрель</OPTION>
                    <OPTION VALUE="5" <? if (@$_POST["birth_month"]==5) echo "selected"; ?>>май</OPTION>
                    <OPTION VALUE="6" <? if (@$_POST["birth_month"]==6) echo "selected"; ?>>июнь</OPTION>
                    <OPTION VALUE="7" <? if (@$_POST["birth_month"]==7) echo "selected"; ?>>июль</OPTION>
                    <OPTION VALUE="8" <? if (@$_POST["birth_month"]==8) echo "selected"; ?>>август</OPTION>
                    <OPTION VALUE="9" <? if (@$_POST["birth_month"]==9) echo "selected"; ?>>сентябрь</OPTION>
                    <OPTION VALUE="10" <? if (@$_POST["birth_month"]==10) echo "selected"; ?>>октябрь</OPTION>
                    <OPTION VALUE="11" <? if (@$_POST["birth_month"]==11) echo "selected"; ?>>ноябрь</OPTION>
                    <OPTION VALUE="12" <? if (@$_POST["birth_month"]==12) echo "selected"; ?>>декабрь</OPTION>
                 </SELECT>
                 <SELECT NAME="birth_year" CLASS="field" STYLE="width=60;">
                 <OPTION VALUE="0"> </OPTION>
                 <? for($i=1940;$i<=2005;$i++){
                        echo "<OPTION ".(@$_POST["birth_year"]==$i?"selected":"")." VALUE=\"$i\">$i</OPTION>";
                    }
                ?>
                </SELECT>
                <? }
$user['info']=str_replace("<BR>","\n",$user['info']);
?>
                  <SMALL><FONT
                  color=red><BR>Внимание!</FONT> <FONT color=#364875>Дата рождения
                  должна быть правильной, она используется в игровом процессе.
                  Анкеты с неправильной датой рождения являются нарушением законов BK-2.</FONT></SMALL></TD></TR>
              <TR>
                <TD vAlign=top><FONT color=red>*</FONT></TD>
                <TD>Ваш пол: <INPUT <? if ($_GET['edit'] && $user['sex']==1) {echo "CHECKED";} else if (!$_GET['edit']) {echo "CHECKED";} ?> id=A1 name=sex
                  style="CURSOR: hand" type=radio value=1 ><LABEL for=A1>
                  Мужской</LABEL> <INPUT id=A2 name=sex style="CURSOR: hand"
                  type=radio <? if ($_GET['edit'] && $user['sex']==0) {echo "CHECKED";} ?> value=0 <?=($_GET['edit'])?" disabled ":""?>><LABEL for=A2> Женский</LABEL> </TD></TR>
              <TR>
                <TD>&nbsp;</TD>
                <TD>Город: <SELECT name=city> <OPTION
                    selected><OPTION>Москва<OPTION>Санкт-Петербург<OPTION>Абакан
                    (Хакасия)<OPTION>Азов<OPTION>Аксай (Ростовская
                    обл.)<OPTION>Алания<OPTION>Альметьевск<OPTION>Амурск<OPTION>Анадырь<OPTION>Анапа<OPTION>Ангарск
                    (Иркутская
                    обл.)<OPTION>Апатиты<OPTION>Армавир<OPTION>Архангельск<OPTION>Асбест<OPTION>Астрахань<OPTION>Балашиха<OPTION>Барнаул<OPTION>Белгород<OPTION>Беломорск
                    (Карелия)<OPTION>Березники (Пермская
                    обл.)<OPTION>Бийск<OPTION>Биробиджан<OPTION>Благовещенск<OPTION>Большой
                    камень<OPTION>Борисоглебск<OPTION>Братск<OPTION>Бронницы<OPTION>Брянск<OPTION>Ванино<OPTION>Великие
                    Луки<OPTION>Великий Устюг<OPTION>Верхняя
                    Салда<OPTION>Владивосток<OPTION>Владикавказ<OPTION>Владимир<OPTION>Волгоград<OPTION>Волгодонск<OPTION>Волжск<OPTION>Вологда<OPTION>Волхов
                    (С.Птрбрг
                    обл.)<OPTION>Воронеж<OPTION>Воскресенск<OPTION>Воткинск<OPTION>Выборг<OPTION>Вязьма
                    (Смоленская обл.)<OPTION>Вятские
                    Поляны<OPTION>Гаврилов-Ям<OPTION>Геленджик<OPTION>Георгиевск<OPTION>Голицино
                    (Московская
                    обл.)<OPTION>Губкин<OPTION>Гусь-Хрустальный<OPTION>Дзержинск
                    (Нижгрдск
                    обл.)<OPTION>Димитровград<OPTION>Долгопрудный<OPTION>Дубна<OPTION>Дудинка
                    (Эвенкская
                    АО)<OPTION>Ейск<OPTION>Екатеринбург<OPTION>Елабуга
                    (Татарстан)<OPTION>Елец (Липецкая
                    обл.)<OPTION>Елизово<OPTION>Железногорск<OPTION>Жуков
                    (Калужской
                    обл.)<OPTION>Жуковский<OPTION>Заречный<OPTION>Звенигород<OPTION>Зеленогорск<OPTION>Зеленоград<OPTION>Зеленодольск<OPTION>Златоуст<OPTION>Иваново<OPTION>Ивантеевка
                    (Мсквск
                    обл.)<OPTION>Ижевск<OPTION>Иркутск<OPTION>Ишим<OPTION>Йошкар-Ола<OPTION>Казань<OPTION>Калининград<OPTION>Калуга<OPTION>Каменск-Уральский<OPTION>Карталы<OPTION>Кемерово<OPTION>Кинешма
                    (Ивановская обл.)<OPTION>Кириши ( С.Птрбрг
                    обл.)<OPTION>Киров<OPTION>Кирово-Чепецк<OPTION>Кисловодск<OPTION>Ковров<OPTION>Когалым<OPTION>Коломна<OPTION>Комсомольск-на-Амуре<OPTION>Королев<OPTION>Костомукша<OPTION>Кострома<OPTION>Красногорск<OPTION>Краснодар<OPTION>Красноярск<OPTION>Кронштадт<OPTION>Кропоткин<OPTION>Кумертау
                    (Башкортостан)<OPTION>Курган<OPTION>Курск<OPTION>Кустанай<OPTION>Кызыл<OPTION>Липецк<OPTION>Лыткарино
                    (Московская
                    обл.)<OPTION>Люберцы<OPTION>Магадан<OPTION>Магнитогорск<OPTION>Майкоп<OPTION>Малоярославец<OPTION>Махачкала<OPTION>Медвежьегорск<OPTION>Междуреченск
                    (Кмрвск
                    обл.)<OPTION>Менделеевск<OPTION>Миасс<OPTION>Миллерово
                    (Ростовская обл.)<OPTION>Минеральные Воды<OPTION>Мичуринск
                    (Тамбовская
                    обл.)<OPTION>Мурманск<OPTION>Муром<OPTION>Мытищи<OPTION>Набережные
                    Челны<OPTION>Надым<OPTION>Нальчик<OPTION>Находка<OPTION>Невинномысск<OPTION>Нефтекамск<OPTION>Нефтеюганск<OPTION>Нижневартовс<OPTION>Нижнекамск<OPTION>Нижний
                    Новгород<OPTION>Нижний
                    Тагил<OPTION>Николаевск-на-Амуре<OPTION>Николаевск<OPTION>Новгород<OPTION>Новокузнецк<OPTION>Новомосковск<OPTION>Новороссийск<OPTION>Новосибирск<OPTION>Новоуральск<OPTION>Новочеркасск<OPTION>Новый
                    Уренгой<OPTION>Норильск<OPTION>Ноябрьск<OPTION>Нягань<OPTION>Обнинск<OPTION>Одинцово<OPTION>Омск<OPTION>Онега<OPTION>Орел<OPTION>Оренбург<OPTION>Орск<OPTION>Пенза<OPTION>Первоуральск<OPTION>Переславль-Залесский<OPTION>Пермь<OPTION>Петрозаводск<OPTION>Петропавловск-Камч.<OPTION>Пластун
                    (Приморский
                    край)<OPTION>Подольск<OPTION>Полевской<OPTION>Полярные
                    Зори<OPTION>Протвино<OPTION>Псков<OPTION>Пущино<OPTION>Пятигорск<OPTION>Радужный
                    (Тюменская
                    обл.)<OPTION>Ревда<OPTION>Ржев<OPTION>Ростов-на-Дону<OPTION>Ростов-Ярославский<OPTION>Рубцовск<OPTION>Рязань<OPTION>Салехард<OPTION>Самара<OPTION>Саранск<OPTION>Саратов<OPTION>Саров<OPTION>Сасово<OPTION>Себеж
                    (Псковская обл.)<OPTION>Северодвинск<OPTION>Северск (Томская
                    обл.)<OPTION>Сегежа<OPTION>Семикаракорск<OPTION>Сергиев
                    Посад<OPTION>Серов<OPTION>Серпухов<OPTION>Сестрорецк
                    (С.Птрбрг
                    обл.)<OPTION>Смоленск<OPTION>Снежинск<OPTION>Советская
                    Гавань<OPTION>Советский (Тюменская
                    обл.)<OPTION>Солнечногорск<OPTION>Сосновый
                    Бор<OPTION>Сосновый Бор (С.Птрбрг
                    обл.)<OPTION>Сочи<OPTION>Ставрополь<OPTION>Старая
                    Русса<OPTION>Старый Оскол<OPTION>Стерлитамак
                    (Башкортостан)<OPTION>Стрежевой (Томская
                    обл.)<OPTION>Строгино<OPTION>Сургут<OPTION>Сызрань<OPTION>Сыктывкар<OPTION>Таганрог<OPTION>Тамбов<OPTION>Таруса<OPTION>Тверь<OPTION>Тольятти<OPTION>Томск<OPTION>Трехгорный<OPTION>Троицк<OPTION>Туапсе<OPTION>Тула<OPTION>Тюмень<OPTION>Удомля
                    (Тверская
                    обл.)<OPTION>Улан-Удэ<OPTION>Ульяновск<OPTION>Уссурийск<OPTION>Усть-Лабинск
                    (Крсндрскй
                    край)<OPTION>Уфа<OPTION>Ухта<OPTION>Фрязино<OPTION>Хабаровск<OPTION>Ханты-Мансийск<OPTION>Химки<OPTION>Холмск<OPTION>Чебаркуль<OPTION>Чебоксары<OPTION>Челябинск<OPTION>Череповец<OPTION>Черкесск<OPTION>Черноголовка<OPTION>Чернушка
                    (Пермская обл.)<OPTION>Черняховск (Клннгрдск
                    обл.)<OPTION>Чита<OPTION>Шадринск (Курганская
                    обл.)<OPTION>Шатура<OPTION>Шахты<OPTION>Щелково (Московская
                    обл.)<OPTION>Электросталь<OPTION>Элиста<OPTION>Энгельс<OPTION>Южно-Сахалинск<OPTION>Южноуральск<OPTION>Юрга<OPTION>Якутск<OPTION>Ярославль<OPTION>Азербайджан<OPTION>Армения<OPTION>Беларусь<OPTION>Грузия<OPTION>Казахстан<OPTION>Кыргызстан<OPTION>Латвия<OPTION>Литва<OPTION>Таджикистан<OPTION>Туркменистан<OPTION>Узбекистан<OPTION>Украина<OPTION>Эстония<OPTION>Германия/Germany<OPTION>Израиль/Israel<OPTION>Канада/Canada<OPTION>США/USA</OPTION></SELECT>
                  другой <INPUT maxLength=40 name=city2 value="<?=($_GET['edit'])?"{$user['city']}":"{$_POST['city2']}"?>"></TD></TR>
              <TR>
                <TD>&nbsp;</TD>
                <TD>ICQ: <INPUT maxLength=20 name=icq size=9 value="<?=($_GET['edit'])?"{$user['icq']}":"{$_POST['icq']}"?>">
                Домашняя страница: <INPUT maxLength=60 name=homepage value="<?=($_GET['edit'])?"{$user['http']}":"{$_POST['homepage']}"?>"
                  size=35>
                </TD></TR>
              <TR>
                <TD>&nbsp;</TD>
                <TD>Увлечения / хобби <SMALL>(не более 60 слов)</SMALL><BR><TEXTAREA cols=60 name=hobby rows=7 ><?=($_GET['edit'])?"{$user['info']}":"{$_POST['nobby']}"?></TEXTAREA></TD></TR>
              <TR>
                <TD>&nbsp;</TD>
                <TD>Девиз: <INPUT maxLength=160 name=about size=70 value="<?=($_GET['edit'])?"{$user['lozung']}":"{$_POST['about']}"?>"></TD></TR>
              <TR>
               <TD>&nbsp;</TD>
                <TD>Цвет сообщений в чате: <SELECT name=ChatColor> <OPTION
                    selected style="BACKGROUND: #f2f0f0; COLOR: black"
                    value=Black>Черный<OPTION
                    style="BACKGROUND: #f2f0f0; COLOR: blue"
                    value=Blue>Синий<OPTION
                    style="BACKGROUND: #f2f0f0; COLOR: fuchsia"
                    value=Fuchsia>Розовый<OPTION
                    style="BACKGROUND: #f2f0f0; COLOR: gray"
                    value=Gray>Серый<OPTION
                    style="BACKGROUND: #f2f0f0; COLOR: green"
                    value=Green>Зеленый<OPTION
                    style="BACKGROUND: #f2f0f0; COLOR: maroon"
                    value=Maroon>Темнокрасный<OPTION
                    style="BACKGROUND: #f2f0f0; COLOR: navy"
                    value=Navy>Темносиний<OPTION
                    style="BACKGROUND: #f2f0f0; COLOR: olive"
                    value=Olive>Оливковый<OPTION
                    style="BACKGROUND: #f2f0f0; COLOR: purple"
                    value=Purple>Фиолетовый<OPTION
                    style="BACKGROUND: #f2f0f0; COLOR: teal"
                    value=Teal>Морской волны<OPTION
                    style="BACKGROUND: #f2f0f0; COLOR: orange"
                    value=Orange>Оранжевый<OPTION
                    style="BACKGROUND: #f2f0f0; COLOR: chocolate"
                    value=Chocolate>Шоколадный<OPTION
                    style="BACKGROUND: #f2f0f0; COLOR: darkkhaki"
                    value=DarkKhaki>Темный хаки<OPTION
                    style="BACKGROUND: #f2f0f0; COLOR: sandybrown"
                    value=SandyBrown>Темнопесочный<OPTION
                    style="BACKGROUND: #f2f0f0; COLOR: #8700e4"
                    value="#8700e4">Сиреневый</OPTION></SELECT>


                    <?
                    if($_GET['edit']) {
                        echo '<script>document.all[\'ChatColor\'].value = \'',$user['color'],'\';</script>';
                    }

                    ?></TD></TR>
              <TR>
                <TD vAlign=top><FONT color=red>*</FONT></TD>
                <TD><INPUT id=A3 name=Law style="CURSOR: hand"
                  type=checkbox <?=($_GET['edit'])?" disabled checked ":""?>><LABEL for=A3> Я ознакомился и обязуюсь соблюдать</LABEL> <A
                  href="/forum.php?conf=13"
                  target=_blank><B>Законы BestcombatS</B></A> <BR><BR>
                  <?if (!$_GET['edit']) {?>
				  <img src="sec.php" border="1"><br><BR>
                  Код подтверждения:
				<input type="text" name="securityCode" size="20" value="" maxlength=5 style="FONT-FAMILY: verdana;"> 
				<?}?>           
                 </TD></TR>
                </TD></TR>
              <TR>
               <input type="hidden" name="ref" value="<?if(!empty($ref)){echo $ref;}?>">
     <TD align=middle colSpan=2><br>
                <? if($_GET['edit']) {
                echo "<INPUT name=add type=submit value=Сохранить>";
                } else {
                echo "<INPUT name=add type=submit value=Зарегистрироваться>";
                }
                ?>
                <div align=left>
                    <?php  ?>
                </div>

            </TD></FORM></TR></TBODY></TABLE><!-- End of text --><BR><BR></div></TD></TR>
        </TBODY></TABLE>
        </BODY></HTML>

            