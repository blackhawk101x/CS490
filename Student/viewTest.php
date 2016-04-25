<?php
session_start();

if($_SESSION['valid']!='student' || !isset($_SESSION['UCID'])){
	header('location: http://web.njit.edu/~dkb9/Software_Design_Project/');
}

if(!isset($_SESSION['testId']){
	header('location: http://web.njit.edu/~dkb9/Software_Design_Project/');
}

require_once 'curlHandle.php';


?>

<html>
	<head>
		<title>Review Exam</title>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
		<script type="text/javascript" src="callHandler.js"></script>
	</head>
	<body style="padding-top:50px">
		
	</body>
</html>