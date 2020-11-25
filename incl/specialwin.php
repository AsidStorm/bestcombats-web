<?
  if (in_array($user["room"], $caverooms)) {
    include "config/caveitems.php";
    $location=mqfa("select x, y, dir, floor from caveparties where user='$user[id]'");
    if ($location["dir"]==0) {$y=$location["y"]*2;$x=($location["x"]-1)*2;}
    if ($location["dir"]==1) {$y=($location["y"]-1)*2;$x=$location["x"]*2;}
    if ($location["dir"]==2) {$y=$location["y"]*2;$x=($location["x"]+1)*2;}
    if ($location["dir"]==3) {$y=($location["y"]+1)*2;$x=$location["x"]*2;}
    $floor=$location["floor"];
    $r=mq("select bot, x, y from cavebots where battle='".$this->battle_data["id"]."'");
    while ($rec=mysql_fetch_assoc($r)) {
      $bot=$rec["bot"];
      if (@$caveitems[$bot]) {
        if ($user['room'] == 74 || $user['room'] == 78 || $user['room'] == 403 || $user['room'] == 83) {
            $i = mt_rand(0, (count($caveitems[$bot]) - 1));
            $item = $caveitems[$bot][$i];
            if (getchance($item["chance"])) {
              $it = mqfa("select name, img from $item[from] where id = $item[id]");
              if (strpos($it['name'], "Зачаровать") !== false) { // если свиток зачарования
                $podz = 3;
              } else {
                $podz = 1;    
              }
              mysql_query("insert into caveitems set podzem = $podz, leader = '$user[caveleader]', x = '$rec[x]', y = '$rec[y]', floor = '$floor', name = '$it[name]', img = '$it[img]', item = '$item[id]'" .  ($item['foronetrip'] ? ", foronetrip = 1" : "") .  ($item['from'] == 'smallitems' ? ", small = 1" : ""));
              cavesys("У ".$cavebots[$bot]." был предмет <b>$it[name]</b> и кто угодно может подобрать его.");
              $this->add_log('<span class=date>'.date("H:i")."</span> У ".$cavebots[$bot]." был предмет <b>$it[name]</b>.<BR>");
            }
        } else {
          $i=0;
          while ($i<8) {
            $i++;
        if ($user['room'] == 302) {
              if (@$caveitems[$bot]["smallitem$i"]) {
                $rec=mqfa("select name, img from smallitems where id='".$caveitems[$bot]["smallitem$i"]."'");
                if (getchance($caveitems[$bot]["chance$i"])) {
                  mq("insert into caveitems set leader='$user[caveleader]', x='$x', y='$y', floor='$floor', name='$rec[name]', img='$rec[img]', item='".$caveitems[$bot]["smallitem$i"]."', small=1");
                  cavesys("У ".$cavebots[$bot]." был предмет <b>$rec[name]</b> и кто угодно может подобрать его.");
                  $this->add_log('<span class=date>'.date("H:i")."</span> У ".$cavebots[$bot]." был предмет <b>$rec[name]</b>.<BR>");
                }
              }
            } else {
              if (@$caveitems[$bot]["item$i"]) {
                if (getchance($caveitems[$bot]["chance$i"])) {
                  $rec=mqfa("select name, img from shop where id='".$caveitems[$bot]["item$i"]."'");                        
                  mq("insert into caveitems set leader='$user[caveleader]', x='$x', y='$y', floor='$floor', name='$rec[name]', img='$rec[img]', item='".$caveitems[$bot]["item$i"]."'");
                  cavesys("У ".$cavebots[$bot]." был предмет <b>$rec[name]</b> и кто угодно может подобрать его.");
                  $this->add_log('<span class=date>'.date("H:i")."</span> У ".$cavebots[$bot]." был предмет <b>$rec[name]</b>.<BR>");
                }
              }
            }
          }
        }  
      }
    }
    mq("delete from cavebots where battle='".$this->battle_data["id"]."'");
    //leader='$user[caveleader]' and x='$x' and y='$y' and floor='$location[floor]'");
  }
  if ($user["room"]==74) {
    foreach ($winners as $k=>$v) {
      if ($v<_BOTSEPARATOR_) addqueststep($v, 26, count($lomka)/4);
    }
  }
?>
