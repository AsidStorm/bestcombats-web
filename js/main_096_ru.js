function DrawBar(title, id, flags, link_text, link){
  // alert(title + document);
  var s ='<table width="100%" border=0 cellspacing=0 cellpadding=1 background="/i/icon/back.gif">' +
         '<tr><td valign=top>';
  var sz = 11, num = 1;
  var rnd = Math.random();
  s += '<a name="bar__'+id+'" href="?edit='+rnd+'&bar='+id+'&a=explore&is_open='+(1-(flags & 1))+'#bar_'+id+'">';
  if (flags & 1) {
    s+= '<img width='+sz+' height=9 alt="Скрыть" border=0 src="/i/icon/'+num+'minus.gif">';
  } else {
    s+= '<img width='+sz+' height=9 alt="Показать" border=0 src="/i/icon/'+num+'plus.gif">';
  }
  s += '</a> </td>';
  s += '<td>&nbsp;</td><td bgcolor="#e2e0e0"><small>&nbsp;<b>'+title+':<b>&nbsp;</small></td>';
  if (link_text){
     s += '<td>&nbsp;</td><td bgcolor="#e2e0e0"><small>&nbsp;<a href="'+link+'">'+link_text+'</a>&nbsp;</small></td>';
  }
  s += '<td align=right valign=top width="100%">';
  if (!(flags&2)){
     s += '<a href="?edit='+rnd+'&bar='+id+'&a=up#bar_'+id+'"><img border=0 width='+sz+' height=9 alt="Поднять блок наверх" src="/i/icon/'+num+'up.gif"></a>';
  } else {
    s+= '<img border=0 width='+sz+' height=9 alt="" src="/i/icon/'+num+'up-grey.gif">';
  }
  if (!(flags&4)){
    s += '<a href="?edit='+rnd+'&bar='+id+'&a=down#bar_'+id+'"><img border=0 width='+sz+' height=9 alt="Опустить блок вниз" src="/i/icon/'+num+'down.gif"></a>';
  } else {
    s+= '<img border=0 width='+sz+' height=9 alt="" src="/i/icon/'+num+'down-grey.gif">';
  }
  s += ' </td>';
  s += '</tr></table>';
  // window.clipboardData.setData('Text', s);
  document.writeln(s);
}
