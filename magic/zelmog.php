<?php

$uses_zel = mqfa("SELECT id, name, time FROM `effects` WHERE `owner` = ".$user['id']." AND `type`=188 and (sila>0 or lovk>0 or inta>0 or intel>0)");
//echo mysql_error();
$ins_time = floor($magic['time']*60);

global $nodrink;
if (in_array($user["room"],$nodrink)) {
  echo "����� ��������� ���� ��������!";
} elseif ($user['battle'] > 0) {
  echo "�� � ���...";               
//} elseif($uses_zel && $row['name']!=$uses_zel['name']) {
} elseif($uses_zel) {
    echo "��� �� ������ �������� ������� ��������.";
} else {
  if(!$uses_zel){
    getadditdata($user);
    $at=addicttype($row);
    $row["g$at"]+=floor(addictval($user["{$at}addict"])/5*($row["g$at"]/10));
    mq("INSERT INTO `effects` (`owner`,`name`,`time`,`type`,`sila`,`lovk`,`inta`,`intel`) values ('".$user['id']."','".$row['name']."',".(time()+$ins_time).",188,".$row['gsila'].",".$row['glovk'].",".$row['ginta'].",".$row['gintel'].");");
    if($row['gsila']>0){mysql_query("UPDATE `users` set `sila` =`sila`+ ".$row['gsila']." WHERE `id` = ".$user['id']."");$stat="sila";}
    if($row['glovk']>0){mysql_query("UPDATE `users` set `lovk` =`lovk`+ ".$row['glovk']." WHERE `id` = ".$user['id']."");$stat="lovk";}
    if($row['ginta']>0){mysql_query("UPDATE `users` set `inta` =`inta`+ ".$row['ginta']." WHERE `id` = ".$user['id']."");$stat="inta";}
    $user["sila"]+=$row["gsila"];$user["lovk"]+=$row["glovk"];$user["inta"]+=$row["ginta"];$user["intel"]+=$row["gintel"];
    if($row['gintel']>0){mysql_query("UPDATE `users` set `intel` =`intel`+ ".$row['gintel']." WHERE `id` = ".$user['id']."");$stat="intel";}
    $r=mq("select id, sila, lovk, inta, intel from effects where owner='$user[id]' and type=".ADDICTIONEFFECT." and $stat<0");
    while ($rec=mysql_fetch_assoc($r)) {
      mq("update users set $stat=$stat+".(-$rec[$stat])." where id='$user[id]'");
      mq("delete from effects where id='$rec[id]'");
    }
  } else {
    updeffect($user["id"], $uses_zel, $ins_time, $row, 1);
  }
  echo "����� ������� &quot;".$row['name']."&quot;.";
  $bet=1;
}
?>
