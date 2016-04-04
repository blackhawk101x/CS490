/*
A simple Ajax function to prevent the form from refreshing everytime something is submitted
*/
window.onload=function(){
	document.getElementById("multiForm").onsubmit = function(e) {
		e.preventDefault();
		
		var data={'question_type':'mc'};
		data['question']= document.getElementById("question").value;
		
		var txtInput = document.getElementsByName("textField");
		for(var a=0; a<txtInput.length;a++){
			data[txtInput[a].id]=txtInput[a].value;
		}
			
		var radio= document.getElementsByName("optradio");
		for(var x=0;x<radio.length;x++){
			if(radio[x].checked){
				data['ans']=txtInput[x].id;
			}
		}
		console.log(data);
		ajaxCall("addQuest.php",data,function(ret){
			console.log(ret);
			/*
			if(ret.valid){
				window.location.href="testMaker.php";
			}
			*/
		});
		
	}
	
	document.getElementById("discardBtn").onclick=function(){
		window.location.href="testMaker.php"
	}
	
};
