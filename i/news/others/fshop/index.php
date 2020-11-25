<?
	session_start();
	include "../../connect.php";
	$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$_COOKIE['uid']."' LIMIT 1;"));
	include "../../functions.php";
	$Get_Page="all_fshop";

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="icon" href="/i/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/i/favicon.ico" type="image/x-icon"> 
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>Новости и события Bkwar</title>
<link href="/css/event.css" rel="stylesheet" type="text/css">
<SCRIPT language="JavaScript" src="/js/event.js"></SCRIPT>
<SCRIPT language="JavaScript" src="/js/dm.js"></SCRIPT>
</head>
		<tr>
			<td style="color:red;" colspan="6" align="center"></td>			
		</tr>
	</form>
</table>
	</div>
<BODY onload="MM_preloadImages('/i/menu1at2.gif','/i/menu1at3.gif','/i/menu1at4.gif','/i/menu1at5.gif','/i/menu1at6.gif','/i/menu1at7.gif', '/i/menu1at8.gif');DmInit(); DoDm();">
<TABLE cellSpacing=0 cellPadding=0 width="96%" align=center border=0>
<TR>
<TD background="/i/top_nq_03.jpg">
<table width="100%"  border="0" cellspacing="0" cellpadding="0">
<tr>
<td width="52%" align="left"><a href="/"><img src="/i/top_nq_01.jpg" width="681" height="76" border="0" alt="events.combats.com"></a></td>
<td width="48%" align="left">
<table border="0" width="100%">
<FORM method=post>
<TR>
<TD><font color=white><?if(!empty($user['login'])){echo nick5_1($user['id']);}else{echo'Гость';}?></font></TD></TR>
<TR>
<TD>&nbsp;</TD></TR></FORM>
 
 
</table>
</td></tr></table>
</TD>
</TR>
 

 
<TR>
 <TD>
  <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
   <TR>
   <TD width=1 bgColor=#000000><IMG height=1 src="/i/spacer.gif" width=1></TD>
   <TD align=left background=/i/menu1at1.gif bgColor=#aa0000 style="padding-left:75px;"><A onmouseover="MM_swapImage('news','','/i/menu1at2.gif',1)" onclick=this.blur() onmouseout=MM_swapImgRestore() href="/"><IMG height=36 src="/i/menu1ps2.gif" width=47 border=0 name=news alt="Новости"></A><A onmouseover="MM_swapImage('#','','/i/menu1at3.gif',1)" onclick=this.blur() onmouseout=MM_swapImgRestore() href="#"><IMG height=36 src="/i/menu1ps3.gif" width=42 border=0 name="history" alt="История"></A><A onmouseover="MM_swapImage('status','','/i/menu1at4.gif',1)" onclick=this.blur() onmouseout=MM_swapImgRestore() href="/news/status/"><IMG height=36 src="/i/menu1ps4.gif" width=42 border=0 name="status" alt="Состояние серверов"></A><A onmouseover="MM_swapImage('gallery','','/i/menu1at5.gif',1)" onclick=this.blur() onmouseout=MM_swapImgRestore() href="#"><IMG height=36 src="/i/menu1ps5.gif" width=42 border=0 name="gallery" alt="Галерея"></A><A onmouseover="MM_swapImage('vote','','/i/menu1at7.gif',1)" onclick=this.blur() onmouseout=MM_swapImgRestore() href="#"><IMG height=36 src="/i/menu1ps7.gif" width=41 border=0 name="vote" alt="Голосования"></A><A onmouseover="MM_swapImage('inwork','','/i/menu1at8.gif',1)" onclick=this.blur() onmouseout=MM_swapImgRestore() href="#"><IMG height=36 src="/i/menu1ps8.gif" width=41 border=0 name="inwork" alt="В разработке"></A><A onmouseover="MM_swapImage('release','','/i/menu1at9.gif',1)" onclick=this.blur() onmouseout=MM_swapImgRestore() href="#"><IMG height=36 src="/i/menu1ps9.gif" width=48 border=0 name="release" alt="Вестник Администрации"></A></TD>
   <TD width=1 bgColor=#000000><IMG height=1 src="/i/spacer.gif" width=1></TD>
   </TR>
  </TABLE>
 </TD>
</TR>
 
<tr>
<td>
<TABLE cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
 <TBODY>
  <TR>

 
	<TD vAlign=top align=right width=200 background=/i/lmenu_bagr.gif bgColor=#fffbf7><BR>
 
    <TABLE cellSpacing=0 cellPadding=0 width=195 border=0>
     <TBODY>
      <TR>
       <TD>
        <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
         <TBODY>
          <TR>
           <TD bgColor=#e7dfc4>
            <TABLE cellSpacing=1 cellPadding=0 width="100%" border=0>
             <TBODY>
                         
              <TR bgColor=#fbfaf6>
               <TD>
                            
                <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                 <TBODY>
                  <TR>
                   <TD width=1>
                    <IMG height=22 src="/i/lmenu_1.gif" width=1>
                   </TD>
                   <TD align=left background=/i/lmenu_2.gif>&nbsp;
                    <B>Горячие ссылки</B>
                   </TD>
                   <TD width=1>
                    <IMG height=22 src="/i/lmenu_3.gif" width=1>
                   </TD>
                  </TR>
                 </TBODY>
                </TABLE>
                            
               </TD>
              </TR>
 
              <TR bgColor=#fbfaf6>
               <TD align=middle>
                              
                <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                 <TBODY>
                  <TR>
                   <TD>
                    <TABLE width="100%" align=center border=0>
                     <TBODY>
                      <TR>
                       <TD align=left>  
  <div style="padding: 0px 3px 5px 3px"><a href="http://bestcombats.net/news">Главная страница</a></div>
  
  <div style="padding: 0px 3px 5px 3px"><a href="http://bestcombats.net/forum.php">Форум</a></div>
  
  <div style="padding: 0px 3px 5px 3px"><a href="http://bestcombats.net/scrolls">Скроллы</a></div>
  
  <div style="padding: 0px 3px 5px 3px"><a href="http://bestcombats.net/">Support</a></div>
  
                  </TD>
                      </TR>
                     </TBODY>
                    </TABLE>
                   </TD>
                  </TR>
                 </TBODY>
                </TABLE>
                                
               </TD>
              </TR>
             </TBODY>
            </TABLE>
           </TD>
          </TR>
         </TBODY>
        </TABLE>
       </TD>
      </TR>
               
      <TR>
       <TD align=right>
        <IMG height=10 src="/i/lmenu_down.gif" width=75>
       </TD>
      </TR>
     </TBODY>
    </TABLE><BR>    
<!-- 2 меню -->	
	<TABLE cellSpacing=0 cellPadding=0 width=195 border=0>
     <TBODY>
      <TR>
       <TD>
        <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
         <TBODY>
          <TR>
           <TD bgColor=#e7dfc4>
            <TABLE cellSpacing=1 cellPadding=0 width="100%" border=0>
             <TBODY>
 
              <TR bgColor=#fbfaf6>
               <TD>
 
                <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                 <TBODY>
                  <TR>
                   <TD width=1>
                    <IMG height=22 src="/i/lmenu_1.gif" width=1>
                   </TD>
                   <TD align=left background=/i/lmenu_2.gif>&nbsp;
                   <B>Библиотека:</B>
                   <br><br>
                   </TD>
                   <TD width=1>
                    <IMG height=22 src="/i/lmenu_3.gif" width=1>
                   </TD>
                  </TR>
                 </TBODY>
                </TABLE>
 
               </TD>
              </TR>
 
              <TR bgColor=#fbfaf6>
               <TD align=middle>
               
                <TABLE cellSpacing=0 cellPadding=3 width="98%" border=0>
                 <TBODY>
                  <TR>
                   <TD>
                    <TABLE width="98%" align=center border=0>
                     <TBODY>
                      <TR>
					  <TD align=left> 
						<?include "../../menu_left_bibl.php"?> 	
					 
					  </td>
                       <TD>
               </CENTER>
                       </TD>
                      </TR>
                     </TBODY>
                    </TABLE>
                   </TD>
                  </TR>
                 </TBODY>
                </TABLE>
               </TD>
              </TR>
             </TBODY>
            </TABLE>
           </TD>
          </TR>
         </TBODY>
        </TABLE>
       </TD>
      </TR>
<TR>
<TD align=right><IMG height=10 src="/i/lmenu_down.gif" width=75></TD>
</TR>
</TBODY></TABLE><BR>

<!-- 3 меню) -->
<TABLE cellSpacing=0 cellPadding=0 width=195 border=0>
     <TBODY>
      <TR>
       <TD>
        <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
         <TBODY>
          <TR>
           <TD bgColor=#e7dfc4>
            <TABLE cellSpacing=1 cellPadding=0 width="100%" border=0>
             <TBODY>
 
              <TR bgColor=#fbfaf6>
               <TD>
 
                <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
                 <TBODY>
                  <TR>
                   <TD width=1>
                    <IMG height=22 src="/i/lmenu_1.gif" width=1>
                   </TD>
                   <TD align=left background=/i/lmenu_2.gif>&nbsp;
                   <B>Статистика:</B>
                   <br><br>
                   </TD>
                   <TD width=1>
                    <IMG height=22 src="/i/lmenu_3.gif" width=1>
                   </TD>
                  </TR>
                 </TBODY>
                </TABLE>
 
               </TD>
              </TR>
 
              <TR bgColor=#fbfaf6>
               <TD align=middle>
               
                <TABLE cellSpacing=0 cellPadding=3 width="98%" border=0>
                 <TBODY>
                  <TR>
                   <TD>
                    <TABLE width="98%" align=center border=0>
                     <TBODY>
                      <TR>
					  <TD align=left> 
					  <?include '../../mail_ru.php';?>
					  </td>
                       <TD>
               </CENTER>
                       </TD>
                      </TR>
                     </TBODY>
                    </TABLE>
                   </TD>
                  </TR>
                 </TBODY>
                </TABLE>
               </TD>
              </TR>
             </TBODY>
            </TABLE>
           </TD>
          </TR>
         </TBODY>
        </TABLE>
       </TD>
      </TR>
<TR>
<TD align=right><IMG height=10 src="/i/lmenu_down.gif" width=75></TD>
</TR>
</TBODY></TABLE><BR>
</TD>

<TD vAlign=top bgColor=#ffffff>
<TABLE width="98%" align=center border=0>
<TBODY>
<TR>
<TD class=normaltext align=left valign="top">
                  <TABLE width="100%" border=0>
                    <TBODY>
                    <TR>

<TD vAlign=top bgColor=#ffffff>
<TABLE width="98%" align=left border=0>
<TBODY>
<TR>
<TD class=normaltext align=left valign="top">
 
<div class="page_title"><B>Цветочный Магазин</B></div>
<HR align=center width="90%" color=#aa0000 noShade SIZE=0.1><TABLE width=100% border="0">													  														  
</TD>
</tr>
<tr>
<td>

<center> <h3>Цветоводство</h3></center><p>
<!--Схема Цветочного магазина-->
<b>Схема цветочного магазина:<br><br></b>
<img src="http://bestcombats.net/news/i/flowers-9.jpg" alt=""><br>
<ul><li> Общий зал. Здесь Можете приобрести цветы, траву за кредиты.(см.п.1)<br>
<li> Составление букета. Отсюда вы управляете составление букета. (см.п.2)<br>
<li> Подарить букет. Здесь вы можете подарить букет. (см.п.5)<br></ul>
<br><!--Правила составления букета-->

<b>Правила составления букета:<br></b>
<ul>
<li> Число цветов в букете только 1, 3, 5, 7, 9 или 21.
<li> Букеты составляются только из цветов одного вида.<br>
<li> Не имеет значения в каком городе находится персонаж.<br>
<li> Нельзя отправить букет, если персонаж едет в карете.
<li> Букеты можно отсылать только персонажам, достигшим 4 уровня.<br>
<li> Внимательнее смотрите таблицу: количество цветов и номер травы.<br>
<li> Трава определенного номера обязательно присутствует при составлении букета.<br>

<br>
<br>
<!--Составление букета-->
<b>Этапы составления букета.</b><br><br>

<b>1. Покупка атрибутов букета:<br></b>
<br><img src="http://bestcombats.net/news/i/flowers-1.jpg" alt=""><br><br>
<ul>
<li> Для быстрой покупки нескольких цветов используйте "+", в открывшемся окне укажите количество цветов, которое желаете приобрести.<br>
<li> Не забываем, что букет можно собрать только из цветов одного вида.
</ul>

<b>2. Выбор и добавление атрибутов в букет:<br></b>
<br><img src="http://bestcombats.net/news/i/flowers-8.jpg" alt=""><br>
<ul><li> Для быстрого добавления нескольких цветов используйте "+", в открывшемся окне укажите количество цветов, из которого будет состоять букет.<br>
<li> Добавляем траву определенного номера. (см. таблицу)<br>
</ul>


<b>3. Проверка составления букета:<br></b>
<br><img src="http://bestcombats.net/news/i/flowers-6.jpg" alt=""><br>
<ul>
<li> Проверяем количество цветов.<br>
<li> Проверяем наличие травы и соответсвует ли она количеству цветов (см. таблицу).<br>
<li> Если что-то не совпадает, то используем кнопку "Убрать".<br>
<li> Если все отлично, то кликаем "Собрать букет".
</ul>

<b>4. Оцениваем результат своего труда:<br></b>
<br><img src="http://bestcombats.net/news/i/flowers-7.jpg" alt=""><br>
<ul>
<li> Если выдается что-то подобное, то можно Вас поздравить и переходим к пункту 5.<br>
<li> Если у вас что-то по-другому, то придется потратиться ещё и внимательнее прочитать предыдущие пункты.
</ul>

<b>5. Заполняем форму и дарим букет:<br></b>
<br><img src="http://bestcombats.net/news/i/flowers-5.jpg" alt=""><br>
<ul>
<li> Букет у нас в рюкзаке и теперь заполним форму для его отправления к адресату:<br>
 1. Указываем имя героя, которому хотим отправить букет.<br>
 2. Пишем фразу, которая будет отображаться при наведении курсора мыши на букет(не более 60 символов).<br>
 3. Вписываем то, что будет видеть только тот, кому мы отправляем букет.<br>
 4. Выбираем, как будет подписан наш букет.<br>
 5. Кликаем на кнопку "Подарить" под букетом, который хотим подарить.
<li> Букет отправлен удачно или будет выведено сообщение об ошибке.
<br><br><img src="http://bestcombats.net/news/i/flowers-62.jpg" alt="">
</ul>


<b>Просмотр отправленного букета:<br></b>
<br><img src="http://bestcombats.net/news/i/flowers-4.jpg" alt=""><br>
<ul>
<li> Для этого открываем информации того, кому подарили букет.<br>
<li> Для прочтения надписи на букете наводим курсор мыши на букет.<br>
<li> Радуемся тому, что мы только что сделали.<br>
<li> Спасибо за внимание.
</ul>


<!--Составление таблицы букетов-->

<br>
<b>Таблица составления букетов:</b>
<br>
<p><table align=center width=95% bgcolor=#eeeeee cellSpacing=1 cellPadding=4 border=0>

<!--Трава-->
<tr bgcolor=#f1f1f1 align=center><td class=medium>количество цветов в букете</td>
<td class=medium>3</td>
<td class=medium>5</td>
<td class=medium>7</td>
<td class=medium>9</td>
<td class=medium>21</td></tr>
<tr bgcolor=#f1f1f1 align=center><td>-</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/f_design1.gif" alt=""><br>трава 1<br>Цена: 0,1 кр.</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/f_design2.gif" alt=""><br>трава 2<br>Цена: 0,3 кр.</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/f_design3.gif" alt=""><br>трава 3<br>Цена: 0,5 кр.</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/f_design4.gif" alt=""><br>трава 4<br>Цена: 1 кр.</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/f_design5.gif" alt=""><br>трава 5<br>Цена: 5 кр.</td></tr>

<!--Тюльпаны-->

<tr bgcolor=#f1f1f1 align=center valign=top><td class=medium><b>Тюльпан</b><br><img src="http://img.bestcombats.net/i/sh/f_tulip.gif" alt=""><br>Цена: 5 кр.<br>Срок жизни: 3 дня</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/tulip3.gif" alt="Букет тюльпанов 3"><br>Цена: 15,1 кр.<br>• Минимальное наносимое повреждение: +1<br>• Максимальное наносимое повреждение: +3</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/tulip5.gif" alt="Букет тюльпанов 5"><br>Цена: 25,3 кр.<br>• Минимальное наносимое повреждение: +1<br>• Максимальное наносимое повреждение: +5</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/tulip7.gif" alt="Букет тюльпанов 7"><br>Цена: 35,5 кр.<br>• Минимальное наносимое повреждение: +1<br>• Максимальное наносимое повреждение: +7</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/tulip9.gif" alt="Букет тюльпанов 9"><br>Цена: 46 кр.<br>• Минимальное наносимое повреждение: +1<br>• Максимальное наносимое повреждение: +9<br>• Мф. увертывания (%): +1</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/tulip21.gif" alt="Букет тюльпанов 21"><br>Цена: 110 кр.<br>• Минимальное наносимое повреждение: +1<br>• Максимальное наносимое повреждение: +21<br>• Мф. увертывания (%): +5</td></tr>

<!--Нарциссы-->

<tr bgcolor=#f1f1f1 align=center valign=top><td class=medium><b>Нарцисс</b><br><img src="http://img.bestcombats.net/i/sh/f_narcissus.gif" alt=""><br>Цена: 5 кр.<br>Срок жизни: 5 дней</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/narcissus3.gif" alt="Букет нарциссов 3"><br>Цена: 15,1 кр.<br>• Минимальное наносимое повреждение: +1<br>• Максимальное наносимое повреждение: +3</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/narcissus5.gif" alt="Букет нарциссов 5"><br>Цена: 25,3 кр.<br>• Минимальное наносимое повреждение: +1<br>• Максимальное наносимое повреждение: +5</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/narcissus7.gif" alt="Букет нарциссов 7"><br>Цена: 35,5 кр.<br>• Минимальное наносимое повреждение: +1<br>• Максимальное наносимое повреждение: +7 </td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/narcissus9.gif" alt="Букет нарциссов 9"><br>Цена: 46 кр.<br>• Минимальное наносимое повреждение: +1<br>• Максимальное наносимое повреждение: +9<br>• Мф. против увертывания (%): +2</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/narcissus21.gif" alt="Букет нарциссов 21"><br>Цена: 110 кр.<br>• Минимальное наносимое повреждение: +1<br>• Максимальное наносимое повреждение: +21<br>• Мф. против увертывания (%): +5</td></tr>

<!--Хризантемы-->

<tr bgcolor=#f1f1f1 align=center valign=top><td class=medium><b>Хризантема</b><br><img src="http://img.bestcombats.net/i/sh/f_chrysanthemum.gif" alt=""><br>Цена: 7 кр.<br>Срок жизни: 3 дня</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/chrysanthemum3.gif" alt="Букет хризантем 3"><br>Цена: 21,1 кр.<br>• Минимальное наносимое повреждение: +2<br>• Максимальное наносимое повреждение: +6</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/chrysanthemum5.gif" alt="Букет хризантем 5"><br>Цена: 35,3 кр.<br>• Минимальное наносимое повреждение: +2<br>• Максимальное наносимое повреждение: +6</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/chrysanthemum7.gif" alt="Букет хризантем 7"><br>Цена: 49,5 кр.<br>• Минимальное наносимое повреждение: +2<br>• Максимальное наносимое повреждение: +10</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/chrysanthemum9.gif" alt="Букет хризантем 9"><br>Цена: 64 кр.<br>• Минимальное наносимое повреждение: +2<br>• Максимальное наносимое повреждение: +12<br>• Мф. критического удара (%): +5</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/chrysanthemum21.gif" alt="Букет хризантем 21"><br>Цена: 152 кр.<br>• Минимальное наносимое повреждение: +2<br>• Максимальное наносимое повреждение: +24<br>• Мф. критического удара (%): +10</td></tr>

<!--Гортензии-->

<tr bgcolor=#f1f1f1 align=center valign=top><td class=medium><b>Гортензия</b><br><img src="http://img.bestcombats.net/i/sh/f_hydrangea.gif" alt=""><br>Цена: 10 кр.<br>Срок жизни: 10 дней</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/hydrangea3.gif" alt="Букет гортензий 3"><br>Цена: 30,1 кр.<br>• Минимальное наносимое повреждение: +3<br>• Максимальное наносимое повреждение: +7</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/hydrangea5.gif" alt="Букет гортензий 5"><br>Цена: 50,3 кр.<br>• Минимальное наносимое повреждение: +3<br>• Максимальное наносимое повреждение: +9</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/hydrangea7.gif" alt="Букет гортензий 7"><br>Цена: 70,5 кр.<br>• Минимальное наносимое повреждение: +3<br>• Максимальное наносимое повреждение: +11</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/hydrangea9.gif" alt="Букет гортензий 9"><br>Цена: 91 кр.<br>• Минимальное наносимое повреждение: +3<br>• Максимальное наносимое повреждение: +13<br>• Мф. увертывания (%): +10</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/hydrangea21.gif" alt="Букет гортензий 21"><br>Цена: 215 кр.<br>• Минимальное наносимое повреждение: +3<br>• Максимальное наносимое повреждение: +25<br>• Мф. увертывания (%): +10<br>• Мф. против увертывания (%): +10</td></tr>

<!--Жёлтые розы-->

<tr bgcolor=#f1f1f1 align=center valign=top><td class=medium><b>Желтая роза</b><br><img src="http://img.bestcombats.net/i/sh/f_yrose.gif" alt=""><br>Цена: 10 кр.<br>Срок жизни: 7 дней</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/yrose3.gif" alt="Букет желтых роз 3"><br>Цена: 30,1 кр.<br>• Минимальное наносимое повреждение: +3<br>• Максимальное наносимое повреждение: +7</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/yrose5.gif" alt="Букет желтых роз 5"><br>Цена: 50,3 кр.<br>• Минимальное наносимое повреждение: +3<br>• Максимальное наносимое повреждение: +9</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/yrose7.gif" alt="Букет желтых роз 7"><br>Цена: 70,5 кр.<br>• Минимальное наносимое повреждение: +3<br>• Максимальное наносимое повреждение: +11</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/yrose9.gif" alt="Букет желтых роз 9"><br>Цена: 91 кр.<br>• Минимальное наносимое повреждение: +3<br>• Максимальное наносимое повреждение: +13<br>• Мф. против критического удара (%): +5</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/yrose21.gif" alt="Букет желтых роз 21"><br>Цена: 215 кр.<br>• Минимальное наносимое повреждение: +3<br>• Максимальное наносимое повреждение: +25<br>• Мф. против критического удара (%): +10</td></tr>

<!--Лотосы-->

<tr bgcolor=#f1f1f1 align=center valign=top><td class=medium><b>Лотос</b><br><img src="http://img.bestcombats.net/i/sh/f_lotus.gif" alt=""><br>Цена: 10 кр.<br>Срок жизни: 5 дней</td>
<td><img src="http://img.bestcombats.net/i/sh/fp_lotus_3sdcfse.gif" alt="Букет лотосов 3"><br>Цена: 30,1 кр.<br>• Минимальное наносимое повреждение: +1<br>• Максимальное наносимое повреждение: +3</td>
<td><img src="http://img.bestcombats.net/i/sh/fp_lotus_5.gif" alt="Букет лотосов 5"><br>Цена: 50,3 кр.<br>• Минимальное наносимое повреждение: +2<br>• Максимальное наносимое повреждение: +5</td>
<td><img src="http://img.bestcombats.net/i/sh/fp_lotus_7vsw.gif" alt="Букет лотосов 7"><br>Цена: 70,5 кр.<br>• Минимальное наносимое повреждение: +4<br><br>• Максимальное наносимое повреждение: +8<br>• Мф. увертывания (%): +10</td>
<td><img src="http://img.bestcombats.net/i/sh/fp_lotus_9verg.gif" alt="Букет лотосов 9"><br>Цена: 91 кр.<br>• Минимальное наносимое повреждение: +5<br><br>• Максимальное наносимое повреждение: +15<br>• Мф. увертывания (%): +10</td>
<td><img src="http://img.bestcombats.net/i/sh/fp_lotus_21svs.gif" alt="Лотос"><br>Цена: 215 кр.<br>• Минимальное наносимое повреждение: +5<br><br>• Максимальное наносимое повреждение: +20<br>• Мф. увертывания (%): +15<br><br>• Мф. против увертывания (%): +10</td></tr>

<!--Ландыши-->

<tr bgcolor=#f1f1f1 align=center valign=top><td class=medium><b>Ландыш</b><br><img src="http://img.bestcombats.net/i/sh/fp_landish1.gif" alt=""><br>Цена: 8 кр.<br>Срок жизни: 3 дня</td>
<td><img src="http://img.bestcombats.net/i/sh/fp_landish3sdfsdf.gif" alt="Букет ландышей 3"><br>Цена: 24,1 кр.<br>• Минимальное наносимое повреждение: +1<br>• Максимальное наносимое повреждение: +3</td>
<td><img src="http://img.bestcombats.net/i/sh/fp_landish5.gif" alt="Букет ландышей 5"><br>Цена: 40,3 кр.<br>• Минимальное наносимое повреждение: +2<br>• Максимальное наносимое повреждение: +5</td>
<td><img src="http://img.bestcombats.net/i/sh/fp_landish7dv9.gif" alt="Букет ландышей 7"><br>Цена: 56,5 кр.<br>• Минимальное наносимое повреждение: +4<br><br>• Максимальное наносимое повреждение: +8<br>• Мф. против критического удара (%): +5</td>
<td><img src="http://img.bestcombats.net/i/sh/fp_landish9sd5qx.gif" alt="Букет ландышей 9"><br>Цена: 73 кр.<br>• Минимальное наносимое повреждение: +5<br><br>• Максимальное наносимое повреждение: +10<br>• Мф. против критического удара (%): +5<br><br>• Мф. против увертывания (%): +10</td>
<td><img src="http://img.bestcombats.net/i/sh/fp_landish21d348j.gif" alt="Букет ландышей 21"><br>Цена: 173 кр.<br>• Минимальное наносимое повреждение: +7<br>• Максимальное наносимое повреждение: +15<br><br>• Мф. против критического удара (%): +15<br><br>• Мф. против увертывания (%): +15</td></tr>

<!--Магнолии-->

<tr bgcolor=#f1f1f1 align=center valign=top><td class=medium><b>Магнолия</b><br><img src="http://img.bestcombats.net/i/sh/f_magnolia.gif" alt=""><br>Цена: 10 кр.<br>Срок жизни: 7 дней</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_magnolia3dg3f.gif" alt="Букет магнолий 3"><br>Цена: 30,1 кр.<br>• Минимальное наносимое повреждение: +3<br>• Максимальное наносимое повреждение: +5</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_magnolia5.gif" alt="Букет магнолий 5"><br>Цена: 50,3 кр.<br>• Минимальное наносимое повреждение: +3<br>• Максимальное наносимое повреждение: +7</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_magnolia7cvs9.gif" alt="Букет магнолий 7"><br>Цена: 70,5 кр.<br>• Минимальное наносимое повреждение: +3<br>• Максимальное наносимое повреждение: +10</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_magnolia9v34t.gif" alt="Букет магнолий 9"><br>Цена: 91 кр.<br>• Минимальное наносимое повреждение: +3<br>• Максимальное наносимое повреждение: +15<br>• Мф. увертывания (%): +15</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_magnolia21gew3.gif" alt="Букет магнолий 21"><br>Цена: 215 кр.<br>• Минимальное наносимое повреждение: +3<br>• Максимальное наносимое повреждение: +25<br>• Мф. увертывания (%): +15</td></tr>

<!--Лилии-->

<tr bgcolor=#f1f1f1 align=center valign=top><td class=medium><b>Лилия</b><br><img src="http://img.bestcombats.net/i/sh/f_lillyp.gif" alt=""><br>Цена: 10 кр.<br>Срок жизни: 7 дней</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_lillyp3.gif" alt="Букет лилий 3"><br>Цена: 30,1 кр.<br>• Минимальное наносимое повреждение: +1<br>• Максимальное наносимое повреждение: +3</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_lillyp5.gif" alt="Букет лилий 5"><br>Цена: 50,3 кр.<br>• Минимальное наносимое повреждение: +2<br>• Максимальное наносимое повреждение: +5</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_lillyp7lgfdd.gif" alt="Букет лилий 7"><br>Цена: 70,5 кр.<br>• Минимальное наносимое повреждение: +2<br>• Максимальное наносимое повреждение: +10</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_lillyp9.gif" alt="Букет лилий 9"><br>Цена: 91 кр.<br>• Минимальное наносимое повреждение: +4<br><br>• Максимальное наносимое повреждение: +14<br>• Мф. критического удара (%): +10<br><br>• Мф. увертывания (%): +10</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_lillyp21mxx92.gif" alt="Букет лилий 21"><br>Цена: 215 кр.<br>• Минимальное наносимое повреждение: +5<br><br>• Максимальное наносимое повреждение: +17<br>• Мф. критического удара (%): +20<br><br>• Мф. увертывания (%): +20</td></tr>

<!--Камелии-->

<tr bgcolor=#f1f1f1 align=center valign=top><td class=medium><b>Камелия</b><br><img src="http://angelscity.combats.ru/i/f_sasanqua.gif" alt=""><br>Цена: 7 кр.<br>Срок жизни: 5 дней</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_kantubaki3ki3.gif" alt="Букет камелий 3"><br>Цена: 21,1 кр.<br>• Минимальное наносимое повреждение: +1<br>• Максимальное наносимое повреждение: +3</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_kantubaki5.gif" alt="Букет камелий 5"><br>Цена: 35,3 кр.<br>• Минимальное наносимое повреждение: +6<br>• Максимальное наносимое повреждение: 6</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_kantubaki7.gif" alt="Букет камелий 7"><br>Цена: 50 кр.<br>• Минимальное наносимое повреждение: +4<br>• Максимальное наносимое повреждение: +8</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_kantubaki9.gif" alt="Букет камелий 9"><br>Цена: 68 кр.<br>• Минимальное наносимое повреждение: +5<br><br>• Максимальное наносимое повреждение: +10<br>• Мф. критического удара (%): +10</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_kantubaki21mcmk4.gif" alt="Букет камелий 21"><br>Цена: 152 кр.><br>• Минимальное наносимое повреждение: +15<br><br>• Максимальное наносимое повреждение: +15<br>• Мф. критического удара (%): +15<br><br>• Мф. против критического удара (%): +10</td></tr>

<!--Космеи-->

<tr bgcolor=#f1f1f1 align=center valign=top><td class=medium><b>Космея</b><br><img src="http://angelscity.combats.ru/i/f_cosmos.gif" alt=""><br>Цена: 20 кр.<br>Срок жизни: 15 дней</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_cosmos3.gif" alt="Букет космей 3"><br>Цена: 60,1 кр.<br>• Минимальное наносимое повреждение: +1<br><br>• Максимальное наносимое повреждение: +3</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_cosmos5.gif" alt="Букет космей 5"><br>Цена: 100,3 кр.<br>• Минимальное наносимое повреждение: +5<br><br>• Максимальное наносимое повреждение: +7<br>• Мф. против критического удара (%): +10</td>
<td class=medium>-</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_cosmos9.gif" alt="Букет космей 9"><br>Цена: 181 кр.<br>• Минимальное наносимое повреждение: +7<br><br>• Максимальное наносимое повреждение: +10<br>• Мф. против критического удара (%): +15</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_cosmos21sdf3j.gif" alt="Букет космей 21"><br>Цена: 425 кр.<br>• Минимальное наносимое повреждение: +5<br><br>• Максимальное наносимое повреждение: +20<br>• Мф. против критического удара (%): +20</td></tr>

<!--Сирень-->

<tr bgcolor=#f1f1f1 align=center valign=top><td class=medium><b>Сирень</b><br><img src="http://img.bestcombats.net/i/sh/siren_1.gif" alt=""><br>Цена: 7 кр.<br>Срок жизни: 3 дня</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/siren_3.gif" alt="Букет хризантем 3"><br>Цена: 21,1 кр.<br>• Минимальное наносимое повреждение: +2<br>• Максимальное наносимое повреждение: +6</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/siren_5.gif" alt="Букет хризантем 5"><br>Цена: 35,3 кр.<br>• Минимальное наносимое повреждение: +3<br>• Максимальное наносимое повреждение: +7 </td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/siren_7.gif" alt="Букет хризантем 7"><br>Цена: 49,5 кр.<br>• Минимальное наносимое повреждение: +2<br>• Максимальное наносимое повреждение: +10</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/siren_9.gif" alt="Букет хризантем 9"><br>Цена: 64 кр.<br>• Минимальное наносимое повреждение: +2<br>• Максимальное наносимое повреждение: +12<br>• Мф. критического удара (%): +5</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/siren_21.gif" alt="Букет хризантем 21"><br>Цена: 152 кр.<br>• Минимальное наносимое повреждение: +2<br>• Максимальное наносимое повреждение: +24<br>• Мф. критического удара (%): +10</td></tr>

<!--Рихардия-->

<tr bgcolor=#f1f1f1 align=center valign=top><td class=medium><b>Рихардия</b><br><img src="http://img.bestcombats.net/i/sh/cally_1.gif" alt=""><br>Цена: 10 кр.<br>Срок жизни: 3 дня</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/cally_3.gif" alt="Букет Рихардий 3"><br>Цена: 30,1 кр.<br>• Минимальное наносимое повреждение: +2<br>• Максимальное наносимое повреждение: +6</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/cally_5.gif" alt="Букет Рихардий 5"><br>Цена: 50,3 кр.<br>• Минимальное наносимое повреждение: +2<br>• Максимальное наносимое повреждение: +6 </td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/cally_7.gif" alt="Букет Рихардий 7"><br>Цена: 70,5 кр.<br>• Минимальное наносимое повреждение: +2<br>• Максимальное наносимое повреждение: +10</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/cally_9.gif" alt="Букет Рихардий 9"><br>Цена: 91 кр.<br>• Минимальное наносимое повреждение: +2<br>• Максимальное наносимое повреждение: +12<br>• Мф. критического удара (%): +5</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/cally_21.gif" alt="Букет Рихардий 21"><br>Цена: 215 кр.<br>• Минимальное наносимое повреждение: +2<br>• Максимальное наносимое повреждение: +24<br>• Мф. критического удара (%): +10</td></tr>

<!--Красные розы-->

<tr bgcolor=#f1f1f1 align=center valign=top><td class=medium><b>Красная роза</b><br><img src="http://img.bestcombats.net/i/sh/f_rose.gif" alt=""><br>Цена: 10 кр.<br>Срок жизни: 7 дней</td>
<td class=medium>-</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_rose_5eudmje.gif" alt="Букет красных роз 5"><br>Цена: 50,3 кр.<br>• Минимальное наносимое повреждение: +3<br>• Максимальное наносимое повреждение: +9</td>
<td class=medium>-</td>
<td class=medium>-</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_rose_21dfioehjf.gif" alt="Букет красных роз 21"><br>Цена: 215 кр.<br>• Минимальное наносимое повреждение: +3<br>• Максимальное наносимое повреждение: +25<br>• Мф. против критического удара (%): +10</td></tr>

</table>
</td>
</tr>
</table>
</td>
</tr>


</table>


</td>
</tr>


		</div>
	</div>
</div>
<table width="98%">
 <tr height="20">
  <td width="100%" align="right"></td>
 </tr>
 <tr>
    <td align="right"><font color="#6B6B6B">        
   
  </font>
 </td></tr>
</table><table width="98%" border="0" cellpadding="0" cellspacing="0" align="center">
<META content="MSHTML 6.00.2600.0" name=GENERATOR></HEAD>
<BODY bottomMargin=0 vLink=#333333 aLink=#000000 link=#000000  leftMargin=0 topMargin=0 rightMargin=0 marginheight="0" marignwidth="0">
<TABLE height="100%" cellSpacing=0 cellPadding=0 width="100%" border=0>
  <TBODY>
  <TR>
    <TD vAlign=top width="70%">
      <TABLE cellSpacing=0 cellPadding=0 width="100%"  border=0><TBODY>
        <TR>
          <TD vAlign=top width="10%">
			 <CENTER>
            <TABLE width="88%" border=0>
              <TBODY>
              <TR>
	     <A name=answer></A>
            
              <TBODY>
              <TR>
                <TD>
              <TR>
                <TD>

                </TD></TR></FORM></TBODY></TABLE>
            <P> <BR><BR></P></TD></TR>
				</BODY>

</td>


   </table>
  </td>
 </tr>
</table>
        
    
    
  </font>
 </td></tr>
</table><TABLE cellSpacing=3 cellPadding=4 width="100%" border=0>

        <tr><td width="20%" align="left"><nobr>
        &nbsp;        </nobr></td> </td>
</TBODY>
</TABLE><BR>
</TD>

 
                      <tr bgcolor="#fbfaf6">
                        <td align="middle"><table border="0" cellpadding="3" cellspacing="0" width="98%">
                            <tbody>
                              <tr>
                                <td><table align="center" border="0" width="98%">
                                    <tbody>
                                      <tr>
                                        <td>
                                        </td>
                                      </tr>
                                    </tbody>
                                </table></td>
                              </tr>
                            </tbody>
                        </table></td>
                      </tr>
                    </tbody>
					
                 </table>
			
                 </tr>
                  </tbody>
                   </table>
                  
                  </td>
              </tr>
              </tbody>
            </table>

<!--End of right table--></TD>
 
 
</TD></TD>
<TD width=1 bgColor=#000000><IMG height=1 src="/i/spacer.gif" width=1></TD></TR></TBODY></TABLE></TD></TR><TR><TD>
<TABLE cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
<TBODY>
<TR>
<TD width=1 bgColor=#000000><IMG height=1 src="/i/spacer.gif" width=1></TD>
<TD vAlign=top align=middle background=/i/down_line.gif bgColor=#aa0000><IMG height=17 src="/i/down_line.gif" width=7></TD>
<TD width=1 bgColor=#000000><IMG height=1 src="/i/spacer.gif" width=1></TD></TR></TBODY></TABLE></TD></TR><TR><TD>
<TABLE cellSpacing=0 cellPadding=0 width="100%" align=center border=0>
<TBODY>
<TR>
<TD width=1 bgColor=#000000><IMG height=1 src="/i/spacer.gif" width=1></TD>
<TD vAlign=top bgColor=#000000><IMG height=1 src="/i/spacer.gif" width=1></TD>
<TD width=1 bgColor=#000000><IMG height=1 src="/i/spacer.gif" width=1></TD></TR></TBODY></TABLE></TD></TR></TABLE>
 
</BODY>
</HTML>