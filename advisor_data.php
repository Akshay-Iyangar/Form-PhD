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
//$STUDENT_RATING=$_POST['student_rating'];
//$ADVISOR_TEAM=json_encode($_POST['advisor_team']);
//$TEMPORARY_ADVISORS=$_POST['temporary_advisors'];
//$TEMP_ADVISOR_NAME=$_POST['temp_advisor_name'];
//$PERMANENT_ADVISOR=$_POST['permanent_advisor'];
//$MAIL=json_encode($_POST['mail']);
//$SIGNATURE=$_POST['signature'];
$ASU_ID=$_POST['asu_id'];
$INDEX=$_POST['index'];
$MAIN_ADVISOR_FLAG=0;
//insert vallues in database



$STRING_SIG="MAIN Advisor Sherry has signed";
//print_r($STRING_SIG);
if(preg_match('/MAIN\sAdvisor/',$STRING_SIG))
{
	print_r("entered the loop");	
}	
 
$sql="select * from Form_data_gumel.somss where ASU_ID='$ASU_ID'";
$retval= mysqli_query($conn,$sql);
$VALUE=mysqli_fetch_array($retval, MYSQL_ASSOC);

if($VALUE["Signature"]=='null'|| $VALUE["Signature"]=="" ||$VALUE["Signature"]=='NULL')
{
//print_r($VALUE['Signature']);
//print_r($VALUE['Advisor_Team']);
//echo "getting indie";
//echo"Inside the loop";
$VALUE['Signature']=$_POST['signature'];
//$print_r($VALUE['Signature']);
$MAIN_ADVISOR='null';
$ADVISOR_TEAM=json_decode($VALUE['Advisor_Team'],true);
$ADVISOR=$ADVISOR_TEAM[$INDEX];
$ADVISOR_LIST=json_encode(array($ADVISOR));
$STUD_RATING=$_POST['student_rating'];
$STUDENT_RATING=array($ADVISOR=>$STUD_RATING);
$STUDENT_RATING=json_encode($STUDENT_RATING);
//print_r($STUDENT_RATING);
$SIGNATURE=$VALUE['Signature'];
$SIGNATURE=array($INDEX=>$SIGNATURE);
//print_r($SIGNATURE);
$SIGNATURE=json_encode($SIGNATURE);
//print_r($SIGNATURE);
}
else if ($VALUE["Signature"]!='null'|| $VALUE["Signature"]!="" ||$VALUE["Signature"]!='NULL')
{

//$COUNT=count($VALUE['Advisor_Team']);

$STUDENT_RATING=json_decode($VALUE['Student_Rating'],true);
$SIGNATURE=json_decode($VALUE['Signature'],true);
$ADVISOR_LIST=json_decode($VALUE['Approved'],true);
//print_r($SIGNATURE);
$INDEX=$_POST['index'];
//$ADVISOR_TEAM=$VALUE['Advisor_Team'];
$ADVISOR_TEAM=json_decode($VALUE['Advisor_Team'],true);
$COUNT=count($ADVISOR_TEAM);
$TEMP_STUD_RATING=$_POST['student_rating'];
$TEMP_SIGNATURE=$_POST['signature'];
//$ADVISOR=$ADVISOR_TEAM[$INDEX];
if(preg_match('/(s|S)herry/',$TEMP_SIGNATURE))
{
	//print_r("entered the loop");
	$MAIN_ADVISOR="Main Advisor(Sherry) Sherry LastName Her email-id";
	$MAIN_ADVISOR_FLAG=1;
	$INDEX=$COUNT;
	$STUDENT_RATING1=array($MAIN_ADVISOR=>$TEMP_STUD_RATING);
	$STUDENT_RATING= $STUDENT_RATING + $STUDENT_RATING1;
	$STUDENT_RATING=json_encode($STUDENT_RATING);
	$ADVISOR_LIST=json_encode($ADVISOR_LIST);
//	$SIGNATURE1=array($INDEX=>$TEMP_SIGNATURE);
//	print_r($SIGNATURE1);
  //      $SIGNATURE= $SIGNATURE + $SIGNATURE1;
    //    print_r($SIGNATURE);
      //  $SIGNATURE=json_encode($SIGNATURE);
       // print_r($SIGNATURE);
/*	$sql1=$conn->query("UPDATE Form_data_gumel.form 
	set Signature='$SIGNATURE',
	Student_Rating='$STUDENT_RATING',
	Main_Advisor='$MAIN_ADVISOR',
	Main_Advisor_Flag='$MAIN_ADVISOR_FLAG'
	where ASU_ID='$ASU_ID'
	");

	mysqli_query($conn,$sql1);

*/
} 
else 
{
	$ADVISOR=$ADVISOR_TEAM[$INDEX];
	$STUDENT_RATING1=array($ADVISOR=>$TEMP_STUD_RATING);
	$STUDENT_RATING= $STUDENT_RATING + $STUDENT_RATING1;
	$STUDENT_RATING=json_encode($STUDENT_RATING);
	$ADVISOR_LIST1=array($ADVISOR);
	$ADVISOR_LIST= array_merge($ADVISOR_LIST,$ADVISOR_LIST1);
	$ADVISOR_LIST=json_encode($ADVISOR_LIST);
	//$TEMP_SIGNATURE=$_POST['signature'];
//	$SIGNATURE1=array($INDEX=>$TEMP_SIGNATURE);
//	print_r($SIGNATURE1);
//	$SIGNATURE= $SIGNATURE + $SIGNATURE1;
//	print_r($SIGNATURE);
//	$SIGNATURE=json_encode($SIGNATURE);
//	print_r($SIGNATURE);
/*	$sql1=$conn->query("UPDATE Form_data_gumel.form 
	set Signature='$SIGNATURE',
	Student_Rating='$STUDENT_RATING',
	Approved='$ADVISOR_LIST',
	Main_Advisor='$MAIN_ADVISOR',
	Main_Advisor_Flag='$MAIN_ADVISOR_FLAG'
	where ASU_ID='$ASU_ID'
	");

mysqli_query($conn,$sql1);
*/
}
//$ADVISOR_TEAM=json_decode($VALUE['Advisor_Team'],true);
//$TEMP_STUD_RATING=$_POST['student_rating'];
//$ADVISOR=$ADVISOR_TEAM[$INDEX];
//$ADVISOR_LIST1=array($ADVISOR);
//$ADVISOR_LIST= array_merge($ADVISOR_LIST,$ADVISOR_LIST1);
//$ADVISOR_LIST=json_encode($ADVISOR_LIST);
//$STUDENT_RATING1=array($ADVISOR=>$TEMP_STUD_RATING);
//$STUDENT_RATING= $STUDENT_RATING + $STUDENT_RATING1;
//$STUDENT_RATING=json_encode($STUDENT_RATING);
//$TEMP_SIGNATURE=$_POST['signature'];
$SIGNATURE1=array($INDEX=>$TEMP_SIGNATURE);
print_r($SIGNATURE1);
$SIGNATURE= $SIGNATURE + $SIGNATURE1;
print_r($SIGNATURE);
$SIGNATURE=json_encode($SIGNATURE);
print_r($SIGNATURE);
}

$sql1=$conn->query("UPDATE Form_data_gumel.somss 
set Signature='$SIGNATURE',
Student_Rating='$STUDENT_RATING',
Approved='$ADVISOR_LIST',
Main_Advisor='$MAIN_ADVISOR',
Main_Advisor_Flag='$MAIN_ADVISOR_FLAG'
where ASU_ID='$ASU_ID'
");

mysqli_query($conn,$sql1);

mysqli_close($conn);


//generate the PDF 
/*
$html =
  '<html><body>'.
  '<p>Put your html here, or generate it with your favourite '.
  'templating system.</p>'.
  '</body></html>';

$dompdf = new DOMPDF();
$dompdf->load_html($html);
$dompdf->render();
$output = $dompdf->output();
file_put_contents('Brochure.pdf', $output);

*/



if($MAIN_ADVISOR_FLAG=='1')
{

        $to = "Akshay.Iyangar@asu.edu";//"Sherry.Woodley@asu.edu";
        $subject = 'Please Approve Form for student '.$FIRST_NAME.'  '.$SECOND_NAME.' STUDENT ID '.$ASU_ID;
        $message = 'The Advisor Committee has approved the form for the student. The Form needs Directors Signature.
        Please check and Approve the form.
        https://pi.asu.edu/somss/director.php?ASU_ID='.$ASU_ID;
        $headers = 'From: somss.advising@asu.edu';

        mail($to, $subject, $message, $headers);

}
/*
//mail the PDF as attachment to students


$to      = $STUDENT_MAIL;
$subject = 'Form Submitted';
$message = 'Your form has been submitted to the advisor you will receive the form once it has been approved by the Advisor and Director';
$headers = 'From: Mathadvising@asu.edu';// . "\r\n" .
   // 'Reply-To: webmaster@example.com' . "\r\n" .
   // 'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

//mail the Advisor to approve the students and send it to the director.

$to      = $ADVISOR;
$subject = 'Please Approve Form';
$message = 'The student has choose you as the advisor please verify and approve the form';
$headers = 'From: Mathadvising@asu.edu';// . "\r\n" .
   // 'Reply-To: webmaster@example.com' . "\r\n" .
   // 'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

*/

?>
