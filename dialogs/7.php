<?
  $done=mqfa1("select sum(step) from quests where quest='$speakto[quest]'");
  if ($done>=$speakto["steps"] && $step!=5) {
    $step=6;
  }
  if ($step!=8 && $speakto["questlose"] && $step!=5 && $step!=14) if (!canmakequest($speakto["questlose"])) $step=2;
  $q=getvar("quest");
  if (!$q && $step!=8 && $step!=5) $step=7;
  if ($step==1) {
    $speach.="��� ���, ��, ��� ������� ������� ����� �����, �� ������ ������ ��� �� ������� �� ����� ���������, ����� �� �������� ����� �� ���� ������!";
    $answers=array(
    "4"=>"�������.",
    "3"=>"����.");
  }
  
  if ($step==2) {
    $speach.="��� ���������� ��������� ��� ��� ������� ".ceil($questtime/60)." ���.";
    $answers=array("5"=>"���������");
  }
  if ($step==3) {
    makequest($speakto["questlose"],2);
    addqueststep($user["id"], $speakto["questlose"], 10);
    $speach="�� � ������� �������, �� ����������� ��������� �� ��� 2 ���� �� ������� ��������� ������� � ��������� �����.";
    $answers=array("5"=>"���������");
  }
  if ($step==4 && canmakequest($speakto["questlose"])) {
    makequest($speakto["questlose"],0.1);
    nick99($user["id"]);
    battlewithbot($speakto["id"], $speakto["name"], $speakto["fightname"], 20, $speakto["quest"],0,0,0);
  }
  
  if ($step==5) {
    header("location: city.php");
    die;
  }

  if ($step==8) {
    gotoroom(80);
    header("location: main.php");
    die;
  }

  if ($step==6) {
    $speach.="��� ����� ����������, ������ ���� ����� ������� ���������, ���� ������ ������������ �����. ����� ���������� ������� ����� �������������� ���� �� ��������.";
    $answers=array("5"=>"���������");
  }
  if ($step==7) {
    $speach.="����� ����� �������� ������� ����. �����, ����� ���� ������ ����������, ������� ������� ��.";
    $answers=array("8"=>"������ � ����������� �����", "5"=>"���������");
  }

?>