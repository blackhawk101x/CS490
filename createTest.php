<?php
session_start();
$data = json_decode(file_get_contents('php://input'), true);
require_once 'curlHandle.php';

$data['user_id']=$_SESSION['id'];
$ret = curlCall("https://web.njit.edu/~rs334/cs490/beta/rimi/exam/draft01.php ",$data);


$_SESSION['testId']=$ret['testId'];
$_SESSION['testName']=$data['testName'];

//echo json_encode(array('good'=>true));
//echo json_encode($data_Curl);
echo json_encode($ret);
?>