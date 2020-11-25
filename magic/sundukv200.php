<?php
//podarokNY.php	
	if ($_SESSION['uid'] == null) header("Location: index.php");
if((int)date("n")!=0){
	$data=mysql_fetch_array(mysql_query("SELECT * FROM `users` where id='".$_SESSION['uid']."'"));

	$rrr=mt_rand(1,3);
	($rrr==1)?$rstat="gsila":"gsila";
	($rrr==2)?$rstat="glovk":"gsila";
	($rrr==3)?$rstat="ginta":"gsila";

	
	$ret=takeshopitem(100594,"berezka","Сундук", "", 0, array("maxdur"=>20));
    echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
	
	$ret=takeshopitem(101771,"berezka","Сундук", "", 0, array("maxdur"=>20));
    echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
	
	$ret=takeshopitem(100502,"berezka","Сундук", "", 0, array("maxdur"=>10));
    echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
        
    $ret=takeshopitem(100005,"berezka","Сундук", "", 0, array("maxdur"=>10));
    echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
       
    $ret=takeshopitem(101785,"berezka","Сундук", "", 0, array("maxdur"=>10));
    echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
		 
    $ret=takeshopitem(2316,"shop","Сундук", "", 0, array("maxdur"=>5));
    echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
	
	$ret=takeshopitem(101708,"berezka","Сундук", "", 0, array("maxdur"=>20));
    echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
	
	$ret=takeshopitem(101698,"berezka","Сундук", "", 0, array("maxdur"=>20));
    echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
	
	$ret=takeshopitem(101703,"berezka","Сундук", "", 0, array("maxdur"=>20));
    echo " <img src=\"".IMGBASE."/i/sh/$ret[img]\" title=\"$ret[name]\"> $ret[name] , ";
	
	echo "Вы вскрыли Коллекционный Сундук Разреза..<br>$got";
	
			destructitem($_GET['use']);
}
else
{
echo "<font color=red><b>Еще не время...<b></font>";
}

?>