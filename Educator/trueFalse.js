window.onload=function(){
	document.getElementById("trueFalseForm").addEventListener("submit",function(e){
		e.preventDefault();
		var data={'type':'tf','question_type':0};
		data['question']=document.getElementById("question").value;
		if(document.getElementById("true").checked)
			data['ans']='T';
		else
			data['ans']='F';
		data['points']=document.getElementById("points").value;
		
		ajaxCall("addQuest.php",data,function(ret){
			if(ret.valid){
				window.location.reload();
			}
		});
	});
};