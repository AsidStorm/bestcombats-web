<?
	session_start();
	include "../../connect.php";
	$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$_COOKIE['uid']."' LIMIT 1;"));
	include "../../functions.php";
	$Get_Page="all_boevaia_sisatema";

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
 
<div id="tabbed-nav" class="yui-navset">
    <ul class="yui-nav">
<li class="selected"><noindex><noindex><a rel="nofollow" rel="nofollow" href="#tab1"><EM><STRONG>Введение</STRONG></EM></A></noindex></noindex> </LI>
<LI><noindex><noindex><A rel="nofollow" rel="nofollow" href="#tab2"><EM><STRONG>Статы и умения</STRONG></EM></A></noindex></noindex> </LI>
<LI><noindex><noindex><A rel="nofollow" rel="nofollow" href="#tab3"><EM><STRONG>Модификаторы</STRONG></EM></A></noindex></noindex> </LI>
<LI><noindex><noindex><A rel="nofollow" rel="nofollow" href="#tab4"><EM><STRONG>Урон</STRONG></EM></A></noindex></noindex> </LI>
<LI><noindex><noindex><A rel="nofollow" rel="nofollow" href="#tab5"><EM><STRONG>Броня и защита</STRONG></EM></A></noindex></noindex> </LI>
<LI><noindex><noindex><A rel="nofollow" rel="nofollow" href="#tab6"><EM><STRONG>Очки тактики</STRONG></EM></A></noindex></noindex> </LI>
</UL>
    <div class="yui-content">
<!--начало блок 1-->
        <div>
          <table class="Head tab-content" id="tb" name="tb" border="0" cellpadding="0" cellspacing="6" width="100%">
          <tbody>
           <tr><td class="Head td_heading" valign="top">
  <!--Название 1-->Введение </td></tr>
           <tr><td valign="top">
	
             <blockquote>
             <table class="tcontent" border="0"><tbody><tr><td>
  <!--  Содержимое 1     --> 

<BR><STRONG>Боевая система БК</STRONG> – это набор механизмов, параметров и инструментов, обеспечивающих процесс прохождения поединка согласно игровым правилам.
<BR>
<BR>Всю боевую систему можно разделить на 4 взаимосвязанных блока:
<BR>• Система статов и умений.
<BR>• Система модификаторов.
<BR>• Система расчета урона и брони.
<BR>• Система тактик и приемов.
<BR>
<BR>Блоки расположены в логической последовательности: 
<Br>основой является статовая система, надстройкой над нею является система расчетных модификаторов и вершина айсберга - система набираемых очков тактики и применяемых в бою приемов.
<BR>
<BR><strong>Боевая система БК</strong> соответствует канонам классической РПГ (если придерживаться точки зрения «РПГ – это статы»). 
<Br />Основа игры в распределении <STRONG>характеристик</STRONG> (или статов) персонажа. 
<Br />Источниками характеристик являются как базовые игровые достижения (родные статы), так и дополнительные бонусы от вещей и временных эффектов. 
<Br />
<Br />Известные на данный момент статы: 
<Br />Сила, Ловкость, Интуиция, Выносливость, Интеллект, Мудрость, Духовность.
<BR>

             </td></tr></tbody></table>
             </blockquote>
               <div class="tabbed-nav-bar-bottom">
                   <noindex><noindex><a rel="nofollow" rel="nofollow" class="TLink" onclick="goTab(1);return false;"  href="#">Далее</a></noindex></noindex>
               </div>
          </td></tr></tbody></table>
        </div>
<!--конец блок 1-->
<!--начало блок 2-->
        <div>
          <table class="Head tab-content" id="tb" name="tb" border="0" cellpadding="0" cellspacing="6" width="100%">
          <tbody>
           <tr><td class="Head td_heading" valign="top">
<!--Название 2-->Статы и умения</td></tr>
           <tr><td valign="top">
	
             <blockquote>
             <table class="tcontent" border="0"><tbody><tr><td>
<!-- Содержимое 2 -->

<BR><STRONG>Сила</STRONG>: Стат увеличивает мощность урона. Точные формулы неизвестны.
<BR><STRONG>Интуиция</STRONG>: Добавляет +7 мф крита и +3 мф антикрита.
<BR><STRONG>Ловкость</STRONG>: Добавляет +7 мф уворота и +3 мф антиуворота.
<BR><STRONG>Выносливость</STRONG>: +6НР за каждый стат. 
<Br />За каждый пункт выносливости +1.5 защиты от урона и +1.5 защиты от магии. А так же 0,5% Мф. против мощности крит. удара
<Br />Влияет на объем рюкзака: 40 * (уровень + 1) + Выносливость.
<BR><STRONG>Интеллект</STRONG>: +0,5% мощности магии.
<BR><STRONG>Мудрость</STRONG>: +10 маны.
<BR><STRONG>Духовность</STRONG>: +1 силы духа за каждый стат.
<Br />
<BR>Также, статы могут давать <strong>бонусы</strong>. 
<Br />Об этом вы можете прочитать в статье <noindex><noindex><A rel="nofollow" rel="nofollow" class=TLink href="http://bestcombats.net/news/others/bonus/" target=_blank><FONT color=#800080>Бонусы статов и комплектов </FONT></A></noindex></noindex>.
<BR>
<BR>Кроме статов существует специфическая характеристика персонажа – <STRONG>умения</STRONG>. 
<Br />
<Br />Существуют владения различными видами оружия и владения разными стихиями магии. 
<Br />• Для бойцов – количество умений в том или ином оружии, увеличивает урон этим оружием (на 1-2 пункта за каждое умение), а также позволяет пользоваться оружием, которое имеет требования на определённое кол-во умений. 
<Br />• Для магов, от количества умений зависит наличие и частота критических попаданий и критических промахов. 
<Br />
<Br />Количество умений имеет ограничения:
<Br />Максимальное количество родных умений во владении оружием – <strong>5</strong>.
<Br />Максимальное количество родных умений в магии – <strong>10</strong>. 
<Br />
<Br />Максимальный шанс критического урона магией: 30% (достигается на +10 навыке относительно минимального для цели). Магический крит увеличивает урон ровно в 2 раза.
<BR>

             </td></tr></tbody></table>
             </blockquote>

               <div class="tabbed-nav-bar-bottom">
                 <noindex><noindex><a rel="nofollow" rel="nofollow" class="TLink" onclick="goTab(0);return false;"  href="#">Назад</a></noindex></noindex>  <noindex><noindex><a rel="nofollow" rel="nofollow" class="TLink" onclick="goTab(2);return false;"  href="#">Далее</a></noindex></noindex>
               </div>
          </td></tr></tbody></table>
        </div>
<!--конец блок 2-->
<!--начало блок 3-->
        <div>
          <table class="Head tab-content" id="tb" name="tb" border="0" cellpadding="0" cellspacing="6" width="100%">
          <tbody>
           <tr><td class="Head td_heading" valign="top">
<!--Название 3-->Модификаторы </td></tr>
           <tr><td valign="top">
	
             <blockquote>
             <table class="tcontent" border="0"><tbody><tr><td>
<!-- Содержимое 3 -->

<BR>Следующий этап – определение <STRONG>модификаторов</STRONG> согласно статам и прочим бонусам. 
<Br /><strong>Модификатор</strong> – это числовая оценка той или иной способности персонажа; фактически, это оценка в процентах определенных возможностей персонажа. 
<Br />
<Br />Существующие модификаторы:
<BR>• <STRONG>Мф. крит. удара</STRONG> - отвечает за возможность нанесения критического удара.
<BR>
<BR>• <STRONG>Мф. против крит. удара</STRONG> - отвечает за возможность избежать критического удара.
<BR>
<BR>• <STRONG>Мф. мощности крит. удара</STRONG> - отвечает за урон, наносимый при критическом ударе. 
<Br /><em>Крит рассчитывается по формуле: ((1+мф. мощности)*2)*базовый урон</em>.
<BR>
<BR>• <STRONG>Мф. увертывания</STRONG> - отвечает за вероятность увернуться от удара.
<BR>
<BR>• <STRONG>Мф. против увертывания</STRONG> - отвечает за уменьшение шансов увернуться у противника.
<BR>
<BR>• <STRONG>Мф. Контрудара</STRONG> - отвечает за шанс нанести контрудар после успешного увертывания. 
<Br />Родной мф. контрудара у всех персонажей - 10%, максимальный - 80%, повышается за счет бонусов вещей и бонусов за статы.
<BR>
<BR>• <STRONG>Мф. Парирования</STRONG> - отвечает за вероятность парирования удара. 
<Br />Максимальное преимущество парирования - 50%.
<BR>
<BR>• <STRONG>Мф. блока щитом</STRONG> - отвечает за вероятность блокирования удара, не угадав зону блока.
<BR><em>Модификаторы парирования и блока щитом теряют эффективность в 1.2 раза за каждый уровень атакующего выше 8.</em>
<BR>
<BR>• <STRONG>Мф. пробоя брони</STRONG> - отвечает за вероятность игнорировать показатель брони (но не защиты от урона) противника.
<BR>
<BR>• <STRONG>Мф. мощности удара</STRONG> - отвечает за повреждение определенным видом урона. 
<Br /><em>Рассчитывается по формуле: (1+мф мощности урона)*базовый урон.</em>
<BR>
<BR>• <STRONG>Мф. мощности магии</STRONG> - за повреждения, наносимые магическими приемами. Формула: (1+мф мощности магии)*базовый урон.
<BR>
<BR>• <STRONG>Мф. подавления защиты от магии</STRONG> - уменьшает показатель защиты от магии противника.
<BR>
<BR>
<BR><strong>Модификаторы</strong> можно разделить на <STRONG>абсолютные</STRONG> (базовые), <STRONG>статовые</STRONG> и <STRONG>приобретенные</STRONG> из бонусов. 
<Br />
<Br />Имеются 2 пары модификаторов: крит – антикрит, уворот – антиуворот. 
<Br />Разница собственного модификатора и антимодификатора противника представляет собой вероятность боевого развития событий. 
<Br />В бою, модификатор игрока сравнивается с определенными модификаторами противника. 
<Br />К примеру, если мф. крита составляет 300, а мф. антикрита противника – 100, то крит произойдет с очень высокой вероятностью. 
<Br />Вероятность парирования определяется разницей модификаторов парирования противников, но не превышает 50%. <Br />
<Br />Следует понимать, что все боевые явления происходят относительно-случайно, и модификатор – это просто фактор влияния на случайные явления, а потому гарантированно сказать, когда произойдет то или иное явление - невозможно. 
<BR>
<BR><STRONG>Абсолютный модификатор</STRONG> присутствует у всех игроков. 
<Br />Его особенность в том, что он рано или поздно наступает. <Br />Существуют врожденные, небольшие, абсолютные модификаторы парирования, уворота и блокирования щитом. Это значит, что если даже по разнице модифификаторов и антимодификаторов боевое событие невероятно, то оно все равно может с небольшой вероятностью произойти. 
<Br />К примеру, маг никак не мог увернуться согласно видимым модификаторам, однако все-таки увернулся, потому что сработал абсолютный модификатор. 
<Br />Также, присутствует абсолютный модификатор магического промаха, равный 6%. 
<Br />
<Br />Существуют еще 2 абсолютных модификатора, приобретенных при наличии более, чем 100 статов ловкости (5% абс. мф. уворота) и 100 интуиции (5% мф абсолютного крита).
<Br />
<Br /><EM><strong>Примечание</strong>. Абсолютные модификаторы парирования, увертывания и блока щитом подавляются одним приемом: 
<Br /><img src=http://img.combats.ru/i/misc/icons/multi_doom.gif border=0> <B>Обреченность</B>
<br />От следующего Вашего удара невозможно увернуться, его нельзя парировать или заблокировать щитом. Но его можно просто заблокировать</EM>.
<Br />
<Br />В бою модификаторы рассчитываются в таком порядке - увертывание, критический удар, парирование, нормальные блоки, блок щитом.
<Br />Критический удар пробивает парирование/блок, при этом урон становится в 2 раза ниже.
<Br />
<BR></EM>Существует особенный, скрытый "модификатор" - <img src=http://img.combats.ru/i/items/spell_luck.gif border=0> <STRONG>Удача</STRONG>. 
<Br />Это показатель, позитивно влияющий на генератор случайных чисел. Т.е. фактически, удача - это модификатор, повышающий шанс наступления позитивного боевого события.

</td></tr></tbody></table>
             </blockquote>

               <div class="tabbed-nav-bar-bottom">
                 <noindex><noindex><a rel="nofollow" rel="nofollow" class="TLink" onclick="goTab(1);return false;"  href="#">Назад</a></noindex></noindex>  <noindex><noindex><a rel="nofollow" rel="nofollow" class="TLink" onclick="goTab(3);return false;"  href="#">Далее</a></noindex></noindex>
               </div>
          </td></tr></tbody></table>
        </div>
<!--конец блок 3-->
 <!--начало блок 4-->
        <div>
          <table class="Head tab-content" id="tb" name="tb" border="0" cellpadding="0" cellspacing="6" width="100%">
          <tbody>
           <tr><td class="Head td_heading" valign="top">
  <!--Название 4-->Урон </td></tr>
           <tr><td valign="top">
	
             <blockquote>
             <table class="tcontent" border="0"><tbody><tr><td>
  <!--  Содержимое 4 -->

<BR><STRONG>Урон</STRONG> - это повреждения, наносимые противнику с помощью определенного вида оружия, с помощью приемов или свитков. 
<Br />
<Br />Всё оружие делится на классы и имеет свой профильный урон:
<Br />• <STRONG>Мечи - Рубящий</STRONG>, однако у нововведенных мечей профильный урон - <STRONG>Режущий</STRONG>.
<BR>• <STRONG>Дубины, булавы, цепы - Дробящий</STRONG>.
<BR>• <STRONG>Ножи, кастеты - Колющий</STRONG>.
<BR>• <STRONG>Посохи - Стихийный.</STRONG>
<BR>• <STRONG>Топоры секиры - Рубящий.</STRONG>
<BR>
<BR>Существует определённые формулы расчета урона оружием:
<BR>• <STRONG>Колющий урон</STRONG> зависит от 50% Силы и 40% Ловкости.
<BR>• <STRONG>Рубящий</STRONG> - от 50% Силы, 20% Ловкости и 30% Интуиции.
<BR>• <STRONG>Дробящий</STRONG> - от 80% Силы.
<BR>• <STRONG>Режущий</STRONG> - от 50% Силы и 40% Интуиции.
<Br />
<BR><STRONG>Стихийный урон</STRONG> - это повреждение, при котором оружие наносит удар магией одной из стихий. 
<Br />Стихийный урон, в отличие от физического, игнорирует показатели брони цели. 
<Br />Для посохов на стихийные атаки влияют параметры владения посохами, владения соответствующей магией и показатели мощности магического урона. 
<Br />Для остального оружия маг. урон рассчитывается по формуле: <em>50% ловкости, 50% силы с учетом мф мощности магии</em> (это оправдывает применение Стихийного Усиления для воинов).
<BR>
<BR><STRONG>Магический урон</STRONG> - это урон, наносимый магическими приемами. 
<Br />Существует 7 видов Магии стихий и каждая стихия наносит свой урон: 
<Br />Воздух, Огонь, Вода, Земля, Магия света, Магия тьмы и Серая магия.
<Br />Более подробно рассмотреть Маг. приёмы помогут ресурсы </noindex></noindex> и <noindex><noindex><A rel="nofollow" rel="nofollow" class=TLink href="http://bestcombats.net/news/others/book_shop/" target=_blank><FONT color=#800080>"Магия в приёмах"</FONT></A></noindex></noindex>. 
<Br />
<Br />Особенность магического урона в том, что он игнорирует зоны поражения. 
<Br />Данный вид урона не блокируется, однако есть вероятность увертывания от заклятия (за каждые 250 ед. защиты от магии дается 1% вероятности увернуться от заклинания). 
<Br />Также, присутствует абсолютный модификатор магического промаха, равный 6%.
<BR>
<BR>Есть два набора параметров, влияющих на боевые характеристики персонажа. Это <STRONG>мощность</STRONG> и <STRONG>защита</STRONG>. 
<Br />
<BR>

</td></tr></tbody></table>
             </blockquote>

               <div class="tabbed-nav-bar-bottom">
                 <noindex><noindex><a rel="nofollow" rel="nofollow" class="TLink" onclick="goTab(2);return false;"  href="#">Назад</a></noindex></noindex>  <noindex><noindex><a rel="nofollow" rel="nofollow" class="TLink" onclick="goTab(4);return false;"  href="#">Далее</a></noindex></noindex>
               </div>
          </td></tr></tbody></table>
        </div>
<!--конец блок 4-->
 <!--начало блок 5-->
        <div>
          <table class="Head tab-content" id="tb" name="tb" border="0" cellpadding="0" cellspacing="6" width="100%">
          <tbody>
           <tr><td class="Head td_heading" valign="top">
  <!--Название 5-->Броня и защита</td></tr>
           <tr><td valign="top">
	
             <blockquote>
             <table class="tcontent" border="0"><tbody><tr><td>
  <!--  Содержимое 5 -->

<BR><STRONG>Защита персонажа</STRONG> - состоит из защиты от физического урона и от магического урона. 
<Br />Защита от физического урона состоит из <STRONG>брони</STRONG> и <STRONG>защиты от</STRONG> <STRONG>урона</STRONG>. 
<Br />Сначала учитывается уровень брони, а потом скорректированный на броню урон модифицируется показателем защиты от урона.
<BR>
<BR><STRONG>Броня</STRONG> - это характеристика <STRONG>вещей</STRONG>, позволяющая поглотить определенное количество урона. 
<Br />
<Br />• Броня может быть как как для <strong>определённой зоны</strong> персонажа (её дает одежда, бронируются только определенные зоны поражения), так и <strong>общей</strong> (её дает ювелирка, щит; значение брони распространяется на все зоны поражения). 
<Br />• Показатели брони делятся на <strong>абсолютный</strong> и <strong>дополнительный</strong>. 
<Br />• Уровень брони указывается в формате N+Kd, где N - абсолютная броня (т.е. гарантированный минимальный ее уровень), К - показатель дополнительной брони, d-случайный коэфициент, который может принимать значения в диапозоне от 1 до K. 
<Br />В бою происходит следующий расчет: к фиксированной защите N прибавляется случайный показатель Kd. К примеру, если броня указана 5+10d, то она будет колебаться в пределах от 6 до 15 ед. После вычисления уровня брони, этот показатель отнимается от величины урона. Затем, к этому урону применяются показатели защиты от урона.
<BR>
<BR><STRONG>Показатели защиты от урона</STRONG> – это уровень поглощения получаемого урона. 
<Br />Показатели защиты могут быть как <strong>профильные</strong>, так и <strong>общие</strong>. 
<Br />
<Br />• Профильные защищают от одного вида урона, а общие действуют на все виды урона одновременно. Эффекты суммируются. <Br />• Показатели защиты указываются в единицах и процентах. Каждые 250 ед. увеличивает существующую защиту на 50% (т.е. при 250 ед. будет 50% защиты, при 500 - 75%, при 750 - 87.5%), однако, есть предельные значения для каждого уровня игроков, которые уровень защиты превышать не может. 
<Br />• Показатели защиты от урона и магии уменьшаются в 1,2 раза за каждый уровень атакующего противника выше [8]. <Br />Максимальная защита от магического урона - 800 ед., от урона - 1000 ед. 
<Br />
<Br /><strong>Источники защиты от урона:</strong> 
<Br />Вещи, временные эффекты (эликсиры, свитки) и стат "Выносливость". 
<Br />
<Br />• Защита может быть общей (действует на все зоны поражения), так и по зонам (аналогично броне). Однако, существует одежда, дающая защиту от урона на все зоны поражения, например, вещи лича.
<BR>
<BR><STRONG>Защита от магии</STRONG> - это характеристика персонажа, позволяющая снизить получаемый магический урон. 
<Br />
<Br /><strong>Источники защиты от магии:</strong> 
<Br />Вещи, временные эффекты (эликсиры, свитки) и уровень "Выносливости". 
<Br />
<Br />• Защита от магии не делится на зоны поражения, а распространяется на всего персонажа. 
<Br />• Защита от магии рассчитывается как сумма профильной защиты от конкретного вида магии и общего показателя защиты от магии. 
<Br />
<Br />Существует особенность магии Тьмы, Света и Серой магии - от них нет профильной защиты, потому на повреждение этими магиями влияет только общий показатель защиты от магии.
<BR>

</td></tr></tbody></table>
             </blockquote>

               <div class="tabbed-nav-bar-bottom">
                 <noindex><noindex><a rel="nofollow" rel="nofollow" class="TLink" onclick="goTab(3);return false;"  href="#">Назад</a></noindex></noindex>  <noindex><noindex><a rel="nofollow" rel="nofollow" class="TLink" onclick="goTab(5);return false;"  href="#">Далее</a></noindex></noindex>
               </div>
          </td></tr></tbody></table>
        </div>
<!--конец блок 5-->
 <!--начало блок 6-->
        <div>
          <table class="Head tab-content" id="tb" name="tb" border="0" cellpadding="0" cellspacing="6" width="100%">
          <tbody>
           <tr><td class="Head td_heading" valign="top">
  <!--Название 6-->Очки тактики </td></tr>
           <tr><td valign="top">
	
             <blockquote>
             <table class="tcontent" border="0"><tbody><tr><td>
  <!--  Содержимое 6 -->

<BR>В бою, с учетом модификаторов, мощности урона, защиты, брони и прочего, происходит обмен ударами. В результате разменов наступают определенные боевые ситуации, за которые начисляются очки тактики. 
<Br />Далее рассмотрим какие есть очки тактики, за что и в каких количествах они начисляются:
<BR>
<BR><STRONG><IMG height=8 alt="" hspace=3 src="http://img.combats.ru/i/misc/micro/hit.gif" width=8>Тактика атаки</STRONG>. 
<Br />1 успешный удар одноручным оружием = 1 тактика.
<BR>1 успешный удар двуручным оружием = 3 тактики.
<BR>
<BR><STRONG><IMG height=8 alt="" hspace=3 src="http://img.combats.ru/i/misc/micro/krit.gif" width=7>Тактика критического удара</STRONG>. 
<Br />1 критический удар одноручным оружием, не через блок = 2 тактики.
<BR>1 крит двуручным оружием = 2-3 тактики (в зависимости от величины урона и наличия травмы противнику).
<BR>1 крит через блок = 1 тактика.
<BR>
<BR><STRONG><IMG height=8 alt="" hspace=3 src="http://img.combats.ru/i/misc/micro/counter.gif" width=8>Тактика контр-удара</STRONG>. 
<Br />1 успешный контр-удар = 1 тактика контр-удара.
<BR>
<BR><IMG height=8 alt="" hspace=3 src="http://img.combats.ru/i/misc/micro/block.gif" width=7><STRONG>Тактика блока</STRONG> 
<Br />1 заблокированный удар = 1 тактика блока.
<BR>Если при размене заблокировано несколько ударов, тактики начисляются за каждый заблокированный удар.
<BR>
<BR><STRONG><IMG height=8 alt="" hspace=3 src="http://img.combats.ru/i/misc/micro/parry.gif" width=8>Тактика парирования</STRONG> 
<Br />1 успешное парирование = 1 тактика парирования.
<BR>
<BR><STRONG><IMG height=8 alt="" hspace=3 src="http://img.combats.ru/i/misc/micro/hp.gif" width=8>Сердца</STRONG>. 
<Br />Здесь существуют особые методы расчета: <Br />Для персонажей 1-7 уровня одно сердце начисляется за нанесение врагу урона, равного 10% НР противника. 
<Br />Для персонажей 8 уровня и выше действуют следующие правила: 
<Br />если у противника 8го уровня менее 1000 НР, то за 10%НР начисляется 1 сердце, как и на младших уровнях. А если более 1000 НР, то 10 сердец будет начисляться за каждую выбитую из него 1000 НР. 
<Br />Для 9го уровня, это соответственно - 1200 НР, для 10го - 1440 НР, для 11го – 1728 НР.
<BR>
<BR><STRONG><IMG height=8 alt="" hspace=3 src="http://img.combats.ru/i/misc/micro/spirit.gif" width=7>Сила духа</STRONG>. 
<Br />Применяется для использования некоторых важных приемов, а также, многих свитков в бою. 
<Br />Количество силы духа на начало боя фиксированное и напрямую зависит от уровня вашей восстановленности. 
<Br />Сила духа в начале боя умножается на процент HP (например, если всего у вас 1000 НР, а в бой вы вошли с 700 НР, то сила духа будет умножена на 0,7). 
<Br />
<Br />Для игроков разного уровня количество Силы духа разное. 
<Br />7 уровень – 10 силы духа 
<Br />8 уровень – 20 силы духа
<Br />9 уровень – 30 силы духа
<Br />10 уровень – 40 силы духа
<Br />11 уровень – 40 силы духа
<Br />Кроме того, каждый стат «Духовность» увеличивает силу духа на 1.
<BR>
<BR>За накопленные очки тактики можно применять различные приемы. В современном КБК именно тактика приемов и является основой успешного ведения боя.
<BR>

</td></tr></tbody></table>
             </blockquote>
               <div class="tabbed-nav-bar-bottom"><noindex><noindex><a rel="nofollow" rel="nofollow" class="TLink" onclick="goTab(4);return false;"  href="#">Назад</a></noindex></noindex>
               </div>
          </td></tr></tbody></table>
        </div>
<!--конец блок 6-->
    </div>
</div>
 
 
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