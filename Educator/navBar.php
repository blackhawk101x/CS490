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
			?>
			<li><a href="multiChoice.php">Multiple Choice</a></li>
			<li><a href="trueFalse.php">True or False</a></li>
			<li><a href="fillBlank.php">Fill in the Blank</a></li>
			<li><a href="openEnd.php">Open Ended</a></li>
			<li><a href="#">Pre-Made Questions</a></li>
		</ul>
	</nav>
	<?php
}

function toolBarTestMaker(){
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
			<li><a href="multiChoice.php">Multiple Choice Question</a></li>
			<li><a href="trueFalse.php">True or False Question</a></li>
			<li><a href="fillBlank.php">Fill-in-the-Blank</a></li>
			<li><a href="openEnd.php">Open Ended Question</a></li>
			<li><a href="">Pre-Made Questions</a></li>
		</ul>
	</nav>
	<?php
}


?>
