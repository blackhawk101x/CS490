window.onload=function(){
	
	function toggleDisplay(check,panes){
		if(check){
			for(var i=0;i<panes.length;i++){
				if(panes[1].style.display=="none")
					unfade(panes[i]);
			}
		}
		else{
			for(var i=0;i<panes.length;i++){
				if(panes[i].style.display="block")
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
	
	document.getElementById("oeCH").onchange= function(){
		alert();
	};
	
	document.getElementById("search").onchange= function(){
		alert();
	};
}