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
                    $err .= "������� ���! ";
                    $stop =1;
    }
    elseif ( ! ($_POST['ChatColor'] == "Black" || $_POST['ChatColor'] == "Blue" || $_POST['ChatColor'] == "#8700e4" ||  $_POST['ChatColor'] == "Fuchsia" || $_POST['ChatColor'] == "Gray" || $_POST['ChatColor'] == "Green" || $_POST['ChatColor'] == "Maroon" || $_POST['ChatColor'] == "Navy" || $_POST['ChatColor'] == "Olive" || $_POST['ChatColor'] == "Purple" || $_POST['ChatColor'] == "Teal" ||  $_POST['ChatColor'] == "Orange" ||  $_POST['ChatColor'] == "Chocolate" || $_POST['ChatColor'] == "DarkKhaki")) {
                    $err .= "�������� ������������ ������ ����� ��������� � ���� ������ ! ";
                    $_POST['ChatColor'] = "Black";
    }
      if($stop!=1) {
      $_POST['hobby']=str_replace("&lt;BR&gt;","<BR>",$_POST['hobby']);
      if (haslinks("$_POST[city2] $_POST[icq] $_POST[name] $_POST[hobby] $_POST[about]")) {
       $f=fopen("logs/autosleep.txt","ab");
       fwrite($f, "$user[login]: $_POST[city2] $_POST[icq] $_POST[hobby] $_POST[about]\r\n");
       fclose($f);

       mq("INSERT INTO `effects` (`owner`,`name`,`time`,`type`) values ('$user[id]','�������� ��������',".(time()+3600).",2);");
       reportadms("<br><b>$user[login]</b>: ���� � ����", "�����������");
       addch("<img src=http://img.bestcombats.net/pbuttons/sleep.gif> ����������� ������� �������� �������� �� &quot;$user[login]&quot;, ������ 60 ���. �������: ���.");
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
		   $err .= "�� ��������� ����� ����������� �� �����!";
                }elseif ($_POST['login']==null) {
                    $err .= "������� ��� ���������! ";
                    $stop =1;
                }
                elseif ($res['id']!= null || hasbad($login) || strpos($login, "�����")!==false || strpos(strtolower($login), "ellegia")!==false) {
                    $err .= "� ��������� �������� � ����� <B>$login</B> ��� ���������������.";
                    $stop =1;
                }
                elseif (strtoupper($_POST['login'])==strtoupper("���������") ||  strtoupper($_POST['login'])==strtoupper("��������") || strtoupper($_POST['login'])==strtoupper("�����������") || strtoupper($_POST['login'])==strtoupper("����������") || strtoupper($_POST['login'])==strtoupper("���������") || strtoupper($_POST['login'])==strtoupper("Merlin") || strtoupper($_POST['login'])==strtoupper("����������")) {
                    $err .= "����������� ��������� � ����� <B>$login</B> ���������! ";
                    $stop =1;
                }
                elseif (strlen($_POST['login'])<4 || strlen($_POST['login'])>20 || !ereg("^[a-zA-Z�-��-�0-9][a-zA-Z�-��-�0-9_ -]+[a-zA-Z�-��-�0-9]$",$_POST['login']) || preg_match("/__/",$_POST['login']) || preg_match("/--/",$_POST['login']) || preg_match("/  /",$_POST['login']) || preg_match("/(.)\\1\\1\\1/",$_POST['login']))
                    {
                    $err .= "����� ����� ��������� �� 4 �� 20 ��������, � �������� ������ �� ���� �������� ��� ����������� ��������, ����, �������� '_',  '-' � �������. <br>����� �� ����� ���������� ��� ������������� ��������� '_', '-' ��� ��������<br>����� � ������ �� ������ �������������� ������ ����� 1 ������� '_' ��� '-' � ����� 1 �������, � ����� ����� 3-� ������ ���������� ��������.";
                    $stop =1;
                }
                elseif (ereg("[a-zA-Z]",$_POST['login']) && ereg("[�-��-�]",$_POST['login'])) {
                    $err .= "����� �� ����� ��������� ������������ ����� �������� � ���������� ���������!";
                    $stop =1;
                }
                elseif (!eregi("^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)+$",$_POST['email'])) {
                    $err .= "�������� ������ �����! ";
                    $stop =1;
                }
### ��������� ������
    if ($_POST['pass'] != $_POST['pass2']) {
        $error .= '<li>��������� ������ �� ���������</li>';
        $fail = 1;
    } elseif (strlen($_POST['pass']) < 6) {
        $error .= '<li>������ �� ����� ���� ������ 6 ��������</li>';
        $fail = 1;
    } elseif (strlen($_POST['pass']) > 21) {
        $error .= '<li>������ �� ����� ���� ������� 21 �������</li>';
        $fail = 1;
    }

###
                if ($_POST['name']==null || strlen($_POST['name']) > 30) {
                    $err .= "�� ������� ���� �������� ���, ��� ��� ������ 30 ��������! ";
                    $stop =1;
                }
                elseif ($_POST['birth_day']<1 || $_POST['birth_day']>31) {
                    $err .= "������� ���� ��������! ";
                    $stop =1;
                }
                elseif ($_POST['birth_month']<1 || $_POST['birth_month']>12) {
                    $err .= "������� ����� ��������! ";
                    $stop =1;
                }
                elseif ($_POST['birth_year']<1940 || $_POST['birth_year']>2000) {
                    $err .= "������� ��� ��������! ";
                    $stop =1;
                }
                elseif ($_POST['sex'] != "0" && $_POST['sex'] != "1") {
                    $err .= "������� ��� ���! ";
                    $stop =1;
                }
                elseif ( ! ($_POST['ChatColor'] == "Black" || $_POST['ChatColor'] == "Blue" || $_POST['ChatColor'] == "#8700e4" || $_POST['ChatColor'] == "Fuchsia" || $_POST['ChatColor'] == "Gray" || $_POST['ChatColor'] == "Green" || $_POST['ChatColor'] == "Maroon" || $_POST['ChatColor'] == "Navy" || $_POST['ChatColor'] == "Olive" || $_POST['ChatColor'] == "Purple" || $_POST['ChatColor'] == "Teal" ||  $_POST['ChatColor'] == "Orange" ||  $_POST['ChatColor'] == "Chocolate" || $_POST['ChatColor'] == "DarkKhaki")) {
                    $err .= "�������� ������������ ������ ����� ��������� � ���� ������ ! ";
                    $stop =1;
                }
                elseif ($_POST['Law']==null) {
                    $err .= "�� �� ������� ���� �������� � �������� BK-2! ";
                    $stop =1;
                }
                elseif (isset($_POST['securityCode']) && isset($_SESSION['securityCode'])) {
                if (strtolower($_POST['securityCode']) == $_SESSION['securityCode']) {
				unset($_SESSION['securityCode']);
				}
				else{
					$stop =1;
					$err .= "�������� �������� ��� ! ";
				unset($_SESSION['securityCode']);
					}
				}
				elseif (!isset($_POST['securityCode']) || !isset($_SESSION['securityCode'])) {
					$stop =1;
					$err .= "�� �� ����� �������� ��� ! ";
				}
                if($stop!=1) {
                    $_POST['hobby']=str_replace("&lt;BR&gt;","<BR>",$_POST['hobby']);
                    if ($birth_month < 10)  {$birth_month = "0".$birth_month;}
                    $birthday=$birth_day."-".$birth_month."-".$birth_year;
           
                    if(mq("INSERT INTO `users` (`borncity`,`login`,`pass`,`email`,`realname`,`borndate`,`sex`,`city`,`icq`,`http`,`info`,`lozung`,`color`,`ip`,`showmyinfo`,`refer`,`vip`)VALUES('Devils City','".mysql_real_escape_string($_POST['login'])."','".md5($_POST['psw'])."','".mysql_real_escape_string($_POST['email'])."','".mysql_real_escape_string($_POST['name'])."','$birthday','".mysql_real_escape_string($_POST['sex'])."','".mysql_real_escape_string($_POST['city2'])."','".mysql_real_escape_string($_POST['icq'])."','".mysql_real_escape_string($_POST['homepage'])."','".mysql_real_escape_string($_POST['hobby'])."','".mysql_real_escape_string($_POST['about'])."','".mysql_real_escape_string($_POST['ChatColor'])."','".$_SERVER['REMOTE_ADDR']."','1','$ref','1');")) {
                      $i = mysql_insert_id();
                      mq("insert into userdata (id) values($i)");
                      if ($_SESSION["spammer"]) {
                        reportadms("��������������� ����� �������� ������: <b>$_POST[login]</b>");
                      }
                        $f=fopen("chardata/$i.dat", "wb+");
                        fclose($f);

                        resetmax($i);

                        if (haslinks("$_POST[city2] $_POST[icq] $_POST[name] $_POST[hobby] $_POST[about]")) {
                          $f=fopen("logs/autosleep.txt","ab");
                          fwrite($f, "$_POST[login]: $_POST[city2] $_POST[icq] $_POST[hobby] $_POST[about]\r\n");
                          fclose($f);

                          mq("INSERT INTO `effects` (`owner`,`name`,`time`,`type`) values ('$i','�������� ��������',".(time()+3600).",2);");
                          reportadms("<br><b>$_POST[login]</b>: ���� � ����</font>", "�����������");
                        }
//������ ����� �� �����������
setcookie("mailru", "enter", time()+86400);
//��������� ���� � ���������
mq("INSERT INTO `inventory` (`owner`,`ghp`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`present`)
VALUES('".$i."','3','�������','6','0.5','1','roba1.gif','30','�����������') ;");
mq("INSERT INTO `inventory` (`owner`,`bron3`,`bron4`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`present`)
VALUES('".$i."','1','1','����� ����������','24','0.5','1','leg1.gif','30','�����������') ;");
mq("INSERT INTO `inventory` (`owner`,`name`,`type`,`massa`,`cost`,`img`,`maxdur`,`present`,`magic`,`otdel`,`isrep`)
VALUES('".$i."','����� �����','188','1','0','pot_cureHP100_20.gif','20','�����������','189','6','0') ;");
///�������� ������
mq("INSERT INTO puton(id_person,id_thing,slot) VALUES ('".$i."','158','201');");
mq("INSERT INTO puton(id_person,id_thing,slot) VALUES ('".$i."','159','202');");
mq("INSERT INTO puton(id_person,id_thing,slot) VALUES ('".$i."','164','203');");
//������� ��� �����������
mq("INSERT INTO `effects` (`owner`,`name`,`time`,`type`) values ('$i','�������� ��������� ��������',".(time()+86400).",3);");
//������� ������ ������� ��������
mq("INSERT INTO `effects` (`owner`,`name`,`time`,`type`) values ('$i','Silver Account',".(time()+259200).",70);");
//
mq("INSERT INTO `online` (`id` ,`date` ,`room`)VALUES ('".$i."', '".time()."', '1');");
if(!empty($ref)){
        $us = mysql_fetch_array(mq("select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = '{$ref}' LIMIT 1;"));
                if($us[0]){
        addchp ('<font color=red>��������!</font> <font color=\"Black\">�������� <B>'.$_POST['login'].'</B> ����������������� �� ����� ������. ��� ����� ����������� ������ �� ������ ��������� �� ������� ����� �������.</font>   ','{[]}'.nick7 ($ref).'{[]}');
            } else {
        mq("INSERT INTO `telegraph` (`owner`,`date`,`text`) values ('".$ref."','','".'<font color=red>��������!</font> <font color=\"Black\">�������� <B>'.$_POST['login'].'</B> ����������������� �� ����� ������. ��� ����� ����������� ������ �� ������ ��������� �� ������� ����� �������.</font> '."');");
            }
            echo mysql_error();





                        }
                        session_start();
                        setcookie("battle", $i);
                        $_SESSION['uid'] = $i;
                        //������� ������ �������� ������� ��� ��������� ��� �� ������
                        $_SESSION['ekr_online'] = time();
                        mq("UPDATE `users` SET `sid` = '".session_id()."', `browser` = '".$_SERVER['HTTP_USER_AGENT']."' WHERE `id` = {$i};");
                        $_SESSION['sid'] = session_id();
                        //�������� ���������:))
                        addchp ('private [pal] private [tar] ��������! ������� ����� ���������� <a href=javascript:top.AddTo("'.$_POST["login"].'")><span oncontextmenu="OpenMenu()">'.$_POST["login"].'</span></a>!',"�����������", 1);
                        //�������� � ����� ���
                        addchp ('��������! ������� ����� ���������� <a href=javascript:top.AddTo("'.$_POST["login"].'")><span oncontextmenu="OpenMenu()">'.$_POST["login"].'</span></a>! ������������� ������� � ������� ������ ������ ������� ����� � ��������� �������!',"�����������", 1);
                        //������ �������
                        addchp ('private ['.$_POST["login"].'] ����������� ��� � �������� ������������ �� ����� BetscombatS � �������� ������ �� �������� ��� Silver Account �� ��� ���. �������� ���� � ������� �����. ������� ��� �� � ���� !!',"�����������", 1);
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
	//�����
	$("#login").change(function(){
		login = $("#login").val();
		var expLogin = /^[a-zA-Z0-9_]+$/g;
		var resLogin = login.search(expLogin);
		if(resLogin == -1){
			$("#login").next().hide().text("�������� �����").css("color","red").fadeIn(400);
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
					$("#login").next().hide().text("����� �����").css("color","red").fadeIn(400);
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
			$("#email").next().hide().text("�������� ������ Email").css("color","red").fadeIn(400);
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
					$("#email").next().hide().text("Email �����").css("color","red").fadeIn(400);
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
	
	
	//������
	$("#password").change(function(){
		password = $("#password").val();
		if(password.length < 6){
			$("#password").next().hide().text("������� �������� ������").css("color","red").fadeIn(400);
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
	
	//�������� ������
	$("#password2").change(function(){
		if(password2 != password){
			$("#password2").next().hide().text("������ �� ���������").css("color","red").fadeIn(400);
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
                <TD>��� ������ ��������� (login): <INPUT maxLength=60
                  name=login maxLength=20 id=login size=20 <?=($_GET['edit'])?" disabled ":""?> value="<?=($_GET['edit'])?"{$user['login']}":"{$_POST['login']}"?>"><span></span><BR><SMALL><FONT color=<?
                  if ($badlogin) echo "#ff0000 style=\"font-weight:bold\""; else echo "#364875";
                  ?>>
                  ����� ����� ��������� �� 4 �� 20 ��������, � �������� ������ �� ���� �������� ��� ����������� ��������, ����, �������� '_',  '-' � �������. <br>����� �� ����� ���������� ��� ������������� ��������� '_', '-' ��� ��������<br>����� � ������ �� ������ �������������� ������ ����� 1 ������� '_' ��� '-' � ����� 1 �������, � ����� ����� 3-� ������ ���������� ��������
</FONT></SMALL></TD></TR><!--/email-->
              <TR>
                <TD vAlign=top><FONT color=red>*</FONT></TD>
                <TD>��� e-mail: <INPUT maxLength=50 size=50 id=email name=email value="<?=($_GET['edit'])?"{$user['email']}":"{$_POST['email']}"?>" <?=($_GET['edit'])?" disabled ":""?>>
                  <span></span><BR><SMALL><FONT color=#364875>������������ <U>������</U> ���
                  ����������� ������, ����� �� ������������ � �� ������������
                  ��� �������� "�����������/����������/..." � �������
                  �����.</FONT></SMALL></TD></TR><!--email/--><!--/psw-->
              <TR>
                <TD vAlign=top><FONT color=red>*</FONT></TD>
                <TD>������: <INPUT maxLength=21 name=psw size=15 id=pass type=password
                <?=($_GET['edit'])?" disabled ":""?> value="<?=($_GET['edit'])?"******":""?>"> &nbsp; <FONT color=red>*</FONT> ������
                  ��������: <INPUT maxLength=21 name=psw2 size=15
                  type=password <?=($_GET['edit'])?" disabled ":""?> value="<?=($_GET['edit'])?"******":""?>"><BR>
                </TD></TR><!--psw/-->
              <TR>
                <TD vAlign=top><FONT color=red>*</FONT></TD>
                <TD>���� �������� ���: <INPUT maxLength=90 name=name
                size=45 value="<?=($_GET['edit'])?"{$user['realname']}":"{$_POST['name']}"?>"></TD></TR>

                 <?if (!$_GET['edit']) { ?>
              <TR>
                <TD vAlign=top><FONT color=red>*</FONT></TD>
 <TD>���� ��������:
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
                    <OPTION VALUE="1" <? if (@$_POST["birth_month"]==1) echo "selected"; ?>>������</OPTION>
                    <OPTION VALUE="2" <? if (@$_POST["birth_month"]==2) echo "selected"; ?>>�������</OPTION>
                    <OPTION VALUE="3" <? if (@$_POST["birth_month"]==3) echo "selected"; ?>>����</OPTION>
                    <OPTION VALUE="4" <? if (@$_POST["birth_month"]==4) echo "selected"; ?>>������</OPTION>
                    <OPTION VALUE="5" <? if (@$_POST["birth_month"]==5) echo "selected"; ?>>���</OPTION>
                    <OPTION VALUE="6" <? if (@$_POST["birth_month"]==6) echo "selected"; ?>>����</OPTION>
                    <OPTION VALUE="7" <? if (@$_POST["birth_month"]==7) echo "selected"; ?>>����</OPTION>
                    <OPTION VALUE="8" <? if (@$_POST["birth_month"]==8) echo "selected"; ?>>������</OPTION>
                    <OPTION VALUE="9" <? if (@$_POST["birth_month"]==9) echo "selected"; ?>>��������</OPTION>
                    <OPTION VALUE="10" <? if (@$_POST["birth_month"]==10) echo "selected"; ?>>�������</OPTION>
                    <OPTION VALUE="11" <? if (@$_POST["birth_month"]==11) echo "selected"; ?>>������</OPTION>
                    <OPTION VALUE="12" <? if (@$_POST["birth_month"]==12) echo "selected"; ?>>�������</OPTION>
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
                  color=red><BR>��������!</FONT> <FONT color=#364875>���� ��������
                  ������ ���� ����������, ��� ������������ � ������� ��������.
                  ������ � ������������ ����� �������� �������� ���������� ������� BK-2.</FONT></SMALL></TD></TR>
              <TR>
                <TD vAlign=top><FONT color=red>*</FONT></TD>
                <TD>��� ���: <INPUT <? if ($_GET['edit'] && $user['sex']==1) {echo "CHECKED";} else if (!$_GET['edit']) {echo "CHECKED";} ?> id=A1 name=sex
                  style="CURSOR: hand" type=radio value=1 ><LABEL for=A1>
                  �������</LABEL> <INPUT id=A2 name=sex style="CURSOR: hand"
                  type=radio <? if ($_GET['edit'] && $user['sex']==0) {echo "CHECKED";} ?> value=0 <?=($_GET['edit'])?" disabled ":""?>><LABEL for=A2> �������</LABEL> </TD></TR>
              <TR>
                <TD>&nbsp;</TD>
                <TD>�����: <SELECT name=city> <OPTION
                    selected><OPTION>������<OPTION>�����-���������<OPTION>������
                    (�������)<OPTION>����<OPTION>����� (����������
                    ���.)<OPTION>������<OPTION>�����������<OPTION>������<OPTION>�������<OPTION>�����<OPTION>�������
                    (���������
                    ���.)<OPTION>�������<OPTION>�������<OPTION>�����������<OPTION>������<OPTION>���������<OPTION>��������<OPTION>�������<OPTION>��������<OPTION>���������
                    (�������)<OPTION>��������� (��������
                    ���.)<OPTION>�����<OPTION>����������<OPTION>������������<OPTION>�������
                    ������<OPTION>������������<OPTION>������<OPTION>��������<OPTION>������<OPTION>������<OPTION>�������
                    ����<OPTION>������� �����<OPTION>�������
                    �����<OPTION>�����������<OPTION>�����������<OPTION>��������<OPTION>���������<OPTION>����������<OPTION>������<OPTION>�������<OPTION>������
                    (�.������
                    ���.)<OPTION>�������<OPTION>�����������<OPTION>��������<OPTION>������<OPTION>������
                    (���������� ���.)<OPTION>�������
                    ������<OPTION>��������-��<OPTION>���������<OPTION>����������<OPTION>��������
                    (����������
                    ���.)<OPTION>������<OPTION>����-�����������<OPTION>���������
                    (��������
                    ���.)<OPTION>������������<OPTION>������������<OPTION>�����<OPTION>�������
                    (���������
                    ��)<OPTION>����<OPTION>������������<OPTION>�������
                    (���������)<OPTION>���� (��������
                    ���.)<OPTION>�������<OPTION>������������<OPTION>�����
                    (���������
                    ���.)<OPTION>���������<OPTION>��������<OPTION>����������<OPTION>�����������<OPTION>����������<OPTION>������������<OPTION>��������<OPTION>�������<OPTION>����������
                    (������
                    ���.)<OPTION>������<OPTION>�������<OPTION>����<OPTION>������-���<OPTION>������<OPTION>�����������<OPTION>������<OPTION>�������-���������<OPTION>�������<OPTION>��������<OPTION>�������
                    (���������� ���.)<OPTION>������ ( �.������
                    ���.)<OPTION>�����<OPTION>������-������<OPTION>����������<OPTION>������<OPTION>�������<OPTION>�������<OPTION>�����������-��-�����<OPTION>�������<OPTION>����������<OPTION>��������<OPTION>�����������<OPTION>���������<OPTION>����������<OPTION>���������<OPTION>���������<OPTION>��������
                    (������������)<OPTION>������<OPTION>�����<OPTION>��������<OPTION>�����<OPTION>������<OPTION>���������
                    (����������
                    ���.)<OPTION>�������<OPTION>�������<OPTION>������������<OPTION>������<OPTION>�������������<OPTION>���������<OPTION>�������������<OPTION>������������
                    (������
                    ���.)<OPTION>�����������<OPTION>�����<OPTION>���������
                    (���������� ���.)<OPTION>����������� ����<OPTION>���������
                    (����������
                    ���.)<OPTION>��������<OPTION>�����<OPTION>������<OPTION>����������
                    �����<OPTION>�����<OPTION>�������<OPTION>�������<OPTION>������������<OPTION>����������<OPTION>�����������<OPTION>������������<OPTION>����������<OPTION>������
                    ��������<OPTION>������
                    �����<OPTION>����������-��-�����<OPTION>����������<OPTION>��������<OPTION>�����������<OPTION>������������<OPTION>������������<OPTION>�����������<OPTION>�����������<OPTION>������������<OPTION>�����
                    �������<OPTION>��������<OPTION>��������<OPTION>������<OPTION>�������<OPTION>��������<OPTION>����<OPTION>�����<OPTION>����<OPTION>��������<OPTION>����<OPTION>�����<OPTION>������������<OPTION>����������-���������<OPTION>�����<OPTION>������������<OPTION>�������������-����.<OPTION>�������
                    (����������
                    ����)<OPTION>��������<OPTION>���������<OPTION>��������
                    ����<OPTION>��������<OPTION>�����<OPTION>������<OPTION>���������<OPTION>��������
                    (���������
                    ���.)<OPTION>�����<OPTION>����<OPTION>������-��-����<OPTION>������-�����������<OPTION>��������<OPTION>������<OPTION>��������<OPTION>������<OPTION>�������<OPTION>�������<OPTION>�����<OPTION>������<OPTION>�����
                    (��������� ���.)<OPTION>������������<OPTION>������� (�������
                    ���.)<OPTION>������<OPTION>�������������<OPTION>�������
                    �����<OPTION>�����<OPTION>��������<OPTION>����������
                    (�.������
                    ���.)<OPTION>��������<OPTION>��������<OPTION>���������
                    ������<OPTION>��������� (���������
                    ���.)<OPTION>�������������<OPTION>��������
                    ���<OPTION>�������� ��� (�.������
                    ���.)<OPTION>����<OPTION>����������<OPTION>������
                    �����<OPTION>������ �����<OPTION>�����������
                    (������������)<OPTION>��������� (�������
                    ���.)<OPTION>��������<OPTION>������<OPTION>�������<OPTION>���������<OPTION>��������<OPTION>������<OPTION>������<OPTION>�����<OPTION>��������<OPTION>�����<OPTION>����������<OPTION>������<OPTION>������<OPTION>����<OPTION>������<OPTION>������
                    (��������
                    ���.)<OPTION>����-���<OPTION>���������<OPTION>���������<OPTION>����-�������
                    (���������
                    ����)<OPTION>���<OPTION>����<OPTION>�������<OPTION>���������<OPTION>�����-��������<OPTION>�����<OPTION>������<OPTION>���������<OPTION>���������<OPTION>���������<OPTION>���������<OPTION>��������<OPTION>������������<OPTION>��������
                    (�������� ���.)<OPTION>���������� (���������
                    ���.)<OPTION>����<OPTION>�������� (����������
                    ���.)<OPTION>������<OPTION>�����<OPTION>������� (����������
                    ���.)<OPTION>������������<OPTION>������<OPTION>�������<OPTION>����-���������<OPTION>�����������<OPTION>����<OPTION>������<OPTION>���������<OPTION>�����������<OPTION>�������<OPTION>��������<OPTION>������<OPTION>���������<OPTION>����������<OPTION>������<OPTION>�����<OPTION>�����������<OPTION>������������<OPTION>����������<OPTION>�������<OPTION>�������<OPTION>��������/Germany<OPTION>�������/Israel<OPTION>������/Canada<OPTION>���/USA</OPTION></SELECT>
                  ������ <INPUT maxLength=40 name=city2 value="<?=($_GET['edit'])?"{$user['city']}":"{$_POST['city2']}"?>"></TD></TR>
              <TR>
                <TD>&nbsp;</TD>
                <TD>ICQ: <INPUT maxLength=20 name=icq size=9 value="<?=($_GET['edit'])?"{$user['icq']}":"{$_POST['icq']}"?>">
                �������� ��������: <INPUT maxLength=60 name=homepage value="<?=($_GET['edit'])?"{$user['http']}":"{$_POST['homepage']}"?>"
                  size=35>
                </TD></TR>
              <TR>
                <TD>&nbsp;</TD>
                <TD>��������� / ����� <SMALL>(�� ����� 60 ����)</SMALL><BR><TEXTAREA cols=60 name=hobby rows=7 ><?=($_GET['edit'])?"{$user['info']}":"{$_POST['nobby']}"?></TEXTAREA></TD></TR>
              <TR>
                <TD>&nbsp;</TD>
                <TD>�����: <INPUT maxLength=160 name=about size=70 value="<?=($_GET['edit'])?"{$user['lozung']}":"{$_POST['about']}"?>"></TD></TR>
              <TR>
               <TD>&nbsp;</TD>
                <TD>���� ��������� � ����: <SELECT name=ChatColor> <OPTION
                    selected style="BACKGROUND: #f2f0f0; COLOR: black"
                    value=Black>������<OPTION
                    style="BACKGROUND: #f2f0f0; COLOR: blue"
                    value=Blue>�����<OPTION
                    style="BACKGROUND: #f2f0f0; COLOR: fuchsia"
                    value=Fuchsia>�������<OPTION
                    style="BACKGROUND: #f2f0f0; COLOR: gray"
                    value=Gray>�����<OPTION
                    style="BACKGROUND: #f2f0f0; COLOR: green"
                    value=Green>�������<OPTION
                    style="BACKGROUND: #f2f0f0; COLOR: maroon"
                    value=Maroon>������������<OPTION
                    style="BACKGROUND: #f2f0f0; COLOR: navy"
                    value=Navy>����������<OPTION
                    style="BACKGROUND: #f2f0f0; COLOR: olive"
                    value=Olive>���������<OPTION
                    style="BACKGROUND: #f2f0f0; COLOR: purple"
                    value=Purple>����������<OPTION
                    style="BACKGROUND: #f2f0f0; COLOR: teal"
                    value=Teal>������� �����<OPTION
                    style="BACKGROUND: #f2f0f0; COLOR: orange"
                    value=Orange>���������<OPTION
                    style="BACKGROUND: #f2f0f0; COLOR: chocolate"
                    value=Chocolate>����������<OPTION
                    style="BACKGROUND: #f2f0f0; COLOR: darkkhaki"
                    value=DarkKhaki>������ ����<OPTION
                    style="BACKGROUND: #f2f0f0; COLOR: sandybrown"
                    value=SandyBrown>�������������<OPTION
                    style="BACKGROUND: #f2f0f0; COLOR: #8700e4"
                    value="#8700e4">���������</OPTION></SELECT>


                    <?
                    if($_GET['edit']) {
                        echo '<script>document.all[\'ChatColor\'].value = \'',$user['color'],'\';</script>';
                    }

                    ?></TD></TR>
              <TR>
                <TD vAlign=top><FONT color=red>*</FONT></TD>
                <TD><INPUT id=A3 name=Law style="CURSOR: hand"
                  type=checkbox <?=($_GET['edit'])?" disabled checked ":""?>><LABEL for=A3> � ����������� � �������� ���������</LABEL> <A
                  href="/forum.php?conf=13"
                  target=_blank><B>������ BestcombatS</B></A> <BR><BR>
                  <?if (!$_GET['edit']) {?>
				  <img src="sec.php" border="1"><br><BR>
                  ��� �������������:
				<input type="text" name="securityCode" size="20" value="" maxlength=5 style="FONT-FAMILY: verdana;"> 
				<?}?>           
                 </TD></TR>
                </TD></TR>
              <TR>
               <input type="hidden" name="ref" value="<?if(!empty($ref)){echo $ref;}?>">
     <TD align=middle colSpan=2><br>
                <? if($_GET['edit']) {
                echo "<INPUT name=add type=submit value=���������>";
                } else {
                echo "<INPUT name=add type=submit value=������������������>";
                }
                ?>
                <div align=left>
                    <?php  ?>
                </div>

            </TD></FORM></TR></TBODY></TABLE><!-- End of text --><BR><BR></div></TD></TR>
        </TBODY></TABLE>
        </BODY></HTML>

            