function openDiv(divId) {
	if ((document.getElementById(divId).style.display == 'none') || (document.getElementById(divId).style.display == '')) {
		document.getElementById(divId).style.display = 'block';
	}
}

function closeDiv(divId) {
	document.getElementById(divId).style.display = 'none';
}

function sureCheck(message,newlocation) {
	
	if(confirm(message)) {
		if(newlocation!="") {
			location.href = newlocation;
		}
		else {
			return true;
		}
	}
	else {
		return false; 
	}
}