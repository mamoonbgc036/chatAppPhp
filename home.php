<?php
session_start();
if (isset($_SESSION['id'])) {
	$mid = $_GET['id'];
	 include_once('inc/header.php');
	include_once('autoload.php');
	$dbInstance = DB::getInstance();
	$results = $dbInstance->runQuery('user',null)->result();
	if (!empty($_POST['info'])) {
		//print_r($_POST['info']);die();
		$dbInstance->msgInsert($_POST['info']);
	}
	?>
		<div id="canvas">
			<div id="userCanvas">
				<div id="button">
					<button>Add User</button>
				</div>
				<div id="user">
					<ul>
						<?php
							foreach ($results as $result) {
								?>
								<li><img id="im" src="images/<?=$result[4]?>"><a href="<?=$result['id']?>"><?=$result['name']?><span><i class="fa fa-window-close"></i></span></a></li>
								<?php
							}
						?>
					</ul>
				</div>
			</div>
			<div id="chatBox">
				<div id="username">
					<div id="friend">
						<!-- <img src="images/mamon.jpg">
						<span class="text-light">mamoon</span> -->
					</div>
					<div id="logout">
						<a href="sessionDelete.php" class="text-light">Logout</a>
					</div>
				</div>
				<div id="msgBox">
					<div id="msgArea" class="<?=$mid?>">
						<!-- <div id="senderdiv"> -->
							<!-- SENDER MESSAGE GO HERE -->
								<!-- <img src="images/mamon.jpg">
								<p>`+msg+`</p> -->
					<!-- 	</div> -->
						<!-- <div id="me"> -->
							<!-- MY MESSAGE GO HERE -->
						<!-- </div> -->
					</div>
					<div id="userMsg">
							<input type="text" id="input" class="form-control" placeholder="Enter your message here" name=""><button id="btn"><i class="fas fa-paper-plane"></i></button>
						</div>
				</div>
			</div>
		</div>
	<?php
	include_once('inc/footer.php');
	} else{
		header('Location:index.php');
	}
?>