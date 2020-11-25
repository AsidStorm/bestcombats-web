<?php
// magic идентификацыя
if ($_SESSION['uid'] == null) header("Location: index.php");

if ($user['battle'] != 0) {
  echo "Это не боевая магия...";
} else {
  $magic = mysqli_fetch_array(db_query("SELECT `chanse` FROM `magic` WHERE `id` = '201' ;"));
  if ($user['level'] >= 4) {
    $int=$magic['chanse'];
  } else $int=0;
  $int=100;
  if (mt_rand(1,100) < $int) {
    $zver=mysqli_fetch_array(db_query("SELECT id FROM `users` WHERE `id` = '{$user['zver_id']}' LIMIT 1;"));
    if(!$zver) {
      $er=mysqli_fetch_array(db_query("SELECT id FROM `users` WHERE `login` = '{$_POST['target']}' union SELECT id FROM `allusers` WHERE `login` = '{$_POST['target']}'"));
      if(!$er && !db_error()) {
        if (strlen($_POST['target'])<4 || strlen($_POST['target'])>20 || rusandlatin($_POST['target']) || preg_match("/__/",$_POST['target']) || preg_match("/--/",$_POST['target']) || preg_match("/  /",$_POST['target']) || preg_match("/(.)\\1\\1\\1/",$_POST['target'])) {
          echo "Кличка может содержать от 4 до 20 символов, и состоять только из букв русского или английского алфавита, цифр, символов '_',  '-' и пробела. <br>Логин не может начинаться или заканчиваться символами '_', '-' или пробелом<br>Также в логине не должно присутствовать подряд более 1 символа '_' или '-' и более 1 пробела, а также более 3-х других одинаковых символов.";
        } else {
          if($row['vid']==1){$obraz = 'chert.gif';}
          if($row['vid']==2){$obraz = 'kot.gif';}
          if($row['vid']==3){$obraz = 'sova.gif';}
          if($row['vid']==4){$obraz = 'svin.gif';}
          if($row['vid']==5){$obraz = 'sobaka.gif';}
          if($row['vid']==6){$obraz = 'svetlyak.gif';}
          db_query("INSERT INTO `users`(user_id,vid,login,pass,level,sila,lovk,inta,vinos,maxhp,hp,exp,nextup,sitost,stats,shadow,sex) VALUES('".$user['id']."','".$row['vid']."','".$_POST['target']."','thisIsAnimal','0','3','3','3','3','30','30','0','110','3','3','$obraz', ".mt_rand(0,1).")");
          $zv=mysqli_fetch_array(db_query("SELECT id FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
          db_query("UPDATE `users` SET zver_id='".$zv['id']."' WHERE id='".$user['id']."'");
          global $animals;
          include_once "config/animals.php";
          setanimal($zv["id"], 0);
          echo"Вы призвали зверя по кличке '{$_POST['target']}'";
          $bet=1;
          adddelo($user["id"], "$user[login] призвал зверя по кличке $_POST[target] (id: $row[id]).", 0);
        }
      } else {
        echo "Эта кличка уже существует! Придумайте другую!";
      }
    } else {
      echo "У вас уже есть зверь!";
    }
  } else {
    echo "Свиток рассыпался в ваших руках...";
    $bet=1;
    adddelo($user["id"], "$user[login] неудачно призвал зверя (id: $row[id]).", 0);
  }
}

?>