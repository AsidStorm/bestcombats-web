<?php
// magic �������������
if ($_SESSION['uid'] == null) header("Location: index.php");

if ($user['battle'] != 0) {
  echo "��� �� ������ �����...";
} else {
  $magic = mysql_fetch_array(mysql_query("SELECT `chanse` FROM `magic` WHERE `id` = '201' ;"));
  if ($user['level'] >= 4) {
    $int=$magic['chanse'];
  } else $int=0;
  $int=100;
  if (mt_rand(1,100) < $int) {
    $zver=mysql_fetch_array(mysql_query("SELECT id FROM `users` WHERE `id` = '{$user['zver_id']}' LIMIT 1;"));
    if(!$zver) {
      $er=mysql_fetch_array(mysql_query("SELECT id FROM `users` WHERE `login` = '{$_POST['target']}' union SELECT id FROM `allusers` WHERE `login` = '{$_POST['target']}'"));
      if(!$er && !mysql_error()) {
        if (strlen($_POST['target'])<4 || strlen($_POST['target'])>20 || rusandlatin($_POST['target']) || preg_match("/__/",$_POST['target']) || preg_match("/--/",$_POST['target']) || preg_match("/  /",$_POST['target']) || preg_match("/(.)\\1\\1\\1/",$_POST['target'])) {
          echo "������ ����� ��������� �� 4 �� 20 ��������, � �������� ������ �� ���� �������� ��� ����������� ��������, ����, �������� '_',  '-' � �������. <br>����� �� ����� ���������� ��� ������������� ��������� '_', '-' ��� ��������<br>����� � ������ �� ������ �������������� ������ ����� 1 ������� '_' ��� '-' � ����� 1 �������, � ����� ����� 3-� ������ ���������� ��������.";
        } else {
          if($row['vid']==1){$obraz = 'chert.gif';}
          if($row['vid']==2){$obraz = 'kot.gif';}
          if($row['vid']==3){$obraz = 'sova.gif';}
          if($row['vid']==4){$obraz = 'svin.gif';}
          if($row['vid']==5){$obraz = 'sobaka.gif';}
          if($row['vid']==6){$obraz = 'svetlyak.gif';}
          mysql_query("INSERT INTO `users`(user_id,vid,login,pass,level,sila,lovk,inta,vinos,maxhp,hp,exp,nextup,sitost,stats,shadow,sex) VALUES('".$user['id']."','".$row['vid']."','".$_POST['target']."','thisIsAnimal','0','3','3','3','3','30','30','0','110','3','3','$obraz', ".mt_rand(0,1).")");
          $zv=mysql_fetch_array(mysql_query("SELECT id FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
          mysql_query("UPDATE `users` SET zver_id='".$zv['id']."' WHERE id='".$user['id']."'");
          global $animals;
          include_once "config/animals.php";
          setanimal($zv["id"], 0);
          echo"�� �������� ����� �� ������ '{$_POST['target']}'";
          $bet=1;
          adddelo($user["id"], "$user[login] ������� ����� �� ������ $_POST[target] (id: $row[id]).", 0);
        }
      } else {
        echo "��� ������ ��� ����������! ���������� ������!";
      }
    } else {
      echo "� ��� ��� ���� �����!";
    }
  } else {
    echo "������ ���������� � ����� �����...";
    $bet=1;
    adddelo($user["id"], "$user[login] �������� ������� ����� (id: $row[id]).", 0);
  }
}

?>