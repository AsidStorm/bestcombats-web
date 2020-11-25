function storeCaret(text) {
    if (text.createTextRange) { text.caretPos = document.selection.createRange().duplicate(); }
}
function cs(s1, s2, formname)
{
    if ( !formname) {
        formname = 'F1';
    };
    if (document.getSelection) { alert("Под NN не работает!"); }
    if (document.selection) {
        var str = document.selection.createRange();
        var s = document[formname].text.value;
        if (s1 == '//') {
            if ((str.text != "") && (s.indexOf(str.text)<0)) {
                var str2 = '> ';
                    var j = 0;
                    for(var i=0; i<str.text.length; i++) {
                    str2 += str.text.charAt(i); j++;
                    if (str.text.charAt(i) == "\n") { str2 += "> "; j=0; }
                    if ((j>55)&&(str.text.charAt(i) == ' ')) { str2 += "\n> "; j=0; }
                    }
                document[formname].text.value = s+"<I>\n"+str2+"\n</I>\n";
            } else {
                alert("Не выделен текст!\nДля вставки цитаты, сначала выделите на странице нужный текст, а затем нажмите эту кнопку.");
            }
        } else {
            if ((str.text != "") && (s.indexOf(str.text)>=0)) {
                if (str.text.indexOf(s1) == 0) {return '';};
                str.text = s1+str.text+s2;
            } else { 
                if (document[formname].text.createTextRange && document[formname].text.caretPos) {      
                    var caretPos = document[formname].text.caretPos;      
                    caretPos.text = s1+s2;
                } else {
                    document[formname].text.value = s+s1+s2;
                }
            }
        }
   }
   document[formname].text.focus();
   return false;
}

var map_en = new Array('s`h','S`h','S`H','s`Х','sh`','Sh`','SH`',"'o",'yo',"'O",'Yo','YO','zh','w','Zh','ZH','W','ch','Ch','CH','sh','Sh','SH','e`','E`',"'u",'yu',"'U",'Yu',"YU","'a",'ya',"'A",'Ya','YA','a','A','b','B','v','V','g','G','d','D','e','E','z','Z','i','I','j','J','k','K','l','L','m','M','n','N','o','O','p','P','r','R','s','S','t','T','u','U','f','F','h','H','c','C','`','y','Y',"'");
var map_ru = new Array('сх','Сх','СХ','сХ','щ','Щ','Щ','ё','ё','Ё','Ё','Ё','ж','ж','Ж','Ж','Ж','ч','Ч','Ч','ш','Ш','Ш','э','Э','ю','ю','Ю','Ю','Ю','я','я','Я','Я','Я','а','А','б','Б','в','В','г','Г','д','Д','е','Е','з','З','и','И','й','Й','к','К','л','Л','м','М','н','Н','о','О','п','П','р','Р','с','С','т','Т','у','У','ф','Ф','х','Х','ц','Ц','ъ','ы','Ы','ь');

function convert(st)
{	for(var i=0;i<map_en.length;++i) while(st.indexOf(map_en[i])>=0) st = st.replace(map_en[i],map_ru[i]);
	return st;
}
function translate2(str) {
	var strarr = new Array(); strarr = str.split(' ');
	for(var k=0;k<strarr.length;k++) {
		if(strarr[k].indexOf("http://")<0 && strarr[k].indexOf('@')<0 && strarr[k].indexOf("www.")<0) strarr[k]=convert(strarr[k]);
	}
	return strarr.join(' ');
}
function translate(str2) {	// translates latin to russian
	var s = new Array(); s=str2.split('\n');
	for(var i=0;i<s.length;i++) s[i]=translate2(s[i])
	return s.join('\n');
}
function subm()
{
	document.F1.text.value=translate(document.F1.text.value);
	document.F1.title.value=translate(document.F1.title.value);
}
function subm2()
{
	document.F1.text.value=translate(document.F1.text.value);
}
var oneclick=false;


function getalign(al)
{
  al+="";
  if (al=="3") return("Темное братство");
  if (al=="2") return("Хаос");
  if (al.substring(0,1)=="1") return("Белое братство");
  if (al=="0.5") return("Нейтрал");
  return("");
}

function drwfl(name, id, level, align, klan)
{
  var s="";

    if ( align && align != "0" && align != '' ) 
        s += '<a href=http://capitalcity.combats.com/encicl/alignment.html target=_blank><img src="http://img.combats.com/i/align'+ align +'.gif" width=12 height=15 alt="'+ getalign(align) +'"></a>';

    if ( klan ) s += '<a href="http://capitalcity.combats.com/clans_inf.pl?'+ klan +'" target=_blank><img src="http://img.combats.com/i/klan/'+ klan +'.gif" width="24" height="15" alt="Информация о клане" title="Информация о клане"></a>';

    s += '&nbsp;<b>'+ name +'</b>';
    if ( level > 0 && level != '' ) s+="&nbsp;["+level+"]";
    if ( id > 1 && id != '' ) s += '&nbsp;<a href="http://www.combats.com/inf.pl?'+ id +'" target="_blank"><img src="http://img.combats.com/i/inf.gif" width="12" height="11" title="Подробнее о '+ name +'" alt="Подробнее о '+ name +'"></a>';

    document.write(s);
}

var $addFavoriteSet = function() {
    $('a.addFavorite').each( function (count, elm){
        var $elem = $(elm);
        var id = $elem.attr('id');
        $(elm).click( function () {
                // ajax
                $.ajax({
                url: '/forum.pl?act=add_favorite',
                //type: 'GET',
                data: { id: id },
                dataType: 'json',
                error: function( XTR, message ){
                    alert( XXX[3] );
                },
                success: function(data) {
                    alert( XXX[data.code] );
                }
            });
        });
    });
}
