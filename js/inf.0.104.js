
var CtrlPress=false,doc=document;
var rnd=Math.random(),
redHP=0.33,
yellowHP=0.66,
TimerOn=-1,
tkHP,
maxHP,
speed=100,
mspeed=100;
function setHP(a,b,c){
tkHP=a;
maxHP=b;
vrem=c;
if(TimerOn>=0){
clearTimeout(TimerOn);TimerOn=-1}setHPlocal()}

function setHPlocal(){
if(tkHP>maxHP){tkHP=maxHP;TimerOn=-1
}else TimerOn=0;var a=Math.round(tkHP)+"/"+maxHP;a=120;var b=Math.round(a/maxHP*tkHP);a=a-b;if(doc.all("HP")){doc.HP1.width=b;doc.HP2.width=a;doc.HP2.display=a?"":"none";doc.HP1.src=tkHP/maxHP<redHP?"i/1red.gif":tkHP/maxHP<yellowHP?"i/1yellow.gif":"i/1green.gif";b=doc.all("HP").innerHTML;doc.all("HP").innerHTML=Math.round(tkHP)+"/"+maxHP}if(vrem>0){tkHP+=maxHP/(vrem*60);}if(TimerOn!=-1)TimerOn=setTimeout("setHPlocal()",delay*100)}
