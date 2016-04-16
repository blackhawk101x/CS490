<?php
session_start();
$data = json_decode(file_get_contents('php://input'), true);

$_SESSION['testId']=$data['testId'];
$_SESSION['testName']=$data['testName'];

echo json_encode(array('valid'=>true));



?>