function FindFrameDocument(a,b){if(a=a.document) if(a=a.getElementById(b)) if(a=a.contentWindow||a.contentDocument) return a.document||a 
return parent.frames[b].document;}
var fw=[];
var rnd=Math.random(),
redHP=0.33,
 yellowHP=0.66,
TimerOn=-1,
tkHP,maxHP,
speed=100,
mspeed=100,
chat_version=-1;
function setHP(a,b,c){
  tkHP=a;maxHP=b;vrem=c;
  if(TimerOn>=0){clearTimeout(TimerOn);TimerOn=-1}
  setHPlocal();
}
function setHPlocal(){
  if(tkHP>=maxHP){
    tkHP=maxHP;TimerOn=-1
  } else TimerOn=0;
  if(TimerOn!=-1)TimerOn=setTimeout(setHPlocal,vrem);
  var a=Math.round(120/maxHP*tkHP), b=120-a, c=FindFrameDocument(top,main_uid);
  if(c){var d=c.getElementById("HP");
  if(d){var e=c.getElementById("HP1");
  c=c.getElementById("HP2");
  e.width=a;
  c.width=b;
  c.style.display=b?"":"none";
  e.src=tkHP/maxHP<redHP?"i/1red.gif":tkHP/maxHP<yellowHP?"i/1yellow.gif":"i/1green.gif";
  d.innerHTML=Math.round(tkHP)+"/"+maxHP}
  }
  if (vrem>0) tkHP++; else return;
  //if(vrem>0){tkHP+=maxHP/(vrem*60);}
  //if(TimerOn!=-1)TimerOn=setTimeout(setHPlocal,delay*100);
}

