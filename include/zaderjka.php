<?php
   $zaderj=mq("SELECT type, name, owner, id, time FROM `zaderjka` WHERE (`time` <= ".time().") AND `owner` = ".$id.";");
   while ($zaderjown = mysql_fetch_array($zaderj)) {
   if($zaderjown['type']==1022) {
        mq("DELETE FROM `zaderjka` WHERE `id` = '".$zaderjown['id']."' LIMIT 1;");
       addchp ('<font color=red>Внимание!</font> Закончилось время задержки на свиток Невидимость.', '{[]}'.nick7($id).'{[]}');
        }
   if($zaderjown['type']==5) {
        mq("DELETE FROM `zaderjka` WHERE `id` = '".$zaderjown['id']."' LIMIT 1;");
       addchp ('<font color=red>Внимание!</font> Закончилось время задержки на Смену образа VIP.', '{[]}'.nick7($id).'{[]}');
        }
   }
?>