<?php

/*************************************** трещина *********************************************/

  // трещина 44x2
  if (($tx*2==44 && $ty*2==2) || ($tx*2==18 && $ty*2==2)) {
    $report="<div style=\"font-weight:normal\">Подозрительная трещина.<br><br>Как только Вы шагнёте на эту клетку - Вы провалитесь на третий этаж.</div>";
  }
  
/*************************************** куча мусора *********************************************/
  
  // куча мусора
  if (($tx*2==30 && $ty*2==14) || ($tx*2==34 && $ty*2==14) || ($tx*2==44 && $ty*2==12) || ($tx*2==42 && $ty*2==8) || ($tx*2==38 && $ty*2==4) || ($tx*2==28 && $ty*2==4) || ($tx*2==32 && $ty*2==6)) {    
    if (usagesleft($tx, $ty)) {
      takeusage($tx, $ty);
      $rnd=mt_rand(1,100);
      if ($rnd<=10) {
        $report=itemtofloor(2459, 0, 0, 1); // Бутылка  
      } elseif ($rnd<=20) {
        $smallItem = mqfa1("SELECT id FROM smallitems WHERE type = 189 AND (id = 15 OR id = 16 OR id = 17 OR id = 19 OR id = 20 OR id = 21) ORDER BY RAND() ") or die(mysql_error()); 
        $report=itemtofloor($smallItem, 0, 0, 1, 'smallitems', 1);
      } elseif ($rnd<=25) {
        $report=itemtofloor(2593, 0, 0, 3); // лучистый рубин
      } else {
        setCaveEffect(9999, 9994);
      }
    } else {
      $report="<div style=\"font-weight:normal\">Пусто.</div>";
    }
  }

/*************************************** сундук *********************************************/

  // Сундук 26x14
  if ($tx*2==26 && $ty*2==14) {
    if (usagesleft($tx, $ty)) {
      $rnd=mt_rand(1,100);
      if ($rnd<=33) {
        $i = mt_rand(0, 4); // 1431, 236, 1185, 1647, 1237
        $dItem = array(1431, 236, 1185, 1647, 1237);
        $report=itemtofloor($dItem[$i], 0, 0, 1);
      } elseif ($rnd<=66) {
        $report=itemtofloor(5, 0, 0, 1); // чек на предъявителя
      } else {
        $mhp=500+mt_rand(0, 500);
        $report="Вы попали в ловушку -$mhp HP.";
        takehp($user["id"], $mhp);
      }
      takeusage($tx, $ty);
    } else {
      $report="<div style=\"font-weight:normal\">Пусто.</div>";
    }
  }
  
  // Сундук 44x6
  if ($tx*2==44 && $ty*2==6) {
    if (usagesleft($tx, $ty)) {
      $rnd=mt_rand(1,100);
      if ($rnd<=33) {
        $i = mt_rand(0, 4); // 1431, 236, 1185, 1647, 1237
        $dItem = array(1431, 236, 1185, 1647, 1237);
        $report=itemtofloor($dItem[$i], 0, 0, 1);
      } elseif ($rnd<=66) {
        $report="<div style=\"font-weight:normal\">Пусто.</div>";
      } else {
        $mhp=500+mt_rand(0, 500);
        $report="Вы попали в ловушку -$mhp HP.";
        takehp($user["id"], $mhp);
      }
      takeusage($tx, $ty);
      if (!@$report) {
        $report="<div style=\"font-weight:normal\"></div>";
      }
    } else {
      $report="<div style=\"font-weight:normal\">Пусто.</div>";
    }
  }
  
  // Сундук 42x2
  if ($tx*2==42 && $ty*2==2) {
    $isKey = mysql_result(mysql_query("SELECT COUNT(*) FROM inventory WHERE name = 'Пирамидальный Ключ' AND owner = " . $user['id']), 0, 0);
    if (!$isKey) {
      $isItem = mysql_result(mysql_query("SELECT COUNT(*) FROM inventory WHERE name = 'Осколок Пирамидального Ключа' AND owner = " . $user['id']), 0, 0);
      if (!$isItem) {
        $report=pickupitem(2531, 0, 0, 0, 1, 2);
      } else {
        $report="<div style=\"font-weight:normal\">У вас уже есть <b>Осколок Пирамидального Ключа</b></div>";
      }
    } else {
      $report="<div style=\"font-weight:normal\">У вас уже есть <b>Пирамидальный Ключ</b></div>";
    }
  }
  
  // Сундук 6x2
  if ($tx*2==6 && $ty*2==2) {
    if (usagesleft($tx, $ty)) {
      $rnd=mt_rand(1,100);
      if ($rnd<=15) {
        $report=itemtofloor(1959, 0, 0, 1); // Бутерброд -Завтрак рыцаря-
      } elseif ($rnd<=30) {
        $report=itemtofloor(2460, 0, 0, 3); // Испортившийся эликсир	
      } elseif ($rnd<=45) {
        $report=itemtofloor(2459, 0, 0, 1); // Бутылка
      } elseif ($rnd<=60) {
        $smallItem = mqfa1("SELECT id FROM smallitems WHERE type = 189 ORDER BY RAND() ") or die(mysql_error()); 
        $report=itemtofloor($smallItem, 0, 0, 1, 'smallitems', 1);
      } elseif ($rnd<=75) {
        $report = '<div style="font-weight:normal">Пусто.</div>';
      } else {
        $mhp=500+mt_rand(0, 500);
        $report="Вы попали в ловушку -$mhp HP.";
        takehp($user["id"], $mhp);
      }
      takeusage($tx, $ty);
    } else {
      $report="<div style=\"font-weight:normal\">Пусто.</div>";
    }
  }
  
  // Сундук 20x12
  if ($tx*2==20 && $ty*2==12) {
    $isKey = mysql_result(mysql_query("SELECT COUNT(*) FROM inventory WHERE name = 'Пирамидальный Ключ' AND owner = " . $user['id']), 0, 0);
    if (!$isKey) {
      $isItem = mysql_result(mysql_query("SELECT COUNT(*) FROM inventory WHERE name = 'Обломок Пирамидального Ключа' AND owner = " . $user['id']), 0, 0);
      if (!$isItem) {
        $report=pickupitem(2530, 0, 0, 0, 1, 2);
      } else {
        $report="<div style=\"font-weight:normal\">У вас уже есть <b>Обломок Пирамидального Ключа</b></div>";
      }
    } else {
      $report="<div style=\"font-weight:normal\">У вас уже есть <b>Пирамидальный Ключ</b></div>";
    }
  }

/*************************************** алтарь *********************************************/
  
  // алтарь 8x10, 6x12, 10x2, 10x20, 16x12, 20x14
  if (($tx*2==8 && $ty*2==10) || ($tx*2==6 && $ty*2==12) || ($tx*2==10 && $ty*2==2) || ($tx*2==10 && $ty*2==20) || ($tx*2==16 && $ty*2==12) || ($tx*2==20 && $ty*2==14)) {  
    if (usagesleft($tx, $ty)) {
      takeusage($tx, $ty);
      $rnd=mt_rand(1,100);
      if ($rnd<=80) {
        setCaveEffect(9992, 9993);
      } else {
        /** 
         * 2334 Кольцо Отражения, 967 Кольцо Жадного Калеки, 2330 Синее Кольцо Мастерства
         * 2328	Песочный Перстень, 2397	Перчатки дровосека, 1423 Перчатки Рыцаря 
        **/
        $items = array(2334, 967, 2330, 2328, 2397, 1423);
        $i = mt_rand(0, 5);
        $report=itemtofloor($items[$i], 0, 0, 1);
      }
    } else {
      $report="<div style=\"font-weight:normal\">Пусто.</div>";
    }
    
  }
  
  // Алтарь Жертвенного Очищения 18x20
  if ($tx*2==18 && $ty*2==20) {
    $mhp = $user['maxhp'] / 2;
    if ($mhp > 1000) {
      $mhp = 1000;
    }
    $mhp = round($mhp);
    $report = "Вы попали в ловушку -$mhp HP";
    takehp($user["id"], $mhp);
    $curse = mqfaa("SELECT * FROM effects WHERE type = 9992 AND owner = " . $user['id'] . " ORDER BY id DESC");
    if ($curse) {
      $report .= " и избавились от всех проклятий Глубин.";
      foreach ($curse as $c) {
        mysql_query('DELETE FROM effects WHERE id = ' . $c['id']);
        mysql_query("
            UPDATE users 
            SET 
              sila  = (".((-1)*$c['sila'])." + sila), 
              lovk  = (".((-1)*$c['lovk'])." + lovk), 
              inta  = (".((-1)*$c['inta'])." + inta), 
              vinos = (".((-1)*$c['vinos'])." + vinos),
              maxhp = (".((-1)*$c['ghp'])." + maxhp)
            WHERE id = $user[id]
        ");
      }
      header("Location: " . $_SERVER['PHP_SELF'] . ($report ? '?msg=' . $report : '' ));
      exit;
    }
  }

/*************************************** статуи *********************************************/
  
  // Статуя 42x18, 30x4, 6x10, 8x12
  if (($tx*2==42 && $ty*2==18) || ($tx*2==30 && $ty*2==4) || ($tx*2==6 && $ty*2==10) || ($tx*2==8 && $ty*2==12)) {
    $report="<div style=\"font-weight:normal\">Неразборчивая надпись ярко выраженного нецензурного содержания, намекающая на нежелательность встречи и какого-либо вида общения.</div>";
  }
  
/*************************************** фонтан *********************************************/
  
  // Фонтан призрачной силы 42x20
  if ($tx*2==42 && $ty*2==20) {
    $report="<div style=\"font-weight:normal\">Пока не работает.</div>";
  }
  
  // Фонтан призрачного ума 2x20
  if ($tx*2==2 && $ty*2==20) {
    if (usagesleft($tx, $ty)) {
      if (mqfa1("select id from inventory where owner='$user[id]' and prototype='2459'")) {
        // 2364	Снадобье Разума, 2363 Снадобье Предчувствия
        $report=pickupitem(mt_rand(2363, 2364), 1, 0, 0, 3);
        takeusage($tx, $ty);
        useitem(2459);
        if (!@$report) {
          $report="<div style=\"font-weight:normal\">Вы набрали из фонтана эликсир.</div>";
        }
      } else {
        $report="Для того, чтобы набрать эликсир, вам необходима пустая бутылка.";
      }
    } else {
      $report="Пусто.";
    }
  }
  
/*************************************** камни *********************************************/
  
  // Камень портала Чернокнижника 42x4
  if ($tx*2==42 && $ty*2==4) {
    $isStone = mysql_result(mysql_query("SELECT COUNT(*) FROM inventory WHERE name = 'Камень Портала Чернокнижника' AND owner = " . $user['id']), 0, 0);
    if (!$isStone) {
      $report=pickupitem(2528, 0, 0, 0, 1, 2);
    } else {
      $report="<div style=\"font-weight:normal\">У вас уже есть <b>Камень портала Чернокнижника.</b></div>";
    }
  }
  
  // Камень портала Епископа 20x4
  if ($tx*2==20 && $ty*2==4) {
    $isStone = mysql_result(mysql_query("SELECT COUNT(*) FROM inventory WHERE name = 'Камень Портала Епископа' AND owner = " . $user['id']), 0, 0);
    if (!$isStone) {
      $report=pickupitem(2526, 0, 0, 0, 1, 2);
    } else {
      $report="<div style=\"font-weight:normal\">У вас уже есть <b>Камень портала Епископа.</b></div>";
    }
  }
  
/*************************************** разное *********************************************/

  // купель 14x20
  if ($tx*2==14 && $ty*2==20) {
    if (usagesleft($tx, $ty)) {
      $report=itemtofloor(2503, 0, 0, 3); // Антидот
      takeusage($tx, $ty);
    } else {
      $report="<div style=\"font-weight:normal\">Пусто.</div>";
    }
  }

?>
