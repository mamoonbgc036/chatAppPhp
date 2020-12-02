<?php
include_once('inc/header.php');
$unset = false;
if (isset($_POST['submit']) && !empty($_POST)) {
	session_start();
	array_pop($_POST);
	include_once('autoload.php');
	$db = DB::getInstance();
	$feedback = $db->makeQuery('user',$_POST);
	if ($feedback) {
		$_SESSION['id'] = $feedback;
		 header('Location:home.php?id='.$feedback);
	} else{
		$unset = true;
	}
}
?>
<div id="signin">
	<div class="text-center">
		<i class='fas fa-user-tie'></i>
	</div>
	<?php
		if ($unset) {
			?>
			<p class="text-center bg-warning">No data found</p>
			<?php
		}
	?>
	<h3 class="text-center mt-2">Singin!</h3>
	<form action="index.php" method="POST">
		<input type="text" name="logName" placeholder="Username" required="">
		<input type="password" name="password" placeholder="Password" required="">
		<input type="submit" name="submit" class="btn btn-success">
	</form>
	<p class="text-center">Don't have an account! <a href="register.php">Register</a></p>
</div>
<?php
include_once('inc/footer.php');
?>
