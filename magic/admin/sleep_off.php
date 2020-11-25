<?php
        if ($_SESSION['uid'] == null) header("Location: index.php");

        $tar = mysqli_fetch_array(db_query("SELECT `id`,`align` FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
        $target=$_POST['target'];
        if ($tar['id']) {
            $effect = mysqli_fetch_array(db_query("SELECT `time` FROM `effects` WHERE `owner` = '{$tar['id']}' and `type` = '2' LIMIT 1;"));
            if ($effect['time']) {
                $ok=0;
                if (($user['align'] > '2' && $user['align'] < '3')  || $user['align'] == '777') {
                    $ok=1;
                }
                elseif (($user['align'] > '1' && $user['align'] < '2') && ($tar['align'] > '1' && $tar['align'] < '2') && ($user['align'] > $tar['align'])) {
                    $ok=1;
                }
                elseif (($user['align'] > '1' && $user['align'] < '2') && !($tar['align'] > '2' && $tar['align'] < '3') && !($tar['align'] > '1' && $tar['align'] < '2')) {
                    $ok=1;
                }
                if ($user['align'] > '3' && $user['align'] < '4') {
                    $ok=1;
                }
                if ($user['align']==5) $ok=1;
                if (in_array($_SESSION['uid'], $smalladms)) $ok=1;
                if ($ok == 1) {
                    if (db_query("DELETE FROM`effects` WHERE `owner` = '{$tar['id']}' and `type` = '2' LIMIT 1 ;")) {
                        if ($user['sex'] == 1) {$action="снял";}
                        else {$action="сняла";}
                        if ($user['align'] > '2' && $user['align'] < '3')  {
                        $angel="Ангел";
                        }
                        elseif ($user['align'] > '1' && $user['align'] < '2') {
                        $angel="Паладин";
                        }
                        elseif ($user['align'] > '3' && $user['align'] <'4') {
                        $angel="Тарман";
                        }
                        $mess="$angel &quot;{$user['login']}&quot; $action заклятие молчания с персонажа &quot;$target&quot;.";
                        $messch="$angel &quot;{$user['login']}&quot; $action заклятие молчания с персонажа &quot;$target&quot;.";
                        if ($user['invis'] == '1') {
                        $mess="$angel &quot;{$user['login']}&quot; $action заклятие молчания с персонажа &quot;$target&quot;.";
                        $messch="&quot;невидимка&quot; снял заклятие молчания с персонажа &quot;$target&quot;.";
                        }
                        db_query("INSERT INTO `lichka`(`id`,`pers`,`text`,`date`) VALUES ('','".$tar['id']."','$mess','".time()."');");
                        db_query("INSERT INTO `paldelo`(`id`,`author`,`text`,`date`) VALUES ('','".$_SESSION['uid']."','$mess','".time()."');");
                        addch("<img src=<?=IMG_PATH?>/pbuttons/sleep_off.gif> $messch");
                        echo "<font color=red><b>Успешно снято заклятие молчания с персонажа \"$target\"</b></font>";
                    }
                    else {
                        echo "<font color=red><b>Произошла ошибка!</b></font>";
                    }
                }
                else {
                    echo "<font color=red><b>Вы не можете снять заклятие молчания с этого персонажа!</b></font>";
                }
            }
            else {
                echo "<font color=red><b>На персонаже \"$target\" нет заклятия молчания </b></font>";
            }
        }
        else {
            echo "<font color=red><b>Персонаж \"$target\" не существует!</b></font>";
        }
?>
