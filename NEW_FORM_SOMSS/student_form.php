<html lang="en">
<head>
  <title>FORM</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src = "./student.js"></script>
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
<style>
.hide-calendar .ui-datepicker-calendar {
    display: none;
}
.star
{
	color:red;
}
/*
#degree_program
{
	width: ;
}
*/
</style>

</head>
<body>
<div class="container">
<h1><center><u>SCHOOL OF MATHEMATICAL & STATISTICAL SCIENCES</u></center></h1>
 <h2><center>PhD Program Report Form</center></h2>
<br></br>
<form class="form-horizontal" role="form" method="POST"  enctype="multipart/form-data"  action="data1.php">
 <div class="form-group" id="degree_program">
      <label class="control-label col-md-2" for="degree_select">Doctoral Degree Program<sup class="star">*</sup></label>
      <div class="col-md-3">
        <select class="form-control" id="degree_select" name="degree_select">
        <option value="Applied Mathematics">Applied Mathematics</option>
	<option value="Mathematics">Mathematics</option>
	<option value="Mathematics Education">Mathematics Education</option>
	<option value="Statistics">Statistics</option>
        </select>
      </div>
 </div>

<p><h3><b>Section A | Program of Study Status</b></h3></p>

    <div class="form-group">
      <label class="control-label col-md-10" for="academic_year">Academic year:<sup class="star">*</sup></label>
      <div class="col-md-2">
        <input type="text" class="form-control" id="academic_year" name="academic_year" data-calendar="true">
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-md-2" for="first_name">First Name:<sup class="star">*</sup></label>
      <div class="col-md-2">          
        <input type="text" class="form-control" id="first_name" name="first_name" placeholder="Enter First Name">
      </div>
      <label class="control-label col-md-2" for="second_name">Last Name:<sup class="star">*</sup></label>
      <div class="col-md-2">        
        <input type="text" class="form-control" id="second_name" name="second_name" placeholder="Enter Second Name">
      </div>
      <label class="control-label col-md-2" for="asu_id">ASU ID/Student ID Number:<sup class="star">*</sup></label>
      <div class="col-md-2">          
        <input type="text" class="form-control" id="asu_id" name="asu_id" placeholder="ASU ID/Student ID">
      </div>
    </div>


    <div class="form-group">
      <label class="control-label col-md-2" for="student_mail">ASURITE ID:<sup class="star">*</sup></label>
      <div class="col-md-2"defense_completion_date>
        <input type="text" class="form-control" id="student_mail" name="student_mail" placeholder="Student ASURITE ID">
      </div>
      <label class="control-label col-md-2" for="prog_start_date">Program Start Date:<sup class="star">*</sup></label>
      <div class="col-md-2">          
        <input type="text" class="form-control" id="prog_start_date" name="prog_start_date" data-calendar="false">
      </div>
      <label class="control-label col-md-2" for="sem_in_prog">Semester in Progress<sup class="star">*</sup></label>
      <div class="col-md-2">          
	<select class="form-control" id="sem_in_prog" name="sem_in_prog">
	<option value="First">First</option>
	<option value="Second">Second</option>
	<option value="Third">Third</option>
	<option value="Fourth">Fourth</option>
	<option value="Fifth">Fifth</option>
	<option value="Sixth">Sixth</option>
	<option value="Seventh">Seventh</option>
        <option value="Eight">Eight</option>
        <option value="Ninth">Ninth</option>
        <option value="Tenth">Tenth</option>
        <option value="Eleventh">Eleventh</option>
        <option value="Twelfth">Twelfth</option>



	</select>     
      </div>
   </div>
   
    <div class="form-group">
      <label class="control-label col-md-4">Courses taken since last progress report with grades:</label>
      <label class="control-label col-md-2">Semester GPA<sup class="star">*</sup></label>
      <label class="control-label col-md-1" for="spring_gpa">Spring:<sup class="star">*</sup></label>
      <div class="col-md-1">          
        <input type="text" class="form-control" id="spring_gpa" name="spring_gpa" onkeyup="sum();">
      </div>
      <label class="control-label col-md-1" for="fall_gpa">Fall:<sup class="star">*</sup></label>
      <div class="col-md-1">          
        <input type="text" class="form-control" id="fall_gpa" name="fall_gpa" onkeyup="sum();">
      </div>
      <label class="control-label col-md-1" for="cum_gpa">CGPA:<sup class="star">*</sup></label>
      <div class="col-md-1">          
        <input type="text" class="form-control" id="cum_gpa" name="cum_gpa">
      </div>
    </div>

    <div class="form-group">
      <div class="col-md-1">
        <input type="button" value="+" class="form-control" onclick="addRow('dataTable')">
      </div>
      <div class="col-md-1">
        <input type="button" value="-" class="form-control" onclick="delRow('dataTable')">
      </div>
    </div>
<div class="table-responsive">
    <table id="dataTable">
       <thead>
         <tr class='academics'>
           <th><center><label for="course">Course<sup class="star">*</sup></label></center></th>
           <th><label for="grade">Grade<sup class="star">*</sup></label></th>
        </tr>
        </thead>
        <tbody id="coursegrade_table_body">
        <tr class="coursegrade0">
           <td><input name="course" type="text" class="course" size="70"></td>
           <td> <select name="grade" class="grade">
			<option value="A+">A+</option>
			<option value="A">A</option>
			<option value="A-">A-</option>
			<option value="B+">B+</option>
			<option value="B">B</option>
			<option value="B-">B-</option>
			<option value="C+">C+</option>
			<option value="C">C</option>
			<option value="D">D</option>
			<option value="E">E</option>
			<option value="I">I</option>
			<option value="NR">NR</option>
			<option value="P">P</option>
			<option value="W">W</option>
			<option value="X">X</option>
			<option value="Y">Y</option>
			<option value="Z">Z</option>
			<option value="XE">XE</option>
		</select></td>
        </tr>
    </tbody>
</table>
</div>


<p>
<i><b>
Students are ultimately responsible for ensuring that they meet program requirements. The Chair and the committee members with Graduate Advisor must ensure
that each student follows the guidelines and meets the program requirements.
</b></i>
</p>

 <div class="form-group">
      <label class="control-label col-md-8" for="advisory_committee">Advisory Committee Formed?<sup class="star">*</sup></label>
<div id="adv_committee"> 
     <label class="control-label col-md-1">Yes</label>
      <div class="col-md-1">
        <input type="radio" name="advisory_committee" onclick='Member()' class='advisory_committee' id="advisory_committee_yes" value="1">
	</div>
      <label class="control-label col-md-1">No</label>
      <div class="col-md-1">
        <input type="radio" name="advisory_committee" onclick='Member()'class='advisory_committee' id="advisory_committee_no" value="0">
      </div>
    </div>
</div>

<div id="advisor_member_div" style="display:none">
<div class="form-group"> 
	<div class="col-md-1">
	<input type="button" value="+" class="form-control" onclick="addRow('advisor_Table')">
	</div>
	<div class="col-md-1">
	<input type="button" value="-" class="form-control" onclick="delRow('advisor_Table')">
	</div>
</div>
<div class="table-responsive">
    <table id="advisor_Table">
       <thead>
         
           <th><center><label for="advisor_member" >CHAIR/CO-CHAIR/MEMBER</label></center></th>
           <th><label for="advisor_firstname" >FIRSTNAME</label></th>
	   <th><label for="advisor_secondname" >LASTNAME</label></th>
	   <th><label for="advisor_mail" >E-MAIL ID</label></th>
	   <th><label for="advisor_remail" >RE-ENTER E-MAIL ID</label></th>
        
        </thead>
        <tbody id="advisor_table_body">
        <tr class="signature0">
	   <td><select class="advisor_member" name="advisor_member">
		<option>CHAIR</option>
		<option>CO-CHAIR</option>
		<option>MEMBER</option>
		</select>
	   </td>
           <td><input name="advisor_firstname" type="text" class="advisor_firstname" size="30" ></td>
           <td> <input name="advisor_secondname" type="text" class="advisor_secondname" size="30"> </td>
	   <td> <input name="advisor_mail" type="text" class="advisor_mail" size="30"> </td>
	   <td> <input name="advisor_remail" type="text" class="advisor_remail" size="30"> </td>
        </tr>
    </tbody>
</table>
</div>
</div>



 <div class="form-group">
      <label class="control-label col-md-8" for="advisor">Has the student met the Chair and committee during the reporting period? If not,
give reasons below<sup class="star">*</sup></label>
<div id="advisor">
      <label class="control-label col-md-1">Yes</label>
      <div class="col-md-1">
	<input type="radio" name="met_advisor" onclick="TextBox()" id="committee_formed_yes" class="met_advisor" value="1">
      </div>
      <label class="control-label col-md-1">No</label>
      <div class="col-md-1">
        <input type="radio" name="met_advisor" onclick="TextBox()" id="committee_formed_no" class="met_advisor" value="0">
      </div>
    </div>
</div>

<div class="form-group" id="textbox" style="display:none">
      <label class="control-label col-md-4" for="advisory_committee_reason">Reason for not having an advisory committee yet<sup class="star">*</sup></label>
      <div class="col-md-8" for="advisory_committee_reason">
        <textarea rows="10" cols="70" name="advisory_committee_reason" id="advisory_committee_reason"></textarea>
      </div>
    </div>



<br><br>
<p></p><h3><b>Section B | Student's Progress</b></h3><p></p>
<br><br>


<div class="form-group">
      <label class="control-label col-md-4" for="qualifying_exam">Qualifying Exam Completed?<sup class="star">*</sup></label>
        <div="qualifying_exam">
             <label class="control-label col-md-1">Yes</label>
                 <div class="col-md-1">
                 <input type="radio" name="qualifying_exam" id="exam_yes" class="qualifying_exam" onclick="completion_date()" value="1">
                 </div>
             <label class="control-label col-md-1">No</label>
                 <div class="col-md-1">
                <input type="radio" name="qualifying_exam" id="exam_no" class="qualifying_exam" onclick="completion_date()" value="0">
               </div> 
   	     <div id="completion_date" style="display:none">
                <label class="control-label col-md-1" for="anticipated_qualifying_date">Anticipated Completion date<sup class="star">*</sup></label>
                 <div class="col-md-2">
                 <input type="text" name="anticipated_qualifying_date" id="anticipated_qualifying_date" data-calendar="false">
                </div>
        </div>
   
</div>


<div id ='Q-exam' style='display:none'>
<div class="form-group">
        <div>
        <div class="col-md-1">
                <input type="button" value="+" class="form-control" onclick="addRow('qualifying_Table')">
        </div>
                <div class="col-md-1">
                        <input type="button" value="-" class="form-control" onclick="delRow('qualifying_Table')">
                </div>
        </div>
</div>



<div class="table-responsive">
        <div>
            <table id="qualifying_Table">
                 <thead>
                        <tr>
                        <th><label for="qualifying_details">SR.NO</label></th>
                         <th><center><label for="qualifying_details">Qualifying Exam Subjects<sup class="star">*</sup></label> </center></th>
                       	<th><center><label for="qualifying_details">Date Of qualification<sup class="star">*</sup></label> </center></th>

			 </tr>
                </thead>
<tbody>
                        <tr>
                        <td><input type="text" size="2" maxlength="2" value="1"></td>
			<td> <input name="qualifying_details" class="qualifying_details" type="text" size="70"> </td>
			<td> <input name="date_of_qualification" class="date_of_qualification" type="text" data-calendar="false" > </td>
                        </tr>
                </tbody>
            </table>
        </div>
</div>
</div>




<div class="form-group">
      <label class="control-label col-md-4" for="comprehensive_exam">Written Comprehensive Exam Completed?<sup class="star">*</sup></label>

      <label class="control-label col-md-1">Yes</label>
      <div class="col-md-1">
        <input type="radio" name="comprehensive_exam" id="comprehensive_exam" value="1">
      </div>
      <label class="control-label col-md-1">No</label>
      <div class="col-md-1">
        <input type="radio" name="comprehensive_exam" id="comprehensive_exam" value="0">
      </div>
    </div>

<div class="form-group"  id="oral_comprehensive_exam_id">
      <label class="control-label col-md-4" for="oral_comprehensive_exam">Oral Comprehensive Exam Completed?<sup class="star">*</sup></label>

      <label class="control-label col-md-1">Yes</label>
      <div class="col-md-1">
        <input type="radio" name="oral_comprehensive_exam" id="oral_comprehensive_exam" value="1">
      </div>
      <label class="control-label col-md-1">No</label>
      <div class="col-md-1">
        <input type="radio" name="oral_comprehensive_exam" id="oral_comprehensive_exam" value="0">
      </div>
    </div>


<div class="form-group" id="coll">
      <label class="control-label col-md-4" for="colloquium">Colloquium/Distinguished Lecture Series Attended?<sup class="star">*</sup></label>

      <label class="control-label col-md-1">Yes</label>
      <div class="col-md-1">
        <input type="radio" name="colloquium" id="colloquium_yes" class="colloquium" onclick="Colloquium()" value="1">
      </div>
      <label class="control-label col-md-1">No</label>
      <div class="col-md-1">
        <input type="radio" name="colloquium" id="colloquium_no" class="colloquium" onclick="Colloquium()" value="0">
      </div>
    </div>

<div class="form-group" id="textbox1" style="display:none">
      <label class="control-label col-md-4" for="colloquium_reason">If yes how many?<sup class="star">*</sup></label>
      <div class="col-md-8" for="colloquium_reason">
        <textarea rows="1" cols="10" name="colloquium_reason" id="colloquium_reason"></textarea>
      </div>
    </div>


<div class="form-group">
      <label class="control-label col-md-4" for="dissertation_prospectus">Oral Dissertation Prospectus Completed?<sup class="star">*</sup></label>
        <div="dissertation_prospectus">
             <label class="control-label col-md-1">Yes</label> <!--if yes we need to pop for defense-->
                 <div class="col-md-1">
                 <input type="radio" name="dissertation_prospectus" id="exam_given" class="dissertation_prospectus" onclick="completion_date_dissertation_prospectus()" value="1">
                 </div>
             <label class="control-label col-md-1">No</label>
                 <div class="col-md-1">
                <input type="radio" name="dissertation_prospectus" id="exam_not" class="dissertation_prospectus" onclick="completion_date_dissertation_prospectus()" value="0">
                </div>
        <div id="completion_date_dissertation_prospectus" style="display:none">
                <label class="control-label col-md-1" for="anticipated_dissertation_prospectus_date">Anticipated Completion date<sup class="star">*</sup></label>
                 <div class="col-md-2">
                 <input type="text" name="anticipated_dissertation_prospectus_date" id="anticipated_dissertation_prospectus_date" data-calendar="false">
                </div>
        </div>
</div>


<div class="form-group" id="ifyes" style="display:none">
<label class="control-label col-md-4">Oral Defense of the Dissertation Completed?</label>
      <label class="control-label col-md-1" for="defense">Yes</label>
      <div class="col-md-1">
        <input type="radio" name="defense" id="defense_yes" class="defense"  onclick="Disertation_completion()" value="1">
      </div>
      <label class="control-label col-md-1" for="defense">No </label>
      <div class="col-md-1">
        <input type="radio" name="defense" id="defense_no" class="defense" onclick="Disertation_completion()" value="0">
      </div>
         <div id="defense_date" style="display:none" >
                <label class="control-label col-md-1" for="defense_completion_date">Anticipated Defense Completion date<sup class="star">*</sup></label>
                 <div class="col-md-2">
                 <input type="text" name="defense_completion_date" id="defense_completion_date" data-calendar="false">
                </div>
        </div>

</div>


<div class="form-group">
      <label class="control-label col-md-4" for="research_completed">Research Completed?<sup class="star">*</sup></label>

      <label class="control-label col-md-1">Yes</label>
      <div class="col-md-1">
        <input type="radio" name="research_completed" id="research_completed" value="1">
      </div>
      <label class="control-label col-md-1">No</label>
      <div class="col-md-1">
        <input type="radio" name="research_completed" id="research_completed" value="0">
      </div>

</div>
<p><b>Outline the goals met in this reporting period</b></p>

<div class="form-group">
      <div class="col-md-1">
        <input type="button" value="+" class="form-control" onclick="addRow('current_Table')">
      </div>
      <div class="col-md-1">
        <input type="button" value="-" class="form-control" onclick="delRow('current_Table')">
      </div>
    </div>

<div class="table-responsive">
    <table id="current_Table">
       <thead>
         <tr>
           <th><label for="current_goal">SR.NO</label></th>
           <th><center><label for="current_goal">Current accomplished Goals<sup class="star">*</sup></label> </center></th>
        </tr>
        </thead>
        <tbody>
        <tr>
           <td><input type="text" size="2" maxlength="2" value="1"></td>
           <td> <input name="current_goal" class="current_goal" type="text" size="70"> </td>
        </tr>
    </tbody>
</table>
</div>

<p><b>Publications <i>(list professional publications since last progress report)</i></b></p>

<div class="form-group">
      <div class="col-md-1">
        <input type="button" value="+" class="form-control" onclick="addRow('publication_Table')">
      </div>
      <div class="col-md-1">
        <input type="button" value="-" class="form-control" onclick="delRow('publication_Table')">
      </div>
    </div>

<div class="table-responsive">
    <table id="publication_Table">
       <thead>
         <tr>
           <th><label for="publication">SR.NO</label></th>
           <th><center><label for="publication">Publications<sup class="star">*</sup></label> </center></th>
        </tr>
        </thead>
        <tbody>
        <tr>
           <td><input type="text" size="2" maxlength="2" value="1"></td>
           <td> <input name="publication" class="publication" type="text" size="70"> </td>
        </tr>
    </tbody>
</table>
</div>

<p><b>Presentations <i>(list formal presentations,contributed or invited talks at conference,workshops,poster presentation etc.)</i></b></p>

<div class="table-responsive">
      <div class="col-md-1">
        <input type="button" value="+" class="form-control" onclick="addRow('presentation_Table')">
      </div>
      <div class="col-md-1">
        <input type="button" value="-" class="form-control" onclick="delRow('presentation_Table')">
      </div>
    </div>

<div class="table-responsive">
    <table id="presentation_Table">
       <thead>
         <tr>
           <th><label for="presentation">SR.NO</label></th>
           <th><center><label for="presentation">Presentations<sup class="star">*</sup> </label></center></th>
        </tr>
        </thead>
        <tbody>
        <tr>
           <td><input type="text" size="2" maxlength="2" value="1"></td>
           <td> <input name="presentation" class="presentation" type="text" size="70"> </td>
        </tr>
    </tbody>
</table>
</div>
<p><b>Outline the goals for the next academic year<i>(List of program milestones and major professional events)</i></b></p>
<div class="table-responsive">
      <div class="col-md-1">
        <input type="button" value="+" class="form-control" onclick="addRow('future_Table')">
      </div>
      <div class="col-md-1">
        <input type="button" value="-" class="form-control" onclick="delRow('future_Table')">
      </div>
    </div>

<div class="table-responsive">
    	<table id="future_Table">
       <thead>
         <tr>
           <th><label for="future_goal">SR.NO</label></th>
           <th><center><label for="future_goal">Future Goals<sup class="star">*</sup></label> </center></th>
        </tr>
        </thead>
        <tbody>
        <tr>
           <td><input type="text" size="2" maxlength="2" value="1"></td>
           <td> <input name="future_goal" class="future_goal" type="text" size="70"> </td>
        </tr>
    </tbody>
</table>
</div>
<div class="form-group">
        <label class="control-label col-md-7">Please attach your current iPOS<br>(Go to iPOS summary page, click “Print Approval Page” link and create a PDF to upload.)</label>
	<div class="col-md-3">
		<input type="file" id="file" name="file">
	</div>
</div>

<div class="form-group">
	
      <label class="control-label col-md-6" for="extra">Please mention if you wish to add anymore to this form</label><sup><i>(optional)</i></sup>
      <textarea class="form-control" name="extra" id="extra"></textarea>
    </div>

    <div class="form-group">        
      <div class="col-md-offset-2 col-md-10">
        <div class="checkbox">
          <label><input type="checkbox" value="true" name="certify" id="certify">I certify that the above information given is true and complete to the best of my knowledge.</label>
        </div>
      </div>
    </div>
    <div class="form-group">        
      <div class="col-md-offset-2 col-md-10">
      <button id="myButton" class="submit">SUBMIT</button>
	</div>
    </div>

  </form>
</div>
</body>
</html>
