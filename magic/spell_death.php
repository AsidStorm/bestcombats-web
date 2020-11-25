<?php
// легкая смерть
if ($_SESSION['uid'] == null) header("Location: index.php");

        $us = mysqli_fetch_array(db_query("SELECT *, (select `id` from `online` WHERE `date` >= ".(time()-60)." AND `id` = users.`id`) as `online` FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
                if ($user['sex'] == 1) {$action="";}
                else {$action="а";}
                if ($user['battle'] > 0) {
                    $fbattle->add_log('<span class=date>'.date("H:i").'</span> '.nick5($user['id'],'b').' использовал'.$action.' заклятие мнгновенной смерти '.(($us['id']!=$user['id'])?"на ".nick5($us['id'],'b'):"").'<BR>');
                    $fbattle->write_log ();
                }
                db_query("UPDATE `users` SET `hp` = '0' WHERE `id` = ".$us['id'].";");
                echo "Вы использовали заклятие мнгновенной смерти на ".$us['login']."!";
                $bet=1;
        echo "</B></FONT>";


?>