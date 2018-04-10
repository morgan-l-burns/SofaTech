// JavaScript Document

function taCount(id, limit, counter) { 
	var returnVar = document.getElementById(id);
	document.getElementById(counter).innerHTML= limit - returnVar.value.length;
	if (limit - returnVar.value.length < 0) {
		document.getElementById(id).value= document.getElementById(id).value.substring(0,limit*1);
	}

}