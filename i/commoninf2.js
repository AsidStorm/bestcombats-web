function getalign(al)
{
  var n=parseFloat(al);

  if (n>=1 && n<2) return("Белое братство");
  if (n>=2 && n<3) return("Хаос");
  if (n>=3 && n<4) return("Темное братство");
  if (n==7) return("Нейтральное братство");
  if (n>7 && n<8) return("Орден Очищения Стихий");
  if (n>=50 && n<51) return("Алхимики");
  return("");
}

function getalignurl(al)
{
  var n=parseFloat(al);
  if (n==50) return "http://capitalcity.combats.com/encicl/alchemist.html";
  return "http://capitalcity.combats.com/encicl/alignment.html";
}

function drwfl(name, id, level, align, klan, img, sex)
{
  var s="";

  if (align!="0") s+="<A HREF='"+getalignurl(align)+"' target=_blank><IMG SRC='i/align_"+align+".gif' WIDTH=12 HEIGHT=15 ALT=\""+getalign(align)+"\"></A>";
  if (klan) s+="<A HREF='/clans_inf.pl?"+klan+"' target=_blank><IMG SRC='i/klan/"+klan+".gif' WIDTH=24 HEIGHT=15 ALT=''></A>";
  s+="<B>"+name+"</B>";
  if (level!=-1) s+=" ["+level+"]";
  if (id!=-1 && !img) s+="<A HREF='/inf.pl?"+id+"' target='_blank'><IMG SRC=http://img.combats.com/i/inf.gif WIDTH=12 HEIGHT=11 ALT='Инф. о "+name+"'></A>";
  if (img) s+="<A HREF='http://capitalcity.combats.com/encicl/obraz_"+(sex?"w":"m")+"1.html?l="+img+"' target='_blank'><IMG SRC=http://img.combats.com/i/inf.gif WIDTH=12 HEIGHT=11 ALT='Образ "+name+"'></A>";

  document.write(s);
}
