<?php
//tests meta for the student

//Here is what I will send you
json_encode(array('id'=>$_USERID));
//$_USERID will be a numeric value that was set during the login system

/*
what each test should contain:

testId: the numeric value of the test in the database
testName: The name of the Test as it should appear in the database
desc: Description of the test and any instructor notes
questNums: The number of questions in the test
testTotal: The total number of points that the test is worth
testScore: The grade the student got on the test out of the total points of the test
LEAVE THE TEST SCORE OUT OF THE ARRAY IF THE TEACHER HAS NOT YET RELEASED THE SCORES AS SHOWN BETWEEN $test1 AND $test2.
takeTest: Indicates whether the student may take test. For tests that have been graded but have not released the grades should be set to false.

*/

$test1 =array('testId'=>1,'testName'=>'Exam 1','desc'=>' The first exam','questNums'=>20 'testTotal'=>100, 'testScore'=>100 takeTest=>false);
$test2 =array('testId'=>2,'testName'=>'Exam 2','desc'=>' The second exam','questNums'=>17,'testTotal'=>150, takeTest=>true);
$test3 =array('testId'=>3,'testName'=>'Exam 3','desc'=>' The third exam','questNums'=>25,'testTotal'=>75,'testScore'=>70, takeTest=>false);
$test4 =array('testId'=>4,'testName'=>'Exam 4','desc'=>' The fourth exam','questNums'=>15 'testTotal'=>100,takeTest=>false);
$data = array('1'=>$test1,'2'=>$test2,'3'=>$test3,'4'=>$test4);
echo json_encode($data);
?>