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
$ADVISOR_TEAM=json_encode($_POST['advisor_team']);
$MAIL=json_encode($_POST['mail']);
//insert vallues in database

$sql="UPDATE Form_data_gumel.somss 
set Advisor_Team='$ADVISOR_TEAM',
Mail='$MAIL',
Adivisory_Committee='2' 
where ASU_ID='$ASU_ID'
";

if (mysqli_query($conn,$sql)) {
    echo "New record created successfully";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}




mysqli_close($conn);

$MAIL1 = $_POST['mail'];
$array_length=count($MAIL1);


for($i=0;$i<$array_length;$i++)
{

$to      = $MAIL1[$i];
$subject = 'Please Approve Form for student '.$FIRST_NAME.'  '.$SECOND_NAME.' STUDENT ID '.$ASU_ID;
$message = 'The student has choose you as the advisor/Co-Advisor/Member please verify and approve the form
https://pi.asu.edu/somss/main_advisor_withadvisor.php?ASU_ID='.$ASU_ID.'&index='.$i;
$headers = 'From: somss.advising@asu.edu';// . "\r\n" .
   // 'Reply-To: webmaster@example.com' . "\r\n" .
   // 'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);

}


?>
