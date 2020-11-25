<?php

  // водосток 12x6
  if ($tx*2==12 && $ty*2==6) {
    //$report="<div style=\"font-weight:normal\">Надышавшись миазмами Демонской канализации, Вы вывалились на второй этаж.</div>";
    gotoxy(2, 2, 2, "Надышавшись миазмами Демонской канализации, Вы вывалились на второй этаж.");
  }
  
  // скелет 14x36
  if ($tx*2==14 && $ty*2==36) {
    $mhp=1000;
    takehp($user["id"], $mhp);
    if (!@$report) $report="<div style=\"font-weight:normal\">Вы попали в ловушку и потеряли <b>-1000 HP</b>.</div>";
  }
  
  // пустая клетка
  if ($tx*2==16 && $ty*2==10) {
    $mhp=300+mt_rand(0, 700);
    takehp($user["id"], $mhp);
    if (!@$report) $report="<div style=\"font-weight:normal\">Вы попали в ловушку и потеряли <b>-$mhp HP</b>.</div>";
  }
  
  // водосток 10x30
  if ($tx*2==10 && $ty*2==30) {
    $mhp=round($user["maxhp"]*0.5);
    takehp($user["id"], $mhp);
    if (!@$report) $report="<div style=\"font-weight:normal\">Неосторожно наступив на водосток вы попали в ловушку. -$mhp HP.</div>";
  }
  
  // водосток, попадание в убежище
  if ($tx*2==8 && $ty*2==38) {
    //$report="<div style=\"font-weight:normal\">Вы провалились в убежище</div>";
    gotoxy(26, 26, 1, "Вы провалились в убежище");
  }
  
  // трещина 36x30
  if ($tx*2==36 && $ty*2==30) {
    //$report="<div style=\"font-weight:normal\">Вы провалились на второй этаж</div>";
    gotoxy(26, 20, 2, "Вы провалились на второй этаж");
  }

  // трещина 16x46
  if ($tx*2==16 && $ty*2==46) {
    //$report="<div style=\"font-weight:normal\">Вы провалились в провал</div>";
    gotoxy(26, 42, 1, "Вы провалились в провал");
  }
  
  // портал 6x30
  if ($tx*2==6 && $ty*2==30) {
    $isStone = mysql_result(mysql_query("SELECT COUNT(*) FROM inventory WHERE name = 'Камень Портала Чернокнижника' AND owner = " . $user['id']), 0, 0);
    if ($isStone) {
      mysql_query("DELETE FROM inventory WHERE name = 'Камень Портала Чернокнижника' AND owner = " . $user['id']);
      gotoxy(2, 40, 3, "Вы удачно телепортированны на 3-тий этаж, это стоило Вам Камня Портала Чернокнижника");
    } else {
      $report = '<div style="font-weight:normal">У Вас нет <b>Каменя Портала Чернокнижника</b>. Имея при себе его, можно попасть сразу на 3-тий этаж.</div>';
    }
  }
  
  // портал 8x32
  if ($tx*2==8 && $ty*2==32) {
    $isStone = mysql_result(mysql_query("SELECT COUNT(*) FROM inventory WHERE name = 'Камень Портала Епископа' AND owner = " . $user['id']), 0, 0);
    if ($isStone) {
      mysql_query("DELETE FROM inventory WHERE name = 'Камень Портала Епископа' AND owner = " . $user['id']);
      gotoxy(2, 2, 3, "Вы удачно телепортированны на 3-тий этаж, это стоило Вам Камня Портала Епископа");
    } else {
      $report = '<div style="font-weight:normal">У Вас нет <b>Каменя Портала Епископа</b>. Имея при себе его, можно попасть сразу на 3-тий этаж.</div>';
    }
  }
  
  // портал 4x32
  if ($tx*2==4 && $ty*2==32) {
    $isStone = mysql_result(mysql_query("SELECT COUNT(*) FROM inventory WHERE name = 'Камень Портала Шута' AND owner = " . $user['id']), 0, 0);
    if ($isStone) {
      mysql_query("DELETE FROM inventory WHERE name = 'Камень Портала Шута' AND owner = " . $user['id']);
      gotoxy(22, 16, 4, "Вы удачно телепортированны на 4-тый этаж, это стоило Вам Камня Портала Шута");
    } else {
      $report = '<div style="font-weight:normal">У Вас нет <b>Каменя Портала Шута</b>. Имея при себе его, можно попасть сразу на 3-тий этаж.</div>';
    }
  }

?>
