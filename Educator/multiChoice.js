/*
A simple Ajax function to prevent the form from refreshing everytime something is submitted
*/
window.onload=function(){
	document.getElementById("multiForm").onsubmit = function() {
		alert("Hello");
		return false;
	}
};
