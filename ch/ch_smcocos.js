document.onmousedown = Down;
function Down() {top.CtrlPress = window.event.ctrlKey}

var sm=['237','239','254','253','276','275','278','284','289','288','294','293','295','310','313','324','336','347','346','345','348','361','362','366','367','382','393','411','415','413','419','422','434','442','447','453','467','471','472','475','551','554','559','564','568','573','601','602','603','604','605','606','607','238','608','609','610','611','612','613','614','349','616','617','621','000','029','030','077','126','127','131','155','156','267','297','319','350','353','354','357','358','243','206','627','623','624','368','376','385','386','414','417','457','459','469','473','474','477','552','558','560','570','574','575','576','579','950','951','952','953','954','955','956','957','958','959','960','002','003','004','008','009','011','012','013','014','015','016','021','023','024','025','027','031','032','628','629','630','631','632','633','634','635','636','637','638','639','640','641','642','643','644','645','646','647','648','650','651','652','653','654','655','656','657','001','007','006','1000','010','018','022','019','026','034','033','038','036','040','039','043','049','052','056','059','057','062','066','068','073','082','175','080','079','083','086','085','114','118','119','123','161','164','167','166','170','174','177','179','178','186','189','188','190','202','205','203','221','246','255','277','600','744', '151', '152', '153', '154', '157', '158', '159', '160', '162', '163', '165', '168', '169', '171', '172', '173', '176', '180', '181', '182', '183', '184', '185', '187', '240', '241', '242', '244', '245', '247', '248', '249', '250', '251', '252', '256', '257', '258', '259', '260', '261', '262', '263', '264', '265', '266', '268', '269', '270', '271', '272', '273', '274', '279', '280', '281', '282', '283','130','132','133','134','135','136','137','138','139','140','141','142','143','144','145','146','147','148','149','150','191','192','193','194','195','196','197','198','199','200','201','204','207','208','209','210','211','212','213','214','215','216','217','218','219','220','222','223','224','225','226','227','372', '373', '230', '231', '232', '233', '234', '235', '236', '285', '286', '287', '290', '291', '292', '296', '298', '299', '300', '301', '302', '303', '304', '305', '306', '307', '308', '309', '311', '312', '314', '315', '316', '317', '318', '320', '321', '322', '323', '325', '326', '327', '328', '329', '330', '331', '332', '333', '334', '335', '337', '338', '339', '340', '341', '342', '343', '344', '351', '352', '355', '356', '359', '360', '363', '364', '365', '369', '370', '371','801','802','803','804','805','806','807','808','809','810','811','812','813','814','815','816','817','818','819','820','821','822','823','824','825','826','827','828','829','830','831','832','833','834','835','836','837','838','839','840','841','842','228','229'];

function AddLogin()
{   var o = window.event.srcElement;
    if (o.tagName == "SPAN") {
        var login=o.innerText;
        if (o.alt != null && o.alt.length>0) login=o.alt;
        var i1,i2;
        if ((i1 = login.indexOf('['))>=0 && (i2 = login.indexOf(']'))>0) login=login.substring(i1+1, i2);
        if (o.className.substr(0,1) == "p") { top.AddToPrivate(login, false) }
        else if (o.className == "s") {top.AddToSms(login, false) }
        else { top.AddTo(login) }
    }
}

function ClipBoard(text)
{
    var Copied = text;
    Copied.execCommand("RemoveFormat");
    Copied.execCommand("Copy");
}

function OpenMenu(th) {
    var el, x, y, login, login2;
    el = document.all("oMenu");
    var o = window.event.srcElement;
    if (o.tagName != "SPAN") return true;
    x = window.event.clientX + document.documentElement.scrollLeft + document.body.scrollLeft - 3;
    y = window.event.clientY + document.documentElement.scrollTop + document.body.scrollTop;

    if (window.event.clientY + 72 > document.body.clientHeight) { y-=68 } else { y-=2 }
    login = o.innerText;
    if (o.alt != null && o.alt.length>0) login = o.alt;
    window.event.returnValue=false;
    var i1, i2;
    if ((i1 = login.indexOf('['))>=0 && (i2 = login.indexOf(']'))>0) login=login.substring(i1+1, i2);
    var login2 = login;
    login2 = login2.replace('%', '%25');
    while (login2.indexOf('+')>=0) login2 = login2.replace('+', '%2B');
    while (login2.indexOf('#')>=0) login2 = login2.replace('#', '%23');
    while (login2.indexOf('?')>=0) login2 = login2.replace('?', '%3F');

    el.innerHTML = '<A class=menuItem HREF="javascript:top.AddTo(\''+login+'\');cMenu()">TO</A>'+
    '<A class=menuItem HREF="javascript:top.AddToPrivate(\''+login+'\');cMenu()">PRIVATE</A>'+
    '<A class=menuItem HREF="" target=_blank onclick="OpenInfo(\''+login2+'\');return false;">INFO</A>'+
    '<A class=menuItem HREF="javascript:ClipBoard(\''+login+'\');cMenu()">COPY</A>';

    el.style.left = x + "px";
    el.style.top  = y + "px";
    el.style.visibility = "visible";
}

function OpenInfo(login) {
    var lar = login.split(/,/g);
    for (i=0;i<lar.length;i++) {
    if (lar[i].match(/^(k|c)lan$/i)) {
        window.open('http://capitalcity.combats.com/encicl/clans.html');
    } else {
        window.open('/inf.pl?login='+top.trim(lar[i]));
    }
    }

}

function cMenu() {
  document.all("oMenu").style.visibility = "hidden";
  document.all("oMenu").style.top="0px";
  top.frames['bottom'].window.document.F1.text.focus();
}

function closeMenu(event) {
  if (window.event && window.event.toElement) {
    var cls = window.event.toElement.className;
    if (cls=='menuItem' || cls=='menu') return;
  }
  document.all("oMenu").style.visibility = "hidden";
  document.all("oMenu").style.top="0px";
  return false;
}
