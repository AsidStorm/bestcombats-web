<?

  if ($tx*2==6 && $ty*2==12) {
    
    $report="<div style=\"font-weight:normal\"></div>";
    $report=pickupitem(2346, 1, 1);
    
  }
  if ($tx*2==10 && $ty*2==4) {
    if (mqfa1("select id from inventory where owner='$user[id]' and prototype='2346'")) {
    $report="<div style=\"font-weight:normal\"></div>";
    if ($x*2==12 && $y*2==4) gotoxy(8, 4, 0);
    else gotoxy(12, 4, 0);
          
    } else $report="У вас нет необходимого ключа.";

  }
  if ($tx*2==14 && $ty*2==4) {
    if (!mqfa1("select id from cavebots where leader='$user[caveleader]' and floor='$floor' and ( (startx='14' and starty='2')  or  (startx='12' and starty='6')  or  (startx='16' and starty='6') )")) {
    $report="<div style=\"font-weight:normal\"></div>";
    include_once "cavefunctions.php";
    $report=temper();
    } else $report="Не стоит нырять в прорубь, когда рядом враги.";

  }
  if ($tx*2==16 && $ty*2==8) {
    
    $report="<div style=\"font-weight:normal\">Вы спустились на второй этаж.</div>";
    gotoxy(8, 2, 2);
    
  }
?>