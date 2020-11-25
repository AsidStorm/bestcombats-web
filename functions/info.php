<?
  function star_sign($month, $day) {
    if ($month == "01") {
    if ($day >= 21) {return "11";} else {return "10";}}
    else if ((int)$month == 2) {
    if ($day >= 21) {return "12";} else {return "11";} }
    else if ((int)$month == 3) {
    if ($day >= 21) {return "1";} else {return "12";} }
    else if ((int)$month == 4) {
    if ($day >= 21) {return "2";} else {return "1";} }
    else if ((int)$month == 5) {
    if ($day >= 21) {return "3";} else {return "2";} }
    else if ((int)$month == 6) {
    if ($day >= 22) {return "4";} else {return "3";} }
    else if ((int)$month == 7) {
    if ($day >= 23) {return "5";} else {return "4";} }
    else if ((int)$month == 8) {
    if ($day >= 24) {return "6";} else {return "5";} }
    else if ((int)$month == 9) {
    if ($day >= 24) {return "7";} else {return "6";} }
    else if ((int)$month == 10) {
    if ($day >= 24) {return "8";} else {return "7";} }
    else if ((int)$month == 11) {
    if ($day >= 23) {return "9";} else {return "8";} }
    else if ((int)$month == 12) {
    if ($day >= 22) {return "10";} else {return "9";}}
  }

  function infpersout($user) {
    global $djs;
    $ret="<IMG align=right alt=\"Знак зодиака\" height=99 src=\"".IMGBASE."/i/";
    if ($user[zodiac]) { 
      $ret.="$user[zodiac]"; 
    } elseif ($user['zodiac'] =="") {
      $tmp=explode("-", $user['borndate']);
      $ret.=star_sign($tmp[1], $tmp[0]);
    }
    $ret.=".gif\" width=100>";

    $ret.="<div id=\"mmoves\" style=\"background-color:#FFFFCC; visibility:hidden; z-index: 100; overflow:visible; position:absolute; border-color:#666666; border-style:solid; border-width: 1px; padding: 2px;\"></div>
    <TABLE width=100% cellpadding=\"3\" cellspacing=\"4\">
      <TR>
        <TD align=left vAlign=top  style=\"width:250px;\">";
    $ret.=showpersout($user["id"],1);
    if ($user['deal']==2) {
      $ret.='<FIELDSET><LEGEND><IMG SRC="'.IMGBASE.'/i/alchemy1.gif" WIDTH=35 HEIGHT=24 ALT="Алхимик"></LEGEND>
  <small>Регистрированный алхимик. Имеет право продавать услуги Бойцовского Клуба, включая:<BR>
  &nbsp;&nbsp; <IMG src="'.IMGBASE.'/i/alchemy-art.gif" width=35 height=24 alt="Артефакты"> Артефакты<BR></small></fieldset>';
    }
    if ($user['deal']==3) {
      $ret.='<FIELDSET><LEGEND><IMG SRC="'.IMGBASE.'/i/alchemy1.gif" WIDTH=35 HEIGHT=24 ALT="Алхимик"></LEGEND>
  <small>Регистрированный алхимик. Имеет право продавать услуги Бойцовского Клуба, включая:<BR>
  &nbsp;&nbsp; <IMG src="'.IMGBASE.'/i/alchemy-art.gif" width=35 height=24 alt="Артефакты"> Артефакты<BR>
  &nbsp;&nbsp; <IMG src="'.IMGBASE.'/i/alchemy-flower.gif" width=35 height=24 alt="Букеты"> Букеты<BR></small></fieldset>';
    }
    if ($user['deal']==4) {
      $ret.='<FIELDSET><LEGEND><IMG SRC="'.IMGBASE.'/i/alchemy1.gif" WIDTH=35 HEIGHT=24 ALT="Алхимик"></LEGEND>
  <small>Регистрированный алхимик. Имеет право продавать услуги Бойцовского Клуба, включая:<BR>
  &nbsp;&nbsp; <IMG src="'.IMGBASE.'/i/alchemy-art.gif" width=35 height=24 alt="Артефакты"> Артефакты<BR>
  &nbsp;&nbsp; <IMG src="'.IMGBASE.'/i/alchemy-flower.gif" width=35 height=24 alt="Букеты"> Букеты<BR>
  &nbsp;&nbsp; <IMG src="'.IMGBASE.'/i/alchemy-book.gif" width=35 height=24 alt="Квитанции на книги"> Квитанции на книги<BR></small></fieldset>';
    }
    if ($user['deal']==5) {
      $ret.='<FIELDSET><LEGEND><IMG SRC="'.IMGBASE.'/i/alchemy1.gif" WIDTH=35 HEIGHT=24 ALT="Алхимик"></LEGEND>
  <small>Регистрированный алхимик. Имеет право продавать услуги Бойцовского Клуба, включая:<BR>
  &nbsp;&nbsp; <IMG src="'.IMGBASE.'/i/alchemy-art.gif" width=35 height=24 alt="Артефакты"> Артефакты<BR>
  &nbsp;&nbsp; <IMG src="'.IMGBASE.'/i/alchemy-flower.gif" width=35 height=24 alt="Букеты"> Букеты<BR>
  &nbsp;&nbsp; <IMG src="'.IMGBASE.'/i/alchemy-book.gif" width=35 height=24 alt="Квитанции на книги"> Квитанции на книги<BR>
  &nbsp;&nbsp; <IMG src="'.IMGBASE.'/i/alchemy-build.gif" width=35 height=24 alt="Недвижимость"> Недвижимость<BR></small></fieldset>';
    }
    if (in_array($user["id"], $cryers)) $ret.="<img title=\"Нытик\" alt=\"Нытик\" src=\"".IMGBASE."/i/cryer.gif\">";
    if ($user['married']) {
      if ($user['sex'] == 1) $ret.='<a href="inf.php?login='.$user["married"].'" target="_blank"><img src="'.IMGBASE.'/i/married.gif" onmouseover=\'fastshow("Женат на <b>'.$user['married'].'</b>")\' onmouseout=\'hideshow();\'"></a> ';
      else $ret.='<a href="inf.php?login='.$user[married].'" target="_blank"><img src="'.IMGBASE.'/i/married.gif" onmouseover=\'fastshow("Замужем за <b>'.$user['married'].'</b>")\' onmouseout=\'hideshow();\'"></a> ';
    }
### Показываем аккаунты в информации о персонаже ###
    if ($user['vip']==1) {
      $ret.=' <img src="http://img.bestcombats.net/znaks/vip1.gif" onmouseover=\'fastshow("<b>Silver Account</b>")\' onmouseout=\'hideshow();\'> ';
    }elseif ($user['vip']==2) {
      $ret.=' <img src="http://img.bestcombats.net/znaks/vip2.gif" onmouseover=\'fastshow("<b>Gold Account</b>")\' onmouseout=\'hideshow();\'> ';
    }elseif ($user['vip']==3) {
      $ret.=' <img src="http://img.bestcombats.net/znaks/vip3.gif" onmouseover=\'fastshow("<b>Platinum Account</b>")\' onmouseout=\'hideshow();\'> ';
    }   
##################
    if ($user['radiodj']==1) {
      $ret.=' <img src="http://img.bestcombats.net/znaks/radio.gif" onmouseover=\'fastshow("Персонаж является радистом Бойцовского Клуба")\' onmouseout=\'hideshow();\'> ';
    }
    if ($user['spellfreedom']==1) {
      $ret.=' <img src="'.IMGBASE.'/i/freedom.gif" onmouseover=\'fastshow("<b>Свобода. Магия истинного хаоса.</b><br>Персонаж свободен.")\' onmouseout=\'hideshow();\'>';
    }
     $medals=mysql_query("SELECT * from `medals` where `owner`='$user[id]'  ");
    while ($medals_w=mysql_fetch_array($medals)){
      $ret.=' <img src=/i/medals/'.$medals_w['img'].' onmouseover=\'fastshow("<b>'.$medals_w['name'].'</b><br><br><i><small><b>'.$medals_w['otkogo'].'</b></small></i>")\' onmouseout=\'hideshow();\'> ';
    }
    $zashc = mysql_fetch_array(mysql_query("SELECT name,time FROM `effects` WHERE `owner` = ".$user['id']." and `type`=395 limit 1;"));
    if($zashc){
      $ret.=' <img src="'.IMGBASE.'/i/defender.gif" onmouseover=\'fastshow("'.$zashc["name"].'")\' onmouseout=\'hideshow();\'>';
    }

    $r=mq("SELECT name,time,type, stihiya FROM `effects` WHERE `owner` = ".$user['id']." and `type`>395 and type<>1022 and type<>9999 and type<>9994 and type<>9990 and type<>9991 and type<>9992 and type<>9993");
    while ($rec=mysql_fetch_assoc($r)) {
      if ($rec["stihiya"]) $ret.="<img src=\"".IMGBASE."/i/magic/a_$rec[stihiya].gif\" onmouseover=\"fastshow('$rec[name]')\" onmouseout=\"hideshow();\">";
      else $ret.="<img src=\"".IMGBASE."/i/misc/icon_prize$rec[type].gif\" onmouseover=\"fastshow('$rec[name]')\" onmouseout=\"hideshow();\">";
    }
    
    $znTowerLevel = mysql_result(mysql_query("SELECT reputation FROM zn_tower WHERE user_id = " . $user['id']), 0, 0);
    if ($znTowerLevel >= 100 && $znTowerLevel <= 999) {
        $ret.="<img src=\"http://img.bestcombats.net/znaks/znrune_1.gif\" onmouseover=\"fastshow('<b>Храм Знаний</b><br>Посвящённый 1-го круга')\" onmouseout=\"hideshow();\">";
    }
    if ($znTowerLevel >= 1000 && $znTowerLevel <= 9999) {
        $ret.="<img src=\"http://img.bestcombats.net/znaks/znrune_2.gif\" onmouseover=\"fastshow('<b>Храм Знаний</b><br>Посвящённый 2-го круга')\" onmouseout=\"hideshow();\">";
    }
    if ($znTowerLevel >= 9999) {
        $ret.="<img src=\"http://img.bestcombats.net/znaks/znrune_3.gif\" onmouseover=\"fastshow('<b>Храм Знаний</b><br>Посвящённый 3-го круга')\" onmouseout=\"hideshow();\">";
    }
//Значки за победы by InvadeR
###########################################################################
    //100 побед
    if ($user['win']>=100) {
        $ret.="<img src=\"".IMGBASE."/i/win100.gif\" onmouseover=\"fastshow('<b><i>Медаль за 100 побед</i></b>')\" onmouseout=\"hideshow();\">";
    }
    //500 побед
    if ($user['win']>=500) {
        $ret.="<img src=\"".IMGBASE."/i/win500.gif\" onmouseover=\"fastshow('<b><i>Медаль за 500 побед</i></b>')\" onmouseout=\"hideshow();\">";
    }
    //1000 побед
    if ($user['win']>=1000) {
        $ret.="<img src=\"".IMGBASE."/i/win1000.gif\" onmouseover=\"fastshow('<b><i>Медаль за 1000 побед</i></b>')\" onmouseout=\"hideshow();\">";
    }
    //3000 побед
    if ($user['win']>=3000) {
        $ret.="<img src=\"".IMGBASE."/i/win3000.gif\" onmouseover=\"fastshow('<b><i>Медаль за 3000 побед</i></b>')\" onmouseout=\"hideshow();\">";
    }
    //5000 побед
    if ($user['win']>=5000) {
        $ret.="<img src=\"".IMGBASE."/i/win5000.gif\" onmouseover=\"fastshow('<b><i>Медаль за 5000 побед</i></b>')\" onmouseout=\"hideshow();\">";
    }
    //10000 побед
    if ($user['win']>=10000) {
        $ret.="<img src=\"".IMGBASE."/i/win10000.gif\" onmouseover=\"fastshow('<b><i>Медаль за 10000 побед</i></b>')\" onmouseout=\"hideshow();\">";
    }
###########################################################################

    $pre=mqfa1("select name from effects where type=30 and owner='$user[id]'");
    if ($pre) $ret.="<img src=\"".IMGBASE."/i/sh/pregnant.gif\" title=\"$pre\">";
    $data=mysql_fetch_array(mysql_query("select * from `online` WHERE `date` >= ".(time()-60)." AND `id` = ".$user['id'].";"));
    $dd = mysql_query("SELECT * FROM `effects` WHERE `owner` = ".$user['id'].";");
    $ddtravma = mysql_fetch_array(mysql_query("SELECT * FROM `effects` WHERE `owner` = ".$user['id']." and (`type`=11 or `type`=12 or `type`=13 or `type`=14) order by `type` desc limit 1;"));
    if ($ddtravma['type'] == 14) {$trt="неизлечимая";}
    elseif ($ddtravma['type'] == 13) {$trt="тяжелая";}
    elseif ($ddtravma['type'] == 12) {$trt="средняя";}
    elseif ($ddtravma['type'] == 11) {$trt="легкая";}
    else {$trt=0;}
    while($row = mysql_fetch_array($dd)) {
      if ($row['time'] < time()) {
        $row['time'] = time();
      }
      if ($trt && ($row['type']==11 or $row['type']==12 or $row['type']==13 or $row['type']==14)) {
        $ret.="<br><IMG height=15 src=\"".IMGBASE."/i/travma2.gif\" width=24 alt=\"Ослаблены характеристики\"><SMALL>У персонажа $trt травма <b>\"{$row['name']}\"</b> - еще ".floor(($row['time']-time())/60/60)." ч. ".round((($row['time']-time())/60)-(floor(($row['time']-time())/3600)*60))." мин.</SMALL>";
      }
      if ($magtrt && $row['type']!=2 && $row['type']!=3 && $row['type']!=10) {
        $ret.="<br><IMG height=15 src=\"".IMGBASE."/i/mtravma2.gif\" width=24><SMALL>У персонажа $trt магическая травма <b>\"{$row['name']}\"</b> - еще ".floor(($row['time']-time())/60/60)." ч. ".round((($row['time']-time())/60)-(floor(($row['time']-time())/3600)*60))." мин.</SMALL>";
      }
      if ($row['type'] == 2) {
        $ret.="<br><IMG height=15 src=\"".IMGBASE."/i/sleeps1.gif\" width=24><SMALL>На персонажа наложено заклятие молчания. Будет молчать еще ".floor(($row['time']-time())/60/60)." ч. ".round((($row['time']-time())/60)-(floor(($row['time']-time())/3600)*60))." мин.</SMALL>";
      }
      if ($row['type'] == 10) {
        $ret.="<br><IMG height=15 src=\"".IMGBASE."/i/chains.gif\" width=24><SMALL>Персонаж не может перемещаться еще ".floor(($row['time']-time())/60/60)." ч. ".round((($row['time']-time())/60)-(floor(($row['time']-time())/3600)*60))." мин.</SMALL>";
      }
      if ($row['type'] == 3) {
        $ret.="<br><IMG height=15 src=\"".IMGBASE."/i/sleeps0.gif\" width=24><SMALL>Персонажу запрещено общение на форуме. Будет молчать еще ".floor(($row['time']-time())/60/60)." ч. ".round((($row['time']-time())/60)-(floor(($row['time']-time())/3600)*60))." мин.</SMALL>";
      }
    }
    $data = mysql_query("SELECT * FROM `inventory` WHERE `owner` = '$user[id]' AND (`name` LIKE '%Букет%') AND `present` <> '' order by id asc ; ");
    if(mysql_num_rows($data)) $ret.='<BR><BR>Букеты цветов: <BR>';
    while($row = mysql_fetch_array($data)) {
      $ret.="<div style=\"float: left; margin:0px; padding:0px;\"><img width=60px height=60x src='".IMGBASE."/i/sh/{$row['img']}' alt = '{$row['name']}\nПодарок от {$row['present']}".(($row['letter'])?"\n".$row['letter']:"")."'></div>";
    }
    $data = mysql_query("SELECT * FROM `inventory` WHERE `gift`=1 AND `present` <> '' and `owner` = '$user[id]'  and dategoden>".time()." order by id desc");
    $r=mq("select id, item from obshagastorage where gift=1 and pers='$user[id]' order by id desc");
    if(mysql_num_rows($data)+mysql_num_rows($r)) $ret.='<BR><BR><BR>1<BR><BR><BR><BR>Подарки: <BR>';
    $ret.="<div style=\"width:610px\">";
    $i=0;
    while($row = mysql_fetch_array($data)) {
      $ret.="<div style=\"float: left; margin:0px; padding:0px; width:60px; height:60px\"><img width=60px height=60x src='".IMGBASE."/i/sh/{$row['img']}' title='{$row['name']}\nПодарок от {$row['present']}".(($row['letter'])?"\n".remquotes($row['letter']):"")."'></div>";
      $i++;
      if ($i==20 && mysql_num_rows($data)>20) {
        $ret.="<div id=\"viewall\"><br><br><small><A href=\"javascript:void(0)\" onclick=\"document.getElementById('allgifts').style.display='';document.getElementById('viewall').style.display='none';return false;\">Нажмите сюда, чтобы увидеть все подарки...</A></small></div>
        <div id=\"allgifts\" style=\"display:none\">";
      }
    }
    while($rec = mysql_fetch_array($r)) {
      $row=unserialize($rec["item"]);
      $ret.="<div style=\"float: left; margin:0px; padding:0px; width:60px; height:60px\"><img width=60px height=60x src='".IMGBASE."/i/sh/{$row['img']}' title='{$row['name']}\nПодарок от {$row['present']}".(($row['letter'])?"\n".remquotes($row['letter']):"")."'></div>";
      $i++;
      if ($i==20 && mysql_num_rows($data)+mysql_num_rows($r)>20) {
        $ret.="<div id=\"viewall\"><br><br><small><A href=\"javascript:void(0)\" onclick=\"document.getElementById('allgifts').style.display='';document.getElementById('viewall').style.display='none';return false;\">Нажмите сюда, чтобы увидеть все подарки...</A></small></div>
        <div id=\"allgifts\" style=\"display:none\">";
      }
    }
    if ($i>20) $ret.="</div>";
    $ret.="</div>";
    $ret.="</TD></TR></TABLE>";

    $own=mysql_fetch_array(mysql_query("SELECT `id`,`align` FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
    $effect = mysql_fetch_array(mysql_query("SELECT `time` FROM `effects` WHERE `owner` = '{$user['id']}' and `type` = '5' LIMIT 1;"));
    if ($effect['time']) {
      $eff=$effect['time'];
      $tt=time();
      $time_still=$eff-$tt;
      $tmp = floor($time_still/2592000);
      $id=0;
      if ($tmp > 0) {
        $id++;
        if ($id<3) {$out .= $tmp." мес. ";}
        $time_still = $time_still-$tmp*2592000;
      }
      $tmp = floor($time_still/604800);
      if ($tmp > 0) {
        $id++;
        if ($id<3) {$out .= $tmp." нед. ";}
        $time_still = $time_still-$tmp*604800;
      }
      $tmp = floor($time_still/86400);
      if ($tmp > 0) {
        $id++;
        if ($id<3) {$out .= $tmp." дн. ";}
        $time_still = $time_still-$tmp*86400;
      }
      $tmp = floor($time_still/3600);
      if ($tmp > 0) {
        $id++;
        if ($id<3) {$out .= $tmp." ч. ";}
        $time_still = $time_still-$tmp*3600;
      }
      $tmp = floor($time_still/60);
      if ($tmp > 0) {
        $id++;
        if ($id<3) {$out .= $tmp." мин. ";}
      }
      $ret.="<H3>Обезличен. Еще $out</H3>";

      $noinfo=1;
    } else {
      $noinfo=0;
    }
    return array($ret, $noinfo);
  }
?>