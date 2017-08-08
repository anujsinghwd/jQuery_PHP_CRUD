$(document).ready(function(){
	$("#modal1").hide();
	$("#submit").click(function(){
		var mobile = $("#phone").val();
		var email = $("#email").val();
		var name = $("#name").val();
		//console.log(mobile+' '+email+' '+name);
		if (mobile && email && name) {
			if (!isNaN(mobile)) {
				var filter = /^[\w\-\.\+]+\@[a-zA-Z0-9\.\-]+\.[a-zA-z0-9]{2,4}$/;
				if (filter.test(email)) {
					//call db
					$.ajax({
						type: "POST",
						data: {name: name, email: email, mobile: mobile},
						url: "PHP/post.php",
						success: function(data){
							alert(data);
							location.reload('PHP/post.php');

						}
						});

				}else{
					//console.log('err');
					$("#emailerr").text('Email is not right');
				}

			}else{
				$("#mobileerr").text('mobile number should be numeric');
			}
		}else{
			$("#headerr").text('All Fields Required');
		}
	
	});


});

function selectId(val){

	$.ajax({
		type: "POST",
		data: {name: val},
		url: "PHP/edit.php",
		success: function(data){
			var newdata = JSON.parse(data);
			console.log(newdata[0].name);
			$("#name1").val(newdata[0].name);
			$("#email1").val(newdata[0].email);
			$("#mobile1").val(newdata[0].mobile);
			$("#row_id").text(newdata[0].id);
			$("#modal1").show();

		}
	});


}

function hide_md(){
	$("#modal1").hide();	
}

function save_md(){
	$("#modal1").hide();
	var id = $("#row_id").text();
	//alert(id);	
	var name = $("#name1").val();
	var email = $("#email1").val();
	var mobile = $("#mobile1").val();

	$.ajax({
		type: "POST",
		data: {name: name, email: email, mobile: mobile, id: id},
		url: "PHP/update.php",
		success: function(data){
			alert(data);			
			location.reload('PHP/post.php');
		}
	});


}

$("#add_u").click(function(){
	$("#modal1").hide();
})

function delId(val){
	$.ajax({
		type: "POST",
		data: {id: val},
		url: "PHP/delete.php",
		success: function(data){
			alert(data);			
			location.reload('PHP/post.php');
		}
	});
}