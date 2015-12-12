$(document).ready(function(){

var dumpy_password='Director@123';
function fnOpenNormalDialog() {

if($('.name').val()==='')
{
	alert('Please Enter the name first');
}

if(password!=dumpy_password && !$('.name').val()=='')
{
var name = $('.name').val();


document.getElementById('prompt_password').style.display = 'block';


    $('#prompt_password').dialog({
	
        resizable: false,
        modal: true,
        title: name,
        height: 250,
        width: 400,
        buttons: {
            'SUBMIT': function () {
                $(this).dialog('close');
                
		password = $('#advisor_password').val();
		callback(password);
            }
        }
    });
}
}

$('#password').click(fnOpenNormalDialog);

function callback(value) {
var unique_id = Asu_id * 19;
    if (value==dumpy_password) {
        $('.password').val($('.name').val() +' '+unique_id);
	$('.name').attr('readonly','true');
	//$('.password').removeAttr('readonly');
	var date = new Date();
	date.toISOString();
 	$('.date').val(date); 
	$('.name').attr('readonly','true');
        $('.date').attr('readonly','true');
    }
	else
	{
		alert('The Password Entered was incorrect');
		$('#advisor_password').val('');
		fnOpenNormalDialog();
	}


}

$('.submit').click(function(evt){


flag=main_advisor_check();
console.log("The returned value of flag is :"+flag);
//var Student_rating=$("input:radio[name='student_rating']:checked").val();
//var Temporary_advisors=$("input:radio[name='temporary_advisors']:checked").val();
//var Temp_advisor_name=$('#temp_advisor_name').val();
//var Permanent_advisor=$("input:radio[name='permanent_advisor']:checked").val();
//var Asu_id = '<?php echo $ASU_ID= $_GET['ASU_ID']; ?>';
//var Index = '<?php echo $INDEX= $_GET['index']; ?>';
var Director_Comments = $('#director_comments').val();
evt.preventDefault();

var Signature=$('.signature').find('.name').val()+' '+$('.signature').find('.password').val()+' '+$('.signature').find('.date').val();

if(flag=="true")
{
$.ajax({
    type: 'POST',
    url: 'director_data.php',
    data:{
signature:Signature,
asu_id:Asu_id,
//index:Index,
director_comments:Director_Comments
},
    success: function(data){
	//alert(Director_Comments);
	alert("The form is successfully submitted and pdf is sent to student");
}
        });

}

});
});


