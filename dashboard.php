<?php
session_start();

if(!($_SESSION['valid']=='teacher' || $_SESSION['valid']=='student') && !isset($_SESSION['UCID'])){
	header('location: http://afsaccess1.njit.edu/~dkb9/Software_Design_Project/');
}


?>


<html>
	<head>
	</head>
	<body>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="dashboard.css"></script>
		<script type="text/javascript" src="callHandler.js"></script>
		<script type="text/javascript" src="dashboard.js"></script>
		<?php
		if($_SESSION['valid']=='teacher'){
			?>
				<script type="text/javascript" scr="Educator/teacherDash.js"></script>
			<?php 
		}
		
		require_once 'navBar.php';
		?>

		<div class="container">
			
			<hr>
			<footer>
				<p>© 2016, Buell Enterprises</p>
			</footer>

        </div><!--/.container-->
	</body>
	
</html>


