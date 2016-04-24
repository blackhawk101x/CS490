<?php
session_start();
$data = json_decode(file_get_contents('php://input'), true);

// getting the question information from session and 
$quest= get_object_vars($_SESSION['test'][$_SESSION['currQuest']]);

if(!isset($_SESSION['ans'])){
	$_SESSION['ans']= array($quest['quest_id']=>$data['option1']);
}
else{
	$_SESSION['ans'][$quest['quest_id']]=$data['option1'];
}

$_SESSION['currQuest']++;


echo json_encode($_SESSION['ans']);


?>