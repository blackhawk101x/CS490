<?php
session_Start();
require_once 'curlHandle.php';
$data = json_decode(file_get_contents('php://input'), true);

$data['user_id']=$_SESSION['id'];

if($data['type']=='mc'){
	//$data['question_type']='0';
	$ret=curlCall('https://web.njit.edu/~rs334/cs490/beta/rimi/questions/mc/middle_mc.php',$data);
	echo json_encode(array('valid'=>true));
}
else{
	echo json_encode(array('No'=>'Work'));
}
	



?>