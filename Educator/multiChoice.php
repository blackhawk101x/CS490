<?php
session_start();

//proper authentication
if($_SESSION['valid']!='teacher' || !isset($_SESSION['UCID'])){
	header('location: https://web.njit.edu/~dkb9/Software_Design_Project/');
}

require_once 'curlHandle.php';

/*
translates the the character into a reconizable string
*/
function optTrans($ans){
	switch($ans){
		case 'A':
			return 'option1';
		case 'B':
			return 'option2';
		case 'C':
			return 'option3';
		case 'D':
			return 'option4';
	}
} // end of function optTrans

/*
determines if the ais the current option
*/
function optActive($ans,$option){
	if(optTrans($ans)==$option)
		return "list-group-item-success";
	return "list-group-item-danger";
} // end of function optActive

?>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
		<script type="text/javascript" src="callHandler.js"></script>
		<script type="text/javascript" src="multiChoice.js"></script>
		<script type="text/javascript" src="rmQuest.js"></script>
	</head>
	<body style="padding-top: 70px;">
		<?php require_once 'navBar.php'; ?>
		<div class="container">
			<div class="rows">
				<div class="col-md-6">
					<form id="multiForm">
						<center>
							<h3>Fill in all the fields completely to create a mutliple choice question</h3>
						</center>
						<div class="form-group">
							<label for="Question">Question</label>
							<textarea class="form-control" rows="5" id="question" required name="textArea"></textarea>
						</div>
						
						<div class="form-group">
							<label for="option1">Option A</label>
							<div class="input-group">
								<span class="input-group-addon">
									<input type="radio" name="optradio" required>
								</span>
								<input type="text" class="form-control" placeholder="Option A" id="option1" name="textField" required>
							</div><!-- /input-group -->
						</div>
						<br>
						<div class="form-group">
							<label for="option2">Option B</label>
							<div class="input-group">
								<span class="input-group-addon">
									<input type="radio" name="optradio" required>
								</span>
								<input type="text" class="form-control" placeholder="Option B" id="option2" name="textField" required>
							</div><!-- /input-group -->
						</div>				
						<br>
						<div class="form-group">
							<label for="option3">Option C</label>
							<div class="input-group">
								<span class="input-group-addon">
									<input type="radio" name="optradio" required>
								</span>
								<input type="text" class="form-control" placeholder="Option C" id="option3" name="textField" required>
							</div><!-- /input-group -->
						</div>
						<br>
						<div class="form-group">
							<label for="option4">Option D</label>
							<div class="input-group">
								<span class="input-group-addon">
									<input type="radio" name="optradio" required>
								</span>
								<input type="text" class="form-control" placeholder="Option D" id="option4" name="textField" required>
							</div><!-- /input-group -->
						</div>
						
						<div class="form-group">
							<label for="points">Total Number of Points</label>
							<input type="number" class="form-control" placeholder="Max points" id="points" name="points" required>
						</div>
						<br>
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
						<h3>Select an existing Test</h3>
					</center>
					<div style="max-height:80%; overflow:scroll; overflow-x:hidden;">
					
						<?php 
						// getting the all the multichocie questions in the database
						$questList=curlCall("https://web.njit.edu/~rs334/cs490/beta/rimi/test/get_meta.php",array("user_id"=>1,"question_type"=>0, "count"=>0));
						foreach($questList as $key => $quest){
							$quest=get_object_vars($quest);
							?>
							<div class="panel panel-default">
								
								<div class="panel-body">
									<center>
										<h4>Question: <?php echo $quest['question']; ?></h4>
										<div class="list-group">
												<a class="list-group-item <?php echo optActive($quest['answer'],'option1'); ?>"><?php echo $quest['option1']; ?></a>
												<a class="list-group-item <?php echo optActive($quest['answer'],'option2'); ?>"><?php echo $quest['option2']; ?></a>
												<a class="list-group-item <?php echo optActive($quest['answer'],'option3'); ?>"><?php echo $quest['option3']; ?></a>
												<a class="list-group-item <?php echo optActive($quest['answer'],'option4'); ?>"><?php echo $quest['option4']; ?></a>
										</div>
										
										<button type="button" class="btn btn-primary btn-lg" aria-label="Left Align" disabled>
											<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
											Edit
										</button>
										
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
		
			
		</div>
		
		
		
	</body>
</html>