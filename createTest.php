<?php
session_start();
$data = json_decode(file_get_contents('php://input'), true);

//curl Request



$mid['testId']='1';
$mid['testName']=$data['testName'];



$_SESSION['testId']=$mid['testId'];
$_SESSION['testName']=$mid['testName'];

//echo json_encode(array('testName'=>$_SESSION['testName'],'testId'=>$_SESSION['testId']));
echo json_encode(array('good'=>true));
?>