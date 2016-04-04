<?php
session_start();
if($_SESSION['valid']!='teacher' && !isset($_SESSION['UCID'])){
	header('location: http://afsaccess1.njit.edu/~dkb9/Software_Design_Project/');
}

if(!isset($_SESSION['testName']) || !isset($_SESSION['testId'])){
	header('location: http://afsaccess1.njit.edu/~dkb9/Software_Design_Project/dashboard.php');
}
//curl request


?>

<html>
	<head>
		<title>Test Maker</title>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
		<script type="text/javascript" src="callHandler.js"></script>
		
		<style>
			.nav-justified {
				background-color: #eee;
				border: 1px solid #ccc;
				border-radius: 5px;
			}
		</style>
	</head>
	<body style="padding-top: 50px;">
		<?php require_once 'navBar.php';?>
		<div class="jumbotron">
	   		<div class="container">
        		<h1><?php echo $_SESSION['testName'];?></h1>	
    		</div>
    	</div>
    	
		<div class="container">
			<nav style="padding-bottom:20px;">
				<ul class="nav nav-justified">
					<li><a href="multiChoice.php">Multiple Choice</a></li>
					<li><a href="trueFalse.php">True or False</a></li>
					<li><a href="#">Fill in the Blank</a></li>
					<li><a href="#">Open Ended</a></li>
					<li><a href="#">Pre-Build</a></li>
				</ul>
			</nav>
			
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">Panel title</h3>
				</div>
				<div class="panel-body">
					Panel content
				</div>
			</div>
			
		</div>
		
		
	</body>
</html>