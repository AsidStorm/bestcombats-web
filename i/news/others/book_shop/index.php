<?
	session_start();
	include "../../connect.php";
	$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$_COOKIE['uid']."' LIMIT 1;"));
	include "../../functions.php";
	$Get_Page="all_bookshop";

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
  <<div style="padding: 0px 3px 5px 3px"><a href="http://bestcombats.net/news">������� ��������</a></div>
  
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
 
<div class="page_title"><B>������� �������</B></div>
<HR align=center width="90%" color=#aa0000 noShade SIZE=0.1><TABLE width=100% border="0">													  														  
<TABLE class=BL>
<TR><TD>
        ����� �� ����������� ������� <SPAN title="Capital"><IMG src="http://img.bestcombats.net/i/sh/fo1.gif" width=17 height=16 border=0></SPAN><B>�������</B>, �� ������� "����� �����", � �������� ����� ��������� ���������� ������������ �� ������ ������ � <B>���������� �����</B> <B>������� �������</B>:<br />
<br />
<DIV style="text-align: center;"><IMG SRC="http://bestcombats.net/i/city/4_bkm.gif" border=0></DIV><br />
<br />
��� �� ��������, ��� �������� ��� � �������� �� ��������� � ���������, � ��, ��� �����, ��������� � ������ ������ ������, ����� ����� �������, ������, ������������.<br />
<br />
������� �������, ������������ � �����, ���� ����� <b>������</b>. ����� ����� �������� ����������� ������ "��������� ���������".<br />
<br />
��� ����� ����������� �� ����� ���������� <IMG SRC="http://img.combats.com/i/destiny.gif" border=0><B>����� �������</B>, � ����� ������ �� ������ �� ������������.<br />
<br />
����� ����� � ����������� ��, ���� ���������� � �������� ������, ������ ������������ ��� ������, ������� �������� ����� ������ �����. (�����, ����� �� ����� � ������, �����������, �������� �������� �� ���������)<br />
<br />
�������� ��������, �� ��������� ����������� ������������ � ��� �����-���� ����� �����.<br />
<br />
��������� ����, �����, � ��� �� ������������ ���������� � ���������� �������� ������� � �������� ������ ������.<br />
<br />
<div style="margin:0; margin-top:8px"><div style="margin-bottom:4px"><input type="button" value="������ ������" onClick="if (this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display != '') { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = ''; this.innerText = ''; this.value = '������'; } else { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = 'none'; this.innerText = ''; this.value = '������ ������'; }"></div><div ><div style="display: none;"><br />
<br />
<TABLE class=BL>
<TABLE class="ST" cellspacing="1">
<tr>
    <TH><DIV style="text-align: left;"><B>�����</B></DIV></TD>
    <TH><DIV style="text-align: center;"><B>�������� �����</B></DIV></TD>
    <TH><DIV style="text-align: center;"><B>�����, ���������� � ���������� <br />
�������� �����</B></DIV></TD>
</tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/booklearn_1.gif" border=0></td>
    <td> <B>�������� ����� (�����)</B>   (�����: 1)<br />
<b>����: 22.5 ��. </b><br />
�������������: 0/1 <br />
<B>��������� �����������:</B> <br />
� ��������: 25 <br />
� �������: 6 <br />
<small>��������: <br />
� ���������� �������� ������������ ���� ��������� ������� ������ ����������� ������</small> <br />
������� ������: <b>�������� �����</b><br />
<small><font color=brown>������� �� �������� �������</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/krit_blooddrink.gif" border=0><br />
<B>�������� ����� </B><br />
<IMG SRC="http://img.combats.ru/i/misc/micro/krit.gif" border=0> 7, <IMG SRC="http://img.combats.ru/i/misc/micro/block.gif" border=0> 3. <br />
���� ����: 2<br />
<br />
<b>����������� ����������: </b><br />
� �������: 6<br />
<br />
��������� ����������� ����, � ����� 2 ����� ����� ����, ����� ��� ������ ����������� �����. <br />
������� ��o�� ������� ��� ����.<br />
<br />
<DIV><A href="javascript: void(0);" onClick="if (hidtext1001.style.display == '') { this.innerText = '�������� ������ �� ��������'; hidtext1001.style.display = 'none'; } else { this.innerText = '������'; hidtext1001.style.display = ''; }">�������� ������ �� ��������</A></DIV><DIV id='hidtext1001' style='display: none;'>��������������� �� ��������� � ����������� �� ������ ����������: <br />
8 ������� - �� ����� 107 �� <br />
9 ������� - �� ����� 128 ��<br />
10 ������� - �� ����� 154 ��<br />
11 ��o�e�� - �e �o�ee 185 Hp <br />
<br />
������� ����: <br />
� 7 ������ - +10  ���� <br />
� 8 ������ - +13  ���� <br />
� 9 ������ - +14  ����<br />
c 11 ������ - +17 c���<br />
</DIV> <br />
 </td>
  </tr>
<tr></tr>
<tr>
    <td> <IMG SRC="http://img.combats.ru/i/misc/icons/booklearn_8.gif" border=0> </td>
    <td> <B>����� ����� (�����)</B>   (�����: 1) <br />
<b>����: 20 ��. </b><br />
�������������: 0/1 <br />
<B>��������� �����������:</B> <br />
� ��������: 25 <br />
� �������: 7 <br />
��������: 1 ��. <br />
<small>��������: <br />
����� ������������, ��� ����� ������� ������ �����. </small><br />
������� ������: <b>����� �����</b> <br />
<small><font color=brown>������� �� �������� �������</font></small><br />
 </td>
    <td> <IMG SRC="http://img.combats.ru/i/misc/icons/krit_bloodlust.gif" border=0><br />
<B>����� �����</B> 	<br />
<IMG SRC="http://img.combats.ru/i/misc/micro/hit.gif" border=0> 2, <IMG SRC="http://img.combats.ru/i/misc/micro/krit.gif" border=0> 3 <br />
<br />
<b>����������� ����������: </b><br />
� �������: 7<br />
<br />
����������� ��� ��. ������������ ����� �� 50 � ��. �������� ����� �� 5 �� ����� ���. <br />
��������� ����� ������ �� ���.<br />
<br />
<TABLE class=QUOTE><TR><TD><SMALL>���, �������� ����� ������ ������, �� ��������� ��� <br />
��������� ����� "����� �����".. (��. �������� ����� (%): +5, ��. ������������ ����� (%): +50( +100;+150)</SMALL></TD></TR></TABLE>
 </td>
  </tr>
<tr></tr>
<tr>
    <td> <IMG SRC="http://img.combats.ru/i/misc/icons/booklearn_5.gif" border=0>  </td>
    <td> <B>������������ (�����)</B>   (�����: 1) <br />
<b>����: 20 ��.</b> <br />
�������������: 0/1 <br />
<B>��������� �����������:</B> <br />
� �������: 7 <br />
� ��������: 30 <br />
� ������������: 20 <br />
<small>��������: <br />
� ���������� ��������������, ��� ����� � ������� ��������� ����� ��������� ���� �� ����� ������.</small> <br />
������� ������: <b>������������</b> <br />
<small><font color=brown>������� �� �������� �������</font></small><br />
</td>
    <td> <IMG SRC="http://img.combats.ru/i/misc/icons/counter_ward.gif" border=0><br />
<B>������������</B> <br />
<IMG SRC="http://img.combats.ru/i/misc/micro/counter.gif" border=0> 2 <br />
��������: 10<br />
<br />
<b>����������� ����������:</b><br />
� �������: 7 <br />
� ��������: 30 <br />
� ������������: 20  <br />
<br />
��������� ���� �� ����� ������ ����� �� ��� ����.<br />
������������ ���� ����� 1 ��� � 3 ����.<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td> <IMG SRC="http://img.combats.ru/i/misc/icons/booklearn_4.gif" border=0> </td>
    <td> <B>������ (�����)</B>   (�����: 1) <br />
<b>����: 27 ��.</b> <br />
�������������: 0/1 <br />
<B>��������� �����������:</B> <br />
� �������: 7 <br />
� ������������: 30 <br />
<small>��������: <br />
� ���������� ��������������, ��� �������� ��������� ��������� �������. </small><br />
������� ������: <b>������ </b><br />
<small><font color=brown>������� �� �������� �������</font></small><br />
</td>
    <td> <IMG SRC="http://img.combats.ru/i/misc/icons/spirit_survive.gif" border=0><br />
<B>������</B> <br />
���� ����: 10<br />
<br />
<b>����������� ����������:</b><br />
� �������: 7 <br />
� ������������: 30 <br />
<br />
�������� ���, ��������� ��� ��������� ���� �������.<br />
������������ ����� ����� 1 ��� �� ���. ����� ������������� ��� ������� ���������. <br />
���� ��������������� �� ����� 25% ��. 1 ���� - 1% ��, <IMG SRC="http://img.combats.ru/i/misc/micro/hp.gif" border=0>1 - 0.5% ��<br />
 </td>
  </tr>
<tr></tr>
<tr>
    <td> <IMG SRC="http://img.combats.ru/i/misc/icons/booklearn_3.gif" border=0> </td>
    <td> <B>�������� (�����)</B>   (�����: 1) <br />
<b>����: 35 ��.</b> <br />
�������������: 0/1 <br />
<B>��������� �����������:</B> <br />
� �������: 7 <br />
� ������������: 25 <br />
� ����: 25 <br />
��������: 1 ��.<br />
<small>��������: <br />
� ���������� ��������������, ��� �������� ������� �������. </small><br />
������� ������: <b>��������</b> <br />
<small><font color=brown>������� �� �������� �������</font></small><br />
</td>
    <td> <IMG SRC="http://img.combats.ru/i/misc/icons/multi_rollback.gif" border=0><br />
<B>��������</B><br />
<IMG SRC="http://img.combats.ru/i/misc/micro/hit.gif" border=0> 2,  <IMG SRC="http://img.combats.ru/i/misc/micro/block.gif" border=0> 2. <br />
<br />
<b>����������� ����������:</b><br />
� �������: 7 <br />
� ����: 25 <br />
� ������������: 25 <br />
 <br />
�������� ��������� ���������� ����������� ��� �������.<br />
������������ ����� ����� 1 ��� �� ���.<br />
 </td>
  </tr>
<tr></tr>
<tr>
    <td> <IMG SRC="http://img.combats.ru/i/misc/icons/booklearn_9.gif" border=0> </td>
    <td> <B>������� ������ (�����)</B>   (�����: 1) <br />
<b>����: 20 ��. </b><br />
�������������: 0/1 <br />
<B>��������� �����������:</B> <br />
� ��������: 25 <br />
� �������: 7 <br />
��������: 1 ��. <br />
<small>��������: <br />
����� � ����������� ����� � �����. </small><br />
������� ������: <b>������� ������ </b><br />
<small><font color=brown>������� �� �������� �������</font></small><br />
</td>
    <td> <IMG SRC="http://img.combats.ru/i/misc/icons/counter_deathwalk.gif" border=0><br />
<B>������� ������</B> <br />
<IMG SRC="http://img.combats.ru/i/misc/micro/counter.gif" border=0> 5 <br />
<br />
<b>����������� ����������:</b><br />
� �������: 7 <br />
<br />
����������� ������������ ���� ������� �� "1*�������". <br />
������ �������� ���� ����������� ������������ ��������� ���������� ���� �� "1 ���������� �� �������" ��., �� "10 �������� �� �������" � ��������� ����� �����. <br />
�����  ������ � ������� ������ ����.<br />
 </td>
  </tr>
<tr></tr>
<tr>
    <td> <IMG SRC="http://img.combats.ru/i/misc/icons/booklearn_2.gif" border=0> </td>
    <td> <B>������������� (�����)</B>   (�����: 1) <br />
<b>����: 15 ��. </b><br />
�������������: 0/1 <br />
<B>��������� �����������:</B> <br />
� ��������: 25 <br />
� �������: 7 <br />
<small>��������: <br />
����p����� �������� ��� ������������ �� �������� ������� ����� �������� ����������� </small><br />
������� ������: <b>������������� </b><br />
<small><font color=brown>������� �� �������� �������</font></small><br />
</td>
    <td> <IMG SRC="http://img.combats.ru/i/misc/icons/parry_supreme.gif" border=0><br />
<B>������������� </B><br />
<IMG SRC="http://img.combats.ru/i/misc/micro/parry.gif" border=0> 3, <IMG SRC="http://img.combats.ru/i/misc/micro/block.gif" border=0> 1 <br />
<br />
<b>����������� ����������:</b><br />
� �������: 7 <br />
<br />
�������� �������� � ���������� �� ����� ���.<br />
����� ��������� ������ �� ���<br />
<br />
<DIV><A href="javascript: void(0);" onClick="if (hidtext1002.style.display == '') { this.innerText = '�������� ������ �� ��������'; hidtext1002.style.display = 'none'; } else { this.innerText = '������'; hidtext1002.style.display = ''; }">�������� ������ �� ��������</A></DIV><DIV id='hidtext1002' style='display: none;'><br />
<B>���</B>, �e��� c�a�� �e�oe�, ��o�e�a ���e� "<B>��e�oc�o�c��o</B>". (��. ��o��� ������ec�o�o ��a�a (%): +25, ��. ��o��� ��e����a��� (%): +25)<br />
</DIV> </td>
  </tr>
<tr></tr>
<tr>
    <td> <IMG SRC="http://img.combats.ru/i/misc/icons/booklearn_7.gif" border=0> </td>
    <td> <B>��������� ����� (�����)</B>   (�����: 1) <br />
<b>����: 20 ��. </b><br />
�������������: 0/1 <br />
<B>��������� �����������:</B> <br />
� �������: 7 <br />
� ����: 25 <br />
��������: 1 ��. <br />
<small>��������: <br />
� ���������� ��������������, �� ���������� ���� ������ �� �������� �����. </small><br />
������� ������: <b>��������� �����</b> <br />
<small><font color=brown>������� �� �������� �������</font></small><br />
</td>
    <td> <IMG SRC="http://img.combats.ru/i/misc/icons/hit_empower.gif" border=0><br />
<B>��������� �����</B> <br />
<IMG SRC="http://img.combats.ru/i/misc/micro/hit.gif" border=0> 3 <br />
<br />
<b>����������� ����������:</b><br />
� �������: 7 <br />
 <br />
��� ����� � ��������� ������� ������� �� "5 ����������� �� ������� ����������" ������ ����� ������. <br />
</td>
  </tr>
<tr></tr>
<tr>
    <td> <IMG SRC="http://img.combats.ru/i/misc/icons/booklearn_6.gif" border=0> </td>
    <td> <B>���������� ������ (�����)</B>   (�����: 1) <br />
<b>����: 20 ��. </b><br />
�������������: 0/1 <br />
<B>��������� �����������:</B> <br />
� �������: 7 <br />
� ������������: 25 <br />
��������: 1 ��. <br />
<small>��������: <br />
� ���������� ��������������, ��� ��������� ������� ����� ��������� ���� �� ����� ������. </small><br />
������� ������: <b>���������� ������ </b><br />
<small><font color=brown>������� �� �������� �������</font></small><br />
</td>
    <td> <IMG SRC="http://img.combats.ru/i/misc/icons/block_magicshield.gif" border=0><br />
<B>���������� ������ </B><br />
<IMG SRC="http://img.combats.ru/i/misc/micro/block.gif" border=0> 3 <br />
 <br />
<b>����������� ����������:</b><br />
� �������: 7 <br />
<br />
��������� �������� ��� �a���ec��� ��a� ������� ��� �� ����� 1 �����������, ������ ��������� �� ����� ���� �����.<br />
 </td>
  </tr>
<tr></tr>
<tr>
    <td> <IMG SRC="http://img.combats.ru/i/misc/icons/booklearn_10.gif" border=0> </td>
    <td> <B>��������� (�����)</B>   (�����: 1) <br />
<b>����: 20 ��. </b><br />
�������������: 0/1 <br />
<B>��������� �����������:</B> <br />
� �������: 7 <br />
� ������������: 25 <br />
��������: 1 ��. <br />
<small>��������: <br />
� ���������� ��������������, ��� ��������� �����, ���������� ���� ������. </small><br />
������� ������: <b>��������� </b><br />
<small><font color=brown>������� �� �������� �������</font></small><br />
</td>
    <td> <IMG SRC="http://img.combats.ru/i/misc/icons/block_revenge.gif" border=0><br />
<B>��������� </B><br />
<IMG SRC="http://img.combats.ru/i/misc/micro/block.gif" border=0> 5 <br />
<br />
<b>����������� ����������:</b><br />
� �������: 7 <br />
<br />
���������, ������� ����� ���� ������� "6 �������� �� *��� �������*" ������ �����<br />
</td>
  </tr>
</TABLE>
</div></div></div><br />
<br />
<div style="margin:0; margin-top:8px"><div style="margin-bottom:4px"><input type="button" value="����������" onClick="if (this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display != '') { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = ''; this.innerText = ''; this.value = '������'; } else { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = 'none'; this.innerText = ''; this.value = '����������'; }"></div><div ><div style="display: none;"><br />
<br />
<TABLE class=BL>
<TABLE class="ST" cellspacing="1">
<tr>
    <TH><DIV style="text-align: left;"><B>�����</B></DIV></TD>
    <TH><DIV style="text-align: center;"><B>�������� �����</B></DIV></TD>
    <TH><DIV style="text-align: center;"><B>�����, ���������� � ���������� <br />
�������� �����</B></DIV></TD>
</tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/zashita sveta.gif" border=0></td>
    <td><B> ������ ����� (����������)</B>   (�����: 1) <br />
<b>����: 20 ��. </b><br />
�������������: 0/1 <br />
<B>��������� �����������:</B> <br />
� ���������: 25 <br />
� �������: 7 <br />
� ���������� �������� ������ �����: 4 <br />
��������: 1 ��. <br />
<small>��������: <br />
��� �������� ���� �� �����������? 10% ���������� ����� - ����� ��� ����? <br />
������ �� �������� ������� �� ������� ������ � ����  �����! </small><br />
������� ������: <b>������ ����� </b><br />
<small><font color=brown>������� �� �������� �������</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_light_shield.gif" border=0><br />
<B>������ ����� </B><br />
������ ����: 200 <br />
��������: 10 <br />
<br />
<b>����������� ����������:</b><br />
� ���������� �������� ������ �����: 4 <br />
� ���������: 40<br />
� �������: 7<br />
<br />
������� ���� ���� ���������� ����� �� 10%, �������� ����� �������������� �� ����� ����� ��������� �� 1 ���. </td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell5.gif" border=0></td>
    <td> <B>����� ���������� (����������)</B>   (�����: 1) <br />
<b>����: 20 ��. </b><br />
�������������: 0/1 <br />
<B>��������� �����������:</B> <br />
� ���������: 25 <br />
� �������: 7 <br />
� ���������� �������� ����� ������: 4 <br />
��������: 1 ��. <br />
<small>��������: <br />
�...������ ���� ����� ������� - ����� �����, ���������� � ���� ��� </small><br />
������� ����������: <b>����� ����������</b><br />
<small><font color=brown>������� �� �������� �������</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_gray_mastery.gif" border=0><br />
<B>����� ���������� </B><br />
<IMG SRC="http://img.combats.ru/i/misc/micro/spirit.gif" border=0> 3 <br />
������ ����: 50 + 10*(������� ����������) � ��� <br />
��������: 5 <br />
<br />
<b>����������� ����������:</b><br />
� ���������� �������� ����� ������: 4 <br />
� ���������: 40<br />
� �������: 7<br />
<br />
����������� ����� � ����� ������, ����������� �� 5 ���. </td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/glaz na glaz.gif" border=0></td>
    <td> <B>���� �� ���� (����������)</B>   (�����: 1) <br />
<b>����: 20 ��. </b><br />
�������������: 0/1 <br />
<B>��������� �����������:</B> <br />
� ���������: 25 <br />
� �������: 7 <br />
� ���������� �������� ������ ����: 4 <br />
��������: 1 ��. <br />
<small>��������: <br />
�������� ������: ������������ ������ �������� �����. </small><br />
������� ������: <b>���� �� ���� </b><br />
<small><font color=brown>������� �� �������� �������</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_dark_eyeforeye.gif" border=0><br />
<B>���� �� ���� </B><br />
������ ����: 200 <br />
��������: 10 <br />
<br />
<b>����������� ����������:</b><br />
� ���������� �������� ������ ����: 4 <br />
� ���������: 40<br />
� �������: 7<br />
<br />
��������� ���������� ��� ���� ������� �� ����� �������� �����,  ���������� �������� ������ ���� ������� ��������� (�� �� ����� 50 � "��� �������" ����. �����)<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell1.gif" border=0></td>
    <td> <B>�������� ���� (����������)</B>   (�����: 1) <br />
<b>����: 20 ��. </b><br />
�������������: 0/1 <br />
<B>��������� �����������:</B> <br />
� ���������: 25 <br />
� �������: 7 <br />
� ���������� �������� ������� ����: 7 <br />
��������: 1 ��. <br />
<small>��������: <br />
� ���������� ��������������, ��� ������������ ����� ���� � ������� ����. </small><br />
������� ������: <b>�������� ���� </b><br />
<small><font color=brown>������� �� �������� �������</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_fire_flameshock.gif" border=0><br />
<B>�������� ���� </B><br />
������ ����: 200 <br />
��������: 10 <br />
<br />
<b>����������� ����������:</b><br />
� ���������� �������� ������� ����: 7 <br />
� ���������: 40<br />
� �������: 7<br />
<br />
������������ ������� ������ ��������  ���������� ����� �� ����. <br />
���� �������� x ������ ����� ����� � �� ����� ������������ ������ ��� �������� ���� ������� 2 ����.<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell10.gif" border=0></td>
    <td> <B>�������� (����������)</B>   (�����: 1)<br />
<b>����: 20 ��.</b> <br />
�������������: 0/1 <br />
<B>��������� �����������:</B> <br />
� ���������: 25 <br />
� �������: 7 <br />
� ���������� �������� ������� ����: 7 <br />
��������: 1 ��. <br />
<small>��������: <br />
���� ��������� �������� ���������� ������� +100 ��. �������� ����� ����. ���� ����� �� ��������� �������� ����.</small><br />
������� ������: <B>��������</B> <br />
<small><font color=brown>������� �� �������� �������</font></small><br />
 </td>
    <td><img src="http://img.combats.ru/i/misc/icons/wis_fire_boost.gif" width="40" height="25" border=0><br />
<B>��������</B><br />
������ ����: 21<br />
��������: 5 <br />
<br />
����� ������ ��� <br />
<br />
<b>����������� ����������:</b><br />
� ���������� �������� ������� ����: 7 <br />
� ���������: 40<br />
� �������: 7<br />
 <br />
���� ��������� �������� ���������� ������� +100 ��. �������� ����� ����.<br />
���� ����� �� ��������� �������� ����.<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell13.gif" border=0></td>
    <td> <B>������ ���� (����������)</B>   (�����: 1)<br />
<B>����: 20 ��.</B> <br />
�������������: 0/1 <br />
<B>��������� �����������:</B> <br />
� ���������: 30 <br />
� �������: 7 <br />
� ���������� �������� ������� ����: 7 <br />
��������: 1 ��. <br />
<small>��������: <br />
�� ������� 10%HP, �� ���������������� 20% ����.</small><br />
������� ������: <B>������ ����</B> <br />
<small><font color=brown>������� �� �������� �������</font></small><br />
 </td>
    <td><img src="http://img.combats.ru/i/misc/icons/wis_fire_sacrifice.gif" width="40" height="25" border=0><br />
<B>������ ����</B><br />
<IMG SRC="http://img.combats.ru/i/misc/micro/hp.gif" border=0> 5<br />
������ ����: 4 <br />
��������: 5<br />
<br />
<b>����������� ����������:</b><br />
� ���������� �������� ������� ����: 7 <br />
� ���������: 40<br />
� �������: 7<br />
� HP: 10% <br />
<br />
�� ������� 10%HP, �� ���������������� 20% ����<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell9.gif" border=0></td>
    <td> <B>�������� ����� (����������)</B>   (�����: 1)<br />
<B>����: 20 ��.</B> <br />
�������������: 0/1 <br />
<B>��������� �����������:</B> <br />
� ���������: 25 <br />
� �������: 7 <br />
� ���������� �������� ������� ����: 7 <br />
��������: 1 ��. <br />
<small>��������: <br />
������������ ������� ������ �������� ���������� ����� �� ����. ���� � ��� 4 ��������� ���� �������� 33% ����������� ����� ����������� ������� ������ ����</small><br />
������� ������: <B>�������� �����</B> <br />
<small><font color=brown>������� �� �������� �������</font></small><br />
 </td>
    <td><img src="http://img.combats.ru/i/misc/icons/wis_fire_flamedestroy.gif" width="40" height="25" border=0><br />
<B>�������� �����</B><br />
������ ����: 87 <br />
��������: 5<br />
<br />
<b>����������� ����������:</b><br />
� ���������� �������� ������� ����: 7 <br />
� ���������: 40<br />
� �������: 7<br />
<br />
������������ ������� ������ �������� ���������� ����� �� ����. <br />
���� � ��� 4 ��������� ���� �������� 33% ����������� ����� ����������� ������� ������ ����.<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell8.gif" border=0></td>
    <td> <B>�������� ������ (����������)</B>   (�����: 1)<br />
<B>����: 20 ��.</B> <br />
�������������: 0/1 <br />
<B>��������� �����������:</B> <br />
� ���������: 25 <br />
� �������: 7 <br />
� ���������� �������� ������� ����: 7 <br />
��������: 1 ��. <br />
<small>��������: <br />
������������ ������� ������ �������� ���������� ����� �� ����, ���� �� ������� ����� ����� 33%. ���� �������� 125% ����������� ����� ����������� �������</small><br />
������� ������: <B>�������� ������</B> <br />
<small><font color=brown>������� �� �������� �������</font></small><br />
 </td>
    <td><img src="http://img.combats.ru/i/misc/icons/wis_fire_flamedeath.gif" width="40" height="25" border=0><br />
<B>�������� ������</B><br />
������ ����: 83 <br />
�������� 10<br />
 <br />
����� ������ ��� <br />
<br />
<b>����������� ����������:</b><br />
� ���������� �������� ������� ����: 7 <br />
� ���������: 40<br />
� �������: 7<br />
<br />
������������ ������� ������ �������� ���������� ����� �� ����, ���� � ������� ����� ����� 33%. ���� �������� 125% ����������� ����� ����������� �������<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell14.gif" border=0></td>
    <td> <B>���� ������� (����������)</B>   (�����: 1)<br />
<B>����: 25 ��.</B> <br />
�������������: 0/1 <br />
<B>��������� �����������:</B> <br />
� ���������: 35 <br />
� �������: 8 <br />
� ���������� �������� ������� ����: 8 <br />
��������: 1 ��. <br />
<small>��������: <br />
������� ���� 5% ����� ������ ���� �� �� ������������� ������ �����. � ��� +2% �� ������ ������� ���� ����. ������������ ���� ���������� ���������. ���������� �� ������� ����������� ����.</small><br />
������� ������: <B>���� �������</B> <br />
<small><font color=brown>������� �� �������� �������</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_fire_flametongue.gif" border=0><br />
<B>���� �������</B><br />
������ ����: 114<br />
��������: 3 <br />
<br />
� ����� ������ ��� <br />
<br />
<b>����������� ����������:</b><br />
� ���������� �������� ������� ����: 8 <br />
� ���������: 60<br />
<br />
������� ���� 3% ����� ������ ���� �� � ������������� ������ �����. � ��� +2% �� ������ ������� ���� ����. <br />
���������� �� ����� ������� ����� 200 ������ �����, �� ������� ����������� ����.</span><br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell12.gif" border=0></td>
    <td> <B>������� ����� (����������)</B>   (�����: 1)<br />
<B>����: 25 ��.</B> <br />
�������������: 0/1 <br />
<B>��������� �����������:</B> <br />
� ���������: 35 <br />
� �������: 8 <br />
� ���������� �������� ������� ����: 8 <br />
��������: 1 ��. <br />
<small>��������: <br />
���� ������� ����� ����� ���� 33%, �� ��� ������������� ������� ������� �������� �� ����������� ����� ����. ���� ��� �� ���. </small><br />
������� ������: <B>������� ����� </B><br />
<small><font color=brown>������� �� �������� �������</font></small><br />
 </td>
    <td><img src="http://img.combats.ru/i/misc/icons/wis_fire_hiddenpower.gif" width="40" height="25" border=0><br />
<B>������� �����</B><br />
������ ����: 83 <br />
<br />
� ����� ������ ��� <br />
<br />
<b>����������� ����������:</b><br />
� ���������� �������� ������� ����: 8 <br />
� ���������: 60<br />
� �������: 8<br />
<br />
���� ������� ����� ����� ���� 33%, �� ��� ������������� ������� ������� �������� �� ����������� ����� ����. <br />
���� ��� �� ���.<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell11.gif" border=0></td>
    <td> <B>�������� ��� (����������)</B>   (�����: 1)<br />
<B>����: 25 ��.</B> <br />
�������������: 0/1 <br />
<B>��������� �����������:</B> <br />
� ���������: 35 <br />
� �������: 8 <br />
� ���������� �������� ������� ����: 8 <br />
��������: 1 ��. <br />
<small>��������: <br />
�� ��������� �� 50% ������ ����� 2 ����������� �������, ���������� ���� ��������������� ���� ����. ���� ����� �� ��������� �������� ����.</small><br />
������� ������: <B>�������� ���</B> <br />
<small><font color=brown>������� �� �������� �������</font></small><br />
 </td>
    <td><img src="http://img.combats.ru/i/misc/icons/wis_fire_shield.gif" width="40" height="25" border=0><br />
<B>�������� ���</B><br />
������ ����: 130 <br />
��������: 10 <br />
<br />
<b>����������� ����������:</b><br />
� ���������� �������� ������� ����: 8 <br />
� ���������: 60<br />
� �������: 8<br />
<br />
�� ��������� �� 50% ������ ����� 2 ����������� �������, ���������� ���� ��������������� ���� ����. <br />
���� ����� �� ��������� �������� ����.<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/Inei.gif" border=0></td>
    <td> <B>���� (����������)</B>   (�����: 1) <br />
<b>����: 20 ��. </b><br />
�������������: 0/1 <br />
<B>��������� �����������:</B> <br />
� ���������: 25 <br />
� �������: 7 <br />
� ���������� �������� ������� ����: 7 <br />
��������: 1 ��. <br />
<small>��������: <br />
� ���������� ��������������, ��� ������ ����� ���� �������� ���� �� �����.</small> <br />
������� ������: <b>����</b> <br />
<small><font color=brown>������� �� �������� �������</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_water_shield.gif" border=0><br />
<B>���� </B><br />
������ ����: 190 <br />
��������: 5 <br />
<br />
<b>����������� ����������:</b><br />
� ���������� �������� ������� ����: 7 <br />
� ���������: 40<br />
� �������: 7<br />
<br />
�� ��������� �� 25% ������ ����� 4 ����������� �������.<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell15.gif" border=0></td>
    <td> <B>�������������� (����������)</B>   (�����: 1) <br />
<b>����: 25 ��. </b><br />
�������������: 0/1 <br />
<B>��������� �����������:</B> <br />
� ���������: 35<br />
� �������: 8<br />
� ���������� �������� ������� ����: 8<br />
��������: 1 ��.<br />
<small>��������: <br />
��������� ������� ���� ���� ������ ������ ���� ����, �� �� ����� �������������. ������� ���� � �������� ����.</small><br />
������� ������: <b>��������������</b><br />
<small><font color=brown>������� �� �������� �������</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_water_crystalize.gif" border=0><br />
<B>��������������</B><br />
������ ����: 180<br />
��������: 5 <br />
<br />
<b>����������� ����������:</b><br />
� ���������� �������� ������� ����: 8 <br />
� ���������: 60<br />
� �������: 8<br />
<br />
��������� ������� ���� ���� ������ ������ ���� ���� �� �� ����� ��� 90.<br />
������� ���� � �������� ���� �� 20 �� ��� ����.<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell16.gif" border=0></td>
    <td> <B>������ ���� (����������)</B>   (�����: 1) <br />
<b>����: 20 ��. </b><br />
�������������: 0/1 <br />
<B>��������� �����������:</B> <br />
� ���������: 25<br />
� �������: 7<br />
� ���������� �������� ������� ����: 7<br />
��������: 1 ��.<br />
<small>��������: <br />
����� 2 ���� ���� ������ ����������� ������������ ������ ��� �������� ���� ������� �� 3 ����.</small><br />
������� ������: <b>������ ����</b><br />
<small><font color=brown>������� �� �������� �������</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_water_icegrap.gif" border=0><br />
<B>������ ����</B><br />
������ ����: 90<br />
��������: 10<br />
 <br />
<b>����������� ����������:</b><br />
� ���������� �������� ������� ����: 7 <br />
� ���������: 40<br />
� �������: 7<br />
<br />
����� 2 ���� ���� ������ ����������� ������������ ������ ��� �������� ���� ������� �� 3 ����.<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell17.gif" border=0></td>
    <td> <B>������ ���� (����������)</B>   (�����: 1) <br />
<b>����: 20 ��. </b><br />
�������������: 0/1 <br />
<B>��������� �����������:</B> <br />
� ���������: 25<br />
� �������: 7<br />
� ���������� �������� ������� ����: 7<br />
��������: 1 ��.<br />
<small>��������: <br />
��� ������ 10% ����� �� 5 �����, �� ���� ���� �������� ������� �� 30%.</small><br />
������� ������: <b>������ ����</b><br />
<small><font color=brown>������� �� �������� �������</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_water_sacrifice.gif" border=0><br />
<B>������ ����</B><br />
<IMG SRC="http://img.combats.ru/i/misc/micro/hp.gif" border=0>5<br />
������ ����: 5<br />
��������: 10 <br />
<br />
<b>����������� ����������:</b><br />
� ���������� �������� ������� ����: 7 <br />
� ���������: 40<br />
� �������: 7<br />
<br />
��� ������ 10% ����� �� 5 �����, �� ���� ���� �������� ������� �� 50%.<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/duhi lda.gif" border=0></td>
    <td> <B>���� ���� (����������)</B>   (�����: 1) <br />
<b>����: 25 ��. </b><br />
�������������: 0/1 <br />
<B>��������� �����������:</B> <br />
� ���������: 35<br />
� �������: 8<br />
� ���������� �������� ������� ����: 8<br />
��������: 1 ��.<br />
<small>��������: <br />
�� ��� ���� ����������� ��. �������� ����� ���� �� 15. ����� ������ ������� ����� ������ ����, ��������������� ����</small><br />
������� ������: <b>���� ����</b><br />
<small><font color=brown>������� �� �������� �������</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_water_spirit.gif" border=0><br />
<B>���� ����</B><br />
<IMG SRC="http://img.combats.ru/i/misc/micro/hp.gif" border=0>4<br />
���� ����: 5<br />
������ ����: 5<br />
��������: 10<br />
 <br />
<b>����������� ����������:</b><br />
� ���������� �������� ������� ����: 8 <br />
� ���������: 60<br />
� �������: 8<br />
<br />
�� ��� ���� ����������� ��. �������� ����� ���� �� 15. ����� ������ ������� ����� ������ ����, ��������������� ��� ����.<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell19.gif" border=0></td>
    <td> <B>�����������: ������� (����������)</B>   (�����: 1) <br />
<b>����: 20 ��. </b><br />
�������������: 0/1 <br />
<B>��������� �����������:</B> <br />
� ���������: 25<br />
� �������: 7<br />
� ���������� �������� ������� ����: 7<br />
��������: 1 ��.<br />
<small>��������: <br />
������� ������� ���� ������������ ���������� ���� ������ ����. ������� �������������� ����, ���� ������� ����� ���� ������ �������������</small><br />
������� ������: <b>�����������: �������!</b><br />
<small><font color=brown>������� �� �������� �������</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_water_break.gif" border=0><br />
<B>�����������: �������!</B><br />
������ ����: 180<br />
��������: 5<br />
<br />
� ����� ������ ���<br />
<br />
<b>����������� ����������:</b><br />
� ���������� �������� ������� ����: 7 <br />
� ���������: 40<br />
� �������: 7<br />
<br />
������� ������� ���� ������������ <B>����������</B> 184 ����� ������ ���� � ��� 276, ���� ������� ����� ���� ����� 200 .<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/led spasenie.gif" border=0></td>
    <td> <B>������� �������� (����������)</B>   (�����: 1) <br />
<b>����: 25 ��. </b><br />
�������������: 0/1 <br />
<B>��������� �����������:</B> <br />
� ���������: 35<br />
� �������: 8<br />
� ���������� �������� ������� ����: 8<br />
��������: 1 ��.<br />
<small>��������: <br />
��������� ������������� ������������, ������� ����, �� ������� ���� ���� ����������� 5 �����</small><br />
������� ������: <b>������� ��������</b><br />
<small><font color=brown>������� �� �������� �������</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_water_tempheal.gif" border=0><br />
<B>������� ��������</B><br />
<IMG SRC="http://img.combats.ru/i/misc/micro/hp.gif" border=0>1<br />
������ ����: 118<br />
��������: 5<br />
<br />
<b>����������� ����������:</b><br />
� ���������� �������� ������� ����: 8 <br />
� ���������: 60<br />
� �������: 8<br />
<br />
��������� ������������� ������������, ������� ���� �� 405HP ������ ����, �� �� ����������� 5 ����� ���� ������ 202HP.<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/ostraya gran.gif" border=0></td>
    <td> <B>������ ����� (����������)</B>   (�����: 1) <br />
<b>����: 20 ��. </b><br />
�������������: 0/1 <br />
<B>��������� �����������:</B> <br />
� ���������: 25<br />
� �������: 7<br />
� ���������� �������� ������� ����: 7<br />
��������: 1 ��.<br />
<small>��������: <br />
������� ���� ������� ����</small><br />
������� ������: <b>������ �����</b><br />
<small><font color=brown>������� �� �������� �������</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_water_strike.gif" border=0><br />
<B>������ �����</B><br />
������ ����: 114<br />
��������: 3<br />
<br />
� ����� ������ ���<br />
<br />
<b>����������� ����������:</b><br />
� ���������� �������� ������� ����: 7 <br />
� ���������: 40<br />
� �������: 7<br />
<br />
������� ���� 485 ��. �������� �����.<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell22.gif" border=0></td>
    <td> <B>������� ������ (����������)</B>   (�����: 1) <br />
<b>����: 25 ��. </b><br />
�������������: 0/1 <br />
<B>��������� �����������:</B> <br />
� ���������: 35<br />
� �������: 8<br />
� ���������� �������� ������� ����: 8<br />
��������: 1 ��.<br />
<small>��������: <br />
��� ������������� ������� ������� �������� �� ����������� ����� ����.</small><br />
������� ������: <b>������� ������</b><br />
<small><font color=brown>������� �� �������� �������</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_water_hiddenpower.gif" border=0><br />
<B>������� ������</B><br />
������ ����: 117<br />
��������: 10<br />
<br />
� ����� ������ ���<br />
<br />
<b>����������� ����������:</b><br />
� ���������� �������� ������� ����: 8 <br />
� ���������: 60<br />
� �������: 8<br />
<br />
��� ������������� ������� ������� �������� �� ����������� ����� ����.<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/chistota vody.gif" border=0></td>
    <td> <B>������� ���� (����������)</B>   (�����: 1) <br />
<b>����: 25 ��. </b><br />
�������������: 0/1 <br />
<B>��������� �����������:</B> <br />
� ���������: 35<br />
� �������: 8<br />
� ���������� �������� ������� ����: 8<br />
��������: 1 ��.<br />
<small>��������: <br />
������� ���� ���������� ������ ����� ��� ����������.</small><br />
������� ������: <b>������� ����</b><br />
<small><font color=brown>������� �� �������� �������</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_water_cleance.gif" border=0><br />
<B>������� ����</B><br />
������ ����: 100<br />
��������: 5<br />
<br />
<b>����������� ����������:</b><br />
� ���������� �������� ������� ����: 8 <br />
� ���������: 50<br />
� �������: 8<br />
<br />
������� ���� ���������� ������ ����� ��� ����������.<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell24.gif" border=0></td>
    <td> <B>�������������� (����������)</B>   (�����: 1) <br />
<b>����: 45 ��. </b><br />
�������������: 0/1 <br />
<B>��������� �����������:</B> <br />
� ���������: 75<br />
� �������: 9<br />
� ���������� �������� ������� ����: 9<br />
��������: 1 ��.<br />
<small>��������: <br />
��������� ������� ������� �� ���� �� 10%. ����� ��������� �� ���� ���� �� 5 ���.</small><br />
������� ������: <b>��������������</b><br />
<small><font color=brown>������� �� �������� �������</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_water_aheal.gif" border=0><br />
<B>��������������</B><br />
<IMG SRC="http://img.combats.ru/i/misc/micro/hp.gif" border=0> 1<br />
������ ����: 24<br />
<br />
<b>����������� ����������:</b><br />
� ���������� �������� ������� ����: 9 <br />
� ���������: 75<br />
� �������: 9<br />
<br />
��������� ������� ������� �� ���� �� 15% � ���� ���� �� 3% �� 5 �����. ����� ��������� �� ���� ���� �� 3 ���.<br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><img src="http://bestcombats.net/news/i/booklearn_spell28.gif"></td>
    <td><b>������ ������� (����������)</b>   (�����: 1) <br />
<b>����: 20 ��. </b><br />
�������������: 0/1<br />
<b>��������� �����������:</b><br />
� ���������: 25<br />
� �������: 7<br />
� ���������� �������� ������� �������: 7<br />
��������: 1 ��.<br />
<small>��������:<br />
��� �������� 25 ��. �������� ����� ������� �� 4 ����.</small><br />
������� ������: <b>������ �������</b><br />
<small><font color=brown>������� �� �������� �������</font></small><br />
</td>
<td>
<img src="http://img.combats.ru/i/misc/icons/wis_air_sacrifice.gif"><br />
<b>������ �������</b><br />
<IMG SRC="http://img.combats.ru/i/misc/micro/hp.gif" border=0> 5<br />
������ ����: 7<br />
�������� 10 <br />
<br />
��� �������� 25 ��. �������� ����� ������� �� 4 ����.<br />
</td>
</tr>
<tr></tr>
<tr>
    <td><img src="http://bestcombats.net/news/i/booklearn_spell29.gif"></td>
<td><b>�������� ������ (����������)</b>   (�����: 1) <br />
<b>����: 30 ��. </b><br />
�������������: 0/1<br />
<b>��������� �����������:</b><br />
� ���������: 60<br />
� �������: 8<br />
� ���������� �������� ������� �������: 8<br />
��������: 1 ��.<br />
<small>��������:<br />
����� ��������� ����� �� ������ ����.</small><br />
������� ������: <b>�������� ������</b><br />
<small><font color=brown>������� �� �������� �������</font></small><br />
</td>
<td>
<img src="http://img.combats.ru/i/misc/icons/wis_air_speed.gif"><br />
<b>�������� ������</b><br />
���� ����: 4<br />
������ ����: 62<br />
��������� ��������: 5<br />
��������: 10 <br />
<br />
<b>����������� ����������:</b> <br />
� ���������: 60<br />
� ���������� �������� ������� �������: 8 <br />
� �������: 8<br />
<br />
����� ��������� ����� �� ������ ����.<br />
</td>
</tr>
<tr></tr>
<tr>
    <td><img src="http://bestcombats.net/news/i/booklearn_spell25.gif"></td>
<td><b>����� (����������)</b>   (�����: 1) <br />
<b>����: 50 ��. </b><br />
�������������: 0/1<br />
<b>��������� �����������:</b><br />
� ���������: 60<br />
� �������: 8<br />
� ���������� �������� ������� �������: 8<br />
��������: 1 ��.<br />
<small>��������:<br />
��������� ������� ���������� ���� 1-47 ����� �������� ��� �������� �������������</small><br />
������� ������: <b>�����</b><br />
<small><font color=brown>������� �� �������� �������</font></small><br />
</td>
<td>
<img src="http://img.combats.ru/i/misc/icons/wis_air_spark.gif"><br />
<b>�����</b><br />
������ ����: 62<br />
�������� 10 <br />
<br />
<b>����������� ����������: </b><br />
� ���������: 60<br />
� ���������� �������� ������� �������: 8 <br />
� �������: 8<br />
<br />
��������� ������� ���������� ���� 1-57 ����� �������� ��� �������� �������������<br />
</td>
</tr>
<tr></tr>
<tr>
    <td><img src="http://bestcombats.net/news/i/vosduh shit.gif"></td>
<td><b>��������� ��� (����������)</b>   (�����: 1) <br />
<b>����: 10 ��. </b><br />
�������������: 0/1<br />
<b>��������� �����������:</b><br />
� ���������: 80<br />
� �������: 9<br />
� ���������� �������� ������� �������: 9<br />
��������: 1 ��.<br />
<small>��������:<br />
������� ��������� ����� ������ ����, ��������� ��������� 1-0 ��. �����.<br />
���� ����� �� ��������� �������� ����.<br />
����� �������� � ����������� ������� ����.</small><br />
������� ������: <b>��������� ���</b><br />
<small><font color=brown>������� �� �������� �������</font></small><br />
</td>
<td>
<img src="http://img.combats.ru/i/misc/icons/wis_air_shield.gif"><br />
<b>��������� ���</b><br />
������ ����: 127 <br />
�������� 12 <br />
���� ������ ��� <br />
<br />
<b>����������� ����������: </b><br />
� ���������: 80 <br />
� ���������� �������� ������� �������: 9<br />
� �������: 9 <br />
<br />
������ ��������� ����� ������ ����, ��������� ��������� 1-190 ��. �����. <br />
���� ���� �� ��������� �������� ����. <br />
����� �������� � ����������� ������� ����.<br />
</td>
</tr>
<tr></tr>
<tr>
    <td><img src="http://bestcombats.net/news/i/booklearn_spell26.gif"></td>
<td><b>������� (����� ����������)</b>   (�����: 1)<br />
<b>����: 100 ��. </b><br />
�������������: 0/1<br />
<b>��������� �����������:</b><br />
� ���������: 40<br />
� �������: 7<br />
� ���������� �������� ������� �������: 7<br />
��������: 1 ��.<br />
<small>��������:<br />
������� ������ ����������, ����������� ����������� ����� �� ���� � ������������ ��� � ����� �����</small><br />
������� �������: <b>�������, �����: �������, �����: ���������, �����: ���</b><br />
<small><font color=brown>������� �� �������� �������</font></small><br />
</td>
<td>
<img src="http://img.combats.ru/i/misc/icons/wis_air_charge.gif"><br />
<b><DIV><A href="javascript: void(0);" onClick="if (hidtext1003.style.display == '') { this.innerText = '�������'; hidtext1003.style.display = 'none'; } else { this.innerText = '�������'; hidtext1003.style.display = ''; }">�������</A></DIV><DIV id='hidtext1003' style='display: none;'></b><br />
���� ����: 1<br />
������ ����: 74 <br />
<br />
<b>����������� ����������: </b><br />
����������: 40<br />
����������� �������� ������� �������: 7<br />
��������: 7<br />
<br />
������, ���� ������, �����, �����, � ����� �� ���������� ���� ����� �������� ����, ���������� ���������� �� ����� ������� ���� �� 1%. ��� ����� ��������������� ����������� ��������<br />
</DIV><br />
<br />
<img src="http://img.combats.ru/i/misc/icons/wis_air_charge_dmg.gif"><br />
<b><DIV><A href="javascript: void(0);" onClick="if (hidtext1004.style.display == '') { this.innerText = '�����: ���������'; hidtext1004.style.display = 'none'; } else { this.innerText = '�����: ���������'; hidtext1004.style.display = ''; }">�����: ���������</A></DIV><DIV id='hidtext1004' style='display: none;'></b><br />
<IMG SRC="http://img.combats.ru/i/misc/micro/hp.gif" border=0> 1<br />
��������: 3<br />
<br />
<b>����������� ����������: </b><br />
� ���������: 40<br />
� ���������� �������� ������� �������: 7<br />
� �������: 7<br />
<br />
������� ���� 1-2% ����� ������ ������� �� �� ������������� ������ ����� �� ������ ������� ������. ���������� �� ����� ������� ����� 250 ��. �����.<br />
</DIV><br />
<br />
<img src="http://img.combats.ru/i/misc/icons/wis_air_charge_gain.gif"><br />
<b><DIV><A href="javascript: void(0);" onClick="if (hidtext1005.style.display == '') { this.innerText = '�����: �������'; hidtext1005.style.display = 'none'; } else { this.innerText = '�����: �������'; hidtext1005.style.display = ''; }">�����: �������</A></DIV><DIV id='hidtext1005' style='display: none;'></b><br />
<IMG SRC="http://img.combats.ru/i/misc/micro/hp.gif" border=0> 1<br />
��������: 3<br />
<br />
<b>����������� ����������: </b><br />
� ���������: 40<br />
� ���������� �������� ������� �������: 7<br />
� �������: 7<br />
<br />
��������������� 9 ���� �� ������ ������� ������ �� ���� � ������� � ���� ���� ���������� ���������� ������.<br />
</DIV><br />
<br />
<img src="http://img.combats.ru/i/misc/icons/wis_air_charge_shock.gif"><br />
<b><DIV><A href="javascript: void(0);" onClick="if (hidtext1006.style.display == '') { this.innerText = '�����: ���'; hidtext1006.style.display = 'none'; } else { this.innerText = '�����: ���'; hidtext1006.style.display = ''; }">�����: ���</A></DIV><DIV id='hidtext1006' style='display: none;'></b><br />
<IMG SRC="http://img.combats.ru/i/misc/micro/hp.gif" border=0> 1<br />
��������: 3<br />
<br />
<b>����������� ����������: </b><br />
� ���������: 40<br />
� ���������� �������� ������� �������: 7<br />
� �������: 7<br />
<br />
�������� ����������, ����� ��� ����������� ������������ ��������� ����������� ����� �� ���� ����� � ���������� ���� ���������� ���������� ������<br />
</DIV><br />
</td>
</tr>
<tr></tr>
<tr>
    <td><img src="http://bestcombats.net/news/i/energi vozduha.gif"></td>
<td><b>������� ������� (����������)</b>   (�����: 1)<br />
<b>����: 20 ��.</b><br />
�������������: 0/1<br />
<b>��������� �����������:</b><br />
� ���������: 25<br />
� �������: 7<br />
� ���������� �������� ������� �������: 11<br />
��������: 1 ��.<br />
<small>��������:<br />
��������������� ���� 1 - 10% ���� �� ������ ��� ������ ����������. ���������� ���������� �������� ��� ������������� ������ ������� ���������� ��� ����� 5 �����.</small><br />
������� ������: <b>������� �������</b><br />
<small><font color=brown>������� �� �������� �������</font></small><br />
</td>
<td>
<img src="http://img.combats.ru/i/misc/icons/wis_air_manaheal.gif"><br />
<b>������� �������</b><br />
<IMG SRC="http://img.combats.ru/i/misc/micro/hp.gif" border=0> 1<br />
���� ����: 3<br />
��������: 10 <br />
� ���� ������ ��� <br />
<br />
<b>����������� ����������: </b><br />
� ���������: 40<br />
� ���������� �������� ������� �������: 11<br />
� �������: 7 <br />
<br />
��������������� ���� 1 - 10% ���� �� ������ ��� ������ ����������. ���������� ���������� �������� ��� ������������� ������ ������� ���������� ��� ����� 5 �����.<br />
</td>
</tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/kamm udar.gif" border=0></td>
    <td> <B>�������� ���� (����������)</B>   (�����: 1) <br />
<b>����: 20 ��. </b><br />
�������������: 0/1 <br />
<B>��������� �����������:</B> <br />
� ���������: 25 <br />
� �������: 7 <br />
� ���������� �������� ������� �����: 7 <br />
��������: 1 ��. <br />
<small>��������: <br />
� ���������� ��������������, ��� �������� �������� ����� ��� ������ ����� �����. </small><br />
������� ������: <b>�������� ����</b> <br />
<small><font color=brown>������� �� �������� �������</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_earth_strike.gif" border=0><br />
<B>�������� ���� </B><br />
<br />
<b>����������� ����������:</b><br />
� ���������� �������� ������� �����: 7 <br />
� ���������: 40<br />
� �������: 7<br />
<br />
����� ������ ��� <br />
���� ������� ������ ���� ����<br />
<DIV><A href="javascript: void(0);" onClick="if (hidtext1007.style.display == '') { this.innerText = '�������� ����������'; hidtext1007.style.display = 'none'; } else { this.innerText = '������'; hidtext1007.style.display = ''; }">�������� ����������</A></DIV><DIV id='hidtext1007' style='display: none;'><br />
��� 7 ������: <br />
������ ����: 39 <br />
���������: 40 <br />
������� ���� 113 ��. ��������� �����<br />
 <br />
��� 8 ������: <br />
������ ����: 46 <br />
���������: 50 <br />
������� ���� 134 ��. ��������� ����� </DIV></td>
  </tr> 
</td>
</tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell39.gif" border=0></td>
    <td> <B>�������� (����������)</B>   (�����: 1) <br />
<b>����: 20 ��. </b><br />
�������������: 0/1 <br />
<B>��������� �����������:</B> <br />
� ���������: 40 <br />
� �������: 7 <br />
� ���������� �������� ������� �����: 7 <br />
��������: 1 ��. <br />
<small>��������: <br />
��� �������� </small><br />
������� ������: <b>��������</b> <br />
<small><font color=brown>������� �� �������� �������</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_earth_dmg08.gif" border=0><br />
<B>�������� </B><br />
<br />
<b>����������� ����������:</b><br />
� ���������� �������� ������� �����: 7 <br />
� ���������: 40<br />
� �������: 7<br />
<br />
����� ������ ���<br />
���� ������� ������ ���� ����<br />
<DIV><A href="javascript: void(0);" onClick="if (hidtext1008.style.display == '') { this.innerText = '�������� ����������'; hidtext1008.style.display = 'none'; } else { this.innerText = '������'; hidtext1008.style.display = ''; }">�������� ����������</A></DIV><DIV id='hidtext1008' style='display: none;'><br />
��� 7 ������: <br />
������ ����: 37 <br />
���������: 40 <br />
������� ���� 38-45 ��. ����� ������ �����<br />
 <br />
��� 8 ������: <br />
������ ����: 43 <br />
���������: 50 <br />
������� ���� 46-54 ��. ����� ������ ����� </DIV></td>
  </tr> 
</td>
</tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell32.gif" border=0></td>
    <td> <B>������ ����� (����������)</B>   (�����: 1) <br />
<b>����: 20 ��. </b><br />
�������������: 0/1 <br />
<B>��������� �����������:</B> <br />
� ���������: 40<br />
� �������: 7<br />
� ���������� �������� ������� �����: 7 <br />
<small>��������: 1 ��.<br />
��������:<br />
�� ���������������� 5%HP � 5%����<br />
������� ������: <b>������ �����</b> <br />
<small><font color=brown>������� �� �������� �������</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.com/i/misc/icons/wis_earth_sacrifice.gif" border=0><br />
<B>������ �����</B><br />
<IMG SRC="http://img.combats.ru/i/misc/micro/hp.gif" border=0> 5<br />
� ������ ����: 4<br />
��������: 5<br />
<b>����������� ����������:</b><br />
� ���������: 40<br />
� ���������� �������� ������� �����: 7<br />
� �������: 7<BR><b>��������:</b><br />
�� ���������������� 5%HP � 5%����<br />
</td>
</tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell38.gif" border=0></td>
    <td> <B>��������� ����� (����������)</B>   (�����: 1) <br />
<b>����: 20 ��. </b><br />
�������������: 0/1 <br />
<B>��������� �����������:</B><br />
� ���������: 50<br />
� �������: 8<br />
� ���������� �������� ������� �����: 8  <br />
<small>��������: 1 ��.<br />
��������:<br />
������� ���� ���������� ������ �� ����� ��� ������� � ��������������� 3% ����<br />
������� ������: <B>��������� �����</B> <br />
<font color=brown>������� �� �������� �������</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_earth_cleance.gif" border=0><br />
<B>��������� �����</B><br />
� ������ ����: 41<br />
��������: 5<br />
<b>����������� ����������:</b><br />
� ���������: 50<br />
� ���������� �������� ������� �����: 8<br />
� �������: 8<b><br />
��������:</b><br />
������� ���� ���������� ������ �� ����� ��� ������� � ��������������� 3% ����<br />
</td>
</tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell36.gif" border=0></td>
    <td> <B>��������� ��� (����������)</B> (�����: 1) <br />
<B>����: 25 ��.</B> <br />
�������������: 0/1<br />
<B>��������� �����������:</B><br />
� ���������: 50<br />
� �������: 8<br />
� ���������� �������� ������� �����: 8  <br />
<small>��������: 1 ��.<br />
��������:<br />
�� ��������� �� 30% ������ ����� �� ����� � ������� 5 �����<br />
����� �� ��������� �������� ����.<br />
������� ������: <B>��������� ���</B> <br />
<font color=brown>������� �� �������� �������</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_earth_shield2.gif" border=0><br />
<B>��������� ���</B><br />
� ������ ����: 124<br />
��������: 8<br />
<b>����������� ����������:</b><br />
� ���������: 50<br />
� ���������� �������� ������� �����: 8<br />
� �������: 8<br />
<b>��������:</b><br />
�� ��������� �� 30% ������ ����� �� ����� � ������� 5 �����<br />
����� �� ��������� �������� ����.<br />
</td>
</tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/Zazemlenie 0.gif" border=0></td>
    <td> <B>����������: ���� (����������)</B> (�����: 1) <br />
<B>����: 25 ��.</B> <br />
�������������: 0/1<br />
<B>��������� �����������:</B><br />
� ���������: 50<br />
� �������: 8<br />
� ���������� �������� ������� �����: 8  <br />
<small>��������: 1 ��.<br />
��������:<br />
����������� ���� ���� �� ���� �� 3% � ��������� �������� ������� �� 7%. ������� 5 ���� ������ ���. ������ ���� ���������� �������� ���� �����. ��� � ��������� ������������ ���� ���� ����������. ������� 5 ���� ������ ���. ����������� �� 5 ���.<br />
����� �� ��������� �������� ����.<br />
������� ������: <B>����������: ����</B> <br />
<font color=brown>������� �� �������� �������</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_earth_link_zero.gif" border=0><br />
<B>����������: ����</B><br />
� ������ ����: 11<br />
<b>����������� ����������:</b><br />
� ���������: 50<br />
� ���������� �������� ������� �����: 8<br />
� �������: 8<br />
<b>��������:</b><br />
����������� ���� ���� �� ���� �� 3% � ��������� �������� ������� �� 7%. ������� 5 ���� ������ ���. ������ ���� ���������� �������� ���� �����. ��� � ��������� ������������ ���� ���� ����������. ������� 5 ���� ������ ���. ����������� �� 5 ���.<BR>����� �� ��������� �������� ����.<br />
</td>
</tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/Zazemlenie minus.gif" border=0></td>
    <td> <B>����������: ����  (����������)</B> (�����: 1) <br />
<B>����: 30 ��.</B> <br />
�������������: 0/1<br />
<B>��������� �����������:</B><br />
� ���������: 50<br />
� �������: 8<br />
� ���������� �������� ������� �����: 8  <br />
<small>��������: 1 ��.<br />
<b>��������:</b><br />
�������� ���� �� 39HP �� 10 ����� �� ���� ����� ����. ������ ���� ���������� �������� ���� �����. ��� � ��������� ������������ ���� ���� ����������. ������� 5 ���� ������ ���. ����������� �� 5 ���.<br />
����� �� ��������� �������� ����.<br />
������� ������: <B>����������: ����</B> <br />
<font color=brown>������� �� �������� �������</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_earth_link_plus.gif" border=0><br />
<B>����������: ����</B><br />
� ������ ����: 11<br />
<b>����������� ����������:</b><br />
� ���������: 50<br />
� ���������� �������� ������� �����: 8<br />
� �������: 8<br />
<b>��������:</b><br />
�������� ���� �� 39HP �� 10 ����� �� ���� ����� ����. ������ ���� ���������� �������� ���� �����. ��� � ��������� ������������ ���� ���� ����������. ������� 5 ���� ������ ���. ����������� �� 5 ���.<br />
����� �� ��������� �������� ����<br />
</td>
</tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/Zazemlenie minus35.gif" border=0></td>
    <td> <B>����������: �����  (����������)</B> (�����: 1) <br />
<B>����: 30 ��.</B> <br />
�������������: 0/1<br />
<B>��������� �����������:</B><br />
� ���������: 50<br />
� �������: 8<br />
� ���������� �������� ������� �����: 8  <br />
<small>��������: 1 ��.<br />
��������:<br />
���� ������ 79 ���� �� 10 �����. ������ ���� ���������� �������� ���� �����. ��� � ��������� ������������ ���� ���� ����������. ������� 1 ���� ������ ���. ����������� �� 5 ���.<br />
����� �� ��������� �������� ����.<br />
������� ������: <B>����������: �����</B> <br />
<font color=brown>������� �� �������� �������</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.com/i/misc/icons/wis_earth_link_minus.gif" border=0><br />
<B>����������: �����</B><br />
� ������ ����: 11<br />
<b>����������� ����������:</b><br />
� ���������: 50<br />
� ���������� �������� ������� �����: 8<br />
� �������: 8<br />
<b>��������:</b><br />
���� ������ 79 ���� �� 10 �����. ������ ���� ���������� �������� ���� �����. ��� � ��������� ������������ ���� ���� ����������. ������� 1 ���� ������ ���. ����������� �� 5 ���.<br />
����� �� ��������� �������� ����.<br />
������� ������: ����������: �����<br />
</td></td>
</tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/kav cvetok.gif" border=0></td>
    <td> <B>�������� ������  (����������)</B> (�����: 1) <br />
<B>����: 35 ��.</B> <br />
�������������: 0/1<br />
<B>��������� �����������:</B><br />
� ���������: 50<br />
� �������: 8<br />
� ���������� �������� ������� �����: 8  <br />
<small>��������: 1 ��.<br />
��������:<br />
��� ��������<br />
������� ������: <B>�������� ������</B> <br />
<font color=brown>������� �� �������� �������</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_earth_flower.gif" border=0><br />
<B>�������� ������ [8]</B><br />
<IMG width=8 height=8 src=http://img.combats.ru/i/misc/micro/hp.gif> 1<br />
� ������ ����: 106<br />
��������: 3<br />
� ����� ������ ���<br />
<b>����������� ����������:</b><br />
� ���������: 50<br />
� ���������� �������� ������� �����: 8<br />
� �������: 8<br />
<b>��������:</b><br />
���� �������� 216 ����� ������ ����� � �������� ����������� ������������ ������ 1 ���. ��� 3 ���� �������� 73 ����� ������ �����<br />
<DIV><A href="javascript: void(0);" onClick="if (hidtext1009.style.display == '') { this.innerText = '�����'; hidtext1009.style.display = 'none'; } else { this.innerText = '������'; hidtext1009.style.display = ''; }">�����</A></DIV><DIV id='hidtext1009' style='display: none;'><B>�������� ������ [9]</B><br />
<IMG width=8 height=8 src=http://img.combats.ru/i/misc/micro/hp.gif> 1<br />
� ������ ����: 127<br />
��������: 3<br />
� ����� ������ ���<br />
<b>����������� ����������:</b><br />
� ���������: 60<br />
� ���������� �������� ������� �����: 9<br />
� �������: 9<br />
<b>��������:</b><br />
���� �������� 255����� ������ ����� � �������� ����������� ������������ ������ 1 ���. ��� 3 ���� �������� 88 ����� ������ �����</DIV><br />
</td></td>
</tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/kamenn straj.gif" border=0></td>
    <td> <B>�������� ��������� ������ (����������)</B> (�����: 1) <br />
<B>����: 40 ��.</B> <br />
�������������: 0/1<br />
<B>��������� �����������:</B><br />
� ���������: 50<br />
� �������: 8<br />
� ���������� �������� ������� �����: 12  <br />
<small>��������: 1 ��.<br />
��������:<br />
��������� � ��� ��������� ������ ��� ������ ����.<br />
����� ��������� � 10 ���� ������ ���.<br />
������� ������: <B>�������� ��������� ������</B> <br />
<font color=brown>������� �� �������� �������</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_earth_summon.gif" border=0><br />
<B>�������� ��������� ������</B><br />
� ������ ����: 166<br />
��������: 20<br />
� ����� ������ ���<br />
<b>����������� ����������:</b><br />
� ���������� �������� ������� �����: 12<br />
� �������: 8<br />
<b>��������:</b><br />
��������� � ��� ��������� ������ ��� ������ ����.<br />
����� ��������� � 9 ���� ������ ���.<br />
</td></td>
</tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/booklearn_spell37.gif" border=0></td>
    <td> <B>�������� ��� (����������)</B> (�����: 1) <br />
<B>����: 25 ��.</B> <br />
�������������: 0/1<br />
<B>��������� �����������:</B><br />
� ���������: 50<br />
� �������: 8<br />
� ���������� �������� ������� �����: 8  <br />
<small>��������: 1 ��.<br />
��������:<br />
�� ��������� �� 95% ������ ����� � ���� ������<br />
����� �� ��������� �������� ����.<br />
������� ������: <B>�������� ���</B> <br />
<font color=brown>������� �� �������� �������</font></small><br />
 </td>
    <td><IMG SRC="http://img.combats.ru/i/misc/icons/wis_earth_shield.gif" border=0><br />
<B>�������� ���</B><br />
� ������ ����: 124<br />
��������: 7<br />
<b>����������� ����������:</b><br />
� ���������: 50<br />
� ���������� �������� ������� �����: 8<br />
� �������: 8<br />
<b>��������:</b><br />
�� ��������� �� 95% ������ ����� � ���� ������<BR>����� �� ��������� �������� ����.<br />
</TABLE>
</div></div></div><br />
<br />
<div style="margin:0; margin-top:8px"><div style="margin-bottom:4px"><input type="button" value="������" onClick="if (this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display != '') { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = ''; this.innerText = ''; this.value = '������'; } else { this.parentNode.parentNode.getElementsByTagName('div')[1].getElementsByTagName('div')[0].style.display = 'none'; this.innerText = ''; this.value = '������'; }"></div><div ><div style="display: none;"><br />
<br />
<TABLE class=BL>
<TABLE class="ST" cellspacing="1">
<tr>
    <TH><DIV style="text-align: left;"><B>�����</B></DIV></TD>
    <TH><DIV style="text-align: center;"><B>�������� �����</B></DIV></TD>
</tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/dgsdsf.gif" border=0></td>
    <td><B> ������ ������ (��� 1)</B>   (�����: 1)<br />
<br />
<B>����: 500 ��. </B><br />
<B>��������� �����������:</B> <br />
� �������: 7 <br />
��������: 1 ��. <br />
<small>��������: <br />
��������� +1 �������������� ���� ��� �������. ������ ��� ����� ���� ����������� ���� ���� ���.<br />
<font color=brown>������� �� �������� �������</font></small><br />
 </td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/dgsdsf.gif" border=0></td>
    <td> <B> ������ ������ (��� 2)</B>   (�����: 1)<br />
<br />
<B>����: 1000 ��. </B><br />
�������������: 0/1 <br />
<B>��������� �����������:</B> <br />
� �������: 8 <br />
��������: 1 ��. <br />
<small>��������: <br />
��������� +1 �������������� ���� ��� �������. ������ ��� ����� ���� ����������� ���� ���� ���. ��� �������� ��������� ������ ������� ����.<br />
<font color=brown>������� �� �������� �������</font></small> <br />
</td>
  </tr>
<tr></tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/dgsdsf.gif" border=0></td>
    <td><B>������ ������ (��� 3)</B>   (�����: 1)<br />
<br />
<B>����: 2000 ��. </B><br />
�������������: 0/1 <br />
<B>��������� �����������:</B> <br />
� �������: 9 <br />
��������: 1 ��. <br />
<small>��������: <br />
��������� +1 �������������� ���� ��� �������. ������ ��� ����� ���� ����������� ���� ���� ���. ��� �������� ��������� ������ ������� ����. <br />
<font color=brown>������� �� �������� �������</font></small><br />
 </td>
  </tr>
<tr>
    <td><IMG SRC="http://bestcombats.net/news/i/dgsdsf.gif" border=0></td>
    <td><B>������ ������ (��� 4)</B>   (�����: 1)<br />
<br />
<B>����: 5000 ��.</B> <br />
�������������: 0/1 <br />
<B>��������� �����������:</B> <br />
� �������: 10 <br />
��������: 1 ��. <br />
<small>��������: <br />
��������� +1 �������������� ���� ��� �������. ������ ��� ����� ���� ����������� ���� ���� ���. ��� �������� ��������� ������ �������� ����.<br />
<font color=brown>������� �� �������� �������</font></small><br />
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