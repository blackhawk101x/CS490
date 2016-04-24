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
				<center>
					<h3>mc</h3>
					<?php echo var_dump($quest); ?>
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
			
				<div class="alert alert-danger" style="display:none" id="errorMsg">
					<strong>Error: </strong> Please select one option.
				</div>
				
				<h3>True or False</h3>
				<center>
					<h2><?php echo $quest['question']; ?></h2>
					<div class="form-group">
						<button type="button" class="btn btn-primary btn-lg" aria-label="Left Align"  id="true" name="tf" formnovalidate>
							True
						</button>
						<button type="button" class="btn btn-default btn-lg" aria-label="Left Align"  id="false" name="tf" formnovalidate>
							False
						</button>
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
				<center>
					<h3>fb</h3>
					<?php echo var_dump($quest); ?>
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
