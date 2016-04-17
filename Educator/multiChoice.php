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
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
		<script type="text/javascript" src="callHandler.js"></script>
		<script type="text/javascript" src="multiChoice.js"></script>
	</head>
	<body style="padding-top: 70px;">
		<?php require_once 'navBar.php'; ?>
		<div class="container">
			<div class="rows">
				<div class="col-md-6">
					<form id="multiForm">
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
						<button type="submit" type="button" class="btn btn-primary btn-lg" aria-label="Left Align"  id="submitBtn">
							<span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>
							Save and Add
						</button>
						
						<button type="button" class="btn btn-default btn-lg" aria-label="Left Align" id="discardBtn">
							<span class="glyphicon glyphicon-floppy-remove" aria-hidden="true"></span>
							Discard and Return
						</button>
					</form>	
				</div>
				<div class="col-md-6">
				<?php 
				// getting the all the multichocie questions in the database
				$questList=curlCall("https://web.njit.edu/~rs334/cs490/beta/rimi/test/get_meta.php",array("user_id"=>1,"question_type"=>0, "count"=>0));
				foreach($questList as $key => $quest){
					?>
					<div class="panel panel-default"> 
						<div class="panel-body">
						<?php
						echo var_dump(get_object_vars($quest));
						?>
						</div>
					</div>
					<?php
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