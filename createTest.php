<?php
session_start();
$data = json_decode(file_get_contents('php://input'), true);
require_once 'curlHandle.php';

$data['user_id']=$_SESSION['id'];
$ret = get_object_vars(curlCall("https://web.njit.edu/~rs334/cs490/beta/rimi/exam/exam.php",$data));


$_SESSION['testId']=$ret['testId'];
$_SESSION['testName']=$data['testName'];

echo json_encode($ret);
?>