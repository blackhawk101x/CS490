
/*
A simple function that is used to remove quesrion from the Database
Parameters: the question id number as an integer
Return: refreshes the page on completions completion of ajax call
*/
function rmQuest(questId){
	//console.log({'question_id':questId.toString()});
	//ajax call to the php script
	ajaxCall("rmQuest.php",{'question_id':questId.toString()},function(ret){
		//console.log(ret);
		if(ret.valid){ // reloads the page on success
			fade(document.getElementById("p"+questId.toString()));
		}
	});
}

/*
A simple function that is used to remove the question from the test
Parameters: The Question ID number as an integer
Return:
*/
function rmQuestTest(questId){
	//ajax call to the php script
	ajaxCall("rmQuestTest.php",{"exam_ques_id":questId},function(ret){
		if(ret.valid){
			window.location.reload();
		}
	});
}

/*
Source: Stackoverflow
Designed to make the elements fade nicely
*/
function fade(element) {
    var op = 1;  // initial opacity
    var timer = setInterval(function () {
        if (op <= 0.1){
            clearInterval(timer);
            element.style.display = 'none';
        }
        element.style.opacity = op;
        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
        op -= op * 0.1;
    }, 10);
}

/*
Source: Stackoverflow
Designed to make the element fade in nicely
*/
function unfade(element) {
    var op = 0.1;  // initial opacity
    element.style.display = 'block';
    var timer = setInterval(function () {
        if (op >= 1){
            clearInterval(timer);
        }
        element.style.opacity = op;
        element.style.filter = 'alpha(opacity=' + op * 100 + ")";
        op += op * 0.1;
    }, 10);
}