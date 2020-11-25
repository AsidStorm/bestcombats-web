<?
	session_start();
	include "../../connect.php";
	$user = mysqli_fetch_array(db_query("SELECT * FROM `users` WHERE `id` = '".$_COOKIE['uid']."' LIMIT 1;"));
	include "../../functions.php";
	$Get_Page="all_zoo";

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
 
<div class="page_title"><B>Животноводство</B></div>
<HR align=center width="90%" color=#aa0000 noShade SIZE=0.1><TABLE width=100% border="0">													  														  
</TD>
</tr>
<tr>
<td>

<br>
С недавних пор в <b>Бойцовском Клубе</b> стало возможным завести зверя в качестве спутника своему персонажу. Если Вы будете растить своего питомца - то, с временем, он сможет оказывать Вам значительную помощь в боях.<br />
<br />
Чтобы получить зверя, его необходимо призвать. Свитки призыва продаются в <b>Зоомагазине</b>, расположенном на <b>Центральной Площади</b>  <img src='<?=IMG_PATH?>/i/sh/fo1.gif'><b>CapitalCity</br>
<center><img src="http://bestcombats.net/i/city/1_Steads.gif" border="0" alt="" style="vertical-align:text-bottom;"><br />

<center><b><h2>Свитки призыва</h2></b><br /><br />
<table width='70%' border='0' cellspacing='0' cellpadding='0' class='summonTbl'>
	<tr>
		<th width='40%' align=left><b>название животного</b></th>
		<th width='30%' align=left><b>стоимость свитка</b></th>
		<th width='30%' align=left><b>город призыва</b></th>
	</tr>
	<tr>
		<td><img src="http://img.combats.ru/i/items/summon_pet_demon.gif" border="0" alt="" style="vertical-align:text-bottom;"><br /><b>Чёрт</b></td>
		<td>50 кр</td>
		<td><b>любой</b></td>
	</tr>
	<tr>
		<td><img src="http://img.combats.ru/i/items/summon_pet_cat.gif" border="0" alt="" style="vertical-align:text-bottom;"><br /><b>Кот</b></td>
		<td>50 кр</td>
		<td>любой</td>
	</tr>
	<tr>
		<td><img src="http://img.combats.ru/i/items/summon_pet_owl.gif" border="0" alt="" style="vertical-align:text-bottom;"><br /><b>Сова</b></td>
		<td>50 кр</td>
		<td>любой</td>
	</tr>
	<tr>
		<td><img src="http://img.combats.ru/i/items/summon_pet_dog.gif" border="0" alt="" style="vertical-align:text-bottom;"><br /><b>Пёс</b></td>
		<td>75 кр</td>
		<td>любой</td>
	</tr>
	<tr>
		<td><img src="http://img.combats.ru/i/items/summon_pet_pig.gif" border="0" alt="" style="vertical-align:text-bottom;"><br /><b>Свин</b></td>
		<td>75 кр</td>
		<td>любой</td>
	</tr>
	<tr>
		<td><img src="http://img.combats.ru/i/items/summon_pet_wisp.gif" border="0" alt="" style="vertical-align:text-bottom;"><br /><b>Светляк</b></td>
		<td>75 кр</td>
		<td><b>любой</b></td>
	</tr>
</table></center>
<br />
<br />
<br />
Купив подходящий свиток призыва, смело можете его использовать . Для этого зайдите в свой инвентарь, раздел <b>Заклятия</b>, найдите свиток и нажмите на нем <b>Использовать</b>. На всплывающем подтверждении с вопросом <b>&quot;Использовать сейчас?&quot;</b> нажите <b>&quot;Да&quot;</b>. После использовании Вы увидите напись о появлении зверя.<br />
Если у Вас есть зверь, то в в Инвенторе появляется соответствующий раздел. Зайдя в него, Вы увидите: характеристики Вашего животного, сытость, освоенные навыки и доступную для Вашего зверька еду. Образ животному дается случайным образом, и сменить его можно только вместе со зверем. <br />
С помощью кнопки <b>Кличка</b> Вы можете дать Вашему зверю имя. Оно должно состоять не более чем из 10 символов и только из одного слова. При выборе некорректного имени вы увидите надпись: <b>&quot;Эта кличка не подходит&quot;</b>. <br />
<br />
<i><img src=<?=IMG_PATH?>/i/align_1.99.gif><b>Орден Света</b> предупреждает: нецензурные или оскорбительные клички животных влекут за собой строгие наказания.</i><br />
<br />
<h3>Об опыте и сытости Вашего зверя Вы узнаете из системных сообщений в чате:</h3><br />
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0"><tr><td class="quoteheader">[цитата]</td></tr><tr><td class="quote link1"><i>01:23 Внимание! [Кличка зверя] достиг 1 уровня!</i><br />
<i>01:25 Внимание! [Кличка зверя] нуждается в еде...</i></td></tr></table><br />
Второе сообщение говорит о том, что Ваш зверь голоден и его нужно покормить - ведь голодным он не может войти к Вам в бой и не даёт бонусов. <br />
<br />
В разделе <b>Зверь</b> есть кнопка <b>Выгнать</b>. С её помощью, при необходимости, Вы можете избавиться от Вашего питомца. <br />
<br />
Если Вы хотите оставить себе двух зверей, то Вам необходимо снять комнату в Общежитии за 10 кредитов в неделю - в ней есть специальное место для зверя.
<br />
<br />

<center><b><h2>Кормление животных</h2></b></center><br />


Животных необохидмо своевременно кормить. Если этого не делать, то сытость питомца опустится до нуля, и он не сможет помогать Вам в боях. Чем выше уровень зверя, тем дороже обходится его кормёжка. Так же, для каждого вида зверей существует своя еда. Купить её можно там же, где и сами свитки призыва, - в зоомагазинах.<br />

<h3>Максимальный уровень сытости зверя равен 50. За каждый бой зверь теряет сытость:</h3><br />
<ul>
<li align="left"> 1 - за бой с Вашим участием, но где Вы не выпускали зверя
<li align="left">5 - за бой с Вашим участием и с выпущенным в бой зверем
<li align="left">Если Вы выпустите в бою зверя, он отнимет у вас 1/3 часть опыта, если уровень зверя - ниже Вашего
</ul>
Случаев, когда голодный зверь сбежал бы от хозяина - не отмечено.<br />
<br />
<h3>Покормить зверя Вы можете через раздел <b>Зверь</b> инвентаря. Каждая порция еды прибавляет:</h3><br />
<ul>
<li align="left">20 cытости - если она предназначена того же уровня, что и зверь
<li align="left">16 cытости - при разнице в один уровень со зверем
<li align="left">12 cытости - при разнице в два уровеня со зверем
<li align="left">8 cытости - при разнице в три уровеня со зверем
</ul>
<br />
<center>
	<b>Корм для животных</b><br />
	<table class='petFoodTbl' border="1" width="500" align="center" valign="center" cellpadding="7" cellspacing="3">
		<tr>
			<th>зверь</th>
			<th>0й уровень</th>
			<th>2й уровень</th>
			<th>3й уровень</th>
			<th>4й уровень</th>
			<th>6й уровень</th>
			<th>8й уровень</th>
			<th>10й уровень</th>
		</tr>
		<tr>
			<td><img src="http://img.combats.ru/i/items/summon_pet_demon.gif" border="0" alt="" style="vertical-align:text-bottom;"><br /><b>Чёрт</b></td>
			<td><img src="<?=IMG_PATH?>/i/sh/pepel.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_chrt20");' onMouseOut='onOut(event);'></td>
			<td align="center">-</td>
			<td><img src="<?=IMG_PATH?>/i/sh/pet_food_chrt20_3.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_chrt20_3");' onMouseOut='onOut(event);'></td>
			<td align="center">-</td>
			<td><img src="<?=IMG_PATH?>/i/sh/pet_food_chrt20_6.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_chrt20_6");' onMouseOut='onOut(event);'></td>
			<td><img src="<?=IMG_PATH?>/i/sh/pet_food_chrt20_8.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_chrt20_8");' onMouseOut='onOut(event);'></td>
			<td><img src="<?=IMG_PATH?>/i/sh/pet_food_chrt20_10.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_chrt20_10");' onMouseOut='onOut(event);'></td>
		</tr>
		<tr>
			<td><img src="http://img.combats.ru/i/items/summon_pet_cat.gif" border="0" alt="" style="vertical-align:text-bottom;"><br /><b>Кот</b></th>
			<td><img src="<?=IMG_PATH?>/i/sh/poxlebka.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_cat20");' onMouseOut='onOut(event);'></td>
			<td><img src="<?=IMG_PATH?>/i/sh/pet_food_cat20_2.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_cat20_2");' onMouseOut='onOut(event);'></td>
			<td align="center">-</td>
			<td><img src="<?=IMG_PATH?>/i/sh/pet_food_cat20_4.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_cat20_4");' onMouseOut='onOut(event);'><br /><img src="<?=IMG_PATH?>/i/sh/pet_food_owl20_4.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_owl20_4");' onMouseOut='onOut(event);'></td>
			<td><img src="<?=IMG_PATH?>/i/sh/pet_food_cat20_6.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_cat20_6");' onMouseOut='onOut(event);'></td>
			<td><img src="<?=IMG_PATH?>/i/sh/pet_food_cat20_8.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_cat20_8");' onMouseOut='onOut(event);'><br /><img src="<?=IMG_PATH?>/i/sh/pet_food_owl20_8.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_owl20_8");' onMouseOut='onOut(event);'></td>
			<td><img src="<?=IMG_PATH?>/i/sh/pet_food_cat20_10.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_cat20_10");' onMouseOut='onOut(event);'></td>
		</tr>
		<tr>
			<td><img src="http://img.combats.ru/i/items/summon_pet_owl.gif" border="0" alt="" style="vertical-align:text-bottom;"><br /><b>Сова</b></th>
			<td><img src="<?=IMG_PATH?>/i/sh/nasek.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_owl20");' onMouseOut='onOut(event);'></td>
			<td><img src="<?=IMG_PATH?>/i/sh/pet_food_cat20_2.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_cat20_2");' onMouseOut='onOut(event);'></td>
			<td align="center">-</td>
			<td><img src="<?=IMG_PATH?>/i/sh/pet_food_owl20_4.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_owl20_4");' onMouseOut='onOut(event);'></td>
			<td><img src="<?=IMG_PATH?>/i/sh/pet_food_owl20_6.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_owl20_6");' onMouseOut='onOut(event);'></td>
			<td><img src="<?=IMG_PATH?>/i/sh/pet_food_owl20_8.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_owl20_8");' onMouseOut='onOut(event);'></td>
			<td><img src="<?=IMG_PATH?>/i/sh/pet_food_cat20_10.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_cat20_10");' onMouseOut='onOut(event);'></td>
		</tr>
		<tr>
			<td><img src="http://img.combats.ru/i/items/summon_pet_dog.gif" border="0" alt="" style="vertical-align:text-bottom;"><br /><b>Собака</b></th>
			<td><img src="<?=IMG_PATH?>/i/sh/pet_food_dog20.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_dog20");' onMouseOut='onOut(event);'></td>
			<td><img src="<?=IMG_PATH?>/i/sh/pet_food_dog20_2.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_dog20_2");' onMouseOut='onOut(event);'></td>
			<td align="center">-</td>
			<td><img src="<?=IMG_PATH?>/i/sh/pet_food_cat20_4.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_cat20_4");' onMouseOut='onOut(event);'></td>
			<td><img src="<?=IMG_PATH?>/i/sh/pet_food_cat20_6.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_cat20_6");' onMouseOut='onOut(event);'></td>
			<td><img src="<?=IMG_PATH?>/i/sh/pet_food_cat20_8.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_cat20_8");' onMouseOut='onOut(event);'></td>
			<td><img src="<?=IMG_PATH?>/i/sh/pet_food_dog20_10.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_dog20_10");' onMouseOut='onOut(event);'></td>
		</tr>
		<tr>
			<td><img src="http://img.combats.ru/i/items/summon_pet_pig.gif" border="0" alt="" style="vertical-align:text-bottom;"><br /><b>Свин</b></th>
			<td><img src="<?=IMG_PATH?>/i/sh/pet_food_pig20_10.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_pig20");' onMouseOut='onOut(event);'></td>
			<td><img src="<?=IMG_PATH?>/i/sh/pet_food_pig20_2.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_pig20_2");' onMouseOut='onOut(event);'></td>
			<td align="center">-</td>
			<td><img src="<?=IMG_PATH?>/i/sh/pet_food_pig20_4.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_pig20_4");' onMouseOut='onOut(event);'></td>
			<td align="center">-</td>
			<td><img src="<?=IMG_PATH?>/i/sh/pet_food_pig20_8.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_pig20_8");' onMouseOut='onOut(event);'></td>
			<td><img src="<?=IMG_PATH?>/i/sh/pet_food_pig20_10.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_pig20_10");' onMouseOut='onOut(event);'></td>
		</tr>
		<tr>
			<td><img src="http://img.combats.ru/i/items/summon_pet_wisp.gif" border="0" alt="" style="vertical-align:text-bottom;"><br /><b>Светляк</b></th>
			<td><img src="<?=IMG_PATH?>/i/sh/pet_food_wisp20.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_wisp20");' onMouseOut='onOut(event);'></td>
			<td align="center">-</td>
			<td><img src="<?=IMG_PATH?>/i/sh/pet_food_wisp20_2.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_wisp20_2");' onMouseOut='onOut(event);'></td>
			<td align="center">-</td>
			<td><img src="<?=IMG_PATH?>/i/sh/pet_food_wisp20_4.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_wisp20_4");' onMouseOut='onOut(event);'></td>
			<td><img src="<?=IMG_PATH?>/i/sh/pet_food_wisp20_6.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_wisp20_6");' onMouseOut='onOut(event);'></td>
			<td><img src="<?=IMG_PATH?>/i/sh/pet_food_wisp20_8.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_wisp20_8");' onMouseOut='onOut(event);'></td>
		</tr>
	</table>
</center>
<br />

<br /><center><b>Бонусы от Зверей</b></center><br /><br />
Если Ваш зверь накормлен и сыт, то в начале боя он даст Вам бонус, зависящий от его типа и уровня. Голодный зверь бонусов не даёт. Так же, Вы можете выпустить зверя в свой бой - в этом случае он будет сражаться на Вашей стороне и, при успешном исходе боя, получит опыт. Зверь получает часть Вашего опыта, но не больше своей базыю. Выпускать зверя в бой, где вы нанесли мало урона - бесполезно, он почти ничего не получит. Зверь не может быть старше Вам уровнем - как только он сравнивается с Вами, он перестаёт получать опыт (но и отнимать в боях - тоже). Оптимальный метод прокачки зверя - в тех пещерах, где Вы ещё получаете опыт.<br />
<br />

<img src="http://img.combats.ru/i/items/summon_pet_demon.gif" border="0" alt="" style="vertical-align:text-bottom;"><b>Черт</b> - даёт в бою +Х силы, где Х - его уровень<br />
<img src="http://img.combats.ru/i/items/summon_pet_cat.gif" border="0" alt="" style="vertical-align:text-bottom;"><b>Кот</b> - даёт в бою +Х ловкости, где Х - его уровень<br />
<img src="http://img.combats.ru/i/items/summon_pet_owl.gif" border="0" alt="" style="vertical-align:text-bottom;"><b>Сова</b> - даёт в бою +Х интуиции, где Х - его уровень<br />
<img src="http://img.combats.ru/i/items/summon_pet_dog.gif" border="0" alt="" style="vertical-align:text-bottom;"><b>Пес</b> - даёт в бою +Х*6 хп, где Х - его уровень<br />
<img src="http://img.combats.ru/i/items/summon_pet_pig.gif" border="0" alt="" style="vertical-align:text-bottom;"><b>Свин</b> - даёт в бою +Х*2 брони, где Х - его уровень<br />
<img src="http://img.combats.ru/i/items/summon_pet_wisp.gif" border="0" alt="" style="vertical-align:text-bottom;"><b>Светляк</b> - даёт в бою +Х% мощности магии стихий, где Х - его уровень<br />
<br />
<br /><center><b>Характеристики Зверей</b><br /><br />
<br />
<table border="1" width="500" align="center" cellpadding="20" cellspacing="5">
	<tr>
		<th width='60px'>Уровень (опыт)</th>
		<th width='120px'>Чёрт</th>
		<th width='120px'>Сова</th>
		<th width='120px'>Кот</th>
		<th width='120px'>Светляк</th>
		<th width='120px'>Собака</th>
		<th width='120px'>Свин</th>
	</tr>
	<tr>
		<td align="center">0й<br /></td>
		<td>Сила: 5<br />
Ловкость: 3<br />
Интуиция: 3<br />
Выносливость: 5<br />
НР: 30</td>
		<td>Сила: 2<br />
Ловкость: 2<br />
Интуиция: 5<br />
Выносливость: 5<br />
НР: 30</td>
		<td>Сила: 2<br />
Ловкость: 5<br />
Интуиция: 5<br />
Выносливость: 5<br />
НР: 30</td>
		<td>Сила: 3<br />
Ловкость: 10<br />
Интуиция: 3<br />
Выносливость: 4<br />
НР: 24</td>
		<td>Сила: 5<br />
Ловкость: 3<br />
Интуиция: 3<br />
Выносливость: 3<br />
НР: 30</td>
		<td>Сила: 5<br />
Ловкость: 3<br />
Интуиция: 3<br />
Выносливость: 5<br />
НР: 30</td>
	</tr>
	<tr>
		<td>1й (110)</td>
		<td>Сила: 10<br />
Ловкость: 6<br />
Интуиция: 6<br />
Выносливость: 10<br />
НР: 60</td>
		<td>Сила: 4<br />
Ловкость: 4<br />
Интуиция: 10<br />
Выносливость: 10<br />
НР: 60</td>
		<td>Сила: 4<br />
Ловкость: 10<br />
Интуиция: 10<br />
Выносливость: 10<br />
НР: 60</td>
		<td>Сила: 3<br />
Ловкость: 20<br />
Интуиция: 3<br />
Выносливость: 8<br />
НР: 48</td>
		<td>Сила: 10<br />
Ловкость: 6<br />
Интуиция: 6<br />
Выносливость: 10<br />
НР: 60</td>
		<td>Сила: 10<br />
Ловкость: 5<br />
Интуиция: 12<br />
Выносливость: 10<br />
НР: 60</td>
	</tr>
	<tr>
		<td>2й (440)</td>
		<td>Сила: 15<br />
Ловкость: 9<br />
Интуиция: 9<br />
Выносливость: 15<br />
НР: 90</td>
		<td>Сила: 6<br />
Ловкость: 7<br />
Интуиция: 15<br />
Выносливость: 15<br />
НР: 90</td>
		<td>Сила: 7<br />
Ловкость: 20<br />
Интуиция: 15<br />
Выносливость: 15<br />
НР: 90</td>
		<td>Сила: 3<br />
Ловкость: 40<br />
Интуиция: 3<br />
Выносливость: 12<br />
НР: 72</td>
		<td>Сила: 16<br />
Ловкость: 10<br />
Интуиция: 10<br />
Выносливость: 17<br />
НР: 102</td>
		<td>Сила: 15<br />
Ловкость: 7<br />
Интуиция: 18<br />
Выносливость: 15<br />
НР: 90</td>
	</tr>
	<tr>
		<td>3й (1300)</td>
		<td>Сила: 20<br />
Ловкость: 12<br />
Интуиция: 12<br />
Выносливость: 20<br />
НР: 120</td>
		<td>Сила: 10<br />
Ловкость: 30<br />
Интуиция: 20<br />
Выносливость: 20<br />
НР: 120</td>
		<td>Сила: 10<br />
Ловкость: 30<br />
Интуиция: 20<br />
Выносливость: 20<br />
НР: 120</td>
		<td>Сила: 3<br />
Ловкость: 60<br />
Интуиция: 3<br />
Выносливость: 16<br />
НР: 96</td>
		<td>Сила: 23<br />
Ловкость: 14<br />
Интуиция: 14<br />
Выносливость: 25<br />
НР: 150</td>
		<td>Сила: 20<br />
Ловкость: 10<br />
Интуиция: 24<br />
Выносливость: 20<br />
НР: 120</td>
	</tr>
	<tr>
		<td>4й (2500)</td>
		<td>Сила: 30<br />
Ловкость: 15<br />
Интуиция: 15<br />
Выносливость: 30<br />
НР: 180</td>
		<td>Сила: 12<br />
Ловкость: 15<br />
Интуиция: 30<br />
Выносливость: 30<br />
НР: 180</td>
		<td>Сила: 15<br />
Ловкость: 40<br />
Интуиция: 30<br />
Выносливость: 30<br />
НР: 180</td>
		<td>Сила: 3<br />
Ловкость: 80<br />
Интуиция: 3<br />
Выносливость: 24<br />
НР: 144</td>
		<td>Сила: 30<br />
Ловкость: 19<br />
Интуиция: 19<br />
Выносливость: 35<br />
НР: 210</td>
		<td>Сила: 25<br />
Ловкость: 13<br />
Интуиция: 32<br />
Выносливость: 30<br />
НР: 180</td>
	</tr>
	<tr>
		<td>5й (5000)</td>
		<td>Сила: 40<br />
Ловкость: 20<br />
Интуиция: 20<br />
Выносливость: 40<br />
НР: 240</td>
		<td>Сила: 15<br />
Ловкость: 20<br />
Интуиция: 40<br />
Выносливость: 40<br />
НР: 240</td>
		<td>Сила: 20<br />
Ловкость: 50<br />
Интуиция: 40<br />
Выносливость: 40<br />
НР: 240</td>
		<td>Сила: 3<br />
Ловкость: 100<br />
Интуиция: 3<br />
Выносливость: 32<br />
НР: 192</td>
		<td>Сила: 38<br />
Ловкость: 25<br />
Интуиция: 25<br />
Выносливость: 45<br />
НР: 270</td>
		<td>Сила: 32<br />
Ловкость: 17<br />
Интуиция: 40<br />
Выносливость: 40<br />
НР: 240</td>
	</tr>
	<tr>
		<td>6й (12500)</td>
		<td>Сила: 50<br />
Ловкость: 25<br />
Интуиция: 25<br />
Выносливость: 50<br />
НР: 300</td>
		<td>Сила: 25<br />
Ловкость: 25<br />
Интуиция: 60<br />
Выносливость: 50<br />
НР: 300</td>
		<td>Сила: 25<br />
Ловкость: 70<br />
Интуиция: 50<br />
Выносливость: 50<br />
НР: 300</td>
		<td>Сила: 3<br />
Ловкость: 140<br />
Интуиция: 3<br />
Выносливость: 40<br />
НР: 240</td>
		<td>Сила: 47<br />
Ловкость: 31<br />
Интуиция: 31<br />
Выносливость: 60<br />
НР: 360</td>
		<td>Сила: 39<br />
Ловкость: 21<br />
Интуиция: 50<br />
Выносливость: 60<br />
НР: 360</td>
	</tr>
	<tr>
		<td>7й (30000)</td>
		<td>Сила: 70<br />
Ловкость: 30<br />
Интуиция: 30<br />
Выносливость: 60<br />
НР: 360</td>
		<td>Сила: 25<br />
Ловкость: 30<br />
Интуиция: 80<br />
Выносливость: 60<br />
НР: 360</td>
		<td>Сила: 30<br />
Ловкость: 90<br />
Интуиция: 60<br />
Выносливость: 60<br />
НР: 360</td>
		<td>Сила: 3<br />
Ловкость: 180<br />
Интуиция: 3<br />
Выносливость: 48<br />
НР: 288</td>
		<td>Сила: 57<br />
Ловкость: 38<br />
Интуиция: 38<br />
Выносливость: 80<br />
НР: 480</td>
		<td>Сила: 47<br />
Ловкость: 25<br />
Интуиция: 60<br />
Выносливость: 80<br />
НР: 480</td>
	</tr>
	<tr>
		<td>8й (300000)</td>
		<td>Сила: 90<br />
Ловкость: 40<br />
Интуиция: 40<br />
Выносливость: 80<br />
НР: 480</td>
		<td>Сила: 32<br />
Ловкость: 40<br />
Интуиция: 110<br />
Выносливость: 80<br />
НР: 480</td>
		<td>Сила: 40<br />
Ловкость: 120<br />
Интуиция: 80<br />
Выносливость: 80<br />
НР: 480</td>
		<td>Сила: 3<br />
Ловкость: 240<br />
Интуиция: 3<br />
Выносливость: 64<br />
НР: 384</td>
		<td>Сила: 67<br />
Ловкость: 46<br />
Интуиция: 46<br />
Выносливость: 100<br />
НР: 600</td>
		<td>Сила: 55<br />
Ловкость: 30<br />
Интуиция: 70<br />
Выносливость: 100<br />
НР: 600</td>
	</tr>
	<tr>
		<td>9й (30000000)</td>
		<td>Сила: 110<br />
Ловкость: 50<br />
Интуиция: 50<br />
Выносливость: 100<br />
НР: 600</td>
		<td>Сила: 41<br />
Ловкость: 90<br />
Интуиция: 140<br />
Выносливость: 100<br />
НР: 600</td>
		<td>Сила: 50<br />
Ловкость: 150<br />
Интуиция: 100<br />
Выносливость: 100<br />
НР: 600</td>
		<td>Сила: 3<br />
Ловкость: 300<br />
Интуиция: 3<br />
Выносливость: 80<br />
НР: 480</td>
		<td>Сила: 80<br />
Ловкость: 56<br />
Интуиция: 56<br />
Выносливость: 125<br />
HP: 750</td>
		<td>Сила: 65<br />
Ловкость: 35<br />
Интуиция: 90<br />
Выносливость: 125<br />
HP: 750</td>
	</tr>
	<tr>
		<td>10й (10000000)</td>
		<td>Сила: 135<br />
Ловкость: 60<br />
Интуиция: 60<br />
Выносливость: 120<br />
НР: 720</td>
		<td>Сила: 51<br />
Ловкость: 60<br />
Интуиция: 170<br />
Выносливость: 120<br />
НР: 720</td>
		<td>Сила: 60<br />
Ловкость: 180<br />
Интуиция: 120<br />
Выносливость: 120<br />
НР: 720</td>
		<td>Сила: 3<br />
Ловкость: 300<br />
Интуиция: 3<br />
Выносливость: 96<br />
НР: 576</td>
		<td>Сила: 93<br />
Ловкость: 66<br />
Интуиция: 66<br />
Выносливость: 150<br />
HP: 900</td>
		<td>Сила: 75<br />
Ловкость: 40<br />
Интуиция: 110<br />
Выносливость: 150<br />
НР: 900</td>
	</tr>
</table>
</center>

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