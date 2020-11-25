<?php
  session_start();
 include 'cave/roomnames.php';  
  include "connect.php";
  include "functions.php";
  include "cavefunctions.php";
  if ($user['align'] == 2.5) {
    if (isset($_GET['goto'])) {
      db_query("UPDATE `caveparties` SET  `x` =  '$_GET[x]', `y` =  '$_GET[y]', `floor` =  '$_GET[floor]' WHERE `caveparties`.`user` = $user[id] LIMIT 1;");
      header('Location: cave.php');
      exit;
    }
    header("Content-Type: text/html; charset=windows-1251");
  }
  if ($user["battle"]) {
    header("location: fbattle.php");
    die;
  }
  include 'cave/objsizes.php';               
  $objdata[3][0]=array("wd"=>1.44, "ht"=>1.44, "y"=>1, "x"=>176);
  $objdata[3][1]=array("coef"=>1, "y"=>202, "x"=>176);
  $objdata[1][1]=array("coef"=>1, "y"=>202, "x"=>-65);
  $objdata[5][1]=array("coef"=>1, "y"=>202, "x"=>435);
  $objdata[3][2]=array("coef"=>0.67, "y"=>162, "x"=>176);
  $objdata[1][2]=array("coef"=>0.67, "y"=>162, "x"=>18);
  $objdata[5][2]=array("coef"=>0.67, "y"=>162, "x"=>342);
  $objdata[3][3]=array("coef"=>0.50, "y"=>141, "x"=>176);
  $objdata[1][3]=array("coef"=>0.50, "y"=>141, "x"=>50);
  $objdata[5][3]=array("coef"=>0.50, "y"=>141, "x"=>300);


  $imgdata[3][0]=array("wd"=>173, "ht"=>317, "y"=>1, "x"=>array(-37, 89, 215));
  $imgdata[3][1]=array("wd"=>87, "ht"=>161, "y"=>41, "x"=>array(68, 132, 196));
  $imgdata[1][1]=array("wd"=>87, "ht"=>161, "y"=>41, "x"=>array(-171, -44, -44));
  $imgdata[5][1]=array("wd"=>87, "ht"=>161, "y"=>41, "x"=>array(308, 308, 435));
  $imgdata[3][2]=array("wd"=>58, "ht"=>107, "y"=>55, "x"=>array(104, 147, 189));
  $imgdata[1][2]=array("wd"=>58, "ht"=>107, "y"=>55, "x"=>array(-56, 29, 29));
  $imgdata[5][2]=array("wd"=>58, "ht"=>107, "y"=>55, "x"=>array(264, 264, 350));
  $imgdata[3][3]=array("wd"=>44, "ht"=>81, "y"=>61, "x"=>array(122, 154, 186));
  $imgdata[1][3]=array("wd"=>44, "ht"=>81, "y"=>61, "x"=>array(1, 65, 65));
  $imgdata[5][3]=array("wd"=>44, "ht"=>81, "y"=>61, "x"=>array(242, 242, 306));
  
  $imgmap[62] = array(
    'name' => 'twoportals',
    'code' => '
        <map name="twoportals">
          <area shape="rect" coords="0,0,120,120" href="?useitem=1&l" alt="Таинственный Круг" title="Таинственный Круг" />
          <area shape="rect" coords="120,0,240,120" href="?useitem=1&r" alt="Таинственный Круг" title="Таинственный Круг" />
        </map>
    ',
  );
  
  $imgmap[64] = array(
    'name' => 'fountainportal',
    'code' => '
        <map name="fountainportal">
          <area shape="rect" coords="0,0,120,120" href="?useitem=1&l" alt="Таинственный Круг" title="Фонтан лёгкой жизни" />
          <area shape="rect" coords="120,0,240,120" href="?useitem=1&r" alt="Таинственный Круг" title="Таинственный Круг" />
        </map>
    ',
  );

  $eventdata[3][1]=array("x"=>176, "y"=>200, "q"=>1);
  $eventdata[3][2]=array("x"=>176, "y"=>149, "q"=>0.66);
  $eventdata[1][2]=array("x"=>16, "y"=>149, "q"=>0.66);
  $eventdata[5][2]=array("x"=>335, "y"=>149, "q"=>0.66);
  $eventdata[3][3]=array("x"=>176, "y"=>133, "q"=>0.5);
  $eventdata[1][3]=array("x"=>56,  "y"=>133, "q"=>0.5);
  $eventdata[5][3]=array("x"=>296, "y"=>133, "q"=>0.5);

  include 'cave/cave_bots.php'; 
  include 'cave/objects.php';  
  if ($user["room"]==65) {
    $objects["700"]=="Знак";
    $i=0;
    while ($i<36) {
      $i++;
      $objects[700+$i]="Указатель пути";
    }
  }
  include 'cave/events.php';  
  include 'cave/dialogs.php';  
  $noautoexit=0;

  function usagesleft($x, $y) {
    global $map;
    $cell=explode("/", $map[$y*2][$x*2]);
    return $cell[3];
  }

  function takeusage($x, $y) {
    global $map;
    $cell=explode("/", $map[$y*2][$x*2]);
    $cell[3]--;
    $map[$y*2][$x*2]=implode("/", $cell);
    updmap();
  }

  function makedeath() {
    global $user, $floor, $loses, $x, $y, $dir;
    include "config/cavedata.php";
    if (!isset($cavedata[$user["room"]]["x$floor"])) {
        $floor = 1;
        loadmap();
    }
    mq("update caveparties set floor = $floor, x='".$cavedata[$user["room"]]["x$floor"]."', y='".$cavedata[$user["room"]]["y$floor"]."', dir='".$cavedata[$user["room"]]["dir$floor"]."', loses=loses+1 where user='$user[id]'");
    $x=$cavedata[$user["room"]]["x$floor"];
    $y=$cavedata[$user["room"]]["y$floor"];
    $dir=$cavedata[$user["room"]]["dir$floor"];
    updparties();
    $loses++;
  }

  function pickupitem($item, $foronetrip, $notmore1, $incave=0, $podzem=1, $destiny=0) {
    global $user;
    if ($notmore1) {
      $i=mqfa1("select id from inventory where prototype='$item' and owner='$user[id]'");
      if ($i) return "Вы уже получили здесь всё необходимое.";
    }
    $flds=array("podzem"=>1, "podzem"=>$podzem);
    if ($incave) $flds["incave"]=1;
    $taken=takeshopitem($item, "shop", "", $foronetrip, $destiny, $flds);
    return "Вы получили <b>$taken[name]</b>";
  }

  function itemtofloor($item, $foronetrip, $incave=0, $podzem=1, $from = 'shop', $small = 0) {
    global $user, $x, $y, $floor;
    $rec=mqfa("select name, img from $from where id='$item'");
    mq("insert into caveitems set leader='$user[caveleader]', name='$rec[name]', img='$rec[img]', small='$small',x='".($x*2)."', y='".($y*2)."', floor='$floor', item='$item', foronetrip='$foronetrip', incave='$incave', podzem='$podzem'");
    return "Вы нашли <b>$rec[name]</b>.";
  }

  function makeinjury() {
    global $user, $floor, $noautoexit, $loses, $x, $y, $dir;
    settravma($user["id"],20,rand(300,600),1,1);
    makedeath();
    $noautoexit=1;
  }

  function cavewall($w) {
    if ($w<100) return floor($w/10);
    else return floor($w/1000)+100;
  }

  function passablewall($n) {
    if ($n==0 || $n==31) return true;
    return false;
  }

  function canmoveto($cell, $freecell=0, $passing=0) {
    if (!passablewall($passing)) return false;
    $obj=substr($cell,0,1);
    if ($obj=="e" || $obj=="u" || $obj=="s" || $obj=="p") return true;
    if (!$freecell && $cell) return false;
    if ($cell==$freecell) return true;
    return false;
  }
  function gotoxy($tox, $toy, $tofloor=0, $msg = '') {
    global $map, $x, $y, $floor, $user;
    $floor1=$floor;
    $upd="";
    if ($tox) {
      $tox=$tox/2;
      if ($upd) $upd.=", ";
      $upd.=" x='$tox'";
      $x=$tox;
    }
    if ($toy) {
      $toy=$toy/2;
      if ($upd) $upd.=", ";
      $upd.=" y='$toy'";
      $y=$toy;
    }
    if ($tofloor && $tofloor!=$floor) {
      if ($upd) $upd.=", ";
      $upd.=" floor='$tofloor'";
      $floor=$tofloor;
    }
    mq("update caveparties set $upd where user='$user[id]'");
    if ($tofloor && $tofloor!=$floor1) {
      $map=mqfa1("select map from caves where leader='$user[caveleader]' and floor='$floor'");
      $map=unserialize($map);
    }
    updparties();
    if ($msg) {
        header("Location: " . $_SERVER['PHP_SELF'] . ($msg ? '?msg=' . $msg : '' ));
        exit;
    }
  }

  function updparties() {
    global $user, $x, $y, $floor, $dir, $party;
    foreach ($party as $k=>$v) {
      if ($v["user"]==$user["id"]) {
        $party[$k]["dir"]=$dir;
        $party[$k]["x"]=$x;
        $party[$k]["y"]=$y;
        $party[$k]["floor"]=$floor;
      }
    }
  }

  function loadmap() {
    global $user, $map, $floor;
    $map=mqfa1("select map from caves where leader='$user[caveleader]' and floor='$floor'");
    $map=unserialize($map);
  }

  if (!in_array($user['room'],$caverooms)) {
    header("location: main.php");
    die;
  }
  
  if (isset($_GET["direction"])) {
    $dir=(int)$_GET["direction"];
    if ($dir>=0 && $dir<=3) mq("update caveparties set dir='$dir' where user='$user[id]'");
  }
  $party=array();
  $r=mq("select user, x, y, dir, login, shadow, floor, loses from caveparties where leader='$user[caveleader]' order by id");
  while ($rec=mysqli_fetch_assoc($r)) {
    if ($rec["user"]==$user["id"]) {
      $x=$rec["x"];
      $y=$rec["y"];
      $dir=$rec["dir"];
      $floor=$rec["floor"];
      $loses=$rec["loses"];
    }
    //unset($rec["user"]);
    $party[]=$rec;
  }
  
  if ($user["room"]==302) {
    $base=IMGBASE."/underdesigns/alchcave"; 
  } elseif ($user["room"]==61) {
    $base=IMGBASE."/underdesigns/forsakenpalace"; 
  } elseif ($user["room"]==65) {
    $base=IMGBASE."/underdesigns/puzzlecave"; 
  } elseif ($user["room"]==72) {
    $base=IMGBASE."/underdesigns/deathtower"; 
  } elseif ($user["room"]==74) {
    $base=IMGBASE."/underdesigns/catacombs";
  } elseif ($user["room"]==76) {
    $base=IMGBASE."/underdesigns/lostentrance";
  } elseif ($user["room"]==78) {
    $base=IMGBASE."/underdesigns/watchtower";
} elseif ($user["room"]==501) {
    if ($floor == 1) {
      $base=IMGBASE."/underdesigns/deathtower";  
    } elseif ($floor == 2) {
      $base=IMGBASE."/underdesigns/canals";  
    } elseif ($floor == 3) {
      $base=IMGBASE."/underdesigns/canals";  
    } elseif ($floor == 4) {
      $base=IMGBASE."/underdesigns/canals";  
    } elseif ($floor == 5) {
      $base=IMGBASE."/underdesigns/canals";  
    }
    } elseif ($user["room"]==83) {
    if ($floor == 1) {
      $base=IMGBASE."/underdesigns/deep/1";  
    } elseif ($floor == 4) {
      $base=IMGBASE."/underdesigns/deep/4";  
    } else {
      $base=IMGBASE."/underdesigns/deep/2-3";  
    } 
  } elseif ($user["room"]==91) {
    $base=IMGBASE."/underdesigns/icecave"; 
  } else {
    $base=IMGBASE."/underdesigns/crystalcave1"; 
  }

  //if ($user["room"]==74) $maxloses=1;
  //else 
  $maxloses=3;

  if ($loses>=$maxloses && !$noautoexit) $_GET["exit"]=1;

  if (@$_POST["kill"] && $user["id"]==$user["caveleader"] && $_POST["kill"]!=$user["login"]) {
    foreach ($party as $k=>$v) {
      if ($v["login"]==$_POST["kill"]) {
        mq("delete from caveparties where user='$v[user]'");
        mq("update users set room=room-1, caveleader=0 where id='$v[user]'");
        $r=mq("select id, dressed from inventory where owner='$v[user]' and dressed=1 and foronetrip=1");
        if (mysqli_num_rows($r)>0) $usr=mqfa("select ".implode(",", $userslots)." from users where id='$v[user]'");
        while ($rec=mysqli_fetch_assoc($r)) {
          $slot=getslot($rec["id"], $usr);
          if ($slot) dropitemid(0, $v["user"], $slot);
        }
        mq("delete from inventory where owner='$v[user]' and foronetrip=1");
        unset($party[$k]);
        $report="Персонаж $v[login] исключён из похода.";
        break;
      }
    }
    if (!@$report) $report="Персонаж $_POST[kill] не найден.";
  }

  if (@$_POST["change"] && $user["id"]==$user["caveleader"] && $_POST["change"]!=$user["login"]) {
    foreach ($party as $k=>$v) {
      if ($v["login"]==$_POST["change"]) {
        mq("lock tables users write, caveparties write, cavebots write, caves write, caveitems write, diseases write, caveeffects write");
        mq("update users set caveleader='$v[user]' where caveleader='$user[id]'");
        mq("update cavebots set leader='$v[user]' where leader='$user[id]'");
        mq("update caves set leader='$v[user]' where leader='$user[id]'");
        mq("update caveparties set leader='$v[user]' where leader='$user[id]'");
        mq("update caveitems set leader='$v[user]' where leader='$user[id]'");
        $user["caveleader"]=$v["user"];
        $report="Персонажу $v[login] присвоено лидерство.";
        mq("unlock tables");
        break;
      }
    }
    if (!@$report) $report="Персонаж $_POST[change] не найден.";
  }


  if (@$_GET["useitem"] || @$_GET["usewallitem"]) mq("lock tables userdata write, obshagaeffects write, effects write, cavebots write, quests write, battle write, users write, droplog write, caveparties write, caves write, smallitems write, shop write, berezka write, inventory write, bots write, caveitems write, diseases write, caveeffects write");
  loadmap();


  if (@$_GET["useitem"]) {
    if ($dir==0) {$tx=$x-1;$ty=$y;}
    if ($dir==1) {$tx=$x;$ty=$y-1;}
    if ($dir==2) {$tx=$x+1;$ty=$y;}
    if ($dir==3) {$tx=$x;$ty=$y+1;}

    if (@$_GET["useitem"]) {
      if (file_exists("underground/objects/$user[room].php")) include "underground/objects/$user[room].php";
    }

    list($t, $obj)=explode("/", $map[$ty*2][$tx*2]);
    if ($t=="o") {
      if ($obj==500) $report="В этот сундук уже кто-то заглядывал";
      if ($obj==501) {
        $map[$ty*2][$tx*2]="o/500";
        include_once("questfuncs.php");
        $rnd=rand(1,100);
        if ($rnd<=94) $taken=takesmallitem(37, 0, "Нашёл в пещере");
        elseif ($rnd<=97) $taken=takesmallitem(39, 0, "Нашёл в пещере");
        elseif ($rnd<=99) $taken=takesmallitem(40, 0, "Нашёл в пещере");
        else {
          $items=array(1946, 1947, 1948, 1949, 1950, 1951);
          $item=$items[rand(0,5)];
          $taken=takeshopitem($item, "shop", "", "", 0, array("podzem"=>1, "maxdur"=>5+rand(0,5), "isrep"=>0));        
        }
        $report="В сундуке вы нашли $taken[name].";
        mq("update caves set map='".serialize($map)."' where leader='$user[caveleader]' and floor='$floor'");
      }
      if ($obj==602 || $obj==601) {
        $floor=$obj-600;
        mq("update caveparties set floor=$floor where user='$user[id]'");
        $map=mqfa1("select map from caves where leader='$user[caveleader]' and floor='$floor'");
        $map=unserialize($map);
        $report="Перемещение прошло успешно";
      }
    }
    mq("unlock tables");
  }

  function updmap() {
    global $map, $user, $floor;
    mq("update caves set map='".serialize($map)."' where leader='$user[caveleader]' and floor='$floor'");
  }

  if (@$_GET["usewallitem"]) {
    if ($dir==0) {$tx=$x*2-1;$ty=$y*2;}
    if ($dir==1) {$tx=$x*2;$ty=$y*2-1;}
    if ($dir==2) {$tx=$x*2+1;$ty=$y*2;}
    if ($dir==3) {$tx=$x*2;$ty=$y*2+1;}
    $obj=$map[$ty][$tx];
    if ($obj%1000==101) {
      $map[11][8]="21";
      $map[6][11]="31";
      if ($map[$ty][$tx]<1000) $map[$ty][$tx]+=1000; else $map[$ty][$tx]-=1000;
      updmap();
    }
    if ($obj%1000==102) {
      if ($map[$ty][$tx]<1000) $map[$ty][$tx]+=1000; else $map[$ty][$tx]-=1000;
      $map[6][11]="31";updmap();
    }
    if ($obj%1000==103) {
      if ($map[$ty][$tx]<1000) $map[$ty][$tx]+=1000; else $map[$ty][$tx]-=1000;
      $map[11][8]="31";updmap();
    }
    if ($obj%1000==104) {
      if ($map[$ty][$tx]<1000) $map[$ty][$tx]+=1000; else $map[$ty][$tx]-=1000;
      $map[24][7]="31";updmap();
    }
    if ($obj%1000==105) {
      if ($map[$ty][$tx]<1000) $map[$ty][$tx]+=1000; else $map[$ty][$tx]-=1000;
      $map[14][21]="31";
      $map[24][7]="21";
      updmap();
    }
    if ($obj%1000==106) {
      if ($map[$ty][$tx]<1000) $map[$ty][$tx]+=1000; else $map[$ty][$tx]-=1000;
      $map[18][7]="31";updmap();
    }
    if ($obj%1000==107) {
      if ($map[$ty][$tx]<1000) $map[$ty][$tx]+=1000; else $map[$ty][$tx]-=1000;
      $map[14][13]="31";updmap();
    }
    if ($obj%1000==108) {
      if ($map[$ty][$tx]<1000) $map[$ty][$tx]+=1000; else $map[$ty][$tx]-=1000;
      $map[27][10]="31";updmap();
    }
    if ($obj%1000==109) {
      if ($map[$ty][$tx]<1000) $map[$ty][$tx]+=1000; else $map[$ty][$tx]-=1000;
      $map[11][18]="31";updmap();
    }
    if ($obj%1000==110) {
      if ($map[$ty][$tx]<1000) $map[$ty][$tx]+=1000; else $map[$ty][$tx]-=1000;
      $map[17][18]="31";updmap();
    }
    if ($obj%1000==111) {
      if ($map[$ty][$tx]<1000) $map[$ty][$tx]+=1000; else $map[$ty][$tx]-=1000;
      $map[11][18]="21";
      $map[8][21]="31";updmap();
    }
    if ($obj%1000==112) {
      if ($map[$ty][$tx]<1000) $map[$ty][$tx]+=1000; else $map[$ty][$tx]-=1000;
      $map[11][18]="21";
      $map[8][25]="31";updmap();
    }
    if ($obj%1000==113) {
      if ($map[$ty][$tx]<1000) $map[$ty][$tx]+=1000; else $map[$ty][$tx]-=1000;
      $map[11][18]="21";
      $map[8][21]="21";updmap();
    }
    if ($obj%1000==114) {
      if ($map[$ty][$tx]<1000) $map[$ty][$tx]+=1000; else $map[$ty][$tx]-=1000;
      $map[8][31]="31";updmap();
    }
    if ($obj%1000==115) {
      if ($map[$ty][$tx]<1000) $map[$ty][$tx]+=1000; else $map[$ty][$tx]-=1000;
      $map[15][28]="31";updmap();
    }
    if ($obj%1000==116) {
      if ($map[$ty][$tx]<1000) $map[$ty][$tx]+=1000; else $map[$ty][$tx]-=1000;
      $map[29][28]="31";updmap();      
    }
    if ($obj%1000==117) {
      if ($map[$ty][$tx]<1000) $map[$ty][$tx]+=1000; else $map[$ty][$tx]-=1000;
      $map[5][18]="31";updmap();      
    }
    if ($obj%1000==118) {
      if ($map[$ty][$tx]<1000) $map[$ty][$tx]+=1000; else $map[$ty][$tx]-=1000;
      $map[21][32]="31";updmap();
    }
    if ($obj%1000==119) {
      if ($map[$ty][$tx]<1000) $map[$ty][$tx]+=1000; else $map[$ty][$tx]-=1000;
      $map[27][28]="31";updmap();
    }
    
    if ($obj==18) $report="Вы не обнаружили ничего интересного.";
    if ($obj==19) $report="Уже проверено, сюда лучше не лазить.";
    if ($obj==11) {
      $map[$ty][$tx]="18";
      include_once("questfuncs.php");
      $rnd=rand(1,100);
      if ($rnd<=95) $taken=takesmallitem(37, 0, "Нашёл в пещере");
      else $taken=takesmallitem($rnd-54, 0, "Нашёл в пещере");
      $report="После длительных поисков вы обнаружили \"$taken[name]\".<br><br>
      <center><img src=\"".IMGBASE."/i/sh/$taken[img]\"></center>";
      mq("update caves set map='".serialize($map)."' where leader='$user[caveleader]' and floor='$floor'");
    }
    if ($obj==12) {
      include_once("questfuncs.php");
      include_once "config/cavedata.php";
      $report="За проёмом в стене вы обнаружили ход, который вывел вас куда-то...<br><br>";
      //mq("update caves set map='".serialize($map)."' where leader='$user[caveleader]' and floor='$floor'");
      mq("update caveparties set x='".$cavedata[$user["room"]]["x$floor"]."', y='".$cavedata[$user["room"]]["y$floor"]."', dir='".$cavedata[$user["room"]]["dir$floor"]."' where user='$user[id]'");
      $x=$cavedata[$user["room"]]["x$floor"];
      $y=$cavedata[$user["room"]]["y$floor"];
      $dir=$cavedata[$user["room"]]["dir$floor"];
      updparties();
    }
    if ($obj==13) {
      include_once("questfuncs.php");
      $map[$ty][$tx]="19";
      $report="Как только вы начали исследовать проём, на вас набросилось какое-то существо, начался поединок. Проём слишком узкий, чтобы туда мог залезть ещё кто-то, так что подмоги не ждите.<br><br>
      <center><a href=\"fbattle.php\">перейти к поединку</a></center>";
      $btl=battlewithbot(11134, "", "", 10, 0, 1, 0, 0, 0, array(), 1);
      mq("update caves set map='".serialize($map)."' where leader='$user[caveleader]' and floor='$floor'");
    }
    if ($obj==14) {
      include_once("questfuncs.php");
      $map[$ty][$tx]="19";
      $report="В проёме совсем темно, вы начинаете остороно ощупывать края, как неожиданно из темноты высовывается что-то очень зубастое и очень больно кусает вас за руку. Пожалуй, не стоит продолжать поиски, так как в темноте и в узком помещении преимущество явно не на вашей стороне.<br><br>";
      mq("update users set hp=1 where id='$user[id]'");
      $user["hp"]=1;
      mq("update caves set map='".serialize($map)."' where leader='$user[caveleader]' and floor='$floor'");
    }
    mq("unlock tables");
  }
  if ($obj==15) {
      if (mqfa1("select id from inventory where owner='$user[id]' and name='Пустая склянка'")) {
      db_query("UPDATE inventory SET name = 'Склянка с пробами', podzem = 1, img = 'full_rune_vial.gif' WHERE owner = $user[id] AND name = 'Пустая склянка'");
          $report="<div style=\"font-weight:normal\">Вы получили &quot;Склянка с пробами&quot;<br><img src='http://bestcombats.net/i/sh/full_rune_vial.gif'></div>";
      } else {
        $report="У вас нет пустой склянки";
      }
    }
  $r=mq("select id, bot, x, y, cnt, type, battle from cavebots where leader='$user[caveleader]' and floor='$floor'");
  $mapbots=array();
  $ambushes=array();
  $cavedata=getcavedata($user["caveleader"], $floor);
  if (time()-$cavedata["wander"]>21) $wander=1;
  $wanderers=array();
  while ($rec=mysqli_fetch_assoc($r)) {
    if ($rec["type"]==1 && $wander && $rec["battle"]==0) { 
      $wanderers[]=$rec;
      continue;
    }
    if (!@$mapbots[$rec["y"]][$rec["x"]]) $mapbots[$rec["y"]][$rec["x"]]="b";
    if (($rec["type"]==1 || $rec["type"]==2) && $rec["battle"]==0) $ambushes[$rec["y"]][$rec["x"]]=1;
    $mapbots[$rec["y"]][$rec["x"]].="/$rec[bot]/$rec[cnt]";
  }
        if ($wander && !isset($_GET['attack'])) {    
            foreach ($wanderers as $k=>$v) {
                $d=rand(0, 3);
                for ($i = 0; $i < 4; $i++) {
                    if ($d==0) {$tx=$v["x"]-2;$ty=$v["y"];}
                    if ($d==1) {$tx=$v["x"];$ty=$v["y"]-2;}
                    if ($d==2) {$tx=$v["x"]+2;$ty=$v["y"];}
                    if ($d==3) {$tx=$v["x"];$ty=$v["y"]+2;}
                    if ($user['room'] == 74 || $user['room'] == 76 || $user['room'] == 501) {
                        if (strpos($map[$ty][$tx], 's/') !== false && !@$mapbots[$ty][$tx]) {
                            break;
                        }
                    } else {
                        if ($map[$ty][$tx]==2 && !@$mapbots[$ty][$tx]) {
                            break;
                        }
                    }
                    $d++;
                    if ($d > 3) {
                        $d = 0;
                    }
                }
                if ($i<4) {
                    mq("update cavebots set x='$tx', y='$ty' where id='$v[id]'");
                    $v["x"]=$tx;$v["y"]=$ty;
                }
                if (!@$mapbots[$v["y"]][$v["x"]]) $mapbots[$v["y"]][$v["x"]]="b";
                $ambushes[$v["y"]][$v["x"]]=1;
                $mapbots[$v["y"]][$v["x"]].="/$v[bot]/$v[cnt]";
            }
            $cavedata["wander"]=time();
            savecavedata($cavedata, $user["caveleader"], $floor);
        }
  foreach ($mapbots as $k=>$v) {
    foreach ($v as $k2=>$v2) {
      $map[$k][$k2]=$v2;
    }
  }
  $moved=0;
  if (@$_GET["move"] && $_SESSION["movetime"]<time()) {
    if ($_GET["move"]=="x1" && canmoveto($map[$y*2][$x*2+2],2,$map[$y*2][$x*2+1],2)) {
      mq("update caveparties set x=x+1 where user='$user[id]'");
      $x++;
      $moved=1;
    }
    if ($_GET["move"]=="x2" && canmoveto($map[$y*2][$x*2-2],2,$map[$y*2][$x*2-1])) {
      mq("update caveparties set x=x-1 where user='$user[id]'");
      $x--;
      $moved=1;
    }
    if ($_GET["move"]=="y1" && canmoveto($map[$y*2+2][$x*2],2,$map[$y*2+1][$x*2])) {
      mq("update caveparties set y=y+1 where user='$user[id]'");
      $y++;
      $moved=1;
    }
    if ($_GET["move"]=="y2" && canmoveto($map[$y*2-2][$x*2],2,$map[$y*2-1][$x*2])) {
      mq("update caveparties set y=y-1 where user='$user[id]'");
      $y--;
      $moved=1;
    }
    updparties();
if (haseffect($user["data"], LIGHTSTEPS)) {
$_SESSION["movetime"]=time()+4;
} else {
 $_SESSION["movetime"]=time()+4;
}
	  }
  if ($moved && (substr($map[$y*2][$x*2],0,1)==="e" || substr($map[$y*2][$x*2],0,1)==="p")) {
    $tx=$x;
    $ty=$y;
    $tmp=explode("/",$map[$y*2][$x*2]);
    if (file_exists("underground/events/$user[room].php")) include "underground/events/$user[room].php";
    if ($tmp[1]==700) {
      mq("update caveparties set x=2, y=2, floor=2 where user='$user[id]'");
      $x=2;$y=2;$floor=2;
      updparties();
      loadmap();
      $report="Вы попали в провал и упали куда-то...";
    }
    if ($tmp[1]==701) {
      mq("update caveparties set x=4, y=6, floor=2 where user='$user[id]'");
      $x=4;$y=6;$floor=2;
      updparties();
      loadmap();
      $report="Вы попали в провал и упали куда-то...";
    }
  }

  $ax=0;$ay=0;
  if ($ambushes[$y*2+2][$x*2] && $map[$y*2+1][$x*2]==0) {$ax=$x;$ay=$y+1;}
  if ($ambushes[$y*2-2][$x*2] && $map[$y*2-1][$x*2]==0) {$ax=$x;$ay=$y-1;}
  if ($ambushes[$y*2][$x*2+2] && $map[$y*2][$x*2+1]==0) {$ax=$x+1;$ay=$y;}
  if ($ambushes[$y*2][$x*2-2] && $map[$y*2][$x*2-1]==0) {$ax=$x-1;$ay=$y;}


  if ($ax && $ay && $user["hp"]>0) {
    include_once("config/cavedata.php");
    if (!($cavedata[$user["room"]]["x$floor"]==$x && $cavedata[$user["room"]]["y$floor"]==$y)) {
      if ($ax<$x) $dir1=0;
      elseif ($ax>$x) $dir1=2;
      elseif ($ay<$y) $dir1=1;
      elseif ($ay>$y) $dir1=3;
      if ($dir!=$dir1) {
        $dir=$dir1;
        mq("update caveparties set dir='$dir' where user='$user[id]'");
        foreach ($party as $k=>$v) {
          if ($v["user"]==$user["id"]) $party[$k]["dir"]=$dir1;
        }
      }
      $_GET["attack"]=1;
    }
  }

  if (!@$_SESSION["movetime"]) {
    $_SESSION["movetime"]=time()+4;
  }
  if (@$_GET["takeitem"]) {
    $_GET["takeitem"]=(int)$_GET["takeitem"];
    $it=mqfa("select item, small, foronetrip, incave, podzem from caveitems where leader='$user[caveleader]' and x='".($x*2)."' and y='".($y*2)."' and floor='$floor' and id='$_GET[takeitem]'");
    if ($it) {
      include_once("questfuncs.php");
      if ($it["small"]) {
        if (!placeinbackpack(1)) {
          $report="У вас в рюкзак слишком много предметов.";
        } elseif (!cancarry(mqfa1("select massa from smallitems where id='$it[item]'"))) {
          $report="Ваш рюкзак перегружен.";
        } else {
          mq("delete from caveitems where leader='$user[caveleader]' and x='".($x*2)."' and y='".($y*2)."' and floor='$floor' and id='$_GET[takeitem]'");
          $taken=takesmallitem($it["item"], 0, "Нашёл в пещере");
          $report="Вы нашли $taken[name].";
        }
      } else {
        if ($it['item'] > 100000) {
            $shop = 'berezka';
        } else {
            $shop = 'shop';    
        }
        if (!placeinbackpack(1)) {
          $report="У вас в рюкзаке слишком много предметов.";
        } elseif (!cancarry(mqfa1("select massa from $shop where id='$it[item]'"))) {
          $report="Ваш рюкзак перегружен.";
        } else {
          if ($it["item"]==2347) {
            if ($user["level"]<=6) $taken=takeshopitem($it["item"], "$shop", "", "", 0, array("podzem"=>$it["podzem"], "nlevel"=>6, "maxdur"=>20, "cost"=>57, "stats"=>5));
            elseif ($user["level"]<=7) $taken=takeshopitem($it["item"], "$shop", "", "", 0, array("podzem"=>$it["podzem"], "maxdur"=>30, "nlevel"=>7, "cost"=>94, "stats"=>6));
            else $taken=takeshopitem($it["item"], "$shop", "", "", 0, array("podzem"=>$it["podzem"], "nlevel"=>8, "maxdur"=>40, "cost"=>141, "stats"=>7));
            if (@$taken["error"]) {
              $report=$taken["error"];
            } else {
              mq("delete from caveitems where leader='$user[caveleader]' and x='".($x*2)."' and y='".($y*2)."' and floor='$floor' and id='$_GET[takeitem]'");
              $report="Вы нашли $taken[name].";
              adddelo($user["id"], "Получено в пещере: $rec[name] (id: $rec[id]).", 1);
            }
          } else {
            $destiny = 0;
            if (($it["item"] >= 2573 && $it["item"] <= 2576) || $it["item"] == 2589) {
                $destiny = 2;
            } 
            $taken=takeshopitem($it["item"], "$shop", "", $it["foronetrip"], $destiny, array("podzem"=>$it["podzem"], "incave"=>$it["incave"]), 0, 1, "Нашёл в пещере");
            if (@$taken["error"]) {
              $report=$taken["error"];
            } else {
              mq("delete from caveitems where leader='$user[caveleader]' and x='".($x*2)."' and y='".($y*2)."' and floor='$floor' and id='$_GET[takeitem]'");
              $report="Вы нашли $taken[name].";
            }
          }
        }
      }
    } else $report="Кто-то оказался быстрее...";
  }
  if (@$_GET["speak"]) {
    if ($dir==0) $x1=$x*2-2; elseif ($dir==2) $x1=$x*2+2; else $x1=$x*2;
    if ($dir==1) $y1=$y*2-2; elseif ($dir==3) $y1=$y*2+2; else $y1=$y*2;    
    $cell=$map[$y1][$x1];
    $tmp=explode("/", $cell);
    if ($tmp[0]=="d") {
      header("location: dialog.php?char=$tmp[2]");
      die;
    }
    if ($tmp[0]=="b" && isset($dialogs[$bots[$tmp[1]]])) {
      header("location: /podzem_dialog.php");
      die;
    }
  }

  if (@$_GET["attack"]) {
    if ($dir==0) {$by=$y*2; $bx=($x-1)*2;}
    if ($dir==1) {$by=($y-1)*2; $bx=$x*2;}
    if ($dir==2) {$by=$y*2; $bx=($x+1)*2;}
    if ($dir==3) {$by=($y+1)*2; $bx=$x*2;}
    $r=mq("select bot, cnt, battle from cavebots where leader='$user[caveleader]' and x=$bx and y=$by and floor='$floor'");
    $rec=mysqli_fetch_assoc($r);
    if ($rec) {
      include_once("questfuncs.php");
      $btl=$rec["battle"];
      if ($btl) {
        battlewithbot($bots[$rec["bot"]], "", "", 10, 0, 0, 0, 0, $btl);
      } else {        
        $firstbot=$bots[$rec[bot]];
        $otherbots=array();
        $rec["cnt"]--;
        while ($rec["cnt"]>0) {
          $otherbots[]=array("id"=>$bots[$rec["bot"]], "name"=>$botnames[$rec["bot"]]);
          $rec["cnt"]--;
        }
        while ($rec=mysqli_fetch_assoc($r)) {
          while ($rec["cnt"]>0) {
            $otherbots[]=array("id"=>$bots[$rec["bot"]], "name"=>$botnames[$rec["bot"]]);
            $rec["cnt"]--;
          }
        }
        $btl=battlewithbot($firstbot, "", "", 10, 0, 0, 0, 0, 0, $otherbots);
        mq("update cavebots set battle='$btl' where leader='$user[caveleader]' and x='$bx' and y=$by and floor='$floor'");
      }
    }
  }

  if ($user["room"]==61 && $x==14 && $y==15) {
    $finished=1;
    foreach ($party as $k=>$v) {
      if ($v["x"]!=$x || $v["y"]!=$y) $finished=0;
    }
    if (!$finished) $report="Вам необходимо всей командой собратся здесь.";
    else $report="Вы нашли выход из лабиринта.<br><br><a href=\"cave.php?exit=1\">Выйти</a>";
  }

  if (@$_GET["exit"]) {
    if ($user["room"]==61 && $x==14 && $y==15 && $finished) {
      include_once("questfuncs.php");
      if (LETTERQUEST) {
        $taken=takesmallitem(61);
        privatemsg("Вы нашли <b>$taken[name].</b>", $user["login"]);
      }
    }
    if (count($party)==1) {
      mq("delete from cavebots where leader='$user[id]'");
      mq("delete from caves where leader='$user[id]'");
      mq("delete from caveparties where leader='$user[id]'");
      mq("delete from caveitems where leader='$user[id]'");
      mq("update users set caveleader=0 where id='$user[id]'");
    } else {
      mq("lock tables users write, caveparties write, cavebots write, caves write, caveitems write, diseases write, caveeffects write");
      mq("delete from caveparties where user='$user[id]'");
      mq("update users set caveleader=0 where id='$user[id]'");
      if ($user["caveleader"]==$user["id"]) {
        foreach ($party as $k=>$v) {
          if ($v["user"]!=$user["id"]) {
            mq("update users set caveleader='$v[user]' where caveleader='$user[id]'");
            mq("update cavebots set leader='$v[user]' where leader='$user[id]'");
            mq("update caves set leader='$v[user]' where leader='$user[id]'");
            mq("update caveparties set leader='$v[user]' where leader='$user[id]'");
            mq("update caveitems set leader='$v[user]' where leader='$user[id]'");
          }
        }
      }
      mq("unlock tables");
    }
    $r=mq("select id, dressed from inventory where owner='$user[id]' and dressed=1 and foronetrip=1");
    while ($rec=mysqli_fetch_assoc($r)) {
      $slot=getslot($rec["id"]);
      if ($slot) dropitemid(0, $user["id"], $slot);
    }
    mq("delete from inventory where owner='$user[id]' and foronetrip=1");
    gotoroom($user["room"]-1);
  }
  $standingon=$map[$y*2][$x*2];
  foreach ($party as $k=>$v) {
    $map[$v["y"]*2][$v["x"]*2]="u/".$v["user"];
  }
?>
<head>
<link rel=stylesheet type="text/css" href="/i/main.css">
<style>
BODY {
  FONT-FAMILY: Verdana, Arial, Helvetica, sans-serif;
  font-size: 10px;
  margin: 0px 0px 0px 0px;

  scrollbar-face-color: #e3ac67;
  scrollbar-highlight-color: #e0c3a0;
  scrollbar-shadow-color: #b78d58;
  scrollbar-3dlight-color: #b78d58;
  scrollbar-arrow-color: #b78d58;
  scrollbar-track-color: #e0c3a0;
  scrollbar-darkshadow-color: #b78d58;
}
.menu {
  z-index: 100;
  background-color: #E4F2DF;
  border-style: solid; border-width: 2px; border-color: #77c3fc
  position: absolute;
  left: 0px;
  top: 0px;
  visibility: hidden;
  cursor:pointer;
}
a.menuItem {
border: 0px solid #000000;	
display: block;
font-family: Verdana, Arial;
font-size: 10pt;
font-weight: bold;

text-decoration: none;
}

a.menuItem:hover {
background-color: #d4cbaa;
color: #000000;
}

DIV.MoveLine{ width: 108px;height: 7px; size: 2px;font-size:2px; position: relative;overflow:hidden;}
IMG.MoveLine{ width:108px;height: 7px;border:0px solid;position:absolute;left:0px;top:0px }

.cw1 {position:absolute;left:0px;top:0px;width:352px;height:240px;background-image:url(<?=$base?>/cw1.gif?1)}
.cw2 {position:absolute;left:0px;top:0px;width:352px;height:240px;background-image:url(<?=$base?>/cw2.gif?1)}
.cw3 {position:absolute;left:0px;top:0px;width:352px;height:240px;background-image:url(<?=$base?>/cw3.gif?1)}
.cw4 {position:absolute;left:0px;top:0px;width:352px;height:240px;background-image:url(<?=$base?>/cw4.gif?1)}
.cw5 {position:absolute;left:0px;top:0px;width:352px;height:240px;background-image:url(<?=$base?>/cw5.gif?1)}

.lw0 {position:absolute;left:0px;top:0px;width:352px;height:240px;background-image:url(<?=$base?>/lw0.gif)}
.lw1 {position:absolute;left:0px;top:0px;width:352px;height:240px;background-image:url(<?=$base?>/lw1.gif)}
.lw2 {position:absolute;left:0px;top:0px;width:352px;height:240px;background-image:url(<?=$base?>/lw2.gif)}
.lw3 {position:absolute;left:0px;top:0px;width:352px;height:240px;background-image:url(<?=$base?>/lw3.gif)}
.lw4 {position:absolute;left:0px;top:0px;width:352px;height:240px;background-image:url(<?=$base?>/lw4.gif)}

.rw0 {position:absolute;left:0px;top:0px;width:352px;height:240px;background-image:url(<?=$base?>/rw0.gif)}
.rw1 {position:absolute;left:0px;top:0px;width:352px;height:240px;background-image:url(<?=$base?>/rw1.gif)}
.rw2 {position:absolute;left:0px;top:0px;width:352px;height:240px;background-image:url(<?=$base?>/rw2.gif)}
.rw3 {position:absolute;left:0px;top:0px;width:352px;height:240px;background-image:url(<?=$base?>/rw3.gif)}
.rw4 {position:absolute;left:0px;top:0px;width:352px;height:240px;background-image:url(<?=$base?>/rw4.gif)}

.lsw0 {position:absolute;left:0px;top:0px;width:352px;height:240px;background-image:url(<?=$base?>/lsw0.gif)}
.lsw1 {position:absolute;left:0px;top:0px;width:352px;height:240px;background-image:url(<?=$base?>/lsw1.gif)}
.lsw2 {position:absolute;left:0px;top:0px;width:352px;height:240px;background-image:url(<?=$base?>/lsw2.gif)}
.lsw3 {position:absolute;left:0px;top:0px;width:352px;height:240px;background-image:url(<?=$base?>/lsw3.gif)}
.lsw4 {position:absolute;left:0px;top:0px;width:352px;height:240px;background-image:url(<?=$base?>/lsw4.gif)}
.lsw42 {position:absolute;left:0px;top:0px;width:352px;height:240px;background-image:url(<?=$base?>/lsw42.gif)}

.rsw0 {position:absolute;left:0px;top:0px;width:352px;height:240px;background-image:url(<?=$base?>/rsw0.gif)}
.rsw1 {position:absolute;left:0px;top:0px;width:352px;height:240px;background-image:url(<?=$base?>/rsw1.gif)}
.rsw2 {position:absolute;left:0px;top:0px;width:352px;height:240px;background-image:url(<?=$base?>/rsw2.gif)}
.rsw3 {position:absolute;left:0px;top:0px;width:352px;height:240px;background-image:url(<?=$base?>/rsw3.gif)}
.rsw4 {position:absolute;left:0px;top:0px;width:352px;height:240px;background-image:url(<?=$base?>/rsw4.gif)}
.rsw42 {position:absolute;left:0px;top:0px;width:352px;height:240px;background-image:url(<?=$base?>/rsw42.gif)}

.lw42 {position:absolute;left:0px;top:0px;width:352px;height:240px;background-image:url(<?=$base?>/lw42.gif)}
.rw42 {position:absolute;left:0px;top:0px;width:352px;height:240px;background-image:url(<?=$base?>/rw42.gif)}

.maptd {width:15px;height:15px}

</style>
<script>
var Hint3Name = '';
// Заголовок, название скрипта, имя поля с логином
function closehint3() {
  document.getElementById("hint3").style.visibility='hidden';
}
function findlogin(title, script, name){
  document.getElementById("hint3").innerHTML = '<form action="'+script+'" method=post><table width=100% cellspacing=1 cellpadding=0 bgcolor=CCC3AA><tr><td align=center><B>'+title+'</td><td width=20 align=right valign=top style="cursor: pointer" onclick="closehint3();"><BIG><B>x</td></tr><tr><td colspan=2>'+
  '<table width=100% cellspacing=0 cellpadding=2 bgcolor=FFF6DD><tr><INPUT TYPE=hidden name=sd4 value="6"><td colspan=2>'+
  'Укажите логин персонажа:<small><BR>(можно щелкнуть по логину в чате)</TD></TR><TR><TD width=50% align=right><INPUT TYPE=text NAME="'+name+'"></TD><TD width=50%><INPUT TYPE="submit" value=" »» "></TD></TR></TABLE></td></tr></table></form>';
  document.getElementById("hint3").style.visibility = "visible";
  document.getElementById("hint3").style.left = 100;
  document.getElementById("hint3").style.top = 100;
  Hint3Name = name;
  document.all(name).focus();
}

function attackmenu(e){
         var el, x, y;
         el = document.getElementById("oMenu");
         x = event.clientX + document.documentElement.scrollLeft +document.body.scrollLeft - 5;
         y = event.clientY + document.documentElement.scrollTop + document.body.scrollTop-5;
         if (event.clientY + 72 > document.body.clientHeight) { y-=62 } else { y-=2 }
  el.innerHTML = '<a class=menuItem onmouseout="this.className=\'menuItem\';" onmouseover="this.className=\'menuItem2\';" onclick="this.disabled = true;document.location.href=\'cave.php?attack=1<?="&",time()?>\';"> Напасть </a>';

         el.style.left = x + "px";
         el.style.top  = y + "px";
         el.style.visibility = "visible";
}

function speakmenu(e){
  var el, x, y;
  el = document.getElementById("oMenu");
  var posx = 0;
  var posy = 0;
  if (!e) var e = window.event;
  if (e.pageX || e.pageY) {
    posx = e.pageX;
    posy = e.pageY;
  } else if (e.clientX || e.clientY) {
    posx = e.clientX + document.body.scrollLeft;
    posy = e.clientY + document.body.scrollTop;
  }
  el.innerHTML = '<div style="color:#000;font-size:14px;padding:5px 10px 5px 10px" class=menuItem onmouseout="this.className=\'menuItem\';" onmouseover="this.className=\'menuItem2\';" onclick="this.disabled =  true;document.location.href=\'cave.php?speak=1\';closeMenu(event);"> <b>Говорить</b> </div>';

  el.style.left = posx + "px";
  el.style.top  = posy + "px";
  el.style.visibility = "visible";
}

function speakattackmenu(e){
  var el, x, y;
  el = document.getElementById("oMenu");
  el2 = document.getElementById("oMenu2");
  var posx = 0;
  var posy = 0;
  if (!e) var e = window.event;
  if (e.pageX || e.pageY) {
    posx = e.pageX;
    posy = e.pageY;
  } else if (e.clientX || e.clientY) {
    posx = e.clientX + document.body.scrollLeft;
    posy = e.clientY + document.body.scrollTop;
  }
  
  el.innerHTML = '<a class=menuItem onmouseout="this.className=\'menuItem\';" onmouseover="this.className=\'menuItem2\';" onclick="this.disabled = true;document.location.href=\'cave.php?attack=1<?="&",time()?>\';"> Напасть </a>';
  el.style.left = posx + "px";
  el.style.top  = posy + "px";
  el.style.visibility = "visible";
  
  el2.innerHTML = '<a class=menuItem onmouseout="this.className=\'menuItem\';" onmouseover="this.className=\'menuItem2\';" onclick="this.disabled =  true;document.location.href=\'cave.php?speak=1\';closeMenu(event);"> Говорить </a>';
  el2.style.left = posx + "px";
  el2.style.top  = posy + 33 + "px";
  el2.style.visibility = "visible";
}

</script>
</head>
<body style="margin:0px" bgcolor="#d7d7d7">
<div id=hint3 class=ahint></div>
<div style="z-index: 100;  background-color: #E4F2DF;  border-style: solid; border-width: 2px; border-color: #77c3fc; position: absolute;  left: 0px;  top: 0px;  visibility: hidden;  cursor:pointer;" id="oMenu"></div>
<div style="z-index: 100;  background-color: #E4F2DF;  border-style: solid; border-width: 2px; border-color: #77c3fc; position: absolute;  left: 0px;  top: 0px;  visibility: hidden;  cursor:pointer;" id="oMenu2"></div>
<?
  if ($user["hp"]<=0) {
    makedeath();
  }
  function drawmap($map1, $players, $x, $y, $direction) {
    global $base, $user, $botnames, $imgdata;
    $startx=max($x*2-8,0);
    $starty=max($y*2-8,0);
    if ($direction==0) {
      $x1=$x*2+2;
      $x2=$x*2-8;
      $y1=$y*2+3;
      $y2=$y*2-4;
    }
    if ($direction==2) {
      $x1=$x*2-2;
      $x2=$x*2+8;
      $y1=$y*2-3;
      $y2=$y*2+4;
    }
    if ($direction==1) {
      $x1=$x*2-3;
      $x2=$x*2+4;
      $y1=$y*2+2;
      $y2=$y*2-8;
    }
    if ($direction==3) {
      $x1=$x*2+3;
      $x2=$x*2-4;
      $y1=$y*2-2;
      $y2=$y*2+8;
    }
    if ($x1<$x2) $dx=1; else $dx=-1;
    if ($y1<$y2) $dy=1; else $dy=-1;
    $x0=0;
    if ($direction%2==1) {
      $sy1=$y1;
      while ($x1!=$x2) {
        $y1=$sy1;
        $y0=-2;
        while ($y1!=$y2) {
          if ($map1[$y1][$x1]==2) $sq=0;
          elseif (isset($map1[$y1][$x1])) $sq=$map1[$y1][$x1];
          else $sq=0;
          $map[$x0][$y0]=$sq;
          $y1+=$dy;
          $y0++;
        }
        $x0++;
        $x1+=$dx;
      }
    } else {
      $sx1=$x1;
      while ($y1!=$y2) {
        $x1=$sx1;
        $x0=-2;
        while ($x1!=$x2) {
          if ($map1[$y1][$x1]==2) $sq=0;
          elseif (isset($map1[$y1][$x1])) $sq=$map1[$y1][$x1];
          else $sq=0;
          $map[$y0][$x0]=$sq;
          $x1+=$dx;
          $x0++;
        }
        $y0++;
        $y1+=$dy;
      }
    }

    $ret="<div style=\"width:530px;height:260px;background-image:url($base/podzem.jpg);background-repeat:no-repeat;overflow:hidden\">
    <table cellspacing=0 cellpadding=0><tr><td style=\"padding-left:10px;padding-top:10px\">
      <div style=\"position:relative;width:354px;height:239px;overflow:hidden;\">";

    $i=7;
    $centerwall=8;
    while ($i>0) {
      if ($map[3][$i]) $centerwall=$i;
      $i-=2;
    }
    $i=4;
    function drawbot($cell, $x, $y) {
      global $botnames, $imgdata, $bots, $dialogs, $user, $floor;
      $data=explode("/", $cell);
      $i=1;
      $bc=(count($data)-1)/2;
      while ($data[$i]) {
        $bot=$data[$i];
        $botname=$botnames[$bot];
        $cnt=$data[$i+1];
        if ($i==1) {
          if ($bc==1) $bn=1;
          else $bn=0;
        } elseif ($i==3) {
          if ($bc==2) $bn=2;
          else $bn=1;
        } else $bn=2;
            $aMap = unserialize(db_result(db_query("SELECT map FROM caves WHERE leader='$user[caveleader]' AND floor='$floor'"), 0, 0));
            if (!$GLOBALS['dir']) {
                $xx = ($GLOBALS['x'] * 2) - ($y*2);
                $yy = ($GLOBALS['y'] * 2) - ($x - 3);
            } elseif ($GLOBALS['dir'] == 1) {
                $xx = ($GLOBALS['x'] * 2) + ($x - 3);
                $yy = ($GLOBALS['y'] * 2) - ($y*2);
            } elseif ($GLOBALS['dir'] == 2) {
                $xx = ($GLOBALS['x'] * 2) + ($y * 2);
                $yy = ($GLOBALS['y'] * 2) + ($x - 3);
            } else {
                $xx = ($GLOBALS['x'] * 2) - ($x - 3);
                $yy = ($GLOBALS['y'] * 2) + ($y * 2);
            }
            if (strpos($aMap[$yy][$xx], 'o/') !== false || strpos($aMap[$yy][$xx], 'p/') !== false) {
              $ret .= drawobject2($aMap[$yy][$xx], $x, $y);
            }
        if ($user['align'] == 2.5) {
            if (isset($dialogs[$bots[$data[1]]]) && $bots[$data[1]] != 11111) {
                $ret.="<img title=\"$botname".($cnt>1?" ($cnt)":"")."\" ".($y==1 && $x==3?"onclick=\"speakattackmenu(event);\"":"")." width=\"".$imgdata[$x][$y]["wd"]."\" height=\"".$imgdata[$x][$y]["ht"]."\" src=\"<?=IMG_PATH?>/cave/mobs/".$user['room']."/$bot.gif\" style=\"position:absolute;left:".$imgdata[$x][$y]["x"][$bn]."px;top:".$imgdata[$x][$y]["y"]."px;".($x==3 && $y==1?"cursor:pointer;":"").($x==3?"z-index:".(99-($y*5)).";":"")."\">";
            } else {
                $ret.="<img title=\"$botname".($cnt>1?" ($cnt)":"")."\" ".($y==1 && $x==3?"onclick=\"attackmenu(event);\"":"")." width=\"".$imgdata[$x][$y]["wd"]."\" height=\"".$imgdata[$x][$y]["ht"]."\" src=\"<?=IMG_PATH?>/cave/mobs/".$user['room']."/$bot.gif\" style=\"position:absolute;left:".$imgdata[$x][$y]["x"][$bn]."px;top:".$imgdata[$x][$y]["y"]."px;".($x==3 && $y==1?"cursor:pointer;":"").($x==3?"z-index:".(99-($y*5)).";":"")."\">";
            }
        } else {
            if (isset($dialogs[$bots[$data[1]]]) && ($bots[$data[1]] == 24 && $user['room'] == 501)) {
                $ret.="<img title=\"$botname".($cnt>1?" ($cnt)":"")."\" ".($y==1 && $x==3?"onclick=\"speakattackmenu(event);\"":"")." width=\"".$imgdata[$x][$y]["wd"]."\" height=\"".$imgdata[$x][$y]["ht"]."\" src=\"<?=IMG_PATH?>/cave/mobs/".$user['room']."/$bot.gif\" style=\"position:absolute;left:".$imgdata[$x][$y]["x"][$bn]."px;top:".$imgdata[$x][$y]["y"]."px;".($x==3 && $y==1?"cursor:pointer;":"").($x==3?"z-index:".(99-($y*5)).";":"")."\">";
            } else {
                $ret.="<img title=\"$botname".($cnt>1?" ($cnt)":"")."\" ".($y==1 && $x==3?"onclick=\"attackmenu(event);\"":"")." width=\"".$imgdata[$x][$y]["wd"]."\" height=\"".$imgdata[$x][$y]["ht"]."\" src=\"<?=IMG_PATH?>/cave/mobs/".$user['room']."/$bot.gif\" style=\"position:absolute;left:".$imgdata[$x][$y]["x"][$bn]."px;top:".$imgdata[$x][$y]["y"]."px;".($x==3 && $y==1?"cursor:pointer;":"").($x==3?"z-index:".(99-($y*5)).";":"")."\">";
            }
        }
        $i+=2;
      }
      return $ret;
    }

    function drawdialog($cell, $x, $y) {
      global $dialogs, $imgdata;
      $data=explode("/", $cell);
      $i=1;
      $d=$data[2];

      $bot=$data[$i];
      $botname=$botnames[$bot];
      $cnt=$data[$i+1];
                                 
      $ret="<img title=\"".$dialogs[$d]."\" ".($x==3 && $y==1?"onclick=\"speakmenu(event);\"":"")." width=\"".$imgdata[$x][$y]["wd"]."\" height=\"".$imgdata[$x][$y]["ht"]."\" src=\"/i/dungeon/npcs/$d.gif\" style=\"position:absolute;left:".$imgdata[$x][$y]["x"][1]."px;top:".$imgdata[$x][$y]["y"]."px;".($x==3 && $y==1?"cursor:pointer;":"").($x==3?"z-index:".(99-($y*5)).";":"")."\">";
      return $ret;
    }
    function drawuser($cell, $x, $y) {
      global $botnames, $imgdata, $party;
      $data=explode("/", $cell);
      $i=1;
      $bc=(count($data)-1);
      while ($data[$i]) {
        $u=$data[$i];
        if ($i==1) {
          if ($bc==1) $bn=1;
          else $bn=0;
        } elseif ($i==3) {
          if ($bc==2) $bn=2;
          else $bn=1;
        } else $bn=2;
        foreach ($party as $k=>$v) {
          if ($v["user"]==$u) {
            $udata=$v;
            break;
          }
        }
        $ret.="<img title=\"$udata[login]\" width=\"".$imgdata[$x][$y]["wd"]."\" height=\"".$imgdata[$x][$y]["ht"]."\" src=\"<?=IMG_PATH?>/shadow/cave_".$udata["shadow"]."\" style=\"position:absolute;left:".$imgdata[$x][$y]["x"][$bn]."px;top:".$imgdata[$x][$y]["y"]."px;".($x==3?"z-index:".(99-($y*5)).";":"")."\">";
        $i++;
      }
      return $ret;
    }

    function drawobject($cell, $x, $y) {
      global $objects, $imgdata, $user, $objdata, $objsizes, $imgmap;
      $tmp=explode("/", $cell);
      if ($user["room"]==74 || $user["room"]==91 || $user["room"]==76 || $user["room"]==78 || $user["room"]==83) {
        $obj=$tmp[2];
      } else $obj=$tmp[1];
      $ht=round($imgdata[$x][$y]["ht"]/2);
      if (@$objsizes[$obj]) {
        $coef=$objdata[$x][$y]["coef"];
        $wd=$objsizes[$obj][0]*$coef;
        $ht=$objsizes[$obj][1]*$coef;
        $left=round($objdata[$x][$y]["x"]-($wd/2));
        $top=$objdata[$x][$y]["y"]-$ht;
      } elseif ($obj==510) {
        $wd=round($imgdata[$x][$y]["wd"]*2.5);
        $ht=$imgdata[$x][$y]["ht"];
        $left=$imgdata[$x][$y]["x"][1]-round(($wd-$imgdata[$x][$y]["wd"])/2);
        $top=$imgdata[$x][$y]["y"];
      } elseif ($obj>600 && $obj<700) {
        $wd=round($imgdata[$x][$y]["wd"]*1.26);
        $left=$imgdata[$x][$y]["x"][1]-round(($wd-$imgdata[$x][$y]["wd"])/2);
        $top=$imgdata[$x][$y]["y"]+$ht;
      } elseif ($obj>=700 && $obj<800) {
        $wd=round($imgdata[$x][$y]["wd"]*1.24);
        $ht=$imgdata[$x][$y]["ht"];
        $left=$imgdata[$x][$y]["x"][1]-round(($wd-$imgdata[$x][$y]["wd"])/2);
        $top=$imgdata[$x][$y]["y"];
      } else {
        $wd=$imgdata[$x][$y]["wd"];
        $left=$imgdata[$x][$y]["x"][1];
        $top=$imgdata[$x][$y]["y"]+$ht;
      }
      if (!isset($imgmap[$obj])) {
        $ret.="
        ".($y==1 && $x==3?"<a href=\"cave.php?useitem=1\">":"")." 
        <img border=\"0\" title=\"$objects[$obj]\" width=\"$wd\" height=\"$ht\" src=\"<?=IMG_PATH?>/cave/objects/".$user['room']."/$obj.gif?1\" style=\"position:absolute;left:{$left}px;top:{$top}px;".($x==3?"z-index:".(99-($y*5)).";":"")."\">
        ".($y==1 && $x==3?"</a>":"");
      } else {
        $ret.="<img usemap=\"#" . $imgmap[$obj]['name'] . "\" border=\"0\" title=\"$objects[$obj]\" width=\"$wd\" height=\"$ht\" src=\"<?=IMG_PATH?>/cave/objects/".$user['room']."/$obj.gif?1\" style=\"position:absolute;left:{$left}px;top:{$top}px;".($x==3?"z-index:".(99-($y*5)).";":"")."\">";
        $ret.=$imgmap[$obj]['code'];
      }
      return $ret;      
    }
    
    function drawobject2($cell, $x, $y) {
      global $objects, $imgdata, $user, $objdata, $objsizes, $imgmap;
      $tmp=explode("/", $cell);
      if ($user["room"]==74 || $user["room"]==91 || $user["room"]==76 || $user["room"]==78 || $user["room"]==83) {
        $obj=$tmp[2];
      } else $obj=$tmp[1];
      $ht=round($imgdata[$x][$y]["ht"]/2);
      if (@$objsizes[$obj]) {
        $coef=$objdata[$x][$y]["coef"];
        $wd=$objsizes[$obj][0]*$coef;
        $ht=$objsizes[$obj][1]*$coef;
        $left=round($objdata[$x][$y]["x"]-($wd/2));
        $top=$objdata[$x][$y]["y"]-$ht;
      } elseif ($obj==510) {
        $wd=round($imgdata[$x][$y]["wd"]*2.5);
        $ht=$imgdata[$x][$y]["ht"];
        $left=$imgdata[$x][$y]["x"][1]-round(($wd-$imgdata[$x][$y]["wd"])/2);
        $top=$imgdata[$x][$y]["y"];
      } elseif ($obj>600 && $obj<700) {
        $wd=round($imgdata[$x][$y]["wd"]*1.26);
        $left=$imgdata[$x][$y]["x"][1]-round(($wd-$imgdata[$x][$y]["wd"])/2);
        $top=$imgdata[$x][$y]["y"]+$ht;
      } elseif ($obj>=700 && $obj<800) {
        $wd=round($imgdata[$x][$y]["wd"]*1.24);
        $ht=$imgdata[$x][$y]["ht"];
        $left=$imgdata[$x][$y]["x"][1]-round(($wd-$imgdata[$x][$y]["wd"])/2);
        $top=$imgdata[$x][$y]["y"];
      } else {
        $wd=$imgdata[$x][$y]["wd"];
        $left=$imgdata[$x][$y]["x"][1];
        $top=$imgdata[$x][$y]["y"]+$ht;
      }
      if (!isset($imgmap[$obj])) {
        $ret.="
        ".($y==1 && $x==3?"<a href=\"cave.php?useitem=1\">":"")." 
        <img border=\"0\" title=\"$objects[$obj]\" width=\"$wd\" height=\"$ht\" src=\"<?=IMG_PATH?>/cave/objects/".$user['room']."/$obj.gif?1\" style=\"position:absolute;left:{$left}px;top:{$top}px;".($x==3?"z-index:".(99-($y*5)-1).";":"")."\">
        ".($y==1 && $x==3?"</a>":"");
      } else {
        $ret.="<img usemap=\"#" . $imgmap[$obj]['name'] . "\" border=\"0\" title=\"$objects[$obj]\" width=\"$wd\" height=\"$ht\" src=\"<?=IMG_PATH?>/cave/objects/".$user['room']."/$obj.gif?1\" style=\"position:absolute;left:{$left}px;top:{$top}px;".($x==3?"z-index:".(99-($y*5)-1).";":"")."\">";
        $ret.=$imgmap[$obj]['code'];
      }
      return $ret;      
    }

    function drawevent($cell, $x, $y) {
      global $events, $eventdata;
      $tmp=explode("/", $cell);
      $obj=$tmp[1];
      if ($obj==1) return "";
      $wd=round($eventdata[$x][$y]["q"]*$events[$obj]["w"]);
      $ht=round($eventdata[$x][$y]["q"]*$events[$obj]["h"]);
      $left=round(-$events[$obj]["h"]/2+$eventdata[$x][$y]["x"]);
                                       
      $top=round($eventdata[$x][$y]["y"]-$events[$obj]["h"]);
      $ret.="
      <img border=\"0\" title=\"".$events[$obj]["name"]."\" width=\"$wd\" height=\"$ht\" src=\"/i/dungeon/events/$obj.gif\" style=\"position:absolute;left:{$left}px;top:{$top}px;".($x==3?"z-index:".(99-($y*5)).";":"")."\">";
      return $ret;
      
    }
    while ($i>=0) {
      if ($i==4) {
        if ($map[0][7]) $ret.="<div class=\"lw{$i}2\"></div>";
        if ($map[0][6]) $ret.="<div class=\"lsw{$i}2\"></div>";        
        if ($map[-1][6]) $ret.="<img width=\"37\" height=\"78\" src=\"<?=IMG_PATH?>/cave/mobs/".$user['room']."/".$map[-1][6].".gif\" style=\"position:absolute;left:-20px;top:60px\">";
      }
      $wall=$i*2-1;
      $sidewall=$i*2;
      if ($map[1][$sidewall] && $i>0) {
        $obj=substr($map[1][$sidewall],0,1);
        if ($obj=="b") {
          $ret.=drawbot($map[1][$sidewall],  1, $i);
        } elseif ($obj=="u") {
          $ret.=drawuser($map[1][$sidewall],  1, $i, $players);
        } elseif ($obj=="o" || $obj=="p") {
          $ret.=drawobject($map[1][$sidewall],  1, $i);          
        } elseif ($obj=="e") {
          $ret.=drawevent($map[1][$sidewall],  1, $i);          
        } elseif ($obj=="d") {
          $ret.=drawdialog($map[1][$sidewall],  1, $i);          
        } elseif ($obj!="s") {
          $o=$map[1][$sidewall]-10000;
          if ($o==4) {
            if ($i==1) $ret.="<img width=\"106\" height=\"101\" src=\"/i/dungeon/objects/$o.gif\" style=\"position:absolute;left:-42px;top:90px\">";
            if ($i==2) $ret.="<img width=\"86\" height=\"84\" src=\"/i/dungeon/objects/$o.gif\" style=\"position:absolute;left:137px;top:90px\">";
            if ($i==3) $ret.="<img width=\"65\" height=\"63\" src=\"/i/dungeon/objects/$o.gif\" style=\"position:absolute;left:152px;top:87px\">";
          } else {
            if ($i==1) $ret.="<img width=\"65\" height=\"80\" src=\"/i/dungeon/objects/$o.gif\" style=\"position:absolute;left:0px;top:110px\">";
            if ($i==2) $ret.="<img width=\"43\" height=\"56\" src=\"/i/dungeon/objects/$o.gif\" style=\"position:absolute;left:17px;top:90px\">";
            if ($i==3) $ret.="<img width=\"32\" height=\"40\" src=\"/i/dungeon/objects/$o.gif\" style=\"position:absolute;left:17px;top:100px\">";
          }
        }
      }
      if ($map[5][$sidewall] && $i>0) {
        $obj=substr($map[5][$sidewall],0,1);
        if ($obj=="b") {
          $ret.=drawbot($map[5][$sidewall],  5, $i);
        } elseif ($obj=="u") {
          $ret.=drawuser($map[5][$sidewall],  5, $i, $players);
        } elseif ($obj=="o" || $obj=="p") {
          $ret.=drawobject($map[5][$sidewall],  5, $i);
        } elseif ($obj=="e") {
          $ret.=drawevent($map[5][$sidewall],  5, $i);
        } elseif ($obj=="d") {
          $ret.=drawdialog($map[5][$sidewall],  5, $i);
        } elseif ($obj!="s") {
          $o=$map[5][$sidewall]-10000;
          if ($o==4) {
            if ($i==1) $ret.="<img width=\"106\" height=\"101\" src=\"/i/dungeon/objects/$o.gif\" style=\"position:absolute;left:302px;top:90px\">";
            if ($i==2) $ret.="<img width=\"86\" height=\"84\" src=\"/i/dungeon/objects/$o.gif\" style=\"position:absolute;left:137px;top:90px\">";
            if ($i==3) $ret.="<img width=\"65\" height=\"63\" src=\"/i/dungeon/objects/$o.gif\" style=\"position:absolute;left:152px;top:87px\">";
          } else {
            if ($i==1) $ret.="<img width=\"65\" height=\"80\" src=\"/i/dungeon/objects/$o.gif\" style=\"position:absolute;left:320px;top:90px\">";
            if ($i==2) $ret.="<img width=\"43\" height=\"56\" src=\"/i/dungeon/objects/$o.gif\" style=\"position:absolute;left:300px;top:100px\">";
            if ($i==3) $ret.="<img width=\"32\" height=\"40\" src=\"/i/dungeon/objects/$o.gif\" style=\"position:absolute;left:317px;top:110px\">";
          }
        }
      }
      if ($i>0 && $map[1][$wall]) $ret.="<div class=\"lw$i\"></div>";
      
      $objInWall = explode('/', $map[4][$sidewall]);
      if ($objInWall[1] == 'o') {
        if(!passablewall($map[4][$sidewall])) $ret.="<div  style=\"position:absolute;left:0px;top:0px;width:352px;height:240px;background-image:url($base/rsw$i$objInWall[2].gif)\"></div>";  
      } else {
        if(!passablewall($map[4][$sidewall])) $ret.="<div class=\"rsw$i\"></div>";
      }
      $objInWall = explode('/', $map[2][$sidewall]);
      if ($objInWall[1] == 'o') {
        if(!passablewall($map[2][$sidewall])) $ret.="<div  style=\"position:absolute;left:0px;top:0px;width:352px;height:240px;background-image:url($base/lsw$i$objInWall[2].gif)\"></div>";  
      } else {
        if(!passablewall($map[2][$sidewall])) $ret.="<div class=\"lsw$i\"></div>";
      }
      if ($i>0 && $map[5][$wall]) $ret.="<div class=\"rw$i\"></div>";
      
      if ($map[3][$sidewall] && $i>0 && $sidewall<$centerwall) {
        $obj=substr($map[3][$sidewall],0,1);
        if ($obj=="b") {        
          $ret.=drawbot($map[3][$sidewall],  3, $i);
        } elseif ($obj=="u") {
          $ret.=drawuser($map[3][$sidewall],  3, $i, $players);
        } elseif ($obj=="o" || $obj=="p") {
          $ret.=drawobject($map[3][$sidewall],  3, $i);          
        } elseif ($obj=="e") {
          $ret.=drawevent($map[3][$sidewall],  3, $i);          
        } elseif ($obj=="d") {
          $ret.=drawdialog($map[3][$sidewall],  3, $i);          
        } elseif ($obj!="s") {
          $o=$map[3][$sidewall]-10000;
          if ($o==4) {
            if ($i==1) $ret.="<img width=\"130\" height=\"126\" src=\"/i/dungeon/objects/$o.gif\" style=\"position:absolute;left:112px;top:80px\">";
            if ($i==2) $ret.="<img width=\"86\" height=\"84\" src=\"/i/dungeon/objects/$o.gif\" style=\"position:absolute;left:137px;top:90px\">";
            if ($i==3) $ret.="<img width=\"65\" height=\"63\" src=\"/i/dungeon/objects/$o.gif\" style=\"position:absolute;left:147px;top:87px\">";
          } else {
            if ($i==1) $ret.="<a style=\"position:absolute;left:157px;top:110px;z-index:100\" href=\"cave.php?useitem=1\"><img border=\"0\" width=\"65\" height=\"80\" src=\"/i/dungeon/objects/$o.gif\"></a>";
            if ($i==2) $ret.="<img width=\"43\" height=\"56\" src=\"/i/dungeon/objects/$o.gif\" style=\"position:absolute;left:157px;top:105px\">";
            if ($i==3) $ret.="<img width=\"32\" height=\"40\" src=\"/i/dungeon/objects/$o.gif\" style=\"position:absolute;left:157px;top:100px\">";
          }
        }
      }
      if ($map[3][$wall]) {
        if ($i>0) $ret.="<div class=\"cw$i\" ".($map[3][$wall]>2?"style=\"background-image:url('$base/cw$i".cavewall($map[3][$wall]).".gif')\"":"")."></div>";
        if ($i==1 && $map[3][$wall]>2) {
          if ($map[3][$wall]>1000) {
            $ret.="<a style=\"position:absolute;z-index:99;left:150px;top:35px\" href=\"cave.php?usewallitem=1&".time()."\"><img border=\"0\" src=\"".IMGBASE."/i/empty.gif\" width=\"45\" height=\"100\"></a>";
          } elseif ($map[3][$wall]>100) {
            $ret.="<a style=\"position:absolute;z-index:99;left:150px;top:85px\" href=\"cave.php?usewallitem=1\"><img border=\"0\" src=\"".IMGBASE."/i/empty.gif\" width=\"100\" height=\"55\"></a>";
          } else $ret.="<a style=\"position:absolute;z-index:99;left:60px;top:113px\" href=\"cave.php?usewallitem=1\"><img border=\"0\" src=\"".IMGBASE."/i/empty.gif\" width=\"128\" height=\"55\"></a>";
        }
        $objInWall = explode('/', $map[3][$wall]);
        if ($objInWall[1] == "o") {
          if ($user['room'] == 83 && !(!$direction && (($x == 13 && $y == 4) || ($x == 12 && $y == 4)))) { // исключение 2-ух клеток в комнате 82
            $ret.=drawobject('//' . $objInWall[2], 3, $i);
          }
        }
        $nocenter=1;
      }
      if ($i==4) {
        if ($map[7][6]) $ret.="<img width=\"37\" height=\"78\" src=\"<?=IMG_PATH?>/cave/mobs/".$user['room']."/".$map[7][6].".gif\" style=\"position:absolute;left:330px;top:60px\">";
      }
      $i--;
    }
    
    $ret.="</div>
    </td><td valign=\"top\">
    <div style=\"height:116px;position:relative\">
    <div style=\"padding-top:11px;padding-left:33px\">
    <DIV class=\"MoveLine\"><IMG src=\"/i/move/wait3.gif\" id=\"MoveLine\" class=\"MoveLine\"></DIV>
    <div style=\"visibility:hidden; height:0px\" id=\"moveto\">0</div>
    </div>";

    if ($direction==0) {
      $forwardlink="?move=x2&".time();
      $backlink="?move=x1&".time();
      $leftlink="?move=y1&".time();
      $rightlink="?move=y2&".time();
    }
    if ($direction==2) {
      $forwardlink="?move=x1&".time();
      $backlink="?move=x2&".time();
      $leftlink="?move=y2&".time();
      $rightlink="?move=y1&".time();
    }
    if ($direction==1) {
      $forwardlink="?move=y2&".time();
      $backlink="?move=y1&".time();
      $leftlink="?move=x2&".time();
      $rightlink="?move=x1&".time();
    }
    if ($direction==3) {
      $forwardlink="?move=y1&".time();
      $backlink="?move=y2&".time();
      $leftlink="?move=x1&".time();
      $rightlink="?move=x2&".time();
    }
    if (passablewall($map[3][1]) && canmoveto($map[3][2])) $ret.="<div style='position:absolute; left:65px; top:38px;'><a onClick=\"return check('m1');\" id=\"m1\" href=\"$forwardlink\"><img src=\"/i/dungeon/forward.gif\"  border=\"0\" /></a></div>";
    if (passablewall($map[3][-1]) && canmoveto($map[3][-2])) $ret.="<div style='position:absolute; left:65px; top:84px;'><a onClick=\"return check('m5');\" id=\"m5\" href=\"$backlink\"><img src=\"/i/dungeon/back.gif\" border=\"0\" /></a></div>";
    if (passablewall($map[2][0]) && canmoveto($map[1][0])) $ret.="<div style='position:absolute; left:17px; top:49px;'><a onClick=\"return check('m7');\" id=\"m7\" href=\"$leftlink\"><img src=\"/i/dungeon/left.gif\" border=\"0\" /></a></div>";
    if (passablewall($map[4][0]) && canmoveto($map[5][0])) $ret.="<div style='position:absolute; left:127px; top:48px;'><a onClick=\"return check('m3');\" id=\"m3\" href=\"$rightlink\"><img src=\"/i/dungeon/right.gif\" border=\"0\" /></a></div>";
?>
<script type="text/javascript">
    try{
        document.onkeydown = NavigateThrough;
        function NavigateThrough (e)
        {
            code=event.keyCode ? event.keyCode : event.which ? event.which : null;
            //Идти вперед на кнопки W Стрелка вперед и 8
            if (code==104 || code==38 || code==87){
                document.location = "<?=$forwardlink?>";			
            }
            //Идти влево на кнопках
            if(code==100 || code==37 || code==65){
				document.location = "<?=$leftlink?>";
			}
			//идти вправо на кнопках
            if(code==102 || code==39 || code==68){
				document.location = "<?=$rightlink?>";
			}
			//Идти назад на кнопках
            if(code==98 || code==40 || code==83){
				document.location = "<?=$backlink?>";
			}
        }
    }
	
	catch(e){}
</script>	
<?
    $ret.="<div style='position:absolute; left:37px; top:37px;'><a href=\"?direction=".($direction==0?3:$direction-1)."&".time()."\" title=\"Поворот налево\"><img src=\"/i/dungeon/turnleft.gif\" width=\"22\" height=\"20\" border=\"0\" /></a></div>";

    $ret.="<div style='position:absolute; left:112px; top:37px;'><a href=\"?direction=".(($direction+1)%4)."&".time()."\" title=\"Поворот направо\"><img src=\"/i/dungeon/turnright.gif\" width=\"21\" height=\"20\" border=\"0\" /></a></div>";

    $ret.="<div style='position:absolute; left:66px; top:62px;'><a href=\"$_SERVER[PHP_SELF]\"><img src=\"/i/dungeon/ref.gif\" border=\"0\"/></a></div>";
    $ret.="</div>
    <div style=\"margin-left:20px;position:relative\">";

    foreach ($players as $k=>$v) {
      if ($v["x"]-($startx/2)>=0 && $v["x"]-($startx/2)<=8 && $v["y"]-($starty/2)>=0 && $v["y"]-($starty/2)<=8) {
        $ret.="<img alt=\"$v[login]\" title=\"$v[login]\" style=\"position:absolute;left:".(($v["x"]-($startx/2))*15+3)."px;top:".(($v["y"]-($starty/2))*15+3)."px\" src=\"/i/dungeon/".($k+1)."$v[dir].gif\">";
      }
    }
    $ret.="<table cellspacing=0 cellpadding=0>";
    $i=$starty;
    while ($i<$starty+18) {
      $ret.="<tr>";
      $i2=$startx;
      while ($i2<$startx+18) {
        $ret.="<td class=\"maptd\">";
        if (strpos($map1[$i][$i2], 'h/') !== false) {
          $map1[$i][$i2] = 0;
        }
        if ($map1[$i][$i2]) {
          $ret.="<img src=\"<?=IMG_PATH?>/cave/";
          if (!passablewall($map1[$i][$i2-1])) $ret.="0"; else $ret.="1";
          if (!passablewall($map1[$i-1][$i2])) $ret.="0"; else $ret.="1";
          if (!passablewall($map1[$i][$i2+1])) $ret.="0"; else $ret.="1";
          if (!passablewall($map1[$i+1][$i2])) $ret.="0"; else $ret.="1";
          $ret.=".gif\">";
        }
        $ret.="</td>";
        $i2+=2;
      }
      $ret.="</tr>";
      $i+=2;
    }
    $ret.="</table></div>
    </td></tr></table>";
    
    $ret.="<div align=\"center\" style=\"position:absolute; left:389px; top:10px; font-size:6px;padding:0px;border:solid black 0px; text-align:center\" id=\"prcont\">
    <script language=\"javascript\" type=\"text/javascript\">
    var s=\"\";for (i=1; i<=32; i++) {s+='<span id=\"progress'+i+'\">&nbsp;</span>';if (i<32) {s+='&nbsp;'};}document.getElementById('prcont').innerHTML=s;
    </script></div>";

    $ret.="<TABLE><tr>
    <td nowrap=\"nowrap\" id=\"moveto\">
    </td></tr></TABLE>";
    $ret.="</div>";
    $ret.="<script language=\"javascript\" type=\"text/javascript\">
var progressEnd = 108;		// set to number of progress <span>'s.
var progressColor = '#00CC00';	// set to progress bar color
var mtime = parseInt('";
if (time()<$_SESSION["movetime"]) $ret.=$_SESSION["movetime"]-time();
else $ret.=0;
$ret.="');
if (!mtime || mtime <= 0 ) mtime = 0;
var progressInterval = Math.round( mtime * 1000 / progressEnd );
var is_accessible = true;
var progressAt = progressEnd;
var progressTimer;
function progress_clear() {
progressAt = 1;

for (var t = 1; t <= 8; t++) {
if( document.getElementById('m'+t) && ( t != 2 && t != 8 ))
document.getElementById('m'+t).style.backgroundImage = \"none\";
}
is_accessible = false;
set_moveto(true);
}
function progress_update() {
progressAt++;
if (progressAt > progressEnd) {
for (var t = 1; t <= 8; t++) {
if( document.getElementById('m'+t) && ( t != 2 && t != 8 ))
document.getElementById('m'+t).style.backgroundImage = \"\";
}
is_accessible = true;
if (window.solo_store && solo_store) { solo(solo_store, \"\"); } // go to stored
set_moveto(false);
} else {
if( !( progressAt % 2 ) )
document.getElementById('MoveLine').style.left = progressAt - progressEnd;
progressTimer = setTimeout('progress_update()',progressInterval);
}
}
function set_moveto (val) {
document.getElementById('moveto').disabled = val;
if (document.getElementById('bmoveto')) {
document.getElementById('bmoveto').disabled = val;
}
}
function progress_stop() {
clearTimeout(progressTimer);
progress_clear();
}
function check(it) {
return is_accessible;
}
function check_access () {
return is_accessible;
}
function ch_counter_color (color) {
progressColor = color;
for (var i = 1; i <= progressAt; i++) {
document.getElementById('progress'+i).style.backgroundColor = progressColor;
}
}
if (mtime>0) {
progress_clear();
progress_update();
}
</script>
";
    return $ret;
  }
?>
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  <tr>
    <td valign="top" align="left">
<br><center><table width="400" border="0" cellspacing="1" cellpadding="0" bgcolor="#000000">
<?
  foreach ($party as $k=>$v) {
    if ($v["user"]==$user["id"]) {
      $usr=$user;
    } else {
      $usr=mqfa("select level, hp, maxhp from users where id='$v[user]'");
    }
    $wd=floor($usr["hp"]/$usr["maxhp"]*120);
    echo "<tr>
<td background=\"<?=IMG_PATH?>/cave/bg_scroll_05.gif\" align=\"center\">
<a href=\"inf.php?$v[user]\" target=_blank title=\"Информация о $v[login]\">$v[login]</a> [$usr[level]]<a href='inf.php?$v[user]' target='_blank'><img src='/i/inf.gif' border=0></a></td>
<td background=\"<?=IMG_PATH?>/cave/bg_scroll_05.gif\" nowrap style=\"font-size:9px\">
<div style=\"position: relative;padding-left:5px\">
<table cellspacing=\"0\" cellpadding=\"0\" style='line-height: 1'><td nowrap style=\"font-size:9px\" style=\"position: relative\"><SPAN ".($v["user"]==$user["id"]?"id=\"HP\"":"")." style='position: absolute; left: 5; z-index: 1; font-weight: bold; color: #FFFFFF'>$usr[hp]/$usr[maxhp]</SPAN><img src=\"/i/1green.gif\" alt=\"Уровень жизни\" ".($v["user"]==$user["id"]?"name=\"HP1\"":"")." width=\"$wd\" height=\"9\" ".($v["user"]==$user["id"]?"id=\"HP1\"":"")."><img src=\"/i/misc/bk_life_loose.gif\" alt=\"Уровень жизни\" ".($v["user"]==$user["id"]?"name=\"HP2\"":"")." width=\"".(120-$wd)."\" height=\"9\" ".($v["user"]==$user["id"]?"id=\"HP2\"":"")."></td></table></div></td>
<td background=\"<?=IMG_PATH?>/cave/bg_scroll_05.gif\" align=\"center\"></td>
<td background=\"<?=IMG_PATH?>/cave/bg_scroll_05.gif\" align=\"center\">";

if ($v["user"]==$user["id"] && $user["id"]==$user["caveleader"]) echo "<IMG alt=\"Лидер группы\" src=\"/i/misc/lead1.gif\" width=24 height=15><A href=\"#\" onClick=\"findlogin( 'Выберите персонажа которого хотите выгнать','cave.php', 'kill')\"><IMG alt=\"Выгнать супостата\" src=\"/img/podzem/ico_kill_member1.gif\" WIDTH=\"14\" HEIGHT=\"17\"></A>&nbsp;<A href=\"#\" onClick=\"findlogin( 'Выберите персонажа которому хотите передать лидерство','cave.php', 'change')\"><IMG alt=\"Новый царь\" src=\"/img/podzem/ico_change_leader1.gif\" WIDTH=\"14\" HEIGHT=\"17\"></A>";
echo "</td>
</tr>";

  }
?>

</table><br>
<script><?=topsethp()?></script>

<div style="padding-left:15px;padding-right:15px">
<?php 

if (isset($_GET['msg'])) {
    $report = $_GET['msg'];
}

 ?>
<font color=red><?=@$report?>&nbsp;</font></div>
</center><br>
<br><br />
<center>
<?
  $r=mq("select * from caveitems where leader='$user[caveleader]' and x='".($x*2)."' and y='".($y*2)."' and floor='$floor'");
  if (mysqli_num_rows($r)>0) echo "<font color=red>В комнате разбросаны вещи:</font><div style=\"font-size:3px\">&nbsp;</div>";
  while ($rec=mysqli_fetch_assoc($r)) {
    echo "<a title=\"Поднять $rec[name]\" href=\"cave.php?takeitem=$rec[id]\"><img src=\"".IMGBASE."/i/sh/$rec[img]\"></a> ";
  }
?></center><br>
<?
  if ($loses>=3) echo "<center><b><font color=red>Вас убили 3 раза, и вы покидете подземелье</font></b><br><br>
  <a href=\"cave.php?exit=1\">Вернуться</a></center><br>";
  if ($loses) echo "<div style=\"padding-left:20px\"><b>Количество смертей: $loses</b></div>";
$rt=db_query("select * from `podzem_zad_login` where owner='".$user['id']."'");
if($est=mysqli_fetch_array($rt)){
	if($user['align']==2.5){
	echo "Задание:  ",$est['cratco'] ,'  ',setPodzZad($est['ubil'],$est['ubit']);
	}
}
?>
    </td>
    <td width=540>
<div style="text-align:right;padding-right:30px">
<font style='font-size:14px; color:#8f0000'><b><?
  $dMap   = unserialize(db_result(db_query("SELECT map FROM cavemaps WHERE floor = $floor AND room = " . ($user['room'] - 1)), 0, 0));
  $cPlace = $dMap[$y*2][$x*2];
  $tmp=explode("/", $cPlace);
  if (@$roomnames[$tmp[1]]) echo $roomnames[$tmp[1]];
  else echo $rooms[$user["room"]];
?></b></font>&nbsp;&nbsp;&nbsp;&nbsp;
<font style='font-size:14px; color:#8f0000'><b></b></font>&nbsp;&nbsp;&nbsp;&nbsp;<a style="cursor:pointer;" onclick="if (confirm('Вы уверены что хотите выйти?')) window.location='cave.php?exit=1'">&nbsp;<b style='font-size:14px; color:#000066;'>Выйти</b></a>
</div>
<?
  echo drawmap($map, $party, $x, $y, $dir);
?>
</td></tr></table>
<? 

if ($user["align"]==2.5) { 
    echo '
        <form action="cave.php" method="GET">
            x:&nbsp;<input size="2" name="x" value="' . $x . '" />
            y:&nbsp;<input size="2" name="y" value="' . $y . '" />
            floor:&nbsp;<input size="2" name="floor" value="' . $floor . '" />&nbsp;
            <input type="submit" name="goto" value="перейти" />
        </form>
    ';
}


?>