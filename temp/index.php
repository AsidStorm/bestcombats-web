<?
if (1) {
  define("IMGBASE","");
  define("IMGNUM","");
} else {
  define("IMGBASE","http://62.109.23.92");
  define("IMGFN","_rm");
}
if(!empty($_GET['exit'])){session_start(); session_destroy();}
?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<title>Virt-Life | ���� ����������� ����� | ������ ���������� ���� | OldBK | ������ �� | �� | ������ | ���� | ���������� ���� | ��������� | ���������� ����</title>
<meta http-equiv="content-type" content="text/html; charset=Windows-1251" />
<meta name="author" content="virt-life.com" />
<meta name="description" content="���� ����������� ���� ����� � ���� ! ��� ������� �� ������� ? ������� ����� � �������� ���� ���� ! ��� �� ������ - ������ ��� ������� ����� ?
�������� ������� � ����, ���, �������� !
����� ������� � ������� - ���� ��������� ����������� � ����������� !" />
<meta name="keywords" content="��, combats, ��� ��, ������ ���������� ����, ���������� ����, �������, �������� ��, �� 2003, ����� ������, ��������, ������ ����, ������ ��, ������ ���������� ����, ����������" />
<meta http-equiv="imagetoolbar" content="no" />
<meta http-equiv="Page-Enter" content="revealTrans(Duration=2,Transition=23)" />
<style>
td, body {margin:0px;color:#4c0c0c;font-family:ms sans serif;font-size:16px;font-weight:bold}
a {color:#4c0c0c;font-family:ms sans serif;font-size:16px;text-decoration:none;font-weight:bold}
a:hover {text-decoration:underline}
input {width:150px;height:20px;background-color:#ffffff;border:0px}
img {width:auto;border:none;behavior: url('pngbehavior.htc');}
</style>
</head>
<body bgcolor="#000000">
<div style="background-image:url(<?=IMGBASE?>/i/lbg.jpg);background-repeat:no-repeat"><div style="background-image:url(<?=IMGBASE?>/i/rbg.jpg);background-position:top right;background-repeat:no-repeat">
<div style="position:absolute;left:0px;top:0px" id=swf1><OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
          codebase="http://active.macromedia.com/flash2/cabs/swflash.cab#version=4,0,0,0"
          ID=_lk3 WIDTH=232 HEIGHT=624><PARAM NAME=movie VALUE="<?=IMGBASE?>/i/sword.swf">
          <PARAM NAME=quality VALUE=high>
          <PARAM NAME=loop VALUE=true>
          <PARAM NAME=bgcolor value="#000000">
          <EMBED src="<?=IMGBASE?>/i/sword.swf" loop=true quality=high bgcolor="#000000"
           WIDTH=232 HEIGHT=624 TYPE="application/x-shockwave-flash" style="background:transparent"
           PLUGINSPAGE="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash">
          </EMBED>
  </OBJECT></div>
  
<div style="position:absolute;right:0px;top:0px">
<OBJECT classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"
          codebase="http://active.macromedia.com/flash2/cabs/swflash.cab#version=4,0,0,0"
          ID=_lk3 WIDTH=290 HEIGHT=358><PARAM NAME=movie VALUE="<?=IMGBASE?>/i/wizard.swf">
          <PARAM NAME=quality VALUE=high>
          <PARAM NAME=loop VALUE=true>
          <EMBED src="<?=IMGBASE?>/i/wizard.swf" loop=true quality=high style="background:transparent"
           WIDTH=290 HEIGHT=358 TYPE="application/x-shockwave-flash"
           PLUGINSPAGE="http://www.macromedia.com/shockwave/download/index.cgi?P1_Prod_Version=ShockwaveFlash">
          </EMBED>
</OBJECT>
</div>

<div id="marquee1" style="font-family:arial black;position:absolute; overflow:hidden; left:330px; top:30px; width:340px; height:27px; z-index:3;color:#ffffff">
<marquee id="marquee11" width="340" height="27"><?
  include "newdata.php";
  foreach ($news as $k=>$v) {
    $v=str_replace("<br>","",$v);
    echo "���������� $k: $v";
    break;
  }
?></marquee></div>
  
  
<div style="width:990px;height:581px;margin-left:auto;margin-right:auto;position:relative;">
<center>
<br><br><br><br><br><img src="<?=IMGBASE?>/i/fc.png" width="395" height="114" style="width:395px;height:114px">
</center>
<center>
<br><br><br>
</center>
<img src="<?=IMGBASE?>/i/formbg.gif" style="position:absolute;left:377px;top:254px" width="254" height="147">
<img src="<?=IMGBASE?>/i/linksbg.gif" style="position:absolute;left:320px;top:494px" onclick="this.style.visibility='hidden'" width="379" height="74">
<form style="position:absolute;left:386px;top:285px" action="/enter.php" method="POST" name="form1">
<table>
<tr><td align="right">�����&nbsp;&nbsp;</td><td><input type="text" name="login"></td></tr>
<tr><td style="font-size:10px">&nbsp;</td></tr>
<tr><td align="right">������&nbsp;&nbsp;</td><td><input type="password" name="psw"></td></tr>
<tr><td colspan="2" align="center" height="25">
<a href="javascript:void(0)" onclick="document.form1.submit();return false;">�����</a>
</td></tr>
<tr><td colspan="2" align="center" height="75">
<a href="register.php">�����������</a>
&nbsp;&nbsp;&nbsp;
<a href="rememberpassword.php">������ ������</a>
</td></tr>
<tr><td colspan="2" align="center"><div style="position:relative;top:-10px;"><?include('mail_ru.php')?></div></td></tr>
</table>
<input style="background-color:none;width:1px;height:1px;background-color:transparent" type="image" src="<?=IMGBASE?>/i/empty.gif">
</form>

<div style="position:absolute;left:446px;top:520px">
<a href="forum.php" target="_blank">�����</a>
&nbsp;&nbsp;&nbsp;
<a href="news.php" target="_blank">�������</a>
</div>
</div>
</div>
</div>
<script>
//335 wd 340
  function setwidth() {
    document.getElementById('marquee1').style.width=(screen.width-660)+'px';
    document.getElementById('marquee11').width=screen.width-660;
    
    wd=document.documentElement.clientWidth;    
    document.getElementById('marquee1').style.width=(wd-660)+'px';
    document.getElementById('marquee11').width=wd-660;
  }
  setwidth();
  window.onresize=setwidth;
</script>
</body></html>