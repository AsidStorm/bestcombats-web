<?
  $done=mqfa1("select sum(step) from quests where quest='$speakto[quest]'");
  if ($done>=$speakto["steps"] && $step!=5) {
    $step=6;
  }
  if ($speakto["questlose"] && $step!=5) if (!canmakequest($speakto["questlose"])) $step=2;
  if ($step==1) {
    $speach.="��������!";
    $answers=array(

    "4"=>"����, ����������!",
    "3"=>"�����, �����. �� ������ �� ��������.");
  }
  
  if ($step==2) {
    $speach.="��� ���������� ��������� ��� ��� ������� ".ceil($questtime/60)." ���.";
    $answers=array("5"=>"���������");
  }
  if ($step==3) {
    makequest($speakto["questlose"],2);
    addqueststep($user["id"], $speakto["questlose"], 10);
    $speach="�� � ������� �������, �� ����������� ��������� �� ��� ��� ���� �� ������� ��������� ������� � ������ � �������.";
    $answers=array("5"=>"���������");
  }
  if ($step==4 && canmakequest($speakto["questlose"])) {
    srand();
    makequest($speakto["questlose"],0.1);
    nick99($user["id"]);
    $r=mt_rand(1,2);
    $r=1;
    $q=getvar("quest");
    if ($r==2 && !$q) {
      battlewithbot($speakto["id"], $speakto["name"], $speakto["fightname"], 20, 0,0,0,0, 0, array(array("name"=>"����� ��������", "id"=>11135)),1);
    } else {
      battlewithbot($speakto["id"], $speakto["name"], $speakto["fightname"], 20, 0,0,0,0, 0);
    }

    $speach="��� ������ �� ������ �� ������, ����� �� ��� ����������� ������� �����. ������, ��� ����� �������.<br><br>
    <center><a href=\"main.php\">������� � ���</a></center>";
    $answers=array();
  }
  
  if ($step==5) {
    header("location: city.php");
    die;
  }
  if ($step==6) {
    $speach.="������ � ��������� ��������, �� ���� ���� ��������� ������� �������, ����� ���������� �����.";
    $answers=array("5"=>"���������");
  }
?>