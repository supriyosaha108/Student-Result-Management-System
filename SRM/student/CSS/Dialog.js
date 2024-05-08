function setdialogbox(sampletext, sampletitle) {
 document.getElementById("dialogcontent").innerText = sampletext;
 document.getElementById("dialogtitlebar").innerText = sampletitle;
 document.getElementById("dialogbackground").style.visibility = "visible";
 document.getElementById("dialogbox").style.visibility = "visible";
}

function hidedialogbox() {
 document.getElementById("dialogbox").style.visibility = "hidden";
 document.getElementById("dialogbackground").style.visibility = "hidden";
}