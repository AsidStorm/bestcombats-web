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
 
<div id="tabbed-nav" class="yui-navset">
    <ul class="yui-nav">
<li class="selected"><noindex><noindex><a rel="nofollow" rel="nofollow" href="#tab1"><EM><STRONG>��������</STRONG></EM></A></noindex></noindex> </LI>
<LI><noindex><noindex><A rel="nofollow" rel="nofollow" href="#tab2"><EM><STRONG>����� � ������</STRONG></EM></A></noindex></noindex> </LI>
<LI><noindex><noindex><A rel="nofollow" rel="nofollow" href="#tab3"><EM><STRONG>������������</STRONG></EM></A></noindex></noindex> </LI>
<LI><noindex><noindex><A rel="nofollow" rel="nofollow" href="#tab4"><EM><STRONG>����</STRONG></EM></A></noindex></noindex> </LI>
<LI><noindex><noindex><A rel="nofollow" rel="nofollow" href="#tab5"><EM><STRONG>����� � ������</STRONG></EM></A></noindex></noindex> </LI>
<LI><noindex><noindex><A rel="nofollow" rel="nofollow" href="#tab6"><EM><STRONG>���� �������</STRONG></EM></A></noindex></noindex> </LI>
</UL>
    <div class="yui-content">
<!--������ ���� 1-->
        <div>
          <table class="Head tab-content" id="tb" name="tb" border="0" cellpadding="0" cellspacing="6" width="100%">
          <tbody>
           <tr><td class="Head td_heading" valign="top">
  <!--�������� 1-->�������� </td></tr>
           <tr><td valign="top">
	
             <blockquote>
             <table class="tcontent" border="0"><tbody><tr><td>
  <!--  ���������� 1     --> 

<BR><STRONG>������ ������� ��</STRONG> � ��� ����� ����������, ���������� � ������������, �������������� ������� ����������� �������� �������� ������� ��������.
<BR>
<BR>��� ������ ������� ����� ��������� �� 4 ��������������� �����:
<BR>� ������� ������ � ������.
<BR>� ������� �������������.
<BR>� ������� ������� ����� � �����.
<BR>� ������� ������ � �������.
<BR>
<BR>����� ����������� � ���������� ������������������: 
<Br>������� �������� �������� �������, ����������� ��� ��� �������� ������� ��������� ������������� � ������� �������� - ������� ���������� ����� ������� � ����������� � ��� �������.
<BR>
<BR><strong>������ ������� ��</strong> ������������� ������� ������������ ��� (���� �������������� ����� ������ ���� � ��� ������). 
<Br />������ ���� � ������������� <STRONG>�������������</STRONG> (��� ������) ���������. 
<Br />����������� ������������� �������� ��� ������� ������� ���������� (������ �����), ��� � �������������� ������ �� ����� � ��������� ��������. 
<Br />
<Br />��������� �� ������ ������ �����: 
<Br />����, ��������, ��������, ������������, ���������, ��������, ����������.
<BR>

             </td></tr></tbody></table>
             </blockquote>
               <div class="tabbed-nav-bar-bottom">
                   <noindex><noindex><a rel="nofollow" rel="nofollow" class="TLink" onclick="goTab(1);return false;"  href="#">�����</a></noindex></noindex>
               </div>
          </td></tr></tbody></table>
        </div>
<!--����� ���� 1-->
<!--������ ���� 2-->
        <div>
          <table class="Head tab-content" id="tb" name="tb" border="0" cellpadding="0" cellspacing="6" width="100%">
          <tbody>
           <tr><td class="Head td_heading" valign="top">
<!--�������� 2-->����� � ������</td></tr>
           <tr><td valign="top">
	
             <blockquote>
             <table class="tcontent" border="0"><tbody><tr><td>
<!-- ���������� 2 -->

<BR><STRONG>����</STRONG>: ���� ����������� �������� �����. ������ ������� ����������.
<BR><STRONG>��������</STRONG>: ��������� +7 �� ����� � +3 �� ���������.
<BR><STRONG>��������</STRONG>: ��������� +7 �� ������� � +3 �� �����������.
<BR><STRONG>������������</STRONG>: +6�� �� ������ ����. 
<Br />�� ������ ����� ������������ +1.5 ������ �� ����� � +1.5 ������ �� �����. � ��� �� 0,5% ��. ������ �������� ����. �����
<Br />������ �� ����� �������: 40 * (������� + 1) + ������������.
<BR><STRONG>���������</STRONG>: +0,5% �������� �����.
<BR><STRONG>��������</STRONG>: +10 ����.
<BR><STRONG>����������</STRONG>: +1 ���� ���� �� ������ ����.
<Br />
<BR>�����, ����� ����� ������ <strong>������</strong>. 
<Br />�� ���� �� ������ ��������� � ������ <noindex><noindex><A rel="nofollow" rel="nofollow" class=TLink href="http://bestcombats.net/news/others/bonus/" target=_blank><FONT color=#800080>������ ������ � ���������� </FONT></A></noindex></noindex>.
<BR>
<BR>����� ������ ���������� ������������� �������������� ��������� � <STRONG>������</STRONG>. 
<Br />
<Br />���������� �������� ���������� ������ ������ � �������� ������� �������� �����. 
<Br />� ��� ������ � ���������� ������ � ��� ��� ���� ������, ����������� ���� ���� ������� (�� 1-2 ������ �� ������ ������), � ����� ��������� ������������ �������, ������� ����� ���������� �� ����������� ���-�� ������. 
<Br />� ��� �����, �� ���������� ������ ������� ������� � ������� ����������� ��������� � ����������� ��������. 
<Br />
<Br />���������� ������ ����� �����������:
<Br />������������ ���������� ������ ������ �� �������� ������� � <strong>5</strong>.
<Br />������������ ���������� ������ ������ � ����� � <strong>10</strong>. 
<Br />
<Br />������������ ���� ������������ ����� ������: 30% (����������� �� +10 ������ ������������ ������������ ��� ����). ���������� ���� ����������� ���� ����� � 2 ����.
<BR>

             </td></tr></tbody></table>
             </blockquote>

               <div class="tabbed-nav-bar-bottom">
                 <noindex><noindex><a rel="nofollow" rel="nofollow" class="TLink" onclick="goTab(0);return false;"  href="#">�����</a></noindex></noindex>  <noindex><noindex><a rel="nofollow" rel="nofollow" class="TLink" onclick="goTab(2);return false;"  href="#">�����</a></noindex></noindex>
               </div>
          </td></tr></tbody></table>
        </div>
<!--����� ���� 2-->
<!--������ ���� 3-->
        <div>
          <table class="Head tab-content" id="tb" name="tb" border="0" cellpadding="0" cellspacing="6" width="100%">
          <tbody>
           <tr><td class="Head td_heading" valign="top">
<!--�������� 3-->������������ </td></tr>
           <tr><td valign="top">
	
             <blockquote>
             <table class="tcontent" border="0"><tbody><tr><td>
<!-- ���������� 3 -->

<BR>��������� ���� � ����������� <STRONG>�������������</STRONG> �������� ������ � ������ �������. 
<Br /><strong>�����������</strong> � ��� �������� ������ ��� ��� ���� ����������� ���������; ����������, ��� ������ � ��������� ������������ ������������ ���������. 
<Br />
<Br />������������ ������������:
<BR>� <STRONG>��. ����. �����</STRONG> - �������� �� ����������� ��������� ������������ �����.
<BR>
<BR>� <STRONG>��. ������ ����. �����</STRONG> - �������� �� ����������� �������� ������������ �����.
<BR>
<BR>� <STRONG>��. �������� ����. �����</STRONG> - �������� �� ����, ��������� ��� ����������� �����. 
<Br /><em>���� �������������� �� �������: ((1+��. ��������)*2)*������� ����</em>.
<BR>
<BR>� <STRONG>��. �����������</STRONG> - �������� �� ����������� ���������� �� �����.
<BR>
<BR>� <STRONG>��. ������ �����������</STRONG> - �������� �� ���������� ������ ���������� � ����������.
<BR>
<BR>� <STRONG>��. ����������</STRONG> - �������� �� ���� ������� ��������� ����� ��������� �����������. 
<Br />������ ��. ���������� � ���� ���������� - 10%, ������������ - 80%, ���������� �� ���� ������� ����� � ������� �� �����.
<BR>
<BR>� <STRONG>��. �����������</STRONG> - �������� �� ����������� ����������� �����. 
<Br />������������ ������������ ����������� - 50%.
<BR>
<BR>� <STRONG>��. ����� �����</STRONG> - �������� �� ����������� ������������ �����, �� ������ ���� �����.
<BR><em>������������ ����������� � ����� ����� ������ ������������� � 1.2 ���� �� ������ ������� ���������� ���� 8.</em>
<BR>
<BR>� <STRONG>��. ������ �����</STRONG> - �������� �� ����������� ������������ ���������� ����� (�� �� ������ �� �����) ����������.
<BR>
<BR>� <STRONG>��. �������� �����</STRONG> - �������� �� ����������� ������������ ����� �����. 
<Br /><em>�������������� �� �������: (1+�� �������� �����)*������� ����.</em>
<BR>
<BR>� <STRONG>��. �������� �����</STRONG> - �� �����������, ��������� ����������� ��������. �������: (1+�� �������� �����)*������� ����.
<BR>
<BR>� <STRONG>��. ���������� ������ �� �����</STRONG> - ��������� ���������� ������ �� ����� ����������.
<BR>
<BR>
<BR><strong>������������</strong> ����� ��������� �� <STRONG>����������</STRONG> (�������), <STRONG>��������</STRONG> � <STRONG>�������������</STRONG> �� �������. 
<Br />
<Br />������� 2 ���� �������������: ���� � ��������, ������ � ����������. 
<Br />������� ������������ ������������ � ���������������� ���������� ������������ ����� ����������� ������� �������� �������. 
<Br />� ���, ����������� ������ ������������ � ������������� �������������� ����������. 
<Br />� �������, ���� ��. ����� ���������� 300, � ��. ��������� ���������� � 100, �� ���� ���������� � ����� ������� ������������. 
<Br />����������� ����������� ������������ �������� ������������� ����������� �����������, �� �� ��������� 50%. <Br />
<Br />������� ��������, ��� ��� ������ ������� ���������� ������������-��������, � ����������� � ��� ������ ������ ������� �� ��������� �������, � ������ �������������� �������, ����� ���������� �� ��� ���� ������� - ����������. 
<BR>
<BR><STRONG>���������� �����������</STRONG> ������������ � ���� �������. 
<Br />��� ����������� � ���, ��� �� ���� ��� ������ ���������. <Br />���������� ����������, ���������, ���������� ������������ �����������, ������� � ������������ �����. ��� ������, ��� ���� ���� �� ������� ��������������� � ����������������� ������ ������� ����������, �� ��� ��� ����� ����� � ��������� ������������ ���������. 
<Br />� �������, ��� ����� �� ��� ���������� �������� ������� �������������, ������ ���-���� ���������, ������ ��� �������� ���������� �����������. 
<Br />�����, ������������ ���������� ����������� ����������� �������, ������ 6%. 
<Br />
<Br />���������� ��� 2 ���������� ������������, ������������� ��� ������� �����, ��� 100 ������ �������� (5% ���. ��. �������) � 100 �������� (5% �� ����������� �����).
<Br />
<Br /><EM><strong>����������</strong>. ���������� ������������ �����������, ����������� � ����� ����� ����������� ����� �������: 
<Br /><img src=http://img.combats.ru/i/misc/icons/multi_doom.gif border=0> <B>������������</B>
<br />�� ���������� ������ ����� ���������� ����������, ��� ������ ���������� ��� ������������� �����. �� ��� ����� ������ �������������</EM>.
<Br />
<Br />� ��� ������������ �������������� � ����� ������� - �����������, ����������� ����, �����������, ���������� �����, ���� �����.
<Br />����������� ���� ��������� �����������/����, ��� ���� ���� ���������� � 2 ���� ����.
<Br />
<BR></EM>���������� ���������, ������� "�����������" - <img src=http://img.combats.ru/i/items/spell_luck.gif border=0> <STRONG>�����</STRONG>. 
<Br />��� ����������, ��������� �������� �� ��������� ��������� �����. �.�. ����������, ����� - ��� �����������, ���������� ���� ����������� ����������� ������� �������.

</td></tr></tbody></table>
             </blockquote>

               <div class="tabbed-nav-bar-bottom">
                 <noindex><noindex><a rel="nofollow" rel="nofollow" class="TLink" onclick="goTab(1);return false;"  href="#">�����</a></noindex></noindex>  <noindex><noindex><a rel="nofollow" rel="nofollow" class="TLink" onclick="goTab(3);return false;"  href="#">�����</a></noindex></noindex>
               </div>
          </td></tr></tbody></table>
        </div>
<!--����� ���� 3-->
 <!--������ ���� 4-->
        <div>
          <table class="Head tab-content" id="tb" name="tb" border="0" cellpadding="0" cellspacing="6" width="100%">
          <tbody>
           <tr><td class="Head td_heading" valign="top">
  <!--�������� 4-->���� </td></tr>
           <tr><td valign="top">
	
             <blockquote>
             <table class="tcontent" border="0"><tbody><tr><td>
  <!--  ���������� 4 -->

<BR><STRONG>����</STRONG> - ��� �����������, ��������� ���������� � ������� ������������� ���� ������, � ������� ������� ��� �������. 
<Br />
<Br />�� ������ ������� �� ������ � ����� ���� ���������� ����:
<Br />� <STRONG>���� - �������</STRONG>, ������ � ������������� ����� ���������� ���� - <STRONG>�������</STRONG>.
<BR>� <STRONG>������, ������, ���� - ��������</STRONG>.
<BR>� <STRONG>����, ������� - �������</STRONG>.
<BR>� <STRONG>������ - ���������.</STRONG>
<BR>� <STRONG>������ ������ - �������.</STRONG>
<BR>
<BR>���������� ����������� ������� ������� ����� �������:
<BR>� <STRONG>������� ����</STRONG> ������� �� 50% ���� � 40% ��������.
<BR>� <STRONG>�������</STRONG> - �� 50% ����, 20% �������� � 30% ��������.
<BR>� <STRONG>��������</STRONG> - �� 80% ����.
<BR>� <STRONG>�������</STRONG> - �� 50% ���� � 40% ��������.
<Br />
<BR><STRONG>��������� ����</STRONG> - ��� �����������, ��� ������� ������ ������� ���� ������ ����� �� ������. 
<Br />��������� ����, � ������� �� �����������, ���������� ���������� ����� ����. 
<Br />��� ������� �� ��������� ����� ������ ��������� �������� ��������, �������� ��������������� ������ � ���������� �������� ����������� �����. 
<Br />��� ���������� ������ ���. ���� �������������� �� �������: <em>50% ��������, 50% ���� � ������ �� �������� �����</em> (��� ����������� ���������� ���������� �������� ��� ������).
<BR>
<BR><STRONG>���������� ����</STRONG> - ��� ����, ��������� ����������� ��������. 
<Br />���������� 7 ����� ����� ������ � ������ ������ ������� ���� ����: 
<Br />������, �����, ����, �����, ����� �����, ����� ���� � ����� �����.
<Br />����� �������� ����������� ���. ����� ������� ������� </noindex></noindex> � <noindex><noindex><A rel="nofollow" rel="nofollow" class=TLink href="http://bestcombats.net/news/others/book_shop/" target=_blank><FONT color=#800080>"����� � ������"</FONT></A></noindex></noindex>. 
<Br />
<Br />����������� ����������� ����� � ���, ��� �� ���������� ���� ���������. 
<Br />������ ��� ����� �� �����������, ������ ���� ����������� ����������� �� �������� (�� ������ 250 ��. ������ �� ����� ������ 1% ����������� ���������� �� ����������). 
<Br />�����, ������������ ���������� ����������� ����������� �������, ������ 6%.
<BR>
<BR>���� ��� ������ ����������, �������� �� ������ �������������� ���������. ��� <STRONG>��������</STRONG> � <STRONG>������</STRONG>. 
<Br />
<BR>

</td></tr></tbody></table>
             </blockquote>

               <div class="tabbed-nav-bar-bottom">
                 <noindex><noindex><a rel="nofollow" rel="nofollow" class="TLink" onclick="goTab(2);return false;"  href="#">�����</a></noindex></noindex>  <noindex><noindex><a rel="nofollow" rel="nofollow" class="TLink" onclick="goTab(4);return false;"  href="#">�����</a></noindex></noindex>
               </div>
          </td></tr></tbody></table>
        </div>
<!--����� ���� 4-->
 <!--������ ���� 5-->
        <div>
          <table class="Head tab-content" id="tb" name="tb" border="0" cellpadding="0" cellspacing="6" width="100%">
          <tbody>
           <tr><td class="Head td_heading" valign="top">
  <!--�������� 5-->����� � ������</td></tr>
           <tr><td valign="top">
	
             <blockquote>
             <table class="tcontent" border="0"><tbody><tr><td>
  <!--  ���������� 5 -->

<BR><STRONG>������ ���������</STRONG> - ������� �� ������ �� ����������� ����� � �� ����������� �����. 
<Br />������ �� ����������� ����� ������� �� <STRONG>�����</STRONG> � <STRONG>������ ��</STRONG> <STRONG>�����</STRONG>. 
<Br />������� ����������� ������� �����, � ����� ����������������� �� ����� ���� �������������� ����������� ������ �� �����.
<BR>
<BR><STRONG>�����</STRONG> - ��� �������������� <STRONG>�����</STRONG>, ����������� ��������� ������������ ���������� �����. 
<Br />
<Br />� ����� ����� ���� ��� ��� ��� <strong>����������� ����</strong> ��������� (� ���� ������, ����������� ������ ������������ ���� ���������), ��� � <strong>�����</strong> (� ���� ��������, ���; �������� ����� ���������������� �� ��� ���� ���������). 
<Br />� ���������� ����� ������� �� <strong>����������</strong> � <strong>��������������</strong>. 
<Br />� ������� ����� ����������� � ������� N+Kd, ��� N - ���������� ����� (�.�. ��������������� ����������� �� �������), � - ���������� �������������� �����, d-��������� ����������, ������� ����� ��������� �������� � ��������� �� 1 �� K. 
<Br />� ��� ���������� ��������� ������: � ������������� ������ N ������������ ��������� ���������� Kd. � �������, ���� ����� ������� 5+10d, �� ��� ����� ���������� � �������� �� 6 �� 15 ��. ����� ���������� ������ �����, ���� ���������� ���������� �� �������� �����. �����, � ����� ����� ����������� ���������� ������ �� �����.
<BR>
<BR><STRONG>���������� ������ �� �����</STRONG> � ��� ������� ���������� ����������� �����. 
<Br />���������� ������ ����� ���� ��� <strong>����������</strong>, ��� � <strong>�����</strong>. 
<Br />
<Br />� ���������� �������� �� ������ ���� �����, � ����� ��������� �� ��� ���� ����� ������������. ������� �����������. <Br />� ���������� ������ ����������� � �������� � ���������. ������ 250 ��. ����������� ������������ ������ �� 50% (�.�. ��� 250 ��. ����� 50% ������, ��� 500 - 75%, ��� 750 - 87.5%), ������, ���� ���������� �������� ��� ������� ������ �������, ������� ������� ������ ��������� �� �����. 
<Br />� ���������� ������ �� ����� � ����� ����������� � 1,2 ���� �� ������ ������� ���������� ���������� ���� [8]. <Br />������������ ������ �� ����������� ����� - 800 ��., �� ����� - 1000 ��. 
<Br />
<Br /><strong>��������� ������ �� �����:</strong> 
<Br />����, ��������� ������� (��������, ������) � ���� "������������". 
<Br />
<Br />� ������ ����� ���� ����� (��������� �� ��� ���� ���������), ��� � �� ����� (���������� �����). ������, ���������� ������, ������ ������ �� ����� �� ��� ���� ���������, ��������, ���� ����.
<BR>
<BR><STRONG>������ �� �����</STRONG> - ��� �������������� ���������, ����������� ������� ���������� ���������� ����. 
<Br />
<Br /><strong>��������� ������ �� �����:</strong> 
<Br />����, ��������� ������� (��������, ������) � ������� "������������". 
<Br />
<Br />� ������ �� ����� �� ������� �� ���� ���������, � ���������������� �� ����� ���������. 
<Br />� ������ �� ����� �������������� ��� ����� ���������� ������ �� ����������� ���� ����� � ������ ���������� ������ �� �����. 
<Br />
<Br />���������� ����������� ����� ����, ����� � ����� ����� - �� ��� ��� ���������� ������, ������ �� ����������� ����� ������� ������ ������ ����� ���������� ������ �� �����.
<BR>

</td></tr></tbody></table>
             </blockquote>

               <div class="tabbed-nav-bar-bottom">
                 <noindex><noindex><a rel="nofollow" rel="nofollow" class="TLink" onclick="goTab(3);return false;"  href="#">�����</a></noindex></noindex>  <noindex><noindex><a rel="nofollow" rel="nofollow" class="TLink" onclick="goTab(5);return false;"  href="#">�����</a></noindex></noindex>
               </div>
          </td></tr></tbody></table>
        </div>
<!--����� ���� 5-->
 <!--������ ���� 6-->
        <div>
          <table class="Head tab-content" id="tb" name="tb" border="0" cellpadding="0" cellspacing="6" width="100%">
          <tbody>
           <tr><td class="Head td_heading" valign="top">
  <!--�������� 6-->���� ������� </td></tr>
           <tr><td valign="top">
	
             <blockquote>
             <table class="tcontent" border="0"><tbody><tr><td>
  <!--  ���������� 6 -->

<BR>� ���, � ������ �������������, �������� �����, ������, ����� � �������, ���������� ����� �������. � ���������� �������� ��������� ������������ ������ ��������, �� ������� ����������� ���� �������. 
<Br />����� ���������� ����� ���� ���� �������, �� ��� � � ����� ����������� ��� �����������:
<BR>
<BR><STRONG><IMG height=8 alt="" hspace=3 src="http://img.combats.ru/i/misc/micro/hit.gif" width=8>������� �����</STRONG>. 
<Br />1 �������� ���� ���������� ������� = 1 �������.
<BR>1 �������� ���� ��������� ������� = 3 �������.
<BR>
<BR><STRONG><IMG height=8 alt="" hspace=3 src="http://img.combats.ru/i/misc/micro/krit.gif" width=7>������� ������������ �����</STRONG>. 
<Br />1 ����������� ���� ���������� �������, �� ����� ���� = 2 �������.
<BR>1 ���� ��������� ������� = 2-3 ������� (� ����������� �� �������� ����� � ������� ������ ����������).
<BR>1 ���� ����� ���� = 1 �������.
<BR>
<BR><STRONG><IMG height=8 alt="" hspace=3 src="http://img.combats.ru/i/misc/micro/counter.gif" width=8>������� �����-�����</STRONG>. 
<Br />1 �������� �����-���� = 1 ������� �����-�����.
<BR>
<BR><IMG height=8 alt="" hspace=3 src="http://img.combats.ru/i/misc/micro/block.gif" width=7><STRONG>������� �����</STRONG> 
<Br />1 ��������������� ���� = 1 ������� �����.
<BR>���� ��� ������� ������������� ��������� ������, ������� ����������� �� ������ ��������������� ����.
<BR>
<BR><STRONG><IMG height=8 alt="" hspace=3 src="http://img.combats.ru/i/misc/micro/parry.gif" width=8>������� �����������</STRONG> 
<Br />1 �������� ����������� = 1 ������� �����������.
<BR>
<BR><STRONG><IMG height=8 alt="" hspace=3 src="http://img.combats.ru/i/misc/micro/hp.gif" width=8>������</STRONG>. 
<Br />����� ���������� ������ ������ �������: <Br />��� ���������� 1-7 ������ ���� ������ ����������� �� ��������� ����� �����, ������� 10% �� ����������. 
<Br />��� ���������� 8 ������ � ���� ��������� ��������� �������: 
<Br />���� � ���������� 8�� ������ ����� 1000 ��, �� �� 10%�� ����������� 1 ������, ��� � �� ������� �������. � ���� ����� 1000 ��, �� 10 ������ ����� ����������� �� ������ ������� �� ���� 1000 ��. 
<Br />��� 9�� ������, ��� �������������� - 1200 ��, ��� 10�� - 1440 ��, ��� 11�� � 1728 ��.
<BR>
<BR><STRONG><IMG height=8 alt="" hspace=3 src="http://img.combats.ru/i/misc/micro/spirit.gif" width=7>���� ����</STRONG>. 
<Br />����������� ��� ������������� ��������� ������ �������, � �����, ������ ������� � ���. 
<Br />���������� ���� ���� �� ������ ��� ������������� � �������� ������� �� ������ ����� �����������������. 
<Br />���� ���� � ������ ��� ���������� �� ������� HP (��������, ���� ����� � ��� 1000 ��, � � ��� �� ����� � 700 ��, �� ���� ���� ����� �������� �� 0,7). 
<Br />
<Br />��� ������� ������� ������ ���������� ���� ���� ������. 
<Br />7 ������� � 10 ���� ���� 
<Br />8 ������� � 20 ���� ����
<Br />9 ������� � 30 ���� ����
<Br />10 ������� � 40 ���� ����
<Br />11 ������� � 40 ���� ����
<Br />����� ����, ������ ���� ������������ ����������� ���� ���� �� 1.
<BR>
<BR>�� ����������� ���� ������� ����� ��������� ��������� ������. � ����������� ��� ������ ������� ������� � �������� ������� ��������� ������� ���.
<BR>

</td></tr></tbody></table>
             </blockquote>
               <div class="tabbed-nav-bar-bottom"><noindex><noindex><a rel="nofollow" rel="nofollow" class="TLink" onclick="goTab(4);return false;"  href="#">�����</a></noindex></noindex>
               </div>
          </td></tr></tbody></table>
        </div>
<!--����� ���� 6-->
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