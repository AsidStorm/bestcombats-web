<?
  $done=mqfa1("select sum(step) from quests where quest='$speakto[quest]'");
  if ($done>=$speakto["steps"] && $step!=5) {
    $step=6;
  }
  if ($speakto["questlose"] && $step!=5) if (!canmakequest($speakto["questlose"])) $step=2;
  if ($step==1) {
    $speach.="��� ���� ����, ���������?";
    $answers=array(

    "4"=>"�� ��� ����, �������� � ���!",
    "7"=>"� ������ ��������� ����� ����������, � ��� ����� ������� ��?",
    "8"=>"������� ������ ��� ����� ���, ����� ��������� ����������� ������ ���� � �������� ��� ���?",
    "3"=>"�� ������, ���, ������ ���� ��������, ��� �����.");
  }
  
  if ($step==2) {
    $speach.="��� ���������� ��������� ��� ��� ������� ".ceil($questtime/60)." ���.";
    $answers=array("5"=>"���������");
  }
  if ($step==3) {
    makequest($speakto["questlose"],2);
    addqueststep($user["id"], $speakto["questlose"], 10);
    $speach="�� � ������� �������, �� ����������� ��������� �� ��� ��� ���� �� ������� ��������� ������� � ������ � ��������.";
    $answers=array("5"=>"���������");
  }
  if ($step==4 && canmakequest($speakto["questlose"])) {
    makequest($speakto["questlose"],0.1);
    nick99($user["id"]);
    battlewithbot($speakto["id"], $speakto["name"], $speakto["fightname"], 20, 0,0,0,0);
  }
  
  if ($step==5) {
    header("location: city.php?".time());
    echo "<script>document.location.replace('city.php?".time()."');</script>";
    die;
  }
  if ($step==6) {
    $speach.="������ ������ ����������. �� ������������ ������� �������� ������������ ����, ������� ���� ����� ��� �����, ������� ���������� ��������. �������� ��������� ���� ����, ����� ������ ������� ������ ����� ������ ����������� ��. ���� ����� ������� ����������� ����� ��������� ����.";
    $answers=array("5"=>"���������");
  }

  if ($step==7) {
    $speach.="� � ����� ����. ����������, ���� � �� ����������.";
    $answers=array(
    "4"=>"����� � ���, ��� �� ��� ���� � ��� ���������!",
    "8"=>"���������� � ������ ����� ��� � ������ ���� ��� �������.",
    "9"=>"������� ������ ��� ����� ���, ����� ��������� ����������� ������ ���� � �������� ��� ���?",
    "3"=>"�� �����, �� ��������, � ��� �����.");
  }
  if ($step==8) {
    $speach.="�� ���� ��� ���������, ��� ����. ��� ���� �������� �����, � �� ���������.";
    $answers=array(
    "4"=>"�� ��� ��� ���, ����� �������� � ���!",
    "3"=>"������ ��� ������, � �����.");
  }
  if ($step==9) {
    $speach.="�����, �������� ��� ���. �� ���������� ������ ������, � � �������� ���.";
    $answers=array(
    "4"=>"�� �� ���! � ������� ���� ���������, �� ��� ���, ����� ���������!",
    "3"=>"�������� ����, � �����.");
  }
?>