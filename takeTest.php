<?php
session_start();
$data = json_decode(file_get_contents('php://input'), true);
require_once 'curlHandle.php';

$data['user_id']=$_SESSION['id'];
$ret=curlCall("https://web.njit.edu/~rs334/cs490/beta/rimi/student/exam/view_exam.php",$data);

if(isset($ret) && count($ret)>0 ){
	$_SESSION['testId']=$data['exam_id'];
	$_SESSION['test']=$ret;
	$_SESSION['currQuest']=0;
	echo json_encode(array('valid'=>true));
}
else{
	echo json_encode(array('valid'=>false));
}
?>