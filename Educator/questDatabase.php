<?php
session_start();

//proper authentication
if($_SESSION['valid']!='teacher' || !isset($_SESSION['UCID'])){
	header('location: https://web.njit.edu/~dkb9/Software_Design_Project/');
}

require_once 'navBar.php';
require_once 'curlHandle.php';


// making the request for all the questions in the database
$questList=curlCall("https://web.njit.edu/~rs334/cs490/beta/rimi/test/get_meta.php",array("question_type"=>"4", "count"=>"0","user_id"=>$_SESSION['id']));

/*
If the user is editing a test, this will get all the multichoice question from the db that are already part of this test
*/
$questDB=array();
if(isset($_SESSION['testId'])){
	$currExam=curlCall("https://web.njit.edu/~rs334/cs490/beta/rimi/meta/exam/exam_info.php",array("user_id"=>$_SESSION['id'],"exam_id"=>$_SESSION['testId']));
	foreach($currExam as $key=>$quest){
		$quest=get_object_vars($quest);
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

/*
translates the the character into a reconizable string
*/
function mcTrans($ans){
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
function mcActive($ans,$option){
	if(mcTrans($ans)==$option)
		return "list-group-item-success";
	return "list-group-item-danger";
} // end of function optActive

/*
builds the mutli chocie panel
*/
function mcPanel($quest){
	
	?>
	<center>
		<h3>Question: <?php echo $quest['question']; ?></h3>
		<div class="rows">
			<div class="col-md-6">
				<div class="list-group">
					<a class="list-group-item <?php echo mcActive($quest['answer'],'option1'); ?>"><?php echo $quest['option1']; ?></a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="list-group">
					<a class="list-group-item <?php echo mcActive($quest['answer'],'option2'); ?>"><?php echo $quest['option2']; ?></a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="list-group">
					<a class="list-group-item <?php echo mcActive($quest['answer'],'option3'); ?>"><?php echo $quest['option3']; ?></a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="list-group">
					<a class="list-group-item <?php echo mcActive($quest['answer'],'option4'); ?>"><?php echo $quest['option4']; ?></a>
				</div>
			</div>
		</div>
	</center>
	<?php
	
}

/*
detrimines if the current option is the correct one.
If it is, it sets the look of the item to green, red otherwise
*/
function tfActive($ans,$opt){
	if(($ans=='T' && $opt) || ($ans=='F' && !$opt))
		return "list-group-item-success";
	else
		return "list-group-item-danger";
		
} // end of function 'tfActive'

/*
builds the panel for the true and false question
*/
function tfPanel($quest){
	?>
	<center>
		<h3>Question: <?php echo $quest['question'];?><h3>
		<div class="rows">
			<div class="col-md-6">
				<div class="list-group">
					<a class="list-group-item <?php echo tfActive($quest['answer'],true); ?>">True</a>
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="list-group">
					<a class="list-group-item <?php echo tfActive($quest['answer'],false); ?>">False</a>
				</div>
			</div>
					
		</div>
	</center>
	<?php
} // end of function 'tfPanel'


/*
Builds the fill-in-the-blank panel
*/
function fbpanel($quest){
	?>
	<center>
		<h3>Question: <?php echo $quest['question'];?><h3>
		<h3>Answer: <?php echo $quest['option1'];?></h3>
		
	</center>
	<?php
}





?>

<html>
	<head>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
		<script type="text/javascript" src="callHandler.js"></script>
		<script type="text/javascript" src="rmQuest.js"></script>
		<?php 
		if(isset($_SESSION['testId'])){
			?>
			<script type="text/javascript" src="addQuestTest.js"></script>
			<?php
		}
		?>
	</head>
	<body style="padding-top: 70px;">
		<?php navBar(); ?>
		<div class="container">
			<?php toolBar(); ?>
			<?php
				foreach($questList as $key=>$quest){
					$quest=get_object_vars($quest);
					?>
					<div class="panel panel-default">
						<div class="panel-body">
							<?php
							//echo var_dump($quest);
							if($quest['type_key']=='1'){
								mcPanel($quest);
							}
							elseif($quest['type_key']=='2'){
								tfPanel($quest);
							}
							elseif($quest['type_key']=='3'){
								fbpanel($quest);
							}
							?>
							<center>
								<button type="button" class="btn btn-primary btn-lg" aria-label="Left Align" disabled>
									<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
									Edit Question
								</button>
								<?php addtoExamBtn($quest['question_id'],$questDB); ?>
								
								<button type="button" class="btn btn-default btn-lg" aria-label="Left Align" onclick="rmQuest(<?php echo $quest['question_id']?>)">
									<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
									Remove from Database
								</button>
							</center>
						</div>
					</div>
					<?php
				}
				//echo var_dump($questList);
			?>
		</div>
	</body>
</html>