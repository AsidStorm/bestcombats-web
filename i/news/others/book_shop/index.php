<?
	session_start();
	include "../../connect.php";
	$user = mysqli_fetch_array(db_query("SELECT * FROM `users` WHERE `id` = '".$_COOKIE['uid']."' LIMIT 1;"));
	include "../../functions.php";
	$Get_Page="all_bookshop";

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="icon" href="/i/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/i/favicon.ico" type="image/x-icon"> 
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
  <<div style="padding: 0px 3px 5px 3px"><a href="http://bestcombats.net/news">Главная страница</a></div>
  
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
 
<div class="page_title"><B>Книжный магазин</B></div>
<HR align=center width="90%" color=#aa0000 noShade SIZE=0.1><TABLE width=100% border="0">													  														  
<TABLE class=BL>
<TR><TD>
        Слева от Центральной Площади <SPAN title="Capital"><IMG src="<?=IMG_PATH?>/i/sh/fo1.gif" width=17 height=16 border=0></SPAN><B>Столицы</B>, на Локации "Новая Земля", в скромном сером особнячке расположен единственный на данный момент в <B>Бойцовском Клубе</B> <B>Книжный магазин</B>:<br />
<br />
<DIV style="text-align: center;"><IMG SRC="http://bestcombats.net/i/city/4_bkm.gif" border=0></DIV><br />
<br />
Так уж повелось, что посещают его в основном не книголюбы и букинисты, а те, кто хочет, почерпнув в книгах тайные знания, стать более сильным, ловким, боеспособным.<br />
<br />
Первыми книгами, появившимися в клубе, были книги <b>Саныча</b>. Позже полки магазина пополнились новыми "печатными изданиями".<br />
<br />
Все книги связываются со своим владельцем <IMG SRC="http://img.combats.com/i/destiny.gif" border=0><B>общей судьбой</B>, и никто другой не сможет ее использовать.<br />
<br />
Купив книгу и использовав ее, воин приступает к изучению нового, доселе недоступного ему приема, которое занимает около десяти часов. (Время, когда вы спите в общаге, естественно, временем обучения не считается)<br />
<br />
Закончив обучение, вы получаете возможность использовать в бою какой-либо новый прием.<br />
<br />
Свойствам книг, ценам, а так же возможностям полученным в результате изучения приемов и посвящен данный раздел.<br />
<br />
<div style="margin:0; margin-top:8px"><div style="margin-bottom:4px"><input type="button" value="Боевые приемы" onClick="if (this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display != '') { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = ''; this.innerText = ''; this.value = 'Скрыть'; } else { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = 'none'; this.innerText = ''; this.value = 'Боевые приемы'; }"></div><div ><div style="display: none;"><br />
<br />
<TABLE class=BL>
<TABLE class="ST" cellspacing="1">
<tr>
    <TH><DIV style="text-align: left;"><B>Книга</B></DIV></TD>
    <TH><DIV style="text-align: center;"><B>Свойства книги</B></DIV></TD>
    <TH><DIV style="text-align: center;"><B>Прием, получаемый в результате <br />
изучения книги</B></DIV></TD>
</tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/booklearn_1.gif" border=0></td>
    <td> <B>Хлебнуть Крови (прием)</B>   (Масса: 1)<br />
<b>Цена: 22.5 кр. </b><br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B> <br />
• Интуиция: 25 <br />
• Уровень: 6 <br />
<small>Описание: <br />
В инструкции подробно раскрывается тема здорового питания кровью поверженных врагов</small> <br />
Обучает приему: <b>Хлебнуть Крови</b><br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/krit_blooddrink.gif" border=0><br />
<B>Хлебнуть Крови </B><br />
<IMG SRC="http://img.combats.ru/i/misc/micro/krit.gif" border=0> 7, <IMG SRC="http://img.combats.ru/i/misc/micro/block.gif" border=0> 3. <br />
Сила духа: 2<br />
<br />
<b>Минимальные требования: </b><br />
• Уровень: 6<br />
<br />
Следующий критический удар, а также 2 удара после него, лечат Вас частью нанесенного урона. <br />
Выпитая крoвь придает вам силы.<br />
<br />
<DIV><A href="javascript: void(0);" onClick="if (hidtext1001.style.display == '') { this.innerText = 'Действие приема на персонаж'; hidtext1001.style.display = 'none'; } else { this.innerText = 'Скрыть'; hidtext1001.style.display = ''; }">Действие приема на персонаж</A></DIV><DIV id='hidtext1001' style='display: none;'>Восстанавливает Нр персонажа в зависимости от уровня противника: <br />
8 уровень - не более 107 Нр <br />
9 уровень - не более 128 Нр<br />
10 уровень - не более 154 Нр<br />
11 урoвeнь - нe бoлee 185 Hp <br />
<br />
Придает силы: <br />
с 7 уровня - +10  силы <br />
с 8 уровня - +13  силы <br />
с 9 уровня - +14  силы<br />
c 11 уровня - +17 cилы<br />
</DIV> <br />
 </td>
  </tr>
<tr></tr>
<tr>
    <td> <IMG SRC="http://img.combats.ru/i/misc/icons/booklearn_8.gif" border=0> </td>
    <td> <B>Жажда Крови (прием)</B>   (Масса: 1) <br />
<b>Цена: 20 кр. </b><br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B> <br />
• Интуиция: 25 <br />
• Уровень: 7 <br />
Максимум: 1 ед. <br />
<small>Описание: <br />
Книга рассказывает, как можно увидеть больше крови. </small><br />
Обучает приему: <b>Жажда Крови</b> <br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
 </td>
    <td> <IMG SRC="http://img.combats.ru/i/misc/icons/krit_bloodlust.gif" border=0><br />
<B>Жажда Крови</B> 	<br />
<IMG SRC="http://img.combats.ru/i/misc/micro/hit.gif" border=0> 2, <IMG SRC="http://img.combats.ru/i/misc/micro/krit.gif" border=0> 3 <br />
<br />
<b>Минимальные требования: </b><br />
• Уровень: 7<br />
<br />
Увеличивает ваш мф. критического удара на 50 и мф. мощности урона на 5 до конца боя. <br />
Применить можно трижды за бой.<br />
<br />
<TABLE class=QUOTE><TR><TD><SMALL>ХХХ, вспомнив слова своего сэнсея, из последних сил <br />
исполнила прием "Жажда Крови".. (Мф. мощности урона (%): +5, Мф. критического удара (%): +50( +100;+150)</SMALL></TD></TR></TABLE>
 </td>
  </tr>
<tr></tr>
<tr>
    <td> <IMG SRC="http://img.combats.ru/i/misc/icons/booklearn_5.gif" border=0>  </td>
    <td> <B>Осторожность (прием)</B>   (Масса: 1) <br />
<b>Цена: 20 кр.</b> <br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B> <br />
• Уровень: 7 <br />
• Ловкость: 30 <br />
• Выносливость: 20 <br />
<small>Описание: <br />
В инструкции рассказывается, как бойцы с высокой ловкостью могут уменьшить урон от магии стихий.</small> <br />
Обучает приему: <b>Осторожность</b> <br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
</td>
    <td> <IMG SRC="http://img.combats.ru/i/misc/icons/counter_ward.gif" border=0><br />
<B>Осторожность</B> <br />
<IMG SRC="http://img.combats.ru/i/misc/micro/counter.gif" border=0> 2 <br />
Задержка: 10<br />
<br />
<b>Минимальные требования:</b><br />
• Уровень: 7 <br />
• Ловкость: 30 <br />
• Выносливость: 20  <br />
<br />
Уменьшает урон от магии стихий вдвое на три хода.<br />
Использовать приём можно 1 раз в 3 хода.<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td> <IMG SRC="http://img.combats.ru/i/misc/icons/booklearn_4.gif" border=0> </td>
    <td> <B>Выжить (прием)</B>   (Масса: 1) <br />
<b>Цена: 27 кр.</b> <br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B> <br />
• Уровень: 7 <br />
• Выносливость: 30 <br />
<small>Описание: <br />
В инструкции рассказывается, как выживать используя набранные тактики. </small><br />
Обучает приему: <b>Выжить </b><br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
</td>
    <td> <IMG SRC="http://img.combats.ru/i/misc/icons/spirit_survive.gif" border=0><br />
<B>Выжить</B> <br />
Сила духа: 10<br />
<br />
<b>Минимальные требования:</b><br />
• Уровень: 7 <br />
• Выносливость: 30 <br />
<br />
Исцеляет Вас, используя все набранные Вами тактики.<br />
Использовать прием можно 1 раз за бой. После использования все тактики пропадают. <br />
Приём восстанавливает не более 25% НР. 1 приём - 1% Нр, <IMG SRC="http://img.combats.ru/i/misc/micro/hp.gif" border=0>1 - 0.5% Нр<br />
 </td>
  </tr>
<tr></tr>
<tr>
    <td> <IMG SRC="http://img.combats.ru/i/misc/icons/booklearn_3.gif" border=0> </td>
    <td> <B>Отменить (прием)</B>   (Масса: 1) <br />
<b>Цена: 35 кр.</b> <br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B> <br />
• Уровень: 7 <br />
• Выносливость: 25 <br />
• Сила: 25 <br />
Максимум: 1 ед.<br />
<small>Описание: <br />
В инструкции рассказывается, как избежать тяжелых ранений. </small><br />
Обучает приему: <b>Отменить</b> <br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
</td>
    <td> <IMG SRC="http://img.combats.ru/i/misc/icons/multi_rollback.gif" border=0><br />
<B>Отменить</B><br />
<IMG SRC="http://img.combats.ru/i/misc/micro/hit.gif" border=0> 2,  <IMG SRC="http://img.combats.ru/i/misc/micro/block.gif" border=0> 2. <br />
<br />
<b>Минимальные требования:</b><br />
• Уровень: 7 <br />
• Сила: 25 <br />
• Выносливость: 25 <br />
 <br />
Отменяет последнее полученное повреждение или лечение.<br />
Использовать прием можно 1 раз за бой.<br />
 </td>
  </tr>
<tr></tr>
<tr>
    <td> <IMG SRC="http://img.combats.ru/i/misc/icons/booklearn_9.gif" border=0> </td>
    <td> <B>Поступь Смерти (прием)</B>   (Масса: 1) <br />
<b>Цена: 20 кр. </b><br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B> <br />
• Ловкость: 25 <br />
• Уровень: 7 <br />
Максимум: 1 ед. <br />
<small>Описание: <br />
Книга о превращении битвы в бойню. </small><br />
Обучает приему: <b>Поступь Смерти </b><br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
</td>
    <td> <IMG SRC="http://img.combats.ru/i/misc/icons/counter_deathwalk.gif" border=0><br />
<B>Поступь Смерти</B> <br />
<IMG SRC="http://img.combats.ru/i/misc/micro/counter.gif" border=0> 5 <br />
<br />
<b>Минимальные требования:</b><br />
• Уровень: 7 <br />
<br />
Увеличивает максимальный урон оружием на "1*Уровень". <br />
Каждый успешный удар увеличивает максимальный наносимый противнику урон на "1 помноженый на Уровень" ед., до "10 умножить на Уровень" и обновляет время приёма. <br />
Прием  длится в течение одного хода.<br />
 </td>
  </tr>
<tr></tr>
<tr>
    <td> <IMG SRC="http://img.combats.ru/i/misc/icons/booklearn_2.gif" border=0> </td>
    <td> <B>Превосходство (прием)</B>   (Масса: 1) <br />
<b>Цена: 15 кр. </b><br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B> <br />
• Интуиция: 25 <br />
• Уровень: 7 <br />
<small>Описание: <br />
Инстpукция содержит ряд рекомендаций по защитной технике после успешних парирований </small><br />
Обучает приему: <b>Превосходство </b><br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
</td>
    <td> <IMG SRC="http://img.combats.ru/i/misc/icons/parry_supreme.gif" border=0><br />
<B>Превосходство </B><br />
<IMG SRC="http://img.combats.ru/i/misc/micro/parry.gif" border=0> 3, <IMG SRC="http://img.combats.ru/i/misc/micro/block.gif" border=0> 1 <br />
<br />
<b>Минимальные требования:</b><br />
• Уровень: 7 <br />
<br />
Повышает антикрит и антиуворот до конца боя.<br />
Можно применять трижды за бой<br />
<br />
<DIV><A href="javascript: void(0);" onClick="if (hidtext1002.style.display == '') { this.innerText = 'Действие приема на персонаж'; hidtext1002.style.display = 'none'; } else { this.innerText = 'Скрыть'; hidtext1002.style.display = ''; }">Действие приема на персонаж</A></DIV><DIV id='hidtext1002' style='display: none;'><br />
<B>ххх</B>, рeшив cтaть гeрoeм, прoвeлa приeм "<B>Прeвocхoдcтвo</B>". (Мф. прoтив критичecкoгo удaрa (%): +25, Мф. прoтив увeртывaния (%): +25)<br />
</DIV> </td>
  </tr>
<tr></tr>
<tr>
    <td> <IMG SRC="http://img.combats.ru/i/misc/icons/booklearn_7.gif" border=0> </td>
    <td> <B>Усиленные Удары (прием)</B>   (Масса: 1) <br />
<b>Цена: 20 кр. </b><br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B> <br />
• Уровень: 7 <br />
• Сила: 25 <br />
Максимум: 1 ед. <br />
<small>Описание: <br />
В инструкции рассказывается, об увеличении силы ударов на короткое время. </small><br />
Обучает приему: <b>Усиленные Удары</b> <br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
</td>
    <td> <IMG SRC="http://img.combats.ru/i/misc/icons/hit_empower.gif" border=0><br />
<B>Усиленные удары</B> <br />
<IMG SRC="http://img.combats.ru/i/misc/micro/hit.gif" border=0> 3 <br />
<br />
<b>Минимальные требования:</b><br />
• Уровень: 7 <br />
 <br />
Все удары в следующем размене наносят на "5 помноженный на уровень противника" единиц урона больше. <br />
</td>
  </tr>
<tr></tr>
<tr>
    <td> <IMG SRC="http://img.combats.ru/i/misc/icons/booklearn_6.gif" border=0> </td>
    <td> <B>Магическая Защита (прием)</B>   (Масса: 1) <br />
<b>Цена: 20 кр. </b><br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B> <br />
• Уровень: 7 <br />
• Выносливость: 25 <br />
Максимум: 1 ед. <br />
<small>Описание: <br />
В инструкции рассказывается, как грамотной защитой можно уменьшить урон от магии стихий. </small><br />
Обучает приему: <b>Магическая Защита </b><br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
</td>
    <td> <IMG SRC="http://img.combats.ru/i/misc/icons/block_magicshield.gif" border=0><br />
<B>Магическая Защита </B><br />
<IMG SRC="http://img.combats.ru/i/misc/micro/block.gif" border=0> 3 <br />
 <br />
<b>Минимальные требования:</b><br />
• Уровень: 7 <br />
<br />
Следующее заклятие или мaгичecкий удaр нанесет вам не более 1 повреждения, защита действует не более трех ходов.<br />
 </td>
  </tr>
<tr></tr>
<tr>
    <td> <IMG SRC="http://img.combats.ru/i/misc/icons/booklearn_10.gif" border=0> </td>
    <td> <B>Возмездие (прием)</B>   (Масса: 1) <br />
<b>Цена: 20 кр. </b><br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B> <br />
• Уровень: 7 <br />
• Выносливость: 25 <br />
Максимум: 1 ед. <br />
<small>Описание: <br />
В инструкции рассказывается, как отомстить врагу, пробившему вашу защиту. </small><br />
Обучает приему: <b>Возмездие </b><br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
</td>
    <td> <IMG SRC="http://img.combats.ru/i/misc/icons/block_revenge.gif" border=0><br />
<B>Возмездие </B><br />
<IMG SRC="http://img.combats.ru/i/misc/micro/block.gif" border=0> 5 <br />
<br />
<b>Минимальные требования:</b><br />
• Уровень: 7 <br />
<br />
Противник, который нанес удар получит "6 умножить на *ваш уровень*" единиц урона<br />
</td>
  </tr>
</TABLE>
</div></div></div><br />
<br />
<div style="margin:0; margin-top:8px"><div style="margin-bottom:4px"><input type="button" value="Заклинания" onClick="if (this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display != '') { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = ''; this.innerText = ''; this.value = 'Скрыть'; } else { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = 'none'; this.innerText = ''; this.value = 'Заклинания'; }"></div><div ><div style="display: none;"><br />
<br />
<TABLE class=BL>
<TABLE class="ST" cellspacing="1">
<tr>
    <TH><DIV style="text-align: left;"><B>Книга</B></DIV></TD>
    <TH><DIV style="text-align: center;"><B>Свойства книги</B></DIV></TD>
    <TH><DIV style="text-align: center;"><B>Прием, получаемый в результате <br />
изучения книги</B></DIV></TD>
</tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/zashita sveta.gif" border=0></td>
    <td><B> Защита Света (заклинание)</B>   (Масса: 1) <br />
<b>Цена: 20 кр. </b><br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B> <br />
• Интеллект: 25 <br />
• Уровень: 7 <br />
• Мастерство владения магией Света: 4 <br />
Максимум: 1 ед. <br />
<small>Описание: <br />
Как защитить себя от ошеломления? 10% поглощения урона - много или мало? <br />
Ответы на подобные вопросы вы найдете только в этой  книге! </small><br />
Обучает приему: <b>Защита Света </b><br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_light_shield.gif" border=0><br />
<B>Защита Света </B><br />
Расход маны: 200 <br />
Задержка: 10 <br />
<br />
<b>Минимальные требования:</b><br />
• Мастерство владения магией Света: 4 <br />
• Интеллект: 40<br />
• Уровень: 7<br />
<br />
Снижает весь урон получаемый магом на 10%, ускоряет время восстановления от любых видов оглушения на 1 ход. </td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell5.gif" border=0></td>
    <td> <B>Серое Мастерство (заклинание)</B>   (Масса: 1) <br />
<b>Цена: 20 кр. </b><br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B> <br />
• Интеллект: 25 <br />
• Уровень: 7 <br />
• Мастерство владения серой магией: 4 <br />
Максимум: 1 ед. <br />
<small>Описание: <br />
«...только одна магия истинна - серая магия, включающая в себя все» </small><br />
Обучает заклинанию: <b>Серое Мастерство</b><br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_gray_mastery.gif" border=0><br />
<B>Серое Мастерство </B><br />
<IMG SRC="http://img.combats.ru/i/misc/micro/spirit.gif" border=0> 3 <br />
Расход маны: 50 + 10*(уровень заклинания) в ход <br />
Задержка: 5 <br />
<br />
<b>Минимальные требования:</b><br />
• Мастерство владения серой магией: 4 <br />
• Интеллект: 40<br />
• Уровень: 7<br />
<br />
Увеличивает навык в магии стихий, применяется до 5 раз. </td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/glaz na glaz.gif" border=0></td>
    <td> <B>Глаз за Глаз (заклинание)</B>   (Масса: 1) <br />
<b>Цена: 20 кр. </b><br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B> <br />
• Интеллект: 25 <br />
• Уровень: 7 <br />
• Мастерство владения магией Тьмы: 4 <br />
Максимум: 1 ед. <br />
<small>Описание: <br />
Название гласит: Практические основы жестокой мести. </small><br />
Обучает приему: <b>Глаз за Глаз </b><br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_dark_eyeforeye.gif" border=0><br />
<B>Глаз за глаз </B><br />
Расход маны: 200 <br />
Задержка: 10 <br />
<br />
<b>Минимальные требования:</b><br />
• Мастерство владения магией Тьмы: 4 <br />
• Интеллект: 40<br />
• Уровень: 7<br />
<br />
Следующее заклинание или удар нанесет не более половины урона,  оставшуюся половину магией тьмы получит атакующий (но не более 50 х "ваш уровень" един. урона)<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell1.gif" border=0></td>
    <td> <B>Пылающий Ужас (заклинание)</B>   (Масса: 1) <br />
<b>Цена: 20 кр. </b><br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B> <br />
• Интеллект: 25 <br />
• Уровень: 7 <br />
• Мастерство владения стихией Огня: 7 <br />
Максимум: 1 ед. <br />
<small>Описание: <br />
В инструкции рассказывается, как использовать страх огня у горящей цели. </small><br />
Обучает приему: <b>Пылающий Ужас </b><br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_fire_flameshock.gif" border=0><br />
<B>Пылающий Ужас </B><br />
Расход маны: 200 <br />
Задержка: 10 <br />
<br />
<b>Минимальные требования:</b><br />
• Мастерство владения стихией Огня: 7 <br />
• Интеллект: 40<br />
• Уровень: 7<br />
<br />
Высвобождает энергию вашего заклятия  Пожирающее Пламя на цели. <br />
Цель получает x единиц урона огнем и не может использовать приемы или набирать очки тактики 2 хода.<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell10.gif" border=0></td>
    <td> <B>Разогрев (заклинание)</B>   (Масса: 1)<br />
<b>Цена: 20 кр.</b> <br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B> <br />
• Интеллект: 25 <br />
• Уровень: 7 <br />
• Мастерство владения стихией Огня: 7 <br />
Максимум: 1 ед. <br />
<small>Описание: <br />
Ваше следующее огненное заклинание получит +100 мф. мощности Магии Огня. Этот прием не подвержен действию шока.</small><br />
Обучает приему: <B>Разогрев</B> <br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
 </td>
    <td><img src="http://img.combats.ru/i/misc/icons/wis_fire_boost.gif" width="40" height="25" border=0><br />
<B>Разогрев</B><br />
Расход маны: 21<br />
Задержка: 5 <br />
<br />
Прием тратит ход <br />
<br />
<b>Минимальные требования:</b><br />
• Мастерство владения стихией Огня: 7 <br />
• Интеллект: 40<br />
• Уровень: 7<br />
 <br />
Ваше следующее огненное заклинание получит +100 мф. мощности Магии Огня.<br />
Этот прием не подвержен действию шока.<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell13.gif" border=0></td>
    <td> <B>Жертва огню (заклинание)</B>   (Масса: 1)<br />
<B>Цена: 20 кр.</B> <br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B> <br />
• Интеллект: 30 <br />
• Уровень: 7 <br />
• Мастерство владения стихией Огня: 7 <br />
Максимум: 1 ед. <br />
<small>Описание: <br />
Вы теряете 10%HP, но восстанавливаете 20% маны.</small><br />
Обучает приему: <B>Жертва Огню</B> <br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
 </td>
    <td><img src="http://img.combats.ru/i/misc/icons/wis_fire_sacrifice.gif" width="40" height="25" border=0><br />
<B>Жертва Огню</B><br />
<IMG SRC="http://img.combats.ru/i/misc/micro/hp.gif" border=0> 5<br />
Расход маны: 4 <br />
Задержка: 5<br />
<br />
<b>Минимальные требования:</b><br />
• Мастерство владения стихией Огня: 7 <br />
• Интеллект: 40<br />
• Уровень: 7<br />
• HP: 10% <br />
<br />
Вы теряете 10%HP, но восстанавливаете 20% маны<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell9.gif" border=0></td>
    <td> <B>Пылающий Взрыв (заклинание)</B>   (Масса: 1)<br />
<B>Цена: 20 кр.</B> <br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B> <br />
• Интеллект: 25 <br />
• Уровень: 7 <br />
• Мастерство владения стихией Огня: 7 <br />
Максимум: 1 ед. <br />
<small>Описание: <br />
Высвобождает энергию вашего заклятия Пожирающее Пламя на цели. Цель и еще 4 случайных цели получает 33% оставшегося урона Пожирающего Пламени магией Огня</small><br />
Обучает приему: <B>Пылающий Взрыв</B> <br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
 </td>
    <td><img src="http://img.combats.ru/i/misc/icons/wis_fire_flamedestroy.gif" width="40" height="25" border=0><br />
<B>Пылающий Взрыв</B><br />
Расход маны: 87 <br />
Задержка: 5<br />
<br />
<b>Минимальные требования:</b><br />
• Мастерство владения стихией Огня: 7 <br />
• Интеллект: 40<br />
• Уровень: 7<br />
<br />
Высвобождает энергию вашего заклятия Пожирающее Пламя на цели. <br />
Цель и еще 4 случайных цели получает 33% оставшегося урона Пожирающего Пламени магией Огня.<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell8.gif" border=0></td>
    <td> <B>Пылающая Смерть (заклинание)</B>   (Масса: 1)<br />
<B>Цена: 20 кр.</B> <br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B> <br />
• Интеллект: 25 <br />
• Уровень: 7 <br />
• Мастерство владения стихией Огня: 7 <br />
Максимум: 1 ед. <br />
<small>Описание: <br />
Высвобождает энергию вашего заклятия Пожирающее Пламя на цели, если ее уровень жизни менее 33%. Цель получает 125% оставшегося урона Пожирающего Пламени</small><br />
Обучает приему: <B>Пылающая Смерть</B> <br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
 </td>
    <td><img src="http://img.combats.ru/i/misc/icons/wis_fire_flamedeath.gif" width="40" height="25" border=0><br />
<B>Пылающая Смерть</B><br />
Расход маны: 83 <br />
Задержка 10<br />
 <br />
Прием тратит ход <br />
<br />
<b>Минимальные требования:</b><br />
• Мастерство владения стихией Огня: 7 <br />
• Интеллект: 40<br />
• Уровень: 7<br />
<br />
Высвобождает энергию вашего заклятия Пожирающее Пламя на цели, если её уровень жизни менее 33%. Цель получает 125% оставшегося урона Пожирающего пламени<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell14.gif" border=0></td>
    <td> <B>Язык Пламени (заклинание)</B>   (Масса: 1)<br />
<B>Цена: 25 кр.</B> <br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B> <br />
• Интеллект: 35 <br />
• Уровень: 8 <br />
• Мастерство владения стихией Огня: 8 <br />
Максимум: 1 ед. <br />
<small>Описание: <br />
Наносит цели 5% урона магией Огня от ее максимального уровня жизни. И еще +2% за каждый уровень Цели Огня. Максимальный урон заклинания ограничен. Заклинание не наносит критический урон.</small><br />
Обучает приему: <B>Язык Пламени</B> <br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_fire_flametongue.gif" border=0><br />
<B>Язык Пламени</B><br />
Расход маны: 114<br />
Задержка: 3 <br />
<br />
• Прием тратит ход <br />
<br />
<b>Минимальные требования:</b><br />
• Мастерство владения стихией Огня: 8 <br />
• Интеллект: 60<br />
<br />
Наносит цели 3% урона магией Огня от её Максимального уровня жизни. И ещё +2% за каждый уровень Цели Огня. <br />
Заклинание не может нанести более 200 единиц урона, не наносит критический урон.</span><br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell12.gif" border=0></td>
    <td> <B>Скрытое Пламя (заклинание)</B>   (Масса: 1)<br />
<B>Цена: 25 кр.</B> <br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B> <br />
• Интеллект: 35 <br />
• Уровень: 8 <br />
• Мастерство владения стихией Огня: 8 <br />
Максимум: 1 ед. <br />
<small>Описание: <br />
Если уровень вашей жизни ниже 33%, то при использовании убирает текущие задержки на заклинаниях школы Огня. Один раз за бой. </small><br />
Обучает приему: <B>Скрытое Пламя </B><br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
 </td>
    <td><img src="http://img.combats.ru/i/misc/icons/wis_fire_hiddenpower.gif" width="40" height="25" border=0><br />
<B>Скрытое Пламя</B><br />
Расход маны: 83 <br />
<br />
• Прием тратит ход <br />
<br />
<b>Минимальные требования:</b><br />
• Мастерство владения стихией Огня: 8 <br />
• Интеллект: 60<br />
• Уровень: 8<br />
<br />
Если уровень вашей жизни ниже 33%, то при использовании убирает текущие задержки на заклинаниях школы Огня. <br />
Один раз за бой.<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell11.gif" border=0></td>
    <td> <B>Огненный Щит (заклинание)</B>   (Масса: 1)<br />
<B>Цена: 25 кр.</B> <br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B> <br />
• Интеллект: 35 <br />
• Уровень: 8 <br />
• Мастерство владения стихией Огня: 8 <br />
Максимум: 1 ед. <br />
<small>Описание: <br />
Вы получаете на 50% меньше урона 2 последующих размена, полученный урон восстанавливает вашу ману. Этот прием не подвержен действию шока.</small><br />
Обучает приему: <B>Огненный Щит</B> <br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
 </td>
    <td><img src="http://img.combats.ru/i/misc/icons/wis_fire_shield.gif" width="40" height="25" border=0><br />
<B>Огненный Щит</B><br />
Расход маны: 130 <br />
Задержка: 10 <br />
<br />
<b>Минимальные требования:</b><br />
• Мастерство владения стихией Огня: 8 <br />
• Интеллект: 60<br />
• Уровень: 8<br />
<br />
Вы получаете на 50% меньше урона 2 последующих размена, полученный урон восстанавливает вашу ману. <br />
Этот прием не подвержен действию шока.<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/Inei.gif" border=0></td>
    <td> <B>Иней (заклинание)</B>   (Масса: 1) <br />
<b>Цена: 20 кр. </b><br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B> <br />
• Интеллект: 25 <br />
• Уровень: 7 <br />
• Мастерство владения стихией Воды: 7 <br />
Максимум: 1 ед. <br />
<small>Описание: <br />
В инструкции рассказывается, как тонким слоем льда защитить себя от урона.</small> <br />
Обучает приему: <b>Иней</b> <br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_water_shield.gif" border=0><br />
<B>Иней </B><br />
Расход маны: 190 <br />
Задержка: 5 <br />
<br />
<b>Минимальные требования:</b><br />
• Мастерство владения стихией Воды: 7 <br />
• Интеллект: 40<br />
• Уровень: 7<br />
<br />
Вы получаете на 25% меньше урона 4 последующих размена.<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell15.gif" border=0></td>
    <td> <B>Кристаллизация (заклинание)</B>   (Масса: 1) <br />
<b>Цена: 25 кр. </b><br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B> <br />
• Интеллект: 35<br />
• Уровень: 8<br />
• Мастерство владения стихией Воды: 8<br />
Максимум: 1 ед.<br />
<small>Описание: <br />
Мгновенно наносит цели урон равный уровню силы цели, но не более определенного. Снижает Силу и Ловкость цели.</small><br />
Обучает приему: <b>Кристаллизация</b><br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_water_crystalize.gif" border=0><br />
<B>Кристаллизация</B><br />
Расход маны: 180<br />
Задержка: 5 <br />
<br />
<b>Минимальные требования:</b><br />
• Мастерство владения стихией Воды: 8 <br />
• Интеллект: 60<br />
• Уровень: 8<br />
<br />
Мгновенно наносит цели урон равный уровню силы цели но не более чем 90.<br />
Снижает силу и ловкость цели на 20 на три хода.<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell16.gif" border=0></td>
    <td> <B>Хватка Льда (заклинание)</B>   (Масса: 1) <br />
<b>Цена: 20 кр. </b><br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B> <br />
• Интеллект: 25<br />
• Уровень: 7<br />
• Мастерство владения стихией Воды: 7<br />
Максимум: 1 ед.<br />
<small>Описание: <br />
Через 2 хода цель теряет возможность использовать приемы или набирать очки тактики на 3 хода.</small><br />
Обучает приему: <b>Хватка Льда</b><br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_water_icegrap.gif" border=0><br />
<B>Хватка Льда</B><br />
Расход маны: 90<br />
Задержка: 10<br />
 <br />
<b>Минимальные требования:</b><br />
• Мастерство владения стихией Воды: 7 <br />
• Интеллект: 40<br />
• Уровень: 7<br />
<br />
Через 2 хода цель теряет возможность использовать приемы или набирать очки тактики на 3 хода.<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell17.gif" border=0></td>
    <td> <B>Жертва Воде (заклинание)</B>   (Масса: 1) <br />
<b>Цена: 20 кр. </b><br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B> <br />
• Интеллект: 25<br />
• Уровень: 7<br />
• Мастерство владения стихией Воды: 7<br />
Максимум: 1 ед.<br />
<small>Описание: <br />
Маг теряет 10% жизни за 5 ходов, но цена всех заклятий снижена на 30%.</small><br />
Обучает приему: <b>Жертва Воде</b><br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_water_sacrifice.gif" border=0><br />
<B>Жертва Воде</B><br />
<IMG SRC="http://img.combats.ru/i/misc/micro/hp.gif" border=0>5<br />
Расход маны: 5<br />
Задержка: 10 <br />
<br />
<b>Минимальные требования:</b><br />
• Мастерство владения стихией Воды: 7 <br />
• Интеллект: 40<br />
• Уровень: 7<br />
<br />
Маг теряет 10% жизни за 5 ходов, но цена всех заклятий снижена на 50%.<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/duhi lda.gif" border=0></td>
    <td> <B>Духи Льда (заклинание)</B>   (Масса: 1) <br />
<b>Цена: 25 кр. </b><br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B> <br />
• Интеллект: 35<br />
• Уровень: 8<br />
• Мастерство владения стихией Воды: 8<br />
Максимум: 1 ед.<br />
<small>Описание: <br />
На три хода увеличивает мф. мощности Магии Воды на 15. Часть вашего прямого урона магией воды, восстанавливает ману</small><br />
Обучает приему: <b>Духи Льда</b><br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_water_spirit.gif" border=0><br />
<B>Духи Льда</B><br />
<IMG SRC="http://img.combats.ru/i/misc/micro/hp.gif" border=0>4<br />
Сила духа: 5<br />
Расход маны: 5<br />
Задержка: 10<br />
 <br />
<b>Минимальные требования:</b><br />
• Мастерство владения стихией Воды: 8 <br />
• Интеллект: 60<br />
• Уровень: 8<br />
<br />
На три хода увеличивает мф. мощности Магии Воды на 15. Часть вашего прямого урона магией воды, восстанавливают вам ману.<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell19.gif" border=0></td>
    <td> <B>Оледенениие: Разбить (заклинание)</B>   (Масса: 1) <br />
<b>Цена: 20 кр. </b><br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B> <br />
• Интеллект: 25<br />
• Уровень: 7<br />
• Мастерство владения стихией Воды: 7<br />
Максимум: 1 ед.<br />
<small>Описание: <br />
Наносит текущей цели подверженной Оледенению урон магией воды. Наносит дополнительный урон, если уровень жизни цели меньше определенного</small><br />
Обучает приему: <b>Оледенениие: Разбить!</b><br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_water_break.gif" border=0><br />
<B>Оледенениие: Разбить!</B><br />
Расход маны: 180<br />
Задержка: 5<br />
<br />
• Прием тратит ход<br />
<br />
<b>Минимальные требования:</b><br />
• Мастерство владения стихией Воды: 7 <br />
• Интеллект: 40<br />
• Уровень: 7<br />
<br />
Наносит текущей цели подверженной <B>Оледенению</B> 184 урона магией воды и еще 276, если уровень жизни цели менее 200 .<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/led spasenie.gif" border=0></td>
    <td> <B>Ледяное Спасение (заклинание)</B>   (Масса: 1) <br />
<b>Цена: 25 кр. </b><br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B> <br />
• Интеллект: 35<br />
• Уровень: 8<br />
• Мастерство владения стихией Воды: 8<br />
Максимум: 1 ед.<br />
<small>Описание: <br />
Мгновенно останавливает кровотечения, исцеляя мага, но наносит магу урон последующие 5 ходов</small><br />
Обучает приему: <b>Ледяное Спасение</b><br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_water_tempheal.gif" border=0><br />
<B>Ледяное Спасение</B><br />
<IMG SRC="http://img.combats.ru/i/misc/micro/hp.gif" border=0>1<br />
Расход маны: 118<br />
Задержка: 5<br />
<br />
<b>Минимальные требования:</b><br />
• Мастерство владения стихией Воды: 8 <br />
• Интеллект: 60<br />
• Уровень: 8<br />
<br />
Мгновенно останавливает кровотечения, исцеляя мага на 405HP магией воды, но за последующие 5 ходов цель теряет 202HP.<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/ostraya gran.gif" border=0></td>
    <td> <B>Острая Грань (заклинание)</B>   (Масса: 1) <br />
<b>Цена: 20 кр. </b><br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B> <br />
• Интеллект: 25<br />
• Уровень: 7<br />
• Мастерство владения стихией Воды: 7<br />
Максимум: 1 ед.<br />
<small>Описание: <br />
Наносит цели колющий урон</small><br />
Обучает приему: <b>Острая Грань</b><br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_water_strike.gif" border=0><br />
<B>Острая Грань</B><br />
Расход маны: 114<br />
Задержка: 3<br />
<br />
• Прием тратит ход<br />
<br />
<b>Минимальные требования:</b><br />
• Мастерство владения стихией Воды: 7 <br />
• Интеллект: 40<br />
• Уровень: 7<br />
<br />
Наносит цели 485 ед. колющего урона.<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell22.gif" border=0></td>
    <td> <B>Ледяное Сердце (заклинание)</B>   (Масса: 1) <br />
<b>Цена: 25 кр. </b><br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B> <br />
• Интеллект: 35<br />
• Уровень: 8<br />
• Мастерство владения стихией Воды: 8<br />
Максимум: 1 ед.<br />
<small>Описание: <br />
При использовании убирает текущие задержки на заклинаниях школы Воды.</small><br />
Обучает приему: <b>Ледяное Сердце</b><br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_water_hiddenpower.gif" border=0><br />
<B>Ледяное Сердце</B><br />
Расход маны: 117<br />
Задержка: 10<br />
<br />
• Прием тратит ход<br />
<br />
<b>Минимальные требования:</b><br />
• Мастерство владения стихией Воды: 8 <br />
• Интеллект: 60<br />
• Уровень: 8<br />
<br />
При использовании убирает текущие задержки на заклинаниях школы Воды.<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/chistota vody.gif" border=0></td>
    <td> <B>Чистота Воды (заклинание)</B>   (Масса: 1) <br />
<b>Цена: 25 кр. </b><br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B> <br />
• Интеллект: 35<br />
• Уровень: 8<br />
• Мастерство владения стихией Воды: 8<br />
Максимум: 1 ед.<br />
<small>Описание: <br />
Снимает один негативный эффект магии или отравления.</small><br />
Обучает приему: <b>Чистота Воды</b><br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_water_cleance.gif" border=0><br />
<B>Чистота Воды</B><br />
Расход маны: 100<br />
Задержка: 5<br />
<br />
<b>Минимальные требования:</b><br />
• Мастерство владения стихией Воды: 8 <br />
• Интеллект: 50<br />
• Уровень: 8<br />
<br />
Снимает один негативный эффект магии или отравления.<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell24.gif" border=0></td>
    <td> <B>Переохлаждение (заклинание)</B>   (Масса: 1) <br />
<b>Цена: 45 кр. </b><br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B> <br />
• Интеллект: 75<br />
• Уровень: 9<br />
• Мастерство владения стихией Воды: 9<br />
Максимум: 1 ед.<br />
<small>Описание: <br />
Уменьшает эффекты лечения на цели на 10%. Можно применить на одну цель до 5 раз.</small><br />
Обучает приему: <b>Переохлаждение</b><br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_water_aheal.gif" border=0><br />
<B>Переохлаждение</B><br />
<IMG SRC="http://img.combats.ru/i/misc/micro/hp.gif" border=0> 1<br />
Расход маны: 24<br />
<br />
<b>Минимальные требования:</b><br />
• Мастерство владения стихией Воды: 9 <br />
• Интеллект: 75<br />
• Уровень: 9<br />
<br />
Уменьшает эффекты лечения на цели на 15% и урон цели на 3% на 5 ходов. Можно применить на одну цель до 3 раз.<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><img src="http://bestcombats.net/news/i/booklearn_spell28.gif"></td>
    <td><b>Жертва Воздуху (заклинание)</b>   (Масса: 1) <br />
<b>Цена: 20 кр. </b><br />
Долговечность: 0/1<br />
<b>Требуется минимальное:</b><br />
• Интеллект: 25<br />
• Уровень: 7<br />
• Мастерство владения стихией Воздуха: 7<br />
Максимум: 1 ед.<br />
<small>Описание:<br />
Маг получает 25 мф. мощности магии Воздуха на 4 хода.</small><br />
Обучает приему: <b>Жертва Воздуху</b><br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
</td>
<td>
<img src="http://img.combats.ru/i/misc/icons/wis_air_sacrifice.gif"><br />
<b>Жертва Воздуху</b><br />
<IMG SRC="http://img.combats.ru/i/misc/micro/hp.gif" border=0> 5<br />
Расход маны: 7<br />
Задержка 10 <br />
<br />
Маг получает 25 мф. мощности магии Воздуха на 4 хода.<br />
</td>
</tr>
<tr></tr>
<tr>
    <td><img src="http://bestcombats.net/news/i/booklearn_spell29.gif"></td>
<td><b>Скорость Молнии (заклинание)</b>   (Масса: 1) <br />
<b>Цена: 30 кр. </b><br />
Долговечность: 0/1<br />
<b>Требуется минимальное:</b><br />
• Интеллект: 60<br />
• Уровень: 8<br />
• Мастерство владения стихией Воздуха: 8<br />
Максимум: 1 ед.<br />
<small>Описание:<br />
Любой следующий прием не тратит хода.</small><br />
Обучает приему: <b>Скорость Молнии</b><br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
</td>
<td>
<img src="http://img.combats.ru/i/misc/icons/wis_air_speed.gif"><br />
<b>Скорость Молнии</b><br />
Сила духа: 4<br />
Расход маны: 62<br />
Начальная задержка: 5<br />
Задержка: 10 <br />
<br />
<b>Минимальные требования:</b> <br />
• Интеллект: 60<br />
• Мастерство владения стихией Воздуха: 8 <br />
• Уровень: 8<br />
<br />
Любой следующий прием не тратит хода.<br />
</td>
</tr>
<tr></tr>
<tr>
    <td><img src="http://bestcombats.net/news/i/booklearn_spell25.gif"></td>
<td><b>Искра (заклинание)</b>   (Масса: 1) <br />
<b>Цена: 50 кр. </b><br />
Долговечность: 0/1<br />
<b>Требуется минимальное:</b><br />
• Интеллект: 60<br />
• Уровень: 8<br />
• Мастерство владения стихией Воздуха: 8<br />
Максимум: 1 ед.<br />
<small>Описание:<br />
Мгновенно наносит враждебной цели 1-47 урона воздухом или исцеляет дружественную</small><br />
Обучает приему: <b>Искра</b><br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
</td>
<td>
<img src="http://img.combats.ru/i/misc/icons/wis_air_spark.gif"><br />
<b>Искра</b><br />
Расход маны: 62<br />
Задержка 10 <br />
<br />
<b>Минимальные требования: </b><br />
• Интеллект: 60<br />
• Мастерство владения стихией Воздуха: 8 <br />
• Уровень: 8<br />
<br />
Мгновенно наносит враждебной цели 1-57 урона воздухом или исцеляет дружественную<br />
</td>
</tr>
<tr></tr>
<tr>
    <td><img src="http://bestcombats.net/news/i/vosduh shit.gif"></td>
<td><b>Воздушный Щит (заклинание)</b>   (Масса: 1) <br />
<b>Цена: 10 кр. </b><br />
Долговечность: 0/1<br />
<b>Требуется минимальное:</b><br />
• Интеллект: 80<br />
• Уровень: 9<br />
• Мастерство владения стихией Воздуха: 9<br />
Максимум: 1 ед.<br />
<small>Описание:<br />
Создает воздушный кокон вокруг мага, способный поглотить 1-0 ед. урона.<br />
Этот прием не подвержен действию шока.<br />
Общая задержка с заклинанием Силовое Поле.</small><br />
Обучает приему: <b>Воздушный Щит</b><br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
</td>
<td>
<img src="http://img.combats.ru/i/misc/icons/wis_air_shield.gif"><br />
<b>Воздушный Щит</b><br />
Расход маны: 127 <br />
Задержка 12 <br />
Приём тратит ход <br />
<br />
<b>Минимальные требования: </b><br />
• Интеллект: 80 <br />
• Мастерство владения стихией Воздуха: 9<br />
• Уровень: 9 <br />
<br />
Создаёт воздушный кокон вокруг мага, способный поглотить 1-190 ед. урона. <br />
Этот приём не подвержен действию шока. <br />
Общая задержка с заклинанием Силовое поле.<br />
</td>
</tr>
<tr></tr>
<tr>
    <td><img src="http://bestcombats.net/news/i/booklearn_spell26.gif"></td>
<td><b>Статика (набор заклинаний)</b>   (Масса: 1)<br />
<b>Цена: 100 кр. </b><br />
Долговечность: 0/1<br />
<b>Требуется минимальное:</b><br />
• Интеллект: 40<br />
• Уровень: 7<br />
• Мастерство владения стихией Воздуха: 7<br />
Максимум: 1 ед.<br />
<small>Описание:<br />
Обучает набору заклинаний, позволающих накапливать заряд на цели и использовать его в своих целях</small><br />
Обучает приемам: <b>Статика, Заряд: Собрать, Заряд: Поражение, Заряд: Шок</b><br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
</td>
<td>
<img src="http://img.combats.ru/i/misc/icons/wis_air_charge.gif"><br />
<b><DIV><A href="javascript: void(0);" onClick="if (hidtext1003.style.display == '') { this.innerText = 'Статика'; hidtext1003.style.display = 'none'; } else { this.innerText = 'Статика'; hidtext1003.style.display = ''; }">Статика</A></DIV><DIV id='hidtext1003' style='display: none;'></b><br />
Сила духа: 1<br />
Расход маны: 74 <br />
<br />
<b>Минимальные требования: </b><br />
•Интеллект: 40<br />
•Мастерство владения стихией Воздуха: 7<br />
•Уровень: 7<br />
<br />
Молния, Цепь Молний, Искра, Искры, и удары по Воздушному Щиту будут заражать цель, увеличивая получаемый от магии Воздуха урон на 1%. Маг может воспользоваться наколенными зарядами<br />
</DIV><br />
<br />
<img src="http://img.combats.ru/i/misc/icons/wis_air_charge_dmg.gif"><br />
<b><DIV><A href="javascript: void(0);" onClick="if (hidtext1004.style.display == '') { this.innerText = 'Заряд: Поражение'; hidtext1004.style.display = 'none'; } else { this.innerText = 'Заряд: Поражение'; hidtext1004.style.display = ''; }">Заряд: Поражение</A></DIV><DIV id='hidtext1004' style='display: none;'></b><br />
<IMG SRC="http://img.combats.ru/i/misc/micro/hp.gif" border=0> 1<br />
Задержка: 3<br />
<br />
<b>Минимальные требования: </b><br />
• Интеллект: 40<br />
• Мастерство владения стихией Воздуха: 7<br />
• Уровень: 7<br />
<br />
Наносит цели 1-2% урона магией Воздуха от ее максимального уровня жизни за каждый уровень Заряда. Заклинание не может нанести более 250 ед. урона.<br />
</DIV><br />
<br />
<img src="http://img.combats.ru/i/misc/icons/wis_air_charge_gain.gif"><br />
<b><DIV><A href="javascript: void(0);" onClick="if (hidtext1005.style.display == '') { this.innerText = 'Заряд: Собрать'; hidtext1005.style.display = 'none'; } else { this.innerText = 'Заряд: Собрать'; hidtext1005.style.display = ''; }">Заряд: Собрать</A></DIV><DIV id='hidtext1005' style='display: none;'></b><br />
<IMG SRC="http://img.combats.ru/i/misc/micro/hp.gif" border=0> 1<br />
Задержка: 3<br />
<br />
<b>Минимальные требования: </b><br />
• Интеллект: 40<br />
• Мастерство владения стихией Воздуха: 7<br />
• Уровень: 7<br />
<br />
Восстанавливает 9 маны за каждый уровень Заряда на цели и снимает с мага один негативный магический эффект.<br />
</DIV><br />
<br />
<img src="http://img.combats.ru/i/misc/icons/wis_air_charge_shock.gif"><br />
<b><DIV><A href="javascript: void(0);" onClick="if (hidtext1006.style.display == '') { this.innerText = 'Заряд: Шок'; hidtext1006.style.display = 'none'; } else { this.innerText = 'Заряд: Шок'; hidtext1006.style.display = ''; }">Заряд: Шок</A></DIV><DIV id='hidtext1006' style='display: none;'></b><br />
<IMG SRC="http://img.combats.ru/i/misc/micro/hp.gif" border=0> 1<br />
Задержка: 3<br />
<br />
<b>Минимальные требования: </b><br />
• Интеллект: 40<br />
• Мастерство владения стихией Воздуха: 7<br />
• Уровень: 7<br />
<br />
Шокирует противника, лишая его возможности использовать последний примененный прием на пять ходов и рассеивает один позитивный магический эффект<br />
</DIV><br />
</td>
</tr>
<tr></tr>
<tr>
    <td><img src="http://bestcombats.net/news/i/energi vozduha.gif"></td>
<td><b>Энергия Воздуха (заклинание)</b>   (Масса: 1)<br />
<b>Цена: 20 кр.</b><br />
Долговечность: 0/1<br />
<b>Требуется минимальное:</b><br />
• Интеллект: 25<br />
• Уровень: 7<br />
• Мастерство владения стихией Воздуха: 11<br />
Максимум: 1 ед.<br />
<small>Описание:<br />
Восстанавливает цели 1 - 10% маны за каждый ход работы заклинания. Заклинание прекращает действие при использовании любого другого заклинания или через 5 ходов.</small><br />
Обучает приему: <b>Энергия Воздуха</b><br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
</td>
<td>
<img src="http://img.combats.ru/i/misc/icons/wis_air_manaheal.gif"><br />
<b>Энергия Воздуха</b><br />
<IMG SRC="http://img.combats.ru/i/misc/micro/hp.gif" border=0> 1<br />
Сила духа: 3<br />
Задержка: 10 <br />
• Приём тратит ход <br />
<br />
<b>Минимальные требования: </b><br />
• Интеллект: 40<br />
• Мастерство владения стихией Воздуха: 11<br />
• Уровень: 7 <br />
<br />
Восстанавливает цели 1 - 10% маны за каждый ход работы заклинания. Заклинание прекращает действие при использовании любого другого заклинания или через 5 ходов.<br />
</td>
</tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/kamm udar.gif" border=0></td>
    <td> <B>Каменный Удар (заклинание)</B>   (Масса: 1) <br />
<b>Цена: 20 кр. </b><br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B> <br />
• Интеллект: 25 <br />
• Уровень: 7 <br />
• Мастерство владения стихией Земли: 7 <br />
Максимум: 1 ед. <br />
<small>Описание: <br />
В инструкции рассказывается, как наносить крушащие удары при помощи магии Земли. </small><br />
Обучает приему: <b>Каменный Удар</b> <br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_earth_strike.gif" border=0><br />
<B>Каменный Удар </B><br />
<br />
<b>Минимальные требования:</b><br />
• Мастерство владения стихией Земли: 7 <br />
• Интеллект: 40<br />
• Уровень: 7<br />
<br />
Прием тратит ход <br />
Приём атакует только одну цель<br />
<DIV><A href="javascript: void(0);" onClick="if (hidtext1007.style.display == '') { this.innerText = 'Действие заклинания'; hidtext1007.style.display = 'none'; } else { this.innerText = 'Скрыть'; hidtext1007.style.display = ''; }">Действие заклинания</A></DIV><DIV id='hidtext1007' style='display: none;'><br />
Для 7 уровня: <br />
Расход маны: 39 <br />
Интеллект: 40 <br />
Наносит цели 113 ед. дробящего урона<br />
 <br />
Для 8 уровня: <br />
Расход маны: 46 <br />
Интеллект: 50 <br />
Наносит цели 134 ед. дробящего урона </DIV></td>
  </tr> 
</td>
</tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell39.gif" border=0></td>
    <td> <B>Булыжник (заклинание)</B>   (Масса: 1) <br />
<b>Цена: 20 кр. </b><br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B> <br />
• Интеллект: 40 <br />
• Уровень: 7 <br />
• Мастерство владения стихией Земли: 7 <br />
Максимум: 1 ед. <br />
<small>Описание: <br />
Нет описания </small><br />
Обучает приему: <b>Булыжник</b> <br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_earth_dmg08.gif" border=0><br />
<B>Булыжник </B><br />
<br />
<b>Минимальные требования:</b><br />
• Мастерство владения стихией Земли: 7 <br />
• Интеллект: 40<br />
• Уровень: 7<br />
<br />
Прием тратит ход<br />
Приём атакует только одну цель<br />
<DIV><A href="javascript: void(0);" onClick="if (hidtext1008.style.display == '') { this.innerText = 'Действие заклинания'; hidtext1008.style.display = 'none'; } else { this.innerText = 'Скрыть'; hidtext1008.style.display = ''; }">Действие заклинания</A></DIV><DIV id='hidtext1008' style='display: none;'><br />
Для 7 уровня: <br />
Расход маны: 37 <br />
Интеллект: 40 <br />
Наносит цели 38-45 ед. урона магией земли<br />
 <br />
Для 8 уровня: <br />
Расход маны: 43 <br />
Интеллект: 50 <br />
Наносит цели 46-54 ед. урона магией земли </DIV></td>
  </tr> 
</td>
</tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell32.gif" border=0></td>
    <td> <B>Жертва Земле (заклинание)</B>   (Масса: 1) <br />
<b>Цена: 20 кр. </b><br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B> <br />
• Интеллект: 40<br />
• Уровень: 7<br />
• Мастерство владения стихией Земли: 7 <br />
<small>Максимум: 1 ед.<br />
Описание:<br />
Вы восстанавливаете 5%HP и 5%маны<br />
Обучает приему: <b>Жертва Земле</b> <br />
<small><font color=brown>Предмет не подлежит ремонту</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.com/i/misc/icons/wis_earth_sacrifice.gif" border=0><br />
<B>Жертва Земле</B><br />
<IMG SRC="http://img.combats.ru/i/misc/micro/hp.gif" border=0> 5<br />
• Расход маны: 4<br />
Задержка: 5<br />
<b>Минимальные требования:</b><br />
• Интеллект: 40<br />
• Мастерство владения стихией Земли: 7<br />
• Уровень: 7<BR><b>Описание:</b><br />
Вы восстанавливаете 5%HP и 5%маны<br />
</td>
</tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell38.gif" border=0></td>
    <td> <B>Коснуться Земли (заклинание)</B>   (Масса: 1) <br />
<b>Цена: 20 кр. </b><br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B><br />
• Интеллект: 50<br />
• Уровень: 8<br />
• Мастерство владения стихией Земли: 8  <br />
<small>Максимум: 1 ед.<br />
Описание:<br />
Снимает один негативный эффект от магии или болезни и восстанавливает 3% маны<br />
Обучает приему: <B>Коснуться Земли</B> <br />
<font color=brown>Предмет не подлежит ремонту</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_earth_cleance.gif" border=0><br />
<B>Коснуться Земли</B><br />
• Расход маны: 41<br />
Задержка: 5<br />
<b>Минимальные требования:</b><br />
• Интеллект: 50<br />
• Мастерство владения стихией Земли: 8<br />
• Уровень: 8<b><br />
Описание:</b><br />
Снимает один негативный эффект от магии или болезни и восстанавливает 3% маны<br />
</td>
</tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell36.gif" border=0></td>
    <td> <B>Песчанный Щит (заклинание)</B> (Масса: 1) <br />
<B>Цена: 25 кр.</B> <br />
Долговечность: 0/1<br />
<B>Требуется минимальное:</B><br />
• Интеллект: 50<br />
• Уровень: 8<br />
• Мастерство владения стихией Земли: 8  <br />
<small>Максимум: 1 ед.<br />
Описание:<br />
Вы получаете на 30% меньше урона от магии в течение 5 ходов<br />
Прием не подвержен действию шока.<br />
Обучает приему: <B>Песчанный Щит</B> <br />
<font color=brown>Предмет не подлежит ремонту</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_earth_shield2.gif" border=0><br />
<B>Песчанный Щит</B><br />
• Расход маны: 124<br />
Задержка: 8<br />
<b>Минимальные требования:</b><br />
• Интеллект: 50<br />
• Мастерство владения стихией Земли: 8<br />
• Уровень: 8<br />
<b>Описание:</b><br />
Вы получаете на 30% меньше урона от магии в течение 5 ходов<br />
Прием не подвержен действию шока.<br />
</td>
</tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/Zazemlenie 0.gif" border=0></td>
    <td> <B>Заземление: Ноль (заклинание)</B> (Масса: 1) <br />
<B>Цена: 25 кр.</B> <br />
Долговечность: 0/1<br />
<B>Требуется минимальное:</B><br />
• Интеллект: 50<br />
• Уровень: 8<br />
• Мастерство владения стихией Земли: 8  <br />
<small>Максимум: 1 ед.<br />
Описание:<br />
Увеличивает весь урон по цели на 3% и уменьшает целебные эффекты на 7%. Требует 5 маны каждый ход. Разные виды Заземления замещают друг друга. Маг в состоянии поддерживать лишь одно Заземление. Требует 5 маны каждый ход. Применяется до 5 раз.<br />
Прием не подвержен действию шока.<br />
Обучает приему: <B>Заземление: Ноль</B> <br />
<font color=brown>Предмет не подлежит ремонту</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_earth_link_zero.gif" border=0><br />
<B>Заземление: Ноль</B><br />
• Расход маны: 11<br />
<b>Минимальные требования:</b><br />
• Интеллект: 50<br />
• Мастерство владения стихией Земли: 8<br />
• Уровень: 8<br />
<b>Описание:</b><br />
Увеличивает весь урон по цели на 3% и уменьшает целебные эффекты на 7%. Требует 5 маны каждый ход. Разные виды Заземления замещают друг друга. Маг в состоянии поддерживать лишь одно Заземление. Требует 5 маны каждый ход. Применяется до 5 раз.<BR>Прием не подвержен действию шока.<br />
</td>
</tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/Zazemlenie minus.gif" border=0></td>
    <td> <B>Заземление: Плюс  (заклинание)</B> (Масса: 1) <br />
<B>Цена: 30 кр.</B> <br />
Долговечность: 0/1<br />
<B>Требуется минимальное:</B><br />
• Интеллект: 50<br />
• Уровень: 8<br />
• Мастерство владения стихией Земли: 8  <br />
<small>Максимум: 1 ед.<br />
<b>Описание:</b><br />
Исцеляет мага на 39HP за 10 ходов за счет жизни цели. Разные виды Заземления замещают друг друга. Маг в состоянии поддерживать лишь одно Заземление. Требует 5 маны каждый ход. Применяется до 5 раз.<br />
Прием не подвержен действию шока.<br />
Обучает приему: <B>Заземление: Плюс</B> <br />
<font color=brown>Предмет не подлежит ремонту</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_earth_link_plus.gif" border=0><br />
<B>Заземление: Плюс</B><br />
• Расход маны: 11<br />
<b>Минимальные требования:</b><br />
• Интеллект: 50<br />
• Мастерство владения стихией Земли: 8<br />
• Уровень: 8<br />
<b>Описание:</b><br />
Исцеляет мага на 39HP за 10 ходов за счет жизни цели. Разные виды Заземления замещают друг друга. Маг в состоянии поддерживать лишь одно Заземление. Требует 5 маны каждый ход. Применяется до 5 раз.<br />
Прием не подвержен действию шока<br />
</td>
</tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/Zazemlenie minus35.gif" border=0></td>
    <td> <B>Заземление: Минус  (заклинание)</B> (Масса: 1) <br />
<B>Цена: 30 кр.</B> <br />
Долговечность: 0/1<br />
<B>Требуется минимальное:</B><br />
• Интеллект: 50<br />
• Уровень: 8<br />
• Мастерство владения стихией Земли: 8  <br />
<small>Максимум: 1 ед.<br />
Описание:<br />
Цель теряет 79 маны за 10 ходов. Разные виды Заземления замещают друг друга. Маг в состоянии поддерживать лишь одно Заземление. Требует 1 маны каждый ход. Применяется до 5 раз.<br />
Прием не подвержен действию шока.<br />
Обучает приему: <B>Заземление: Минус</B> <br />
<font color=brown>Предмет не подлежит ремонту</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.com/i/misc/icons/wis_earth_link_minus.gif" border=0><br />
<B>Заземление: Минус</B><br />
• Расход маны: 11<br />
<b>Минимальные требования:</b><br />
• Интеллект: 50<br />
• Мастерство владения стихией Земли: 8<br />
• Уровень: 8<br />
<b>Описание:</b><br />
Цель теряет 79 маны за 10 ходов. Разные виды Заземления замещают друг друга. Маг в состоянии поддерживать лишь одно Заземление. Требует 1 маны каждый ход. Применяется до 5 раз.<br />
Прием не подвержен действию шока.<br />
Обучает приему: Заземление: Минус<br />
</td></td>
</tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/kav cvetok.gif" border=0></td>
    <td> <B>Каменный Цветок  (заклинание)</B> (Масса: 1) <br />
<B>Цена: 35 кр.</B> <br />
Долговечность: 0/1<br />
<B>Требуется минимальное:</B><br />
• Интеллект: 50<br />
• Уровень: 8<br />
• Мастерство владения стихией Земли: 8  <br />
<small>Максимум: 1 ед.<br />
Описание:<br />
Нет описания<br />
Обучает приему: <B>Каменный Цветок</B> <br />
<font color=brown>Предмет не подлежит ремонту</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_earth_flower.gif" border=0><br />
<B>Каменный Цветок [8]</B><br />
<IMG width=8 height=8 src=http://img.combats.ru/i/misc/micro/hp.gif> 1<br />
• Расход маны: 106<br />
Задержка: 3<br />
• Прием тратит ход<br />
<b>Минимальные требования:</b><br />
• Интеллект: 50<br />
• Мастерство владения стихией Земли: 8<br />
• Уровень: 8<br />
<b>Описание:</b><br />
Цель получает 216 урона магией земли и лишается возможности использовать приемы 1 ход. Еще 3 цели получают 73 урона магией земли<br />
<DIV><A href="javascript: void(0);" onClick="if (hidtext1009.style.display == '') { this.innerText = 'Далее'; hidtext1009.style.display = 'none'; } else { this.innerText = 'Скрыть'; hidtext1009.style.display = ''; }">Далее</A></DIV><DIV id='hidtext1009' style='display: none;'><B>Каменный Цветок [9]</B><br />
<IMG width=8 height=8 src=http://img.combats.ru/i/misc/micro/hp.gif> 1<br />
• Расход маны: 127<br />
Задержка: 3<br />
• Прием тратит ход<br />
<b>Минимальные требования:</b><br />
• Интеллект: 60<br />
• Мастерство владения стихией Земли: 9<br />
• Уровень: 9<br />
<b>Описание:</b><br />
Цель получает 255урона магией земли и лишается возможности использовать приемы 1 ход. Еще 3 цели получают 88 урона магией земли</DIV><br />
</td></td>
</tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/kamenn straj.gif" border=0></td>
    <td> <B>Призвать Каменного Стража (заклинание)</B> (Масса: 1) <br />
<B>Цена: 40 кр.</B> <br />
Долговечность: 0/1<br />
<B>Требуется минимальное:</B><br />
• Интеллект: 50<br />
• Уровень: 8<br />
• Мастерство владения стихией Земли: 12  <br />
<small>Максимум: 1 ед.<br />
Описание:<br />
Призывает в бой Каменного Стража для защиты мага.<br />
Страж нуждается в 10 маны каждый ход.<br />
Обучает приему: <B>Призвать Каменного Стража</B> <br />
<font color=brown>Предмет не подлежит ремонту</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_earth_summon.gif" border=0><br />
<B>Призвать Каменного Стража</B><br />
• Расход маны: 166<br />
Задержка: 20<br />
• Прием тратит ход<br />
<b>Минимальные требования:</b><br />
• Мастерство владения стихией Земли: 12<br />
• Уровень: 8<br />
<b>Описание:</b><br />
Призывает в бой Каменного Стража для защиты мага.<br />
Страж нуждается в 9 маны каждый ход.<br />
</td></td>
</tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell37.gif" border=0></td>
    <td> <B>Каменный Щит (заклинание)</B> (Масса: 1) <br />
<B>Цена: 25 кр.</B> <br />
Долговечность: 0/1<br />
<B>Требуется минимальное:</B><br />
• Интеллект: 50<br />
• Уровень: 8<br />
• Мастерство владения стихией Земли: 8  <br />
<small>Максимум: 1 ед.<br />
Описание:<br />
Вы получаете на 95% меньше урона в этот размен<br />
Прием не подвержен действию шока.<br />
Обучает приему: <B>Каменный Щит</B> <br />
<font color=brown>Предмет не подлежит ремонту</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_earth_shield.gif" border=0><br />
<B>Каменный Щит</B><br />
• Расход маны: 124<br />
Задержка: 7<br />
<b>Минимальные требования:</b><br />
• Интеллект: 50<br />
• Мастерство владения стихией Земли: 8<br />
• Уровень: 8<br />
<b>Описание:</b><br />
Вы получаете на 95% меньше урона в этот размен<BR>Прием не подвержен действию шока.<br />
</TABLE>
</div></div></div><br />
<br />
<div style="margin:0; margin-top:8px"><div style="margin-bottom:4px"><input type="button" value="Другое" onClick="if (this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display != '') { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = ''; this.innerText = ''; this.value = 'Скрыть'; } else { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = 'none'; this.innerText = ''; this.value = 'Другое'; }"></div><div ><div style="display: none;"><br />
<br />
<TABLE class=BL>
<TABLE class="ST" cellspacing="1">
<tr>
    <TH><DIV style="text-align: left;"><B>Книга</B></DIV></TD>
    <TH><DIV style="text-align: center;"><B>Свойства книги</B></DIV></TD>
</tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/dgsdsf.gif" border=0></td>
    <td><B> Тайное Знание (том 1)</B>   (Масса: 1)<br />
<br />
<B>Цена: 500 кр. </B><br />
<B>Требуется минимальное:</B> <br />
• Уровень: 7 <br />
Максимум: 1 ед. <br />
<small>Описание: <br />
Добавляет +1 дополнительный слот для приемов. Каждый том может быть использован лишь один раз.<br />
<font color=brown>Предмет не подлежит ремонту</font></small><br />
 </td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/dgsdsf.gif" border=0></td>
    <td> <B> Тайное Знание (том 2)</B>   (Масса: 1)<br />
<br />
<B>Цена: 1000 кр. </B><br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B> <br />
• Уровень: 8 <br />
Максимум: 1 ед. <br />
<small>Описание: <br />
Добавляет +1 дополнительный слот для приемов. Каждый том может быть использован лишь один раз. Для изучения требуется знание первого тома.<br />
<font color=brown>Предмет не подлежит ремонту</font></small> <br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/dgsdsf.gif" border=0></td>
    <td><B>Тайное Знание (том 3)</B>   (Масса: 1)<br />
<br />
<B>Цена: 2000 кр. </B><br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B> <br />
• Уровень: 9 <br />
Максимум: 1 ед. <br />
<small>Описание: <br />
Добавляет +1 дополнительный слот для приемов. Каждый том может быть использован лишь один раз. Для изучения требуется знание второго тома. <br />
<font color=brown>Предмет не подлежит ремонту</font></small><br />
 </td>
  </tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/dgsdsf.gif" border=0></td>
    <td><B>Тайное Знание (том 4)</B>   (Масса: 1)<br />
<br />
<B>Цена: 5000 кр.</B> <br />
Долговечность: 0/1 <br />
<B>Требуется минимальное:</B> <br />
• Уровень: 10 <br />
Максимум: 1 ед. <br />
<small>Описание: <br />
Добавляет +1 дополнительный слот для приемов. Каждый том может быть использован лишь один раз. Для изучения требуется знание третьего тома.<br />
<font color=brown>Предмет не подлежит ремонту</font></small><br />
 </td>
  </tr>
</TABLE>
</div></div></div>        <HR>
        <BR>
</TD></TR>
</TABLE>
        
    
    
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