<?
	session_start();
	include "../../connect.php";
	$user = mysqli_fetch_array(db_query("SELECT * FROM `users` WHERE `id` = '".$_COOKIE['uid']."' LIMIT 1;"));
	include "../../functions.php";
	$Get_Page="all_hznanii";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="icon" href="/i/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/i/favicon.ico" type="image/x-icon"> 
<title>Event bestcombats.net</title>
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
<TD><font color=white><?if(!empty($user['login'])){echo''.$user['login'].'&nbsp;['.$user['level'].']';}else{echo'Гость БК';}?></font></TD></TR>
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
   <TD align=left background=/i/menu1at1.gif bgColor=#aa0000 style="padding-left:75px;"><A onmouseover="MM_swapImage('news','','/i/menu1at2.gif',1)" onclick=this.blur() onmouseout=MM_swapImgRestore() href="/"><IMG height=36 src="/i/menu1ps2.gif" width=47 border=0 name=news alt="Новости"></A><A onmouseover="MM_swapImage('#','','/i/menu1at3.gif',1)" onclick=this.blur() onmouseout=MM_swapImgRestore() href="#"><IMG height=36 src="/i/menu1ps3.gif" width=42 border=0 name="history" alt="История"></A><A onmouseover="MM_swapImage('status','','/i/menu1at4.gif',1)" onclick=this.blur() onmouseout=MM_swapImgRestore() href="/status/"><IMG height=36 src="/i/menu1ps4.gif" width=42 border=0 name="status" alt="Состояние серверов"></A><A onmouseover="MM_swapImage('gallery','','/i/menu1at5.gif',1)" onclick=this.blur() onmouseout=MM_swapImgRestore() href="#"><IMG height=36 src="/i/menu1ps5.gif" width=42 border=0 name="gallery" alt="Галерея"></A><A onmouseover="MM_swapImage('vote','','/i/menu1at7.gif',1)" onclick=this.blur() onmouseout=MM_swapImgRestore() href="#"><IMG height=36 src="/i/menu1ps7.gif" width=41 border=0 name="vote" alt="Голосования"></A><A onmouseover="MM_swapImage('inwork','','/i/menu1at8.gif',1)" onclick=this.blur() onmouseout=MM_swapImgRestore() href="#"><IMG height=36 src="/i/menu1ps8.gif" width=41 border=0 name="inwork" alt="В разработке"></A><A onmouseover="MM_swapImage('release','','/i/menu1at9.gif',1)" onclick=this.blur() onmouseout=MM_swapImgRestore() href="#"><IMG height=36 src="/i/menu1ps9.gif" width=48 border=0 name="release" alt="Вестник Администрации"></A></TD>
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
   <TD width=1 bgColor=#000000>
    <IMG height=1 src="/i/spacer.gif" width=1>
   </TD>
 
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
  <div style="padding: 0px 3px 5px 3px"><a href="http://www.bestcombats.net">Главная страница</a></div>
  
  <div style="padding: 0px 3px 5px 3px"><a href="http://forum.bestcombats.net/">Форум</a></div>
  
  <div style="padding: 0px 3px 5px 3px"><a href="http://support.bestcombats.net/">Support</a></div>
  
  <div style="padding: 0px 3px 5px 3px"><a href="#">Паладины</a></div>
  
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
<TABLE width="98%" align=center border=0>
<TBODY>
<TR>
<TD class=normaltext align=left valign="top">
 
<div class="page_title"><B>Всё о Храме Знаний</B></div>
 
<HR align=center width="90%" color=#aa0000 noShade SIZE=0.1><TABLE width=100% border="0">

																										  
</TD>
<div class=main_body id=main_body ><div class=dotted_border><div class=graphic_block><h3><span class=right></span></h3><div class=body><center><img src='http://bestcombats.net/news/i/abbadon.jpg' alt='' title=''></center>
<br />
<br />
<b>11</b>-го <b>сентября 2007-го </b>года в <img src='http://img.combats.ru/i/misc/forum/fo11.gif' alt='' title=''><b>Abandoned Plain</b> появилась новая локация - <b>Храм Знаний.</b><br />
<br />
<p>
<br />
<font size='1'>С сегодняшнего дня в Abaddoned Plans открыл свои врата Храм Знаний. Его обитатели помогут игрокам изучить древние тайны рун.</p>
<br />
<p><u>Краткая информация о рунах.</u></p>
<p>Руны – это таинственные предметы, обладающие магическими свойствами. Они создаются при растворении вещей и забирают в себя часть их силы. Растворять можно только вещи, начиная с 4-ого уровня, и только основные части защитной экипировки. </p>
<p>Чем могущественней предмет, тем мощнее из него может получиться руна и тем более высокий уровень игрока потребуется для ее применения. Чем слабее вещь, тем больше шансов, что растворение пройдет неудачно. Игроки смогут использовать руны для улучшения своей экипировки аналогично свиткам зачаровывания. Как и чарки, руны связывают игрока и вещь общей судьбой, их можно накладывать друг на друга, с потерей свойств более старой. Сами по себе руны не привязаны к игроку, так что их можно передавать или продавать, все, за исключением особенно редких экземпляров.</p>
<br />
<p><u>Что даст система рун игрокам?</u></p>
<p>- возможность утилизации привязанных и ненужных предметов с пользой для себя;</p>
<p>- возможность улучшить боевые характеристики своих вещей по своему вкусу</p>
<br />
<p><u>Сотворение рун.</u></p>
<p>Руны создаются при уничтожении (растворении) вещей в Храме Знаний. Но такая возможность появляется только при достижении игроком определенного уровня репутации в Храме Знаний . Чем выше репутация, тем более мощные руны можно извлечь из вещи – правда, мощь руны всегда ограничивается уровнем растворяемого предмета.</p>
<br />
<p><u>Слияние рун.</u></p>
<p>Новые руны игрок сможет получить, путем слияния старых. Из трех рун одной формы получается одна руна той же формы, но с большой вероятностью других магических свойств. Таким образом, можно будет создавать руны с более подходящими игроку параметрами.</p>
<br />
<p><b>Некоторые моменты:</b></p>
<p>- артефакты переполнены магической силой, растворить их невозможно, равно как и улучшить рунами.</p>
<p>- растворять и улучшать рунами можно: шлем, наручи, перчатки, броню, пояс, серьги, амулет, кольца, поножи, ботинки.</p>
<p>- зачарованные свитками вещи, можно улучшать рунами без потери чарок (руны и чарки не замещают друг друга)</p>
<br />
<p>Удачи в экспериментах, и не забудьте выслушать Хранителя Знаний.</p></font></div>
<br />
<br />
<p><b>Класс, здравствуйте!!!</b> <i>Итак, сегодня на нашем уроке мы с Вами рассмотрим, что же за такое величественное  строение под названием </i><b>Храм Знаний </b><i>и для чего он нужен.</i> </p>
<br />
<p><i>Что бы Вы уяснили тему сегодняшнего занятия  и не переспрашивали по сто раз, мы с Вами проведем небольшую экскурсию по </i><b>Храму</b>. </p>
<br />
<p><i>Итак, поехали.</i></p>
<br />
Сначала нам нужно выйти из класса, и направиться в <img src='http://img.combats.ru/i/misc/forum/fo11.gif' alt='' title=''><b>Abandoned Plain</b>. Вот мы уже на месте выходим и направляемся в <b>Храм Знаний</b>, тут нас встречает <b>Хранитель Знаний</a></b>, здороваемся и слушаем что он нам скажет. <br />
<br />
И молвил он!<div id='h2' class=hidden><br />
<br />
• <b>Что от меня потребуется?</b><br />
Дело в том, что мы, Хранители Знаний, слишком заняты изучением основ мироздания и магии, постоянно ставим опыты и удивительные эксперименты... поэтому мы редко покидаем стены храма, и вынуждены прибегать к помощи посторонних для сбора новых образцов и реактивов. Тебе выпала честь добыть пробу канализационных вод, что текут под городами. Мы дадим тебе специальную склянку для этой цели. Ищи загрязненный водосток.<br />
<br />
• <b>Постой, расскажи, чем вы здесь занимаетесь?</b><br />
Всех обитателей и гостей нашего храма, так или иначе, объединяет жажда знаний. Сейчас нас особенно увлекло изучение магических свойств предметов. Мы научились извлекать частицы силы из вещей и заключать их в руны. Эти руны можно использовать для усиления других предметов, или соединять их вместе, получая иные свойства. Все это со временем станет доступно и тебе, если ты заслужишь репутацию в нашем храме.<br />
<br />
• <b>А какие бывают руны?</b><br />
Нам известно огромное количество различных рун, но всех их объединяет ряд общих свойств: мы различаем цвет, форму и знак. В результате множества экспериментов, было установлено, что цвет определяет свойства силы руны, форма определяет мощь, а знак - тип предметов, для которых руна предназначена. Кроме того, иногда, очень редко, нам встречались уникальные руны, много мощнее остальных и совершенно необычного цвета.<br />
<br />
• <b>Из каких вещей можно получить руны?</b><br />
Большинство вещей в нашем мире содержат достаточную силу, чтобы попытаться ее извлечь и получить руну. Нами было открыто, что чем могущественнее предмет, тем больше шансов превратить его в мощную руну. Извлечь магическую силу из вещи можно только в стенах нашего храма. Для этого ты можешь воспользоваться алтарем, стоящим слева.<br />
<br />
• <b>Расскажи о соединении рун.</b><br />
Руны - это таинственные предметы, наделенные удивительными свойствами. В ходе одного из опытов, мой коллега сумел обратить три руны одной формы в новую руну той же формы, но иных свойств. Следуя этим путем, можно получить руны с более привлекательными свойствами. Попробовать свои способности в соединении рун ты можешь на правом алтаре.<br />
<br />
• <b>Как мне повысить репутацию в Храме Знаний?</b><br />
Ты можешь повысить свою репутацию в наших кругах только внеся определенный вклад в развитие храма. Это могут быть практические знания, которые ты будешь получать при создании рун, или же материальные подношения. Обитатели храма постоянно нуждаются в реактивах и материалах для экспериментов, и мы всегда будем рады пополнению наших лабораторий сущностями ресурсов.<br />
<br />
• <b>Что за алтарь слева?</b><br />
Большинство вещей в нашем мире содержат достаточную силу, чтобы попытаться ее извлечь и получить руну. Нами было открыто, что чем могущественнее предмет, тем больше шансов превратить его в мощную руну. Извлечь магическую силу из вещи можно только в стенах нашего храма. Для этого ты можешь воспользоваться алтарем, стоящим слева.<br />
<br />
• <b>Что за алтарь справа?</b><br />
Руны - это таинственные предметы, наделенные удивительными свойствами. В ходе одного из опытов, мой коллега сумел обратить три руны одной формы в новую руну той же формы, но иных свойств. Следуя этим путем, можно получить руны с более привлекательными свойствами. Попробовать свои способности в соединении рун ты можешь на правом алтаре.<br />
<br />
• <b>Пожалуй, в другой раз. (завершить разговор)</b></div>
<br />
<br />
<p><i>Поговорив с Хранителем, мы получаем от него <b>задание</b>, и <b>Пустую Склянку.</b> И зачем всё это нам нужно спросите Вы ??? А нечего перебивать и слушайте дальше. Оказывается, что бы мы могли воспользоваться <b>Храмом</b> мы должны наполнить ту самую <b>Пустую склянку</b> некими весьма необходимыми пробами. Для этого мы должны с Вами отправиться в <b>Заброшенную Канализацию</b> и ползать по ней пока не найдем те самые пробы, они могут находиться в любом месте <b>точного места расположения нет.</b>  </i></p>
<br />
<a class=hide_link href="javascript:hideIt('h3','Убрать','Склянки.','l3')" id='l3'>Склянки.</a><div id='h3' class=hidden><br />
<br />
<b>До</b><br />
<img src='http://bestcombats.net/news/i/empty_rune_vial.gif' alt='' title=''> - <b>Пустая Склянка</b><br />
<br />
<b>После</b><br />
<img src='http://bestcombats.net/news/i/full_rune_vial.gif' alt='' title=''> - <b>Склянка с пробами</b></div>
<br />
<br />
<p>Ну, вот, наконец, мы нашли ту самую склянку с пробами и быстро бежим к Хранителю.</p>
<p>Хранитель встречает нас с распростертыми руками, благодарит нас и разрешает пользоваться двумя алтарями, расположенными по обе стороны от Хранителя. </p>
<p>Слева от Вас располагается алтарь, где можно непосредственно растворять вещи, а с права, где можно будет комбинировать руны.</p>
<br />
<center><img src='http://bestcombats.net/news/i/hram.jpg' alt='' title=''></center>
<br />
<b>Теперь мы с Вами направимся в класс, где проведем теоретическую часть занятия.</b><br />
<br />
<b><font color='red'>Начнем с того, как же мы можем получить руну и что для этого необходимо:</font></b><br />
- Персонаж, который растворяет предмет,  должен быть не ниже <b>4 уровня</b>, как и растворяемый предмет. <br />
- Растворяются не все предметы, вот перечень растворяемых предметов: <b>шлем, наручи, перчатки, броню, пояс, серьги, амулет, кольца, поножи, ботинки.</b><br />
- Не растворяются: все, что не входит в выше сказанное. <br />
- Вещи можно растворить связанные общей  <img src='http://img.combats.ru/i/destiny.gif' alt='' title=''>судьбой,  <img src='http://img.combats.ru/i/podarok.gif' alt='' title=''>подарочные, купленные за зубы, "убитые", купленные в канализации, вещи из  <img src='http://img.combats.ru/i/align50.gif' alt='' title=''>Березки.<br />
- Не получится растворить привязанные к другому человеку вещи, пещерные ингридиенты,  <img src='http://img.combats.ru/i/artefact.gif' alt='' title=''>артефакты.<br />
<br />
<b><font color='red'>Взаимосвязь растворяемых вещей и рун:</font></b><br />
- <b>Уровень </b>разлагаемой вещи влияет на уровень руны. Правда, с некоторой вероятностью из вещей высокого уровня получаются самые низкоуровневые руны.<br />
- <b>Тип </b>разлагаемой вещи не влияет на то, какая руна получится: если растворить шлем, не обязательно получите руну на шлем.<br />
- <b>Чарование</b> растворяемой вещи не влияет на руну.<br />
- <b>Долговечность</b> не влияет на уровень руны<br />
- <b>Параметры</b> расплавляемой вещи не влияют на параметры руны.<br />
<br />
<b><font color='red'>Сгорание:</font></b><br />
- Репутация не влияет на вероятность сгорания.<br />
- Уровень персонажа не влияет на вероятность неудачного растворения.<br />
- Не подлежащая ремонту вещь с полным износом годна к рунированию.<br />
<br />
<font color='red'><b>Посвящение:</b></font><br />
Необходимая <b>репутация</b> для получения <b>Посвящения </b><img src='http://img.combats.ru/i/misc/znrune_1.gif' alt='' title=''><b>Первого Круга: 100. </b><img src='http://img.combats.ru/i/misc/znrune_2.gif' alt='' title=''><b>Второго Круга - 1000.</b><br />
<br />
<b>Первый круг </b>дает возможность растворять вещи <b>до 8-го уровня,</b> <b>Второй - до 10-го.</b><br />
Наиболее быстрый и эффективный способ стать <b>посвященным</b>: расплавлять <b>сущности ресурса:</b> за <b>пять </b>сущностей ресурса получаем <b>10</b> репутации. Таким образом,<img src='http://img.combats.ru/i/misc/znrune_1.gif' alt='' title=''><b> первый </b>круг обойдется в <b>50</b> сущностей, а <img src='http://img.combats.ru/i/misc/znrune_2.gif' alt='' title=''><b>второй</b> - в <b>500</b>.<br />
<br />
<b>Сущности</b> не создают руны.<br />
<br />
<font color='red'><b>Комбинирование рун:</b></font><br />
- После комбинирования руны <b>не суммируются</b>, а меняются на руну, <b>не имеющую</b> свойств тех рун, из которых ее создали.<br />
То есть не стоит пробовать создать сильную руну из более слабых - принцип чарок тут не действует.<br />
- Возможно комбинировать руны, полученные с вещей <b>разных уровней</b>.<br />
- Возможно комбинировать руны разных цветов.<br />
- <b>"Разлагать"</b> руны на компоненты нельзя.<br />
- Полученная при комбинировании руна будет <b>того же уровня, но другая по свойствам.</b><br />
<br />
<font color='red'><b>Суперруны:</b></font><br />
- Суперруну можно получить <b>только растворяя </b>предметы.<br />
- При растворении <b>Брони Повелителя </b>шанс получить суперруну немного выше.<br />
- Суперруну можно получить при растворении любой вещи выше определённого уровня.<br />
- Чем выше <b>уровень</b> предмета, тем выше шанс получить суперруну.<br />
- Для магов есть специальные суперруны.<br />
- Суперрун на уменьшение расхода маны и подавления защиты от магии нет.<br />
<br />
<br />
<font color='red'><b>Применение рун:</b></font><br />
- Одну наложенную на вещь руну можно <b>заменить</b> на другую - следующая руна <b>затирает </b>предыдущую.<br />
- Вещь, на которую применили руну, <b>связывается</b> общей <img src='http://img.combats.ru/i/destiny.gif' alt='' title=''><b>судьбой</b>.<br />
- Руна не замещает <b>чарование.</b><br />
- <b>Апгрейд</b> вещей на <b>10</b>-ый уровень - "слетают" ли руны или нет? (пока уточняется)<br />
Вероятнее всего, при апгрейде руна всё же будет слетать, т.к. вещи полностью обновляются в этом случае. Сильные руны лучше придержать на 10-й уровень.<br />
<br />
<b>Рунный словарик:</b>
<br />
<p><i>Имя руны состоит из <b>двух</b> слов.</p>
<p><b>Первое</b> слово указывает на принадлежность руны к стихии, обуславливает ее цвет и область улучшаемых характеристик.</p>
<p><b>Второе</b> слово сложено из двух составляющих. <b>Первая</b> составляющая - корень; <b>вторая</b> - окончание. Корень указывает на силу руны, окончание на предмет, который руна улучшает.</i></p>
<br />
<font color='red'><b>Первые слова в рунах:</b></font><br />
<i><b>Аква</b> - вода, фиолетовая;<br />
<b>Аура </b>- воздух, голубая;<br />
<b>Игнис</b> - огонь, оранжевая;<br />
<b>Тера</b> - земля, зеленая.</i><br />
<br />
<font color='red'><b>Корни второго слова:</b></font><br />
<i><b>(Рота)</b> - круглая, самая слабая;<br />
<b>(Триа)</b> - треугольная, средняя по силе;<br />
<b>(Квад)</b>- четырехугольная, сильная руна.</i><br />
<br />
<font color='red'><b>Окончания второго слова:</b></font><br />
<i><b>[хи]</b> - серьги;<br />
<b>[хэ]</b> - ожерелье;<br />
<b>[ви]</b> - кольцо;<br />
<b>[во]</b> - перчатки;<br />
<b>[кэ]</b> - поножны;<br />
<b>[ки]</b> - обувь;<br />
<b>[ми]</b> - шлем;<br />
<b>[си]</b> - наручи;<br />
<b>[мо]</b> - броня;<br />
<b>[со]</b> - пояс.</i><br />
<br />
Например: руна <b>Аура (Триа)[хэ]</b> зачарует ожерелье с средней силой. <b>Аква (Рота)[ми]</b> - слабо зачарует шлем.<br />
<br />
<font color='green'><i><b>Зная все вышеизложенное, можно легко отыскивать на аукционе руны нужной силы, или же руны, чарующие необходимый предмет. Как показала практика, вбитые в поиск окончания рун показывают только руны и только с этим окончанием.</b></i></font><br />
</div>
<br />
<br />
<i>Всего существует <b>130</b> рун из них <b>10 супер руны</b>, ниже будут добавляться, по мере нахождения, все руны.</i><br />
<br />
<font color='red'><b>Внимание!</b></font><br />
<i>Вещи <b>после</b> их рунирования не только связываются <b>общею судьбой</b> с Вами, но их и <b>нельзя</b> продать в <b>гос. маг </b>или сдать в <b>комок</b>. </i><br />
<br />
<br />
<a class=hide_link href="javascript:hideIt('h5','Спрятать','Руны 4 уровня.','l5')" id='l5'>Руны 4 уровня.</a><div id='h5' class=hidden><br />
<TABLE BORDER=5 width=100% align=center>
 <TR>
  <TH width=12%>-</TH>
  <TH width=22%><center><b>Игнис</b></center></TH>
  <TH width=22%><center><b>Аква</b></center></TH>
  <TH width=22%><center><b>Аура</b></center></TH>
  <TH width=22%><center><b>Тера</b></center></TH>
 </TR>
 <TR>
  <TD><center><b>Параметры</b></center></TD>
  <TD>• Мф. мощности рубящего урона: +1<br />
• Мф. мощности магии огня: +1<br />
• Мф. критического удара: +5<br />
• Защита от рубящего урона: +5<br />
• Защита от магии огня: +5</TD>
  <TD>• Мф. мощности режущего урона: +1<br />
• Мф. мощности магии воды: +1<br />
• Мф. против критического удара: +5<br />
• Защита от режущего урона: +5<br />
• Защита от магии воды: +5</TD>
  <TD>• Мф. мощности колющего урона: +1<br />
• Мф. мощности магии воздуха: +1<br />
• Мф. увертывания: +5<br />
• Защита от колющего урона: +5<br />
• Защита от магии воздуха: +5</TD>
  <TD>• Мф. мощности дробящего урона: +1<br />
• Мф. мощности магии земли: +1<br />
• Мф. против увертывания: +5<br />
• Защита от дробящего урона: +5<br />
• Защита от магии земли: +5</TD>
 </TR>
 <TR>
  <TD><center><b>Ротахи<br />
(Серьги)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_0_1.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_1_1.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_2_1.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_3_1.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>Ротахэ<br />
(Ожерелье)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_0_2.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_1_2.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_2_2.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_3_2.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>Ротави<br />
(Кольцо)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_0_3.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_1_3.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_2_3.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_3_3.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>Ротаво<br />
(Перчатки)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_0_4.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_1_4.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_2_4.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_3_4.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>Ротакэ<br />
(Поножи)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_0_5.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_1_5.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_2_5.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_3_5.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>Ротаки<br />
(Обувь)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_0_6.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_1_6.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_2_6.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_3_6.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>Ротами<br />
(Шлем)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_0_7.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_1_7.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_2_7.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_3_7.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>Ротаси<br />
(Наручи)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_0_8.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_1_8.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_2_8.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_3_8.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>Ротамо<br />
(Броня)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_0_9.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_1_9.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_2_9.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_3_9.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>Ротасо<br />
(Пояс)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_0_10.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_1_10.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_2_10.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_3_10.gif' alt='' title=''></center></TD>
 </TR>
</table></div>
<br />
<br />
<a class=hide_link href="javascript:hideIt('h6','Спрятать','Руны 7 уровня.','l6')" id='l6'>Руны 7 уровня.</a><div id='h6' class=hidden><TABLE BORDER=5 width=100% align=center>
 <TR>
  <TH width=12%>-</TH>
  <TH width=22%><center><b>Игнис</b></center></TH>
  <TH width=22%><center><b>Аква</b></center></TH>
  <TH width=22%><center><b>Аура</b></center></TH>
  <TH width=22%><center><b>Тера</b></center></TH>
 </TR>
 <TR>
  <TD><center><b>Параметры</b></center></TD>
  <TD>• Интуиция: +1 <br />
• Мф. мощности рубящего урона: +3<br />
• Мф. мощности магии огня: +3<br />
• Мф. критического удара: +10<br />
• Защита от рубящего урона: +10<br />
• Защита от магии огня: +10</TD>
  <TD>• Ловкость: +1 <br />
• Мф. мощности режущего урона: +3<br />
• Мф. мощности магии воды: +3<br />
• Мф. против критического удара: +10<br />
• Защита от режущего урона: +10<br />
• Защита от магии воды: +10</TD>
  <TD>• Интеллект: +1 <br />
• Уровень маны: +10 <br />
• Мф. мощности колющего урона: +3<br />
• Мф. мощности магии воздуха: +3<br />
• Мф. увертывания: +10<br />
• Защита от колющего урона: +10<br />
• Защита от магии воздуха: +10 </TD>
  <TD>• Сила: +1 <br />
• Уровень жизни (HP): +10<br />
• Мф. мощности дробящего урона: +3<br />
• Мф. мощности магии земли: +3<br />
• Мф. против увертывания: +10<br />
• Защита от дробящего урона: +10<br />
• Защита от магии земли: +10</TD>
 </TR>
 <TR>
  <TD><center><b>Триахи<br />
(Серьги)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_0_1.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_1_1.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_2_1.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_3_1.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>Триахэ<br />
(Ожерелье)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_0_2.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_1_2.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_2_2.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_3_2.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>Триави<br />
(Кольцо)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_0_3.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_1_3.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_2_3.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_3_3.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>Триаво<br />
(Перчатки)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_0_4.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_1_4.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_2_4.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_3_4.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>Триакэ<br />
(Поножи)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_0_5.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_1_5.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_2_5.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_3_5.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>Триаки<br />
(Обувь)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_0_6.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_1_6.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_2_6.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_3_6.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>Триами<br />
(Шлем)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_0_7.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_1_7.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_2_7.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_3_7.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>Триаси<br />
(Наручи)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_0_8.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_1_8.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_2_8.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_3_8.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>Триамо<br />
(Броня)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_0_9.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_1_9.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_2_9.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_3_9.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>Триасо<br />
(Пояс)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_0_10.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_1_10.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_2_10.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_3_10.gif' alt='' title=''></center></TD>
 </TR>
  </table></div>
<br />
<br />
<a class=hide_link href="javascript:hideIt('h7','Спрятать','Руны 9 уровня.','l7')" id='l7'>Руны 9 уровня.</a><div id='h7' class=hidden><br />
<TABLE BORDER=5 width=100% align=center>
 <TR>
  <TH width=12%>-</TH>
  <TH width=22%><center><b>Игнис</b></center></TH>
  <TH width=22%><center><b>Аква</b></center></TH>
  <TH width=22%><center><b>Аура</b></center></TH>
  <TH width=22%><center><b>Тера</b></center></TH>
 </TR>
 <TR>
  <TD><center><b>Параметры</b></center></TD>
  <TD>• Интуиция: +2 <br />
• Мф. мощности магии стихий: +3<br />
• Мф. мощности рубящего урона: +5<br />
• Мф. мощности магии огня: +5<br />
• Мф. мощности крит. удара: +5<br />
• Мф. критического удара: +20<br />
• Защита от рубящего урона: +20<br />
• Защита от магии огня: +20</TD>
  <TD>• Ловкость: +2 <br />
• Мф. контрудара: +5<br />
• Мф. мощности режущего урона: +5<br />
• Мф. мощности магии воды: +5<br />
• Мф. против критического удара: +20<br />
• Защита от режущего урона: +20<br />
• Защита от магии воды: +20 <br />
• Защита от магии: +10</TD>
  <TD>• Интеллект: +2 <br />
• Уровень маны: +20 <br />
• Мф. парирования: +3<br />
• Мф. мощности колющего урона: +5<br />
• Мф. мощности магии воздуха: +5<br />
• Мф. увертывания: +20<br />
• Защита от колющего урона: +20<br />
• Защита от магии воздуха: +20</TD>
  <TD>• Сила: +2<br />
• Защита от урона: +10<br />
• Уровень жизни (HP): +20<br />
• Мф. мощности дробящего урона: +5<br />
• Мф. мощности магии земли: +5 <br />
• Мф. мощности урона: +3<br />
• Мф. против увертывания: +20<br />
• Защита от дробящего урона: +20<br />
• Защита от магии земли: +20</TD>
 </TR>
 <TR>
  <TD><center><b>Квадхи<br />
(Серьги)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_0_1.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_1_1.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_2_1.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_3_1.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>Квадхэ<br />
(Ожерелье)<br />
</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_0_2.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_1_2.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_2_2.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_3_2.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>Квадви<br />
(Кольцо)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_0_3.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_1_3.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_2_3.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_3_3.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>Квадво<br />
(Перчатки)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_0_4.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_1_4.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_2_4.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_3_4.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>Квадкэ<br />
(Поножи)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_0_5.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_1_5.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_2_5.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_3_5.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>Квадки<br />
(Обувь)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_0_6.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_1_6.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_2_6.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_3_6.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>Квадми<br />
(Шлем)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_0_7.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_1_7.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_2_7.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_3_7.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>Квадси<br />
(Наручи)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_0_8.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_1_8.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_2_8.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_3_8.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>Квадмо<br />
(Броня)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_0_9.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_1_9.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_2_9.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_3_9.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>Квадсо<br />
(Пояс)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_0_10.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_1_10.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_2_10.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_3_10.gif' alt='' title=''></center></TD>
 </TR>
  </table>
</div>
<br><br />
<a class=hide_link href="javascript:hideIt('h8','Спрятать','Супер Руны.','l8')" id='l8'>Супер Руны.</a><div id='h8' class=hidden><br />
<TABLE BORDER=5 width=100% align=center>
 <TR>
  <TH width=20%><center><b>Унифенто</b></center></TH>
  <TH width=20%><center><b>Уникэпо</b></center></TH>
  <TH width=20%><center><b>Униманус</b></center></TH>
  <TH width=20%><center><b>Уникритус</b></center></TH>
  <TH width=20%><center><b>Униборо</b></center></TH>
 </TR>
 <TR>
  <TD><center><img src='http://img.combats.ru/i/items/rune_super_6.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_super_7.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_super_8.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_super_9.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_super_10.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center>• Мф. мощности магии стихий: +5</center></TD>
  <TD><center>• Ловкость: +4</center></TD>
  <TD><center>• Сила: +4</center></TD>
  <TD><center>• Интуиция: +4</center></TD>
  <TD><center>• Интеллект: +4</center></TD>
 </TR>
   </table>
<br />
<TABLE BORDER=5 width=100% align=center>
 <TR>
  <TH width=20%></TH>
  <TH width=20%><center><b>Унитан</b></center></TH>
  <TH width=20%></TH>
  <TH width=20%><center><b>Унимоко</b></center></TH>
  <TH width=20%></TH>
 </TR>
 <TR>
  <TD><center><img src='http://img.combats.ru/i/items/rune_super_1.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_super_2.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_super_3.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_super_4.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_super_5.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center>• Защита от урона: +25</center></TD>
  <TD><center>• Защита от магии: +25</center></TD>
  <TD><center>• Уровень жизни (HP): +50</center></TD>
  <TD><center>• Уровень маны: +50</center></TD>
  <TD><center>• Мф. мощности урона: +5</center></TD>
 </TR>
   </table>
<font color='red'><b>Внимание! Все супер руны вяжутся <img src='http://img.combats.ru/i/destiny.gif' alt='' title=''>общей судьбой с теми кто её создал.</b></font><br />
</div>
<br />
<br><br />
<img src='http://img.combats.ru/i/items/runetoken.gif' alt='' title=''> <a class=hide_link href="javascript:hideIt('h9','Спрятать','Инсигния Знаний.','l9')" id='l9'>Инсигния Знаний.</a><div id='h9' class=hidden><br />
Долговечность: 0/1<br />
Описание:<br />
Может быть использовано на Алтаре Храма Знаний.<br />
Сделано в Emeralds city<br />
Предмет не подлежит ремонту<br />
<br />
<font color='red'>При сдаче в Храме Знаний даёт +10 репутации.</font><br />
</div>
<br><br />
<font color='green'><i><b>Вот и подошло наше занятие к концу думаю, урок был интересен, и Вы узнали много нового. Удачного применение полученного знания на практике. </b></i></font><br />

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