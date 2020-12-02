<?php
session_start();
if (isset($_REQUEST['submit'])) {
	//print_r($_FILES);die();
	if ($_REQUEST['password']!=$_POST['repassword']) {
		return header('Location:register.php?isNotmatched=1');
	}

	array_pop($_REQUEST);
	array_pop($_REQUEST);

	if ($_FILES){
				$imgName = $_FILES['image']['name'];
				$imgLocation = $_FILES['image']['tmp_name'];
				$imgSize = $_FILES['image']['size'];
				$imgNarray = explode('.', $imgName);
				$imgActualextension = $imgNarray[1];
				$allowedImageextension = ['jpg', 'jpeg', 'png'];
				if (!in_array($imgActualextension, $allowedImageextension)){
					header('Location: addproducts.php?defectExtension');
				} else {
					if ($imgSize > 10000000) {
						header('Location: addproducts.php?toobig');
					} else {
						$imgNewname = uniqid().'.'.$imgActualextension;
						move_uploaded_file($imgLocation, 'images/'.$imgNewname);
					}
				}
				$_REQUEST['image'] = $imgNewname;
			}

	//print_r($_REQUEST);die();
	
	include_once('autoload.php');
	$dbInstance = DB::getInstance();
	if ($dbInstance->makeQuery('user',$_REQUEST)) {
		session_start();
		$_SESSION['email'] = $_REQUEST['email'];
		header('Location: home.php');
	}
} elseif(!empty($_POST['infom'])){
		include_once('autoload.php');
		$dbInstance = DB::getInstance();
		$data = $dbInstance->runQuery('msg',$_POST['infom'])->result();
		echo json_encode($data);die();
		//echo json_encode($data);die();
} elseif (isset($_SESSION['id'])) {
	session_unset();
	header('Location:index.php');
} 
?>