<?php
	session_start();
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
						<li><img src="images/<?=$result[4]?>"><a href="<?=$result['id']?>"><?=$result['name']?><span><i class="fa fa-window-close"></i></span></a></li>
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
				<a href="" class="text-light">Logout</a>
			</div>
		</div>
		<div id="msgBox">
			<div id="msgArea">
				<div id="sender">
					<!-- SENDER MESSAGE GO HERE -->
				</div>
				<div id="me" class="<?=$_SESSION['id']?>">
					<!-- MY MESSAGE GO HERE -->
				</div>
				<div id="userMsg">
					<input type="text" id="input" class="form-control" placeholder="Enter your message here" name=""><button id="btn"><i class="fas fa-paper-plane"></i></button>
				</div>
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$(document).ready(function(){
		$('#input').keypress(function(){
			if(event.keyCode==13){
				let msg = $(this).val();
				let sid = $('#user a').attr('href');
				let mid = $('#me').attr('class');
				let info = [msg,sid,mid];
				

				$.ajax({
					url:"home.php",
					method : "POST",
					data : {info : info},
					success:function(e){
						$('#me').append(`<div>
						<p>`+msg+`</p>
						<img src="images/mamon.jpg">
					</div>`);
					}
				})
			}
		})

		$('#user a').click(function(e){
			e.preventDefault();
			let name = $(this).text();
			let img = $(this).parent().find('img').attr('src');

			$('#friend').empty();
			$('#friend').append("<img src="+img+"><span class='text-light'>"+name+"</span>");
		})
	})
</script>
<?php
	include_once('inc/footer.php');
?>