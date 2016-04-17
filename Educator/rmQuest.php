<?php
session_start();
require_once 'curlHandle.php';
$data = json_decode(file_get_contents('php://input'), true);
$data['user_id']=$_SESSION['id'];

$ret= array('no'=>'work');
$ret= curlCall("https://web.njit.edu/~rs334/cs490/beta/rimi/questions/delete/delete_ques.php",$data);

echo json_encode($ret);
?>