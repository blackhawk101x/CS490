<?php
session_start();
require_once 'curlHandle.php';
$data = json_decode(file_get_contents('php://input'), true); // getting the json input and decoding it
$data['user_id']=$_SESSION['id'];
$ret=get_object_vars(curlCall("https://web.njit.edu/~rs334/cs490/beta/rimi/exam/delete_exam_ques.php",$data));

echo json_encode(array('valid'=>$ret['valid']));


?>