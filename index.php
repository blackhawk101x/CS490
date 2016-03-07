<?
session_start();
}
?>

<html>
	<head>
		<title>CS 490 Design Project</title>
	</head>
	<meta author="Dakota Buell">
	<body>
		<script src="bootstrap/js/jquery.js"></script>
		<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script src="bootstrap/d3/d3.min.js" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="login.css"></script>
		<script type="text/javascript" src="login.js"></script>
		
		<div class="container">
			<div class="card card-container">
				<!-- <img class="profile-img-card" src="//lh3.googleusercontent.com/-6V8xOA6M7BA/AAAAAAAAAAI/AAAAAAAAAAA/rzlHcD0KYwo/photo.jpg?sz=120" alt="" /> -->
				<img id="profile-img" class="profile-img-card" src="//ssl.gstatic.com/accounts/ui/avatar_2x.png" />
				<p id="profile-name" class="profile-name-card"></p>
				<form class="form-signin" id="loginForm">
					<div class="alert alert-danger" role="alert" style="display:none" id="errorMessage">
						<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
						<span class="sr-only">Error:</span>
						Invalid username or password
					</div>
					<span id="reauth-email" class="reauth-email"></span>
					<input type="username" id="username" class="form-control" placeholder="UCID" required autofocus>
					<input type="password" id="inputPW" class="form-control" placeholder="Password" required>
					</br>
					<button class="btn btn-lg btn-primary btn-block btn-signin button" type="submit" id="submitBTN">Sign in</button>
				</form><!-- /form -->
				<!-- FOOTER -->
				<footer>
					<p>&copy 2016 Buell Enterprises.</p>
					<p><a href="#">Privacy</a> &#8901 <a href="#">Terms</a></p>
				</footer>
			</div><!-- /card-container -->
		</div><!-- /container -->
	
	</body>
</html>