<?php

if ($_SESSION['uid'] == null) header("Location: index.php");
if (!$user["battle"]) {
  echo "Этот свиток можно использовать только в бою.";
} else {
  global $report, $scrollresult;
  $report="Успнешно использован свиток $row[name].";
  $bet=1;  
  $scrollresult["report"]=$report;
  $scrollresult["selfcast"]=1;
  $fbattle->toupdatebu[$user["id"]]["resurrect"]=1;
  $fbattle->needupdatebu=1;
}
?>