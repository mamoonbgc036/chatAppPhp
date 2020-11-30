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
		height: 63px;
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

	#user img{
		width: 30px;
		border-radius: 50%;
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

	#userMsg{
		display: flex;
		margin-top: 10px;
	}

	#userMsg button{
		border-radius: 50%;
    width: 50px;
    background: #0F90F2;
	}

	#me #typed{
		margin-right: 50px;
	}

	.fa-paper-plane{
		color: red;
	}
</style>
<?php
include_once('autoload.php');
$dbInstance = DB::getInstance();
$results = $dbInstance->runQuery('user',null)->result();
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
						<li><img src="images/<?=$result[4]?>"><a href=""><?=$result['name']?><span><i class="fa fa-window-close"></i></span></a></li>
						<?php
					}
				?>
			</ul>
		</div>
	</div>
	<div id="chatBox">
		<div id="username">
			<div>
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
				<div id="me">
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
				$('#me').append(`<div>
						<p>`+$(this).val()+`</p>
						<img src="images/mamon.jpg">
					</div>`);
			}
		})
	})
</script>
<?php
	include_once('inc/footer.php');
?>