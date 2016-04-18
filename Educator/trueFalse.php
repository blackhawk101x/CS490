<?php
session_start();

//proper authentication
if($_SESSION['valid']!='teacher' || !isset($_SESSION['UCID'])){
	header('location: https://web.njit.edu/~dkb9/Software_Design_Project/');
}

require_once 'curlHandle.php';

function optActive($ans,$opt){
	if(($ans=='T' && $opt) || ($ans=='F' && !$opt))
		return "list-group-item-success";
	else
		return "list-group-item-danger";
		
}


?>

<html>
	<head>
		<title>True or False</title>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
		<script type="text/javascript" src="callHandler.js"></script>
		<script type="text/javascript" src="rmQuest.js"></script>
		<script type="text/javascript" src="trueFalse.js"></script>
	</head>
	<body style="padding-top: 70px;">
		<?php require_once 'navBar.php';?>
		<div class="container">
			<div class="rows">
				<div class="col-md-6">
					<form id="trueFalseForm">
					
						<center>
							<h3>Fill in all the fields completely to create a true or false question</h3>
						</center>
					
						<div class="form-group">
							<label for="Question">Question</label>
							<textarea class="form-control" rows="5" id="question" name="textArea" required></textarea>
						</div>
						<br>
						
						<center>
							<div class="form-group">
								<div class="radio">
									<label>
										<input type="radio" name="optionsRadios" id="true" required>True
								  </label>
								</div>
								<div class="radio">
									<label>
										<input type="radio" name="optionsRadios" id="false" required>False
									</label>
								</div>
							</div>
							<div class="form-group">
								<label for="points">Total Number of Points</label>
								<input type="number" class="form-control" placeholder="Total Points" id="points" name="points" required>
							</div>
							
						</center>
						<hr>
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
					</center>
					<div style="max-height:80%; overflow:scroll; overflow-x:hidden;">
						<?php
						
						$questList=curlCall("https://web.njit.edu/~rs334/cs490/beta/rimi/test/get_meta.php",array("user_id"=>1,"question_type"=>1, "count"=>0));
						//echo var_dump($questList);
						foreach($questList as $key => $quest){
							$quest= get_object_vars($quest);
							?>
							<div class="panel panel-default">
								<div class="panel-body">
									<center>
										<h4>Question: <?php echo $quest['question']; ?></h4>
										<div class="list-group">
												<a class="list-group-item <?php echo optActive($quest['answer'],true); ?>">True</a>
												<a class="list-group-item <?php echo optActive($quest['answer'],false); ?>">False</a>
										</div>
										<h5>Points: <?php echo $quest['points']; ?></h5>
										
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