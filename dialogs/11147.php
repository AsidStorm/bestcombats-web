<?
  if ($user["sex"]==1) {
    $a="";
    $one="�����";
    $la="��";
    $en="��";
    $that="���";
    $need="�����";
  } else {
    $a="�";
    $one="�����";
    $la="��";
    $en="��";
    $that="��";
    $need="�����";
  }
  //$done=mqfa1("select sum(step) from quests where quest='$speakto[quest]'");
  if ($step==1) {
    $speach.="<p style=\"text-align: left\">���������!! ������������!! ��������������!!!</p><p style=\"text-align: left\">�� ��� �� ������ ������, ��� ������ ������ ������� � ����� ������!</p>";
    $answers=array("5"=>"���������");
  }
  
  if ($step==5) {
    header("location: cave.php");
    die;
  }
?>
