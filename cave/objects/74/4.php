<?php
  
/*************************************** алтарь *********************************************/
  
  // алтарь 14x14
  if ($tx*2==14 && $ty*2==14) {  
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
  
  // алтарь 20x2
  if ($tx*2==20 && $ty*2==2) {  
    $isKey = mysql_result(mysql_query("SELECT COUNT(*) FROM inventory WHERE name = 'Пирамидальный Ключ' AND owner = " . $user['id']), 0, 0);
    if (!$isKey) {
        $item1 = mysql_result(mysql_query("SELECT id FROM inventory WHERE name = 'Осколок Пирамидального Ключа' AND owner = " . $user['id'] . " LIMIT 1"), 0, 0);
        $item2 = mysql_result(mysql_query("SELECT id FROM inventory WHERE name = 'Обломок Пирамидального Ключа' AND owner = " . $user['id'] . " LIMIT 1"), 0, 0);
        if ($item1 && $item2) {
            $report = pickupitem(2532, 0, 0, 0, 1, 2);
            mysql_query("DELETE FROM inventory WHERE owner = $user[id] AND (name = 'Осколок Пирамидального Ключа' OR name = 'Обломок Пирамидального Ключа')");
        } else {
            $report = 'Здесь можно собрать <b>Пирамидальный Ключ</b>.<br /> Для сборки ключа необходимо иметь Осколок и Обломок Пирамидального Ключа';
        }
    } else {
      $report="<div style=\"font-weight:normal\">У вас уже есть <b>Пирамидальный Ключ</b></div>";
    }
  }
  
  
/*************************************** сундук *********************************************/

  // сундук 16x2
  if ($tx*2==16 && $ty*2==2) {  
    $aBots=mqfaa("
        SELECT bot, cnt, battle 
        FROM cavebots 
        WHERE 
            leader='$user[caveleader]'
            AND (
                (x = 4 AND y = 16) OR 
                (x = 4 AND y = 20) OR 
                (x = 6 AND y = 16) OR 
                (x = 6 AND y = 18) OR 
                (x = 6 AND y = 10) OR
                (x = 8 AND y = 16) OR 
                (x = 8 AND y = 20) OR 
                (x = 10 AND y = 18)
            ) 
            AND floor='4'
    ");
    if ($aBots) {
        $report = 'Все не так просто, cначала надо зачистить <b>Пыточную</b>';
    } else {
        $isKey = mysql_result(mysql_query("SELECT COUNT(*) FROM inventory WHERE name = 'Мерцающий ключ Nr.4' AND owner = " . $user['id']), 0, 0);
        if (!$isKey) {
            $report=pickupitem(2533, 1, 0, 0, 3);
        } else {
            $report = 'У Вас уже есть <b>Мерцающий ключ Nr.4</b>';    
        }
    }
  }
  
    // сундук 8x6
    if ($tx*2==8 && $ty*2==6) { 
        if (usagesleft($tx, $ty)) {
            takeusage($tx, $ty);
            $charms0 = array(2534, 2538, 2542, 2546, 2550);
            $rnd = mt_rand(0, count($charms0) - 1);
            $report=itemtofloor($charms0[$rnd], 0, 0, 1);
        } else {
            $report="<div style=\"font-weight:normal\">Пусто.</div>";
        }
    }
  
    // сундук 4x6
    if ($tx*2==4 && $ty*2==6) {  
        $report="<div style=\"font-weight:normal\">Пока не работает</div>";
    }

/*************************************** разное *********************************************/

    // дверь 10x2
    if ($tx*2==10 && $ty*2==2) {
        $isKey = mysql_result(mysql_query("SELECT COUNT(*) FROM inventory WHERE name = 'Мерцающий ключ Nr.4' AND owner = " . $user['id']), 0, 0);
        if (!$isKey) {
            $report = '<div style="font-weight:normal">Для прохода необходим <b>Мерцающий ключ Nr.4</b></div>';
        } else {
            $usX = mqfa1("SELECT x FROM caveparties WHERE user='$user[id]'");
            if ($usX == 6) {
                gotoxy(8, 2, 4, 'Вы успешно прошли через дверь');
            } else {
                gotoxy(12, 2, 4, 'Вы успешно прошли через дверь');
            }
        }
    }
  
    // лаборатория 4x18
    if ($tx*2==4 && $ty*2==18) {
        $aBots=mqfaa("
            SELECT bot, cnt, battle 
            FROM cavebots 
            WHERE 
                leader='$user[caveleader]'
                AND (
                    (x = 4 AND y = 16) OR 
                    (x = 4 AND y = 20) OR 
                    (x = 6 AND y = 16) OR 
                    (x = 6 AND y = 18) OR 
                    (x = 6 AND y = 10) OR
                    (x = 8 AND y = 16) OR 
                    (x = 8 AND y = 20) OR 
                    (x = 10 AND y = 18)
                ) 
                AND floor='4'
        ");
        if ($aBots) {
            $report = 'Все не так просто, cначала надо зачистить <b>Пыточную</b>';
        } else {
            //$report = pickupitem(2532, 0, 0, 0, 1, 2);
            $charms = array(
                '2535' => array( 'Зачаровать Оружие [0]'    => 3, 'Пирамидальный Ключ'=>1 ), // Зачаровать Оружие    [1]
                '2539' => array( 'Зачаровать Броню [0]'     => 3, 'Пирамидальный Ключ'=>1 ), // Зачаровать Броню     [1]
                '2543' => array( 'Зачаровать Украшение [0]' => 3, 'Пирамидальный Ключ'=>1 ), // Зачаровать Украшение [1]
                '2547' => array( 'Зачаровать Шлем [0]'      => 3, 'Пирамидальный Ключ'=>1 ), // Зачаровать Шлем      [1]
                '2551' => array( 'Зачаровать Перчатки [0]'  => 3, 'Пирамидальный Ключ'=>1 ), // Зачаровать Перчатки  [1]
                '2536' => array( 'Зачаровать Оружие [1]'    => 3, 'Пирамидальный Ключ'=>1 ), // Зачаровать Оружие    [2]
                '2540' => array( 'Зачаровать Броню [1]'     => 3, 'Пирамидальный Ключ'=>1 ), // Зачаровать Броню     [2]
                '2544' => array( 'Зачаровать Украшение [1]' => 3, 'Пирамидальный Ключ'=>1 ), // Зачаровать Украшение [2]
                '2548' => array( 'Зачаровать Шлем [1]'      => 3, 'Пирамидальный Ключ'=>1 ), // Зачаровать Шлем      [2]
                '2552' => array( 'Зачаровать Перчатки [1]'  => 3, 'Пирамидальный Ключ'=>1 ), // Зачаровать Перчатки  [2]
                '2537' => array( 'Зачаровать Оружие [2]'    => 3, 'Пирамидальный Ключ'=>1 ), // Зачаровать Оружие    [3]
                '2541' => array( 'Зачаровать Броню [2]'     => 3, 'Пирамидальный Ключ'=>1 ), // Зачаровать Броню     [3]
                '2545' => array( 'Зачаровать Украшение [2]' => 3, 'Пирамидальный Ключ'=>1 ), // Зачаровать Украшение [3]
                '2549' => array( 'Зачаровать Шлем [2]'      => 3, 'Пирамидальный Ключ'=>1 ), // Зачаровать Шлем      [3]
                '2553' => array( 'Зачаровать Перчатки [2]'  => 3, 'Пирамидальный Ключ'=>1 ), // Зачаровать Перчатки  [3]
            );
            foreach($charms as $chID => $needs) {
                $isInInv = true;    // наличие всех необходимых вещей в инвентаре
                $nItems    = array(); // массив для ID необх. вещей
                foreach ($needs as $need => $count) {
                    // проверка налтчия предметов и их кол-ва
                    $checkCount = mqfaa("SELECT id, name FROM inventory WHERE name = '$need' AND owner = $user[id]");
                    if (count($checkCount) >= $count) { // если есть
                        // запоминаем ID необходимого кол-ва вещей
                        for ($i = 0; $i < $count; $i++) {
                            $nItems[] = $checkCount[$i];
                        }
                    } else { // если нет
                        $isInInv = false;
                    }
                }
                if ($isInInv) {
                    $report = pickupitem($chID, 0, 0, 0, $podzem=1) . ' за';
                    foreach ($nItems as $in => $nItem) {
                        mysql_query("DELETE FROM inventory WHERE name = '$nItem[name]' AND id = $nItem[id] AND owner = $user[id]");
                        $report .= (($in > 0) ? ', ' : ' ') . $nItem['name'];
                    }
                    break;
                }
            }
            if (!$isInInv) {
                $report = 'Ничего не произошло';
            }
        }
    }
  
  // вымпел 6x2
  if ($tx*2==6 && $ty*2==2) {
    $report="<div style=\"font-weight:normal\">Красота.</div>";
  }
  
  // трон 6x8
  if ($tx*2==6 && $ty*2==8) {
    $report="<div style=\"font-weight:normal\">Не сесть...</div>";
  }

    // наковальня 2x2
    if ($tx*2==2 && $ty*2==2) {
        $report="<div style=\"font-weight:normal\">Доступно лишь для рыцарей 1-го круга</div>";
    }

?>
