<?php
session_Start();
require_once 'curlHandle.php';
$data = json_decode(file_get_contents('php://input'), true); // getting the json input and decoding it

$data['user_id']=$_SESSION['id'];

if($data['type']=='mc'){
	//$data['question_type']='0';
	$ret=get_object_vars(curlCall('https://web.njit.edu/~rs334/cs490/beta/rimi/questions/mc/middle_mc.php',$data));
	echo json_encode(array('valid'=>$ret['valid']));
}
elseif($data['type']=='tf'){
	$ret=get_object_vars(curlCall('https://web.njit.edu/~rs334/cs490/beta/rimi/questions/tf/middle_tf.php',$data));
	echo json_encode(array('valid'=>$ret['valid']));
}
elseif($data['type']=='fb'){
	$ret=get_object_vars(curlCall('https://web.njit.edu/~rs334/cs490/beta/rimi/questions/fb/middle_fb.php',$data));
	echo json_encode(array('valid'=>$ret['valid']));
}
else{
	echo json_encode(array('valid'=>false));
}
	
?>