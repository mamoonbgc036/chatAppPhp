<?php
include_once('inc/header.php');
?>
<div id="register">
	<form action="insert.php" method="post" enctype="multipart/form-data">
		<h4 class="text-center">Register</h4>
		<?php
			if (isset($_GET['isNotmatched'])) {
				?>
				<p class="text-center bg-warning">Password and Repassword does not matched!</p>
				<?php
			}
		?>
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
			<input type="text" name="email" placeholder="Enter Email" required="">
		</div>
		<div>
			<label>Username</label>
			<input type="text" name="username" placeholder="Enter Username" required="">
		</div>
		<div>
			<label>Image</label>
			<input type="file" name="image" required="">
		</div>
		<div>
			<label>Password</label>
			<input type="text" name="password" placeholder="Enter Password" required="">
		</div>
		<div>
			<label>Repassword</label>
			<input type="text" name="repassword" placeholder="Enter Repassword" required="">
		</div>
		<div>
			<button name="submit">Register</button>
		</div>
		<label>Have account!<a href="index.php">Login</a></label>
	</form>
</div>
<?php
include_once('inc/footer.php');
?>