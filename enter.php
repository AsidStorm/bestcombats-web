<?php
    session_start();
    include "connect.php";
    include("functions.php");

    if (@$_POST["login"]) checkuserbylogin($_POST['login']);
if($_POST['code']  && $_SESSION['sid'] && $_SESSION['puid'] && $_SESSION['stap']){
$data4 = mysql_fetch_array(mysql_query("SELECT pass2,pass FROM `users` WHERE `id` = '{$_SESSION['puid']}' LIMIT 1;"));
if(md5($_POST['code'])==$data4['pass2']){
$chkps1="yes";
}else{$koko="<FONT COLOR=\"white\">�������� ������</FONT><BR>";}


}


if(($chkps1=="yes" or $koko) && $_SESSION['stap']==$data4['pass']){
$_SESSION['stap'] = addslashes($_SESSION['stap']);
    $data = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['puid']}' AND `pass` = '".$_SESSION['stap']."' LIMIT 1;"));
}else{
    $data = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `login` = '{$_POST['login']}' AND `pass` = '".md5($_POST['psw'])."' LIMIT 1;"));
}

    if ($data[0] == null) {
        echo "<html><head><META http-equiv=Content-type content='text/html; charset=windows-1251'><title>��������� ������</title></head><body><BR>��������� ������!<BR>�������� ������, ������� � <a href=index.php>������� ��������</a>.<BR><BR><BR><hr><table width=100%><tr><td align=left><b><a href='javascript:window.history.go(-1);'>�����</a></b></td><td align=right>(C) bestcombats</td></tr></table></body></html>";
        $f=fopen("logs/error.log","ab");
        fwrite($f, date("d.m.Y H:i",time())." $_SERVER[REMOTE_ADDR] $_POST[login] $_POST[psw]\r\n");
        fclose($f);
    }
//  elseif ($data['klan'] != 'adminion') {
//      echo "<html><head><META http-equiv=Content-type content='text/html; charset=windows-1251'><title>��������� ������</title></head><body><BR>��������� ������!<BR>��������� ������������. ����� ���� ����������� ����� �� ����� ������� ����� �� ����. <font color=red><b>�������� � 17:15 �� ������.</b></font><BR><BR><BR><hr><table width=100%><tr><td align=left><b><a href='javascript:window.history.go(-1);'>�����</a></b></td><td align=right>(C) bestcombats</td></tr></table></body></html>";
//  }
    elseif($data['block']==1)
    {
        echo "<html><head><META http-equiv=Content-type content='text/html; charset=windows-1251'><title>��������� ������</title></head><body><BR>��������� ������!<BR>�������� ������������.<BR><BR><BR><font color=red>�������: ".$data['palcom']."</font><hr><table width=100%><tr><td align=left><b><a href='javascript:window.history.go(-1);'>�����</a></b></td><td align=right>(C) bestcombats</td></tr></table></body></html>";
    }
    else
    {





if(($chkps1!="yes") or empty($koko)){
                session_destroy();
        session_start();
        resetmax($data['id']);
        //delo_multi
        if($_COOKIE['battle']!= null && $data['id'] != $_COOKIE['battle']) {
            mysql_query("INSERT INTO `delo_multi` (`idperslater`,`idpersnow`) values ('".$_COOKIE['battle']."','".$data['id']."');");
        }

        ///
                setcookie("battle", $data['id']);
                $_SESSION['puid'] = $data['id'];
                $_SESSION['sid'] = session_id();
				$_SESSION['ekr_online'] = time();
				setcookie("uid",$data['id'],time()+86400,"/",".bestcombats.net");
				setcookie("hashcode",md5($data['id'].$data["pass"].$data["login"]),time()+86400,"/",".bestcombats.net");
if(!empty($data['pass2'])){$_SESSION['stap'] = $data['pass'];}
}


if($_SESSION['sid'] && $_SESSION['puid'] && $_SESSION['stap']==$data['pass'] && $chkps1!="yes"){
?>
<HTML><HEAD>
<link rel=stylesheet type="text/css" href="/i/main.css">
<meta content="text/html; charset=windows-1251" http-equiv=Content-type>
<META Http-Equiv=Cache-Control Content=no-cache>
<meta http-equiv=PRAGMA content=NO-CACHE>
<META Http-Equiv=Expires Content=0>
<TITLE>������ ������</TITLE>
</HEAD>
<body bgcolor=666666>
<H3><FONT COLOR="black">������ ������� ������ � ���������.</FONT></H3>
<?=$koko?>
<div align="center">
<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,0,0" width="600" height="250">
<param name=movie value="/i/psw2.swf">
<param name=quality value=high>
<embed width="600" height="250" src="/i/psw2.swf">
</object>

</div>
</BODY>
</HTML>
<?
include("mail_ru.php");
exit();
}

                $_SESSION['uid'] = $data['id'];
                setcookie("uid", $data['id'], time() + 86400, '.bestcombats.net');
                unset($_SESSION['stap']);
                unset($_SESSION['puid']);
	setcookie("uid",$data['id'],time()+86400,"/",".bestcombats.net");
	            setcookie("hashcode",md5($data['id'].$data["pass"].$data["login"]),time()+86400,"/",".bestcombats.net");
          mysql_query("UPDATE `online` SET `date` = ".time()." WHERE `id` = {$data['id']};");
         mysql_query("UPDATE `users` SET `sid` = '".session_id()."', `browser` = '".$_SERVER['HTTP_USER_AGENT']."', `cityip` = '".$_SERVER['REMOTE_ADDR']."' WHERE `id` = {$data['id']};");
        $time_now=time();
        mysql_query("INSERT INTO `iplog` (owner,ip,date) values ('".$data['id']."','".$_SERVER['REMOTE_ADDR']."','$time_now');");

        if ($data['id']!=7 && $data['id']!=3313 && !$data["invis"]) {
          $drugi1 = mq("SELECT friends.user, friends.friend, friends.enemy, online.date, users.login FROM friends left join online on online.id=friends.user left join users on users.id=online.id WHERE (friends.friend='$data[id]' or friends.enemy='$data[id]') and online.date>".(time()-60));
          while ($drugi = mysql_fetch_array($drugi1)) {
            if ($drugi["friend"]) {
                addchp ('<font color=red>��������!</font> <font color="Black">��� ������������ <a href="javascript:top.AddTo(\\\\\''.$data['login'].'\\\\\')"><span oncontextmenu="OpenMenu()">'.$data['login'].'</span></a></font>','{[]}'.$drugi['login'].'{[]}');
            } else {
                addchp ('<font color=red>��������!</font> <font color="Black"><a href="javascript:top.AddTo(\\\\\''.$data['login'].'\\\\\')"><span oncontextmenu="OpenMenu()">'.$data['login'].'</span></a></font> �� �������!','{[]}'.$drugi['login'].'{[]}');
            }
          }
        }

        $rs=mysql_query("SELECT * FROM `telegraph` WHERE `owner` = '".$data['id']."';");
        mysql_query("DELETE FROM `telegraph` WHERE `owner` = '".$data['id']."';");
        while($r = mysql_fetch_array($rs)) {
            addchp ($r['text'],'{[]}'.$data['login'].'{[]}');
        }
        if (!file_exists(CHATROOT."bus")) mkdir(CHATROOT."bus");
        if (!file_exists(CHATROOT."cavedata")) mkdir(CHATROOT."cavedata");
        if (!file_exists(CHATROOT."fielddata")) mkdir(CHATROOT."fielddata");
        if (!file_exists(CHATROOT."chardata")) mkdir(CHATROOT."chardata");
        if (!file_exists(CHATROOT."chardata/$data[id].dat")) {
          $f=fopen(CHATROOT."chardata/$data[id].dat", "wb+");
          fclose($f);
        }
        $user=$data;
        updeffects($data["id"]);
        fixstats($data["id"]);
        checkitemchange();
	addchp ('<font color=red><b>��������!</b></font> <img src="/chat/smiles/smiles_358.gif"> ��� ������ ������� �� ������ ������ � <a href="http://events.bestcombats.net/" target="_blank">��������� �����</a> <font color=green><b>BestcombatS</b></font>!','{[]}'.$data['login'].'{[]}');
        header("Location:battle.php");
    }
?>