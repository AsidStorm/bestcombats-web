<?php
$coma[] = "<font color=red><b>Я и не вспомню как его зовут...</b></font>";
        $im="<img src=<?=IMG_PATH?>/pbuttons/obezl.gif>";


        if ($_SESSION['uid'] == null) header("Location: index.php");
        $magictime=time()+($_POST['timer']*60*1440);
        $tar = mysqli_fetch_array(db_query("SELECT `id`,`align` FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
        $target=$_POST['target'];
        if ($tar['id']) {
            $effect = mysqli_fetch_array(db_query("SELECT `time` FROM `effects` WHERE `owner` = '{$tar['id']}' and `type` = '5' LIMIT 1;"));
            if ($effect['time']) {
                echo "<font color=red><b>На персонаже \"$target\" уже есть заклятие обезличивания </b></font>";
            }
            else {
                $ok=0;
                if (($user['align'] > '2' && $user['align'] < '3')  || $user['align'] == '777' || $user['align'] == '1.1') {
                    $ok=1;
                }
                elseif (($user['align'] > '1.6' && $user['align'] < '2') && ($tar['align'] > '1' && $tar['align'] < '2') && ($user['align'] > $tar['align'])) {
                    $ok=1;
                }
                elseif (($user['align'] > '1.6' && $user['align'] < '2') && !($tar['align'] > '2' && $tar['align'] < '3') && !($tar['align'] > '1' && $tar['align'] < '2')) {
                    $ok=1;
                }
                if ($user['align'] > '3' && $user['align'] < '4') {
                    $ok=1;
                }
                if ($ok == 1) {
                    if (db_query("INSERT INTO `effects` (`owner`,`name`,`time`,`type`) values ('".$tar['id']."','Заклятие обезличивания','$magictime',5);")) {
                        $ldtarget=$target;
                        $magictime="один день";
                        switch($_POST['timer']) {
                            case "2": $magictime="один день."; break;
                            case "2": $magictime="два дня."; break;
                            case "3": $magictime="три дня."; break;
                            case "7": $magictime="одна неделя."; break;
                            case "14": $magictime="две недели."; break;
                            case "30": $magictime="месяц."; break;
                            case "60": $magictime="два месяца."; break;
                            case "365": $magictime="бессрочно."; break;
                        }
                        if ($user['sex'] == 1) {$action="наложил";}
                        else {$action="наложила";}
                        if ($user['align'] > '2' && $user['align'] < '3')  {
                            $angel="Ангел";
                        }
                        elseif ($user['align'] > '1' && $user['align'] < '2') {
                            $angel="Паладин";
                        }
                        $mess="$angel &quot;{$user['login']}&quot; $action заклятие обезличивания на персонажа &quot;$target&quot; сроком $magictime";
                        $messch="$angel &quot;{$user['login']}&quot; $action заклятие обезличивания на персонажа &quot;$target&quot; сроком $magictime.";
                        if ($user['invis'] == '1') {
                        $messch="&quot;невидимка&quot; наложил заклятие обезличивания на персонажа &quot;$target&quot; сроком $magictime";
                        $mess="$angel &quot;{$user['login']}&quot; $action заклятие обезличивания на персонажа &quot;$target&quot; сроком $magictime";
                        }
                        db_query("INSERT INTO `lichka`(`id`,`pers`,`text`,`date`) VALUES ('','".$tar['id']."','$mess','".time()."');");
                        db_query("INSERT INTO `paldelo`(`id`,`author`,`text`,`date`) VALUES ('','".$_SESSION['uid']."','$mess','".time()."');");
                        addch("$im $messch");
                        addchp($coma[rand(0,count($coma)-1)],"Комментатор");
                        echo "<font color=red><b>Успешно наложено заклятие обезличивания на персонажа \"$target\"</b></font>";
                    }
                    else {
                        echo "<font color=red><b>Произошла ошибка!</b></font>";
                    }
                }
                else {
                    echo "<font color=red><b>Вы не можете наложить заклятие обезличивания на этого персонажа!</b></font>";
                }
            }
        }
        else {
            echo "<font color=red><b>Персонаж \"$target\" не существует!</b></font>";
        }
?>
