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
		
		
		ajaxRequest.open("POST","sessionSet.php");
		
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


/*
$(document).ready(function(){
	
	
	/*
	adding an event handler to the for when the submit button is clicked
	*/
	/*
	$("#submitBTN").click(function(){
		
		// getting the data
		username=$("#username").val();
		password=$("#inputPW").val();
		
		// https://web.njit.edu/~ve23/middleware.php
		
		$.ajax({
			type: "POST",
			url: "https://web.njit.edu/~ve23/middleware.php",
			data: {'name' : username, 'pwd' : password},
			success: function(resp){
				var tmp = JSON.parse(resp); // parsing the JSON
				console.log(resp);
				//return;
								
				if(!tmp["isNJIT"]){
					$("#successNJIT").css("display","none");
					$("#errorNJIT").css("display","");
				}
				else{
					$("#errorNJIT").css("display","none");
					$("#successNJIT").css("display","");
				}
				
				if(!tmp["isDB"]){
					$("#successSyst").css("display","none");
					$("#errorSyst").css("display","");
				}
				else{
					$("#errorSyst").css("display","none");
					$("#successSyst").css("display","");	
				}
				
				if(username=="dkb9"){
					tmp["UCID"]=username;
					$.ajax({
						type: "POST",
						url: "sessionSet.php",
						data: tmp,
						success: function(resp){
							//console.log(resp);
							window.location.href="dashboard.php";
						}
					});	// end of ajax call
				}
				
			} // end of callback function
		}); // end of ajax
	return false;
	});
	
	
	
	//https://webauth.njit.edu/idp/Authn/UserPassword?j_username=dkb9&j_password=MeowMeow21
	
}); // end of doc_ready callback
*/