<?
  session_start();
  include "../connect.php";
  include "../functions.php";
  if (!$user) {
    header("location: index.php");
    die;
  }
?>
<HTML><HEAD>
<link rel=stylesheet type="text/css" href="/i/main.css">
<meta content="text/html; charset=windows-1251" http-equiv=Content-type>
<META Http-Equiv=Cache-Control Content="no-cache, max-age=0, must-revalidate, no-store">
<meta http-equiv=PRAGMA content=NO-CACHE>
<META Http-Equiv=Expires Content=0>
<style>
.td {font-size:11px}
.row {cursor:pointer;}
td {padding-top:2px}
</style>
<script type="text/javascript">
  function show(ele) {
      var srcElement = document.getElementById(ele);
      if(srcElement != null) {
          if(srcElement.style.display == "block") {
            srcElement.style.display= 'none';
          }
          else {
            srcElement.style.display='block';
          }
      }
  }
</script>
</head>
<body leftmargin=0 topmargin=0 marginwidth=0 marginheight=0 bgcolor=e2e0e0>
    <div id=hint4 class=ahint></div><br>
<table width=100%><tr><td width=100>&nbsp;</td>
<td><center><h4>Алхимики</h4></center></td><td width=100>
<!--<INPUT TYPE=button value="Вернуться" style='width: 75px' onclick="location.href='/main.php'">-->&nbsp;</TD>
</td></tr></table>
<div style="padding:10px 20px 10px 20px">
Для совершения платежа введите сумму, которую вы хотите заплатить, в долларах США (если вы платите в другой валюте, то пересчёт 
будет совершён в соответствии с курсом вашей системы). После этого вы сразу же получите квитанцию об оплате на соответствующую
сумму екр (из рассчёта 1$ = 3,5 екр). Эту квитанцию вы можете предъявить в банке и сразу получить екр или же можете передать
алхимику для получения другой платной услуги (например, персонального образа, VIP-статуса и т. д.). ВНИМАНИЕ! Реальная сумма, которая
будет снята с вашего счёта может отличаться от введённой суммы, т. к. к ней может быть добавлена комиссия за перевод (зависит от
выбранной системы оплаты).
<form action="http://sprypay.ru/sppi/" method="post">
<input type="hidden" name="spShopId" value="7183">
<input type="hidden" name="spShopPaymentId" value="<?
  mq("insert into payments (user, dat, purpose, ip) values ('$user[id]', now(), 'Покупка платных услуг персонажу $user[login]', '$_SERVER[REMOTE_ADDR]')");
  echo db_insert_id();
?>">
Сумма (USD): <input type="text" name="spAmount" value="1" style="width:30px">
<input type="hidden" name="spCurrency" value="usd">
<input type="hidden" name="spPurpose" value="Покупка платных услуг персонажу <?=$user["login"]?>">
<input type="hidden" name="lang" value="ru">
<input type="hidden" name="tabNum" value="1">
<input type="submit" value="Перейти к оплате">
<input type="hidden" name="spUserEmail" value="<?=$user["email"]?>">
</form>
Произвести оплату можно с помощью любой из следующих систем:<div>&nbsp;</div>
                      <table cellspacing=0 cellpadding=0><tr>
                          <td><img src='<?=IMGBASE?>/i/payments/sprypay.gif'></td>
                          <td class=td style='padding-left: 7px;'>SpryPay</td>
                          <td style='width: 20px;'></td>
                          <td><img src='<?=IMGBASE?>/i/payments/wm.gif'></td>
                          <td class=td style='padding-left: 7px;'>WebMoney</td>
                          <td>&nbsp;</td>
                          <td><img src='<?=IMGBASE?>/i/payments/liqpay.gif'></td>
                          <td class=td style='padding-left: 7px;'>Visa/Master Card (LiqPay)</td>
                          <td style='width: 20px;'></td>
                          <td><img src='<?=IMGBASE?>/i/payments/platezh.gif'></td>
                          <td class=td style='padding-left: 7px;'>Visa/Master Card (Platezh.ru)</td>                          
                          <td width=20>&nbsp;</td>
                          <td><img src='<?=IMGBASE?>/i/payments/liqpay_lp.gif'></td>
                          <td class=td style='padding-left: 7px;'>LiqPay</td>
                          <td style='width: 20px;'></td>
                          <td><img src='<?=IMGBASE?>/i/payments/paypal.gif'></td>
                          <td class=td style='padding-left: 7px;'>PayPal</td>                          
                          </tr><tr><td colspan=4 height='3px'></td>
                          </tr><tr>                          
                          <td style='width: 20px;'></td></tr><tr><td colspan=4 height='3px'></td></tr><tr>
                          <td><img src='<?=IMGBASE?>/i/payments/moneybookers.gif'></td>
                          <td class=td style='padding-left: 7px;'>MoneyBookers</td>
                          <td style='width: 20px;'></td>
                          <td><img src='<?=IMGBASE?>/i/payments/w1.gif'></td>
                          <td class=td style='padding-left: 7px;'>W1</td>
                          <td style='width: 20px;'></td>
                          <td><img src='<?=IMGBASE?>/i/payments/RBKmoney.gif'></td>
                          <td class=td style='padding-left: 7px;'>RBKmoney</td>
                          <td style='width: 20px;'></td>
                          <td><img src='<?=IMGBASE?>/i/payments/moneymail.gif'></td>
                          <td class=td style='padding-left: 7px;'>MoneyMail</td>

                          <td style='width: 20px;'></td>
                          <td><img src='<?=IMGBASE?>/i/payments/perfectmoney.gif'></td>
                          <td class=td style='padding-left: 7px;'>PerfectMoney USD</td>
                          <td style='width: 20px;'></td>
                          <td><img src='<?=IMGBASE?>/i/payments/lr.gif'></td>
                          <td class=td style='padding-left: 7px;'>LibertyReserve USD</td>

                          <td style='width: 20px;'></td></tr><tr><td colspan=4 height='3px'></td></tr><tr>
                          <td><img src='<?=IMGBASE?>/i/payments/mmail.gif'></td>
                          <td class=td style='padding-left: 7px;'>Деньги@Mail.Ru</td>
                          <td style='width: 20px;'></td>
                          <td><img src='<?=IMGBASE?>/i/payments/bank.gif'></td>
                          <td class=td style='padding-left: 7px;'>Банковский перевод</td>
                          <td style='width: 20px;'></td>
                          <td><img src='<?=IMGBASE?>/i/payments/rpost.gif'></td>
                          <td class=td style='padding-left: 7px;'>Почта России</td>
                          <td style='width: 20px;'></td>
                          <td><img src='<?=IMGBASE?>/i/payments/contact.gif'></td>
                          <td class=td style='padding-left: 7px;'>Contact</td>
                          <td style='width: 20px;'></td>
                          <td><img src='<?=IMGBASE?>/i/payments/migom.gif'></td>
                          <td class=td style='padding-left: 7px;'>Migom</td>
                          <td style='width: 20px;'></td>
                          <td><img src='<?=IMGBASE?>/i/payments/anelik.gif'></td>
                          <td class=td style='padding-left: 7px;'>Anelik</td>
                          <td style='width: 20px;'></td></tr>
                          <tr>
                          <td><img src='<?=IMGBASE?>/i/payments/wu.gif'></td>
                          <td class=td style='padding-left: 7px;'>Western Union</td>
                          <td style='width: 20px;'></td>
                          <td><img src='<?=IMGBASE?>/i/payments/moneygram.gif'></td>
                          <td class=td style='padding-left: 7px;'>MoneyGram</td>
                          <td style='width: 20px;'></td>
                          <td><img src='<?=IMGBASE?>/i/payments/korona.gif'></td>
                          <td class=td style='padding-left: 7px;'>Золотая Корона</td>
                          <td style='width: 20px;'></td>
                          <td><img src='<?=IMGBASE?>/i/payments/alfabank.gif'></td>
                          <td class=td style='padding-left: 7px;'>Альфа-Клик [ Альфа.Банк ]</td>
                          <td style='width: 20px;'></td>
                          <td><img src='<?=IMGBASE?>/i/payments/osmp.gif'></td>
                          <td class=td style='padding-left: 7px;'>Терминалы QIWI (КИВИ)</td>
                          <td style='width: 20px;'></td>
                          <td><img src='<?=IMGBASE?>/i/payments/handybank.gif'></td>
                          <td class=td style='padding-left: 7px;'>HandyBank</td>
                          <td style='width: 20px;'></td></tr><tr><td colspan=4 height='3px'></td></tr><tr>
                          <td><img src='<?=IMGBASE?>/i/payments/elecsnet.gif'></td>
                          <td class=td style='padding-left: 7px;'>Терминалы Элекснет</td>
                          <td style='width: 20px;'></td>
                          <td><img src='<?=IMGBASE?>/i/payments/smscoin.gif'></td>
                          <td class=td style='padding-left: 7px;'>SMScoin</td>
                          <td style='width: 20px;'></td></tr><tr><td colspan=4 height='3px'></td></tr><!--<tr>
                          <td><img src='<?=IMGBASE?>/i/payments/beeline.gif'></td>
                          <td class=td style='padding-left: 7px;'>Beeline SMS</td>
                          <td style='width: 20px;'></td></tr><tr><td colspan=4 height='3px'></td></tr>-->
                      </table><br>
<b><font color=red>ВНИМАНИЕ!!! Платежи через системы MoneyGram и Western Union обрабатываются вручную, и они могут занять около недели.</font></b>