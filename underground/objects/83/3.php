<?php

// скелеты
if (($tx*2==10 && $ty*2==10) || ($tx*2==18 && $ty*2==6) || ($tx*2==18 && $ty*2==4)) {
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
if (($tx*2==14 && $ty*2==6) || ($tx*2==16 && $ty*2==6) || ($tx*2==2 && $ty*2==4) || ($tx*2==2 && $ty*2==10) || ($tx*2==2 && $ty*2==18)) {
    if (usagesleft($tx, $ty)) {
        takeusage($tx, $ty);
        $rand = mt_rand(1,100);
        if ($rand <= 80) {
            $report = usagesleft($tx, $ty) ? 'Пусто, поробуйте еще раз.' : 'Пусто'; 
        } elseif ($rand <= 85) {
            $report = itemtofloor(2590, 0, 0, 1); // право на дружбу
        } elseif ($rand <= 90) {
            $report = itemtofloor(mt_rand(2573, 2576), 0, 0, 1); // эликсиры
        } elseif ($rand <= 95) {
            $report = itemtofloor(mt_rand(2577, 2579), 0, 0, 1); // молот
        } else {
            $report = itemtofloor(mt_rand(2595, 2634), 0, 0, 3); // странички
        }
    } else {
        $report = 'Пусто';
    }
}

// кровати
if (($tx*2==6 && $ty*2==2) || ($tx*2==4 && $ty*2==2) || ($tx*2==2 && $ty*2==2) || ($tx*2==6 && $ty*2==6) || ($tx*2==4 && $ty*2==6) ||
    ($tx*2==2 && $ty*2==6) || ($tx*2==6 && $ty*2==8) || ($tx*2==4 && $ty*2==8) || ($tx*2==2 && $ty*2==8) || ($tx*2==2 && $ty*2==12) ||
    ($tx*2==2 && $ty*2==16) || ($tx*2==6 && $ty*2==18) || ($tx*2==6 && $ty*2==20) || ($tx*2==4 && $ty*2==20) || ($tx*2==2 && $ty*2==20)) {
    if (usagesleft($tx, $ty)) {
        takeusage($tx, $ty);
        $rand = mt_rand(1,100);
        if ($rand <= 65) {
            $report = 'Пусто'; 
        } elseif ($rand <= 80) {
            $report = itemtofloor(2589, 1, 0, 1); // ключ от клетки
        } elseif ($rand <= 85) {
            $report = itemtofloor(mt_rand(2573, 2576), 0, 0, 1); // эликсиры
        } elseif ($rand <= 90) {
            $report = itemtofloor(mt_rand(2577, 2579), 0, 0, 1); // молот
        } elseif ($rand <= 95) {
            $report = itemtofloor(2588, 0, 0, 1); // обложка от книги
        } else {
            $report = itemtofloor(mt_rand(2595, 2634), 0, 0, 3); // странички
        }
    } else {
        $report = 'Пусто';
    }
}

?>
