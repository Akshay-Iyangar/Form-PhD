$(document).ready(function(){

console.log(Asu_id);

$('.submit').click(function(evt){
var Student_rating=$("input:radio[name='student_rating']:checked").val();
var Temporary_advisors=$("input:radio[name='temporary_advisors']:checked").val();
var Temp_advisor_name=$('#temp_advisor_name').val();
var Permanent_advisor=$("input:radio[name='permanent_advisor']:checked").val();
var Signature=jQuery.makeArray();
var Advisor_team=jQuery.makeArray();
var Mail=jQuery.makeArray();
//var Asu_id = "<?php echo $ASU_ID= $_GET['ASU_ID']; ?>";
evt.preventDefault();
$.each($('#permanent_advi tr'),function(i,tr){

Signature[i]=$('.signature'+i).find('.name').val()+' '+$('.signature'+i).find('.password').val()+' '+$('.signature'+i).find('.date').val();

});


$.each($('#advisor_table_body tr'),function(i,tr){

Advisor_team[i]=$('.advisorteam'+i).find('.advisor_member').val()+' '+$('.advisorteam'+i).find('.advisor_firstname').val()+' '+$('.advisorteam'+i).find('.advisor_secondname').val()+' '+$('.advisorteam'+i).find('.advisor_mail').val();

});
//var counter=0;
//row_counter=row_counter+1;
//console.log(row_counter);
//counter = counter + 1 ;

$.each($('#advisor_table_body tr'),function(i,tr){

if($('.advisorteam'+i).find('.advisor_mail').val()===$('.advisorteam'+i).find('.advisor_remail').val()){

        Mail[i]=$('.advisorteam'+i).find('.advisor_mail').val()

}

});

console.log(Asu_id);
$.ajax({
    type: "POST",
    url: "advisor_data_sherry.php",
    data:{
	//	student_rating:Student_rating,
	//	signature:Signature,
		advisor_team:Advisor_team,
		mail:Mail,
		asu_id:Asu_id
},
    success: function(data){
     alert("The advisor form has been submitted successfully");
	//alert(Advisor_team+''+Mail+''+Asu_id);
}
        });


});
});



function advisor_table(){
    if (document.getElementById("permanent_advisor_yes").checked) {
        document.getElementById('permanent_adv').style.display = 'block';
    }
    else document.getElementById('permanent_adv').style.display = 'none';
}

function Member(){

if(document.getElementById('temporary_advisor_yes').checked) {

        document.getElementById("advisor_member_div").style.display='block';
        //document.getElementById("main_advisor").style.display='none';

}
else if(document.getElementById('temporary_advisor_no').checked){

document.getElementById("advisor_member_div").style.display='none';
//document.getElementById("main_advisor").style.display='block';
}
}



var rowCount;
function addRow(tableID)
{

	var table=document.getElementById(tableID);
	rowCount=table.rows.length;
	var row=table.insertRow(rowCount);
        
        //document.getElementById('advisor_Table').innerHTML = "<tr='signature'+rowCount>"i;//  row.class="signature1"//+(rowCount-1);
//      console.log(row.cla);
        row.setAttribute('class','advisorteam'+(rowCount-1));
        var cell1=row.insertCell(0);
        var element1=document.createElement("select");
        element1.class="advisor_member";
        element1.setAttribute('class','advisor_member');
                var option1 = document.createElement("option");
                option1.innerHTML= "ADVISOR";
                var option2 = document.createElement("option");
                option2.innerHTML="CO-ADVISOR/MEMBER";
                //option.innerHTML= "method2";
        element1.appendChild(option1);
        element1.appendChild(option2);
        //document.appendChild(element1);
        cell1.appendChild(element1);
        var cell2=row.insertCell(1);
        var element2=document.createElement("input");
        element2.type="text";
        element2.name="advisor_firstname";
        element2.class="advisor_firstname";
        element2.size="30";
        cell2.appendChild(element2);
        element2.setAttribute('class','advisor_firstname');
        var cell3=row.insertCell(2);
        var element3=document.createElement("input");
        element3.type="text";
        element3.name="advisor_secondname";
        element3.class="advisor_secondname";
        element3.size="30";
        element3.setAttribute('class','advisor_secondname');
        cell3.appendChild(element3);
        var cell4=row.insertCell(3);
        var element4=document.createElement("input");
        element4.type="text";
        element4.size="30";
        element4.name="advisor_mail";
        element4.class="advisor_mail";
        cell4.appendChild(element4);
        element4.setAttribute('class','advisor_mail');
        var cell5=row.insertCell(4);
        var element5=document.createElement("input");
        element5.type="text";
        element5.size="30";
        element5.name="advisor_remail";
  element5.class="advisor_remail";
        cell5.appendChild(element5);
        element5.setAttribute('class','advisor_remail');
        //document.getElementById('advisor_Table').innerHTML = "</tr>"
        
}
var count;
function delRow(tableID)
{
var table=document.getElementById(tableID);
count=table.rows.length;
if((count-1)>1)
{
var row = table.deleteRow(count-1);
}
}



