
/*
A simple function that is used to remove the function
Parameters: the question id number as an integer
Return: refreshes the page on completions completion of ajax call
*/
function rmQuest(questId){
	console.log({'question_id':questId.toString()});
	//ajax call to the php script
	ajaxCall("rmQuest.php",{'question_id':questId.toString()},function(ret){
		//console.log(ret);
		if(ret.valid){ // reloads the page on success
			window.location.reload();
		}
	});
}