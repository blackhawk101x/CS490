/*
A simple Ajax function to prevent the form from refreshing everytime something is submitted
*/
window.onload=function(){
	document.getElementById("multiForm").onsubmit = function(e) {
		e.preventDefault();
		
		var quest = document.getElementById("question").value;
		var txtInput = document.getElementsByName("textField");
		var ans;
		var radio= document.getElementsByName("optradio");
		for(var x=0;x<radio.length;x++){
			if(radio[x].checked){
				ans=txtInput[x].id;
			}
		}
		//console.log(quest);
		ajaxCall("");
		
	}
	
	document.getElementById("discardBtn").onclick=function(){
		window.location.href="testMaker.php"
	}
	
};
