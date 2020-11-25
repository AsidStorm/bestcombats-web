<?
  $fielddata[56]=array("team"=>3, "y1"=>1, "x1"=>7, "direction1"=>3, "y2"=>15, "x2"=>7, "direction2"=>1);  
  if (in_array($user["room"], $caverooms)) {
    include_once "config/cavedata.php";
    $floor=mqfa1("select floor from caveparties where user='$user[id]'");
    if (!isset($cavedata[$user["room"]]["x$floor"])) {
      $floor = 1;
    }
  }
  if (!@$lomka) $lomka1=$all;
  else $lomka1=$lomka;
  $updlog="";
  foreach ($lomka1 as $k=>$v) {
    if ($v<_BOTSEPARATOR_) {
      if ($this->battle_data["room"]==57) {
        $ud=mqfa("select id, team from fieldparties where user='$v' order by id desc");
        mq("update fieldparties set x=".$fielddata[$this->battle_data["room"]-1]["x$ud[team]"].", y=".$fielddata[$this->battle_data["room"]-1]["y$ud[team]"].", dir=".$fielddata[$this->battle_data["room"]-1]["direction$ud[team]"]." where id='$ud[id]'");
        mq("delete from inventory where owner='$v' and (name='Красный кристалл' or name='Зелёный кристалл' or name='Жёлтый кристалл')");
      }
      if ($this->battle_data["room"]==63 || $this->battle_data["room"]==72) {
        $this->getbu($v);
        $updlog.=logdate()." ".fullnick($v)." ".($this->battleunits[$v]["sex"]==1?"повержен":"проиграла")."<br>";
        outoffield($v, $this->battle_data["room"]);
        $tr = settravma($v,1,60*60+(rand(0,60)*60),1);
        if ($tr) $this->add_log('<span class=date>'.date("H:i").'</span> '.$this->nick7($v).' получил повреждение: <font color=red>'.$tr.'</font><BR>');
        privatemsg("Вы выбыли из ".($this->battle_data["room"]==63?"поединка":"турнира").".", $this->userdata[$v]["login"]);
      }
      if (in_array($user["room"], $caverooms)) {
        mq("update caveparties set floor = $floor, x='".$cavedata[$user["room"]]["x$floor"]."', y='".$cavedata[$user["room"]]["y$floor"]."', dir='".$cavedata[$user["room"]]["dir$floor"]."', loses=loses+1 where user='$v'");
      }
    } else {
      if ($this->battle_data["room"]==72) {
        $this->getbu($v);
        $updlog.=logdate()." ".fullnick($this->battleunits[$v]["prototype"])." ".($this->battleunits[$v]["sex"]==1?"повержен":"проиграла")."<br>";
        mq("delete from fieldparties where user='".$this->battleunits[$v]["prototype"]."'");
      }
    }
  }
  if ($updlog) addfieldlog($user["caveleader"], $updlog, 1);
  if ($this->battle_data["room"]==72) {
    mq("update fieldparties set battle=0 where battle='".$this->battle_data["id"]."'");
  }
  if (SNOWBALLSDROP && $lomka && !$user["in_tower"]) {
    $r=mq("select id, owner from inventory where prototype='2345' and dressed=0 and dategoden>".time()." and present='' and (owner=".implode($lomka, " or owner=").")");    
    while ($rec=mysql_fetch_assoc($r)) {
      mq("update inventory set owner='".$winners[mt_rand(0, count($winners)-1)]."', present='".$this->userdata[$rec["owner"]]["login"]."' where id='$rec[id]'");
    }
  }
?>
