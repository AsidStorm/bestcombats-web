<?php
  if (!$user["battle"]) {
    echo "���� ������ ����� ������������ ������ � ���!";
  } else {
    if ($user["level"]<=8) $cnt=3;
    elseif ($user["level"]<=9) $cnt=5;
    else $cnt=10;
    $fbattle->addtactic($user["id"], "block2", $cnt, 0, 1);
    echo "������� ����������� ������ $row[name]."; 
    $fbattle->add_log('<span class=date>'.date("H:i").'</span> '.nick5($user['id'],$fbattle->my_class).' �����������'.($user["sex"]==1?"":"�").' �������� <b>'.$row["name"].'</b>.<BR>');
    $fbattle->write_log ();
    $bet=1;
  }

?>