<?php
 
 // спуск на 2-ой этаж
if ($tx*2==8 && $ty*2==2) {
    //$report="<div style=\"font-weight:normal\">Вы благополучно выбрались из Убежища.</div>";
    gotoxy(12, 20, 2, "Вы благополучно попали на 2-ой этаж.");
}
  
// наковальня, спуск на 4-ый этаж
if ($tx*2==4 && $ty*2==4) {
    if (usagesleft($tx, $ty)) {
        takeusage($tx, $ty);
        header('Location: dialog.php?char=21952');
        exit;
    } else {
        $report = "Наковальня доступна только для одного диалога.";
    }
    //gotoxy(24, 26, 4, "Вы благополучно попали на 4-ый этаж.");
}
  
// алтарь
if ($tx*2==4 && $ty*2==12) {
    //$report="<div style=\"font-weight:normal\">Вы благополучно выбрались из Убежища.</div>";
    gotoxy(2, 6, 1, "Вы попали в Тайную Комнату.");
}

// купель
if ($tx*2==8 && $ty*2==12) {
    $aBots = mysql_result(mysql_query("SELECT COUNT(*) FROM cavebots WHERE leader='$user[caveleader]' AND ((x = 6 AND y = 12) OR (x = 8 AND y = 10) OR (x = 12 AND y = 12)) AND floor='1'"), 0, 0);
    if ($aBots) {
        $report = 'Группа монстров уничтожена не полностью';
    } else {
        if (usagesleft($tx, $ty)) {
            takeusage($tx, $ty);
            $rand = mt_rand(1,100);
            if ($rand <= 80) {
                $report = usagesleft($tx, $ty) ? 'Пусто, поробуйте еще раз.' : 'Пусто';
            } else {
                $report = itemtofloor(mt_rand(2573, 2576), 0, 0, 1); // эликсиры
            }
        } else {
            $report="Пусто";
        }
    }
}

// скелеты
if (($tx*2==6 && $ty*2==10) || ($tx*2==2 && $ty*2==12)) {
    if (usagesleft($tx, $ty)) {
        takeusage($tx, $ty);
        $rand = mt_rand(1,100);
        if ($rand <= 50) {
            $report = usagesleft($tx, $ty) ? 'Пусто, поробуйте еще раз.' : 'Пусто'; 
        } elseif ($rand <= 80) {
            $mhp = 100 + mt_rand(0, 900);
            $report = "Вы попали в ловушку -$mhp HP.";
            takehp($user["id"], $mhp);
        } elseif ($rand <= 85) {
            $report = itemtofloor(2581, 0, 0, 1); // чужая квитанция на товар
        } else {
            $report = itemtofloor(mt_rand(2595, 2634), 0, 0, 3); // странички
        }
    } else {
        $report="Пусто";
    }
}

// сундуки
if (($tx*2==16 && $ty*2==8) || ($tx*2==16 && $ty*2==16)) {
    if (usagesleft($tx, $ty)) {
        $rand = mt_rand(1,100);
        if ($rand <= 50) {
            takeusage($tx, $ty);
            $report = usagesleft($tx, $ty) ? 'Пусто, поробуйте еще раз.' : 'Пусто'; 
        } elseif ($rand <= 80) {
            $mhp = 100 + mt_rand(0, 900);
            $report = "Вы попали в ловушку -$mhp HP.";
            takehp($user["id"], $mhp);
        } elseif ($rand <= 90) {
            takeusage($tx, $ty);
            $report = itemtofloor(mt_rand(2573, 2576), 0, 0, 1); // эликсиры
        } elseif ($rand <= 95) {
            takeusage($tx, $ty);
            $report = itemtofloor(mt_rand(2577, 2579), 0, 0, 1); // молот
        } else {
            takeusage($tx, $ty);
            $report = itemtofloor(mt_rand(2595, 2634), 0, 0, 3); // странички
        }
    } else {
       $report="Пусто";
    }
}
  
?>
