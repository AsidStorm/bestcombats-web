<?php

$routes=array();
  
if ($user['incity'] == 'emerald') { 
  $routes["311"]= array(2005);  
  $routes["21"]=array(20,70,311);
  $routes["314"]=array(316,311,315);
  $routes["315"]=array(314,3151,3152);     
  $routes["54"]=array(45,301);   
  $routes["311"]=array(314,331,313);
  $routes["313"]=array(311);
  $routes["314"]=array(311,316,315);
  $routes["312"]=array(311);
  $routes["316"]=array(314,3161,317);
  $routes["3161"]=array(316,3162);
  $routes["3162"]=array(3161,3163);
  $routes["3163"]=array(3162);
  $routes["3151"]=array(315);
  $routes["3152"]=array(315);
  $routes["331"]=array(311);
  $routes["319"]=array(317); 
  $routes["317"]=array(316,318,319);                 
  $routes["301"]=array(54);
  $routes["318"]=array(317);
  $routes["402"]=array(21);
  $routes["4022"]=array(21); 
}

?>
