<?php
if (isset($_POST['submit'])) {
	if ($_POST['password']!=$_POST['repassword']) {
		header('Location: register.php?isNotmatched=1');
	}
	array_pop($_POST);
	array_pop($_POST);
	
	include_once('autoload.php');
	$dbInstance = DB::getInstance();
	if ($dbInstance->insert('user',$_POST)) {
		session_start();
		$_SESSION['email'] = $_POST['email'];
		header('Location: home.php');
	}
}
?>