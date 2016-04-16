<?php
session_start();
require_once 'curlHandle.php';

if($_SESSION['valid']!='student' || !isset($_SESSION['UCID'])){
	header('location: http://afsaccess1.njit.edu/~dkb9/Software_Design_Project/');
}

if(!isset($_SESSION['testId']) || !isset($_SESSION['testName'])){
	header('location: http://afsaccess1.njit.edu/~dkb9/Software_Design_Project/dashboard.php');
}

//needs proper session checks!!!!

function mc($data,$questNum){
	?>
	<h3>Question Number <?php echo $questNum; ?></h3>
	<br>
	<h4><?php echo $data['quest']; ?></h4>
	<div data-toggle="buttons-radio" required>
		<button type="button" class="btn btn-primary myButton" required><?php echo $data['opt1'];?></button>
		<button type="button" class="btn btn-primary myButton" required><?php echo $data['opt2'];?></button>
		<button type="button" class="btn btn-primary myButton" required><?php echo $data['opt3'];?></button>
		<button type="button" class="btn btn-primary myButton" required><?php echo $data['opt4'];?></button>
	</div>
	<?php
	
}

function tf($data,$questNum){
	?>
	<h3>Question Number <?php echo $questNum?></h3>
	<br>
	<h4><?php echo $data['quest'];?></h4>
	
	<div data-toggle="buttons-radio">
		<button type="button" class="btn btn-primary myButton" required>True</button>
		<button type="button" class="btn btn-primary myButton" required>False</button>
	</div>
	<?php
}

?>
<html>
	<head>
		<title>Test Taker</title>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
		<script type="text/javascript" src="callHandler.js"></script>
	</head>
	<body style="padding-top:70px">
	
		<?php require_once 'navBar.php'; ?>
	
		<div class="container">
			<form id="testArea">
			<?php
			//echo var_dump($_SESSION);
			$questList=curlCall('http://afsaccess1.njit.edu/~dkb9/Software_Design_Project/Student/simTest.php',array('testId'=>$_SESSION['testId'],'questNums'=>true));
			//echo var_dump($questList);
			foreach($questList as $key => $id){
				$quest=curlCall('http://afsaccess1.njit.edu/~dkb9/Software_Design_Project/Student/simTest.php',array('questId'=>$id,'testId'=>$_SESSION['testId']));
				//echo var_dump($quest);
				if($quest['questType']=='mc'){
					mc($quest,$key);
				}elseif($quest['questType']=='tf'){
					tf($quest,$key);
				}elseif($quest['questType']=='fb'){
					
				}elseif($quest['questType']=='oe'){
					
				}
				echo "<hr>";
			}
			?>
			
			
			<button type="submit" type="button" class="btn btn-primary btn-lg" aria-label="Left Align">
				<span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>
				Save and Submit
			</button>
			
			</form>
			<script type="text/javascript" src="testTaker.js"></script>
		</div>
	</body>
</html>
