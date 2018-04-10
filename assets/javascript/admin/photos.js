// JavaScript Document

function addImageHtml(divId, imgNo, itemId) {
	var imgNumber = $(imgNo).value;
	++imgNumber;
	$(imgNo).value = imgNumber;
	$(divId).innerHTML = $(divId).innerHTML + '<br /><input type="file" name="itemPhoto_'+itemId+'_'+imgNumber+'"  />';
}