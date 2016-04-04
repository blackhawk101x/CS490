<?php
session_start();
require_once 'curlHandle.php';
if(($_SESSION['valid']!='teacher' || $_SESSION['valid']!='student') && !isset($_SESSION['UCID'])){
	header('location: http://afsaccess1.njit.edu/~dkb9/Software_Design_Project/');
}

if(isset($_SESSION['testId']) || isset($_SESSION['testName'])){
	unset($_SESSION['testId']);
	unset($_SESSION['testName']);
}

function teachDash(){
	
	//curl request for number of tests
	$testList=curlCall("http://afsaccess1.njit.edu/~dkb9/Software_Design_Project/simDashTeach.php",array('getTests'=>true,'role'=>$_SESSION['valid']));
	//echo var_dump($testList);
	
	foreach($testList as $key => $id){
		$test = curlCall("http://afsaccess1.njit.edu/~dkb9/Software_Design_Project/simDashTeach.php",array('testId'=>$id, 'role'=>$_SESSION['valid']));
		//echo var_dump($test);
		
		
		?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="panel-title"><?php echo $test['testName']; ?></h1>
			</div>
			<div class="panel-body">
				<h4><?php echo $test['desc']; ?></h4>
				<h4>Number of Questions: <?php echo $test['numQuest'];?></h4>
				<hr>
				<button type="button" class="btn btn-primary btn-lg" aria-label="Left Align"  onclick="editTest('<?php echo $id; ?>','<?php echo $test['testName'];?>')">
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
	
}

function studentDash(){
	$testList=curlCall("http://afsaccess1.njit.edu/~dkb9/Software_Design_Project/simDashStud.php",array('getTests'=>true,'role'=>$_SESSION['valid']));
	//echo var_dump($testList);
	foreach($testList as $key => $id){
		$test=curlCall("http://afsaccess1.njit.edu/~dkb9/Software_Design_Project/simDashStud.php",array('testId'=>$id,'role'=>$_SESSION['valid']));
		//echo var_dump($test);
		
		?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="panel-title"><?php echo $test['testName']; ?></h1>
			</div>
			<div class="panel-body">
				<h4><?php echo $test['desc']; ?></h4>
				<h4>Grade: <?php echo $test['grade'];?></h4>
				<hr>
				<?php 
				if(!$test['grade']){
					?>
					<button type="button" class="btn btn-primary btn-lg" aria-label="Left Align"  onclick="takeTest('<?php echo $id; ?>','<?php echo $test['testName'];?>')">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						Take Test
					</button>
					<?php
				}
				?>
				
			</div>
		</div>
		<?php
		
		//echo "<br>";
	}
	
}


?>


<html>
	<head>
		<title>Dashboard</title>
	</head>
	<body  style="padding-top: 50px;">
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
					console.log(testId);
					console.log(testName);
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
				<?php echo $_SESSION['UCID']; ?>!
				</h1>
        		<p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
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
			
			<?php 
				if($_SESSION['valid']=='teacher')
					teachDash(); 
				elseif($_SESSION['valid']=='student')
					studentDash();
					
			?>
		
			<hr>
			<footer>
				<p>© 2016, Buell Enterprises</p>
			</footer>

        </div><!--/.container-->
		
		<?php
		if($_SESSION['valid']=='teacher'){
			require_once 'modal.php';
			
			
			
			
		}
		?>
		
		

		
	</body>
	
</html>


