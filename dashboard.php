<?php
session_start();
require_once 'curlHandle.php';
require_once 'navBar.php';

if(($_SESSION['valid']!='teacher' || $_SESSION['valid']!='student') && !isset($_SESSION['UCID'])){
	header('location: https://web.njit.edu/~dkb9/Software_Design_Project/');
}


// unsetting session data if needed
if(isset($_SESSION['testId']))
	unset($_SESSION['testId']);

if(isset($_SESSION['testName']))
	unset($_SESSION['testName']);

if(isset($_SESSION['test']))
	unset($_SESSION['test']);

if(isset($_SESSION['currQuest']))
	unset($_SESSION['currQuest']);

if(isset($_SESSION['ans'])){
	unset($_SESSION['ans']);
}

//***************************************************************************************************************************************
/*
 populates the teacher's dashboard with the tests
*/
function teachDash(){
	//obtaining all the test meta for this teacher
	$testList=curlCall("https://web.njit.edu/~rs334/cs490/beta/rimi/meta/exam/exam_meta_info.php",array("user_id"=>$_SESSION['id']));
	//"user_id"=>$_SESSION['id']
	//echo var_dump($testList);
	foreach($testList as $key => $test){
		$test=get_object_vars($test);
		//echo var_dump($test);
		
		?>
		
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="panel-title"><?php echo $test['testName']; ?></h1>
			</div>
			<div class="panel-body">
				<h4>Test Description: <?php echo $test['dsc']; ?></h4>
				<h4>Number of Questions: <?php echo $test['questNums'];?></h4>
				<hr>
				<center>
					<button type="button" class="btn btn-primary btn-lg" aria-label="Left Align"  onclick="editTest('<?php echo $test['testId']; ?>','<?php echo $test['testName'];?>')">
						<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
						Edit Exam
					</button>
					
					<button type="button" class="btn btn-default btn-lg" aria-label="Left Align" onclick="rmExam(<?php echo $test['testId']; ?>)">
						<span class="glyphicon glyphicon-trash" aria-hidden="true"></span>
						Delete Exam
					</button>
					
					<?php
						//echo var_dump($test);
						if($test['score_status']=='0'){
							?> 
								<button type="button" class="btn btn-default btn-lg" aria-label="Left Align" onclick="toggleRelease('<?php echo $test['testId'];?>',<?php echo '1'; ?>);">
									<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
									Release Grades
								</button>
							<?php
						}
						else{
							?>
								<button type="button" class="btn btn-default btn-lg" aria-label="Left Align" onclick="toggleRelease('<?php echo $test['testId'];?>',<?php echo '0'; ?>);">
									<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
									Hide Grades
								</button>
							<?php
						}
					?>
				</center>
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
	$examList=curlCall("https://web.njit.edu/~rs334/cs490/beta/rimi/student/exam/list_exam.php",array("user_id"=>$_SESSION['id']));
	foreach($examList as $key=>$exam){
		$exam=get_object_vars($exam);
		//echo var_dump($exam);
		?>
		<div class="panel panel-default">
			<div class="panel-heading">
				<h1 class="panel-title"><?php echo $exam['test_name']; ?></h1>
			</div>
			<div class="panel-body">
				<h4>Test Description: <?php echo $exam['test_description']; ?></h4>
				<h4>Number of Questions: <?php echo $exam['count'];?></h4>
				<h4>Total Points Possible: <?php echo $exam['points']; ?></h4>
				<h4>Grade: 
				<?php
				if($exam['release_status']=='0')
					if($exam['countVal']=='0')
						echo "Have not taken exam yet.";
					else
						echo "Grades not yet release.";
				else{
					echo $exam['pointsScored'];
				}
				?>
				</h4>
				<hr>
				<center>
				<?php
				if($exam['countVal']=='0'){
					?>
						<button type="button" class="btn btn-primary btn-lg" aria-label="Left Align"  onclick="takeTest('<?php echo $exam['test_id']; ?>')">
							<span class="glyphicon glyphicon-pencil" aria-hidden="true"></span>
							Take <?php echo $exam['test_name']; ?>
						</button>					
					<?php
				}
				else{
					if($exam['release_status']=='1'){
						?>
						<button type="button" class="btn btn-default btn-lg" aria-label="Left Align"  onclick="viewTest('<?php echo $exam['test_id']; ?>')">
							<span class="glyphicon glyphicon-eye-open" aria-hidden="true"></span>
							View <?php echo $exam['test_name']; ?>
						</button>
						<?php
					}else{
						?>
						<button type="button" class="btn btn-default btn-lg" aria-label="Left Align"  disabled>
							<span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
							View <?php echo $exam['test_name']; ?>
						</button>
						<?php
					}
				}
				?>
				</center>
			</div>
		</div>
		
		<?php
		
		//echo "<hr>";
	}
	
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
				
				
				function rmExam(testId){
					ajaxCall("rmTest.php",{'test_id':testId},function(ret){
						if(ret.valid)
							window.location.reload();
					});
				}
				
				function toggleRelease(examId,state){
					ajaxCall("toggleTest.php",{'exam_id':examId.toString(),'release_status':state.toString()},function(ret){
						if(ret.valid)
							window.location.reload();
					});
				}
				</script>
				<?php
			}
			elseif($_SESSION['valid']=='student'){
				?>
				<script>
				function takeTest(testId){
					ajaxCall("takeTest.php",{'exam_id':testId.toString()},function(ret){
						if(ret.valid)
							window.location.href="Student/testTaker.php";
					}); // end of ajax call
				}
				
				function viewTest(testId){
					ajaxCall("viewTest.php",{'testId':testId},function(ret){
						if(ret.valid)
							window.location.href="Student/viewTest.php";
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
					
				} // end of if
				elseif($_SESSION['valid']=='student'){
					?> 
					<div class="col-md-12"> 
					<?php studDash();?> 
					</div>
				<?php
				} // end of else if
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


