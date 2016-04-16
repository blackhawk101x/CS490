/*
A simple Ajax function to prevent the form from refreshing everytime something is submitted
*/
window.onload=function(){
	
	
	document.getElementById("loginForm").onsubmit = function(e) {
		e.preventDefault();
		var ajaxRequest;  // The variable that makes Ajax possible!
		try{// Opera 8.0+, Firefox, Safari
			ajaxRequest = new XMLHttpRequest();
		} 
		catch (e){ // Internet Explorer Browsers
			try{
				ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
			} 
			catch (e) {
				try{
					ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
				} 
				catch (e){// Something went wrong
					alert("Your browser broke!");
					return false;
				}
			}
		}
		
		var usr = document.getElementById("username").value;
		var pw = document.getElementById("password").value;
		
		ajaxRequest.open("POST","Login/sessionSet.php");
		
		ajaxRequest.setRequestHeader('Content-Type','application/json');
		
		ajaxRequest.onreadystatechange = function () {
			if (ajaxRequest.readyState == 4 && ajaxRequest.status == 200) {
				var data =JSON.parse(ajaxRequest.responseText);
				
				if(data['valid']){
					window.location.href="https://web.njit.edu/~dkb9/Software_Design_Project/dashboard.php";
					//console.log(data);
				}else{
					// make the error massage show
					document.getElementById("LoginError").style.display="";
				}
				
			} // end of if
		} // end of callback
		
		ajaxRequest.send(JSON.stringify({'username': usr ,'password': pw}));
		
		
		return false;
	}
};
