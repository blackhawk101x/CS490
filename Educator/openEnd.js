window.onload=function(){
	document.getElementById("opForm").onsubmit = function(e) {
		e.preventDefault(); // prevents the from from refeshing every time it is submitted
		
		var data={'type':'oe','question_type':0};
		data['question']=document.getElementById("question").value;
		data['option1']=document.getElementById("ans").value;
		data['option2']=document.getElementById("ans").value;
		data['option3']=document.getElementById("ans").value;
		data['option4']=document.getElementById("ans").value;
		data['points']=document.getElementById("points").value;
		ajaxCall("addQuest.php",data,function(ret){
			if(ret.valid)
				window.location.reload();
		});
	}
}