<?php
session_start();

/*
Needs proper Authetications system
*/

require_once 'curlHandle.php';
echo "Hello";

?>

<html>
	<head>
		<title>True or False</title>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
		<script type="text/javascript" src="callHandler.js"></script>
	</head>
	<body style="padding-top: 70px;">
	<?php
	$questList=curlCall("https://web.njit.edu/~rs334/cs490/beta/rimi/test/get_meta.php",array("user_id"=>1,"question_type"=>4, "count"=>0));
	echo var_dump($questList);
	foreach($questList as $key => $quest){
		echo var_dump(get_object_vars($quest));
		echo "<hr>";
	}
	?>
	</body>
</html>