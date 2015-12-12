<?php

//require_once './login.php';

$servername = "localhost";
$username = "root";
$password = "ra!nbow";
$db_name = "Form_data_gumel";
// Create connection
$conn = mysqli_connect($servername, $username, $password, $db_name);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
echo "Connected successfully";


//get values from the form

$DEGREE_SELECT=$_POST['degree_select'];
$ASU_ID = $_POST['asu_id'];
$FIRST_NAME = $_POST['first_name'];
$SECOND_NAME = $_POST['second_name'];
$ACADEMIC_YEAR =$_POST['academic_year'] ;
$STUDENT_MAIL=$_POST['student_mail'];
$PROGRAM_DATE=$_POST['prog_start_date'];
$SEMESTER_PROGRESS=$_POST['sem_in_prog'];
$CUM_GPA=$_POST['cum_gpa'];
$COURSEGRADE=json_encode($_POST['coursegrade']);
$WRITTENCOMP=json_encode($_POST['written_exam']);
$QUALIFYEXAM=json_encode($_POST['qualify_exam']);
$ADVISORY_COMMITTEE=$_POST['advisory_committee'];
$MAIL=json_encode($_POST['mail']);
$MET_ADVISOR=$_POST['met_advisor'];
if($_POST['met_advisor']==='1')
{
        $ADVISORY_COMMITTEE_REASON='The Student met the advisory committee during the reporting period';
}
else
{
	$ADVISORY_COMMITTEE_REASON=$_POST['advisory_committee_reason'];
}
$COMPREHENSIVE_EXAM=$_POST['comprehensive_exam'];
$ORAL_COMPREHENSIVE_EXAM=$_POST['oral_comprehensive_exam'];
$COLLOQUIUM=$_POST['colloquium'];
if($COLLOQUIUM==='1')
{
	$COLLOQUIUM_REASON=$_POST['colloquium_reason'];
}
else
{
	$COLLOQUIUM_REASON="The student has not attented any colloquium lectures";
}

$QUALIFYING_EXAM=$_POST['qualifying_exam'];
if($QUALIFYING_EXAM==='0')
{
	$ANTICIPATED_QUALIFYING_DATE=$_POST['anticipated_qualifying_date'];
	$QUALIFYING_DETAILS="Not Applicable since qualifying exam not given";
}
else
{
	$QUALIFYING_DETAILS=json_encode($_POST['qualifying_details']);
	$ANTICIPATED_QUALIFYING_DATE="Not Applicable since qualifying exam is given";
}
$DISSERTATION_PROSPECTUS=$_POST['dissertation_prospectus'];
if($DISSERTATION_PROSPECTUS==='1')
{
	$ANTICIPATED_DISSERTATION_PROSPECTUS_DATE="Not Applicable as Oral Dissertation Prospectus is completed";
	$DEFENSE=$_POST['defense'];
	if($DEFENSE==='0')
	{
		$DEFENSE_COMPLETION_DATE=$_POST['defense_completion_date'];
	}
	else
	{
		$DEFENSE_COMPLETION_DATE="The Defense is completed";
	}
}
else
{
	$ANTICIPATED_DISSERTATION_PROSPECTUS_DATE=$_POST['anticipated_dissertation_prospectus_date'];
	$DEFENSE="Not Applicable as yet to complete Oral Defense";
	$DEFENSE_COMPLETION_DATE="N/A";
}
$CURRENT_GOAL=json_encode($_POST['current_goal']);
$PUBLICATION=json_encode($_POST['publication']);
$PRESENTATION=json_encode($_POST['presentation']);
$SIGNATURE=json_encode($_POST['signature']);
$MAIN_ADVISOR=$_POST['main_advisor'];
$FUTURE_GOAL=json_encode($_POST['future_goal']);
$EXTRA=$_POST['extra'];
$APPROVAL=json_encode(array());
$fileName = $ASU_ID."-".$_FILES["file"]["name"];
print_r($fileName);
//$data = base64_decode($_POST['FD']);
$fileTmpLoc = $_FILES["file"]["tmp_name"];
$file_size = $_FILES['file']['size'];
$file_type = $_FILES['file']['type'];
// Path and file name
$pathAndName = "/var/www/somss/uploads/".$fileName;
//print_r($pathAndName);
// Run the move_uploaded_file() function here
$moveResult = move_uploaded_file($fileTmpLoc, $pathAndName);


//insert vallues in database 
$sql =$conn-> query( "INSERT INTO Form_data_gumel.form (Degree,ASU_ID,First_Name,Second_Name,Academic_Year,
	Student_Mail,Program_start_date,Semester_in_progress,CGPA,Course,Adivisory_Committee,Mail,
	Advisor_Team,Admin_Advisor,Student_Advisory_Met,Not_Met_Reason,Qualifying_Exam_Completed,Qualifying_Exam,
Written_Comprehensive,Written_Exam,Oral_Comprehensive,Colloquium,Colloquium_Reason,current_goal,Publications,
Presentations,future_goal,Extra,Approved,File_Name)
VALUES ('$DEGREE_SELECT','$ASU_ID','$FIRST_NAME','$SECOND_NAME','$ACADEMIC_YEAR','$STUDENT_MAIL','$PROGRAM_DATE',
	'$SEMESTER_PROGRESS','$CUM_GPA','$COURSEGRADE','$ADVISORY_COMMITTEE','$MAIL',
	'$SIGNATURE','$MAIN_ADVISOR','$MET_ADVISOR','$ADVISORY_COMMITTEE_REASON','$QUALIFYING_EXAM',
	'$QUALIFYEXAM','$COMPREHENSIVE_EXAM','$WRITTENCOMP','$ORAL_COMPREHENSIVE_EXAM',
'$COLLOQUIUM','$COLLOQUIUM_REASON','$CURRENT_GOAL','$PUBLICATION','$PRESENTATION',
'$FUTURE_GOAL','$EXTRA','$APPROVAL','$fileName')");
//execute the query 
echo " record pushed in successfully";

if (mysqli_query($conn,$sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}
mysqli_close($conn);


//send mail to Student and Advisor

$MAIL1 = $_POST['mail'];
$array_length=count($MAIL1);
$to      = $STUDENT_MAIL;
$subject = 'Form Submitted';
$message = 'Your form has been submitted to the advisor you will receive the form once it has been approved by the Advisor and Director';
$headers = 'From: somss.advising@asu.edu';// . "\r\n" .

mail($to, $subject, $message, $headers);

//mail the Advisor to approve the students and send it to the director.

for($i=0;$i<$array_length;$i++)
{
	
$to      = $MAIL1[$i];
$subject = 'Please Approve Form for student '.$FIRST_NAME.'  '.$SECOND_NAME.' STUDENT ID '.$ASU_ID;
$message = 'The student has choose you as the advisor/Co-Advisor/Member please verify and approve the form
https://pi.asu.edu/somss/main_advisor_withadvisor.php?ASU_ID='.$ASU_ID.'&index='.$i;
$headers = 'From: somss.advising@asu.edu';// . "\r\n" .

mail($to, $subject, $message, $headers);

}


$SIGNATURE1= implode("\n",$_POST['signature']);

$to      = $MAIN_ADVISOR;
$subject = 'Please Approve Form for student '.$FIRST_NAME.'  '.$SECOND_NAME.' STUDENT ID '.$ASU_ID;
if($ADVISORY_COMMITTEE=='0')
{
$message1='
The student has chosen you as the Main Advisor.

The Student does not have advisors yet. Please co-ordinate with the student and appoint him advisors and members.
Once The Advisors,Co-Advisors and Members are appointed and the form is approved by them Please Approve the Form for Requesting the approval from the Director.
https://pi.asu.edu/somss/main_advisor_noadvisor.php?ASU_ID='.$ASU_ID;
}
else if($ADVISORY_COMMITTEE=='1')
{
$message1='
The student has mentioned the following advisors'.$SIGNATURE1.'

Once All the advisors,Co-Advisors and members Approve the Form only then will you be able to approve the form for Requesting the approval from the Director.
Please use the below link to approve the form.
https://pi.asu.edu/somss/main_advisor_withadvisor.php?ASU_ID='.$ASU_ID.'&index='.$array_length.'
OR
Please go the advisor page to check the status of student\'s approval';

}
$headers = 'From: somss.advising@asu.edu';// . "\r\n" .

mail($to, $subject,$message1, $headers);



?>



