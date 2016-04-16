<?php

//The meta data of all the tests for the teacher

//Here is what I will send you
json_encode(array('id'=>$_USERID));
//$_USERID will be a numeric value that was set during the login system

/*
What each test should contain:

testId: the number id of the test in the database
testName: The name of the Test as it should appear in the database
desc: Description of the test and any instructor notes
questNums: The number of questions in the test
testVis: Determines if the test is visible to the students
testScore: determines if the test grades have been released to the students

*/

$test1 =array('testId'=>1,'testName'=>'Exam 1','desc'=>' The first exam','questNums'=>20,'testVis'=>false);
$test2 =array('testId'=>2,'testName'=>'Exam 2','desc'=>' The second exam','questNums'=>17,'testVis'=>true,'testScore'=>false);
$test3 =array('testId'=>3,'testName'=>'Exam 3','desc'=>' The third exam','questNums'=>25, 'testVis'=>true, 'testScore'=>true);
$test4 =array('testId'=>4,'testName'=>'Exam 4','desc'=>' The fourth exam','questNums'=>15,'testVis'=>true, 'testScore'=>true);
$data = array('1'=>$test1,'2'=>$test2,'3'=>$test3,'4'=>$test4);
echo json_encode($data);

?>