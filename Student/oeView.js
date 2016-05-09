window.onload=function(){
	document.getElementById("oeView").onsubmit = function(e) {
		e.preventDefault();
		//console.log({'answer':document.getElementById("answer").value});
		
		ajaxCall("ansQuest.php",{'answer':document.getElementById("answer").value},function(ret){
			console.log(ret);
			window.location.reload();
		});
		
	}
}