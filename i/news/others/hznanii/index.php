<?
	session_start();
	include "../../connect.php";
	$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$_COOKIE['uid']."' LIMIT 1;"));
	include "../../functions.php";
	$Get_Page="all_hznanii";
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html>
<head>
<link rel="icon" href="/i/favicon.ico" type="image/x-icon">
<link rel="shortcut icon" href="/i/favicon.ico" type="image/x-icon"> 
<meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
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
<TD><font color=white><?if(!empty($user['login'])){echo''.$user['login'].'&nbsp;['.$user['level'].']';}else{echo'����� ��';}?></font></TD></TR>
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
   <TD align=left background=/i/menu1at1.gif bgColor=#aa0000 style="padding-left:75px;"><A onmouseover="MM_swapImage('news','','/i/menu1at2.gif',1)" onclick=this.blur() onmouseout=MM_swapImgRestore() href="/"><IMG height=36 src="/i/menu1ps2.gif" width=47 border=0 name=news alt="�������"></A><A onmouseover="MM_swapImage('#','','/i/menu1at3.gif',1)" onclick=this.blur() onmouseout=MM_swapImgRestore() href="#"><IMG height=36 src="/i/menu1ps3.gif" width=42 border=0 name="history" alt="�������"></A><A onmouseover="MM_swapImage('status','','/i/menu1at4.gif',1)" onclick=this.blur() onmouseout=MM_swapImgRestore() href="/status/"><IMG height=36 src="/i/menu1ps4.gif" width=42 border=0 name="status" alt="��������� ��������"></A><A onmouseover="MM_swapImage('gallery','','/i/menu1at5.gif',1)" onclick=this.blur() onmouseout=MM_swapImgRestore() href="#"><IMG height=36 src="/i/menu1ps5.gif" width=42 border=0 name="gallery" alt="�������"></A><A onmouseover="MM_swapImage('vote','','/i/menu1at7.gif',1)" onclick=this.blur() onmouseout=MM_swapImgRestore() href="#"><IMG height=36 src="/i/menu1ps7.gif" width=41 border=0 name="vote" alt="�����������"></A><A onmouseover="MM_swapImage('inwork','','/i/menu1at8.gif',1)" onclick=this.blur() onmouseout=MM_swapImgRestore() href="#"><IMG height=36 src="/i/menu1ps8.gif" width=41 border=0 name="inwork" alt="� ����������"></A><A onmouseover="MM_swapImage('release','','/i/menu1at9.gif',1)" onclick=this.blur() onmouseout=MM_swapImgRestore() href="#"><IMG height=36 src="/i/menu1ps9.gif" width=48 border=0 name="release" alt="������� �������������"></A></TD>
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
  <div style="padding: 0px 3px 5px 3px"><a href="http://www.bestcombats.net">������� ��������</a></div>
  
  <div style="padding: 0px 3px 5px 3px"><a href="http://forum.bestcombats.net/">�����</a></div>
  
  <div style="padding: 0px 3px 5px 3px"><a href="http://support.bestcombats.net/">Support</a></div>
  
  <div style="padding: 0px 3px 5px 3px"><a href="#">��������</a></div>
  
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
<TABLE width="98%" align=center border=0>
<TBODY>
<TR>
<TD class=normaltext align=left valign="top">
 
<div class="page_title"><B>�� � ����� ������</B></div>
 
<HR align=center width="90%" color=#aa0000 noShade SIZE=0.1><TABLE width=100% border="0">

																										  
</TD>
<div class=main_body id=main_body ><div class=dotted_border><div class=graphic_block><h3><span class=right></span></h3><div class=body><center><img src='http://bestcombats.net/news/i/abbadon.jpg' alt='' title=''></center>
<br />
<br />
<b>11</b>-�� <b>�������� 2007-�� </b>���� � <img src='http://img.combats.ru/i/misc/forum/fo11.gif' alt='' title=''><b>Abandoned Plain</b> ��������� ����� ������� - <b>���� ������.</b><br />
<br />
<p>
<br />
<font size='1'>� ������������ ��� � Abaddoned Plans ������ ���� ����� ���� ������. ��� ��������� ������� ������� ������� ������� ����� ���.</p>
<br />
<p><u>������� ���������� � �����.</u></p>
<p>���� � ��� ������������ ��������, ���������� ����������� ����������. ��� ��������� ��� ����������� ����� � �������� � ���� ����� �� ����. ���������� ����� ������ ����, ������� � 4-��� ������, � ������ �������� ����� �������� ����������. </p>
<p>��� �������������� �������, ��� ������ �� ���� ����� ���������� ���� � ��� ����� ������� ������� ������ ����������� ��� �� ����������. ��� ������ ����, ��� ������ ������, ��� ����������� ������� ��������. ������ ������ ������������ ���� ��� ��������� ����� ���������� ���������� ������� �������������. ��� � �����, ���� ��������� ������ � ���� ����� �������, �� ����� ����������� ���� �� �����, � ������� ������� ����� ������. ���� �� ���� ���� �� ��������� � ������, ��� ��� �� ����� ���������� ��� ���������, ���, �� ����������� �������� ������ �����������.</p>
<br />
<p><u>��� ���� ������� ��� �������?</u></p>
<p>- ����������� ���������� ����������� � �������� ��������� � ������� ��� ����;</p>
<p>- ����������� �������� ������ �������������� ����� ����� �� ������ �����</p>
<br />
<p><u>���������� ���.</u></p>
<p>���� ��������� ��� ����������� (�����������) ����� � ����� ������. �� ����� ����������� ���������� ������ ��� ���������� ������� ������������� ������ ��������� � ����� ������ . ��� ���� ���������, ��� ����� ������ ���� ����� ������� �� ���� � ������, ���� ���� ������ �������������� ������� ������������� ��������.</p>
<br />
<p><u>������� ���.</u></p>
<p>����� ���� ����� ������ ��������, ����� ������� ������. �� ���� ��� ����� ����� ���������� ���� ���� ��� �� �����, �� � ������� ������������ ������ ���������� �������. ����� �������, ����� ����� ��������� ���� � ����� ����������� ������ �����������.</p>
<br />
<p><b>��������� �������:</b></p>
<p>- ��������� ����������� ���������� �����, ���������� �� ����������, ����� ��� � �������� ������.</p>
<p>- ���������� � �������� ������ �����: ����, ������, ��������, �����, ����, ������, ������, ������, ������, �������.</p>
<p>- ������������ �������� ����, ����� �������� ������ ��� ������ ����� (���� � ����� �� �������� ���� �����)</p>
<br />
<p>����� � �������������, � �� �������� ��������� ��������� ������.</p></font></div>
<br />
<br />
<p><b>�����, ������������!!!</b> <i>����, ������� �� ����� ����� �� � ���� ����������, ��� �� �� ����� ��������������  �������� ��� ��������� </i><b>���� ������ </b><i>� ��� ���� �� �����.</i> </p>
<br />
<p><i>��� �� �� ������� ���� ������������ �������  � �� �������������� �� ��� ���, �� � ���� �������� ��������� ��������� �� </i><b>�����</b>. </p>
<br />
<p><i>����, �������.</i></p>
<br />
������� ��� ����� ����� �� ������, � ����������� � <img src='http://img.combats.ru/i/misc/forum/fo11.gif' alt='' title=''><b>Abandoned Plain</b>. ��� �� ��� �� ����� ������� � ������������ � <b>���� ������</b>, ��� ��� ��������� <b>��������� ������</a></b>, ����������� � ������� ��� �� ��� ������. <br />
<br />
� ������ ��!<div id='h2' class=hidden><br />
<br />
� <b>��� �� ���� �����������?</b><br />
���� � ���, ��� ��, ��������� ������, ������� ������ ��������� ����� ���������� � �����, ��������� ������ ����� � ������������ ������������... ������� �� ����� �������� ����� �����, � ��������� ��������� � ������ ����������� ��� ����� ����� �������� � ���������. ���� ������ ����� ������ ����� ��������������� ���, ��� ����� ��� ��������. �� ����� ���� ����������� ������� ��� ���� ����. ��� ������������ ��������.<br />
<br />
� <b>������, ��������, ��� �� ����� �����������?</b><br />
���� ���������� � ������ ������ �����, ��� ��� �����, ���������� ����� ������. ������ ��� �������� ������� �������� ���������� ������� ���������. �� ��������� ��������� ������� ���� �� ����� � ��������� �� � ����. ��� ���� ����� ������������ ��� �������� ������ ���������, ��� ��������� �� ������, ������� ���� ��������. ��� ��� �� �������� ������ �������� � ����, ���� �� ��������� ��������� � ����� �����.<br />
<br />
� <b>� ����� ������ ����?</b><br />
��� �������� �������� ���������� ��������� ���, �� ���� �� ���������� ��� ����� �������: �� ��������� ����, ����� � ����. � ���������� ��������� �������������, ���� �����������, ��� ���� ���������� �������� ���� ����, ����� ���������� ����, � ���� - ��� ���������, ��� ������� ���� �������������. ����� ����, ������, ����� �����, ��� ����������� ���������� ����, ����� ������ ��������� � ���������� ���������� �����.<br />
<br />
� <b>�� ����� ����� ����� �������� ����?</b><br />
����������� ����� � ����� ���� �������� ����������� ����, ����� ���������� �� ������� � �������� ����. ���� ���� �������, ��� ��� �������������� �������, ��� ������ ������ ���������� ��� � ������ ����. ������� ���������� ���� �� ���� ����� ������ � ������ ������ �����. ��� ����� �� ������ ��������������� �������, ������� �����.<br />
<br />
� <b>�������� � ���������� ���.</b><br />
���� - ��� ������������ ��������, ���������� ������������� ����������. � ���� ������ �� ������, ��� ������� ����� �������� ��� ���� ����� ����� � ����� ���� ��� �� �����, �� ���� �������. ������ ���� �����, ����� �������� ���� � ����� ���������������� ����������. ����������� ���� ����������� � ���������� ��� �� ������ �� ������ ������.<br />
<br />
� <b>��� ��� �������� ��������� � ����� ������?</b><br />
�� ������ �������� ���� ��������� � ����� ������ ������ ����� ������������ ����� � �������� �����. ��� ����� ���� ������������ ������, ������� �� ������ �������� ��� �������� ���, ��� �� ������������ ����������. ��������� ����� ��������� ��������� � ��������� � ���������� ��� �������������, � �� ������ ����� ���� ���������� ����� ����������� ���������� ��������.<br />
<br />
� <b>��� �� ������ �����?</b><br />
����������� ����� � ����� ���� �������� ����������� ����, ����� ���������� �� ������� � �������� ����. ���� ���� �������, ��� ��� �������������� �������, ��� ������ ������ ���������� ��� � ������ ����. ������� ���������� ���� �� ���� ����� ������ � ������ ������ �����. ��� ����� �� ������ ��������������� �������, ������� �����.<br />
<br />
� <b>��� �� ������ ������?</b><br />
���� - ��� ������������ ��������, ���������� ������������� ����������. � ���� ������ �� ������, ��� ������� ����� �������� ��� ���� ����� ����� � ����� ���� ��� �� �����, �� ���� �������. ������ ���� �����, ����� �������� ���� � ����� ���������������� ����������. ����������� ���� ����������� � ���������� ��� �� ������ �� ������ ������.<br />
<br />
� <b>�������, � ������ ���. (��������� ��������)</b></div>
<br />
<br />
<p><i>��������� � ����������, �� �������� �� ���� <b>�������</b>, � <b>������ �������.</b> � ����� �� ��� ��� ����� �������� �� ??? � ������ ���������� � �������� ������. �����������, ��� �� �� ����� ��������������� <b>������</b> �� ������ ��������� �� ����� <b>������ �������</b> ������ ������ ������������ �������. ��� ����� �� ������ � ���� ����������� � <b>����������� �����������</b> � ������� �� ��� ���� �� ������ �� ����� �����, ��� ����� ���������� � ����� ����� <b>������� ����� ������������ ���.</b>  </i></p>
<br />
<a class=hide_link href="javascript:hideIt('h3','������','�������.','l3')" id='l3'>�������.</a><div id='h3' class=hidden><br />
<br />
<b>��</b><br />
<img src='http://bestcombats.net/news/i/empty_rune_vial.gif' alt='' title=''> - <b>������ �������</b><br />
<br />
<b>�����</b><br />
<img src='http://bestcombats.net/news/i/full_rune_vial.gif' alt='' title=''> - <b>������� � �������</b></div>
<br />
<br />
<p>��, ���, �������, �� ����� �� ����� ������� � ������� � ������ ����� � ���������.</p>
<p>��������� ��������� ��� � �������������� ������, ���������� ��� � ��������� ������������ ����� ��������, �������������� �� ��� ������� �� ���������. </p>
<p>����� �� ��� ������������� ������, ��� ����� ��������������� ���������� ����, � � �����, ��� ����� ����� ������������� ����.</p>
<br />
<center><img src='http://bestcombats.net/news/i/hram.jpg' alt='' title=''></center>
<br />
<b>������ �� � ���� ���������� � �����, ��� �������� ������������� ����� �������.</b><br />
<br />
<b><font color='red'>������ � ����, ��� �� �� ����� �������� ���� � ��� ��� ����� ����������:</font></b><br />
- ��������, ������� ���������� �������,  ������ ���� �� ���� <b>4 ������</b>, ��� � ������������ �������. <br />
- ������������ �� ��� ��������, ��� �������� ������������ ���������: <b>����, ������, ��������, �����, ����, ������, ������, ������, ������, �������.</b><br />
- �� ������������: ���, ��� �� ������ � ���� ���������. <br />
- ���� ����� ���������� ��������� �����  <img src='http://img.combats.ru/i/destiny.gif' alt='' title=''>�������,  <img src='http://img.combats.ru/i/podarok.gif' alt='' title=''>����������, ��������� �� ����, "������", ��������� � �����������, ���� ��  <img src='http://img.combats.ru/i/align50.gif' alt='' title=''>�������.<br />
- �� ��������� ���������� ����������� � ������� �������� ����, �������� �����������,  <img src='http://img.combats.ru/i/artefact.gif' alt='' title=''>���������.<br />
<br />
<b><font color='red'>����������� ������������ ����� � ���:</font></b><br />
- <b>������� </b>����������� ���� ������ �� ������� ����. ������, � ��������� ������������ �� ����� �������� ������ ���������� ����� �������������� ����.<br />
- <b>��� </b>����������� ���� �� ������ �� ��, ����� ���� ���������: ���� ���������� ����, �� ����������� �������� ���� �� ����.<br />
- <b>���������</b> ������������ ���� �� ������ �� ����.<br />
- <b>�������������</b> �� ������ �� ������� ����<br />
- <b>���������</b> ������������� ���� �� ������ �� ��������� ����.<br />
<br />
<b><font color='red'>��������:</font></b><br />
- ��������� �� ������ �� ����������� ��������.<br />
- ������� ��������� �� ������ �� ����������� ���������� �����������.<br />
- �� ���������� ������� ���� � ������ ������� ����� � �����������.<br />
<br />
<font color='red'><b>����������:</b></font><br />
����������� <b>���������</b> ��� ��������� <b>���������� </b><img src='http://img.combats.ru/i/misc/znrune_1.gif' alt='' title=''><b>������� �����: 100. </b><img src='http://img.combats.ru/i/misc/znrune_2.gif' alt='' title=''><b>������� ����� - 1000.</b><br />
<br />
<b>������ ���� </b>���� ����������� ���������� ���� <b>�� 8-�� ������,</b> <b>������ - �� 10-��.</b><br />
�������� ������� � ����������� ������ ����� <b>�����������</b>: ����������� <b>�������� �������:</b> �� <b>���� </b>��������� ������� �������� <b>10</b> ���������. ����� �������,<img src='http://img.combats.ru/i/misc/znrune_1.gif' alt='' title=''><b> ������ </b>���� ��������� � <b>50</b> ���������, � <img src='http://img.combats.ru/i/misc/znrune_2.gif' alt='' title=''><b>������</b> - � <b>500</b>.<br />
<br />
<b>��������</b> �� ������� ����.<br />
<br />
<font color='red'><b>�������������� ���:</b></font><br />
- ����� �������������� ���� <b>�� �����������</b>, � �������� �� ����, <b>�� �������</b> ������� ��� ���, �� ������� �� �������.<br />
�� ���� �� ����� ��������� ������� ������� ���� �� ����� ������ - ������� ����� ��� �� ���������.<br />
- �������� ������������� ����, ���������� � ����� <b>������ �������</b>.<br />
- �������� ������������� ���� ������ ������.<br />
- <b>"���������"</b> ���� �� ���������� ������.<br />
- ���������� ��� �������������� ���� ����� <b>���� �� ������, �� ������ �� ���������.</b><br />
<br />
<font color='red'><b>���������:</b></font><br />
- ��������� ����� �������� <b>������ ��������� </b>��������.<br />
- ��� ����������� <b>����� ���������� </b>���� �������� ��������� ������� ����.<br />
- ��������� ����� �������� ��� ����������� ����� ���� ���� ������������ ������.<br />
- ��� ���� <b>�������</b> ��������, ��� ���� ���� �������� ���������.<br />
- ��� ����� ���� ����������� ���������.<br />
- �������� �� ���������� ������� ���� � ���������� ������ �� ����� ���.<br />
<br />
<br />
<font color='red'><b>���������� ���:</b></font><br />
- ���� ���������� �� ���� ���� ����� <b>��������</b> �� ������ - ��������� ���� <b>�������� </b>����������.<br />
- ����, �� ������� ��������� ����, <b>�����������</b> ����� <img src='http://img.combats.ru/i/destiny.gif' alt='' title=''><b>�������</b>.<br />
- ���� �� �������� <b>���������.</b><br />
- <b>�������</b> ����� �� <b>10</b>-�� ������� - "�������" �� ���� ��� ���? (���� ����������)<br />
��������� �����, ��� �������� ���� �� �� ����� �������, �.�. ���� ��������� ����������� � ���� ������. ������� ���� ����� ���������� �� 10-� �������.<br />
<br />
<b>������ ��������:</b>
<br />
<p><i>��� ���� ������� �� <b>����</b> ����.</p>
<p><b>������</b> ����� ��������� �� �������������� ���� � ������, ������������� �� ���� � ������� ���������� �������������.</p>
<p><b>������</b> ����� ������� �� ���� ������������. <b>������</b> ������������ - ������; <b>������</b> - ���������. ������ ��������� �� ���� ����, ��������� �� �������, ������� ���� ��������.</i></p>
<br />
<font color='red'><b>������ ����� � �����:</b></font><br />
<i><b>����</b> - ����, ����������;<br />
<b>���� </b>- ������, �������;<br />
<b>�����</b> - �����, ���������;<br />
<b>����</b> - �����, �������.</i><br />
<br />
<font color='red'><b>����� ������� �����:</b></font><br />
<i><b>(����)</b> - �������, ����� ������;<br />
<b>(����)</b> - �����������, ������� �� ����;<br />
<b>(����)</b>- ���������������, ������� ����.</i><br />
<br />
<font color='red'><b>��������� ������� �����:</b></font><br />
<i><b>[��]</b> - ������;<br />
<b>[��]</b> - ��������;<br />
<b>[��]</b> - ������;<br />
<b>[��]</b> - ��������;<br />
<b>[��]</b> - �������;<br />
<b>[��]</b> - �����;<br />
<b>[��]</b> - ����;<br />
<b>[��]</b> - ������;<br />
<b>[��]</b> - �����;<br />
<b>[��]</b> - ����.</i><br />
<br />
��������: ���� <b>���� (����)[��]</b> �������� �������� � ������� �����. <b>���� (����)[��]</b> - ����� �������� ����.<br />
<br />
<font color='green'><i><b>���� ��� ��������������, ����� ����� ���������� �� �������� ���� ������ ����, ��� �� ����, �������� ����������� �������. ��� �������� ��������, ������ � ����� ��������� ��� ���������� ������ ���� � ������ � ���� ����������.</b></i></font><br />
</div>
<br />
<br />
<i>����� ���������� <b>130</b> ��� �� ��� <b>10 ����� ����</b>, ���� ����� �����������, �� ���� ����������, ��� ����.</i><br />
<br />
<font color='red'><b>��������!</b></font><br />
<i>���� <b>�����</b> �� ����������� �� ������ ����������� <b>����� �������</b> � ����, �� �� � <b>������</b> ������� � <b>���. ��� </b>��� ����� � <b>�����</b>. </i><br />
<br />
<br />
<a class=hide_link href="javascript:hideIt('h5','��������','���� 4 ������.','l5')" id='l5'>���� 4 ������.</a><div id='h5' class=hidden><br />
<TABLE BORDER=5 width=100% align=center>
 <TR>
  <TH width=12%>-</TH>
  <TH width=22%><center><b>�����</b></center></TH>
  <TH width=22%><center><b>����</b></center></TH>
  <TH width=22%><center><b>����</b></center></TH>
  <TH width=22%><center><b>����</b></center></TH>
 </TR>
 <TR>
  <TD><center><b>���������</b></center></TD>
  <TD>� ��. �������� �������� �����: +1<br />
� ��. �������� ����� ����: +1<br />
� ��. ������������ �����: +5<br />
� ������ �� �������� �����: +5<br />
� ������ �� ����� ����: +5</TD>
  <TD>� ��. �������� �������� �����: +1<br />
� ��. �������� ����� ����: +1<br />
� ��. ������ ������������ �����: +5<br />
� ������ �� �������� �����: +5<br />
� ������ �� ����� ����: +5</TD>
  <TD>� ��. �������� �������� �����: +1<br />
� ��. �������� ����� �������: +1<br />
� ��. �����������: +5<br />
� ������ �� �������� �����: +5<br />
� ������ �� ����� �������: +5</TD>
  <TD>� ��. �������� ��������� �����: +1<br />
� ��. �������� ����� �����: +1<br />
� ��. ������ �����������: +5<br />
� ������ �� ��������� �����: +5<br />
� ������ �� ����� �����: +5</TD>
 </TR>
 <TR>
  <TD><center><b>������<br />
(������)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_0_1.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_1_1.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_2_1.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_3_1.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>������<br />
(��������)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_0_2.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_1_2.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_2_2.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_3_2.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>������<br />
(������)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_0_3.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_1_3.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_2_3.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_3_3.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>������<br />
(��������)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_0_4.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_1_4.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_2_4.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_3_4.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>������<br />
(������)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_0_5.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_1_5.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_2_5.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_3_5.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>������<br />
(�����)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_0_6.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_1_6.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_2_6.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_3_6.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>������<br />
(����)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_0_7.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_1_7.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_2_7.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_3_7.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>������<br />
(������)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_0_8.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_1_8.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_2_8.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_3_8.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>������<br />
(�����)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_0_9.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_1_9.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_2_9.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_3_9.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>������<br />
(����)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_0_10.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_1_10.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_2_10.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_0_3_10.gif' alt='' title=''></center></TD>
 </TR>
</table></div>
<br />
<br />
<a class=hide_link href="javascript:hideIt('h6','��������','���� 7 ������.','l6')" id='l6'>���� 7 ������.</a><div id='h6' class=hidden><TABLE BORDER=5 width=100% align=center>
 <TR>
  <TH width=12%>-</TH>
  <TH width=22%><center><b>�����</b></center></TH>
  <TH width=22%><center><b>����</b></center></TH>
  <TH width=22%><center><b>����</b></center></TH>
  <TH width=22%><center><b>����</b></center></TH>
 </TR>
 <TR>
  <TD><center><b>���������</b></center></TD>
  <TD>� ��������: +1 <br />
� ��. �������� �������� �����: +3<br />
� ��. �������� ����� ����: +3<br />
� ��. ������������ �����: +10<br />
� ������ �� �������� �����: +10<br />
� ������ �� ����� ����: +10</TD>
  <TD>� ��������: +1 <br />
� ��. �������� �������� �����: +3<br />
� ��. �������� ����� ����: +3<br />
� ��. ������ ������������ �����: +10<br />
� ������ �� �������� �����: +10<br />
� ������ �� ����� ����: +10</TD>
  <TD>� ���������: +1 <br />
� ������� ����: +10 <br />
� ��. �������� �������� �����: +3<br />
� ��. �������� ����� �������: +3<br />
� ��. �����������: +10<br />
� ������ �� �������� �����: +10<br />
� ������ �� ����� �������: +10 </TD>
  <TD>� ����: +1 <br />
� ������� ����� (HP): +10<br />
� ��. �������� ��������� �����: +3<br />
� ��. �������� ����� �����: +3<br />
� ��. ������ �����������: +10<br />
� ������ �� ��������� �����: +10<br />
� ������ �� ����� �����: +10</TD>
 </TR>
 <TR>
  <TD><center><b>������<br />
(������)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_0_1.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_1_1.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_2_1.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_3_1.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>������<br />
(��������)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_0_2.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_1_2.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_2_2.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_3_2.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>������<br />
(������)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_0_3.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_1_3.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_2_3.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_3_3.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>������<br />
(��������)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_0_4.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_1_4.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_2_4.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_3_4.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>������<br />
(������)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_0_5.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_1_5.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_2_5.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_3_5.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>������<br />
(�����)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_0_6.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_1_6.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_2_6.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_3_6.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>������<br />
(����)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_0_7.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_1_7.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_2_7.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_3_7.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>������<br />
(������)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_0_8.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_1_8.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_2_8.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_3_8.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>������<br />
(�����)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_0_9.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_1_9.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_2_9.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_3_9.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>������<br />
(����)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_0_10.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_1_10.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_2_10.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_1_3_10.gif' alt='' title=''></center></TD>
 </TR>
  </table></div>
<br />
<br />
<a class=hide_link href="javascript:hideIt('h7','��������','���� 9 ������.','l7')" id='l7'>���� 9 ������.</a><div id='h7' class=hidden><br />
<TABLE BORDER=5 width=100% align=center>
 <TR>
  <TH width=12%>-</TH>
  <TH width=22%><center><b>�����</b></center></TH>
  <TH width=22%><center><b>����</b></center></TH>
  <TH width=22%><center><b>����</b></center></TH>
  <TH width=22%><center><b>����</b></center></TH>
 </TR>
 <TR>
  <TD><center><b>���������</b></center></TD>
  <TD>� ��������: +2 <br />
� ��. �������� ����� ������: +3<br />
� ��. �������� �������� �����: +5<br />
� ��. �������� ����� ����: +5<br />
� ��. �������� ����. �����: +5<br />
� ��. ������������ �����: +20<br />
� ������ �� �������� �����: +20<br />
� ������ �� ����� ����: +20</TD>
  <TD>� ��������: +2 <br />
� ��. ����������: +5<br />
� ��. �������� �������� �����: +5<br />
� ��. �������� ����� ����: +5<br />
� ��. ������ ������������ �����: +20<br />
� ������ �� �������� �����: +20<br />
� ������ �� ����� ����: +20 <br />
� ������ �� �����: +10</TD>
  <TD>� ���������: +2 <br />
� ������� ����: +20 <br />
� ��. �����������: +3<br />
� ��. �������� �������� �����: +5<br />
� ��. �������� ����� �������: +5<br />
� ��. �����������: +20<br />
� ������ �� �������� �����: +20<br />
� ������ �� ����� �������: +20</TD>
  <TD>� ����: +2<br />
� ������ �� �����: +10<br />
� ������� ����� (HP): +20<br />
� ��. �������� ��������� �����: +5<br />
� ��. �������� ����� �����: +5 <br />
� ��. �������� �����: +3<br />
� ��. ������ �����������: +20<br />
� ������ �� ��������� �����: +20<br />
� ������ �� ����� �����: +20</TD>
 </TR>
 <TR>
  <TD><center><b>������<br />
(������)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_0_1.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_1_1.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_2_1.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_3_1.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>������<br />
(��������)<br />
</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_0_2.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_1_2.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_2_2.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_3_2.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>������<br />
(������)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_0_3.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_1_3.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_2_3.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_3_3.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>������<br />
(��������)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_0_4.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_1_4.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_2_4.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_3_4.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>������<br />
(������)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_0_5.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_1_5.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_2_5.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_3_5.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>������<br />
(�����)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_0_6.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_1_6.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_2_6.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_3_6.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>������<br />
(����)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_0_7.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_1_7.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_2_7.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_3_7.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>������<br />
(������)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_0_8.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_1_8.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_2_8.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_3_8.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>������<br />
(�����)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_0_9.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_1_9.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_2_9.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_3_9.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center><b>������<br />
(����)</b></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_0_10.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_1_10.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_2_10.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_2_3_10.gif' alt='' title=''></center></TD>
 </TR>
  </table>
</div>
<br><br />
<a class=hide_link href="javascript:hideIt('h8','��������','����� ����.','l8')" id='l8'>����� ����.</a><div id='h8' class=hidden><br />
<TABLE BORDER=5 width=100% align=center>
 <TR>
  <TH width=20%><center><b>��������</b></center></TH>
  <TH width=20%><center><b>�������</b></center></TH>
  <TH width=20%><center><b>��������</b></center></TH>
  <TH width=20%><center><b>���������</b></center></TH>
  <TH width=20%><center><b>�������</b></center></TH>
 </TR>
 <TR>
  <TD><center><img src='http://img.combats.ru/i/items/rune_super_6.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_super_7.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_super_8.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_super_9.gif' alt='' title=''></center></TD>
  <TD><center><img src='http://img.combats.ru/i/items/rune_super_10.gif' alt='' title=''></center></TD>
 </TR>
 <TR>
  <TD><center>� ��. �������� ����� ������: +5</center></TD>
  <TD><center>� ��������: +4</center></TD>
  <TD><center>� ����: +4</center></TD>
  <TD><center>� ��������: +4</center></TD>
  <TD><center>� ���������: +4</center></TD>
 </TR>
   </table>
<br />
<TABLE BORDER=5 width=100% align=center>
 <TR>
  <TH width=20%></TH>
  <TH width=20%><center><b>������</b></center></TH>
  <TH width=20%></TH>
  <TH width=20%><center><b>�������</b></center></TH>
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
  <TD><center>� ������ �� �����: +25</center></TD>
  <TD><center>� ������ �� �����: +25</center></TD>
  <TD><center>� ������� ����� (HP): +50</center></TD>
  <TD><center>� ������� ����: +50</center></TD>
  <TD><center>� ��. �������� �����: +5</center></TD>
 </TR>
   </table>
<font color='red'><b>��������! ��� ����� ���� ������� <img src='http://img.combats.ru/i/destiny.gif' alt='' title=''>����� ������� � ���� ��� � ������.</b></font><br />
</div>
<br />
<br><br />
<img src='http://img.combats.ru/i/items/runetoken.gif' alt='' title=''> <a class=hide_link href="javascript:hideIt('h9','��������','�������� ������.','l9')" id='l9'>�������� ������.</a><div id='h9' class=hidden><br />
�������������: 0/1<br />
��������:<br />
����� ���� ������������ �� ������ ����� ������.<br />
������� � Emeralds city<br />
������� �� �������� �������<br />
<br />
<font color='red'>��� ����� � ����� ������ ��� +10 ���������.</font><br />
</div>
<br><br />
<font color='green'><i><b>��� � ������� ���� ������� � ����� �����, ���� ��� ���������, � �� ������ ����� ������. �������� ���������� ����������� ������ �� ��������. </b></i></font><br />

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