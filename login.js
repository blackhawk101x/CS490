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
		
		// ajax request
		/*
		$.ajax({
			type: "POST",
			url: "https://web.njit.edu/~ve23/middleware.php",
			data: "name="+username+"&pwd="+password,
			success: function(resp){
				
				var tmp = JSON.parse(resp);
				if(tmp['valid']){
					//console.log("Success");
					window.location="home.php";
				}
				else{
					$("#errorMessage").css("display","")
				}
			} // end of callback function
		}); // end of ajax
		*/
		
		$.ajax({
			type: "POST",
			url: "sessionSet.php",
			data: "name="+username+"&pwd="+password,
			success: function(resp){
				var tmp = JSON.parse(resp);
				console.log(tmp);
			} // end of callback function
		}); // end of ajax
		
	return false;
	});
	
	
	
}); // end of doc_ready callback