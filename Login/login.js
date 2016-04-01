/*
A simple Ajax function to prevent the form from refreshing everytime something is submitted
*/
window.onload=function(){
	document.getElementById("loginForm").onsubmit = function() {
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

		//console.log("Username "+ usr);
		//console.log("Password "+ pw);
		
		
		ajaxRequest.open("POST","Login/sessionSet.php");
		
		ajaxRequest.setRequestHeader('Content-Type','application/json');
		
		ajaxRequest.onreadystatechange = function () {
			if (ajaxRequest.readyState == 4 && ajaxRequest.status == 200) {
				//console.log(ajaxRequest.responseText);
				var data =JSON.parse(ajaxRequest.responseText);
				//console.log(data);
				if(data['valid']){
					window.location.href="dashboard.php";
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
