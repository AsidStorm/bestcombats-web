<?php
include "../connect.php";

$ban_users=mysql_query("SELECT * from users where block=1 order by id ASC;");

echo "<table border=1>
		<tr><td>¹</td> <td>ID</td> <td>Ligin</td> <td>inventory</td>  <td>delo</td> <td>effects</td> </tr>
";
$i=0; $inventory_all=0; $delo_all=0; $effects_all=0;

while ($ban_users_w=mysql_fetch_array($ban_users)){
	$inventory=mysql_num_rows(mysql_query("SELECT * from inventory where owner=".$ban_users_w['id']."  "));
	$delo=mysql_num_rows(mysql_query("SELECT * from delo where pers=".$ban_users_w['id']."  "));
	$effects=mysql_num_rows(mysql_query("SELECT * from effects where owner=".$ban_users_w['id']."  "));
	
	
	
	$i++; $inventory_all+=$inventory; $delo_all+=$delo; $effects_all+=$effects;
	echo "<tr><td>".$i."</td> <td>".$ban_users_w['id']."</td> <td>".$ban_users_w['login']." [".$ban_users_w['level']."] <a href='/inf.php?".$ban_users_w['id']."' target='_blank'><img src='/i/inf.gif'></a> </td> <td>".$inventory."</td> <td>".$delo."</td> <td>".$effects."</td> </tr>";
	
	
	mysql_query("DELETE from `users` where `id`=".$ban_users_w['id']."  LIMIT 1;");
	mysql_query("DELETE from `online` where `id`=".$ban_users_w['id']."  LIMIT 1;");
	mysql_query("DELETE from `inventory` where `owner`=".$ban_users_w['id']." ");
	mysql_query("DELETE from `delo` where `pers`=".$ban_users_w['id']." ");
	mysql_query("DELETE from `iplog` where `owner`=".$ban_users_w['id']." ");
	mysql_query("DELETE from `effects` where `owner`=".$ban_users_w['id']." ");
	
	
}


echo "<tr><td>".$i."</td> <td></td> <td></td> <td>".$inventory_all."</td> <td>".$delo_all."</td> <td>".$effects_all."</td> </tr>";
?>