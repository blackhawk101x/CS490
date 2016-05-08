/*
A simple function that determines if the function has the class
*/
function hasClass(element, cls) {
    return (' ' + element.className + ' ').indexOf(' ' + cls + ' ') > -1;
}

/*
A function designed to see if the panel is maked invisible by the checkboxes
Input: The panel object
Output: true if it is hidden by the panel, false if not 
*/
function isChecked(panel){
	if(hasClass(panel,'mc')){
		if(!document.getElementById("mcCh").checked)
			return true;
	}
	else if(hasClass(panel,'tf')){
		if(!document.getElementById("tfCh").checked)
			return true;
	}
	else if(hasClass(panel,'fb')){
		if(!document.getElementById("fbCh").checked)
			return true;
	}
	else if(hasClass(panel,'oe')){
		if(!document.getElementById("oeCh").checked)
			return true;
	}
	
	return false;
}

function isMatch(panel,txt){
	// getting rid of the html tags and button contents
	var data = panel.innerText || panel.textContent;
	var baseInfo =["Question:","Answer:","Edit Question","Already in Test","Add to Test","Remove from Database", "Points:"];
	for(var i =0;i<baseInfo.length;i++){
		data=data.replace(baseInfo[i],"");
	}
	data=data.trim();
	return (data.indexOf(txt)>-1);
}


/*

*/
function togglePanel(txt,panel){
	
	// if the string is a match
	if(!isMatch(panel,txt)){
		if(panel.style.display!='none')
			fade(panel);
	}
	else{
		if(!isChecked(panel)){
			if(panel.style.display=='none')
				unfade(panel);
		}
	}
	
	
	
}

function searchPage(){
	//console.log(document.getElementById("search").value);
	var panels = document.getElementsByName("questions");
	for(var i=0;i<panels.length;i++){
		togglePanel(document.getElementById("search").value,panels[i]);
	}
	
}