<?
  if ($step==1) {
    $speach.="Приветствую тебя, <b>$user[login]</b>! Извини, но сейчас нет времени с тобой поговорить, приходи попозже.";
    if (LETTERQUEST) {
      $answers=array("6"=>"Ну пожа-а-а-алуйста...", "5"=>"До свидания");
    } else {
      $answers=array("5"=>"До свидания");
    }
  }

  if ($step==5) {
    header("location: city.php");
    die;
  }

  if ($step==6 && LETTERQUEST) {
    if (canmakequest(4)) {
      $speach="Ладно, вот тебе магический знак, только убирайся поскорее.";
      takesmallitem(58);
      $answers=array("5"=>"Спасибо, до свидания");
      makequest(4);
    } else {
      $speach="Нет, и даже не проси!";
      $answers=array("5"=>"До свидания");
    }
  }
?>