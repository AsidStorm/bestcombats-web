<?
  if ($user["room"]==1) {
    if (@$_GET["drink"]) {
      include_once("questfuncs.php");
      if ($user["level"]==0 || canmakequest(13)) {
        mq("update users set hp=maxhp where id='$user[id]'");
        $user["hp"]=$user["maxhp"];
        $report="<b><font color=red>Вы Восстановили Свои Силы.</b></font>";
        if ($user["level"]>0) makequest(13);
      } else {
        $report="<b><font color=red>Не стоит пить из этой бутылки слишком часто, на всех не хватит.</b></font>";
      }
    }
    if (@$_GET["sit"]) {
      include_once("questfuncs.php");
      if ($user["level"]==0 || canmakequest(14)) {
        mq("update users set mana=maxmana where id='$user[id]'");
        $user["mana"]=$user["maxmana"];
        $report="Вы Восстановили Манну.";
        if ($user["level"]>0) makequest(14);
      } else {
        $report="Не стоит пить из этой бутылки слишком часто, на всех не хватит.";
      }
    }
  }
?>