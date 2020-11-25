<?php
include'connect.php';
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="ru" lang="ru">

<head>
<meta name='yandex-verification' content='6d7acbfac7461d47' />
  <meta http-equiv="Content-Type" content="text/html; charset=Windows-1251"/>
<meta name="keywords" content="1px, color, #817a63 1px, 1px double, #817a63, double, #817a63 1px double, font-size, font-family, #d6d3ce 1px, 1px solid, background-color, text-decoration, #d6d3ce, solid, normal, none, #dfddd3, font-weight, border-left, 75pt, verdana, border-bottom, border-top, border-right, white, verdanasans-serifarial, helvetica, #2b2b18, sans-serif,">
  <title>Bestcombats - Браузерная онлайн игра 2012-2013г.</title>
  <link rel="icon" href="http://img.bestcombats.net/favicon.ico" type="image/x-icon">
  <link rel="stylesheet" type="text/css" href="http://img.bestcombats.net/index/css/styles.css"/>
  <script type="text/javascript" src="http://img.bestcombats.net/index/js/functions.js"></script>
  <script type="text/javascript" src="http://img.bestcombats.net/index/js/jquery.js"></script>
  <script type="text/javascript" src="http://img.bestcombats.net/index/js/jquery.flash.js"></script>
<script type="text/javascript">
$(document).ready(function(){

 $("#menu>li>a").click(function(){
 var submenu = $(this).parent("li").find(".submenu");

 if(submenu.is(".submenu")){
 if(submenu.is(":hidden")){
 $(".submenu").slideUp(400);
 submenu.slideDown(400);
 }else{
 submenu.slideUp(400);
 }
 return false;
 }
 });
}); 
</script>
</head>
<body>
<div align="center"> 

		<div class="head-div">

<left>
</div>

<div class="content-page">

 <table id="page_container">
    <tr>
       <td id="container_left"><div class="images"></div></td>

       <td id="container_center"><div class="images"></div></td>

       <td id="container_right"><div class="images"></div></td>


    </tr>
<tr>
 
<td class="block-left">
<div class="navigation-left"><ul id="menu">
<li><a href="index.php"><span>Главная</a></span></li>
<li><a href="/forum.php"><span>Форум</span></a></li>
<li><a href="/register.php"><span>Регистрация</span></a></li>
<li><a href="http://events.bestcombats.net/"><span>Новости</span></a></li>
<li><a href="http://scrolls.bestcombats.net/"><span>Скроллы</span></a></li>
</li>
</ul>
</div>
	<div class="left-private"></div>
<form method=post name=F1 action=enter.php>
<INPUT onfocus="if ( 'Логин' == value ) { value = ''; } " onblur="if ('' == value ) { value = 'Логин'; } " class=inup style="WIDTH: 144px" value=Логин name=login><br>
<INPUT class=inup style="WIDTH: 144px" type=password name=psw AUTOCOMPLETE=off><br>
<INPUT onclick="this.blur(); " class=btn type=submit value=" Войти " style="WIDTH: 144px"></form>
</div>
	<div class="left-sword"></div>

	<div class="left-donate"></div>
	<div><table border="0" width="197" cellspacing="0" cellpadding="0" height="100">
<tr>
<td align="center" valign="top">
<p align="center" style=" margin-top: 10px; margin-bottom: 0">
<span lang="ru"><font size="2" color="#FFCC99">Webmoney</font></span><br>
<span lang="ru"><font size="2" color="#CCCCCC">
Z424723651044<br>
R256342813787<br>
U356391725649<br>
E244122496646</font></span><br>
<span lang="ru"><font size="2" color="#FFCC99">Qiwi</font></span><br>
<span lang="ru"><font size="2" color="#CCCCCC">
+79522060366<br></font></span><br>
<span lang="ru"><font size="2" color="#FFCC99">Yandex Деньги</font></span><br>
<span lang="ru"><font size="2" color="#CCCCCC">410011763674058</font></span>

<p align="center" style=" margin-top: 0; margin-bottom: 5px">
<span lang="ru"><font size="2" color="#CCCCCC">
</font></span>
<p align="center" style=" margin-top: 0; margin-bottom: 5px">
						</td>
					</tr>
				</table> </div>
	<div class="left-donatebox"></div>
 
</td>
 
	
<td rowspan="1" id="page" >
	<div id="content">
<?include'index/news.php';?>
</div>
</td>
 
     <!--begin RIGHT BLOCKS-->
<td class="block-right">

<div class="servers">
                <table>
                  <tr class="gray">
<td>
<?
if($status == true){
echo"Статус сервера <font color=green><b>Online</b></font><br>";
}else{
echo"Статус сервера <font color=red><b>Offline</b></font><br>";
}
$num = mysqli_num_rows(db_query("SELECT `id` FROM `users` WHERE bot not like '1'"));
echo"Игроков:<b> ".$num." </b>чел.<br>";
$numb = mysqli_num_rows(db_query("SELECT `id` FROM `users` WHERE battle>0"));
echo"В поединке:<b> ".$numb." </b>чел.<br>";
$online = mysqli_num_rows(db_query("select * from `online`  WHERE `real_time` >= ".(time()-60).";"));
echo"Онлайн:<b> ".$online." </b>чел.<br>";
?>
</td></tr>

                  </table>
            </div>

	<div class="right-info"></div>
 	
<div class="navigation-right"><ul id="menu2">
<li><a href="http://support.bestcombats.net/"><span>Support</a></span></li>
<li><a href="/rememberpassword.php"><span>Забыли пароль?</a></span></li>
</li>
</ul>
</div>
 
<div class="right-forum"></div></div>
<div class="forum">
</div>


	<div class="right-banner"></div>
</td>
        

    </tr>


    <tr>
     
       <td colspan="7"><div id="footer"></div></td>
    
    </tr>
	
<tr>
     
      <table border="0" width="100%" cellspacing="0" cellpadding="0" height="160" >
	<tr>

		</td>
		<td width="40%" height="160"></td>
	</tr>
</table>    
    </tr>
</table>
</div>
</div>
</div>
</body>
</html>