<?php
session_start();
$data = json_decode(file_get_contents('php://input'), true);

// getting the question information from session and 
$quest= get_object_vars($_SESSION['test'][$_SESSION['currQuest']]);

if(!isset($_SESSION['ans'])){
	$_SESSION['ans']= array($quest['test_q_id']=>$data['answer']);
}
else{
	$_SESSION['ans'][$quest['test_q_id']]=$data['answer'];
}

$_SESSION['currQuest']++;


echo json_encode($_SESSION['ans']);


?>