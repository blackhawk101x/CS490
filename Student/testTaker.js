window.onload=function(){
	document.getElementById("testArea").onsubmit=function(e){
		e.preventDefault();
		// gathers and sends the data
		window.location.href="http://afsaccess1.njit.edu/~dkb9/Software_Design_Project/dashboard.php";
		
	}
};