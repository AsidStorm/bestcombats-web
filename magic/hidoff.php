<?php

	if ($user['invis']==0) {echo"<font color=red><b>На вас нет заклятия невидимости<b></font>";}
       else{

        $tar = mysqli_fetch_array(db_query("SELECT `id`,`align` FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
        $target=$_POST['target'];
        if ($tar['id']) {
			db_query("UPDATE `users` SET `invis` = '0' WHERE `id` = '{$tar['id']}';");
            
            echo db_error();
        
}
        else {
            echo "<font color=red><b>Персонаж \"$target\" не существует!<b></font>";
        }
        }
$bet=1;
?>
