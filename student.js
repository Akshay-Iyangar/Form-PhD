
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


function addRow(tableID)
{

var table=document.getElementById(tableID);
rowCount=table.rows.length;
var row=table.insertRow(rowCount);
        if(tableID!='dataTable'&& tableID!='advisor_Table' && tableID!="qualifying_Table" && tableID!="qualifying_Table_3" && tableID!="qualifying_Table_1" && tableID!="qualifying_Table_2" && tableID!="written_Table")
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
            
            row.setAttribute('class','signature'+(rowCount-1));
            var cell1=row.insertCell(0);
            var element1=document.createElement("select");
            element1.class="advisor_member";
            element1.setAttribute('class','advisor_member');
                    var option1 = document.createElement("option");
                    option1.innerHTML= "CHAIR";
                    var option2 = document.createElement("option");
                    option2.innerHTML="CO-CHAIR/MEMBER";
            element1.appendChild(option1);
            element1.appendChild(option2);
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
            
        }

	 else if (tableID=="qualifying_Table")
        {
            row.setAttribute('class','qualifyingexam'+(rowCount-1));
        	var cell1=row.insertCell(0);
	        var element1=document.createElement("input");
        	element1.type="text";
        	element1.size="2";
        	element1.value=rowCount;
        	cell1.appendChild(element1);

           
        	
		var cell2=row.insertCell(1);
        	var element2=document.createElement("select");
       	 	
                element2.name="qualifying_details";
                element2.class="qualifying_details";
                element2.setAttribute('class','qualifying_details');
                var option1=document.createElement("option");
                option1.innerHTML="APM 501 Differential Equations I";
                var option2=document.createElement("option");
                option2.innerHTML="APM 502 Differential Equations II";
                var option3=document.createElement("option");
                option3.innerHTML="APM 503 Applied Analysis";
                var option4=document.createElement("option");
                option4.innerHTML="APM 504 Applied Probability";
                var option5=document.createElement("option");
                option5.innerHTML="APM 505 Applied and Numerical Linear Algebra";
                var option6=document.createElement("option");
                option6.innerHTML="APM 506 Scientific Computing";
                element2.appendChild(option1);element2.appendChild(option2);
                element2.appendChild(option3);element2.appendChild(option4);
                element2.appendChild(option5);element2.appendChild(option6);
		cell2.appendChild(element2);

		var cell3=row.insertCell(2);
                var element3=document.createElement("input");
                element3.type="text";
                element3.size="5";
		element3.name="qualifying_grades";
                element3.class="qualifying_grades";
                element3.setAttribute('class','qualifying_grades');
                cell3.appendChild(element3);
        }

        else if (tableID=="qualifying_Table_1")
        {
            row.setAttribute('class','qualifyingexam'+(rowCount-1));
            var cell1=row.insertCell(0);
            var element1=document.createElement("input");
            element1.type="text";
            element1.size="2";
            element1.value=rowCount;
            cell1.appendChild(element1);

            
        var cell2=row.insertCell(1);
            var element2=document.createElement("select");           
                element2.name="qualifying_details";
                element2.class="qualifying_details";
                element2.setAttribute('class','qualifying_details');
                var option1=document.createElement("option");
                option1.innerHTML="Algebra";
                var option2=document.createElement("option");
                option2.innerHTML="Real Analysis";
                var option3=document.createElement("option");
                option3.innerHTML="Discrete Mathematics";
                var option4=document.createElement("option");
                option4.innerHTML="Geometry/Topology";
                
                element2.appendChild(option1);element2.appendChild(option2);
                element2.appendChild(option3);element2.appendChild(option4);
                
        cell2.appendChild(element2);

        var cell3=row.insertCell(2);
                var element3=document.createElement("select");
                element3.name="qualifying_grades";
                element3.class="qualifying_grades";
                element3.setAttribute('class','qualifying_grades');
                var option1=document.createElement("option");
                option1.innerHTML="MS Pass";
                var option2=document.createElement("option");
                option2.innerHTML="PhD Pass";
                var option3=document.createElement("option");
                option3.innerHTML="Fail";
                element3.appendChild(option1);element3.appendChild(option2);element3.appendChild(option3);
                cell3.appendChild(element3);

            }
            else if (tableID=="qualifying_Table_2")
        {
            row.setAttribute('class','qualifyingexam'+(rowCount-1));
            var cell1=row.insertCell(0);
            var element1=document.createElement("input");
            element1.type="text";
            element1.size="2";
            element1.value=rowCount;
            cell1.appendChild(element1);
            var cell2=row.insertCell(1);
            var element2=document.createElement("select");
                element2.name="qualifying_details";
                element2.class="qualifying_details";
                element2.setAttribute('class','qualifying_details');
                var optgroup1=document.createElement("optgroup");
                    optgroup1.setAttribute("label","Applied Mathematics")
                    var option1=document.createElement("option");
                    option1.innerHTML="APM 501 Differential Equations I";
                    var option2=document.createElement("option");
                    option2.innerHTML="APM 502 Differential Equations II";
                    var option3=document.createElement("option");
                    option3.innerHTML="APM 503 Applied Analysis";
                    var option4=document.createElement("option");
                    option4.innerHTML="APM 504 Applied Probability";
                    var option5=document.createElement("option");
                    option5.innerHTML="APM 505 Applied and Numerical Linear Algebra";
                    var option6=document.createElement("option");
                    option6.innerHTML="APM 506 Scientific Computing";

                optgroup1.appendChild(option1);optgroup1.appendChild(option2);
                optgroup1.appendChild(option3);optgroup1.appendChild(option4);
                optgroup1.appendChild(option5);optgroup1.appendChild(option6);
                element2.appendChild(optgroup1);


                var optgroup2=document.createElement("optgroup");
                    optgroup2.setAttribute("label","Mathematical Biology")
                    var option1=document.createElement("option");
                    option1.innerHTML="AML 610 Topics in Applied Mathematics for the Life and Social Sciences";
                    var option2=document.createElement("option");
                    option2.innerHTML="APM 531 Mathematical Neurosciences I";
                    var option3=document.createElement("option");
                    option3.innerHTML="AML 612 Applied Mathematics for the Life and social Sciences Modeling Seminar";
                    var option4=document.createElement("option");
                    option4.innerHTML="AML 613 Probability and Stochastic Modeling for the Life and Social Sciences";
                    
                optgroup2.appendChild(option1);optgroup2.appendChild(option2);
                optgroup2.appendChild(option3);optgroup2.appendChild(option4);
                
                element2.appendChild(optgroup2);



                var optgroup3=document.createElement("optgroup");
                    optgroup3.setAttribute("label","Mathematics")
                    var option1=document.createElement("option");
                    option1.innerHTML="MAT 512 Discrete Mathematics I";
                    var option2=document.createElement("option");
                    option2.innerHTML="MAT 513 Discrete Mathematics II";
                    var option3=document.createElement("option");
                    option3.innerHTML="MAT 516 Graph Theory I";
                    var option4=document.createElement("option");
                    option4.innerHTML="MAT 517 Graph Theory II";
                    var option5=document.createElement("option");
                    option5.innerHTML="MAT 543 Algebra I";
                    var option6=document.createElement("option");
                    option6.innerHTML="MAT 544 Algebra II";
                    var option7=document.createElement("option");
                    option7.innerHTML="MAT 570 Real Analysis I";
                    var option8=document.createElement("option");
                    option8.innerHTML="MAT 571 Real Analysis II";


                optgroup3.appendChild(option1);optgroup3.appendChild(option2);
                optgroup3.appendChild(option3);optgroup3.appendChild(option4);
                optgroup3.appendChild(option5);optgroup3.appendChild(option6);
                optgroup3.appendChild(option7);optgroup3.appendChild(option8);
                element2.appendChild(optgroup3);


                var optgroup4=document.createElement("optgroup");
                    optgroup4.setAttribute("label","Statistics")
                    var option1=document.createElement("option");
                    option1.innerHTML="STP 501 Theory of Statistics 1";
                    var option2=document.createElement("option");
                    option2.innerHTML="STP 502 Theory of Statistics 2";
                    var option3=document.createElement("option");
                    option3.innerHTML="STP 525 Advance Probability";
                    var option4=document.createElement("option");
                    option4.innerHTML="STP 526 Theory of Statistical Linear Model";
                    var option5=document.createElement("option");
                    option5.innerHTML="STP 527 Statistical Large Sample Theory";
                    var option6=document.createElement("option");
                    option6.innerHTML="STP 530 Applied Regression Analysis";
                    var option7=document.createElement("option");
                    option7.innerHTML="STP 531 Applied Analysis of Variance";
                    var option8=document.createElement("option");
                    option8.innerHTML="STP 532 Applied Nonparametric Statistics";
                    var option9=document.createElement("option");
                    option9.innerHTML="STP 533 Applied Multivariable Analysis";
                    var option10=document.createElement("option");
                    option10.innerHTML="STP 535 Applied Sampling Methodology";



                optgroup4.appendChild(option1);optgroup4.appendChild(option2);
                optgroup4.appendChild(option3);optgroup4.appendChild(option4);
                optgroup4.appendChild(option5);optgroup4.appendChild(option6);
                optgroup4.appendChild(option7);optgroup4.appendChild(option8);
                optgroup4.appendChild(option9);optgroup4.appendChild(option10);
                element2.appendChild(optgroup4);
                
        cell2.appendChild(element2);

        var cell3=row.insertCell(2);
                var element3=document.createElement("select");
                element3.name="qualifying_grades";
                element3.class="qualifying_grades";
                element3.setAttribute('class','qualifying_grades');
                var option1=document.createElement("option");
                option1.innerHTML="MS Pass";
                var option2=document.createElement("option");
                option2.innerHTML="PhD Pass";
                var option3=document.createElement("option");
                option3.innerHTML="Fail";
                element3.appendChild(option1);element3.appendChild(option2);element3.appendChild(option3);
                cell3.appendChild(element3);

    
        }
        else if (tableID=="qualifying_Table_3")
        {
            row.setAttribute('class','qualifyingexam'+(rowCount-1));
            var cell1=row.insertCell(0);
            var element1=document.createElement("input");
            element1.type="text";
            element1.size="2";
            element1.value=rowCount;
            cell1.appendChild(element1);
            
            var cell2=row.insertCell(1);
            var element2=document.createElement("select");
            
                element2.name="qualifying_details";
                element2.class="qualifying_details";
                element2.setAttribute('class','qualifying_details');
                var option1=document.createElement("option");
                option1.innerHTML="STP 501/502 Theory of Statistics";
                var option2=document.createElement("option");
                option2.innerHTML="MAT 570 Real Analysis I/MAT 571 Real Analysis II";
                var option3=document.createElement("option");
                option3.innerHTML="APM 503 Applied Analysis/APM 504 Applied Probability";
                
                element2.appendChild(option1);element2.appendChild(option2);
                element2.appendChild(option3);
                
        cell2.appendChild(element2);

        var cell3=row.insertCell(2);
                var element3=document.createElement("select");
                element3.name="qualifying_grades";
                element3.class="qualifying_grades";
                element3.setAttribute('class','qualifying_grades');
                var option1=document.createElement("option");
                option1.innerHTML="MS Pass";
                var option2=document.createElement("option");
                option2.innerHTML="PhD Pass";
                var option3=document.createElement("option");
                option3.innerHTML="Fail";
                element3.appendChild(option1);element3.appendChild(option2);element3.appendChild(option3);
                cell3.appendChild(element3);

        }
        else if(tableID="written_Table"){
                row.setAttribute('class','writtenexam'+(rowCount-1));
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
                element2.name="written_comprehensive";
                element2.class="written_comprehensive";
                element2.setAttribute('class','written_comprehensive');
                cell2.appendChild(element2);
                var cell3=row.insertCell(2);
                var element3=document.createElement("select");
                element3.name="written_grades";
                element3.class="written_grades";
                element3.setAttribute('class','written_grades');
                var option1=document.createElement("option");
                option1.innerHTML="Pass";
                var option2=document.createElement("option");
                option2.innerHTML="Fail";
                element3.appendChild(option1);element3.appendChild(option2);
                cell3.appendChild(element3);

                        
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

//Applied mathematics
function completion_date(){
    if (document.getElementById("exam_no").checked) {
        
	document.getElementById('Q-exam').style.display = 'none';
	$('#qualifying_Table').find("tr:gt(1)").remove();
	$('.qualifying_grades').val("");
    $('.qualifying_details').val("");
    }
    else 
	{
	 		
		document.getElementById('Q-exam').style.display = 'block';
		
	}
}

//Mathematics
function completion_date_1(){
    if (document.getElementById("exam_no_1").checked) {
     
    document.getElementById('Q-exam_1').style.display = 'none';
    $('#qualifying_Table_1').find("tr:gt(1)").remove();
    $('.qualifying_grades').val("");
    $('.qualifying_details').val("");
    }
    else 
    {
            
        document.getElementById('Q-exam_1').style.display = 'block';
        
    }
}

//Mathematics Education
function completion_date_2(){
    if (document.getElementById("exam_no_2").checked) {
     
    document.getElementById('Q-exam_2').style.display = 'none';
    $('#qualifying_Table_2').find("tr:gt(1)").remove();
    $('.qualifying_grades').val("");
    $('.qualifying_details').val("");
    }
    else 
    {
            
        document.getElementById('Q-exam_2').style.display = 'block';
        
    }
}

//Statistics
function completion_date_3(){
    if (document.getElementById("exam_no_3").checked) {
     
    document.getElementById('Q-exam_3').style.display = 'none';
    $('#qualifying_Table_3').find("tr:gt(1)").remove();
    $('.qualifying_grades').val("");
    $('.qualifying_details').val("");
    }
    else 
    {
            
        document.getElementById('Q-exam_3').style.display = 'block';
        
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


function Member(){

if(document.getElementById('advisory_committee_yes').checked) {
	
	//document.getElementById("advisor_member_div").style.display='block';
    console.log("hello");
    $("#advisor_member_div").css("display","block");

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
var token;
function SelectDegree(){

   
    if($('#degree_select').val()=="Applied Mathematics")
    {
        token=1;
        document.getElementById("qualifying_exam_applied_math").style.display='block';
        document.getElementById("qualifying_exam_stat").style.display='none';
        document.getElementById("qualifying_exam_math_edu").style.display='none';
        document.getElementById("qualifying_exam_maths").style.display='none';
     

    }
    else if($('#degree_select').val()=="Mathematics")
    {
        token=2;
        document.getElementById("qualifying_exam_applied_math").style.display='none';
        document.getElementById("qualifying_exam_stat").style.display='none';
        document.getElementById("qualifying_exam_math_edu").style.display='none';
        document.getElementById("qualifying_exam_maths").style.display='block';
       
    }
    if($('#degree_select').val()=="Mathematics Education")
    {
        token=3;
        document.getElementById("qualifying_exam_applied_math").style.display='none';
        document.getElementById("qualifying_exam_stat").style.display='none';
        document.getElementById("qualifying_exam_math_edu").style.display='block';
        document.getElementById("qualifying_exam_maths").style.display='none';
        
    }
    if($('#degree_select').val()=="Statistics")
    {
        token=4
        document.getElementById("qualifying_exam_applied_math").style.display='none';
        document.getElementById("qualifying_exam_stat").style.display='block';
        document.getElementById("qualifying_exam_math_edu").style.display='none';
        document.getElementById("qualifying_exam_maths").style.display='none';
       
    }


}

function WrittenComp(){
if (document.getElementById('comprehensive_exam_yes').checked) {
        document.getElementById('written_comp_div').style.display = 'block';
    }
    else
    {    
        document.getElementById('written_comp_div').style.display = 'none';
        $('#written_Table').find("tr:gt(1)").remove();
        $('.written_comprehensive').val("");

 

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

//I really dont understand what this does?
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


var Publication=jQuery.makeArray();
var Presentation=jQuery.makeArray();
var Current_goal=jQuery.makeArray();
var Future_goal=jQuery.makeArray();
var Signature=jQuery.makeArray();
var CourseGrade=jQuery.makeArray();
var QualifyingExam=jQuery.makeArray();
var WrittenExam=jQuery.makeArray();
var Mail=jQuery.makeArray();
var Degree_select=$('#degree_select').val();
var Academic_year=$("#academic_year").val();
var First_name=$('#first_name').val();
var Second_name=$('#second_name').val();
var Asu_id=$('#asu_id').val();
var Student_mail=$('#student_mail').val()+'@asu.edu';
var Prog_start_date=$('#prog_start_date').val();
var Sem_in_prog=$('#sem_in_prog').val();
var Cum_gpa=$('#cum_gpa').val();
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
                flag="false";
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





if(!$("input:radio[name='comprehensive_exam']").is(":checked"))
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
/*

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
/*When all the conditions for the form is met then 
the flag will be set to true and will take in all the values from the form*/
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

$.each($('#coursegrade_table_body tr'),function(i,tr){
    
    CourseGrade[i]=$('.coursegrade'+i).find('.course').val()+','+$('.coursegrade'+i).find('.grade').val();
});


$.each($('#advisor_table_body tr'),function(i,tr){

if($('.signature'+i).find('.advisor_mail').val()===$('.signature'+i).find('.advisor_remail').val()){

	Mail[i]=$('.signature'+i).find('.advisor_mail').val()

}
});

if($("input:radio[id='exam_yes']").is(":checked"))
{
    $.each($('#qualifying_table_body'+token+' tr'),function(i,tr){
        
        QualifyingExam[i]=$('.qualifyingexam'+i).find('.qualifying_details').val()+','+$('.qualifyingexam'+i).find('.qualifying_grades').val();
    });
}
$.each($('#written_table_body tr'),function(i,tr){
    
    WrittenExam[i]=$('.writtenexam'+i).find('.written_comprehensive').val()+','+$('.writtenexam'+i).find('.written_grades').val();
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
fd.append('qualify_exam',QualifyingExam);
fd.append('written_exam',WrittenExam);
fd.append('publication',Publication);
fd.append('presentation',Presentation);
fd.append('first_name',First_name);
fd.append('second_name',Second_name);
fd.append('asu_id',Asu_id);
fd.append('student_mail',Student_mail);
fd.append('prog_start_date',Prog_start_date);
fd.append('sem_in_prog',Sem_in_prog);
fd.append('cum_gpa',Cum_gpa);
fd.append('advisory_committee',Advisory_committee);
fd.append('signature',Signature);
fd.append('main_advisor',Main_advisor);
fd.append('mail',Mail);
fd.append('met_advisor',Met_advisor);
fd.append('advisory_committee_reason',Advisory_committee_reason);
fd.append('comprehensive_exam',Comprehensive_exam);
fd.append('oral_comprehensive_exam',Oral_comprehensive_exam);
fd.append('qualifying_exam',Qualifying_exam);
fd.append('colloquium',Colloquium);
fd.append('colloquium_reason',Colloquium_reason);
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
    //alert(fd);
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

