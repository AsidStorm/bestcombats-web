<?php
$uses_zel = mysqli_fetch_array(db_query("SELECT id, name FROM `effects` WHERE `owner` = ".$user['id']." AND `type`=188 and (sila>0 or lovk>0 or inta>0 or intel>0)"));

$ins_time = floor(60*60*2);


global $nodrink;
if ($user['battle'] > 0) {
  echo "Не в бою...";
} elseif (in_array($user["room"],$nodrink)) {
  echo "Здесь запрещено пить эликсиры!";
} elseif($uses_zel && $row['name']!=$uses_zel['name']) {
  echo "Еще не прошло действие старого эликсира/заклятия.";
} else {
  if(!$uses_zel){
    db_query("INSERT INTO `effects` (`owner`,`name`,`time`,`type`,`sila`,`lovk`,`inta`,`intel`) values ('".$user['id']."','".$row['name']."',".(time()+$ins_time).",188,$row[gsila],".$row['glovk'].",".$row['ginta'].",".$row['gintel'].");");
    if($row['gsila']>0){db_query("UPDATE `users` set `sila` =`sila`+ ".$row['gsila']." WHERE `id` = ".$user['id']."");}
    if($row['glovk']>0){db_query("UPDATE `users` set `lovk` =`lovk`+ ".$row['glovk']." WHERE `id` = ".$user['id']."");}
    if($row['ginta']>0){db_query("UPDATE `users` set `inta` =`inta`+ ".$row['ginta']." WHERE `id` = ".$user['id']."");}
    if($row['gintel']>0){db_query("UPDATE `users` set `intel` =`intel`+ ".$row['gintel']." WHERE `id` = ".$user['id']."");}
    if($row['gmudra']>0){db_query("UPDATE `users` set `mudra` =`mudra`+ ".$row['gmudra']." WHERE `id` = ".$user['id']."");}
  } else {
    db_query("UPDATE `effects` set `time` = '".(time()+$ins_time)."' WHERE id='$uses_zel[id]'");
  }
  echo "Успешно использован свиток &quot;".$row['name']."&quot;.";
  $bet=1;

}
// if ($_SESSION['uid'] == null) header("Location: index.php");
//$user = mysqli_fetch_array(db_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));

//echo"Нельзя дважды юзать бля :)";
//}else{
//db_query("UPDATE `users` SET `sila`=`sila`+'100' WHERE `login` = '{$user['login']}' LIMIT 1;");

// echo "<font color=red><b>Свиток Великана был успешно использован<b></font>";
// $bet=1;
// }
?>