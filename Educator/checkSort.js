window.onload=function(){
	
	function toggleDisplay(check,panes){
		if(check){
			for(var i=0;i<panes.length;i++){
				if(hasClass(panes[i],'rm'))
					continue;
				else if(isMatch(panes[i],document.getElementById("search").value)){
					if(panes[i].style.display=='none')
					unfade(panes[i]);
				}
			}
		}
		else{
			for(var i=0;i<panes.length;i++){
				if(hasClass(panes[i],'rm'))
					continue;
				else if(panes[i].style.display=='block' || !panes[i].style.display)
					fade(panes[i]);
			}
		}
	}
	
	document.getElementById("mcCh").onchange= function(){
		toggleDisplay(document.getElementById("mcCh").checked,document.getElementsByClassName("mc"));
	};
	
	document.getElementById("tfCh").onchange= function(){
		toggleDisplay(document.getElementById("tfCh").checked,document.getElementsByClassName("tf"));
	};
	
	document.getElementById("fbCh").onchange= function(){
		toggleDisplay(document.getElementById("fbCh").checked,document.getElementsByClassName("fb"));
	};
	
	document.getElementById("oeCh").onchange= function(){
		toggleDisplay(document.getElementById("oeCh").checked,document.getElementsByClassName("oe"));
	};
	
}