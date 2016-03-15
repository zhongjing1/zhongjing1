// JavaScript Document<SCRIPT language=javascript>
function showDiv(obj,num,len)
{
for(var id=1;id<=len;id++)
{
var setBlock=obj+id;
if(id==num){
	try{document.getElementById(setBlock).style.display="block"}catch(e){};
}else{
	try{document.getElementById(setBlock).style.display="none"}catch(e){};
}
}
for(var id=1;id<=len;id++)
{
var setID=obj+"menu"+id;
if(id==num){
	try{document.getElementById(setID).className="menu_on"}catch(e){};
}else{
	try{document.getElementById(setID).className="menu_off"}catch(e){};
}
}
}


