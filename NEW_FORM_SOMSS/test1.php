<html>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!--<<script src="./testscript.js"></script>-->
<script>

$(document).ready(function(){
	
	$('.submit').click(function(evt){
		var fname = $('.first_name').val();
		var sname = $('.second_name').val();
		var rollno = $('.roll_no').val();

		////what is the purpose of this
		var fd = new FormData();
		
		fd.append('name',fname);
		fd.append('second_name',sname);
		fd.append('roll_no',rollno);
		$.ajax({
			type:"POST",
			url:"test1_submit.php",
			data:fd,
			processData: false,
			contentType: false,
			success:function(data){
				alert("The form is submitted successfully");
			}
		});
	});
});

</script>
<body>
	<form>
		Name:<input type="text" class="first_name" id="first_name">
		Second Name:<input type="text" class="second_name" id="second_name">
		Roll Number:<input type="text" class="roll_no" id="roll_no">
		<input type="submit" class="submit">
	</form>
</body>
</html>