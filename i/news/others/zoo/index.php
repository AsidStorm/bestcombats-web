<?
	session_start();
	include "../../connect.php";
	$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$_COOKIE['uid']."' LIMIT 1;"));
	include "../../functions.php";
	$Get_Page="all_zoo";

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="icon" href="/i/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/i/favicon.ico" type="image/x-icon"> 
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<title>������� � ������� Bkwar</title>
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
<TD><font color=white><?if(!empty($user['login'])){echo nick5_1($user['id']);}else{echo'�����';}?></font></TD></TR>
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
   <TD align=left background=/i/menu1at1.gif bgColor=#aa0000 style="padding-left:75px;"><A onmouseover="MM_swapImage('news','','/i/menu1at2.gif',1)" onclick=this.blur() onmouseout=MM_swapImgRestore() href="/"><IMG height=36 src="/i/menu1ps2.gif" width=47 border=0 name=news alt="�������"></A><A onmouseover="MM_swapImage('#','','/i/menu1at3.gif',1)" onclick=this.blur() onmouseout=MM_swapImgRestore() href="#"><IMG height=36 src="/i/menu1ps3.gif" width=42 border=0 name="history" alt="�������"></A><A onmouseover="MM_swapImage('status','','/i/menu1at4.gif',1)" onclick=this.blur() onmouseout=MM_swapImgRestore() href="/news/status/"><IMG height=36 src="/i/menu1ps4.gif" width=42 border=0 name="status" alt="��������� ��������"></A><A onmouseover="MM_swapImage('gallery','','/i/menu1at5.gif',1)" onclick=this.blur() onmouseout=MM_swapImgRestore() href="#"><IMG height=36 src="/i/menu1ps5.gif" width=42 border=0 name="gallery" alt="�������"></A><A onmouseover="MM_swapImage('vote','','/i/menu1at7.gif',1)" onclick=this.blur() onmouseout=MM_swapImgRestore() href="#"><IMG height=36 src="/i/menu1ps7.gif" width=41 border=0 name="vote" alt="�����������"></A><A onmouseover="MM_swapImage('inwork','','/i/menu1at8.gif',1)" onclick=this.blur() onmouseout=MM_swapImgRestore() href="#"><IMG height=36 src="/i/menu1ps8.gif" width=41 border=0 name="inwork" alt="� ����������"></A><A onmouseover="MM_swapImage('release','','/i/menu1at9.gif',1)" onclick=this.blur() onmouseout=MM_swapImgRestore() href="#"><IMG height=36 src="/i/menu1ps9.gif" width=48 border=0 name="release" alt="������� �������������"></A></TD>
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
                    <B>������� ������</B>
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
  <div style="padding: 0px 3px 5px 3px"><a href="http://bestcombats.net/news">������� ��������</a></div>
  
  <div style="padding: 0px 3px 5px 3px"><a href="http://bestcombats.net/forum.php">�����</a></div>
  
  <div style="padding: 0px 3px 5px 3px"><a href="http://bestcombats.net/scrolls">�������</a></div>
  
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
<!-- 2 ���� -->	
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
                   <B>����������:</B>
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

<!-- 3 ����) -->
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
                   <B>����������:</B>
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
 
<div class="page_title"><B>��������������</B></div>
<HR align=center width="90%" color=#aa0000 noShade SIZE=0.1><TABLE width=100% border="0">													  														  
</TD>
</tr>
<tr>
<td>

<br>
� �������� ��� � <b>���������� �����</b> ����� ��������� ������� ����� � �������� �������� ������ ���������. ���� �� ������ ������� ������ ������� - ��, � ��������, �� ������ ��������� ��� ������������ ������ � ����.<br />
<br />
����� �������� �����, ��� ���������� ��������. ������ ������� ��������� � <b>�����������</b>, ������������� �� <b>����������� �������</b>  <img src='http://img.bestcombats.net/i/sh/fo1.gif'><b>CapitalCity</br>
<center><img src="http://bestcombats.net/i/city/1_Steads.gif" border="0" alt="" style="vertical-align:text-bottom;"><br />

<center><b><h2>������ �������</h2></b><br /><br />
<table width='70%' border='0' cellspacing='0' cellpadding='0' class='summonTbl'>
	<tr>
		<th width='40%' align=left><b>�������� ���������</b></th>
		<th width='30%' align=left><b>��������� ������</b></th>
		<th width='30%' align=left><b>����� �������</b></th>
	</tr>
	<tr>
		<td><img src="http://img.combats.ru/i/items/summon_pet_demon.gif" border="0" alt="" style="vertical-align:text-bottom;"><br /><b>׸��</b></td>
		<td>50 ��</td>
		<td><b>�����</b></td>
	</tr>
	<tr>
		<td><img src="http://img.combats.ru/i/items/summon_pet_cat.gif" border="0" alt="" style="vertical-align:text-bottom;"><br /><b>���</b></td>
		<td>50 ��</td>
		<td>�����</td>
	</tr>
	<tr>
		<td><img src="http://img.combats.ru/i/items/summon_pet_owl.gif" border="0" alt="" style="vertical-align:text-bottom;"><br /><b>����</b></td>
		<td>50 ��</td>
		<td>�����</td>
	</tr>
	<tr>
		<td><img src="http://img.combats.ru/i/items/summon_pet_dog.gif" border="0" alt="" style="vertical-align:text-bottom;"><br /><b>ϸ�</b></td>
		<td>75 ��</td>
		<td>�����</td>
	</tr>
	<tr>
		<td><img src="http://img.combats.ru/i/items/summon_pet_pig.gif" border="0" alt="" style="vertical-align:text-bottom;"><br /><b>����</b></td>
		<td>75 ��</td>
		<td>�����</td>
	</tr>
	<tr>
		<td><img src="http://img.combats.ru/i/items/summon_pet_wisp.gif" border="0" alt="" style="vertical-align:text-bottom;"><br /><b>�������</b></td>
		<td>75 ��</td>
		<td><b>�����</b></td>
	</tr>
</table></center>
<br />
<br />
<br />
����� ���������� ������ �������, ����� ������ ��� ������������ . ��� ����� ������� � ���� ���������, ������ <b>��������</b>, ������� ������ � ������� �� ��� <b>������������</b>. �� ����������� ������������� � �������� <b>&quot;������������ ������?&quot;</b> ������ <b>&quot;��&quot;</b>. ����� ������������� �� ������� ������ � ��������� �����.<br />
���� � ��� ���� �����, �� � � ��������� ���������� ��������������� ������. ����� � ����, �� �������: �������������� ������ ���������, �������, ��������� ������ � ��������� ��� ������ ������� ���. ����� ��������� ������ ��������� �������, � ������� ��� ����� ������ ������ �� ������. <br />
� ������� ������ <b>������</b> �� ������ ���� ������ ����� ���. ��� ������ �������� �� ����� ��� �� 10 �������� � ������ �� ������ �����. ��� ������ ������������� ����� �� ������� �������: <b>&quot;��� ������ �� ��������&quot;</b>. <br />
<br />
<i><img src=http://img.bestcombats.net/i/align_1.99.gif><b>����� �����</b> �������������: ����������� ��� �������������� ������ �������� ������ �� ����� ������� ���������.</i><br />
<br />
<h3>�� ����� � ������� ������ ����� �� ������� �� ��������� ��������� � ����:</h3><br />
<table width="90%" border="0" align="center" cellpadding="0" cellspacing="0"><tr><td class="quoteheader">[������]</td></tr><tr><td class="quote link1"><i>01:23 ��������! [������ �����] ������ 1 ������!</i><br />
<i>01:25 ��������! [������ �����] ��������� � ���...</i></td></tr></table><br />
������ ��������� ������� � ���, ��� ��� ����� ������� � ��� ����� ��������� - ���� �������� �� �� ����� ����� � ��� � ��� � �� ��� �������. <br />
<br />
� ������� <b>�����</b> ���� ������ <b>�������</b>. � � �������, ��� �������������, �� ������ ���������� �� ������ �������. <br />
<br />
���� �� ������ �������� ���� ���� ������, �� ��� ���������� ����� ������� � ��������� �� 10 �������� � ������ - � ��� ���� ����������� ����� ��� �����.
<br />
<br />

<center><b><h2>��������� ��������</h2></b></center><br />


�������� ���������� ������������ �������. ���� ����� �� ������, �� ������� ������� ��������� �� ����, � �� �� ������ �������� ��� � ����. ��� ���� ������� �����, ��� ������ ��������� ��� �������. ��� ��, ��� ������� ���� ������ ���������� ���� ���. ������ � ����� ��� ��, ��� � ���� ������ �������, - � ������������.<br />

<h3>������������ ������� ������� ����� ����� 50. �� ������ ��� ����� ������ �������:</h3><br />
<ul>
<li align="left"> 1 - �� ��� � ����� ��������, �� ��� �� �� ��������� �����
<li align="left">5 - �� ��� � ����� �������� � � ���������� � ��� ������
<li align="left">���� �� ��������� � ��� �����, �� ������� � ��� 1/3 ����� �����, ���� ������� ����� - ���� ������
</ul>
�������, ����� �������� ����� ������ �� �� ������� - �� ��������.<br />
<br />
<h3>��������� ����� �� ������ ����� ������ <b>�����</b> ���������. ������ ������ ��� ����������:</h3><br />
<ul>
<li align="left">20 c������ - ���� ��� ������������� ���� �� ������, ��� � �����
<li align="left">16 c������ - ��� ������� � ���� ������� �� ������
<li align="left">12 c������ - ��� ������� � ��� ������� �� ������
<li align="left">8 c������ - ��� ������� � ��� ������� �� ������
</ul>
<br />
<center>
	<b>���� ��� ��������</b><br />
	<table class='petFoodTbl' border="1" width="500" align="center" valign="center" cellpadding="7" cellspacing="3">
		<tr>
			<th>�����</th>
			<th>0� �������</th>
			<th>2� �������</th>
			<th>3� �������</th>
			<th>4� �������</th>
			<th>6� �������</th>
			<th>8� �������</th>
			<th>10� �������</th>
		</tr>
		<tr>
			<td><img src="http://img.combats.ru/i/items/summon_pet_demon.gif" border="0" alt="" style="vertical-align:text-bottom;"><br /><b>׸��</b></td>
			<td><img src="http://img.bestcombats.net/i/sh/pepel.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_chrt20");' onMouseOut='onOut(event);'></td>
			<td align="center">-</td>
			<td><img src="http://img.bestcombats.net/i/sh/pet_food_chrt20_3.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_chrt20_3");' onMouseOut='onOut(event);'></td>
			<td align="center">-</td>
			<td><img src="http://img.bestcombats.net/i/sh/pet_food_chrt20_6.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_chrt20_6");' onMouseOut='onOut(event);'></td>
			<td><img src="http://img.bestcombats.net/i/sh/pet_food_chrt20_8.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_chrt20_8");' onMouseOut='onOut(event);'></td>
			<td><img src="http://img.bestcombats.net/i/sh/pet_food_chrt20_10.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_chrt20_10");' onMouseOut='onOut(event);'></td>
		</tr>
		<tr>
			<td><img src="http://img.combats.ru/i/items/summon_pet_cat.gif" border="0" alt="" style="vertical-align:text-bottom;"><br /><b>���</b></th>
			<td><img src="http://img.bestcombats.net/i/sh/poxlebka.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_cat20");' onMouseOut='onOut(event);'></td>
			<td><img src="http://img.bestcombats.net/i/sh/pet_food_cat20_2.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_cat20_2");' onMouseOut='onOut(event);'></td>
			<td align="center">-</td>
			<td><img src="http://img.bestcombats.net/i/sh/pet_food_cat20_4.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_cat20_4");' onMouseOut='onOut(event);'><br /><img src="http://img.bestcombats.net/i/sh/pet_food_owl20_4.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_owl20_4");' onMouseOut='onOut(event);'></td>
			<td><img src="http://img.bestcombats.net/i/sh/pet_food_cat20_6.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_cat20_6");' onMouseOut='onOut(event);'></td>
			<td><img src="http://img.bestcombats.net/i/sh/pet_food_cat20_8.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_cat20_8");' onMouseOut='onOut(event);'><br /><img src="http://img.bestcombats.net/i/sh/pet_food_owl20_8.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_owl20_8");' onMouseOut='onOut(event);'></td>
			<td><img src="http://img.bestcombats.net/i/sh/pet_food_cat20_10.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_cat20_10");' onMouseOut='onOut(event);'></td>
		</tr>
		<tr>
			<td><img src="http://img.combats.ru/i/items/summon_pet_owl.gif" border="0" alt="" style="vertical-align:text-bottom;"><br /><b>����</b></th>
			<td><img src="http://img.bestcombats.net/i/sh/nasek.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_owl20");' onMouseOut='onOut(event);'></td>
			<td><img src="http://img.bestcombats.net/i/sh/pet_food_cat20_2.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_cat20_2");' onMouseOut='onOut(event);'></td>
			<td align="center">-</td>
			<td><img src="http://img.bestcombats.net/i/sh/pet_food_owl20_4.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_owl20_4");' onMouseOut='onOut(event);'></td>
			<td><img src="http://img.bestcombats.net/i/sh/pet_food_owl20_6.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_owl20_6");' onMouseOut='onOut(event);'></td>
			<td><img src="http://img.bestcombats.net/i/sh/pet_food_owl20_8.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_owl20_8");' onMouseOut='onOut(event);'></td>
			<td><img src="http://img.bestcombats.net/i/sh/pet_food_cat20_10.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_cat20_10");' onMouseOut='onOut(event);'></td>
		</tr>
		<tr>
			<td><img src="http://img.combats.ru/i/items/summon_pet_dog.gif" border="0" alt="" style="vertical-align:text-bottom;"><br /><b>������</b></th>
			<td><img src="http://img.bestcombats.net/i/sh/pet_food_dog20.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_dog20");' onMouseOut='onOut(event);'></td>
			<td><img src="http://img.bestcombats.net/i/sh/pet_food_dog20_2.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_dog20_2");' onMouseOut='onOut(event);'></td>
			<td align="center">-</td>
			<td><img src="http://img.bestcombats.net/i/sh/pet_food_cat20_4.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_cat20_4");' onMouseOut='onOut(event);'></td>
			<td><img src="http://img.bestcombats.net/i/sh/pet_food_cat20_6.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_cat20_6");' onMouseOut='onOut(event);'></td>
			<td><img src="http://img.bestcombats.net/i/sh/pet_food_cat20_8.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_cat20_8");' onMouseOut='onOut(event);'></td>
			<td><img src="http://img.bestcombats.net/i/sh/pet_food_dog20_10.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_dog20_10");' onMouseOut='onOut(event);'></td>
		</tr>
		<tr>
			<td><img src="http://img.combats.ru/i/items/summon_pet_pig.gif" border="0" alt="" style="vertical-align:text-bottom;"><br /><b>����</b></th>
			<td><img src="http://img.bestcombats.net/i/sh/pet_food_pig20_10.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_pig20");' onMouseOut='onOut(event);'></td>
			<td><img src="http://img.bestcombats.net/i/sh/pet_food_pig20_2.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_pig20_2");' onMouseOut='onOut(event);'></td>
			<td align="center">-</td>
			<td><img src="http://img.bestcombats.net/i/sh/pet_food_pig20_4.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_pig20_4");' onMouseOut='onOut(event);'></td>
			<td align="center">-</td>
			<td><img src="http://img.bestcombats.net/i/sh/pet_food_pig20_8.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_pig20_8");' onMouseOut='onOut(event);'></td>
			<td><img src="http://img.bestcombats.net/i/sh/pet_food_pig20_10.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_pig20_10");' onMouseOut='onOut(event);'></td>
		</tr>
		<tr>
			<td><img src="http://img.combats.ru/i/items/summon_pet_wisp.gif" border="0" alt="" style="vertical-align:text-bottom;"><br /><b>�������</b></th>
			<td><img src="http://img.bestcombats.net/i/sh/pet_food_wisp20.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_wisp20");' onMouseOut='onOut(event);'></td>
			<td align="center">-</td>
			<td><img src="http://img.bestcombats.net/i/sh/pet_food_wisp20_2.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_wisp20_2");' onMouseOut='onOut(event);'></td>
			<td align="center">-</td>
			<td><img src="http://img.bestcombats.net/i/sh/pet_food_wisp20_4.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_wisp20_4");' onMouseOut='onOut(event);'></td>
			<td><img src="http://img.bestcombats.net/i/sh/pet_food_wisp20_6.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_wisp20_6");' onMouseOut='onOut(event);'></td>
			<td><img src="http://img.bestcombats.net/i/sh/pet_food_wisp20_8.gif" border="0" alt="" style="vertical-align:text-bottom;" onMouseOver='onOver(event, "pet_food_wisp20_8");' onMouseOut='onOut(event);'></td>
		</tr>
	</table>
</center>
<br />

<br /><center><b>������ �� ������</b></center><br /><br />
���� ��� ����� ��������� � ���, �� � ������ ��� �� ���� ��� �����, ��������� �� ��� ���� � ������. �������� ����� ������� �� ���. ��� ��, �� ������ ��������� ����� � ���� ��� - � ���� ������ �� ����� ��������� �� ����� ������� �, ��� �������� ������ ���, ������� ����. ����� �������� ����� ������ �����, �� �� ������ ����� �����. ��������� ����� � ���, ��� �� ������� ���� ����� - ����������, �� ����� ������ �� �������. ����� �� ����� ���� ������ ��� ������� - ��� ������ �� ������������ � ����, �� �������� �������� ���� (�� � �������� � ���� - ����). ����������� ����� �������� ����� - � ��� �������, ��� �� ��� ��������� ����.<br />
<br />

<img src="http://img.combats.ru/i/items/summon_pet_demon.gif" border="0" alt="" style="vertical-align:text-bottom;"><b>����</b> - ��� � ��� +� ����, ��� � - ��� �������<br />
<img src="http://img.combats.ru/i/items/summon_pet_cat.gif" border="0" alt="" style="vertical-align:text-bottom;"><b>���</b> - ��� � ��� +� ��������, ��� � - ��� �������<br />
<img src="http://img.combats.ru/i/items/summon_pet_owl.gif" border="0" alt="" style="vertical-align:text-bottom;"><b>����</b> - ��� � ��� +� ��������, ��� � - ��� �������<br />
<img src="http://img.combats.ru/i/items/summon_pet_dog.gif" border="0" alt="" style="vertical-align:text-bottom;"><b>���</b> - ��� � ��� +�*6 ��, ��� � - ��� �������<br />
<img src="http://img.combats.ru/i/items/summon_pet_pig.gif" border="0" alt="" style="vertical-align:text-bottom;"><b>����</b> - ��� � ��� +�*2 �����, ��� � - ��� �������<br />
<img src="http://img.combats.ru/i/items/summon_pet_wisp.gif" border="0" alt="" style="vertical-align:text-bottom;"><b>�������</b> - ��� � ��� +�% �������� ����� ������, ��� � - ��� �������<br />
<br />
<br /><center><b>�������������� ������</b><br /><br />
<br />
<table border="1" width="500" align="center" cellpadding="20" cellspacing="5">
	<tr>
		<th width='60px'>������� (����)</th>
		<th width='120px'>׸��</th>
		<th width='120px'>����</th>
		<th width='120px'>���</th>
		<th width='120px'>�������</th>
		<th width='120px'>������</th>
		<th width='120px'>����</th>
	</tr>
	<tr>
		<td align="center">0�<br /></td>
		<td>����: 5<br />
��������: 3<br />
��������: 3<br />
������������: 5<br />
��: 30</td>
		<td>����: 2<br />
��������: 2<br />
��������: 5<br />
������������: 5<br />
��: 30</td>
		<td>����: 2<br />
��������: 5<br />
��������: 5<br />
������������: 5<br />
��: 30</td>
		<td>����: 3<br />
��������: 10<br />
��������: 3<br />
������������: 4<br />
��: 24</td>
		<td>����: 5<br />
��������: 3<br />
��������: 3<br />
������������: 3<br />
��: 30</td>
		<td>����: 5<br />
��������: 3<br />
��������: 3<br />
������������: 5<br />
��: 30</td>
	</tr>
	<tr>
		<td>1� (110)</td>
		<td>����: 10<br />
��������: 6<br />
��������: 6<br />
������������: 10<br />
��: 60</td>
		<td>����: 4<br />
��������: 4<br />
��������: 10<br />
������������: 10<br />
��: 60</td>
		<td>����: 4<br />
��������: 10<br />
��������: 10<br />
������������: 10<br />
��: 60</td>
		<td>����: 3<br />
��������: 20<br />
��������: 3<br />
������������: 8<br />
��: 48</td>
		<td>����: 10<br />
��������: 6<br />
��������: 6<br />
������������: 10<br />
��: 60</td>
		<td>����: 10<br />
��������: 5<br />
��������: 12<br />
������������: 10<br />
��: 60</td>
	</tr>
	<tr>
		<td>2� (440)</td>
		<td>����: 15<br />
��������: 9<br />
��������: 9<br />
������������: 15<br />
��: 90</td>
		<td>����: 6<br />
��������: 7<br />
��������: 15<br />
������������: 15<br />
��: 90</td>
		<td>����: 7<br />
��������: 20<br />
��������: 15<br />
������������: 15<br />
��: 90</td>
		<td>����: 3<br />
��������: 40<br />
��������: 3<br />
������������: 12<br />
��: 72</td>
		<td>����: 16<br />
��������: 10<br />
��������: 10<br />
������������: 17<br />
��: 102</td>
		<td>����: 15<br />
��������: 7<br />
��������: 18<br />
������������: 15<br />
��: 90</td>
	</tr>
	<tr>
		<td>3� (1300)</td>
		<td>����: 20<br />
��������: 12<br />
��������: 12<br />
������������: 20<br />
��: 120</td>
		<td>����: 10<br />
��������: 30<br />
��������: 20<br />
������������: 20<br />
��: 120</td>
		<td>����: 10<br />
��������: 30<br />
��������: 20<br />
������������: 20<br />
��: 120</td>
		<td>����: 3<br />
��������: 60<br />
��������: 3<br />
������������: 16<br />
��: 96</td>
		<td>����: 23<br />
��������: 14<br />
��������: 14<br />
������������: 25<br />
��: 150</td>
		<td>����: 20<br />
��������: 10<br />
��������: 24<br />
������������: 20<br />
��: 120</td>
	</tr>
	<tr>
		<td>4� (2500)</td>
		<td>����: 30<br />
��������: 15<br />
��������: 15<br />
������������: 30<br />
��: 180</td>
		<td>����: 12<br />
��������: 15<br />
��������: 30<br />
������������: 30<br />
��: 180</td>
		<td>����: 15<br />
��������: 40<br />
��������: 30<br />
������������: 30<br />
��: 180</td>
		<td>����: 3<br />
��������: 80<br />
��������: 3<br />
������������: 24<br />
��: 144</td>
		<td>����: 30<br />
��������: 19<br />
��������: 19<br />
������������: 35<br />
��: 210</td>
		<td>����: 25<br />
��������: 13<br />
��������: 32<br />
������������: 30<br />
��: 180</td>
	</tr>
	<tr>
		<td>5� (5000)</td>
		<td>����: 40<br />
��������: 20<br />
��������: 20<br />
������������: 40<br />
��: 240</td>
		<td>����: 15<br />
��������: 20<br />
��������: 40<br />
������������: 40<br />
��: 240</td>
		<td>����: 20<br />
��������: 50<br />
��������: 40<br />
������������: 40<br />
��: 240</td>
		<td>����: 3<br />
��������: 100<br />
��������: 3<br />
������������: 32<br />
��: 192</td>
		<td>����: 38<br />
��������: 25<br />
��������: 25<br />
������������: 45<br />
��: 270</td>
		<td>����: 32<br />
��������: 17<br />
��������: 40<br />
������������: 40<br />
��: 240</td>
	</tr>
	<tr>
		<td>6� (12500)</td>
		<td>����: 50<br />
��������: 25<br />
��������: 25<br />
������������: 50<br />
��: 300</td>
		<td>����: 25<br />
��������: 25<br />
��������: 60<br />
������������: 50<br />
��: 300</td>
		<td>����: 25<br />
��������: 70<br />
��������: 50<br />
������������: 50<br />
��: 300</td>
		<td>����: 3<br />
��������: 140<br />
��������: 3<br />
������������: 40<br />
��: 240</td>
		<td>����: 47<br />
��������: 31<br />
��������: 31<br />
������������: 60<br />
��: 360</td>
		<td>����: 39<br />
��������: 21<br />
��������: 50<br />
������������: 60<br />
��: 360</td>
	</tr>
	<tr>
		<td>7� (30000)</td>
		<td>����: 70<br />
��������: 30<br />
��������: 30<br />
������������: 60<br />
��: 360</td>
		<td>����: 25<br />
��������: 30<br />
��������: 80<br />
������������: 60<br />
��: 360</td>
		<td>����: 30<br />
��������: 90<br />
��������: 60<br />
������������: 60<br />
��: 360</td>
		<td>����: 3<br />
��������: 180<br />
��������: 3<br />
������������: 48<br />
��: 288</td>
		<td>����: 57<br />
��������: 38<br />
��������: 38<br />
������������: 80<br />
��: 480</td>
		<td>����: 47<br />
��������: 25<br />
��������: 60<br />
������������: 80<br />
��: 480</td>
	</tr>
	<tr>
		<td>8� (300000)</td>
		<td>����: 90<br />
��������: 40<br />
��������: 40<br />
������������: 80<br />
��: 480</td>
		<td>����: 32<br />
��������: 40<br />
��������: 110<br />
������������: 80<br />
��: 480</td>
		<td>����: 40<br />
��������: 120<br />
��������: 80<br />
������������: 80<br />
��: 480</td>
		<td>����: 3<br />
��������: 240<br />
��������: 3<br />
������������: 64<br />
��: 384</td>
		<td>����: 67<br />
��������: 46<br />
��������: 46<br />
������������: 100<br />
��: 600</td>
		<td>����: 55<br />
��������: 30<br />
��������: 70<br />
������������: 100<br />
��: 600</td>
	</tr>
	<tr>
		<td>9� (30000000)</td>
		<td>����: 110<br />
��������: 50<br />
��������: 50<br />
������������: 100<br />
��: 600</td>
		<td>����: 41<br />
��������: 90<br />
��������: 140<br />
������������: 100<br />
��: 600</td>
		<td>����: 50<br />
��������: 150<br />
��������: 100<br />
������������: 100<br />
��: 600</td>
		<td>����: 3<br />
��������: 300<br />
��������: 3<br />
������������: 80<br />
��: 480</td>
		<td>����: 80<br />
��������: 56<br />
��������: 56<br />
������������: 125<br />
HP: 750</td>
		<td>����: 65<br />
��������: 35<br />
��������: 90<br />
������������: 125<br />
HP: 750</td>
	</tr>
	<tr>
		<td>10� (10000000)</td>
		<td>����: 135<br />
��������: 60<br />
��������: 60<br />
������������: 120<br />
��: 720</td>
		<td>����: 51<br />
��������: 60<br />
��������: 170<br />
������������: 120<br />
��: 720</td>
		<td>����: 60<br />
��������: 180<br />
��������: 120<br />
������������: 120<br />
��: 720</td>
		<td>����: 3<br />
��������: 300<br />
��������: 3<br />
������������: 96<br />
��: 576</td>
		<td>����: 93<br />
��������: 66<br />
��������: 66<br />
������������: 150<br />
HP: 900</td>
		<td>����: 75<br />
��������: 40<br />
��������: 110<br />
������������: 150<br />
��: 900</td>
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