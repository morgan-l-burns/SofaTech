// JavaScript Document

	
var uniqueScrollId = 0;

function scrollControls(maskDivId,contentDivId,debug){
	
	var scrollControlsDivId = 'scrollControls_'+uniqueScrollId;
	
	
	// write out the scroll controls
	document.write('<ul class="scroll" id="'+scrollControlsDivId+'" style="display:none;">');
	document.write('	<li class="up" id="'+scrollControlsDivId+'_up"><a href="javascript:void(null);" onFocus="this.blur();" onMouseDown="javascript:startScroll(\''+maskDivId+'\',\''+contentDivId+'\',\'up\');" onMouseUp="javascript:stopScroll();">Up</a></li>');
	document.write('	<li class="down" id="'+scrollControlsDivId+'_down"><a href="javascript:void(null);" onFocus="this.blur();" onMouseDown="javascript:startScroll(\''+maskDivId+'\',\''+contentDivId+'\',\'down\');" onMouseUp="javascript:stopScroll();">Down</a></li>');
	document.write('</ul>');
	
	uniqueScrollId++;
	
	// use javascript to hide the browser scrollbars and show the buttons
	// so that non-javascript users can see normal scrollbars
	maskDiv = document.getElementById(maskDivId);
	contentDiv = document.getElementById(contentDivId);
	
	var scrollControls = document.getElementById(scrollControlsDivId);
	var upButton = document.getElementById(scrollControlsDivId+'_up');
	var downButton = document.getElementById(scrollControlsDivId+'_up');
			
	if(debug) alert("maskDiv("+maskDivId+") = "+maskDiv+"\nmaskDiv.offsetHeight = "+maskDiv.offsetHeight+"\n\ncontentDiv("+contentDivId+") = "+contentDiv+"\ncontentDiv.offsetHeight = "+contentDiv.offsetHeight);
	
	if(contentDiv.offsetHeight > maskDiv.offsetHeight){
		maskDiv.style.overflow='hidden';
		scrollControls.style.display='block';
	}
}

var moveDivInterval;
var maskDiv;
var contenDiv;
var divProperty;
var distance;

function startScroll(maskId,contentId,direction){
	maskDiv = document.getElementById(maskId);
	contentDiv = document.getElementById(contentId);
	contentDiv.style.position='absolute';
	divProperty = 'offsetTop';
	var directionMultiplier = direction=='up' ? 1 : -1;
	distance = 5 * directionMultiplier;
	maxPos = direction=='up' ? 0 : (0-(contentDiv.offsetHeight-maskDiv.offsetHeight));
	moveDivInterval = setInterval("scrollDiv(contentDiv,divProperty,distance,maxPos)",10);
}

function scrollDiv(divObject,divProperty,distance,maxPos){
	//alert(divObject+","+divProperty+","+distance);
	//eval("divObject."+divProperty+" += "+distance+";");
	var currentPos = divObject.offsetTop;
	var newPos = currentPos + distance;
	
	if((distance<0 && newPos>maxPos) || (distance>0 && newPos<maxPos)){		
		divObject.style.top = newPos+'px';
	}else{
		divObject.style.top = maxPos+'px';
	}
}

function stopScroll(){
	clearInterval(moveDivInterval);
}
