<?php
session_start();

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
				<li class="active"><a href="http://afsaccess1.njit.edu/~dkb9/Software_Design_Project/dashboard.php">Dashboard</a></li>
				<?php if($_SESSION['valid']=='teacher'){
					?>
						<li><a id="navTestMake">Make A Test</a></li>
					<?php
				}?>
			</ul>
			<ul class="nav navbar-nav navbar-right">
				<li>
					<a id="Logout" href="http://afsaccess1.njit.edu/~dkb9/Software_Design_Project/">Logout <?php echo $_SESSION['UCID']?></a>
				</li>
			</ul>
		</div><!--/.nav-collapse -->
	</div>
</nav>
<!-- end of navbar-->