function punkt(title,msg, w, h){
  var width=w, height=h;
  var left = (screen.width/2) - width/2;
  var top = (screen.height/2) - height/2;
  var styleStr = 'toolbar=no,location=no,directories=no,status=no,menubar=no,scrollbars=no,resizable=yes,copyhistory=yes,width='+width+',height='+height+',left='+left+',top='+top+',screenX='+left+',screenY='+top;
  if(parent.msgWindow) {
    if(!parent.msgWindow.closed) parent.msgWindow.close();
  }
  msgWindow = window.open("","msgWindow", styleStr);
  var head = '<head><title>'+title+'</title></head>';
  var body = '<body leftmargin=0 topmargin=0 marginwidth=0 marginheight=0><center><a href="#" title="закрыть"><img src='+msg+' width='+w+' height='+h+' onClick="self.close();return false;" border="0"></a>';
  msgWindow.document.write('<html>' + head + body + '</html>');
  msgWindow.focus();
}

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}

function MM_swapImgRestore() { //v3.0
  var i,x,a=document.MM_sr; for(i=0;a&&i<a.length&&(x=a[i])&&x.oSrc;i++) x.src=x.oSrc;
}

function MM_findObj(n, d) { //v4.01
  var p,i,x;  if(!d) d=document; if((p=n.indexOf("?"))>0&&parent.frames.length) {
    d=parent.frames[n.substring(p+1)].document; n=n.substring(0,p);}
  if(!(x=d[n])&&d.all) x=d.all[n]; for (i=0;!x&&i<d.forms.length;i++) x=d.forms[i][n];
  for(i=0;!x&&d.layers&&i<d.layers.length;i++) x=MM_findObj(n,d.layers[i].document);
  if(!x && d.getElementById) x=d.getElementById(n); return x;
}

function MM_swapImage() { //v3.0
  var i,j=0,x,a=MM_swapImage.arguments; document.MM_sr=new Array; for(i=0;i<(a.length-2);i+=3)
   if ((x=MM_findObj(a[i]))!=null){document.MM_sr[j++]=x; if(!x.oSrc) x.oSrc=x.src; x.src=a[i+2];}
}

function cs(s1, s2)
{
	if (document.getSelection) { alert("!"); }
	if (document.selection)
	{
		var str = document.selection.createRange();
		var s = document.F1.text.value;
		if (s1 == '//')
		{
			if ((str.text != "") && (s.indexOf(str.text)<0))
			{
				var str2 = '> ';
				var j = 0;
				for(var i=0; i<str.text.length; i++)
				{
					str2 += str.text.charAt(i); j++;
					if (str.text.charAt(i) == "\n") { str2 += "> "; j=0; }
					if ((j>55)&&(str.text.charAt(i) == ' ')) { str2 += "\n> "; j=0; }
				}
				document.F1.text.value = s+"<I>\n"+str2+"\n</I>\n";
			} else {
				return false;
			}
		} else {
			if ((str.text != "") && (s.indexOf(str.text)>=0))
			{
				if (str.text.indexOf(s1) == 0) {return '';}
				str.text = s1+str.text+s2;
			} else { 
				if (document.F1.text.createTextRange && document.F1.text.caretPos)
				{
					var caretPos = document.F1.text.caretPos;      
					caretPos.text = s1 + s2;
				} else {
					document.F1.text.value = s + s1 + s2;
				}
			}
		}
	}
	document.F1.text.focus();
	return false;
}

function storeCaret(text)
{
	if (text.createTextRange)
	{
		text.caretPos = document.selection.createRange().duplicate();
	}
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

  if (align!="0") s+="<A HREF=/encicl/alignment.html target=_blank><IMG SRC='http://img.combats.ru/i/align"+align+".gif' WIDTH=12 HEIGHT=15 ALT=\""+getalign(align)+"\"></A>";
  if (klan) s+="<A HREF='/encicl/klan/"+klan+".html' target=_blank><IMG SRC='http://img.combats.ru/i/klan/"+klan+".gif' WIDTH=24 HEIGHT=15 ALT=''></A>";
  s+="<B>"+name+"</B> ";
  if (level!=-1) s+="["+level+"]";
  if (id!=-1) s+="<A HREF='/inf.php?"+id+"' target='_blank'><IMG SRC=http://img.combats.ru/i/inf.gif WIDTH=12 HEIGHT=11 ALT='Инф. о "+name+"'></A>";

  document.write(s);
}

function drwflname(name, level, align, klan, realname)
{
  var s="";

  if (align) if (align!="0") s+="<A HREF=http://capitalcity.combats.ru/encicl/alignment.html target=_blank><IMG border=0 SRC='http://img.combats.ru/i/align"+align+".gif' WIDTH=12 HEIGHT=15 ALT=\""+getalign(align)+"\" align=middle></A>&nbsp;";
  if (klan) if (klan!="0") s+="<A HREF='http://capitalcity.combats.ru/encicl/klan/"+klan+".html' target=_blank><IMG border=0 SRC='http://img.combats.ru/i/klan/"+klan+".gif' WIDTH=24 HEIGHT=15 ALT='' align=middle></A>&nbsp;";
  s+="<B>"+name+"</B> ";
  if (realname) s+="("+realname+") ";
  if (level) if (level!=-1) s+="["+level+"]";
  s+=" <A HREF='http://recombats.com/inf.php?login="+name+"' target='_blank'><IMG border=0 SRC=http://img.combats.ru/i/inf.gif WIDTH=12 HEIGHT=11 ALT='Инф. о "+name+"' align=middle></A>";
  
  document.write(s);
}

function drwflogin(name)
{
  var s="";

  if (name!="") s+="<A class=menu HREF='http://recombats.com/inf.php?login="+name+"' target='_blank'><IMG SRC=http://img.combats.ru/i/inf.gif WIDTH=12 HEIGHT=11 border=0 ALT='Инф. о "+name+"'></A>";

  document.write(s);
}

