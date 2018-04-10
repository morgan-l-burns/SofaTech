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


function OpenCloseDiv(divId) {
	var style = $(divId).getStyle('display');
	//alert(style);
	switch (style) {
		case 'none':
			$(divId).style.display = 'block';
		break;
		case 'block':
			$(divId).style.display = 'none';
		break;
		case 'table-row':
			$(divId).style.display = 'none';
		break;
		case '':
			$(divId).style.display = 'none';
		break;
	}
	
}

function changeFormBooleanValue(divId) {
	var value = $(divId).value;
	if (value == 'true') $(divId).value = 'false';
	else if (value == 'false') $(divId).value = 'true';
}


// ajax stuff below

function GetXmlHttpObject(handler) { 
	var objXMLHttp=null
	if (window.XMLHttpRequest){
	objXMLHttp=new XMLHttpRequest()
	}
	else if (window.ActiveXObject) {
	objXMLHttp=new ActiveXObject("Microsoft.XMLHTTP")
	}
	return objXMLHttp
}

function stateChanged() { 
	if (xmlHttp.readyState==4 || xmlHttp.readyState=="complete") { 
		 document.getElementById('customerSelection').innerHTML = xmlHttp.responseText;
	 } 
} 
		
		
		
function displayCustomersByPostCode(postCode, clientId) {
	//alert('client id is '+clientId);
	xmlHttp=GetXmlHttpObject()
	if (xmlHttp==null) {
		alert ("Browser does not support HTTP Request")
		return
	} 
	var url="/admin/customers/ajax/?fn=fcbp&pc="+postCode+'&ci='+clientId;
	xmlHttp.onreadystatechange=stateChanged 
	xmlHttp.open("GET",url,true)
	xmlHttp.send(null)
}
		