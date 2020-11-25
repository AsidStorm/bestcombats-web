<?
//Месторождение мусора
  if (($tx*2==4 && $ty*2==44) || ($tx*2==10 && $ty*2==36) || ($tx*2==6 && $ty*2==22) || ($tx*2==18 && $ty*2==22) || ($tx*2==32 && $ty*2==24)) {
    if (usagesleft($tx, $ty)) {
        $report=itemtofloor(11467, 0, 0, 1); // Чистая гайка
      takeusage($tx, $ty);
      if (!@$report) {
        $report="<div style=\"font-weight:normal\"></div>";
      }
    } else {
      $report="<div style=\"font-weight:normal\">Кто то оказался быстрее...</div>";
    }
  }
?>