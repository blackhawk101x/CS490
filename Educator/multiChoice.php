<?php
session_start();

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
		
			<form id="multiForm">
			
				<div class="form-group">
					<label for="Question">Question</label>
					<textarea class="form-control" rows="5" id="question" required name="textArea"></textarea>
				</div>
				
				<div class="form-group">
					<label for="optionA">Option A</label>
					<div class="input-group">
						<span class="input-group-addon">
							<input type="radio" name="optradio" required>
						</span>
						<input type="text" class="form-control" placeholder="Option A" id="option1" name="textField" required>
					</div><!-- /input-group -->
				</div>
				<br>
				<div class="form-group">
					<label for="optionB">Option B</label>
					<div class="input-group">
						<span class="input-group-addon">
							<input type="radio" name="optradio" required>
						</span>
						<input type="text" class="form-control" placeholder="Option B" id="option2" name="textField" required>
					</div><!-- /input-group -->
				</div>				
				<br>
				<div class="form-group">
					<label for="optionC">Option C</label>
					<div class="input-group">
						<span class="input-group-addon">
							<input type="radio" name="optradio" required>
						</span>
						<input type="text" class="form-control" placeholder="Option C" id="option3" name="textField" required>
					</div><!-- /input-group -->
				</div>
				<br>
				<div class="form-group">
					<label for="optionB">Option D</label>
					<div class="input-group">
						<span class="input-group-addon">
							<input type="radio" name="optradio" required>
						</span>
						<input type="text" class="form-control" placeholder="Option D" id="option4" name="textField" required>
					</div><!-- /input-group -->
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
	</body>
</html>