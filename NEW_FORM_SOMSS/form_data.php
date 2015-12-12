<?php

//require_once './login.php';

//$servername = "localhost";
//$username = "root";
//$password = "ra!nbow";
//$db_name = "Form_data_gumel";
// Create connection
//$conn = mysqli_connect($servername, $username, $password, $db_name);

// Check connection
//if (!$conn) {
  //  die("Connection failed: " . mysqli_connect_error());
//}
//echo "Connected successfully";


//get values from the form


$COLLEGE_STATUS=$_POST['college_status'];
var_dump($COLLEGE_STATUS);
$ASU_ID = $_POST['asu_id'];
$FIRST_NAME = $_POST['first_name'];
$SECOND_NAME = $_POST['second_name'];

?>