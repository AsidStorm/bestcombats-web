<?php
    session_start();
    if ($_SESSION['uid'] == null) header("Location: index.php");
    include "connect.php";
    $user = mysql_fetch_array(mysql_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
    include "functions.php";
    if ($user['room'] != 28) header("Location: main.php");
?>
<HTML><HEAD>
<link rel=stylesheet type="text/css" href="http://img.bestcombats.net/css/main.css">
<meta content="text/html; charset=windows-1251" http-equiv=Content-type>
<META Http-Equiv=Cache-Control Content=no-cache>
<meta http-equiv=PRAGMA content=NO-CACHE>
<META Http-Equiv=Expires Content=0>
</HEAD>
<body leftmargin=5 topmargin=5 marginwidth=5 marginheight=5 bgcolor=#e0e0e0>
    <TABLE border=0 width=100% cellspacing="0" cellpadding="0">
    <td align=right>
    <FORM action="city.php" method=GET>
		<INPUT type='button' value='��������' style='width: 75px' onclick='location="/klanedit.php"'>
        <INPUT TYPE="submit" value="���������" name="strah">
    </table>
    </form>
<? 
  if ((aligntype($user["align"])==1 || aligntype($user["align"])==2) && 0) {
    $v=mqfa1("select id from votes where user='$user[id]'");
    if (@$_POST["todo"]=="vote" && !$v) {
      $vote=mqfa("select id, align from users where login='$_POST[login]'");
      if ($vote && samealign($vote["align"], $user["align"])) {
        mq("insert into votes set user='$user[id]', vote='$vote[id]', align='".aligntype($user["align"])."', pts='$user[exp]'");
        $v=1;
      } elseif (!$vote) echo "<b><font color=\"red\">�������� $_POST[login] �� ������.</font></b>";
      elseif (!samealign($vote["align"], $user["align"])) echo "<b><font color=\"red\">� ��������� $_POST[login] �� ���� ����������.</font></b>";
    }
    if ($v) {
      if ($_POST["todo"]=="vote") echo "<H3>��� ����� �� ������� ".(aligntype($user["align"])==1?"�����":"����")." ����.</H3><br><br>";
      else echo "<H3>�� ��� ������ ���� �����. ��������� ������ �������� � ��������� �����������.</H3><br><br>";
    } else {
      echo "<H3>������ ������� ".(aligntype($user["align"])==1?"�����":"����")."</H3><br><br>
      ������� ".(aligntype($user["align"])==1?"�����":"����")." ��������� �������� ".(aligntype($user["align"])==1?"�����":"����")." � ������ ����� � ����. 
      ������ �� ����� �������� ������ �� ������ ������. ������ � �������� ������ ��������� ��� �������, ������ ����� ��������� �� ��� ���� ������ ����� ������� � ������� �������.
      �������, ���� �� �������� ��������� ������ ������� ������ ������.<br><br>
      <form action=\"klanedit.php\" method=\"post\">
        <input type=\"hidden\" name=\"todo\" value=\"vote\">
        <input type=\"text\" name=\"login\"> <input type=\"submit\" value=\"������ �����\">
      </form>";
    }
  }
if ($user['klan'] && $user['align']!=2.5 && $user['align']!=2.9 && $user['align']!=2.51) { ?>
<TABLE width="100%" border="0">
<TR valign="top">
<TD width="50%">

�� ��� �������� � ����� <B><?=$user['klan']?></B> � �� ������ ������ ������ �� ����������� ������ �����.<BR><BR>

� ������ ������� ������� � ��������������� ������� ������ ����� �����? ;)<BR>
�� ������ ��������� ���� ����������� �� ���� ����� ����� (������ �������: 100 ��.). ���� � ������� ������ �� �������� ����� 50% ������� ��� � ����� ������ �������� ������ ������� "��", �� ������� ����� ������ �����. ���� ���, �� ����������� �� ����� ����������� ����� �������.<BR>
<INPUT TYPE=submit name="add_new_vote" value="���� ����� ������ �����" onclick="return confirm('��������� ���� ����������� �� ���� ����� ����� � ������ �����������?\n������, �� ������ ��������� 100��. � ����� ����� ��������� ��� �� �����, �����, ��� �� ��� ���� ������� ;)')"><BR>
����������� ���������� ������ ��������, ����� �������� ��������� ��������� �� ������� ������������ ����� �����.<BR>



</TD>
<TD>
<FIELDSET><LEGEND><H4>����������</H4></LEGEND>
<table cellspacing=0 cellpadding=2 border=0 width="100%">
<TR>
<TD>� ������ ������ � ������ ����� ��� ��������������� ���������.</TD>
</TR>
</table>
</FIELDSET>
</TD>
</TR>
</TABLE>
<?
}else{
?>

        <H3>������ �� ����������� �����</H3><p>
		
    <?
        if($user['align'] == '2.9'  || $user['align'] == '2.5' || $user['align'] == '2.51') {
            $data = mysql_query("SELECT * FROM `reg_klan`;");
            echo "<table>";
            while($clan=mysql_fetch_array($data)) {
                echo "<form action=\"\" method=\"POST\">
                <TR><TD>",$clan['date'],"</TD><TD>",$clan['name'],"</TD><TD>",$clan['abr'],"</TD>
                <TD>",nick2($clan['owner']),"</TD><TD><img src='http://img.bestcombats.net/klan/",$clan['sznak'],".gif'></TD>
                <TD><img src='http://img.bestcombats.net/klan/",$clan['bznak'],".gif'></TD><TD><img src='i/align_",$clan['align'],".gif'></TD>
                <TD><a href='",$clan['http'],"'>",$clan['http'],"</a></TD><TD>",$clan['descr'],"</TD>
                <input name=\"name\" type=\"hidden\" value=\"".$clan['name']."\">
                <input name=\"abr\" type=\"hidden\" value=\"".$clan['abr']."\">
                <input name=\"align\" type=\"hidden\" value=\"".$clan['align']."\">
                <input name=\"owner\" type=\"hidden\" value=\"".$clan['owner']."\">
                <input name=\"deviz\" type=\"hidden\" value=\"".$clan['deviz']."\">
                <input name=\"http\" type=\"hidden\" value=\"".$clan['http']."\">
                <input name=\"clandem\" type=\"hidden\" value=\"".$clan['clandem']."\">
                <input name=\"sex_control\" type=\"hidden\" value=\"".$clan['sex_control']."\">
                <input name=\"bznak\" type=\"hidden\" value=\"".$clan['bznak']."\">
                <TD><input name=\"ok\" type=\"submit\" value=\"��������\"> <input name=\"del\" type=\"submit\" value=\"�������\"></TD></TR>
                </form>";
            }
           if($_POST['ok']){
$vozm=array();
$i=0;
while ($i<=13) {
  $vozm[$_POST['owner']][$i]=1;
  $i++;
}
mysql_query("INSERT `clans` (`short`,`name`,`glava`,`align`,`deviz`,`homepage`,`clandem`,`sex_control`,`clanbig`, vozm)
values ('".$_POST['abr']."','".$_POST['name']."','".$_POST['owner']."','".$_POST['align']."','".$_POST['deviz']."','".$_POST['http']."','".$_POST['clandem']."','".$_POST['sex_control']."','".$_POST['bznak']."', '".serialize($vozm)."') ;");

mysql_query("UPDATE `users` set `align`='".$_POST['align']."',klan='".$_POST['abr']."' where id='".$_POST['owner']."'");
mysql_query("UPDATE `userdata` set `align`='".$_POST['align']."' where id='".$_POST['owner']."'");
mysql_query("UPDATE `allusers` set `align`='".$_POST['align']."',klan='".$_POST['abr']."' where id='".$_POST['owner']."'");
mysql_query("UPDATE `alluserdata` set `align`='".$_POST['align']."' where id='".$_POST['owner']."'");
mysql_query("DELETE FROM reg_klan WHERE owner='".$_POST['owner']."'");
if ($_POST['align']==0)  {
$sklonka="�����";
}
elseif ($_POST['align']==7) {
$sklonka="�����������";
}
elseif ($_POST['align']==0.99) {
$sklonka="�������";
}
elseif ($_POST['align']==0.98) {
$sklonka="������";
}
//���������� �������� � ��� � ����������� ������ �����
systemmsg('<font color=\"#CB0000\"><b>��������!</b> �� ��������� Bestcombats ��������������� ����� '.$sklonka.' ���� '.($_POST['abr']).' ����� '.nick7 ($_POST["owner"]).' �����������.</font>');

$rec=mqfa("select id, glava, vozm from clans where name='$_POST[name]'");
$vozm=unserialize($rec["vozm"]);
$i=0;
while ($i<=13) {
  $vozm[$rec["glava"]][$i]=1;
  $i++;
}
mq("update clans set vozm='".serialize($vozm)."' where id='$rec[id]'");

print "<script>location.href='main.php'</script>";
            }
            if($_POST['del']){
            mysql_query("DELETE FROM reg_klan WHERE owner='".$_POST['owner']."'");
            print "<script>location.href='main.php'</script>";
            }
            echo "</table>";
        }
        else
        {
            $hasclan=mqfa1("select id from reg_klan where owner='$user[id]'");
            if($_SERVER["REQUEST_METHOD"]=="POST" && !$hasclan) {
                $mon = array(0=>1000,7=>1200,"0.98"=>1200,"0.99"=>1200);
                if($mon[$_POST['klanalign']] >= $user['money']) {
                    $error .= '�� ������� ����� �� ����������� �����. <BR>';
                }

                if (!$_POST['klanname']) $error .= '������� �������� �����. <BR>';
                if (!$_POST['klanabbr']) $error .= '������� ������������ �����. <BR>';
                if (!$_POST['deviz']) $error .= '������� ����� �����. <BR>';

                if(!preg_match("/.*gif\$/i", $_FILES['small']['name'])) {
                    $error .= '��������� ������ �� gif ����. <BR>';
                }
                if(!preg_match("/.*gif\$/i", $_FILES['big']['name'])) {
                    $error .= '������� ������ �� gif ����. <BR>';
                }

                $imageinfo1 = @getimagesize($_FILES['small']['tmp_name']);
                $imageinfo2 = @getimagesize($_FILES['big']['tmp_name']);

                $eff = mysql_fetch_array(mysql_query("SELECT * FROM `effects` WHERE `owner` = '".$user['id']."' AND `type` = 20;"));
                if (!$eff) {
                    $error .= '� ��� ��� ��������. <BR>';
                }

                if($imageinfo1['mime'] != "image/gif") {
                    $error .= '��������� ������ �� gif ����. <BR>';
                }
                if($imageinfo2['mime'] != "image/gif") {
                    $error .= '������� ������ �� gif ����. <BR>';
                }
                if($_FILES['small']['size'] > 1024*4) {
                    $error .= '���� ���������� ������ ������� �������. <BR>';
                }
                if($_FILES['big']['size'] > 1024*10) {
                    $error .= '���� �������� ������ ������� �������. <BR>';
                }
                if(!$error) {
                    mysql_query("INSERT `reg_klan` (`name`,`owner`,`abr`,`http`,`sznak`,`bznak`,`align`,`clandem`,`sex_control`,`deviz`)
                    values ('".$_POST['klanname']."','".$user['id']."','".$_POST['klanabbr']."','".$_POST['http']."','".$_POST['klanabbr']."','".$_POST['klanabbr']."_big','".$_POST['klanalign']."','".$_POST['clandem']."','".$_POST['sex_control']."','".$_POST['deviz']."') ;");
                    move_uploaded_file($_FILES['small']['tmp_name'], '/var/www/bestcombats/data/www/img.bestcombats.net/klan/'.$_POST['klanabbr'].".gif");
                    move_uploaded_file($_FILES['big']['tmp_name'], '/var/www/bestcombats/data/www/img.bestcombats.net/klan/'.$_POST['klanabbr']."_big.gif");
                    mysql_query("UPDATE `users` set money=money-".$mon[$_POST['klanalign']]." where id='".$user['id']."'");
                    $hasclan=1;
                }
                else
                {
                    echo "<font color=red><B>",$error,"</B></font>";
                }
            }
            if ($hasclan) {
              echo "<font color=red><B>������ �� ����������� ����� ������. ��� ������� ��������� � ���������� ����������� �����.</B></font><br><br>";
            } else {

    ?>
<form method="post" ENCTYPE="multipart/form-data">
<p>����, �� ������ ���������������� ����� ���� BestCombats.net.<br>
�� ������ ��� ���������� � ����������� ������ ����� BestCombats.net, ������������, ����������, �� ���������� ��������������:</p>
<p>������ ���� �� �������� ���������� ����������� ������� BestCombats.net, ������� ����������� ��������� ��� ����� ��� �������� �
���� ������������� ��� ��� ������������ ������� BestCombats.net (�������), ��� � ��������� ��� � �������� �����, ��� � � ������
������ ����� BestCombats.net.  ������� (����) � ��������� ������ ������ ���� ��������� � ������ �����.</p>
<p>���������� � �������:</p>
<ul>
<li>������� ������ (����) - ������ (�x� � ��������) 100x99, ����������� ��� - GIF, ����� - ����, ��� �� ������ ����������;</li>
<li>��������� ������ - ������ (�x� � ��������) 24x15, ����������� ��� - GIF, ��� ����������;</li>
</ul>
<p>������������� � �������� �����, ��� ������ � ��� ������� ��������:</p>
<ul>
<li>��������� �������, ������������ �������������� ��� �������� ��������� ����, ����� ���: �������, ������, ��������, � ��� �����;</li>
<li>��� ��� ������� ��� BestCombats.net �����������,  �� �������� �����, ��� ����� � ������ ������ ��������������� �������� ���� ��; </li>
<li>������� ��� �� �����������, � ������ �� �������������� ������������� ��������������� (�����, ����� � �.�.), � �� ��������������� (�������� �����, �����, ��������, � �.�.) ���������, �������� � ������������ ������� ���� (�����, ������������, ������, ������������ ������������ � �.�.) �� ��������� ����;</li>
<li>�������  �������������� � ��������������� ������ ������ ������������;</li>
<li>������� �� ������� � �� ���������� ������������ � ������, �������� � ��������� ������ �����.</li>
<li>������ ��������� � ��������� �� ��������� � ������ ���������� ������� ��, � �� ����������� � ��������, ������ � ��������� ������ ����� ��, ��� ����� ���� �����������, ��� ����������� �� ��������� � ������ �������������.</li>
</ul>
��������� ����������� ������:<BR>
<IMG SRC="/i/align_0.gif" WIDTH="12" HEIGHT="15" BORDER=0 ALT=""> ����� - 1000 ��.<BR>
<IMG SRC="/i/align_7.gif" WIDTH="12" HEIGHT="15" BORDER=0 ALT=""> ����������� - 1200 ��.<BR>
<IMG SRC="/i/align_0.99.gif" WIDTH="12" HEIGHT="15" BORDER=0 ALT=""> ������� - 1200 ��.<BR>
<IMG SRC="/i/align_0.98.gif" WIDTH="12" HEIGHT="15" BORDER=0 ALT=""> ������ - 1200 ��.<BR>
<BR>
������ �� ����������� ������ ������� ����� �����, � �������� ������ ���� ��� ���� ����������� �����.<BR>
<BR>
<FIELDSET><LEGEND><H4>������</H4></LEGEND>
�������� ����� <input type="text" name="klanname" size=60 value="<?=$_POST['klanname']?>"><BR>
��� ���������� ������: <input type="radio" name="clandem" value="1" <? if (@$_POST["clandem"]==1) echo "checked"; ?>>&nbsp;�������&nbsp;&nbsp;<input type="radio" name="clandem" value="2" <? if (@$_POST["clandem"]==2) echo "checked"; ?>>&nbsp;��������&nbsp;&nbsp;<input type="radio" name="clandem" value="3" <? if (@$_POST["clandem"]==3) echo "checked"; ?>>&nbsp;���������&nbsp;&nbsp;<input type="radio" name="clandem" value="4" <? if (@$_POST["clandem"]==4) echo "checked"; ?>>&nbsp;����������&nbsp;&nbsp;<br>
����������� �����������:
<input type="radio" name="sex_control" value="1" <? if (@$_POST["sex_control"]==1) echo "checked"; ?>>&nbsp;����������&nbsp;&nbsp;
<input type="radio" name="sex_control" value="2" <? if (@$_POST["sex_control"]==2) echo "checked"; ?>>&nbsp;����������&nbsp;&nbsp;
<input type="radio" name="sex_control" value="0" <? if (@$_POST["sex_control"]==0) echo "checked"; ?>>&nbsp;�� ������������ �� ����&nbsp;&nbsp;&nbsp;
<br>
���������� ������������ (������ ���������� �����, ���� �����) <input type="text" name="klanabbr" value="<?=$_POST['klanabbr']?>"><BR>
������ �� ����������� ���� ����� <input type="text" size=30 name="http" value="<?=$_POST['http']?>"><BR>
��������� ������ <input type="file" name="small"><BR>
������� ������ <input type="file" name="big"><BR>
���������� ����� <select name="klanalign"><option value="0">�����<option value="7" <?=@$_POST["klanalign"]==7?"selected":"";?>>�����������<option value="0.99" <?=@$_POST["klanalign"]=="0.99"?"selected":"";?>>�������<option value="0.98" <?=@$_POST["klanalign"]=="0.98"?"selected":"";?>>������</select><BR>
�����: <INPUT TYPE="text" NAME="deviz" value="<?=@$_POST["deviz"]; ?>" size=40 maxlength=255><br>
<BR>
<input type="submit" value="������ ������">
</fieldset>
</form>
<BR>
����������:<UL>
<LI>��� ������ ������ � ��� ��������� ����� ����������� ��� ����������� �����.
<LI>� ������ ������ � ����������� (�� ����� �������) ������������ 90% �� ��������� �����.
<LI>������������� � ����� �������� � ����������� ��� ���������� �������.
</UL>
    <?}}}?>
</BODY>
</HTML>