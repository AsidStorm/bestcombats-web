<?
  $floor=$cparty["floor"];
  if ($user["sex"]==1) {
    $sa="��";
    $hero="������� � ������� �����";
    $a="";
    $bro="��������";
    $oj="��";
    $ij="��";
    $la="��";
  } else {
    $sa="���";
    $hero="������� � ������� �������";
    $a="�";
    $bro="��������";
    $oj="��";
    $ij="��";
    $la="��";
  }

  if ($step==1) {
    $speach.="�� � ���� ����? �� �������� ����$sa? � �� � ���� ������ ���������, �������, ����� ��� �����-�� �����, ������� ���� �������������...";
    $answers=array("2"=>"�� �� ������� ������������, � �� ������ ��������� �����...", "15"=>"� � ����� ����� �������������?", "3"=>"������ ���� ��������$a, ��������, ��� �������$a...");
  }

  if ($step==2) {
    $speach.="�����, �����.. ������ �� ���! ���, ������, ������ ����$sa �� �����, � $hero?";
    $answers=array("4"=>"���, ���� ��������$a. ������ ������ �� ������� ����� ��������$a.", "6"=>"���� � ���� ���, � ����� - ���� �� ��������, ���?");
  }

  if ($step==3) {
    $speach.="����� ��� �� ���� ������, ���� � ���� ������ ����� �� ����!";
    $answers=array("13"=>"��� ��$la. �� ������ �� ���������");
  }

  if ($step==4) {
    $speach.="� ��� �� ���� ��� ������� �� �������?!";
    $answers=array("14"=>"�� ��� �� ����� � ���������� � �� ���.", "3"=>"������, ����������, ��� ������ ������...");
  }

  if ($step==5) {
    header("location: cave.php");
    die;
  }

  if ($step==6) {
    $speach.="��! � ����� ����� �������, �������� ��� �������!<br><br>
<i>(����� �������� ���, ����� ���� ������ �������� ���� � ���������.)</i><br><br>
� ���... �����. �� �������� ���, ������ ��������... ���� ����. ���� ��� �����, ��� ��� ��� ������ �� ���� ������ �����.";
    $answers=array("7"=>"������? �� ��� ����������?", "8"=>"������? ��� � �� ����$a ����.");
  }

  if ($step==7) {
    $speach.="��, ��, ��� �������� ����.";
    $answers=array("5"=>"�� ����$a, ��� �� � ����. ��, �����, � �����.", "3"=>"������, �� ������� �� ����������� ��������� ����������� �� ���� ����. �� �������������, ����������.");
  }

  if ($step==8) {
    $speach.="��� ���� ���.. � �� ������, ��� ������ � ���� ��� � ��� ��� ������ ��������? � ����, ��� ���������� ���������� ���� �����?";
    $answers=array("9"=>"������ ���� ���������? � ���� � ���� ������ ��� ��� ������ �� ����?", "10"=>"�������, ������. ����$a ��, ��� �� �� ������ - ������� �� �� ����$a.", 3=>"�������� ����! � � ����� ���� ��������...");
  }

  if ($step==9) {
    $speach.="���! ���� �� ����! �� ����. � ���� ������� ��������� ���... ������ �� ����, $bro!";
    $answers=array("12"=>"��������� ��������� ���� $bro. ����� ���� ������!");
  }

  if ($step==10) {
    $speach="�������! �� ��� �������� ���� �������, ����� � ���� �� ������� ����������.<br><br><i>����� �������� �����-�� ������ � �����, �� ��� � ������� ������ ������� ������� �����.</i>";
    include "config/cavedata.php";
    mq("update caveparties set x='".$cavedata[$user["room"]]["x$floor"]."', y='".$cavedata[$user["room"]]["y$floor"]."', dir='".$cavedata[$user["room"]]["dir$floor"]."', loses=loses+1 where user='$user[id]'");
    mq("update users set hp=0, fullhptime=".time()." where id='$user[id]'");
    $answers=array("5"=>"����� ���������.");
  }

  if ($step==12) {
    $cavedata=getcavedata($user["caveleader"], $cparty["floor"]);
    if ($cavedata["quest_ring"]) {
      $speach="���, ���, ���, ��� �� �������... ׸��, � ���� ���... ����... ����� ��� ���... ���� ���$a �� ������$a, �� � ������� ����� �����������.";
    } else {
      $speach="�� ��� ������. ������ ������ ���� �� ����, �� ������. ";
      $cavedata["quest_ring"]=$user["id"];
      savecavedata($cavedata, $user["caveleader"], $cparty["floor"]);
      mq("insert into caveitems set leader='$user[caveleader]', name='���������� ������ ������', img='ring2008.gif', x='".($cparty["x"]*2)."', y='".($cparty["y"]*2)."', floor='".($cparty["floor"])."', item=2347");
    }
    $answers=array("5"=>"���� ������ � �� ������.");
  }

  if ($step==13) {
    header("location: cave.php?exit=1");
    die;
  }

  if ($step==14) {
    $speach="���� ���! ������ � � ���� �� �� ����.<br><br><i>����� �������� �����-�� ������ � �����, �� ��� � ������� ������ ������� ������� �����.</i>";
    include "config/cavedata.php";
    mq("update caveparties set x='".$cavedata[$user["room"]]["x$floor"]."', y='".$cavedata[$user["room"]]["y$floor"]."', dir='".$cavedata[$user["room"]]["dir$floor"]."', loses=loses+1 where user='$user[id]'");
    mq("update users set hp=0, fullhptime=".time()." where id='$user[id]'");
    $answers=array("5"=>"����� ���������.");
  }

  if ($step==15) {
    $speach="� �� ������ ���$oj ��������$ij �����������?! �� ��� ����. �������� - ���� �������!";
    $answers=array("3"=>"�� �����, �����, ������, �����$oj � �� ��������$ij. ��� �����. ������, ���� ��� ������$a.", "5"=>"������, ��� �� � ��� ��������. ������.");
  }
?>