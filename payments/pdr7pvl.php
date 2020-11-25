<?
  include "../connect.php";
  include "../functions.php";
  $f=fopen("data/log.dat", "ab+");
  fwrite($f,serialize($_POST)."\r\n");
  fclose($f);

  $rec=mqfa("select * from payments where id='$_POST[spShopPaymentId]'");
  if ($rec && !$rec["payed"]) {
    $sum=$_POST["spAmount"]*3.5;
    mq("update payments set payed=1, price='$_POST[spAmount]', total='$_POST[spPaymentSystemAmount]', email='$_POST[spCustomerEmail]', hash='$_POST[spHashString]', spryip='$_SERVER[REMOTE_ADDR]' where id='$rec[id]'");
    $user=mqfa("select login, money, ekr from users where id='$rec[user]'");
    mq("insert into inventory set owner='$rec[user]', ecost='$sum', name='Квитанция о покупке $sum екр', type=199, img='paper100.gif', maxdur=1");
    mq("INSERT INTO `delo` (`id` , `author` ,`pers`, `text`, `type`, `date`) VALUES ('','0','$rec[user]','\"".$user['login']."\" оплатил $_POST[spAmount] USD (id:".mysql_insert_id().") ($user[money]/$user[ekr]). ',3,'".time()."');");
  }
?>OK