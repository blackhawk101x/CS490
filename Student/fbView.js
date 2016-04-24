window.onload=function(){
	document.getElementById("fbView").onsubmit = function(e) {
		e.preventDefault();
		ajaxCall("ansQuest.php",{'answer':document.getElementById("answer").value},function(ret){
			console.log(ret);
			window.location.reload();
		});
	}
}