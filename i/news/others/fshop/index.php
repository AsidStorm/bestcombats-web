<?
	session_start();
	include "../../connect.php";
	$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$_COOKIE['uid']."' LIMIT 1;"));
	include "../../functions.php";
	$Get_Page="all_fshop";

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
 
<div class="page_title"><B>��������� �������</B></div>
<HR align=center width="90%" color=#aa0000 noShade SIZE=0.1><TABLE width=100% border="0">													  														  
</TD>
</tr>
<tr>
<td>

<center> <h3>������������</h3></center><p>
<!--����� ���������� ��������-->
<b>����� ���������� ��������:<br><br></b>
<img src="http://bestcombats.net/news/i/flowers-9.jpg" alt=""><br>
<ul><li> ����� ���. ����� ������ ���������� �����, ����� �� �������.(��.�.1)<br>
<li> ����������� ������. ������ �� ���������� ����������� ������. (��.�.2)<br>
<li> �������� �����. ����� �� ������ �������� �����. (��.�.5)<br></ul>
<br><!--������� ����������� ������-->

<b>������� ����������� ������:<br></b>
<ul>
<li> ����� ������ � ������ ������ 1, 3, 5, 7, 9 ��� 21.
<li> ������ ������������ ������ �� ������ ������ ����.<br>
<li> �� ����� �������� � ����� ������ ��������� ��������.<br>
<li> ������ ��������� �����, ���� �������� ���� � ������.
<li> ������ ����� �������� ������ ����������, ��������� 4 ������.<br>
<li> ������������ �������� �������: ���������� ������ � ����� �����.<br>
<li> ����� ������������� ������ ����������� ������������ ��� ����������� ������.<br>

<br>
<br>
<!--����������� ������-->
<b>����� ����������� ������.</b><br><br>

<b>1. ������� ��������� ������:<br></b>
<br><img src="http://bestcombats.net/news/i/flowers-1.jpg" alt=""><br><br>
<ul>
<li> ��� ������� ������� ���������� ������ ����������� "+", � ����������� ���� ������� ���������� ������, ������� ������� ����������.<br>
<li> �� ��������, ��� ����� ����� ������� ������ �� ������ ������ ����.
</ul>

<b>2. ����� � ���������� ��������� � �����:<br></b>
<br><img src="http://bestcombats.net/news/i/flowers-8.jpg" alt=""><br>
<ul><li> ��� �������� ���������� ���������� ������ ����������� "+", � ����������� ���� ������� ���������� ������, �� �������� ����� �������� �����.<br>
<li> ��������� ����� ������������� ������. (��. �������)<br>
</ul>


<b>3. �������� ����������� ������:<br></b>
<br><img src="http://bestcombats.net/news/i/flowers-6.jpg" alt=""><br>
<ul>
<li> ��������� ���������� ������.<br>
<li> ��������� ������� ����� � ������������ �� ��� ���������� ������ (��. �������).<br>
<li> ���� ���-�� �� ���������, �� ���������� ������ "������".<br>
<li> ���� ��� �������, �� ������� "������� �����".
</ul>

<b>4. ��������� ��������� ������ �����:<br></b>
<br><img src="http://bestcombats.net/news/i/flowers-7.jpg" alt=""><br>
<ul>
<li> ���� �������� ���-�� ��������, �� ����� ��� ���������� � ��������� � ������ 5.<br>
<li> ���� � ��� ���-�� ��-�������, �� �������� ����������� ��� � ������������ ��������� ���������� ������.
</ul>

<b>5. ��������� ����� � ����� �����:<br></b>
<br><img src="http://bestcombats.net/news/i/flowers-5.jpg" alt=""><br>
<ul>
<li> ����� � ��� � ������� � ������ �������� ����� ��� ��� ����������� � ��������:<br>
 1. ��������� ��� �����, �������� ����� ��������� �����.<br>
 2. ����� �����, ������� ����� ������������ ��� ��������� ������� ���� �� �����(�� ����� 60 ��������).<br>
 3. ��������� ��, ��� ����� ������ ������ ���, ���� �� ���������� �����.<br>
 4. ��������, ��� ����� �������� ��� �����.<br>
 5. ������� �� ������ "��������" ��� �������, ������� ����� ��������.
<li> ����� ��������� ������ ��� ����� �������� ��������� �� ������.
<br><br><img src="http://bestcombats.net/news/i/flowers-62.jpg" alt="">
</ul>


<b>�������� ������������� ������:<br></b>
<br><img src="http://bestcombats.net/news/i/flowers-4.jpg" alt=""><br>
<ul>
<li> ��� ����� ��������� ���������� ����, ���� �������� �����.<br>
<li> ��� ��������� ������� �� ������ ������� ������ ���� �� �����.<br>
<li> �������� ����, ��� �� ������ ��� �������.<br>
<li> ������� �� ��������.
</ul>


<!--����������� ������� �������-->

<br>
<b>������� ����������� �������:</b>
<br>
<p><table align=center width=95% bgcolor=#eeeeee cellSpacing=1 cellPadding=4 border=0>

<!--�����-->
<tr bgcolor=#f1f1f1 align=center><td class=medium>���������� ������ � ������</td>
<td class=medium>3</td>
<td class=medium>5</td>
<td class=medium>7</td>
<td class=medium>9</td>
<td class=medium>21</td></tr>
<tr bgcolor=#f1f1f1 align=center><td>-</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/f_design1.gif" alt=""><br>����� 1<br>����: 0,1 ��.</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/f_design2.gif" alt=""><br>����� 2<br>����: 0,3 ��.</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/f_design3.gif" alt=""><br>����� 3<br>����: 0,5 ��.</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/f_design4.gif" alt=""><br>����� 4<br>����: 1 ��.</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/f_design5.gif" alt=""><br>����� 5<br>����: 5 ��.</td></tr>

<!--��������-->

<tr bgcolor=#f1f1f1 align=center valign=top><td class=medium><b>�������</b><br><img src="http://img.bestcombats.net/i/sh/f_tulip.gif" alt=""><br>����: 5 ��.<br>���� �����: 3 ���</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/tulip3.gif" alt="����� ��������� 3"><br>����: 15,1 ��.<br>� ����������� ��������� �����������: +1<br>� ������������ ��������� �����������: +3</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/tulip5.gif" alt="����� ��������� 5"><br>����: 25,3 ��.<br>� ����������� ��������� �����������: +1<br>� ������������ ��������� �����������: +5</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/tulip7.gif" alt="����� ��������� 7"><br>����: 35,5 ��.<br>� ����������� ��������� �����������: +1<br>� ������������ ��������� �����������: +7</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/tulip9.gif" alt="����� ��������� 9"><br>����: 46 ��.<br>� ����������� ��������� �����������: +1<br>� ������������ ��������� �����������: +9<br>� ��. ����������� (%): +1</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/tulip21.gif" alt="����� ��������� 21"><br>����: 110 ��.<br>� ����������� ��������� �����������: +1<br>� ������������ ��������� �����������: +21<br>� ��. ����������� (%): +5</td></tr>

<!--��������-->

<tr bgcolor=#f1f1f1 align=center valign=top><td class=medium><b>�������</b><br><img src="http://img.bestcombats.net/i/sh/f_narcissus.gif" alt=""><br>����: 5 ��.<br>���� �����: 5 ����</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/narcissus3.gif" alt="����� ��������� 3"><br>����: 15,1 ��.<br>� ����������� ��������� �����������: +1<br>� ������������ ��������� �����������: +3</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/narcissus5.gif" alt="����� ��������� 5"><br>����: 25,3 ��.<br>� ����������� ��������� �����������: +1<br>� ������������ ��������� �����������: +5</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/narcissus7.gif" alt="����� ��������� 7"><br>����: 35,5 ��.<br>� ����������� ��������� �����������: +1<br>� ������������ ��������� �����������: +7 </td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/narcissus9.gif" alt="����� ��������� 9"><br>����: 46 ��.<br>� ����������� ��������� �����������: +1<br>� ������������ ��������� �����������: +9<br>� ��. ������ ����������� (%): +2</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/narcissus21.gif" alt="����� ��������� 21"><br>����: 110 ��.<br>� ����������� ��������� �����������: +1<br>� ������������ ��������� �����������: +21<br>� ��. ������ ����������� (%): +5</td></tr>

<!--����������-->

<tr bgcolor=#f1f1f1 align=center valign=top><td class=medium><b>����������</b><br><img src="http://img.bestcombats.net/i/sh/f_chrysanthemum.gif" alt=""><br>����: 7 ��.<br>���� �����: 3 ���</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/chrysanthemum3.gif" alt="����� ��������� 3"><br>����: 21,1 ��.<br>� ����������� ��������� �����������: +2<br>� ������������ ��������� �����������: +6</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/chrysanthemum5.gif" alt="����� ��������� 5"><br>����: 35,3 ��.<br>� ����������� ��������� �����������: +2<br>� ������������ ��������� �����������: +6</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/chrysanthemum7.gif" alt="����� ��������� 7"><br>����: 49,5 ��.<br>� ����������� ��������� �����������: +2<br>� ������������ ��������� �����������: +10</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/chrysanthemum9.gif" alt="����� ��������� 9"><br>����: 64 ��.<br>� ����������� ��������� �����������: +2<br>� ������������ ��������� �����������: +12<br>� ��. ������������ ����� (%): +5</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/chrysanthemum21.gif" alt="����� ��������� 21"><br>����: 152 ��.<br>� ����������� ��������� �����������: +2<br>� ������������ ��������� �����������: +24<br>� ��. ������������ ����� (%): +10</td></tr>

<!--���������-->

<tr bgcolor=#f1f1f1 align=center valign=top><td class=medium><b>���������</b><br><img src="http://img.bestcombats.net/i/sh/f_hydrangea.gif" alt=""><br>����: 10 ��.<br>���� �����: 10 ����</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/hydrangea3.gif" alt="����� ��������� 3"><br>����: 30,1 ��.<br>� ����������� ��������� �����������: +3<br>� ������������ ��������� �����������: +7</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/hydrangea5.gif" alt="����� ��������� 5"><br>����: 50,3 ��.<br>� ����������� ��������� �����������: +3<br>� ������������ ��������� �����������: +9</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/hydrangea7.gif" alt="����� ��������� 7"><br>����: 70,5 ��.<br>� ����������� ��������� �����������: +3<br>� ������������ ��������� �����������: +11</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/hydrangea9.gif" alt="����� ��������� 9"><br>����: 91 ��.<br>� ����������� ��������� �����������: +3<br>� ������������ ��������� �����������: +13<br>� ��. ����������� (%): +10</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/hydrangea21.gif" alt="����� ��������� 21"><br>����: 215 ��.<br>� ����������� ��������� �����������: +3<br>� ������������ ��������� �����������: +25<br>� ��. ����������� (%): +10<br>� ��. ������ ����������� (%): +10</td></tr>

<!--Ƹ���� ����-->

<tr bgcolor=#f1f1f1 align=center valign=top><td class=medium><b>������ ����</b><br><img src="http://img.bestcombats.net/i/sh/f_yrose.gif" alt=""><br>����: 10 ��.<br>���� �����: 7 ����</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/yrose3.gif" alt="����� ������ ��� 3"><br>����: 30,1 ��.<br>� ����������� ��������� �����������: +3<br>� ������������ ��������� �����������: +7</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/yrose5.gif" alt="����� ������ ��� 5"><br>����: 50,3 ��.<br>� ����������� ��������� �����������: +3<br>� ������������ ��������� �����������: +9</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/yrose7.gif" alt="����� ������ ��� 7"><br>����: 70,5 ��.<br>� ����������� ��������� �����������: +3<br>� ������������ ��������� �����������: +11</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/yrose9.gif" alt="����� ������ ��� 9"><br>����: 91 ��.<br>� ����������� ��������� �����������: +3<br>� ������������ ��������� �����������: +13<br>� ��. ������ ������������ ����� (%): +5</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/yrose21.gif" alt="����� ������ ��� 21"><br>����: 215 ��.<br>� ����������� ��������� �����������: +3<br>� ������������ ��������� �����������: +25<br>� ��. ������ ������������ ����� (%): +10</td></tr>

<!--������-->

<tr bgcolor=#f1f1f1 align=center valign=top><td class=medium><b>�����</b><br><img src="http://img.bestcombats.net/i/sh/f_lotus.gif" alt=""><br>����: 10 ��.<br>���� �����: 5 ����</td>
<td><img src="http://img.bestcombats.net/i/sh/fp_lotus_3sdcfse.gif" alt="����� ������� 3"><br>����: 30,1 ��.<br>� ����������� ��������� �����������: +1<br>� ������������ ��������� �����������: +3</td>
<td><img src="http://img.bestcombats.net/i/sh/fp_lotus_5.gif" alt="����� ������� 5"><br>����: 50,3 ��.<br>� ����������� ��������� �����������: +2<br>� ������������ ��������� �����������: +5</td>
<td><img src="http://img.bestcombats.net/i/sh/fp_lotus_7vsw.gif" alt="����� ������� 7"><br>����: 70,5 ��.<br>� ����������� ��������� �����������: +4<br><br>� ������������ ��������� �����������: +8<br>� ��. ����������� (%): +10</td>
<td><img src="http://img.bestcombats.net/i/sh/fp_lotus_9verg.gif" alt="����� ������� 9"><br>����: 91 ��.<br>� ����������� ��������� �����������: +5<br><br>� ������������ ��������� �����������: +15<br>� ��. ����������� (%): +10</td>
<td><img src="http://img.bestcombats.net/i/sh/fp_lotus_21svs.gif" alt="�����"><br>����: 215 ��.<br>� ����������� ��������� �����������: +5<br><br>� ������������ ��������� �����������: +20<br>� ��. ����������� (%): +15<br><br>� ��. ������ ����������� (%): +10</td></tr>

<!--�������-->

<tr bgcolor=#f1f1f1 align=center valign=top><td class=medium><b>������</b><br><img src="http://img.bestcombats.net/i/sh/fp_landish1.gif" alt=""><br>����: 8 ��.<br>���� �����: 3 ���</td>
<td><img src="http://img.bestcombats.net/i/sh/fp_landish3sdfsdf.gif" alt="����� �������� 3"><br>����: 24,1 ��.<br>� ����������� ��������� �����������: +1<br>� ������������ ��������� �����������: +3</td>
<td><img src="http://img.bestcombats.net/i/sh/fp_landish5.gif" alt="����� �������� 5"><br>����: 40,3 ��.<br>� ����������� ��������� �����������: +2<br>� ������������ ��������� �����������: +5</td>
<td><img src="http://img.bestcombats.net/i/sh/fp_landish7dv9.gif" alt="����� �������� 7"><br>����: 56,5 ��.<br>� ����������� ��������� �����������: +4<br><br>� ������������ ��������� �����������: +8<br>� ��. ������ ������������ ����� (%): +5</td>
<td><img src="http://img.bestcombats.net/i/sh/fp_landish9sd5qx.gif" alt="����� �������� 9"><br>����: 73 ��.<br>� ����������� ��������� �����������: +5<br><br>� ������������ ��������� �����������: +10<br>� ��. ������ ������������ ����� (%): +5<br><br>� ��. ������ ����������� (%): +10</td>
<td><img src="http://img.bestcombats.net/i/sh/fp_landish21d348j.gif" alt="����� �������� 21"><br>����: 173 ��.<br>� ����������� ��������� �����������: +7<br>� ������������ ��������� �����������: +15<br><br>� ��. ������ ������������ ����� (%): +15<br><br>� ��. ������ ����������� (%): +15</td></tr>

<!--��������-->

<tr bgcolor=#f1f1f1 align=center valign=top><td class=medium><b>��������</b><br><img src="http://img.bestcombats.net/i/sh/f_magnolia.gif" alt=""><br>����: 10 ��.<br>���� �����: 7 ����</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_magnolia3dg3f.gif" alt="����� �������� 3"><br>����: 30,1 ��.<br>� ����������� ��������� �����������: +3<br>� ������������ ��������� �����������: +5</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_magnolia5.gif" alt="����� �������� 5"><br>����: 50,3 ��.<br>� ����������� ��������� �����������: +3<br>� ������������ ��������� �����������: +7</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_magnolia7cvs9.gif" alt="����� �������� 7"><br>����: 70,5 ��.<br>� ����������� ��������� �����������: +3<br>� ������������ ��������� �����������: +10</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_magnolia9v34t.gif" alt="����� �������� 9"><br>����: 91 ��.<br>� ����������� ��������� �����������: +3<br>� ������������ ��������� �����������: +15<br>� ��. ����������� (%): +15</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_magnolia21gew3.gif" alt="����� �������� 21"><br>����: 215 ��.<br>� ����������� ��������� �����������: +3<br>� ������������ ��������� �����������: +25<br>� ��. ����������� (%): +15</td></tr>

<!--�����-->

<tr bgcolor=#f1f1f1 align=center valign=top><td class=medium><b>�����</b><br><img src="http://img.bestcombats.net/i/sh/f_lillyp.gif" alt=""><br>����: 10 ��.<br>���� �����: 7 ����</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_lillyp3.gif" alt="����� ����� 3"><br>����: 30,1 ��.<br>� ����������� ��������� �����������: +1<br>� ������������ ��������� �����������: +3</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_lillyp5.gif" alt="����� ����� 5"><br>����: 50,3 ��.<br>� ����������� ��������� �����������: +2<br>� ������������ ��������� �����������: +5</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_lillyp7lgfdd.gif" alt="����� ����� 7"><br>����: 70,5 ��.<br>� ����������� ��������� �����������: +2<br>� ������������ ��������� �����������: +10</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_lillyp9.gif" alt="����� ����� 9"><br>����: 91 ��.<br>� ����������� ��������� �����������: +4<br><br>� ������������ ��������� �����������: +14<br>� ��. ������������ ����� (%): +10<br><br>� ��. ����������� (%): +10</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_lillyp21mxx92.gif" alt="����� ����� 21"><br>����: 215 ��.<br>� ����������� ��������� �����������: +5<br><br>� ������������ ��������� �����������: +17<br>� ��. ������������ ����� (%): +20<br><br>� ��. ����������� (%): +20</td></tr>

<!--�������-->

<tr bgcolor=#f1f1f1 align=center valign=top><td class=medium><b>�������</b><br><img src="http://angelscity.combats.ru/i/f_sasanqua.gif" alt=""><br>����: 7 ��.<br>���� �����: 5 ����</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_kantubaki3ki3.gif" alt="����� ������� 3"><br>����: 21,1 ��.<br>� ����������� ��������� �����������: +1<br>� ������������ ��������� �����������: +3</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_kantubaki5.gif" alt="����� ������� 5"><br>����: 35,3 ��.<br>� ����������� ��������� �����������: +6<br>� ������������ ��������� �����������: 6</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_kantubaki7.gif" alt="����� ������� 7"><br>����: 50 ��.<br>� ����������� ��������� �����������: +4<br>� ������������ ��������� �����������: +8</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_kantubaki9.gif" alt="����� ������� 9"><br>����: 68 ��.<br>� ����������� ��������� �����������: +5<br><br>� ������������ ��������� �����������: +10<br>� ��. ������������ ����� (%): +10</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_kantubaki21mcmk4.gif" alt="����� ������� 21"><br>����: 152 ��.><br>� ����������� ��������� �����������: +15<br><br>� ������������ ��������� �����������: +15<br>� ��. ������������ ����� (%): +15<br><br>� ��. ������ ������������ ����� (%): +10</td></tr>

<!--������-->

<tr bgcolor=#f1f1f1 align=center valign=top><td class=medium><b>������</b><br><img src="http://angelscity.combats.ru/i/f_cosmos.gif" alt=""><br>����: 20 ��.<br>���� �����: 15 ����</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_cosmos3.gif" alt="����� ������ 3"><br>����: 60,1 ��.<br>� ����������� ��������� �����������: +1<br><br>� ������������ ��������� �����������: +3</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_cosmos5.gif" alt="����� ������ 5"><br>����: 100,3 ��.<br>� ����������� ��������� �����������: +5<br><br>� ������������ ��������� �����������: +7<br>� ��. ������ ������������ ����� (%): +10</td>
<td class=medium>-</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_cosmos9.gif" alt="����� ������ 9"><br>����: 181 ��.<br>� ����������� ��������� �����������: +7<br><br>� ������������ ��������� �����������: +10<br>� ��. ������ ������������ ����� (%): +15</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_cosmos21sdf3j.gif" alt="����� ������ 21"><br>����: 425 ��.<br>� ����������� ��������� �����������: +5<br><br>� ������������ ��������� �����������: +20<br>� ��. ������ ������������ ����� (%): +20</td></tr>

<!--������-->

<tr bgcolor=#f1f1f1 align=center valign=top><td class=medium><b>������</b><br><img src="http://img.bestcombats.net/i/sh/siren_1.gif" alt=""><br>����: 7 ��.<br>���� �����: 3 ���</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/siren_3.gif" alt="����� ��������� 3"><br>����: 21,1 ��.<br>� ����������� ��������� �����������: +2<br>� ������������ ��������� �����������: +6</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/siren_5.gif" alt="����� ��������� 5"><br>����: 35,3 ��.<br>� ����������� ��������� �����������: +3<br>� ������������ ��������� �����������: +7 </td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/siren_7.gif" alt="����� ��������� 7"><br>����: 49,5 ��.<br>� ����������� ��������� �����������: +2<br>� ������������ ��������� �����������: +10</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/siren_9.gif" alt="����� ��������� 9"><br>����: 64 ��.<br>� ����������� ��������� �����������: +2<br>� ������������ ��������� �����������: +12<br>� ��. ������������ ����� (%): +5</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/siren_21.gif" alt="����� ��������� 21"><br>����: 152 ��.<br>� ����������� ��������� �����������: +2<br>� ������������ ��������� �����������: +24<br>� ��. ������������ ����� (%): +10</td></tr>

<!--��������-->

<tr bgcolor=#f1f1f1 align=center valign=top><td class=medium><b>��������</b><br><img src="http://img.bestcombats.net/i/sh/cally_1.gif" alt=""><br>����: 10 ��.<br>���� �����: 3 ���</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/cally_3.gif" alt="����� �������� 3"><br>����: 30,1 ��.<br>� ����������� ��������� �����������: +2<br>� ������������ ��������� �����������: +6</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/cally_5.gif" alt="����� �������� 5"><br>����: 50,3 ��.<br>� ����������� ��������� �����������: +2<br>� ������������ ��������� �����������: +6 </td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/cally_7.gif" alt="����� �������� 7"><br>����: 70,5 ��.<br>� ����������� ��������� �����������: +2<br>� ������������ ��������� �����������: +10</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/cally_9.gif" alt="����� �������� 9"><br>����: 91 ��.<br>� ����������� ��������� �����������: +2<br>� ������������ ��������� �����������: +12<br>� ��. ������������ ����� (%): +5</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/cally_21.gif" alt="����� �������� 21"><br>����: 215 ��.<br>� ����������� ��������� �����������: +2<br>� ������������ ��������� �����������: +24<br>� ��. ������������ ����� (%): +10</td></tr>

<!--������� ����-->

<tr bgcolor=#f1f1f1 align=center valign=top><td class=medium><b>������� ����</b><br><img src="http://img.bestcombats.net/i/sh/f_rose.gif" alt=""><br>����: 10 ��.<br>���� �����: 7 ����</td>
<td class=medium>-</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_rose_5eudmje.gif" alt="����� ������� ��� 5"><br>����: 50,3 ��.<br>� ����������� ��������� �����������: +3<br>� ������������ ��������� �����������: +9</td>
<td class=medium>-</td>
<td class=medium>-</td>
<td class=medium><img src="http://img.bestcombats.net/i/sh/fp_rose_21dfioehjf.gif" alt="����� ������� ��� 21"><br>����: 215 ��.<br>� ����������� ��������� �����������: +3<br>� ������������ ��������� �����������: +25<br>� ��. ������ ������������ ����� (%): +10</td></tr>

</table>
</td>
</tr>
</table>
</td>
</tr>


</table>


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