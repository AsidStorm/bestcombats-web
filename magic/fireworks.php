<?
  if ($user["room"]!=20) {
    echo "�������� ����� ������������ ������ �� ����������� �������!";
  } else {
    sysmsg("�� ����������� ������� �������� � ����� <b>$user[login]</b>.");
    mq("update variables set value=".(time()+300)." where var='fireworks'");
    $bet=1;
  }
?>