<?php
session_start();
require_once 'curlHandle.php';
$data = json_decode(file_get_contents('php://input'), true);

$_SESSION['testId']=$data['testId'];

echo json_encode(array('valid'=>true));
?>