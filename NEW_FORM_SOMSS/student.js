
$(function(){
    $("#academic_year").datepicker( {
        beforeShow: function(el, dp) {
        $('#ui-datepicker-div').toggleClass('hide-calendar', $(el).is('[data-calendar="false"]'));
        },
        dateFormat: $.datepicker.ISO_8601,
    });
});

var rowCount;

$(function() {
//$('#ui-datepicker-div .ui-datepicker-calendar').css('display','none');


    $("#defense_completion_date,.date_of_qualification,#prog_start_date,#anticipated_qualifying_date,#anticipated_dissertation_prospectus_date,#thesis_completion").datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
	display:'none',
        dateFormat: 'MM yy',
	beforeShow: function(el, dp) {
        $('#ui-datepicker-div').toggleClass('hide-calendar', $(el).is('[data-calendar="false"]'));
	},
        onClose: function(dateText, inst) { 
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker('setDate', new Date(year, month, 1));
        }
    });
});



/*
// If We need to select Id acccording to the Degree Program
$(document).ready (function () {

	//colloquium_classcolloquium_class
	//colloquium_class
	//$("#abc").css("display","block");
		
	if($("#degree_select").val()=="applied_math")
	{
		$("#coll").css("display","block");
		document.getElementById('oral_comprehensive_exam_id').style.display = 'none';
	}


});

*/

function addRow(tableID)
{

var table=document.getElementById(tableID);
rowCount=table.rows.length;
var row=table.insertRow(rowCount);
        if(tableID!='dataTable'&& tableID!='advisor_Table' && tableID!="qualifying_Table")
        {
        var cell1=row.insertCell(0);
        var element1=document.createElement("input");
        element1.type="text";
        element1.size="2"
        element1.value=rowCount;
        cell1.appendChild(element1);
        var cell2=row.insertCell(1);
        var element2=document.createElement("input");
        element2.type="text";
        element2.size="70";
        if(tableID=="presentation_Table")
        {
                element2.name="presentation";
                element2.class="presentation";
                element2.setAttribute('class','presentation');
        }
        else if (tableID=="publication_Table")
        {
                element2.name="publication";
                element2.class="publication";
                element2.setAttribute('class','publication');
        }
        else if (tableID=="current_Table")
        {
                element2.name="current_goal";
                element2.class="current_goal";
                element2.setAttribute('class','current_goal');
        }
        else if (tableID=="future_Table")
        {
                element2.name="future_goal";
                element2.class="future_goal";
                element2.setAttribute('class','future_goal');
        }
        cell2.appendChild(element2);

        }
        else if(tableID=="dataTable")
        {
        row.setAttribute('class','coursegrade'+(rowCount-1));
        var cell1=row.insertCell(0);
        var element1=document.createElement("input");
        element1.type="text";
        //element1.maxlength="2"
        element1.size="70";
        element1.name="course";
        element1.class="course";
        element1.setAttribute('class','course');
        cell1.appendChild(element1);
        var cell2=row.insertCell(1);
        var element2=document.createElement("select");
        element2.name="grade";
        element2.class="grade";
	element2.setAttribute('class','grade');
	var option1 = document.createElement("option");
	option1.innerHTML="A+";
	var option2 = document.createElement("option");
        option2.innerHTML="A";
	var option3 = document.createElement("option");
        option3.innerHTML="A-";
	var option4 = document.createElement("option");
        option4.innerHTML="B+";
	var option5 = document.createElement("option");
        option5.innerHTML="B";
	var option6 = document.createElement("option");
        option6.innerHTML="B-";
	var option7 = document.createElement("option");
        option7.innerHTML="C+";
	var option8 = document.createElement("option");
        option8.innerHTML="C";
	var option9 = document.createElement("option");
        option9.innerHTML="D";
	var option10 = document.createElement("option");
        option10.innerHTML="E";
	var option11 = document.createElement("option");
        option11.innerHTML="I";
	var option12 = document.createElement("option");
        option12.innerHTML="NR";
	var option13 = document.createElement("option");
        option13.innerHTML="P";
	var option14 = document.createElement("option");
        option14.innerHTML="W";
	var option15 = document.createElement("option");
        option15.innerHTML="X";
	var option16 = document.createElement("option");
        option16.innerHTML="Y";
	var option17 = document.createElement("option");
        option17.innerHTML="Z";
	var option18 = document.createElement("option");
        option18.innerHTML="XE";
	element2.appendChild(option1); element2.appendChild(option2);element2.appendChild(option3);element2.appendChild(option4);element2.appendChild(option5);element2.appendChild(option6);element2.appendChild(option7);element2.appendChild(option8);element2.appendChild(option9);element2.appendChild(option10);element2.appendChild(option11);element2.appendChild(option12);element2.appendChild(option13);element2.appendChild(option14);element2.appendChild(option15);element2.appendChild(option16);element2.appendChild(option17);element2.appendChild(option18);
	cell2.appendChild(element2);
        }
        else if(tableID=="advisor_Table")
        {
        
        //document.getElementById('advisor_Table').innerHTML = "<tr='signature'+rowCount>"i;//  row.class="signature1"//+(rowCount-1);
//      console.log(row.cla);
        row.setAttribute('class','signature'+(rowCount-1));
        var cell1=row.insertCell(0);
        var element1=document.createElement("select");
        element1.class="advisor_member";
        element1.setAttribute('class','advisor_member');
                var option1 = document.createElement("option");
                option1.innerHTML= "CHAIR";
                var option2 = document.createElement("option");
                option2.innerHTML="CO-CHAIR/MEMBER";
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

	 else if (tableID=="qualifying_Table")
        {
        

        	var cell1=row.insertCell(0);
	        var element1=document.createElement("input");
        	element1.type="text";
        	element1.size="2"
        	element1.value=rowCount;
        	cell1.appendChild(element1);
        	
		var cell2=row.insertCell(1);
        	var element2=document.createElement("input");
       	 	element2.type="text";
        	element2.size="70";
                element2.name="qualifying_details";
                element2.class="qualifying_details";
                element2.setAttribute('class','qualifying_details');
		cell2.appendChild(element2);

		var cell3=row.insertCell(2);
                var element3=document.createElement("input");
                element3.type="text";
		element3.name="date_of_qualification";
                element3.class="date_of_qualification"+rowCount;
                element3.setAttribute('class','date_of_qualification'+rowCount);
		element3.setAttribute('data-calendar','false');
                cell3.appendChild(element3);

	

		    $(".date_of_qualification"+rowCount).datepicker( {
        changeMonth: true,
        changeYear: true,
        showButtonPanel: true,
        display:'none',
        dateFormat: 'MM yy',
        beforeShow: function(el, dp) {
        $('#ui-datepicker-div').toggleClass('hide-calendar', $(el).is('[data-calendar="false"]'));
        },
        onClose: function(dateText, inst) {
            var month = $("#ui-datepicker-div .ui-datepicker-month :selected").val();
            var year = $("#ui-datepicker-div .ui-datepicker-year :selected").val();
            $(this).datepicker('setDate', new Date(year, month, 1));
        }
    });

		

//	input name="date_of_qualification" class="date_of_qualification" type="text" data-calendar="false


        }




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


function completion_date(){
    if (document.getElementById("exam_no").checked) {
        document.getElementById('completion_date').style.display = 'block';
	document.getElementById('Q-exam').style.display = 'none';
	$('#qualifying_Table').find("tr:gt(1)").remove();
	$('.qualifying_details').val("");
    }
    else 
	{
		document.getElementById('completion_date').style.display = 'none';
  		$('#anticipated_qualifying_date').val("");
		document.getElementById('Q-exam').style.display = 'block';
		
	}
}

function completion_date_dissertation_prospectus(){
    if (document.getElementById("exam_not").checked) {
        document.getElementById('completion_date_dissertation_prospectus').style.display = 'block';
	document.getElementById('ifyes').style.display = 'none';
	 $("input:radio[class='defense']:checked").attr('checked',false);
    }
    else
	{ 
		document.getElementById('completion_date_dissertation_prospectus').style.display = 'none';
  		$('#anticipated_dissertation_prospectus_date').val("");
		$('#defense_completion_date').val("");
		document.getElementById('defense_date').style.display = 'none';
		document.getElementById('ifyes').style.display = 'block';
	}
}


function Disertation_completion(){
	if (document.getElementById("defense_no").checked){
		document.getElementById('defense_date').style.display = 'block';
	}
	else{
		document.getElementById('defense_date').style.display = 'none';
		$('#defense_completion_date').val("");
	}

}

function Member(){

if(document.getElementById('advisory_committee_yes').checked) {
	
	document.getElementById("advisor_member_div").style.display='block';

}
else if(document.getElementById('advisory_committee_no').checked){

document.getElementById("advisor_member_div").style.display='none';

$('#advisor_Table').find("tr:gt(1)").remove();

$.each($('#advisor_table_body tr'),function(i,tr){

$('.signature'+i).find('.advisor_firstname').val("");
$('.signature'+i).find('.advisor_secondname').val("");
$('.signature'+i).find('.advisor_mail').val("");
$('.signature'+i).find('.advisor_remail').val("");

});

}
}

function TextBox(){
    if (document.getElementById('committee_formed_no').checked) {
        document.getElementById('textbox').style.display = 'block';
    }
    else
	{	 
		document.getElementById('textbox').style.display = 'none';
		$('#advisory_committee_reason').val("");
	}
}

function Colloquium(){
    if (document.getElementById('colloquium_yes').checked) {
        document.getElementById('textbox1').style.display = 'block';
    }
    else
        {
                document.getElementById('textbox1').style.display = 'none';
                $('#colloquium_reason').val("");
        }
}


function sum() {
            var FALL = document.getElementById('fall_gpa').value;
            var SPRING = document.getElementById('spring_gpa').value;
            var result = (parseFloat(FALL) + parseFloat(SPRING))/2;
            if (!isNaN(result)) {
                document.getElementById('cum_gpa').value = result.toFixed(2);
            }
        }


 $(document).ready (function () {

	$( document.body ).mousemove(function() {

				
			$.each($('#advisor_table_body tr'),function(i,tr){

           		     if($('.signature'+i).find('.advisor_mail').val()==$('.signature'+i).find('.advisor_remail').val()){

                                       
                                                 $('label[for=advisor_remail]').css({color:'#333333'});
					}
			     else{
					 $('label[for=advisor_remail]').css({color:'red'});
                                         $('.signature'+i).find('.advisor_remail').val("")
			
					}

                                });


			});
	


 $('.advisor_remail').bind('copy paste', function(e) {
         e.preventDefault();
        });	



});



$(document).ready(function(){
$('.submit').click(function(evt){

var Course = jQuery.makeArray();
var Grade = jQuery.makeArray();
var Publication=jQuery.makeArray();
var Presentation=jQuery.makeArray();
var Tech_reports=jQuery.makeArray();
var Current_goal=jQuery.makeArray();
var Future_goal=jQuery.makeArray();
var Signature=jQuery.makeArray();
var CourseGrade=jQuery.makeArray();
var Mail=jQuery.makeArray();
var Qualifying_details= jQuery.makeArray();
var Degree_select=$('#degree_select').val();
var Academic_year=$("#academic_year").val();
var First_name=$('#first_name').val();
var Second_name=$('#second_name').val();
var Asu_id=$('#asu_id').val();
var Student_mail=$('#student_mail').val()+'@asu.edu';
var Prog_start_date=$('#prog_start_date').val();
var Sem_in_prog=$('#sem_in_prog').val();
var Spring_gpa=$('#spring_gpa').val();
var Fall_gpa=$('#fall_gpa').val();
var Cum_gpa=$('#cum_gpa').val();
//var Main_advisor=$('#main_advisor_person').val(); 
var Advisory_committee=$("input:radio[name='advisory_committee']:checked").val();
var Met_advisor=$("input:radio[name='met_advisor']:checked").val();
var Advisory_committee_reason=$('#advisory_committee_reason').val();
var Comprehensive_exam=$("input:radio[name='comprehensive_exam']:checked").val();
var Oral_comprehensive_exam=$("input:radio[name='oral_comprehensive_exam']:checked").val();
var Colloquium=$("input:radio[name='colloquium']:checked").val();
var Colloquium_reason=$('#colloquium_reason').val();
var Defense=$("input:radio[name='defense']:checked").val();
var Defense_completion_date=$("#defense_completion_date").val();
var Research_completed=$("input:radio[name='research_completed']:checked").val();
var Qualifying_exam=$("input:radio[name='qualifying_exam']:checked").val();
var Anticipated_qualifying_date=$("#anticipated_qualifying_date").val();
var Dissertation_prospectus=$("input:radio[name='dissertation_prospectus']:checked").val();
var Anticipated_dissertation_prospectus_date=$("#anticipated_dissertation_prospectus_date").val();
var Thesis_completion=$("#thesis_completion").val();
var Extra=$("#extra").val();
//var Pdf = new FormData(),
//myFile = document.getElementById("file").files[0];

//Pdf.append( 'file',  myFile);
//console.log(Pdf);
//var CourseGrade=$('.academics').find('.course').val()+' '+$('.academics').find('.grade').val();
//var Advisor=$("#advisor").find( "option :selected" ).text();
var flag="true";
evt.preventDefault();
var alert_value='';
var alert_count=1;
/*
if($("input:radio[id='advisory_committee_yes']").is(":checked"))
{
        $.each($('#advisor_table_body tr'),function(i,tr){

        if($('.signature'+i).find('.advisor_mail').val()===""){

                alert_value+=alert_count+".) Please enter the Advisor's Mail \n\n";
                alert_count++;
                $('label[for=advisor_mail]').css({color:'red'});
                flag="false";

        }
        else
        {
                $('label[for=advisor_mail]').css({color:'#333333'});
        }
        if($('.signature'+i).find('.advisor_firstname').val()===""){

                alert_value+=alert_count+".) Please enter the Advisor's First Name \n\n";
                alert_count++;
                $('label[for=advisor_firstname').css({color:'red'});
                flag="false";
        }
        else
        {
                $('label[for=advisor_firstname]').css({color:'#333333'});
        }
        if($('.signature'+i).find('.advisor_secondname').val()===""){

        alert_value+=alert_count+".) Please enter the Advisor's Second Name \n\n";
        alert_count++;
        $('label[for=advisor_secondname]').css({color:'red'});
        flag="false";
        }
        else
        {
                $('label[for=advisor_secondname]').css({color:'#333333'});
        }



        });
}


if($('#academic_year').val()==='')
{
	alert_value+=alert_count+".) Please enter Academic Year in Proper Format\n\n";
	alert_count++;
	$('label[for=academic_year]').css({color:'red'});
	flag="false";
}
else if($('#academic_year').val()!='') 
{
	$('label[for=academic_year]').css({color:'#333333'});
}


if($('#first_name').val()==='')
{
        alert_value+=alert_count+".) Please enter First Name\n\n";
	alert_count++;
	$('label[for=first_name]').css({color:'red'});
	flag="false";
}
else
{
        
       	 regex=/^[a-z]+$|^[A-Z]+$|^[A-Z]{1}[a-z]+$/
         if(!regex.test(First_name))
        {
        alert_value+=alert_count+".)Please enter the Name in Proper Format(All caps OR All small OR First letter caps and remaining small)\n\n";
        alert_count++;
        $('label[for=first_name]').css({color:'red'});
        flag="false";
        }
}

if($('#first_name').val()!='')
{
	regex=/^[a-z]+$|^[A-Z]+$|^[A-Z]{1}[a-z]+$/
	if(regex.test(First_name))
	{
		$('label[for=first_name]').css({color:'#333333'});
	}
}	



if($('#second_name').val()==='')
{
        alert_value+=alert_count+".) Please enter Last Name\n\n";
	alert_count++;
	$('label[for=second_name]').css({color:'red'});
	flag="false";
}
else
{
        
        regex=/^[a-z]+$|^[A-Z]+$|^[A-Z]{1}[a-z]+$/
         if(!regex.test(Second_name))
        {
        alert_value+=alert_count+".)Please enter the Name in Proper Format(All caps OR All small OR First letter caps and remaining small)\n\n";
        alert_count++;
        $('label[for=second_name]').css({color:'red'});
        flag="false";
        }
}
if($('#second_name').val()!='')
{
        regex=/^[a-z]+$|^[A-Z]+$|^[A-Z]{1}[a-z]+$/
        if(regex.test(Second_name))
        {
                $('label[for=second_name]').css({color:'#333333'});
        }
} 

if($('#asu_id').val()==='')
{
        alert_value+=alert_count+".) Please enter ASU ID\n\n";
	alert_count++;
	$('label[for=asu_id]').css({color:'red'});
	flag="false";
}
else
{
	
	regex=/^[0-9]{10,11}$/
	 if(!regex.test(Asu_id))
        {
	alert_value+=alert_count+".)Please enter the correct ASU-ID Number containing only numbers and ID being of 10 or 11 digits.\n\n";
        alert_count++;
        $('label[for=asu_id]').css({color:'red'});
        flag="false";
               // errors+=("Please enter correct ASU ID");
                //success = false;
        }
}
if($('#asu_id').val()!='')
{
        regex=/^[0-9]{10,11}$/
        if(regex.test(Asu_id))
        {
                $('label[for=asu_id]').css({color:'#333333'});
        }
} 

if($('#student_mail').val()==='')
{
        alert_value+=alert_count+".) Please enter ASU E-Mail ID\n\n";
        alert_count++;
        $('label[for=student_mail]').css({color:'red'});
        flag="false";
}
else
{
        
        regex=/^[a-z][a-z0-9]+?@asu.edu$/
         if(!regex.test(Student_mail))
        {
        alert_value+=alert_count+".)Please enter correct ASURITE ID (All small)\n\n";
        alert_count++;
        $('label[for=student_mail]').css({color:'red'});
        flag="false";
        }
}
if($('#student_mail').val()!='')
{
        regex=/^[a-z][a-z0-9]+?@asu.edu$/
        if(regex.test(Student_mail))
        {
                $('label[for=student_mail]').css({color:'#333333'});
        }
} 


if($('#prog_start_date').val()==='')
{
        alert_value+=alert_count+".) Please enter Program Start Date\n\n";
	alert_count++;
	$('label[for=prog_start_date]').css({color:'red'});
	flag="false";
}
else
{
	$('label[for=prog_start_date]').css({color:'#333333'});
}

if($('#sem_in_prog').val()==='')
{
        alert_value+=alert_count+".) Please enter Semester in Progress\n\n";
	alert_count++;
	$('label[for=sem_in_prog]').css({color:'red'});
	flag="false";
}
else
{
        $('label[for=sem_in_prog]').css({color:'#333333'});
}



if($('#spring_gpa').val()==='')
{
        alert_value+=alert_count+".) Please enter Spring GPA\n\n";
        alert_count++;
	$('label[for=spring_gpa]').css({color:'red'});
	flag="false";
}
else
{
	regex=/^[0-3](\.[0-9]{1,2})?$|^4(\.?([0-2][0-9]?|3[0-3]?))|4$/
       if(!regex.test(Spring_gpa))
        {
		alert_value+=alert_count+".)Please enter Spring GPA <4.33\n\n";
        	alert_count++;
        	$('label[for=spring_gpa]').css({color:'red'});
        	flag="false";
        }
}
if($('#spring_gpa').val()!='')
{
        regex=/^[0-3](\.[0-9]{1,2})?$|^4(\.?([0-2][0-9]?|3[0-3]?))|4$/
        if(regex.test(Spring_gpa))
        {
                $('label[for=spring_gpa]').css({color:'#333333'});
        }
} 



if($('#fall_gpa').val()==='')
{
        alert_value+=alert_count+".) Please enter Fall GPA\n\n";
        alert_count++;
	$('label[for=fall_gpa]').css({color:'red'});
	flag="false";
}
else
{
        regex=/^[0-3](\.[0-9]{1,2})?$|^4(\.?([0-2][0-9]?|3[0-3]?))|4$/
       if(!regex.test(Fall_gpa))
        {
                alert_value+=alert_count+".)Please enter Fall GPA <4.33\n\n";
                alert_count++;
                $('label[for=fall_gpa]').css({color:'red'});
                flag="false";
        }
}
if($('#fall_gpa').val()!='')
{
        regex=/^[0-3](\.[0-9]{1,2})?$|^4(\.?([0-2][0-9]?|3[0-3]?))$/
        if(regex.test(Fall_gpa))
        {
                $('label[for=fall_gpa]').css({color:'#333333'});
        }
} 


if($('#cum_gpa').val()==='')
{
        alert_value+=alert_count+".) Please enter CGPA\n\n";
        alert_count++;
	$('label[for=cum_gpa]').css({color:'red'});
	flag="false";
}
else
{
        regex=/^[0-3](\.[0-9]{1,2})?$|^4(\.?([0-2][0-9]?|3[0-3]?))$/
       if(!regex.test(Cum_gpa))
        {
                alert_value+=alert_count+".)Please enter CGPA <4.33\n\n";
                alert_count++;
                $('label[for=cum_gpa]').css({color:'red'});
document.getElementById("file").files[0];                flag="false";
        }
}
if($('#cum_gpa').val()!='')
{
        regex=/^[0-3](\.[0-9]{1,2})?$|^4(\.?([0-2][0-9]?|3[0-3]?))$/
        if(regex.test(Cum_gpa))
        {
                $('label[for=cum_gpa]').css({color:'#333333'});
        }
} 


if(!$("input:radio[class='advisory_committee']").is(":checked"))
{
        alert_value+=alert_count+".) Please check if Advisory Committee has been formed\n\n";
        alert_count++;
        $('label[for=advisory_committee]').css({color:'red'});
        flag="false";
}
else
{
	$('label[for=advisory_committee]').css({color:'#333333'});
}


if(!$("input:radio[class='met_advisor']").is(":checked"))//dependency 
{
        alert_value+=alert_count+".) Please check if You have met advisor\n\n";
        alert_count++;
        $('label[for=advisor]').css({color:'red'});
        flag="false";
}
else
{
        $('label[for=advisor]').css({color:'#333333'});
}

if($("input:radio[class='met_advisor']:checked").val()==="0" && $("#advisory_committee_reason").val()==='' )
{
        alert_value+=alert_count+".) Please mention the reason for not having met the advisor\n\n";
        alert_count++;
        $('label[for=advisory_committee_reason]').css({color:'red'});
        flag="false";

}
else
{
        $('label[for=advisory_committee_reason]').css({color:'#333333'});
}





if(!$("input:radio[id='comprehensive_exam']").is(":checked"))
{
        alert_value+=alert_count+".) Please check if Written Comprehensive Exam has been Selected\n\n";
        alert_count++;
        $('label[for=comprehensive_exam]').css({color:'red'});
        flag="false";
}
else
{
        $('label[for=comprehensive_exam]').css({color:'#333333'});
}


if(!$("input:radio[id='oral_comprehensive_exam']").is(":checked"))
{
        alert_value+=alert_count+".) Please check if Oral Comprehensive Exam has been Selected\n\n";
        alert_count++;
        $('label[for=oral_comprehensive_exam]').css({color:'red'});
        flag="false";
}
else
{
        $('label[for=oral_comprehensive_exam]').css({color:'#333333'});
}




if(!$("input:radio[id='research_completed']").is(":checked"))
{
        alert_value+=alert_count+".) Please check if Research has been completed\n\n";
        alert_count++;
        $('label[for=research_completed]').css({color:'red'});
        flag="false";
}
else
{
        $('label[for=research_completed]').css({color:'#333333'});
}

//will have changes
if(!$("input:radio[class='qualifying_exam']").is(":checked"))
{
        alert_value+=alert_count+".) Please check Qualfying Exam has been given\n\n";
        alert_count++;
        $('label[for=qualifying_exam]').css({color:'red'});
        flag="false";
}
else
{
        $('label[for=qualifying_exam]').css({color:'#333333'});
}
if($("input:radio[class='qualifying_exam']:checked").val()==="0" && $("#anticipated_qualifying_date").val()==='' )
{
        alert_value+=alert_count+".) Please mention the anticipated date of completion for Qualifying Exam\n\n";
        alert_count++;
        $('label[for=anticipated_qualifying_date]').css({color:'red'});
        flag="false";

}
else
{
        $('label[for=anticipated_qualifying_date]').css({color:'#333333'});
}

//qualifying exam subjects????
if($("input:radio[class='qualifying_exam']:checked").val()==="1" && $('.qualifying_details').val()==='' )
{
        alert_value+=alert_count+".) Please mention the Qualifying Exam Subjects\n\n";
        alert_count++;
        $('label[for=qualifying_details]').css({color:'red'});
        flag="false";

}
else
{
        $('label[for=qualifying_details]').css({color:'#333333'});
}


if(!$("input:radio[class='dissertation_prospectus']").is(":checked"))
{

        alert_value+=alert_count+".) Please check Oral Dissertation Prospectus has been given\n\n";
        alert_count++;
        $('label[for=dissertation_prospectus]').css({color:'red'});
        flag="false";
}
else
{
        $('label[for=dissertation_prospectus]').css({color:'#333333'});
}
if($("input:radio[class='dissertation_prospectus']:checked").val()==="0" && $("#anticipated_dissertation_prospectus_date").val()==='' )
{
        alert_value+=alert_count+".) Please mention the anticipated date of completion for Oral Dissertation Prospectus\n\n";
        alert_count++;
        $('label[for=anticipated_dissertation_prospectus_date]').css({color:'red'});
        flag="false";

}
else
{
        $('label[for=anticipated_dissertation_prospectus_date]').css({color:'#333333'});
}

if($("input:radio[class='dissertation_prospectus']:checked").val()==="1" && !$("input:radio[class='defense']").is(":checked") )
{
        alert_value+=alert_count+".) Please mention if defense of dissertation is completed\n\n";
        alert_count++;
        $('label[for=defense]').css({color:'red'});
        flag="false";

}
else
{
        $('label[for=defense]').css({color:'#333333'});
}



if($("input:radio[class='dissertation_prospectus']:checked").val()==="1"&& $(" input:radio[class='defense']:checked").val()==="0" && $("#defense_completion_date").val()==='' )
{
        alert_value+=alert_count+".) Please mention the anticipated date of completion for Defense of dissertation\n\n";
        alert_count++;
        $('label[for=defense_completion_date]').css({color:'red'});
        flag="false";

}
else
{
        $('label[for=defense_completion_date]').css({color:'#333333'});
}





if($('#thesis_completion').val()==='')
{
        alert_value+=alert_count+".) Please enter Completion year for thesis in Proper Format\n\n";
        alert_count++;
        $('label[for=thesis_completion]').css({color:'red'});
        flag="false";

}
else
{
        $('label[for=thesis_completion]').css({color:'#333333'});
}
if($('.publication').val()==='')
{
        alert_value+=alert_count+".) Please enter Publications\n\n";
        alert_count++;
        $('label[for=publication]').css({color:'red'});
        flag="false";
}
else
{
        $('label[for=publication]').css({color:'#333333'});
}



if($('.presentation').val()==='')
{
        alert_value+=alert_count+".) Please enter Presentations\n\n";
        alert_count++;
	$('label[for=presentation]').css({color:'red'});
	flag="false";
}
else
{
        $('label[for=presentation]').css({color:'#333333'});
}


$.each($('#coursegrade_table_body tr'),function(i,tr){
	if($('.coursegrade'+i).find('.course').val()==='')
	{
		 alert_value+=alert_count+".) Please enter Courses\n\n";
        	alert_count++;
        	$('label[for=course]').css({color:'red'});
        	flag="false";
	}
	else
	{
		$('label[for=course]').css({color:'#333333'});
	}
});


$.each($('#coursegrade_table_body tr'),function(i,tr){


        if($('.coursegrade'+i).find('.grade').val()==='')
        {
                 alert_value+=alert_count+".) Please enter Grades\n\n";
                alert_count++;
                $('label[for=grade]').css({color:'red'});
                flag="false";
        }
        else
        {
                $('label[for=grade]').css({color:'#333333'});
        }
});

$.each($('#coursegrade_table_body tr'),function(i,tr){
        if($('.coursegrade'+i).find('.grade').val()!='' && $('.coursegrade'+i).find('.course').val()!='' && $('.coursegrade'+(i+1)).find('.grade').val()==='' && $('.coursegrade'+(i+1)).find('.course').val()==='')
        {
                 alert_value+=alert_count+".) If grades are entered please remove the additional row added.\n\n";
                alert_count++;
                flag="false";
     	}
});




if($('.current_goal').val()==='')
{
        alert_value+=alert_count+".) Please enter Current goals\n\n";
        alert_count++;
        $('label[for=current_goal]').css({color:'red'});
        flag="false";
}
else
{
        $('label[for=current_goal]').css({color:'#333333'});
}


if($('.future_goal').val()==='')
{
        alert_value+=alert_count+".) Please enter Future goals\n\n";
        alert_count++;
        $('label[for=future_goal]').css({color:'red'});
        flag="false";
}
else
{
        $('label[for=future_goal]').css({color:'#333333'});
}



if(!$("input:radio[class='colloquium']").is(":checked"))//dependency
{
        alert_value+=alert_count+".) Please check Colloquium Lectures attended\n\n";
        alert_count++;
	$('label[for=colloquium]').css({color:'red'});
	flag="false";
}
else
{
        $('label[for=colloquium]').css({color:'#333333'});
}



if($("input:radio[id='colloquium_yes']").is(":checked") && $("#colloquium_reason").val()==="" )
{
        alert_value+=alert_count+".) Please Enter the number of colloquium lectures attended\n\n";
        alert_count++;
        $('label[for=colloquium_reason]').css({color:'red'});
        flag="false";

}
else
{
        $('label[for=colloquium_reason]').css({color:'#333333'});
}

if(!$("input:checkbox[id='certify']").is(":checked"))
{
	alert("Please certify your information for submitting the form");
	flag="false";
}
else
{
        $('label[for=certify]').css({color:'#333333'});
}
*/
if(flag=="true" )
{
var Main_advisor= "Akshay.Iyangar@asu.edu";//"Sherry.Woodley@asu.edu";

if($("input:radio[id='advisory_committee_yes']").is(":checked"))
{
$.each($('#advisor_table_body tr'),function(i,tr){

Signature[i]=$('.signature'+i).find('.advisor_member').val()+' '+$('.signature'+i).find('.advisor_firstname').val()+' '+$('.signature'+i).find('.advisor_secondname').val()+' '+$('.signature'+i).find('.advisor_mail').val()+' '+$('.signature'+i).find('.advisor_remail').val();

});

}
else if($("input:radio[id='advisory_committee_no']").is(":checked"))
{

Signature="Advisors have not been mentioned by the student"
        
}



console.log("welcome");

//'+$('.coursegrade'+i).append("&nbsp;&nbsp;&nbsp;&nbsp;")+'

$.each($('#coursegrade_table_body tr'),function(i,tr){
console.log(' i am enterin');
CourseGrade[i]=$('.coursegrade'+i).find('.course').val()+' ==>{'+$('.coursegrade'+i).find('.grade').val()+'}';
});
//var counter=0;
//row_counter=row_counter+1;
//console.log(row_counter);
//counter = counter + 1 ;


//validating the e-mail id.


$.each($('#advisor_table_body tr'),function(i,tr){

if($('.signature'+i).find('.advisor_mail').val()===$('.signature'+i).find('.advisor_remail').val()){

	Mail[i]=$('.signature'+i).find('.advisor_mail').val()

}
});
//var index=Mail.length;
//console.log(index);
//Mail[index]="Akshay.Iyangar@asu.edu";
//console.log(Mail[index]);
//var JSON_SecondName= JSON.stringify(SecondName);

$.each($('.qualifying_details'),function(){

Qualifying_details.push($(this).val());

});



$.each($('.publication'),function(){

Publication.push($(this).val());

});

$.each($('.presentation'),function(){

Presentation.push($(this).val());

});

$.each($('.current_goal'),function(){

Current_goal.push($(this).val());

});

$.each($('.future_goal'),function(){

Future_goal.push($(this).val());

});


var fd = new FormData(),
     File = document.getElementById("file").files[0];
fd.append( 'file',  File);
fd.append('degree_select',Degree_select);
fd.append('academic_year',Academic_year);
fd.append('coursegrade',CourseGrade);
fd.append('publication',Publication);
fd.append('presentation',Presentation);
fd.append('first_name',First_name);
fd.append('second_name',Second_name);
fd.append('asu_id',Asu_id);
fd.append('student_mail',Student_mail);
fd.append('prog_start_date',Prog_start_date);
fd.append('sem_in_prog',Sem_in_prog);
fd.append('spring_gpa',Spring_gpa);
fd.append('fall_gpa',Fall_gpa);
fd.append('cum_gpa',Cum_gpa);
fd.append('advisory_committee',Advisory_committee);
fd.append('signature',Signature);
fd.append('main_advisor',Main_advisor);
fd.append('mail',Mail);
fd.append('met_advisor',Met_advisor);
fd.append('advisory_committee_reason',Advisory_committee_reason);
fd.append('comprehensive_exam',Comprehensive_exam);
fd.append('oral_comprehensive_exam',Oral_comprehensive_exam);
fd.append('research_completed',Research_completed);
fd.append('qualifying_exam',Qualifying_exam);
fd.append('anticipated_qualifying_date',Anticipated_qualifying_date);
fd.append('qualifying_details',Qualifying_details);
fd.append('dissertation_prospectus',Dissertation_prospectus);
fd.append('anticipated_dissertation_prospectus_date',Anticipated_dissertation_prospectus_date);
fd.append('colloquium',Colloquium);
fd.append('colloquium_reason',Colloquium_reason);
fd.append('defense',Defense);
fd.append('defense_completion_date',Defense_completion_date);
fd.append('current_goal',Current_goal);
fd.append('future_goal',Future_goal);
fd.append('extra',Extra);

$.ajax({
    type: "POST",
    url: "./data1.php",
    data:fd,

    processData: false,
    contentType: false,
    success:function(data){
    alert("The Form has been Successfully Submitted.You will get a mail from advisory committee if your form is approved/rejected");
    redirect();	
}
        });

}
else
{
alert(alert_value);
}

});
});

function redirect(){
	window.location="https://pi.asu.edu/somss/student_form.php";
}

