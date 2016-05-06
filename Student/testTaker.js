window.onload=function(){
	document.getElementById("testArea").onsubmit=function(e){
		e.preventDefault();
		// gathers and sends the data
		window.location.href="http://web.njit.edu/~dkb9/Software_Design_Project/dashboard.php";
		
	}
};