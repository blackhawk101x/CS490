window.onload=function(){
	
	document.getElementById("fillForm").onsubmit = function(e) {
		e.preventDefault();
		var data ={'type':'fb','question_type':0};
		data['question']=document.getElementById("question").value;
		data['option1']=document.getElementById("answer").value;
		data['points']=document.getElementById("points").value;
		ajaxCall("addQuest.php",data,function(ret){
			if(ret.valid)
				window.location.reload();
		});
		
	}
	
	document.getElementById("discardBtn").onclick=function(){
		window.location.href="testMaker.php"
	}
};