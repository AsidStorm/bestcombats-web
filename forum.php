<?
    session_start();
    include_once "connect.php";
    $user = mysqli_fetch_array(db_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
    include "functions.php";
  function pre($s, $leavebrs=1) {  
    $s=str_replace("&amp;amp;quot;","&quot;",$s);
    $s=str_replace("&amp;quot;","&quot;",$s);
    $s=str_replace("&amp;lt;b&amp;gt;","<b>",$s);
    $s=str_replace("&amp;lt;/b&amp;gt;","</b>",$s);
    $s=str_replace("&amp;lt;i&amp;gt;","<i>",$s);
    $s=str_replace("&amp;lt;/i&amp;gt;","</i>",$s);
    $s=str_replace("&amp;lt;u&amp;gt;","<u>",$s);
    $s=str_replace("&amp;lt;/u&amp;gt;","</u>",$s);
    $s=str_replace("&amp;lt;code&amp;gt;","<code>",$s);
    $s=str_replace("&amp;lt;/code&amp;gt;","</code>",$s);
    $s=str_replace("&amp;lt;B&amp;gt;","<b>",$s);
    $s=str_replace("&amp;lt;/B&amp;gt;","</b>",$s);
    $s=str_replace("&amp;lt;I&amp;gt;","<i>",$s);
    $s=str_replace("&amp;lt;/I&amp;gt;","</i>",$s);
    $s=str_replace("&amp;lt;U&amp;gt;","<u>",$s);
    $s=str_replace("&amp;lt;/U&amp;gt;","</u>",$s);
    $s=str_replace("&amp;lt;CODE&amp;gt;","<code>",$s);
    $s=str_replace("&amp;lt;/CODE&amp;gt;","</code>",$s);
    if ($leavebrs) {
      $s=str_replace("\n","<br>\n",$s);
      $s=str_replace("\r<br>","<br>\r",$s);
    } else {
      $s=str_replace("\n","<br>",$s);
      $s=str_replace("\r","",$s);
    }
    return $s."</u></b>";
  }

?>
<HTML>
<link rel="icon" href="<?=IMG_PATH?>/favicon.ico" type="image/x-icon">
<HEAD><TITLE>Форум Бойцовского Клуба</TITLE>
<META content="INDEX,FOLLOW" name="robots">
<META content="1 days" name="revisit-after">
<META http-equiv="Content-type" content="text/html; charset=windows-1251">
<META http-equiv="Pragma" content="no-cache">
<META http-equiv="Cache-control" content="private">
<META http-equiv="Expires" content="0"><LINK href="<?=IMG_PATH?>/css/forum.css" type="text/css" rel="stylesheet">
<style>
.pleft {
    PADDING-RIGHT: 0px; PADDING-LEFT: 20px; PADDING-BOTTOM: 7px; MARGIN: 0px; PADDING-TOP: 3px
}
</style>
<SCRIPT language=JavaScript>
function cs(s1, s2)
{
   if (document.getSelection) { alert("Под NN не работает!"); }
   if (document.selection) {
     var str = document.selection.createRange();
     var s = document.F1.text.value;
     if (s1 == '//') {
       if ((str.text != "") && (s.indexOf(str.text)<0)) {
         var str2 = '> ';
         var j = 0;
         for(var i=0; i<str.text.length; i++) {
           str2 += str.text.charAt(i); j++;
           if (str.text.charAt(i) == "\n") { str2 += "> "; j=0; }
           if ((j>55)&&(str.text.charAt(i) == ' ')) { str2 += "\n> "; j=0; }
         }
         document.F1.text.value = s+"<I>\n"+str2+"\n</I>\n";
       } else {
         alert("Не выделен текст!\nДля вставки цитаты, сначала выделите на странице нужный текст, а затем нажмите эту кнопку.");
       }
     } else {
      if ((str.text != "") && (s.indexOf(str.text)>=0)) {
        if (str.text.indexOf(s1) == 0) {return '';}
        str.text = s1+str.text+s2;
      } else { document.F1.text.value = s+s1+s2; }
     }
   }
   document.F1.text.focus();
   return false;
}

<?php
if(($user['align']>1.4 && $user['align']<2) || ($user['align']>2 && $user['align']<3) || ($user['align'] > '3.05' && $user['align'] < '4')) {
?>
function replasetopic(reptopic,numtopic){
    objSel=document.getElementById('seltopic'+numtopic);
    if (reptopic!=objSel.options[objSel.selectedIndex].value){
        document.getElementById('selectt').value=objSel.options[objSel.selectedIndex].value;
        document.getElementById('numt').value=numtopic;
        document.repltopic.submit();
    }
}
<?php
}
?>
</SCRIPT>
<?php if ($user['align'] != 2.5) { ?>
<script LANGUAGE='JavaScript'>
document.ondragstart = test;
//запрет на перетаскивание
//document.onselectstart = test;
//запрет на выделение элементов страницы
document.oncontextmenu = test;
//запрет на выведение контекстного меню
function test() {
 return false
}
</SCRIPT>
<?php } ?>
<META content="MSHTML 6.00.2600.0" name=GENERATOR></HEAD>
<BODY bottomMargin=0 vLink=#333333 aLink=#000000 link=#000000 bgColor=#666666 leftMargin=0 topMargin=0 rightMargin=0 marginheight="0" marignwidth="0"><br>
<body style="margin:0px">
<table width="100%" cellspacing="0" cellpadding="0" height="100%">
<tr><td width="93" height="143"><img src="<?=IMG_PATH?>/forum/topl.gif"></td><td background="<?=IMG_PATH?>/forum/top.gif"></td><td width="93" height="143"><img src="<?=IMG_PATH?>/forum/topr.gif"></td></tr>
<tr><td background="<?=IMG_PATH?>/forum/left.jpg">&nbsp;</td>
<td style="padding-left:8px;padding-right:8px" bgcolor="#3d3d3d">

<table width="100%" cellspacing="0" cellpadding="0" height="100%">
<tr><td width="56" height="41" align="right" valign="bottom"><img src="<?=IMG_PATH?>/forum/5.gif"></td>
<td valign="bottom">
  <div style="background-image:url(<?=IMG_PATH?>/forum/2.gif);height:25px">&nbsp;</div>
</td>
</tr>
<tr>
<td background="<?=IMG_PATH?>/forum/3.gif">&nbsp;</td>
<td background="<?=IMG_PATH?>/forum/light2.jpg" valign="top" style="padding-top:10px">
  <table width="100%">
  <tr><td width="100" valign="top">
   <TR>
          <TD vAlign=top width="10%"> <IMG<IMG height=243 alt=""img src="<?=IMG_PATH?>/forum/ink.gif" width=126
            border=0><table>
	<?php

                if ($_POST['selectt']!='' && $_POST['numt']!='' && $user['align']=="2.5"){
                    $AlignTop=mysqli_fetch_array(db_query("select min_align,max_align from forum where id=".$_POST['selectt']));
                    echo "---------------------".$AlignTop['min_align']."------------".$AlignTop['max_align']."---------------------";
                    db_query("update forum set parent=".(int)$_POST['selectt'].", min_align='".$AlignTop['min_align']."' , max_align='".$AlignTop['max_align']."' where id=".(int)$_POST['numt']);
                }
                if(($_GET['conf'] == null) && ($_GET['topic'] == null)) { $_GET['conf'] = 1; }


                $Movemess=($user['align']>2 && $user['align']<3 && $user['align'] > '3.05' && $user['align'] < '4') ? 1:0;
                $replasepost='';
                if($_GET['conf'] || $_GET['konftop'] || $Movemess==1) {
                    $data = db_query("SELECT * FROM `forum` WHERE `type` = 1 ORDER by `id` ASC;");
                    while($row = mysqli_fetch_array($data))
                    {
                        if (($row['min_align'] == 0 && $row['max_align'] == 0) || ($user['align']>=$row['min_align'] && $user['align']<=$row['max_align']) || ($row['min_align']==5 && $row['max_align']==5 && $user['deal']==1) || ($row['min_align']==175 && $row['max_align']==777 && ($user['align']=="1.2" or $user['align']=="1.99" or $user['align']="3.99")) || ($user['align']>2 && $user['align']<3)) {

                            if ($row['id'] == 30 || $row['id'] == 40){
                                        echo "<tr valign=top><td><br></td></tr>";
                            }
                            else $replasepost.="<option value='".$row['id']."'>".$row['topic']."</option>";
                            echo "<tR valign=top><td>&nbsp;&nbsp;•</td><td><a href='?conf={$row['id']}'>{$row['topic']}</a></td></tr>";
                        }
                    }
                }

            ?></table><BR><BR><BR><BR></TD>
          <TD vAlign=top width="75%">
          <?

        function remtags($s) {
          $s=str_replace("<","&lt;", $s);
          $s=str_replace(">","&gt;", $s);
          $s=str_replace("\"","&quot;", $s);
          $s=str_replace("'","&#39;", $s);
          $s=str_replace("\\n","<br>",$s);
          $s=stripslashes($s);
          return $s;
        }
        if ($_POST["add"] || $_POST["add2"]) {
          $effect = mqfa("SELECT `time` FROM `effects` WHERE (`owner` = '{$user['id']}' or owner=$user[id]+"._BOTSEPARATOR_.") and (`name` = 'Заклятие форумного молчания' or type=3)");
          if ($effect) {
            unset($_POST["add"]);
            unset($_POST["add2"]);
          }
        }
        if($_POST['add'] && $user['id'] && $user['level']>3) {
            $icon = htmlentities($_POST['icon'],ENT_NOQUOTES,cp1251);
            $text1=remtags($_POST['text']);    
            $text2=remtags($_POST['title']);
            $text1 = ereg_replace("&lt;B&gt;","<B>",$text1);
            $text1 = ereg_replace("&lt;/B&gt;","</B>",$text1);
            $text1 = ereg_replace("&lt;U&gt;","<U>",$text1);
            $text1 = ereg_replace("&lt;/U&gt;","</U>",$text1);
            $text1 = ereg_replace("&lt;I&gt;","<I>",$text1);
            $text1 = ereg_replace("&lt;/I&gt;","</I>",$text1);
            $text1 = ereg_replace("&lt;CODE&gt;","<CODE>",$text1);
            $text1 = ereg_replace("&lt;/CODE&gt;","</CODE>",$text1);
            $text1 = ereg_replace("&lt;b&gt;","<b>",$text1);
            $text1 = ereg_replace("&lt;/b&gt;","</b>",$text1);
            $text1 = ereg_replace("&lt;u&gt;","<u>",$text1);
            $text1 = ereg_replace("&lt;/u&gt;","</u>",$text1);
            $text1 = ereg_replace("&lt;i&gt;","<i>",$text1);
            $text1 = ereg_replace("&lt;/i&gt;","</i>",$text1);
            $text1 = ereg_replace("&lt;code&gt;","<code>",$text1);
            $text1 = ereg_replace("&lt;/code&gt;","</code>",$text1);
            $text1 = ereg_replace("&lt;br&gt;","<br>",$text1);
            $text1 = ereg_replace("&lt;BR&gt;","<BR>",$text1);
            $text1 = ereg_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]","<a href=\"\\0\" target=_blank>\\0</a>", $text1);
            $minmax = mysqli_fetch_array(db_query("SELECT `min_align`,`max_align` FROM `forum` WHERE `id` = '{$_GET['conf']}'"));
            $min_align=$minmax['min_align'];
            $max_align=$minmax['max_align'];
            if ($_POST['title'] == "" or $_POST['title'] == " " or $_POST['text'] == "" or $_POST['text']== " ") {
                echo "<font color=red><b>Заголовок или текст не могут быть пустыми</b></font>";
            }
            elseif (!(is_numeric($_GET['conf'])) || !($_GET['conf'] > 0 && $_GET['conf'] <70)) {
                echo "<font color=red><b>Не надо так делать</b></font>";
            }
            elseif (($minmax['min_align'] == 0 && $minmax['max_align'] == 0) || ($user['align']>=$minmax['min_align'] && $user['align']<=$minmax['max_align']) || ($minmax['min_align']==5 && $minmax['max_align']==5 && $user['deal']==1) || ($minmax['min_align']==172 && $minmax['max_align']==777 && ($user['align']=="1.2" or $user['align']=="1.99" or $user['align']="3.99")) || ($user['align']>2 && $user['align']<3)) {
                if ($user['invis']=='1' && $user["align"]!=2.5) {
                db_query("INSERT INTO `forum` (`type`,`topic`,`text`,`parent`,`author`,`date`,`min_align`,`max_align`,`icon`)
                VALUES (2,'{$text2}','".strip_tags(nl2br($text1),"<b><i><u><code><BR>")."','{$_GET['conf']}','<b>невидимка</b>','".date("d.m.y H:i:s")."','$min_align','$max_align','{$icon}') ;");
                }else
                db_query("INSERT INTO `forum` (`type`,`topic`,`text`,`parent`,`author`,`date`,`min_align`,`max_align`,`icon`)
                VALUES (2,'{$text2}','".strip_tags(nl2br($text1),"<b><i><u><code><BR>")."','{$_GET['conf']}','".nick3($_SESSION['uid'])."','".date("d.m.y H:i:s")."','$min_align','$max_align','{$icon}') ;");
                echo "<script>document.location.replace('forum.php?$_SERVER[QUERY_STRING]')</script>";
                die;
            }
            else {
                echo "<font color=red><b>Вы не можете писать в этой конференции</b></font>";
            }
            $_POST['add']="";
        }

        if($_POST['add2'] && $user['id'] && $user['level']>3) {
            $text1=remtags($_POST['text']);    
            $text2=remtags($_POST['title']);
            $text1 = ereg_replace("&lt;B&gt;","<B>",$text1);
            $text1 = ereg_replace("&lt;/B&gt;","</B>",$text1);
            $text1 = ereg_replace("&lt;U&gt;","<U>",$text1);
            $text1 = ereg_replace("&lt;/U&gt;","</U>",$text1);
            $text1 = ereg_replace("&lt;I&gt;","<I>",$text1);
            $text1 = ereg_replace("&lt;/I&gt;","</I>",$text1);
            $text1 = ereg_replace("&lt;CODE&gt;","<CODE>",$text1);
            $text1 = ereg_replace("&lt;/CODE&gt;","</CODE>",$text1);
            $text1 = ereg_replace("&lt;b&gt;","<b>",$text1);
            $text1 = ereg_replace("&lt;/b&gt;","</b>",$text1);
            $text1 = ereg_replace("&lt;u&gt;","<u>",$text1);
            $text1 = ereg_replace("&lt;/u&gt;","</u>",$text1);
            $text1 = ereg_replace("&lt;i&gt;","<i>",$text1);
            $text1 = ereg_replace("&lt;/i&gt;","</i>",$text1);
            $text1 = ereg_replace("&lt;code&gt;","<code>",$text1);
            $text1 = ereg_replace("&lt;/code&gt;","</code>",$text1);
            $text1 = ereg_replace("&lt;br&gt;","<br>",$text1);
            $text1 = ereg_replace("&lt;BR&gt;","<BR>",$text1);
            $text1 = ereg_replace("[[:alpha:]]+://[^<>[:space:]]+[[:alnum:]/]","<a href=\"\\0\" target=_blank>\\0</a>", $text1);
            $minmax = mysqli_fetch_array(db_query("SELECT `min_align`,`max_align`, `close` FROM `forum` WHERE `id` = '{$_GET['topic']}'"));
            $min_align=$minmax['min_align'];
            $max_align=$minmax['max_align'];

            if ($_POST['text'] == "") {
                echo "<font color=red><b>Текст не может быть пустыми</b></font>";
            }
            elseif (!(is_numeric($_GET['topic']))) {
                echo "<font color=red><b>Не надо так делать</b></font>";
            }
            if (($minmax['min_align'] == 0 && $minmax['max_align'] == 0) || ($user['align']>=$minmax['min_align'] && $user['align']<=$minmax['max_align']) || ($minmax['min_align']==5 && $minmax['max_align']==5 && $user['deal']==1) || ($minmax['min_align']==175 && $minmax['max_align']==777 && ($user['align']=="1.2" or $user['align']=="1.99" or $user['align']="3.99")) || ($user['align']>2 && $user['align']<3)) {
            if ($user['level'] < 4 or $user['align'] == 4 or $minmax['close'] == 1){echo "<font color=red><b>Не выйдет...</b></font>";}else{
            if ($user['invis']=='1' && $user["align"]!=2.5) {
                db_query("INSERT INTO `forum` (`type`,`topic`,`text`,`parent`,`author`,`date`,`min_align`,`max_align`)
                VALUES (2,'{$text2}','".strip_tags(nl2br($text1),"<b><i><u><code><BR><a>")."','{$_GET['topic']}','<b>невидимка</b>','".date("d.m.y H:i:s")."','$min_align','$max_align') ;");
            }else
                db_query("INSERT INTO `forum` (`type`,`topic`,`text`,`parent`,`author`,`date`,`min_align`,`max_align`)
                VALUES (2,'{$text2}','".strip_tags(nl2br($text1),"<b><i><u><code><BR><a>")."','{$_GET['topic']}','".nick3($_SESSION['uid'])."','".date("d.m.y H:i:s")."','$min_align','$max_align') ;");
                db_query("UPDATE `forum` SET `updated` = now() WHERE `id` = '{$_GET['topic']}';");
            }
              echo "<script>document.location.replace('forum.php?$_SERVER[QUERY_STRING]')</script>";
              die;
            }
            else {
                echo "<font color=red><b>Вы не можете писать в этой конференции</b></font>";
            }
            $_POST['add2']="";
        }

        if ($_GET['dp'] && (($user['align']>1.4 && $user['align']<2) || ($user['align']>2 && $user['align']<3))  || $user['align'] == '777' || ($user['align'] > '3.05' && $user['align'] < '4'))
        {
            if ($user['align']>1.1 && $user['align']<2) {$angel="паладином";}
            if ($user['align']>2 && $user['align']<3) {$angel="Ангелом";}
            if ($user['invis']=='1' && $user["align"]!=2.5) {
            db_query("UPDATE `forum` SET `text` = '<font color=red>Удалил невидимка</font>' WHERE `id` = {$_GET['dp']} LIMIT 1;");
            }else
            db_query("UPDATE `forum` SET `text` = '<font color=red>Удалено $angel ".nick3($_SESSION['uid'])."</font>' WHERE `id` = {$_GET['dp']} LIMIT 1;");
        }

        if ($_GET['dt'] && (($user['align']>1.4 && $user['align']<2) || ($user['align']>2 && $user['align']<3))  || $user['align'] == '777' || ($user['align'] > '3.05' && $user['align'] < '4'))
        {
			$mne = mysqli_fetch_array(db_query("SELECT * FROM `forum` WHERE `id` = '{$_GET['dt']}' LIMIT 1; "));
			$mne2 = mysqli_fetch_array(db_query("SELECT * FROM `forum` WHERE `id` = '{$mne['parent']}' LIMIT 1; "));
              db_query("DELETE FROM `forum`WHERE `id` = {$_GET['dt']} LIMIT 1;");
              $f=fopen("logs/forumlog.txt","ab");
              $_POST["txt"]=str_replace("\r","",$_POST["txt"]);
              $_POST["txt"]=str_replace("\n","",$_POST["txt"]);
              fwrite($f, "".date("Y-m-d H:i:s")." <b>$user[login]</b>: Удалил тему: &quot;{$mne['topic']}&quot; из раздела &quot;{$mne2['topic']}&quot; DEBUG: {$_SERVER['REQUEST_URI']}<br>\r\n");
              fclose($f);
        }

        if ($_GET['com'] && $_GET['cpr'] && (($user['align']>1.6 && $user['align']<2) || ($user['align']>2 && $user['align']<3))  || $user['align'] == '777' || ($user['align'] > '3.05' && $user['align'] < '4'))
        {
            if ($user['invis']==1 && $user["align"]!=2.5) {
            db_query("UPDATE `forum` SET `text` = CONCAT(`text`,'<BR><font color=red><b>невидимка</b>: ".$_GET['cpr']."</font>') WHERE `id` = {$_GET['com']} LIMIT 1;");
            }else
            db_query("UPDATE `forum` SET `text` = CONCAT(`text`,'<BR><font color=red>".nick3($_SESSION['uid']).": ".$_GET['cpr']."</font>') WHERE `id` = {$_GET['com']} LIMIT 1;");

        }
        if ($_GET['do'] && (($user['align']>1.4 && $user['align']<2) || ($user['align']>2 && $user['align']<3))  || $user['align'] == '777' || ($user['align'] > '3.05' && $user['align'] < '4'))
        {
            if ($_GET['do'] == "open") {
                db_query("UPDATE `forum` SET `close` = '0' WHERE `id` = {$_GET['topic']} LIMIT 1;");
            }
            if ($_GET['do'] == "close") {
            if ($user['align']>1.1 && $user['align']<2) {$angel="паладином";}
            if ($user['align']>2 && $user['align']<3) {$angel="Ангелом";}
            if ($user['invis']=='1' && $user["align"]!=2.5) {
                db_query("UPDATE `forum` SET `close` = '1', `closepal` = '<font color=red>Обсуждение закрыл невидимка</font>' WHERE `id` = {$_GET['topic']} LIMIT 1;");
}else
                db_query("UPDATE `forum` SET `close` = '1', `closepal` = '<font color=red>Обсуждение закрыто $angel ".nick3($_SESSION['uid'])."</font>' WHERE `id` = {$_GET['topic']} LIMIT 1;");
            }
            if ($_GET['do'] == "fix") {
                db_query("UPDATE `forum` SET `fix` = '1' WHERE `id` = {$_GET['topic']} LIMIT 1;");
            }
            if ($_GET['do'] == "unfix") {
                db_query("UPDATE `forum` SET `fix` = '0' WHERE `id` = {$_GET['topic']} LIMIT 1;");
            }
        }

          if(!$_GET['conf']) {
            $row = mysqli_fetch_array(db_query("SELECT * FROM `forum` WHERE `id` = '{$_GET['topic']}'"));
            {
            if (($row['min_align'] == 0 && $row['max_align'] == 0) || ($user['align']>=$row['min_align'] && $user['align']<=$row['max_align']) || ($row['min_align']==5 && $row['max_align']==5 && $user['deal']==1) || ($row['min_align']==3.092 && $row['max_align']==777 && ($user['align']=="1.2" or $user['align']=="1.99" or $user['align']="3.99")) || ($user['align']>2 && $user['align']<3)) {
                $nextdb = mysqli_fetch_array(db_query("SELECT `id` FROM `forum` WHERE `id` < '{$_GET['topic']}' and `parent` = '{$row['parent']}' ORDER by `id` DESC LIMIT 1"));
                $prevdb = mysqli_fetch_array(db_query("SELECT `id` FROM `forum` WHERE `id` > '{$_GET['topic']}' and `parent` = '{$row['parent']}' ORDER by `id` ASC LIMIT 1"));
                $prev=$prevdb['id'];
                $next=$nextdb['id'];
                $top=$row['parent'];
                $icons=$row['icon'];
            ?>
             <CENTER>
            <TABLE width="88%" border=0>
              <TBODY>
              <TR>
                <TD noWrap align=center><A
                  href="?topic=<?echo "$prev";?>">«
                  предыдущая ветвь</A> | <A
                  href="forum.php?conf=<?echo "$top";?>">форум</A> | <A
                  href="?topic=<?echo "$next";?>">следующая
                  ветвь »</A></TD></TR></TBODY></TABLE></CENTER>
            <?

                $par_top=mysqli_fetch_row(db_query("SELECT closepal, id FROM `forum` WHERE id=".(int)$_GET['topic']));
                if (((int)$par_top[1]!=0)OR((int)$_GET['konftop']>0)) //
                    {

                if ($row['close'] == 1) {
                    $close="<a href='?topic={$_GET['topic']}&do=open'>Открыть</a>";
                    $closed=1;
                    $closepal=$row['closepal'];
                }else{
                    $close="<a href='?topic={$_GET['topic']}&do=close'>Закрыть</a>";
                }
                if ($row['fix'] == 1) {
                    $fix="<a href='?topic={$_GET['topic']}&do=unfix'>Открепить</a>";
                }else{
                    $fix="<a href='?topic={$_GET['topic']}&do=fix'>Прикрепить</a>";
                }

                if(($user['align']>1.4 && $user['align']<2) || ($user['align']>2 && $user['align']<3)  || $user['align'] == '3.092' || $user['align'] == '3.99') {
                    echo "<br><div align=right>$close $fix";

                    echo " <select id='seltopic".$_GET['topic']."'>".$replasepost."</select> <input type='button' value='Переместить' onClick=\"replasetopic(".$_GET['konftop'].",".$_GET['topic'].")\"></div>";
                    if ($_POST['selectt']!='' && $_POST['numt']!='')
                            echo "<center><h3>Тема перемещена.</h3><a href='forum.php?topic=".$_POST['numt']."&konftop=".$_POST['selectt']."'>forum.php?topic=".$_POST['numt']."&konftop=".$_POST['selectt']."</a></center>";
                }
                $pgs = mysqli_fetch_array(db_query("SELECT count(`id`) FROM `forum` WHERE `parent` = '{$_GET['topic']}';"));
                if (!isset($_GET["page"])) $_GET["page"]=floor(($pgs[0]-1)/20);
                $pgs = $pgs[0]/20;
                if ($pgs) {
                    echo "Страницы: ";
                }
                $pages_str='';
                $page = (int)$_GET['page']>0 ? (((int)$_GET['page']+1)>$pgs ? ($pgs-1):(int)$_GET['page']):0;
                $page=ceil($page);
                if ($pgs>1) {
                    for ($i=0;$i<ceil($pgs);$i++)
                    if (($i>($page-5))&&($i<=($page+4)))
                            $pages_str.=($i==$page ? " <b>".($i+1)."</b>":" <a href='?topic=".$_GET['topic']."&page=".($i)."'>".($i+1)."</a>");
                    $pages_str.=($page<$pgs-5 ? "...":"");
                    $pages_str=($page>4 ? "<a href='?topic=".$_GET['topic']."&page=".($page-1)."'> < </a> ... ":"").$pages_str.(($page<($pgs-1) ? "<a href='?topic=".$_GET['topic']."&page=".($page+1)."' > ></a>":""));
                }
                $FirstPage=(ceil($pgs)>4 ? $_GET['page']>0 ? "<a href='?topic=".$_GET['topic']."&page=0'>   Первая </a>":"":"");
                $LastPage=(ceil($pgs)>4 ? (ceil($pgs)-1)!=$_GET['page'] ? "<a href='?topic=".$_GET['topic']."&page=".(ceil($pgs)-1)."'>   Последняя </a>":"":"");
                $pages_str=$FirstPage.$pages_str.$LastPage;
                echo $pages_str;
                echo "<H4><IMG height=15 src=\"i/icon{$icons}.gif\" width=15 border=0> {$row['topic']}</H4><BR>";
                echo "{$row['author']} (<span class=date>{$row['date']}</span>)";
                if(($user['align']>1.6 && $user['align']<2) || ($user['align']>2 && $user['align']<3)  || $user['align'] == '777' || ($user['align'] > '3.05' && $user['align'] < '4')) {
                        echo " <a href='?topic=".$_GET['topic']."&page=".$_GET['page']."&dp=".$row['id']."'><img src='i/clear.gif'></a>";
                        echo " <a onclick='var obj; if (obj = prompt(\"Введите комментарий\",\"\")) { window.location=\"forum.php?topic=".$_GET['topic']."&page=".$_GET['page']."&cpr=\"+obj+\"&com=".$row['id']."\"; }' href='#'>[комментарий]</a>";
                    }
                echo "<BR>".pre($row['text'])."<HR>";
                    $data = db_query("SELECT * FROM `forum` WHERE `parent` = '{$_GET['topic']}'  ORDER by `id` ASC LIMIT ".max(0,(int)($_GET['page']*20)).",20;");
                    while($row = mysqli_fetch_array($data))   {
                        echo "{$row['author']} (<span class=date>{$row['date']}</span>)";
                        if(($user['align']>1.6 && $user['align']<2) || ($user['align']>2 && $user['align']<3)  || $user['align'] == '777' || ($user['align'] > '3.05' && $user['align'] < '4')) {
                            echo " <a href='?topic={$_GET['topic']}&page=".$_GET['page']."&dp={$row['id']}'><img src='i/clear.gif'></a>";
                            echo " <a onclick='var obj; if (obj = prompt(\"Введите комментарий\",\"\")) { window.location=\"forum.php?topic=".$_GET['topic']."&page=".$_GET['page']."&cpr=\"+obj+\"&com=".$row['id']."\"; }' href='#'>[комментарий]</a>";
                        }
                        echo "<BR>".pre($row['text'])."<HR>";
                    }
                if ($pgs) {
                    echo "Страницы: ";
                }
                echo $pages_str;
                if ($closed==1) {
                    echo "<br><div align=center>$closepal</div><br><br>";
                }
                else {
                    $effect = mysqli_fetch_array(db_query("SELECT `time` FROM `effects` WHERE (`owner` = '{$user['id']}' or owner=$user[id]+"._BOTSEPARATOR_.") and (`name` = 'Заклятие форумного молчания' or type=3) LIMIT 1;"));
                    if ( $_SESSION['uid'] && !$effect['time'] && $user['align'] != 4 && $user['level'] > 3) {
          ?>
            <A name=answer></A>
            <FORM name=F1 action="forum.php?topic=<?=$_GET['topic']?>&page=<?=$_GET['page']?>" method=post>
            <TABLE
            style="BORDER-RIGHT: 1px outset; BORDER-TOP: 1px outset; BORDER-LEFT: 1px outset; BORDER-BOTTOM: 1px outset"
            cellSpacing=0 cellPadding=2 bgColor=#f6e5b1 border=0 name="F1">
              <TBODY>
              <TR>
                <TD>
                  <H4>Написать ответ</H4></TD></TR>
              <TR>
                <TD>
                  <TABLE width="100%" border=0>
                    <TBODY>
                    <TR>
                      <TD align=middle><TEXTAREA name=text rows=12 cols=85></TEXTAREA></TD>
                      <TD><INPUT onclick="cs('<B>', '</B>');return false;"
                        type=image height=22 alt=Жирный width=25 src="i/a4.gif "
                        border=0><BR><IMG height=1 alt="" src="" width=1
                        border=0><BR><INPUT
                        onclick="cs('<I>', '</I>');return false;" type=image
                        height=22 alt=Наклонный width=25 src="i/a2.gif "
                        border=0><BR><IMG height=1 alt="" src="" width=1
                        border=0><BR><INPUT
                        onclick="cs('<U>', '</U>');return false;" type=image
                        height=22 alt=Подчеркнутый width=25 src="i/a3.gif "
                        border=0><BR><IMG height=1 alt="" src="" width=1
                        border=0><BR><INPUT
                        onclick="cs('<CODE>', '</CODE>');return false;"
                        type=image height=22 alt="Текст программы" width=25
                        src="i/a1.gif " border=0><BR><IMG height=1 alt="" src="" width=1
                        border=0><BR><INPUT onclick="cs('//', '');return false;"
                        type=image height=22
                        alt="Вставка цитаты.&#10;Выделите цитируемый текст и нажмите эту кнопку."
                        width=25 src="i/a5.gif "
              border=0><BR></TD></TR></TBODY></TABLE></TD></TR><INPUT
              type=hidden value=0 name=n> <INPUT type=hidden value=1025804759
              name=id> <INPUT type=hidden name=redirect>
              <TR>
                <TD align=right><INPUT type=submit value=Добавить name=add2>
                </TD></TR></FORM></TBODY></TABLE><SMALL>Разрешается использование
            тегов форматирования текста:<BR><FONT
            color=#990000>&lt;b&gt;</FONT><B>жирный</B><FONT
            color=#990000>&lt;/b&gt; &lt;i&gt;</FONT><I>наклонный</I><FONT
            color=#990000>&lt;/i&gt; &lt;u&gt;</FONT><U>подчеркнутый</U><FONT
            color=#990000>&lt;/u&gt;</FONT>,<BR>а для выделения текста программ,
            используйте <FONT color=#990000>&lt;code&gt; ...
            &lt;/code&gt;</FONT><BR>и не забывайте закрывать теги! <FONT
            color=#990000>&lt;/b&gt;&lt;/i&gt;&lt;/u&gt;&lt;/code&gt;</FONT> :)
            </SMALL>
            <P> <BR><BR></P></TD></TR><?
                    }
                    elseif ($user['align'] == 4) {
                        echo "<br><br><center>Персонажам со склонностью хаос запрещено писать на форуме!</center><br><br>";
                    }
                    elseif ($user['level'] < 7) {
                        echo "<br><br><center>Персонажам до 7-го уровня запрещено писать на форуме!</center><br><br>";
                    }
                    else {
                        echo "<br><br>";
                    }
                }
                }
                else echo "Тема удалена с форума, либо её не существует<br>";
            }
          }
        }
        else {
            $row = mysqli_fetch_array(db_query("SELECT * FROM `forum` WHERE `id` = '{$_GET['conf']}'"));
            if (($row['min_align'] == 0 && $row['max_align'] == 0) || ($user['align']>=$row['min_align'] && $user['align']<=$row['max_align']) || ($row['min_align']==5 && $row['max_align']==5 && $user['deal']==1) || ($row['min_align']==175 && $row['max_align']==777 && ($user['align']=="1.2" or $user['align']=="1.99" or $user['align']=="3.99")) || ($user['align']>2 && $user['align']<3)){

            ?>
            <centeR>
                <h3>Конференция "<?=$row['topic']?>"</h3>
                <p style="text-align:justify; padding:10px;"><?=pre($row['text'])?></p>
            </center>
            <?
            $pgs = mysqli_fetch_array(db_query("SELECT count(`id`) FROM `forum` WHERE `parent` = '{$_GET['conf']}' ORDER by `fix` DESC, `updated` DESC;"));

            $pgs = $pgs[0]/20;
            if ($pgs) {
                echo "Страницы: ";
            }

            $pages_str='';
            $page = (int)$_GET['page']>0 ? (((int)$_GET['page']+1)>$pgs ? ($pgs-1):(int)$_GET['page']):0;
            $page=ceil($page);
            if ($pgs>1) {
                for ($i=0;$i<ceil($pgs);$i++)
                    if (($i>($page-5))&&($i<=($page+4)))
                $pages_str.=($i==$page ? " <b>".($i+1)."</b>":" <a href='?conf=".$_GET['conf']."&page=".($i)."'>".($i+1)."</a>");
                $pages_str.=($page<$pgs-5 ? "...":"");
                $pages_str=($page>4 ? "<a href='?conf=".$_GET['conf']."&page=".($page-1)."'> < </a> ... ":"").$pages_str.(($page<($pgs-1) ? "<a href='?conf=".$_GET['conf']."&page=".($page+1)."' > ></a>":""));
            }
            $FirstPage=(ceil($pgs)>4 ? $_GET['page']>0 ? "<a href='?topic=".$_GET['topic']."&page=0'>   Первая </a>":"":"");
            $LastPage=(ceil($pgs)>4 ? (ceil($pgs)-1)!=$_GET['page'] ? "<a href='?topic=".$_GET['topic']."&page=".(ceil($pgs)-1)."'>   Последняя </a>":"":"");
            $pages_str=$FirstPage.$pages_str.$LastPage;
            echo $pages_str;
            $data = db_query("SELECT * FROM `forum` WHERE `parent` = '{$_GET['conf']}' ORDER by `fix` DESC, `updated` DESC LIMIT ".(INT)($_GET['page']*20).",20;");
            while($row = mysqli_fetch_array($data))   {
                $logi = '';
                $userlist = '';
                $icons=$row['icon'];
                $data2 = db_query("SELECT `author` FROM `forum` WHERE `parent` = '{$row['id']}' ORDER by `id` DESC LIMIT 10");
                while($row2 = mysqli_fetch_array($data2))     {
                    $userlist = strip_tags($row2[0],"");
                    list ($username,$level)=split (" \[",$userlist);
                    if ($logi) $logi=", $logi"; 
                    $logi=$username." $logi";

                }
                $query="select count(*) as CountNumber from table where i=2";
                $datacount = mysqli_fetch_array(db_query("SELECT count(*) as CountNumber FROM `forum` WHERE `parent` = '{$row['id']}';"));
                $count=$datacount["CountNumber"];
                $lasttimedb = mysqli_fetch_array(db_query("SELECT `date` FROM `forum` WHERE `parent` = '{$row['id']}' ORDER by `id` DESC LIMIT 1;"));
                $lasttime=$lasttimedb['date'];

                echo "<p class=pleft>".($row['fix']?"<IMG src=\"i/fixed.gif\" alt=\"Закреплено\" title=\"Закреплено\" border=0> ":"")."<a href='?topic=".$row['id'];
                if(($user['align']>1.4 && $user['align']<2) || ($user['align']>2 && $user['align']<3)  || $user['align'] == '777' || ($user['align'] > '3.05' && $user['align'] < '4')) echo "&konftop=".$_GET['conf'];
                echo "'><IMG height=15 src=\"i/icon{$icons}.gif\" width=15 border=0> {$row['topic']}</a> {$row['author']}";

                if(($user['align']>1.4 && $user['align']<2) || ($user['align']>2 && $user['align']<3)  || $user['align'] == '777' || ($user['align'] > '3.05' && $user['align'] < '4')) {
                    echo " <a href='?conf={$_GET['conf']}&dt={$row['id']}'><img src='i/clear.gif'></a>";
                }

                echo "<BR><span class=date>{$row['date']}</span> ".strip_tags(pre(substr($row['text'],0,200)))."...
                <BR><small>Ответов: $count ($lasttime) ...".$logi."</small></p>";
            }

            if ($pgs) {
                echo "Страницы: ";
            }
            echo $pages_str;
            $effect = mysqli_fetch_array(db_query("SELECT `time` FROM `effects` WHERE (`owner` = '{$user['id']}' or owner=$user[id]+"._BOTSEPARATOR_.") and (`name` = 'Заклятие форумного молчания' or type=3) LIMIT 1;"));
            if ( $_SESSION['uid'] && !$effect['time'] && $user['align'] != 4 && $user['level'] > 3 && (($_GET["conf"]!=10 && $_GET["conf"]!=3) || $user["id"]==7)) {


            ?>
            <A name=answer></A>
            <FORM name=F1 action="forum.php?conf=<?=$_GET['conf']?>" method=post>
            <TABLE
            style="BORDER-RIGHT: 1px outset; BORDER-TOP: 1px outset; BORDER-LEFT: 1px outset; BORDER-BOTTOM: 1px outset"
            cellSpacing=0 cellPadding=2 bgColor=#f6e5b1 border=0 name="F1">
              <TBODY>
              <TR>
                <TD>
                  <H4>Добавить свой вопрос в форум</H4> Тема сообщения <input type=text class="inup" value="<?=stripslashes(@$_POST["title"])?>" name=title size=57 maxlength=65></TD></TR>
              <TR>
                <TD>
                  <TABLE width="100%" border=0>
                    <TBODY>
                    <TR>
                      <TD align=middle><TEXTAREA name=text rows=12 cols=85><?=stripslashes(@$_POST["text"])?></TEXTAREA></TD>
                      <TD><INPUT onclick="cs('<B>', '</B>');return false;"
                        type=image height=22 alt=Жирный width=25 src="i/a4.gif "
                        border=0><BR><IMG height=1 alt="" src="" width=1
                        border=0><BR><INPUT
                        onclick="cs('<I>', '</I>');return false;" type=image
                        height=22 alt=Наклонный width=25 src="i/a2.gif "
                        border=0><BR><IMG height=1 alt="" src="" width=1
                        border=0><BR><INPUT
                        onclick="cs('<U>', '</U>');return false;" type=image
                        height=22 alt=Подчеркнутый width=25 src="i/a3.gif "
                        border=0><BR><IMG height=1 alt="" src="" width=1
                        border=0><BR><INPUT
                        onclick="cs('<CODE>', '</CODE>');return false;"
                        type=image height=22 alt="Текст программы" width=25
                        src="i/a1.gif " border=0><BR><IMG height=1 alt="" src="" width=1
                        border=0><BR><INPUT onclick="cs('//', '');return false;"
                        type=image height=22
                        alt="Вставка цитаты.&#10;Выделите цитируемый текст и нажмите эту кнопку."
                        width=25 src="i/a5.gif "
              border=0><BR></TD></TR></TBODY></TABLE></TD></TR><INPUT
              type=hidden value=0 name=n> <INPUT type=hidden value=1025804759
              name=id> <INPUT type=hidden name=redirect>
              <TR>
                <TD align=right>

                 <table width=100%>
                <tr>
                    <td>
                        <input type=radio name=icon value=13 checked><IMG SRC=i/icon13.gif height=15 width=15> &nbsp;
                        <input type=radio name=icon value=14><IMG SRC=i/icon14.gif height=15 width=15> &nbsp;
                        <input type=radio name=icon value=6><IMG SRC=i/icon6.gif height=15 width=15> &nbsp;
                        <input type=radio name=icon value=9><IMG SRC=i/icon9.gif height=15 width=15> &nbsp;
                        <input type=radio name=icon value=1><IMG SRC=i/icon1.gif height=15 width=15> &nbsp;
                        <input type=radio name=icon value=10><IMG SRC=i/icon10.gif height=15 width=15> &nbsp;
                        <input type=radio name=icon value=11><IMG SRC=i/icon11.gif height=15 width=15><BR>
                        <input type=radio name=icon value=12><IMG SRC=i/icon12.gif height=15 width=15> &nbsp;
                        <input type=radio name=icon value=2><IMG SRC=i/icon2.gif height=15 width=15> &nbsp;
                        <input type=radio name=icon value=3><IMG SRC=i/icon3.gif height=15 width=15> &nbsp;
                        <input type=radio name=icon value=4><IMG SRC=i/icon4.gif height=15 width=15> &nbsp;
                        <input type=radio name=icon value=5><IMG SRC=i/icon5.gif height=15 width=15> &nbsp;
                        <input type=radio name=icon value=7><IMG SRC=i/icon7.gif height=15 width=15> &nbsp;
                        <input type=radio name=icon value=8><IMG SRC=i/icon8.gif height=15 width=15>
                    </td>
                    <td align=right>
                        <input type="submit" class="btn" value="Добавить" name="add">
                        <input type="hidden" name="n" value="klans">
                        <input type="hidden" id="act" name="act" value="add_branch"/>
                    </td>
                </tr>
            </table>

                </TD></TR></FORM></TBODY></TABLE><SMALL>Разрешается использование
            тегов форматирования текста:<BR><FONT
            color=#990000>&lt;b&gt;</FONT><B>жирный</B><FONT
            color=#990000>&lt;/b&gt; &lt;i&gt;</FONT><I>наклонный</I><FONT
            color=#990000>&lt;/i&gt; &lt;u&gt;</FONT><U>подчеркнутый</U><FONT
            color=#990000>&lt;/u&gt;</FONT>,<BR>а для выделения текста программ,
            используйте <FONT color=#990000>&lt;code&gt; ...
            &lt;/code&gt;</FONT><BR>и не забывайте закрывать теги! <FONT
            color=#990000>&lt;/b&gt;&lt;/i&gt;&lt;/u&gt;&lt;/code&gt;</FONT> :)
            </SMALL>
            <P> <BR><BR></P></TD></TR><?
                }
                elseif ($user['align'] == 4) {
                    echo "<br><br><center>Персонажам со склонностью хаос запрещено писать на форуме!</center><br><br>";
                }
                elseif ($user['level'] < 7) {
                    echo "<br><br><center>Персонажам до 7-го уровня запрещено писать на форуме!</center><br><br>";
                }
                else {
                    echo "<br><br>";
                }

            }
        }


            ?>
            </SMALL>
            <P> <BR><BR></P></TD></TR>        <TR>
          <TD align=left width="100%" bgColor=#666666 colSpan=3>
            </TD></TR></TBODY></TABLE>
</TD>
    <TD vAlign=top width="0%">
      <TABLE cellSpacing=0 cellPadding=0 width="100%" border=0>
        <TBODY>
        <TR>
          <TD width="100%" height=36></TD></TR>
        </TBODY></TABLE></TD></TR></TBODY></TABLE><SCRIPT language=Javascript></SCRIPT>
<?php
if(($user['align']>1.4 && $user['align']<2) || ($user['align']>2 && $user['align']<3)  || $user['align'] == '777' || ($user['align'] > '3.05' && $user['align'] < '4')) {
?>
<td background="<?=IMG_PATH?>/forum/right.jpg" align="center">
&nbsp;
</td>
<tr><td width="93" height="143"><img src="<?=IMG_PATH?>/forum/bottoml.gif"></td><td background="<?=IMG_PATH?>/forum/bottom.gif" align="center">
</td><td width="93" height="143"><img src="<?=IMG_PATH?>/forum/bottomr.gif"></td></tr>
<?php
}
?>
</BODY></HTML>