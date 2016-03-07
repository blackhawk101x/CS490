<?php
session_start();

$_SESSION['UCID']= $_POST['UCID'];

echo json_encode(array('UCID'=>$_POST['UCID']));
?>