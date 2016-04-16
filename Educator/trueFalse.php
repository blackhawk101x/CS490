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
		<title>True or False</title>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
		<script type="text/javascript" src="callHandler.js"></script>
	</head>
	<body style="padding-top: 70px;">
		<?php require_once 'navBar.php';?>
		<div class="container">
			<div class="rows">
				<div class="col-md-6">
					<form id="trueFalseForm">
						<div class="alert alert-danger" role="alert" style="display:none" id="errorMsg">	
							<span class="sr-only">Error:</span>
							<div id="messageContent">
								<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
								Question Exists in Database
							</div>
						</div>
					
						<div class="form-group">
							<label for="Question">Question</label>
							<textarea class="form-control" rows="5" id="question" required name="textArea"></textarea>
						</div>
						<hr>
						
						
						<div data-toggle="buttons-radio">
							<button type="button" class="btn btn-primary myButton" name="tfBtn">True</button>
							<button type="button" class="btn btn-primary myButton" name="tfBtn">False</button>
						</div>
						
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
					
					$questList=curlCall("https://web.njit.edu/~rs334/cs490/beta/rimi/test/get_meta.php",array("user_id"=>1,"question_type"=>1, "count"=>0));
					//echo var_dump($questList);
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
		<script type="text/javascript" src="trueFalse.js"></script>
	</body>
</html>