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
				
				<a class="navbar-brand" href="dashboard.php">CS 490 Project</a>
				
			</div>
			<div id="navbar" class="navbar-collapse collapse">
				<ul class="nav navbar-nav">
					<li class="active"><a href="https://web.njit.edu/~dkb9/Software_Design_Project/dashboard.php">Dashboard</a></li>
					<?php 
					if($_SESSION['valid']=='teacher'){
						?> 
						<li><a role="button" id="navTestMake">Make a Test</a></li>
						<?php
					} // end of if
					?>
					
				</ul>
				<ul class="nav navbar-nav navbar-right">
					<li>
						<a id="Logout" href="https://web.njit.edu/~dkb9/Software_Design_Project/">Logout <?php echo $_SESSION['UCID']?></a>
					</li>
				</ul>
			</div><!--/.nav-collapse -->
		</div>
	</nav>
<!-- end of navbar-->
	<?php
}

function toolBarRight(){
	
	?>
	<div class="col-md-2">
		<div class="sidebar-nav-fixed pull-right affix" style="width:22%">
			<div class="well">
				<ul class="nav">
					<li class="nav-header"><h3>Teacher's Tools</h3></li>
					<li><a id="toolTestMake" class="btn btn-primary btn-lg" role="button">Make a Test</a></li>
					<li><a role="button" class="btn btn-lg btn-primary" href="https://web.njit.edu/~dkb9/Software_Design_Project/Educator/multiChoice.php">Make a Multichoice Question</a></li>
					<li><a role="button" class="btn btn-lg btn-primary" href="https://web.njit.edu/~dkb9/Software_Design_Project/Educator/trueFalse.php">Make a True and False Question</a></li>
					<li><a role="button" class="btn btn-lg btn-primary" href="https://web.njit.edu/~dkb9/Software_Design_Project/Educator/fillBlank.php">Make a Fill in the Blank Question</a></li>
					<li><a role="button" class="btn btn-lg btn-primary" href="https://web.njit.edu/~dkb9/Software_Design_Project/Educator/">Make a Open Ended Question</a></li>
					<li><a role="button" class="btn btn-lg btn-primary" href="https://web.njit.edu/~dkb9/Software_Design_Project/Educator/questDatabase.php">See DataBase of Questions</a></li>
				</ul>
			</div>
		</div>
	</div>
	<?php
}

?>
