<?php

if($_POST['testId']==1){
	if($_POST['questNums']){
		// 'question number on page'=>'question id in database'
		echo json_encode(array(1=>1,2=>2,3=>3,4=>4));
	}elseif($_POST['questId']==1){
		echo json_encode(array('id'=>'1','questType'=>'mc','quest'=>'What is the proper extention to a python script?','opt1'=>'.py','opt2'=>'.pyth','opt3'=>'.python','opt4'=>'All of the Above'));
	}elseif($_POST['questId']==2){
		echo json_encode(array('id'=>'1','questType'=>'mc','quest'=>'What is the proper syntax of a comment in python','opt1'=>'//comment','opt2'=>'#comment','opt3'=>'/*comment*/','opt4'=>'You cannot comment in Python'));
	}elseif($_POST['questId']==3){
		echo json_encode(array('id'=>'1','questType'=>'tf','quest'=>'Python is compiled.',));
	}elseif($_POST['questId']==4){
		echo json_encode(array('id'=>'1','questType'=>'tf','quest'=>'Python is extremely flexible.'));
	}
}elseif($_POST['testId'==4]){
	if($_POST['questNums']){
		// 'question number on page'=>'question id in database'
		echo json_encode(array(1=>1,2=>2,3=>3,4=>4));
	}elseif($_POST['questId']==4){
		echo json_encode(array('id'=>'1','questType'=>'mc','quest'=>'What is the proper extention to a python script?','opt1'=>'.py','opt2'=>'.pyth','opt3'=>'.python','opt4'=>'All of the Above'));
	}elseif($_POST['questId']==2){
		echo json_encode(array('id'=>'1','questType'=>'mc','quest'=>'What is the proper syntax of a comment in python','opt1'=>'//comment','opt2'=>'#comment','opt3'=>'/*comment*/','opt4'=>'You cannot comment in Python'));
	}elseif($_POST['questId']==3){
		echo json_encode(array('id'=>'1','questType'=>'tf','quest'=>'Python is compiled.',));
	}elseif($_POST['questId']==1){
		echo json_encode(array('id'=>'1','questType'=>'tf','quest'=>'Python is extremely flexible.'));
	}
}


 
?>