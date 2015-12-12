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
  <script src="./director.js"></script>
<script src="https://crypto-js.googlecode.com/svn/tags/3.1.2/build/rollups/aes.js"></script>
<style>
.datepicker {
    display: none;
}
</style>
<script>
var Asu_id = '<?php echo $ASU_ID= $_GET['ASU_ID']; ?>';
</script>
<?php

include('connect.php');
$INDEX =$_GET['index'];
$ASU_ID= $_GET['ASU_ID'];

//$ASU_ID='1208664752';
$sql = "SELECT * from Form_data_gumel.somss where ASU_ID='$ASU_ID'";
$retval = mysqli_query($conn,$sql);
if (!$retval) {
	echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
while($row = mysqli_fetch_array($retval, MYSQL_ASSOC))
{
//$temp='';
//Get all the data from Database
$row['Mail']=json_decode($row['Mail']);
$row['Course'] =json_decode($row['Course']);
$row['Grade']=json_decode($row['Grade']);
$row['Course']=implode("<br>",$row['Course']);
$row['Grade']=implode("<br>",$row['Grade']);
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
//*********************************************************************************
//print_r($row['Signature']);
//$SIGNATURE=json_decode($row['Signature']);
//ksort($SIGNATURE);
$SIGNATURE=json_decode($row['Signature'],true);
ksort($SIGNATURE);
$SIGNATURE=implode("<br>",$SIGNATURE);
$RATING_ADVISOR=array();
$APPROVER_LIST=array();
$STUDENT_RATING=json_decode($row['Student_Rating']);
foreach($STUDENT_RATING as $APPROVAL=>$RATING)
{
//	print_r("entering");
	if($RATING==='0')
	{	
		$APPROVER_LIST= array_merge($APPROVER_LIST,array($APPROVAL));
		$RATING_ADVISOR= array_merge($RATING_ADVISOR,array("Excellant<br>"));
	}
	else if($RATING==='1')
	{
		$APPROVER_LIST= array_merge($APPROVER_LIST,array($APPROVAL));
		$RATING_ADVISOR=array_merge($RATING_ADVISOR,array("Good<br>"));
	}
	else if($RATING==='2')
	{
		$APPROVER_LIST= array_merge($APPROVER_LIST,array($APPROVAL));
		$RATING_ADVISOR=array_merge($RATING_ADVISOR,array("Marginal(in need of Improvement;student does not meet minimum requirement)"));
	}
	else if($RATING==='3')
	{
		$APPROVER_LIST= array_merge($APPROVER_LIST,array($APPROVAL));
		$RATING_ADVISOR=array_merge($RATING_ADVISOR + array("Failure(unsatisfactory;student should be required to withdraw)"));
		
	}

}

$APPROVER_LIST=implode("<br>",$APPROVER_LIST);
$RATING_ADVISOR=implode("<br>",$RATING_ADVISOR);

//$STUDENT_RATING=implode("<br>",$STUDENT_RATING);
//**********************************************************************************
/*
if($row['Adivisory_Committee']==='1'){$ADVISORY_COMMITTEE='Yes';}else{$ADVISORY_COMMITTEE='No';};
if($row['Student_Advisory_Met']==='1'){$STUDENT_ADVISOR='Yes';}else{$STUDENT_ADVISOR='No';};
if($row['Prospectus_Approved']==='1'){$PROSPECTUS_APPROVED='Yes';}else{$PROSPECTUS_APPROVED='No';};
if($row['Research_Completed']==='1'){$RESEARCH_COMPLETED='Yes';}else{$RESEARCH_COMPLETED='No';};
if($row['Qualifying_Exam_Completed']==='1'){$QUALIFYING_EXAM='Yes';}else{$QUALIFYING_EXAM='No';};
if($row['Participation_In_MTBI']==='1'){$PART_MTBI='Yes';}else{$PART_MTBI='No';};
if($row['No_Summer_Funded']==='1'){$SUMMER_FUNDED='Yes';}else if($row['No_Summer_Funded']==='0'){$SUMMER_FUNDED='No';} else{$SUMMER_FUNDED="Not Applicable since taken part in MTBI";};
if($row['Tech_Reports']==='1'){$TECH_REPORTS='Yes';}else{$TECH_REPORTS='No';};
if($row['Qualifying_Exam_Completed']==='1'){$row['Qualifying_date']='N/A since Qualifying Exam Completed';};
if($row['Candidacy_exam']==='1'){$CANDIDACY_EXAM='Yes';}else{$CANDIDACY_EXAM='No';};
if($row['Candidacy_exam']==='1'){$row['Candidacy_date']='N/A since Candidacy Exam Completed';};
$VALIDATE='true';
*/
if($row['Written_Comprehensive']==='1'){$COMPREHENSIVE='Yes';}else{$COMPREHENSIVE='No';};
if($row['Oral_Comprehensive']==='1'){$ORAL_COMPREHENSIVE='Yes';}else{$ORAL_COMPREHENSIVE='No';};
if($row['Colloquium']==='1'){$COLLOQUIUM='Yes';}else{$COLLOQUIUM='No';};
if($row['Dissertation_Prospectus']==='1'){$DISSERTATION_PROSPECTUS='Yes';}else{$DISSERTATION_PROSPECTUS='No';};
if($row['Defense']==='1'){$DEFENSE='Yes';}else{$DEFENSE='No';};
if($row['Adivisory_Committee']==='1'){$ADVISORY_COMMITTEE='Yes';}else{$ADVISORY_COMMITTEE='No';};
if($row['Student_Advisory_Met']==='1'){$STUDENT_ADVISOR='Yes';}else{$STUDENT_ADVISOR='No';};
if($row['Research_Completed']==='1'){$RESEARCH_COMPLETED='Yes';}else{$RESEARCH_COMPLETED='No';};
if($row['Qualifying_Exam_Completed']==='1'){$QUALIFYING_EXAM='Yes';}else{$QUALIFYING_EXAM='No';};
//if($row['Qualifying_Exam_Completed']==='1'){$row['Qualifying_date']='Not Applicable since Qualifying Exam Completed';};
$VALIDATE='true';






//$ADVISOR_TEAM=['ADVISOR Akshay Iyangar Akshay.Iyangar@asu.edu','ADVISOR Akshay Iyangar123 akshayiyangar@gmail.com'];
//$APPROVAL=['ADVISOR Akshay Iyangar123 akshayiyangar@gmail.com','ADVISOR Akshay Iyangar Akshay.Iyangar@asu.edu'];
//print_r($ADVISOR_TEAM);
//print_r($APPROVAL);
//print_r(array_intersect($ADVISOR_TEAM,$APPROVAL));
$RESULT=array_diff($ADVISOR_TEAM,$APPROVAL);
if(!(empty($RESULT)))
                {
                       	$VALIDATE='false';
                       // print_r($VALIDATE);
                
                }


echo"
<p><h3><b><center>ADVISORY COMMITTEE FORM</center></b></h3></p> 
<p><h4><b><center> {$ADVISOR_TEAM[$INDEX]}</center></b></h4></p>
<table align='center' border='2' style='width: auto;' class='table table-hover'>
";
echo"
<div class='container'><div class='col-md-12'><center><label>STUDENT FORM ID:</label><input type='text' name='random' id='random' readonly value = '$FORM_ID'><center></div></div>
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
<th>Courses and Grades</th>
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
<tr><th>Student Rating by Advisor</th>
<td>
<table align='center' border='1' style='width: auto;' class='table table-bordered'>
<thead>
<tr>
<th>Advisor Details</th>
<th>Ratings</th>
</tr>
</thead>
<tbody>
<tr>
<td>{$APPROVER_LIST}</td>
<td><b>{$RATING_ADVISOR}</b></td>
</tr>
</tbody>
</table>
</td>
</tr>
<tr><th>Signature of Advisors</th>
<td>
<table align='center' border='1' style='width: auto;' class='table table-bordered'>
<thead>
<tr>
<th>Individual Signatures</th>
</tr>
</thead>
<tbody>
<tr>
<td><b>{$SIGNATURE}</b></td>
</tr>
</tbody>
</table>
</td>
</tr>

<tr><th>Additonal Details/Information</th><td>{$row['Extra']}</td></tr>

</table></div>
<div id='prompt_password' style='display:none'><p> Enter your Password for Authentication</p>PASSWORD:<input type='password' id='advisor_password'/></div>
";


}

mysqli_close($conn);

echo"
</table>
";


echo"
<script>


function main_advisor_check(){

	console.log($('#advisor_member :selected').val());
	console.log('function--------');
	var flag='true';
                if($VALIDATE==false && $('#advisor_member :selected').val()=='Main Advisor(Sherry)')
                {
			console.log('if statement'\n);
                        alert('Cannot approve');
			flag='false';
                
                }
return flag;
}

</script>

";



//echo($ADVISOR_TEAM == $APPROVAL);




?>
<div class="container">
<form class="form-horizontal" role="form" method="POST" action="director_data.php">


<div class="form-group">

      <label class="control-label col-md-4"><h4><b>Graduate Director's Comments<b></h4></label>
      <div class="col-md-6">
	<textarea rows="5" cols="95" id="director_comments"> </textarea>
      </div>
 </div>
<p><h3><b>Section E |Director's Signature</b></h3></p>

<div class="form-group">
      <label class="control-label col-md-9" for="main_advisor">Sign and approve the form<i>(You wont be able to approve the form till the Advisor,Co-advisor and members don't approve)</i></label>
    <table id="permanent_adv">
       <thead>
         <tr>
           <th><label for="signature">MEMBER</label></th>
           <th><label for="signature">NAME</label></th>
           <th><label for="signature"><center>SIGNATURE</center></label></th>
           <th><center for="signature"><center>DATE</center></label></th>
        </tr>
        </thead>
        <tbody id="permanent_advi">
        <tr class="signature">
           <th type="text" class="member" value="GRADUATE DIRECTOR">GRADUATE DIRECTOR</th>
           <td> <input  name="name" class="name"  type="text" size="50"> </td>
           <td><input  name='1' class="password" id='password' type="text" size="50" readonly></td>
           <td> <input  class="date" type="text" size="30"> </td>
        </tr>
    </tbody>
</table>
</div>
<div class="form-group"><input type ="submit"  class="submit"/></div>

</form>
</div>
</html>

