<?

 if ($user["sex"]==1) {
    $zxc="���";
    $zxcv="��";
} else {
    $zxc="��";
    $zxcv="��";
}

  if ($step==1) {
    $speach.="�����... ���! ��� ��������, ��� ������ ����������� �����������....";
   
      $answers=array(
      "2"=>"�����?? �� ������ � ���? ",
      "3"=>"� ��� �����-������� �����$la, ���� ��� �������� �� �����? ",
      "4"=>"�, �������, �����.",
      );
}
   if ($step==2) {
    $speach.="��... �� ��� ��� ������... �����! �����, �����, �������... �������... ���� ������� ���... � ��... ��! �� ��������!! ����... ���� ���������! ��... �� ������ �� � ������... ���������... ��������... �����.. �����! � ������� ��� ������... � ����, ���� ���� ���� ����� ���� ��� ����� ��������!!";
    $answers=array("1"=>"�������. �� � ����� ���������� � ������.","4"=>"�, �������, �����.");
  }
   if ($step==3) {
    $speach.="�� ���$zxc ��.? ���� ����� ������! ���� ���� ���� ������, � �� ���� ���� ��! �����-�-��$zxcv?";
    $answers=array("7"=>"� ���� �����, ������� ������� �� ��� ����.","4"=>"���������.");
  }

     if ($step==4) {
    header("location: cave.php");
    die;
  }
 if ($step==5) {
    $speach.="";
    $answers=array("1"=>"���������.");
  }
  
 if ($step==6) {
   
 header("location: cave.php");
    die;
}
 if ($step==7) {
    $speach.="����-��... � ���� ����� �������. ���� �� �������. ���� �����:<br>
3 ����� � ������ �����.<br>
1 ���� � ������ �����.<br>
1 ������� � ������ 3 ������.<br>
����������, ����:<br>
3 ����� ������ � ������ �����.<br>
1 ������� ���� � ������ �����.<br>
1 ������� ������� � ������ 3 �����.<br>
� �������, ����:<br>
2 ����� � ������� � ������ �����.<br>
1 ���� ������ � ������ 2 �����.<br>";
$answers=array("1"=>"�������. �� � ����� ���������� � ������.","4"=>"�, �������, �����.");
}

?>