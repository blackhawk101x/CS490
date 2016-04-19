<?php
session_start();


if($_SESSION['valid']!='teacher' && !isset($_SESSION['UCID'])){
	header('location: https://web.njit.edu/~dkb9/Software_Design_Project/');
}

if(!isset($_SESSION['testId'])){
	header('location: https://web.njit.edu/~dkb9/Software_Design_Project/dashboard.php');
}


require_once 'curlHandle.php';
require_once 'navBar.php';

$questList=curlCall("https://web.njit.edu/~rs334/cs490/beta/rimi/meta/exam/exam_info.php",array("user_id"=>$_SESSION['id'],"exam_id"=>"1"));

function mcPanel($quest){
	
}



?>

<html>
	<head>
		<title>Test Maker</title>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
		<script type="text/javascript" src="callHandler.js"></script>
	</head>
	<body style="padding-top: 25px;">
		<?php navBar(); ?>
		<div class="jumbotron">
	   		<div class="container">
        		<h1><?php echo $_SESSION['testName'];?></h1>
    		</div>
    	</div>
    	
		<div class="container">
			<div class="rows">
			<?php
				toolBar();
				//echo var_dump($questList);
				foreach($questList as $key=>$quest){
					$quest=get_object_vars($quest);
					?>
					<div class="panel panel-default">
						<div class="panel-body">
							<center>
								<h3>Question: <?php echo $quest['question']; ?></h3>
							</center>
								
							<?php
							echo var_dump($quest);
							?>
							<center>
								<button type="button" class="btn btn-primary btn-lg" aria-label="Left Align" disabled>
									<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									Edit Question
								</button>
								
								<button type="button" class="btn btn-default btn-lg" aria-label="Left Align" >
									Remove from Test
								</button
							</center>
						</div>
					</div>
					<?php
				}
			?>
			
			
				<div class="col-md-12">
					<hr>
					<footer>
						<p>© 2016, Buell Enterprises</p>
					</footer>
				</div>
			
			</div>
			
		</div>
		
		
	</body>
</html>