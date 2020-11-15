<?php
include_once('inc/header.php');
?>
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
	<p class="text-center">Don't have an account! <a href="register.php">Register</a></p>
</div>
<?php
include_once('inc/footer.php');
?>
