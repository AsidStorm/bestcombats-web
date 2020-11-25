<?
  include "../connect.php";
  include "../functions.php";
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
    <div id=hint4 class=ahint></div>
<table width=100%><tr><td width=100>&nbsp;</td>
<td><center><h4>Алхимики</h4></center></td><td width=100>
<INPUT TYPE=button value="Вернуться" style='width: 75px' onclick="location.href='/main.php'"></TD>
</td></tr></table>
<div style="padding:10px 20px 10px 20px">
Извините, платёж был отклонён вышей системой оплаты. Возможно на вешем счету недостаточно денег, превышен лимит использования
или же возникла другая причниа, по которой вы не можете совершить оплату используя выбранную систему. Получить консультации
о способах оплаты вы можете у персонажа Эллегия.
</div>