/*
when the screen is loaded
*/
window.onload=function(){
	
	
	document.getElementById("multiForm").onsubmit = function(e) {
		e.preventDefault(); // prevents the from from refeshing every time it is submitted
		
		var data={'type':'mc','question_type':0};
		data['question']= document.getElementById("question").value;
		
		var txtInput = document.getElementsByName("textField");
		for(var a=0; a<txtInput.length;a++){
			data[txtInput[a].id]=txtInput[a].value;
		}
		
		// finding which radio button is checked
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
		
		// making the ajax request 
		ajaxCall("addQuest.php",data,function(ret){
			if(ret.valid){ // on success, reload page
				window.location.reload();
			}
		});
		
	}
	
	// adding an event handler for the discard btn
	document.getElementById("discardBtn").onclick=function(){
		window.location.href="testMaker.php"
	}
	
	
};
