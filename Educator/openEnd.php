<?php
session_start();

//proper authentication
if($_SESSION['valid']!='teacher' || !isset($_SESSION['UCID'])){
	header('location: https://web.njit.edu/~dkb9/Software_Design_Project/');
}

require_once 'navBar.php';
require_once 'curlHandle.php';

/*
If the user is editing a test, this will get all the multichoice question from the db that are already part of this test
*/
$questDB=array();
if(isset($_SESSION['testId'])){
	$currExam=curlCall("https://web.njit.edu/~rs334/cs490/beta/rimi/meta/exam/exam_info.php",array("user_id"=>$_SESSION['id'],"exam_id"=>$_SESSION['testId']));
	foreach($currExam as $key=>$quest){
		$quest=get_object_vars($quest);
		if($quest['type_key']=='4')
			$questDB[$key]=$quest['quest_id'];
	}
}

/* 
Creates the add to test button according to whether it is already in the exam or the user is even edditing the exam
*/
function addToExamBtn($questId,$questDB){
	if(isset($_SESSION['testId'])){
		?> <button type="button" class="btn btn-primary btn-lg" aria-label="Left Align" <?php 
		if(in_array($questId,$questDB)){
			?> disabled>
			Already in Test
			<?php
		}
		else{
			?> onclick="addQuestTest(<?php echo $questId; ?>)"> 
			<span class="glyphicon glyphicon-log-in" aria-hidden="true"></span>
				Add to Test
			
			<?php
		}
		?> </button><?php
	}
	// do nothing for now
} // end of function addtoExamBtn

?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
		<script type="text/javascript" src="callHandler.js"></script>
		<script type="text/javascript" src="openEnd.js"></script>
		<script type="text/javascript" src="rmQuest.js"></script>
		<?php 
		if(isset($_SESSION['testId'])){
			?>
			<script type="text/javascript" src="addQuestTest.js"></script>
			<?php
		}
		?>
	<head>
	<body style="padding-top: 70px;">
		<?php navBar(); ?>
		<div class="container">
			<?php toolBar(); ?>
			<div class="col-md-6">
				<form id="opForm">
					<center>
						<h3>Fill in all the fields completely to create a mutliple choice question</h3>
					</center>
					<div class="form-group">
						<label for="Question">Question</label>
						<textarea class="form-control" rows="5" id="question" required name="textArea"></textarea>
					</div>
					<div class="form-group">
						<label for="Question">Answer in the form of a function</label>
						<textarea class="form-control" rows="5" id="ans" required name="textArea"></textarea>
					</div>
					
					<center>
						<button type="submit" type="button" class="btn btn-primary btn-lg" aria-label="Left Align"  id="submitBtn">
							<span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>
							Save and Add
						</button>
						
						<button type="button" class="btn btn-default btn-lg" aria-label="Left Align" id="discardBtn">
							<span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span>
							Discard and Return
						</button>
					</center>
				</form>
			</div>
			<div class="col-md-6">
				
			</div>
			<div class="col-md-12">
				<hr>
				<footer>
					<p>© 2016, Buell Enterprises</p>
				</footer>
			</div>
		</div>
	</body>
</html>