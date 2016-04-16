/*
A simple Ajax function to prevent the form from refreshing everytime something is submitted
*/
window.onload=function(){
	document.getElementById("multiForm").onsubmit = function(e) {
		e.preventDefault(); // prevents the from from refeshing every time it is submitted
		
		var data={'type':'mc'};
		data['question']= document.getElementById("question").value;
		
		var txtInput = document.getElementsByName("textField");
		for(var a=0; a<txtInput.length;a++){
			data[txtInput[a].id]=txtInput[a].value;
		}
			
		var radio= document.getElementsByName("optradio");
		for(var x=0;x<radio.length;x++){
			if(radio[x].checked){
				switch(txtInput[x].id){
					case 'option1':
						data['ans']='A';
						break;
					case 'option2':
						data['ans']='B';
						break;
					case 'option3':
						data['ans']='C';
						break;
					case 'option4':
						data['ans']='D';
						break;
				}
				
			}
		}
		
		data['points']=document.getElementById('points').value;
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
