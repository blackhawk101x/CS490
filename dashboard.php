<?php
session_start();

if(!($_SESSION['valid']=='teacher' || $_SESSION['valid']=='student') && !isset($_SESSION['UCID'])){
	header('location: http://afsaccess1.njit.edu/~dkb9/Software_Design_Project/');
}
?>


<html>
	<head>
	</head>
	<body  style="padding-top: 50px;">
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" type="text/css" href="dashboard.css"></script>
		<script type="text/javascript" src="callHandler.js"></script>
		<script type="text/javascript" src="dashboard.js"></script>
		<?php
		if($_SESSION['valid']=='teacher'){
			?>
				<script type="text/javascript">
				window.onload=function(){
					document.getElementById("makeTest").addEventListener("click",function(e){
						e.preventDefault();
						window.location.href="Educator/testMaker.php";
					});
				};
				</script>
			<?php 
		}
		
		require_once 'navBar.php';
		?>
		<div class="jumbotron">
	   		<div class="container">
        		<h1>Hello, <?php echo $_SESSION['UCID'];?>!</h1>
        		<p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        		<?php
        		if($_SESSION['valid']=='teacher'){
        		?>
        		<p>
        			<a class="btn btn-primary btn-lg" href="" role="button" id="makeTest">Make A Test >></a>
        		</p>
        		<?php 
        		}
        		?>
        		
    		</div>
    	</div>
	   
	   
	   
		<div class="container">
			
			<hr>
			<footer>
				<p>© 2016, Buell Enterprises</p>
			</footer>

        </div><!--/.container-->
	</body>
	
</html>


