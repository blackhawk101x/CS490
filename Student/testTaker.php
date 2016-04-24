<?php
session_start();
require_once 'curlHandle.php';

if($_SESSION['valid']!='student' || !isset($_SESSION['UCID'])){
	header('location: http://afsaccess1.njit.edu/~dkb9/Software_Design_Project/');
}

//needs proper session checks!!!!
if(!isset($_SESSION['testId']) || !isset($_SESSION['test']) || !isset($_SESSION['currQuest'])){
	header('location: http://afsaccess1.njit.edu/~dkb9/Software_Design_Project/dashboard.php');
}

require_once 'views.php';

if($_SESSION['currQuest']>count($_SESSION['test'])-1){
	$done=true;
}
else
	$done=false;

// getting the question information from session and 
$quest= get_object_vars($_SESSION['test'][$_SESSION['currQuest']]);




?>
<html>
	<head>
		<title>Test Taker</title>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
		<script type="text/javascript" src="callHandler.js"></script>
		<?php
		if($quest['type_key']=='1'){
			?><script type="text/javascript" src="mcView.js"></script> <?php
		}
		elseif($quest['type_key']=='2'){
			?><script type="text/javascript" src="tfView.js"></script> <?php
		}
		elseif($quest['type_key']=='3'){
			?><script type="text/javascript" src="fbView.js"></script> <?php
		}
		elseif($done){
			?>
				<script type="text/javascript">
				function done(){
					ajaxCall("done.php",{},function(e){
						window.location.href="../dashboard.php";
						//console.log(e);
					});
					setTimeout(function(){
						window.location.href="../dashboard.php";
					},1000);
				}
				</script>
			<?php
		}
		?>
	</head>
	<body style="padding-top:50px">
	
		<?php require_once 'navBar.php'; ?>
		<div class="jumbotron">
	   		<div class="container">
				<?php
				if($done){
					?>
					<h1>Finished with Exam!!!</h1>
					<button class="btn btn-lg btn-primary" onclick="done();">
						Submit and Return to Dashboard
					</button>
					<?php
				}
				else{
					?> <h1>Question Number <?php echo $_SESSION['currQuest']+1; ?></h1> <?php
				}
				?>
				
			</div>
		</div>
	
		<div class="container">
			<?php
			if($quest['type_key']=='1')
				mcView($quest);
			elseif($quest['type_key']=='2')
				tfView($quest);
			elseif($quest['type_key']=='3')
				fbView($quest);
			?>
		</div>
	</body>
</html>
