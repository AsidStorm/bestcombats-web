<?
  include_once(DOCUMENTROOT."questfuncs.php");
  $r=mq("select users.id, users.login, users.sex, users.klan, users.align, users.level, users.sila, users.hp from users left join online on users.id=online.id left join qtimes on qtimes.user=users.id where qtimes.q4<".time()." and online.date>=".(time()-90)." and users.sila>=25 and users.hp=users.maxhp and users.room=81 and users.id in (select user as id from questusers)");
  $power=0;
  $cond="0";
  $logins="";
  $log="";
  $cnt=0;
  while ($rec=mysql_fetch_assoc($r)) {
    $cnt++;
    $sex=$rec["sex"];
    $power+=$rec["power"];
    $power+=$rec["sila"]*$rec["hp"];
    $cond.=" or id=$rec[id] ";
    if ($logins) {
      if ($cnt==mysql_num_rows($r)) $logins.=" </b>и<b> ";
      else $logins.="</b>,<b> ";
    }
    $logins.=" $rec[login]";
    if ($log) {
      if ($cnt==mysql_num_rows($r)) $log.=" и ";
      else $log.=", ";
    }
    $log.=fullnick($rec);
    if (INCRON) makequest(4, 1, $rec["id"]);
  }
  $success=0; 
  if ($power>=2500000) {
    $success=1;
    sysmsg("<b>$logins</b> успешно столкнули камень со скалы, и он надёжно запечатал вход в здание. Теперь можно смело атаковать цвергов");
    mq("update variables set value=1 where var='quest'");
    mq("update variables set value='$logins' where var='questusers'");
  }
  if ($cnt==0) {
    mq("truncate table questusers");
    setvar("queststart", 0);
  } elseif ($success || INCRON) {
    if ($cnt>1) {
      $e="ись";$e2="и";$e3="гут";
    } elseif ($sex==1) {
      $e="ся";$e2="";$e3="жет";
    } else {
      $e="ась";$e2="а";$e3="жет";
    }
    mq("update variables set value=concat(value, '\r\n".date("H:i")." $logins ($power)') where var='questlog'");
    $results=array("пытал$e столкнуть камень, но сил оказалось недостаточно", "попробовал$e2 столкнуть камень, но видимо ел$e2 мало каши, и замысел не удался",
    "думал$e2, что хватит сил столкнуть камень, но не тут-то было", "изо всех сил толкал$e2 камень, но он даже не пошатнулся",
    "старательно пытал$e сдвинуть камень, но замысел не удался", "думал$e2, что смо$e3 отправить камень под гору, но у камня на этот счёт было своё мнение",
    "собрал$e было столкнуть камень с горы, но не тут-то было", "предпринял$e2 очередную неудачную попытку столкнуть камень",
    "совершил$e2 такую же неудачную попытку столкнуть камень как и всех их предшественники", "уже который раз бессмысленно попытал$e столкнуть камень",
    "ошибочно решил$e2, что сильнее своих предшественников, но камень всё ещё на прежнем месте", "пополнил$e2 список неудачных попыток столкнуть камень");
    shuffle($results);
    $result=array_pop($results);
    $log="<br>".date("H:i")." $log ".($success?"успешно столкнули камень.":$result);
    if (!$success) sysmsg("<b>$logins</b> $result.");
    mq("update events set log=concat(log, '$log') where id=1");
    mq("truncate table questusers");
    mq("update users set hp=0, fullhptime=".time()." where $cond");
    setvar("queststart", 0);
  }
?>