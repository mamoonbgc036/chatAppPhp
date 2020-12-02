$(document).ready(function(){
		$('#input').keypress(function(){
			if(event.keyCode==13){
				let msg = $(this).val();
				let sid = $('#friend span').attr('id');
				let mid = $('#msgArea').attr('class');
				let info = [msg,sid,mid];

				$.ajax({
					url:"home.php",
					method : "POST",
					data : {info : info},
					success:function(e){
						$('#msgArea').append(`<div id="me"><div>
										<p>`+msg+`</p>
										<img src="images/mamon.jpg">
									</div></div>`);
					}
				})
			}
		})

		$('#user a').click(function(e){
			e.preventDefault();
			let name = $(this).text();
			let sid = $(this).attr('href');
			let img = $(this).parent().find('img').attr('src');
			let mid = $('#msgArea').attr('class');
			let content = $(document.body);		

			let info = [sid,mid];

			$('#friend').empty();
			$('#friend').append("<img src="+img+"><span id="+sid+" class='text-light'>"+name+"</span>");
			let images = $("#friend img").attr('src');
			let finalImage = images.split('/');
			alert(finalImage[1]);


			$.ajax({
					url:"insert.php",
					method:"POST",
					data:{infom:info},
					dataType:"json",
					success:function(e){

						if (e.length == 0) {
							$('#msgArea').empty();
						}else{
							$('#msgArea').empty();
							e.forEach(function(i){
								if (i.receiverName == mid) {
									$('#msgArea').append(`<div id="me"><div>
										<p>`+i.msgContent+`</p>
										<img src="images/me.png">
									</div></div>`);
								} else{
									$('#msgArea').append(`<div id="senderdiv"><div id="sender"><img src="images/`+finalImage[1]+`">
									<p>`+i.msgContent+`</p></div></div>`)
								}
							})
						}
					}
				});
		})
	})