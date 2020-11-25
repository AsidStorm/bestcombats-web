<?php

/*
////////////////////////////// приемная ///////////////////////////////////////////

// телепорт в 1-ую зону
if ($tx*2==12 && $ty*2==12 && (int)$floor == 1) {  
    $isTrend  = mysql_result(mysql_query("SELECT COUNT(*) FROM inventory WHERE owner = $user[id] AND prototype = 2561"), 0, 0);
    if ($isTrend || $user['id'] == 7) {
        gotoxy(4, 10, 2, "Вы благополучно телепортированны в зону боевых действий I");
    } else {
        $report="<div style=\"font-weight:normal\">Ничего не произошло.<br /><br />Для работы телепорта необходимо <b>Направление в зону боевых действий I</b></div>";
    }
}

// телепорт в 2-ую зону
if ($tx*2==16 && $ty*2==8 && (int)$floor == 1) {  
    $isTrend  = mysql_result(mysql_query("SELECT COUNT(*) FROM inventory WHERE owner = $user[id] AND prototype = 2562"), 0, 0);
    if ($isTrend || $user['id'] == 7) {
        $aMap = unserialize(mqfa1("select map from caves where leader='$user[caveleader]' and floor='3'"));
        $ps = array();
        $ps[] = array('x' => 4, 'y' => 4);
        $ps[] = array('x' => 10,'y' => 4);
        $ps[] = array('x' => 12,'y' => 10);
        $aMap[$ps[0]['y']][$ps[0]['x']] = 's/71';
        $aMap[$ps[1]['y']][$ps[1]['x']] = 's/71';
        $aMap[$ps[2]['y']][$ps[2]['x']] = 's/71';
        $rn = mt_rand(0, 2);
        $aMap[$ps[$rn]['y']][$ps[$rn]['x']] = 'p/71/69';
        mq("update caves set map='".serialize($aMap)."' where leader='$user[caveleader]' and floor='3'");
        gotoxy(4, 10, 3, "Вы благополучно телепортированны в зону боевых действий II");
    } else {
        $report="<div style=\"font-weight:normal\">Ничего не произошло.<br /><br />Для работы телепорта необходимо <b>Направление в зону боевых действий II</b></div>";
    }
}

// телепорт в 3-ую зону
if ($tx*2==12 && $ty*2==4 && (int)$floor == 1) {  
    $isTrend  = mysql_result(mysql_query("SELECT COUNT(*) FROM inventory WHERE owner = $user[id] AND prototype = 2563"), 0, 0);
    if ($isTrend || $user['id'] == 7) {
        gotoxy(6, 14, 4, "Вы благополучно телепортированны в зону боевых действий III");
    } else {
        $report="<div style=\"font-weight:normal\">Ничего не произошло.<br /><br />Для работы телепорта необходимо <b>Направление в зону боевых действий III</b></div>";
    }
}

////////////////////////////// зонa боевых действий I ///////////////////////////////////////////

// телепорт в приемную
if ($tx*2==14 && $ty*2==6 && (int)$floor == 2) {  
    gotoxy(12, 12, 1, "Вы благополучно телепортированны в приёмную");
}

////////////////////////////// зонa боевых действий II ///////////////////////////////////////////

// телепорт в приемную
if ((($tx*2==4 && $ty*2==4) || ($tx*2==10 && $ty*2==4) || ($tx*2==12 && $ty*2==10)) && (int)$floor == 3) {  
    gotoxy(16, 8, 1, "Вы благополучно телепортированны в приёмную");
}

////////////////////////////// зонa боевых действий III ///////////////////////////////////////////

// телепорт в приемную
if ($tx*2==8 && $ty*2==4 && (int)$floor == 4) { 
    gotoxy(12, 4, 1, "Вы благополучно телепортированны в приёмную");
}
*/
 
?>
