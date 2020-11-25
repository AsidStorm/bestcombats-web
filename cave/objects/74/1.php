<?php

/*************************************** водостоки *********************************************/
  
  // водосток 2x44
  if ($tx*2==2 && $ty*2==44) {
    if (usagesleft($tx, $ty)) {
      $report=pickupitem(2357, 1, 0, 0, 1);
      takeusage($tx, $ty);
      if (!@$report) {
        $report="<div style=\"font-weight:normal\"></div>";
      }
    } else {
      $report="<div style=\"font-weight:normal\">Попахивает...</div>";
    }
  }
  
  // водосток 8x38 18x44 10x30
  if (($tx*2==8 && $ty*2==38) || ($tx*2==18 && $ty*2==44) || ($tx*2==10 && $ty*2==30)) {
    $report="<div style=\"font-weight:normal\">Попахивает...</div>";
  }
  
  // водосток 12x6
  if ($tx*2==12 && $ty*2==6) {
    $report="<div style=\"font-weight:normal\">Попахивает...<br /><br />Наступив на водосток Вы окажетесь на втором этаже.</div>";
  }
  
/*************************************** камни *********************************************/

  // камень 2x32 6x40 12x44 14x44 20x46
  if (($tx*2==2 && $ty*2==32) || ($tx*2==6 && $ty*2==40) || ($tx*2==12 && $ty*2==44) || ($tx*2==14 && $ty*2==44) || ($tx*2==20 && $ty*2==46)) {
    if (usagesleft($tx, $ty)) {
      $rnd=mt_rand(1,100);
      if ($rnd<=25) {
        $report=itemtofloor(2459, 0, 0, 1); // Бутылка
      } elseif ($rnd<=50) {
        $report=itemtofloor(2460, 0, 0, 3); // Испортившийся эликсир
      } elseif ($rnd<=75) {
        $report=itemtofloor(mt_rand(1956,1959), 0, 0, 3); // Хлеб с мясом, Бутерброд с мясом, Окорочок, Бутерброд -Завтрак рыцаря-
      } elseif ($rnd<=88) {
        $report=itemtofloor(mt_rand(2503,2504), 0, 0, 3); // Сыворотка, Антидот
      } else {
        $report=itemtofloor(mt_rand(2361,2364), 0, 0, 3); // Снадобье Змеи, Снадобье Предчувствия, Снадобье Разума, Снадобье Великана  
      }
      takeusage($tx, $ty);
    } else {
      $report="<div style=\"font-weight:normal\">Пусто.</div>";
    }
  }

/*************************************** порталы *********************************************/

  // портал 6x30
  if ($tx*2==6 && $ty*2==30) {
    $report = '<div style="font-weight:normal">Имея при себе <b>Камень Портала Чернокнижника</b>, можно попасть сразу на 3-тий этаж.</div>';
  }
  
  // портал 8x32
  if ($tx*2==8 && $ty*2==32) {
    $report = '<div style="font-weight:normal">Имея при себе <b>Камень Портала Епископа</b>, можно попасть сразу на 3-тий этаж.</div>';
  }
  
  // портал 4x32
  if ($tx*2==4 && $ty*2==32) {
    $report = '<div style="font-weight:normal">Имея при себе <b>Камень Портала Шута</b>, можно попасть сразу на 4-тий этаж.</div>';
  }
  
  // портал 10x12
  if ($tx*2==10 && $ty*2==12) {
    if (mqfa1("SELECT COUNT(*) FROM inventory WHERE name LIKE '%Мерцающий ключ Nr.1%' AND owner = " . $user['id'])) {
      $report="<div style=\"font-weight:normal\">Вы благополучно телепортированны.</div>";
      //$iskey = mqfa1("SELECT COUNT(*) FROM inventory WHERE name LIKE '%Мерцающий ключ Nr.3%' AND owner = " . $user['id']);
      //if (!$iskey) {
      //  $map[14][12] = 'o/52/520';
      //  updmap();
      //}
      gotoxy(12, 12, 1, "Вы благополучно телепортированны.");
    } else {
      $report = '<div style="font-weight:normal">Для работы необходим <b>Мерцающий ключ Nr.1</b>.<br>Поищите его в сундуке, рядом с офицером глубин.</div>';
    }
  }

/*************************************** сундуки *********************************************/

  // сундук 10x26
  if ($tx*2==10 && $ty*2==26) {
    if (usagesleft($tx, $ty)) {
      if (usagesleft($tx, $ty)==2) {
        $mhp=500+mt_rand(0, 500);
        $report="Вы попали в ловушку -$mhp HP.";
        takehp($user["id"], $mhp);
        takeusage($tx, $ty);
      } else {
        $rnd=mt_rand(1,100);
        if ($rnd<=25) {
          $report=itemtofloor(1987, 0, 0, 3); // Эликсир Ветра
        } elseif ($rnd<=50) {
          $report=itemtofloor(1988, 0, 0, 3); // Эликсир Песков	
        } elseif ($rnd<=75) {
          $report=itemtofloor(1989, 0, 0, 3); // Эликсир Пламени	
        } elseif ($rnd<=100) {
          $report=itemtofloor(1990, 0, 0, 3); // Эликсир Морей	
        }
        takeusage($tx, $ty);
        if (!@$report) {
          $report="<div style=\"font-weight:normal\"></div>";
        }
      }
    } else {
      $report="<div style=\"font-weight:normal\">Пусто.</div>";
    }
  }
  
  // сундук 4x26
  if ($tx*2==4 && $ty*2==26) {
    if (usagesleft($tx, $ty)==2) {
      $mhp=500+mt_rand(0, 500);
      $report="Вы попали в ловушку -$mhp HP.";
      takehp($user["id"], $mhp);
      takeusage($tx, $ty);
    } else {
      if (mqfa1("SELECT COUNT(*) FROM inventory WHERE name LIKE '%Мерцающий ключ Nr.1%' AND owner = " . $user['id'])) {
        $report="<div style=\"font-weight:normal\">Вы уже получили <b>Мерцающий ключ Nr.1</b>.<br>Поспешите воспользоваться им.</div>";
      } else {
        $report=itemtofloor(2500, 1, 0, 1); // мерцающий ключ 1
      }
    }
  }
    
  // сундук 4x(10,14,18,22)
  if ($tx*2==4 && ($ty*2==10 || $ty*2==14 || $ty*2==18 || $ty*2==22)) {
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
      if (!@$report) {
        $report="<div style=\"font-weight:normal\"></div>";
      }
    } else {
      $report="<div style=\"font-weight:normal\">Пусто.</div>";
    }
  }
    
  // сундук 20x18
  if ($tx*2==20 && $ty*2==18) {
    if (usagesleft($tx, $ty)) {
      if (usagesleft($tx, $ty)==2) {
        $mhp=500+mt_rand(0, 500);
        $report="Вы попали в ловушку -$mhp HP.";
        takehp($user["id"], $mhp);
        takeusage($tx, $ty);
      } else {
        $rnd=mt_rand(1,100);
        if ($rnd<=25) {
          $report=itemtofloor(2459, 0, 0, 1); // Бутылка
        } elseif($rnd<=50) {
          $report = '<div style="font-weight:normal">Пусто.</div>';
        } elseif ($rnd<=75) {
          $rf = mt_rand(1956, 1959);
          $report=itemtofloor($rf, 0, 0, 1); // Хлеб с мясом
        } else {
          $smallItem = mqfa1("SELECT id FROM smallitems WHERE type = 189 ORDER BY RAND() ") or die(mysql_error()); 
          $report=itemtofloor($smallItem, 0, 0, 1, 'smallitems', 1);
        }
        takeusage($tx, $ty);
        if (!@$report) {
          $report="<div style=\"font-weight:normal\"></div>";
        }
      }
    } else {
      $report="<div style=\"font-weight:normal\">Пусто.</div>";
    }
  }

  // сундук 20x26
  if ($tx*2==20 && $ty*2==26) {
    if (usagesleft($tx, $ty)) {
      if (usagesleft($tx, $ty)==2) {
        $mhp=300+mt_rand(0, 700);
        $report="Вы попали в ловушку -$mhp HP.";
        takehp($user["id"], $mhp);
        takeusage($tx, $ty);
      } else {
        $rnd=mt_rand(1,100);
        if ($rnd<=33) {
          $report=itemtofloor(100, 0, 0, 1); // свиток восстановления энергии +60
        } elseif ($rnd<=50) {
          $report=itemtofloor(5, 0, 0, 1); // чек на предъявителя
        } else {
          $smallItem = mqfa1("SELECT id FROM smallitems WHERE type = 189 ORDER BY RAND() ") or die(mysql_error()); 
          $report=itemtofloor($smallItem, 0, 0, 1, 'smallitems', 1);
        }
        takeusage($tx, $ty);
        if (!@$report) {
          $report="<div style=\"font-weight:normal\"></div>";
        }
      }
    } else {
      $report="<div style=\"font-weight:normal\">Пусто.</div>";
    }
  }
  
  // сундук 16x14
  if ($tx*2==16 && $ty*2==14) {
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
  
  // сундук 20x12
  if ($tx*2==20 && $ty*2==12) {
    if (usagesleft($tx, $ty)) {
      $rnd=mt_rand(1,100);
      if ($rnd<=33) {
        $i = mt_rand(0, 4); // 1431, 236, 1185, 1647, 1237
        $dItem = array(1431, 236, 1185, 1647, 1237);
        $report=itemtofloor($dItem[$i], 0, 0, 1);
      } elseif ($rnd<=50) {
        $report=itemtofloor(5, 0, 0, 1); // чек на предъявителя
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
  
  // сундук 28x24
  if ($tx*2==28 && $ty*2==24) {
    if (usagesleft($tx, $ty)) {
      $rnd=mt_rand(1,100);
      if ($rnd<=80) {
        $report="<div style=\"font-weight:normal\">Пусто.</div>";
      } else {
        // 1539 , 1541 , 1540, 1538
        $rf = mt_rand(1538, 1541);
        $report=itemtofloor($rf, 0, 0, 1); 
      }
      takeusage($tx, $ty);
      if (!@$report) {
        $report="<div style=\"font-weight:normal\"></div>";
      }
    } else {
      $report="<div style=\"font-weight:normal\">Пусто.</div>";
    }
  }
  
/*************************************** кровати *********************************************/  

  // кровать 2x(10,12,18,22, 26)
  if ($tx*2==2 && ($ty*2==10 || $ty*2==14 || $ty*2==18 || $ty*2==22 || $ty*2==26)) {
    if (usagesleft($tx, $ty)) {
      $rnd=mt_rand(1,100);
      if ($rnd<=25) {
        $report=itemtofloor(2459, 0, 0, 1); // Бутылка
      } elseif ($rnd<=50) {
        $report=itemtofloor(2460, 0, 0, 3); // Испортившийся эликсир
      } elseif ($rnd<=75) {
        $report="<div style=\"font-weight:normal\">Пусто.</div>";
      } elseif ($rnd<=88) {
        $report=itemtofloor(mt_rand(2503,2504), 0, 0, 3); // Сыворотка, Антидот
      } else {
        $report=itemtofloor(mt_rand(2361,2364), 0, 0, 3); // Снадобье Змеи, Снадобье Предчувствия, Снадобье Разума, Снадобье Великана  
      }
      takeusage($tx, $ty);
      if (!@$report) {
        $report="<div style=\"font-weight:normal\"></div>";
      }
    } else {
      $report="<div style=\"font-weight:normal\">Пусто.</div>";
    }
  }

/*************************************** двери *********************************************/

  // дверь 12x16
  if ($tx*2==12 && $ty*2==16) {
    if (mqfa1("SELECT COUNT(*) FROM inventory WHERE name LIKE '%Мерцающий ключ Nr.3%' AND owner = " . $user['id'])) {
      //$report = '<div style="font-weight:normal">Вы успешно прошли через дверь</div>';
      $usY = mqfa1("SELECT y FROM caveparties WHERE user='$user[id]'");
      if ($usY < $ty) {
        gotoxy(12, 18, 1, "Вы успешно прошли через дверь");
      } else {
        gotoxy(12, 14, 1, "Вы успешно прошли через дверь");
      }
    } else {
      $report = '<div style="font-weight:normal">Для прохода необходим <b>Мерцающий ключ Nr.3</b></div>';
    }
  }
  
  // дверь 14x12
  if ($tx*2==14 && $ty*2==12) {
    $report = '<div style="font-weight:normal">Закрыто</div>';
  }

/*************************************** разное *********************************************/

  // замаскированный обменник 16x46
  if ($tx*2==16 && $ty*2==18) {
    if (!@$report) $report="<div style=\"font-weight:normal\">Пока не обменивает.</div>";
  }
  
  // замаскированный обменник 13x13
  if ($tx*2==26 && $ty*2==26) {
    if (!@$report) $report="<div style=\"font-weight:normal\">Пока не обменивает.</div>";
  }
  
  // замаскированный обменник 28x30
  if ($tx*2==28 && $ty*2==30) {
    if (!@$report) $report="<div style=\"font-weight:normal\">Пока не обменивает.</div>";
  }
  
/*************************************** куча мусора *********************************************/

  // 3 куча мусора
  if (($tx*2==30 && $ty*2==38) || ($tx*2==32 && $ty*2==42) || ($tx*2==34 && $ty*2==36)) {    
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
  
/*************************************** скелеты *********************************************/

  // скелет 14x36, 32x30
  if (($tx*2==14 && $ty*2==36) || ($tx*2==32 && $ty*2==30)) {
    if (usagesleft($tx, $ty)) {
      if (usagesleft($tx, $ty)==2) {
        $mhp=1+mt_rand(0, 1000);
        $report="<div style=\"font-weight:normal\">Вы попали в ловушку <b>-$mhp HP</b>.</div>";
        takehp($user["id"], $mhp);
        takeusage($tx, $ty);
      } else {
        $report=itemtofloor(mt_rand(2365,2448), 1, 0, 1);
        takeusage($tx, $ty);
        if (!@$report) $report="<div style=\"font-weight:normal\"></div>";
      }
    } else {
      $report="<div style=\"font-weight:normal\">Пусто.</div>";
    }
  } 

/*************************************** трещина *********************************************/

  // трещина 16x46
  if ($tx*2==16 && $ty*2==46) {
    if (!@$report) $report="<div style=\"font-weight:normal\">Подозрительная трещина.<br><br>Как только Вы шагнёте на эту клетку - Вы спуститесь в недра Провала.</div>";
  }
  
  // трещина 36x30
  if ($tx*2==36 && $ty*2==30) {
    if (!@$report) $report="<div style=\"font-weight:normal\">Подозрительная трещина.<br><br>Как только Вы шагнёте на эту клетку - Вы провалитесь на второй этаж.</div>";
  }

/*************************************** разное *********************************************/
  
  // Статуя Трупожора 16x38
  if ($tx*2==16 && $ty*2==38) {
    if (!@$report) $report="<div style=\"font-weight:normal\">Неразборчивая надпись ярко выраженного нецензурного содержания, намекающая на нежелательность встречи и какого-либо вида общения.</div>";
  }
  
  // куча всяческого металлолома 10x24
  if ($tx*2==10 && $ty*2==24) {
    if (!@$report) $report="<div style=\"font-weight:normal\">Большая, ничем непримечательная куча всяческого металлолома, хотя в ней угадываются некоторые фрагменты ваших предшественников, недвусмысленно намекающие на возможный итог.</div>";
  }
  
  // фонтан
  if ($tx*2==18 && $ty*2==20) {
    if (usagesleft($tx, $ty)) {
      if (mqfa1("select id from inventory where owner='$user[id]' and prototype='2459'")) {
        $report=pickupitem(2461, 0, 0, 0, 3);
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
  
  // мерцающий ключ Nr. 3
  if ($tx*2==12 && $ty*2==14) {
    $iskey = mqfa1("SELECT COUNT(*) FROM inventory WHERE name LIKE '%Мерцающий ключ Nr.3%' AND owner = " . $user['id']);
    if (!$iskey) {
        $report=pickupitem(2502, 1, 0, 0, 1);
    } else {
        $report = "У Вас уже есть <b>Мерцающий ключ Nr.3</b>";
    }
    //$map[14][12] = 's/52';
    //updmap();
  }
  
  // лестница, выход из убежища 26x22
  if ($tx*2==26 && $ty*2==22) {
    //$report="<div style=\"font-weight:normal\">Вы благополучно выбрались из Убежища.</div>";
    gotoxy(8, 38, 1, "Вы благополучно выбрались из Убежища.");
  }
  
?>
