<?php
	//session_start();
	//if ($_SESSION['uid'] == null) header("Location: index.php");
	include "connect.php";	
	//$user = mysqli_fetch_array(db_query("SELECT * FROM `users` WHERE `id` = '{$_SESSION['uid']}' LIMIT 1;"));
	include "functions.php";	
	$tr = mysqli_fetch_array(db_query("SELECT * FROM `deztow_turnir` WHERE `id` = '".$_GET['id']."'"));

			$ls = mysqli_fetch_array(db_query("select count(`id`) from `users` WHERE `id` = '".$_GET['id']."';"));
			$lss = db_query("select `id` from `users` WHERE `in_tower` = 1;");
			$i=0;
			while($in = mysqli_fetch_array($lss)) {
				$i++;
				if($i>1) { $lors .= ", "; }
				$lors .= nick3($in[0]);
			}
		?>
<HTML>
	<HEAD>
		<link rel=stylesheet type="text/css" href="i/main.css">
		<META Http-Equiv=Cache-Control Content=no-cache>
		<meta http-equiv=PRAGMA content=NO-CACHE>
		<META Http-Equiv=Expires Content=0>
	</HEAD>
<body leftmargin=5 topmargin=5 marginwidth=5 marginheight=5 bgcolor="#e2e0e0">
		
		
			<H3>Башня смерти. Отчет о турнире .</H3>
			Призовой фонд: <B><?=$tr['coin']?> кр.</B><BR>
			<?=$tr['log']?><BR>
			
</BODY>
</HTML>
