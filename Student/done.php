<?php
session_start();
$data = json_decode(file_get_contents('php://input'), true);
require_once 'curlHandle.php';

$data= array('answers'=>$_SESSION['ans']);
$data['user_id']=$_SESSION['id'];
$data['test_id']=$_SESSION['testId'];

$ret=curlCall("https://web.njit.edu/~rs334/cs490/beta/rimi/student/answers/get_answer3.php",$data);

//echo json_encode(array('type'=>gettype($ret)));

echo json_encode($ret);
?>