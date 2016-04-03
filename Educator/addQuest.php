<?php
session_Start();
$data = json_decode(file_get_contents('php://input'), true);
$testId=$_SESSION['testId'];


//curl Request

echo json_encode(array('good'=>true));

?>