<?
	session_start();
	include "../../connect.php";
	$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$_COOKIE['uid']."' LIMIT 1;"));
	include "../../functions.php";
	$Get_Page="all_izlom";
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
<TABLE width="98%" align=center border=0>
<TBODY>
<TR>
<TD class=normaltext align=left valign="top">
 
<div class="page_title"><B>Всё о Изломе Хаоса</B></div>
 
<HR align=center width="90%" color=#aa0000 noShade SIZE=0.1><TABLE width=100% border="0">

																										  
</TD>

<TABLE border="0" cellspacing="0" cellpadding="5" width="100%" height="100%">
<TR valign="top">
<TD width="100%">
<center><table cellspacing=0>
  <TR align=center><TD align=center>
 <A href="?page=1">Введение</A>&nbsp;|&nbsp;<A href="?page=2">Поединки</A>&nbsp;|&nbsp;<A href="?page=3">Уникальные боты</A>&nbsp;|&nbsp;<A href="?page=4">Магазин</A>&nbsp;|&nbsp;<A href="?page=5">Уникальные предметы</A>&nbsp;|&nbsp;<A href="?page=6">Рекомендации</A> </TR></TD></TABLE></center><BR>
  <TABLE class=BL cellspacing=0><TR><TD>
<?If ($_GET['page']==1 or $_GET['page']==NULL){?>
  <DIV style="text-align: center;"><B>ИЗЛОМ ХАОСА</B></DIV><br />

<DIV style="text-align: center;"><TABLE class=QUOTE><TR><TD>Для гостей <SPAN title="Old City"><IMG src="http://img.bestcombats.net/i/sh/fo11.gif" width=17 height=16 border=0></SPAN><B>Old City</B> открыта новая локация, рассчитанная на игроков-одиночек <B><span style="color:#F93737">7+</span></B> уровней - <IMG src="http://img.combats.com/i/align2.gif" width=12 height=15 border=0><B>Излом Хаоса</B>.</TD></TR></TABLE>
<IMG src="http://img.combats.com/i/align2.9.gif" width=12 height=15 border=0><B>Мы</B> немного приоткрыли завесу тайны, нависшую над новым развлечением сорвиголов.</DIV><br />
<TABLE><TR><TD><IMG SRC="http://img.combats.ru/i/images/subimages/ab_iz_npc.gif" border=0></TD>
<br />
<DIV style="text-align: center;"><IMG SRC="http://bestcombats.net/news/others/izlom/karta.jpg" border=0></DIV><br />
<TD>Испытать себя в бою с силами хаоса вы можете лишь раз в сутки:</B><br />
Всего один раз в 24 часа дается возможность бросить вызов судьбе и уничтожить как можно больше исчадий ада. Проиграв бой, вы автоматически покидаете поле битвы и приобретаете вредный эффект <IMG SRC="http://img.combats.ru/i/misc/icons/survival_timeout.gif" border=0>«<I>Касание хаоса</I>».<br />
<DIV style="text-align: center;"><IMG SRC="http://www.paladins.ru/uploads/15086/Izlom.gif" border=0></DIV><br />
Этот эффект не замораживается во время сна в Общежитии и не влияет на задержку посещений пещер.</TD></TR></TABLE>
<br />
<?}?>

<?If ($_GET['page']==2){?>
<TABLE border="0" cellspacing="0" cellpadding="5" width="100%" height="100%">
<TR valign="top">
<TD width="100%">
<table class=BL cellspacing=0>
  <TR><TD>
    <TABLE class=BL cellspacing=0><TR><TD>
  Чтобы приступить к испытаниям, необходимо нажать кнопку «<B>Начать поход</B>» и вы автоматически окажетесь в бою. Вмешавшиеся монстры определяются рандомно. <B>Главная задача</B>: убить как можно больше волн с ботами. Стоит помнить, что бой идет с таймаутом в 1 минуту, так что на раздумку тактики совсем не хватает времени. Новая волна с монстрами нападет лишь в том случае, когда будут убиты все предыдущие нечисти. Но это не касается уникальных ботов. Они могут застать вас врасплох и напасть в любое время. После убийства всех монстров в волне, у вас автоматически восстанавливаеться <B>25% НР </B>и <B>маны</B>. <br />
<br />
<br />
После чего вмешается следующая волна ботов... Это будет продолжаться до тех пор, пока вы не проиграете. Бой с монстрами нельзя выиграть, но можно и не проиграть, воспользовавшись приемом <IMG SRC="http://img.combats.ru/i/misc/icons/hp_laststrike.gif" border=0><B>Последний Удар</B>. Тогда бой закончится ничьей. Это хорошо тем, что вещи ломаются не так быстро, как при проигрыше.<br />
<span style="color:#F93737">Важно!</span> Вы <B>не получите опыт </B>за бой, цель сражения – добыть образцы:<br />
<br />
<TABLE class=QUOTE><TR><TD><span style="color:#008000">13:02</span> <span style="color:#F93737">Внимание!</span> Бой закончен. Всего вами нанесено урона: <B>3221 HP</B>. Получено опыта: <B>0</B>.<br />
<span style="color:#008000">13:02</span> <span style="color:#F93737">Внимание!</span> Вы создали предмет 'Образец'x5</TD></TR></TABLE>
<br />
<TABLE><TR><TD><IMG SRC="http://bestcombats.net/news/i/izlom1.png" border=0></TD>
		<TD><B>Образец</B>  (Масса: 0.1) <IMG SRC="http://img.combats.ru/i/podarok.gif" border=0> <IMG SRC="http://img.combats.ru/i/destiny.gif" border=0><br />
Долговечность: 0/1<br />
<SMALL>Сделано в Old City<br />
<span style="color:#FF9900">Предмет не подлежит ремонту</span></SMALL></TD></TR></TABLE>
Образцы выдаются <U>рандомно</U>. Вы можете продержаться 7 волн и получить 1 образец, а можете убить одного бота в первой волне и получить 13 образцов. <br />
<br />

<?}?>

<?If ($_GET['page']==3){?>
В разработке!

<?}?>

<?If ($_GET['page']==4){?>
<!-- <четвертый бокс> -->
 <div class="box">
<b>Магазин</b>
<hr>

Магазин, где можно приобрести вещи за награду находится в «<b>Capital City</b>». Получив необходимое количество образцов, у вас появляется возможность купить те или иные предметы для улучшения собственной амуниции. <br>

<b><span style="color:#F93737">Внимание!</span></b> Все предметы связываются <img src="http://img.combats.ru/i/destiny.gif" border="0"><b>общей судьбой</b> с первым купившим.<br>
<br>
<br>


<?}?>

<?If ($_GET['page']==5){?>
В разработке!

<?}?>

<?If ($_GET['page']==6){?>
<b>Рекомендации</b>
<hr>

Опытные борцы утверждают, что...<br>
<br>
<ul style="margin-top: 0px; margin-bottom: 0px;">
<li>Время используемых обкастов и эликсиров летит стремительно быстро. Каждый размен «ест» 30 секунд от времени. Надо заметить, были случаи, когда на пристрастиях проходили больше волн, чем при полном обкасте.<br>
</li>
<br>
<li>Говоря о том, кто «рулит», а кто нет - можно сказать, что уютно себя чувствуют криты и увороты. Если вы не артовый маг, то долго не продержитесь - о чем и свидетельствует рейтинг лучших бойцов <img src="http://img.combats.com/i/align2.gif" border="0" height="15" width="12"><b>Излома Хаоса</b>.<br>

</li>
<br>
<li>В приемах желательно иметь: <img src="http://img.combats.ru/i/misc/icons/hp_laststrike.gif" border="0"><b>Последний удар</b>, чтобы вещи не ломались после боя, <img src="http://img.combats.ru/i/misc/icons/hp_circleshield.gif" border="0"><b>Круговая защита</b> и <img src="http://img.combats.ru/i/misc/icons/hp_defence.gif" border="0"><b>Стойкость</b>. <br>
<span style="color: rgb(249, 55, 55);">Важно!</span> Берегите <img src="http://img.combats.ru/i/misc/micro/spirit.gif" border="0"><b>силу духа</b>, так как она не восстанавливается в течение боя.</li>

<br>
<br>
<li>Образцы выдаются рандомно, то есть они не зависят от количества убитых монстров.</li>
<br>
<li>При себе желательно иметь <img src="http://img.combats.ru/i/items/invoke_kar1_heal10.gif" border="0"><b>Целебный пирог</b> на тот случай, если у вас закончился дух, а вам надо срочно восстановить еще немного жизней.</li>
<br>
<br>
<li>Подходя к вопросу о выборе оружия, можно отметить, что многие танки предпочитают надевать щит – он помогает продержаться намного дольше. </li>
<br><br>

<?}?>
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