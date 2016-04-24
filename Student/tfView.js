window.onload=function(){
	document.getElementById("tfView").onsubmit = function(e) {
		e.preventDefault();
		var data;
		if(document.getElementById("true").classList.contains("active")){
			ajaxCall("ansQuest.php", {'answer':true} ,function(ret){
				console.log(ret);
				window.location.reload();
			});
		}
		else if(document.getElementById("false").classList.contains("active")){
			ajaxCall("ansQuest.php", {'answer':false} ,function(ret){
				console.log(ret);
				window.location.reload();
			});
		}
		else
			document.getElementById("errorMsg").style.display="";
		
	} // end of form tfView onsumbit handler
	
	/*
	Ensuring that the user only can select one
	*/
	document.getElementById("true").addEventListener("click",function(e){
		e.preventDefault();
		document.getElementById("true").classList.add('active');
		document.getElementById("false").classList.remove('active');
	});
	
	document.getElementById("false").addEventListener("click",function(e){
		e.preventDefault();
		document.getElementById("false").classList.add('active');
		document.getElementById("true").classList.remove('active');
	});
}