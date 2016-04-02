<?php
session_start();
if(!$_SESSION['valid']=='teacher' && !isset($_SESSION['UCID'])){
	header('location: http://afsaccess1.njit.edu/~dkb9/Software_Design_Project/');
}
?>

<html>
	<head>
		<title>Test Maker</title>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
		<script type="text/javascript" src="../callHandler.js"></script>
		<script type="text/javascript" src="../dashboard.js"></script>
		<?php require_once '../navBar.php';?>
		<script type="text/javascript">
		</script>
	</head>
	<body style="padding-top: 50px;">
		<button class="accordion">Section 1</button>
		<div class="panel">
		  <p>Lorem ipsum...</p>
		</div>
		
		<button class="accordion">Section 2</button>
		<div class="panel">
		  <p>Lorem ipsum...</p>
		</div>
		
		<button class="accordion">Section 3</button>
		<div class="panel">
		  <p>Lorem ipsum...</p>
		</div>
		
	</body>
</html>