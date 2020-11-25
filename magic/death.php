<?php
// magic идентификацыя
    //if (rand(1,2)==1) {
$coma[] = "Вот так. Правду говорят, что словом убить можно. ";
$coma[] = "Вот такая трагическая и нелепая смерть. ";
$coma[] = "В аду жарко, возьми с собой предмет: 'Огнетушитель раскаяния'. Так... на память о Клубе. ";
$coma[] = "Вот теперь на кого-то наденут деревянный макинтош ";
$coma[] = "Все мы там будем ";
$coma[] = "Жестокий мир, жестокие сердца ";
$coma[] = "Жизнь коротка и быстротечна... успей понять это, нарушив Закон. ";
$coma[] = "Да и боец из него не очень... был... ";
$coma[] = "Кому тесно в рамках закона, будет нежиться в просторном гробу! ";
$coma[] = "Мы провожаем в последний путь... Мы провожаем... Черт, забыл, как там дальше. Аминь, короче. ";
$coma[] = "На кладбище ветер свищет, мертвый перс по полю рыщет. Место хочет отыскать, далеко его видать. ";
$coma[] = "На кладбище новоселье... ";
$coma[] = "Несчастные случаи и здесь бывают ";
$coma[] = "'Нет человека, нет проблем'. Иосиф Виссарионович Паладинов ";
$coma[] = "Надеюсь, он успел написать завещание ";
$coma[] = "Он был плохим солдатом ";
$coma[] = "Он не любил бойцовский клуб ";
$coma[] = "И разложится ее труп на нолики и единички, а затем съедят их черви, вирусы и трояны. ";
$coma[] = "Падай, ты убит! ";
$coma[] = "Теперь понятно, куда использовать мой старый венок";
$coma[] = "Трупы ходят по БК, их видать издалека! ";
$coma[] = "Хаос был бы для него раем... ";
$coma[] = "У меня тоже на кладбище место есть ";
$coma[] = "Я даже про него и не вспомню. ";
$coma[] = "В его доме будет играть музыка, но он ее не услышит";
$coma[] = "И разложится его труп на нолики и единички, а затем съедят их черви, вирусы и трояны.";


        if ($_SESSION['uid'] == null) header("Location: index.php");

        $tar = mysql_fetch_array(mysql_query("SELECT `id`,`align`,`block`,`level`,`spellfreedom` FROM `users` WHERE `login` = '{$_POST['target']}' LIMIT 1;"));
        $target=$_POST['target'];
        if ($tar['id']) {
            if ($tar['block'] == 1) {
                echo "<font color=red><b>На персонаже \"$target\" уже есть заклятие смерти </b></font>";
            }else {
                $ok=0;
                if (($user['align'] > '2' && $user['align'] < '3')  || $user['align'] == '777') {
                  $ok=1;
                } elseif (($user['align'] > '1.8' && $user['align'] < '2') && ($tar['align'] > '1' && $tar['align'] < '2') && ($user['align'] > $tar['align'])) {
                  $ok=1;
                } elseif (($user['align'] > '1.8' && $user['align'] < '2') && !($tar['align'] > '2' && $tar['align'] < '3') && !($tar['align'] > '1' && $tar['align'] < '2')) {
                  $ok=1;
                } elseif ($user['align'] == '1.7' && (($tar['align'] > '2' && $tar['align'] < '3') || $tar['align']=='0' || $tar['align']=='0.98' || $tar['align']=='0.99' || $tar['align']=='7')) {
                  $ok=1;
                }
                if ($user['align'] > '3' && $user['align'] < '4') {
                    $ok=1;
                }
                                if ($user['align']==5) $ok=1;
                if ($ok == 1) {
                    if (mysql_query("UPDATE `users` SET `block`='1' WHERE `id` = {$tar['id']} LIMIT 1;")) {
                        $ldtarget=$target;
                        $ldblock=1;
                        if ($user['sex'] == 1) {$action="наложил";}
                        else {$action="наложила";}
                        if ($user['align'] > '2' && $user['align'] < '3')  {
                        $angel="Ангел";
                        }
                        elseif ($user['align'] > '1' && $user['align'] < '2') {
                        $angel="Паладин";
                        }
                        $mess="$angel &quot;{$user['login']}&quot; $action заклятие смерти на персонажа &quot;$target&quot;.";
                        $messch="$angel &quot;{$user['login']}&quot; $action заклятие смерти на персонажа &quot;$target&quot;..";
                        if ($user['invis'] == '1') {
                        $mess="$angel &quot;{$user['login']}&quot; $action заклятие смерти на персонажа &quot;$target&quot;..";
                        $messch="&quot;невидимка&quot; наложил заклятие смерти на персонажа &quot;$target&quot;..";
                        }
                        mysql_query("INSERT INTO `lichka`(`id`,`pers`,`text`,`date`) VALUES ('','".$tar['id']."','$mess','".time()."');");
                        mysql_query("INSERT INTO `paldelo`(`id`,`author`,`text`,`date`) VALUES ('','".$_SESSION['uid']."','$mess','".time()."');");
                        addch("<img src=i/magic/death.gif> $messch");
                        addchp($coma[rand(0,count($coma)-1)],"Комментатор");
                        echo "<font color=red><b>Успешно наложено заклятие смерти на персонажа \"$target\"</b></font>";
                    }
                    else {
                        echo "<font color=red><b>Произошла ошибка!<b></font>";
                    }
                }
                else {
                    echo "<font color=red><b>Вы не можете наложить заклятие смерти на этого персонажа!<b></font>";
                }
            }
        }
        else {
            echo "<font color=red><b>Персонаж \"$target\" не существует!<b></font>";
        }
?>
