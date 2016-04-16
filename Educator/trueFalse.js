window.onload=function(){
	document.getElementById("trueFalseForm").addEventListener("submit",function(e){
		e.preventDefault();
		var data={'question_type':'tf'};
		data['question']=document.getElementById("question").value;
		var tf=document.getElementsByName("tfBtn");
		
		
		
		ajaxCall("addQuest.php",data,function(ret){
			//console.log(ret);
			window.location.href="http://afsaccess1.njit.edu/~dkb9/Software_Design_Project/dashboard.php";
		});
		
		
	});
};