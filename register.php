<?php
include_once('inc/header.php');
?>
<div id="register">
	<form action="" method="post">
		<h4 class="text-center">Register</h4>
		<div>
			<label>Name:</label>
			<input type="text" name="name" placeholder="Enter Name" required="">
		</div>
		<div>
			<label>Phone</label>
			<input type="text" name="phone" placeholder="Enter Phone Number" required="">
		</div>
		<div>
			<label>Email</label>
			<input type="text" name="phone" placeholder="Enter Email" required="">
		</div>
		<div>
			<label>Username</label>
			<input type="text" name="phone" placeholder="Enter Username" required="">
		</div>
		<div>
			<label>Password</label>
			<input type="text" name="phone" placeholder="Enter Password" required="">
		</div>
		<div>
			<label>Repassword</label>
			<input type="text" name="phone" placeholder="Enter Repassword" required="">
		</div>
		<div>
			<button>Register</button>
		</div>
		<label>Have account!<a href="index.php">Login</a></label>
	</form>
</div>
<?php
include_once('inc/footer.php');
?>