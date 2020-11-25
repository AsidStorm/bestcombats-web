<?
//водостоки пустые
  if (($tx*2==30 && $ty*2==44) || ($tx*2==14 && $ty*2==30)) {
    $report="<div style=\"font-weight:normal\">Попахивает...</div>";
  }
//Слив возле мартына
if ($tx*2==22 && $ty*2==38) {  
    gotoxy(30, 44, 1, "Вы благополучно телепортированны.");
}
//Магазин луки 
if ($tx*2==38 && $ty*2==44) {
mq("LOCK TABLES `online` write, `users` write;");
mq("UPDATE `users`,`online` SET `users`.`room` = '404',`online`.`room` = '404' WHERE `online`.`id` = `users`.`id` AND `online`.`id` = '{$user[id]}' ;");  
print "<script>location.href='shop_luka.php'</script>";
}
//Пустые обекты
if ((($tx*2==34 && $ty*2==48) || ($tx*2==30 && $ty*2==46) || ($tx*2==00 && $ty*2==00) || ($tx*2==00 && $ty*2==00)) && (int)$floor == 1) {  
    $report="<div style=\"font-weight:normal\">Ничего не произошло</div>";
  }
//Потерянные сундуки
  if (($tx*2==24 && $ty*2==40) || ($tx*2==38 && $ty*2==32) || ($tx*2==28 && $ty*2==30) || ($tx*2==22 && $ty*2==34) || ($tx*2==18 && $ty*2==36) || ($tx*2==14 && $ty*2==32) || ($tx*2==12 && $ty*2==30) || ($tx*2==32 && $ty*2==18) || ($tx*2==20 && $ty*2==24) || ($tx*2==34 && $ty*2==26)) {
    if (usagesleft($tx, $ty)) {
        $report=itemtofloor(11452, 0, 0, 1); // Гайка
      takeusage($tx, $ty);
      if (!@$report) {
        $report="<div style=\"font-weight:normal\"></div>";
      }
    } else {
      $report="<div style=\"font-weight:normal\">Кто то оказался быстрее...</div>";
    }
  }
//Забытая экипировка
  if ($tx*2==30 && $ty*2==40) {
    if (usagesleft($tx, $ty)) {
      $rnd=mt_rand(1,100);
      if ($rnd<=50) {
        $report=pickupitem(1539, 1, 0, 0, 1);// Эликсир жизни (Морковка)
      } elseif ($rnd<=10) {
        $report=pickupitem(99, 1, 0, 0, 1); // Восстановление Энергии(45 ХП)
      } elseif ($rnd<=15) {
        $report=pickupitem(125, 1, 0, 0, 1); // Свиток лечения тяж
      } elseif ($rnd<=20) {
        $report=pickupitem(124, 1, 0, 0, 1); // Свиток лечения средние
      } else {
        $report=pickupitem(123, 1, 0, 0, 1); // Свиток лечения легкие
      }
      takeusage($tx, $ty);
    } else {
      $report="<div style=\"font-weight:normal\">Пусто.</div>";
    }
  }
//Водосток Возле рвуна
  if ($tx*2==26 && $ty*2==24) {
    if (usagesleft($tx, $ty)) {
        $report=itemtofloor(11452, 0, 0, 1); // Гайка
      takeusage($tx, $ty);
      if (!@$report) {
        $report="<div style=\"font-weight:normal\"></div>";
      }
    } else {
      $report="<div style=\"font-weight:normal\">Кто то оказался быстрее...</div>";
    }
  }
?>