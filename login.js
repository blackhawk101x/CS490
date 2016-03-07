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
			url: "Tester.php",
			data: {'name' : username, 'pwd' : password},
			success: function(resp){
				var tmp = JSON.parse(resp); // parsing the JSON
				if(!tmp["isNJIT"] && !tmp["isInDB"]){
					$("#errorMessage").css("display","");
					return; // breaking out of the function
				}else{
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
				} // end of else
				
			} // end of callback function
		}); // end of ajax
		
		
	return false;
	});
	
	//https://webauth.njit.edu/idp/Authn/UserPassword?j_username=dkb9&j_password=MeowMeow21
	
}); // end of doc_ready callback