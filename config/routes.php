<?php
$routes=array();
if ($user['incity'] == 'dungeon') {
  $routes["77"]=array(20);
  $routes["20"]   = array(9000, 77);
}elseif ($user['incity'] == 'suburb') {
  $routes["20"]   = array(21, 2005);
  $routes["2005"] = array(20);
  $routes["21"]   = array(20, 11111, 1300, 7777, 2222, 82, 9000);
  $routes["11111"] = array(21);
  $routes["7777"] = array(21);
  $routes["2222"] = array(21);
  $routes["1300"] = array(21);
  $routes["82"] = array(21);
  $routes["9000"] = array(21, 9001, 9002);
  $routes["9001"] = array(9000);
  $routes["9002"] = array(9000);
}elseif ($user['incity'] == 'suncity') {
  $routes["20"]   = array(21, 2005);
  $routes["21"]   = array(9000, 2005);
  $routes["9000"]   = array(26, 2005);

} else {
  $routes["20"]=array(21,24,49);
  $routes["21"]=array(20, 70);
  $routes["45"]=array(20);
  $routes["24"]=array(20, 90);

  $routes["45"]=array(49,51,53,54,457,2005,2002);
  $routes["2002"] = array(45,22);
  $routes["46"]=array(24);
  $routes["47"]=array(45);
  $routes["49"]=array(45,105,20,700,56,58,59, 62, 60, 64);    $routes["457"]=array(45);
  $routes["2005"]=array(45);
  $routes["51"]=array(45);
  $routes["53"]=array(45);  
  $routes["54"]=array(45, 301);  
  $routes["55"]=array(54);  
  $routes["56"]=array(49);  $routes["58"]=array(49);   
  $routes["59"]=array(49);  
  $routes["60"]=array(49);  
  $routes["62"]=array(49);  
  $routes["64"]=array(49);  

  $routes["70"]=array(21, 71, 73, 75, 77, 81);  
  $routes["71"]=array(70);
  $routes["73"]=array(70);  
  $routes["75"]=array(70);
  $routes["81"]=array(70);  
  $routes["90"]=array(24);  

  $routes["101"]=array(49);
  $routes["105"]=array(49, 700);
  $routes["301"]=array(54);

  $routes["402"]=array(21);

  $routes["700"]=array(701, 708, 707, 49);
  $routes["701"]=array(0, 702, 700, 0);
  $routes["702"]=array(0, 703, 0, 701);
  $routes["703"]=array(0, 0, 704, 702);
  $routes["704"]=array(703, 0, 705, 0);
  $routes["705"]=array(704, 0, 0, 706);
  $routes["706"]=array(0, 705, 0, 707);
  $routes["707"]=array(700, 706, 0, 0);
  $routes["708"]=array(710, 709, 711, 700, 718, 719);
  $routes["709"]=array(710, 0, 711, 708, 720, 721);
  $routes["710"]=array(0, 713, 709, 712);
  $routes["711"]=array(709, 716, 0, 715);
  $routes["712"]=array(0, 710, 714, 0);
  $routes["713"]=array(0, 0, 717, 710);
  $routes["714"]=array(712, 0, 715, 0);
  $routes["715"]=array(714, 711, 0, 0);
  $routes["716"]=array(717, 0, 0, 711);
  $routes["717"]=array(713, 0, 716, 0);
  $routes["718"]=array(0, 0, 0, 708);
  $routes["719"]=array(0, 0, 0, 708);
  $routes["720"]=array(0, 0, 0, 709);
  $routes["721"]=array(0, 0, 0, 709);
}

?>