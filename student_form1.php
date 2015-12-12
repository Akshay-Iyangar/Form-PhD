<?php

include('connect.php');
$ASU_ID=$_GET['ID'];
$sql = "SELECT * from Form_data_gumel.form where ASU_ID='$ASU_ID'";
$retval = mysqli_query($conn,$sql);
if (!$retval) {
  echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
while($row = mysqli_fetch_array($retval, MYSQL_ASSOC))
{

echo"
<html lang='en'>
<head>
  <title>FORM</title>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>

  <link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css'>
  <script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js'></script>
  <script src='https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js'></script>
  <link rel='stylesheet' href='//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css'>
  <script src = './student.js'></script>
  <script src='//code.jquery.com/jquery-1.10.2.js'></script>
  <script src='//code.jquery.com/ui/1.11.4/jquery-ui.js'></script>
<style>
.hide-calendar .ui-datepicker-calendar {
    display: none;
}
.star
{
  color:red;
}

</style>

</head>
<body>
<div class='container'>
<h1><center><u>SCHOOL OF MATHEMATICAL & STATISTICAL SCIENCES</u></center></h1>
 <h2><center>PhD Program Report Form</center></h2>
<br></br>
<form class='form-horizontal' role='form' method='POST'  enctype='multipart/form-data'  action='data1.php'>
 <div class='form-group' id='degree_program'>
      <label class='control-label col-md-2' for='degree_select'>Doctoral Degree Program<sup class='star'>*</sup></label>
      <div class='col-md-3'>
        <select class='form-control' id='degree_select' name='degree_select' onchange='SelectDegree()'> 
            <option disabled selected> -- select an option -- </option>
            <option value='Applied Mathematics'>Applied Mathematics</option>
            <option value='Mathematics'>Mathematics</option>
            <option value='Mathematics Education'>Mathematics Education</option>
            <option value='Statistics'>Statistics</option>
        </select>
      </div>
 </div>

<p><h3><b>Section A | Program of Study Status</b></h3></p>

    <div class='form-group'>
      <label class='control-label col-md-10' for='academic_year'>Academic year:<sup class='star'>*</sup></label>
      <div class='col-md-2'>
        <input type='text' class='form-control' id='academic_year' name='academic_year' data-calendar='true'>
      </div>
    </div>

    <div class='form-group'>
      <label class='control-label col-md-2' for='first_name'>First Name:<sup class='star'>*</sup></label>
      <div class='col-md-2'>          
        <input type='text' class='form-control' id='first_name' name='first_name' placeholder='Enter First Name' value={$row['First_Name']}>
      </div>
      <label class='control-label col-md-2' for='second_name'>Last Name:<sup class='star'>*</sup></label>
      <div class='col-md-2'>        
        <input type='text' class='form-control' id='second_name' name='second_name' placeholder='Enter Second Name' value={$row['Second_Name']}>
      </div>
      <label class='control-label col-md-2' for='asu_id'>ASU ID/Student ID Number:<sup class='star'>*</sup></label>
      <div class='col-md-2'>          
        <input type='text' class='form-control' id='asu_id' name='asu_id' placeholder='ASU ID/Student ID' value={$row['ASU_ID']}>
      </div>
    </div>


    <div class='form-group'>
      <label class='control-label col-md-2' for='student_mail'>ASURITE ID:<sup class='star'>*</sup></label>
      <div class='col-md-2'defense_completion_date>
        <input type='text' class='form-control' id='student_mail' name='student_mail' placeholder='Student ASURITE ID'>
      </div>
      <label class='control-label col-md-2' for='prog_start_date'>Program Start Date:<sup class='star'>*</sup></label>
      <div class='col-md-2'>          
        <input type='text' class='form-control' id='prog_start_date' name='prog_start_date' data-calendar='false' value={$row['Program_start_date']}>
      </div>
      <label class='control-label col-md-2' for='sem_in_prog'>Semester in Progress<sup class='star'>*</sup></label>
      <div class='col-md-2'>          
  <select class='form-control' id='sem_in_prog' name='sem_in_prog'>
  <option value='First'>First</option>
  <option value='Second'>Second</option>
  <option value='Third'>Third</option>
  <option value='Fourth'>Fourth</option>
  <option value='Fifth'>Fifth</option>
  <option value='Sixth'>Sixth</option>
  <option value='Seventh'>Seventh</option>
        <option value='Eight'>Eight</option>
        <option value='Ninth'>Ninth</option>
        <option value='Tenth'>Tenth</option>
        <option value='Eleventh'>Eleventh</option>
        <option value='Twelfth'>Twelfth</option>



  </select>     
      </div>
   </div>
   
    <div class='form-group'>
      
          
      <label class='control-label col-md-2' for='cum_gpa'>CGPA:<sup class='star'>*</sup></label>
      <div class='col-md-2'>          
        <input type='text' class='form-control' id='cum_gpa' name='cum_gpa' value={$row['CGPA']}>
      </div>
    </div>
    <div class='form-group'>
     
    </div>
    <div class='form-group'>
      <div class='col-md-1'>
        <input type='button' value='+' class='form-control' onclick='addRow(\"dataTable\")'>
      </div>
      <div class='col-md-1'>
        <input type='button' value='-' class='form-control' onclick='delRow(\"dataTable\")'>
      </div>
    </div>

<div class='table-responsive'>
    <table id='dataTable'>
       <thead>
         <tr class='academics'>
           <th><center><label for='course'>Course<sup class='star'>*</sup></label></center><font size='2'><i>Courses taken since last progress with grades<i></font></th>
           <th><label for='grade'>Grade<sup class='star'>*</sup></label></th>
        </tr>
        </thead>
        <tbody id='coursegrade_table_body'>
        <tr class='coursegrade0'>
           <td><input name='course' type='text' class='course' size='70'></td>
           <td> <select name='grade' class='grade'>
      <option value='A+'>A+</option>
      <option value='A'>A</option>
      <option value='A-'>A-</option>
      <option value='B+'>B+</option>
      <option value='B'>B</option>
      <option value='B-'>B-</option>
      <option value='C+'>C+</option>
      <option value='C'>C</option>
      <option value='D'>D</option>
      <option value='E'>E</option>
      <option value='I'>I</option>
      <option value='NR'>NR</option>
      <option value='P'>P</option>
      <option value='W'>W</option>
      <option value='X'>X</option>
      <option value='Y'>Y</option>
      <option value='Z'>Z</option>
      <option value='XE'>XE</option>
    </select></td>
        </tr>
    </tbody>
</table>
</div>



 <div class='form-group'>
 
      <label class='control-label col-md-4' for='advisory_committee'>Advisory Committee Formed?<sup class='star'>*</sup></label>
<div id='adv_committee'> 
     <label class='control-label col-md-1'>Yes</label>

      <div class='col-md-1'>
      
   
        <input type='radio' name='advisory_committee'  onclick='Member()' class='advisory_committee' id='advisory_committee_yes' value='1'";
          if($row['Adivisory_Committee']==='0')echo "checked='checked' 'Member()'";echo">
  </div>
      <label class='control-label col-md-1'>No</label>
      <div class='col-md-1'>
      
        <input type='radio' name='advisory_committee' onclick='Member()'class='advisory_committee' id='advisory_committee_no' value='0'";
        if($row['Adivisory_Committee']==='1')echo "checked='checked' ";echo">
      
      </div>
    </div>
</div>

<div id='advisor_member_div' style='display:none'>
<div class='form-group'> 
  <div class='col-md-1'>
  <input type='button' value='+' class='form-control' onclick='addRow(\"advisor_Table\")'>
  </div>
  <div class='col-md-1'>
  <input type='button' value='-' class='form-control' onclick='delRow(\"advisor_Table\")'>
  </div>
</div>
<div class='table-responsive'>
    <table id='advisor_Table'>
       <thead>
         
           <th><center><label for='advisor_member' >CHAIR/CO-CHAIR/MEMBER</label></center></th>
           <th><label for='advisor_firstname' >FIRSTNAME</label></th>
     <th><label for='advisor_secondname' >LASTNAME</label></th>
     <th><label for='advisor_mail' >E-MAIL ID</label></th>
     <th><label for='advisor_remail' >RE-ENTER E-MAIL ID</label></th>
        
        </thead>
        <tbody id='advisor_table_body'>
        <tr class='signature0'>
     <td><select class='advisor_member' name='advisor_member'>
    <option>CHAIR</option>
    <option>CO-CHAIR</option>
    <option>MEMBER</option>
    </select>
     </td>
           <td><input name='advisor_firstname' type='text' class='advisor_firstname' size='30' ></td>
           <td> <input name='advisor_secondname' type='text' class='advisor_secondname' size='30'> </td>
     <td> <input name='advisor_mail' type='text' class='advisor_mail' size='30'> </td>
     <td> <input name='advisor_remail' type='text' class='advisor_remail' size='30'> </td>
        </tr>
    </tbody>
</table>
</div>
</div>



 <div class='form-group'>
      <label class='control-label col-md-4' for='advisor'>Has the student met the Chair for the current academic year? If not,
give reasons below<sup class='star'>*</sup></label>
<div id='advisor'>
      <label class='control-label col-md-1'>Yes</label>
      <div class='col-md-1'>
  <input type='radio' name='met_advisor' onclick='TextBox()' id='committee_formed_yes' class='met_advisor' value='1'";
  if($row['Student_Advisory_Met']==='1')echo "checked='checked'";echo">
      </div>
      <label class='control-label col-md-1'>No</label>
      <div class='col-md-1'>
        <input type='radio' name='met_advisor' onclick='TextBox()' id='committee_formed_no' class='met_advisor' value='0'";
        if($row['Student_Advisory_Met']==='0')echo "checked='checked'";echo">
      </div>
    </div>
</div>

<div class='form-group' id='textbox' style='display:none'>
      <label class='control-label col-md-4' for='advisory_committee_reason'>Reason for not having an advisory committee yet<sup class='star'>*</sup></label>
      <div class='col-md-8' for='advisory_committee_reason'>
        <textarea rows='10' cols='70' name='advisory_committee_reason' id='advisory_committee_reason'></textarea>
      </div>
    </div>



<br><br>
<p></p><h3><b>Section B | Student's Progress</b></h3><p></p>
<br><br>

<!-- Applied Mathematics-->
<div id='qualifying_exam_applied_math' style='display:none'>
<div class='form-group'>
      <label class='control-label col-md-4' for='qualifying_exam'>Qualifying Exam Completed?<sup class='star'>*</sup></label>
        <div id='qualifying_exam'>
             <label class='control-label col-md-1'>Yes</label>
                 <div class='col-md-1'>
                 <input type='radio' name='qualifying_exam' id='exam_yes' class='qualifying_exam' onclick='completion_date()' value='1'";
                 if($row['Qualifying_Exam_Completed']==='1')echo "checked='checked'";echo">
                 </div>
             <label class='control-label col-md-1'>No</label>
                 <div class='col-md-1'>
                <input type='radio' name='qualifying_exam' id='exam_no' class='qualifying_exam' onclick='completion_date()' value='0'";
                if($row['Qualifying_Exam_Completed']==='0')echo "checked='checked'";echo">
               </div>    
        </div>
</div>


<div id ='Q-exam' style='display:none'>
<div class='form-group'>
        <div>
        <div class='col-md-1'>
                <input type='button' value='+' class='form-control' onclick='addRow(\"qualifying_Table\")'>
        </div>
                <div class='col-md-1'>
                        <input type='button' value='-' class='form-control' onclick='delRow(\"qualifying_Table\")'>
                </div>
        </div>
</div>



<div class='table-responsive'>
        <div>
            <table id='qualifying_Table'>
                 <thead>
                        <tr>
                        <th><label for='qualifying_details'>SR.NO</label></th>
                         <th><center><label for='qualifying_details'>Qualifying Exam Subjects<sup class='star'>*</sup></label> </center></th>
                        <th><center><label for='qualifying_grades'>Grades<sup class='star'>*</sup></label> </center></th>

       </tr>
                </thead>
<tbody id='qualifying_table_body1'>
                        <tr class='qualifyingexam0'>
                        <td><input type='text' size='2' maxlength='2' value='1'></td>
      
      <td> <select name='qualifying_details' class='qualifying_details'> 
            <option value='APM 501 Differential Equations I'>APM 501 Differential Equations I</option>
            <option value='APM 502 Differential Equations II'>APM 502 Differential Equations II</option>
            <option value='APM 503 Applied Analysis'>APM 503 Applied Analysis</option>
            <option value='APM 504 Applied Probability'>APM 504 Applied Probability</option>
            <option value='APM 505 Applied and Numerical Linear Algebra'>APM 505 Applied and Numerical Linear Algebra</option>
            <option value='APM 506 Scientific Computing'>APM 506 Scientific Computing</option>
          </select>
      </td>
      <td> <input name='qualifying_grades' class='qualifying_grades' type='text' size='5'> </td>
                        </tr>
                </tbody>
            </table>
        </div>
</div>
</div>

</div>


<!-- Mathematics Qualifying Exam-->
<div id='qualifying_exam_maths' style='display:none'>
<div class='form-group'>
      <label class='control-label col-md-4' for='qualifying_exam'>Qualifying Exam Completed?<sup class='star'>*</sup></label>
        <div id='qualifying_exam'>
             <label class='control-label col-md-1'>Yes</label>
                 <div class='col-md-1'>
                 <input type='radio' name='qualifying_exam' id='exam_yes_1' class='qualifying_exam' onclick='completion_date_1()' value='1'>
                 </div>
             <label class='control-label col-md-1'>No</label>
                 <div class='col-md-1'>
                <input type='radio' name='qualifying_exam' id='exam_no_1' class='qualifying_exam' onclick='completion_date_1()' value='0'>
               </div>    
        </div>
</div>



<div id ='Q-exam_1' style='display:none'>
<div class='form-group'>
        <div>
        <div class='col-md-1'>
                <input type='button' value='+' class='form-control' onclick='addRow(\"qualifying_Table_1\")'>
        </div>
                <div class='col-md-1'>
                        <input type='button' value='-' class='form-control' onclick='delRow(\"qualifying_Table_1\")'>
                </div>
        </div>
</div>



<div class='table-responsive'>
        <div>
            <table id='qualifying_Table_1'>
                 <thead>
                        <tr>
                        <th><label for='qualifying_details'>SR.NO</label></th>
                         <th><center><label for='qualifying_details'>Qualifying Exam Subjects<sup class='star'>*</sup></label> </center></th>
                        <th><center><label for='qualifying_grades'>Grades<sup class='star'>*</sup></label> </center></th>

       </tr>
                </thead>
<tbody id='qualifying_table_body2'>
                        <tr class='qualifyingexam0'>
                        <td><input type='text' size='2' maxlength='2' value='1'></td>
      
      <td> <select name='qualifying_details' class='qualifying_details'> 
            <option value='Algebra'>Algebra</option>
            <option value='Real Analysis'>Real Analysis</option>
            <option value='Discrete Mathematics'>Discrete Mathematics</option>
            <option value='Geometry/Topology'>Geometry/Topology</option>            
          </select>
      </td>
      <td> <select name='qualifying_grades' class='qualifying_grades'> 
            <option value='MS Pass'>MS Pass</option>
            <option value='PhD Pass'>PhD Pass</option>
            <option value='Fail'>Fail</option>
      </td>
                        </tr>
                </tbody>
            </table>
        </div>
</div>
</div>

</div>


<!-- Mathematics Education Qualifying Exam-->
<div id='qualifying_exam_math_edu' style='display:none'>
<div class='form-group'>
      <label class='control-label col-md-4' for='qualifying_exam'>Qualifying Exam Completed?<sup class='star'>*</sup></label>
        <div id='qualifying_exam'>
             <label class='control-label col-md-1'>Yes</label>
                 <div class='col-md-1'>
                 <input type='radio' name='qualifying_exam' id='exam_yes_2' class='qualifying_exam' onclick='completion_date_2()' value='1'>
                 </div>
             <label class='control-label col-md-1'>No</label>
                 <div class='col-md-1'>
                <input type='radio' name='qualifying_exam' id='exam_no_2' class='qualifying_exam' onclick='completion_date_2()' value='0'>
               </div>    
        </div>
</div>



<div id ='Q-exam_2' style='display:none'>
<div class='form-group'>
        <div>
        <div class='col-md-1'>
                <input type='button' value='+' class='form-control' onclick='addRow(\"qualifying_Table_2\")'>
        </div>
                <div class='col-md-1'>
                        <input type='button' value='-' class='form-control' onclick='delRow(\"qualifying_Table_2\")'>
                </div>
        </div>
</div>



<div class='table-responsive'>
        <div>
            <table id='qualifying_Table_2'>
                 <thead>
                        <tr>
                        <th><label for='qualifying_details'>SR.NO</label></th>
                         <th><center><label for='qualifying_details'>Qualifying Exam Subjects<sup class='star'>*</sup></label> </center></th>
                        <th><center><label for='qualifying_grades'>Grades<sup class='star'>*</sup></label> </center></th>

       </tr>
                </thead>
                <tbody id='qualifying_table_body3'>
                        <tr class='qualifyingexam0'>
                        <td><input type='text' size='2' maxlength='2' value='1'></td>
      
      <td> <select name='qualifying_details' class='qualifying_details'> 
            <optgroup label='Applied Mathematics'>
                    <option value='APM 501 Differential Equations I'>APM 501 Differential Equations I</option>
                    <option value='APM 502 Differential Equations II'>APM 502 Differential Equations II</option>
                    <option value='APM 503 Applied Analysis '>APM 503 Applied Analysis </option>
                    <option value='APM 504 Applied Probability'>APM 504 Applied Probability</option>
                    <option value='APM 505 Applied and Numerical Linear Algebra'>APM 505 Applied and Numerical Linear Algebra</option>
                    <option value='APM 506 Scientific Computing'>APM 506 Scientific Computing</option>
            </optgroup>
            <optgroup label='Mathematical Biology'>
                    <option value='AML 610 Topics in Applied Mathematics for the Life and Social Sciences'>AML 610 Topics in Applied Mathematics for the Life and Social Sciences</option>
                    <option value='APM 531 Mathematical Neurosciences I'>APM 531 Mathematical Neurosciences I</option>
                    <option value='AML 612 Applied Mathematics for the Life and social Sciences Modeling Seminar'>AML 612 Applied Mathematics for the Life and social Sciences Modeling Seminar</option>
                    <option value='AML 613 Probability and Stochastic Modeling for the Life and Social Sciences'>AML 613 Probability and Stochastic Modeling for the Life and Social Sciences</option>
            </optgroup>
            <optgroup label='Mathematics'>
                    <option value='MAT 512 Discrete Mathematics I'>MAT 512 Discrete Mathematics I</option>
                    <option value='MAT 513 Discrete Mathematics II'>MAT 513 Discrete Mathematics II</option>
                    <option value='MAT 516 Graph Theory I'>MAT 516 Graph Theory I</option>
                    <option value='MAT 517 Graph Theory II'>MAT 517 Graph Theory II</option>
                    <option value='MAT 543 Algebra I'>MAT 543 Algebra I</option>
                    <option value='MAT 544 Algebra II'>MAT 544 Algebra II</option>
                    <option value='MAT 570 Real Analysis I'>MAT 570 Real Analysis I </option>
                    <option value='MAT 571 Real Analysis II'>MAT 571 Real Analysis II</option>
            </optgroup>
            <optgroup label='Statistics'>
                    <option value='STP 501 Theory of Statistics 1'>STP 501 Theory of Statistics 1</option>
                    <option value='STP 502 Theory of Statistics 2'>STP 502 Theory of Statistics 2</option>
                    <option value='STP 525 Advance Probability'>STP 525 Advance Probability</option>
                    <option value='STP 526 Theory of Statistical Linear Model'>STP 526 Theory of Statistical Linear Model</option>
                    <option value='STP 527 Statistical Large Sample Theory'>STP 527 Statistical Large Sample Theory</option>
                    <option value='STP 530 Applied Regression Analysis'>STP 530 Applied Regression Analysis</option>
                    <option value='STP 531 Applied Analysis of Variance'>STP 531 Applied Analysis of Variance</option>
                    <option value='STP 532 Applied Nonparametric Statistics'>STP 532 Applied Nonparametric Statistics</option>
                    <option value='STP 533 Applied Multivariable Analysis'>STP 533 Applied Multivariable Analysis</option>
                    <option value='STP 535 Applied Sampling Methodology'>STP 535 Applied Sampling Methodology</option>
            </optgroup>            
          </select>
      </td>
      <td> <select name='qualifying_grades' class='qualifying_grades'> 
            <option value='MS Pass'>MS Pass</option>
            <option value='PhD Pass'>PhD Pass</option>
            <option value='Fail'>Fail</option>
      </td>
                        </tr>
                </tbody>
            </table>
        </div>
</div>
</div>

</div>

<!-- Statistics Qualifying Exam-->
<div id='qualifying_exam_stat' style='display:none'>
<div class='form-group' >
      <label class='control-label col-md-4' for='qualifying_exam'>Qualifying Exam Completed?<sup class='star'>*</sup></label>
        <div id='qualifying_exam'>
             <label class='control-label col-md-1'>Yes</label>
                 <div class='col-md-1'>
                 <input type='radio' name='qualifying_exam' id='exam_yes_3' class='qualifying_exam' onclick='completion_date_3()' value='1'>
                 </div>
             <label class='control-label col-md-1'>No</label>
                 <div class='col-md-1'>
                <input type='radio' name='qualifying_exam' id='exam_no_3' class='qualifying_exam' onclick='completion_date_3()' value='0'>
               </div>    
        </div>
</div>


<div id ='Q-exam_3' style='display:none'>
<div class='form-group'>
        <div>
        <div class='col-md-1'>
                <input type='button' value='+' class='form-control' onclick='addRow(\"qualifying_Table_3\")'>
        </div>
                <div class='col-md-1'>
                        <input type='button' value='-' class='form-control' onclick='delRow(\"qualifying_Table_3\")'>
                </div>
        </div>
</div>



<div class='table-responsive'>
        <div>
            <table id='qualifying_Table_3'>
                 <thead>
                        <tr>
                        <th><label for='qualifying_details'>SR.NO</label></th>
                         <th><center><label for='qualifying_details'>Qualifying Exam Subjects<sup class='star'>*</sup></label> </center></th>
                        <th><center><label for='qualifying_grades'>Grades<sup class='star'>*</sup></label> </center></th>

       </tr>
                </thead>
<tbody id='qualifying_table_body4'>
                        <tr class='qualifyingexam0'>
                        <td><input type='text' size='2' maxlength='2' value='1'></td>
      
      <td> <select name='qualifying_details' class='qualifying_details'> 
            <option value='STP 501/502 Theory of Statistics'>STP 501/502 Theory of Statistics</option>
            <option value='MAT 570 Real Analysis I/MAT 571 Real Analysis II'>MAT 570 Real Analysis I/MAT 571 Real Analysis II</option>
            <option value='APM 503 Applied Analysis/APM 504 Applied Probability'>APM 503 Applied Analysis/APM 504 Applied Probability</option>      
          </select>
      </td>
      <td> <select name='qualifying_grades' class='qualifying_grades'> 
            <option value='MS Pass'>MS Pass</option>
            <option value='PhD Pass'>PhD Pass</option>
            <option value='Fail'>Fail</option>
      </td>
                        </tr>
                </tbody>
            </table>
        </div>
</div>
</div>

</div>



<div class='form-group'>
      <label class='control-label col-md-4' for='comprehensive_exam'>Written Comprehensive Exam Completed?<sup class='star'>*</sup></label>

      <label class='control-label col-md-1'>Yes</label>
      <div class='col-md-1'>
        <input type='radio' name='comprehensive_exam' id='comprehensive_exam_yes' value='1' onclick='WrittenComp()'";
        if($row['Written_Comprehensive']==='1')echo "checked='checked'";echo">
      </div>
      <label class='control-label col-md-1'>No</label>
      <div class='col-md-1'>
        <input type='radio' name='comprehensive_exam' id='comprehensive_exam_no' value='0' onclick='WrittenComp()'";
        if($row['Written_Comprehensive']==='0')echo "checked='checked'";echo">
      </div>
</div>

<div id='written_comp_div' style='display:none'>
<div class='form-group'>
      <div class='col-md-1'>
        <input type='button' value='+' class='form-control' onclick='addRow(\"written_Table\")'>
      </div>
      <div class='col-md-1'>
        <input type='button' value='-' class='form-control' onclick='delRow(\"written_Table\")'>
      </div>
    </div>

<div class='table-responsive'>
    <table id='written_Table'>
       <thead>
         <tr>
           <th><label for='written_comprehensive'>SR.NO</label></th>
           <th><center><label for='written_comprehensive'>Written Comprehensive Exam<sup class='star'>*</sup></label> </center></th>
           <th><center><label for='written_grades'>Grades<sup class='star'>*</sup></label> </center></th>
        </tr>
        </thead>
        <tbody id='written_table_body'>
        <tr id='writtenexam0'>
           <td><input type='text' size='2' maxlength='2' value='1'></td>
           <td> <input name='written_comprehensive' class='written_comprehensive' type='text' size='70'> </td>
           <td> <select name='written_grades' class='written_grades'>
                  <option value='Pass'>Pass</option>
                  <option value='Fail'>Fail</option>
                </select>
         </td>
        </tr>
    </tbody>
</table>
</div>
</div>




<div class='form-group'  id='oral_comprehensive_exam_id'>
      <label class='control-label col-md-4' for='oral_comprehensive_exam'>Oral Comprehensive Exam Completed?<sup class='star'>*</sup></label>

      <label class='control-label col-md-1'>Yes</label>
      <div class='col-md-1'>
        <input type='radio' name='oral_comprehensive_exam' id='oral_comprehensive_exam' value='1'";
        if($row['Oral_Comprehensive']==='1')echo "checked='checked'";echo">
      </div>
      <label class='control-label col-md-1'>No</label>
      <div class='col-md-1'>
        <input type='radio' name='oral_comprehensive_exam' id='oral_comprehensive_exam' value='0'";
        if($row['Oral_Comprehensive']==='0')echo "checked='checked'";echo">
      </div>
    </div>


<div class='form-group' id='coll'>
      <label class='control-label col-md-4' for='colloquium'>Colloquium/Distinguished Lecture Series Attended?<sup class='star'>*</sup></label>

      <label class='control-label col-md-1'>Yes</label>
      <div class='col-md-1'>
        <input type='radio' name='colloquium' id='colloquium_yes' class='colloquium' onclick='Colloquium()' value='1'";
        if($row['Colloquium']==='1')echo "checked='checked'";echo">
      </div>
      <label class='control-label col-md-1'>No</label>
      <div class='col-md-1'>
        <input type='radio' name='colloquium' id='colloquium_no' class='colloquium' onclick='Colloquium()' value='0'";
        if($row['Colloquium']==='0')echo "checked='checked'";echo">
      </div>
    </div>

<div class='form-group' id='textbox1' style='display:none'>
      <label class='control-label col-md-4' for='colloquium_reason'>Tick if attended more than 75% of the colloquium lectures for mentioned semesters<sup class='star'>*</sup></label>
      <div class='col-md-8' for='colloquium_reason'>
        <input type='checkbox' name='colloquium_reason' id='colloquium_reason' value='Semester 1'>Semester 1
        <input type='checkbox' name='colloquium_reason' id='colloquium_reason' value='Semester 2'>Semester 2
        <input type='checkbox' name='colloquium_reason' id='colloquium_reason' value='Semester 3'>Semester 3
        <input type='checkbox' name='colloquium_reason' id='colloquium_reason' value='Semester 4'>Semester 4
        <!--<textarea rows='1' cols='10' name='colloquium_reason' id='colloquium_reason'></textarea>-->
      </div>
    </div>


<p><b>Outline the goals met in this reporting period</b></p>

<div class='table-responsive'>
      <div class='col-md-1'>
        <input type='button' value='+' class='form-control' onclick='addRow(\"current_Table\")'>
      </div>
      <div class='col-md-1'>
        <input type='button' value='-' class='form-control' onclick='delRow(\"current_Table\")'>
      </div>
    </div>

<div class='table-responsive'>
    <table id='current_Table'>
       <thead>
         <tr>
           <th><label for='current_goal'>SR.NO</label></th>
           <th><center><label for='current_goal'>Current accomplished Goals<sup class='star'>*</sup></label> </center></th>
        </tr>
        </thead>
        <tbody>
        <tr>
           <td><input type='text' size='2' maxlength='2' value='1'></td>
           <td> <input name='current_goal' class='current_goal' type='text' size='70'> </td>
        </tr>
    </tbody>
</table>
</div>
<br>

<div class='table-responsive'>
      <div class='col-md-1'>
        <input type='button' value='+' class='form-control' onclick='addRow(\"publication_Table\")'>
      </div>
      <div class='col-md-1'>
        <input type='button' value='-' class='form-control' onclick='delRow(\"publication_Table\")'>
      </div>
    </div>

<div class='table-responsive'>
    <table id='publication_Table'>
       <thead>
         <tr>
           <th><label for='publication'>SR.NO</label></th>
           <th><center><label for='presentation'>Publications<sup class='star'>*</sup></label></center><font size='2'><i>(List all the professional publications)</font></i></th>
        </tr>
        </thead>
        <tbody>
        <tr>
           <td><input type='text' size='2' maxlength='2' value='1'></td>
           <td> <input name='publication' class='publication' type='text' size='70'> </td>
        </tr>
    </tbody>
</table>
</div>
<br>
<div class='table-responsive'>
      <div class='col-md-1'>
        <input type='button' value='+' class='form-control' onclick='addRow(\"presentation_Table\")'>
      </div>
      <div class='col-md-1'>
        <input type='button' value='-' class='form-control' onclick='delRow(\"presentation_Table\")'>
      </div>
    </div>

<div class='table-responsive'>
    <table id='presentation_Table'>
       <thead>
         <tr>
           <th><label for='presentation'>SR.NO</label></th>
           <th><center><label for='presentation'>Presentations<sup class='star'>*</sup></label></center><font size='2'><i>(List formal presentations,contributed or invited talks at conference,workshops,poster presentation etc.)</font></i></th>
        </tr>
        </thead>
        <tbody>
        <tr>
           <td><input type='text' size='2' maxlength='2' value='1'></td>
           <td> <input name='presentation' class='presentation' type='text' size='70'> </td>
        </tr>
    </tbody>
</table>
</div>
<br>
<div class='table-responsive'>
      <div class='col-md-1'>
        <input type='button' value='+' class='form-control' onclick='addRow(\"future_Table\")'>
      </div>
      <div class='col-md-1'>
        <input type='button' value='-' class='form-control' onclick='delRow(\"future_Table\")'>
      </div>
    </div>
<div class='table-responsive'>
      <table id='future_Table'>
       <thead>
         <tr>
           <th><label for='future_goal'>SR.NO</label></th>
           <th><center><label for='presentation'>Future Goals<sup class='star'>*</sup></label></center><font size='2'><i>(List of program milestones and major professional events)</font></i></th>
        </tr>
        </thead>
        <tbody>
        <tr>
           <td><input type='text' size='2' maxlength='2' value='1'></td>
           <td> <input name='future_goal' class='future_goal' type='text' size='70'> </td>
        </tr>
    </tbody>
</table>
</div>
<div class='form-group'>
        <label class='control-label col-md-7'>Please attach your current iPOS<br>(Go to iPOS summary page, click “Print Approval Page” link and create a PDF to upload.)</label>
  <div class='col-md-3'>
    <input type='file' id='file' name='file'>
  </div>
</div>

<div class='form-group'>
  
      <label class='control-label col-md-6' for='extra'>Please mention if you wish to add anymore to this form</label><sup><i>(optional)</i></sup>
      <textarea class='form-control' name='extra' id='extra'></textarea>
    </div>

    <div class='form-group'>        
      <div class='col-md-offset-2 col-md-10'>
        <div class='checkbox'>
          <label><input type='checkbox' value='true' name='certify' id='certify'>I certify that the above information given is true and complete to the best of my knowledge.</label>
        </div>
      </div>
    </div>
    <div class='form-group'>        
      <div class='col-md-offset-2 col-md-10'>
      <button id='myButton' class='submit'>SUBMIT</button>
  </div>
    </div>

  </form>
</div>

</body>
</html>

";
}
/*

echo"
<div class='container'><div class='col-md-12'><center><label>STUDENT FORM ID:</label><input type='text' name='random' id='random' readonly value = '$FORM_ID'><center></div></div>
<tr><th>Degree Program</th><td>{$row['Degree']}
<tr><th>Academic Year</th><td>{$row['Academic_Year']}
<tr><th>First Name</th><td>{$row['First_Name']}</td></tr>
<tr><th>Last Name</th><td>{$row['Second_Name']}</td></tr>
<tr><th>ASU ID/Student ID</th><td>{$row['ASU_ID']}</td></tr>
<tr><th>Program Start Date</th><td>{$row['Program_start_date']}</td></tr>
<tr><th>Semester In Progress</th><td>{$row['Semester_in_progress']}</td></tr>
<tr><th>GPA Spring</th><td>{$row['GPA_Spring']}</td></tr>
<tr><th>GPA Fall</th><td>{$row['GPA_Fall']}</td></tr>
<tr><th>CGPA</th><td>{$row['CGPA']}</td></tr>
<tr><th>Courses taken since last progress report with grades</th>
<td>
<table align='center' border='1' style='width: auto;' class='table table-bordered'>
<thead>
<tr>
<th>Course and Grade</th>
</tr>
</thead>
<tbody>
<tr>
<td>{$row['Course']}</td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr><th>Advisory committee Formed?</th><td>$ADVISORY_COMMITTEE</td></tr>
<tr><th>People in the Advisory Committee</th>
<td>
<table align='center' border='1' style='width:auto;' class='table table-bordered'>
<thead>
<tr>
<th>Advisor,Co-advisors and Members</th>
</tr>
</thead>
<tbody>
<tr>
<td>{$row['Advisor_Team']}</td>
</tr>
</tbody>
</table>
<tr><th>Has the Student Met the Student Advisor and Advisory Committee?</th><td>$STUDENT_ADVISOR</td></tr>
<tr><th>Reason for not Meeting the Advisory Committee</th><td>{$row['Not_Met_Reason']}</td><tr>
<tr><th>Qualifying Exam Completed?</th><td>$QUALIFYING_EXAM</td></tr>
<tr><th>Anticipated Completion Date for Qualifying Exam</th><td>{$row['Qualifying_date']}</td></tr>
<tr><th>Qualifying Exam Subjects</th><td>{$row['Qualifying_Details']}</td></tr>
<tr><th>Written Comprehensive Exam Completed?</th><td>$COMPREHENSIVE</td></tr>
<tr><th>Oral Comprehensive Exam Completed?</th><td>$ORAL_COMPREHENSIVE</td></tr>
<tr><th>Colloquium lecture attended?</th><td>$COLLOQUIUM</td></tr>
<tr><th>How many lectures attended if Yes?</th><td>$COLLOQUIUM_REASON</td></tr>
<tr><th>Oral dissertation prospectus completed?</th><td>$DISSERTATION_PROSPECTUS</td></tr>
<tr><th>Anticipated completion date for oral dissertation prospectus?</th><td>{$row['Anticipated_Dissertation']}</td></tr>
<tr><th>Defense of dissertation Completed?</th><td>$DEFENSE</td></tr>
<tr><th>Anticipated completion date for defense of dissertation?</th><td>{$row['Defense_Completion_Date']}</td></tr>
<tr><th>Research Completed?</th><td>$RESEARCH_COMPLETED</td></tr>
<tr><th>Outline the goals met in this reporting period</th><td>{$row['current_goal']}</td></tr>
<tr><th>Publications</th><td>{$row['Publications']}</td></tr>
<tr><th>Presentations</th><td>{$row['Presentations']}</td></tr>
<tr><th>Outline the goals for the next academic year</th><td>{$row['future_goal']}</td></tr>
<tr><th>Additonal Details/Information</th><td>{$row['Extra']}</td></tr>
</table></div>
<div id='prompt_password' style='display:none'><p> Enter your Password for Authentication</p>PASSWORD:<input type='password' id='advisor_password'/></div>
";
if($row['Adivisory_Committee']==='0')
{
echo"
<div class='container'><div class='col-md-12'>
<p class='text-center'><b>The student has selected to have no advisors. Please immediately co-ordinate with the student and ask the student to form an Advisory Committee with Advisor and Co-advisors and members. The form cannot be approved till the student doesn't have an advisor.Please mention the Advisors and Co-advisors and members once the student has an Advisory Committee</b></p>
</div>
</div>
";
}
mysqli_close($conn);

}

echo"
</table>
";


echo"
<script>

console.log($ADVISOR_TEAM);
console.log($APPROVAL);

function main_advisor_check(){

  console.log($('#advisor_member :selected').val());
  console.log('function--------');
  var flag='true';
                if($VALIDATE==false && $('#advisor_member :selected').val()=='Graduate Co-ordinator')
                {
      console.log('if statement'\n);
                        alert('The form cannot be approved as of yet as there are Advisors who have still not approved the form');
      flag='false';
                
                }
return flag;
}

</script>

";


*/




?>