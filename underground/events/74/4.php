<?php

include '../../../questfuncs.php';

    // ловушка 20x4
    if ($tx*2==20 && $ty*2==4) {
        $bBots=mqfaa("
            SELECT bot, cnt, battle 
            FROM cavebots 
            WHERE 
                leader='$user[caveleader]'
                AND ((x = 18 AND y = 2) OR (x = 18 AND y = 6) OR (x = 22 AND y = 6) OR (x = 22 AND y = 2)) 
                AND floor='4'
        ");
        if ($bBots) {
            $firstbot=$bots[$bBots[0]['bot']];
            $otherbots=array();
            for ($i = 1; $i < count($bBots); $i++) {
                $otherbots[]=array("id"=>$bots[$bBots[$i]['bot']], "name"=>$botnames[$bBots[$i]['bot']]);
            }
            $btl = battlewithbot($firstbot, "", "", 10, 0, 0, 0, 0, 0, $otherbots);
            mysql_query("
                UPDATE cavebots 
                SET battle='$btl' 
                WHERE 
                    leader='$user[caveleader]' 
                    AND ((x = 18 AND y = 2) OR (x = 18 AND y = 6) OR (x = 22 AND y = 6) OR (x = 22 AND y = 2)) 
                    AND floor='$floor'
            ");
        }
    }
    
    // ловушка 4x4
    if ($tx*2==4 && $ty*2==4) {
        $bBot=mqfa("
            SELECT bot, cnt, battle 
            FROM cavebots 
            WHERE leader='$user[caveleader]' AND x = 6 AND y = 6 AND floor='4'
        ");
        if ($bBot) {
            $firstbot=$bots[$bBot['bot']];
            $otherbots=array();
            $btl = battlewithbot($firstbot, "", "", 10, 0, 0, 0, 0, 0, $otherbots);
            mysql_query("
                UPDATE cavebots 
                SET battle='$btl' 
                WHERE leader='$user[caveleader]' AND x = 6 AND y = 6 AND floor='4'
            ");
        }
    }

?>
