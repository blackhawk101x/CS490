<?php
session_Start();
require_once 'curlHandle.php';
$data = json_decode(file_get_contents('php://input'), true);

$data['user_id']=$_SESSION['id'];

if($_SESSION['edit']){
	$data['question_type']='1';
}
elseif($_SESSION['rm']){
	$data['question_type']='2';
}
else{
	$data['question_type']='0';
}



if($data['type']=='mc'){
	//$data['question_type']='0';
	$ret=curlCall('https://web.njit.edu/~rs334/cs490/beta/rimi/questions/mc/middle_mc.php',$data);
	echo json_encode($ret);
}
else{
	echo json_encode(array('No'=>'Work'));
}



//$testId=$_SESSION['testId'];

//$data_Curl=$data;
//$data_Curl['testId']=$_SESSION['testId'];
//$data_Curl['user_id']=$_SESSION['id'];	



?>