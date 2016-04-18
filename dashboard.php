<?php
session_start();
require_once 'curlHandle.php';
require_once 'navBar.php';

if(($_SESSION['valid']!='teacher' || $_SESSION['valid']!='student') && !isset($_SESSION['UCID'])){
	header('location: https://web.njit.edu/~dkb9/Software_Design_Project/');
}

if(isset($_SESSION['testId']) || isset($_SESSION['testName'])){
	unset($_SESSION['testId']);
	unset($_SESSION['testName']);
}

//***************************************************************************************************************************************
/*
 populates the teacher's dashboard with the tests
*/
function teachDash(){
	//obtaining all the test meta for this teacher
	$testList=get_object_vars(curlCall("https://web.njit.edu/~dkb9/Software_Design_Project/simDashTeach.php",array('role'=>$_SESSION['valid'],'id'=>$_SESSION['id'])));
	//echo var_dump($testList);
	
	foreach($testList as $key => $test){
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

//**************************************************************************************************************************************
/*
populates the student dashboard
*/
function studDash(){
	// obtaining the data for the front
	$testList=get_object_vars(curlCall("https://web.njit.edu/~dkb9/Software_Design_Project/simDashStud.php",array('role'=>$_SESSION['valid'],'id'=>$_SESSION['id'])));
	//echo var_dump($testList);
	foreach($testList as $key => $test){
		echo var_dump($test);
		echo "<hr>";
	}// end of for each loop
	
} // end of studDash
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
		
		<?php navBar(); // creating the navbar on top ?> 
		
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
					<?php
					toolBarRight();
					
				}
				elseif($_SESSION['valid']=='student')
					?> 
					<div class="col-md-12"> 
					<?php studDash(); ?> 
					</div>
					
				
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


