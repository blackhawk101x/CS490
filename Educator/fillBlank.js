window.onload=function(){
	
	document.getElementById("fillForm").onsubmit = function(e) {
		e.preventDefault();
		var quest =document.getElementById("question").value;
		var ans = document.getElementById("answer").value;
		window.location.href="http://afsaccess1.njit.edu/~dkb9/Software_Design_Project/Educator/testMaker.php";
		/* commented for testing purposes
		ajaxCall("addQuest.php",{'question_type':'fb','question':quest,'option1':ans},function(data){
			console.log(data);
			if(data.valid){
				window.location.href="http://afsaccess1.njit.edu/~dkb9/Software_Design_Project/Educator/testMaker.php";
			}
		});
		*/
	}
	
	document.getElementById("discardBtn").onclick=function(){
		window.location.href="testMaker.php"
	}
};