<?
	session_start();
	include "../../connect.php";
	$user = mysqli_fetch_array(db_query("SELECT * FROM `users` WHERE `id` = '".$_COOKIE['uid']."' LIMIT 1;"));
	include "../../functions.php";
	$Get_Page="all_klan";

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
<TABLE width="98%" align=left border=0>
<TBODY>
<TR>
<TD class=normaltext align=left valign="top">
 
<div class="page_title"><B>Клановая система</B></div>
<HR align=center width="90%" color=#aa0000 noShade SIZE=0.1><TABLE width=100% border="0">													  														  
<TABLE class=BL>
<TR><TD>
<div class="yui-content">
<!--начало блок 1-->
        <div>
          <table class="Head tab-content" id="tb" name="tb" border="0" cellpadding="0" cellspacing="6" width="100%">
          <tbody>
           <tr><td class="Head td_heading" valign="top">
  <!--Название 1-->Создание клана
           </td></tr>
           <tr><td valign="top">
	
             <blockquote>
             <table class="tcontent" border="0"><tbody><tr><td>
  <!--  Содержимое 1     --> 

<h3>Общие сведения</h3>
Клан - это отдельная ячейка общества, состоящая из небольшой группы игроков и имеющая свой отличительный значок.
<br>Если вы не состоите ни в одном клане, вы можете создать собственный клан.
<br>Данная процедура осуществляется в <strong><img src="http://img.combats.com/i/images/subimages/1ureg.gif" width="118" height="78" />Регистратуре кланов</strong>, которая находится в <strong><img src="http://img.combats.com/i/misc/forum/fo1.gif" />Capital City</strong> на Страшилкиной улице.
<br><TABLE cellSpacing=0 cellPadding=2 width="100%" border=0>
<TR>
<br>• Условия регистрации клана и подача заявления
<br>• Дипломатические отношения
<br>• Формы Правления
<br>
<br>Если вы не состоите ни в одном клане, вы здесь можете создать собственный клан. В настоящее время стоимость регистрации составляет серый клан <strong>1000 кр</strong>, светлый клан <strong>1300 кр</strong>, темный клан <strong>1400 кр</strong>, нейтральный клан <strong>1500 кр</strong>.
</fieldset>
</TD></TR></TABLE><br>
<br>
<br>
<h3>Требования для регистрации клана</h3>
Каждый клан <IMG border=0 src="http://img.combats.com/i/fighttype4.gif" width=20 height=20><strong>БК</strong> является уникальным сообществом игроков, поэтому недопустимо связывать его прямо или косвенно с ныне существующими или уже распущенными кланами БК (плагиат), как в символике или в названии клана, так и в тексте девиза клана БК.
<br>Большой (герб) и маленький значок должны быть выполнены в едином стиле.
<br>Заявку на регистрацию подает будущий глава клана, у которого должна быть при себе необходимая сумма.
<br>Будущий глава клана должен быть не менее 7го уровня.
<br>
<br><strong>Название, Девиз и Значок клана:</strong>
<br><strong>Требования:</strong>
<br>- Недопустимыми в названии клана, его девизе и его значках являются:
<br>Служебные термины, используемые Администрацией для создания атмосферы мира, такие как: гвардия, ангелы, паладины, и так далее;
<br>- Недопустимо указание цифр в названии или значке клана;
<br>- Так как игровой мир БК фэнтезийный, то название клана, его девиз и значки должны соответствовать игровому миру БК;
<br>- Недопустимо использование Ников персонажей в названии клана и девизе;
<br>- Игровой мир БК виртуальный, а потому не приветствуется использование государственной (гербы, флаги и т.п.), и не государственной (торговые марки, знаки, названия, и т.п.) символики, названия и произведения разного вида (стихи, высказывания, цитаты, литературные произведения и т.п.) из реального мира;
<br>- Наличие грамматических и орфографических ошибок крайне нежелательно;
<br>- Следите за логикой и не создавайте противоречий в девизе, названии и символике своего клана.
<br>- Будьте вежливыми и терпимыми по отношению к другим участникам проекта БК, и не используйте в названии, девизе и символике своего клана то, что может быть истолковано, как оскорбление по отношению к другим пользователям.
<br>
<br><strong>Значки:</strong>
<br>• Маленький значок клана (показывается рядом с ником персонажа в чате, на форуме, в бою и т.д.).
<br><strong>Требования:</strong>
<br>- Gif картинка
<br>- Прозрачный фон
<br>- Размер 24x15
<br>- Не более чем 32 цвета
<br>- Анимация запрещена!
<br>
<br>• Большой значок клана (Герб для энциклопедии).
<br><strong>Требования:</strong>
<br>- Gif картинка
<br>- Форма - КРУГ, фон за кругом прозрачный
<br>- Размер 100x99
<br>- Анимация запрещена!
<br>- Композиция должна быть исполнена в круге
<br>
<br>Скриншот подачи <noindex><a rel="nofollow" class="TLink" target="_blank" href="http://resources.darkclan.ru/eliber/clan/zajavka.gif">заявления</a></noindex>.
<br>
<br>
<h3>Форма правления клана</h3>
Будьте внимательны, выбирая своему клану форму правления.
<br>В выборе существуют 4 варианта:
<br><strong>Анархия:</strong> Каждый принятый в клан получает все права для управления кланом и может как принимать, так и выкидывать других игроков из клана. Может быть, сколько угодно глав клана, которые могут выкидывать друг друга из клана. 
<br><strong>Демократия:</strong> Глава клана может быть избран голосованием. Может быть несколько глав клана, в этом случаем тип управления называется "совет". Главы клана не могут выкинуть друг друга из клана.
<br><strong>Диктатура:</strong> Глава клана не сменяем и не выбирается через голосования. Если глава клана умирает, то клан может автоматически переводится в состояние анархии, или как вариант распускаться. Кнопки самостоятельного выхода из клана у игроков нет, только глава имеет право снять значок с соклановца.
<br><strong>Монархия:</strong> Глава клана может передать управление клана только своему родственнику - мужу или жене. Так же глава клана может сделать родственников своими соправителями. Кнопки самостоятельного выхода из клана у игроков нет, только глава имеет право снять значок с соклановца.
<br>
<br>Также, можно дополнительно выставить ограничения на передачу Главенства:
<br>• <strong>Патриархат</strong> (передача главенства может быть осуществлена только персонажу мужского пола)
<br>• <strong>Матриархат</strong> (передача главенства может быть осуществлена только персонажу женского пола)
<br>• <strong>Геронтократия</strong> (передача главенства может быть осуществлена только самому старому персонажу в клане)
<br>• <strong>Не ограничивать по полу</strong>
<br>
<br>В случае удачной регистрации клана вы получите Сообщение по телеграфу: с датой и временем регистрации:
<br><TABLE cellSpacing=1 cellPadding=2 width="60%" bgColor=#a5a5a5>
<TBODY>
<TR bgColor=#c7c7c7>
<i>Сообщение по телеграфу: 28.06.12. 15:27 Зарегистрирован ваш клан ***</i> 
</TBODY></TABLE>
<br>
<br>В случае отказа, также приходит Сообщение по телеграфу: с соответствующим текстом:
<br><TABLE cellSpacing=1 cellPadding=2 width="60%" bgColor=#a5a5a5>
<TBODY>
<TR bgColor=#c7c7c7>
<i>28.06.12 15:27 Вам отказано в регистрации клана по причине: На данный момент ваш клан не соответствует политике БК.</i>
</TBODY></TABLE>
<br>
<br>Клановые персонажи могут дарить подарки от имени Клана. Данная процедура совершается в Гос. магазине, при выборе каким образом подарить подарок.
<br><IMG border=0 src="http://resources.darkclan.ru/eliber/clan/podarok.gif">
<br>В информации о персонаже, подарок будет выглядеть как сувенир от имени клана.
<br><IMG border=0 src="http://bestcombats.net/news/i/podark.jpg">
<br>

             </td></tr></tbody></table>
             </blockquote>
               <div class="tabbed-nav-bar-bottom">
                   <noindex><a rel="nofollow" class="TLink" onclick="goTab(1);return false;"  href="#">Далее</a></noindex>
               </div>
          </td></tr></tbody></table>
        </div>
<!--конец блок 1-->
<!--начало блок 2-->
        <div>
          <table class="Head tab-content" id="tb" name="tb" border="0" cellpadding="0" cellspacing="6" width="100%">
          <tbody>
           <tr><td class="Head td_heading" valign="top">
<br>
<br>Все кланы состоят в рейтинге, где отображается актуальная информация о клане, найти этот рейтинг можно пройдя по ссылке - <noindex><a rel="nofollow" class="TLink" target="_blank" href="http://top.bestcombats.net/#clans">http://top.bestcombats.net/#clans</a></noindex>.
<br>Или же из информации о клане:
<br><IMG border=0 src="http://resources.darkclan.ru/eliber/clan/tablclan.gif">
<br>
<br>
<br>
<br>
<br>
<br>
             </td></tr></tbody></table>
             </blockquote>
               </div>
          </td></tr></tbody></table>
        </div>
<!--конец блок 2-->
<!--начало блок 3-->
        <div>
          <table class="Head tab-content" id="tb" name="tb" border="0" cellpadding="0" cellspacing="6" width="100%">
          <tbody>
           <tr><td class="Head td_heading" valign="top">
<!--Название 3-->Вступление в клан

           </td></tr>
           <tr><td valign="top">
	
             <blockquote>
             <table class="tcontent" border="0"><tbody><tr><td>
<!-- Содержимое 3 -->

<br>Для вступления в клан персонаж должен быть минимум <strong>4</strong> уровня и не находится в <IMG border=0 src="http://img.combats.com/i/align2.gif" width=12 height=15><strong>Хаосе</strong>. Прочие требования для вступления каждый клан устанавливает сам.
<br>
<br><h3><b>Глава клана высылает игроку приглашение на вступление в клан, которое необходимо подтвердить в течении суток с момента отправления.</h3></b>
<br><b>Высланное приглашение находится в Регистратуре кланов.</b>
<br>
<br>
<br>
<br><noindex><a rel="nofollow" href="http://capitalcity.bestcombats.net/inf.php?106156" target="_self" class="TLink">Приобрести</a></noindex> <img src="http://img.combats.ru/i/align50.gif" alt="" width="12" height="15" /><strong>еврокредиты</strong> можно у официального алхимика <strong><img src="http://img.combats.ru/i/align50.gif" alt="" width="12" height="15" />Банкир<noindex><a rel="nofollow" href="http://capitalcity.bestcombats.net/inf.php?106156" target="_blank"><img src="http://img.combats.com/i/inf.gif" width="12" height="11" border="0" /></a></noindex></strong>.
<br>
<br>После вступления или регистрации клана персонажу становится доступна соответствующая кнопка:
<br><img alt="" src="http://img.combats.com/i/a___kln.gif" border="0" /> <strong>Клан</strong> (чтобы увидеть ее сразу после вступления, нужно полностью обновить окно игры).
<br>
<br>
<h3>Клановый чат</h3>
Всем членам клана доступен общий клановый приват, который действует на все города <IMG border=0 src="http://img.combats.com/i/fighttype4.gif" width=20 height=20><strong>Клуба</strong>. Кликабельная стрелка кланового привата находится над списком всех соклановцев - <IMG alt=Приватно src="http://img.combats.com/i/lock.gif" width=20 height=15><STRONG>Соклановцы</STRONG>.
<br><FONT color=#007000>20:26</FONT> [<FONT color=#003388><strong>Ник</strong></FONT>] <FONT color=red><strong>private [klan]</strong></FONT> - сообщение для всего клана онлайн
<br>
<br>
<br>Если клан состоит в <IMG border=0 src="http://img.combats.com/i/misc/union_join.gif"><strong>Союзе</strong> или <IMG border=0 src="http://img.combats.com/i/misc/alliance_join.gif"><STRONG>Альянсе</STRONG> с другими кланами, то помимо обычного кланового привата есть возможность общаться и с союзниками. Для этого существует отдельный канал - <FONT color=red><strong>[klanunion]</strong></FONT>.
<br>Кликабельная кнопка союзного <IMG alt=Приватно src="http://img.combats.com/i/lock.gif" width=20 height=15> привата находится в клановой панели, на закладке <strong>Дипломатии</strong>.
<br>
<br>
<br>
             </td></tr></tbody></table>
             </blockquote>

               <div class="tabbed-nav-bar-bottom">
                 <noindex><a rel="nofollow" class="TLink" onclick="goTab(1);return false;"  href="#">Назад</a></noindex>  <noindex><a rel="nofollow" class="TLink" onclick="goTab(3);return false;"  href="#">Далее</a></noindex>
               </div>
          </td></tr></tbody></table>
        </div>
<!--конец блок 3-->
<!--начало блок 4-->
        <div>
          <table class="Head tab-content" id="tb" name="tb" border="0" cellpadding="0" cellspacing="6" width="100%">
          <tbody>
           <tr><td class="Head td_heading" valign="top">
<!--Название 4-->Панель клана

           </td></tr>
           <tr><td valign="top">
	
             <blockquote>
             <table class="tcontent" border="0"><tbody><tr><td>
<!-- Содержимое 4 -->
<h3>Панель клана</h3>
При нажатии на <img alt="" src="http://img.combats.com/i/a___kln.gif" border="0" />клановую кнопку появляется панель, содержащая закладки, систематизирующие информацию:
<br><IMG border=0 src="http://img.combats.com/i/misc/clans/klan_img_09.jpg"> - <strong>События</strong>. Содержат клановую информацию о взятии уровней, объявлении войн, записей уполномоченных лиц.
<br><IMG border=0 src="http://img.combats.com/i/misc/clans/klan_img_11.jpg"> - <strong>Управление</strong>. Раздел содержит управление приёмом в клан, редактирование профилей и каналов, клановую казну.
<br><IMG border=0 src="http://img.combats.com/i/misc/clans/klan_img_13.jpg"> - <strong>Хранилище</strong>. Раздел действующий на все города и позволяющий хранить вещи/свитки.
<br><IMG border=0 src="http://img.combats.com/i/misc/clans/klan_img_17.jpg"> - <strong>Клановые реликты</strong>. В разработке!
<br><IMG border=0 src="http://img.combats.com/i/misc/clans/klan_img_19.jpg"> - <strong>Права</strong>. Закладка расскажет о возможностях открытых игроку на данный момент.
<br><IMG border=0 src="http://img.combats.com/i/misc/clans/klan_img_21.jpg"> - <strong>О клане</strong>. Статистика репутации, информация о рейтинге, уровне и возможностях доступных клану.
<br><IMG border=0 src="http://img.combats.com/i/misc/clans/klan_img_23.jpg"> - <strong>Список соклановцев</strong>. Список игроков состоящих в клане и кнопка приватного обращения ко всему клану.
<br>
<br>Некоторые нижеописанные возможности доступны только для Главы клана или для персонажей, получивших данную возможность от Главы.
<br>Возможности каждого персонажа в клане прописываются <strong>Титулом</strong>, которые назначает Глава.
<br>
<h3>События</h3>
События клана ведутся, с момента регистрации клана.
<br>В событиях отображаются все происходимые изменения, такие как:
<br>• Объявление войны-В разработке!
<br>• Повышение репутации свитками-В разработке!
<br>• Повышение/понижения статуса игрока в клане
<br>• Сообщения к клану от главы или от соклана, имеющего такие возможности.
<br>
<br>
<h3>Управление</h3>
Эта закладка содержит:
<br>• Казну клана
<br>• Кнопку выхода из клана (отсутствует при режиме Монархии и Диктатуры)
<br>• Возможность заказать выписку по Хранилищу
<br>• Включение/отключение дополнительного кланового канала [klan-9]-В разработке!
<br>
<br>У главы есть дополнительные функции:
<br>• Приглашение на вступление в клан (высылается персонажу находящемуся в любом из городов)
<br>• Возможность выгнать соклана находящегося в любом из городов
<br>• Кнопка передачи главенства
<br>• Редактирование статуса и профиля соклана
<br>
<br>
<h3>Хранилище</h3>
Закладка напоминает сундук в Общежитии, в который можно выложить на хранение какую-то вещь.
<br>Данную вещь может забрать другой соклан, если у него включена данная возможность.
<br><strong><font color="red">Внимание!</font></strong> Хранилищем нельзя воспользоваться в <IMG border=0 src="http://img.combats.com/i/align9.gif" width=12 height=15><strong>Подземелье</strong> или входе в него.
<br>
<br>Информация по Хранилищу.
<br>Для кланов нулевого уровня и выше:
<br>• размер кланового хранилища - 50 ячеек
<br>• количество передач игроком в клановое хранилище - 20
<br>• количество передач главой клана в клановое хранилище - 40
<br>• общее количество передач игроками клана в клановое хранилище - 200
<br>Для кланов начиная с 4 уровня и выше:
<br>• размер кланового хранилища - 100 ячеек
<br>• количество передач игроком в клановое хранилище - 40
<br>• количество передач главой клана в клановое хранилище - 80
<br>• общее количество передач игроками клана в клановое хранилище - 200
<br>Данные по Хранилищу всегда можно посмотреть в Таблице, на закладке "О клане".
<br>
<br>
<h3>Дипломатия</h3>
В данной закладке находятся:
<br>• Информация по клановым войнам
<br>• Информация по Союзам и Альянсам
<br>• Кнопка приватного обращения к Союзу/Альянсу
<br>• Возможность выбора каналов общения между союзными кланами
<br>
<br>
<h3>Права</h3>
Данный раздел довольно прост. На этой закладке просто перечислены те права, которыми вы обладаете.
<br>Глава клана по умолчанию обладает всеми возможностями и может открывать их для определённых титулов в клане:
<br>• Просмотр событий клана 
<br>• Создание событий клана 
<br>• Просмотр хранилища 
<br>• Использование вещей из хранилища 
<br>• Просмотр казны и списка игроков, пополнявших казну 
<br>• Пополнение казны 
<br>• Использование казны 
<br>• Прием в клан 
<br>• Изгнание из клана 
<br>• Редактирование информации о клане 
<br>• Клановые союзы и альянсы 
<br>• Управление союзами и альянсами
<br>
<br>
<h3>О клане</h3>
Данный раздел содержит всю информацию о клане:
<br>• Значок клана
<br>• Уровень
<br>• Рейтинг
<br>• Шкалу кланового опыта
<br>• Форма правления
<br>• Ссылка на страницу клана
<br>• Информацию клана (Легенду или Устав, на усмотрение Главы клана)
<br>• Статистика кланового опыта (за день/неделю/месяц)
<br>• Таблица кланов с отмеченными возможностями на данном этапе развития
<br>
<br>
<h3>Список соклановцев</h3>
Содержит ники всех сокланов.
<br>Может фильтроваться на персонажей, кто находится on/off-line.
<br>Также в данном разделе находится кнопка обращения в клановый чат.
<br>
<br>


             </td></tr></tbody></table>
             </blockquote>

               <div class="tabbed-nav-bar-bottom">
                 <noindex><a rel="nofollow" class="TLink" onclick="goTab(2);return false;"  href="#">Назад</a></noindex>  <noindex><a rel="nofollow" class="TLink" onclick="goTab(4);return false;"  href="#">Далее</a></noindex>
               </div>
          </td></tr></tbody></table>
        </div>
<!--конец блок 4-->
 <!--начало блок 5-->
        <div>
          <table class="Head tab-content" id="tb" name="tb" border="0" cellpadding="0" cellspacing="6" width="100%">
          <tbody>
           <tr><td class="Head td_heading" valign="top">
<br>
<br>
<h3>Перевыборы Главы клана</h3>
Если вы рядовой соклан, то в Регистратуре вы можете переизбрать Главу клана или самому попробовать стать Главой. Данная мера нужна если:
<br>• Ваш глава не в состоянии следить за кланом
<br>• Если вы потеряли кнопки главы при попадании действующего главы в <IMG src="http://img.combats.com/i/align2.gif">Хаос или его ухода из игры.
<br><strong><font color="red">Внимание!</font></strong> Данная возможность доступна только для клана с типом правления <strong>Демократия</strong>.
<br>
<br>Главой может стать любой соклан выставивший свою кандидатуру на этот пост и попросив других сокланов поддержать его.
<br>Стоимость выставления своей кандидатуры <strong>100 кр</strong>. Каждый, кто ещё хочет выставить свою кандидатуру так же платит <strong>100 кр</strong>.
<br><img src="http://resources.darkclan.ru/eliber/clan/pereiz.gif" />
<br><img src="http://resources.darkclan.ru/eliber/clan/pereiz1.gif" />
<br>
<br>• Вы также можете поддержать кандидатуру одного из сокланов.
<br>
<br>Голосование проводится неделю с момента подачи первой кандидатуры.
<br>Проголосовать, за выставленную кандидатуру можно находясь в любом городе, открыв панель Клана.
<br>Каждый член клана может проголосовать только один раз.
<br>
<br>Главой становится тот, кто набрал <strong>более 50%</strong> голосов клана.
<br><img src="http://resources.darkclan.ru/eliber/clan/pereiz4.gif" />
<br><img src="http://resources.darkclan.ru/eliber/clan/pereiz2.gif" />
<br><img src="http://resources.darkclan.ru/eliber/clan/pereiz3.gif" />
<br>
<br>
<Br>
<br>

             </td></tr></tbody></table>
             </blockquote>

               <div class="tabbed-nav-bar-bottom">
                 <noindex><a rel="nofollow" class="TLink" onclick="goTab(3);return false;"  href="#">Назад</a></noindex>  <noindex><a rel="nofollow" class="TLink" onclick="goTab(5);return false;"  href="#">Далее</a></noindex>
               </div>
          </td></tr></tbody></table>
        </div>
<!--конец блок 5-->
 <!--начало блок 6-->
        <div>
          <table class="Head tab-content" id="tb" name="tb" border="0" cellpadding="0" cellspacing="6" width="100%">
          <tbody>
           <tr><td class="Head td_heading" valign="top">
  <!--Название 6-->Возможности Главы клана
           </td></tr>
           <tr><td valign="top">
	
             <blockquote>
             <table class="tcontent" border="0"><tbody><tr><td>
  <!--  Содержимое 6 -->

<br>Став Главой персонаж получает довольно большое кол-во возможностей в клане. Из основных можно выделить:
<br>• Принятие игрока в клан
<br>• Изгнание игрока из клана
<br>• Создание/Редактирование/Присвоение титула
<br>• Передача Главенства (для кланов с Демократической формой правления)
<br>
<br>И дополнительные, не особо важные действия:
<br>• Просмотр событий клана 
<br>• Создание событий клана 
<br>• Просмотр хранилища 
<br>• Использование вещей из хранилища 
<br>• Просмотр казны и списка игроков, пополнявших казну 
<br>• Пополнение казны 
<br>• Использование казны 
<br>• Редактирование информации о клане 
<br>
<br>
<h3>Принятие игрока в Клан</h3>
Кнопки принятия и изгнания игрока из клана находятся в закладке <strong>Управление</strong>.
<br>Принять в клан можно только персонажа 4го и старше уровнем, не состоящего в <IMG border=0 src="http://img.combats.com/i/align2.gif" width=12 height=15><strong>Хаосе</strong> и не имеющего задержки на вступление в Клан.
<br>При нажатии на кнопку приёма, игроку высылается телеграмма с приглашением вступить в клан.
<br>Для принятия игрока в клан можно находиться с ним в разных городах <IMG border=0 src="http://img.combats.com/i/fighttype4.gif" width=20 height=20><STRONG>БК</STRONG>.
<br>Подтвердив вступление игрок появляется в списке клана с правами <strong>Новичка</strong>.
<br><img src="http://resources.darkclan.ru/eliber/clan/priemin.gif" />
<br>
<br>
<h3>Изгнание игрока из Клана</h3>
Для изгнания игрока из клана можно находиться с ним в разных городах <IMG border=0 src="http://img.combats.com/i/fighttype4.gif" width=20 height=20><STRONG>БК</STRONG>.
<br>После нажатия на кнопку изгнания игрок автоматически лишается кланового значка и кнопки клановой панели.
<br><img src="http://resources.darkclan.ru/eliber/clan/izgnan.gif" />
<br>
<br>
<h3>Передача Главенства</h3>
При <strong>Демократической</strong> форме правления Глава не может самостоятельно покинуть клан. Для начала ему предстоит передать главенство другому персонажу.
<br>Если при регистрации не стояло ограничений на передачу главенства, то передать права можно в любой момент, любому соклановцу, находящемуся в любом городе.
<br>Кнопка передачи Главенства находится в разделе <strong>Управления</strong>
<br><img src="http://resources.darkclan.ru/eliber/clan/smenaglav.gif" />
<br>
<br>При <strong>Монархической</strong> форме правления, главенство возможно передать лишь от мужа к жене и от жены к мужу.
<br>При <strong>Диктаторской</strong> форме правления, передача главенства невозможна.
<br>
<br>
<h3>События клана</h3>
Писать события клану имеет право лишь Глава и персонажи, которым по титулу выдана такая возможность.
<br>Сообщение не должно превышать 600 символов и может удаляться.
<br>Системные сообщения о понижении/повышении Титулов, поднятии репутации, взятии уровня кланом, объявлении войны - не удаляются.
<br><img src="http://resources.darkclan.ru/eliber/clan/sobit.gif" />
<br>
<br>
<h3>Хранилище клана</h3>
Глава клана обладает увеличенным кол-вом передач, в отличии от рядового сокланера.
<br>Для кланов нулевого уровня и выше: 
<br>• количество передач в клановое хранилище - 40
<br>Для кланов начиная с 4 уровня и выше:
<br>• количество передач в клановое хранилище - 80
<br>Данные по Хранилищу всегда можно посмотреть в Таблице, на закладке "О клане".
<br>
<br>Хранилищем могут пользоваться только персонажи получившие к нему доступ. Доступы прописываются только на титул в клане.
<br>На входе в подземельях и в самих пещерах, пользоваться Хранилищем нельзя.
<br>
<br>
<h3>Редактирование информации</h3>
Данная функция находится в закладке "О Клане" и позволяет написать информацию для своих сокланеров.
<br>Некоторые главы предпочитают писать в данной закладке устав или легенду клана, кому-то достаточно девиза или напутствия для своей команды.
<br>Вам решать, что будут видеть ваши сокланеры, заходя посмотреть на достижения клана.
<br>
<br>
<br>
<Br>
<Br><font color=green><em>Играйте, живите и помните! Клан это не просто сообщество людей, а настоящая семья. ;)</em></font>
<Br>



             </td></tr></tbody></table>
             </blockquote>
               <div class="tabbed-nav-bar-bottom"><noindex><a rel="nofollow" class="TLink" onclick="goTab(4);return false;"  href="#">Назад</a></noindex>
               </div>
          </td></tr></tbody></table>
        </div>
<!--конец блок 6-->
    </div>
</div>
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