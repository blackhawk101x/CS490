<?php 
/* 
A simple php script which ajaxcalls it to toggle the release/hide the grades
*/
session_start();
$data = json_decode(file_get_contents('php://input'), true);
require_once 'curlHandle.php';
$data['user_id']=$_SESSION['id'];
$ret=get_object_vars(curlCall("https://web.njit.edu/~rs334/cs490/beta/rimi/exam/set_exam.php",$data));
echo json_encode(array('valid'=>$ret['valid']));
?>