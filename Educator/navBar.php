<?php
session_start();

function navBar(){
	
	?>
	<nav class="navbar navbar-inverse navbar-fixed-top">
		<div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
				
				<a class="navbar-brand" href="">CS 490 Project</a>
				
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li><a href="http://web.njit.edu/~dkb9/Software_Design_Project/dashboard.php">Dashboard</a></li>
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a id="Logout" href="http://web.njit.edu/~dkb9/Software_Design_Project/">Logout <?php echo $_SESSION['UCID']?></a>
					</li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
	<!-- end of navbar-->
	<?php
	
}

function toolBar(){
	?>
	<style>
			.nav-justified {
				background-color: #eee;
				border: 1px solid #ccc;
				border-radius: 5px;
			}
	</style>
	<nav style="padding-bottom:20px;">
		<ul class="nav nav-justified">
			<?php
			if(isset($_SESSION['testId'])){
				?> <li><a href="testMaker.php"><?php echo $_SESSION['testName']; ?></a></li><?php
			}
			else{
				?> <li><a href="../dashboard.php">Dashboard</a></li><?php
			}
			?>
			<li><a href="multiChoice.php">Multiple Choice</a></li>
			<li><a href="trueFalse.php">True or False</a></li>
			<li><a href="fillBlank.php">Fill in the Blank</a></li>
			<li><a href="openEnd.php">Open Ended</a></li>
			<li><a href="questDatabase.php">Pre-Made Questions</a></li>
		</ul>
	</nav>
	<?php
}

/* 
Creates the add to test button according to whether it is already in the exam or the user is even edditing the exam
Author's Notes: All the views use this file, making it an ideal location for common functions
*/
function addToExamBtn($questId,$questDB){
	if(isset($_SESSION['testId'])){
		?> <button id="b<?php echo $questId;?>" type="button" class="btn btn-primary btn-lg" aria-label="Left Align" <?php 
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
} // end of function addtoExamBtn


?>
