<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link rel="stylesheet" type="text/css" href="css/all.min.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
	<title></title>
</head>
<body>
<div id="signin">
	<div class="text-center">
		<i class='fas fa-user-tie'></i>
	</div>
	<h3 class="text-center mt-2">Singin!</h3>
	<form action="signin.php" method="POST">
		<input type="text" name="name" placeholder="Username">
		<input type="password" name="password" placeholder="Password">
		<button>Signin</button>
	</form>
	<p class="text-center">Don't have an account! <a href="">Register</a></p>
</div>
<script type="text/javascript" src="js/jquery-3.2.1.min.js"></script>
<script type="text/javascript" src="js/app.js"></script>
<script type="text/javascript" src="js/bootstrap.min.js"></script>
</body>
</html>