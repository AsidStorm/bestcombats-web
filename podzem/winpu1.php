<?
  $glav_id = $hokke["glav_id"];
  $glava = $hokke["glava"];
  $nm = $hokke["boi"];
  /////////////////////////////////////////////////////////////
  $DR = mysqli_fetch_array(db_query("SELECT * FROM `canal_bot` WHERE `glava`='$glava' and `boi`= '$nm'"));
  if($DR) {
    $bot = $DR["bot"];
    $nomer = $DR["nomer"];
    ////////////////////////////////////////////////////////////////
    $shans1 = rand(0,100);
    $shans2 = rand(0,100);
    $shans3 = rand(0,100);
    ////////////////////////////////////////////////////////////////
    $est=0;$d1=0;$d2=0;
    if ($this->user["room"]==52) {
	  //  db_query("INSERT into `podzem_drop` (`item_id`,`from`,`glava_id`,`location`,`etaj`)VALUES('".mt_rand(1,9)."','shop','".$glav_id ."','".$hokke['location']."','".$hokke['name']."')  ");
 	
    If (($bot=='19' or $bot=='19.19' or  $bot=='19.19.19' or $bot=='20' or $bot=='20.20' or  $bot=='20.20.20' or $bot=='21' or $bot=='21.21' or  $bot=='21.21.21' or $bot=='22' or $bot=='22.22' or  $bot=='22.22.22' or $bot=='23' or $bot=='23.23' or  $bot=='23.23.23') and $shans3<20){
	    db_query("INSERT into `podzem_drop` (`item_id`,`from`,`glava_id`,`location`,`etaj`)VALUES('".mt_rand(10956,11038)."','shop','".$glav_id ."','".$hokke['location']."','".$hokke['name']."')  ");
    }
	
	If ($bot=='7' and $shans4<=50){
		db_query("INSERT into `podzem_drop` (`item_id`,`from`,`glava_id`,`location`,`etaj`)VALUES('".mt_rand(3776,3783)."','shop','".$glav_id ."','".$hokke['location']."','".$hokke['name']."')  ");
	}	
	
	If (($bot=='24' or $bot=='24.24' or  $bot=='24.24.24' or $bot=='25' or $bot=='25.25' or  $bot=='25.25.25' or $bot=='27' or $bot=='27.27' or  $bot=='27.27.27' or $bot=='28' or $bot=='28.28' or  $bot=='28.28.28') and $shans3<20){
		db_query("INSERT into `podzem_drop` (`item_id`,`from`,`glava_id`,`location`,`etaj`)VALUES('".mt_rand(11039,11127)."','shop','".$glav_id ."','".$hokke['location']."','".$hokke['name']."')  ");	}	
		
	
	If (($bot=='21.21.21') and $shans3<10){
		db_query("INSERT into `podzem_drop` (`item_id`,`from`,`glava_id`,`location`,`etaj`)VALUES('".mt_rand(11524,11528)."','shop','".$glav_id ."','".$hokke['location']."','".$hokke['name']."')  ");	}	
	

	If (($bot=='26.26') and $shans3<100){
		db_query("INSERT into `podzem_drop` (`item_id`,`from`,`glava_id`,`location`,`etaj`)VALUES('".mt_rand(11320,11326)."','shop','".$glav_id ."','".$hokke['location']."','".$hokke['name']."')  ");	}	
	
	
	If (($bot=='26.26.26') and $shans3<100){
		db_query("INSERT into `podzem_drop` (`item_id`,`from`,`glava_id`,`location`,`etaj`)VALUES('".mt_rand(11437,11442)."','shop','".$glav_id ."','".$hokke['location']."','".$hokke['name']."')  ");
	}
	
	If (($bot=='19' or $bot=='19.19' or  $bot=='19.19.19' or $bot=='20' or $bot=='20.20' or  $bot=='20.20.20' or $bot=='21' or $bot=='21.21' or  $bot=='21.21.21' or $bot=='22' or $bot=='22.22' or  $bot=='22.22.22' or $bot=='23' or $bot=='23.23' or  $bot=='23.23.23' or $bot=='24' or $bot=='24.24' or  $bot=='24.24.24' or $bot=='25' or $bot=='25.25' or  $bot=='25.25.25' or $bot=='27' or $bot=='27.27' or  $bot=='27.27.27' or $bot=='28' or $bot=='28.28' or  $bot=='28.28.28') and $shans3<1){
		db_query("INSERT into `podzem_drop` (`item_id`,`from`,`glava_id`,`location`,`etaj`)VALUES('".mt_rand(3792,3818)."','shop','".$glav_id ."','".$hokke['location']."','".$hokke['name']."')  ");
	}	
	
    } else {
      $bots=explode(".",$bot);
      $drop1="";
      foreach ($bots as $k=>$v) {
        if ($drop[$this->user["room"]][$v]) {
          srand();
          $rnd=rand(1,100);
          if ($rnd<=$drop[$this->user["room"]][$v]["chance"]) $drop1.="-".$drop[$this->user["room"]][$v]["item"];
        }
      }
      if ($drop1) $drop1="i$drop1";
      db_query("UPDATE podzem3 SET n$nomer='$drop1' WHERE glava='$glava' and name='".$hokke["name"]."'");
    }
  }
  db_query("UPDATE `labirint` SET `boi`='0' WHERE `glav_id`=".$hokke['glav_id']." and name='$hokke[name]' and boi='$hokke[boi]'");
  db_query("DELETE FROM `canal_bot` WHERE `nomer`='$nomer' and `glava`='$glava' and `boi`='$nm'");
?>