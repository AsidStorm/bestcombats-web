<?
	session_start();
	include "../../connect.php";
	$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$_COOKIE['uid']."' LIMIT 1;"));
	include "../../functions.php";
	$Get_Page="all_bonus";

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
 
<div class="page_title"><B>Статовые бонусы</B></div>
<HR align=center width="90%" color=#aa0000 noShade SIZE=0.1><TABLE width=100% border="0">													  														  
</TD>
</tr>
<tr>
<td>

<table width="90%" border="0" cellpadding="0" cellspacing="0">
      <tr><td valign="top" class="content" width="100%" align="left"><index>
		<!-- MAIN CONTENT -->
          <h2>Статовые бонусы</h2><div class="block">Изменяя какой-либо из параметров статов, при превышении кратное 25-ти, усилятся соответствующие этому параметру модификаторы.<br>Вы можете их посмотреть в колонке "Усиления", на закладке "Состояния".<br><br><TABLE align=center border=2><THEAD><TR><TD align=center>Параметр</TD><TD align=center>Наименование усиления</TD><TD align=center>Значение параметра <br>(больше или равно)</TD><TD align=center>Действие усиления</TD></TR></THEAD><TBODY><TR><TD rowspan=5 valign=middle align=center class=n>Сила<TD rowspan=5 valign=middle align=center> Чудовищная Сила </TD><TD align=center><sTRong> 25 </sTRong> </TD><TD>• Мф. мощности урона (%): +5</TD></TR><TR><TD align=center><sTRong> 50 </sTRong></TD><TD>• Мф. мощности урона (%): +10</TD></TR><TR><TD align=center><sTRong> 75 </sTRong></TD><TD>• Мф. мощности урона (%): +17</TD></TR><TR><TD align=center><sTRong> 100 </sTRong></TD><TD>• Мф. мощности урона (%): +25</TD></TR><TR><TD align=center><sTRong> 125 </sTRong></TD><TD>• Минимальный урон: +10<BR />• Максимальный урон: +10<BR />• Мф. мощности урона (%): +25</TD></TR></TR><TR><TD rowspan=5 valign=middle align=center class=n>  Ловкость </TD><TD rowspan=5 valign=middle align=center>Скорость Молнии</TD><TD align=center><sTRong> 25 </sTRong></TD><TD>• Мф. парирования (%): +5 </TD></TR><TR><TD align=center><sTRong> 50 </sTRong></TD><TD>• Мф. парирования (%): +5<BR />• Мф. против крита (%):+15<BR />• Мф. увертывания (%): +35</TD></TR><TR><TD align=center><sTRong> 75 </sTRong></TD><TD>• Мф. парирования (%): +15<BR />• Мф. против крита (%):+15<BR />• Мф. увертывания (%): +35</TD></TR><TR><TD align=center><sTRong> 100 </sTRong></TD><TD>• Мф. парирования (%): +15<BR />• Мф. против крита (%):+40<BR />• Мф. увертывания (%): +105</TD></TR><TR><TD align=center><sTRong> 125 </sTRong></TD><TD>• Мф. парирования (%): +15<BR />• Мф. против крита (%):+40<BR />• Мф. увертывания (%): +105<BR />• Абс.мф. увертывания (%): +5</TD></TR></TR><TR><TD rowspan=5 valign=middle align=center class=n>Интуиция</TD><TD rowspan=5 valign=middle align=center>Предчувствие</TD><TD align=center><sTRong> 25 </sTRong></TD><TD>• Мф. мощности крита: +10</TD></TR><TR><TD align=center><sTRong> 50 </sTRong></TD><TD>• Мф. мощности крита: +10 <BR />• Мф. критического удара (%): +35<BR />• Мф. против увертывания (%): +15</TD></TR><TR><TD align=center><sTRong> 75 </sTRong></TD><TD>• Мф. мощности крита: +25 <BR />• Мф. критического удара (%): +35<BR />• Мф. против увертывания (%): +15</TD></TR><TR><TD align=center><sTRong> 100 </sTRong></TD><TD>• Мф. мощности крита: +25 <BR />• Мф. критического удара (%): +105 <BR />• Мф. против увертывания (%): +45</TD></TR><TR><TD align=center><sTRong>125</sTRong></TD><TD>• Мф. мощности крита: +25 <BR />• Мф. критического удара (%): +105 <BR />• Мф. против увертывания (%): +60<BR />• Абс.мф. крита (%): +5</TD></TR></TR><TR><TD rowspan=1 valign=middle align=center class=n>Выносливость<TD rowspan=1 valign=middle align=center> <BR />Выносливость<BR /><BR /> </TD><TD align=center><sTRong>есть всегда</sTRong> </TD><TD>• Уровень жизни (HP): +30</TD></TR></TR><TR><TD rowspan=5 valign=middle class=n>Выносливость</TD><TD rowspan=5 valign=middle align=center>Стальное Тело</TD><TD align=center><sTRong> 25 </sTRong></TD><TD>• Уровень жизни (HP): +50 </TD></TR><TR><TD align=center><sTRong> 50 </sTRong></TD><TD>• Уровень жизни (HP): +100 </TD></TR><TR><TD align=center><sTRong> 75 </sTRong></TD><TD>• Уровень жизни (HP): +150 </TD></TR><TR><TD align=center><sTRong> 100 </sTRong></TD><TD>• Уровень жизни (HP): +200</TD></TR><TR><TD align=center><sTRong> 125 </sTRong></TD><TD>• Уровень жизни (HP): +250<BR />• Защита от урона: +25</TD></TR></TR><TR><TD rowspan=5 valign=middle align=center class=n>Интеллект</TD><TD rowspan=5 valign=middle align=center>Разум</TD><TD align=center><sTRong> 25 </sTRong></TD><TD>• Мф. мощности магии стихий (%): +5 </TD></TR><TR><TD align=center><sTRong> 50 </sTRong></TD><TD>• Мф. мощности магии стихий (%): +10 </TD></TR><TR><TD align=center><sTRong> 75 </sTRong></TD><TD>• Мф. мощности магии стихий (%): +17 </TD></TR><TR><TD align=center><sTRong> 100 </sTRong></TD><TD>• Мф. мощности магии стихий (%): +25</TD></TR><TR><TD align=center><sTRong> 125 </sTRong></TD><TD>• Мф. мощности магии стихий (%): +35</TD></TR></TR><TR><TD rowspan=5 valign=middle align=center class=n>Мудрость</TD><TD rowspan=5 valign=middle align=center>Сила Мудрости</TD><TD align=center><sTRong> 25 </sTRong></TD><TD>• Мана: +50 <br>• Восстановление маны (%): +100</TD></TR><TR><TD align=center><sTRong> 50 </sTRong></TD><TD>• Мана: +100 <br>• Восстановление маны (%): +200</TD></TR><TR><TD align=center><sTRong> 75 </sTRong></TD><TD>• Мана: +150 <br>• Восстановление маны (%): +350</TD></TR><TR><TD align=center><sTRong> 100 </sTRong></TD><TD>• Мана: +200<br>• Восстановление маны (%): +500</TD></TR><TR><TD align=center><sTRong> 125 </sTRong></TD><TD>• Мана: +250<BR />• Понижение защиты от магии (%): +3</TD></TR></TR><TR><TD rowspan=4 valign=middle align=center class=n>Духовность</TD><TD align=center valign=middle><BR />Духовная Защита<BR /><BR /></TD><TD align=center><sTRong> 25 </sTRong></TD><TD>• Жизнь после смерти даёт вам приём: "Призрачная Защита" </TD></TR><TR><TD align=center valign=middle>Духовное Исцеление</TD><TD align=center><sTRong> 50 </sTRong></TD><TD>• Встроено заклинание "спасение" <BR /><img src=http://img.combats.ru/i/items/preservation.gif border=0> 1 шт. на бой. <BR />Каждый бой вы начинаете под действием магии Спасения.</TD></TR><TR><TD align=center valign=middle>Путь Духа</TD><TD align=center><sTRong> 75 </sTRong></TD><TD>• Встроено заклинание "спасение" <BR /><img src=http://img.combats.ru/i/items/preservation.gif border=0> 1 шт. на бой. <BR /> Воскрешение и Спасение тратят вдвое меньше силы духа.</TD></TR><TR><TD align=center valign=middle>Очищение</TD><TD align=center><sTRong> 100 </sTRong></TD><TD>• Встроено заклинание "спасение" <BR /><img src=http://img.combats.ru/i/items/preservation.gif border=0> 1 шт. на бой. <BR />Смерть очищает вас от негативных эффектов заклинаний,<BR /> проклятий, болезней, ядов в текущем бою. </TD></TR><TR></TR></TBODY></TABLE>
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