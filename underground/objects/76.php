<?php


////////////////////////////// первый этаж ///////////////////////////////////////////

// Мастерская 18x4
if ($tx*2==18 && $ty*2==4 && (int)$floor == 1) {  
    $report="<div style=\"font-weight:normal\">Пока не работает</div>";
}

// Фонтан Искаженной Природы 6x14
if ($tx*2==6 && $ty*2==14 && (int)$floor == 1) {  
    $aBots=mqfaa("
        SELECT bot, cnt, battle 
        FROM cavebots 
        WHERE 
            leader='$user[caveleader]'
            AND (
                (x = 4 AND y = 2) OR 
                (x = 4 AND y = 4) OR 
                (x = 8 AND y = 2) OR 
                (x = 8 AND y = 4) OR 
                (x = 6 AND y = 4)
            ) 
            AND floor='1'
    ");
    if ($aBots) {
        $report = 'Для работы фонтана необходимо убить всех монстров в Логове у телепорта.';
    } else {
        if (usagesleft($tx, $ty)) {
            takeusage($tx, $ty);
            $rand = mt_rand(1,100);
            if ($rand<=66) {
                $report = 'Пусто, поробуйте еще раз.'; 
            } else {
                $rItems = array(1900, 1963, 1964, 2262);
                $rnd = mt_rand(0, (count($rItems) - 1));
                $report=itemtofloor($rItems[$rnd], 0, 0, 1);
            }
        } else {
            $report="Пусто";
        }
    }
}

// Телепорт 6x2
if ($tx*2==6 && $ty*2==2 && (int)$floor == 1) {  
    $aBots=mqfaa("
        SELECT bot, cnt, battle 
        FROM cavebots 
        WHERE 
            leader='$user[caveleader]'
            AND (
                (x = 4 AND y = 2) OR 
                (x = 4 AND y = 4) OR 
                (x = 8 AND y = 2) OR 
                (x = 8 AND y = 4) OR 
                (x = 6 AND y = 4)
            ) 
            AND floor='1'
    ");
    if ($aBots) {
        $report = 'Для работы телепорта необходимо зачистить логово.';
    } else {
        gotoxy(14, 6, 1, "Вы благополучно телепортированны.");
    }
}

// Спуск на 2-ой 14x2
if ($tx*2==14 && $ty*2==2 && (int)$floor == 1) {  
    gotoxy(16, 20, 2, "Вы благополучно попали на 2-ой этаж");
}

////////////////////////////// второй этаж ///////////////////////////////////////////

// Телепорт 18x16
if ($tx*2==18 && $ty*2==16 && $floor == 2) {  
    gotoxy(6, 20, 2, "Вы благополучно телепортированны.");
}

// Телепорт 10x4
if ($tx*2==10 && $ty*2==4 && $floor == 2) {  
    $report="<div style=\"font-weight:normal\">Не работает</div>";
}

// Таинственные круги 2x20
if ($tx*2==2 && $ty*2==20 && $floor == 2) {  
    if (isset($_GET['r'])) {
        gotoxy(6, 16, 2, "Вы благополучно телепортированны.");
    } else {
        gotoxy(6, 4, 2, "Вы благополучно телепортированны.");
    }
}

// Таинственные круги 2x8
if ($tx*2==2 && $ty*2==8 && $floor == 2) {  
    if (isset($_GET['r'])) {
        //$map[12][4] = 'p/65/63';
        //updmap();
        gotoxy(6, 12, 2, "Вы благополучно телепортированны.");
    } else {
        gotoxy(10, 12, 2, "Вы благополучно телепортированны.");
    }
}

// Фонтан лёгкой жизни и Таинственный круг 2x4
if ($tx*2==2 && $ty*2==4 && $floor == 2) {  
    if (isset($_GET['r'])) {
        gotoxy(16, 4, 2, "Вы благополучно телепортированны.");
    } else {
        if (usagesleft($tx, $ty)) {
            takeusage($tx, $ty);
            $rand = mt_rand(1,100);
            if ($rand <= 50) {
                $report = 'Пусто, поробуйте еще раз.'; 
            } else {
                if (mqfa1("select id from inventory where owner='$user[id]' and prototype='2459'")) {
                    $report=pickupitem(2461, 0, 0, 0, 3);
                    useitem(2459);
                } else {
                    $report="Для того, чтобы набрать эликсир, вам необходима пустая бутылка.";
                }
            }
        } else {
            $report="Пусто.";
        }
    }
}

// Таинственный круг 2x16
if ($tx*2==2 && $ty*2==16 && $floor == 2) {  
    gotoxy(6, 8, 2, "Вы благополучно телепортированны.");
}

// Таинственный круг 4x12
if ($tx*2==4 && $ty*2==12 && $floor == 2) {  
    gotoxy(16, 12, 2, "Вы благополучно телепортированны.");
}

// Мастерская 2x12
if ($tx*2==2 && $ty*2==12 && $floor == 2) { 
    $report="<div style=\"font-weight:normal\">Пока не работает</div>";
}

// Спуск на 3-ий 16x2
if ($tx*2==16 && $ty*2==2 && $floor == 2) {  
    gotoxy(16, 22, 3, "Вы благополучно попали на 3-ий этаж");
}

////////////////////////////// 3-ий этаж ///////////////////////////////////////////

// Фонтан Зыбытых Мастеров 2x10
if ($tx*2==2 && $ty*2==10 && $floor == 3) {  
    if (usagesleft($tx, $ty)) {
        takeusage($tx, $ty);
        $rand = mt_rand(1,100);
        if ($rand <= 50) {
            $report = 'Пусто.'; 
        } elseif ($rand <= 75) {
            $report=itemtofloor(mt_rand(2554, 2559), 0, 0, 1);
        } else {
            $rItems = array(100502, 101772, 101629, 100594, 100593, 101585, 101618);
            $rnd = mt_rand(0, (count($rItems) - 1));
            $report=itemtofloor($rItems[$rnd], 0, 0, 1, 'berezka');
        }
    } else {
        $report="Пусто.";
    }
}

// сундук 10x2
if ($tx*2==10 && $ty*2==2 && $floor == 3) {  
    if (usagesleft($tx, $ty)) {
        takeusage($tx, $ty);
        $rand = mt_rand(1,100);
        if ($rand <= 50) {
            $report = 'Пусто.'; 
        } elseif ($rand <= 75) {
            $report=itemtofloor(mt_rand(2554, 2559), 0, 0, 1);
        } else {
            $rItems = array(100502, 101772, 101629, 100594, 100593, 101585, 101618);
            $rnd = mt_rand(0, (count($rItems) - 1));
            $report=itemtofloor($rItems[$rnd], 0, 0, 1, 'berezka');
        }
    } else {
        $report="Пусто.";
    }
}

// Спуск на 4-ый 18x8
if ($tx*2==18 && $ty*2==8 && $floor == 3) {  
    gotoxy(2, 6, 4, "Вы благополучно попали на 4-ый этаж");
}

////////////////////////////// 4-ый этаж ///////////////////////////////////////////

// Мастерская 2x2
if ($tx*2==2 && $ty*2==2 && $floor == 4) {  
    $report="<div style=\"font-weight:normal\">Пока не работает</div>";
}

// статуи
if ((($tx*2==8 && $ty*2==2) || ($tx*2==8 && $ty*2==4) || ($tx*2==8 && $ty*2==6)) && $floor == 4) {  
    $report="<div style=\"font-weight:normal\">Пока не работает</div>";
}

// Выход на 3-ий 2x6
if ($tx*2==2 && $ty*2==6 && $floor == 4) {  
    gotoxy(16, 22, 3, "Вы благополучно попали на 3-ий этаж");
}
 
?>
