<?php

/*************************************** водостоки *********************************************/

  // водосток 2x4, 18x12, 12x16, 20x22, 18x24
  if (($tx*2==2 && $ty*2==4) || ($tx*2==18 && $ty*2==12) || ($tx*2==12 && $ty*2==16) || ($tx*2==20 && $ty*2==22) || ($tx*2==18 && $ty*2==24)) {
    $report="<div style=\"font-weight:normal\">Попахивает...</div>";
  }
  
/*************************************** завалы *********************************************/

  // завалы  20x8, 4x10, 4x18, 16x18
  if (($tx*2==20 && $ty*2==8) || ($tx*2==4 && $ty*2==10) || ($tx*2==4 && $ty*2==8) || ($tx*2==16 && $ty*2==18)) {
    $report="<div style=\"font-weight:normal\">Похоже кто-то взорвал проход. Тут не пройти...</div>";
  }
  
/*************************************** сундук *********************************************/

  // сундук  12x2, 4x12, 4x16, 14x30
  if (($tx*2==12 && $ty*2==2) || ($tx*2==4 && $ty*2==12) || ($tx*2==4 && $ty*2==16) || ($tx*2==14 && $ty*2==30)) {
    if (usagesleft($tx, $ty)) {
      takeusage($tx, $ty);
      $report=itemtofloor(mt_rand(42,46), 0, 0, 1, 'smallitems', 1);
    } else {
      $report="<div style=\"font-weight:normal\">Пусто.</div>";
    }
  }
  
  // сундук  18x40
  if ($tx*2==18 && $ty*2==40) {
    if (usagesleft($tx, $ty)) {
      $rnd=mt_rand(1,100);
      if ($rnd<=33) {
        $report=itemtofloor(1962, 0, 0, 1); // Жажда Жизни +3
      } elseif ($rnd<=66) {
        $report=itemtofloor(1967, 0, 0, 1); // Иссушение -3
      } else {
        $mhp=100+mt_rand(0, 900);
        $report="Вы попали в ловушку -$mhp HP.";
        takehp($user["id"], $mhp);
      }
      takeusage($tx, $ty);
    } else {
      $report="<div style=\"font-weight:normal\">Пусто.</div>";
    }
  }
  
/*************************************** куча мусора *********************************************/
  
  // куча мусора 20x2, 10x4, 12x6, 16x6, 2x8, 16x14, 2x28, 16x28, 6x36, 14x40 
  if (($tx*2==20 && $ty*2==2) || ($tx*2==10 && $ty*2==4) || ($tx*2==12 && $ty*2==6) ||
      ($tx*2==16 && $ty*2==6) || ($tx*2==2 && $ty*2==8) || 
      ($tx*2==16 && $ty*2==14) || ($tx*2==2 && $ty*2==28) || ($tx*2==16 && $ty*2==28) || 
      ($tx*2==6 && $ty*2==36) || ($tx*2==14 && $ty*2==40)) {    
    if (usagesleft($tx, $ty)) {
      takeusage($tx, $ty);
      $rnd=mt_rand(1,100);
      if ($rnd<=10) {
        $report=itemtofloor(2459, 0, 0, 1); // Бутылка  
      } elseif ($rnd<=20) {
        $smallItem = mqfa1("SELECT id FROM smallitems WHERE type = 189 AND (id = 15 OR id = 16 OR id = 17 OR id = 19 OR id = 20 OR id = 21) ORDER BY RAND() ") or die(db_error());
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

/*************************************** разное *********************************************/

  // телепорт 2x14
  if ($tx*2==2 && $ty*2==14) {
    $report="<div style=\"font-weight:normal\">Телепорт.<br><br>Вы окажетесь на 4-ом этаже</div>";
  }
  
  // Камень портала Шута 4x14
  if ($tx*2==4 && $ty*2==14) {
    $isStone = db_result(db_query("SELECT COUNT(*) FROM inventory WHERE name = 'Камень Портала Шута' AND owner = " . $user['id']), 0, 0);
    if (!$isStone) {
      $report=pickupitem(2529, 0, 0, 0, 1, 2);
    } else {
      $report="<div style=\"font-weight:normal\">У вас уже есть <b>Камень портала Шута.</b></div>";
    }
  }

  // Фонтан Былых Побед 6x2
  if ($tx*2==6 && $ty*2==2) {
    if (usagesleft($tx, $ty)) {
      $isBottle = mqfa1("select id from inventory where owner='$user[id]' and prototype='2459'");
      $isStone  = mqfa("select id, name from inventory where owner = $user[id] AND (name = 'Рубин' OR name= 'Опал' OR name= 'Малахит' OR name= 'Янтарь' OR name= 'Гранат' OR name= 'Сапфир') AND koll > 0");
      if ($isBottle && $isStone['id']) {
        // Снадобье Змеи, Снадобье Предчувствия, Снадобье Разума, Снадобье Великана  
        $report = pickupitem(mt_rand(2361,2364), 1, 0, 0, 3) . "<br />Это стоило Вам <b>" . $isStone['name'] . '</b>';
        takeusage($tx, $ty);
        useitem(2459);
        db_query("UPDATE inventory SET koll = (koll - 1) WHERE owner = $user[id] AND id = $isStone[id]");
      } else {
        $report="Для того, чтобы набрать эликсир, вам необходимы пустая бутылка и драгоценный камень.";
      }
    } else {
      $report="Пусто.";
    }
  }

  // Купель 16x30
  if ($tx*2==16 && $ty*2==30) {
    if (usagesleft($tx, $ty)) {
      $report=itemtofloor(2504, 0, 0, 3); // сыворотка
      takeusage($tx, $ty);
    } else {
      $report="<div style=\"font-weight:normal\">Пусто.</div>";
    }
  }
  
  // трещина 18x30
  if ($tx*2==18 && $ty*2==30) {
    $report="<div style=\"font-weight:normal\">Ничего не видно</div>";
  }
  
  // скелет 8x18
  if ($tx*2==8 && $ty*2==18) {
    if (usagesleft($tx, $ty)) {
      if (usagesleft($tx, $ty)==2) {
        $mhp=100+mt_rand(0, 900);
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
  
  // Алтарь Жертвенного Очищения 4x42, 12x12
  if (($tx*2==4 && $ty*2==42) || ($tx*2==12 && $ty*2==12)) {
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
        db_query('DELETE FROM effects WHERE id = ' . $c['id']);
        db_query("
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

?>
