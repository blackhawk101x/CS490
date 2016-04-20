<?php
session_start();


if($_SESSION['valid']!='teacher' || !isset($_SESSION['UCID'])){
	header('location: https://web.njit.edu/~dkb9/Software_Design_Project/');
}

if(!isset($_SESSION['testId'])){
	header('location: https://web.njit.edu/~dkb9/Software_Design_Project/dashboard.php');
}


require_once 'curlHandle.php';
require_once 'navBar.php';

$questList=curlCall("https://web.njit.edu/~rs334/cs490/beta/rimi/meta/exam/exam_info.php",array("user_id"=>$_SESSION['id'],"exam_id"=>$_SESSION['testId']));


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
						
			
			<button type="button" class="btn btn-primary btn-lg" aria-label="Left Align" disabled>
				<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
				Edit Question
			</button>
			<button type="button" class="btn btn-default btn-lg" aria-label="Left Align" onclick="rmQuestTest(<?php echo $quest['test_q_id']; ?>)">
				<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
				Remove from Test
			</button>
			
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
					
			
			<button type="button" class="btn btn-primary btn-lg" aria-label="Left Align" disabled>
				<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
				Edit Question
			</button>
			<button type="button" class="btn btn-default btn-lg" aria-label="Left Align" onclick="rmQuestTest(<?php echo $quest['test_q_id']; ?>)">
				<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
				Remove from Test
			</button>
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
		<h3>Answer: <?php echo $quest['ans'];?></h3>
		<button type="button" class="btn btn-primary btn-lg" aria-label="Left Align" disabled>
			<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
			Edit Question
		</button>
		<button type="button" class="btn btn-default btn-lg" aria-label="Left Align" onclick="rmQuestTest(<?php echo $quest['test_q_id']; ?>)">
			<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
			Remove from Test
		</button>
	</center>
	<?php
}

?>

<html>
	<head>
		<title>Test Maker</title>
		<link rel="stylesheet" type="text/css" href="../bootstrap/css/bootstrap.min.css">
		<script type="text/javascript" src="callHandler.js"></script>
		<script type="text/javascript" src="rmQuest.js"></script>
	</head>
	<body style="padding-top: 25px;">
		<?php navBar(); ?>
		<div class="jumbotron">
	   		<div class="container">
        		<h1><?php echo $_SESSION['testName'];?></h1>
				
    		</div>
    	</div>
    	
		<div class="container">
			<div class="rows">
			<?php
				toolBar();
				//echo var_dump($questList);
				foreach($questList as $key=>$quest){
					$quest=get_object_vars($quest);
					?>
					<div class="panel panel-default">
						<div class="panel-body">
							<h4>Question Number: <?php echo $key;?></h4>
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