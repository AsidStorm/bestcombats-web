<?php
define("INCRON", 1);
define("DOCUMENTROOT","");
include DOCUMENTROOT."connect.php";


define("LDSIMPLEBATTLE", 1);

$userslots=array('sergi','kulon','weap','r1','r2','r3','helm','perchi','shit','boots','m1','m2','m3','m4','m5','m6','m7','m8','m9','m10','naruchi','belt','leg','m11','m12','plaw','bron','rybax', 'p1', 'p2');
$dressslots = array('helm','naruchi','weap','rybax','bron','plaw','belt','sergi','kulon','r1','r2','r3','perchi','shit','leg','boots');
$caverooms=array(302);

function remfieldmember($user, $rec=0, $del=1) {
  if (!$rec) $rec=mqfa("select id, started from fieldmembers where user='$user'");
  if (!$rec["started"]) return;
  $diff=time()-$rec["started"];
  mq("update effects set time=time+$diff where owner='$user' and type<>31");
  if ($del) mq("delete from fieldmembers where id='$rec[id]'");
}
    include DOCUMENTROOT."functions.php";
    
    
    
// бонус за 25 игроков

$online = mysql_query("select id, real_time from `online`  WHERE `real_time` >= ".(time()-60).";");
$users_count = mysql_num_rows($online)+6;
if ($users_count>=25 && !mqfa1("SELECT COUNT(*) FROM visitors_counter WHERE date = CURDATE()")) {
    while ($row = mysql_fetch_assoc($online)) {
        mysql_query('UPDATE users SET money = money + 100 WHERE id = ' . $row['id']);
    }
    mysql_query('INSERT INTO visitors_counter SET count = ' . $users_count . ', date = CURDATE()');
    sysmsg("Сейчас в BestCombats более 25 чел. В связи с этим, всем кто присутствует в игре зачислены кредиты. Приятной игры и покупок!"); 
}


// запускаем лотерею
$cLottery = mysql_result(mysql_query('SELECT COUNT(*) FROM lottery WHERE end = 0 AND date < NOW()'), 0, 0);
if ($cLottery) {
    file_get_contents('http://bestcombats.net/lottery.php?cronstartlotery=whf784whfy7w8jfyw8hg745g3y75h7f23785yh38259648gjn6f6734h798h2q398fgsdhnit734');
    $cLottery = mysql_result(mysql_query('SELECT COUNT(*) FROM lottery WHERE end = 0 AND date < NOW()'), 0, 0);
    if (!$cLottery) {
        sysmsg("Уважаемые игроки! Закончился очередной тираж Лотереи. Чтобы ознакомиться с результатами и получить выигрыш, посетите Уголок Удачи.");    
    }
}
    
$tme1=getmicrotime();
    //====================================================================================
  $r=mq("select fieldmembers.id, fieldmembers.groupid, fieldmembers.user, fieldmembers.started from fieldmembers left join online on fieldmembers.user=online.id where online.date<".(time()-60));
  $remgroups=array();
  while ($rec=mysql_fetch_assoc($r)) {
    if ($rec["groupid"]) {
      if (@$remgroups[$rec["groupid"]]) continue;
      $remgroups[$rec["groupid"]]=1;
      $login=mqfa1("select login from users where id='$rec[user]'");
      $r2=mq("select fieldmembers.id, fieldmembers.user, fieldmembers.started, users.login from fieldmembers left join users on users.id=fieldmembers.user where users.id<>$rec[id] and fieldmembers.groupid='$rec[groupid]'");
      while ($rec2=mysql_fetch_assoc($r2)) {
        privatemsg("Ваша группа для пещеры кристаллов отменяется, т. к. персонаж $login вышел из игры.", $rec2["login"]);
        remfieldmember($rec2["user"], $rec2);
      }
    } else {
      remfieldmember($rec["user"], $rec);
    }
  }

    // start BS
    $tr = mysql_fetch_array(mysql_query("SELECT * FROM `deztow_turnir` WHERE `active` = TRUE"));
    if (!$tr) {
      $turnirstart = mysql_fetch_array(mysql_query("SELECT `value` FROM `variables` WHERE `var` = 'startbs' LIMIT 1;"));
      $dd = mysql_fetch_array(mysql_query("SELECT count(`kredit`) FROM `deztow_stavka`;"));
      if($dd[0] < 2 && $turnirstart[0] <= time()) {
        mysql_query('UPDATE `variables` SET `value` = \''.(time()+60).'\' WHERE `var` = \'startbs\';');
      }
      $fromprev=time()-mqfa1("select max(endtime) from deztow_turnir");
    }
    if(!$tr && $turnirstart[0] <= time() && $dd[0] >= 2 && $fromprev>300) {
      $type=mqfa1("select value from variables where var='deztowtype'");
      // начинаем БС
      $minroom = 501;
      $maxroom = 560;
      // вычисляем кто прошел в турнир
      $stavka = mysql_fetch_array(mysql_query("SELECT SUM(`kredit`)*0.7 FROM `deztow_stavka`;"));
      // создаем запись о турнире
      mq("INSERT `deztow_turnir` (`type`,`winner`,`coin`,`start_time`,`log`,`endtime`,`active`) values ('".rand(1,7)."','','".$stavka[0]."','".time()."','".$log."','0','1');");
      $dtid=mysql_insert_id();
      $data=mq("SELECT dt.owner FROM `deztow_stavka` as dt, `online` as o, users WHERE (SELECT count(`id`) FROM `effects` WHERE `effects`.`owner` = dt.owner AND ( type=11 OR type=12 OR type=13 OR type=14)) = 0  AND o.id = dt.owner AND users.id = dt.owner AND users.room = 31 AND o.`date` >= '".(time()-300)."' ORDER by `kredit` DESC, dt.`time` ASC  LIMIT 100;");
      // удаляем сразу, чтоб другим не повадно было
      if($data) {
        mysql_query("TRUNCATE TABLE `deztow_stavka`;");
        mysql_query("TRUNCATE TABLE `deztow_gamers_inv`;");
      }
      $invcond="";
      $dtcond="";
      $slotsto0="";
      foreach ($userslots as $k=>$v) {
        $slotsto0.=", $v='0'";
      }

      while($row=mysql_fetch_array($data)) {
        $invcond.=" or id='$row[0]' ";
        if ($type==1) {

          $tec = mysql_fetch_array(mysql_query("SELECT * FROM `deztow_charstams` WHERE `owner` = '{$row[0]}' and room=0 order by `def`='1' desc;"));
          if (!$tec) {
            $tec=array(25,25,25,25);
            $tec["sila"]=25;
            $tec["lovk"]=25;
            $tec["inta"]=25;
            $tec["vinos"]=25;
          }
          if($tec[0] && $row[0] != 83) {
            // умелки
            if ($tec["vinos"]>=125) $ghp=250;
            elseif ($tec["vinos"]>=100) $ghp=250;
            elseif ($tec["vinos"]>=75) $ghp=175;
            elseif ($tec["vinos"]>=50) $ghp=100;
            elseif ($tec["vinos"]>=25) $ghp=50;
            else $ghp=0;
            //".$stats."
            mq("UPDATE `users` SET `sila`='".$tec['sila']."', `lovk`='".$tec['lovk']."',`inta`='".$tec['inta']."',`vinos`='".$tec['vinos']."',`intel`='".$tec['intel']."',`mudra`='".$tec['mudra']."', spirit=0, level=8, `stats`='0',
            `noj`=0,`mec`=0,`topor`=0,`dubina`=0,`posoh`=0,`mfire`=0,`mwater`=0,`mair`=0,`mearth`=0,`mlight`=0,`mgray`=0,`mdark`=0,`master`='9',`maxhp`='".($tec['vinos']*6+$ghp)."',`hp`='".($tec['vinos']*6+$ghp)."',`mana`='".($tec['mudra']*10)."',`maxmana`='".($tec['mudra']*10)."', in_tower=-1
            $slotsto0
            WHERE `id` = '".$row[0]."' LIMIT 1;");
            // закончили
          }
        }
      }
      if ($type==1) {
        mq("update inventory set dressed=0 where 0 ".str_replace("id=","owner=",$invcond));
        mq("update effects set owner=owner+"._BOTSEPARATOR_." where 0 ".str_replace("id=","owner=",$invcond)."");
      }
      $r=mq("select id, login, level, align, klan from users where (0 $invcond)");
      $lors="";
      while ($rec=mysql_fetch_assoc($r)) {
        if($lors) $lors .= ", ";
        $lors.="<img src=\"i/align_".($rec['align']>0 ? $rec['align']:"0").".gif\">";
        if ($rec['klan'] <> '') $lors.='<img title="'.$rec['klan'].'" src="http://img.bestcombats.net/klan/'.$rec['klan'].'.gif">';
        $lors.= "<B>$rec[login]</B> [$rec[level]]<a href=inf.php?$rec[id] target=_blank><IMG SRC=i/inf.gif WIDTH=12 HEIGHT=11 ALT=\"Инф. о $rec[login]\"></a>";
      }           
      // формируем лог
      $log = '<span class=date>'.date("d.m.y H:i").'</span> Начало турнира. Участники: '.$lors.'<BR>';
      mq("update `deztow_turnir` set log='$log' where id='$dtid'");
      mq("UPDATE `users` SET invis=0, in_tower=$type, `room` = floor(rand()*60)+501 WHERE 0 $invcond");
      sysmsg("Началась ".($type==1?"Общая битва":"Битва мастеров")." в <b>Башне Смерти</b>. Всего участников: ".mysql_num_rows($data).".");
    } elseif (!$tr) {
      
      $i=mqfa1("select id from deztow_items");
      if (!$i) {
        // разбрасываем шмот по комнатам
        
        $type=mqfa1("select value from variables where var='deztowtype'");
        $minroom = 501;
        $maxroom = 560;
        
        // айдишники магазинных прототипов
        $shmots = array(96, 111, 130, 131, 148, 142, 149, 175, 176, 224, 796, 795, 797, 225, 226, 227, 228, 229, 231, 232, 233, 234, 236, 272,
        291, 292, 294, 302, 304, 306, 315, 411, 413, 418, 419, 420, 422, 423, 424, 425, 1613, 1621, 1628, 1635, 1660, 1661, 1207, 1208,
        1248, 1252, 1390, 1419, 1423, 1430, 1448, 654, 655, 659, 665, 967, 970, 1103, 1171, 426, 428, 435, 1100, 568, 573, 606, 618, 652,
        "109","128","237","238","239","241","242","243","307","417","432","434","436","437","438","444","462","576","577","578",
        "613","616","619","666","667","668","798","799","1108","1209","1256","1258","1259","1417","1432","1012","1013","1015","1045",
        "1046","1048","1049","1101","617","624","972","973","974","975","976","1087","1104","1107","1109","1113","1114","1115","1116",
        "1117","1118","1123","1126","1127","1133","1136","1173","1174","1175","1176","1177","1178","1235","1179","1181","1202","1203",
        "1205","1212","1213","1261","1262","1287","1288","1312","1313","1314","1315","1316","1317","1322","1329","1344","1345","1346",
        "1347","1348","1371","1372","1373","1374","1422","1062","1061","1059","1058","1017","1018","1019","1021","1022","1023","1024",
        "1051","261","1096","531","628","632","1378","803","804","805","806","979","981","982","1112","1119","1121","1122","1124","1125",
        "1137","1138","1139","1141","1172","1182","1183","1184","1185","1215","1222","1218","1224","1233","1236","1237","1238","1239","1264",
        "1265","1267","1268","1269","97","97","97","98","99","1271","1289","1291","1292","1318","1319","1321","1331","1349","1351","1376","1379",
        "1385","1388","1421","1434","1435","86","101","97","100","121","102","120","103","9","111","103","120","114",
        "121","171","171","121","121","102","109","128","237","238","239","241","242","243","307","417","432","434","436","437","438","444","462",
        "576","577","578","613","616","619","666","667","668","798","799","1108","1209","1256","1258","1259","1417","1432","1012","1013","1015","1045",
        "1046","1048","1049","1101","617","624","972","973","974","975","976","1087","1104","1107","1109","1113","1114","1115","1116","1117","1118","1123",
        "1126","1127","1133","1136","1173","1174","1175","1176","1177","1178","1235","1179","1181","1202","1203","1205","1212","1213","1261","1262","1287",
        "1288","1312","1313","1314","1315","1316","1317","1322","1329","1344","1345","1346","1347","1348","1371","1372","1373","1374","1422","1062","1061",
        "1059","1058","1017","1018","1019","1021","1022","1023","1024","1051","261","1096","531","628","632","1378","803","804","805","806","979","981",
        "982","1112","1119","1121","1122","1124","1125","1137","1138","1139","1141","1172","1182","1183","1184","1185","1215","1222","1218","1224","1233",
        "1236","1237","1238","1239","1264","1265","1267","1268","1269","1271","1289","1291","1292","1318","1319","1321","1331","1349","1351","1376","1379",
        "1385","1388","1421","1434","1435","86","101","97","97","97","97","98","99","100","121","102","120","103","9","111",
        "103","120","121","171","171","121","121","102","109","128","237","238","239","241","242","243","307","417","432","434","436","437","438","444",
        "462","576","577","578","613","616","619","666","667","668","798","799","1108","1209","1256","1258","1259","1417","1432","1012","1013","1015","1045",
        "1046","1048","1049","1101","617","624","972","973","974","975","976","1087","1104","1107","1109","1113","1114","1115","1116","1117","1118","1123","1126",
        "1127","1133","1136","1173","1174","1175","1176","1177","1178","1235","1179","1181","1202","1203","1205","1212","1213","1261","1262","1287","1288","1312",
        "1313","1314","1315","1316","1317","1322","1329","1344","1345","1346","1347","1348","1371","1372","1373","1374","1422","1062","1061","1059","1058","1017",
        "1018","1019","1021","1022","1023","1024","1051","261","1096","531","628","632","1378","803","804","805","806","979","981","982","1112","1119","1121","1122",
        "1124","1125","1137","1138","1139","1141","1172","1182","1183","1184","1185","1215","1222","1218","1224","1233","1236","1237","1238","1239","1264","1265","1267",
        "1268","1269","1271","1289","1291","1292","1318","1319","1321","1331","1349","1351","1376","1379","1385","1388","1421","1434","1435","86","101","97","97","97","97","98",
        "99","100","121","102","120","103","9","111","103","120","121","171","171","121","121","102","109","128","237","238","239","241","242",
        "243","307","417","432","434","436","437","438","444","462","576","577","578","613","616","619","666","667","668","798","799","1108","1209","1256","1258","1259","1417","1432",
        "1012","1013","1015","1045","1046","1048","1049","1101","617","624","972","973","974","975","976","1087","1104","1107","1109","1113","1114","1115","1116","1117","1118","1123",
        "1126","1127","1133","1136","1173","1174","1175","1176","1177","1178","1235","1179","1181","1202","1203","1205","1212","1213","1261","1262","1287","1288","1312","1313","1314",
        "1315","1316","1317","1322","1329","1344","1345","1346","1347","1348","1371","1372","1373","1374","1422","1062","1061","1059","1058","1017","1018","1019",
        "1021","1022","1023","1024","1051","261","1096","531","628","632","1378","803","804","805","806","979","981","982","1112","1119","1121","1122","1124","1125","1137","1138","1139",
        "1141","1172","1182","1183","1184","1185","1215","1222","1218","1224","1233","1236","1237","1238","1239","1264","1265","1267","1268","1269","1271","1289","1291","1292","1318","1319",
        "1321","1331","1349","1351","1376","1379","1385","1388","1421","1434","1435","86","101","97","97","97","97","98","99","100","121","102","120","103","9",
        "111","103","120","121","171","171","121","121","102"
        );
        $wmot=unserialize(implode("",file("data/deztowshmot.dat")));
        while($sh = array_shift($shmots)) {
          $shopid=$wmot[$sh];
          mysql_query("INSERT `deztow_items` (`iteam_id`, `name`, `img`, `room`) values ('".$shopid['id']."', '".$shopid['name']."', '".$shopid['img']."', '".rand($minroom,$maxroom)."');");
        }
        if ($type!=1) {
          $shopid = mqfa("SELECT * FROM `shop` WHERE `id` = '1766'");
          $i=$minroom;
          while ($i<=$maxroom) {
            mysql_query("INSERT `deztow_items` (`iteam_id`, `name`, `img`, `room`) values ('".$shopid['id']."', '".$shopid['name']."', '".$shopid['img']."', '".$i."');");
            $i++;
          }
        }
      }
    }

    define("USERBATTLE",0);

    $r=mq("select id, win from battle where needbb=2 and win=3");
    $r2=mq("select id, win from battle where needbb=1 and win=3 and (timeout*90+to1<".time()." or timeout*90+to2<".time().")");
    if (mysql_num_rows($r)>0 || mysql_num_rows($r2)>0) include "fbattle.php";
    include_once DOCUMENTROOT."incl/strokedata.php";
    $battles=array();

    while ($rec=mysql_fetch_assoc($r)) {
      mq("LOCK TABLES `bots` WRITE, `puton` WRITE, `userdata` WRITE, `priem` WRITE, `deztow_realchars` write, `shop` WRITE, `person_on` WRITE, `podzem3` WRITE, `canal_bot` WRITE, `labirint` WRITE, `battle` WRITE, `logs` WRITE, `users` WRITE, `inventory` WRITE, `magic` WRITE, `effects` WRITE, `clans` WRITE, `online` WRITE, `telegraph` WRITE, `allusers` WRITE, `quests` WRITE, `battleeffects` WRITE, `items` WRITE, `podzem2` WRITE, `battleunits` WRITE, `berezka` WRITE, `qtimes` WRITE, `smallitems` WRITE, `podzem_zad_login` write, `caveparties` write, `caveitems` write, `cavebots` write, errorstats write, caves write, userstrokes write, variables write, droplog write;");      
      $fbattle=new fbattle($rec["id"]);
      foreach ($fbattle->battle as $k=>$v) {
        if ($k>_BOTSEPARATOR_) {
          foreach ($v as $k2=>$v2) {
            if ($k2<_BOTSEPARATOR_) continue;
            if ($fbattle->battle[$k][$k2][0] && $fbattle->battle[$k2][$k][0] && $fbattle->userdata[$k]["hp"]>0 && $fbattle->userdata[$k2]["hp"]>0) {
              $fbattle->makechange($k, $k2);
              $fbattle->write_log();
              $fbattle->battle[$k][$k2]=array(0,0,time());
              $fbattle->battle[$k2][$k]=array(0,0,time());
              if ($cond) $tocond.=" or ";
              $battles[$rec["id"]]=1;
            }
          }
          $fbattle->checkbotstrokes($k);
        }
      }
      if ($fbattle->needupdate) $fbattle->update_battle();
      $fbattle->updatebattleunits();
      mq("unlock tables");
    }
    while ($rec=mysql_fetch_assoc($r2)) {
      mq("LOCK TABLES `bots` WRITE, `puton` WRITE, `userdata` WRITE, `priem` WRITE, `deztow_realchars` write, `shop` WRITE, `person_on` WRITE, `podzem3` WRITE, `canal_bot` WRITE, `labirint` WRITE, `battle` WRITE, `logs` WRITE, `users` WRITE, `inventory` WRITE, `magic` WRITE, `effects` WRITE, `clans` WRITE, `online` WRITE, `telegraph` WRITE, `allusers` WRITE, `quests` WRITE, `battleeffects` WRITE, `items` WRITE, `podzem2` WRITE, `battleunits` WRITE, `berezka` WRITE, `qtimes` WRITE, `smallitems` WRITE, `podzem_zad_login` write, `caveparties` write, `caveitems` write, `cavebots` write, errorstats write, caves write, userstrokes write, variables write, droplog write;");      
      $fbattle=new fbattle($rec["id"]);
      foreach ($fbattle->battle as $k=>$v) {
        if ($k>_BOTSEPARATOR_) {
          foreach ($v as $k2=>$v2) {
            if ($k2>_BOTSEPARATOR_) continue;
            if ($fbattle->userdata[$k]["hp"]>0 && $fbattle->userdata[$k2]["hp"]>0) {
              $fbattle->battle[$k2][$k][0]=664;
              $fbattle->battle[$k2][$k][1]=664;
              $fbattle->makechange($k, $k2);
              $fbattle->write_log();
              $fbattle->battle[$k][$k2]=array(0,0,time());
              $fbattle->battle[$k2][$k]=array(0,0,time());
              if ($cond) $tocond.=" or ";
              $battles[$rec["id"]]=1;
            }
          }
          $fbattle->checkbotstrokes($k);
        }
      }
      if ($fbattle->needupdate) $fbattle->update_battle();
      $fbattle->updatebattleunits();
      mq("unlock tables");
    }


    $cond="";
    foreach ($battles as $k=>$v) {
      if ($cond) $cond.=" or ";
      $cond.=" id='$k' ";
    }
    if ($cond) {
      mq("update battle set to1=".time().", to2=".time()." where $cond");
    }
    $tme=localtime();
    if ($tme[1]%10==0) {
      mq("insert into stats (dat, visitors) values (now(), ".mnr("select distinct(users.ip) from `online` left join users on users.id=online.id WHERE `date` >= unix_timestamp()-60").")");
    }

  function maketeams($t1, $t2) {
    print_r($t1);
    print_r($t2);
    foreach($t1 as $k=>$v) {
      foreach($t2 as $kk => $vv) {
        $teams[$v][$vv] = array(0,0,time());
        $teams[$vv][$v] = array(0,0,time());
      }
    }
    return $teams;
  }

  function startgroupbattle($users, $quest, $minusers=5, $timeout=3, $comment="", $type=3, $blood=0, $closed=1) {
    foreach($users as $k=>$v) {
      if (!isonline($v)) unset($users[$k]);
    }
    if (count($users)<$minusers) return false;
    $team1=array();
    $team2=array();
    $i=0;
    foreach ($users as $k=>$v) {
      $i++;
      if ($i%2) $team1[]=$v;
      else $team2[]=$v;
    }

    $teams=maketeams($team1, $team2);

    mysql_query("INSERT INTO `battle` (`id`,`coment`,`teams`,`timeout`,`type`,`status`,`t1`,`t2`,`to1`,`to2`,`blood`,`quest`, `closed`)
    VALUES (NULL,'$coment','".serialize($teams)."','$timeout','$type','0','".implode(";",$team1)."','".implode(";",$team2)."','".time()."','".time()."','".$blood."', '$quest', '$closed')");
    $id = mysql_insert_id();
    // создаем лог
    $rr = "<b>";
    foreach( $team1 as $k=>$v ) {
      if ($k!=0) { $rr.=", "; $rrc.=", "; }
      $rr .= nick3($v);
      $rrc .= nick7($v);
      addchp ('<font color=red>Внимание!</font> Ваш бал начался!<BR>\'; top.frames[\'main\'].location=\'fbattle.php\'; var z = \'   ','{[]}'.nick7 ($v).'{[]}');
    }
    $rr .= "</b> и <b>"; $rrc .= "</b> и <b>";
    foreach( $team2 as $k=>$v ) {
      if ($k!=0) { $rr.=", "; $rrc.=", ";}
      $rr .= nick3($v);
      $rrc .= nick7($v);
      addchp ('<font color=red>Внимание!</font> Ваш бал начался!<BR>\'; top.frames[\'main\'].location=\'fbattle.php\'; var z = \'   ','{[]}'.nick7 ($v).'{[]}');
    }
    $rr .= "</b>";
    addch ("<a href=logs.php?log=".$id." target=_blank>Поединок</a> между <B>".$rrc."</B> начался.   ",$user['room']);
    mysql_query("INSERT INTO `logs` (`id`,`log`) VALUES('{$id}','Часы показывали <span class=date>".date("Y.m.d H.i")."</span>, когда ".$rr." бросили вызов друг другу. <BR>');");
    addlog($id,"Часы показывали <span class=date>".date("Y.m.d H.i")."</span>, когда ".$rr." бросили вызов друг другу. <BR>");

    // всех в БОЙ!!!
    foreach($team1 as $k=>$v) {
      mysql_query("UPDATE users SET `battle`='$id',`zayavka`=0 WHERE `id`=$v");
    }
    foreach($team2 as $k=>$v) {
      mysql_query("UPDATE users SET `battle`='$id',`zayavka`=0 WHERE `id`=$v");
    }
    return true;
  }

  function deleffect($rec) {
    mq("delete from effects where id='$rec[id]'");
    mq("update users set sila=sila-$rec[sila], lovk=lovk-$rec[lovk], inta=inta-$rec[inta], intel=intel-$rec[intel] where id='$rec[owner]'");
    mq("delete from effects where id='$rec[id]'");
  }

  function remelix($u) {
    $r=mq("select * from effects where owner='$u' and type=188");
    while ($rec=mysql_fetch_assoc($r)) {
      deleffect($rec);
    }
    mq("delete from effects where (type=201 or type=202) and owner='$u'");
  }
  $i=mqfa1("select value from variables where var='startbs2'");
  if ($i<=time()) {  
    include "functions/movedtbots.php";
    $dtf=mqfa("select id, start from fields where room=72");
    if (!$dtf) {
      $r=mq("select user from fieldmembers where valid=1 and room=71 order by stake desc limit 0, 40");
      $cond="";
      while ($rec=mysql_fetch_assoc($r)) {
        if ($cond) $cond.=" or ";
        $cond.=" id='$rec[user]' ";
      }
      if (mysql_num_rows($r)>1) {
        $slotsto0="";
        foreach ($userslots as $k=>$v) {
          $slotsto0.=", $v='0'";
        }

        $starts[]=array(2,4);
        $starts[]=array(4,4);
        $starts[]=array(3,2);
        $starts[]=array(7,2);
        $starts[]=array(6,4);
        $starts[]=array(7,5);
        $starts[]=array(9,2);
        $starts[]=array(10,4);
        $starts[]=array(9,6);
        $starts[]=array(11,3);
        $starts[]=array(13,2);
        $starts[]=array(15,3);
        $starts[]=array(8,8);
        $starts[]=array(1,8);
        $starts[]=array(3,8);
        $starts[]=array(2,10);
        $starts[]=array(4,10);
        $starts[]=array(2,11);
        $starts[]=array(6,9);
        $starts[]=array(11,7);
        $starts[]=array(14,8);
        $starts[]=array(12,9);
        $starts[]=array(11,10);
        $starts[]=array(9,11);
        $starts[]=array(6,11);
        $starts[]=array(14,11);
        $starts[]=array(15,12);
        $starts[]=array(15,13);
        $starts[]=array(13,13);
        $starts[]=array(11,13);
        $starts[]=array(8,14);
        $starts[]=array(6,14);
        $starts[]=array(4,14);
        $starts[]=array(5,12);
        $starts[]=array(6,14);
        $starts[]=array(8,16);
        $starts[]=array(9,18);
        $starts[]=array(7,17);
        $starts[]=array(10,17);
        $starts[]=array(10,20);
        $starts[]=array(13,16);
        $starts[]=array(12,17);
        $starts[]=array(13,20);
        shuffle($starts);

        $map=mqfa1("select map from cavemaps where room=71");
        $map=unserialize($map);
        mq("lock tables fields write, fielditems write, users write, online write, fieldparties write, fieldmembers write, obshagaeffects write, inventory write, deztow_charstams write, effects write, setstats write, variables write, fieldlogs write");
        mq("delete from fieldparties where user=11137 or user=11138 or user=11139");
        mq("insert into fields set map='".serialize($map)."', room=72, start=".time());
        $field=mysql_insert_id();                        
        mq("update fielditems set field='$field' where id<1000");
        $x=1;
        $r=mq("select id, login, shadow, sex, level, klan from users where $cond");
        $members=0;
        $x=1;$y=3;
        $membersstr="";
        while ($rec=mysql_fetch_assoc($r)) {
          $start=array_pop($starts);
          mq("insert into fieldparties set user='$rec[id]', field='$field', x='$start[0]', y='$start[1]', dir='".rand(0,3)."', login='$rec[login]', shadow='$rec[sex]/$rec[shadow]'");
          addchnavig("Начался турнир Башни смерти", $rec["login"], "field.php");
          $members++;

          $tec = mqfa("SELECT * FROM `deztow_charstams` WHERE `owner` = '$rec[id]' and room=71 order by def desc");
          if (!$tec) {
            $tec=array(25,25,25,25);
            $tec["sila"]=25;
            $tec["lovk"]=25;
            $tec["inta"]=25;
            $tec["vinos"]=25;
          }
          if ($tec["vinos"]>=125) $ghp=250;
          elseif ($tec["vinos"]>=100) $ghp=250;
          elseif ($tec["vinos"]>=75) $ghp=175;
          elseif ($tec["vinos"]>=50) $ghp=100;
          elseif ($tec["vinos"]>=25) $ghp=50;
          else $ghp=0;
          mq("UPDATE `users` SET `sila`='".$tec['sila']."', `lovk`='".$tec['lovk']."',`inta`='".$tec['inta']."',`vinos`='".$tec['vinos']."',`intel`='".$tec['intel']."',`mudra`='".$tec['mudra']."', spirit=0, level=8, `stats`='0',
          `noj`=0,`mec`=0,`topor`=0,`dubina`=0,`posoh`=0,`mfire`=0,`mwater`=0,`mair`=0,`mearth`=0,`mlight`=0,`mgray`=0,`mdark`=0,`master`='9',`maxhp`='".($tec['vinos']*6+$ghp)."',`hp`='".($tec['vinos']*6+$ghp)."',`mana`='".($tec['mudra']*10)."',`maxmana`='".($tec['mudra']*10)."', align='0', in_tower=-1
          $slotsto0
          WHERE `id` = '$rec[id]'");
          if ($membersstr) $membersstr.=", ";
          $membersstr.=fullnick($rec);
        }
        mq("insert into fieldlogs set team1='<span class=date>".date("d.m.y H:i")."</span>', id='$field', log='<H3>Башня Смерти. Отчет о турнире ".date("d.m.y H:i").".</H3><span class=date>".date("H:i")."</span> Начало турнира. Участники: $membersstr<br>', room=72, started=".time());

        $start=array_pop($starts);
        foreach ($wps as $k=>$v) {
          if ($v[0]==$start[0] && $v[1]==$start[1]) {
            $dir=$v[2];
            break;
          }
        }
        mq("insert into fieldparties set user='11137', field='$field', x='$start[0]', y='$start[1]', login='Страж башни', shadow='1/cvergbeast.gif', dir='$dir'");

        $start=array_pop($starts);
        foreach ($wps as $k=>$v) {
          if ($v[0]==$start[0] && $v[1]==$start[1]) {
            $dir=$v[2];
            break;
          }
        }
        mq("insert into fieldparties set user='11138', field='$field', x='$start[0]', y='$start[1]', login='Часовой башни', shadow='1/cvergbeast.gif', dir='$dir'");

        $start=array_pop($starts);
        foreach ($wps as $k=>$v) {
          if ($v[0]==$start[0] && $v[1]==$start[1]) {
            $dir=$v[2];
            break;
          }
        }
        mq("insert into fieldparties set user='11139', field='$field', x='$start[0]', y='$start[1]', login='Дозорный башни', shadow='1/cvergbeast.gif', dir='$dir'");

        sysmsg("Начался турнир Подгорной Башни смерти. Всего участников: $members");

        mq("update inventory set dressed=0 where ".str_replace("id=","owner=",$cond));
        mq("UPDATE `effects` SET `owner` = owner+"._BOTSEPARATOR_." where ".str_replace("id=","owner=",$cond));
        mq("update users set invis=0, caveleader='$field', room=72, in_tower=71, hp=maxhp, mana=maxmana where $cond");
        $cond=str_replace("id=", "user=", $cond);
        mq("delete from fieldmembers where $cond");
        include "functions/makedtitems.php";
        mq("unlock tables");
      } else {
        sysmsg("Турнир Подгорной Башни смерти отложен на 2 часа.");
        mq("update variables set value=".(60*60*2+time())." where var='startbs2'");
      }
    } elseif ($dtf["start"]+180<time()) {
      $data=unserialize(implode("", file(CHATROOT."fielddata/$dtf[id]-1.dat")));
      movedtbots("$dtf[id]-1");
    }
  }

  $ldfield=mqfa("select id, team1, team2, pts1, pts2 from fields where room=63");
  if ($ldfield["team1"]=="--") $ldfield["team1"]="-";
  if ($ldfield["team2"]=="--") $ldfield["team2"]="-";
  if (($ldfield["team1"]=="-" || $ldfield["team2"]=="-") && !$ldfield["pts1"] && !$ldfield["pts2"]) {
    $winner=0;
    if ($ldfield["team1"]!="-") $winner=1;
    elseif ($ldfield["team2"]!="-") $winner=2;
    if ($winner) {
      mq("update fields set pts$winner=1, team1='-', team2='-' where id='$ldfield[id]'");
      if (!LDSIMPLEBATTLE) sysmsg("В Битве Света и Тьмы победил".($winner==1?" Свет":"а Тьма").".");
      $winners=mqfa1("select value from variables where var='ldteam$winner'");
      $winners=explode("-", $winners);
      foreach ($winners as $k=>$v) {
        if (!$v) continue;
        mq("INSERT INTO `effects` set owner=$v, name='Победитель общего побоища', time=".(60*60*24+time()).", type=186, mfdhit=50, mfdmag=50, mf='mfhitp/mfmagp', mfval='10/10'");
        addchp ('Ваша команда победила в Общем побоище.','{[]}'.nick7 ($v).'{[]}');
      }
    } else {
      mq("update fields set pts1=-1, pts2=-1 where id='$ldfield[id]'");
      if (!LDSIMPLEBATTLE) sysmsg("Битва Света и Тьмы закончилась вничью.");
    }
    mq("update users set room=62, in_tower=0 where room=63");
  }

  if (date('G')==22 && $ldfield) {
    mq("delete from fields where id='$ldfield[id]'");
  }
  if (date('G')>=23 && !$ldfield) {
    $r=mq("select user from fieldmembers where valid=1 and room=62 order by id");
    $cond="";
    while ($rec=mysql_fetch_assoc($r)) {
      if ($cond) $cond.=" or ";
      $cond.=" users.id='$rec[user]' ";
    }
    $r=mq("select users.id, users.align, sum(cost) as cost from users left join inventory on inventory.owner=users.id where ($cond) and inventory.dressed=1 and inventory.type<>25 group by users.id");
    $cost1=0;
    $cost2=0;
    $other=array();
    $tostart=array();

    while ($rec=mysql_fetch_assoc($r)) {
      $at=aligntype($rec["align"]);
      if (LDSIMPLEBATTLE) $at=0; 
      if ($at==1) {
        $cost1+=$rec["cost"];
        $tostart[0][]=$rec["id"];
      } elseif ($at==2) {
        $cost2+=$rec["cost"];
        $tostart[1][]=$rec["id"];
      } else {
        $other[]=$rec;
      }
    }

    while (count($other)>0) {
      $maxc=-1;
      $mi=0;
      foreach ($other as $k=>$v) {
        if ($v["cost"]>$maxc) {
          $mi=$k;
          $maxc=$v["cost"];
        }
      }
      $rec=$other[$mi];
      if ($cost1<$cost2) {
        $cost1+=$rec["cost"];
        $tostart[0][]=$rec["id"];
      } else {
        $cost2+=$rec["cost"];
        $tostart[1][]=$rec["id"];
      }
      unset($other[$mi]);
    }
    if (count($tostart[0])>count($tostart[1])) $max=count($tostart[0]); else $max=count($tostart[1]);
    $map=array();
    $y=0;
    $ht=21;
    while ($y<=$ht) {
      $x=0;
      while ($x<=$max*2+2) {
        if (($x%2!=$y%2 && $x>0 && $y>0) && ($x==1 || $y==1 || $y==$ht || $x==1 || $x==$max*2+1)) $map[$y][$x]=1;
        elseif ($x>0 && $y>0 && $x%2==0 && $y%2==0 && $x<$max*2+1 && $y<$ht) {
          $map[$y][$x]="s/1/2";
        } else $map[$y][$x]=0;
        $x++;
      }
      $y++;
    }

    mq("lock tables fields write, users write, online write, fieldparties write, fieldmembers write, obshagaeffects write, inventory write, deztow_charstams write, effects write, setstats write, variables write");
    mq("update variables set value='-".implode("-",$tostart[0])."-' where var='ldteam1'");
    mq("update variables set value='-".implode("-",$tostart[1])."-' where var='ldteam2'");
    mq("insert into fields set map='".serialize($map)."', team1='-".implode("-",$tostart[0])."-', team2='-".implode("-",$tostart[1])."-', room=63");
    $field=mysql_insert_id();
    $cond="";
    $x=1;
    foreach ($tostart[0] as $k=>$v) {
      $rec=mqfa("select login, shadow, sex from users where id='$v'");
      mq("insert into fieldparties set user='$v', field='$field', x='$x', y='1', dir='3', login='$rec[login]', shadow='$rec[sex]/$rec[shadow]', team=1");
      $x++;
      if ($cond) $cond.=" or ";
      $cond.=" id='$v' ";
      addchnavig((LDSIMPLEBATTLE?"Началось общее побоище.":"Битва Света и Тьмы началась!"), $rec["login"], "field.php");
    }
    $x=1;
    foreach ($tostart[1] as $k=>$v) {
      $rec=mqfa("select login, shadow, sex from users where id='$v'");
      mq("insert into fieldparties set user='$v', field='$field', x='$x', y='10', dir='1', login='$rec[login]', shadow='$rec[sex]/$rec[shadow]', team=2");
      $x++;
      $cond.=" or id='$v' ";
      addchnavig("Битва Света и Тьмы началась!", $rec["login"], "field.php");
    }
    if (LDSIMPLEBATTLE) sysmsg("Началось общее побоище. Всего участников: ".(count($tostart[0])+count($tostart[1])));
    else sysmsg("Началась битва Света и Тьмы. Всего участников за Свет: ".count($tostart[0])." за Тьму: ".count($tostart[1]));
    mq("update users set caveleader='$field', room=63, in_tower=62, s_duh=100*(spirit+if(level>=10,40,if(level>=9,30,if(level>=8,20,10)))), hp=maxhp, mana=maxmana where $cond");
    $cond=str_replace("id=", "user=", $cond);
    mq("delete from fieldmembers where $cond");
    mq("unlock tables");
  }

  //тут табла опыта для клана
  $klanexptable = array(
  "0" => array (0,500000),
  "500000" => array (1,2000000),
  "2000000" => array (1,5500000),
  "5500000" => array (1,10500000),
  "10500000" => array (1,20500000),
  "20500000" => array (1,30500000),
  "30500000" => array (1,40500000),
  "40500000" => array (1,55000000),
  "55000000" => array (1,75000000),
  "75000000" => array (1,95000000),
  "95000000" => array (1,110000000));
  $r=mq("SELECT * FROM `clans` WHERE clanexp>=needexp");
  while ($klan=mysql_fetch_assoc($r)) {
    mq("UPDATE `clans` SET `needexp` = ".$klanexptable[$klan['needexp']][1].",`clanlevel` = `clanlevel`+".$klanexptable[$klan['needexp']][0]."
    WHERE `id` = '$klan[id]'");
  }


  $siege=mqfa1("select value from variables where var='siege'");
  if ($siege<=2) {
    $r=mq("select users.id from `online` left join users on users.id=online.id WHERE users.room>=700 and users.room<800 and users.battle=0 and (`date`<".time()."-60 or users.hp<=0 ".($siege==0?" or users.klan=''":"").")");
    while ($rec=mysql_fetch_assoc($r)) moveuser($rec["id"], 49);
  }
  if ($siege==1 || $siege==2) {
    $owner=mqfa1("select value from variables where var='castleowner'");
    $c=mqfa1("select count(id) from users where room>=700 and room<800 and klan='$owner'");
    if ($c==0) { 
      sysmsg("Все защитники замка побеждены. Атакующие начинают битву за владение замком. Количество участников: ".mqfa1("select count(id) from users where room>=700 and room<800"));
      $siege=0;
      mq("update variables set value=0 where var='siege'");
      mq("update variables set value='' where var='castleowner'");
    } else {
      $c=mqfa1("select count(id) from users where room>=700 and room<800 and klan<>'$owner'");
      if ($c==0) { 
        sysmsg("Осада окончилась неудачно, замок остался за прежним владельцем.");
        $siege=0;
        mq("update variables set value='".(strtotime("next Sunday") + (21 * 3600))."' where var='siege'");
      }
    }
  } elseif (!$siege) {
    $r=mq("select distinct klan from users where room>=700 and room<800");
    if (mysql_num_rows($r)<=1) {
      $rec=mysql_fetch_assoc($r);
      mq("update variables set value='".(strtotime("next Sunday") + (21 * 3600))."' where var='siege'");
      mq("update variables set value='$rec[klan]' where var='castleowner'");
      if ($rec["klan"]) sysmsg("Битва за замок окончена. Владелец: клан <b>".mqfa1("select name from clans where short='$rec[klan]'")."</b>.");
    }
  } elseif ($siege<=time()) {
    $r=mq("select users.id from `online` left join users on users.id=online.id WHERE users.room>=700 and users.room<800 and `date`<".time()."-60");
    while ($rec=mysql_fetch_assoc($r)) moveuser($rec["id"], 49);
    $r=mq("select effects.id, users.room from effects left join users on effects.owner=users.id where effects.type=1022");
    while ($rec=mysql_fetch_assoc($r)) {
      if (incastle($rec["room"])) {
        mq("update effects set time=1 where id='$rec[id]'");
      }
    }
    $o=getvar("castleowner");
    if (!$o) {
      setvar("siege", 0);
      sysmsg("Началась битва за клановый замок, всего участников: ".mqfa1("select count(id) from users where room>=700 and room<800").".");
    } else {
      setvar("siege", 2);
      sysmsg("Началась осада кланового замка. Защитников: ".mqfa1("select count(id) from users where room>=700 and room<800 and klan='$o'").", осаждающих: ".mqfa1("select count(id) from users where room>=700 and room<800 and klan<>'$o'").".");
    }
  }

  $q=getvar("queststart");
  if ($q && $q<time()) {
    include DOCUMENTROOT."functions/checkexplosion.php";
  }

  $a=getvar("auction");
  if ($a<time()) {
    $r=mq("select * from lots");
    while ($rec=mysql_fetch_assoc($r)) {
      if (!$rec["user"]) continue;
      if ($rec["id"]==1) {
        mq("lock tables userdata write, users write");
        $e=mqfa1("select extra from userdata where id='$rec[user]'");
        if ($e) $e=unserialize($e); else $e=array();
        if (@$e["stats"][$rec["room"]]<3) {
          @$e["stats"][$rec["room"]]++;
          mq("update userdata set extra='".serialize($e)."', extrastats=extrastats+1, stats=stats+1 where id='$rec[user]'");
          mq("update users set stats=stats+1 where id='$rec[user]'");
        }
        mq("unlock tables");
      }
      if ($rec["id"]==2) {
        mq("lock tables userdata write, users write");
        $e=mqfa1("select extra from userdata where id='$rec[user]'");
        if ($e) $e=unserialize($e); else $e=array();
        if (@$e["master"]["$rec[room]"]<1) {
          @$e["master"][$rec["room"]]++;
          mq("update userdata set extra='".serialize($e)."', extramaster=extramaster+1, master=master+1 where id='$rec[user]'");
          mq("update users set master=master+1 where id='$rec[user]'");
        }
        mq("unlock tables");
      }
      if ($rec["id"]==3) $taken=takeshopitem(2316, "shop", "Аукционист", "", 2, 0, $rec["user"]);
      if ($rec["id"]==4) $taken=takeshopitem(1678, "shop", "Аукционист", "", 2, 0, $rec["user"]);
      if ($rec["id"]==5) $taken=takeshopitem(101773, "berezka", "Аукционист", "", 2, 0, $rec["user"]);
      if ($rec["id"]==6) $taken=takeshopitem(101708, "berezka", "Аукционист", "", 2, 0, $rec["user"]);
      if ($rec["id"]==7) $taken=takeshopitem(6, "shop", "Аукционист", "", 2, 0, $rec["user"]);
      if ($rec["id"]==8) $taken=takeshopitem(2262, "shop", "Аукционист", "", 2, array("nintel"=>0, "ngray"=>0), $rec["user"]);
      if ($rec["id"]==9) $taken=takeshopitem(1995, "shop", "", "", 0, 0, $rec["user"]);
      adddelo($rec["user"], "Получено на аукционе: \"$rec[name]\"".(@$taken["id"]?"(id: $taken[id])":""), 1);
    }
    mq("update lots set item=0, qty=0, user=0");
    $tme=mktime(0,0);
    $tme+=60*60*24*7;
    setvar("auction", $tme);
  }
  mq("delete from effects where (type=2 or type=3) and time<".time());

    //====================================================================================
echo "Finished";

$nowtime = time();

$info_pole = mysql_fetch_array(mysql_query("select * from `variables` where `var`='pole_random'"));

$ff_time = time();
$f_time = $ff_time +  14400; 

if($info_pole['value'] == ''){
    echo"OK";
for($i=0; $i<41; $i++) {
$hrand = rand(1,11)/10;
$rand = rand(1,9);
$rekrr = 30/30;
$rekr = rand(1,$rekrr)/10;
$bonus = rand(1,13)/10;
$bonuss = $rekr * $bonus;
$rekrr = $rekr + $bonuss;
if($rand == 1){$h = 100;}
elseif($rand == 2){$h = 80;}
elseif($rand == 3){$h = 70;}
elseif($rand == 4){$h = 60;}
elseif($rand == 5){$h = 50;}
elseif($rand == 6){$h = 40;}
elseif($rand == 7 || $rand == 8 || $rand == 9){$h = 0;}

$hh = $h * $hrand;
$h = $h + $hh;

mysql_query("UPDATE `pole` set `type`='".$rand."',`heals`='".$h."',`ekr`='".$rekrr."' where `id`='".$i."'");
}
mysql_query("update `variables` set `value`='".$f_time."' where `var`='".$info_pole['var']."'");}



else{
echo"OK";
if($info_pole['value'] < $nowtime){

echo"OK";
for($i=0; $i<41; $i++) {
$hrand = rand(1,11)/10;
$rand = rand(1,9);
$rekrr = 30/30;
$rekr = rand(1,$rekrr)/10;
$bonus = rand(1,13)/10;
$bonuss = $rekr * $bonus;
$rekrr = $rekr + $bonuss;
if($rand == 1){$h = 100;}
elseif($rand == 2){$h = 80;}
elseif($rand == 3){$h = 70;}
elseif($rand == 4){$h = 60;}
elseif($rand == 5){$h = 50;}
elseif($rand == 6){$h = 40;}
elseif($rand == 7 || $rand == 8 || $rand == 9){$h = 0;}

$hh = $h * $hrand;
$h = $h + $hh;

mysql_query("UPDATE `pole` set `type`='".$rand."',`heals`='".$h."',`ekr`='".$rekrr."' where `id`='".$i."'");
}
mysql_query("update `variables` set `value`=`value`+'14400' where `var`='".$info_pole['var']."'");
}
}
?>



