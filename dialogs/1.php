<?
  $done=mqfa1("select sum(step) from quests where quest='9'");
  if ($step!=10 && $step!=12 && $step!=13) $step=12;
  if ($done>=$speakto["steps"] && $step!=10) {
    $step=14;
  }
  if ($step==13) {
    if (canmakequest(9)) {
      makequest(9);
      addqueststep($user["id"],9);
    }
    $speach="������� ������, �� ������������ �� ������. ���, ���, �����... � �������� ������ �������.
    �� ������ ����������, � ������ ���� ������ ���������. ����� ��� ������ ����� ��������� �� ������.";
    $answers=array("10"=>"���������");
  }

  if ($step==14) {
    $speach="�������-�� ���� ���� ������� ��������� ����� � ��� ����� ��� ����� ����� �������� �������. ����� ���� � ���� ������� ����������:<br><br>";
    $r=mq("select users.id from quests left join users on users.id=quests.user where quest=9 order by step desc limit 0, 3");
    while ($rec=mysql_fetch_assoc($r)) {
      $speach.=nick3($rec["id"])."<br>";
    }
    $speach.="<br>��� ���������, ��� �������� ������� � ���� �� �������� ��� ������ ����������, ��� �� ����� ����������, �� ����� ������� ��������� �������� ����� ����������.";
    $answers=array("10"=>"���������");
  }

  if ($step==12) {
    $speach="��������� ������� ����������� �� ������. ������ ���� ������ ������ ����� ������ � �������� ��������, ����� ��������� �� ���� � ������� �� ��� ������ ���������� � ����.
    �� ��� ����, ����� ��������� ����� ����������, ���������� ������ ���� ���������, ������� ������ ��������. ������� ������� ����� ��� ��������. ��, ��� ������� ������ ��������, ��� �� ����� ����������.
    ��� �����, ������� �������� ���� ������ ������� ��� �������, ������������� �� ���� ������ � ����� ��������� ����� ��������� ������, �� ���� ��� ����������.";
    if ($user["id"]==7 || $user["id"]==2220 || $user["id"]==2811 || $user["id"]==2637) {
      $speach.=" �� ��� ������ �������� ���� �� ����� ������ ��������, �� �������� ������� ������ ������� � ������.";
      $answers=array("10"=>"���������");
    } elseif (canmakequest(9)) $answers=array("13"=>"��������� �� ������", "10"=>"���������");
    else {
      $speach.="<br>��� ���������� ��������� ����� ������ ��� ��� ������� ".ceil($questtime/60)." ���.";
      $answers=array("10"=>"���������");
    }
  }

  if ($step==11) {
    $speach="��� ������ ���������. ������ ����� ������� ���������, �. �. ����� ����� ����������� ���� ������ ��� ������� ���������.
    ������ �����, ������� ����� ���������� - ���:<br><br>";
    $r=mq("select users.id from quests left join users on users.id=quests.user where quest=8 order by step desc limit 0, 3");
    while ($rec=mysql_fetch_assoc($r)) {
      $speach.=nick3($rec["id"])."<br>";
    }
    $speach.="<br>��� ���������, ��� �������� ������� � ���� �� ��������, ��� �� ����� ����������, �� ����� ������� ��������� ��������� ����� ����������.";
    $answers=array("10"=>"���������");
  }

  if ($step==1) {
    $speach="���!";
    $answers=array("2"=>"������ ����!", "3"=>"��� ��� �� ��������� �� ��� �������?!", "4"=>"� ������ ���������� ������ � ���������� ���������!", 5=>"�� ������������ ���������� ������� � �������� ��� �����.", 6=>"�� ��������", 9=>"�����������" );
  }
  if ($step==2) {
    $speach="� ���� �� �������, ���� ������ ����� �������, ���� � ������.";
    $answers=array("7"=>"��� ��� �� ���� ���������?!", "6"=>"� �����, �� �����-�� ��� ��� ��������.", "5"=>"����� ����� �� ���� �����, ������� ������!");
  }
  if ($step==3) {
    $speach="�� ������ ��� ����. ���� ������ ���� ���$a.";
    $answers=array("7"=>"��� ��� �� ���� ���������?!", "6"=>"�� �� �����, ��� �� �����, ���� ������.", "5"=>"����� ����� �� ���� �����, ������� ������!");
  }
  if ($step==4) {
    $speach="���, ������, ������ ��� ������� ������� � ����� ������.";
    $answers=array("8"=>"���-�� �� ������, ����� �� ���������.", 6=>"�����, � ������� �������, �������, ��� �� ��������� � ���� �������.",5=>"������ � ������ ����!");
  }
  if ($step==5 && canmakequest($speakto["quest"])) {
    makequest(8);
    battlewithbot($speakto["id"], $speakto["name"], "��� �� ���������.", 20, $speakto["quest"]);
  }
  if ($step==6) {
    $speach="�������$a! ���� �������, ���� � �� ���������!<br><br>
    �� ��������������� � �������. ����� ������ ������ ������� ��� �� ����� ���� �����������.";
    $answers=array("10"=>"���������");
    makequest(8,2);
  }
  if ($step==7) {
    $speach="� �� ���� ������, ��� ��� ����� � ��� ������.";
    $answers=array("5"=>"������ �� ����� ���� ������ � ���!", "6"=>"��� �������, �� ��������.");
  }
  if ($step==8) {
    $speach="���������, ����� ���������! ����������, ���� �������.";
    $answers=array("5"=>"���� �� ���� �����, ������� ������!", "6"=>"��� �������, ����������.");
  }
  if ($step==9) {
    if ($wins<15) $cnt="������";
    elseif ($wins<30) $cnt="���������";
    elseif ($wins<45) $cnt="����";
    elseif ($wins<60) $cnt="�����";
    elseif ($wins<75) $cnt="������";
    else $cnt="�������������� ����������";

    $speach="������ �� ������ ���� ������ � ��� �� $cnt ������.";
    $answers=array("2"=>"������ ����!", "3"=>"��� ��� �� ��������� �� ��� �������?!", "4"=>"� ������ ���������� ������ � ���������� ���������!", 5=>"�� ������������ ���������� ������� � �������� ��� �����.", 6=>"�� ��������");
  }
  if ($step==10) {
    header("location: city.php");
    die;
  }
?>