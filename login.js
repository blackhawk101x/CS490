/*
A simple Ajax function to prevent the form from refreshing everytime something is submitted
*/
$("#loginForm").submit(function(e) {
    e.preventDefault();
});

$(document).ready(function(){
	
	/*
	adding an event handler to the for when the submit button is clicked
	*/
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
				
			} // end of callback function
		}); // end of ajax
		
		
	return false;
	});
	
	/*
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
	*/
	
	
	//https://webauth.njit.edu/idp/Authn/UserPassword?j_username=dkb9&j_password=MeowMeow21
	
}); // end of doc_ready callback