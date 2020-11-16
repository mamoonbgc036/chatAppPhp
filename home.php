<?php
	include_once('inc/header.php');
?>
<style type="text/css">
	#canvas{
		display: flex;
		width: 90%;
		justify-content: center;
		margin-top: 20px;
		color: #fff;
	}

	#userCanvas{
		width: 30%;
	}

	#chatBox{
		width: 60%;
	}

	#username {
		display: flex;
		place-items : center;
	}

	#username p{
		margin-bottom: 0!important;
	}

	#userCanvas ul li{
		margin: 10px auto;
	}

	#sender{
		display: flex;
		place-items :center;
	}

	#msgBox div{
		margin: 10px auto;
	}

	#me{
		display: flex;
		place-items :center;
		float: right;
	}

	#canvas li{
		list-style: none;
	}

	#msgBox p{
		margin-bottom: 0!important;
	}

	#userMsg input{
		margin-bottom: 0px;
	}

	#canvas a{
		color: #fff;
	}

	#canvas img{
		width: 30px;
		border-radius: 50%;
	}
</style>
<div id="canvas">
	<div id="userCanvas">
		<div id="button">
			<button>Add User</button>
		</div>
		<div id="user">
			<ul>
				<li><a href="">mamoon <span><i class="fa fa-circle"></i></span></a></li>
				<li><a href="">mamoon <span><i class="fa fa-circle-notch" aria-hidden="true"></i></span></a></li>
			</ul>
		</div>
	</div>
	<div id="chatBox">
		<div id="username">
			<img src="images/mamon.jpg">
			<p>mamoon</p>
			<a href="" class="bg-info m-1">Logout</a>
		</div>
		<div id="msgBox">
			<div id="sender">
				<img src="images/mamon.jpg">
				<p>Hello..</p>
			</div>
			<div id="me">
				<p>Hi...</p>
				<img src="images/mamon.jpg">
			</div>
		</div>
		<div id="userMsg">
			<input type="text" class="form-control" name="">
		</div>
	</div>
</div>
<?php
	include_once('inc/footer.php');
?>