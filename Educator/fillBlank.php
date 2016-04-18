<?php
session_start();

//proper authentication
if($_SESSION['valid']!='teacher' || !isset($_SESSION['UCID'])){
	header('location: https://web.njit.edu/~dkb9/Software_Design_Project/');
}

require_once 'curlHandle.php';

?>
<html>
	<head>
		<title>Test Maker</title>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
		<script type="text/javascript" src="callHandler.js"></script>
		<script type="text/javascript" src="fillBlank.js"></script>
		<script type="text/javascript" src="rmQuest.js"></script>
	</head>
	<body style="padding-top: 70px;">
		<?php require_once 'navBar.php';?>
		<div class="container">
			<div class="rows">
				<div class="col-md-6">
					<form id="fillForm">
						<center>
							<h3>Please fill out all the fields to create a fill-in-the-blank question</h3>
							<h4>Special Instructions: Use the underscore _ to indictate where the student is filling in.</h4>
							<div class="form-group">
								<label for="Question">Question</label>
								<textarea class="form-control" rows="5" id="question" required></textarea>
							</div>
							<br>
							<div class="form-group">
								<label for="optionA">Answer</label>
								<input id="answer" type="text" class="form-control" placeholder="Answer" required>
							</div>
							
							<div class="form-group">
								<label for="points">Total Number of Points</label>
								<input type="number" class="form-control" placeholder="Total Points" id="points" name="points" required>
							</div>
							
							<br>
						
							<button type="submit" type="button" class="btn btn-primary btn-lg" aria-label="Left Align"  id="submitBtn">
								<span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>
								Save and Add
							</button>
							
							<button type="button" class="btn btn-default btn-lg" aria-label="Left Align" id="discardBtn" href="testMaker.php">
								<span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span>
								Discard and Return
							</button>
						</center>
					</form>
				</div>
				<div class="col-md-6">
				<?php
					$questList=curlCall("https://web.njit.edu/~rs334/cs490/beta/rimi/test/get_meta.php",array("user_id"=>1,"question_type"=>2, "count"=>0));
					echo var_dump($questList);
					foreach($questList as $key => $quest){
						echo var_dump(get_object_vars($quest));
						echo "<hr>";
					}
				?>
				</div>
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