<?
  if ($user["room"]!=20) {
    echo "������ ����� ������ ������ �� ����������� �������.";
  } elseif ($user["battle"]) {
    echo "�� � ���.";
  } else {
    $i=mqfa1("select id from effects where owner='$user[id]' and type=".MAKESNOWBALL);
    if ($i) mq("update effects set time=".(time()+180)." where id='$i'");
    else mq("insert into effects set name='������� ����', owner='$user[id]', time=".(time()+180).", type=".MAKESNOWBALL.", isp=1");
    echo "�� ������ ������ ������.";
    updeffects();
    $bet=1;
  }
?>