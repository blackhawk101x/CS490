<?php
session_start();
//require_once 'curHandle.php';
$data = json_decode(file_get_contents('php://input'), true);

//$ret=curlCall('taketest.php',array('testId'=>$data['testId']));
$_SESSION['testId']=$data['testId'];
$_SESSION['testName']=$data['testName'];
echo json_encode(array('valid'=>true));

?>