/**
The universal AJAX function
@parm: the locations of the file to be called, the data to be sent
*/
function ajaxCall(loc,data){
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
	
	ajaxRequest.open("POST",loc);
		
	ajaxRequest.setRequestHeader('Content-Type','application/json');
	
	ajaxRequest.onreadystatechange = function(event) {
		if (ajaxRequest.readyState == 4 && ajaxRequest.status == 200) {
			//console.log(ajaxRequest.responseText);
			return JSON.parse(ajaxRequest.responseText);
		} // end of if
	} // end of callback
	
	ajaxRequest.send(JSON.stringify(data));
	
};