function makeGraph(divname) {  
document.getElementById(divname).style.position = "absolute";
document.getElementById(divname).style.height ="336px";
document.getElementById(divname).style.width ="543px";
document.getElementById(divname).style.borderBottom = "2px solid white";
document.getElementById(divname).style.borderLeft = "2px solid white";
var dnl = document.getElementById(divname).getElementsByTagName("li");
for(var i = 0; i < dnl.length; i++) {
var item = dnl.item(i); var value = (item.innerHTML) * 3;
item.style.position = "absolute" ;
item.style.listStyle = "none" ;
item.style.height = value + "px"; 
item.style.width = "40px" ; 
item.style.left = (i*43 + 5)+"px"; 
item.style.bottom = "-1px";
item.style.fontFamily = "Consolas";
item.style.color = "White" ; 
item.style.textAlign = "center" ; 
item.style.border = "1px solid white" ;
item.style.borderRadius = "3px 3px 0px 0px" ;
item.style.background = "lightblue" ; 
item.style.backgroundImage = "url(images/green.png)" ; 
item.style.backgroundRepeat =  "repeat-y" ;
}
}
