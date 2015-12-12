<!DOCTYPE html>
<html lang="en">
  <title>FORM for Advisor</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
  <script src="//code.jquery.com/jquery-1.10.2.js"></script>
  <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script src="./advisor_sherry.js"></script>
<script src="https://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/aes.js"></script>
<script>
var Asu_id = '<?php echo $ASU_ID= $_GET['ASU_ID']; ?>';
var Index = '<?php echo $INDEX= $_GET['index']; ?>';
console.log(Asu_id);

</script>

<style>
.datepicker {
    display: none;
}
</style>
<p><h3><b><center>ADVISORY COMMITTEE FORM</center></b></h3></p>
<table  align="center" border="2" style="width: auto;" class="table table-hover">
<?php
include('connect.php');

$ASU_ID= $_GET['ASU_ID'];
$sql = "SELECT * from Form_data_gumel.somss where ASU_ID='$ASU_ID'";
$retval = mysqli_query($conn,$sql);
if (!$retval) {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

while($row = mysqli_fetch_array($retval, MYSQL_ASSOC))
{

//Get all the data from Database
$row['Mail']=json_decode($row['Mail']);
$row['Course'] =json_decode($row['Course']);
$row['Grade']=json_decode($row['Grade']);
$row['Course']=implode("<br>",$row['Course']);
$row['Publications'] =json_decode($row['Publications']);
$row['Presentations']=json_decode($row['Presentations']);
$row['Publications']=implode("<br>",$row['Publications']);
$row['Presentations']=implode("<br>",$row['Presentations']);
$row['current_goal'] =json_decode($row['current_goal']);
$row['current_goal']=implode("<br>",$row['current_goal']);
$row['future_goal'] =json_decode($row['future_goal']);
$row['future_goal']=implode("<br>",$row['future_goal']);
$row['Qualifying_Details'] =json_decode($row['Qualifying_Details']);
$row['Qualifying_Details']=implode("<br>",$row['Qualifying_Details']);

$ADVISOR_TEAM=json_decode($row['Advisor_Team']);
$row['Advisor_Team']=implode("<br>",$ADVISOR_TEAM);
$APPROVAL=json_decode($row['Approved']);
//$APPROVAL=implode("<br>",$APPROVAL);
$MAIN_ADVISOR=$row['Admin_Advisor'];
$FORM_ID=19*$ASU_ID;


if($row['Written_Comprehensive']==='1'){$COMPREHENSIVE='Yes';}else{$COMPREHENSIVE='No';};
if($row['Oral_Comprehensive']==='1'){$ORAL_COMPREHENSIVE='Yes';}else{$ORAL_COMPREHENSIVE='No';};
if($row['Colloquium']==='1'){$COLLOQUIUM='Yes';}else{$COLLOQUIUM='No';};
if($row['Dissertation_Prospectus']==='1'){$DISSERTATION_PROSPECTUS='Yes';}else{$DISSERTATION_PROSPECTUS='No';};
if($row['Defense']==='1'){$DEFENSE='Yes';}else{$DEFENSE='No';};
if($row['Adivisory_Committee']==='1'){$ADVISORY_COMMITTEE='Yes';}else{$ADVISORY_COMMITTEE='No';};
if($row['Student_Advisory_Met']==='1'){$STUDENT_ADVISOR='Yes';}else{$STUDENT_ADVISOR='No';};
if($row['Research_Completed']==='1'){$RESEARCH_COMPLETED='Yes';}else{$RESEARCH_COMPLETED='No';};
if($row['Qualifying_Exam_Completed']==='1'){$QUALIFYING_EXAM='Yes';}else{$QUALIFYING_EXAM='No';};
if($row['Qualifying_Exam_Completed']==='1'){$row['Qualifying_date']='Not Applicable since Qualifying Exam Completed';};


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
<tr><th>How many lectures attended if Yes?</th><td>{$row['Colloquium_Reason']}</td></tr>
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


mysqli_close($conn);
}
}
?>
</table>

<div class="container">
<form class="form-horizontal" role="form" method="POST" action="advisor_data_sherry.php">

<div class="form-group">
      <label class="control-label col-md-3" for="temporary_advisor">Has the student formed an advisory committee?</label>
        <div id="temporary_advisor">
      <label class="control-label col-md-1">Yes</label>
      <div class="col-md-1">
        <input type="radio" name="temporary_advisors"  onclick="Member()" class='temporary_advisors' id="temporary_advisor_yes" value="1">
          </div>
      <label class="control-label col-md-1">No</label>
      <div class="col-md-1">
        <input type="radio" name="temporary_advisors"  onclick="Member()" class='temporary_advisors' id="temporary_advisor_no" value="0">
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
<div class="form-group">
    <table id="advisor_Table">
       <thead>

           <th><center><label for="advisor_member">ADVISOR/MEMBER</label></center></th>
           <th><label for="advisor_firstname">FIRSTNAME</label></th>
           <th><label for="advisor_secondname">LASTNAME</label></th>
           <th><label for="advisor_mail">E-MAIL ID</label></th>
           <th><label for="advisor_remail">RE-ENTER E-MAIL ID</label></th>

        </thead>
        <tbody id="advisor_table_body">
        <tr class="advisorteam0">
           <td><select class="advisor_member" name="advisor_member">
                <option>CHAIR</option>
                <option>CO-CHAIR/MEMBER</option>
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

<div class="form-group"><input type ="submit"  class="submit"/></div>

</form>
</div>
</html>


