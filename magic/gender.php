<?php
// magic идентификацыя
    //if (rand(1,2)==1) {
        if ($_SESSION['uid'] == null) header("Location: index.php");

        $magictime=time()+($_POST['timer']*60);
        $target=$_POST['target'];
        $tar = mysql_fetch_array(mysql_query("SELECT `id`,`align`,`spellfreedom`, sex FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
        if ($tar['id']) {
                $ok=0;
                if ($user['align']=='2.5') {
                    $ok=1;
                }
                if ($ok == 1) {
                  mq("update users set sex='".($tar["sex"]==1?0:1)."', shadow='0.gif' where id='$tar[id]'");
                  if ($user['sex'] == 1) {$action="сменил";}
                  else {$action="сменила";}
                        if ($user['align'] > '2' && $user['align'] < '3')  {
                        $angel="Ангел";
                        }
                        elseif ($user['align'] > '1' && $user['align'] < '2') {
                        $angel="Паладин";
                        }
                        elseif ($user['align'] > '3' && $user['align'] <'4') {
                        $angel="Тарман";
                        }
                        $mess="$angel &quot;{$user['login']}&quot; $action пол персонажу &quot;$target&quot;";
                        $messch="$angel &quot;{$user['login']}&quot; $action пол персонажу &quot;$target&quot;";
                        if ($user['invis'] == '1') {
                        $mess="$angel &quot;{$user['login']}&quot; $action заклятие молчания на персонажа &quot;$target&quot; сроком $magictime";
                        $messch="&quot;невидимка&quot; наложил заклятие молчания на персонажа &quot;$target&quot; сроком $magictime";
                        }
                        addch("<img src=i/magic/gender.gif> $messch");
                        echo "<font color=red><b>Успешно сменён пол персонажу \"$target\"</b></font>";
                }
        }
        else {
            echo "<font color=red><b>Персонаж \"$target\" не существует!<b></font>";
        }
?>
