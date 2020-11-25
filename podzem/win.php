<?
  $drop["52"]["22"]=array("chance"=>10,"item"=>15);
  $drop["52"]["20"]=array("chance"=>20,"item"=>15);
  $drop["52"]["21"]=array("chance"=>10,"item"=>16);
  $drop["52"]["23"]=array("chance"=>20,"item"=>16);
  $drop["52"]["19"]=array("chance"=>10,"item"=>17);
  $drop["52"]["24"]=array("chance"=>10,"item"=>20);
  $drop["52"]["25"]=array("chance"=>5,"item"=>20);
  $drop["52"]["26"]=array("chance"=>10,"item"=>21);
  $drop["52"]["27"]=array("chance"=>10,"item"=>19);
  $drop["52"]["28"]=array("chance"=>15,"item"=>19);
  
  $glav_id = $hokke["glav_id"];
  $glava = $hokke["glava"];
  $nm = $hokke["boi"];
  /////////////////////////////////////////////////////////////
  $DR = mysql_fetch_array(mysql_query("SELECT * FROM `canal_bot` WHERE `glava`='$glava' and `boi`= '$nm'"));
  if($DR) {
    $bot = $DR["bot"];
    $nomer = $DR["nomer"];
    ////////////////////////////////////////////////////////////////
    $shans1 = rand(0,100);
    $shans2 = rand(0,100);
    $shans3 = rand(0,100);
    ////////////////////////////////////////////////////////////////

    include "winpu.php";
    ////////////////////////////////////////////////////////////////
    $est=0;$d1=0;$d2=0;
    if ($this->user["room"]==403) {
	  //  mysql_query("INSERT into `podzem_drop` (`item_id`,`from`,`glava_id`,`location`,`etaj`)VALUES('".mt_rand(1,9)."','shop','".$glav_id ."','".$hokke['location']."','".$hokke['name']."')  ");
 	
    If (($bot=='1' or $bot=='1.1' or  $bot=='1.1.1' or $bot=='2' or $bot=='2.2' or  $bot=='2.2.2' or $bot=='3' or $bot=='3.3' or  $bot=='3.3.3' or $bot=='4' or $bot=='4.4' or  $bot=='4.4.4' or $bot=='5' or $bot=='5.5' or  $bot=='5.5.5' or $bot=='6' or $bot=='6.6' or  $bot=='6.6.6') and $shans3<20){
	    mysql_query("INSERT into `podzem_drop` (`item_id`,`from`,`glava_id`,`location`,`etaj`)VALUES('".mt_rand(3426,3603)."','shop','".$glav_id ."','".$hokke['location']."','".$hokke['name']."')  ");
    }
	
	If ($bot=='7' and $shans4<=50){
		mysql_query("INSERT into `podzem_drop` (`item_id`,`from`,`glava_id`,`location`,`etaj`)VALUES('".mt_rand(3776,3783)."','shop','".$glav_id ."','".$hokke['location']."','".$hokke['name']."')  ");
	}	
	
	If (($bot=='9' or $bot=='9.9' or  $bot=='9.9.9' or $bot=='10' or $bot=='10.10' or  $bot=='10.10.10' or $bot=='11' or $bot=='11.11' or  $bot=='11.11.11' or $bot=='12' or $bot=='12.12' or  $bot=='12.12.12' or $bot=='13' or $bot=='13.13' or  $bot=='13.13.13' or $bot=='16' or $bot=='16.16' or  $bot=='16.16.16') and $shans3<20){
		mysql_query("INSERT into `podzem_drop` (`item_id`,`from`,`glava_id`,`location`,`etaj`)VALUES('".mt_rand(3604,3692)."','shop','".$glav_id ."','".$hokke['location']."','".$hokke['name']."')  ");
	}
	
	If ($bot=='18' and $shans4<=50){
		mysql_query("INSERT into `podzem_drop` (`item_id`,`from`,`glava_id`,`location`,`etaj`)VALUES('".mt_rand(3784,3791)."','shop','".$glav_id ."','".$hokke['location']."','".$hokke['name']."')  ");
	}
	
	If (($bot=='4' or $bot=='14.14' or  $bot=='14.14.14' or $bot=='15' or $bot=='15.15' or  $bot=='15.15.15' or $bot=='17' or $bot=='17.17' or  $bot=='17.17.17') and $shans3<20){
		mysql_query("INSERT into `podzem_drop` (`item_id`,`from`,`glava_id`,`location`,`etaj`)VALUES('".mt_rand(3693,3775)."','shop','".$glav_id ."','".$hokke['location']."','".$hokke['name']."')  ");
	}
	
	If (($bot=='1' or $bot=='1.1' or  $bot=='1.1.1' or $bot=='2' or $bot=='2.2' or  $bot=='2.2.2' or $bot=='3' or $bot=='3.3' or  $bot=='3.3.3' or $bot=='4' or $bot=='4.4' or  $bot=='4.4.4' or $bot=='5' or $bot=='5.5' or  $bot=='5.5.5' or $bot=='6' or $bot=='6.6' or  $bot=='6.6.6' or  $bot=='7' or $bot=='7.7' or  $bot=='7.7.7' or $bot=='9' or $bot=='9.9' or  $bot=='9.9.9' or $bot=='10' or $bot=='10.10' or  $bot=='10.10.10' or $bot=='11' or $bot=='11.11' or  $bot=='11.11.11' or $bot=='12' or $bot=='12.12' or  $bot=='12.12.12' or $bot=='13' or $bot=='13.13' or  $bot=='13.13.13' or $bot=='14' or $bot=='15' or $bot=='16' or $bot=='17' or $bot=='18') and $shans3<1){
		mysql_query("INSERT into `podzem_drop` (`item_id`,`from`,`glava_id`,`location`,`etaj`)VALUES('".mt_rand(3792,3818)."','shop','".$glav_id ."','".$hokke['location']."','".$hokke['name']."')  ");
	}	
	

	
      if($bot=='1' or $bot=='2' or $bot=='3' or $bot=='1.1' or $bot=='1.2' or $bot=='1.3' or $bot=='2.2' or $bot=='2.3' or $bot=='3.3' or $bot=='1.1.1' or $bot=='1.1.2' or $bot=='1.1.2' or $bot=='1.2.2' or $bot=='1.3.2' or $bot=='1.3.3' or $bot=='2.2.2' or $bot=='2.2.3' or $bot=='2.3.3' or $bot=='3.3.3' or $bot=='1.3.2'){
        if($bot=='1' and $bot=='2' and $bot=='3')
        {if($shans1<'50'){$d1=1;} }
        if($bot=='1.1' or $shans2<'50' and $bot=='1.2' or $shans2<'50' and $bot=='1.3' or $shans2<'50' and $bot=='2.2' or $shans2<'50' and $bot=='2.3' or $shans2<'50' and $bot=='3.3')
        {if($shans1<'50'){$d1=1;}if($shans2<'50'){$d2=1;}}
        if($bot=='1.1.1' or $shans3<'50' and $bot=='1.1.2' or $shans3<'50' and $bot=='1.1.2' or $shans3<'50' and $bot=='1.2.2' or $shans3<'50' and $bot=='1.3.2' or $shans3<'50' and $bot=='1.3.3' or $shans3<'50' and $bot=='2.2.2' or $shans3<'50' and $bot=='2.2.3' or $shans3<'50' and $bot=='2.3.3' or $shans3<'50' and $bot=='3.3.3' or $shans3<'50' and $bot=='1.3.2')
        {if($shans1<'50'){$d1=1;}if($shans2<'50'){$d2=1;}if($shans3<'50'){$d3=1;}}
        $est = $d1+$d2+$d3+500;
        if($est>'500'){mysql_query("UPDATE podzem3 SET n$nomer='$est' WHERE glava='$glava' and name='".$hokke["name"]."'");}
        else{mysql_query("UPDATE podzem3 SET n$nomer='' WHERE glava='$glava' and name='".$hokke["name"]."'");}
      }

		
      if($bot=='4' or $bot=='5' or $bot=='6' or $bot=='8'){
      if($shans1<'99'){$est=504;}
      if($est>'500'){mysql_query("UPDATE podzem3 SET n$nomer='$est' WHERE glava='$glava' and name='".$hokke["name"]."'");}
      else{mysql_query("UPDATE podzem3 SET n$nomer='' WHERE glava='$glava' and name='".$hokke["name"]."'");}
      }

      if($bot=='7'){
      if($shans1<'99'){$est=510;}
      if($est=='510'){mysql_query("UPDATE podzem3 SET n$nomer='$est' WHERE glava='$glava' and name='".$hokke["name"]."'");}
      else{mysql_query("UPDATE podzem3 SET n$nomer='' WHERE glava='$glava' and name='".$hokke["name"]."'");}
      if($this->user['medal2']=='0'){mysql_query("UPDATE `users` SET `medal2`='1' WHERE `id`=".$this->user['id']."");}
      }
      //////////////////////////2 etaz//////////////////////////////

      if($bot=='9' or $bot=='11' or $bot=='9.9' or $bot=='11.11' or $bot=='9.9.9' or $bot=='11.11.11'){

      if($bot=='9' or $bot=='11'){if($shans1<'99'){$d1=1;} }
      if($bot=='9.9' or $bot=='11.11'){if($shans1<'99'){$d1=1;} if($shans2<'99'){$d2=1;} }
      if($bot=='9.9.9' or $bot=='11.11.11'){if($shans1<'99'){$d1=1;} if($shans2<'99'){$d2=1;} if($shans3<'99'){$d3=1;} }
      $est = $d1+$d2+$d3+600;
      if($est>'600'){mysql_query("UPDATE podzem3 SET n$nomer='$est' WHERE glava='$glava' and name='".$hokke["name"]."'");}
      else{mysql_query("UPDATE podzem3 SET n$nomer='' WHERE glava='$glava' and name='".$hokke["name"]."'");}

      }//////////Чистая гайка/////////////////
      if($bot=='13' or $bot=='13.13' or $bot=='13.13.13'){

      if($bot=='13'){if($shans1<'99'){$d1=1;} }
      if($bot=='13.13'){if($shans1<'99'){$d1=1;} if($shans2<'99'){$d2=1;} }
      if($bot=='13.13.13'){if($shans1<'99'){$d1=1;} if($shans2<'99'){$d2=1;} if($shans3<'99'){$d3=1;} }
      $est = $d1+$d2+$d3+603;
      if($est>'603'){mysql_query("UPDATE podzem3 SET n$nomer='$est' WHERE glava='$glava' and name='".$hokke["name"]."'");}
      else{mysql_query("UPDATE podzem3 SET n$nomer='' WHERE glava='$glava' and name='".$hokke["name"]."'");}

      }//////////Гайка с резьбой/////////////////
      if($bot=='10' or $bot=='10.10' or $bot=='10.10.10'){

      if($bot=='10'){if($shans1<'99'){$d1=1;} }
      if($bot=='10.10'){if($shans1<'99'){$d1=1;} if($shans2<'99'){$d2=1;} }
      if($bot=='10.10.10'){if($shans1<'99'){$d1=1;} if($shans2<'99'){$d2=1;} if($shans3<'99'){$d3=1;} }
      $est = $d1+$d2+$d3+606;
      if($est>'606'){mysql_query("UPDATE podzem3 SET n$nomer='$est' WHERE glava='$glava' and name='".$hokke["name"]."'");}
      else{mysql_query("UPDATE podzem3 SET n$nomer='' WHERE glava='$glava' and name='".$hokke["name"]."'");}

      }//////////длинный болт/////////////////
      if($bot=='12' or $bot=='12.12' or $bot=='12.12.12' or $bot=='15' or $bot=='15.15' or $bot=='15.15.15' or $bot=='16' or $bot=='16.16' or $bot=='16.16.16'){

      if($bot=='12' or $bot=='15' or $bot=='16'){if($shans1<'99'){$d1=1;} }
      if($bot=='12.12' or $bot=='15.15' or $bot=='16.16'){if($shans1<'99'){$d1=1;} if($shans2<'99'){$d2=1;} }
      if($bot=='12.12.12' or $bot=='15.15.15' or $bot=='16.16.16'){if($shans1<'99'){$d1=1;} if($shans2<'99'){$d2=1;} if($shans3<'99'){$d3=1;} }
      $est = $d1+$d2+$d3+609;
      if($est>'609'){mysql_query("UPDATE podzem3 SET n$nomer='$est' WHERE glava='$glava' and name='".$hokke["name"]."'");}
      else{mysql_query("UPDATE podzem3 SET n$nomer='' WHERE glava='$glava' and name='".$hokke["name"]."'");}

      }//////////Нужный болт/////////////////
      if($bot=='14' or $bot=='14.14' or $bot=='14.14.14' or $bot=='17' or $bot=='17.17' or $bot=='17.17.17' or $bot=='18' or $bot=='18.18' or $bot=='18.18.18'){
        if($bot=='14' or $bot=='17' or $bot=='18'){if($shans1<'99'){$d1=1;} }
        if($bot=='14.14' or $bot=='17.17' or $bot=='18.18'){if($shans1<'99'){$d1=1;} if($shans2<'99'){$d2=1;} }
        if($bot=='14.14.14' or $bot=='17.17.17' or $bot=='18.18.18'){if($shans1<'99'){$d1=1;} if($shans2<'99'){$d2=1;} if($shans3<'99'){$d3=1;} }
        $est = $d1+$d2+$d3+612;
        if($est>'612'){mysql_query("UPDATE podzem3 SET n$nomer='$est' WHERE glava='$glava' and name='".$hokke["name"]."'");}
        else{mysql_query("UPDATE podzem3 SET n$nomer='' WHERE glava='$glava' and name='".$hokke["name"]."'");}
      }//////////Рабочий винтель/////////////////
    } elseif ($this->user["room"]==48) {
      if ($bot=="29") {
        if (rand(0,100)<=50) mysql_query("UPDATE podzem3 SET n$nomer='511' WHERE glava='$glava' and name='".$hokke["name"]."'");
        else mysql_query("UPDATE podzem3 SET n$nomer='' WHERE glava='$glava' and name='".$hokke["name"]."'");
      }
      if ($bot=="30") {
        if (rand(0,100)<=75) mysql_query("UPDATE podzem3 SET n$nomer='511' WHERE glava='$glava' and name='".$hokke["name"]."'");
        else mysql_query("UPDATE podzem3 SET n$nomer='' WHERE glava='$glava' and name='".$hokke["name"]."'");
      }
      if ($bot=="31") {
        if (rand(0,100)<=100) mysql_query("UPDATE podzem3 SET n$nomer='511' WHERE glava='$glava' and name='".$hokke["name"]."'");
        else mysql_query("UPDATE podzem3 SET n$nomer='' WHERE glava='$glava' and name='".$hokke["name"]."'");
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
      mysql_query("UPDATE podzem3 SET n$nomer='$drop1' WHERE glava='$glava' and name='".$hokke["name"]."'");
    }
    $bots=explode(".", $bot);
    foreach ($bots as $k=>$v) {
      if ($v) mysql_query("update podzem_zad_login set ubil=ubil+1 where owner='$maxdamageuser' and bot='$v' and ubil<ubit");
    }
  }
  mysql_query("UPDATE `labirint` SET `boi`='0' WHERE `glav_id`=".$hokke['glav_id']." and name='$hokke[name]' and boi='$hokke[boi]'");
  mysql_query("DELETE FROM `canal_bot` WHERE `nomer`='$nomer' and `glava`='$glava' and `boi`='$nm'");
?>