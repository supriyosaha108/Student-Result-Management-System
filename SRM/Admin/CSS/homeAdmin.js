function showmaindiv() { document.getElementById('outer').style.height = "76.6%"; document.getElementById('outer').style.minHeight = "600px";}
var myTimeout = setTimeout(showmaindiv, 100);
function showStudent(){
if(document.getElementById('resultsubtab').style.width == "180px") { showResult(); }
if(document.getElementById('studentsubtab').style.width == ""){
document.getElementById('studentsubtab').style.width = "180px"; document.getElementById('studentsubtab').style.height = "120px";  }
else{document.getElementById('studentsubtab').style.width = ""; document.getElementById('studentsubtab').style.height = ""; }}
function showResult(){
if(document.getElementById('studentsubtab').style.width == "180px") { showStudent(); }
if(document.getElementById('resultsubtab').style.width == ""){
document.getElementById('resultsubtab').style.width = "180px"; document.getElementById('resultsubtab').style.height = "120px";  }
else{document.getElementById('resultsubtab').style.width = ""; document.getElementById('resultsubtab').style.height = ""; }}
function hidesubtabs(){
if(document.getElementById('resultsubtab').style.width == "180px") { showResult(); }
if(document.getElementById('studentsubtab').style.width == "180px") { showStudent(); }}
function ldpage(x1) {document.getElementById('frm1').src = x1; hidesubtabs(); } 

function loadstatistics(st1, st2){
var i1=0; var i2=0; var i3=0; var i4=0; var st3 = 30; var st4=12;
var stx = (((st1>st2) ? st1 : st2)<st3)? st3 : ((st1>st2) ? st1 : st2);
stx = (stx>12)? stx:st4;
var a = window.setInterval(
function ccount() {
if(i1<=st1){document.getElementById("ccounter1").innerText = i1++;}
if(i2<=st2){document.getElementById("ccounter2").innerText = i2++;}
if(i3<=st3){document.getElementById("ccounter3").innerText = i3++;}
if(i4<=st4){document.getElementById("ccounter4").innerText = i4++;}
if(i1>stx || i2>stx || i3>stx || i4>stx) { window.clearInterval(a); } 
} ,20);
}
