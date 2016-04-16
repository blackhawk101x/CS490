<?php
session_start();
require_once 'curlHandle.php';


if(($_SESSION['valid']!='teacher' || $_SESSION['valid']!='student') && !isset($_SESSION['UCID'])){
	header('location: https://web.njit.edu/~dkb9/Software_Design_Project/');
}

if(isset($_SESSION['testId']) || isset($_SESSION['testName'])){
	unset($_SESSION['testId']);
	unset($_SESSION['testName']);
}

function btnNav(){
	
}



/*
 populates the teacher's dashboard with the tests
*/
function teachDash(){
	//curl request for number of tests
	$testList=get_object_vars(curlCall("https://web.njit.edu/~dkb9/Software_Design_Project/simDashTeach.php",array('role'=>$_SESSION['valid'])));
	//echo var_dump($testList);
	
	foreach($testList as $key => $test){
		//$test = curlCall("http://afsaccess1.njit.edu/~dkb9/Software_Design_Project/simDashTeach.php",array('testId'=>$id, 'role'=>$_SESSION['valid']));
		$test=get_object_vars($test);
		
		?>
		
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="panel-title"><?php echo $test['testName']; ?></h1>
			</div>
			<div class="panel-body">
				<h4>Test Description: <?php echo $test['dsc']; ?></h4>
				<h4>Number of Questions: <?php echo $test['questNums'];?></h4>
				<hr>
				<button type="button" class="btn btn-primary btn-lg" aria-label="Left Align"  onclick="editTest('<?php echo $key; ?>','<?php echo $test['testName'];?>')">
					<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
					Edit
				</button>
				
				<button type="button" class="btn btn-default btn-lg" aria-label="Left Align"  >
					<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
					Release/Hide Grades
				</button>
			</div>
		</div>
		
		<?php
	}
	
} // end of function 'teachdash'
//**************************************************************************************************************************************


?>


<html>
	<head>
		<title>Dashboard</title>
	</head>
	<body  style="padding-top: 25px;">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<script type="text/javascript" src="callHandler.js"></script>
		<?php 
			if($_SESSION['valid']=='teacher'){
				?>
				<script type="text/javascript">
				function editTest(testId,testName){
					ajaxCall('editTest.php',{'testId':testId,'testName':testName},function(ret){
						window.location.href="Educator/testMaker.php";
					});
					
				};
				</script>
				<?php
			}
			elseif($_SESSION['valid']=='student'){
				?>
				<script>
				function takeTest(testId,testName){
					//console.log(testId);
					//console.log(testName);
					ajaxCall('takeTest.php',{'testId':testId,'testName':testName},function(data){
						//console.log(data);
						if(data.valid){
							window.location.href="Student/testTaker.php";
						}
					});
				}
				</script>
				<?php
			}
		?>
		
		
		<!-- navbar -->
		<?php require_once 'navBar.php';?> 
		
		<!-- Creating the Jumbotron -->
		<div class="jumbotron">
	   		<div class="container">
        		<h1>Hello, 
				<?php 
				if($_SESSION['valid']=='teacher')
					echo "Professor ";
				else
					echo "Scholar ";
				echo $_SESSION['UCID']; ?>!
				</h1>
        		<p>CS 490 Project. A simple test taking programs</p>
        		<?php
        		if($_SESSION['valid']=='teacher'){
        		?>
        		<p>
        			<a id="makeTestBtn" class="btn btn-primary btn-lg" role="button">Make A Test >></a>
        		</p>
        		<?php 
        		}
        		?>
        		
    		</div>
    	</div>
	   
	   
	   
		<div class="container">
			<div class="rows">
				<?php 
				if($_SESSION['valid']=='teacher'){
					?><div class="col-md-10"><?php
					teachDash();
					?>
					</div>
					<div class="col-md-2">
						<div class="sidebar-nav-fixed pull-right affix" style="width:22%">
							<div class="well">
								<ul class="nav">
									<li class="nav-header"><h3>Teacher's Tools</h3></li>
									<li><a id="toolTestMake" class="btn btn-primary btn-lg" role="button">Make a Test</a></li>
									<li><a role="button" class="btn btn-lg btn-success" href="https://web.njit.edu/~dkb9/Software_Design_Project/Educator/multiChoice.php">Make a Multichoice Question</a></li>
									<li><a role="button" class="btn btn-lg btn-info" href="https://web.njit.edu/~dkb9/Software_Design_Project/Educator/trueFalse.php">Make a True and False Question</a></li>
									<li><a role="button" class="btn btn-lg btn-warning" href="https://web.njit.edu/~dkb9/Software_Design_Project/Educator/fillBlank.php">Make a Fill in the Blank Question</a></li>
									<li><a role="button" class="btn btn-lg btn-danger" href="https://web.njit.edu/~dkb9/Software_Design_Project/Educator/">Make a Open Ended Question</a></li>
									<li><a role="button" class="btn btn-lg btn-default" href="https://web.njit.edu/~dkb9/Software_Design_Project/Educator/questDatabase.php">See DataBase of Questions</a></li>
								</ul>
							</div>
						</div>
					</div>
					
					
					
					<?php
				}
				elseif($_SESSION['valid']=='student')
					?> <div class="col-md-12"> <?php
					//studentDash();
					?> </div><?php
					
				?>
				
				<div class="col-md-12">
					<hr>
					<footer>
						<p>© 2016, Buell Enterprises</p>
					</footer>
				</div>
			</div>
			
		
			
			

        </div><!--/.container-->
		
		<?php
		if($_SESSION['valid']=='teacher'){
			require_once 'modal.php';	
			
		}
		?>
		
		

		
	</body>
	
</html>


