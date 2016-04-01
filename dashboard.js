
window.onload=function(){
	
	document.getElementById("Logout").addEventListener("click",function(e){
		e.preventDefault();
		data=ajaxCall("Login/logout.php","");
		window.location.href="";
	});
	
};