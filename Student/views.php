<?php
session_start();

/*
Input needts to be the array of question info
*/
function mcView($quest){
	?>
	<form id="mcView">
		<div class="panel panel-default">
			<div class="panel-body">
				<h3>Multiple Choice</h3>
				<center>
					<div class="alert alert-danger" style="display:none" id="errorMsg">
						<strong>Error: </strong> Please select one option.
					</div>
					<h2><?php echo $quest['question']; ?></h2>
					<hr>
					<div class="row">
						<div class="col-md-3">
							<button type="button" class="btn btn-primary btn-lg btn-block" aria-label="Left Align"  id="option1">
								<?php echo $quest['option1']; ?>
							</button>
						</div>
						<div class="col-md-3">
							<button type="button" class="btn btn-danger btn-lg btn-block" aria-label="Left Align"  id="option2">
								<?php echo $quest['option2']; ?>
							</button>
						</div>
						<div class="col-md-3">
							<button type="button" class="btn btn-success btn-lg btn-block" aria-label="Left Align"  id="option3">
								<?php echo $quest['option3']; ?>
							</button>
						</div>
						<div class="col-md-3">
							<button type="button" class="btn btn-warning btn-lg btn-block" aria-label="Left Align"  id="option4">
								<?php echo $quest['option4']; ?>
							</button>
						</div>
						
					</div>
				</center>
			</div>
		</div>
		<center>
			<button type="submit" type="button" class="btn btn-primary btn-lg" aria-label="Left Align"  id="submitBtn">
				<span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>
				Next Question
			</button>
		<center>
	<form>
	<?php
}

function tfView($quest){
	?>
	<form id="tfView">
		<div class="panel panel-default">
			<div class="panel-body">
				<h3>True or False</h3>
				
				<center>
					<div class="alert alert-danger" style="display:none" id="errorMsg">
						<strong>Error: </strong> Please select True or False
					</div>
					<h2><?php echo $quest['question']; ?></h2>
					<hr>
					<div class="row">
						<div class="col-md-3">
						</div>
						<div class="col-md-3">
							<button type="button" class="btn btn-success btn-lg btn-block" aria-label="Left Align"  id="true" name="tf">
								True
							</button>
						</div>
						<div class="col-md-3">
							<button type="button" class="btn btn-danger btn-lg btn-block" aria-label="Left Align"  id="false" name="tf">
								False
							</button>
						</div>
						<div class="col-md-3">
						</div>
						
					</div>
					<div class="form-group">
						
						
					</div>
				</center>
			</div>
		</div>
		<center>
			<button type="submit" type="button" class="btn btn-primary btn-lg" aria-label="Left Align"  id="submitBtn">
				<span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>
				Next Question
			</button>
		<center>
	<form>
	<?php
	
}

function fbView($quest){
		?>
	<form id="fbView">
		<div class="panel panel-default">
			<div class="panel-body">
				<h3>Fill in the Blank</h3>
				<center>
					<h2><?php echo $quest['question']; ?></h2>
					<hr>
					<div class="row">
						<div class="col-md-4">
						</div>
						<div class="col-md-4">
							<div class="form-group">
								<input id="answer" type="text" class="form-control" placeholder="Answer" required>
							</div>
						</div>
						<div class="col-md-4">
						</div>
						
					</div>
				</center>
			</div>
		</div>
		<center>
			<button type="submit" type="button" class="btn btn-primary btn-lg" aria-label="Left Align"  id="submitBtn">
				<span class="glyphicon glyphicon-floppy-saved" aria-hidden="true"></span>
				Next Question
			</button>
		<center>
	<form>
	<?php
}
?>
