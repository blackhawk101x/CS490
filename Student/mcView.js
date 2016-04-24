window.onload=function(){
	document.getElementById("mcView").onsubmit = function(e) {
		e.preventDefault();
		
		if(document.getElementById("option1").classList.contains("active")){
			ajaxCall("ansQuest.php", {'answer':'option1'} ,function(ret){
				window.location.reload();
			});
		}
		else if(document.getElementById("option2").classList.contains("active")){
			ajaxCall("ansQuest.php", {'answer':'option2'} ,function(ret){
				window.location.reload();
			});
		}
		else if(document.getElementById("option3").classList.contains("active")){
			ajaxCall("ansQuest.php", {'answer':'option3'} ,function(ret){
				window.location.reload();
			});
		}
		else if(document.getElementById("option4").classList.contains("active")){
			ajaxCall("ansQuest.php", {'answer':'option4'} ,function(ret){
				window.location.reload();
			});
		}
		else
			document.getElementById("errorMsg").style.display="";
		
	}
	
	/*
	Ensuring that the user only can select one
	*/
	document.getElementById("option1").addEventListener("click",function(e){
		e.preventDefault();
		document.getElementById("option1").classList.add('active');
		document.getElementById("option2").classList.remove('active');
		document.getElementById("option3").classList.remove('active');
		document.getElementById("option4").classList.remove('active');
	});
	
	document.getElementById("option2").addEventListener("click",function(e){
		e.preventDefault();
		document.getElementById("option2").classList.add('active');
		document.getElementById("option1").classList.remove('active');
		document.getElementById("option3").classList.remove('active');
		document.getElementById("option4").classList.remove('active');
	});
	
	document.getElementById("option3").addEventListener("click",function(e){
		e.preventDefault();
		document.getElementById("option3").classList.add('active');
		document.getElementById("option1").classList.remove('active');
		document.getElementById("option2").classList.remove('active');
		document.getElementById("option4").classList.remove('active');
	});
	
	document.getElementById("option4").addEventListener("click",function(e){
		e.preventDefault();
		document.getElementById("option4").classList.add('active');
		document.getElementById("option1").classList.remove('active');
		document.getElementById("option2").classList.remove('active');
		document.getElementById("option3").classList.remove('active');
	});
	
}