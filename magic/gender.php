<?php
// magic �������������
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
                  if ($user['sex'] == 1) {$action="������";}
                  else {$action="�������";}
                        if ($user['align'] > '2' && $user['align'] < '3')  {
                        $angel="�����";
                        }
                        elseif ($user['align'] > '1' && $user['align'] < '2') {
                        $angel="�������";
                        }
                        elseif ($user['align'] > '3' && $user['align'] <'4') {
                        $angel="������";
                        }
                        $mess="$angel &quot;{$user['login']}&quot; $action ��� ��������� &quot;$target&quot;";
                        $messch="$angel &quot;{$user['login']}&quot; $action ��� ��������� &quot;$target&quot;";
                        if ($user['invis'] == '1') {
                        $mess="$angel &quot;{$user['login']}&quot; $action �������� �������� �� ��������� &quot;$target&quot; ������ $magictime";
                        $messch="&quot;���������&quot; ������� �������� �������� �� ��������� &quot;$target&quot; ������ $magictime";
                        }
                        addch("<img src=i/magic/gender.gif> $messch");
                        echo "<font color=red><b>������� ����� ��� ��������� \"$target\"</b></font>";
                }
        }
        else {
            echo "<font color=red><b>�������� \"$target\" �� ����������!<b></font>";
        }
?>
