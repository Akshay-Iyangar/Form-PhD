<html>
<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!--<<script src="./testscript.js"></script>-->
<script>

$(document).ready(function(){
$('.submit').click(function(evt){

var ASU_ID=$('#asu_id').val();
var FIRST_NAME=$('#firstname').val();
var LAST_NAME=$('#lastname').val();
var COLLEGE_STATUS=$('input:radio[name="collegestatus"]:checked').val();
var fd = new FormData();
fd.append('asu_id',ASU_ID);
fd.append('first_name',FIRST_NAME);
fd.append('last_name',LAST_NAME);
fd.append('college_status',COLLEGE_STATUS);

$.ajax({
    type: "POST",
    url: "./form_data.php",
    data:fd,
    processData: false,
    contentType: false,
    success:function(data){
    console.log(fd);
    alert(fd);
    //redirect();	
}
    });

	});
});

</script>

<form>
ASU_ID<input type="textbox" name="asu_id" id="asu_id" class="asu_id"><br><br>
FIRST_NAME<input type="textbox" name="firstname" id="first_name" class="firstname"><br><br>
LAST_NAME<input type="textbox" name="lastname" id="lastname" class="lastname"><br><br>
<p>How is the college going?</p>
GOOD<input type="radio" name="collegestatus" id="collegestatus" class="collegestatus" value="1"><br><br>
BAD<input type="radio" name="collegestatus" id="collegestatus" class="collegestatus" value="0"><br><br>
Go ahead and submit the form<input type="submit" class="submit" > 
</form>
</html>