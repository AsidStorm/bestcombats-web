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
<TABLE width="98%" align=center border=0>
<TBODY>
<TR>
<TD class=normaltext align=left valign="top">
 
<div class="page_title"><B>�� � ������ �����</B></div>
 
<HR align=center width="90%" color=#aa0000 noShade SIZE=0.1><TABLE width=100% border="0">

																										  
</TD>

<TABLE border="0" cellspacing="0" cellpadding="5" width="100%" height="100%">
<TR valign="top">
<TD width="100%">
<center><table cellspacing=0>
  <TR align=center><TD align=center>
 <A href="?page=1">��������</A>&nbsp;|&nbsp;<A href="?page=2">��������</A>&nbsp;|&nbsp;<A href="?page=3">���������� ����</A>&nbsp;|&nbsp;<A href="?page=4">�������</A>&nbsp;|&nbsp;<A href="?page=5">���������� ��������</A>&nbsp;|&nbsp;<A href="?page=6">������������</A> </TR></TD></TABLE></center><BR>
  <TABLE class=BL cellspacing=0><TR><TD>
<?If ($_GET['page']==1 or $_GET['page']==NULL){?>
  <DIV style="text-align: center;"><B>����� �����</B></DIV><br />

<DIV style="text-align: center;"><TABLE class=QUOTE><TR><TD>��� ������ <SPAN title="Old City"><IMG src="http://img.bestcombats.net/i/sh/fo11.gif" width=17 height=16 border=0></SPAN><B>Old City</B> ������� ����� �������, ������������ �� �������-�������� <B><span style="color:#F93737">7+</span></B> ������� - <IMG src="http://img.combats.com/i/align2.gif" width=12 height=15 border=0><B>����� �����</B>.</TD></TR></TABLE>
<IMG src="http://img.combats.com/i/align2.9.gif" width=12 height=15 border=0><B>��</B> ������� ���������� ������ �����, �������� ��� ����� ������������ ����������.</DIV><br />
<TABLE><TR><TD><IMG SRC="http://img.combats.ru/i/images/subimages/ab_iz_npc.gif" border=0></TD>
<br />
<DIV style="text-align: center;"><IMG SRC="http://bestcombats.net/news/others/izlom/karta.jpg" border=0></DIV><br />
<TD>�������� ���� � ��� � ������ ����� �� ������ ���� ��� � �����:</B><br />
����� ���� ��� � 24 ���� ������ ����������� ������� ����� ������ � ���������� ��� ����� ������ ������� ���. �������� ���, �� ������������� ��������� ���� ����� � ������������ ������� ������ <IMG SRC="http://img.combats.ru/i/misc/icons/survival_timeout.gif" border=0>�<I>������� �����</I>�.<br />
<DIV style="text-align: center;"><IMG SRC="http://www.paladins.ru/uploads/15086/Izlom.gif" border=0></DIV><br />
���� ������ �� �������������� �� ����� ��� � ��������� � �� ������ �� �������� ��������� �����.</TD></TR></TABLE>
<br />
<?}?>

<?If ($_GET['page']==2){?>
<TABLE border="0" cellspacing="0" cellpadding="5" width="100%" height="100%">
<TR valign="top">
<TD width="100%">
<table class=BL cellspacing=0>
  <TR><TD>
    <TABLE class=BL cellspacing=0><TR><TD>
  ����� ���������� � ����������, ���������� ������ ������ �<B>������ �����</B>� � �� ������������� ��������� � ���. ����������� ������� ������������ ��������. <B>������� ������</B>: ����� ��� ����� ������ ���� � ������. ����� �������, ��� ��� ���� � ��������� � 1 ������, ��� ��� �� �������� ������� ������ �� ������� �������. ����� ����� � ��������� ������� ���� � ��� ������, ����� ����� ����� ��� ���������� �������. �� ��� �� �������� ���������� �����. ��� ����� ������� ��� �������� � ������� � ����� �����. ����� �������� ���� �������� � �����, � ��� ������������� ������������������ <B>25% �� </B>� <B>����</B>. <br />
<br />
<br />
����� ���� ��������� ��������� ����� �����... ��� ����� ������������ �� ��� ���, ���� �� �� ����������. ��� � ��������� ������ ��������, �� ����� � �� ���������, ���������������� ������� <IMG SRC="http://img.combats.ru/i/misc/icons/hp_laststrike.gif" border=0><B>��������� ����</B>. ����� ��� ���������� ������. ��� ������ ���, ��� ���� �������� �� ��� ������, ��� ��� ���������.<br />
<span style="color:#F93737">�����!</span> �� <B>�� �������� ���� </B>�� ���, ���� �������� � ������ �������:<br />
<br />
<TABLE class=QUOTE><TR><TD><span style="color:#008000">13:02</span> <span style="color:#F93737">��������!</span> ��� ��������. ����� ���� �������� �����: <B>3221 HP</B>. �������� �����: <B>0</B>.<br />
<span style="color:#008000">13:02</span> <span style="color:#F93737">��������!</span> �� ������� ������� '�������'x5</TD></TR></TABLE>
<br />
<TABLE><TR><TD><IMG SRC="http://bestcombats.net/news/i/izlom1.png" border=0></TD>
		<TD><B>�������</B>  (�����: 0.1) <IMG SRC="http://img.combats.ru/i/podarok.gif" border=0> <IMG SRC="http://img.combats.ru/i/destiny.gif" border=0><br />
�������������: 0/1<br />
<SMALL>������� � Old City<br />
<span style="color:#FF9900">������� �� �������� �������</span></SMALL></TD></TR></TABLE>
������� �������� <U>��������</U>. �� ������ ������������ 7 ���� � �������� 1 �������, � ������ ����� ������ ���� � ������ ����� � �������� 13 ��������. <br />
<br />

<?}?>

<?If ($_GET['page']==3){?>
� ����������!

<?}?>

<?If ($_GET['page']==4){?>
<!-- <��������� ����> -->
 <div class="box">
<b>�������</b>
<hr>

�������, ��� ����� ���������� ���� �� ������� ��������� � �<b>Capital City</b>�. ������� ����������� ���������� ��������, � ��� ���������� ����������� ������ �� ��� ���� �������� ��� ��������� ����������� ��������. <br>

<b><span style="color:#F93737">��������!</span></b> ��� �������� ����������� <img src="http://img.combats.ru/i/destiny.gif" border="0"><b>����� �������</b> � ������ ��������.<br>
<br>
<br>


<?}?>

<?If ($_GET['page']==5){?>
� ����������!

<?}?>

<?If ($_GET['page']==6){?>
<b>������������</b>
<hr>

������� ����� ����������, ���...<br>
<br>
<ul style="margin-top: 0px; margin-bottom: 0px;">
<li>����� ������������ �������� � ��������� ����� ������������ ������. ������ ������ ���� 30 ������ �� �������. ���� ��������, ���� ������, ����� �� ������������ ��������� ������ ����, ��� ��� ������ �������.<br>
</li>
<br>
<li>������ � ���, ��� ������, � ��� ��� - ����� �������, ��� ����� ���� ��������� ����� � �������. ���� �� �� ������� ���, �� ����� �� ������������ - � ��� � ��������������� ������� ������ ������ <img src="http://img.combats.com/i/align2.gif" border="0" height="15" width="12"><b>������ �����</b>.<br>

</li>
<br>
<li>� ������� ���������� �����: <img src="http://img.combats.ru/i/misc/icons/hp_laststrike.gif" border="0"><b>��������� ����</b>, ����� ���� �� �������� ����� ���, <img src="http://img.combats.ru/i/misc/icons/hp_circleshield.gif" border="0"><b>�������� ������</b> � <img src="http://img.combats.ru/i/misc/icons/hp_defence.gif" border="0"><b>���������</b>. <br>
<span style="color: rgb(249, 55, 55);">�����!</span> �������� <img src="http://img.combats.ru/i/misc/micro/spirit.gif" border="0"><b>���� ����</b>, ��� ��� ��� �� ����������������� � ������� ���.</li>

<br>
<br>
<li>������� �������� ��������, �� ���� ��� �� ������� �� ���������� ������ ��������.</li>
<br>
<li>��� ���� ���������� ����� <img src="http://img.combats.ru/i/items/invoke_kar1_heal10.gif" border="0"><b>�������� �����</b> �� ��� ������, ���� � ��� ���������� ���, � ��� ���� ������ ������������ ��� ������� ������.</li>
<br>
<br>
<li>������� � ������� � ������ ������, ����� ��������, ��� ������ ����� ������������ �������� ��� � �� �������� ������������ ������� ������. </li>
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