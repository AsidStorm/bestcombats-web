<?
	session_start();
	include "../../connect.php";
	$user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '".$_COOKIE['uid']."' LIMIT 1;"));
	include "../../functions.php";
	$Get_Page="all_klan";

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
<TABLE width="98%" align=left border=0>
<TBODY>
<TR>
<TD class=normaltext align=left valign="top">
 
<div class="page_title"><B>�������� �������</B></div>
<HR align=center width="90%" color=#aa0000 noShade SIZE=0.1><TABLE width=100% border="0">													  														  
<TABLE class=BL>
<TR><TD>
<div class="yui-content">
<!--������ ���� 1-->
        <div>
          <table class="Head tab-content" id="tb" name="tb" border="0" cellpadding="0" cellspacing="6" width="100%">
          <tbody>
           <tr><td class="Head td_heading" valign="top">
  <!--�������� 1-->�������� �����
           </td></tr>
           <tr><td valign="top">
	
             <blockquote>
             <table class="tcontent" border="0"><tbody><tr><td>
  <!--  ���������� 1     --> 

<h3>����� ��������</h3>
���� - ��� ��������� ������ ��������, ��������� �� ��������� ������ ������� � ������� ���� ������������� ������.
<br>���� �� �� �������� �� � ����� �����, �� ������ ������� ����������� ����.
<br>������ ��������� �������������� � <strong><img src="http://img.combats.com/i/images/subimages/1ureg.gif" width="118" height="78" />������������ ������</strong>, ������� ��������� � <strong><img src="http://img.combats.com/i/misc/forum/fo1.gif" />Capital City</strong> �� ������������ �����.
<br><TABLE cellSpacing=0 cellPadding=2 width="100%" border=0>
<TR>
<br>� ������� ����������� ����� � ������ ���������
<br>� ��������������� ���������
<br>� ����� ���������
<br>
<br>���� �� �� �������� �� � ����� �����, �� ����� ������ ������� ����������� ����. � ��������� ����� ��������� ����������� ���������� ����� ���� <strong>1000 ��</strong>, ������� ���� <strong>1300 ��</strong>, ������ ���� <strong>1400 ��</strong>, ����������� ���� <strong>1500 ��</strong>.
</fieldset>
</TD></TR></TABLE><br>
<br>
<br>
<h3>���������� ��� ����������� �����</h3>
������ ���� <IMG border=0 src="http://img.combats.com/i/fighttype4.gif" width=20 height=20><strong>��</strong> �������� ���������� ����������� �������, ������� ����������� ��������� ��� ����� ��� �������� � ���� ������������� ��� ��� ������������ ������� �� (�������), ��� � ��������� ��� � �������� �����, ��� � � ������ ������ ����� ��.
<br>������� (����) � ��������� ������ ������ ���� ��������� � ������ �����.
<br>������ �� ����������� ������ ������� ����� �����, � �������� ������ ���� ��� ���� ����������� �����.
<br>������� ����� ����� ������ ���� �� ����� 7�� ������.
<br>
<br><strong>��������, ����� � ������ �����:</strong>
<br><strong>����������:</strong>
<br>- ������������� � �������� �����, ��� ������ � ��� ������� ��������:
<br>��������� �������, ������������ �������������� ��� �������� ��������� ����, ����� ���: �������, ������, ��������, � ��� �����;
<br>- ����������� �������� ���� � �������� ��� ������ �����;
<br>- ��� ��� ������� ��� �� �����������, �� �������� �����, ��� ����� � ������ ������ ��������������� �������� ���� ��;
<br>- ����������� ������������� ����� ���������� � �������� ����� � ������;
<br>- ������� ��� �� �����������, � ������ �� �������������� ������������� ��������������� (�����, ����� � �.�.), � �� ��������������� (�������� �����, �����, ��������, � �.�.) ���������, �������� � ������������ ������� ���� (�����, ������������, ������, ������������ ������������ � �.�.) �� ��������� ����;
<br>- ������� �������������� � ��������������� ������ ������ ������������;
<br>- ������� �� ������� � �� ���������� ������������ � ������, �������� � ��������� ������ �����.
<br>- ������ ��������� � ��������� �� ��������� � ������ ���������� ������� ��, � �� ����������� � ��������, ������ � ��������� ������ ����� ��, ��� ����� ���� �����������, ��� ����������� �� ��������� � ������ �������������.
<br>
<br><strong>������:</strong>
<br>� ��������� ������ ����� (������������ ����� � ����� ��������� � ����, �� ������, � ��� � �.�.).
<br><strong>����������:</strong>
<br>- Gif ��������
<br>- ���������� ���
<br>- ������ 24x15
<br>- �� ����� ��� 32 �����
<br>- �������� ���������!
<br>
<br>� ������� ������ ����� (���� ��� ������������).
<br><strong>����������:</strong>
<br>- Gif ��������
<br>- ����� - ����, ��� �� ������ ����������
<br>- ������ 100x99
<br>- �������� ���������!
<br>- ���������� ������ ���� ��������� � �����
<br>
<br>�������� ������ <noindex><a rel="nofollow" class="TLink" target="_blank" href="http://resources.darkclan.ru/eliber/clan/zajavka.gif">���������</a></noindex>.
<br>
<br>
<h3>����� ��������� �����</h3>
������ �����������, ������� ������ ����� ����� ���������.
<br>� ������ ���������� 4 ��������:
<br><strong>�������:</strong> ������ �������� � ���� �������� ��� ����� ��� ���������� ������ � ����� ��� ���������, ��� � ���������� ������ ������� �� �����. ����� ����, ������� ������ ���� �����, ������� ����� ���������� ���� ����� �� �����. 
<br><strong>����������:</strong> ����� ����� ����� ���� ������ ������������. ����� ���� ��������� ���� �����, � ���� ������� ��� ���������� ���������� "�����". ����� ����� �� ����� �������� ���� ����� �� �����.
<br><strong>���������:</strong> ����� ����� �� ������� � �� ���������� ����� �����������. ���� ����� ����� �������, �� ���� ����� ������������� ����������� � ��������� �������, ��� ��� ������� ������������. ������ ���������������� ������ �� ����� � ������� ���, ������ ����� ����� ����� ����� ������ � ����������.
<br><strong>��������:</strong> ����� ����� ����� �������� ���������� ����� ������ ������ ������������ - ���� ��� ����. ��� �� ����� ����� ����� ������� ������������� ������ �������������. ������ ���������������� ������ �� ����� � ������� ���, ������ ����� ����� ����� ����� ������ � ����������.
<br>
<br>�����, ����� ������������� ��������� ����������� �� �������� ����������:
<br>� <strong>����������</strong> (�������� ���������� ����� ���� ������������ ������ ��������� �������� ����)
<br>� <strong>����������</strong> (�������� ���������� ����� ���� ������������ ������ ��������� �������� ����)
<br>� <strong>�������������</strong> (�������� ���������� ����� ���� ������������ ������ ������ ������� ��������� � �����)
<br>� <strong>�� ������������ �� ����</strong>
<br>
<br>� ������ ������� ����������� ����� �� �������� ��������� �� ���������: � ����� � �������� �����������:
<br><TABLE cellSpacing=1 cellPadding=2 width="60%" bgColor=#a5a5a5>
<TBODY>
<TR bgColor=#c7c7c7>
<i>��������� �� ���������: 28.06.12. 15:27 ��������������� ��� ���� ***</i> 
</TBODY></TABLE>
<br>
<br>� ������ ������, ����� �������� ��������� �� ���������: � ��������������� �������:
<br><TABLE cellSpacing=1 cellPadding=2 width="60%" bgColor=#a5a5a5>
<TBODY>
<TR bgColor=#c7c7c7>
<i>28.06.12 15:27 ��� �������� � ����������� ����� �� �������: �� ������ ������ ��� ���� �� ������������� �������� ��.</i>
</TBODY></TABLE>
<br>
<br>�������� ��������� ����� ������ ������� �� ����� �����. ������ ��������� ����������� � ���. ��������, ��� ������ ����� ������� �������� �������.
<br><IMG border=0 src="http://resources.darkclan.ru/eliber/clan/podarok.gif">
<br>� ���������� � ���������, ������� ����� ��������� ��� ������� �� ����� �����.
<br><IMG border=0 src="http://bestcombats.net/news/i/podark.jpg">
<br>

             </td></tr></tbody></table>
             </blockquote>
               <div class="tabbed-nav-bar-bottom">
                   <noindex><a rel="nofollow" class="TLink" onclick="goTab(1);return false;"  href="#">�����</a></noindex>
               </div>
          </td></tr></tbody></table>
        </div>
<!--����� ���� 1-->
<!--������ ���� 2-->
        <div>
          <table class="Head tab-content" id="tb" name="tb" border="0" cellpadding="0" cellspacing="6" width="100%">
          <tbody>
           <tr><td class="Head td_heading" valign="top">
<br>
<br>��� ����� ������� � ��������, ��� ������������ ���������� ���������� � �����, ����� ���� ������� ����� ������ �� ������ - <noindex><a rel="nofollow" class="TLink" target="_blank" href="http://top.bestcombats.net/#clans">http://top.bestcombats.net/#clans</a></noindex>.
<br>��� �� �� ���������� � �����:
<br><IMG border=0 src="http://resources.darkclan.ru/eliber/clan/tablclan.gif">
<br>
<br>
<br>
<br>
<br>
<br>
             </td></tr></tbody></table>
             </blockquote>
               </div>
          </td></tr></tbody></table>
        </div>
<!--����� ���� 2-->
<!--������ ���� 3-->
        <div>
          <table class="Head tab-content" id="tb" name="tb" border="0" cellpadding="0" cellspacing="6" width="100%">
          <tbody>
           <tr><td class="Head td_heading" valign="top">
<!--�������� 3-->���������� � ����

           </td></tr>
           <tr><td valign="top">
	
             <blockquote>
             <table class="tcontent" border="0"><tbody><tr><td>
<!-- ���������� 3 -->

<br>��� ���������� � ���� �������� ������ ���� ������� <strong>4</strong> ������ � �� ��������� � <IMG border=0 src="http://img.combats.com/i/align2.gif" width=12 height=15><strong>�����</strong>. ������ ���������� ��� ���������� ������ ���� ������������� ���.
<br>
<br><h3><b>����� ����� �������� ������ ����������� �� ���������� � ����, ������� ���������� ����������� � ������� ����� � ������� �����������.</h3></b>
<br><b>��������� ����������� ��������� � ������������ ������.</b>
<br>
<br>
<br>
<br><noindex><a rel="nofollow" href="http://capitalcity.bestcombats.net/inf.php?106156" target="_self" class="TLink">����������</a></noindex> <img src="http://img.combats.ru/i/align50.gif" alt="" width="12" height="15" /><strong>�����������</strong> ����� � ������������ �������� <strong><img src="http://img.combats.ru/i/align50.gif" alt="" width="12" height="15" />������<noindex><a rel="nofollow" href="http://capitalcity.bestcombats.net/inf.php?106156" target="_blank"><img src="http://img.combats.com/i/inf.gif" width="12" height="11" border="0" /></a></noindex></strong>.
<br>
<br>����� ���������� ��� ����������� ����� ��������� ���������� �������� ��������������� ������:
<br><img alt="" src="http://img.combats.com/i/a___kln.gif" border="0" /> <strong>����</strong> (����� ������� �� ����� ����� ����������, ����� ��������� �������� ���� ����).
<br>
<br>
<h3>�������� ���</h3>
���� ������ ����� �������� ����� �������� ������, ������� ��������� �� ��� ������ <IMG border=0 src="http://img.combats.com/i/fighttype4.gif" width=20 height=20><strong>�����</strong>. ������������ ������� ��������� ������� ��������� ��� ������� ���� ����������� - <IMG alt=�������� src="http://img.combats.com/i/lock.gif" width=20 height=15><STRONG>����������</STRONG>.
<br><FONT color=#007000>20:26</FONT> [<FONT color=#003388><strong>���</strong></FONT>] <FONT color=red><strong>private [klan]</strong></FONT> - ��������� ��� ����� ����� ������
<br>
<br>
<br>���� ���� ������� � <IMG border=0 src="http://img.combats.com/i/misc/union_join.gif"><strong>�����</strong> ��� <IMG border=0 src="http://img.combats.com/i/misc/alliance_join.gif"><STRONG>�������</STRONG> � ������� �������, �� ������ �������� ��������� ������� ���� ����������� �������� � � ����������. ��� ����� ���������� ��������� ����� - <FONT color=red><strong>[klanunion]</strong></FONT>.
<br>������������ ������ �������� <IMG alt=�������� src="http://img.combats.com/i/lock.gif" width=20 height=15> ������� ��������� � �������� ������, �� �������� <strong>����������</strong>.
<br>
<br>
<br>
             </td></tr></tbody></table>
             </blockquote>

               <div class="tabbed-nav-bar-bottom">
                 <noindex><a rel="nofollow" class="TLink" onclick="goTab(1);return false;"  href="#">�����</a></noindex>  <noindex><a rel="nofollow" class="TLink" onclick="goTab(3);return false;"  href="#">�����</a></noindex>
               </div>
          </td></tr></tbody></table>
        </div>
<!--����� ���� 3-->
<!--������ ���� 4-->
        <div>
          <table class="Head tab-content" id="tb" name="tb" border="0" cellpadding="0" cellspacing="6" width="100%">
          <tbody>
           <tr><td class="Head td_heading" valign="top">
<!--�������� 4-->������ �����

           </td></tr>
           <tr><td valign="top">
	
             <blockquote>
             <table class="tcontent" border="0"><tbody><tr><td>
<!-- ���������� 4 -->
<h3>������ �����</h3>
��� ������� �� <img alt="" src="http://img.combats.com/i/a___kln.gif" border="0" />�������� ������ ���������� ������, ���������� ��������, ����������������� ����������:
<br><IMG border=0 src="http://img.combats.com/i/misc/clans/klan_img_09.jpg"> - <strong>�������</strong>. �������� �������� ���������� � ������ �������, ���������� ����, ������� �������������� ���.
<br><IMG border=0 src="http://img.combats.com/i/misc/clans/klan_img_11.jpg"> - <strong>����������</strong>. ������ �������� ���������� ������ � ����, �������������� �������� � �������, �������� �����.
<br><IMG border=0 src="http://img.combats.com/i/misc/clans/klan_img_13.jpg"> - <strong>���������</strong>. ������ ����������� �� ��� ������ � ����������� ������� ����/������.
<br><IMG border=0 src="http://img.combats.com/i/misc/clans/klan_img_17.jpg"> - <strong>�������� �������</strong>. � ����������!
<br><IMG border=0 src="http://img.combats.com/i/misc/clans/klan_img_19.jpg"> - <strong>�����</strong>. �������� ��������� � ������������ �������� ������ �� ������ ������.
<br><IMG border=0 src="http://img.combats.com/i/misc/clans/klan_img_21.jpg"> - <strong>� �����</strong>. ���������� ���������, ���������� � ��������, ������ � ������������ ��������� �����.
<br><IMG border=0 src="http://img.combats.com/i/misc/clans/klan_img_23.jpg"> - <strong>������ �����������</strong>. ������ ������� ��������� � ����� � ������ ���������� ��������� �� ����� �����.
<br>
<br>��������� ������������� ����������� �������� ������ ��� ����� ����� ��� ��� ����������, ���������� ������ ����������� �� �����.
<br>����������� ������� ��������� � ����� ������������� <strong>�������</strong>, ������� ��������� �����.
<br>
<h3>�������</h3>
������� ����� �������, � ������� ����������� �����.
<br>� �������� ������������ ��� ������������ ���������, ����� ���:
<br>� ���������� �����-� ����������!
<br>� ��������� ��������� ��������-� ����������!
<br>� ���������/��������� ������� ������ � �����
<br>� ��������� � ����� �� ����� ��� �� �������, �������� ����� �����������.
<br>
<br>
<h3>����������</h3>
��� �������� ��������:
<br>� ����� �����
<br>� ������ ������ �� ����� (����������� ��� ������ �������� � ���������)
<br>� ����������� �������� ������� �� ���������
<br>� ���������/���������� ��������������� ��������� ������ [klan-9]-� ����������!
<br>
<br>� ����� ���� �������������� �������:
<br>� ����������� �� ���������� � ���� (���������� ��������� ������������ � ����� �� �������)
<br>� ����������� ������� ������� ������������ � ����� �� �������
<br>� ������ �������� ����������
<br>� �������������� ������� � ������� �������
<br>
<br>
<h3>���������</h3>
�������� ���������� ������ � ���������, � ������� ����� �������� �� �������� �����-�� ����.
<br>������ ���� ����� ������� ������ ������, ���� � ���� �������� ������ �����������.
<br><strong><font color="red">��������!</font></strong> ���������� ������ ��������������� � <IMG border=0 src="http://img.combats.com/i/align9.gif" width=12 height=15><strong>����������</strong> ��� ����� � ����.
<br>
<br>���������� �� ���������.
<br>��� ������ �������� ������ � ����:
<br>� ������ ��������� ��������� - 50 �����
<br>� ���������� ������� ������� � �������� ��������� - 20
<br>� ���������� ������� ������ ����� � �������� ��������� - 40
<br>� ����� ���������� ������� �������� ����� � �������� ��������� - 200
<br>��� ������ ������� � 4 ������ � ����:
<br>� ������ ��������� ��������� - 100 �����
<br>� ���������� ������� ������� � �������� ��������� - 40
<br>� ���������� ������� ������ ����� � �������� ��������� - 80
<br>� ����� ���������� ������� �������� ����� � �������� ��������� - 200
<br>������ �� ��������� ������ ����� ���������� � �������, �� �������� "� �����".
<br>
<br>
<h3>����������</h3>
� ������ �������� ���������:
<br>� ���������� �� �������� ������
<br>� ���������� �� ������ � ��������
<br>� ������ ���������� ��������� � �����/�������
<br>� ����������� ������ ������� ������� ����� �������� �������
<br>
<br>
<h3>�����</h3>
������ ������ �������� �����. �� ���� �������� ������ ����������� �� �����, �������� �� ���������.
<br>����� ����� �� ��������� �������� ����� ������������� � ����� ��������� �� ��� ����������� ������� � �����:
<br>� �������� ������� ����� 
<br>� �������� ������� ����� 
<br>� �������� ��������� 
<br>� ������������� ����� �� ��������� 
<br>� �������� ����� � ������ �������, ����������� ����� 
<br>� ���������� ����� 
<br>� ������������� ����� 
<br>� ����� � ���� 
<br>� �������� �� ����� 
<br>� �������������� ���������� � ����� 
<br>� �������� ����� � ������� 
<br>� ���������� ������� � ���������
<br>
<br>
<h3>� �����</h3>
������ ������ �������� ��� ���������� � �����:
<br>� ������ �����
<br>� �������
<br>� �������
<br>� ����� ��������� �����
<br>� ����� ���������
<br>� ������ �� �������� �����
<br>� ���������� ����� (������� ��� �����, �� ���������� ����� �����)
<br>� ���������� ��������� ����� (�� ����/������/�����)
<br>� ������� ������ � ����������� ������������� �� ������ ����� ��������
<br>
<br>
<h3>������ �����������</h3>
�������� ���� ���� ��������.
<br>����� ������������� �� ����������, ��� ��������� on/off-line.
<br>����� � ������ ������� ��������� ������ ��������� � �������� ���.
<br>
<br>


             </td></tr></tbody></table>
             </blockquote>

               <div class="tabbed-nav-bar-bottom">
                 <noindex><a rel="nofollow" class="TLink" onclick="goTab(2);return false;"  href="#">�����</a></noindex>  <noindex><a rel="nofollow" class="TLink" onclick="goTab(4);return false;"  href="#">�����</a></noindex>
               </div>
          </td></tr></tbody></table>
        </div>
<!--����� ���� 4-->
 <!--������ ���� 5-->
        <div>
          <table class="Head tab-content" id="tb" name="tb" border="0" cellpadding="0" cellspacing="6" width="100%">
          <tbody>
           <tr><td class="Head td_heading" valign="top">
<br>
<br>
<h3>���������� ����� �����</h3>
���� �� ������� ������, �� � ������������ �� ������ ����������� ����� ����� ��� ������ ����������� ����� ������. ������ ���� ����� ����:
<br>� ��� ����� �� � ��������� ������� �� ������
<br>� ���� �� �������� ������ ����� ��� ��������� ������������ ����� � <IMG src="http://img.combats.com/i/align2.gif">���� ��� ��� ����� �� ����.
<br><strong><font color="red">��������!</font></strong> ������ ����������� �������� ������ ��� ����� � ����� ��������� <strong>����������</strong>.
<br>
<br>������ ����� ����� ����� ������ ����������� ���� ����������� �� ���� ���� � �������� ������ �������� ���������� ���.
<br>��������� ����������� ����� ����������� <strong>100 ��</strong>. ������, ��� ��� ����� ��������� ���� ����������� ��� �� ������ <strong>100 ��</strong>.
<br><img src="http://resources.darkclan.ru/eliber/clan/pereiz.gif" />
<br><img src="http://resources.darkclan.ru/eliber/clan/pereiz1.gif" />
<br>
<br>� �� ����� ������ ���������� ����������� ������ �� ��������.
<br>
<br>����������� ���������� ������ � ������� ������ ������ �����������.
<br>�������������, �� ������������ ����������� ����� �������� � ����� ������, ������ ������ �����.
<br>������ ���� ����� ����� ������������� ������ ���� ���.
<br>
<br>������ ���������� ���, ��� ������ <strong>����� 50%</strong> ������� �����.
<br><img src="http://resources.darkclan.ru/eliber/clan/pereiz4.gif" />
<br><img src="http://resources.darkclan.ru/eliber/clan/pereiz2.gif" />
<br><img src="http://resources.darkclan.ru/eliber/clan/pereiz3.gif" />
<br>
<br>
<Br>
<br>

             </td></tr></tbody></table>
             </blockquote>

               <div class="tabbed-nav-bar-bottom">
                 <noindex><a rel="nofollow" class="TLink" onclick="goTab(3);return false;"  href="#">�����</a></noindex>  <noindex><a rel="nofollow" class="TLink" onclick="goTab(5);return false;"  href="#">�����</a></noindex>
               </div>
          </td></tr></tbody></table>
        </div>
<!--����� ���� 5-->
 <!--������ ���� 6-->
        <div>
          <table class="Head tab-content" id="tb" name="tb" border="0" cellpadding="0" cellspacing="6" width="100%">
          <tbody>
           <tr><td class="Head td_heading" valign="top">
  <!--�������� 6-->����������� ����� �����
           </td></tr>
           <tr><td valign="top">
	
             <blockquote>
             <table class="tcontent" border="0"><tbody><tr><td>
  <!--  ���������� 6 -->

<br>���� ������ �������� �������� �������� ������� ���-�� ������������ � �����. �� �������� ����� ��������:
<br>� �������� ������ � ����
<br>� �������� ������ �� �����
<br>� ��������/��������������/���������� ������
<br>� �������� ���������� (��� ������ � ��������������� ������ ���������)
<br>
<br>� ��������������, �� ����� ������ ��������:
<br>� �������� ������� ����� 
<br>� �������� ������� ����� 
<br>� �������� ��������� 
<br>� ������������� ����� �� ��������� 
<br>� �������� ����� � ������ �������, ����������� ����� 
<br>� ���������� ����� 
<br>� ������������� ����� 
<br>� �������������� ���������� � ����� 
<br>
<br>
<h3>�������� ������ � ����</h3>
������ �������� � �������� ������ �� ����� ��������� � �������� <strong>����������</strong>.
<br>������� � ���� ����� ������ ��������� 4�� � ������ �������, �� ���������� � <IMG border=0 src="http://img.combats.com/i/align2.gif" width=12 height=15><strong>�����</strong> � �� �������� �������� �� ���������� � ����.
<br>��� ������� �� ������ �����, ������ ���������� ���������� � ������������ �������� � ����.
<br>��� �������� ������ � ���� ����� ���������� � ��� � ������ ������� <IMG border=0 src="http://img.combats.com/i/fighttype4.gif" width=20 height=20><STRONG>��</STRONG>.
<br>���������� ���������� ����� ���������� � ������ ����� � ������� <strong>�������</strong>.
<br><img src="http://resources.darkclan.ru/eliber/clan/priemin.gif" />
<br>
<br>
<h3>�������� ������ �� �����</h3>
��� �������� ������ �� ����� ����� ���������� � ��� � ������ ������� <IMG border=0 src="http://img.combats.com/i/fighttype4.gif" width=20 height=20><STRONG>��</STRONG>.
<br>����� ������� �� ������ �������� ����� ������������� �������� ��������� ������ � ������ �������� ������.
<br><img src="http://resources.darkclan.ru/eliber/clan/izgnan.gif" />
<br>
<br>
<h3>�������� ����������</h3>
��� <strong>���������������</strong> ����� ��������� ����� �� ����� �������������� �������� ����. ��� ������ ��� ��������� �������� ���������� ������� ���������.
<br>���� ��� ����������� �� ������ ����������� �� �������� ����������, �� �������� ����� ����� � ����� ������, ������ ����������, ������������ � ����� ������.
<br>������ �������� ���������� ��������� � ������� <strong>����������</strong>
<br><img src="http://resources.darkclan.ru/eliber/clan/smenaglav.gif" />
<br>
<br>��� <strong>�������������</strong> ����� ���������, ���������� �������� �������� ���� �� ���� � ���� � �� ���� � ����.
<br>��� <strong>������������</strong> ����� ���������, �������� ���������� ����������.
<br>
<br>
<h3>������� �����</h3>
������ ������� ����� ����� ����� ���� ����� � ���������, ������� �� ������ ������ ����� �����������.
<br>��������� �� ������ ��������� 600 �������� � ����� ���������.
<br>��������� ��������� � ���������/��������� �������, �������� ���������, ������ ������ ������, ���������� ����� - �� ���������.
<br><img src="http://resources.darkclan.ru/eliber/clan/sobit.gif" />
<br>
<br>
<h3>��������� �����</h3>
����� ����� �������� ����������� ���-��� �������, � ������� �� �������� ���������.
<br>��� ������ �������� ������ � ����: 
<br>� ���������� ������� � �������� ��������� - 40
<br>��� ������ ������� � 4 ������ � ����:
<br>� ���������� ������� � �������� ��������� - 80
<br>������ �� ��������� ������ ����� ���������� � �������, �� �������� "� �����".
<br>
<br>���������� ����� ������������ ������ ��������� ���������� � ���� ������. ������� ������������� ������ �� ����� � �����.
<br>�� ����� � ����������� � � ����� �������, ������������ ���������� ������.
<br>
<br>
<h3>�������������� ����������</h3>
������ ������� ��������� � �������� "� �����" � ��������� �������� ���������� ��� ����� ����������.
<br>��������� ����� ������������ ������ � ������ �������� ����� ��� ������� �����, ����-�� ���������� ������ ��� ���������� ��� ����� �������.
<br>��� ������, ��� ����� ������ ���� ���������, ������ ���������� �� ���������� �����.
<br>
<br>
<br>
<Br>
<Br><font color=green><em>�������, ������ � �������! ���� ��� �� ������ ���������� �����, � ��������� �����. ;)</em></font>
<Br>



             </td></tr></tbody></table>
             </blockquote>
               <div class="tabbed-nav-bar-bottom"><noindex><a rel="nofollow" class="TLink" onclick="goTab(4);return false;"  href="#">�����</a></noindex>
               </div>
          </td></tr></tbody></table>
        </div>
<!--����� ���� 6-->
    </div>
</div>
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