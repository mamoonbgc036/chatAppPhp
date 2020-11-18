<?php
	include_once('inc/header.php');
?>
<style type="text/css">
	#canvas{
		    width: 90%;
		    min-height: 90vh;
		    display: flex;
		    background: #000306;
		    margin: auto;
		    position: absolute;
		    top: 50%;
		    left: 50%;
		    transform: translate(-50%, -50%);
	}

	#canvas li{
		list-style: none;
	}

	#canvas #username{
		display: flex;
		place-items:center;
		border: 1px solid #fff;
		padding: 10px;
		background: #0F90F2;
	}

	#sender p{
		position: relative;
		background:#cbe8f0;
		width:70%;
		margin-left:30px;
		border-radius:2px;
	}

		#me p{
			position: relative;
			background:#FD3A74;
			width:70%;
			margin-right:30px;
			border-radius:2px;
		}


	#sender p:after{
		 content:'';
  position:absolute;
  border:10px solid transparent;
  border-top:10px solid #cbe8f0;
  top:0px;
  left:-10px;
	}

	#me p:after{
		 content:'';
  position:absolute;
  border:10px solid transparent;
  border-top:10px solid #FD3A74;
  top:0px;
  right:-10px;
	}

	#me div{
		display: flex;
		justify-content: flex-end;
	}

	#username #logout{
		margin-left: auto;
	}

	#user{
		padding: 5px;
	}


	#user li{
		margin: 5px auto;
	}

	#user a{
		color: #fff;
	}


	#userCanvas {
		width: 30%;
		border: 2px solid #fff;
	}

	#userCanvas button{
		margin: 0 auto;
		display: block;
	}

	#button{
		border-bottom: 1px solid #fff;
		padding: 17px;
		background: #0F90F2;
	}

	#chatBox{
		width: 70%;
		border: 2px solid #fff;
	}

	#chatBox #msgBox{
		padding: 5px;
	}

	#canvas img{
		width: 30px;
		border-radius: 50%;
	}

	#msgBox:hover{
		overflow-y: scroll;
	}

	#msgArea{
		position: absolute;
	    width: 68%;
	    bottom: 0;
	}

	#sender{
		display: flex;
	}

	#logout{
		background: #FD3A74;
    	padding: 6px;
	}
</style>
<div id="canvas">
	<div id="userCanvas">
		<div id="button">
			<button>Add User</button>
		</div>
		<div id="user">
			<ul>
				<li><a href="">mamoon <span><i class="fa fa-window-close"></i></span></a></li>
				<li><a href="">mamoon <span><i class="fa fa-check" aria-hidden="true"></i></span></a></li>
			</ul>
		</div>
	</div>
	<div id="chatBox">
		<div id="username">
			<div>
				<img src="images/mamon.jpg">
				<span class="text-light">mamoon</span>
			</div>
			<div id="logout">
				<a href="" class="text-light">Logout</a>
			</div>
		</div>
		<div id="msgBox">
			<div id="msgArea">
				<div id="sender">
					<img src="images/mamon.jpg">
					<p>Hello..</p>
				</div>
				<div id="me">
					<div>
						<p>Hi...</p>
						<img src="images/mamon.jpg">
					</div>
				</div>
				<div id="userMsg">
					<input type="text" class="form-control" placeholder="Enter your message here" name="">
				</div>
			</div>
		</div>
	</div>
</div>
<?php
	include_once('inc/footer.php');
?>