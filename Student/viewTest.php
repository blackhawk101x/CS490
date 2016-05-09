<?php
session_start();
require_once 'curlHandle.php';
require_once 'navBar.php';

if($_SESSION['valid']!='student' || !isset($_SESSION['UCID'])){
	header('location: http://web.njit.edu/~dkb9/Software_Design_Project/');
}

if(!isset($_SESSION['testId'])){
	header('location: http://web.njit.edu/~dkb9/Software_Design_Project/dashboard.php');
}

$examList=curlCall("https://web.njit.edu/~rs334/cs490/beta/rimi/meta/exam/exam_meta_info.php",array("user_id"=>$_SESSION['id']));
$exam=array();
foreach($examList as $key=>$tmp){
	$tmp=get_object_vars($tmp);
	if($_SESSION['testId']==$tmp['testId']){
		if($tmp['release_status']=='1')
			header('location: http://web.njit.edu/~dkb9/Software_Design_Project/dashboard.php');
		else
			$exam=$tmp;
	}
	
}

$examList=curlCall("https://web.njit.edu/~rs334/cs490/beta/rimi/student/exam/list_exam.php",array("user_id"=>$_SESSION['id']));
$studData=array();
foreach($examList as $key=>$tmp){
	$tmp=get_object_vars($tmp);
	if($_SESSION['testId']==$tmp['test_id']){
		$studData=$tmp;
	}
	
}


$questList=curlCall("https://web.njit.edu/~rs334/cs490/beta/rimi/meta/exam/exam_info.php",array("user_id"=>$_SESSION['id'],"exam_id"=>$_SESSION['testId']));

$studList=curlCall("https://web.njit.edu/~rs334/cs490/beta/rimi/student/answers/get_results.php",array("exam_id"=>$_SESSION['testId']));

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

*/
function ansPanel($stud,$quest){
	?><center><?php
	if($stud['grade_student']!='0'){
		?>
			<div class="alert alert-success" role="alert">
				<span class="glyphicon glyphicon-thumbs-up" aria-hidden="true"></span>
				Good Job, You answered this question correctly. You recieved full credit for the question.
				You received <?php echo $stud['grade_student']; ?> points out of <?php echo $quest['points'];?> points.
			</div>
		<?php
	}
	else{
		?>
		<div class="alert alert-danger" role="alert">	
			<span class="sr-only">Error:</span>
			<div id="messageContent">
				<span class="glyphicon glyphicon-remove-sign" aria-hidden="true"></span>
				You did not answer this question correctly.
				You received <?php echo $stud['grade_student']; ?> points out of <?php echo $quest['points'];?>points.
			</div>
		</div>
		<?php
	}
	?></center><?php
}




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
					<a class="list-group-item <?php echo mcActive($quest['ans'],'option1'); ?>"><?php echo $quest['option1']; ?></a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="list-group">
					<a class="list-group-item <?php echo mcActive($quest['ans'],'option2'); ?>"><?php echo $quest['option2']; ?></a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="list-group">
					<a class="list-group-item <?php echo mcActive($quest['ans'],'option3'); ?>"><?php echo $quest['option3']; ?></a>
				</div>
			</div>
			<div class="col-md-6">
				<div class="list-group">
					<a class="list-group-item <?php echo mcActive($quest['ans'],'option4'); ?>"><?php echo $quest['option4']; ?></a>
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
					<a class="list-group-item <?php echo tfActive($quest['ans'],true); ?>">True</a>
				</div>
			</div>
			
			<div class="col-md-6">
				<div class="list-group">
					<a class="list-group-item <?php echo tfActive($quest['ans'],false); ?>">False</a>
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
		<title>Review Exam</title>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
		<script type="text/javascript" src="callHandler.js"></script>
	</head>
	<body style="padding-top:50px">
		<?php 
			navReview(); 
		?>
		<div class="jumbotron">
	   		<div class="container">
				<h1><?php echo $exam['testName']; ?></h1>
				<h3>You recieved a <?php echo $studData['pointsScored']; ?> out of <?php echo $exam['testScore']; ?></h3>
			</div>
		</div>
		<div class="container">
			<?php
				foreach($questList as $key=>$quest){
					$quest=get_object_vars($quest);
					$stud= array();
					foreach($studList as $a=>$b){
						$b=get_object_vars($b);
						if($b['test_q_id']==$quest['test_q_id']){
							$stud=$b;
							break;
						}
					}
					?>
					<div class="panel panel-default">
						<div class="panel-body">
							<h4>Question Number <?php echo $key+1;?></h4>
							<?php
							
							ansPanel($stud,$quest);
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
						</div>
					</div>
					<?php
				}
			?>
			
			
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