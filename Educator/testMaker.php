<?php
session_start();
require_once 'curlHandle.php';

if($_SESSION['valid']!='teacher' && !isset($_SESSION['UCID'])){
	header('location: https://web.njit.edu/~dkb9/Software_Design_Project/');
}

if(!isset($_SESSION['testName']) || !isset($_SESSION['testId'])){
	header('location: https://web.njit.edu/~dkb9/Software_Design_Project/dashboard.php');
}
//curl request


/*
function to convert sort hand question to standard format
*/

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
					<li><a href="fillBlank.php">Fill in the Blank</a></li>
					<li><a href="#">Open Ended</a></li>
					<li><a href="#">Pre-Build</a></li>
				</ul>
			</nav>
			
			<?php
				$questList = curlCall('https://web.njit.edu/~dkb9/Software_Design_Project/Educator/simTestQuest.php',array('questNums'=>true));
				echo var_dump($questList);
				/*
				foreach($questList as $key => $id){
					$quest = curlCall('http://afsaccess1.njit.edu/~dkb9/Software_Design_Project/Educator/simTestQuest.php',array('questId'=>$id));
					//echo var_dump($quest);
					//echo "<br>"
					//echo questType($quest['questType']);
					//echo "<br>";
					
					?>
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title">Question Number <?php echo $key; ?></h3>
						</div>
						<div class="panel-body">
							<h4>Question Type: <?php echo $quest['questType'];?></h4>
							<h4> Question: <?php echo $quest['quest'];?></h4>
							
						</div>
					</div>
					<?php
				}
				*/
			?>
			
		</div>
		
		
	</body>
</html>