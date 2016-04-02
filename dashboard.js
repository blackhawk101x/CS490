
window.onload=function(){
	
	document.getElementById("Logout").addEventListener("click",function(e){
		e.preventDefault();
		//alert("Hello");
		data=ajaxCall("Login/logout.php","");
		window.location.href="http://afsaccess1.njit.edu/~dkb9/Software_Design_Project/";
	});
	
};