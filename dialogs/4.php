<?
  if ($step==1) {
    $speach.="����������� ����, <b>$user[login]</b>! ������, �� ������ ��� ������� � ����� ����������, ������� �������.";
    if (LETTERQUEST) {
      $answers=array("6"=>"�� ����-�-�-�������...", "5"=>"�� ��������");
    } else {
      $answers=array("5"=>"�� ��������");
    }
  }

  if ($step==5) {
    header("location: city.php");
    die;
  }

  if ($step==6 && LETTERQUEST) {
    if (canmakequest(4)) {
      $speach="�����, ��� ���� ���������� ����, ������ �������� ��������.";
      takesmallitem(58);
      $answers=array("5"=>"�������, �� ��������");
      makequest(4);
    } else {
      $speach="���, � ���� �� �����!";
      $answers=array("5"=>"�� ��������");
    }
  }
?>