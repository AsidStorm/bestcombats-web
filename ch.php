<?php
  session_start();
  include 'connect.php';
  include 'functions.php';
  if($user['block']>0){session_destroy();}
  if (!($_SESSION['uid'] >0)) {
    echo "<script>top.window.location='index.php?exit=0.560057875997465'</script>"; die();
  }
  header("Cache-Control: no-cache");

  nick99($user['id']);
  if($_GET['online'] != null) {
    if ($_GET['room'] && (int)$_GET['room'] < 900) {
      $user['room'] = (int)$_GET['room'];
    }
    $data = db_query('select align,u.id,sex,klan,level,login,battle,o.date,invis, (SELECT `id` FROM `effects` WHERE `type` = 2 AND `owner` = u.id LIMIT 1) as slp, (SELECT `id` FROM `effects` WHERE (`type` = 11 OR `type` = 12 OR `type` = 13 OR `type` = 14) AND `owner` = u.id LIMIT 1) as trv,deal FROM `online` as o, `users` as u WHERE o.`id` = u.`id` AND (o.`date` >= '.(time()-90).' OR u.`in_tower`>0) AND u.`room` = '.$user['room'].' AND u.incity = "'.$user['incity'].'" ORDER by `u`.`login`;');
?>
<HTML><HEAD><link rel=stylesheet type="text/css" href="i/main.css">

<SCRIPT>

    function w(name,id,align,klan,level,slp,trv,deal,battle,name2,sex) {
            if (align.length>0) {
              altext="";
              if (align>2 && align<2.5) altext = "Ангел";
              if (align == 2.5) altext = "Ангел";
              if (align == 2.6) altext = "Ангел";
              if (align>2.6 && align<3) altext = "Ангел";
              if (align>3.00 && align<4) altext = "Тёмное Братство";
              if (align>1 && align<2 && klan !="FallenAngels") altext = "Паладин";
              if (align>1 && align<2 && klan =="FallenAngels") altext = "Падший ангел";
              if ( align == 0.98 ) altext ="Тёмный";
              if ( align == 777 ) altext ="Ангел Падальщик";
              if ( align == 4 ) altext ="В хаосе";
              if ( align == 7 ) altext ="Нейтрал";
              if ( align == 0.99 ) altext ="Светлый";
              if (!name2) name2=name;
              align='<img src="<?=IMGBASE?>/i/align_'+align+'.gif" title="'+altext+'" width=13 height=15>';
            }
            if(battle>0){filter = 'style="filter:invert"';}else{filter = '';}
            if (klan.length>0) { klan='<A HREF="/claninf.php?'+klan+'" target=_blank><img src="<?=IMG_PATH?>/klan/'+klan+'.gif" title="'+klan+'" width=24 height=15></A>';}
            document.write('<A HREF="javascript:top.AddToPrivate(\''+name+'\', top.CtrlPress)" target=refreshed><img src="<?=IMGBASE?>/i/lock.gif" '+filter+' title="Приват" width=20 height=15></A>'+align+'<a href="(\''+name+'\',true)"></a>'+klan+'<a href="javascript:top.AddTo(\''+name+'\')" target=refreshed>'+name2+'</a>['+level+']<a href="inf.php?'+id+'" target=_blank title="Инф. о '+name+'">'+'<IMG SRC="<?=IMGBASE?>/i/inf'+sex+'.gif" WIDTH=12 HEIGHT=11 BORDER=0 ALT="Инф. о '+name+'"></a>');
            if (slp>0) { document.write(' <IMG SRC="<?=IMGBASE?>/i/sleep2.gif" WIDTH=24 HEIGHT=15 BORDER=0 ALT="Наложено заклятие молчания">'); }
            if (trv>0) { document.write(' <IMG SRC="<?=IMGBASE?>/i/travma2.gif" WIDTH=24 HEIGHT=15 BORDER=0 ALT="Инвалидность">'); }
            if(battle>0) document.write(' <a href=/logs.php?log='+battle+' target="_blank"><IMG border="0" SRC="<?=IMGBASE?>/i/battle.gif" WIDTH=16 HEIGHT=16 BORDER=0 ALT="Персонаж в бою"></a>');
            document.write('<BR>');
    }
    top.rld();
</SCRIPT>
<title><?=$rooms[$user['room']],' (',mysqli_num_rows($data)?>)</title>
</HEAD>
<body mardginwidth=0 leftmardgin=0 leftmargin=0 marginwidth=0 bgcolor=#faf2f2 onscroll="top.myscroll()" onload="document.body.scrollTop=top.OnlineOldPosition">
<center>
<?php
if (!$_GET['room']) {
?>
<BR><INPUT TYPE=button onClick="window.open('http://events.bestcombats.net/', 'news', 'location=yes,menubar=yes,status=yes,resizable=yes,toolbar=yes,scrollbars=yes,scrollbars=yes')" value="Новости"><INPUT TYPE=button value="Обновить" onclick="location='ch.php?online=<?=time()?>'"><INPUT TYPE=button onClick="window.open('/radio2.htm', 'forum', 'location=yes,menubar=yes,status=yes,resizable=yes,toolbar=yes,scrollbars=yes,scrollbars=yes')" value="Радио">
<?php }
if($user['room']==20 && vrag=="on"){$plroom=1;}
if($user['room']==1){$plroom=0;}
if($user['room']==403){$plroom=0;}
 ?>
</center>
<font style="COLOR:#8f0000;FONT-SIZE:10pt"><B><?=$rooms[$user['room']],' (',mysqli_num_rows($data)+$plroom?>)</B></font>
<table border=0><tr><td nowrap><fant color="fffff">
<script>
<?php
  if($user['room']==1){
    echo 'w(\'Комментатор\', 98,\'1.99\',\'\',\'18\',\'\',\'\',\'0\',\'\',\'Комментатор\',1);';
  }

  if($user['room']==403){
    echo 'w(\'Лука\',', 24,',\'', 9,'\',\'','','\',\'',8,'\',\'','','\',\'','','\',\'',0,'\',\'\',\'Лука\',1);';
  }
  
  if($user['room']==20){
    $vrag_b = mysqli_fetch_array(db_query("SELECT `battle` FROM `bots` WHERE  `prototype` = 99 LIMIT 1 ;"));
    $seyn = mysqli_fetch_array(db_query("SELECT `battle` FROM `bots` WHERE  `prototype` = 4475817 LIMIT 1 ;"));
    if(vrag=="on"){
    echo 'w(\'Общий Враг\', 99,\'4\',\'\',\'15\',\'\',\'\',\'0\',\''.$vrag_b["battle"].'\',\'Общий враг\',1);';
    }
    if(seyn=="on"){
    echo 'w(\'Зомби Шейн\', 4475817,\'4\',\'\',\'15\',\'\',\'\',\'0\',\''.$seyn["battle"].'\',\'Зомби Шейн\',1);';
	}
  }

  while($row=mysqli_fetch_array($data)) {
    if ($row['invis']>0 && $row['id']==$_SESSION['uid'])  { $row['login2'] = $row['login']."</a> (невидимка)"; }
    $i=0;
    if($row['invis']==0 or $row['id']==$_SESSION['uid']){
      $i++;

      if ($row["id"]==2236) $row["level"]="?";
      echo 'w(\'',$row['login'],'\',',$row['id'],',\'',$row['align'],'\',\'',$row['klan'],'\',\'',$row['level'],'\',\'',$row['slp'],'\',\'',$row['trv'],'\',\'',(int)$row['deal'],'\',\'',$row['battle'],'\',\'',$row['login2'],'\', '.$row["sex"].');';
    }
  }
?>
</script>
</td></tr></table>
<?php
if (!$_GET['room']) {
?>
    <SCRIPT>document.write('<INPUT TYPE=checkbox onclick="if(this.checked == true) { top.OnlineStop = false; } else { top.OnlineStop=true; }" '+(top.OnlineStop?'':'checked')+'> Обновлять автоматич.')
    </SCRIPT></body></html>
<?php
    die();
}
    } elseif (@$_GET['show'] != null) {
      if($_SESSION['sid'] != $user['sid']) {
        $_SESSION['uid'] = null;
        die ("<script>top.location.href='index.php';</script>");
      }
      $cha = file(CHATROOT."chat.txt");
        echo "<script>";
        $ks = 0;
        if ($_SESSION["chattime"]) {
          $tmp=explode("-",$_SESSION["chattime"]);
          $user['chattime']=$tmp[0];
          $lastline=$tmp[1];
        } else {
          $lastline=0;
          $user["chattime"]=0;
        }
        $curline=0;
        $hlchat=0;
        function checktolog($s) {
          global $user;
          if (!$s) return;
          if ($user["id"]==8505 || $user["id"]==924 || $user["id"]==2735) {
            $f=fopen("encicl/images/cl$user[id].dat", "ab+");
            fwrite($f, $s);
            fclose($f);
          }
        }
        $opt="";
        foreach($cha as $k => $v) {
            $curline++;
            $tme=(int)substr($v,2,10);
            if ($tme<$user['chattime'] || ($tme==$user['chattime'] && $curline<=$lastline)) continue;
            if ($user["id"]==204 && strpos($v,"<font m ")) {
              $v=str_replace("private ", "private [Мусорщик] ", $v);
            }
            preg_match("/:\[(.*)\]:\[(.*)\]:\[(.*)]:\[(.*)\]/",$v,$math);
            $math[3] = stripslashes($math[3]);
            if ((@$math[2] == '{[]}'.$user['login'].'{[]}') && (@$math[1] >= @$user['chattime'])) {
              $tmp="";
              if (!$user["battle"] && strpos($math[3],"fbattle.php")) $math[3]=str_replace("top.frames['main'].location='fbattle.php';","",$math[3]);
              if ($user["battle"] && strpos($math[3],"fbattle.php")) $tmp="top.soundB($user[battle]);";
              echo "top.frames['chat'].document.getElementById(\"mes\").innerHTML += '<span class=date2>".date("H:i",$math[1])."</span> ".$math[3]." <BR>';$tmp";
              $hlchat=1;
              $ks++;
              $lastpost = $math[1];
            }
            elseif(substr($math[2],0,4) == '{[]}' && (@$math[1] >= @$user['chattime'])) {
            } elseif ((@$math[2] == '!sys!!') && (@$math[1] >= @$user['chattime']) && ($user['room']==$math[4]) && $_GET['om'] != 1) {
                if($_GET['sys'] == 1 OR strpos($math[3],"<img src=i/magic/" ) !== FALSE) {
                    echo "top.frames['chat'].document.getElementById(\"mes\").innerHTML += '<span class=date>".date("H:i",$math[1])."</span> ".$math[3]." <BR>';";
                    $hlchat=1;
                    $ks++;
                    $lastpost = $math[1];
                }
                $skip=0;
                if(in_array($user["room"], $canalrooms)) {
                  if (!strpos($math[3], $user["login"])) $skip=1;
                }
                if (!$skip) {
                  echo "top.frames['chat'].document.getElementById(\"mes_sys\").innerHTML += '<span class=date>".date("H:i",$math[1])."</span> ".$math[3]." <BR>';";
                  $ks++;
                  $lastpost = $math[1];
                }
            } elseif ((@$math[2] == '!cavesys!!') && (@$math[1] >= @$user['chattime']) && ($user['caveleader']==$math[4])) {
                echo "top.frames['chat'].document.getElementById(\"mes\").innerHTML += '<span class=date>".date("H:i",$math[1])."</span> ".$math[3]." <BR>';";
                $ks++;
                $lastpost = $math[1];
            } elseif (@$math[2] == '!sys2all!!' && @$math[1] >= @$user['chattime']) {
                echo "top.frames['chat'].document.getElementById(\"mes\").innerHTML += '<span class=date>".date("H:i",$math[1])."</span> ".$math[3]." <BR>';";
                $hlchat=1;
                $ks++;
                $lastpost = $math[1];
            } elseif (@$math[1] >= @$user['chattime']) {
if (@$math[1] >= @$user['chattime']) {
if (strpos($math[3],"private [pal]" ) !== FALSE) {
                    if((int)$user['align']==1 OR $user['align'] == 2.5) {
                        $math[3] = preg_replace("/private \[pal]/Ue", "'<a href='.chr(92).'\'javascript:top.AddToPrivate(\"pal\",false)'.chr(92).'\' class=private>private [ pal ]</a>'", $math[3]);
                        echo "top.frames['chat'].document.getElementById(\"mes\").innerHTML += '<span class=date2>".date("H:i",$math[1])."</span> [<a href=\'javascript:top.AddTo(\"{$math[2]}\")\'><span oncontextmenu=\'return OpenMenu(event,".$user['level'].")\'>{$math[2]}</span></a>] ".$math[3]." <BR>';";
                        $hlchat=1;
                        $ks++;
                        $lastpost = $math[1];
                        $opt.="(6) $math[2]: $math[3]<br>\r\n";
                    }
                }
                elseif (strpos($math[3],"private [tar]" ) !== FALSE) {
                    if((int)$user['align']==3 OR $user['align'] == 2.5) {
                        $math[3] = preg_replace("/private \[tar]/Ue", "'<a href='.chr(92).'\'javascript:top.AddToPrivate(\"tar\",false)'.chr(92).'\' class=private>private [ tar ]</a>'", $math[3]);
                        echo "top.frames['chat'].document.getElementById(\"mes\").innerHTML += '<span class=date2>".date("H:i",$math[1])."</span> [<a href=\'javascript:top.AddTo(\"{$math[2]}\")\'><span oncontextmenu=\'return OpenMenu(event,".$user['level'].")\'>{$math[2]}</span></a>] ".$math[3]." <BR>';";
                        $hlchat=1;
                        $ks++;
                        $lastpost = $math[1];
                    }
                }
                elseif (((strpos($math[3],"private [klan-{$user['klan']}]" ) !== FALSE) && $user["in_tower"]!=1 && $user["in_tower"]!=2)) {
                    if($user['klan']!='') {



                        $math[3] = preg_replace("/private \[klan\-{$user['klan']}\]/Ue", "'<a href='.chr(92).'\'javascript:top.AddToPrivate(\"klan\",false)'.chr(92).'\' class=private>private [ klan ]</a>'", $math[3]);
                        echo "top.frames['chat'].document.getElementById(\"mes\").innerHTML += '<span class=date2>".date("H:i",$math[1])."</span> [<a href=\'javascript:top.AddTo(\"{$math[2]}\")\'><span oncontextmenu=\'return OpenMenu(event,".$user['level'].")\'>{$math[2]}</span></a>] ".$math[3]." <BR>';";
                        echo "top.frames['chat'].document.getElementById(\"mes_clan\").innerHTML += '<span class=date2>".date("H:i",$math[1])."</span> [<a href=\'javascript:top.AddTo(\"{$math[2]}\")\'><span oncontextmenu=\'return OpenMenu(event,".$user['level'].")\'>{$math[2]}</span></a>] ".$math[3]." <BR>';";
                        $hlchat=1;
                        $ks++;
                        $lastpost = $math[1];
                        $opt.="(7) $math[2]: $math[3]<br>\r\n";
                    }
                }
                elseif (((strpos($math[3],"private [{$user['login']}]" ) !== FALSE) OR ($math[2] == $user['login'])) && $user["in_tower"]!=1 && $user["in_tower"]!=2) {
                    $sound=false;
                    preg_match_all("/private \[(.*)\]/siU",$math[3],$mmm,PREG_PATTERN_ORDER);
                    foreach($mmm[1] as $res){
                        $res=trim($res);
                        if ($sound==false)
                            $sound=($res==$user['login'])?true:false;
                        if (strlen($res)<3 || strlen($res)>25 || !ereg("^[ёa-zA-Zа-яА-Я0-9-][ёa-zA-Zа-яА-Я0-9_ -]+[a-zA-Zа-яА-Я0-9ё-]$",$res)  || preg_match("/__/",$res) || preg_match("/--/",$res) || preg_match("/  /",$res) || preg_match("/(.)\\1\\1\\1/",$res)){
                            $math[3]=str_replace($res,$user['login'],$math[3]);
                        }
                    }
                    $math[3] = preg_replace("/private \[(.*)\]/Ue", "'<a href='.chr(92).'\'javascript:top.AddToPrivate(\"'.(('\\1' != '".$user['login']."')?'\\1':'".$math[2]."').'\",false)'.chr(92).'\' class=private>private [ <span oncontextmenu=\"return OpenMenu(event,".$user['level'].")\">\\1</span> ]</a>'", $math[3]);
                    $sssss="top.frames['chat'].document.getElementById(\"mes\").innerHTML += '<span class=date2>".date("H:i",$math[1])."</span> [<a href=\'javascript:top.AddTo(\"{$math[2]}\")\'><span oncontextmenu=\'return OpenMenu(event,".$user['level'].")\'>{$math[2]}</span></a>] ".$math[3]." <BR>';";
                    $opt.="(8) $math[2]: $math[3]<br>\r\n";
                    if ($sound==true)
                        $sssss.="top.soundD();";
                    echo $sssss;
                    $ks++;
                    $lastpost = $math[1];
                } elseif(( strpos($math[3],"private" ) === FALSE ) && ($user['room']==$math[4] || ($user["id"]==204 && $math[2]!='!sys!!' && $math[2]!='!cavesys!!'))) {
                    $times = ''; $soundON='';
                    if ((strpos($math[3],"[".$user['login']."]") > 0) OR ($math[2] == $user['login'])) {
                        $times = 'date2';
                        $math[3] = str_replace("to [".$user['login']."]","<B>to [".$user['login']."]</B>",$math[3] );
                        $soundON='top.soundD();';
                    } elseif($_GET['om'] != 1) {
                        $times = 'date';
                    }
                    if($_GET['om'] != 1 OR $times == 'date2') {
                        echo $soundON."top.frames['chat'].document.getElementById(\"mes\").innerHTML += '<span class={$times}>".date("H:i",$math[1])."</span> [<a href=\'javascript:top.AddTo(\"{$math[2]}\")\'><span oncontextmenu=\'return OpenMenu(event,".$user['level'].")\'>{$math[2]}</span></a>] ".$math[3]." <BR>';";
                        $opt.="(9) $math[2]: $math[3]<br>\r\n";
                        $ks++;
                        $lastpost = $math[1];
                        $hlchat=1;
                    }
                }
            }
        }
      }
      checktolog($opt);
      if ($hlchat) echo "top.hlchat();";
        if ($ks > 0) {
          $_SESSION["chattime"]="$lastpost-$curline";
        }
        echo "</script><script> top.srld();</script>";
            if ((int)$user['id']!=1)
            db_query("UPDATE `online` SET `date` = ".time()." WHERE `id` = {$user['id']};");
            die();
    } else {

        if (strpos($_GET['text'],"private" ) !== FALSE && $user['level'] == 0) {
            preg_match_all("/\[(.*)\]/U", $_GET['text'], $matches);
            for ($ii=0;$ii<count($matches[1]);$ii++){
                $dde = mysqli_fetch_array(db_query("SELECT `id` FROM `users` WHERE (`klan` = 'adminion' OR `deal` = 1 OR (`align`>1 AND `align`<2) OR (`align`>3 AND `align`<4)) AND `login` = '".trim($matches[1][$ii])."' LIMIT 1 ;"));
                if (!$dde['id']) {
                    exit;
                }
            }
        }
        if (@trim($_GET['text']) != null) {
          $_GET["text"]=str_replace("\\","",$_GET["text"]);
          $rr = mysqli_fetch_array(db_query("SELECT `id`  FROM `effects` WHERE `type` = 2 AND `owner` = {$user['id']};"));


        if ($rr[0] == null) {
          $_GET["text"]=str_replace("top.document.write","",$_GET["text"]);
          $_GET["text"]=str_replace("'","\\\\'",$_GET["text"]);
          $hl=haslinks($_GET["text"]);
          if ($_SESSION["uid"]==7) {
          }
          if (!$hl) {
            $txt=$_GET["text"];
            $bad=hasbad($txt);
          }
          if ($hl ) {
            if ($user["align"] != 2.5) { 
                $f=fopen("logs/autosleep.txt","ab");
                fwrite($f, "$user[login]: $_GET[text]\r\n");
                fclose($f);
                mq("INSERT INTO `lichka`(`id`,`pers`,`text`,`date`) VALUES ('','".$user['id']."','<font color=red>Комментатор</font> Наложил заклятие молчания Причина: ($_GET[text])','".time()."');");
                mq("INSERT INTO `effects` (`owner`,`name`,`time`,`type`) values ('".$user['id']."','Заклятие молчания',".(time()+1800).",2);");
                $_GET["text"]=str_replace("private","рrivate", $_GET["text"]);
                reportadms("<br><b>$user[login]</b>: $_GET[text]", "Комментатор");
            }
            addch("<img src=<?=IMG_PATH?>/pbuttons/sleep.gif> Комментатор наложил заклятие молчания на &quot;{$user['login']}&quot;, сроком 30 мин. Причина: РВС.");
          } elseif ($bad) {
            $f=fopen("logs/autosleep.txt","ab");
            fwrite($f, "$user[login]: $_GET[text]\r\n");
            fclose($f);
            mq("INSERT INTO `lichka`(`id`,`pers`,`text`,`date`) VALUES ('','".$user['id']."','<font color=red>Комментатор</font> Наложил заклятие молчания Причина: ($_GET[text])','".time()."');");
            mq("INSERT INTO `effects` (`owner`,`name`,`time`,`type`) values ('".$user['id']."','Заклятие молчания',".(time()+900).",2);");
            $_GET["text"]=str_replace("private","рrivate", $_GET["text"]);
            addchp("<font color=\"Black\">private [pal] private [tar] <br><b>$user[login]</b>: $_GET[text]</font>", "Комментатор");
            addch("<img src=<?=IMG_PATH?>/pbuttons/sleep.gif> Комментатор наложил заклятие молчания на &quot;{$user['login']}&quot;, сроком 15 мин. Причина: мат.");
          } elseif ($_GET["text"]==$_SESSION["lastmsg"]) {
          } else {
            $_SESSION["lastmsg"]=$_GET["text"];
            if (!in_array($user["id"], $djs) && $user["id"]!=2735 && $user["id"]!=2372) {
              $_GET['text']=preg_replace("/:8[0-9][0-9]:/", "", $_GET['text']);
            }
            if ($user["id"]!=2735 && $user["id"]!=2372) {
              $_GET['text']=str_replace(":228:", "", $_GET['text']);
              $_GET['text']=str_replace(":229:", "", $_GET['text']);
            }
            $_GET['text'] = substr($_GET['text'],0,400);
            $_GET['text'] = str_replace('<','&lt;',$_GET['text']);
            $_GET['text'] = str_replace(']:[','] : [',$_GET['text']);
            $_GET['text'] = str_replace('>','&gt;',$_GET['text']);


            $_GET['text'] = ereg_replace('private \[klan-([a-zA-Z]*)\]','',$_GET['text']);

            if ($user['klan'] == '') {
                $_GET['text'] = str_replace('private [klan]','',$_GET['text']);
                $_GET['text'] = str_replace('private [klan]','private [klan-'.$user['klan'].']',$_GET['text']);
            }
            else {
                $_GET['text'] = str_replace('private [klan]','private [klan-'.$user['klan'].']',$_GET['text']);
            }
                if((int)$user['align'] != 1 AND $user['align'] != 2.5) {
                $_GET['text'] = str_replace('private [pal]','',$_GET['text']);
            }
                if((int)$user['align'] != 3 AND $user['align'] != 2.5) {
                $_GET['text'] = str_replace('private [tar]','',$_GET['text']);
            }
if($user['level']<=1){
            $_GET['text'] = eregi_replace('o(.)*l(.)*d(.)*c(.)*o(.)*m(.)*b(.)*a(.)*t(.)*s','<b><font color=red> а я РВС-ник!</font></b>',$_GET['text']);
            $_GET['text'] = eregi_replace('a(.)*r(.)*d(.)*a(.)*n(.)*i(.)*y(.)*a','<b><font color=red> а я РВС-ник!</font></b>',$_GET['text']);
            $_GET['text'] = eregi_replace('l(.)*f(.)*i(.)*g(.)*h(.)*t','<b><font color=red> а я РВС-ник!</font></b>',$_GET['text']);
            $_GET['text'] = eregi_replace('a(.)*r(.)*d(.)*a(.)*n(.)*u(.)*y(.)*a','<b><font color=red> а я РВС-ник!</font></b>',$_GET['text']);
            $_GET['text'] = eregi_replace('o(.)*l(.)*d(.)*b(.)*k','<b><font color=red> а я РВС-ник!</font></b>',$_GET['text']);
            $_GET['text'] = eregi_replace('n(.)*e(.)*w(.)*-(.)*b(.)*k','<b><font color=red> а я РВС-ник!</font></b>',$_GET['text']);
            $_GET['text'] = eregi_replace('a(.)*r(.)*d(.)*a(.)*n(.)*u(.)*y(.)*a','<b><font color=red> а я РВС-ник!</font></b>',$_GET['text']);
            $_GET['text'] = eregi_replace('l(.)*a(.)*s(.)*t(.)*w(.)*o(.)*r(.)*l(.)*d(.)*s','<b><font color=red> а я РВС-ник!</font></b>',$_GET['text']);
            $_GET['text'] = eregi_replace('t(.)*e(.)*k(.)*k(.)*e(.)*n','<b><font color=red> а я РВС-ник!</font></b>',$_GET['text']);
            $_GET['text'] = eregi_replace('n(.)*e(.)*w(.)*a(.)*b(.)*k','<b><font color=red> а я РВС-ник!</font></b>',$_GET['text']);

}
            $smiles=array("/:237:/","/:239:/","/:254:/","/:253:/","/:276:/","/:275:/","/:278:/","/:284:/","/:289:/","/:288:/","/:294:/","/:293:/","/:295:/","/:310:/","/:313:/","/:324:/","/:336:/","/:347:/","/:346:/","/:345:/","/:348:/","/:361:/","/:362:/","/:366:/","/:367:/","/:382:/","/:393:/","/:411:/","/:415:/","/:413:/","/:419:/","/:422:/","/:434:/","/:442:/","/:447:/","/:453:/","/:467:/","/:471:/","/:472:/","/:475:/","/:551:/","/:554:/","/:559:/","/:564:/","/:568:/","/:573:/","/:601:/","/:602:/","/:603:/","/:604:/","/:605:/","/:606:/","/:607:/","/:238:/","/:608:/","/:609:/","/:610:/","/:611:/","/:612:/","/:613:/","/:614:/","/:349:/","/:616:/","/:617:/","/:621:/","/:000:/","/:029:/","/:030:/","/:077:/","/:126:/","/:127:/","/:131:/","/:155:/","/:156:/","/:267:/","/:297:/","/:319:/","/:350:/","/:353:/","/:354:/","/:357:/","/:358:/","/:243:/","/:206:/","/:627:/","/:623:/","/:624:/","/:368:/","/:376:/","/:385:/","/:386:/","/:414:/","/:417:/","/:457:/","/:459:/","/:469:/","/:473:/","/:474:/","/:477:/","/:552:/","/:558:/","/:560:/","/:570:/","/:574:/","/:575:/","/:576:/","/:579:/","/:950:/","/:951:/","/:952:/","/:953:/","/:954:/","/:955:/","/:956:/","/:957:/","/:958:/","/:959:/","/:960:/","/:002:/","/:003:/","/:004:/","/:008:/","/:009:/","/:011:/","/:012:/","/:013:/","/:014:/","/:015:/","/:016:/","/:021:/","/:023:/","/:024:/","/:025:/","/:027:/","/:031:/","/:032:/","/:628:/","/:629:/","/:630:/","/:631:/","/:632:/","/:633:/","/:634:/","/:635:/","/:636:/","/:637:/","/:638:/","/:639:/","/:640:/","/:641:/","/:642:/","/:643:/","/:644:/","/:645:/","/:646:/","/:647:/","/:648:/","/:650:/","/:651:/","/:652:/","/:653:/","/:654:/","/:655:/","/:656:/","/:657:/","/:001:/","/:007:/","/:006:/","/:1000:/","/:010:/","/:018:/","/:022:/","/:019:/","/:026:/","/:034:/","/:033:/","/:038:/","/:036:/","/:040:/","/:039:/","/:043:/","/:049:/","/:052:/","/:056:/","/:059:/","/:057:/","/:062:/","/:066:/","/:068:/","/:073:/","/:082:/","/:175:/","/:080:/","/:079:/","/:083:/","/:086:/","/:085:/","/:114:/","/:118:/","/:119:/","/:123:/","/:161:/","/:164:/","/:167:/","/:166:/","/:170:/","/:174:/","/:177:/","/:179:/","/:178:/","/:186:/","/:189:/","/:188:/","/:190:/","/:202:/","/:205:/","/:203:/","/:221:/","/:246:/","/:255:/","/:277:/","/:600:/","/:801:/","/:802:/","/:803:/","/:804:/","/:805:/","/:806:/","/:807:/","/:808:/","/:809:/","/:810:/","/:811:/","/:812:/","/:813:/","/:814:/","/:815:/","/:816:/","/:817:/","/:818:/","/:819:/","/:820:/","/:821:/","/:822:/","/:823:/","/:824:/","/:825:/","/:826:/","/:827:/","/:828:/","/:829:/","/:830:/","/:831:/","/:832:/","/:833:/","/:834:/","/:835:/","/:836:/","/:837:/","/:838:/","/:839:/","/:840:/","/:841:/","/:842:/","/:744:/", "/:151:/", "/:152:/", "/:153:/", "/:154:/", "/:157:/", "/:158:/", "/:159:/", "/:160:/", "/:162:/", "/:163:/", "/:165:/", "/:168:/", "/:169:/", "/:171:/", "/:172:/", "/:173:/", "/:176:/", "/:180:/", "/:181:/", "/:182:/", "/:183:/", "/:184:/", "/:185:/", "/:187:/", "/:240:/", "/:241:/", "/:242:/", "/:244:/", "/:245:/", "/:247:/", "/:248:/", "/:249:/", "/:250:/", "/:251:/", "/:252:/", "/:256:/", "/:257:/", "/:258:/", "/:259:/", "/:260:/", "/:261:/", "/:262:/", "/:263:/", "/:264:/", "/:265:/", "/:266:/", "/:268:/", "/:269:/", "/:270:/", "/:271:/", "/:272:/", "/:273:/", "/:274:/", "/:279:/", "/:280:/", "/:281:/", "/:282:/", "/:283:/", "/:130:/", "/:132:/", "/:133:/", "/:134:/", "/:135:/", "/:136:/", "/:137:/", "/:138:/", "/:139:/", "/:140:/", "/:141:/", "/:142:/", "/:143:/", "/:144:/", "/:145:/", "/:146:/", "/:147:/", "/:148:/", "/:149:/", "/:150:/", "/:191:/", "/:192:/", "/:193:/", "/:194:/", "/:195:/", "/:196:/", "/:197:/", "/:198:/", "/:199:/", "/:200:/", "/:201:/", "/:204:/", "/:207:/", "/:208:/", "/:209:/", "/:210:/", "/:211:/", "/:212:/", "/:213:/", "/:214:/", "/:215:/", "/:216:/", "/:217:/", "/:218:/", "/:219:/", "/:220:/", "/:222:/", "/:223:/", "/:224:/", "/:225:/", "/:226:/", "/:227:/", "/:228:/", "/:229:/",'/:372:/', '/:373:/', '/:230:/', '/:231:/', '/:232:/', '/:233:/', '/:234:/', '/:235:/', '/:236:/', '/:285:/', '/:286:/', '/:287:/', '/:290:/', '/:291:/', '/:292:/', '/:296:/', '/:298:/', '/:299:/', '/:300:/', '/:301:/', '/:302:/', '/:303:/', '/:304:/', '/:305:/', '/:306:/', '/:307:/', '/:308:/', '/:309:/', '/:311:/', '/:312:/', '/:314:/', '/:315:/', '/:316:/', '/:317:/', '/:318:/', '/:320:/', '/:321:/', '/:322:/', '/:323:/', '/:325:/', '/:326:/', '/:327:/', '/:328:/', '/:329:/', '/:330:/', '/:331:/', '/:332:/', '/:333:/', '/:334:/', '/:335:/', '/:337:/', '/:338:/', '/:339:/', '/:340:/', '/:341:/', '/:342:/', '/:343:/', '/:344:/', '/:351:/', '/:352:/', '/:355:/', '/:356:/', '/:359:/', '/:360:/', '/:363:/', '/:364:/', '/:365:/', '/:369:/', '/:370:/', '/:371:/');
            foreach ($smiles as $k=>$v) {
              $v=str_replace("/:","",$v);
              $v=str_replace(":/","",$v);
              $smiles2[]="<img style=\"cursor:pointer;\" onclick=S(\"$v\") src=".IMGBASE."/chat/smiles/smiles_$v.gif>";
            }
            $_GET['text'] = preg_replace($smiles, $smiles2, $_GET['text'],3);

            if($user['invis']=='1') {
              $tme=mqfa1("select time from effects where owner='$user[id]' and type='1022'");
              $user['login'] = '</a><b><i>невидимка '.substr($tme,strlen($tme)-4).'</i></b>';
            }

 if (substr_count($_GET['text'], '[item:') > 0)
            {
                $item1 = explode('[item:', $_GET['text']);
                $item_id = explode(']', $item1[1]);
                $itemID = (int)($item_id[0]);
                if ($itemID > 0)
                {
                    $item = mysqli_fetch_assoc(db_query("SELECT * FROM inventory WHERE owner = '".$user['id']."' AND id = '".$itemID."' LIMIT 1 "));
                    if ($item['id'] > 0)
                    {
                        $hash = md5($itemID);
                        $url = 'item.php?id='.$hash;
                        $textIns = '<img src=i/sh/'.$item['img'].' height=25 align=middle> <a href=# onclick="showItem(\\\\\''.$url.'\\\\\');">'.$item['name'].'</a> ';
                        db_query("INSERT INTO show_item SET user_id = ".$user['id'].", item_hash = '".$hash."', item_id = ".$itemID." ");
                        $_GET['text'] = str_replace('[item:'.$itemID.']', $textIns, $_GET['text']);
                    }
                }
            }
if (substr_count($_GET['text'], '[item:') > 0)
            {
                $item1 = explode('[item:', $_GET['text']);
                $item_id = explode(']', $item1[1]);
                $itemID = (int)($item_id[0]);
                if ($itemID > 0)
                {
                   
                    $item = mysqli_fetch_assoc(db_query("SELECT * FROM shop WHERE id = '".$itemID."' LIMIT 1 "));
                    {
                        $hash = md5($itemID);
                        $url = 'library.php?id='.$item;
                    if ($item['id'] > 0)
                        $textIns = '<img src=i/sh/'.$item['img'].' height=25 align=middle> <a href=# onclick="showItem(\\\\\''.$url.'\\\\\');">'.$item['name'].'</a> ';
                        db_query("INSERT INTO show_item SET user_id = ".$user['id'].", item_hash = '".$hash."', item_id = ".$itemID." ");
                        $_GET['text'] = str_replace('[item:'.$itemID.']', $textIns, $_GET['text']);
                    }
                }
            }
if (substr_count($_GET['text'], '[item:') > 0)
            {
                $item1 = explode('[item:', $_GET['text']);
                $item_id = explode(']', $item1[1]);
                $itemID = (int)($item_id[0]);
                if ($itemID > 0)
                {
                   
                    $item = mysqli_fetch_assoc(db_query("SELECT * FROM berezka WHERE id = '".$itemID."' LIMIT 1 "));
                    {
                        $hash = md5($itemID);
                        $url = 'library.php?id='.$item;
                    if ($item['id'] > 0)
                        $textIns = '<img src=i/sh/'.$item['img'].' height=25 align=middle> <a href=# onclick="showItem(\\\\\''.$url.'\\\\\');">'.$item['name'].'</a> ';
                        db_query("INSERT INTO show_item SET user_id = ".$user['id'].", item_hash = '".$hash."', item_id = ".$itemID." ");
                        $_GET['text'] = str_replace('[item:'.$itemID.']', $textIns, $_GET['text']);
                    }
                }
            }
###Черный список#####
preg_match_all("/\[(.*)\]/U", $_GET['text'], $matches);
for ($ii=0;$ii<count($matches[1]);$ii++){
$ignor = mysqli_fetch_array(db_query("SELECT `ignore` FROM `users` WHERE `login` = '".trim($matches[1][$ii])."' LIMIT 1 "));
$str = $ignor['ignore'];
$pieces = explode("|", $str);
if (in_array("".$user['id']."", $pieces)) {
$_GET['text']='private ['.$user['login'].'] <i>Персонаж '.trim($matches[1][$ii]).' добавил вас в черный список!</i>';
}
}
####################
            if (filesize(CHATROOT."chat.txt")>100*1024) {
                // удаление последней строки
            if ($user['id'] != '13328') {
                $file=file(CHATROOT."chat.txt");
                $fp=fopen(CHATROOT."chat.txt","w");
                flock ($fp,LOCK_EX);
                for ($s=0;$s<count($file)/1.6;$s++) {
                    unset($file[$s]);
                }
                fputs($fp, implode("",$file));
                fputs($fp ,"\r\n:[".time ()."]:[{$user['login']}]:[<font color=\"".(($user['color'])?$user['color']:"#000000")."\">".($_GET['text'])."</font>]:[".$user['room']."]\r\n"); //работа с файлом
                flock ($fp,LOCK_UN);
                fclose($fp);
                }
            }
            else {
            if ($user['id'] != '13328') {
                $fp = fopen (CHATROOT."chat.txt","a"); //открытие
                flock ($fp,LOCK_EX); //БЛОКИРОВКА ФАЙЛА
                fputs($fp ,":[".time ()."]:[{$user['login']}]:[<font ".($user["level"]<4?"m":"")." color=\"".(($user['color'])?$user['color']:"#000000")."\">".($_GET['text'])."</font>]:[".$user['room']."]\r\n"); //работа с файлом
                fflush ($fp); //ОЧИЩЕНИЕ ФАЙЛОВОГО БУФЕРА И ЗАПИСЬ В ФАЙЛ
                flock ($fp,LOCK_UN); //СНЯТИЕ БЛОКИРОВКИ
                fclose ($fp); //закрытие
                }
            }
            if (strpos($_GET['text'],"to [Комментатор]" ) !== FALSE) {
                if (strpos($_GET['text'],"to [Комментатор] анекдот" ) !== FALSE) {
include'chat/commas.php';
                addchp($commas[rand(0,count($commas)-1)],"Комментатор");
                } else {
include'chat/commasa.php';
                addchp($commas[rand(0,count($commas)-1)],"Комментатор");
                }
            }
          }

        }
            die ("<script>top.CLR1();top.RefreshChat();</script>");

        }
    }
?>
</body>
</html>