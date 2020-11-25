<?php
        if ($_SESSION['uid'] == null) header("Location: index.php");

        $tar = mysql_fetch_array(mysql_query("SELECT `id`,`align` FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
        $target=$_POST['target'];
        if ($tar['id']) {
            $effect = mysql_fetch_array(mysql_query("SELECT `time` FROM `effects` WHERE `owner` = '{$tar['id']}' and `type` = '5' LIMIT 1;"));
            if ($effect['time']) {
                $ok=0;
                if (($user['align'] > '2' && $user['align'] < '3')  || $user['align'] == '777' || $user['align'] == '1.1') {
                    $ok=1;
                }
                elseif (($user['align'] == '1.9') && ($tar['align'] > '1' && $tar['align'] < '2') && ($user['align'] > $tar['align'])) {
                    $ok=1;
                }
                elseif (($user['align'] == '1.9') && !($tar['align'] > '2' && $tar['align'] < '3') && !($tar['align'] > '1' && $tar['align'] < '2')) {
                    $ok=1;
                }
                if ($user['align'] > '3' && $user['align'] < '4') {
                    $ok=1;
                }
                if ($ok == 1) {
                    if (mysql_query("DELETE FROM`effects` WHERE `owner` = '{$tar['id']}' and `type` = '5' LIMIT 1 ;")) {
                        if ($user['sex'] == 1) {$action="снял";}
                        else {$action="сняла";}
                        if ($user['align'] > '2' && $user['align'] < '3')  {
                            $angel="Ангел";
                        }
                        elseif ($user['align'] > '1' && $user['align'] < '2') {
                            $angel="Паладин";
                        }
                        $mess="$angel &quot;{$user['login']}&quot; $action заклятие обезличивания с &quot;$target&quot;.";
                        $messch="$angel &quot;{$user['login']}&quot; $action заклятие обезличивания с &quot;$target&quot;.";
                         if ($user['invis'] == '1') {
                        $messch="&quot;невидимка&quot; наложил заклятие обезличивания с персонажа &quot;$target&quot;.";
                        $mess="$angel &quot;{$user['login']}&quot; $action заклятие обезличивания с персонажа &quot;$target&quot;.";
                        }
                        mysql_query("INSERT INTO `lichka`(`id`,`pers`,`text`,`date`) VALUES ('','".$tar['id']."','$mess','".time()."');");
                        mysql_query("INSERT INTO `paldelo`(`id`,`author`,`text`,`date`) VALUES ('','".$_SESSION['uid']."','$mess','".time()."');");
                        addch("<img src=http://img.bestcombats.net/pbuttons/obezl_off.gif> $messch");
                        echo "<font color=red><b>Успешно снято заклятие обезличивания с персонажа \"$target\"</b></font>";
                    }
                    else {
                        echo "<font color=red><b>Произошла ошибка!</b></font>";
                    }
                }
                else {
                    echo "<font color=red><b>Вы не можете снять заклятие обезличивания с этого персонажа!</b></font>";
                }
            }
            else {
                echo "<font color=red><b>На персонаже \"$target\" нет заклятия обезличивания </b></font>";
            }
        }
        else {
            echo "<font color=red><b>Персонаж \"$target\" не существует!</b></font>";
        }
?>