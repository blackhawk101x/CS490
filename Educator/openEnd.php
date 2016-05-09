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


?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
		<script type="text/javascript" src="callHandler.js"></script>
		<script type="text/javascript" src="openEnd.js"></script>
		<script type="text/javascript" src="rmQuest.js"></script>
		<script type="text/javascript" src="search.js"></script>
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
					
					<div class="form-group">
						<label for="points">Total Number of Points</label>
						<input type="number" class="form-control" placeholder="Max points" id="points" name="points" required>
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
				<center>
					<h3>Select an existing Question</h3>
					<input id="search" type="text" class="form-control" placeholder="Search for Existing Question" onkeyup="searchPage()">
					<br>
				</center>
				<div  style="max-height:70%; overflow:scroll; overflow-x:hidden;">
					<?php
						$questList=curlCall("https://web.njit.edu/~rs334/cs490/beta/rimi/test/get_meta.php",array("user_id"=>1,"question_type"=>3, "count"=>0));
						foreach($questList as $key => $quest){
							$quest=get_object_vars($quest);
								?>
								<div class="panel panel-default" id="p<?php echo $quest['question_id']; ?>" name="questions">
									<div class="panel-body">
										<center>
											<h3>Question: <?php echo $quest['question']; ?></h3>
											<h4>Answer: <?php echo $quest['option1'];?></h4>
											<h5>Points: <?php echo $quest['points']; ?></h5>
											<?php 
												addtoExamBtn($quest['question_id'],$questDB);
											?>
											
											<button type="button" class="btn btn-default btn-lg" aria-label="Left Align" onclick="rmQuest(<?php echo $quest['question_id']?>)">
												<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
												Remove
											</button>
										</center>
									</div>
								</div>
							<?php
						}
					?>
				</div>
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